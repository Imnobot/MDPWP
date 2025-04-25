jQuery(document).ready(function($) {
    "use strict"

    var preloader = $('#mvp-loader'),
     _body = $('body'),
    _doc = $(document),
    mvp_translate = $('#mvp-translate'),
    mvpAdmin = $('.mvp-admin')


    //############################################//
    /* general */
    //############################################//


    //accordion
    mvpAdmin.on('click', '.option-toggle', function(e){
        var parent = $(this).closest('.option-tab');
        if(parent.hasClass('option-closed')){
            parent.removeClass('option-closed');
        }else{
            parent.addClass('option-closed');
        }
    });



    //modal size
    _doc.on('click', '.mvp-modal-size-btn', function(){
        var btn = $(this),
        modal = btn.closest('.mvp-modal')

        if(modal.hasClass('mvp-modal-full')){
            modal.removeClass('mvp-modal-full')
            btn.find('.mvp-modal-expand').show()
            btn.find('.mvp-modal-collapse').hide()
        }else{
            modal.addClass('mvp-modal-full')
            btn.find('.mvp-modal-expand').hide()
            btn.find('.mvp-modal-collapse').show()
        }
    })





    //show title on fields
    mvpAdmin.on('hover','input[type=text]',function(){
        $(this).attr('title',$(this).val())
    });
    mvpAdmin.on('hover','textarea',function(){
        $(this).attr('title',$(this).text())
    });
    mvpAdmin.on('hover','select',function(){
        $(this).attr('title',$(this).find(':selected').text())
    });



    //edit player / playlist title
    $('.mvp-table .title-editable').on('blur', function(){

        var input = $(this), title = input.val();
        if(title == ''){
            input.val(input.attr('data-title'));
            alert('Title cannot be empty!');
            return false;
        }

        if(input.attr('data-player-id') !== undefined){
            var postData = [
                {name: 'action', value: 'mvp_edit_player_title'},
                {name: 'title', value: title},
                {name: 'id', value: input.attr('data-player-id')},
                {name: 'security', value: mvp_data.security}
            ];
        }else if(input.attr('data-playlist-id') !== undefined){
            var postData = [
                {name: 'action', value: 'mvp_edit_playlist_title'},
                {name: 'title', value: title},
                {name: 'id', value: input.attr('data-playlist-id')},
                {name: 'security', value: mvp_data.security}
            ];
        }else if(input.attr('data-ad-id') !== undefined){
            var postData = [
                {name: 'action', value: 'mvp_edit_ad_title'},
                {name: 'title', value: title},
                {name: 'id', value: input.attr('data-ad-id')},
                {name: 'security', value: mvp_data.security}
            ];
        }

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',   
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        });    

    });


    /* sticky */

    function updateSticky() {
        if ((window.innerHeight + window.scrollY) >= (document.body.scrollHeight - 50)) {
            $("#mvp-sticky-action").removeClass("mvp-sticky")
            $("#mvp-save-holder").hide()
        } else {
            $("#mvp-sticky-action").addClass("mvp-sticky")
            $("#mvp-save-holder").show()
        }
    }

    $(window).scroll(function() {
        updateSticky()
    })

    $(window).resize(function() {
        updateSticky()
    })






	

});


function mvp_updatePlayerFields($){

    var playlistGridStyleVal;
    $('#playlistGridStyle').on('change',function(){

        playlistGridStyleVal = $(this).val();

        var src = mvp_data.plugins_url + '/assets/data/playlist_grid_style/' + playlistGridStyleVal + '.png';
        $('#playlist-grid-style-img').attr('src',src);

        //info
        $('.playlist-grid-style-info').hide();
        $('#'+playlistGridStyleVal+'-info').show();

    }).change();

    var playlistStyleVal;
    $('#playlistStyle').on('change',function(){

        playlistStyleVal = $(this).val();

        var src = mvp_data.plugins_url + '/assets/data/playlist_style/' + playlistStyleVal + '.png';
        $('#playlist-style-img').attr('src',src);

        //info
        $('.playlist-style-info').hide();
        $('#'+playlistStyleVal+'-info').show();

    }).change();

    var gridType = $('#gridType').on('change', function(){
        if($(this).val() == 'javascript'){
            $('#breakPoints_field').show()
        }else{
            $('#breakPoints_field').hide()
        }
    })

    var playlistPosition;
    $('#playlistPosition').on('change',function(){
        playlistPosition = $(this).val();

        var src = mvp_data.plugins_url + '/assets/data/playlist_position/' + playlistPosition + '.png';
        $('#playlist-position-img').attr('src',src);

        //hide all

        $('#playlistStyle-field').hide();
        $('#playlistStyle-field2').hide();
        $('#playlistGridStyle-field').hide();
        $('#playlistGridStyle-field2').hide();
        $('#playlistScrollTheme-field').hide();
        $('#playlistScrollType-field').hide();
        $('#showLoadMore_field').hide();
        $('#playlistSideWidth_field').hide();
        $('#playlistBottomHeight_field').hide();
        $('#useSearchField_field').hide();

        $('#breakPoints_field').hide();
        $('#gridType_field').hide()

        $('#playlistOpened_field').hide();
        $('#hidePlaylistOnFullscreenEnter_field').hide();
        $('#wrapperMaxWidth_lightbox_info').hide();
        $('.verticalBottomSepearator_field').hide();
        $('#playerShadow_field').hide();
        $('#playerType_field').hide();
        $('#combinePlayerRatio_field').hide();
        $('#usePlaylistToggle-field').show();
        $('.playlist-show').hide();


        //show individual

        if(playlistPosition == 'no-playlist'){
          
            $('#playerShadow_field').show();
            $('#playlistItemContent-field').hide();
            $('#playerType_field').show();
            $('#usePlaylistToggle-field').hide();
            $('.playlist-field').hide();
            $('#playlistScrollType-field').hide();

        }else if(playlistPosition == 'outer' || playlistPosition == 'wall'){

            $('#playlistGridStyle-field').show();
            $('#playlistGridStyle-field2').show();
            $('#showLoadMore_field').show();
            
            $('#gridType_field').show()
            gridType.change()

            $('#playlistItemContent-field').show();
            $('#useSearchField_field').show();

            if(playlistPosition == 'outer'){
                $('#playlistOpened_field').show();
            }
            else if(playlistPosition == 'wall'){
                $('#wrapperMaxWidth_lightbox_info').show();
            }

        }else{

            $('#playlistStyle-field').show();
            $('#playlistStyle-field2').show();
            $('#playlistScrollType-field').show();
            $('#playlistOpened_field').show();
            $('#hidePlaylistOnFullscreenEnter_field').show();
            $('#playerShadow_field').show();
            $('#playlistItemContent-field').show();
            $('#useSearchField_field').show();
            $('#playerType_field').show();

            if(playlistPosition == 'vrb'){
                $('#playlistSideWidth_field').show();
                $('#playlistBottomHeight_field').show();
                $('.verticalBottomSepearator_field').show();
                $('#combinePlayerRatio_field').show(); 
            }
            else if(playlistPosition == 'vb'){
                $('#playlistBottomHeight_field').show();
            }
           
        }

        

      

        //info
        $('.playlist-position-info').hide();
        $('#'+playlistPosition+'-info').show();

    }).change()


}