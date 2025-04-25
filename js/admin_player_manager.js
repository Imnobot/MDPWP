jQuery(document).ready(function($) {
    "use strict"



    var preloader = $('#mvp-loader'),
     _body = $('body'),
    _doc = $(document),
    empty_src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D',
    mvp_translate = $('#mvp-translate'),
    mvpAdmin = $('.mvp-admin'),
    jquery_csv_js = 'https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js'


    var _apschedule
    if(mvp_data.mvp_schedule){
      var sint = setInterval(function(){
        if(window.mvp_apschedule){
          clearInterval(sint)
          _apschedule = new mvp_apschedule()
        }
      },500)
    }


    var keyCodeArr = {
      0: 'That key has no keycode',
      3: 'break',
      8: 'backspace / delete',
      9: 'tab',
      12: 'clear',
      13: 'enter',
      16: 'shift',
      17: 'ctrl',
      18: 'alt',
      19: 'pause/break',
      20: 'caps lock',
      21: 'hangul',
      25: 'hanja',
      27: 'escape',
      28: 'conversion',
      29: 'non-conversion',
      32: 'spacebar',
      33: 'page up',
      34: 'page down',
      35: 'end',
      36: 'home',
      37: 'left arrow',
      38: 'up arrow',
      39: 'right arrow',
      40: 'down arrow',
      41: 'select',
      42: 'print',
      43: 'execute',
      44: 'Print Screen',
      45: 'insert',
      46: 'delete',
      47: 'help',
      48: '0',
      49: '1',
      50: '2',
      51: '3',
      52: '4',
      53: '5',
      54: '6',
      55: '7',
      56: '8',
      57: '9',
      58: ':',
      59: 'semicolon (firefox), equals',
      60: '<',
      61: 'equals (firefox)',
      63: 'ß',
      64: '@ (firefox)',
      65: 'a',
      66: 'b',
      67: 'c',
      68: 'd',
      69: 'e',
      70: 'f',
      71: 'g',
      72: 'h',
      73: 'i',
      74: 'j',
      75: 'k',
      76: 'l',
      77: 'm',
      78: 'n',
      79: 'o',
      80: 'p',
      81: 'q',
      82: 'r',
      83: 's',
      84: 't',
      85: 'u',
      86: 'v',
      87: 'w',
      88: 'x',
      89: 'y',
      90: 'z',
      91: 'Windows Key / Left ⌘ / Chromebook Search key',
      92: 'right window key',
      93: 'Windows Menu / Right ⌘',
      95: 'sleep',
      96: 'numpad 0',
      97: 'numpad 1',
      98: 'numpad 2',
      99: 'numpad 3',
      100: 'numpad 4',
      101: 'numpad 5',
      102: 'numpad 6',
      103: 'numpad 7',
      104: 'numpad 8',
      105: 'numpad 9',
      106: 'multiply',
      107: 'add',
      108: 'numpad period (firefox)',
      109: 'subtract',
      110: 'decimal point',
      111: 'divide',
      112: 'f1',
      113: 'f2',
      114: 'f3',
      115: 'f4',
      116: 'f5',
      117: 'f6',
      118: 'f7',
      119: 'f8',
      120: 'f9',
      121: 'f10',
      122: 'f11',
      123: 'f12',
      124: 'f13',
      125: 'f14',
      126: 'f15',
      127: 'f16',
      128: 'f17',
      129: 'f18',
      130: 'f19',
      131: 'f20',
      132: 'f21',
      133: 'f22',
      134: 'f23',
      135: 'f24',
      136: 'f25',
      137: 'f26',
      138: 'f27',
      139: 'f28',
      140: 'f29',
      141: 'f30',
      142: 'f31',
      143: 'f32',
      144: 'num lock',
      145: 'scroll lock',
      151: 'airplane mode',
      160: '^',
      161: '!',
      162: '؛ (arabic semicolon)',
      163: '#',
      164: '$',
      165: 'ù',
      166: 'page backward',
      167: 'page forward',
      168: 'refresh',
      169: 'closing paren (AZERTY)',
      170: '*',
      171: '~ + * key',
      172: 'home key',
      173: 'minus (firefox), mute/unmute',
      174: 'decrease volume level',
      175: 'increase volume level',
      176: 'next',
      177: 'previous',
      178: 'stop',
      179: 'play/pause',
      180: 'e-mail',
      181: 'mute/unmute (firefox)',
      182: 'decrease volume level (firefox)',
      183: 'increase volume level (firefox)',
      186: 'semi-colon / ñ',
      187: 'equal sign',
      188: 'comma',
      189: 'dash',
      190: 'period',
      191: 'forward slash / ç',
      192: 'grave accent / ñ / æ / ö',
      193: '?, / or °',
      194: 'numpad period (chrome)',
      219: 'open bracket',
      220: 'back slash',
      221: 'close bracket / å',
      222: 'single quote / ø / ä',
      223: '`',
      224: 'left or right ⌘ key (firefox)',
      225: 'altgr',
      226: '< /git >, left back slash',
      230: 'GNOME Compose Key',
      231: 'ç',
      233: 'XF86Forward',
      234: 'XF86Back',
      235: 'non-conversion',
      240: 'alphanumeric',
      242: 'hiragana/katakana',
      243: 'half-width/full-width',
      244: 'kanji',
      251: 'unlock trackpad (Chrome/Edge)',
      255: 'toggle touchpad',
    };


    //############################################//
    /* player manager */
    //############################################//


    var playerManagerSection = $('#mvp-player-manager-section')


    //sort players
    $('#mvp-players-order').one('click', function(){
        var location = $('#mvp-players-order-by').val()
        window.location.href = location;
    });



    //keyboard

    var keyboard_controls_field = $('#mvp-keyboard-controls-field'),
    keyboard_controls_field_inner = $('#mvp-keyboard-controls-field-inner')

    if(typeof mvp_keyboardControls_arr !== 'undefined'){

        var i, len = mvp_keyboardControls_arr.length, obj;

        if(len > 0){
            for(i=0;i<len;i++){

                obj = mvp_keyboardControls_arr[i]//all keyboard controls
                var tb = $('.mvp-value-table-wrap-orig').clone().removeClass('mvp-value-table-wrap-orig').addClass('mvp-value-table-wrap').appendTo(keyboard_controls_field_inner)

                tb.find('.mvp-keyboard-key').val(keyCodeArr[obj.keycode])
                tb.find('.mvp-keyboard-keycode').val(obj.keycode)
                tb.find('.mvp-keyboard-action').val(obj.action)

            }
        }

    }

    keyboard_controls_field.on('keyup', '.mvp-keyboard-key-enter', function(e) {

        //check if exist
        var new_key = e.keyCode
        if(new_key == '8' || new_key == '46')return false;//delete, backspace

        var used_keys = getAllUsedKeys()

        if(used_keys.indexOf(new_key) > -1){
            alert(mvp_translate.attr('data-key-exist'))
            return false;
        }

        $(this).closest('.mvp-value-table-wrap').find('.mvp-keyboard-keycode').val(e.keyCode)
        $(this).closest('.mvp-value-table-wrap').find('.mvp-keyboard-key').val(keyCodeArr[e.keyCode])

    })

    keyboard_controls_field.on('click', '.keyboard-controls-remove', function(){//remove key
        $(this).closest('.mvp-value-table-wrap').remove()
    })

    $('#mvp-keyboard-controls-add').on('click', function(){//add key
       
        $('.mvp-value-table-wrap-orig').clone().removeClass('mvp-value-table-wrap-orig').addClass('mvp-value-table-wrap').appendTo(keyboard_controls_field_inner)
    })







    //colors 

    $(".mvp-checkbox").spectrum({
        color: $(this).val(),
        showAlpha: true,
        chooseText: "Update",
        showInitial: true,
        showInput: true,
        preferredFormat: "hex",
        change: function(color) {
            $(this).val(color.toRgbString());
        }
    });



    //custom css
    var cssCodeEditor
    var jsCodeEditor

    if(document.getElementById("mvp_custom_css_field")){
         cssCodeEditor = CodeMirror.fromTextArea(document.getElementById("mvp_custom_css_field"), {
            lineNumbers: true,
            mode: 'css',
            lineWrapping:true                       
        });
    }

    //custom js
    
    if(document.getElementById("mvp_custom_js_field")){
        jsCodeEditor = CodeMirror.fromTextArea(document.getElementById("mvp_custom_js_field"), {
            lineNumbers: true,
            mode: 'js',
            lineWrapping:true                       
        });
    }
  
    



    //hls config

    var hls_config_Editor,
    dash_config_Editor 


    if(document.getElementById("mvp_hls_config")){

        $('#mvp-tab-stream-content').show()

         hls_config_Editor = CodeMirror.fromTextArea(document.getElementById("mvp_hls_config"), {
            lineNumbers: true,
            mode: 'js',
            lineWrapping:true                       
        });

         $('#mvp-tab-stream-content').hide()
    }

    if(document.getElementById("mvp_dash_config")){

        $('#mvp-tab-stream-content').show()

         dash_config_Editor = CodeMirror.fromTextArea(document.getElementById("mvp_dash_config"), {
            lineNumbers: true,
            mode: 'js',
            lineWrapping:true                       
        });

         $('#mvp-tab-stream-content').hide()
    }




    //lang

    var fetch_lang_on,
    translationEditContentField = $('#mvp-translation-edit-content-field'),
    scheduleField = $('#mvp-tab-schedule-content'),
    playerLanguage = $('#playerLanguage').on('change', function(){
        updatelang()
    })

    function updatelang(){

        if(fetch_lang_on) return false;
        fetch_lang_on = true;

        preloader.show()

        var postData = [
            {name: 'action', value: 'mvp_get_player_lang'},
            {name: 'security', value: mvp_data.security},
            {name: 'lang', value: playerLanguage.val()}
        ];

        jQuery.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',   
        }).done(function(response){

            Object.keys(response).forEach(function(key) {
                //console.log(key, response[key]);
                editPlayerForm.find('input[name="'+key+'"]').val(response[key])

                scheduleField.find('input[data-id="'+key+'"]').val(response[key]) 
            });

            fetch_lang_on = false;

            preloader.hide()

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            fetch_lang_on = false;
            preloader.hide()
        });
        
    }

    

    










    var customEndContentInited,
    media_end_action_html_CodeEditor,
    media_end_action_css_CodeEditor


    //custom media end screen
    if(document.getElementById("media_end_action_html")){

        $('#mvp-tab-media-end-action-content').show()

        media_end_action_html_CodeEditor = CodeMirror.fromTextArea(document.getElementById("media_end_action_html"), {
            lineNumbers: true,
            mode: 'js',
            lineWrapping:true                       
        });

        $('#mvp-tab-media-end-action-content').hide()
    }

    if(document.getElementById("media_end_action_css")){

        $('#mvp-tab-media-end-action-content').show()

        media_end_action_css_CodeEditor = CodeMirror.fromTextArea(document.getElementById("media_end_action_css"), {
            lineNumbers: true,
            mode: 'css',
            lineWrapping:true                       
        });

        $('#mvp-tab-media-end-action-content').hide()
    }

    $('#mediaEndAction').on('change', function(){

       $('#mvp-media-end-action-custom-wrap').hide()
       $('#mvp-media-end-action-image-wrap').hide()

        if($(this).val() == 'custom'){
            $('#mvp-media-end-action-custom-wrap').show()
        }else if($(this).val() == 'image'){
            $('#mvp-media-end-action-image-wrap').show()
        }

    }).change()



    




    //preset preview 
    $("#mvp-player-preset").change(function(){

        var t = $(this).val();

        var img = mvp_data.plugins_url + '/assets/presets/'+t+'.jpg';
        $('#preset-preview').attr('src', img);

        //preset info
        $('.mvp-player-info').hide();
        $('.player-info-'+t).show();

    }).change();






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

    if(typeof mvp_pi_icons_arr !== 'undefined' && mvp_pi_icons_arr != null){
        var i, len = mvp_pi_icons_arr.length, obj;
        for(i=0;i<len;i++){
            obj = mvp_pi_icons_arr[i]
            addPi(obj)
        }
        mvp_pi_table_wrap.show()
    }

    function addPi(item){

        var bp = $('.mvp-pi-table-orig').clone().removeClass('mvp-pi-table-orig').addClass('mvp-pi-table').show().appendTo(mvp_pi_table_wrap);

        if(typeof item !== 'undefined'){

            if(item.position)bp.find('.mvp-pi-position').val(item.position);

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
























    var editPlayerForm = $('#mvp-edit-player-form');
    var editPlayerSubmit;

    
     var preset;
    if(editPlayerForm.attr('data-preset') != undefined){
        preset = editPlayerForm.attr('data-preset');

        //toggle fields based on preset 
        if(preset.indexOf('grid1')>-1){
            $('#mvp-tab-css-scroll-content').addClass('mvp-force-hide')
            $('#mvp-tab-css-scroll').addClass('mvp-force-hide')
        }

        if(preset.indexOf('list')>-1){
            $('.totalScrollAction_field').show()
            $('#mvp-tab-css-loadmore-content').addClass('mvp-force-hide')
            $('#mvp-tab-css-loadmore').addClass('mvp-force-hide')
            $('#mvp-tab-translation-pagination').addClass('mvp-force-hide')
            $('#mvp-tab-translation-pagination-content').addClass('mvp-force-hide')
            
        }else{
            $('.totalScrollAction_field').hide()
        }

    }





    //playlist selector

    $('#includePlaylistsIntoSelector').on('change', function(){
        var v = $(this).val()
        if(v == 'all'){
            $('#playlist-selector-field').hide()
        }else{
            $('#playlist-selector-field').show()
        }
    }).change()

    var selectedPlaylists = $('#mvp-playlist-selector-selected')


    if(typeof $.fn.select2 !== 'undefined'){
        
        var selectedPlaylistsList = $('#playlist-selector-playlist-list').select2({
            placeholder: mvp_translate.attr('data-select-playlists'),
        }).on('change', function(e) {
           // console.log(selectedPlaylistsList.val())
            selectedPlaylists.val(selectedPlaylistsList.val())
        });

        if(selectedPlaylists.val()){
            var v = selectedPlaylists.val().split(',')
            selectedPlaylistsList.val(v).trigger('change')
        }

        //clear selected
        $('#mvp-playlist-selector-clear-selected').on('click', function(){
            $('#playlist-selector-playlist-list').val('').trigger('change')
        })
        //select all
        $('#mvp-playlist-selector-select-all').on('click', function(){
            $('#playlist-selector-playlist-list').find('option').prop("selected",true).trigger('change')
        })

    }




    //clear playback position
    $("#clear_playback_position").on('click', function (){

        var result = confirm(mvp_translate.attr('data-sure-to-clear'));
        if(result){
           var playbackPositionKey = "mvp-playback-position-" 
           if(localStorage)localStorage.removeItem(playbackPositionKey);
        }


    });





    //icons
    editPlayerForm.on('blur', '.mvp-icon-field', function(){
        var v = $(this).val(),
        parent = $(this).closest('tr').find('.mvp-icon-preview')
 
        if(v){
            parent.html(v)
        }

    })

    editPlayerForm.find('.mvp-icon-field').trigger('blur')









    $('#mvp-edit-player-form-submit').on('click', function (){

        if(editPlayerSubmit)return false;//prevent double submit
        editPlayerSubmit = true;

       if(!window.mvpvld)return


        //check required

        var required, first_input

        //we need to dom selector for lightbox player type
        var playerType = $('#playerType').val()
        if(playerType == 'lightbox'){
            var selectorInit = $('#selectorInit').val()
            if(isEmpty(selectorInit)){

                first_input = $('#selectorInit');

                $('#selectorInit').addClass('aprf');
                required = true;
            }
        }
        if(required){
            $('#mvp-tab-layout').click();

            //accordion expand 
            editPlayerForm.find('.option-tab.mvp-player-style').removeClass('option-closed');

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            editPlayerSubmit = false;
            alert(mvp_translate.attr('data-player-type-lightbox-needs-dom'));
            return false;
        }



        //pi icons
          var required, first_input;
          mvp_pi_table_wrap.find('input[required]').each(function(){

              var input = $(this);
              if(input.val() == ""){
                if(!first_input)first_input = input
                  input.addClass('aprf');
                  required = true;
              }
          });

          if(required){
            $('#mvp-tab-icons').click();

            //accordion expand 
            editPlayerForm.find('.option-tab.mvp-player-style').removeClass('option-closed');

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            editPlayerSubmit = false;
            alert(mvp_translate.attr('data-fill-required-fields'));
            return false;
        }





        //general settings
        $('#mvp-tab-playback-content').find('input[required]').each(function(){
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
            $('#mvp-tab-playback').click();

            //accordion expand with playback
            editPlayerForm.find('.option-tab.mvp-player-general').removeClass('option-closed');

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            editPlayerSubmit = false;
            alert(mvp_translate.attr('data-fill-required-fields'));
            return false;
        }


        //br points
        var breakPoints_field = $('#breakPoints_field');
        
        var required, first_input;
        breakPoints_field.find('input[required]').each(function(){

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
            $('#mvp-tab-layout').click();

            //accordion expand with br
            editPlayerForm.find('.option-tab.mvp-player-style').removeClass('option-closed');

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            editPlayerSubmit = false;
            alert(mvp_translate.attr('data-fill-required-fields'));
            return false;
        }
        

        //ev accordions expand
        var required, first_input;
        ev_wrap.find('.ev_width').each(function(){

            var input = $(this);
            if(input.val() == ""){
                input.addClass('aprf');
                input.closest('.option-tab.ev-unit-wrap').removeClass('option-closed');//expand ev

                if(!first_input){
                    first_input = input;
                }
                required = true;
            }
        });

        if(required){
            //accordion expand with ev
            var ps = editPlayerForm.find('.option-tab.mvp-player-style');
            ps.removeClass('option-closed');

            $('#mvp-tab-ev').click();

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            editPlayerSubmit = false;
            alert(mvp_translate.attr('data-fill-required-fields'));
            return false;
        }



        //icons

        $('#mvp-tab-player-icons-content').find('.mvp-icon-field').each(function(){
            var v = $(this).val().replace(/"/g, "'")
            $(this).val(v)
        })



        //captions br points
        var caption_breakPoints_field = $('#caption_breakPoints_field');
        
        var required, first_input;
        caption_breakPoints_field.find('input[required]').each(function(){

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
            $('#mvp-tab-caption').click();

            editPlayerForm.find('.option-tab.mvp-player-general').removeClass('option-closed');

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            editPlayerSubmit = false;
            alert(mvp_translate.attr('data-fill-required-fields'));
            return false;
        }

        //playback rate
        var playbackRate_field = $('#playbackRate_field');
        
        var required, first_input;
        playbackRate_field.find('input[required]').each(function(){

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
            $('#mvp-tab-playbackRate').click();

            editPlayerForm.find('.option-tab.mvp-player-general').removeClass('option-closed');

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            editPlayerSubmit = false;
            alert(mvp_translate.attr('data-fill-required-fields'));
            return false;
        }

        //keyboard
        var keyboardControls_field = $('#mvp-keyboard-controls-field');

        keyboardControls_field.find('.mvp-keyboard-key').each(function(){

            var input = $(this);
            if(input.val() == ""){
              input.closest('.mvp-value-table-wrap').remove()
            }
        });












        preloader.show();

        var options = {};
        $.each(editPlayerForm.serializeArray(), function(i, field) {

            if(field.name != 'mvp_custom_css_field'
            && field.name != 'mvp_custom_js_field'
            && field.name != 'media_end_action_html'
            && field.name != 'media_end_action_css'
            && field.name != 'playlistItemContent[]'
            && field.name != 'downloadVideoUserRoles[]'
            && field.name != 'viewVideoWithoutAdsUserRoles[]'
            && field.name != 'showInlineAdsUserRoles[]'

            && field.name != 'playbackRate_value[]' && field.name != 'playbackRate_menu_title[]'
            && field.name != 'caption_bp_width[]' && field.name != 'caption_bp_font_size[]'
            && field.name != 'bp_width[]' && field.name != 'bp_column[]' && field.name != 'bp_gutter[]' 

            && field.name.indexOf('ev[') == -1

            ){
                options[field.name] = field.value;
            } 
            
        });

        //custom media end action
        var media_end_action_html = media_end_action_html_CodeEditor ? media_end_action_html_CodeEditor.getValue() : '',
        media_end_action_css = media_end_action_css_CodeEditor ? media_end_action_css_CodeEditor.getValue() : ''

        options['media_end_action_html'] = media_end_action_html;
        options['media_end_action_css'] = media_end_action_css;


        var playlistItemContent = []
        $('#playlistItemContent-field').find("input:checkbox:checked").each(function() {
            playlistItemContent.push($(this).val()); 
        });
        options['playlistItemContent'] = playlistItemContent;


        var downloadVideoUserRoles = []
        $('#downloadVideoUserRoles-field').find("input:checkbox:checked").each(function() {
            downloadVideoUserRoles.push($(this).val()); 
        });
        options['downloadVideoUserRoles'] = downloadVideoUserRoles;


        var viewVideoWithoutAdsUserRoles = []
        $('#viewVideoWithoutAdsUserRoles-field').find("input:checkbox:checked").each(function() {
            viewVideoWithoutAdsUserRoles.push($(this).val()); 
        });
        options['viewVideoWithoutAdsUserRoles'] = viewVideoWithoutAdsUserRoles;

        var showInlineAdsUserRoles = []
        $('#showInlineAdsUserRoles-field').find("input:checkbox:checked").each(function() {
            showInlineAdsUserRoles.push($(this).val()); 
        });
        options['showInlineAdsUserRoles'] = showInlineAdsUserRoles;


        var playbackRate_value = []
        $('#mvp-playbackRate-br-table-wrap').find(".playbackRate-value").each(function() {
            playbackRate_value.push($(this).val()); 
        });
        options['playbackRate_value'] = playbackRate_value;

        var playbackRate_menu_title = []
        $('#mvp-playbackRate-br-table-wrap').find(".playbackRate-menu-title").each(function() {
            playbackRate_menu_title.push($(this).val()); 
        });
        options['playbackRate_menu_title'] = playbackRate_menu_title;


        var caption_bp_width = []
        $('#mvp-caption-br-table-wrap').find(".caption-bp-width").each(function() {
            caption_bp_width.push($(this).val()); 
        });
        options['caption_bp_width'] = caption_bp_width;

        var caption_bp_font_size = []
        $('#mvp-caption-br-table-wrap').find(".caption-bp-font-size").each(function() {
            caption_bp_font_size.push($(this).val()); 
        });
        options['caption_bp_font_size'] = caption_bp_font_size;


        var bp_width = []
        $('#mvp-br-table-wrap').find(".bp-width").each(function() {
            bp_width.push($(this).val()); 
        });
        options['bp_width'] = bp_width;

        var bp_column = []
        $('#mvp-br-table-wrap').find(".bp-column").each(function() {
            bp_column.push($(this).val()); 
        });
        options['bp_column'] = bp_column;

        var bp_gutter = []
        $('#mvp-br-table-wrap').find(".bp-gutter").each(function() {
            bp_gutter.push($(this).val()); 
        });
        options['bp_gutter'] = bp_gutter;


        var ev = []
        $('#mvp-ev-wrap').find(".ev-unit-wrap").each(function() {

            var arr = [], item = $(this), obj = {}
            var w = item.find('.ev_width').val()

            obj.width = w

            item.find("input:checkbox:checked").each(function() {
                obj[$(this).attr('data-cname')] = 'on'
            });

            ev.push(obj)

        });
        options.ev = ev;



        //keyboard
        var keyboardControls = []
        keyboard_controls_field.find(".mvp-value-table-wrap").each(function() {
            var item = $(this)

            var obj = {
                keycode: item.find('.mvp-keyboard-keycode').val(), 
                action: item.find('.mvp-keyboard-action').val()
            }
            keyboardControls.push(obj)
           
        });
        options.keyboardControls = keyboardControls;



        options.breakpoints_set = '1';//do not reload default bps if all bps are removed
        options.playbackrate_set = '1';


     


        //pi icons

        mvp_pi_table_wrap.find('.mvp-pi-icon').each(function(){
            var v = $(this).val().replace(/"/g, "'")
            $(this).val(v)
        })

        if(mvp_pi_table_wrap.children().length > 0){
            var pi_icons = [], obj

            mvp_pi_table_wrap.find('.mvp-pi-table').each(function(){
                var item = $(this)

                obj = {}

                obj.position = item.find('.mvp-pi-position').val().replace(/"/g, "'");

                if(item.find('.mvp-pi-title').val())obj.title = item.find('.mvp-pi-title').val().replace(/"/g, "'");

                if(item.find('.mvp-pi-class').val())obj.class = item.find('.mvp-pi-class').val().replace(/"/g, "'");

                if(item.find('.mvp-pi-url').val()){
                    obj.url = item.find('.mvp-pi-url').val().replace(/"/g, "'");
                }

                obj.icon = item.find('.mvp-pi-icon').val();

                if(item.find('.mvp-pi-rel').val())obj.rel = item.find('.mvp-pi-rel').val().replace(/"/g, "'");

                obj.target = item.find('.mvp-pi-target').val();

                pi_icons.push(obj)

            })

            options.pi_icons = pi_icons

        }












        var custom_css = cssCodeEditor ? cssCodeEditor.getValue() : '',
        custom_js = jsCodeEditor ? jsCodeEditor.getValue() : ''

        options.hlsConfig = hls_config_Editor ? hls_config_Editor.getValue() : ''
        options.dashConfig = dash_config_Editor ? dash_config_Editor.getValue() : ''

        


        var postData = [
            {name: 'action', value: 'mvp_save_player_options'},
            {name: 'player_id', value: editPlayerForm.attr('data-player-id')},
            {name: 'player_options', value: JSON.stringify(options)},
            {name: 'custom_css', value: custom_css},
            {name: 'custom_js', value: custom_js},
            {name: 'security', value: mvp_data.security}
        ];


        //schedule
        if(mvp_data.mvp_schedule){
           var schedule_data = _apschedule.getDataForSave()//saved in separate table
           if(!schedule_data){
            $('#mvp-tab-schedule').click()

            var gf = $('#schedule-high-time')
            gf[0].scrollIntoView({behavior: "smooth"});

            editPlayerSubmit = false;
            preloader.hide();
            return false;

           }

          postData.push({name: 'schedule', value: JSON.stringify(schedule_data)})
        }


        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            preloader.hide();
            editPlayerSubmit = false;

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
            editPlayerSubmit = false;
        }); 


        return false;
    });



    mvp_updatePlayerFields($)

  
    

   


    //fullscreen layout

    var wrapperMaxWidth = $('#wrapperMaxWidth'),
    wrapperMaxWidth_field = $('#wrapperMaxWidth_field');
    


    //context menu
    $('#rightClickContextMenu').on('change',function(){

        if($(this).val() == 'custom'){
            $('.mvp_customContextMenu').show();
        }else{
            $('.mvp_customContextMenu').hide();
        }

    }).change();

    //share
    $('#useShare').on('change',function(){

        if($(this).val() == '1'){
            $('.mvp_share').show();
        }else{
            $('.mvp_share').hide();
        }

    }).change();

    $('#youtubePlayerType').on('change',function(){
        var value = $(this).val();

        if(value == 'default'){
            $('.youtubePlayerTypeDefault_field').show();
            $('.youtubePlayerTypeChromeless_field').hide();
        }else{
            $('.youtubePlayerTypeDefault_field').hide();
            $('.youtubePlayerTypeChromeless_field').show();
        }

    }).change();

    $('#vimeoPlayerType').on('change',function(){
        var value = $(this).val();

        if(value == 'default'){
            $('.vimeoPlayerTypeDefault_field').show();
            $('.vimeoPlayerTypeChromeless_field').hide();
        }else{
            $('.vimeoPlayerTypeDefault_field').hide();
            $('.vimeoPlayerTypeChromeless_field').show();
        }

    }).change();

    $('#rememberPlaybackPosition').on('change',function(){
        var value = $(this).val();

        if(value == '1'){
            $('.playbackPositionKey-field').show();
        }else{
            $('.playbackPositionKey-field').hide();
        }

    }).change();









    //filter players

    var playerItemList = $('#mvp-player-item-list');

    $('#mvp-filter-player').on('keyup.apfilter',function(){

        var value = $(this).val(), i, j = 0, title, len = playerItemList.children('.player-item').length;

        for(i = 0; i < len; i++){

            title = playerItemList.children('.player-item').eq(i).find('.player-title').val();

            if(title.indexOf(value) >- 1){
                playerItemList.children('.player-item').eq(i).show();
            }else{
                playerItemList.children('.player-item').eq(i).hide();
                j++;
            }
        }

    });

    //select all
    $('.mvp-player-table').on('click', '.mvp-player-all', function(){
        if($(this).is(':checked')){
            playerItemList.find('.mvp-player-indiv').prop('checked', true);
        }else{
            playerItemList.find('.mvp-player-indiv').prop('checked', false);
        }
    });

    //delete selected
    $('#mvp-delete-players').on('click', function(){
        if(playerItemList.find('.mvp-player-indiv').length == 0)return false;//no media

        var selected = playerItemList.find('.mvp-player-indiv:checked');

        if(selected.length == 0) {
            alert(mvp_translate.attr('data-no-players-selected'));
            return false;
        }

        var result = confirm(mvp_translate.attr('data-sure-to-delete'));
        if(result){

            var arr = [];

            selected.each(function(){
                arr.push(parseInt($(this).closest('.mvp-player-row').attr('data-player-id'),10));
            });

            deletePlayer(arr)
              
        }
    });

    function deletePlayer(arr){

        preloader.show();

        var postData = [
            {name: 'action', value: 'mvp_delete_player'},
            {name: 'player_id', value: arr},
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
            if(response){
                var i, len = arr.length;
                for(i = 0;i<len;i++){
                    playerItemList.find('.mvp-player-row[data-player-id="'+arr[i]+'"]').remove();
                }
                $('.mvp-player-all').prop('checked', false);
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
        });
    }

    playerItemList.on('click', '.mvp-delete-player', function(){

        var result = confirm(mvp_translate.attr('data-sure-to-delete'));
        if(result){

            var player_id = parseInt($(this).closest('.mvp-player-row').attr('data-player-id'),10);

            preloader.show();
            
            deletePlayer([player_id])

        }

        return false;

    })





     //add player

    //modal

    var addPlayerModal = $('#mvp-add-player-modal'),
    addPlayerModalBg = $('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ // only if the target itself has been clicked
            removePlayerModal()
        }
    });


    $('#mvp-add-player-cancel').on('click',function(e){
        removePlayerModal()
    });


    var addPlayerSubmit
    $('#mvp-add-player-submit').on('click',function(e){

        var title_field = $('#player-title')

        if(isEmpty(title_field.val())){
            title_field.addClass('aprf'); 
            addPlayerModalBg.scrollTop(0);
            alert(mvp_translate.attr('data-title-required'));
            return false;
        }

        if(addPlayerSubmit)return false;
        addPlayerSubmit = true;

        var title = title_field.val(),
        preset = $('#mvp-player-preset').val()

        preloader.show()
        removePlayerModal()

        var postData = [
            {name: 'action', value: 'mvp_create_player'},
            {name: 'security', value: mvp_data.security},
            {name: 'title', value: title},
            {name: 'preset', value: preset},
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',   
        }).done(function(response){

            //go to edit player page
            window.location = playerItemList.attr('data-admin-url') + '?page=mvp_player_manager&action=edit_player&mvp_msg=player_created&player_id=' + response

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            addPlayerSubmit = false;
            removePlayerModal()
        });

        return false;

    });

    function removePlayerModal(){
        addPlayerModal.hide();  

        addPlayerModal.find('#player-title').val('').removeClass('aprf'); 
    }

    $('#mvp-add-player').on('click',function(e){
        showPlayerModal()
    });

    function showPlayerModal(){
        addPlayerModal.show();
        $('#player-title').focus()
        addPlayerModalBg.scrollTop(0);
    }














    //tabs

    //style

    var style_tabs = $('#mvp-style-tabs');

    style_tabs.find('.mvp-tab-header li').click(function(){
        var tab = $(this), id = tab.attr('id');

        if(!tab.hasClass('mvp-tab-active')){ 
            style_tabs.find('.mvp-tab-header li').removeClass('mvp-tab-active');  
            tab.addClass('mvp-tab-active');
            style_tabs.find('.mvp-tab-content').hide();

            style_tabs.find($('#'+ id + '-content')).show();
        }
    });

    style_tabs.find('.mvp-tab-header li').eq(0).addClass('mvp-tab-active');
    style_tabs.find('.mvp-tab-content').eq(0).show();


    //general

    var general_tabs = $('#mvp-general-tabs');

    general_tabs.find('.mvp-tab-header li').click(function(){
        var tab = $(this), id = tab.attr('id');

        if(!tab.hasClass('mvp-tab-active')){ 
            general_tabs.find('.mvp-tab-header li').removeClass('mvp-tab-active');  
            tab.addClass('mvp-tab-active');
            general_tabs.find('.mvp-tab-content').hide();

            general_tabs.find($('#'+ id + '-content')).show();

        }
    });

    general_tabs.find('.mvp-tab-header li').eq(0).addClass('mvp-tab-active');
    general_tabs.find('.mvp-tab-content').eq(0).show();

   

    //css 

    var css_tabs = $('#mvp-css-tabs');

    css_tabs.find('.mvp-tab-header li').click(function(){
        var tab = $(this), id = tab.attr('id');

        if(!tab.hasClass('mvp-tab-active')){ 
            css_tabs.find('.mvp-tab-header li').removeClass('mvp-tab-active');  
            tab.addClass('mvp-tab-active');
            css_tabs.find('.mvp-tab-content').hide();

            css_tabs.find($('#'+ id + '-content')).show();
        }
    });

    css_tabs.find('.mvp-tab-header li').eq(0).addClass('mvp-tab-active');
    css_tabs.find('.mvp-tab-content').eq(0).show();
        
    //hide show individual tabs for some presets
    css_tabs.find("tr[class^='mvp-css-config']").hide();
    css_tabs.find('.mvp-css-config-'+preset).show();

    //translation 

    var translation_tabs = $('#mvp-translation-tabs');

    translation_tabs.find('.mvp-tab-header li').click(function(){
        var tab = $(this), id = tab.attr('id');

        if(!tab.hasClass('mvp-tab-active')){ 
            translation_tabs.find('.mvp-tab-header li').removeClass('mvp-tab-active');  
            tab.addClass('mvp-tab-active');
            translation_tabs.find('.mvp-tab-content').hide();

            translation_tabs.find($('#'+ id + '-content')).show();
        }
    });

    translation_tabs.find('.mvp-tab-header li').eq(0).addClass('mvp-tab-active');
    translation_tabs.find('.mvp-tab-content').eq(0).show();



   

    //break points

    var mvp_br_table_wrap = $('#mvp-br-table-wrap').on('click', '.breakPoint_remove', function(e){
        $(this).closest('.mvp-br-table').remove();
    });

    if(mvp_br_table_wrap.length)mvp_br_table_wrap.sortable();

    if(typeof mvp_breakPoint_arr !== 'undefined'){

        var i, len = mvp_breakPoint_arr.length;
        for(i=0;i<len;i++){
            addBreakPoint(mvp_breakPoint_arr[i]);
        }
    }

    //add new break point

    $('#breakPoint_add').on('click', function(e){
        addBreakPoint();
    });   

    function addBreakPoint(item){

        var bp = $('.mvp-br-table-orig').clone().removeClass('mvp-br-table-orig').addClass('mvp-br-table').show().appendTo(mvp_br_table_wrap);

        if(typeof item !== 'undefined'){

            bp.find('.bp-width').prop({required: true, disabled: false}).val(item.width);
            bp.find('.bp-column').prop({required: true, disabled: false}).val(item.column);
            bp.find('.bp-gutter').prop({required: true, disabled: false}).val(item.gutter);

        }else{

            bp.find('.bp-width').prop({required: true, disabled: false});
            bp.find('.bp-column').prop({required: true, disabled: false});
            bp.find('.bp-gutter').prop({required: true, disabled: false});  
        }

    }





    //caption break points

    var mvp_caption_br_table_wrap = $('#mvp-caption-br-table-wrap').on('click', '.caption_breakPoint_remove', function(e){
        $(this).closest('.mvp-caption-br-table').remove();
    });

    if(mvp_caption_br_table_wrap.length)mvp_caption_br_table_wrap.sortable();

    if(typeof mvp_caption_breakPoint_arr !== 'undefined'){

        var i, len = mvp_caption_breakPoint_arr.length;
        for(i=0;i<len;i++){
            addCaptionBreakPoint(mvp_caption_breakPoint_arr[i]);
        }
    }

    //add new break point

    $('#caption_breakPoint_add').on('click', function(e){
        addCaptionBreakPoint();
    });   

    function addCaptionBreakPoint(item){

        var bp = $('.mvp-caption-br-table-orig').clone().removeClass('mvp-caption-br-table-orig').addClass('mvp-caption-br-table').show().appendTo(mvp_caption_br_table_wrap);

        if(typeof item !== 'undefined'){

            bp.find('.caption-bp-width').prop({required: true, disabled: false}).val(item.width);
            bp.find('.caption-bp-font-size').prop({required: true, disabled: false}).val(item.font_size);

        }else{

            bp.find('.caption-bp-width').prop({required: true, disabled: false});
            bp.find('.caption-bp-font-size').prop({required: true, disabled: false});
        }

    }




    //playback rate

    var mvp_playbackRate_br_table_wrap = $('#mvp-playbackRate-br-table-wrap').on('click', '.playbackRate_remove', function(e){
        $(this).closest('.mvp-playbackRate-br-table').remove();
    });

    if(mvp_playbackRate_br_table_wrap.length)mvp_playbackRate_br_table_wrap.sortable();

    if(typeof mvp_playbackRate_arr !== 'undefined'){

        var i, len = mvp_playbackRate_arr.length;
        for(i=0;i<len;i++){
            addplaybackRate(mvp_playbackRate_arr[i]);
        }
    }

    //add new break point

    $('#playbackRate_add').on('click', function(e){
        addplaybackRate();
    });   

    function addplaybackRate(item){

        var bp = $('.mvp-playbackRate-br-table-orig').clone().removeClass('mvp-playbackRate-br-table-orig').addClass('mvp-playbackRate-br-table').show().appendTo(mvp_playbackRate_br_table_wrap);

        if(typeof item !== 'undefined'){

            bp.find('.playbackRate-value').prop({required: true, disabled: false}).val(item.value);
            bp.find('.playbackRate-menu-title').prop({required: true, disabled: false}).val(item.menu_title);

        }else{

            bp.find('.playbackRate-value').prop({required: true, disabled: false});
            bp.find('.playbackRate-menu-title').prop({required: true, disabled: false});
        }

    }







    //elements visibility

    var ev_wrap = $('#mvp-ev-wrap').on('click', '.ev_breakPoint_remove', function(e){
        var result = confirm("Are you sure to delete?");
        if(result){
            $(this).closest('.ev-unit-wrap').remove();
            adjustEvPoint();
        }
    });

    if(typeof mvp_elementsVisibility_arr !== 'undefined'){

        var i, len = mvp_elementsVisibility_arr.length;
        for(i=0;i<len;i++){
            addEvPoint(mvp_elementsVisibility_arr[i], true);
        }

        adjustEvPoint();
    }

    //sortable 

    if(ev_wrap.length){

        ev_wrap.sortable({ 
            handle: ".option-toggle",
            update: function(event, ui) {
                adjustEvPoint();
            }
        });

    }

    function adjustEvPoint(){
        var i = 0;

        ev_wrap.find('.ev-unit-wrap').each(function(){
            var bp = $(this);

            bp.find('.ev-elem').each(function(){
                var elem = $(this);
                var name = elem.attr('data-cname'), nn = 'ev'+'['+i+']['+name+']';
                elem.attr('name', nn);
            });

            i++;
        })
    }

    //add new ev

    $('#ev_breakPoint_add').on('click', function(e){
        addEvPoint();
        adjustEvPoint();
    }); 

    function addEvPoint(item, closed){

        var bp = $('.ev-unit-wrap-orig').clone().removeClass('ev-unit-wrap-orig').addClass('ev-unit-wrap').show().appendTo(ev_wrap);

        if(closed)bp.addClass('option-closed');//close accordions on start

        if(typeof item !== 'undefined'){

            bp.find('.ev_width').prop({required: true, disabled: false}).val(item.width).on('keyup',function(e){
                bp.find('.option-title').html($(this).val());
            });
            bp.find('.option-title').html(item.width);

            bp.find('.ev_seekbar').prop({checked: item.seekbar == 'on'});
            bp.find('.ev_play').prop({checked: item.play == 'on'});
            bp.find('.ev_time').prop({checked: item.time == 'on'});
            bp.find('.ev_download').prop({checked: item.download == 'on'});
            bp.find('.ev_share').prop({checked: item.share == 'on'});
            bp.find('.ev_info').prop({checked: item.info == 'on'});
            bp.find('.ev_next').prop({checked: item.next == 'on'});
            bp.find('.ev_previous').prop({checked: item.previous == 'on'});
            bp.find('.ev_rewind').prop({checked: item.rewind == 'on'});
            bp.find('.ev_skip_backward').prop({checked: item.skip_backward == 'on'});
            bp.find('.ev_skip_forward').prop({checked: item.skip_forward == 'on'});
            bp.find('.ev_fullscreen').prop({checked: item.fullscreen == 'on'});
            bp.find('.ev_pip').prop({checked: item.pip == 'on'});
            bp.find('.ev_theater').prop({checked: item.theater == 'on'});
            bp.find('.ev_volume').prop({checked: item.volume == 'on'});
            bp.find('.ev_volume_seekbar').prop({checked: item.volume_seekbar == 'on'});
            bp.find('.ev_playlist').prop({checked: item.playlist == 'on'});
            bp.find('.ev_quality').prop({checked: item.quality == 'on'});
            bp.find('.ev_subtitles').prop({checked: item.subtitles == 'on'});
            bp.find('.ev_settings').prop({checked: item.settings == 'on'});
            bp.find('.ev_cc').prop({checked: item.cc == 'on'});
            bp.find('.ev_chapter').prop({checked: item.chapter == 'on'});
            bp.find('.ev_annotations').prop({checked: item.annotations == 'on'});
            bp.find('.ev_popups').prop({checked: item.popups == 'on'});
            bp.find('.ev_playback_rate').prop({checked: item.playback_rate == 'on'});
            bp.find('.ev_audio_language').prop({checked: item.audio_language == 'on'});
            bp.find('.ev_upnext').prop({checked: item.upnext == 'on'});

        }else{

            bp.find('.ev_width').prop({required: true, disabled: false}).on('keyup',function(e){
                bp.find('.option-title').html($(this).val());
            });
            bp.find('.ev_seekbar').prop({disabled: false});
            bp.find('.ev_play').prop({disabled: false});
            bp.find('.ev_time').prop({disabled: false});
            bp.find('.ev_download').prop({disabled: false});
            bp.find('.ev_share').prop({disabled: false});
            bp.find('.ev_info').prop({disabled: false});
            bp.find('.ev_next').prop({disabled: false});
            bp.find('.ev_previous').prop({disabled: false});
            bp.find('.ev_rewind').prop({disabled: false});
            bp.find('.ev_skip_backward').prop({disabled: false});
            bp.find('.ev_skip_forward').prop({disabled: false});
            bp.find('.ev_fullscreen').prop({disabled: false});
            bp.find('.ev_pip').prop({disabled: false});
            bp.find('.ev_theater').prop({disabled: false});
            bp.find('.ev_volume').prop({disabled: false});
            bp.find('.ev_volume_seekbar').prop({disabled: false});
            bp.find('.ev_playlist').prop({disabled: false});
            bp.find('.ev_quality').prop({disabled: false});
            bp.find('.ev_subtitles').prop({disabled: false});
            bp.find('.ev_settings').prop({disabled: false});
            bp.find('.ev_cc').prop({disabled: false});
            bp.find('.ev_chapter').prop({disabled: false});
            bp.find('.ev_annotations').prop({disabled: false});
            bp.find('.ev_popups').prop({disabled: false});
            bp.find('.ev_playback_rate').prop({disabled: false});
            bp.find('.ev_audio_language').prop({disabled: false});
            bp.find('.ev_upnext').prop({disabled: false});

        }
    }





    //360 info

    var vrInfo_preview = $('#vrInfo_preview'),
    vrInfo_remove = $('#vrInfo_remove').on('click', function(e){
        e.preventDefault();
        vrInfo_preview.attr('src',empty_src);
        vrInfo.val('');
        vrInfo_remove.hide();
    }),
    vrInfo = $('#vrInfo').on('keyup',function(){
        if($(this).val() == ''){
            vrInfo_preview.attr('src',empty_src);
            vrInfo_remove.hide();
        }
    });
    if(vrInfo.val() != ''){
        vrInfo_remove.show();
    }else{
        vrInfo_remove.hide();
    }

    //logo

    var logo_preview = $('#logo_preview'),
    logo_remove = $('#logo_remove').on('click', function(e){
        e.preventDefault();
        logo_preview.attr('src',empty_src);
        logoPath.val('');
        logo_remove.hide();
    }),
    logoPath = $('#logoPath').on('keyup',function(){
        if($(this).val() == ''){
            logo_preview.attr('src',empty_src);
            logo_remove.hide();
        }
    });
    if(logoPath.val() != ''){
        logo_remove.show();
    }else{
        logo_remove.hide();
    }

    //offline image

    var offlineImage_preview = $('#offlineImage_preview'),
    offlineImage_remove = $('#offlineImage_remove').on('click', function(e){
        e.preventDefault();
        offlineImage_preview.attr('src',empty_src);
        offlineImage.val('');
        offlineImage_remove.hide();
    }),
    offlineImage = $('#offlineImage').on('keyup',function(){
        if($(this).val() == ''){
            offlineImage_preview.attr('src',empty_src);
            offlineImage_remove.hide();
        }
    });
    if(offlineImage.val() != ''){
        offlineImage_remove.show();
    }else{
        offlineImage_remove.hide();
    }


    //media end image

    var mediaEndImage_preview = $('#mediaEndImage_preview'),
    mediaEndImage_remove = $('#mediaEndImage_remove').on('click', function(e){
        e.preventDefault();
        mediaEndImage_preview.attr('src',empty_src);
        mediaEndImage.val('');
        mediaEndImage_remove.hide();
    }),
    mediaEndImage = $('#mediaEndImage').on('keyup',function(){
        if($(this).val() == ''){
            mediaEndImage_preview.attr('src',empty_src);
            mediaEndImage_remove.hide();
        }
    });
    if(mediaEndImage.val() != ''){
        mediaEndImage_remove.show();
    }else{
        mediaEndImage_remove.hide();
    }


    //preloader

    var playerLoaderImgSrc_preview = $('#playerLoaderImgSrc_preview'),
    playerLoaderImgSrc_remove = $('#playerLoaderImgSrc_remove').on('click', function(e){
        e.preventDefault();
        playerLoaderImgSrc_preview.attr('src',empty_src);
        playerLoaderImgSrc.val('');
        playerLoaderImgSrc_remove.hide();
    }),
    playerLoaderImgSrc = $('#playerLoaderImgSrc').on('keyup',function(){
        if($(this).val() == ''){
            playerLoaderImgSrc_preview.attr('src',empty_src);
            playerLoaderImgSrc_remove.hide();
        }
    });
    if(playerLoaderImgSrc.val() != ''){
        playerLoaderImgSrc_remove.show();
    }else{
        playerLoaderImgSrc_remove.hide();
    }

    //big play

    var bigPlayImgSrc_preview = $('#bigPlayImgSrc_preview'),
    bigPlayImgSrc_remove = $('#bigPlayImgSrc_remove').on('click', function(e){
        e.preventDefault();
        bigPlayImgSrc_preview.attr('src',empty_src);
        bigPlayImgSrc.val('');
        bigPlayImgSrc_remove.hide();
    }),
    bigPlayImgSrc = $('#bigPlayImgSrc').on('keyup',function(){
        if($(this).val() == ''){
            bigPlayImgSrc_preview.attr('src',empty_src);
            bigPlayImgSrc_remove.hide();
        }
    });
    if(bigPlayImgSrc.val() != ''){
        bigPlayImgSrc_remove.show();
    }else{
        bigPlayImgSrc_remove.hide();
    }






    /* uploaders */
    
    var playerUploadManagerArr = [
        {btn: $("#logo_path_upload"), manager:null},
        {btn: $("#offlineImage_upload"), manager:null},
        {btn: $("#mediaEndImage_upload"), manager:null},
        {btn: $("#playerLoaderImgSrc_upload"), manager:null},
        {btn: $("#bigPlayImgSrc_upload"), manager:null},
        {btn: $("#vrInfo_upload"), manager:null},
    ];
    setUploadManagerPlayer(playerUploadManagerArr);

    function setUploadManagerPlayer(arr){
        var i, len = arr.length, item;
        for(i=0;i<len;i++){
            item = arr[i].btn.attr('data-id',i);
        
            item.on('click',function(e){
                e.preventDefault();
            
                var library, source, id = $(this).attr("id"), data_id = parseInt($(this).attr("data-id"),10), custom_uploader;

                if(playerUploadManagerArr[data_id].manager){//reuse
                    playerUploadManagerArr[data_id].manager.open();
                    return;
                }

                if(id == 'logo_path_upload'){
                
                    library = "image";

                    source = '#logoPath';

                }else if(id == 'offlineImage_upload'){
                
                    library = "image";
                    source = '#offlineImage'; 

                }else if(id == 'mediaEndImage_upload'){
                
                    library = "image";
                    source = '#mediaEndImage';           

                }else if(id == 'playerLoaderImgSrc_upload'){
                
                    library = "image";
                    source = '#playerLoaderImgSrc';

                }else if(id == 'bigPlayImgSrc_upload'){
                
                    library = "image";
                    source = '#bigPlayImgSrc';    

                }else if(id == 'vrInfo_upload'){
                
                    library = "image";
                    source = '#vrInfo';

                }

                custom_uploader = wp.media({
                    library:{
                        type: library
                    }
                })
                .on("select", function(){
                    var attachment = custom_uploader.state().get("selection").first().toJSON();
                    $(source).val(attachment.url);

                    if(source == '#logoPath'){

                        logo_preview.attr('src', attachment.url);
                        logo_remove.show();
                   
                    }else if(source == '#offlineImage'){

                        offlineImage_preview.attr('src', attachment.url);
                        offlineImage_remove.show();

                    }else if(source == '#mediaEndImage'){

                        mediaEndImage_preview.attr('src', attachment.url);
                        mediaEndImage_remove.show();
                    }
                    else if(source == '#playerLoaderImgSrc'){

                        playerLoaderImgSrc_preview.attr('src', attachment.url);
                        playerLoaderImgSrc_remove.show();

                        $('#playerLoaderImgW').val(attachment.width)
                        $('#playerLoaderImgH').val(attachment.height) 
                    }
                    else if(source == '#bigPlayImgSrc'){

                        bigPlayImgSrc_preview.attr('src', attachment.url);
                        bigPlayImgSrc_remove.show();

                        $('#bigPlayImgW').val(attachment.width)
                        $('#bigPlayImgH').val(attachment.height) 
                    }
                    else if(source == '#vrInfo'){

                        vrInfo_preview.attr('src', attachment.url);
                        vrInfo_remove.show();
                    }

                })
                .open();

                playerUploadManagerArr[data_id].manager = custom_uploader;//save for reuse

            });
        }   
    }

    





    /* export / import */

    

    //export player

    $('.mvp-table').on('click','.mvp-export-player-btn', function(){

        preloader.show();

        var player_id = $(this).attr('data-player-id'),
        player_title = $(this).closest('.mvp-player-row').find('.title-editable').val();

        player_title = player_title.replace(/\W/g, '');//safe chars

        var postData = [
            {name: 'action', value: 'mvp_export_player'},
            {name: 'player_id', value: player_id},
            {name: 'player_title', value: player_title},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            preloader.hide();

            if(response.zip) {
                location.href = response.zip;

                var postData = [
                    {name: 'action', value: 'mvp_clean_export'},
                    {name: 'zipname', value: response.zip_clean},
                    {name: 'security', value: mvp_data.security}
                ];

                $.ajax({
                    url: mvp_data.ajax_url,
                    type: 'post',
                    data: postData,
                }); 
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
        });

        return false; 

    });

    //import player

    var playerFileInput = $('#mvp-player-file-input').on('change', preparePlayerUpload);

    var import_player_btn = $('#mvp-import-player').click(function(){
        playerFileInput.trigger('click'); 
        return false;
    }); 

    function preparePlayerUpload(event) { 

        //check if correct file uploaded
        if(event.target.files.length == 0) return;
        var fileName = event.target.files[0].name;
        if(fileName.indexOf('mvp_player_id_') == -1){
            alert(mvp_translate.attr('data-upload-previously-exported-player-zip'));
            return;
        }

        preloader.show();

        import_player_btn.css('display','none');

        var file = event.target.files;
        var data = new FormData();
        var nonce = $('#mvp-import-player-form').find("#_wpnonce").val();
        $.each(file, function(key, value){
            data.append("mvp_file_upload", value);
        });
        data.append("action", "mvp_import_player");
        data.append("security", mvp_data.security );

        playerFileInput.val('');

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            processData: false, 
            contentType: false, 
        }).done(function(response){

            if(response.player){

                getCSVPlayer(response.player);

            }else{
                import_player_btn.css('display','inline-block');
                preloader.hide();

                alert(mvp_translate.attr('data-error-importing'));
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            import_player_btn.css('display','inline-block');
            preloader.hide();

            alert(mvp_translate.attr('data-error-importing'));
        }); 

    }

    function getCSVPlayer(url){

        if(typeof $.csv === 'undefined'){

            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = jquery_csv_js;
            script.onload = script.onreadystatechange = function() {
                if(!this.readyState || this.readyState == 'complete'){
                    getCSVPlayer(url);
                }
            };
            script.onerror = function(){
                console.log("Error loading " + this.src);
            }
            var tag = document.getElementsByTagName('script')[0];
            tag.parentNode.insertBefore(script, tag);

        }else{

            $.ajax({
                type: 'GET',
                url: url,
                dataType: "text"
            }).done(function(response) {

                var d = $.csv.toArray(response, {separator:'|', delimiter:'^'}, function(err, data){
                                       
                    //send to db

                    var postData = [
                        {name: 'action', value: 'mvp_import_player_db'},
                        {name: 'player', value: JSON.stringify(data)},
                        {name: 'security', value: mvp_data.security}
                    ];

                    $.ajax({
                        url: mvp_data.ajax_url,
                        type: 'post',
                        data: postData,
                        dataType: 'json',
                    }).done(function(response){

                        console.log(response)

                        //go to edit player page
                        window.location = playerItemList.attr('data-admin-url') + '?page=mvp_player_manager&action=edit_player&mvp_msg=player_created&player_id=' + response

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText, textStatus, errorThrown);
                        preloader.hide();
                        import_player_btn.css('display','inline-block');
                        alert(mvp_translate.attr('data-error-importing'));
                    }); 

                }); 
                  
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log('Error process CSV: ' + jqXHR.responseText, textStatus, errorThrown);
                preloader.hide();
                import_player_btn.css('display','inline-block');
                alert(mvp_translate.attr('data-error-importing'));
                
            });

        }
    }


   

    /* duplicate */

    $('.mvp-duplicate-player').on('click', function(){
        return duplicatePlayer('Enter title for new player:', $(this));
    });

    function duplicatePlayer(msg, target){
        var title = prompt(msg);

        if(title == null){//cancel
            return false;
        }else if(title.replace(/^\s+|\s+$/g, '').length == 0) {//empty
            duplicatePlayer(msg, target);
            return false;
        }else{

          preloader.show()
            
            var postData = [
                {name: 'action', value: 'mvp_duplicate_player'},
                {name: 'security', value: mvp_data.security},
                {name: 'title', value: title},
                {name: 'player_id', value: target.closest('.mvp-player-row').attr('data-player-id')},
            ];

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',   
            }).done(function(response){

                //go to edit player page
                window.location = playerItemList.attr('data-admin-url') + '?page=mvp_player_manager&action=edit_player&mvp_msg=player_created&player_id=' + response

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText, textStatus, errorThrown);
            });

        }
    }

    
    

    //############################################//
    /* helpers */
    //############################################//

    function isEmpty(str){
        return str.replace(/^\s+|\s+$/g, '').length == 0;
    }

    function sortNumber(a,b) {
        return a - b;
    }

    function hmsToSecondsOnly(str) {
        var p = str.split(':'),
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
            var x = a.find(selector).html(); var y = b.find(selector).html();
            return sortOrder * ((x < y) ? -1 : ((x > y) ? 1 : 0));
        });
    }

    function keysrtNum(arr, selector, reverse) {
        var sortOrder = 1;
        if(reverse)sortOrder = -1;
        return arr.sort(function(a, b) {
            var x = parseInt(a.find(selector).html(),10); var y =  parseInt(b.find(selector).html(),10);
            return sortOrder * ((x < y) ? -1 : ((x > y) ? 1 : 0));
        });
    }

    function isNumeric(value) {
        return /^-?\d+$/.test(value);
    }

    
     function getAllUsedKeys(){
        var arr = []
        keyboard_controls_field.find(".mvp-value-table-wrap:not(.mvp-value-table-wrap-disabled, .mvp-value-table-wrap-active)").each(function() {
            arr.push(parseInt($(this).find('.mvp-keyboard-keycode').val(),10))
        });
        return arr
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



    function formatDate(date){
        var dd = date.getDate(),
        mm = date.getMonth()+1,
        yyyy = date.getFullYear();
        if(dd<10) {dd='0'+dd}
        if(mm<10) {mm='0'+mm}
        var f = yyyy+'-'+mm+'-'+dd;
        return f;
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

    function getUrlParameter(k) {
        var p={};
        window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
        return k?p[k]:p;
    };

    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }



	

});