jQuery(document).ready(function($) {
    "use strict"


    var preloader = $('#mvp-loader'),
     _body = $('body'),
    _doc = $(document),
    empty_src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D',
    mvp_translate = $('#mvp-translate'),
    mvpAdmin = $('.mvp-admin'),
    mediaTable = $('#media-table'),
    editPlaylistForm = $('#mvp-edit-playlist-form'),
    playlistItemList = $('#mvp-playlist-item-list'),
    curr_playlist_id = mediaTable.attr('data-playlist-id'),
    playlistTable = $('.mvp-playlist-table'),
    // Removed jquery_csv_js reference as it's no longer needed
    // jquery_csv_js = 'https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js',
     quickShortcodeKey = 'mvp-quick-shortcode-data',
     shortcodeManagerSection = $('#mvp-shortcode-manager-section'),
     singleMediaSourcesArr = ['audio', 'video', 'image', 'youtube_single', 'vimeo_single', 'hls', 'dash']




    var editingIntervalID,
    editingInterval = 20000,
    is_admin,
    trackPlaylistEdit


    if(mediaTable.length){
        //we are in edit playlist page

        is_admin = mediaTable.attr('data-is-admin')
        trackPlaylistEdit = mediaTable.attr('data-track-playlist-edit')

        if(trackPlaylistEdit == '1'){
            window.addEventListener('beforeunload', function (event) {
                setEditPlaylist('0')
            });

            setEditPlaylist('1');
        }

    }
    else if(playlistItemList.length){
        is_admin = playlistTable.attr('data-is-admin')
        trackPlaylistEdit = playlistTable.attr('data-track-playlist-edit')

        if(trackPlaylistEdit == '1'){
            if(playlistItemList.length)checkEditPlaylist();
        }
    }

    function setEditPlaylist(is_edit){

        var postData = [
            {name: 'action', value: 'mvp_set_playlist_edit'},
            {name: 'security', value: mvp_data.security},
            {name: 'playlist_id', value: curr_playlist_id},
            {name: 'is_edit', value: is_edit},
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            if(editingIntervalID)clearTimeout(editingIntervalID)
            editingIntervalID = setTimeout(function(){
                var edit = mediaTable.length ? '1' : '0';
                setEditPlaylist(edit);
            },editingInterval)

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
        });

    }

    function checkEditPlaylist(){

        var postData = [
            {name: 'action', value: 'mvp_check_playlist_edit'},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){
            //console.log('checkEditPlaylist ', response)

            var msg

            var current_user_id = playlistTable.attr('data-user-id')

            if(is_admin == '1'){
                msg = mvp_translate.attr('data-user-edit-playlist')
            }else{
                msg = mvp_translate.attr('data-admin-edit-playlist')
            }

            var i, len = response.length, row
            for(i = 0; i <len; i++){
                row = playlistItemList.find('.mvp-playlist-row[data-playlist-id="'+response[i].id+'"]')

                row.removeClass('mvp-edited-row mvp-edited-row')
                row.find('.mvp-edit-playlist-msg').remove();

                if(response[i].is_edit == '1'){//show disabled

                    //not for the person who is editing
                    if(current_user_id != response[i].edit_user_id){

                        var notice

                        if(is_admin){
                            msg = msg.replace('#', response[i].edit_user_id)

                            notice = $('<span class="mvp-edit-playlist-msg"><svg viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>'+msg+'</span>')

                            row.addClass('mvp-edited-row')

                        }else{

                            row.addClass('mvp-edited-row')

                            notice = $('<span class="mvp-edit-playlist-msg"><svg viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>'+msg+'</span>')

                        }

                        row.find('.mvp-playlist-id-field').prepend(notice)

                    }

                }
            }

            if(editingIntervalID)clearTimeout(editingIntervalID)
            editingIntervalID = setTimeout(function(){
                if(playlistItemList.length)checkEditPlaylist();
            },editingInterval)

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
        });

    }




     //############################################//
    /* playlist manager */
    //############################################//


    var playlistManagerSection = $('#mvp-playlist-manager-section')



    var mediaItemList = $('#media-item-list'),
    _MVPAdContent,
    activeMediaUrl,
    activeMediaType,
    activeMediaDuration,
    editMediaData


    if(typeof MVPAdContent !== 'undefined')_MVPAdContent = new MVPAdContent()




    //add playlist

    //modal

    var addPlaylistModal = $('#mvp-add-playlist-modal'),
    addPlaylistModalBg = addPlaylistModal.find('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ // only if the target itself has been clicked
            removePlaylistModal()
        }
    });

    $('#mvp-add-playlist-cancel').on('click',function(e){
        removePlaylistModal()
        preloader.hide()
    });


    var addPlaylistSubmit
    $('#mvp-add-playlist-submit').on('click',function(e){

        var title_field = $('#playlist-title')

        if(isEmpty(title_field.val())){
            title_field.addClass('aprf');
            addPlaylistModalBg.scrollTop(0);
            alert(mvp_translate.attr('data-title-required'));
            $('#playlist-title').focus()
            return false;
        }

        if(addPlaylistSubmit)return false;
        addPlaylistSubmit = true;

        var title = title_field.val()

        preloader.show()
        removePlaylistModal()

        var postData = [
            {name: 'action', value: 'mvp_create_playlist'},
            {name: 'security', value: mvp_data.security},
            {name: 'title', value: title},
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            //go to edit playlist page
            window.location = playlistItemList.attr('data-admin-url') + '?page=mvp_playlist_manager&action=edit_playlist&mvp_msg=playlist_created&playlist_id=' + response

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            addPlaylistSubmit = false;
            removePlaylistModal()
            preloader.hide()
        });

        return false;

    });

    function removePlaylistModal(){
        addPlaylistModal.hide();

        addPlaylistModal.find('#playlist-title').val('').removeClass('aprf');
    }

    $('#mvp-add-playlist').on('click',function(e){

        //check user limit
        if(!mvp_userData.is_admin){
            if(!mvp_userData.limit){
                showUserPlaylistLimitModal()
                return;
            }else if(parseInt(mvp_userData.playlist_created,10) >= parseInt(mvp_userData.limit.playlistLimit,10)){
                showUserPlaylistLimitModal()
                return;
            }
        }

        showPlaylistModal()

    });

    function showPlaylistModal(){
        addPlaylistModal.show();
        $('#playlist-title').focus()
        addPlaylistModalBg.scrollTop(0);
    }








    // playlist limit modal

    var userPlaylistLimitModal = $('#mvp-add-playlist-limit-modal'),
    userPlaylistLimitModalBg = userPlaylistLimitModal.find('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ // only if the target itself has been clicked
            removeUserPlaylistLimitModal()
        }
    });

    $('#mvp-add-playlist-limit-close').on('click',function(e){
        removeUserPlaylistLimitModal()
        preloader.hide()
    });

    function removeUserPlaylistLimitModal(){
        userPlaylistLimitModal.hide();
    }

    function showUserPlaylistLimitModal(){
        userPlaylistLimitModal.show();
        userPlaylistLimitModalBg.scrollTop(0);
    }


    // video limit modal

    var userVideoLimitModal = $('#mvp-add-media-limit-modal'),
    userVideoLimitModalBg = userVideoLimitModal.find('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ // only if the target itself has been clicked
            removeUserVideoLimitModal()
        }
    });

    $('#mvp-add-media-limit-close').on('click',function(e){
        removeUserVideoLimitModal()
        preloader.hide()
    });

    function removeUserVideoLimitModal(){
        userVideoLimitModal.hide();
    }

    function showUserVideoLimitModal(){
        userVideoLimitModal.show();
        userVideoLimitModalBg.scrollTop(0);
    }











    //media pagination

    var paginationPerPageNum = $('#mvp-pag-per-page-num')

    if(localStorage && localStorage.getItem('mvp_media_paginaton_per_page')){
        paginationPerPageNum.val(localStorage.getItem('mvp_media_paginaton_per_page'))
    }

    var paginationArr = [],
    paginationCurrentPage = 0,
    paginationPerPage = parseInt(paginationPerPageNum.val(),10),
    paginationTotalPages,
    paginationInited,
    lastActivePaginationBtn,
    lastPaginationPage,
    paginationWrap = $('.mvp-pagination-wrap')

    function updatePagination(jump_to_last_page){
        //after delete, move, copy, add tracks

        lastPaginationPage = paginationTotalPages - 1;
        if(paginationArr.length % paginationPerPage == 0){
            lastPaginationPage++;//no more space for tracks in last page, go to next page
        }

        paginationArr = []//empty

        //get all tracks again
        var i = 0;
        mediaItemList.find('.media-item').each(function(){
            paginationArr.push($(this).addClass('mvp-pagination-hidden').attr('data-id', i))
            i++;
        })

        paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage)

        if(jump_to_last_page){//when we create new tracks, jumpo to page with those newly created tracks
            paginationCurrentPage = lastPaginationPage;
        }

        if(paginationCurrentPage > paginationTotalPages - 1)paginationCurrentPage = paginationTotalPages - 1;

        if(paginationTotalPages > 1)createPaginationBtn(paginationCurrentPage);
        else paginationWrap.html('');

        if(paginationArr.length)showPaginationTracks()

    }

    var i = 0;
    mediaItemList.find('.media-item').each(function(){
        paginationArr.push($(this).attr('data-id', i))
        i++;
    })

    //adjust per page
    var mediaPerPageBtn = $('#mvp-pag-per-page-btn').on('click', function(){

        if(isEmpty(paginationPerPageNum.val())){
            paginationPerPageNum.focus()
            alert(mvp_translate.attr('data-enter-number'))
            return false;
        }

        paginationPerPage = parseInt(paginationPerPageNum.val(),10)

        //save
        if(localStorage)localStorage.setItem('mvp_media_paginaton_per_page', paginationPerPage);

        paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage)

        paginationCurrentPage = 0;

        if(paginationTotalPages > 1)createPaginationBtn(paginationCurrentPage);
        else paginationWrap.html('');

        if(paginationArr.length)showPaginationTracks()

    })

    function showPaginationTracks(){

        //hide visible playlist items
        mediaItemList.find('.media-item').addClass('mvp-pagination-hidden')

        var i, z = paginationCurrentPage * paginationPerPage, len = z + paginationPerPage
        if(len > paginationArr.length) len = paginationArr.length;

        for(i = z; i < len; i++){
            paginationArr[i].removeClass('mvp-pagination-hidden')
        }

    }

    paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage)

    if(paginationTotalPages > 1)createPaginationBtn(paginationCurrentPage);

    if(paginationArr.length)showPaginationTracks()//show tracks on start

    function createPaginationBtn(page){

        page += 1;

        var id, c, str = '<div class="mvp-pagination-container">';

        if (page > 1){
            str += '<div class="mvp-pagination-page mvp-pagination-first" data-page-id="first" title="First">First</div>';
            str += '<div class="mvp-pagination-page mvp-pagination-prev" data-page-id="prev" title="Previous">Prev</div>';
        }

        if (page-2 > 0 && page == paginationTotalPages){
            id = page-2;
            c = id-1;
            str += '<div class="mvp-pagination-page" data-page-id="'+c+'">'+id+'</div>';
        }

        if (page-1 > 0){
            id = page-1;
            c = id-1;
            str += '<div class="mvp-pagination-page" data-page-id="'+c+'">'+id+'</div>';
        }

        id = page;
        c = id-1;
        str += '<div class="mvp-pagination-page mvp-pagination-currentpage" data-page-id="'+c+'">'+id+'</div>'

        if (page+1 < paginationTotalPages) {
            id = page+1;
            c = id-1;
            str += '<div class="mvp-pagination-page" data-page-id="'+c+'">'+id+'</div>';
        }

        if (page+2 <= paginationTotalPages && page == 1){
            id = page+2;
            c = id-1;
            str += '<div class="mvp-pagination-page" data-page-id="'+c+'">'+id+'</div>';
        }

        if (page == paginationTotalPages - 1){
            id = paginationTotalPages;
            c = id-1;
            str += '<div class="mvp-pagination-page" data-page-id="'+c+'">'+id+'</div>';
        }

        if (page < paginationTotalPages){
            str += '<div class="mvp-pagination-page mvp-pagination-next" data-page-id="next" title="Next">Next</div>';
            str += '<div class="mvp-pagination-page mvp-pagination-last" data-page-id="last" title="Last">Last</div>';
        }

        str += '</div>';

        str += '<div class="mvp-pagination-total">Page '+page+' of '+paginationTotalPages+'</div>';

        paginationWrap.html(str);

        if(!paginationInited){
            paginationInited = true;

            paginationWrap.on('click', '.mvp-pagination-page:not(.mvp-pagination-currentpage)', function() {

                if(lastActivePaginationBtn)lastActivePaginationBtn.removeClass('mvp-pagination-currentpage');
                lastActivePaginationBtn = $(this).addClass('mvp-pagination-currentpage');

                //get new page
                var page = $(this).attr('data-page-id')
                if(page == 'prev')paginationCurrentPage -= 1;
                else if(page == 'next')paginationCurrentPage += 1;
                else if(page == 'first')paginationCurrentPage = 0;
                else if(page == 'last')paginationCurrentPage = paginationTotalPages - 1;
                else paginationCurrentPage = parseInt(page,10);

                if(paginationTotalPages > 1)createPaginationBtn(paginationCurrentPage);
                else paginationWrap.html('');

                if(paginationArr.length)showPaginationTracks()

            });

            lastActivePaginationBtn = paginationWrap.find('.mvp-pagination-currentpage')

        }

    }


    //sort order

    //restore sort
    var lastMediaSortInBackend = {type: 'id', asc: true}

    if(localStorage){
        var key = 'mvp_last_media_sort_in_backend_pid' + curr_playlist_id
        if(localStorage.getItem(key)){
            lastMediaSortInBackend = JSON.parse(localStorage.getItem(key))

            mediaTable.find('.mvp-sort-field[data-type="'+lastMediaSortInBackend.type+'"]').attr('data-asc',lastMediaSortInBackend.asc).click()
        }
    }

    setSortIndicator()

    function setSortIndicator(){

        mediaTable.find('.mvp-triangle-dir-wrap, .mvp-triangle-dir').hide()//hide all

        if(lastMediaSortInBackend.asc == true){
            mediaTable.find('.mvp-sort-field[data-type="'+lastMediaSortInBackend.type+'"]').find('.mvp-triangle-dir-wrap').show().find('.mvp-triangle-dir-down').show()
        }else{
            mediaTable.find('.mvp-sort-field[data-type="'+lastMediaSortInBackend.type+'"]').find('.mvp-triangle-dir-wrap').show().find('.mvp-triangle-dir-up').show()
        }

    }

    $('.mvp-sort-field').on('click', function(e){

        e.preventDefault()

        var btn = $(this),
        asc = btn.attr('data-asc') == 'true',
        items = mediaItemList.find('.media-item'), len = items.length,
        type = btn.attr('data-type')

        if(len == 0)return false;

        if(type == 'title' || type == 'artist')keysrtStr(paginationArr, '.media-'+type, asc);
        else keysrtNum(paginationArr, '.media-'+type, asc);

        asc = !asc
        btn.attr('data-asc', asc)

        //save state
        if(localStorage){
            lastMediaSortInBackend.type = type
            lastMediaSortInBackend.asc = asc

            var key = 'mvp_last_media_sort_in_backend_pid' + curr_playlist_id
            localStorage.setItem(key, JSON.stringify(lastMediaSortInBackend));

        }

        setSortIndicator()

        var i, arr = [];
        for(i = 0;i < len; i++){
            arr.push(parseInt(paginationArr[i].attr('data-id'),10));
        }

        //reposition data
        mediaItemList.append($.map(arr, function(v) {
            return items[v];
        }));

        //update id
        var i = 0;
        mediaItemList.find('.media-item').each(function(){
            $(this).attr('data-id', i)
            i++;
        })

        updateSortOrder()

        //update pagination
        mediaPerPageBtn.trigger('click')

    })

    var sortIsBeingSet

    function updateSortOrder(){

        if(sortIsBeingSet)return false;
        sortIsBeingSet = true;

        var media_id_arr = [], order_id_arr = [];
        mediaItemList.find('.media-item').each(function(){
            media_id_arr.push(parseInt($(this).attr('data-media-id'),10));
            order_id_arr.push(parseInt($(this).attr('data-order-id'),10));
        });

        order_id_arr.sort(sortNumber);//sort order id's from lowest on curr page

        var postData = [
            {name: 'action', value: 'mvp_update_media_order'},
            {name: 'media_id_arr', value: media_id_arr},
            {name: 'order_id_arr', value: order_id_arr},
            {name: 'playlist_id', value: mvpAdmin.attr('data-playlist-id')},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            sortIsBeingSet = false;

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
            sortIsBeingSet = false;
        });

    }










    //sort playlist ?
    $('#mvp-playlists-order').one('click', function(){
        var location = $('#mvp-playlists-order-by').val()
        window.location.href = location;
    });



    //media mutiple playlist select

    if(typeof $.fn.select2 !== 'undefined'){

        var additional_playlist_field = $('#additional_playlist_field'),
        additionalPlaylist =  $('#mvp-additional-playlist'),
        addMediaPlaylistList = $('#mvp-add-media-playlist-list').select2({
            placeholder: mvp_translate.attr('data-select-additional-playlists'),
            dropdownParent: $('#mvp-edit-media-modal')
        }).on('change', function(e) {
            //console.log(addMediaPlaylistList.val())
            additionalPlaylist.val(addMediaPlaylistList.val())//save here because after we hide modal it appears we cannot get select2 value any more?
        });

        //clear selected
        $('#mvp-clear-additional-playlist').on('click', function(){
            $('#mvp-add-media-playlist-list').val('').trigger('change')
        })

    }



    //user playlist

     $('#mvp-playlist-user-list').on('change', function(){
        var val = $(this).val();

        if(val == ''){
            //show all
            playlistItemList.children('.playlist-item').show();
        }else{
            playlistItemList.children('.playlist-item').hide();
            playlistItemList.children('.playlist-item[data-user-id="'+val+'"]').show();
        }
    })





    //filter playlist

    $('#mvp-filter-playlist').on('keyup.apfilter',function(){

        var value = $(this).val(), i, j = 0, title, len = playlistItemList.children('.playlist-item').length, p;

        for(i = 0; i < len; i++){

            p = playlistItemList.children('.playlist-item').eq(i)

            title = p.find('.playlist-title').val();

            if(p.find('.user-id'))title += p.find('.user-id').html();

            if(title.indexOf(value) >- 1){
                p.show();
            }else{
                p.hide();
                j++;
            }
        }

    });

    //select all
    playlistTable.on('click', '.mvp-playlist-all', function(){
        if($(this).is(':checked')){
            playlistItemList.find('.mvp-playlist-indiv').prop('checked', true);
        }else{
            playlistItemList.find('.mvp-playlist-indiv').prop('checked', false);
        }
    });

    //delete selected
    $('#mvp-delete-playlists').on('click', function(){
        if(playlistItemList.find('.mvp-playlist-indiv').length == 0)return false;//no media

        var selected = playlistItemList.find('.mvp-playlist-indiv:checked');

        if(selected.length == 0) {
            alert(mvp_translate.attr('data-no-playlist-selected'));
            return false;
        }

        var result = confirm(mvp_translate.attr('data-sure-to-delete'));
        if(result){

            var arr = [];

            selected.each(function(){
                arr.push(parseInt($(this).attr('data-playlist-id'),10));
            });

            deletePlaylist(arr)

        }
    });

    playlistItemList.on('click', '.mvp-delete-playlist', function(){

        var result = confirm(mvp_translate.attr('data-sure-to-delete'));
        if(result){

            var playlist_id = parseInt($(this).closest('.mvp-playlist-row').attr('data-playlist-id'),10);

            deletePlaylist([playlist_id])

        }

        return false;

    })

    function deletePlaylist(arr){

        preloader.show();

        var postData = [
            {name: 'action', value: 'mvp_delete_playlist'},
            {name: 'playlist_id', value: arr},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            preloader.hide();

            if(response){
                var i, len = arr.length;
                for(i = 0;i<len;i++){
                    playlistItemList.find('.mvp-playlist-row[data-playlist-id="'+arr[i]+'"]').remove();
                    if(mvp_userData)mvp_userData.playlist_created--;
                }
                $('.mvp-playlist-all').prop('checked', false);
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
        });

    }








    //tabs

    //playlist options

    var playlist_options_tabs = $('#mvp-playlist-options-tabs');

    playlist_options_tabs.find('.mvp-tab-header li').click(function(){
        var tab = $(this), id = tab.attr('id');

        if(!tab.hasClass('mvp-tab-active')){
            playlist_options_tabs.find('.mvp-tab-header li').removeClass('mvp-tab-active');
            tab.addClass('mvp-tab-active');
            playlist_options_tabs.find('.mvp-tab-content').hide();

            playlist_options_tabs.find($('#'+ id + '-content')).show();
        }
    });

    playlist_options_tabs.find('.mvp-tab-header li').eq(0).addClass('mvp-tab-active');
    playlist_options_tabs.find('.mvp-tab-content').eq(0).show();


    $('#pl_vast_upload').on('click', function(e){

        var upload_btn = $(this);

        var custom_uploader = wp.media({
            library:{
                type: ''
            }
        })

        custom_uploader.on("select", function(){
            var attachment = custom_uploader.state().get("selection").first().toJSON();
            upload_btn.closest('#pl_vast_field').find('#vast').val(attachment.url);
        })
        .open();

    });

    $('#pl_preview_seek_upload').on('click', function(e){

        var upload_btn = $(this);

        var custom_uploader = wp.media({
            library:{
                type: ''
            }
        })

        custom_uploader.on("select", function(){
            var attachment = custom_uploader.state().get("selection").first().toJSON();
            upload_btn.closest('.pl_field_wrap').find('.pl_field_val').val(attachment.url);
        })
        .open();

    });










    //media

    var media_tabs = $('#mvp-media-tabs');

    media_tabs.find('.mvp-tab-header li').click(function(){
        var tab = $(this), id = tab.attr('id');

        if(!tab.hasClass('mvp-tab-active')){
            media_tabs.find('.mvp-tab-header li').removeClass('mvp-tab-active');
            tab.addClass('mvp-tab-active');
            media_tabs.find('.mvp-tab-content').hide();

            media_tabs.find($('#'+ id + '-content')).show();


            if(id == 'mvp-tab-media-adverts'){
               // getLivePreview()
            }

        }
    });

    media_tabs.find('.mvp-tab-header li').eq(0).addClass('mvp-tab-active');
    media_tabs.find('.mvp-tab-content').eq(0).show();





    //quick shortcode tabs

    var quick_sh_tabs = $('#mvp-quick-sh-tabs');

    quick_sh_tabs.find('.mvp-tab-header li').click(function(){
        var tab = $(this), id = tab.attr('id');

        if(!tab.hasClass('mvp-tab-active')){
            quick_sh_tabs.find('.mvp-tab-header li').removeClass('mvp-tab-active');
            tab.addClass('mvp-tab-active');
            quick_sh_tabs.find('.mvp-tab-content').hide();

            quick_sh_tabs.find($('#'+ id + '-content')).show();

        }
    });

    quick_sh_tabs.find('.mvp-tab-header li').eq(0).addClass('mvp-tab-active');
    quick_sh_tabs.find('.mvp-tab-content').eq(0).show();











    //playlist thumb

    var pl_thumb_preview = $('#pl_thumb_preview'),
    pl_thumb_remove = $('#pl_thumb_remove').on('click', function(e){
        e.preventDefault();
        pl_thumb_preview.attr('src',empty_src);
        pl_thumb.val('');
    }),
    pl_thumb = $('#pl_thumb').on('keyup',function(){
        if($(this).val() == ''){
            pl_thumb_preview.attr('src',empty_src);
        }
    });
    if(pl_thumb.val() != ''){
        pl_thumb_remove.show();
    }







    //sortable media order

    if(mediaItemList.length){

        mediaItemList.sortable({
            handle: ".media-id",
           // helper: fixWidthHelper,
            placeholder: "ui-placeholder",
            tolerance: 'pointer',

            start: function (event, ui) {
                ui.placeholder.html("<td colspan='10'></td>")
                ui.placeholder.height(ui.item.height());
            },

            update: function(event, ui) {

                var key = 'mvp_last_media_sort_in_backend_pid' + curr_playlist_id
                localStorage.removeItem(key);

                updateSortOrder()
            }
        });

    }

    function fixWidthHelper(e, ui) {//fix right shift on drag
        ui.children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    }


    //favorite

    mediaTable.on('change', '.mvp-media-favorite', function(){

        if($(this).is(':checked')){
            var action = 'mvp_add_to_favorites'
        }else{
            var action = 'mvp_remove_from_favorites'
        }

        var media_id = $(this).closest('.media-item').attr('data-media-id')

        var postData = [
            {name: 'action', value: action},
            {name: 'media_id', value: media_id},
            {name: 'playlist_id', value: mvpAdmin.attr('data-playlist-id')},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
        });

    });

    //get favs

    var postData = [
        {name: 'action', value: 'mvp_get_favorites'},
        {name: 'playlist_id', value: mvpAdmin.attr('data-playlist-id')},
        {name: 'security', value: mvp_data.security}
    ];

    $.ajax({
        url: mvp_data.ajax_url,
        type: 'post',
        data: postData,
        dataType: 'json',
    }).done(function(response){

        var i, len = response.length
        for(i = 0; i < len; i++){
            mediaItemList.find('.media-item[data-media-id="'+response[i]+'"]').find('.mvp-media-favorite').prop('checked', true);
        }

    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseText, textStatus, errorThrown);
    });









    //filter media

    var mediafilterInited

    $('#mvp-filter-media').on('keyup.apfilter',function(){

        var value = $(this).val(), i, j = 0, item, title, len = mediaItemList.children('.media-item').length;

        if(!mediafilterInited){
            mediaItemList.children('.media-item').each(function(){
                var item = $(this)
                if(item.hasClass('mvp-pagination-hidden')){
                    item.addClass('mvp-was-pagination-hidden').removeClass('mvp-pagination-hidden')
                }
            })
            mediafilterInited = true;
        }

        for(i = 0; i < len; i++){

            item = mediaItemList.children('.media-item').eq(i)

            title = item.find('.media-title').html().toLowerCase();

            if(value == ''){

                mediaItemList.children('.media-item').each(function(){
                    var item = $(this).removeClass('mvp-filter-hidden mvp-filter-shown')

                    if(item.hasClass('mvp-was-pagination-hidden')){
                        item.removeClass('mvp-was-pagination-hidden').addClass('mvp-pagination-hidden')
                    }
                });

                mediafilterInited = false;

            }else{

                if(title.indexOf(value) >- 1){
                    item.addClass('mvp-filter-shown').removeClass('mvp-filter-hidden');
                }else{
                    item.removeClass('mvp-filter-shown').addClass('mvp-filter-hidden');
                    j++;
                }

            }
        }

    });

    //select all
    mediaTable.on('click', '.mvp-media-all', function(){
        if($(this).is(':checked')){
            mediaItemList.find('.media-item:not(.mvp-pagination-hidden)').find('.mvp-media-indiv').prop('checked', true);
        }else{
            mediaItemList.find('.media-item:not(.mvp-pagination-hidden)').find('.mvp-media-indiv').prop('checked', false);
        }
    });

    mediaTable.on('click', '.mvp-delete-media', function(){

        var result = confirm(mvp_translate.attr('data-sure-to-delete'));
        if(result){

            var media_id = $(this).closest('.media-item').attr('data-media-id')

            var arr = [media_id]
            deleteMedia(arr)

        }

        return false;

    })

    function deleteMedia(arr){

         preloader.show();

        var postData = [
            {name: 'action', value: 'mvp_delete_media'},
            {name: 'media_id', value: arr},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            preloader.hide();

            //console.log(response)
            if(response > 0){
                var i, len = arr.length
                for(i = 0; i< len;i++){
                    mediaItemList.find('.media-item[data-media-id='+arr[i]+']').remove();
                    if(mvp_userData)mvp_userData.video_created--;
                }
                $('.mvp-media-all').prop('checked', false);
            }

            updatePagination()

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
        });

    }



    //edit media

    mediaTable.on('click', '.mvp-edit-media', function(){
        var media_id = $(this).closest('.media-item').attr('data-media-id'),
        order_id = $(this).closest('.media-item').attr('data-order-id')

        preloader.show();

        var postData = [
            {name: 'action', value: 'mvp_edit_media'},
            {name: 'media_id', value: media_id},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){
            console.log(response)

            editMediaData = response

            preloader.hide();

            inputMediaFields('edit', response)

            mediaSaveType = 'edit_media'
            mediaSaveId = media_id

            showMediaModal()

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
        });

        return false;

    })




    var action_do,
    playlistSelectorWrap = $('#playlist-selector-wrap'),
    playlist_selector = $('#playlist_selector')



    $('#mvp_playlist_action').on('change', function(){
         playlistSelectorWrap.css('display','none');
    })



    //copy selected
    $('#mvp_playlist_action_do').on('click', function(){
        if(mediaItemList.find('.mvp-media-indiv').length == 0)return false;//no media

        var selected = mediaItemList.find('.mvp-media-indiv:checked');

        var action = $("#mvp_playlist_action").val()

        if(action == "mvp-copy-media"){

            if(selected.length == 0) {
                alert(mvp_translate.attr('data-media-selected'));
                return false;
            }

            action_do = 'copy';

            playlistSelectorWrap.find('option[value='+curr_playlist_id+']').show();
            playlist_selector.prop('selectedIndex',0);
            playlistSelectorWrap.css('display','block');

        }
        else if(action == "mvp-move-media"){

            if(selected.length == 0) {
                alert(mvp_translate.attr('data-media-selected'));
                return false;
            }

            action_do = 'move';

            playlistSelectorWrap.find('option[value='+curr_playlist_id+']').prop('selected', false).hide();//cant move to same playlist
            playlist_selector.prop('selectedIndex',0);
            playlistSelectorWrap.css('display','block');


        }
        else if(action == "mvp-delete-media"){

            if(selected.length == 0) {
                alert(mvp_translate.attr('data-media-selected'));
                return false;
            }


            var result = confirm(mvp_translate.attr('data-sure-to-delete'));
            if(result){

                preloader.show();

                var arr = [];

                selected.each(function(){
                    arr.push(parseInt($(this).closest('.media-item').attr('data-media-id'),10));
                });

                deleteMedia(arr)


            }

        }
        else if(action == "mvp-deactivate-media" ||  action == "mvp-activate-media"){

            if(selected.length == 0) {
                alert(mvp_translate.attr('data-media-selected'));
                return false;
            }

            preloader.show();

            var arr = [];

            var disabled = action == "mvp-deactivate-media" ? "1" : "0";

            selected.each(function(){

                var item = $(this).closest('.media-item')

                arr.push(parseInt(item.attr('data-media-id'),10));

                if(action == "mvp-deactivate-media"){
                    item.addClass('mvp-item-disabled')
                }
                else{
                    item.removeClass('mvp-item-disabled')
                }

            });

            var postData = [
                {name: 'action', value: 'mvp_set_disabled_all'},
                {name: 'disabled', value: disabled},
                {name: 'media_id', value: arr},
                {name: 'security', value: mvp_data.security}
            ];


            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',
            }).done(function(response){
                console.log(response)

                preloader.hide();

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
                preloader.hide();
            });

        }
        else if(action == "mvp-show-favorite"){

            mediaItemList.find('.media-item:not(.mvp-pagination-hidden)').hide()

            mediaItemList.find('.media-item:not(.mvp-pagination-hidden)').each(function(){
                var item = $(this)
                if(item.find('.mvp-media-favorite').is(':checked')){
                    item.show()
                }
            })

        }
        else if(action == "mvp-show-all"){

            mediaItemList.find('.media-item:not(.mvp-pagination-hidden)').show()

        }

    });



    $('#selected-ok').on('click', function(){

        var result = confirm("Are you sure to "+action_do+" selected media?");
        if(result){

            preloader.show();

            var arr = [];
            var selected = mediaItemList.find('.mvp-media-indiv:checked');

            selected.each(function(){
                arr.push(parseInt($(this).closest('.media-item').attr('data-media-id'),10));
            });

            var action = action_do == 'copy' ? 'mvp_copy_media' : 'mvp_move_media';
            var postData = [
                {name: 'action', value: action},
                {name: 'destination_playlist_id', value: playlist_selector.find('option:selected').attr('value')},
                {name: 'media_id', value: arr},
                {name: 'security', value: mvp_data.security}
            ];

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',
            }).done(function(response){

                preloader.hide();

                if(response == '1'){
                    if(action_do == 'move'){
                        selected.closest('.media-item').remove();
                        $('.mvp-media-all').prop('checked', false);
                    }
                }

                updatePagination()

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
                preloader.hide();
            });
        }

    });

    $('#selected-cancel').on('click', function(){
        playlistSelectorWrap.css('display','none');
    });








    //add/edit media form submit
    var editMediaForm = $('#mvp-edit-media-form');
    var editMediaSubmit;


    //add, edit media modal

    var mediaSaveType,//add, edit
    mediaSaveId,
    to_update_data = {}

    var mediaModal = $('#mvp-edit-media-modal'),
    mediaModalBg = mediaModal.find('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ // only if the target itself has been clicked
            //removeMediaModal()
        }
    });



    $('#mvp-edit-media-form-cancel').on('click',function(e){
        removeMediaModal()
    });

    $('#mvp-edit-media-form-submit, #mvp-edit-media-form-submit2').on('click',function(e){

        if(editMediaSubmit)return false;//prevent double submit
        editMediaSubmit = true;

        if(!window.mvpvld)return false;


        if($(this).hasClass('mvp-edit-playlist-mode')){

            //check required
            var parent, tab, first_input;
            media_tabs.find('.mvp-tab-content').each(function(){
                tab = $(this);
                tab.find('input:visible[ap-required=true], textarea:visible[ap-required=true]').each(function(){
                    var input = $(this);
                    if(input.val() == ""){

                        if(!first_input)first_input = input

                        input.addClass('aprf');
                        if(!parent){
                            parent = tab.attr('id');
                            parent = parent.substr(0,parent.length - 8);//remove -content
                        }

                        if(parent == 'mvp-tab-media-adverts'){
                            input.closest('.option-tab.mvp-ad-source').removeClass('option-closed');
                        }
                        if(parent == 'mvp-tab-media-annotations'){
                            input.closest('.option-tab.mvp-annotation-source').removeClass('option-closed');
                        }

                    }else{
                        input.removeClass('aprf');
                    }
                });
            });


            //pi icons
            var required, first_input;
            mvp_pi_table_wrap.find('input:visible[required]').each(function(){

                var input = $(this);
                if(input.val() == ""){
                  if(!first_input)first_input = input
                    input.addClass('aprf');
                    required = true;

                    parent = 'mvp-tab-media-main'
                }
            });


            if(parent){
                media_tabs.find($('#'+parent)).click();
                editMediaSubmit = false;

                first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
                first_input = null;
                alert(mvp_translate.attr('data-fill-required-fields'));
                return false;
            }

        }
        else if($(this).hasClass('mvp-get-video-shortcode-mode')){

            //check required
            var parent, first_input;

            //check video tab

            get_video_shortcode_submit.find('input:visible[ap-required=true], textarea:visible[ap-required=true]').each(function(){
                var input = $(this);
                if(input.val() == ""){

                    parent = true;

                    if(!first_input)first_input = input

                    input.addClass('aprf');

                }else{
                    input.removeClass('aprf');
                }
            });

            if(parent){
                editMediaSubmit = false;

                $('#mvp-quick-sh-tab-video').trigger('click')

                first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
                first_input = null;
                alert(mvp_translate.attr('data-fill-required-fields'));
                return false;
            }



            //check ad tab

            var input, parent
            $('#mvp-tab-shortcode-adverts-content').find('input:visible[ap-required=true],textarea:visible[ap-required=true]').each(function(){
                input = $(this);
                if(input.val() == ""){

                    if(!first_input)first_input = input

                    input.addClass('aprf');

                    parent = true;

                }else{
                    input.removeClass('aprf');
                }
            });

            if(parent){
                editMediaSubmit = false;

                $('#mvp-quick-sh-tab-adverts').trigger('click')

                first_input.closest('.option-tab.mvp-ad-source').removeClass('option-closed');

                first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
                first_input = null;
                alert(mvp_translate.attr('data-fill-required-fields'));
                return false;
            }



        }





        to_update_data = {}

        var options = {};
        var s = '[apmvp_video type="'+media_type+'"'//shortcode

        var media_title = title.val().replace(/"/g, "'");
        if(media_title)s += ' title="'+media_title+'"'
        to_update_data.title = media_title
        to_update_data.type = media_type

        //disabled
        options.disabled = (disabled_field.val() == "1") ? "1" : "0";


        options.type = media_type

        if(media_type == 'video' || media_type == 'audio'){

            var idata = [], s_path = '', s_quality_title = '', s_quality, s_quality_mobile

            mediaModal.find('.multi_path_section').each(function(){
                var item = $(this), obj = {}

                obj.path = item.find('.multi_path').val().replace(/"/g, "'")

                if(!to_update_data.path)to_update_data.path = obj.path

                var quality_title = item.find('.quality_title').val().replace(/"/g, "'")
                obj.quality_title = quality_title

                if(item.find('.quality_default').is(':checked')){
                    obj.def = quality_title
                    s_quality = quality_title
                }
                else obj.def = ''

                if(item.find('.quality_mobile_default').is(':checked')){
                    obj.defMobile = quality_title
                    s_quality_mobile = quality_title
                }

                s_path += obj.path + ','
                s_quality_title += obj.quality_title + ','

                idata.push(obj)

            })

            s_path = s_path.substr(0,s_path.length-1)
            s += ' path="'+s_path+'"'
            s_quality_title = s_quality_title.substr(0,s_quality_title.length-1)
            s += ' quality_title="'+s_quality_title+'"'
            if(s_quality)s += ' quality="'+s_quality+'"'
            if(s_quality_mobile)s += ' quality_mobile="'+s_quality_mobile+'"'

            var media_path = idata;

        }else{

            var idata = [], obj = {}

            obj.path = path.val().replace(/"/g, "'");
            s += ' path="'+obj.path+'"'

            to_update_data.path = obj.path

            if(!isEmpty(mp4.val()))obj.mp4 = mp4.val().replace(/"/g, "'");

            idata.push(obj)

            var media_path = idata;

        }

        if(media_type == 'folder_video' || media_type == 'folder_audio' || media_type == 'folder_image' || media_type == 'folder_hls' || media_type == 'folder_dash'){
            options.folder_sort = folder_sort.val()
            options.id3 = id3.val()

            s += ' folder_sort="'+options.folder_sort+'"'
            if(options.id3 && options.id3 == '1')s += ' id3="'+options.id3+'"'

            options.folder_custom_url = folder_custom_url.is(":checked") ? '1' : '0'; // Ensure it's '1' or '0'
            if(options.folder_custom_url == '1')s += ' folder_custom_url="'+options.folder_custom_url+'"'

        }
        if(!isEmpty(user_id.val())){
            options.user_id = user_id.val().replace(/"/g, "'");
            if(options.user_id)s += ' user_id="'+options.user_id+'"'
        }

        if(media_type == 'youtube_video_query' || media_type == 'youtube_channel') options.sort_type = yt_sort.val()
        else if(media_type == 'vimeo_channel')options.sort_type = vimeo_channel_sort.val();
        else if(media_type == 'vimeo_user_album' || media_type == 'vimeo_album') options.sort_type = vimeo_album_sort.val();
        else if(media_type == 'vimeo_group') options.sort_type = vimeo_group_sort.val();
        else if(media_type == 'vimeo_ondemand') options.sort_type = vimeo_ondemand_sort.val();
        else if(media_type == 'vimeo_folder') options.sort_type = vimeo_folder_sort.val();

        if(options.sort_type){
            s += ' sort_type="'+options.sort_type+'"'
        }

        if(media_type == 'vimeo_channel' || media_type == 'vimeo_user_album' || media_type == 'vimeo_album' || media_type == 'vimeo_group' || media_type == 'vimeo_ondemand' || media_type == 'vimeo_folder') {
            options.vimeo_sort_dir = vimeo_sort_dir.val();
            if(options.vimeo_sort_dir)s += ' vimeo_sort_dir="'+options.vimeo_sort_dir+'"'
        }

        if(gdrive_sort_field.css('display') != 'none'){
            if(!isEmpty(gdrive_sort.val())){
                options.gdrive_sort = gdrive_sort.val()
                if(options.gdrive_sort)s += ' gdrive_sort="'+options.gdrive_sort+'"'
            }
        }

        if(onedrive_sort_field.css('display') != 'none'){
            if(!isEmpty(onedrive_sort.val())){
                options.onedrive_sort = onedrive_sort.val()
                if(options.onedrive_sort)s += ' onedrive_sort="'+options.onedrive_sort+'"'
            }
        }

        if(!isEmpty(exclude.val())){
            options.exclude = exclude.val().replace(/"/g, "'");
            if(options.exclude)s += ' exclude="'+options.exclude+'"'
        }

        if(!isEmpty(hl.val())){
            options.hl = hl.val();
            if(options.hl)s += ' hl="'+options.hl+'"'
        }

        if(!isEmpty(cc_lang_pref.val())){
            options.cc_lang_pref = cc_lang_pref.val();
            if(options.cc_lang_pref)s += ' cc_lang_pref="'+options.cc_lang_pref+'"'
        }

        if(!isEmpty(bkey.val())){
            options.bkey = bkey.val().replace(/"/g, "'");
            if(options.bkey)s += ' bkey="'+options.bkey+'"'
        }

        if(is360.val() == '1'){
            options.is360 = is360.val()
            options.vrMode = vrMode.val()
            s += ' is360="'+options.is360+'"'
            if(vrMode.val())s += ' vrMode="'+options.vrMode+'"'
        }
        if(noapi.val() == '1'){
            options.noapi = noapi.val()
            if(options.noapi)s += ' noapi="'+options.noapi+'"'
        }
        if(islive.val() == '1'){
            options.islive = islive.val()
            if(options.islive)s += ' islive="'+options.islive+'"'
        }

        if(!isEmpty(date.val())){
            options.date = date.val()
            if(options.date)s += ' date="'+options.date+'"'
        }

        if(!isEmpty(lock_time.val())){
            options.lock_time = lock_time.val()
            if(options.lock_time)s += ' lock_time="'+options.lock_time+'"'
        }

        if(!isEmpty(vimeo_account_type.val())){
            options.vimeo_account_type = vimeo_account_type.val();
            if(options.vimeo_account_type)s += ' vimeo_account_type="'+options.vimeo_account_type+'"'
        }
        if(!isEmpty(vimeo_upload_date.val())){
            options.vimeo_upload_date = vimeo_upload_date.val();
            if(options.vimeo_upload_date)s += ' vimeo_upload_date="'+options.vimeo_upload_date+'"'
        }

        if(!isEmpty(poster.val())){
            options.poster = poster.val().replace(/"/g, "'");
            if(options.poster)s += ' poster="'+options.poster+'"'
        }

        if(!isEmpty(slideshow_images.val())){
            options.slideshow_images = slideshow_images.val()
            if(options.slideshow_images)s += ' slideshow_images="'+options.slideshow_images+'"'
        }

        if(!isEmpty(poster_frame_time.val())){
            options.poster_frame_time = poster_frame_time.val();
            // Corrected shortcode attribute name below
            if(options.poster_frame_time)s += ' poster_frame_time="'+options.poster_frame_time+'"'
        }
        if(!isEmpty(thumb.val())){
            options.thumb = thumb.val().replace(/"/g, "'");
            if(options.thumb)s += ' thumb="'+options.thumb+'"'
        }
        to_update_data.thumb = thumb.val().replace(/"/g, "'");

        if(!isEmpty(alt_text.val())){
            options.alt_text = alt_text.val().replace(/"/g, "'");//thumb alt
            if(options.alt_text)s += ' alt_text="'+options.alt_text+'"'
        }
        if(!isEmpty(hover_preview.val())){
            options.hover_preview = hover_preview.val().replace(/"/g, "'");
            if(options.hover_preview)s += ' hover_preview="'+options.hover_preview+'"'
        }

        if(!isEmpty(description.val())){
            options.description = description.val().replace(/"/g, "'");
            if(options.description)s += ' description="'+options.description.replace(/(\r\n|\n|\r)/gm, "")+'"'
        }

        if(!isEmpty(description_custom.val())){
            options.description_custom = description_custom.val();
        }

        if(!isEmpty(download.val())){
            options.download = download.val().replace(/"/g, "'");
            if(options.download)s += ' download="'+options.download+'"'
        }

        //pi icons
        if(mvp_pi_table_wrap.children().length > 0){
            var pi_icons = [], obj

            mvp_pi_table_wrap.find('.mvp-pi-table').each(function(){
                var item = $(this)

                obj = {}
                if(item.find('.mvp-pi-title').val())obj.title = item.find('.mvp-pi-title').val().replace(/"/g, "'");
                if(item.find('.mvp-pi-url').val()){
                    obj.url = item.find('.mvp-pi-url').val().replace(/"/g, "'");
                    obj.target = item.find('.mvp-pi-target').val();
                }
                if(item.find('.mvp-pi-rel').val())obj.rel = item.find('.mvp-pi-rel').val().replace(/"/g, "'");
                if(item.find('.mvp-pi-class').val())obj.class = item.find('.mvp-pi-class').val().replace(/"/g, "'");
                if(item.find('.mvp-pi-icon').val())obj.icon = item.find('.mvp-pi-icon').val();

                pi_icons.push(obj)

            })

            options.pi_icons = pi_icons

        }

        if(!isEmpty(start.val())){
            options.start = start.val();
            if(options.start)s += ' start="'+options.start+'"'
        }
        if(!isEmpty(end.val())){
            options.end = end.val();
            if(options.end)s += ' end="'+options.end+'"'
        }

        if(!isEmpty(playback_rate.val())){
            options.playback_rate = playback_rate.val();
            if(options.playback_rate && playback_rate != '1')s += ' playback_rate="'+options.playback_rate+'"'
        }

        if(!isEmpty(preview_seek.val())){
            options.preview_seek = preview_seek.val().replace(/"/g, "'");
            if(options.preview_seek)s += ' preview_seek="'+options.preview_seek +'"'
        }

        if(!isEmpty(chapters.val())){
            options.chapters = chapters.val().replace(/"/g, "'");
            if(options.chapters)s += ' chapters="'+options.chapters +'"'

            if(chapters_cors.is(':checked')){
                options.chapters_cors = '1';
                if(options.chapters_cors)s += ' chapters_cors="1"'
            }
        }

        if(!isEmpty(vast.val())){
            options.vast = vast.val().replace(/"/g, "'");
            if(options.vast){
                s += ' vast="'+options.vast +'"'

                if(vast_loop.val() == '1'){
                    options.vast_loop = vast_loop.val();
                    s += ' vast_loop="1"'
                }
            }
        }

        if(!isEmpty(duration.val())){
            options.duration = duration.val();
            if(options.duration)s += ' duration="'+options.duration+'"'
        }

        if(!isEmpty(link.val())){
            options.link = link.val().replace(/"/g, "'");
            options.target = target.val();

            if(options.link){
                s += ' link="'+options.link +'"'
                if(options.target)s += ' target="'+options.target+'"'
            }
        }

        if(!isEmpty(end_link.val())){
            options.end_link = end_link.val().replace(/"/g, "'");
            options.end_target = end_target.val();

            if(options.end_link){
                s += ' end_link="'+options.end_link +'"'
                if(options.end_target)s += ' end_target="'+options.end_target+'"'
            }
        }

        if(!isEmpty(pwd.val())){
            options.pwd = pwd.val().replace(/"/g, "'");
            //if(options.pwd)s += ' pwd="'+options.pwd +'"'
        }

        if(!isEmpty(vpwd.val())){
            options.vpwd = vpwd.val().replace(/"/g, "'");
            if(options.vpwd)s += ' vpwd="'+options.vpwd +'"'
        }

        if(age_verify.val() && !isEmpty(age_verify.val())){
            options.age_verify = age_verify.val().replace(/"/g, "'");
            if(options.age_verify)s += ' age_verify="'+options.age_verify +'"'
        }

        if(media_type == 'video' || media_type == 'audio' || media_type == 'youtube_single' || media_type == 'vimeo_single'){

          var cue_point_arr = [], s_cue_start_time = '', s_cue_code_type = '', s_cue_code = ''

          mediaModal.find('.cue_point_section').each(function(){
              var item = $(this), obj = {}

              var cue_start_time = item.find('.cue_start_time'),
              cue_code_type = item.find('.cue_code_type'),
              cue_code = item.find('.cue_code')

              if(!isEmpty(cue_start_time.val()) && !isEmpty(cue_code.val())){

                obj.cue_start_time = cue_start_time.val()
                obj.cue_code_type = cue_code_type.val();
                obj.cue_code = cue_code.val().replace(/"/g, "'");

                s_cue_start_time += obj.cue_start_time + ','
                s_cue_code_type += obj.cue_code_type + ','
                s_cue_code += obj.cue_code + ','

                cue_point_arr.push(obj)

              }

          })

          if(cue_point_arr.length){

            options.cue_point = cue_point_arr;

            s_cue_start_time = s_cue_start_time.substr(0,s_cue_start_time.length-1)//remove last comma
            s += ' cue_start_time="'+s_cue_start_time+'"'

            s_cue_code_type = s_cue_code_type.substr(0,s_cue_code_type.length-1)
            s += ' cue_code_type="'+s_cue_code_type+'"'

            s_cue_code = s_cue_code.substr(0,s_cue_code.length-1)
            s += ' cue_code="'+s_cue_code+'"'

          }

        }




        //subtitles

        var idata = [], s_subtitle_src = '', s_subtitle_label = '', s_subtitle_cors = '', s_subtitle_active

        mediaModal.find('.subtitle_section').each(function(){
            var item = $(this), obj = {}

            obj.src = item.find('.subtitle_src').val().replace(/"/g, "'")

            var subtitle_label = item.find('.subtitle_label').val().replace(/"/g, "'")
            obj.label = subtitle_label

            if(item.find('.subtitle_default').is(':checked')){
                obj.def = subtitle_label
                s_subtitle_active = subtitle_label
            }
            else obj.def = ''

            if(item.find('.subtitle_cors').is(':checked')){
                obj.cors = '1'
            }else{
                obj.cors = ''
            }

            s_subtitle_src += obj.src + ','
            s_subtitle_label += obj.label + ','
            if(!isEmpty(obj.cors))s_subtitle_cors += obj.cors + ','

            idata.push(obj)

        })

        if(s_subtitle_src.length > 1){
            s_subtitle_src = s_subtitle_src.substr(0,s_subtitle_src.length-1)
            s += ' subtitle_src="'+s_subtitle_src+'"'

            s_subtitle_label = s_subtitle_label.substr(0,s_subtitle_label.length-1)
            s += ' subtitle_label="'+s_subtitle_label+'"'

            s_subtitle_cors = s_subtitle_cors.substr(0,s_subtitle_cors.length-1)
            if(!isEmpty(s_subtitle_cors))s += ' subtitle_cors="'+s_subtitle_cors+'"'

            if(s_subtitle_active)s += ' subtitle_active="'+s_subtitle_active+'"'
        }

        var subtitle_src = idata;

        //ads
        var ad_data = getAddData()

        //annotation
        var annotation_data = getAnnotationData();

        //randomize ad (save in media options); global ads have randomize saved in ad section
        options.randomizeAdPre = randomizeAdPre.val()
        options.randomizeAdEnd = randomizeAdEnd.val()


        if($(this).hasClass('mvp-edit-playlist-mode')){

            var media_id = '';
            if(mediaSaveType == 'edit_media'){
                media_id = mediaSaveId
                to_update_data.media_id = media_id
            }

            removeMediaModal()
            preloader.show();



            var postData = [
                {name: 'action', value: 'mvp_add_media'},
                {name: 'save_type', value: mediaSaveType},
                {name: 'media_id', value: media_id},
                {name: 'playlist_id', value: mvpAdmin.attr('data-playlist-id')},
                {name: 'type', value: media_type},
                {name: 'title', value: media_title},
                {name: 'options', value: JSON.stringify(options)},
                {name: 'media_path', value: JSON.stringify(media_path)},
                {name: 'subtitle_src', value: subtitle_src.length ? JSON.stringify(subtitle_src) : ''},
                {name: 'ad_pre', value: ad_data[0].length ? JSON.stringify(ad_data[0]) : ''},
                {name: 'ad_mid', value: ad_data[1].length ? JSON.stringify(ad_data[1]) : ''},
                {name: 'ad_end', value: ad_data[2].length ? JSON.stringify(ad_data[2]) : ''},
                {name: 'annotation', value: annotation_data.length ? JSON.stringify(annotation_data) : ''},
                {name: 'security', value: mvp_data.security}
            ];

            if(mediaSaveType == 'add_media'){
                postData.push({name: 'additional_playlist', value: additionalPlaylist.val()})
            }

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',
            }).done(function(response){

                //create track

                if(mediaSaveType == 'add_media'){

                    createTracksFromResponse(response, to_update_data)

                    updatePagination(true)

                }
                else if(mediaSaveType == 'edit_media'){
                    //update fields
                    var trx = mediaItemList.find('.media-item[data-media-id="'+to_update_data.media_id+'"]')

                    var isrc = to_update_data.thumb ? to_update_data.thumb : empty_src
                    trx.find('.mvp-media-thumb-img').attr('src', isrc)
                    trx.find('.media-title').html(to_update_data.title)
                    trx.find('.media-path').html(to_update_data.path)

                }

                preloader.hide();
                editMediaSubmit = false;

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
                preloader.hide();
                editMediaSubmit = false;
            });

        }
        else if($(this).hasClass('mvp-get-video-shortcode-mode')){

            /////////////////////// check ads

            var ads_sh = ''

            var advert_content = $('#mvp-tab-shortcode-adverts-content')

            advert_content.find('.mvp-ad-source.ad-pre').each(function(){
                var item = $(this)
                ads_sh += getAdShortcode(item, 'ad-pre')
            })

            advert_content.find('.mvp-ad-source.ad-mid').each(function(){
                var item = $(this)
                ads_sh += getAdShortcode(item, 'ad-mid')
            })

            advert_content.find('.mvp-ad-source.ad-end').each(function(){
                var item = $(this)
                ads_sh += getAdShortcode(item, 'ad-end')
            })

            //////////////////////



            if($(this).attr('id') == 'mvp-edit-media-form-submit2'){
                //add new video shortcode to final shortcode

                var curr_sh = $('#mvp-quick-video-shortcode-ta').val()
                if(curr_sh.length == 0){

                    //if user first clicks on add video and shortcode field is empty, redirect to get shortcode button

                    editMediaSubmit = false;
                    $('#mvp-edit-media-form-submit').click()

                    return false;
                }

                var s1 = curr_sh.substr(0,curr_sh.indexOf('[/apmvp]'))

                s += ']'

                //ads
                if(ads_sh){
                    s += ads_sh;
                }

                s += '[/apmvp_video]'

                var final_s = s1 + s + '[/apmvp]'


            }else if($(this).attr('id') == 'mvp-edit-media-form-submit'){
                //join current video and player shortcode

                s += ']'

                //ads
                if(ads_sh){
                    s += ads_sh;
                }

                s += '[/apmvp_video]'

                //player options
                var quickPlayerShortcodeForm = $('#mvp-quick-player-shortcode-form')
                var _playlistPosition

                var player_options = {};

               /*
               $.each(quickPlayerShortcodeForm.serializeArray(), function(i, field) {

                    if(field.name == 'playlistPosition')_playlistPosition = field.value

                    player_options[field.name] = field.value;

                });*/


                var f_data = quickPlayerShortcodeForm.find("input,select,textarea").serialize()

                $.each(f_data.split('&'), function (index, elem) {

                    var vals = elem.split('='), name = vals[0], value = vals[1];

                    if(name == 'playlistPosition')_playlistPosition = value

                    if(value.indexOf('%2F'))value = decodeURIComponent(value)//url

                    player_options[name] = value;

                });


                var player_options_s = ''
                for (var [key, value] of Object.entries(player_options)) {
                    //console.log(key, value)

                    o = key.split(/(?=[A-Z])/).join('_').toLowerCase();//camelcase to underscore

                    if(_playlistPosition == 'wall' || _playlistPosition == 'outer'){
                        if(o == 'playlist_position' || o == 'playlist_style' || o == 'navigation_type')continue;
                    }else{
                        if(o == 'grid_type' || o == 'playlist_grid_style')continue;
                    }


                    player_options_s += ' '+o+'="'+value+'"';
                }
                if(_playlistPosition == 'wall' || _playlistPosition == 'outer')player_options_s += ' active_item="-1"'


                var s1 = '[apmvp' + player_options_s + ']',
                s3 = '[/apmvp]'
                var final_s = s1 + s + s3



                if(localStorage){

                    var mvp_quick_shortcode_state = {
                        type: media_type,
                        title: media_title,
                        options: options,
                        media_path: media_path,
                        subtitle_src: subtitle_src,
                        player_options: player_options,
                        ad_pre: ad_data[0].length ? ad_data[0] : '',
                        ad_mid: ad_data[1].length ? ad_data[1] : '',
                        ad_end: ad_data[2].length ? ad_data[2] : '',
                        shortcode: final_s
                    }

                   localStorage.setItem(quickShortcodeKey, JSON.stringify(mvp_quick_shortcode_state))

                }


            }

            $('#mvp-quick-video-shortcode-ta').val(final_s).select()

            document.execCommand("copy");

            editMediaSubmit = false;

           $('#mvp-quick-video-shortcode-ta')[0].scrollIntoView({behavior: "smooth",block: 'center'});

        }

    });

    //restore quick shortocde


    $('#mvp-quick-sh-reset').on('click', function(){
        var result = confirm(mvp_translate.attr('data-sure-to-clear'));
        if(result){
           if(localStorage)localStorage.removeItem(quickShortcodeKey)
            location.reload();
        }
    })

   // function initQuickShortcode(){

    if(localStorage && localStorage.getItem(quickShortcodeKey) && shortcodeManagerSection.length){

        setTimeout(function(){


        var qss = JSON.parse(localStorage.getItem(quickShortcodeKey))

        //video
        var quick_sh_video_tab = $('#mvp-quick-sh-tab-video-content')

        $.each(qss.options, function (key, val) {
            quick_sh_video_tab.find('#'+key).val(val)

            if(key == 'poster'){
                poster_preview.attr('src', val);
                poster_remove.show();
            }
            else if(key == 'thumb'){
                thumb_preview.attr('src', val);
                thumb_remove.show();
            }

        });



        quick_sh_video_tab.find('#title').val(qss.media_title)

        if(qss.media_path){
            var i, len = qss.media_path.length, data, obj

            //create fields
            if(len > 1){
                for(i = 1; i < len; i++){
                    quick_sh_video_tab.find('#multi_path_field_add').trigger('click')
                }
            }

            for(i = 0; i < len; i++){
                data = qss.media_path[i]

                obj = quick_sh_video_tab.find('.multi_path_section').eq(i)

                obj.find('.multi_path').val(data.path)
                obj.find('.quality_title').val(data.quality_title)
                if(data.def){
                    obj.find('.quality_default').prop('checked','checked')
                }
                if(data.defMobile){
                    obj.find('.quality_mobile_default').prop('checked', 'checked')
                }

            }
        }

        if(qss.subtitle_src){
            var i, len = qss.subtitle_src.length, data, obj

            //create fields
            for(i = 0; i < len; i++){
                quick_sh_video_tab.find('#subtitle_field_add').trigger('click')
            }

            for(i = 0; i < len; i++){
                data = qss.subtitle_src[i]

                obj = quick_sh_video_tab.find('.subtitle_section').eq(i)
                obj.find('.subtitle_src').val(data.src)
                obj.find('.subtitle_label').val(data.label)
                if(data.def){
                    obj.find('.subtitle_default').prop('checked','checked')
                }
                if(data.cors){
                    obj.find('.subtitle_cors').prop('checked', 'checked')
                }

            }
        }

        if(qss.options.pi_icons){
            var i, len = qss.options.pi_icons.length, data, obj

            //create fields
            for(i = 0; i < len; i++){
                quick_sh_video_tab.find('#pi_add').trigger('click')
            }

            for(i = 0; i < len; i++){
                data = qss.options.pi_icons[i]

                obj = quick_sh_video_tab.find('.mvp-pi-table').eq(i)

                if(data.title)obj.find('.mvp-pi-title').val(data.title)
                if(data.url){
                    obj.find('.mvp-pi-url').val(data.url)
                    if(data.target)obj.find('.mvp-pi-target').val(data.target).change()
                }
                if(data.rel)obj.find('.mvp-pi-rel').val(data.rel)
                if(data.icon)obj.find('.mvp-pi-icon').val(data.icon)
                if(data.class)obj.find('.mvp-pi-class').val(data.class)

            }
        }




        //adverts

        if(qss.ad_pre){

            var i, len = qss.ad_pre.length, obj

            if(len > 0){
                for(i = 0; i < len; i++){
                    obj = qss.ad_pre[i]
                    _MVPAdContent.addAdSource(obj.ad_type, obj, true);
                }
            }

        }

        if(qss.ad_mid){

            var i, len = qss.ad_mid.length, obj

            if(len > 0){
                for(i = 0; i < len; i++){
                    obj = qss.ad_mid[i]
                    _MVPAdContent.addAdSource(obj.ad_type, obj, true);
                }
            }

        }

        if(qss.ad_end){

            var i, len = qss.ad_end.length, obj

            if(len > 0){
                for(i = 0; i < len; i++){
                    obj = qss.ad_end[i]
                    _MVPAdContent.addAdSource(obj.ad_type, obj, true);
                }
            }

        }

        _MVPAdContent.setRandomize(qss.options)








        //player


        var quick_sh_player_tab = $('#mvp-quick-sh-tab-player-content')

        $.each(qss.player_options, function (key, val) {

            quick_sh_player_tab.find('#'+key).val(val)
        });




        //shortcode

        var sh = qss.shortcode.replace("\\", "");
        $('#mvp-quick-video-shortcode-ta').val(sh)





        mvp_updatePlayerFields($)

        type_selector.change()


        },100)


    }






    function insertTextAtCaret(text) {
        var sel, range;
        if (window.getSelection) {
            sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                range = sel.getRangeAt(0);
                range.deleteContents();
                range.insertNode( document.createTextNode(text) );
            }
        } else if (document.selection && document.selection.createRange) {
            document.selection.createRange().text = text;
        }
    }



    function getAddData(){

        var ad_pre_data = []
        $('.mvp-reel-ad-source.ad-pre').each(function(){
            var item = $(this)
            ad_pre_data.push(getAdOptions(item, 'ad-pre'))
        })

        var ad_mid_data = []
        $('.mvp-reel-ad-source.ad-mid').each(function(){
            var item = $(this)
            ad_mid_data.push(getAdOptions(item, 'ad-mid'))
        })

        var ad_end_data = []
        $('.mvp-reel-ad-source.ad-end').each(function(){
            var item = $(this)
            ad_end_data.push(getAdOptions(item, 'ad-end'))
        })

        return [ad_pre_data, ad_mid_data, ad_end_data];

    }

    function getAnnotationData(){

        var idata = []
        mediaModal.find('.mvp-annotation-source').each(function(){
            var item = $(this), obj = {}

            var type = item.find('.annotation_type').val()
            obj.type = type
            obj.display_type = 'annotation'

            if(type == 'adsense-detail'){

                var annotation_adsense_client = item.find('.annotation_adsense_client').val().replace(/"/g, "'"),
                annotation_adsense_slot = item.find('.annotation_adsense_slot').val().replace(/"/g, "'"),
                annotation_width = item.find('.annotation_width').val().replace(/"/g, "'"),
                annotation_height = item.find('.annotation_height').val().replace(/"/g, "'")

                if(annotation_adsense_client)obj.adsense_client = annotation_adsense_client;
                if(annotation_adsense_slot)obj.adsense_slot = annotation_adsense_slot;
                if(annotation_width)obj.width = annotation_width;
                if(annotation_height)obj.height = annotation_height;
            }
            else if(type == 'html'){

              obj.path = item.find('.annotation_html_content').val()

             /*   if (typeof(tinymce) != "undefined") {

                  var uid = 'mvp-annotation-editor-' + item.attr('data-id')

                  var editor = tinymce.get(uid);
                  if (editor) {
                      obj.path = editor.getContent();
                  } else {
                      obj.path = item.find('.annotation_html_content').val()
                  }

                }else{

                  obj.path = item.find('.annotation_html_content').val()
                }*/

            }
            else{

                obj.path = item.find('.annotation_path').val().replace(/"/g, "'")
            }

            var annotation_show_time = item.find('.annotation_show_time').val()
            if(!isEmpty(annotation_show_time))obj.show_time = annotation_show_time

            var annotation_end_time = item.find('.annotation_end_time').val()
            if(!isEmpty(annotation_end_time))obj.hide_time = annotation_end_time

            var annotation_link = item.find('.annotation_link').val()
            if(!isEmpty(annotation_link)){
                obj.link = annotation_link;
                obj.target = item.find('.annotation_target').val()

                var annotation_rel = item.find('.annotation_rel').val()
                if(!isEmpty(annotation_rel))obj.rel = annotation_rel
            }

            obj.close_btn = item.find('.annotation_close_btn').val()
            obj.close_btn_position = item.find('.annotation_close_btn_position').val()
            obj.position = item.find('.annotation_position').val()

            var annotation_adit_class = item.find('.annotation_adit_class').val().replace(/"/g, "'")
            if(!isEmpty(annotation_adit_class))obj.adit_class = annotation_adit_class

            var annotation_css = item.find('.annotation_css').val().replace(/"/g, "'")
            if(!isEmpty(annotation_css))obj.css = annotation_css

            idata.push(obj)
        })

        mediaModal.find('.mvp-popup-source').each(function(){
            var item = $(this), obj = {}

            var type = item.find('.popup_type').val()
            obj.type = type
            obj.display_type = 'popup'

            if(type == 'adsense-detail'){

                var popup_adsense_client = item.find('.popup_adsense_client').val().replace(/"/g, "'"),
                popup_adsense_slot = item.find('.popup_adsense_slot').val().replace(/"/g, "'"),
                popup_width = item.find('.popup_width').val().replace(/"/g, "'"),
                popup_height = item.find('.popup_height').val().replace(/"/g, "'")

                if(popup_adsense_client)obj.adsense_client = popup_adsense_client;
                if(popup_adsense_slot)obj.adsense_slot = popup_adsense_slot;
                if(popup_width)obj.width = popup_width;
                if(popup_height)obj.height = popup_height;
            }
            else if(type == 'html'){

              obj.path = item.find('.popup_html_content').val()

              /*  if (typeof(tinymce) != "undefined") {

                  var uid = 'mvp-popup-editor-' + item.attr('data-id')

                  var editor = tinymce.get(uid);
                  if (editor) {
                      obj.path = editor.getContent();
                  } else {
                      obj.path = item.find('.popup_html_content').val()
                  }

                }else{

                  obj.path = item.find('.popup_html_content').val()
                }*/

            }
            else{

                obj.path = item.find('.popup_path').val().replace(/"/g, "'")
            }

            var popup_show_time = item.find('.popup_show_time').val()
            if(!isEmpty(popup_show_time))obj.show_time = popup_show_time

            var popup_link = item.find('.popup_link').val()
            if(!isEmpty(popup_link)){
                obj.link = popup_link;
                obj.target = item.find('.popup_target').val()

                var popup_rel = item.find('.popup_rel').val()
                if(!isEmpty(popup_rel))obj.rel = popup_rel
            }

            obj.close_btn = item.find('.popup_close_btn').val()

            var popup_adit_class = item.find('.popup_adit_class').val().replace(/"/g, "'")
            if(!isEmpty(popup_adit_class))obj.adit_class = popup_adit_class

            var popup_css = item.find('.popup_css').val().replace(/"/g, "'")
            if(!isEmpty(popup_css))obj.css = popup_css

            idata.push(obj)
        })

        return idata;

    }

    function getAdOptions(item, ad_type){

        var obj = {}

        obj.ad_type = ad_type
        obj.type = item.find('.ad_type').val()
        obj.path = item.find('.ad_path').val().replace(/"/g, "'")
        obj.is360 = item.find('.ad_is360').val()
        obj.vrMode = item.find('.ad_vrMode').val()

        var ad_duration = item.find('.ad_duration').val()
        if(!isEmpty(ad_duration))obj.duration = ad_duration

        var ad_begin = item.find('.ad_begin').val()
        if(!isEmpty(ad_begin))obj.begin = ad_begin

        var ad_poster = item.find('.ad_poster').val().replace(/"/g, "'")
        if(!isEmpty(ad_poster))obj.poster = ad_poster;

        var ad_skip_enable = item.find('.ad_skip_enable').val()
        if(!isEmpty(ad_skip_enable))obj.skip_enable = ad_skip_enable;

        var mvp_ad_link = item.find('.mvp_ad_link').val()
        if(!isEmpty(mvp_ad_link)){
            obj.link = mvp_ad_link;
            obj.target = item.find('.ad_target').val()
            obj.rel = item.find('.ad_rel').val()
        }

        return obj;

    }

    function getAdShortcode(item, ad_type){

        /*
[apmvp_ad ad_type="ad-pre" type="video" path="VIDEO_URL" skip_enable="5"][/apmvp_ad]
[apmvp_ad ad_type="ad-mid" type="youtube_single" path="3XJh9n8K3XU" skip_enable="10"][/apmvp_ad]
[apmvp_ad ad_type="ad-mid" type="audio" path="AUDIO_URL" poster="POSTER_IMAGE_SHOWN_WHILE_AUDIO_PLAYS" skip_enable="10"][/apmvp_ad]
[apmvp_ad ad_type="ad-mid" type="image" path="IMAGE_URL" duration="SECONDS" skip_enable="10"][/apmvp_ad]
[apmvp_ad ad_type="ad-end" type="vimeo_single" path="165017258" skip_enable="15"][/apmvp_ad]
        */

        var s = '[apmvp_ad ad_type="'+ad_type+'"'

        var type = item.find('.ad_type').val()
        s += ' type="'+type+'"'

        var path = item.find('.ad_path').val().replace(/"/g, "'")
        s += ' path="'+path+'"'

        var is360 = item.find('.ad_is360').val()
        if(is360 == '1'){
            s += ' is360="1"'

            var vrMode = item.find('.ad_vrMode').val()
            s += ' vrmode="'+vrMode+'"'

        }

        var ad_duration = item.find('.ad_duration').val()
        if(!isEmpty(ad_duration)){
            s += ' duration="'+ad_duration+'"'
        }

        var ad_begin = item.find('.ad_begin').val()
        if(!isEmpty(ad_begin)){
            s += ' begin="'+ad_begin+'"'
        }

        var ad_poster = item.find('.ad_poster').val().replace(/"/g, "'")
        if(!isEmpty(ad_poster)){
            s += ' poster="'+ad_poster+'"'
        }

        var ad_skip_enable = item.find('.ad_skip_enable').val()
        if(!isEmpty(ad_skip_enable)){
            s += ' skip_enable="'+ad_skip_enable+'"'
        }

        var mvp_ad_link = item.find('.mvp_ad_link').val()
        if(!isEmpty(mvp_ad_link)){
            s += ' link="'+mvp_ad_link+'"'

            var target = item.find('.ad_target').val()
            s += ' target="'+target+'"' // Corrected: Was using mvp_ad_link again

            var rel = item.find('.ad_rel').val()
            if(rel)s += ' rel="'+rel+'"'
        }

        s += '][/apmvp_ad]'

        return s;

    }


    function removeMediaModal(){
        mediaModal.hide();
        _body.removeClass('mvp-modal-open');

        $('#ad-section-live').html('')

        last_media_type = media_type


        if(!editMediaForm.hasClass('mvp-not-form')){
            editMediaForm[0].reset();
            mediaModal.find('.mvp-img-preview').attr('src', empty_src)
        }else{
            resetForm(editMediaForm)
        }

        mvp_pi_table_wrap.empty()

        //editMediaForm[0].reset();
       // mediaModal.find('.mvp-img-preview').attr('src', empty_src)

        mediaModal.find('.multi_path_section').remove()
        mediaModal.find('.subtitle_section').remove()
        mediaModal.find('.cue_point_section').remove()

        type_selector.change();

        slideshow_images_field.html('')
        updateSlideshowImages()

        //remove ads
        mediaModal.find('.mvp-ad-source').remove()

        //remove annotations
        mediaModal.find('.mvp-annotation-source').remove()

        media_tabs.find('.mvp-tab-header li').eq(0).click()//show first tab

        additional_playlist_field.hide()

        //live

        $('#ad-section-timeline-holder').find('.ad-section-timeline-point').remove()

    }

    var addMediaBtn = $('#mvp-add-media').on('click',function(e){

        //check user limit
        if(!mvp_userData.is_admin){
            if(!mvp_userData.limit){
                showUserVideoLimitModal()
                return;
            }else if(parseInt(mvp_userData.video_created,10) >= parseInt(mvp_userData.limit.videoLimit,10)){
                showUserVideoLimitModal()
                return;
            }
        }

        select_media_type_field.find('#type').attr('disabled', false);
        mediaSaveType = 'add_media'
        multi_path_field_add.click()//create first field on start
        type_selector.change();
        showMediaModal()

    });

    function showMediaModal(){
        if(mediaSaveType == 'add_media'){
            additional_playlist_field.show()

            if(last_media_type){//save last used media
                type_selector.val(last_media_type).change()
            }

            date.val(getDate())

        }else{
            additional_playlist_field.hide()
        }
        mediaModal.show();
        mediaModalBg.scrollTop(0);
        _body.addClass('mvp-modal-open');
    }







    //upload multiple

    //modal select type

    var uploadMultipleTypeModal = $('#mvp-upload-multiple-type-modal'),
    uploadMultipleTypeModalBg = uploadMultipleTypeModal.find('.mvp-modal-bg'),
    uploadMultipleTypes = []

    function showUploadMultipleTypeModal(){

        uploadMultipleTypeModal.show();
        uploadMultipleTypeModalBg.scrollTop(0);
        _body.addClass('mvp-modal-open');

    }

    function removeUploadMultipleTypeModal(){
        uploadMultipleTypeModal.hide();
       _body.removeClass('mvp-modal-open');
    }

    uploadMultipleTypeModal.on('click', '#mvp-upload-multiple-type-modal-cancel', function(){
        removeUploadMultipleTypeModal();
    })

    uploadMultipleTypeModal.on('click', '#mvp-upload-multiple-type-modal-ok', function(){

        uploadMultipleTypes = []
        uploadMultipleTypeModal.find('input:checked').each(function() {
            uploadMultipleTypes.push($(this).val());
        });

        removeUploadMultipleTypeModal();

        if(uploadMultipleTypes.length)showMultipleUploader()
    })

    $('#mvp-upload-multiple-media').on('click', function(){
        showUploadMultipleTypeModal()
    })




    var multi_uploader,
    multi_uploader_data = [],
    multi_uploading_on,
    mediaLeftToUpload//user limit

    function showMultipleUploader(){

        if(editMediaSubmit)return false;
        editMediaSubmit = true;

        mediaLeftToUpload = null;

        //check user limit
        if(!mvp_userData.is_admin){
            if(!mvp_userData.limit){
                showUserVideoLimitModal()
                return;
            }else if(parseInt(mvp_userData.video_created,10) >= parseInt(mvp_userData.limit.videoLimit,10)){
                showUserVideoLimitModal()
                return;
            }

            mediaLeftToUpload = parseInt(mvp_userData.limit.videoLimit,10) - parseInt(mvp_userData.video_created,10)

            var result = confirm(mvp_translate.attr('data-can-upload') + ': ' + mediaLeftToUpload.toString());
            if (result) {
                showMultiUploader()
            }

        }else{
            showMultiUploader()
        }

    }

    function showMultiUploader(){

        if(multi_uploader){//reuse
            multi_uploader.open();
            return;
        }

        multi_uploader = wp.media({
            library:{
                type: uploadMultipleTypes
            },
            multiple:true
        })
        .on("select", function(){
            var attachment_data = multi_uploader.state().get('selection').map(
                function( attachment ) {
                    attachment.toJSON();
                    return attachment;
            });

            multi_uploader_data = []
            multi_uploading_on = true

            var i, attachment, len = attachment_data.length, obj;

            if(!mvp_userData.is_admin) if(len > mediaLeftToUpload)len = mediaLeftToUpload;

            for (i = 0; i < len; i++) {

                attachment = attachment_data[i].attributes

                obj = {}

                obj.type = attachment.type
                obj.path = attachment.url

                if(attachment.date){
                    var dt = setInputDate(attachment.date)
                    obj.date = dt
                }

                if(attachment.title)obj.title = attachment.title.replace(/"/g, "'")

                if(attachment.description)obj.description = attachment.description.replace(/"/g, "'")

                if(attachment.image && attachment.image.src){
                    if(attachment.image.src.indexOf("wp-includes/images/media/video.png") == -1){
                        obj.thumb = attachment.image.src;
                    }
                }

                if(attachment.fileLength){
                    obj.duration = hmsToSecondsOnly(attachment.fileLength)
                }

                multi_uploader_data.push(obj)

            }

            saveMultiTracks()

        }).on('close',function() {
            editMediaSubmit = false;
        })
        .open();

    }

    function saveMultiTracks(){

        preloader.show();

        var postData = [
            {name: 'action', value: 'mvp_add_media_multiple'},
            {name: 'playlist_id', value: mvpAdmin.attr('data-playlist-id')},
            {name: 'media', value: JSON.stringify(multi_uploader_data)},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            console.log(response)

            var i, len = response.length
            for(i = 0; i < len; i++){
                createTracksFromResponse(response[i])
            }

            preloader.hide();
            editMediaSubmit = false;

            updatePagination(true)

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
            editMediaSubmit = false;
        });

    }


    function createTracksFromResponse(response, to_update_data){

        if(mvp_userData)mvp_userData.video_created++;

        var order_id = parseInt(response.order_id,10),
        media_id = response.insert_id

        var container = $('.mvp-media-item-container-orig').clone().removeClass('mvp-media-item-container-orig').addClass('media-item mvp-pagination-hidden')
        .attr('data-media-id', media_id).attr('data-order-id', order_id)

        container.find('.media-id').html(media_id)

        if(response.options){
            if(response.options.type)container.find('.media-type').html(response.options.type)
            if(response.options.title)container.find('.media-title').html(response.options.title)
            if(response.options.path)container.find('.media-path').html(response.options.path)
            if(response.options.thumb)container.find('.mvp-media-thumb-img').attr('src', response.options.thumb)

            if(singleMediaSourcesArr.indexOf(response.options.type) == -1){
                container.find('.mvp-media-favorite').remove()
            }
        }

        if(to_update_data){
            container.find('.media-type').html(to_update_data.type)
            var isrc = to_update_data.thumb ? to_update_data.thumb : empty_src
            container.find('.mvp-media-thumb-img').attr('src', isrc)
            container.find('.media-title').html(to_update_data.title)
            container.find('.media-path').html(to_update_data.path)
        }

        //insert track

        var len = mediaItemList.find('.media-item').length
        if(len == 0){
            //0 items in list
            mediaItemList.append(container);
        }else{
            //find position

            var toinsert = true;
            mediaItemList.find('.media-item').each(function(){
                var oid = parseInt($(this).attr('data-order-id'),10)
                if(order_id < oid){
                    if(toinsert){
                        $(this).before(container);
                        toinsert = false;
                        return false;
                    }
                }
            });

            if(toinsert){
                mediaItemList.append(container);
            }

        }

    }










    //save playlist options submit



    //prevent enter sumbit form
    editPlaylistForm.keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    var editPlaylistSubmit;
    $('#mvp-edit-playlist-form-submit').on('click', function (){

        if(editPlaylistSubmit)return false;//prevent double submit
        editPlaylistSubmit = true;

        preloader.show();

        var options = {};
        $.each(editPlaylistForm.serializeArray(), function(i, field) {

            if(field.name != 'lockVideoUserRoles[]'){
                options[field.name] = field.value;
            }

        });

        //category
        var lockVideoUserRoles = []
        $('#lockVideoUserRoles_field').find("input:checkbox:checked").each(function() {
            lockVideoUserRoles.push($(this).val());
        });

        options['lockVideoUserRoles'] = lockVideoUserRoles;

        var postData = [
            {name: 'action', value: 'mvp_save_playlist_options'},
            {name: 'playlist_id', value: mvpAdmin.attr('data-playlist-id')},
            {name: 'playlist_options', value: JSON.stringify(options)},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            preloader.hide();
            editPlaylistSubmit = false;

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
            editPlaylistSubmit = false;
        });

        return false;

    });




    //multi quality

    var multi_path_content = $('#multi_path_content'),
    multi_path_field_add = $('#multi_path_field_add').on('click', function(e){
        var content = multi_path_content.find('.multi_path_section_orig').clone().removeClass('multi_path_section_orig').addClass('multi_path_section');

        content.insertBefore($(this));

        content.find('.multi_path').attr('ap-required', true);
        content.find('.quality_title').attr('ap-required', true);

        checkMultiPathRemoveBtn();

    });


    multi_path_content.on('blur', '.multi_path', function(){

        var v = $(this).val()

        if(media_type == 'video'){
            if(v.indexOf('youtube') > -1){
                alert(mvp_translate.attr('data-wrong-media'))
                return;
            }/*
            else if(v.indexOf('vimeo') > -1){//we cant use this because they might host video on vimeo directly
                alert("It looks like you are trying to enter Vimeo video as mp4, choose correct media type for your video!")
                return;
            }*/
        }
    })







    var multi_path_field = $('#multi_path_field').on('click', '.multi_path_upload', function(e){
        e.preventDefault();

        var upload_btn = $(this), library, source, custom_uploader;

        source = upload_btn.parent().find('.multi_path');

        //dont reuse if we cant change library (when we change type)

        if(media_type == 'video'){
            library = "video/*";
        }else if(media_type == 'audio'){
            library = "audio/*";
        }else if(media_type == 'image'){
            library = "image";
        }

        custom_uploader = wp.media({
        library:{
                type: library
            }
        })

        custom_uploader.on("select", function(){
            var attachment = custom_uploader.state().get("selection").first().toJSON();

            $(source).val(attachment.url);

            //meta
            if(attachment.date){
                var dt = setInputDate(attachment.date)
                date.val(dt)
            }
            if(attachment.title)$('#title').val(attachment.title)
            if(attachment.description)$('#description').val(attachment.description)
            if(attachment.fileLength){
                $('#duration').val(hmsToSecondsOnly(attachment.fileLength))
            }

        })
        .open();

    });


    //remove quality
    multi_path_field.on('click', '.multi_path_field_remove', function(){
        $(this).closest('.multi_path_section').remove();
        checkMultiPathRemoveBtn();
    });

    function checkMultiPathRemoveBtn(){

        if(multi_path_content.find('.multi_path_section').length>1){
            //when we add another quality, show remove button on all qualities, then only hide remove button when single quality remains
            multi_path_content.find('.multi_path_field_remove').each(function(){
                $(this).show();
            });
        }else{
            multi_path_content.find('.multi_path_field_remove').each(function(){
                $(this).hide();
            });
        }
    }

    checkMultiPathRemoveBtn();





    //subtitle

    var subtitle_content = $('#subtitle_content');

    $('#subtitle_field_add').on('click', function(e){

        var content = subtitle_content.find('.subtitle_section_orig').clone().removeClass('subtitle_section_orig').addClass('subtitle_section');

        content.find('.subtitle_src').attr('ap-required', true);
        content.find('.subtitle_label').attr('ap-required', true);

        content.insertBefore($(this))
    });

    subtitle_content.on('click', '.subtitle_field_remove', function (){

        $(this).closest('.subtitle_section').remove();

    });




    var subtitle_field = $('#subtitle_field').on('click', '.subtitle_src_upload', function(e){
        e.preventDefault();

        var upload_btn = $(this), library, source, custom_uploader;

        source = upload_btn.parent().find('.subtitle_src');

        if(subtitle_field.data('custom-uploader')){//reuse

            custom_uploader = subtitle_field.data('custom-uploader').uploader;

        }else{

            library = "";

            custom_uploader = wp.media({
            library:{
                    type: library
                }
            })

            subtitle_field.data('custom-uploader', {uploader: custom_uploader});
        }

        custom_uploader.off("select").on("select", function(){
            var attachment = custom_uploader.state().get("selection").first().toJSON();
            $(source).val(attachment.url);
        })
        .open();

    });

    subtitle_content.on('click', '.subtitle_default', function(){//radio and checkbox
        $(this).on('change',function(){
            if($(this).is(':checked')){
                subtitle_content.find('.subtitle_default').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
    });


    //cue point

    var cue_point_content = $('#cue_point_content');

    $('#cue_point_field_add').on('click', function(e){

        var content = cue_point_content.find('.cue_point_section_orig').clone().removeClass('cue_point_section_orig').addClass('cue_point_section');

        content.find('.cue_start_time').attr('ap-required', true);
        content.find('.cue_code').attr('ap-required', true);

        content.insertBefore($(this))
    });

    cue_point_content.on('click', '.cue_point_field_remove', function (){

        $(this).closest('.cue_point_section').remove();

    });



    /* live preview ad */

    function getLivePreview(){

        if(media_type == 'video'){

            mediaModal.find('.multi_path_section').each(function(){
                var item = $(this)

                var v = item.find('.multi_path').val().replace(/"/g, "'")
                if(!isEmpty(v)){
                    activeMediaUrl = v;
                    return false;
                }
            })

        }
        else if(media_type == 'youtube_single' || media_type == 'vimeo_single'){

            activeMediaUrl = $('.mvp-media-path-ta').val()

        }

        if(media_type && !isEmpty(activeMediaUrl)){

            setVideoPreview(media_type, activeMediaUrl)

        }


    }

    function setVideoPreview(type, url, element){

        if(type == 'video'){
            var str = $('<video class="ad-section-preview" controls="" src="'+url+'"></video>')
        }
        else if(type == 'audio'){
            var str = $('<audio class="ad-section-preview" controls="" src="'+url+'"></audio>')
        }
        else if(type == 'youtube_single'){

            var p = 'http://www.youtube.com/embed/'+url + '?enablejsapi=1'

            var str = '<iframe id="mvp-ad-iframe" class="ad-section-preview" width="100%" height="100%" src="'+p+'" frameborder="0" allowfullscreen></iframe>';

        }
        else if(type == 'vimeo_single'){

            var p = '//player.vimeo.com/video/'+url

            var str = '<iframe id="mvp-ad-iframe" class="ad-section-preview" width="100%" height="100%" src="'+p+'" frameborder="0" allowfullscreen></iframe>';

        }


        $('#ad-section-live').html(str)


        if(editMediaData.data.duration){
            $('#ad-section-timeline').attr('data-duration', editMediaData.data.duration)
        }


        if(type == 'video' || type == 'audio'){

            var media = $('.ad-section-preview')[0]

            media.addEventListener('timeupdate', function(){
                var t = this.currentTime, d = this.duration
                $('#ad-section-timeline-progress').css('left', (t/d*100)+'%')
            })

            var interval = setInterval(function() {
                if(media.readyState > 0) {
                    clearInterval(interval);

                    activeMediaDuration = media.duration

                    $('#ad-section-timeline').attr('data-duration', editMediaData.data.duration)
                }
            }, 200);

        }
        else if(type == 'youtube_single'){

            if(!window.YT){
                var tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            }

            var interval = setInterval(function(){
                if(window.YT && window.YT.Player){
                    clearInterval(interval);

                    previewPlayer = new YT.Player('mvp-ad-iframe', {
                        videoId: url,
                        events: {
                            'onReady': onPlayerReady
                        }
                    });

                }
            }, 100);

        }
        else if(type == 'vimeo_single'){

            if(!window.Vimeo){
                var tag = document.createElement('script');
                tag.src = "https://player.vimeo.com/api/player.js";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            }

            var interval = setInterval(function(){
                if(window.Vimeo){
                    clearInterval(interval);

                    var player = document.getElementById('mvp-ad-iframe')

                    previewPlayer = new Vimeo.Player(player);
                    previewPlayer.on('loaded', onVimLoaded);

                }
            }, 100);

        }


    }

    var previewPlayer
    function onPlayerReady() {
        activeMediaDuration = previewPlayer.getDuration()

        $('#ad-section-timeline').attr('data-duration', editMediaData.data.duration)

    }

    function onVimLoaded(){

        previewPlayer.getDuration().then(function(duration) {
            activeMediaDuration = duration

            $('#ad-section-timeline').attr('data-duration', editMediaData.data.duration)

        })

    }





    //playlist

    $('.mvp-media-path-ta').on('blur', function() {

        var v = $(this).val()

        if(media_type.indexOf('youtube') > -1 && v.indexOf('youtube') > -1){
            alert(mvp_translate.attr('data-enter-just-id'));
            return;
        }
        else if(media_type.indexOf('vimeo') > -1 && v.indexOf('vimeo') > -1){
            alert(mvp_translate.attr('data-enter-just-id'));
            return;
        }

        if(media_type == 'youtube_single' || media_type == 'vimeo_single'){

            if(!isEmpty(v)){

                if(media_type == 'youtube_single')var url = 'https://www.youtube.com/watch?v=' + v;
                else if(media_type == 'vimeo_single')var url = 'https://vimeo.com/' + v;

                $.getJSON('https://noembed.com/embed',
                    {format: 'json', url: url}, function (data) {

                    if(data.title)title.val(data.title)
                    if(data.thumbnail_url){
                        thumb.val(data.thumbnail_url)
                        thumb_preview.attr('src',data.thumbnail_url);

                        poster.val(data.thumbnail_url)
                        poster_preview.attr('src',data.thumbnail_url);
                    }
                    if(data.description)description.val(data.description)
                    if(data.duration)duration.val(data.duration)

                    if(data.account_type) vimeo_account_type.val(data.account_type)
                    if(data.upload_date){
                        var d = data.upload_date.split(' ')
                        vimeo_upload_date.val(d[0])
                    }

                });
            }

        }

    })


    //slideshow images

    function updateSlideshowImages(){
        var s = ''

        slideshow_images_field.find('.slideshow-img').each(function(){
            s += $(this).attr('src') + ','
        })

        s = s.substr(0, s.length-1)//remove last comma
        slideshow_images.val(s)

        //toggle border around field
        if(slideshow_images_field.find('.slideshow-img-wrap').length == 0){
            slideshow_images_field.addClass('slideshow_images_field_hidden')
            slideshow_remove_all.hide()
        }else{
            slideshow_images_field.removeClass('slideshow_images_field_hidden')
            slideshow_remove_all.show()
        }

    }

    function createslideShowImage(url){
        return '<span class="slideshow-img-wrap"><button type="button" class="slideshow-img-remove">Remove</button><img class="slideshow-img" src="'+url+'" alt="image"/></span>'
    }

    var slideshow_images_field = mediaModal.find('#slideshow_images_field').on('click', '.slideshow-img-remove' , function(){
        $(this).closest('.slideshow-img-wrap').remove()

        updateSlideshowImages()

    }),

    slideshow_field = mediaModal.find('#slideshow_field'),
    slideshow_images = mediaModal.find('#slideshow_images'),
    slideshow_upload = mediaModal.find('#slideshow_upload'),
    slideshow_remove_all = mediaModal.find('#slideshow_remove_all').on('click', function(){

        var result = confirm(mvp_translate.attr('data-sure-to-clear'));
        if(result){
            slideshow_images_field.html('')
            updateSlideshowImages()
        }
    })

    if(slideshow_images_field.length){
        slideshow_images_field.sortable({
            items: ".slideshow-img-wrap",
            tolerance: 'pointer',
            helper: 'clone',

            stop: function(event, ui) {
                updateSlideshowImages()
            }
        });
    }


















    //playlist manager link to video

    var videoLinkModal = $('#mvp-video-link-modal'),
    videoLinkModalBg = videoLinkModal.find('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ // only if the target itself has been clicked
            removeVideoLinkModal()
        }
    }),
    videoLinkTa = videoLinkModal.find('#mvp-pl-video-link'),
    videoLinkMediaId,

    videoLinkPlayerType,
    videoLinkPlayerTypeRadio = videoLinkModal.find('input[name=vlpt]').on('change', function() {

        if($(this).is(':checked')){

            videoLinkPlayerType = $(this).val();

            if (videoLinkPlayerType == 'anon') {
                videoLinkModal.find('.vlpt-player-field').hide();
                videoLinkModal.find('.vlpt-anon-field').show();
            }
            else if (videoLinkPlayerType == 'player') {
                videoLinkModal.find('.vlpt-player-field').show();
                videoLinkModal.find('.vlpt-anon-field').hide();
            }

        }
    });

    function showVideoLinkModal(){

        videoLinkModal.show();
        videoLinkModalBg.scrollTop(0);
        _body.addClass('mvp-modal-open');

       getVideoLinkShortcode();

    }

    function getVideoLinkShortcode(){

        var preset = videoLinkModal.find('#preset').val(),
        playlistPosition = videoLinkModal.find('#playlistPosition').val(),
        auto_play = videoLinkModal.find('#autoPlay').val(),
        player_id = videoLinkModal.find('#vlpt-player-id').val(),
        includeWholePlaylist = videoLinkModal.find('#includeWholePlaylist').val(),
        sv_type = videoLinkModal.find('#vlpt-type').val()

        var s = '[apmvp'

        if(videoLinkPlayerType == 'anon'){
            s += ' preset="'+preset+'" playlist_position="'+playlistPosition+'"'
        }else{
            s += ' player_id="'+player_id+'"'
        }

        s += ' playlist_id="'+curr_playlist_id+'"'

        if(includeWholePlaylist == '0'){
            s += ' single_video="1"'
        }

        if(singleMediaSourcesArr.indexOf(sv_type) > -1){
            s += ' media_id="'+videoLinkMediaId+'"'
        }

        s += ' auto_play="'+auto_play+'"'

        s += ']'

        videoLinkTa.val(s)

    }

    function removeVideoLinkModal(){
        videoLinkModal.hide();
       _body.removeClass('mvp-modal-open');
    }

    videoLinkModal.on('click', '.mvp-video-link-modal-close', function(){
        removeVideoLinkModal();
    })

    videoLinkModal.on('click', '.mvp-video-get-shortcode', function(){
        getVideoLinkShortcode();
        videoLinkTa.select()
        document.execCommand("copy");
    })

    mediaTable.on('click', '.mvp-get-link', function(e){
        e.preventDefault()

        var parent = $(e.target).closest('.media-item'),
        id = parent.attr('data-media-id')
        videoLinkMediaId = id

        var title = parent.find('.media-title').html()
        videoLinkModal.find('#vlpt-title').html(title)

        var type = parent.find('.media-type').html()
        videoLinkModal.find('#vlpt-type').val(type)

        showVideoLinkModal()
        mvp_updatePlayerFields($)

        videoLinkPlayerTypeRadio.change();

    })














    //song pi


    //get icons

    var iconModal = $('#mvp-icon-modal'),
    iconModalBg = iconModal.find('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ // only if the target itself has been clicked
            removeIconModal()
        }
    }),
    iconModalCreated,
    iconModalReady,
    iconBtnTrigger,
    iconPickerList = iconModal.find('#icon-picker-list')

    function createIconModal(){

        //load css
        var head = document.getElementsByTagName('head')[0];
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = mvp_data.fontAwesomeUrl
        head.appendChild(link);

        $.ajax({
            type: 'GET',
            url: 'https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/metadata/icons.json',
            dataType: "json",
        }).done(function(response) {

            var s

            Object.keys(response).forEach(function(key) {
                //console.log(key, response[key]['unicode']);

                s = '<li class="mvp-icon-cont" title="'+key+'"><a><span class="mvp-fa-icon" data-value="'+response[key]['unicode']+'">&#x'+response[key]['unicode']+';</span><span class="mvp-fa-icon-name">'+key+'</span></a></li>'

                iconPickerList.append(s)
            });

            iconModalReady = true;

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
            iconModalReady = true;
        });

    }

    function showIconModal(){

        iconModal.show();
        iconModalBg.scrollTop(0);
        _body.addClass('mvp-modal-open');
    }

    function removeIconModal(){

        iconModal.hide();
       _body.removeClass('mvp-modal-open');

       //clear search
       iconPickerList.find('.mvp-icon-cont').show()
       iconSearchField.val('')

    }

    var iconSearchField = iconModal.find('#mvp-icon-search').on('keyup', function(){
        var value = $(this).val().toLowerCase()

        iconPickerList.find('.mvp-icon-cont').each(function(){
            var item = $(this),
            title = item.attr('title')

            if(title.indexOf(value) > -1){
                item.show()
            }else{
                item.hide()
            }

        })

    }).on('search', function(){//click clear
        if(this.value == ''){
            iconSearchField.trigger('keyup')
        }
    })

    iconModal.on('click', '.mvp-icon-modal-close', function(){
        removeIconModal();
    })

    iconPickerList.on('click', '.mvp-icon-cont', function(){
        var v = $(this).find('.mvp-fa-icon').attr('data-value')

        var icon = '&#x'+v+';'

        var cont = iconBtnTrigger.closest('.mvp-icon-table')

        cont.find('.mvp-pi-icon').val(icon)
        cont.find('.mvp-pi-icon-preview').html(icon)

        removeIconModal();

    })

    _doc.on('click', '.mvp-add-fa-icon', function(){

        iconBtnTrigger = $(this)

        if(!iconModalCreated){
            iconModalCreated = true;

            preloader.show()
            createIconModal()

            var interval = setInterval(function(){
                if(iconModalReady){
                    if(interval) clearInterval(interval);
                    preloader.hide()
                    showIconModal()
                }
            }, 100);

        }else{
            showIconModal()
        }

    })


    var mvp_pi_table_wrap = $('#mvp-pi-table-wrap').on('click', '.pi_remove', function(e){
        $(this).closest('.mvp-pi-table').remove();

        if(mvp_pi_table_wrap.children().length == 0){
            mvp_pi_table_wrap.hide()
        }
    });

    if(mvp_pi_table_wrap.length){
        mvp_pi_table_wrap.sortable({
            handle: '.mvp-pi-icon-sort',
            cancel: ''
        })
    }



    //add new pi

    $('#pi_add').on('click', function(e){
        addPi();
        mvp_pi_table_wrap.show()
    });

    function addPi(item){

        var bp = $('.mvp-pi-table-orig').clone().removeClass('mvp-pi-table-orig').addClass('mvp-pi-table').show().appendTo(mvp_pi_table_wrap);

        if(typeof item !== 'undefined'){

            bp.find('.mvp-pi-icon').prop('required', true).val(item.icon);
            if(item.icon)bp.find('.mvp-pi-icon-preview').html(item.icon);

            if(item.title)bp.find('.mvp-pi-title').val(item.title);
            if(item.url)bp.find('.mvp-pi-url').val(item.url);
            if(item.target)bp.find('.mvp-pi-target').val(item.target).change();
            if(item.rel)bp.find('.mvp-pi-rel').val(item.rel);
            if(item.class)bp.find('.mvp-pi-class').val(item.class);

        }else{

            bp.find('.mvp-pi-icon').prop('required', true)
        }

    }


















    var select_media_type_field = mediaModal.find('#select_media_type_field'),
    media_type,
    disabled_field = mediaModal.find('#disabled_field'),
    path_field = mediaModal.find('#path_field'),
    path = mediaModal.find('#path'),
    path_upload = mediaModal.find('#path_upload'),
    vimeo_account_type = mediaModal.find('#vimeo_account_type'),
    vimeo_upload_date = mediaModal.find('#vimeo_upload_date'),

    mp4_field = mediaModal.find('#mp4_field'),
    mp4 = mediaModal.find('#mp4'),
    title_field = mediaModal.find('#title_field'),
    title = mediaModal.find('#title'),
    description_field = mediaModal.find('#description_field'),
    description = mediaModal.find('#description'),
    description_custom = mediaModal.find('#description_custom'),
    thumb_field = mediaModal.find('#thumb_field'),
    thumb_alt_field = mediaModal.find('#thumb_alt_field'),
    thumb = mediaModal.find('#thumb').on('keyup',function(){
        if($(this).val() == ''){
            thumb_preview.attr('src',empty_src);
        }
    }),
    thumb_upload = mediaModal.find('#thumb_upload'),
    thumb_preview = mediaModal.find('#thumb_preview'),
    alt_text = mediaModal.find('#alt_text'),
    poster_field = mediaModal.find('#poster_field'),
    poster = mediaModal.find('#poster').on('keyup',function(){
        if($(this).val() == ''){
            poster_preview.attr('src',empty_src);
        }
    }),
    poster_upload = mediaModal.find('#poster_upload'),
    poster_preview = mediaModal.find('#poster_preview'),
    poster_frame_time_field = mediaModal.find('#poster_frame_time_field'),
    poster_frame_time = mediaModal.find('#poster_frame_time'),
    poster_audio_info = mediaModal.find('#poster_audio_info'),

    exclude_field = mediaModal.find('#exclude_field'),
    exclude = mediaModal.find('#exclude'),

    hl_field = mediaModal.find('#hl_field'),
    hl = mediaModal.find('#hl'),

    cc_lang_pref_field = mediaModal.find('#cc_lang_pref_field'),
    cc_lang_pref = mediaModal.find('#cc_lang_pref'),

    bkey_field = mediaModal.find('#bkey_field'),
    bkey = mediaModal.find('#bkey'),

    download_field = mediaModal.find('#download_field'),
    download = mediaModal.find('#download'),
    download_upload = mediaModal.find('#download_upload'),

    preview_seek_upload = mediaModal.find('#preview_seek_upload'),
    preview_seek_field = mediaModal.find('#preview_seek_field'),
    preview_seek = mediaModal.find('#preview_seek'),
    hover_preview_upload = mediaModal.find('#hover_preview_upload'),
    hover_preview_field = mediaModal.find('#hover_preview_field'),
    hover_preview = mediaModal.find('#hover_preview'),
    folder_sort = mediaModal.find('#folder_sort'),
    limit = mediaModal.find('#limit'),

    chapters_upload = mediaModal.find('#chapters_upload'),
    chapters_field = mediaModal.find('#chapters_field'),
    chapters = mediaModal.find('#chapters'),
    chapters_cors = mediaModal.find('#chapters_cors'),
    share_field = mediaModal.find('#share_field'),
    limit_field = mediaModal.find('#limit_field'),
    id3_field = mediaModal.find('#id3_field'),
    id3 = mediaModal.find('#id3'),
    folder_custom_url_field = mediaModal.find('#folder_custom_url_field'),
    folder_custom_url = mediaModal.find('#folder_custom_url'),

    vast_upload = mediaModal.find('#vast_upload'),
    vast = mediaModal.find('#vast'),
    vast_loop = mediaModal.find('#vast_loop'),

    folder_sort_field = mediaModal.find('#folder_sort_field'),//folder sort
    start_field = mediaModal.find('#start_field'),
    start = mediaModal.find('#start'),
    end_field = mediaModal.find('#end_field'),
    end = mediaModal.find('#end'),
    playback_rate_field = mediaModal.find('#playback_rate_field'),
    playback_rate = mediaModal.find('#playback_rate'),
    yt_quality_field = mediaModal.find('#yt_quality_field'),

    yt_sort_field = mediaModal.find('#yt_sort_field'),
    yt_sort = mediaModal.find('#yt_sort'),

    vimeo_channel_sort_field = mediaModal.find('#vimeo_channel_sort_field'),
    vimeo_channel_sort = mediaModal.find('#vimeo_channel_sort'),
    vimeo_album_sort_field = mediaModal.find('#vimeo_album_sort_field'),
    vimeo_album_sort = mediaModal.find('#vimeo_album_sort'),
    vimeo_group_sort_field = mediaModal.find('#vimeo_group_sort_field'),
    vimeo_group_sort = mediaModal.find('#vimeo_group_sort'),
    vimeo_video_query_sort_field = mediaModal.find('#vimeo_video_query_sort_field'),
    vimeo_folder_sort_field = mediaModal.find('#vimeo_folder_sort_field'),
    vimeo_folder_sort = mediaModal.find('#vimeo_folder_sort'),
    vimeo_ondemand_sort_field = mediaModal.find('#vimeo_ondemand_sort_field'),
    vimeo_ondemand_sort = mediaModal.find('#vimeo_ondemand_sort'),

    vimeo_sort_dir_field = mediaModal.find('#vimeo_sort_dir_field'),
    vimeo_sort_dir = mediaModal.find('#vimeo_sort_dir'),

    lock_time_field = mediaModal.find('#lock_time_field'),
    lock_time = mediaModal.find('#lock_time'),
    noapi_field = mediaModal.find('#noapi_field'),
    noapi = mediaModal.find('#noapi'),
    is360_field = mediaModal.find('#is360_field'),
    is360 = mediaModal.find('#is360'),
    vrMode_field = mediaModal.find('#vrMode_field'),
    vrMode = mediaModal.find('#vrMode'),

    gdrive_sort_field = mediaModal.find('#gdrive_sort_field'),
    gdrive_sort = mediaModal.find('#gdrive_sort'),

    onedrive_sort_field = mediaModal.find('#onedrive_sort_field'),
    onedrive_sort = mediaModal.find('#onedrive_sort'),

    user_id_field = mediaModal.find('#user_id_field'),
    user_id = mediaModal.find('#user_id'),
    duration_field = mediaModal.find('#duration_field'),
    duration = mediaModal.find('#duration'),
    pwd_field = mediaModal.find('#pwd_field'),
    pwd = mediaModal.find('#pwd'),
    vpwd_field = mediaModal.find('#vpwd_field'),
    vpwd = mediaModal.find('#vpwd'),

    age_verify = mediaModal.find('#age_verify'),

    link = mediaModal.find('#link'),
    target = mediaModal.find('#target'),

    end_link_field = mediaModal.find('#end_link_field'),
    end_link = mediaModal.find('#end_link'),
    end_target_field = mediaModal.find('#end_target_field'),
    end_target = mediaModal.find('#end_target'),
    islive_field = mediaModal.find('#islive_field'),
    islive = mediaModal.find('#islive'),

    cue_point_field = mediaModal.find('#cue_point_field'),

    date = mediaModal.find('#date'),

    //info
    video_info = mediaModal.find('#video_info'),
    audio_info = mediaModal.find('#audio_info'),
    image_info = mediaModal.find('#image_info'),
    folder_info = mediaModal.find('#folder_info'),
    gdrive_info = mediaModal.find('#gdrive_info'),
    onedrive_info = mediaModal.find('#onedrive_info'),
    custom_info = mediaModal.find('#custom_info'),
    custom_html_info = mediaModal.find('#custom_html_info'),
    hls_info = mediaModal.find('#hls_info'),
    dash_info = mediaModal.find('#dash_info'),
    yt_video_info = mediaModal.find('#yt_video_info'),
    yt_video_multiple_info = mediaModal.find('#yt_video_multiple_info'),
    yt_playlist_info = mediaModal.find('#yt_playlist_info'),
    yt_channel_info = mediaModal.find('#yt_channel_info'),
    yt_user_info = mediaModal.find('#yt_user_info'),
    yt_query_info = mediaModal.find('#yt_query_info'),
    vim_video_info = mediaModal.find('#vim_video_info'),
    vim_video_multiple_info = mediaModal.find('#vim_video_multiple_info'),
    vim_channel_info = mediaModal.find('#vim_channel_info'),
    vim_group_info = mediaModal.find('#vim_group_info'),
    vim_album_info = mediaModal.find('#vim_album_info'),
    vim_folder_info = mediaModal.find('#vim_folder_info'),
    vim_ondemand_info = mediaModal.find('#vim_ondemand_info'),
    xml_info = mediaModal.find('#xml_info'),
    json_info = mediaModal.find('#json_info'),
    poster_info = mediaModal.find('#poster_info'),
    s3_bucket_video_info = mediaModal.find('#s3_bucket_video_info')


    var randomizeAdPre = mediaModal.find('#randomizeAdPre'),
    randomizeAdEnd = mediaModal.find('#randomizeAdEnd')



    var path_remove = editMediaForm.find("#path_remove").on('click', function(e){
        e.preventDefault();
        path.val('');
    });

    var thumb_remove = editMediaForm.find("#thumb_remove").on('click', function(e){
        e.preventDefault();
        thumb_preview.attr('src',empty_src);
        thumb.val('');
    });
    if(thumb.val() != ''){
        thumb_remove.show();
    }

    var poster_remove = editMediaForm.find("#poster_remove").on('click', function(e){
        e.preventDefault();
        poster_preview.attr('src',empty_src);
        poster.val('');
    });
    if(poster.val() != ''){
        poster_remove.show();
    }





    var inited,
    last_media_type,//save
    type_selector = mediaModal.find('#type').on('change',function(){


        media_type = $(this).val();

        //hide
        path_field.hide();
        path_upload.hide();
        path_remove.hide();
        mp4_field.hide();
        path.attr('ap-required', false).val('');

        bkey_field.hide();
        bkey.attr('ap-required', false);

        exclude_field.hide();
        hl_field.hide()
        cc_lang_pref_field.hide()


        multi_path_field.hide().find('.multi_path, .quality_title').val('').attr('ap-required', false);
        if(inited){
            multi_path_content.find('.multi_path_section').slice(1).remove();
        }
        title_field.hide();
        description_field.hide();
        thumb_field.hide();
        thumb_alt_field.hide();
        poster_field.hide();
        poster_frame_time_field.hide();
        poster_audio_info.hide();
        download_field.hide();
        share_field.hide();
        limit_field.hide();
        id3_field.hide();
        folder_sort_field.hide();
        folder_custom_url_field.hide();
        gdrive_sort_field.hide();
        onedrive_sort_field.hide();
        if(inited){
            subtitle_content.find('.subtitle_section').hide().slice(1).remove();
            subtitle_content.find('.subtitle_label, .subtitle_src').each(function(){
                $(this).attr('ap-required', false).val('');
            });
        }
        slideshow_field.hide()

        yt_quality_field.hide();
        noapi_field.hide();
        is360_field.hide();
        vrMode_field.hide();
        islive_field.hide();
        playback_rate_field.hide();
        subtitle_field.hide();
        preview_seek_field.hide();
        hover_preview_field.hide();
        chapters_field.hide();
        start_field.hide();
        end_field.hide();
        duration_field.hide();
        pwd_field.hide();
        vpwd_field.hide();
        end_link_field.hide();
        end_target_field.hide();
        cue_point_field.hide();

        user_id_field.hide();
        user_id.attr('ap-required', false).val('');



        //info
        video_info.hide();
        audio_info.hide();
        image_info.hide();
        folder_info.hide();
        gdrive_info.hide();
        onedrive_info.hide();
        custom_info.hide();
        custom_html_info.hide();
        hls_info.hide();
        dash_info.hide();
        yt_video_info.hide();
        yt_video_multiple_info.hide();
        yt_playlist_info.hide();
        yt_channel_info.hide();
        yt_user_info.hide();
        yt_query_info.hide();
        vim_video_info.hide();
        vim_video_multiple_info.hide();
        vim_channel_info.hide();
        vim_group_info.hide();
        vim_album_info.hide();
        vim_folder_info.hide();
        vim_ondemand_info.hide();
        xml_info.hide();
        json_info.hide();
        s3_bucket_video_info.hide();

        poster_info.show()


        //sort
        yt_sort_field.hide();
        vimeo_channel_sort_field.hide();
        vimeo_album_sort_field.hide();
        vimeo_group_sort_field.hide();
        vimeo_video_query_sort_field.hide();
        vimeo_ondemand_sort_field.hide();
        vimeo_folder_sort_field.hide();
        vimeo_sort_dir_field.hide();


        preview_seek_field.show();





        if(editMediaForm.length && inited){

            if(!editMediaForm.hasClass('mvp-not-form')){
                editMediaForm[0].reset();
            }else{
                resetForm(editMediaForm)
            }

        }

        $(this).val(media_type);//reset on type change so we dont get not used vars for different media in db table

        if(mediaSaveType == 'add_media'){
            date.val(getDate())
        }






        if(media_type == 'video'){

            multi_path_field.show().find('.multi_path_section').find('.multi_path, .quality_title').attr('ap-required', true);

            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            poster_field.show();
            poster_frame_time_field.show();
            share_field.show();
            download_field.show();
            duration_field.show();
            $('.duration-media-info').show();
            $('.duration-image-info').hide();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            subtitle_field.show();
            chapters_field.show();
            hover_preview_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            is360_field.show();
            vrMode_field.show();
            islive_field.show();
            cue_point_field.show();

            video_info.show()

        }else if(media_type == 's3_bucket_video' || media_type == 's3_bucket_audio'){

            path_field.show();
            path.attr('ap-required', true);
            gdrive_sort_field.show();

            s3_bucket_video_info.show();

            is360_field.show();
            vrMode_field.show();

        }else if(media_type == 's3_video' || media_type == 's3_audio'){

            path_field.show();
            path.attr('ap-required', true);

            s3_bucket_video_info.show();

            bkey_field.show();
            bkey.attr('ap-required', true);

            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            poster_field.show();
            poster_frame_time_field.show();
            share_field.show();
            download_field.show();
            duration_field.show();
            $('.duration-media-info').show();
            $('.duration-image-info').hide();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            subtitle_field.show();
            chapters_field.show();
            hover_preview_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            is360_field.show();
            vrMode_field.show();
            cue_point_field.show();

        }else if(media_type == 'hls'){

            path_field.show();
            path.attr('ap-required', true);
            path_upload.show();

            mp4_field.show();
            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            poster_field.show();
            share_field.show();
            download_field.show();
            playback_rate_field.show();
            subtitle_field.show();
            chapters_field.show();
            hover_preview_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            islive_field.show();
            is360_field.show();
            vrMode_field.show();

            hls_info.show();

        }else if(media_type == 'dash'){

            path_field.show();
            path.attr('ap-required', true);
            path_upload.show();

            mp4_field.show();
            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            poster_field.show();
            share_field.show();
            download_field.show();
            playback_rate_field.show();
            subtitle_field.show();
            chapters_field.show();
            hover_preview_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            islive_field.show();
            is360_field.show();
            vrMode_field.show();

            dash_info.show();

        }else if(media_type == 'audio'){

            multi_path_field.show().find('.multi_path_section').find('.multi_path, .quality_title').attr('ap-required', true);

            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            poster_field.show();
            share_field.show();
            download_field.show();
            duration_field.show();
            $('.duration-media-info').show();
            $('.duration-image-info').hide();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            subtitle_field.show();
            chapters_field.show();
            hover_preview_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            cue_point_field.show();

            slideshow_field.show()

            poster_info.hide()
            poster_audio_info.show();

        }else if(media_type == 'folder_video' || media_type == 'folder_audio' || media_type == 'folder_hls' || media_type == 'folder_dash'){

            path_field.show();
            path.attr('ap-required', true);

            limit_field.show();
            folder_sort_field.show();
            share_field.show();
            download_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            folder_custom_url_field.show();

            folder_info.show();

            if(media_type == 'folder_video' || media_type == 'folder_hls' || media_type == 'folder_dash'){
                is360_field.show();
                vrMode_field.show();
            }
            else if(media_type == 'folder_audio')id3_field.show();

        }else if(media_type == 'image'){

            path_field.show();
            path.attr('ap-required', true);
            path_upload.show();
            path_remove.show();

            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            share_field.show();
            download_field.show();
            duration_field.show();
            $('.duration-media-info').hide();
            $('.duration-image-info').show();
            hover_preview_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            is360_field.show();
            folder_custom_url_field.show();

            image_info.show();

        }else if(media_type == 'folder_image'){

            path_field.show();
            path.attr('ap-required', true);

            limit_field.show();
            folder_sort_field.show();
            folder_info.show();
            share_field.show();
            download_field.show();

        }else if(media_type == 'gdrive_folder'){

            path_field.show();
            path.attr('ap-required', true);

            gdrive_info.show();
            gdrive_sort_field.show();
            share_field.show();

            is360_field.show();
            vrMode_field.show();

        }else if(media_type == 'onedrive_folder'){

            path_field.show();
            path.attr('ap-required', true);

            onedrive_info.show();
            onedrive_sort_field.show();
            share_field.show();

            is360_field.show();
            vrMode_field.show();

        }else if(media_type == 'youtube_single'){

            path_field.show();
            path.attr('ap-required', true);

            download_field.show();
            yt_quality_field.show();
            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            poster_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            duration_field.show();
            hover_preview_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            subtitle_field.show();
            noapi_field.show();
            is360_field.show();
           // islive_field.show();
            hl_field.show();
            cc_lang_pref_field.show();
            cue_point_field.show();

            yt_video_info.show();

        }else if(media_type == 'youtube_single_list'){

            path_field.show();
            path.attr('ap-required', true);

            yt_quality_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            subtitle_field.show();
           // islive_field.show();
            is360_field.show();
            hl_field.show();
            cc_lang_pref_field.show();

            yt_video_multiple_info.show();

        }else if(media_type == 'youtube_playlist'){

            path_field.show();
            path.attr('ap-required', true);

            yt_quality_field.show();
            limit_field.show();
            playback_rate_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();
            hl_field.show();
            cc_lang_pref_field.show();

            yt_playlist_info.show();

        }else if(media_type == 'youtube_channel'){

            path_field.show();
            path.attr('ap-required', true);

            yt_quality_field.show();
            limit_field.show();
            share_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();
            hl_field.show();
            cc_lang_pref_field.show();

            yt_channel_info.show();
          //  yt_sort_field.show();

        }else if(media_type == 'vimeo_single'){

            path_field.show();
            path.attr('ap-required', true);

            download_field.show();
            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            poster_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            duration_field.show();
            noapi_field.show();
            is360_field.show();
            hover_preview_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            subtitle_field.show();
            islive_field.show();
            cue_point_field.show();

            vim_video_info.show();

        }else if(media_type == 'vimeo_single_list'){

            path_field.show();
            path.attr('ap-required', true);

            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            subtitle_field.show();
            islive_field.show();
            is360_field.show();

            vim_video_multiple_info.show();

        }else if(media_type == 'vimeo_group'){

            path_field.show();
            path.attr('ap-required', true);

            limit_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();

            vim_group_info.show();

            vimeo_group_sort_field.show();
            vimeo_sort_dir_field.show();

        }else if(media_type == 'vimeo_channel'){

            path_field.show();
            path.attr('ap-required', true);

            limit_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();

            vim_channel_info.show();

            vimeo_channel_sort_field.show();
            vimeo_sort_dir_field.show();

        }else if(media_type == 'vimeo_user_album'){

            user_id_field.show();
            user_id.attr('ap-required', true);
            path_field.show();
            path.attr('ap-required', true);

            limit_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();

            vim_album_info.show();

            vimeo_album_sort_field.show();
            vimeo_sort_dir_field.show();

        }else if(media_type == 'vimeo_album'){

            path_field.show();
            path.attr('ap-required', true);

            limit_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();

            vim_album_info.show();

            vimeo_album_sort_field.show();
            vimeo_sort_dir_field.show();

        }else if(media_type == 'vimeo_user_videos'){

            user_id_field.show();
            user_id.attr('ap-required', true);

            limit_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();

        }else if(media_type == 'vimeo_ondemand'){

            path_field.show();
            path.attr('ap-required', true);

            limit_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();

            vim_ondemand_info.show();

            vimeo_ondemand_sort_field.show();
            vimeo_sort_dir_field.show();

        }else if(media_type == 'vimeo_folder'){

            path_field.show();
            path.attr('ap-required', true);

            user_id_field.show();
            user_id.attr('ap-required', true);

            limit_field.show();
            playback_rate_field.show();
            start_field.show();
            end_field.show();
            pwd_field.show();
            vpwd_field.show();
            end_link_field.show();
            end_target_field.show();
            exclude_field.show();

            vim_folder_info.show();

            vimeo_folder_sort_field.show();
            vimeo_sort_dir_field.show();

        }else if(media_type == 'custom_html'){

            path_field.show();
            path.attr('ap-required', true);
            poster_field.show();

            custom_html_info.show();

            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            hover_preview_field.show();

            duration_field.show();
            $('.duration-media-info').hide();
            $('.duration-image-info').show();

        }else if(media_type == 'custom'){

            path_field.show();
            path.attr('ap-required', true);
            path_upload.show();
            poster_field.show();

            custom_info.show();

            title_field.show();
            description_field.show();
            thumb_field.show();
            thumb_alt_field.show();
            hover_preview_field.show();

            duration_field.show();
            $('.duration-media-info').hide();
            $('.duration-image-info').show();

        }else if(media_type == 'xml'){

            path_field.show();
            path.attr('ap-required', true);
            path_upload.show();

            xml_info.show();

        }else if(media_type == 'json'){

            path_field.show();
            path.attr('ap-required', true);
            path_upload.show();

            json_info.show();

        }


        inited = true;

    });




    function resetForm(form) {

        form.find('input:text, input:password, input:file, input:hidden, select, textarea').val('');
        form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');

        form.find('.mvp-img-preview').attr('src', empty_src)

    }

    function inputMediaFields(method, response){

        var data = response.data, tax_data = response.tax;

        type_selector.val(data.type);
        type_selector.change()

        if(method == 'add')select_media_type_field.find('#type').attr('disabled', false);
        else select_media_type_field.find('#type').attr('disabled', true);

        //disabled
        var disabled;
        if(data.disabled == "1" || data.disabled == "0")disabled = data.disabled;
        else disabled = "0";
        disabled_field.val(disabled)

        //path

        if(media_type == 'video' || media_type == 'audio'){

            var i, len = response.multi_path_query_result.length, cont, obj
            for(i = 0; i <len; i++){
                obj = response.multi_path_query_result[i]

                cont = mediaModal.find('.multi_path_section_orig').clone().removeClass('multi_path_section_orig').addClass('multi_path_section')
                .insertBefore(mediaModal.find('.multi_path_section_orig'))
                cont.find('.multi_path_field_remove').show()

                cont.find('.multi_path').val(obj.path)
                cont.find('.quality_title').val(obj.quality_title)

                if(obj.def && obj.def == obj.quality_title){
                    cont.find('.quality_default').prop('checked', 'checked')
                }
                if(obj.defMobile && obj.defMobile == obj.quality_title){
                    cont.find('.quality_mobile_default').prop('checked', 'checked')
                }

            }

        }else{
            //vimeo user video does not have path, only user id
            if(response.multi_path_query_result.length){

                var obj = response.multi_path_query_result[0]

                path.val(obj.path)

                if(obj.mp4)mp4.val(obj.mp4)
            }
        }

        if(data.exclude)exclude.val(data.exclude);

        if(data.hl)hl.val(data.hl);
        if(data.cc_lang_pref)cc_lang_pref.val(data.cc_lang_pref);

        if(data.bkey)bkey.val(data.bkey);
        if(data.folder_custom_url == '1')folder_custom_url.prop('checked', true)

        if(data.id3)id3.val(data.id3)
        if(data.folder_sort)folder_sort.val(data.folder_sort)
        if(data.gdrive_sort)gdrive_sort.val(data.gdrive_sort);
        if(data.onedrive_sort)onedrive_sort.val(data.onedrive_sort);
        if(data.user_id)user_id.val(data.user_id)
        if(data.limit)limit.val(data.limit)

        if(data.yt_sort)yt_sort.val(data.yt_sort)

        if(data.vimeo_channel_sort)vimeo_channel_sort.val(data.vimeo_channel_sort)
        if(data.vimeo_album_sort)vimeo_album_sort.val(data.vimeo_album_sort)
        if(data.vimeo_group_sort)vimeo_group_sort.val(data.vimeo_group_sort)
        if(data.vimeo_ondemand_sort)vimeo_ondemand_sort.val(data.vimeo_ondemand_sort)
        if(data.vimeo_folder_sort)vimeo_folder_sort.val(data.vimeo_folder_sort)
        if(data.vimeo_sort_dir)vimeo_sort_dir.val(data.vimeo_sort_dir)

        if(data.is360)is360.val(data.is360)
        if(data.vrMode)vrMode.val(data.vrMode)
        if(data.noapi)noapi.val(data.noapi)
        if(data.islive)islive.val(data.islive)
        if(data.lock_time != undefined)lock_time.val(data.lock_time)
        if(data.date)date.val(data.date)

        if(data.pi_icons){
            var i, len = data.pi_icons.length;
            for(i=0;i<len;i++){
                addPi(data.pi_icons[i]);
            }
            mvp_pi_table_wrap.show()
        }

        if(data.poster){
            poster.val(data.poster);
            poster_preview.attr('src',data.poster);
        }

        if(data.slideshow_images){
            var i, arr = data.slideshow_images.split(','), len = arr.length
            for(i = 0; i < len; i++){
                slideshow_images_field.append(createslideShowImage(arr[i]))
            }
            updateSlideshowImages()
        }

        if(data.poster_frame_time != undefined)poster_frame_time.val(data.poster_frame_time);
        if(data.thumb){
            thumb.val(data.thumb);
            thumb_preview.attr('src',data.thumb);
        }
        if(data.alt_text)alt_text.val(data.alt_text);//thumb alt
        if(data.hover_preview)hover_preview.val(data.hover_preview);

        if(data.title)title.val(data.title);
        if(data.description)description.val(data.description);

        if(data.description_custom)description_custom.val(data.description_custom);

        if(data.download)download.val(data.download);
        if(data.start)start.val(data.start);
        if(data.end)end.val(data.end);
        if(data.playback_rate)playback_rate.val(data.playback_rate);

        if(data.preview_seek)preview_seek.val(data.preview_seek);
        if(data.chapters)chapters.val(data.chapters);
        if(data.chapters_cors)chapters_cors.prop('checked', 'checked')

        if(data.vast){
            vast.val(data.vast);
            if(data.vast_loop)vast_loop.val(data.vast_loop)
        }

        //subs
        if(response.subtitle){
            var i, len = response.subtitle.length, cont, obj
            for(i = 0; i < len; i++){
                obj = response.subtitle[i]

                cont = mediaModal.find('.subtitle_section_orig').clone().removeClass('subtitle_section_orig').addClass('subtitle_section')
                .insertBefore(mediaModal.find('.subtitle_section_orig'))

                cont.find('.subtitle_src').val(obj.src)
                cont.find('.subtitle_label').val(obj.label)

                if(obj.def && obj.def == obj.label){
                    cont.find('.subtitle_default').prop('checked', 'checked')
                }

                if(obj.cors){
                    cont.find('.subtitle_cors').prop('checked', 'checked')
                }

            }
        }

        if(data.cue_point){
          var i, len = data.cue_point.length, cont, obj
          for(i = 0; i < len; i++){
              obj = data.cue_point[i]

              cont = mediaModal.find('.cue_point_section_orig').clone().removeClass('cue_point_section_orig').addClass('cue_point_section')
              .insertBefore(mediaModal.find('.cue_point_section_orig'))

              cont.find('.cue_start_time').val(obj.cue_start_time)
              cont.find('.cue_code_type').val(obj.cue_code_type)
              cont.find('.cue_code').val(obj.cue_code)

          }
        }

        if(data.duration)duration.val(data.duration);
        if(data.link)link.val(data.link);
        if(data.target)target.val(data.target);
        if(data.end_link)end_link.val(data.end_link);
        if(data.end_target)end_target.val(data.end_target);
        if(data.pwd)pwd.val(data.pwd);
        if(data.vpwd)vpwd.val(data.vpwd);
        if(data.age_verify)age_verify.val(data.age_verify);

        //ads

        if(response.ad_data){

            var i, len = response.ad_data.length, obj

            if(len > 0){
                for(i = 0; i < len; i++){
                    obj = response.ad_data[i]
                    _MVPAdContent.addAdSource(obj.ad_type, obj, true);
                }
               /* _MVPAdContent.adjustAd('ad_pre');
                _MVPAdContent.adjustAd('ad_mid');
                _MVPAdContent.adjustAd('ad_end');*/
            }

        }

        _MVPAdContent.setRandomize(data)

        //annotations

        if(response.annotation_data){

            var i, len = response.annotation_data.length, obj

            if(len > 0){
                for(i = 0; i < len; i++){
                    obj = response.annotation_data[i]
                    _MVPAdContent.addAnnotationSource(obj, true);
                }
               // _MVPAdContent.adjustAnnotation();
            }
        }

    }






    //shortcode manager get video shortcode

    var get_video_shortcode_submit = $('.mvp-get-video-shortcode-submit')
    if(get_video_shortcode_submit.length){

        multi_path_field_add.click()//create first field on start
        type_selector.change();
    }





    /* uploaders */

    var playlistUploadManagerArr = [
        {btn: editMediaForm.find("#path_upload"), manager:null},
        {btn: editMediaForm.find("#poster_upload"), manager:null},
        {btn: editMediaForm.find("#slideshow_upload"), manager:null},
        {btn: editMediaForm.find("#thumb_upload"), manager:null},
        {btn: editMediaForm.find("#download_upload"), manager:null},
        {btn: editMediaForm.find("#preview_seek_upload"), manager:null},
        {btn: editMediaForm.find("#hover_preview_upload"), manager:null},
        {btn: editMediaForm.find("#chapters_upload"), manager:null},
        {btn: editMediaForm.find("#vast_upload"), manager:null},
        {btn: playlist_options_tabs.find("#pl_thumb_upload"), manager:null},
    ];
    setUploadManagerPlaylist(playlistUploadManagerArr);

    function setUploadManagerPlaylist(arr){
        var i, len = arr.length, item;
        for(i=0;i<len;i++){
            item = arr[i].btn.attr('data-id',i);

            item.on('click',function(e){
                e.preventDefault();

                var library, source, id = $(this).attr("id"), data_id = parseInt($(this).attr("data-id"),10), custom_uploader, multiple;

                if(playlistUploadManagerArr[data_id].manager){//reuse
                    playlistUploadManagerArr[data_id].manager.open();
                    return;
                }

                if(id == 'path_upload'){

                    if(media_type == 'image')library = "image";
                    else if(media_type == 'hls' || media_type == 'dash')library = "";
                    else if(media_type == 'xml' || media_type == 'json')library = "application/xml,application/json,text/*";

                    source = path;

                }else if(id == 'thumb_upload'){

                    library = "image";
                    source = thumb;

                }else if(id == 'poster_upload'){

                    library = "image";
                    source = poster;

                }else if(id == 'slideshow_upload'){

                    library = "image";
                    source = slideshow_images_field;
                    multiple = true;

                }else if(id == 'download_upload'){

                    library = "";//allow anything
                    source = download;

                }else if(id == 'preview_seek_upload'){

                    library = "";
                    source = preview_seek;

                }else if(id == 'hover_preview_upload'){

                    library = "image/gif, video";
                    source = hover_preview;

                }else if(id == 'chapters_upload'){

                    library = "";
                    source = chapters;

                }else if(id == 'vast_upload'){

                    library = "";
                    source = vast;

                }else if(id == 'pl_thumb_upload'){

                    library = "image";
                    source = '#pl_thumb';

                }

                custom_uploader = wp.media({
                    library:{
                        type: library
                    },
                    multiple: multiple
                })
                .on("select", function(){

                    if(multiple){

                        var attachment_data = custom_uploader.state().get('selection').map(
                            function( attachment ) {
                                attachment.toJSON();
                                return attachment;
                        });

                        if(source == slideshow_images_field){

                            var i, attachment, len = attachment_data.length, media_data = [], obj;
                            for (i = 0; i < len; i++) {

                                attachment = attachment_data[i].attributes

                                slideshow_images_field.append(createslideShowImage(attachment.url))

                            }

                            updateSlideshowImages()

                        }

                    }else{

                        var attachment = custom_uploader.state().get("selection").first().toJSON();
                        $(source).val(attachment.url);

                        if(source == path){
                            path_remove.show();
                        }
                        else if(source == thumb){
                            thumb_preview.attr('src', attachment.url);
                            thumb_remove.show();
                        }
                        else if(source == poster){
                            poster_preview.attr('src', attachment.url);
                            poster_remove.show();
                        }
                        else if(source == '#pl_thumb'){
                            pl_thumb_preview.attr('src', attachment.url);
                            pl_thumb_remove.show();
                        }

                    }

                })
                .open();

                playlistUploadManagerArr[data_id].manager = custom_uploader;//save for reuse

            });
        }
    }




    /* domain-rename */

    $('#mvp-domain-rename').on('click', function(e){

        var from = $('#mvp-domain-rename-from').val(),
        to = $('#mvp-domain-rename-to').val()

        if(!isEmpty(from) && !isEmpty(to)){

            var result = confirm(mvp_translate.attr('data-sure-to-rename'));
            if(result){

                var replaceData

                preloader.show();

                var postData = [
                    {name: 'action', value: 'mvp_domain_rename'},
                    {name: 'playlist_id', value: curr_playlist_id},
                    {name: 'from', value: from},
                    {name: 'to', value: to},
                    {name: 'security', value: mvp_data.security}
                ];

                $.ajax({
                    url: mvp_data.ajax_url,
                    type: 'post',
                    data: postData,
                    dataType: 'json',
                }).done(function(response){

                    var container, path

                    mediaItemList.find('.media-item').each(function(){
                        container = $(this)

                        path = container.find('.media-path').html()
                        path = path.replace(from, to);
                        container.find('.media-path').html(path)

                        path = container.find('.mvp-media-thumb-img').attr('src')
                        path = path.replace(from, to);
                        container.find('.mvp-media-thumb-img').attr('src', path)

                    })

                    preloader.hide();

                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText, textStatus, errorThrown);
                    preloader.hide();
                });

            }

        }

    })




    /* export / import */



    //export playlist

    // --- MODIFIED Export Handler ---
    $('.mvp-table').on('click','.mvp-export-playlist-btn', function(){

        preloader.show();

        var playlist_id = $(this).attr('data-playlist-id'),
        playlist_title = $(this).closest('.mvp-playlist-row').find('.title-editable').val();

        var postData = [
            {name: 'action', value: 'mvp_export_playlist'},
            {name: 'playlist_id', value: playlist_id},
            {name: 'playlist_title', value: playlist_title}, // Send original title, PHP sanitizes for filename
            {name: 'security', value: mvp_data.security}
        ];

        // Use a standard form submission approach to trigger the download reliably
        // Create a temporary form
        var tempForm = $('<form></form>');
        tempForm.attr('method', 'post');
        tempForm.attr('action', mvp_data.ajax_url); // Post to admin-ajax.php

        // Add data as hidden inputs
        $.each(postData, function(key, val) {
            var input = $('<input></input>');
            input.attr('type', 'hidden');
            input.attr('name', val.name);
            input.attr('value', val.value);
            tempForm.append(input);
        });

        // Append form to body and submit
        $('body').append(tempForm);
        tempForm.submit();
        tempForm.remove(); // Remove the temporary form

        // Hide preloader after a short delay, assuming download started
        setTimeout(function() {
             preloader.hide();
        }, 1500); // Adjust delay as needed


        /* --- OLD AJAX Method (less reliable for file downloads) ---
        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json', // Expect JSON *only* for errors now
        }).done(function(response){
            // This .done() might not fire reliably for file downloads.
            // Assuming success if .fail() doesn't run.
            preloader.hide();
            // console.log('Export initiated. Download should start.');

        }).fail(function(jqXHR, textStatus, errorThrown) {
            // Handle errors returned as JSON from PHP
            var errorMsg = mvp_translate.attr('data-error-importing'); // Generic default
            if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {
                errorMsg = jqXHR.responseJSON.data.message;
            } else if (jqXHR.responseText) {
                 console.log('Export Error Raw:', jqXHR.responseText); // Log raw error for debugging
                 if (jqXHR.responseText.toLowerCase().includes('error')) {
                     errorMsg = 'An unexpected server error occurred during export.';
                 }
            }
            alert('Export Failed: ' + errorMsg); // Show error to user
            console.log('Export Error:', jqXHR, textStatus, errorThrown);
            preloader.hide();
        });
        */

        return false; // Prevent default link behavior

    });


    //import playlist

    var playlistFileInput = $('#mvp-playlist-file-input').on('change', preparePlaylistUpload);

    var import_playlist_btn = $('#mvp-import-playlist').click(function(){
        playlistFileInput.trigger('click');
        return false;
    });

    // Removed: var importPlaylistData; (No longer needed for multi-step process)

    // --- MODIFIED Import Handler ---
    function preparePlaylistUpload(event) {

        // Basic file check - check extension as well
        if(event.target.files.length == 0) return;
        var file = event.target.files[0];
        var fileName = file.name;
        var fileExt = fileName.split('.').pop().toLowerCase();

        // Improved check for JSON file
        if(fileExt !== 'json'){
            alert('Invalid file type. Please upload a .json file exported from MVP.'); // More specific message
            playlistFileInput.val(''); // Clear the file input
            return;
        }

        preloader.show();
        import_playlist_btn.hide(); // Hide button during upload

        var data = new FormData();
        data.append("mvp_file_upload", file); // Use the 'file' object directly
        data.append("action", "mvp_import_playlist_json"); // <--- CHANGED ACTION
        data.append("security", mvp_data.security );

        playlistFileInput.val(''); // Clear input after getting file data

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
        }).done(function(response){
             // --- NEW Success Handling ---
            console.log('Import Response:', response);
            preloader.hide();
            import_playlist_btn.show(); // Show button again

            if (response.success) {
                 alert('Success: ' + response.data.message);
                 // Reload the page to see the new playlist
                 window.location.reload();
                 // TODO (Optional): Dynamically add the new playlist row to the table here
                 // This would involve creating the HTML row based on response.data.new_playlist_id
                 // and response.data.new_playlist_title, similar to how PHP loops through playlists.
            } else {
                // Handle errors reported by wp_send_json_error
                var errorMsg = (response.data && response.data.message) ? response.data.message : mvp_translate.attr('data-error-importing');
                alert('Import Failed: ' + errorMsg);
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
             // --- NEW Fail Handling ---
            var errorMsg = mvp_translate.attr('data-error-importing'); // Generic default
            if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {
                errorMsg = jqXHR.responseJSON.data.message;
            } else if (jqXHR.responseText) {
                 // Try to show raw response if it's not JSON but might contain info
                 console.log('Import Error Raw:', jqXHR.responseText);
                 errorMsg = 'An unexpected server error occurred. Check the console for details.';
            }
            alert('Import Failed: ' + errorMsg);
            console.log('Import AJAX Error:', jqXHR, textStatus, errorThrown);
            import_playlist_btn.show(); // Show button again on failure
            preloader.hide();
        });

    }

    // --- REMOVED FUNCTION (No longer needed) ---
    // function getCSVPlaylist(url){ ... }

    // --- REMOVED FUNCTION (No longer needed) ---
    // function import_playlist_db(){ ... }


    /* duplicate */


    $('.mvp-duplicate-playlist').on('click', function(){
        return duplicatePlaylist(mvp_translate.attr('data-enter-playlist-title'), $(this));
    });

    function duplicatePlaylist(msg, target){
        var title = prompt(msg);

        if(title == null){//cancel
            return false;
        }else if(title.replace(/^\s+|\s+$/g, '').length == 0) {//empty
            duplicatePlaylist(msg, target);
            return false;
        }else{

            preloader.show()

            var postData = [
                {name: 'action', value: 'mvp_duplicate_playlist'},
                {name: 'security', value: mvp_data.security},
                {name: 'title', value: title},
                {name: 'playlist_id', value: target.closest('.mvp-playlist-row').attr('data-playlist-id')},
            ];

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',
            }).done(function(response){

                //go to edit playlist page
                window.location = playlistItemList.attr('data-admin-url') + '?page=mvp_playlist_manager&action=edit_playlist&mvp_msg=playlist_created&playlist_id=' + response

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
                 preloader.hide(); // Hide preloader on failure too
            });

            return false;

        }
    }

    /* watched percentage */

    var is_clear_percentage;

    $('.mvp-clear-watched-percentage').on('click', function(){

        var result = confirm("Are you sure you want to clear?");
        if(result){

            if(is_clear_percentage)return false;
            is_clear_percentage = true;

            preloader.show();

            var postData = [
                {name: 'action', value: 'mvp_clear_watched_percentage'},
                {name: 'playlist_id', value: mediaTable.attr('data-playlist-id') },
                {name: 'security', value: mvp_data.security}
            ];

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',
            }).done(function(response){

                preloader.hide();
                is_clear_percentage = false;

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
                preloader.hide();
                is_clear_percentage = false;
            });

        }

    });





    //############################################//
    /* helpers */
    //############################################//

    function isEmpty(str){
        // Check if str is null or undefined first
        if (str == null) return true;
        // Ensure str is a string before calling replace
        return String(str).replace(/^\s+|\s+$/g, '').length == 0;
    }


    function sortNumber(a,b) {
        return a - b;
    }

    function hmsToSecondsOnly(str) {
        var p = String(str).split(':'), // Ensure str is a string
            s = 0, m = 1;

        while (p.length > 0) {
            s += m * parseInt(p.pop(), 10);
            m *= 60;
        }

        return s;
    }

    function selectText(element){
        if (document.body.createTextRange) {
            var range = document.body.createTextRange();
            range.moveToElementText(element);
            range.select();
        } else if (window.getSelection) {
            var selection = window.getSelection();
            var range = document.createRange();
            range.selectNodeContents(element);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }

    function keysrtStr(arr, selector, reverse) {
        var sortOrder = 1;
        if(reverse)sortOrder = -1;
        return arr.sort(function(a, b) {
            var x = a.find(selector).html().toLowerCase(); var y = b.find(selector).html().toLowerCase();
            return sortOrder * ((x < y) ? -1 : ((x > y) ? 1 : 0));
        });
    }

    function keysrtNum(arr, selector, reverse) {
        var sortOrder = 1;
        if(reverse)sortOrder = -1;
        return arr.sort(function(a, b) {
            var x = parseInt(a.find(selector).html(),10); var y =  parseInt(b.find(selector).html(),10);
            // Handle potential NaN values during parsing
            x = isNaN(x) ? 0 : x;
            y = isNaN(y) ? 0 : y;
            return sortOrder * ((x < y) ? -1 : ((x > y) ? 1 : 0));
        });
    }


    function isNumeric(value) {
        return /^-?\d+$/.test(value);
    }

    function setInputDate(dt){
      var hoy = new Date(dt),
          d = hoy.getDate(),
          m = hoy.getMonth()+1,
          y = hoy.getFullYear(),
          data;

      if(d < 10){
          d = "0"+d;
      };
      if(m < 10){
          m = "0"+m;
      };

      data = y+"-"+m+"-"+d;
      return data;
    };

    function getDate(){
         var now = new Date();
        var month = (now.getMonth() + 1);
        var day = now.getDate();
        if (month < 10)
            month = "0" + month;
        if (day < 10)
            day = "0" + day;
        var today = now.getFullYear() + '-' + month + '-' + day;
        return today;
    }

}); // End jQuery(document).ready