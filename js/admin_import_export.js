jQuery(document).ready(function($) {

    // --- JSON EXPORT (Individual Files) ---
    $('#mvp-export-json-button').on('click', function(e) {
        e.preventDefault(); // Prevent default button behavior

        var selectedPlaylists = [];
        $('.mvp-playlist-checkbox:checked').each(function() {
            var playlistId = $(this).val();
            var playlistTitle = $(this).closest('tr').find('.playlist-title').val() || 'playlist-' + playlistId;
            selectedPlaylists.push({ id: playlistId, title: playlistTitle });
        });

        if (selectedPlaylists.length === 0) {
            alert('Please select at least one playlist to export.');
            return;
        }

        var $exportButton = $(this);
        $exportButton.prop('disabled', true).text('Exporting...');

        function exportPlaylist(index) {
            if (index >= selectedPlaylists.length) {
                $exportButton.prop('disabled', false).text('Export Selected (JSON)');
                $('form[id^="mvp-export-temp-form-"]').remove();
                return;
            }

            var playlist = selectedPlaylists[index];
            var formId = 'mvp-export-temp-form-' + playlist.id;
            $('#' + formId).remove();

            var form = $('<form>', {
                'id': formId, 'method': 'POST', 'action': mvp_import_export_data.ajax_url
            }).appendTo('body');

            $('<input>').attr({ type: 'hidden', name: 'action', value: 'mvp_export_single_playlist_json' }).appendTo(form);
            $('<input>').attr({ type: 'hidden', name: 'nonce', value: mvp_import_export_data.security }).appendTo(form);
            $('<input>').attr({ type: 'hidden', name: 'playlist_id', value: playlist.id }).appendTo(form);

            console.log('Submitting export form for playlist ID:', playlist.id);
            form.submit();

            setTimeout(function() {
                $('#' + formId).remove();
                exportPlaylist(index + 1);
            }, 500);
        }
        exportPlaylist(0);
    });

    // --- JSON IMPORT (Bulk Files) ---
    $('#mvp-import-json-form').on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(this);
        var statusDiv = $('#mvp-import-status');
        var importButton = $('#mvp-import-json-button');
        var fileInput = $('#mvp_import_file');

        if (!fileInput.get(0).files || fileInput.get(0).files.length === 0) {
             statusDiv.removeClass('mvp-notice-success mvp-notice-error mvp-notice-info')
                      .addClass('mvp-notice-warning')
                      .text('Please select one or more JSON files to import.')
                      .show();
             return;
        }

        statusDiv.removeClass('mvp-notice-success mvp-notice-error mvp-notice-warning').addClass('mvp-notice-info').text('Importing... Please wait.').show();
        importButton.prop('disabled', true);
        fileInput.prop('disabled', true); // Disable file input too

        $.ajax({
            url: mvp_import_export_data.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-success').html(response.data.message);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    var errorMsg = response.data.message || 'An unknown error occurred during bulk import.';
                    if (response.data.errors && response.data.errors.length > 0) {
                         errorMsg += '<br><strong>Details:</strong><ul>';
                         $.each(response.data.errors, function(i, err) {
                             var errText = (typeof err === 'string' || err instanceof String) ? err : JSON.stringify(err);
                             errorMsg += `<li>${escapeHtml(errText)}</li>`;
                         });
                         errorMsg += '</ul>';
                    }
                    statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error').html('Import Failed: ' + errorMsg);
                    importButton.prop('disabled', false);
                    fileInput.prop('disabled', false).val(''); // Clear and re-enable input on failure
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var errorMsg = `AJAX Error: ${textStatus} - ${errorThrown}`;
                 if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {
                     errorMsg += `<br>Server Response: ${escapeHtml(jqXHR.responseJSON.data.message)}`;
                 } else if (jqXHR.responseText) {
                    errorMsg += `<br>Raw Server Response: <pre>${escapeHtml(jqXHR.responseText.substring(0, 800))}...</pre>`;
                 }
                statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error').html(`Import Failed: ${errorMsg}`);
                importButton.prop('disabled', false);
                fileInput.prop('disabled', false).val(''); // Clear and re-enable input on error
            }
        });
    });


    // --- *** NEW: DELETE SELECTED PLAYLISTS *** ---
    $('#mvp-delete-playlists').on('click', function(e) {
        e.preventDefault();
        var $button = $(this);
        var selectedIds = [];

        $('.mvp-playlist-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            alert('Please select at least one playlist to delete.');
            return;
        }

        // Confirmation dialog
        var confirmation = confirm('Are you sure you want to delete the selected ' + selectedIds.length + ' playlist(s)? This action cannot be undone.');
        if (!confirmation) {
            return; // User cancelled
        }

        // Visual feedback
        $button.prop('disabled', true).text('Deleting...');
        // Optional: Add a general status area or use the import status div
        var statusDiv = $('#mvp-import-status'); // Re-use import status div? Or create a new one.
        statusDiv.removeClass('mvp-notice-success mvp-notice-error mvp-notice-warning').addClass('mvp-notice-info').text('Deleting selected playlists...').show();


        $.ajax({
            url: mvp_import_export_data.ajax_url,
            type: 'POST',
            data: {
                action: 'mvp_delete_playlist', // The PHP action hook
                playlist_id: selectedIds.join(','), // Send IDs as comma-separated string
                security: mvp_import_export_data.security // Use the localized nonce
            },
            dataType: 'json', // Expect JSON response (though current PHP might return simple string)
            success: function(response) {
                // Check if the PHP function sent a specific success/error JSON structure
                if (response && response.success !== undefined) { // Handling wp_send_json_success/error
                     if (response.success) {
                        statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-success').text('Successfully deleted ' + (response.data.deleted_count || selectedIds.length) + ' playlist(s).');
                        // Remove deleted rows from the table
                        $.each(selectedIds, function(index, id) {
                            $('tr[data-playlist-id="' + id + '"]').fadeOut(400, function() { $(this).remove(); });
                        });
                        // Uncheck the "select all" checkbox if it was checked
                        $('.mvp-playlist-all').prop('checked', false);
                    } else {
                        statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error').html('Deletion failed: ' + escapeHtml(response.data.message || 'Unknown server error.'));
                    }
                } else {
                     // Handle simpler response (like the direct echo from original PHP)
                     // Assuming success if we get here without a specific error structure
                     statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-success').text('Successfully deleted ' + selectedIds.length + ' playlist(s).');
                     $.each(selectedIds, function(index, id) {
                         $('tr[data-playlist-id="' + id + '"]').fadeOut(400, function() { $(this).remove(); });
                     });
                     $('.mvp-playlist-all').prop('checked', false);
                 }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                 var errorMsg = `AJAX Error: ${textStatus} - ${errorThrown}`;
                 if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {
                     errorMsg += `<br>Server Response: ${escapeHtml(jqXHR.responseJSON.data.message)}`;
                 } else if (jqXHR.responseText) {
                    errorMsg += `<br>Raw Server Response: <pre>${escapeHtml(jqXHR.responseText.substring(0, 500))}...</pre>`;
                 }
                 statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error').html(`Deletion Failed: ${errorMsg}`);
            },
            complete: function() {
                // Re-enable button regardless of success/error
                $button.prop('disabled', false).text('Delete selected');
                 // Hide status div after a delay? Or keep it until next action?
                 // setTimeout(function(){ statusDiv.fadeOut(); }, 5000);
            }
        });
    });


    // --- Helper: Select/Deselect All Checkboxes ---
    $('.mvp-playlist-all').on('change', function() {
        var isChecked = $(this).prop('checked');
        $('.mvp-playlist-checkbox').prop('checked', isChecked);
    });

     // --- Helper: Uncheck "Select All" if any individual checkbox is unchecked ---
     $('.mvp-playlist-checkbox').on('change', function() {
        if (!$(this).prop('checked')) {
            $('.mvp-playlist-all').prop('checked', false);
        }
        // Optional: check if all are checked to re-check "Select All"
         /*
        else {
            if ($('.mvp-playlist-checkbox:checked').length === $('.mvp-playlist-checkbox').length) {
                 $('.mvp-playlist-all').prop('checked', true);
            }
        }
        */
    });

    // Function to escape HTML for displaying raw server responses safely
    function escapeHtml(text) {
         if (typeof text !== 'string') {
             try { text = String(text); } catch (e) { return '[Unescapable Content]'; }
         }
         var map = {
             '&': '&',
             '<': '<',
             '>': '>',
             '"': '"',
             "'": '&#39;'
         };
         return String(text).replace(/[&<>"']/g, function(m) { return map[m]; });
     }

});