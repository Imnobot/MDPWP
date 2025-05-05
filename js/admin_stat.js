jQuery(document).ready(function($) {

    "use strict"

    // --- Variable Definitions ---
    var preloader = $('#mvp-loader').show(),
        _body = $('body'),
        _doc = $(document),
        statWrap = $('#mvp-stat-wrap'),
        mediaItemList = $('#media-item-list'),
        mvp_translate = $('#mvp-translate'),
        statTableHeader = $('.stat-table-header'),
        statListTable = $('#mvp-stat-list');

    var selectedPlaylistId = null;
    var currentGraphs = {}; // For individual media graphs { mediaId: chartInstance }
    var totalPlaysChartInstance = null; // *** ADDED: To track the total plays chart instance ***

    // --- Initialize Playlist Dropdown (Selectize) ---
    var statsPlaylistListSelectize = $('#mvp-stats-playlist-list').selectize({
        onInitialize: function() { /* Placeholder */ },
        onChange: function(value, isOnInitialize) {
            if (value) {
                selectedPlaylistId = value;
                 if (!isOnInitialize && initialLoadDone) {
                    loadStats('playlist', value);
                    insertParam('playlist_id', value === '-1' ? null : value);
                 }
            }
        }
    })[0].selectize;

    // --- Initial Load Logic (Check URL Params) ---
    var urlParams = getUrlParameter();
    var initialLoadDone = false;

    if (urlParams.playlist_id && statsPlaylistListSelectize.options.hasOwnProperty(urlParams.playlist_id)) {
        statsPlaylistListSelectize.setValue(urlParams.playlist_id, true);
        selectedPlaylistId = urlParams.playlist_id;
        loadStats('playlist', selectedPlaylistId);
    } else {
         selectedPlaylistId = statsPlaylistListSelectize.getValue();
         if (selectedPlaylistId) {
            loadStats('playlist', selectedPlaylistId);
         } else {
             preloader.hide();
             console.warn("No initial playlist selected or found.");
         }
    }
    initialLoadDone = true;


    // --- Function to Load Statistics Data via AJAX ---
    function loadStats(type, pid){
        console.log('loadStats called for type:', type, 'ID:', pid);
        preloader.show();

        var postData = [
            {name: 'action', value: 'mvp_get_stat_data'}, {name: 'type', value: type},
            {name: 'type_id', value: pid}, {name: 'security', value: mvp_data.security}
        ];

        $.ajax({ url: mvp_data.ajax_url, type: 'post', data: postData, dataType: 'json',
        }).done(function(r){
            console.log("Stats Data Received:", r);

            if (!r || !r.results || !Array.isArray(r.results)) {
                 console.error("Invalid or missing 'results' array in AJAX response:", r);
                 preloader.hide();
                 mediaItemList.find('.mvp-stat-row:not(.media-item-container-hidden)').remove();
                 mediaItemList.append('<tr><td colspan="8">' + escapeHtml(mvp_translate.attr('data-no-results') || 'Error: Invalid data received.') + '</td></tr>');
                 $('.mvp-stats-total-value').text('0');
                 $('.top-box-content').empty().append('<div class="mvp-stat-no-data"><p>' + escapeHtml(mvp_translate.attr('data-no-results') || 'Data Not Available') + '</p></div>');
                 $('.top-box-content-total-value').text('0');
                 $('.mvp-stat-no-data').removeClass('mvp-stat-hidden');
                 $('.inline-stat-table tbody').empty();
                 $('.inline-stat-table').addClass('inline-stat-table-hidden');
                 // Clear total graph canvas if data is invalid
                 var canvas = $('.mvp-stats-total-grap-canvas')[0];
                 if (canvas) {
                    // *** Destroy existing total plays chart if it exists ***
                    if (totalPlaysChartInstance) {
                        totalPlaysChartInstance.destroy();
                        totalPlaysChartInstance = null;
                    }
                    var ctx = canvas.getContext('2d');
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                 }
                 return;
            }

            var response = r.results;
            var mi_template = mediaItemList.find('.media-item-container-hidden');
            mediaItemList.find('.mvp-stat-row:not(.media-item-container-hidden)').remove();
            mediaItemList.find('.mvp-stat-graph-holder-row').remove();
            currentGraphs = {};

            if(response && response.length) {
                var i, len = response.length, obj, media_item;
                for(i = 0; i < len; i++){
                    obj = response[i];
                    if(obj.media_title !== undefined && obj.media_title !== null){
                        media_item = mi_template.clone().removeClass('media-item-container-hidden mvp-pagination-hidden');
                        media_item.find('.media-title').text(obj.media_title || '');
                        media_item.find('.media-playlist-title').text(obj.playlist_title || 'N/A');
                        media_item.find('.media-duration').text(obj.total_time || '0');
                        media_item.find('.media-time').text(convertTime(obj.total_time || 0));
                        media_item.find('.media-play').text(nFormatter(parseInt(obj.total_play || 0, 10), 1));
                        media_item.find('.media-download').text(nFormatter(parseInt(obj.total_download || 0, 10), 1));
                        media_item.find('.media-finish').text(nFormatter(parseInt(obj.total_finish || 0, 10), 1));
                        media_item.attr('data-media-id', obj.media_id || '');
                        media_item.attr('data-title', obj.media_title || '');
                        media_item.data('media_title', (obj.media_title || '').toLowerCase());
                        media_item.data('playlist_title', (obj.playlist_title || '').toLowerCase());
                        media_item.data('total_time', parseInt(obj.total_time || 0, 10));
                        media_item.data('total_play', parseInt(obj.total_play || 0, 10));
                        media_item.data('total_download', parseInt(obj.total_download || 0, 10));
                        media_item.data('total_finish', parseInt(obj.total_finish || 0, 10));
                        media_item.appendTo(mediaItemList);
                    } else { console.warn("Skipping stats row due to missing media_title:", obj); }
                }
            } else { mediaItemList.append('<tr><td colspan="8">' + escapeHtml(mvp_translate.attr('data-no-results') || 'No statistics data found.') + '</td></tr>'); }

            statTableHeader.find('.mvp-sort-field').attr('data-asc', 'false');
            setSortIndicator('media_title', false);

            var total = r.total || {};
            $('.mvp-stats-total-time').text(convertTime(total.c_time || 0));
            $('.mvp-stats-total-play').text(nFormatter(parseInt(total.c_play || 0, 10), 1));
            $('.mvp-stats-total-download').text(nFormatter(parseInt(total.c_download || 0, 10), 1));
            $('.mvp-stats-total-finish').text(nFormatter(parseInt(total.c_finish || 0, 10), 1));

            getBox(r.top_day, $('.mvp-box-top-play-day')); getGrandTotal(r.top_day, $('.mvp-box-top-play-day'));
            getBox(r.top_week, $('.mvp-box-top-play-week')); getGrandTotal(r.top_week, $('.mvp-box-top-play-week'));
            getBox(r.top_month, $('.mvp-box-top-play-month')); getGrandTotal(r.top_month, $('.mvp-box-top-play-month'));
            getBox(r.top_plays, $('.mvp-box-top-play-all-time')); getGrandTotal(r.top_plays, $('.mvp-box-top-play-all-time'));
            getBox(r.top_downloads, $('.mvp-box-top-download-all-time')); getGrandTotal(r.top_downloads, $('.mvp-box-top-download-all-time'));
            getBox(r.top_finish, $('.mvp-box-top-finish-all-time')); getGrandTotal(r.top_finish, $('.mvp-box-top-finish-all-time'));
            getBox2(r.top_plays_country, $('.mvp-box-top-plays-country-all-time')); getGrandTotal(r.top_plays_country, $('.mvp-box-top-plays-country-all-time'));
            getBox3(r.top_plays_user, $('.mvp-box-top-plays-user-all-time')); getGrandTotal(r.top_plays_user, $('.mvp-box-top-plays-user-all-time'));

            makeTotalGraph(r.top_day_grand_total); // Call the function here

            preloader.hide();
            initPagination();

        }).fail(function(jqXHR, textStatus, errorThrown) { /* ... error handling ... */
             console.error("AJAX Error loading stats:", jqXHR.responseText, textStatus, errorThrown); preloader.hide();
             mediaItemList.find('.mvp-stat-row:not(.media-item-container-hidden)').remove();
             mediaItemList.append('<tr><td colspan="8">Error loading statistics data. Please try again later.</td></tr>');
        });
    }

    // --- Function to Update Grand Total Display ---
    function getGrandTotal(arr, box){ /* ... function code ... */
        var i, len = (arr || []).length, obj, gt = 0;
        for(i = 0; i < len; i++){ obj = arr[i]; gt += parseInt(obj.total_count || 0, 10); }
        var $totalValueElement = box.find('.top-box-content-total-value');
        if ($totalValueElement.length) { $totalValueElement.text(nFormatter(gt, 1)); }
        box.find('.top-box-content-total').toggle(gt > 0);
     }

    // --- Function to Populate Top List Boxes (Plays, Downloads, Finishes) ---
    function getBox(arr, box){ /* ... function code ... */
        var contentBox = box.find('.top-box-content'); contentBox.find('.mvp-top-stat-list').remove();
        var noDataBox = box.find('.mvp-stat-no-data'); var createPlaylistBtn = box.find('.mvp-create-playlist-from-stat');
        noDataBox.addClass('mvp-stat-hidden'); createPlaylistBtn.addClass('mvp-stat-hidden').removeAttr('data-media-id');
        if(arr && arr.length){
            var ids = []; var s = '<ol class="mvp-top-stat-list">'; var i, len = arr.length, obj;
            for(i = 0; i < len; i++){
                obj = arr[i]; if(obj.media_id !== undefined && obj.media_id !== null && ids.indexOf(obj.media_id) === -1) { ids.push(obj.media_id); }
                var displayTitle = ''; if(obj.media_title) { displayTitle += '<b>' + escapeHtml(obj.media_title) + '</b>'; }
                 if(obj.playlist_title && obj.playlist_title !== obj.media_title) { displayTitle += ' <i>(' + escapeHtml(obj.playlist_title) + ')</i>'; }
                 else if (obj.playlist_title && !obj.media_title) { displayTitle += '<b>' + escapeHtml(obj.playlist_title) + '</b>'; }
                if (!displayTitle && obj.media_id !== undefined) { displayTitle = '<i>(Media ID: ' + obj.media_id + ')</i>'; } else if (!displayTitle) { displayTitle = '<i>(Unknown)</i>'; }
                s += '<li>' + displayTitle + '<span class="mvp-stat-info"> (' + nFormatter(parseInt(obj.total_count || 0, 10), 1) + ')</span></li>';
            }
            s += '</ol>'; contentBox.append(s);
            if (ids.length > 0) { var top_id_string = ids.join('_'); createPlaylistBtn.removeClass('mvp-stat-hidden').attr('data-media-id', top_id_string); }
        } else { noDataBox.removeClass('mvp-stat-hidden'); }
    }

    // --- Function to Populate Top Country Box ---
    function getBox2(arr, box){ /* ... function code ... */
        var tbody = box.find('.inline-stat-table tbody'); tbody.empty(); var noDataBox = box.find('.mvp-stat-no-data'); var table = box.find('.inline-stat-table');
        noDataBox.addClass('mvp-stat-hidden'); table.addClass('inline-stat-table-hidden');
        if(arr && arr.length){
            var i, len = arr.length, obj, s = '';
            for(i = 0; i < len; i++){ obj = arr[i]; s += '<tr><td>' + escapeHtml(obj.country || 'N/A') + (obj.country_code ? ' (' + escapeHtml(obj.country_code) + ')' : '') + '</td><td>' + escapeHtml(obj.continent || 'N/A') +'</td><td>' + nFormatter(parseInt(obj.total_count || 0, 10), 1) + '</td><td>' + convertTime(obj.c_time || 0) + '</td></tr>'; }
            tbody.html(s); table.removeClass('inline-stat-table-hidden');
        } else { noDataBox.removeClass('mvp-stat-hidden'); }
    }

    // --- Function to Populate Top User Box ---
    function getBox3(arr, box){ /* ... function code ... */
        var tbody = box.find('.inline-stat-table tbody'); tbody.empty(); var noDataBox = box.find('.mvp-stat-no-data'); var table = box.find('.inline-stat-table');
        noDataBox.addClass('mvp-stat-hidden'); table.addClass('inline-stat-table-hidden');
        if(arr && arr.length){
            var i, len = arr.length, obj, s = '';
            for(i = 0; i <len; i++){ obj = arr[i]; var userName = obj.user_display_name || 'N/A'; var userRole = obj.user_role || 'N/A'; var statsUserId = obj.user_stat_id || '';
                s += '<tr><td><a href="#" class="mvp-user-id" data-user-id="' + escapeHtml(statsUserId) + '" title="' + escapeHtml(mvp_translate.attr('data-view-detail') || 'View details') + '">' + escapeHtml(userName) + '</a></td><td>' + escapeHtml(userRole) + '</td><td>' + nFormatter(parseInt(obj.total_count || 0, 10), 1) + '</td><td>' + convertTime(obj.c_time || 0) + '</td></tr>';
            }
            tbody.html(s); table.removeClass('inline-stat-table-hidden');
        } else { noDataBox.removeClass('mvp-stat-hidden'); }
    }

    // --- User Details Modal Trigger (Event Delegation) ---
    statWrap.on('click', '.mvp-user-id', function(e){ /* ... function code ... */
         e.preventDefault(); var user_id_from_stat_table = $(this).data('user-id');
         if (!user_id_from_stat_table) { console.error("User ID missing."); return; }
         preloader.show(); var postData = [ {name: 'action', value: 'mvp_get_stat_user_data'}, {name: 'user_id', value: user_id_from_stat_table}, {name: 'security', value: mvp_data.security} ];
         $.ajax({ url: mvp_data.ajax_url, type: 'post', data: postData, dataType: 'json', }).done(function(arr){
             var modalTbody = userDataModal.find('.inline-stat-table tbody'); modalTbody.empty(); var userName = 'User Details'; var userRole = '';
             if(arr && arr.length){
                 var i, len = arr.length, obj, s = ''; if (arr[0].user_display_name) userName = arr[0].user_display_name; if (arr[0].user_role) userRole = arr[0].user_role;
                 for(i = 0; i < len; i++){ obj = arr[i]; s += '<tr><td>' + escapeHtml(obj.media_title || 'N/A') + (obj.playlist_title ? ' <i>(' + escapeHtml(obj.playlist_title) + ')</i>' : '') + '</td><td>' + nFormatter(parseInt(obj.total_count || 0, 10), 1) + '</td><td>' + convertTime(obj.c_time || 0) + '</td></tr>'; }
                 modalTbody.html(s); userDataModal.find('.inline-stat-table').removeClass('inline-stat-table-hidden');
             } else { modalTbody.html('<tr><td colspan="3">' + escapeHtml(mvp_translate.attr('data-no-results') || 'No playback data.') + '</td></tr>'); userDataModal.find('.inline-stat-table').removeClass('inline-stat-table-hidden'); }
             var modalTitle = escapeHtml(userName) + (userRole ? ' (' + escapeHtml(userRole) + ')' : ''); userDataModal.find('.user-data-modal-title').html(modalTitle);
             showUserDataModal(); preloader.hide();
         }).fail(function(jqXHR, textStatus, errorThrown) { console.error("AJAX Error user details:", jqXHR.responseText); removeUserDataModal(); preloader.hide(); alert("Error loading user details."); });
    });

    // --- User Data Modal Functions ---
    var userDataModal = $('#mvp-user-data-modal'), userDataModalBg = userDataModal.find('.mvp-modal-bg');
    userDataModalBg.on('click',function(e){ if(e.target === this) removeUserDataModal(); });
    $('#mvp-user-data-close').on('click', removeUserDataModal);
    _doc.on('keyup.mvpUserDataModal', function(e) { if (e.key === "Escape" && userDataModal.is(':visible')) removeUserDataModal(); });
    function removeUserDataModal(){ userDataModal.hide(); }
    function showUserDataModal(){ userDataModal.show(); userDataModal.find('.mvp-modal-inner').scrollTop(0); }

    // --- Pagination Logic ---
    var paginationPerPageNum = $('#mvp-pag-per-page-num'), paginationWrap = $('.mvp-pagination-wrap'), paginationContainer = $('.mvp-media-pagination-container'), paginationArr = [], paginationCurrentPage = 0, paginationPerPage = 10, paginationTotalPages = 0, paginationInited = false;
    if(localStorage && localStorage.getItem('mvp_stat_media_paginaton_per_page')){ var savedPerPage = parseInt(localStorage.getItem('mvp_stat_media_paginaton_per_page'), 10); if (!isNaN(savedPerPage) && savedPerPage > 0) { paginationPerPage = savedPerPage; paginationPerPageNum.val(paginationPerPage); } }
    function updatePagination(jump_to_last_page){ paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage); if (jump_to_last_page) { paginationCurrentPage = Math.max(0, paginationTotalPages - 1); } else { paginationCurrentPage = Math.max(0, Math.min(paginationCurrentPage, paginationTotalPages - 1)); } createPaginationBtn(paginationCurrentPage); showPaginationTracks(); }
    function initPagination(){ paginationArr = []; paginationCurrentPage = 0; mediaItemList.find('.media-item:not(.media-item-container-hidden)').each(function(index){ paginationArr.push($(this).data('id', index)); }); paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage); createPaginationBtn(paginationCurrentPage); showPaginationTracks(); paginationContainer.toggle(paginationTotalPages > 1); }
    $('#mvp-pag-per-page-btn').on('click', function(){ var newPerPage = parseInt(paginationPerPageNum.val(), 10); if(isNaN(newPerPage) || newPerPage <= 0){ alert("Please enter a valid number > 0."); paginationPerPageNum.focus(); return; } paginationPerPage = newPerPage; if(localStorage) localStorage.setItem('mvp_stat_media_paginaton_per_page', paginationPerPage); paginationCurrentPage = 0; updatePagination(); });
    function showPaginationTracks(){ mediaItemList.find('.media-item:not(.media-item-container-hidden)').addClass('mvp-pagination-hidden'); if (paginationArr.length === 0) return; var startIndex = paginationCurrentPage * paginationPerPage; var endIndex = Math.min(startIndex + paginationPerPage, paginationArr.length); for(var i = startIndex; i < endIndex; i++){ if (paginationArr[i] && paginationArr[i].length) { paginationArr[i].removeClass('mvp-pagination-hidden'); } } }
    function createPaginationBtn(currentPageIndex){ /* ... pagination button creation logic (same as before) ... */
        paginationWrap.empty(); if (paginationTotalPages <= 1) { paginationContainer.hide(); return; } paginationContainer.show(); var currentPageNum = currentPageIndex + 1; var html = '<div class="mvp-pagination-container">'; if (currentPageIndex > 0) { html += '<button type="button" class="mvp-pagination-page mvp-pagination-first button button-small" data-page-id="0" title="First">First</button>'; html += '<button type="button" class="mvp-pagination-page mvp-pagination-prev button button-small" data-page-id="' + (currentPageIndex - 1) + '" title="Previous">Prev</button>'; } var startPage = Math.max(0, currentPageIndex - 1); var endPage = Math.min(paginationTotalPages - 1, currentPageIndex + 1); if (startPage > 0) { html += '<button type="button" class="mvp-pagination-page button button-small" data-page-id="0">1</button>'; if (startPage > 1) html += '<span class="mvp-pagination-ellipsis">...</span>'; } for (var i = startPage; i <= endPage; i++) { var pageNum = i + 1; var currentClass = (i === currentPageIndex) ? ' mvp-pagination-currentpage button-primary' : ' button-secondary'; html += '<button type="button" class="mvp-pagination-page button button-small' + currentClass + '" data-page-id="' + i + '">' + pageNum + '</button>'; } if (endPage < paginationTotalPages - 1) { if (endPage < paginationTotalPages - 2) html += '<span class="mvp-pagination-ellipsis">...</span>'; html += '<button type="button" class="mvp-pagination-page button button-small" data-page-id="' + (paginationTotalPages - 1) + '">' + paginationTotalPages + '</button>'; } if (currentPageIndex < paginationTotalPages - 1) { html += '<button type="button" class="mvp-pagination-page mvp-pagination-next button button-small" data-page-id="' + (currentPageIndex + 1) + '" title="Next">Next</button>'; html += '<button type="button" class="mvp-pagination-page mvp-pagination-last button button-small" data-page-id="' + (paginationTotalPages - 1) + '" title="Last">Last</button>'; } html += '</div>'; html += '<div class="mvp-pagination-total">Page ' + currentPageNum + ' of ' + paginationTotalPages + ' (' + paginationArr.length + ' items)</div>'; paginationWrap.html(html);
        if (!paginationInited) { paginationInited = true; paginationWrap.on('click', '.mvp-pagination-page:not(.mvp-pagination-currentpage)', function() { var $button = $(this); if ($button.is(':disabled')) return; var newPageIndex = parseInt($button.data('page-id'), 10); if (!isNaN(newPageIndex) && newPageIndex >= 0 && newPageIndex < paginationTotalPages) { paginationCurrentPage = newPageIndex; createPaginationBtn(paginationCurrentPage); showPaginationTracks(); } }); }
     }

    // --- Sorting Logic ---
    statTableHeader.on('click', '.mvp-sort-field', function(e){ /* ... sorting logic (same as before) ... */
        e.preventDefault(); var btn = $(this); var sortType = btn.data('type'); if (!sortType) return; var isAsc = btn.attr('data-asc') !== 'true';
        paginationArr.sort(function(a, b) { var valA = a.data(sortType); var valB = b.data(sortType); var comparison = 0; if (typeof valA === 'number' && typeof valB === 'number') { comparison = valA - valB; } else { valA = String(valA || ''); valB = String(valB || ''); comparison = valA.localeCompare(valB); } return isAsc ? comparison : -comparison; });
        mediaItemList.append(paginationArr);
        mediaItemList.find('.mvp-stat-graph-holder-row').each(function(){ var $graphRow = $(this); var parentId = $graphRow.data('parent-id'); var $parentRow = mediaItemList.find('.mvp-stat-row[data-media-id="' + parentId + '"]'); if ($parentRow.length) { $parentRow.after($graphRow); } else { $graphRow.remove(); } });
        statTableHeader.find('.mvp-sort-field').attr('data-asc', 'false'); btn.attr('data-asc', String(isAsc)); setSortIndicator(sortType, isAsc);
        paginationCurrentPage = 0; updatePagination();
     });

    // Updates the visual sort indicators (arrows)
    function setSortIndicator(type, isAsc){ /* ... function code ... */
        statTableHeader.find('.mvp-triangle-dir').hide(); var header = statTableHeader.find('.mvp-sort-field[data-type="' + type + '"]'); if (isAsc) { header.find('.mvp-triangle-dir-up').show(); } else { header.find('.mvp-triangle-dir-down').show(); } statTableHeader.find('.mvp-triangle-dir-wrap').hide(); header.find('.mvp-triangle-dir-wrap').show();
     }

    // --- Search/Filter Logic ---
    var mediaFilterTimeout;
    $('#mvp-filter-media').on('keyup.mvpFilter', function() { /* ... filter logic (same as before) ... */
        clearTimeout(mediaFilterTimeout); var $input = $(this);
        mediaFilterTimeout = setTimeout(function() {
            var value = $input.val().trim().toLowerCase();
            if (paginationArr.length === 0 || !mediaItemList.find('.media-item:not(.media-item-container-hidden)').first().is(paginationArr[0])) { paginationArr = mediaItemList.find('.media-item:not(.media-item-container-hidden)').toArray().map(function(el, index) { return $(el).data('id', index); }); }
            if (value === '') { mediaItemList.find('.media-item.mvp-filter-hidden').removeClass('mvp-filter-hidden'); initPagination(); }
            else { paginationContainer.hide(); paginationWrap.empty(); var visibleItems = 0;
                paginationArr.forEach(function($item) { var mediaTitle = $item.data('media_title') || ''; var playlistTitle = $item.data('playlist_title') || ''; var isMatch = mediaTitle.indexOf(value) > -1 || playlistTitle.indexOf(value) > -1; $item.toggleClass('mvp-filter-hidden', !isMatch).removeClass('mvp-pagination-hidden'); if (isMatch) visibleItems++; });
                 mediaItemList.find('.mvp-filter-no-results').remove(); if (visibleItems === 0) { mediaItemList.append('<tr class="mvp-filter-no-results"><td colspan="8">No media found.</td></tr>'); }
            }
        }, 250);
     });

    // --- Total Plays Graph Function Definition --- (Placed before graph creation logic)
    function makeTotalGraph(arr){ // arr = r.top_day_grand_total
        var canvas = $('.mvp-stats-total-grap-canvas')[0];
        if (!canvas || !arr) { console.warn("Canvas or data missing for total graph."); return; }

        // *** Destroy existing chart instance if it exists ***
        if (totalPlaysChartInstance) {
            totalPlaysChartInstance.destroy();
            totalPlaysChartInstance = null; // Clear the reference
        }
        // ***

        // Clear canvas explicitly (good practice)
        var ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        if (!Array.isArray(arr) || arr.length === 0) {
             console.log("No data provided for total graph.");
             // Optionally display a message on the canvas area
             return;
        }

        var dates = [];
        var plays = [];
        var i, len = arr.length, obj;

        for(i = 0; i < len; i++){
            obj = arr[i];
            if (obj.stat_day && obj.total_count !== undefined && obj.total_count !== null) {
                 dates.push(obj.stat_day);
                 plays.push(parseInt(obj.total_count, 10) || 0);
            }
        }

        if (dates.length === 0) { console.log("No valid data points for total graph."); return; }

        var _dates_display = [];
        var _plays_aligned = [];

        // Use Moment.js if available (ensure it's loaded)
        if (typeof moment === 'function') {
            var startDate = moment.min(dates.map(d => moment(d)));
            var endDate = moment(); // Today

            for (var m = moment(startDate); m.isSameOrBefore(endDate, 'day'); m.add(1, 'days')) {
                var currentDayStr = m.format('YYYY-MM-DD');
                var displayLabel = m.format('MMM D');
                _dates_display.push(displayLabel);
                var dataIndex = dates.indexOf(currentDayStr);
                _plays_aligned.push(dataIndex > -1 ? plays[dataIndex] : 0);
            }
        } else {
            // Basic fallback if Moment.js is not available (less robust date handling)
            console.warn("Moment.js not found, using basic date handling for total graph.");
            // This basic fallback might not correctly align dates if data is sparse
            _dates_display = dates; // Use original dates as labels (might not be contiguous)
            _plays_aligned = plays;
        }

         var finalDatasets = [{
            label: escapeHtml(mvp_translate.attr('data-total-plays-label') || 'Total plays per day'),
            borderColor: "#00BFFF",
            backgroundColor: "rgba(0, 191, 255, 0.2)",
            pointBackgroundColor: "#55bae7",
            borderWidth: 1,
            fill: true,
            data: _plays_aligned
        }];

        // *** Store the new chart instance ***
        totalPlaysChartInstance = new Chart(ctx, { // Assign to the variable
            type: 'line',
            data: { labels: _dates_display, datasets: finalDatasets },
            options: { maintainAspectRatio: false, responsive: true, elements: { line: { tension: 0.1 } }, scales: { yAxes: [{ ticks: { precision: 0, beginAtZero: true } }], xAxes: [{ ticks: { /* autoSkip options */ } }] }, tooltips: { mode: 'index', intersect: false } },
        });
    }
    // --- END makeTotalGraph ---

    // --- Graph Logic (Individual Media) ---
    var creatingGraph, graphOptions = $('#mvp-stat-graph-options');
    // currentGraphs defined earlier

    $('#graph-options-btn').on('click', function(){ graphOptions.toggle(); });

    mediaItemList.on('click', '.mvp-stat-create-graph', function(e){ /* ... create individual graph logic ... */
         e.preventDefault(); if(creatingGraph) return; creatingGraph = true; preloader.show();
         var createGraphBtn = $(this); var row = createGraphBtn.closest('.mvp-stat-row'); var mediaId = row.data('media-id'); var mediaTitle = row.attr('data-title');
         if (currentGraphs[mediaId]) { currentGraphs[mediaId].destroy(); delete currentGraphs[mediaId]; mediaItemList.find('.mvp-stat-graph-holder-row[data-parent-id="' + mediaId + '"]').remove(); }
         var graphType = graphOptions.find('.graph-type:checked').val() || 'bar'; var dataDisplay = graphOptions.find('.graph-data-display:checked').map(function() { return this.value; }).get(); var returnDays = parseInt(graphOptions.find('.graph-return-days').val(), 10) || 7;
         if(dataDisplay.length === 0){ alert("Select data type(s)."); preloader.hide(); creatingGraph = false; return; }
         var postData = [ {name: 'action', value: 'mvp_stat_create_graph'}, {name: 'media_id', value: mediaId}, {name: 'title', value: mediaTitle}, {name: 'data_display', value: JSON.stringify(dataDisplay)}, {name: 'return_days', value: returnDays}, {name: 'security', value: mvp_data.security} ];
         $.ajax({ url: mvp_data.ajax_url, type: 'post', data: postData, dataType: 'json', }).done(function(response){
             if (!response || !Array.isArray(response)) { console.error("Invalid graph data:", response); alert('Error (Invalid data)'); preloader.hide(); creatingGraph = false; return; }
             var date_options = { year: 'numeric', month: 'short', day: 'numeric' }; var labels = []; var datasets_data = {}; dataDisplay.forEach(function(key) { datasets_data[key] = []; }); var responseDataMap = {}; response.forEach(function(item) { if (item.c_date) responseDataMap[item.c_date] = item; });
             var today = new Date(); for(var i = 0; i < returnDays; i++){ var currentDate = new Date(today); currentDate.setDate(today.getDate() - i); var formattedDateKey = formatDate(currentDate); var displayLabel = currentDate.toLocaleDateString("en-US", date_options); labels.push(displayLabel); var dataPoint = responseDataMap[formattedDateKey]; dataDisplay.forEach(function(key) { datasets_data[key].push(dataPoint && dataPoint[key] ? parseInt(dataPoint[key], 10) : 0); }); } labels.reverse(); dataDisplay.forEach(function(key) { datasets_data[key].reverse(); });
             var datasetColors = { c_play: { bg: "rgba(0, 191, 255, 0.6)", border: "#009ACD" }, c_download: { bg: "rgba(218, 112, 214, 0.6)", border: "#BA55D3" }, c_finish: { bg: "rgba(89, 171, 95, 0.6)", border: "#3f8f4f" } }; var finalDatasets = []; dataDisplay.forEach(function(key) { if (datasets_data[key]) { finalDatasets.push({ label: key.replace('c_', '').charAt(0).toUpperCase() + key.slice(3), data: datasets_data[key], backgroundColor: datasetColors[key] ? datasetColors[key].bg : 'rgba(204, 204, 204, 0.6)', borderColor: datasetColors[key] ? datasetColors[key].border : '#999999', borderWidth: 1, fill: graphType !== 'line' }); } });
             var graph_holder_html = '<tr class="mvp-stat-graph-holder-row" data-parent-id="' + mediaId + '"><td class="mvp-stat-graph-holder" colspan="8"><canvas class="mvp-stat-graph-canvas" style="height: 150px; width: 100%;"></canvas></td></tr>'; var $graph_holder_row = $(graph_holder_html); row.after($graph_holder_row);
             var ctx = $graph_holder_row.find('.mvp-stat-graph-canvas')[0].getContext('2d'); var newChart = new Chart(ctx, { type: graphType, data: { labels: labels, datasets: finalDatasets }, options: { maintainAspectRatio: false, responsive: true, scales: { yAxes: [{ ticks: { precision: 0, beginAtZero: true, padding: 5 } }], xAxes: [{ ticks: {} }] }, tooltips: { mode: 'index', intersect: false }, hover: { mode: 'nearest', intersect: true }, legend: { display: finalDatasets.length > 1 } } });
             currentGraphs[mediaId] = newChart; createGraphBtn.hide(); row.find('.mvp-stat-remove-graph').show(); preloader.hide(); creatingGraph = false;
         }).fail(function(jqXHR, textStatus, errorThrown) { /* ... error handling ... */ console.error("AJAX Error creating graph:", jqXHR.responseText); preloader.hide(); creatingGraph = false; alert(escapeHtml(mvp_translate.attr('data-create-graph-error') || 'Error creating graph.')); });
     });

    mediaItemList.on('click', '.mvp-stat-remove-graph', function(e){ /* ... remove individual graph logic ... */
         e.preventDefault(); var removeBtn = $(this); var row = removeBtn.closest('.mvp-stat-row'); var mediaId = row.data('media-id');
         if (currentGraphs[mediaId]) { currentGraphs[mediaId].destroy(); delete currentGraphs[mediaId]; }
         mediaItemList.find('.mvp-stat-graph-holder-row[data-parent-id="' + mediaId + '"]').remove();
         removeBtn.hide(); row.find('.mvp-stat-create-graph').show();
     });

    // --- Add Playlist from Stats Modal Logic ---
    var addPlaylistModal = $('#mvp-add-playlist-modal'), playlistFromStatMediaId = null;
    var addPlaylistModalBg = addPlaylistModal.find('.mvp-modal-bg');
    addPlaylistModalBg.on('click',function(e){ if(e.target === this) removePlaylistModal(); });
    _doc.on('keyup.mvpAddPlaylistModal', function(e) { if (e.key === "Escape" && addPlaylistModal.is(':visible')) removePlaylistModal(); });
    $('#mvp-add-playlist-cancel').on('click', removePlaylistModal);
    var addPlaylistSubmit = false;
    $('#mvp-add-playlist-submit').on('click',function(e){ /* ... submit add playlist logic ... */
        var title_field = addPlaylistModal.find('#playlist-title-modal'); var title = title_field.val().trim(); title_field.removeClass('aprf');
        if(isEmpty(title)){ title_field.addClass('aprf'); alert(escapeHtml(mvp_translate.attr('data-title-required')||'Title required.')); return false; } if(!playlistFromStatMediaId) { alert("No media IDs."); return false; } if(addPlaylistSubmit) return false;
        addPlaylistSubmit = true; preloader.show(); removePlaylistModal();
        var postData = [ {name: 'action', value: 'mvp_create_playlist'}, {name: 'security', value: mvp_data.security}, {name: 'title', value: title}, {name: 'media_id', value: playlistFromStatMediaId} ];
        $.ajax({ url: mvp_data.ajax_url, type: 'post', data: postData, dataType: 'json', }).done(function(response){
            if(response && response.new_playlist_id){ window.location.href = statWrap.data('admin-url') + '?page=mvp_playlist_manager&action=edit_playlist&mvp_msg=playlist_created&playlist_id=' + response.new_playlist_id; }
            else { console.error("Create playlist invalid response:", response); alert("Failed to get redirect URL."); addPlaylistSubmit = false; preloader.hide(); }
        }).fail(function(jqXHR, textStatus, errorThrown) { console.error("AJAX Error create playlist:", jqXHR.responseText); alert("Error creating playlist."); addPlaylistSubmit = false; preloader.hide(); });
    });
    function removePlaylistModal(){ addPlaylistModal.hide(); addPlaylistModal.find('#playlist-title-modal').val('').removeClass('aprf'); playlistFromStatMediaId = null; addPlaylistSubmit = false; }
    function showPlaylistModal(){ addPlaylistModal.show(); addPlaylistModal.find('#playlist-title-modal').focus(); addPlaylistModal.find('.mvp-modal-inner').scrollTop(0); }
    _doc.on('click', '.mvp-create-playlist-from-stat', function(e){ /* ... show create playlist modal ... */
         e.preventDefault(); var mediaIds = $(this).data('media-id'); if (mediaIds) { playlistFromStatMediaId = mediaIds; showPlaylistModal(); } else { alert("No media IDs associated."); }
     });

    // --- Clear Statistics Button ---
    $('#mvp-clear-statistics').on('click', function(){ /* ... clear stats logic ... */
        var result = confirm(escapeHtml(mvp_translate.attr('data-sure-to-clear-stat') || 'Are you sure?'));
        if(result){
            var playlist_id = selectedPlaylistId; if (playlist_id === undefined || playlist_id === null) { alert("Select playlist."); return; } preloader.show();
            var postData = [ {name: 'action', value: 'mvp_stat_clear'}, {name: 'playlist_id', value: playlist_id}, {name: 'security', value: mvp_data.security} ];
            $.ajax({ url: mvp_data.ajax_url, type: 'post', data: postData, dataType: 'json', }).done(function(response){
                 if(response && response === 'SUCCESS'){ loadStats('playlist', playlist_id); console.log("Stats cleared:", playlist_id); }
                 else { var errorMsg = (response && response.message) ? response.message : 'Unexpected response.'; console.error("Clear stats failed:", response); alert((mvp_translate.attr('data-clear-stat-error') || 'Error') + ' (' + errorMsg + ')'); preloader.hide(); }
            }).fail(function(jqXHR, textStatus, errorThrown) { console.error("AJAX Error clear stats:", jqXHR.responseText); preloader.hide(); alert(escapeHtml(mvp_translate.attr('data-clear-stat-error') || 'Error')); });
        }
    });

    // --- Update URL Parameter Function ---
    function insertParam(key, value){ /* ... function code ... */
        key = encodeURIComponent(key); var kvp = document.location.search.substr(1).split('&'); var params = {}; for (var i = 0; i < kvp.length; i++) { var x = kvp[i].split('='); if (x[0]) { params[decodeURIComponent(x[0])] = decodeURIComponent(x[1] || ''); } } var cleanKey = decodeURIComponent(key); if (value === null || value === undefined || value === '') { delete params[cleanKey]; } else { value = encodeURIComponent(value); params[cleanKey] = decodeURIComponent(value); } var new_kvp = []; for (var k in params) { if (params.hasOwnProperty(k)) { new_kvp.push(encodeURIComponent(k) + '=' + encodeURIComponent(params[k])); } } var new_search = (new_kvp.length > 0) ? '?' + new_kvp.join('&') : ''; if (history.pushState) { var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + new_search + window.location.hash; if (newUrl !== window.location.href) { history.pushState({path: newUrl}, '', newUrl); } } else { var currentSearch = window.location.search || ''; if (currentSearch !== new_search) { window.location.search = new_search; } }
     }

    //############################################//
    /* Helpers */
    //############################################//
    function escapeHtml(str) { if (typeof str !== 'string') return ''; var map = { '&': '&', '<': '<', '>': '>', '"': '"', "'": '&#39;' }; return str.replace(/[&<>"']/g, function(m) { return map[m]; }); }
    function formatDate(date){ var dd = String(date.getDate()).padStart(2, '0'); var mm = String(date.getMonth() + 1).padStart(2, '0'); var yyyy = date.getFullYear(); return yyyy + '-' + mm + '-' + dd; }
    function convertTime(time){ if(time === null || time === undefined || isNaN(time) || time < 0) return '0s'; time = parseInt(time, 10); if (time === 0) return '0s'; var days = Math.floor(time / 86400); var hours = Math.floor((time % 86400) / 3600); var minutes = Math.floor((time % 3600) / 60); var seconds = time % 60; var parts = []; if (days > 0) parts.push(days + 'd'); if (hours > 0) parts.push(hours + 'h'); if (minutes > 0) parts.push(minutes + 'm'); if (seconds > 0 || parts.length === 0) parts.push(seconds + 's'); return parts.join(' '); }
    function nFormatter(num, digits) { var si = [ { value: 1, symbol: "" }, { value: 1E3, symbol: "k" }, { value: 1E6, symbol: "M" }, { value: 1E9, symbol: "G" }, { value: 1E12, symbol: "T" }, { value: 1E15, symbol: "P" }, { value: 1E18, symbol: "E" } ]; var rx = /\.0+$|(\.[0-9]*[1-9])0+$/; var i; num = parseInt(num, 10); if (isNaN(num) || num === 0) { return '0'; } var isNegative = num < 0; num = Math.abs(num); for (i = si.length - 1; i > 0; i--) { if (num >= si[i].value) { break; } } var result = (num / si[i].value).toFixed(digits).replace(rx, "$1") + si[i].symbol; return (isNegative ? '-' : '') + result; }
    function getUrlParameter(k) { var p = {}; window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,key,val){p[decodeURIComponent(key)] = decodeURIComponent(val)}); return k ? p[k] : p; };
    function isEmpty(str){ if (typeof str !== 'string') return true; return str.trim().length === 0; }

}); // End jQuery document ready