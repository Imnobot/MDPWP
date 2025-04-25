jQuery(document).ready(function($) {
    "use strict"

    var preloader = $('#mvp-loader'),
     _body = $('body'),
    _doc = $(document),
    empty_src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D',
    mvp_translate = $('#mvp-translate'),
    statSection = $('#mvp-stat-section'),
    mediaItemListStat = $('#mvp-stat-media-item-list'),
    statTableHeader = $('.stat-table-header')


    var statsUserList = $('#mvp-stats-user-list').on('change', function(){
        loadStats(statsPlaylistList.val())
    })


    var statsPlaylistList = $('#mvp-stats-playlist-list'),
    statsPlaylistDataList = $('#mvp-stats-playlist-list-select')

    _doc.on('change', '#mvp-stats-playlist-list', function(){
       
        var options = statsPlaylistDataList[0].options;
        var val = $(this).val();
        for (var i = 0; i < options.length; i++) {
            if (options[i].value === val) {
                loadStats(val)
                break;
            }
        }
    })

    statsPlaylistList.val('-1').change()//on start



   

    function loadStats(playlist_id){

        preloader.show()

        var postData = [
            {name: 'action', value: 'mvp_get_stat_data'},
            {name: 'playlist_id', value: playlist_id},
            {name: 'user_id', value: statsUserList.val()},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(r){
console.log(r)
            setStatData(r);

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
            
        });

    }

    function setStatData(r){

        var response = r.results

        var mi = $('.media-item-container-hidden')

        mediaItemListStat.find('.mvp-stat-row:not(.media-item-container-hidden)').remove()//clear current

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

                media_item.appendTo(mediaItemListStat)

            }

        }

        statTableHeader.find('.mvp-sort-field[data-type="title"]').attr('data-asc', 'true')
        setSortIndicatorStat('title', true)




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


        makeTotalGraph(r.top_day_grand_total)


        preloader.hide()

        initPaginationStat()

    }

    function getGrandTotal(arr, box){

        var i, len = arr.length, obj, gt = 0;
        for(i = 0; i < len; i++){
            obj = arr[i]
            gt += parseInt(obj.total_count,10)
        }

        box.find('.mvp-top-box-content-total-value').html(gt)

        if(gt > 0){
            box.find('.mvp-top-box-content-total').addClass('mvp-top-box-content-total-shown')
        }else{
            box.find('.mvp-top-box-content-total').removeClass('mvp-top-box-content-total-shown')
        }

    }

    function getBox(arr, box){

        box.find('.mvp-top-stat-list').remove()//clear current

        if(arr.length){

            var ids = []
            var s = '<tr class="mvp-top-stat-list">'

            var i, len = arr.length, obj;
            for(i = 0; i <len; i++){

                obj = arr[i]

                if(obj.media_id != undefined && ids.indexOf(obj.media_id) == -1) ids.push(obj.media_id);
       
                 s += '<tr class="mvp-top-stat-list">'+

                    '<td>'+(i+1).toString()+'</td>'+
                    '<td>'+obj.title +'</td>'+
                    '<td>'+obj.total_count+'</td>'+
      
                '</tr>'

            }

            var top_id = ids.join('_');

            box.find('.mvp-stat-no-data').addClass('mvp-stat-hidden')   
            box.find('.mvp-create-playlist-from-stat').removeClass('mvp-stat-hidden').attr('data-media-id', top_id)

            box.find('.inline-stat-table').removeClass('inline-stat-table-hidden').find('tbody').html(s)

            box.find('.mvp-stat-export').removeClass('mvp-stat-hidden') 

        }else{
            box.find('.mvp-stat-no-data').removeClass('mvp-stat-hidden')   
            box.find('.mvp-create-playlist-from-stat').addClass('mvp-stat-hidden').removeAttr('data-media-id')  

            box.find('.mvp-stat-export').addClass('mvp-stat-hidden') 

            box.find('.inline-stat-table').addClass('inline-stat-table-hidden')

        }

    }




    //pagination

    var paginationPerPageNumStat = $('#mvp-stat-pag-per-page-num')

    if(localStorage && localStorage.getItem('mvp_stat_media_paginaton_per_page')){
        paginationPerPageNumStat.val(localStorage.getItem('mvp_stat_media_paginaton_per_page'))
    }

    var paginationArr = [],
    paginationCurrentPage = 0,
    paginationPerPage = parseInt(paginationPerPageNumStat.val(),10),
    paginationTotalPages,
    paginationInited, 
    lastActivePaginationBtn,
    lastPaginationPage,
    paginationWrapStat = $('.mvp-stat-pagination-wrap')


    function updatePaginationStat(jump_to_last_page){
        //after delete, move, copy, add tracks

        lastPaginationPage = paginationTotalPages - 1;
        if(paginationArr.length % paginationPerPage == 0){
            lastPaginationPage++;//no more space for tracks in last page, go to next page
        }

        paginationArr = []//empty

        //get all tracks again
        var i = 0;
        mediaItemListStat.find('.media-item').each(function(){
            paginationArr.push($(this).addClass('mvp-pagination-hidden').attr('data-id', i))
            i++;
        })

        paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage)

        if(jump_to_last_page){//when we create new tracks, jumpo to page with those newly created tracks
            paginationCurrentPage = lastPaginationPage;
        }

        if(paginationCurrentPage > paginationTotalPages - 1)paginationCurrentPage = paginationTotalPages - 1;

        if(paginationTotalPages > 1)createPaginationBtnStat(paginationCurrentPage);
        else paginationWrapStat.html('');

        if(paginationArr.length)showPaginationTracksStat()

    }

    function initPaginationStat(){

        paginationArr = []

        var i = 0;
        mediaItemListStat.find('.media-item').each(function(){
            paginationArr.push($(this).attr('data-id', i))
            i++;
        })

        paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage)

        if(paginationTotalPages > 1)createPaginationBtnStat(paginationCurrentPage);

        if(paginationArr.length)showPaginationTracksStat()//show tracks on start

    }

    //adjust per page
    var statPerPageBtn = $('#mvp-stat-pag-per-page-btn').on('click', function(){

        if(isEmpty(paginationPerPageNumStat.val())){
            paginationPerPageNumStat.focus()
            alert("Enter number!")
            return false;
        }

        paginationPerPage = parseInt(paginationPerPageNumStat.val(),10)

        //save
        if(localStorage)localStorage.setItem('mvp_stat_media_paginaton_per_page', paginationPerPage);

        paginationTotalPages = Math.ceil(paginationArr.length / paginationPerPage)

        paginationCurrentPage = 0;

        if(paginationTotalPages > 1)createPaginationBtnStat(paginationCurrentPage);
        else paginationWrapStat.html('');

        if(paginationArr.length)showPaginationTracksStat()

    })

    function showPaginationTracksStat(){

        //hide visible playlist items
        mediaItemListStat.find('.media-item').addClass('mvp-pagination-hidden')

        var i, z = paginationCurrentPage * paginationPerPage, len = z + paginationPerPage
        if(len > paginationArr.length) len = paginationArr.length;

        for(i = z; i < len; i++){
            paginationArr[i].removeClass('mvp-pagination-hidden')
        }

    }
    
    function createPaginationBtnStat(page){

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

        paginationWrapStat.html(str);
        
        if(!paginationInited){
            paginationInited = true;

            paginationWrapStat.on('click', '.mvp-pagination-page:not(.mvp-pagination-currentpage)', function() {

                if(lastActivePaginationBtn)lastActivePaginationBtn.removeClass('mvp-pagination-currentpage');
                lastActivePaginationBtn = $(this).addClass('mvp-pagination-currentpage');

                //get new page
                var page = $(this).attr('data-page-id')
                if(page == 'prev')paginationCurrentPage -= 1;
                else if(page == 'next')paginationCurrentPage += 1;
                else if(page == 'first')paginationCurrentPage = 0;
                else if(page == 'last')paginationCurrentPage = paginationTotalPages - 1; 
                else paginationCurrentPage = parseInt(page,10);

                if(paginationTotalPages > 1)createPaginationBtnStat(paginationCurrentPage);
                else paginationWrapStat.html('');

                if(paginationArr.length)showPaginationTracksStat()
                
            });

            lastActivePaginationBtn = paginationWrapStat.find('.mvp-pagination-currentpage')

        }

    }



    //sort media

    statTableHeader.find('.mvp-sort-field').on('click', function(e){

        e.preventDefault()

        var btn = $(this),
        asc = btn.attr('data-asc') == 'true',
        items = mediaItemListStat.find('.media-item'), len = items.length,
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
        mediaItemListStat.append($.map(arr, function(v) {
            return items[v];
        }));

        //update id
        var i = 0;
        mediaItemListStat.find('.media-item').each(function(){
            $(this).attr('data-id', i)
            i++;
        })

        //place graphs below rows
        mediaItemListStat.find('.mvp-stat-graph-holder-row').each(function(){
            var graph = $(this),
            id = graph.attr('data-parent-id'),
            parent = mediaItemListStat.find('.mvp-stat-row[data-parent-id="'+id+'"]')

            parent.after(graph)   
        })


        setSortIndicatorStat(type, asc)

        //update pagination
        statPerPageBtn.trigger('click')

    })

    function setSortIndicatorStat(type, dir){

        statTableHeader.find('.mvp-triangle-dir-wrap, .mvp-triangle-dir').hide()//hide all

        if(dir == true){
            statTableHeader.find('.mvp-sort-field[data-type="'+type+'"]').find('.mvp-triangle-dir-wrap').show().find('.mvp-triangle-dir-down').show()
        }else{
            statTableHeader.find('.mvp-sort-field[data-type="'+type+'"]').find('.mvp-triangle-dir-wrap').show().find('.mvp-triangle-dir-up').show()
        }

    }



   

    //search songs

    var mediafilterInitedStat

    $('#mvp-stat-filter-media').on('keyup.apfilter',function(){

        var value = $(this).val().toLowerCase(), i, j = 0, item, title, len = mediaItemListStat.children('.media-item').length;

        if(!mediafilterInitedStat){
            mediaItemListStat.children('.media-item').each(function(){
                var item = $(this)
                if(item.hasClass('mvp-pagination-hidden')){
                    item.addClass('mvp-was-pagination-hidden').removeClass('mvp-pagination-hidden')
                }
            })
            mediafilterInitedStat = true;
        }

        for(i = 0; i < len; i++){

            item = mediaItemListStat.children('.media-item').eq(i)

            title = item.find('.media-title').html().toLowerCase();

            if(value == ''){

                mediaItemListStat.children('.media-item').each(function(){
                    var item = $(this).removeClass('mvp-filter-hidden mvp-filter-shown')

                    if(item.hasClass('mvp-was-pagination-hidden')){
                        item.removeClass('mvp-was-pagination-hidden').addClass('mvp-pagination-hidden')
                    }
                });

                mediafilterInitedStat = false;

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

        var canvas = $('.mvp-stats-total-grap-canvas')[0],
        ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);

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

   











    var creatingGraph, graphOptions = $('#mvp-stat-graph-options');

    //toggle graph options

    $('#graph-options-btn').on('click', function(){
        graphOptions.toggle();
    });

    //create graph

    _doc.on('click', '.mvp-stat-create-graph', function(e){
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
            {name: 'user_id', value: statsUserList.val()}, 
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

    var addPlaylistModalTT = $('#mvp-add-playlist-modal-stat'),
    modalBgTT = $('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ 
            removePlaylistModalTT()
        }
    });

    $('#mvp-add-playlist-cancel-stat').on('click',function(e){
        removePlaylistModalTT()
    });

    var addPlaylistSubmitTT
    $('#mvp-add-playlist-submit-stat').on('click',function(e){

        var title_field = $('#playlist-title')

        if(isEmpty(title_field.val())){
            title_field.addClass('aprf'); 
            modalBgTT.scrollTop(0);
            alert(mvp_translate.attr('data-title-required'));
            return false;
        }

        if(addPlaylistSubmitTT)return false;
        addPlaylistSubmitTT = true;

        var title = title_field.val()

        preloader.show()
        removePlaylistModalTT()

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
            window.location = statSection.attr('data-admin-url') + '?page=mvp_playlist_manager&action=edit_playlist&mvp_msg=playlist_created&playlist_id=' + response

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            addPlaylistSubmitTT = false;
            removePlaylistModalTT()
        });

        return false;

    });

    function removePlaylistModalTT(){
        addPlaylistModalTT.hide();  

        addPlaylistModalTT.find('#playlist-title').val('').removeClass('aprf'); 
    }

    function showPlaylistModalTT(){
        addPlaylistModalTT.show();
        $('#playlist-title').focus()
        modalBgTT.scrollTop(0);
    }

    var playlistFromStatMediaId
    _doc.on('click', '.mvp-create-playlist-from-stat', function(){
        playlistFromStatMediaId = $(this).attr('data-media-id')
        showPlaylistModalTT()
    })





    

    $('#mvp-clear-statistics').on('click', function(){
        
        var result = confirm(mvp_translate.attr('data-sure-to-clear-stat'));
        if(result){

            preloader.show();

            var postData = [
                {name: 'action', value: 'mvp_stat_clear'},
                {name: 'playlist_id', value: statsPlaylistList.val()},
                {name: 'user_id', value: statsUserList.val()},
                {name: 'security', value: mvp_data.security}
            ];

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',
            }).done(function(response){

                //console.log(response)

                if(response){
                    if(response == 'SUCCESS'){

                        mediaItemListStat.find('.mvp-stat-row:not(.media-item-container-hidden)').remove()//clear current

                        $('.mvp-stats-total-time').html('')
                        $('.mvp-stats-total-play').html('')
                        $('.mvp-stats-total-download').html('')
                        $('.mvp-stats-total-like').html('')
                        $('.mvp-stats-total-finish').html('')

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


                        var canvas = $('.mvp-stats-total-grap-canvas')[0],
                        ctx = canvas.getContext('2d');
                        ctx.clearRect(0, 0, canvas.width, canvas.height);




                    }
                }

                preloader.hide();

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
                preloader.hide();
                alert(mvp_translate.attr('data-clear-stat-error'));
            }); 

        }

    });



    //export

    statSection.on('click', '.mvp-stat-export', function() {
      var titles = [];
      var data = [];

      var parent = $(this).closest('.top-box'),
      table = parent.find('.inline-stat-table')

   

      /*
       * Get the table headers, this will be CSV headers
       * The count of headers will be CSV string separator
       */
      table.find('th').each(function() {
        titles.push($(this).text());
      });

      /*
       * Get the actual data, this will contain all the data, in 1 array
       */
      table.find('td').each(function() {
        data.push($(this).text());
      });
      
      /*
       * Convert our data to CSV string
       */
      var CSVString = prepCSVRow(titles, titles.length, '');
      CSVString = prepCSVRow(data, titles.length, CSVString);

      /*
       * Make CSV downloadable
       */

        var table_title = $.trim(parent.find('.top-box-title').text())

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '-' + dd + '-' + yyyy;

        var file_name = table_title+'_'+today



      var downloadLink = document.createElement("a");
      var blob = new Blob(["\ufeff", CSVString]);
      var url = URL.createObjectURL(blob);
      downloadLink.href = url;
      downloadLink.download = file_name+".csv";

      /*
       * Actually download CSV
       */
      document.body.appendChild(downloadLink);
      downloadLink.click();
      document.body.removeChild(downloadLink);
    });

       /*
    * Convert data array to CSV string
    * @param arr {Array} - the actual data
    * @param columnCount {Number} - the amount to split the data into columns
    * @param initial {String} - initial string to append to CSV string
    * return {String} - ready CSV string
    */
    function prepCSVRow(arr, columnCount, initial) {
      var row = ''; // this will hold data
      var delimeter = ','; // data slice separator, in excel it's `;`, in usual CSv it's `,`
      var newLine = '\r\n'; // newline separator for CSV row

      /*
       * Convert [1,2,3,4] into [[1,2], [3,4]] while count is 2
       * @param _arr {Array} - the actual array to split
       * @param _count {Number} - the amount to split
       * return {Array} - splitted array
       */
      function splitArray(_arr, _count) {
        var splitted = [];
        var result = [];
        _arr.forEach(function(item, idx) {
          if ((idx + 1) % _count === 0) {
            splitted.push(item);
            result.push(splitted);
            splitted = [];
          } else {
            splitted.push(item);
          }
        });
        return result;
      }
      var plainArr = splitArray(arr, columnCount);
      // don't know how to explain this
      // you just have to like follow the code
      // and you understand, it's pretty simple
      // it converts `['a', 'b', 'c']` to `a,b,c` string
      plainArr.forEach(function(arrItem) {
        arrItem.forEach(function(item, idx) {
          row += item + ((idx + 1) === arrItem.length ? '' : delimeter);
        });
        row += newLine;
      });
      return initial + row;
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


     function convertTime(time){
        if(!time)return '0';

        if (time < 60) {
            return time+' sec';

        } else if (time >= 60 && time < 3600) {
            var min = Math.floor(time / 60);
            var sec = time % 60;
        
            if(min < 10){
               // min = min.substr(-1);
            }
            return min+'.'+sec+' min';

        } else if (time >= 3600 && time < 86400) {
            var hour = Math.floor(time / 60 / 60);
            var min = Math.floor(time / 60) - (hour * 60);

            if(hour < 10){
               // hour = hour.substr(-1);
            }
            return hour+'.'+min+' hr';

        } else if (time >= 86400 && time) {
            var day = Math.floor(time / (3600*24));

            if(day < 10){
                //day = day.substr(-1);
            }
            return '~'+day+' days';
        }
    }

    function nFormatter(num, digits) {
        var si = [
            { value: 1E18, symbol: "E" },
            { value: 1E15, symbol: "P" },
            { value: 1E12, symbol: "T" },
            { value: 1E9,  symbol: "G" },
            { value: 1E6,  symbol: "M" },
           // { value: 1E3,  symbol: "k" }
        ], rx = /\.0+$|(\.[0-9]*[1-9])0+$/, i;

        for (i = 0; i < si.length; i++) {
            if (num >= si[i].value) {
                return (num / si[i].value).toFixed(digits).replace(rx, "$1") + si[i].symbol;
            }
        }
        return num.toFixed(digits).replace(rx, "$1");
    }

    function convertCount(num){

        if(!num)return '0';
        if(num < 1000){
            return num;
        } else {
            return Math.round((num / 1000), 2)+' K';
        }
    } 

    function keysrtNum(arr, selector, reverse) {
        var sortOrder = 1;
        if(reverse)sortOrder = -1;
        return arr.sort(function(a, b) {
            var x = parseInt(a.find(selector).html(),10); var y =  parseInt(b.find(selector).html(),10);
            return sortOrder * ((x < y) ? -1 : ((x > y) ? 1 : 0));
        });
    }


    function getUrlParameter(k) {
        var p={};
        window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
        return k?p[k]:p;
    };


  


    function isEmpty(str){
        return str.replace(/^\s+|\s+$/g, '').length == 0;
    }




	

});