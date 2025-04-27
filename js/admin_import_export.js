jQuery(document).ready(function($) {

    // Function to sanitize playlist title for use in filename
    function sanitizeFilename(name) {
        // Remove potentially problematic characters, replace spaces with underscores
        // Keep it relatively simple for cross-platform compatibility
        if (typeof name !== 'string') {
            name = String(name || 'playlist'); // Default name if input is weird
        }
        let sanitized = name.replace(/[^a-z0-9_\-\s]/gi, '_').replace(/[\s]+/g, '_');
        return sanitized.substring(0, 100); // Limit length
    }

    // --- JSON EXPORT (Modified for multiple files) ---
    $('#mvp-export-json-button').on('click', function(e) {
        e.preventDefault(); // Prevent default button behavior

        var $button = $(this);
        var selectedPlaylists = [];
        $('.mvp-playlist-checkbox:checked').each(function() {
            selectedPlaylists.push($(this).val());
        });

        if (selectedPlaylists.length === 0) {
            alert('Please select at least one playlist to export.');
            return;
        }

        // Disable button during export
        $button.prop('disabled', true).text('Exporting...');

        // Perform AJAX request to get playlist data
        $.ajax({
            url: mvp_import_export_data.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'mvp_export_playlists_json',
                nonce: mvp_import_export_data.security, // Security nonce (passed as 'nonce' in POST)
                playlist_ids: selectedPlaylists // Array of selected IDs
            },
            success: function(response) {
                if (response.success && response.data && Array.isArray(response.data)) {
                    if (response.data.length > 0) {
                        // Loop through each playlist's data in the response
                        $.each(response.data, function(index, playlistData) {
                            if (playlistData.title && playlistData.json_data) {
                                try {
                                    // Create a blob from the JSON data string
                                    var blob = new Blob([playlistData.json_data], { type: 'application/json;charset=utf-8' });

                                    // Sanitize title for filename
                                    var safeTitle = sanitizeFilename(playlistData.title);
                                    var timestamp = new Date().toISOString().slice(0, 19).replace(/[-:T]/g, ''); // YYYYMMDDHHMMSS
                                    var filename = `mvp_playlist_${safeTitle}_export_${timestamp}.json`;

                                    // Create a temporary link element to trigger download
                                    var link = document.createElement('a');
                                    var url = URL.createObjectURL(blob);
                                    link.setAttribute('href', url);
                                    link.setAttribute('download', filename);
                                    link.style.visibility = 'hidden';
                                    document.body.appendChild(link);
                                    link.click(); // Simulate click to trigger download
                                    document.body.removeChild(link); // Clean up the link
                                    URL.revokeObjectURL(url); // Clean up the blob URL
                                } catch (err) {
                                     console.error("Error creating download for playlist:", playlistData.title, err);
                                     alert("Error creating download for playlist: " + playlistData.title + ". Check console for details.");
                                }
                            } else {
                                 console.warn("Skipping playlist export due to missing title or data:", playlistData);
                            }
                        });
                         $button.prop('disabled', false).text('Export Selected (JSON)'); // Re-enable button
                         alert(response.data.length + ' playlist file(s) prepared for download.');
                    } else {
                         alert('No playlist data returned from the server for the selected IDs.');
                         $button.prop('disabled', false).text('Export Selected (JSON)');
                    }
                } else {
                    // Handle errors reported by the server (response.success is false)
                    var errorMsg = (response.data && response.data.message) ? response.data.message : 'An unknown error occurred during export preparation.';
                    alert('Export Failed: ' + errorMsg);
                    $button.prop('disabled', false).text('Export Selected (JSON)');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle AJAX request errors (network issues, server errors not sending JSON)
                console.error("Export AJAX Error:", textStatus, errorThrown, jqXHR.responseText);
                alert('Export Failed: AJAX request error. Status: ' + textStatus + '. Error: ' + errorThrown + '. Check browser console for details.');
                $button.prop('disabled', false).text('Export Selected (JSON)');
            },
            complete: function() {
                 // Ensure button is re-enabled even if there's an issue before success/error handlers
                 $button.prop('disabled', false).text('Export Selected (JSON)');
            }
        }); // End AJAX call
    }); // End Export Button Click

    // --- Delete Selected Playlists ---
    $('#mvp-delete-playlists').on('click', function(e) {
        e.preventDefault();
        var $button = $(this);
        var selectedPlaylists = [];
        $('.mvp-playlist-checkbox:checked').each(function() {
            selectedPlaylists.push($(this).val());
        });

        if (selectedPlaylists.length === 0) {
            alert('Please select at least one playlist to delete.');
            return;
        }

        // Confirmation dialog
        if (!confirm('Are you sure you want to delete the selected ' + selectedPlaylists.length + ' playlist(s)? This action cannot be undone.')) {
            return; // User canceled
        }

        // Disable button during deletion
        $button.prop('disabled', true).text('Deleting...');
        // Show a general loader maybe? Find a suitable loader element if one exists.
        // Assuming a loader with ID 'mvp-loader' exists (as seen in playlist_manager.php)
        $('#mvp-loader').show();

        $.ajax({
            url: mvp_import_export_data.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'mvp_delete_playlist',
                // Pass nonce with the key 'security' as expected by check_ajax_referer in mvp_delete_playlist
                security: mvp_import_export_data.security,
                // Pass playlist IDs as comma-separated string as expected by backend
                playlist_id: selectedPlaylists.join(',')
            },
            success: function(response) {
                $('#mvp-loader').hide();
                if (response.success) {
                    alert(response.data.message || selectedPlaylists.length + ' playlist(s) deleted successfully.');
                    // Remove deleted rows from the table visually
                    $.each(selectedPlaylists, function(index, id) {
                         // Find the row using the data attribute and remove it
                         $('tr[data-playlist-id="' + id + '"]').fadeOut(400, function() { $(this).remove(); });
                    });
                     $button.prop('disabled', false).text('Delete selected');
                     // Uncheck the "select all" checkbox if it exists
                     $('.mvp-playlist-all').prop('checked', false);
                } else {
                    // Handle specific errors from the backend
                    var errorMsg = (response.data && response.data.message) ? response.data.message : 'An unknown error occurred during deletion.';
                    alert('Deletion Failed: ' + errorMsg);
                     $button.prop('disabled', false).text('Delete selected');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                 $('#mvp-loader').hide();
                 console.error("Delete AJAX Error:", textStatus, errorThrown, jqXHR.responseText);
                 alert('Deletion Failed: AJAX request error. Status: ' + textStatus + '. Error: ' + errorThrown + '. Check browser console for details.');
                 $button.prop('disabled', false).text('Delete selected');
            },
            complete: function() {
                // Ensure button and loader are reset in case of issues
                 $('#mvp-loader').hide();
                 $button.prop('disabled', false).text('Delete selected');
            }
        }); // End AJAX call
    }); // End Delete Button Click

    // --- Select/Deselect All Checkbox ---
    $('.mvp-playlist-all').on('change', function() {
        var isChecked = $(this).prop('checked');
        $('.mvp-playlist-checkbox').prop('checked', isChecked);
    });

    // --- Uncheck "Select All" if an individual box is unchecked ---
    $('.mvp-playlist-checkbox').on('change', function() {
        if (!$(this).prop('checked')) {
            $('.mvp-playlist-all').prop('checked', false);
        }
        // Optional: check if all are checked again to re-check "select all"
        // else if ($('.mvp-playlist-checkbox:checked').length === $('.mvp-playlist-checkbox').length) {
        //     $('.mvp-playlist-all').prop('checked', true);
        // }
    });


    // --- JSON IMPORT (Existing logic - minor adjustments) ---
    $('#mvp-import-json-form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var form = $(this);
        var formData = new FormData(this); // Use FormData for file uploads
        var statusDiv = $('#mvp-import-status');
        var importButton = $('#mvp-import-json-button');

        statusDiv.removeClass('mvp-notice-success mvp-notice-error').addClass('mvp-notice-info').text('Importing... Please wait.').show();
        importButton.prop('disabled', true);

        $.ajax({
            url: mvp_import_export_data.ajax_url, // Use localized ajax_url
            type: 'POST',
            data: formData,
            processData: false, // Needed for FormData
            contentType: false, // Needed for FormData
            dataType: 'json', // Expect JSON response from the server
            success: function(response) {
                if (response.success) {
                    statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-success').html(response.data.message || 'Import successful. Reloading...'); // Added default message
                    // Reload the page after a short delay to show the imported playlists
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    // Handle errors reported by the server
                    var errorMsg = response.data.message || 'An unknown error occurred during import.';
                    if (response.data.errors && Array.isArray(response.data.errors) && response.data.errors.length > 0) {
                         errorMsg += '<br><strong>Details:</strong><ul>';
                         $.each(response.data.errors, function(i, err) {
                             var errText = (typeof err === 'string' || err instanceof String) ? err : JSON.stringify(err);
                             errorMsg += `<li>${escapeHtml(errText)}</li>`; // Use template literal
                         });
                         errorMsg += '</ul>';
                    }
                    statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error').html('Import Failed: ' + errorMsg);
                    importButton.prop('disabled', false); // Re-enable button on failure
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle AJAX request errors (network issues, server errors not sending JSON)
                var errorMsg = `AJAX Error: ${textStatus} - ${errorThrown}`;
                 if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {
                     errorMsg += `<br>Server Response: ${escapeHtml(jqXHR.responseJSON.data.message)}`;
                 } else if (jqXHR.responseText) {
                    errorMsg += `<br>Raw Server Response: <pre>${escapeHtml(jqXHR.responseText.substring(0, 500))}...</pre>`;
                 }
                statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error').html(`Import Failed: ${errorMsg}`);
                importButton.prop('disabled', false); // Re-enable button on failure
            }
        });
    }); // End Import Form Submit


    // Function to escape HTML for displaying raw server responses safely
    function escapeHtml(text) {
        if (typeof text !== 'string') {
             try { text = String(text); } catch (e) { return '[Unescapable Content]'; }
        }
        var map = {
            '&': '&', // Use named entity
            '<': '<',
            '>': '>',
            '"': '"', // Use named entity
            "'": '&#39;' // Use numeric entity for single quote
        };
        // Ensure the replace function handles potential non-string results safely
        return String(text).replace(/[&<>"']/g, function(m) { return map[m]; });
    }

    // --- LEGACY ZIP IMPORT (Placeholder - Keep if needed) ---
    // Assuming the ZIP import logic is handled by the button click submitting the form,
    // or potentially exists in another JS file (like admin_global.js)
    $('#mvp-import-playlist').on('click', function() {
         // Logic for handling legacy ZIP import would go here if it's AJAX based.
         // If it just submits the form, this click handler might only be needed
         // if you want to add validation before submission.
         console.log('Legacy ZIP Import button clicked. Form submission might be handled separately.');
         // Example: Submit the associated form:
         // $('#mvp-import-playlist-form').submit();
    });

}); // End jQuery Document Ready