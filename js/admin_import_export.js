jQuery(document).ready(function($) {

    // --- JSON EXPORT ---
    $('#mvp-export-json-button').on('click', function(e) {
        e.preventDefault(); // Prevent default button behavior

        var selectedPlaylists = [];
        $('.mvp-playlist-checkbox:checked').each(function() {
            selectedPlaylists.push($(this).val());
        });

        if (selectedPlaylists.length === 0) {
            alert('Please select at least one playlist to export.');
            return;
        }

        // Use a hidden form submission to trigger the download
        $('#mvp-export-temp-form').remove();

        var form = $('<form>', {
            'id': 'mvp-export-temp-form',
            'method': 'POST',
            'action': mvp_import_export_data.ajax_url
        }).appendTo('body');

        $('<input>').attr({ type: 'hidden', name: 'action', value: 'mvp_export_playlists_json' }).appendTo(form);
        $('<input>').attr({ type: 'hidden', name: 'nonce', value: mvp_import_export_data.security }).appendTo(form);

        $.each(selectedPlaylists, function(index, value) {
            $('<input>').attr({ type: 'hidden', name: 'playlist_ids[]', value: value }).appendTo(form);
        });

        form.submit();

        setTimeout(function() {
            form.remove();
        }, 500);

    });

    // --- JSON IMPORT ---
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
                    statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-success').html(response.data.message);
                    // Reload the page after a short delay to show the imported playlists
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    // Handle errors reported by the server
                    var errorMsg = response.data.message || 'An unknown error occurred.';
                    if (response.data.errors && response.data.errors.length > 0) {
                         errorMsg += '<br><strong>Details:</strong><ul>';
                         $.each(response.data.errors, function(i, err) {
                             var errText = (typeof err === 'string' || err instanceof String) ? err : JSON.stringify(err);
                             // Use template literal for list item
                             errorMsg += `<li>${escapeHtml(errText)}</li>`;
                         });
                         errorMsg += '</ul>';
                    }
                    statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error').html('Import Failed: ' + errorMsg); // No change needed here, errorMsg built above
                    importButton.prop('disabled', false);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle AJAX request errors (network issues, server errors not sending JSON)
                // ** Use template literal for the main error message construction **
                var errorMsg = `AJAX Error: ${textStatus} - ${errorThrown}`;
                 if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {
                     // ** Use template literal here **
                     errorMsg += `<br>Server Response: ${escapeHtml(jqXHR.responseJSON.data.message)}`;
                 } else if (jqXHR.responseText) {
                    // ** Use template literal here (This was likely line 113) **
                    errorMsg += `<br>Raw Server Response: <pre>${escapeHtml(jqXHR.responseText.substring(0, 500))}...</pre>`;
                 }
                statusDiv.removeClass('mvp-notice-info').addClass('mvp-notice-error').html(`Import Failed: ${errorMsg}`); // Use template literal
                importButton.prop('disabled', false);
            }
        });
    });

    // Function to escape HTML for displaying raw server responses safely
    function escapeHtml(text) {
        if (typeof text !== 'string') {
             try { text = String(text); } catch (e) { return '[Unescapable Content]'; }
        }
        // Correct mappings for HTML entities
        var map = {
            '&': '&',
            '<': '<',
            '>': '>',
            '"': '"',
            "'": '&#039;' // Use HTML entity for single quo
        };
        // Ensure the replace function handles potential non-string results safely
        return String(text).replace(/[&<>"']/g, function(m) { return map[m]; });
    }

});