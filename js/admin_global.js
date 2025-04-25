jQuery(document).ready(function($) {
    "use strict"


    var preloader = $('#mvp-loader'),
    mvp_translate = $('#mvp-translate')


    var globalSettingsForm = $('#mvp-form-global-settings');

    //prevent enter sumbit form
    globalSettingsForm.keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

	

    //custom css
    var globalCssCodeEditor;

      if(document.getElementById("mvp_global_custom_css_field")){
           globalCssCodeEditor = CodeMirror.fromTextArea(document.getElementById("mvp_global_custom_css_field"), {
              lineNumbers: true,
              mode: 'css',
              lineWrapping:true                       
          });
      }



    //user limit


    var mvp_user_limit_table_wrap = $('#mvp-user-limit-table-wrap').on('click', '.user-limit-remove', function(e){
        $(this).closest('.mvp-user-limit-table').remove();
    });

    if(typeof mvp_userLimit !== 'undefined'){

        if(mvp_userLimit.length){
            var i, len = mvp_userLimit.length, uo 
            for(i =0; i <len; i++){
                uo = mvp_userLimit[i]

                Object.keys(uo).forEach(function(key) {
                    addUserLimit(key, uo[key].playlistLimit, uo[key].videoLimit);
                });

            }
        }else{

            Object.keys(mvp_userLimit).forEach(function(key) {
                //console.log(key, mvp_userLimit[key]);
                addUserLimit(key, mvp_userLimit[key].playlistLimit, mvp_userLimit[key].videoLimit);
            });

        }
    }

    $('#user-limit-add').on('click', function(e){
        addUserLimit();
    });   

    function addUserLimit(user_role, playlist_limit, video_limit){

        var bp = $('.mvp-user-limit-table-orig').clone().removeClass('mvp-user-limit-table-orig').addClass('mvp-user-limit-table').show().appendTo(mvp_user_limit_table_wrap);

        if(typeof user_role !== 'undefined'){

            bp.find('.user-role').prop({required: true, disabled: false}).val(user_role);
            bp.find('.playlist-limit').prop({required: true, disabled: false}).val(playlist_limit);
            bp.find('.video-limit').prop({required: true, disabled: false}).val(video_limit);

        }else{

            bp.find('.user-role').prop({required: true, disabled: false});
            bp.find('.playlist-limit').prop({required: true, disabled: false});
            bp.find('.video-limit').prop({required: true, disabled: false});
        }

    }






    var isSubmit;
    $('#mvp-edit-global-options-submit').on('click', function (){

        if(isSubmit)return false;//prevent double submit
        isSubmit = true;

        if(!window.mvpvld)return




        //roles
        var user_limit_field = $('#mvp-user-limit-field');
        
        var required, first_input;
        user_limit_field.find('input[required]').each(function(){

            var input = $(this);
            if(input.val() == ""){

                if(!first_input){
                    first_input = input;
                }

                input.addClass('aprf');
                required = true;
            }
        });

        if(required){
            user_limit_field.closest('.option-tab').removeClass('option-closed');

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            isSubmit = false;
            alert(mvp_translate.attr('data-fill-required-fields'));
            return false;
        }







        preloader.show()
        
        var options = {};
        $.each(globalSettingsForm.serializeArray(), function(i, field) {

            if(field.name != 'mvp_global_custom_css_field'
             && field.name != 'user-role[]' && field.name != 'playlist-limit[]' && field.name != 'video-limit[]'){
                options[field.name] = field.value;
            }
        });

        globalSettingsForm.find("input:checkbox:not(:checked)").map(function() {
            options[this.name] = "0";
        });


        var userLimit = {}
        globalSettingsForm.find(".mvp-user-limit-table").each(function() {
            var key = $(this).find('.user-role').val(),
            playlistLimit = $(this).find('.playlist-limit').val(),
            videoLimit = $(this).find('.video-limit').val()

            userLimit[key] = {playlistLimit: playlistLimit, videoLimit: videoLimit };
        });
      
        options['userLimit'] = userLimit;

            



        var global_custom_css = globalCssCodeEditor ? globalCssCodeEditor.getValue() : ''
        options.global_custom_css = global_custom_css;

       
        var postData = [
            {name: 'action', value: 'mvp_save_global_options'},
            {name: 'security', value: mvp_data.security},
            {name: 'options', value: JSON.stringify(options)},

        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',   
        }).done(function(response){
            console.log(response)

            isSubmit = false;
            preloader.hide()

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            isSubmit = false;
            preloader.hide()
        });

        return false;
    });

    /* watched percentage */

    var is_clear_percentage;

    $('.mvp-clear-watched-percentage-all').on('click', function(){

        var result = confirm("Are you sure you want to clear?");
        if(result){

            if(is_clear_percentage)return false;
            is_clear_percentage = true;

            preloader.show();
           
            var postData = [
                {name: 'action', value: 'mvp_clear_watched_percentage_all'},
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





});