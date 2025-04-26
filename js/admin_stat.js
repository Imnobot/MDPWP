jQuery(document).ready(function($) {

    "use strict"

    var preloader = $('#mvp-loader').show(),
    _body = $('body'),
    _doc = $(document),
    statWrap = $('#mvp-stat-wrap'),
    mediaItemList = $('#media-item-list'),
    mvp_translate = $('#mvp-translate'),
    statTableHeader = $('.stat-table-header')





    var selectedPlaylistId,
    statsPlaylistList = $('#mvp-stats-playlist-list').selectize({
        onInitialize: function() {
            this.trigger('change', this.getValue(), true);
        },
        onChange: function(value, isOnInitialize) {
            console.log('Selectize playlist changed: ' + value);

            if(value){
                selectedPlaylistId = value;
                loadStats( 'playlist', value)
            }

        }
    });









    function loadStats(type, pid){
        console.log('loadStats ' + type)

        preloader.show()

        var postData = [
            {name: 'action', value: 'mvp_get_stat_data'},
            {name: 'type', value: type},
            {name: 'type_id', value: pid},
            {name: 'options', value: pid},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(r){

            console.log(r)

            var response = r.results

            var mi = $('.media-item-container-hidden')

            mediaItemList.find('.mvp-stat-row:not(.media-item-container-hidden)').remove()//clear current

            var i, len = response.length, obj, media_item;
            for(i = 0; i <len; i++){

                obj = response[i]

                if(obj.artist || obj.title){

                    media_item = mi.clone().removeClass('media-item-container-hidden')
                    .attr('data-media-id', obj.media_id)
                    media_item.find('.media-title').html(obj.title)
                    media_item.find('.media-duration').html(obj.total_time)
                    media_item.find('.media-time').html(convertTime(obj.total_time));
                    media_item.find('.media-play').html(nFormatter(parseInt(obj.total_play,10), 1));
                    media_item.find('.media-download').html(nFormatter(parseInt(obj.total_download,10), 1));
                    media_item.find('.media-finish').html(nFormatter(parseInt(obj.total_finish,10), 1));

                    media_item.appendTo(mediaItemList)

                }

            }

            statTableHeader.find('.mvp-sort-field[data-type="title"]').attr('data-asc', 'true')
            setSortIndicator('title', true)




            //summary

            if(r.total.c_time)$('.mvp-stats-total-time').html(convertTime(r.total.c_time))
            else $('.mvp-stats-total-time').html('0')

            if(r.total.c_play) $('.mvp-stats-total-play').html(nFormatter(parseInt(r.total.c_play,10), 1));
            else $('.mvp-stats-total-play').html('0')

            if(r.total.c_download) $('.mvp-stats-total-download').html(nFormatter(parseInt(r.total.c_download,10), 1));
            else $('.mvp-stats-total-download').html('0')

            if(r.total.c_finish) $('.mvp-stats-total-finish').html(nFormatter(parseInt(r.total.c_finish,10), 1));
            else $('.mvp-stats-total-finish').html('0')





            //top

            getBox(r.top_day, $('.mvp-box-top-play-day'))
            getGrandTotal(r.top_day, $('.mvp-box-top-play-day'))

            getBox(r.top_week, $('.mvp-box-top-play-week'))
            getGrandTotal(r.top_week, $('.mvp-box-top-play-week'))

            getBox(r.top_month, $('.mvp-box-top-play-month'))
            getGrandTotal(r.top_month, $('.mvp-box-top-play-month'))

            getBox(r.top_plays, $('.mvp-box-top-play-all-time'))
            getGrandTotal(r.top_plays, $('.mvp-box-top-play-all-time'))

            getBox(r.top_downloads, $('.mvp-box-top-download-all-time'))
            getGrandTotal(r.top_downloads, $('.mvp-box-top-download-all-time'))

            getBox(r.top_finish, $('.mvp-box-top-finish-all-time'))
            getGrandTotal(r.top_finish, $('.mvp-box-top-finish-all-time'))

            getBox2(r.top_plays_country, $('.mvp-box-top-plays-country-all-time'))
            getGrandTotal(r.top_plays_country, $('.mvp-box-top-plays-country-all-time'))

            getBox3(r.top_plays_user, $('.mvp-box-top-plays-user-all-time'))
            getGrandTotal(r.top_plays_user, $('.mvp-box-top-plays-user-all-time'))


            makeTotalGraph(r.top_day_grand_total)


            preloader.hide()

            initPagination()

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();

        });

    }

    function getGrandTotal(arr, box){

        var i, len = arr.length, obj, gt = 0;
        for(i = 0; i < len; i++){
            obj = arr[i]
            gt += parseInt(obj.total_count,10)
        }

        box.find('.top-box-content-total-value').html(gt)

        if(gt > 0){
            box.find('.top-box-content-total').show()
        }else{
            box.find('.top-box-content-total').hide()
        }

    }

    function getBox(arr, box){

        box.find('.mvp-top-stat-list').remove()//clear current

        if(arr.length){

            var ids = []
            var s = '<ol class="mvp-top-stat-list">'

            var i, len = arr.length, obj;
            for(i = 0; i <len; i++){

                obj = arr[i]

                if(obj.media_id != undefined && ids.indexOf(obj.media_id) == -1) ids.push(obj.media_id);

                s += '<li>'

                if(obj.title && obj.artist){
                    s += '<b>' + obj.artist + '</b>' + ' - ' + obj.title
                }else if(obj.title){
                    s += '<b>' + obj.title + '</b>'
                }else if(obj.artist){
                    s += '<b>' + obj.artist + '</b>'
                }

               // s += ' <b>' + obj.media_id + '</b>'

                s += '<span class="mvp-stat-info"> ('+obj.total_count+')</span></li>';

            }

            s += '</ol>';

            box.find('.top-box-content').append(s)//add new

            var top_id = ids.join('_');

            box.find('.mvp-stat-no-data').addClass('mvp-stat-hidden')
            box.find('.mvp-create-playlist-from-stat').removeClass('mvp-stat-hidden').attr('data-media-id', top_id)

        }else{
            box.find('.mvp-stat-no-data').removeClass('mvp-stat-hidden')
            box.find('.mvp-create-playlist-from-stat').addClass('mvp-stat-hidden').removeAttr('data-media-id')

        }

    }

    function getBox2(arr, box){

        box.find('.mvp-top-stat-list').remove()//clear current

        if(arr.length){

            var i, len = arr.length, obj, s = '';
            for(i = 0; i <len; i++){

                obj = arr[i]

                s += '<tr class="mvp-top-stat-list">'+

                    '<td>'+obj.country+' ('+obj.country_code+')</td>'+
                    '<td>'+ obj.continent +'</td>'+
                    '<td>'+obj.total_count+'</td>'+
                    '<td>'+convertTime(obj.c_time)+'</td>'+

                '</tr>'

            }

            box.find('.mvp-stat-no-data').addClass('mvp-stat-hidden')
            box.find('.inline-stat-table').removeClass('inline-stat-table-hidden').find('tbody').html(s)

        }else{
            box.find('.mvp-stat-no-data').removeClass('mvp-stat-hidden')
        }

    }

    function getBox3(arr, box){

        box.find('.mvp-top-stat-list').remove()//clear current

        if(arr.length){

            var i, len = arr.length, obj, s = '';
            for(i = 0; i <len; i++){

                obj = arr[i]

                s += '<tr class="mvp-top-stat-list">'+

                    '<td><a href="#" class="mvp-user-id" data-user-id="'+obj.user_id+'" title="'+mvp_translate.attr('data-view-detail')+'">'+obj.user_display_name+'</a></td>'+
                    '<td>'+ obj.user_role +'</td>'+
                    '<td>'+obj.total_count+'</td>'+
                    '<td>'+convertTime(obj.c_time)+'</td>'+

                '</tr>'

            }

            box.find('.mvp-stat-no-data').addClass('mvp-stat-hidden')
            box.find('.inline-stat-table').removeClass('inline-stat-table-hidden').find('tbody').html(s)

        }else{
            box.find('.mvp-stat-no-data').removeClass('mvp-stat-hidden')
        }
    }

    //user data

    statWrap.on('click', '.mvp-user-id', function(){
        var user_id = $(this).attr('data-user-id')

        preloader.show()

        var postData = [
            {name: 'action', value: 'mvp_get_stat_user_data'},
            {name: 'user_id', value: user_id},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(arr){

            if(arr.length){

                var i, len = arr.length, obj, s = '';
                for(i = 0; i <len; i++){

                    obj = arr[i]

                    s += '<tr class="mvp-top-stat-list">'+

                        '<td>'+obj.title+'</td>'+
                        '<td>'+obj.total_count+'</td>'+
                        '<td>'+convertTime(obj.c_time)+'</td>'+

                    '</tr>'

                }

                userDataModal.find('.inline-stat-table').removeClass('inline-stat-table-hidden').find('tbody').html(s)

            }

            var title = obj.user_display_name + ' (' + obj.user_role + ')'
            userDataModal.find('.user-data-modal-title').html(title)

            showUserDataModal()

            preloader.hide()


        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            removeUserDataModal()
            preloader.hide()
        });

        return false;
    })


    //user data modal

    var userDataModal = $('#mvp-user-data-modal'),
    userDataModalBg = $('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){
            removeUserDataModal()
        }
    });

    $('#mvp-user-data-close').on('click',function(e){
        removeUserDataModal()
    });

    function removeUserDataModal(){
        userDataModal.hide();
    }

    function showUserDataModal(){
        userDataModal.show();
        userDataModalBg.scrollTop(0);
    }





    //pagination

    var paginationPerPageNum = $('#mvp-pag-per-page-num')

    if(localStorage && localStorage.getItem('mvp_stat_media_paginaton_per_page')){
        paginationPerPageNum.val(localStorage.getItem('mvp_stat_media_paginaton_per_page'))
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

    function initPagination(){

        paginationArr = []

        var i = 0;
        mediaItemList.find('.media-item').each(function(){
            paginationArr.push($(this).attr('data-id', i))
            i++;
        })

        paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage)

        if(paginationTotalPages > 1)createPaginationBtn(paginationCurrentPage);

        if(paginationArr.length)showPaginationTracks()//show tracks on start

    }



    //adjust per page
    $('#mvp-pag-per-page-btn').on('click', function(){

        if(isEmpty(paginationPerPageNum.val())){
            paginationPerPageNum.focus()
            alert("Enter number!")
            return false;
        }

        paginationPerPage = parseInt(paginationPerPageNum.val(),10)

        //save
        if(localStorage)localStorage.setItem('mvp_stat_media_paginaton_per_page', paginationPerPage);

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



    //sort media

    statTableHeader.find('.mvp-sort-field').on('click', function(e){

        e.preventDefault()

        var btn = $(this),
        asc = btn.attr('data-asc') == 'true',
        items = mediaItemList.find('.media-item'), len = items.length,
        type = btn.attr('data-type')

        if(type == 'title' || type == 'artist')keysrtStr(paginationArr, '.media-'+type, asc);
        else keysrtNum(paginationArr, '.media-'+type, asc);

        asc = !asc
        btn.attr('data-asc', asc)

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

        //place graphs below rows
        mediaItemList.find('.mvp-stat-graph-holder-row').each(function(){
            var graph = $(this),
            id = graph.attr('data-parent-id'),
            parent = mediaItemList.find('.mvp-stat-row[data-parent-id="'+id+'"]')

            parent.after(graph)
        })


        setSortIndicator(type, asc)

    })

    function setSortIndicator(type, dir){

        statTableHeader.find('.mvp-triangle-dir-wrap, .mvp-triangle-dir').hide()//hide all

        if(dir == true){
            statTableHeader.find('.mvp-sort-field[data-type="'+type+'"]').find('.mvp-triangle-dir-wrap').show().find('.mvp-triangle-dir-down').show()
        }else{
            statTableHeader.find('.mvp-sort-field[data-type="'+type+'"]').find('.mvp-triangle-dir-wrap').show().find('.mvp-triangle-dir-up').show()
        }

    }









    //search songs

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




    //top plays total graps

    function makeTotalGraph(arr){

        if(arr.length == 0)return

        var dates = [];
        var plays = [];

        var i, len = arr.length, obj
        for(i = 0; i < len; i++){
            obj = arr[i]

            dates.push(obj.stat_day)
            plays.push(obj.total_count)
        }

        ///

        var _dates = []
        var _plays = []

        var i, d1, d2,
        start = dates[0],
        //end = dates[dates.length-1]
        end = new Date();//if no song placed in last days


        //moment
        var startDate = moment(start);
        var endDate = moment(end);

        for (var m = moment(startDate); m.isBefore(endDate); m.add(1, 'days')) {

            d1 = new Date(m)

            if(dates.length){

                d2 = dates[0];

                if(formatDate(d1) == d2){//date match

                   // console.log('date match')

                    _plays.push(plays[0])

                    dates.shift();
                    plays.shift()

                }else{

                    _plays.push('0')

                }

            }else{
                _plays.push('0')
            }

            var options = { day: 'numeric', month: 'short' };
            _dates.push(d1.toLocaleDateString('en-GB', options))

        }



         var datasets = [{
            label: 'Total plays per day',
            borderColor: "#00BFFF",
            pointBackgroundColor: "#55bae7",
            /*fill: false,*/
        }]
        datasets[0].data = _plays



        var canvas = $('.mvp-stats-total-grap-canvas')[0],
        ctx = canvas.getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: _dates,
                datasets: datasets
            },
            options: {
                maintainAspectRatio: false,
                elements: {
                    line: {
                        tension: 0
                    }
                }
            },
        });

    }

    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }












    var creatingGraph, graphOptions = $('#mvp-stat-graph-options');

    //toggle graph options

    $('#graph-options-btn').on('click', function(){
        graphOptions.toggle();
    });

    //create graph

    $('.mvp-stat-create-graph').on('click', function(e){
        e.preventDefault();

        if(creatingGraph)return false;
        creatingGraph = true;

        preloader.show();

        var createGraphBtn = $(this),
        row = createGraphBtn.closest('.mvp-stat-row');

        //get graph data

        var graphType = graphOptions.find('.graph-type:checked').val()

        var dataDisplay = graphOptions.find('.graph-data-display:checked').map(function() {
            return this.value;
        }).get();

        if(dataDisplay.length == 0){
            preloader.hide();
            creatingGraph = false;
            return false;
        }

        var returnDays = graphOptions.find('.graph-return-days').val()

        var postData = [
            {name: 'action', value: 'mvp_stat_create_graph'},
            {name: 'media_id', value: row.attr('data-media-id')},
            {name: 'title', value: row.attr('data-title')},
            {name: 'data_display', value: JSON.stringify(dataDisplay)},
            {name: 'return_days', value: returnDays},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            //console.log(response)

            var date_options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var dates = [], play_data = [], download_data = [], finish_data = [];

            //generate date list for last x days
            //NOTE: we need to compare dates because statistics does not contain dates for days that media doesnt not play

            var i, d1, d2, song;
            for(i = 0; i < returnDays; i++){
                d1 = new Date();
                d1.setDate(d1.getDate() - i);

                if(response.length){

                    song = response[response.length-1];
                    d2 = song.c_date;

                    if(formatDate(d1) == d2){//date match
                        if(dataDisplay.indexOf('c_play')>-1)play_data.push(song.c_play);
                        if(dataDisplay.indexOf('c_download')>-1)download_data.push(song.c_download);
                        if(dataDisplay.indexOf('c_finish')>-1)finish_data.push(song.c_finish);
                        response.pop();
                    }else{
                        if(dataDisplay.indexOf('c_play')>-1)play_data.push(0);
                        if(dataDisplay.indexOf('c_download')>-1)download_data.push(0);
                        if(dataDisplay.indexOf('c_finish')>-1)finish_data.push(0);
                    }
                }else{
                    if(dataDisplay.indexOf('c_play')>-1)play_data.push(0);
                    if(dataDisplay.indexOf('c_download')>-1)download_data.push(0);
                    if(dataDisplay.indexOf('c_finish')>-1)finish_data.push(0);
                }

                dates.push(d1.toLocaleDateString("en-US", date_options));

            }
            dates.reverse();
            play_data.reverse();
            download_data.reverse();
            finish_data.reverse();

            //

            var datasets = [];
            if(dataDisplay.indexOf('c_play')>-1)datasets.push({
                label: 'Plays',
                data: play_data,
                backgroundColor: "#00BFFF"
            });
            if(dataDisplay.indexOf('c_download')>-1)datasets.push({
                label: 'Downloads',
                data: download_data,
                backgroundColor: "#DA70D6"
            });
            if(dataDisplay.indexOf('c_finish')>-1)datasets.push({
                label: 'Finishes',
                data: finish_data,
                backgroundColor: "#59ab5f"
            });

            //add graph in next row
            var graph_holder = $('<tr class="mvp-stat-graph-holder-row">'+
                '<td class="mvp-stat-graph-holder" colspan="7">'+
                '<canvas class="mvp-stat-graph-canvas"></canvas>'+
                '</td></tr>');

            row.data('graphHolderRow',graph_holder).after(graph_holder);//data('graph-holder' - save reference to graph row so we can toggle it when song search is used

            //create chart
            var ctx = graph_holder.find($('.mvp-stat-graph-canvas'))[0].getContext('2d');
            new Chart(ctx, {
                type: graphType,
                data: {
                    labels: dates,
                    datasets: datasets
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                 precision: 0,
                                 padding: 5
                            }
                        }]
                    }
                },
            });

            //toggle create/remove graph buttons
            createGraphBtn.hide();
            row.find('.mvp-stat-remove-graph').show().one('click', function(e){
                e.preventDefault();
                var btn = $(this).hide();
                btn.data('createGraphBtn').show();//show create graph btn
                btn.data('createGraphBtn', null);
                btn.data('parentRow').data('graphHolderRow').remove();//get parent row, remove graph
                btn.data('parentRow').data('graphHolderRow', null);
                btn.data('parentRow', null);
            }).data({'createGraphBtn': createGraphBtn, 'parentRow': row});

            preloader.hide();
            creatingGraph = false;

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
            creatingGraph = false;
            alert(mvp_translate.attr('data-create-graph-error'));
        });

    });





    //add playlist from top tracks

    //modal

    var addPlaylistModal = $('#mvp-add-playlist-modal'),
    modalBg = $('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){
            removePlaylistModal()
        }
    });

    _doc.on('keyup', function(e) {
        e.stopImmediatePropagation();
        e.preventDefault();

        var key = e.keyCode, target = $(e.target);

        if(key == 27) {//esc
            removePlaylistModal()
        }
    });

    $('#mvp-add-playlist-cancel').on('click',function(e){
        removePlaylistModal()
    });


    var addPlaylistSubmit
    $('#mvp-add-playlist-submit').on('click',function(e){

        var title_field = $('#playlist-title')

        if(isEmpty(title_field.val())){
            title_field.addClass('aprf');
            modalBg.scrollTop(0);
            alert(mvp_translate.attr('data-title-required'));
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
            {name: 'media_id', value: playlistFromStatMediaId}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            //go to edit playlist page
            window.location = statWrap.attr('data-admin-url') + '?page=mvp_playlist_manager&action=edit_playlist&mvp_msg=playlist_created&playlist_id=' + response

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            addPlaylistSubmit = false;
            removePlaylistModal()
        });

        return false;

    });

    function removePlaylistModal(){
        addPlaylistModal.hide();

        addPlaylistModal.find('#playlist-title').val('').removeClass('aprf');
    }

    function showPlaylistModal(){
        addPlaylistModal.show();
        $('#playlist-title').focus()
        modalBg.scrollTop(0);
    }

    var playlistFromStatMediaId
    _doc.on('click', '.mvp-create-playlist-from-stat', function(){
        playlistFromStatMediaId = $(this).attr('data-media-id')
        showPlaylistModal()
    })








    $('#mvp-clear-statistics').on('click', function(){

        var result = confirm(mvp_translate.attr('data-sure-to-clear-stat'));
        if(result){

            // NOTE: Original code gets playlist_id from a different place than loadStats uses.
            // Using the 'selectedPlaylistId' variable which is updated by the dropdown is safer.
            // var playlist_id = $('#mvp-stat-wrap').attr('data-playlist-id')
            var playlist_id = selectedPlaylistId; // Use the variable from the dropdown

            if (!playlist_id) {
                 alert("Please select a playlist first."); // Or handle the case where no playlist is selected
                 return; // Stop if no playlist is selected
            }

            preloader.show();

            var postData = [
                {name: 'action', value: 'mvp_stat_clear'},
                {name: 'playlist_id', value: playlist_id},
                {name: 'security', value: mvp_data.security}
            ];

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json', // Expecting JSON back (even if it's just "SUCCESS")
            }).done(function(response){

                //console.log(response)

                // Check if the response from PHP (after json_encode) is exactly "SUCCESS"
                if(response && response === 'SUCCESS'){ // Strict comparison recommended

                    mediaItemList.find('.mvp-stat-row:not(.media-item-container-hidden)').remove()//clear current

                    $('.mvp-stats-total-time').html('0') // Default to '0' instead of empty
                    $('.mvp-stats-total-play').html('0')
                    $('.mvp-stats-total-download').html('0')
                    $('.mvp-stats-total-like').html('0')
                    $('.mvp-stats-total-finish').html('0')

                    // Reset top boxes
                    getBox([], $('.mvp-box-top-play-day'))
                    getGrandTotal([], $('.mvp-box-top-play-day'))

                    getBox([], $('.mvp-box-top-play-week'))
                    getGrandTotal([], $('.mvp-box-top-play-week'))

                    getBox([], $('.mvp-box-top-play-month'))
                    getGrandTotal([], $('.mvp-box-top-play-month'))

                    getBox([], $('.mvp-box-top-play-all-time'))
                    getGrandTotal([], $('.mvp-box-top-play-all-time'))

                    getBox([], $('.mvp-box-top-download-all-time'))
                    getGrandTotal([], $('.mvp-box-top-download-all-time'))

                    getBox([], $('.mvp-box-top-finish-all-time'))
                    getGrandTotal([], $('.mvp-box-top-finish-all-time'))

                    getBox2([], $('.mvp-box-top-plays-country-all-time'))
                    getGrandTotal([], $('.mvp-box-top-plays-country-all-time'))

                    getBox3([], $('.mvp-box-top-plays-user-all-time'))
                    getGrandTotal([], $('.mvp-box-top-plays-user-all-time'))


                    // Clear the canvas
                    var canvas = $('.mvp-stats-total-grap-canvas')[0],
                    ctx = canvas.getContext('2d');
                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    // Optionally add a success message to the user
                    // alert("Statistics cleared successfully!");

                } else {
                     // Handle cases where the request succeeded but the response wasn't "SUCCESS"
                     console.log("Clear statistics response was not 'SUCCESS':", response);
                     alert(mvp_translate.attr('data-clear-stat-error') + ' (Unexpected response)');
                }

                preloader.hide(); // <-- ADDED LINE (Hide preloader after processing success)

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
                preloader.hide(); // Already correctly placed here for failures
                alert(mvp_translate.attr('data-clear-stat-error'));
            });

        } // end if(result)

    }); // end #mvp-clear-statistics click

    var statsPlaylistListSelectize = $('#mvp-stats-playlist-list').selectize()[0].selectize; // Get Selectize instance
    statsPlaylistListSelectize.on('change',function(){ // Use selectize API for change event

        var playlist_id = this.getValue(); // Use Selectize method to get value

        if (playlist_id) { // Only change URL if a valid playlist is selected
            insertParam('playlist_id', playlist_id);
        }

    });

    var urlParams = getUrlParameter();
    if(urlParams.playlist_id){
        // statsPlaylistList.val(urlParams.playlist_id); // This might not work reliably with Selectize
        statsPlaylistListSelectize.setValue(urlParams.playlist_id, true); // Use Selectize API to set initial value silently
    }

    function insertParam(key, value){

        key = encodeURI(key); value = encodeURI(value);

        var kvp = document.location.search.substr(1).split('&');
        var params = {}; // Use an object to handle params easily
        for (var i = 0; i < kvp.length; i++) {
            var x = kvp[i].split('=');
            if (x[0]) { // Ensure key exists
                 params[x[0]] = x[1] || ''; // Store existing params
            }
        }

        params[key] = value; // Add or update the param

        // Rebuild the query string
        var new_kvp = [];
        for (var k in params) {
             if (params.hasOwnProperty(k)) {
                 new_kvp.push(k + '=' + params[k]);
            }
        }

        // Update location without reload (using History API if needed, or simple redirect)
        // Simple redirect is easier for this context
        var new_search = '?' + new_kvp.join('&');
        // Avoid reload if search string is the same
        if (window.location.search !== new_search) {
            window.location.search = new_search;
        }
    }



    //############################################//
    /* helpers */
    //############################################//

    function formatDate(date){
        var dd = date.getDate(),
        mm = date.getMonth()+1,
        yyyy = date.getFullYear();
        if(dd<10) {dd='0'+dd}
        if(mm<10) {mm='0'+mm}
        date = yyyy+'-'+mm+'-'+dd;
        return date;
    }

    function keysrtStr(arr, selector, reverse) {
        var sortOrder = 1;
        if(reverse)sortOrder = -1;
        return arr.sort(function(a, b) {
            var x = a.find(selector).html(); var y = b.find(selector).html();
            return sortOrder * ((x < y) ? -1 : ((x > y) ? 1 : 0));
        });
    }

    function keysrtNum(arr, selector, reverse) {
        var sortOrder = 1;
        if(reverse)sortOrder = -1;
        return arr.sort(function(a, b) {
            var x = parseInt(a.find(selector).html(),10); var y =  parseInt(b.find(selector).html(),10);
            // Handle NaN cases if necessary
            x = isNaN(x) ? (reverse ? Infinity : -Infinity) : x;
            y = isNaN(y) ? (reverse ? Infinity : -Infinity) : y;
            return sortOrder * ((x < y) ? -1 : ((x > y) ? 1 : 0));
        });
    }

    function convertTime(time){
        if(!time)return '0';
        time = parseInt(time, 10); // Ensure it's a number
        if (isNaN(time) || time <= 0) return '0';

        if (time < 60) {
            return time+' sec';

        } else if (time >= 60 && time < 3600) {
            var min = Math.floor(time / 60);
            var sec = time % 60;
            if (sec < 10) sec = '0' + sec; // Pad seconds
            return min+':'+sec+' min'; // Use standard time format

        } else if (time >= 3600 && time < 86400) {
            var hour = Math.floor(time / 3600);
            var min = Math.floor((time % 3600) / 60);
            if (min < 10) min = '0' + min; // Pad minutes
            return hour+':'+min+' hr'; // Use standard time format

        } else if (time >= 86400) { // Removed upper limit check
            var day = Math.floor(time / 86400);
            var hr = Math.floor((time % 86400) / 3600);
            // Simplify to days if needed, or provide more detail
            return '~'+day+' day' + (day > 1 ? 's' : '');
        }
        return '0'; // Fallback
    }


    function nFormatter(num, digits) {
      var si = [
        { value: 1, symbol: "" }, // Keep numbers below 1000 as they are
        { value: 1E3, symbol: "k" },
        { value: 1E6, symbol: "M" },
        { value: 1E9, symbol: "G" },
        { value: 1E12, symbol: "T" },
        { value: 1E15, symbol: "P" },
        { value: 1E18, symbol: "E" }
      ];
      var rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
      var i;
      // Iterate backwards to find the largest appropriate symbol
      for (i = si.length - 1; i > 0; i--) {
        if (num >= si[i].value) {
          break;
        }
      }
       // Check if num is exactly 0 to avoid potential division by zero or incorrect formatting
      if (num === 0) {
        return '0';
      }
      // Format the number
      return (num / si[i].value).toFixed(digits).replace(rx, "$1") + si[i].symbol;
    }


    function convertCount(num){ // This seems redundant given nFormatter, but keeping it if used elsewhere
        num = parseInt(num, 10);
        if(!num || isNaN(num))return '0';
        if(num < 1000){
            return num;
        } else {
             // Use nFormatter for consistency? Or keep simple K format.
            // return nFormatter(num, 1); // Example using nFormatter
             return Math.round((num / 1000))+' K'; // Original logic (rounded)
        }
    }

    function getUrlParameter(k) {
        var p={};
        window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
        return k?p[k]:p;
    };

    function isEmpty(str){
         if (typeof str !== 'string') return true; // Handle non-string inputs
         return str.replace(/^\s+|\s+$/g, '').length === 0;
    }


});