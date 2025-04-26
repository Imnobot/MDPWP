jQuery(document).ready(function($) {
    "use strict";

    // --- Check if necessary data is localized ---
    if (typeof mvp_player_manager_data === 'undefined') {
        console.error('MVP Player Manager Error: Localized data (mvp_player_manager_data) not found.');
        // Optionally display an error to the user
        // $('#wpbody-content').prepend('<div class="notice notice-error"><p>Player Manager Error: Missing required JavaScript data. Please contact support.</p></div>');
        return; // Stop execution if data is missing
    }

    // --- Cache frequently used selectors ---
    var $body = $('body');
    var $playerTable = $('.mvp-player-table');
    var $importForm = $('#mvp-import-players-json-form');
    var $importFileInput = $('#mvp_import_json_file');
    var $importButton = $('#mvp-import-players-json-button');
    var $importSpinner = $importForm.find('.spinner');
    var $importMessageDiv = $('#mvp-import-json-message');
    var $bulkActionFormTop = $('#mvp-players-bulk-action-form-top'); // Form for bulk actions
    var $bulkActionSelectTop = $('#bulk-action-selector-top');
    var $bulkApplyButtonTop = $('#mvp-doaction'); // Apply button for bulk actions

    // --- JSON Import Handling ---
    $importForm.on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var fileInput = $importFileInput[0];
        if (!fileInput.files || fileInput.files.length === 0) {
            displayImportMessage('Please select a JSON file to import.', 'error');
            return;
        }

        var file = fileInput.files[0];
        if (file.type !== 'application/json' && !file.name.toLowerCase().endsWith('.json')) {
             displayImportMessage('Invalid file type. Please upload a .json file.', 'error');
             return;
        }

        var formData = new FormData();
        formData.append('action', 'mvp_import_players_json'); // AJAX action hook
        formData.append('_wpnonce_mvp_import_json', mvp_player_manager_data.import_nonce); // Add nonce
        formData.append('mvp_import_file', file); // Add the file

        // Show loading state
        $importSpinner.addClass('is-active');
        $importButton.prop('disabled', true);
        displayImportMessage(''); // Clear previous messages

        $.ajax({
            url: mvp_player_manager_data.ajax_url,
            type: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from processing the FormData
            contentType: false, // Prevent jQuery from setting contentType
            dataType: 'json', // Expect JSON response
        })
        .done(function(response) {
            if (response.success) {
                displayImportMessage(response.data.message || 'Import successful! Reloading...', 'success');
                // Reload after a short delay to show message
                setTimeout(function() {
                    location.reload();
                }, 2000);
            } else {
                let errorMessage = response.data.message || 'An unknown error occurred during import.';
                // Append specific errors if provided
                if (response.data.errors && Array.isArray(response.data.errors) && response.data.errors.length > 0) {
                     errorMessage += '<br/><strong>Details:</strong><ul>';
                     response.data.errors.forEach(function(err) {
                         errorMessage += '<li>' + escapeHtml(err) + '</li>'; // Basic HTML escaping
                     });
                     errorMessage += '</ul>';
                }
                displayImportMessage(errorMessage, 'error', false); // Don't sanitize if errors contain HTML
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error('Import AJAX Error:', textStatus, errorThrown, jqXHR.responseText);
            displayImportMessage('AJAX error during import. Check the browser console for details.', 'error');
        })
        .always(function() {
            // Reset loading state
            $importSpinner.removeClass('is-active');
            $importButton.prop('disabled', false);
            $importFileInput.val(''); // Clear file input
        });
    });

    // --- Bulk Action Handling (Top Dropdown) ---
    $bulkActionFormTop.on('submit', function(e) {
        var selectedAction = $bulkActionSelectTop.val();
        var $checkedBoxes = $playerTable.find('tbody .mvp-player-indiv:checked');

        if (selectedAction === '-1') {
            e.preventDefault(); // Prevent submission if no action selected
            alert('Please select a bulk action.');
            return;
        }

        if ($checkedBoxes.length === 0) {
            e.preventDefault(); // Prevent submission if no items selected
            alert('Please select one or more players to apply the action.');
            return;
        }

        // --- Handle JSON Export ---
        if (selectedAction === 'mvp_export_players_json') {
            // No prevention needed - allow the form to submit directly
            // The PHP function mvp_export_players_json handles the download response
            // Make sure the checkboxes are part of the form (they are in the table, need to add them)
            $checkedBoxes.each(function() {
                $bulkActionFormTop.append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', $(this).attr('name')) // 'player_ids[]'
                        .val($(this).val())
                );
            });
            // Add the action itself as a hidden field if needed by the export handler
            $bulkActionFormTop.append(
                $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'action') // Corresponds to the AJAX hook name for export
                    .val('mvp_export_players_json') // Note: Direct POST target uses this, not wp_ajax_ hook
            );
             // Add nonce for the export function (same as bulk action nonce used)
             $bulkActionFormTop.append(
                $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', '_mvp_bulk_player_nonce')
                    .val(mvp_player_manager_data.bulk_action_nonce)
            );

            // The form will now submit naturally to admin-post.php or similar,
            // and the hooked function mvp_export_players_json will generate the download.
             return; // Allow default form submission
        }

        // --- Handle Bulk Delete (AJAX) ---
        if (selectedAction === 'mvp_delete_players') {
            e.preventDefault(); // Prevent default form submission for AJAX actions

            if (!confirm('Are you sure you want to delete the selected players? This cannot be undone.')) {
                return;
            }

             var playerIds = $checkedBoxes.map(function() {
                return $(this).val();
            }).get();

             // Show loading state (optional)
             $bulkApplyButtonTop.prop('disabled', true);
             // Add a spinner next to the button if desired

            $.ajax({
                url: mvp_player_manager_data.ajax_url,
                type: 'POST',
                data: {
                    action: 'mvp_bulk_player_action', // The AJAX handler
                    _mvp_bulk_player_nonce: mvp_player_manager_data.bulk_action_nonce, // Security nonce
                    bulk_action: selectedAction, // Tell the handler what to do
                    player_ids: playerIds // Array of IDs
                },
                dataType: 'json'
            })
            .done(function(response) {
                 if (response.success) {
                    displayAdminNotice(response.data.message || 'Players deleted successfully.', 'success');
                    // Remove deleted rows from the table
                    if (response.data.deleted_ids && Array.isArray(response.data.deleted_ids)) {
                         response.data.deleted_ids.forEach(function(id) {
                             $playerTable.find('tr[data-player-id="' + id + '"]').fadeOut(400, function() { $(this).remove(); });
                         });
                    }
                     // Uncheck "select all" box
                     $('#cb-select-all-1, #cb-select-all-2').prop('checked', false);
                 } else {
                     displayAdminNotice(response.data.message || 'An error occurred during bulk deletion.', 'error');
                 }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                 console.error('Bulk Delete AJAX Error:', textStatus, errorThrown, jqXHR.responseText);
                 displayAdminNotice('AJAX error during bulk deletion. Check console.', 'error');
            })
            .always(function() {
                 $bulkApplyButtonTop.prop('disabled', false);
                 // Hide spinner if used
            });
        }

        // Add handling for other bulk actions if needed
    });


    // --- Helper Functions ---

    /**
     * Displays a message in the import message div.
     * @param {string} message The message text.
     * @param {string} type 'success' or 'error'.
     * @param {boolean} sanitize Automatically escape HTML? Default true.
     */
    function displayImportMessage(message, type = 'info', sanitize = true) {
        $importMessageDiv.removeClass('notice-success notice-error notice-info notice-warning');
        if (type === 'success') {
            $importMessageDiv.addClass('notice-success');
        } else if (type === 'error') {
            $importMessageDiv.addClass('notice-error');
        } else {
             $importMessageDiv.addClass('notice-info');
        }

        if (sanitize) {
            $importMessageDiv.text(message); // Use text() for safety
        } else {
            $importMessageDiv.html(message); // Use html() if message contains intentional HTML
        }


        if (message) {
            $importMessageDiv.slideDown();
        } else {
            $importMessageDiv.slideUp();
        }
    }

     /**
     * Displays a standard WordPress admin notice.
     * @param {string} message The message text.
     * @param {string} type 'success', 'error', 'warning', 'info'.
     */
    function displayAdminNotice(message, type = 'info') {
         // Remove existing notices of this type first? Or allow multiple.
         // $('.mvp-admin-notice').remove(); // Example: remove previous

        var noticeHtml = '<div class="notice notice-' + escapeHtml(type) + ' is-dismissible mvp-admin-notice">' +
                         '<p>' + escapeHtml(message) + '</p>' +
                         '<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>' +
                         '</div>';
        // Insert after the main h1 title usually
        $('.wrap h1').first().after(noticeHtml);

        // Make the dismiss button work
        $body.off('click', '.mvp-admin-notice .notice-dismiss').on('click', '.mvp-admin-notice .notice-dismiss', function(e) {
            e.preventDefault();
            $(this).closest('.notice').fadeOut(300, function() { $(this).remove(); });
        });
    }

     /**
     * Basic HTML escaping.
     * @param {string} str String to escape.
     * @returns {string} Escaped string.
     */
     function escapeHtml(str) {
        if (typeof str !== 'string') return '';
        return str
             .replace(/&/g, "&")
             .replace(/</g, "<")
             .replace(/>/g, ">")
             .replace(/"/g, "&#34;")
             .replace(/'/g, "'");
     }

    // Add any other specific Player Manager JS logic here if needed.
    // Note: Event handlers for single delete, duplicate etc. are likely still in admin_global.js (obfuscated).

});