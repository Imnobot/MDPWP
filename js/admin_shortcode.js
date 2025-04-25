jQuery(document).ready(function($) {

    "use strict"


    if($('.mvp-shortcode-manager-wrap').length){//remove button to include shortcode in post area
       $('#mvp-meta-add-to-editor-wrap').remove()
    }






   








    //############################################//
    /* shortcode */
    //############################################//

    var shortcode_all_atts;

    $('#shortcode_player, #shortcode_playlist, #shortcode_ad').on('change',function(){

        var player_id = $('#shortcode_player').val(), 
        playlist_id = $('#shortcode_playlist').val(),
        ad_id = $('#shortcode_ad').val();
        
        if(!player_id){
            $('#shortcode_generator').text('Please create a player first!\n');
        }else if(!playlist_id){
            $('#shortcode_generator').text('Please create a playlist first!\n');
        }else{
            var shortcode = '[apmvp player_id="'+player_id+'" playlist_id="'+playlist_id+'"';
            if(typeof ad_id !== 'undefined' && ad_id != '')shortcode += ' ad_id="'+ad_id+'"';
            shortcode += ']';

            $('#shortcode_generator').text(shortcode);
        }

        var shortcode_for_php = 'echo do_shortcode(\'[apmvp player_id="'+player_id+'" playlist_id="'+playlist_id+'"'
        if(typeof ad_id !== 'undefined' && ad_id != '')shortcode_for_php += ' ad_id="'+ad_id+'"';
        shortcode_for_php += ']\');'

        $('#shortcode_for_php').text(shortcode_for_php);


        //get all shortcode atts
        if($(this).attr('id') == 'shortcode_player'){

            var postData = [
                {name: 'action', value: 'mvp_get_shortcode_atts'},
                {name: 'player_id', value: player_id},
                {name: 'security', value: mvp_data.security}
            ];

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',
            }).done(function(response){
                console.log(response)

                var str = '[apmvp playlist_id="'+playlist_id+'"';
                if(typeof ad_id !== 'undefined' && ad_id != '')str += ' ad_id="'+ad_id+'"';

                var keyboard = ''

                for (var [key, value] of Object.entries(response)) { 
                    //console.log(key, value)

                    if(key != 'player_id' && key != 'elementsVisibilityArr' && key != 'mvp_edit_settings_nonce_field' && key != 'ev' && key != 'playbackPositionKey' && key != 'sourcePath' && key != 'playbackRateArr' && key != 'caption_breakPointArr' && key != 'breakPointArr' && key != 'keyboardControls'){

                        if(Array.isArray(value)){
                            value = value.join(",");
                        }

                        o = key.split(/(?=[A-Z])/).join('_').toLowerCase();//camelcase to underscore
                        str += ' '+o+'="'+value+'"';
                    }

                    if(key == 'keyboardControls'){
                        var k, len = value.length, ks = ''
                        for(k=0; k<len; k++){
                            ks += '{keycode: ' + value[k].keycode + ', action: "' + value[k].action + '"};'
                        }
                        ks = ks.substr(0, ks.length-1)//remove last comma
                        ks = ks.replace(/"/g, "'");

                        str += ' keyboard_controls="' + ks + '"';
                    }
                }

                str += ']';

                shortcode_all_atts = str;

                $('#shortcode_generator_all_atts').text(str);

                //console.log(response)
                //console.log(str)

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
            }); 

        }
        else if($(this).attr('id') == 'shortcode_ad'){
            //update all atts if we change ad_id

            if(shortcode_all_atts){
                if(typeof ad_id !== 'undefined' && ad_id != ''){

                    var s1 = shortcode_all_atts.substr(0,shortcode_all_atts.lastIndexOf('playlist_id')),
                    s2 = shortcode_all_atts.substr(shortcode_all_atts.lastIndexOf('playlist_id')),
                    s3 = s1 + ' ad_id="'+ad_id+'" ' + s2;

                    $('#shortcode_generator_all_atts').text(s3);

                }else if(ad_id == ''){//remove ad_id

                    var s = $('#shortcode_generator_all_atts').text();

                    var s1 = s.substr(0,s.lastIndexOf('ad_id="')),
                    s2 = s.substr(s.indexOf('ad_id="')+7),
                    s3 = s2.substr(s2.indexOf('"')+1),
                    s3 = $.trim(s1) + ' ' + $.trim(s3)

                    $('#shortcode_generator_all_atts').text(s3);

                }
            }
        }

    });

    $('#shortcode_player').change();



    //remove lock time from quick shortcod generator
    $(".mvp-quick-shortcode-field").find("#lock_time_field").remove()


    //quick video generator

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

    var playlistPosition;
    $('#playlistPosition').on('change',function(){
        playlistPosition = $(this).val();

        var src = mvp_data.plugins_url + '/assets/data/playlist_position/' + playlistPosition + '.png';
        $('#playlist-position-img').attr('src',src);

        $('#playlistStyle-field').hide();
        $('#playlistStyle-field2').hide();
        $('#playlistGridStyle-field').hide();
        $('#playlistGridStyle-field2').hide();
        $('#navigationType-field').hide();
        $('#usePlaylistToggle-field').show();
        $('#playlistOpened_field').hide();
        $('#gridType_field').hide()

        //show individual

        if(playlistPosition == 'no-playlist'){

            $('#usePlaylistToggle-field').hide();

        }else if(playlistPosition == 'outer' || playlistPosition == 'wall'){

            $('#playlistGridStyle-field').show();
            $('#playlistGridStyle-field2').show();
            $('#playlistOpened_field').show();
            $('#gridType_field').show()

        }else{

            $('#navigationType-field').show();
            $('#playlistOpened_field').show();


            $('#playlistStyle-field').show();
            $('#playlistStyle-field2').show();

        }

      

        //info
        $('.playlist-position-info').hide();
        $('#'+playlistPosition+'-info').show();

    }).change();









});