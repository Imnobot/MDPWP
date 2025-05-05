jQuery(document).ready(function($) {

    // --- Helper function for delay ---
    function delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
    // --------------------------------

    // Function to sanitize playlist title for use in filename (Seems unused for import/export, keep or remove)
    function sanitizeFilename(name) {
        if (typeof name !== 'string') { name = String(name || 'playlist'); }
        let sanitized = name.replace(/[^a-z0-9_\-\s]/gi, '_').replace(/[\s]+/g, '_');
        return sanitized.substring(0, 100);
    }

    // --- JSON EXPORT (Keep existing code - uses form submission) ---
    $('#mvp-export-json-button').on('click', function(e) {
        e.preventDefault();
        var $button = $(this);
        var selectedPlaylists = [];
        $('.mvp-playlist-checkbox:checked').each(function() { selectedPlaylists.push($(this).val()); });
        if (selectedPlaylists.length === 0) { alert('Please select at least one playlist to export.'); return; }
        $button.prop('disabled', true).text('Preparing Export...');
        var $form = $('<form></form>');
        $form.attr("method", "post").attr("action", mvp_import_export_data.ajax_url).css("display", "none");
        $('<input>').attr({type: 'hidden', name: 'action', value: 'mvp_export_playlists_json'}).appendTo($form);
        $('<input>').attr({type: 'hidden', name: 'nonce', value: mvp_import_export_data.security}).appendTo($form);
        $.each(selectedPlaylists, function(index, playlistId) { $('<input>').attr({type: 'hidden', name: 'playlist_ids[]', value: playlistId}).appendTo($form); });
        $('body').append($form); $form.submit(); $form.remove();
        setTimeout(function() { $button.prop('disabled', false).text('Export Selected (JSON)'); }, 1000);
    });

    // --- Delete Selected Playlists (Keep existing code) ---
    $('#mvp-delete-playlists').on('click', function(e) {
        e.preventDefault();
        var $button = $(this);
        var selectedPlaylists = [];
        $('.mvp-playlist-checkbox:checked').each(function() { selectedPlaylists.push($(this).val()); });
        if (selectedPlaylists.length === 0) { alert('Please select at least one playlist to delete.'); return; }
        if (!confirm('Are you sure you want to delete the selected ' + selectedPlaylists.length + ' playlist(s)? This action cannot be undone.')) { return; }
        $button.prop('disabled', true).text('Deleting...');
        $('#mvp-loader').show();
        $.ajax({
            url: mvp_import_export_data.ajax_url, type: 'POST', dataType: 'json',
            data: { action: 'mvp_delete_playlist', security: mvp_import_export_data.security, playlist_id: selectedPlaylists.join(',') },
            success: function(response) {
                $('#mvp-loader').hide();
                // Using wp_send_json_success/error format now
                if (response.success) {
                    alert(response.data.message || selectedPlaylists.length + ' playlist(s) deleted successfully.');
                    $.each(selectedPlaylists, function(index, id) { $('tr[data-playlist-id="' + id + '"]').fadeOut(400, function() { $(this).remove(); }); });
                    // $button.prop('disabled', false).text('Delete selected'); // Moved to complete
                    $('.mvp-playlist-all').prop('checked', false);
                } else {
                    var errorMsg = (response.data && response.data.message) ? response.data.message : 'An unknown error occurred during deletion.';
                    alert('Deletion Failed: ' + errorMsg);
                    // $button.prop('disabled', false).text('Delete selected'); // Moved to complete
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                 $('#mvp-loader').hide(); console.error("Delete AJAX Error:", textStatus, errorThrown, jqXHR.responseText);
                 alert('Deletion Failed: AJAX request error. Status: ' + textStatus + '. Error: ' + errorThrown + '. Check browser console for details.');
                 // $button.prop('disabled', false).text('Delete selected'); // Moved to complete
            },
            complete: function() {
                $('#mvp-loader').hide();
                $button.prop('disabled', false).text('Delete selected');
            }
        });
    });

    // --- Select/Deselect All Checkbox (Keep existing code) ---
    $('.mvp-playlist-all').on('change', function() { $('.mvp-playlist-checkbox').prop('checked', $(this).prop('checked')); });
    $('.mvp-playlist-checkbox').on('change', function() { if (!$(this).prop('checked')) { $('.mvp-playlist-all').prop('checked', false); } });


    // --- JSON IMPORT (MODIFIED for SEQUENTIAL upload WITH DELAY) ---
    $('#mvp-import-json-form').on('submit', async function(e) { // Keep async
        e.preventDefault();

        var form = $(this);
        var statusDiv = $('#mvp-import-status');
        var importButton = $('#mvp-import-json-button');
        var fileInput = $('#mvp_import_file')[0];

        if (!fileInput.files || fileInput.files.length === 0) {
            statusDiv.removeClass('mvp-notice-success mvp-notice-info').addClass('mvp-notice-error').text('Please select at least one JSON file to import.').show();
            return;
        }

        var files = fileInput.files;
        var totalFiles = files.length;
        var successCount = 0;
        var errorCount = 0;
        var errors = [];
        const importDelay = 3000; // <<<--- Delay in milliseconds (3 seconds)

        statusDiv.removeClass('mvp-notice-success mvp-notice-error').addClass('mvp-notice-info').html(`Starting import of ${totalFiles} file(s)...`).show();
        importButton.prop('disabled', true);

        // --- Process files sequentially using async/await ---
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            // Update status *before* the AJAX call for this file
            statusDiv.append(`<br>Processing file ${i + 1} of ${totalFiles}: ${escapeHtml(file.name)}...`);

            var fileFormData = new FormData();
            fileFormData.append('action', 'mvp_import_playlists_json');
            fileFormData.append('_wpnonce', form.find('input[name="_wpnonce"]').val());
            fileFormData.append('mvp_import_file', file);

            try {
                const response = await $.ajax({
                    url: mvp_import_export_data.ajax_url,
                    type: 'POST',
                    data: fileFormData,
                    processData: false,
                    contentType: false,
                    dataType: 'json'
                });

                // Process the response for this file
                if (response.success) {
                    successCount++;
                    // Update status immediately after success/failure
                    statusDiv.append(` <span style="color:green;">✓ Success</span>` + (response.data.message ? ` (${escapeHtml(response.data.message)})` : ''));
                } else {
                    errorCount++;
                    var errorMsg = response.data.message || 'Unknown error during import.';
                    errors.push({ fileName: file.name, message: errorMsg, details: response.data.errors });
                    statusDiv.append(` <strong style="color:red;">✗ Failed:</strong> ${escapeHtml(errorMsg)}`);
                }

            } catch (jqXHR) {
                errorCount++;
                let errorThrown = jqXHR.statusText || 'Unknown AJAX Error';
                let textStatus = jqXHR.status ? `${jqXHR.status} (${errorThrown})` : errorThrown;
                var ajaxErrorMsg = `AJAX Error: ${textStatus}.`;
                 if (jqXHR.responseText) {
                     ajaxErrorMsg += ` Server response: ${escapeHtml(jqXHR.responseText.substring(0, 150))}${jqXHR.responseText.length > 150 ? '...' : ''}`;
                 }
                errors.push({ fileName: file.name, message: ajaxErrorMsg });
                statusDiv.append(` <strong style="color:red;">✗ Failed (AJAX):</strong> ${escapeHtml(ajaxErrorMsg)}`);
                console.error(`Import AJAX Error for ${file.name}:`, textStatus, errorThrown, jqXHR);
            }

            // *** ADD DELAY HERE ***
            // Only delay if it's NOT the last file
            if (i < files.length - 1) {
                statusDiv.append(` <span style="color: #888;">(Waiting ${importDelay / 1000}s...)</span>`); // Indicate waiting
                await delay(importDelay); // Wait for the specified time
            }
            // **********************

        } // --- End sequential loop ---

        // --- Final status update ---
        statusDiv.append('<hr><strong>Import process finished.</strong>');
        statusDiv.append(`<br>Successfully imported: ${successCount} file(s).`);
        statusDiv.append(`<br>Failed/Skipped: ${errorCount} file(s).`);

        if (errorCount > 0) {
            statusDiv.append('<br><strong>Error Details:</strong><ul>');
            $.each(errors, function(idx, err) { // Changed index variable to idx
                var detailHtml = err.details && Array.isArray(err.details) ? `<ul>${err.details.map(d => `<li>${escapeHtml(d)}</li>`).join('')}</ul>` : '';
                statusDiv.append(`<li><strong>${escapeHtml(err.fileName)}:</strong> ${escapeHtml(err.message)}${detailHtml}</li>`);
            });
            statusDiv.append('</ul>');
            statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error');
        } else if (successCount > 0) {
             statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-success');
        } else {
            statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error');
        }

         importButton.prop('disabled', false);

        if (successCount > 0) {
            statusDiv.append('<br>Reloading page to reflect changes...');
            setTimeout(function() {
                location.reload();
            }, 3000);
        }

    }); // End Import Form Submit


    // Function to escape HTML for displaying raw server responses safely
    function escapeHtml(text) {
        if (typeof text !== 'string') { try { text = String(text); } catch (e) { return '[Unescapable Content]'; } }
        var map = { '&': '&', '<': '<', '>': '>', '"': '"', "'": '&#39;' };
        return String(text).replace(/[&<>"']/g, function(m) { return map[m]; });
    }

}); // End jQuery Document Ready