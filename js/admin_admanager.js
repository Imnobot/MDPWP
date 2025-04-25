jQuery(document).ready(function($) {
    "use strict"

    var preloader = $('#mvp-loader'),
     _body = $('body'),
    _doc = $(document),
    empty_src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D',
    mvp_translate = $('#mvp-translate'),
    mvpAdmin = $('.mvp-admin'),
    jquery_csv_js = 'https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js'


     //############################################//
    /* ad manager */
    //############################################//


    //sort ads
    $('#mvp-ads-order').one('click', function(){
        var location = $('#mvp-ads-order-by').val()
        window.location.href = location;
    });


    var _MVPAdContent = new MVPAdContent();



    //tabs

    var ad_tabs = $('#mvp-ad-tabs');

    ad_tabs.find('.mvp-tab-header li').click(function(){
        var tab = $(this), id = tab.attr('id');

        if(!tab.hasClass('mvp-tab-active')){ 
            ad_tabs.find('.mvp-tab-header li').removeClass('mvp-tab-active');  
            tab.addClass('mvp-tab-active');
            ad_tabs.find('.mvp-tab-content').hide();

            ad_tabs.find($('#'+ id + '-content')).show();
        }
    });

    ad_tabs.find('.mvp-tab-header li').eq(0).addClass('mvp-tab-active');
    ad_tabs.find('.mvp-tab-content').eq(0).show();


    var tab_ad_adverts_content = $('#mvp-tab-ad-adverts-content'),
    tab_ad_annotations_content = $('#mvp-tab-ad-annotations-content'),
    tab_ad_popup_content = $('#mvp-tab-ad-popup-content')





    //add ad

    //modal

    var addAdModal = $('#mvp-add-ad-modal'),
    adModalBg = $('.mvp-modal-bg').on('click',function(e){
        if(e.target == this){ // only if the target itself has been clicked
            removeAdModal()
        }
    });



    $('#mvp-add-ad-cancel').on('click',function(e){
        removeAdModal()
    });


    var addAdSubmit
    $('#mvp-add-ad-submit').on('click',function(e){

        var title_field = $('#ad-title')

        if(isEmpty(title_field.val())){
            title_field.addClass('aprf'); 
            adModalBg.scrollTop(0);
            alert(mvp_translate.attr('data-title-required'));
            return false;
        }

        if(addAdSubmit)return false;
        addAdSubmit = true;

        var title = title_field.val()

        preloader.show()
        removeAdModal()

        var postData = [
            {name: 'action', value: 'mvp_create_ad'},
            {name: 'security', value: mvp_data.security},
            {name: 'title', value: title}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',   
        }).done(function(response){

            //go to edit ad page
            window.location = adItemList.attr('data-admin-url') + '?page=mvp_ad_manager&action=edit_ad&mvp_msg=ad_created&ad_id=' + response

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            addAdSubmit = false;
            removeAdModal()
        });

        return false;

    });

    function removeAdModal(){
        addAdModal.hide();  

        addAdModal.find('#ad-title').val('').removeClass('aprf'); 
    }

    $('#mvp-add-ad').on('click',function(e){
        showAdModal()
    });

    function showAdModal(){
        addAdModal.show();
        $('#ad-title').focus()
        adModalBg.scrollTop(0);
    }



    var editAdForm = $('#mvp-edit-ad-form');
    var editAdSubmit;
    $('#mvp-edit-ad-form-submit').on('click', function (){

        if(editAdSubmit)return false;//prevent double submit
        editAdSubmit = true;

        if(!window.mvpvld)return false;

        $('#type').prop('disabled', false);//Disabled form inputs do not appear in the request

        //check required
        var parent, tab, first_input;

        ad_tabs.find('.mvp-tab-content').each(function(){
            tab = $(this);
            tab.find('input[ap-required=true],textarea[ap-required=true]').each(function(){
                var input = $(this);
                if(input.val() == ""){

                    if(!first_input)first_input = input

                    input.addClass('aprf');
                    if(!parent){
                        parent = tab.attr('id');
                        parent = parent.substr(0,parent.length - 8);//remove -content
                    }

                    if(parent == 'mvp-tab-ad-adverts'){//expand ad accordions
                        input.closest('.option-tab.mvp-ad-source').removeClass('option-closed');
                    }
                    if(parent == 'mvp-tab-ad-annotations'){//expand annotation accordions
                        input.closest('.option-tab.mvp-annotation-source').removeClass('option-closed');
                    }

                }else{
                    input.removeClass('aprf');
                }
            });
        });

        if(parent){
            $('#'+parent).click();
            editAdSubmit = false;

            first_input[0].scrollIntoView({behavior: "smooth",block: 'center'});
            first_input = null;

            alert(mvp_translate.attr('data-fill-required-fields'));
            return false;
        }


        preloader.show()



        //ads

        var idata = [] 
        tab_ad_adverts_content.find('.mvp-ad-source.ad-pre').each(function(){
            var item = $(this)
            idata.push(getAdOptions(item, 'ad-pre'))
        })
        var ad_pre = idata;

        idata = [] 
        tab_ad_adverts_content.find('.mvp-ad-source.ad-mid').each(function(){
            var item = $(this)
            idata.push(getAdOptions(item, 'ad-mid'))
        })
        var ad_mid = idata;

        idata = [] 
        tab_ad_adverts_content.find('.mvp-ad-source.ad-end').each(function(){
            var item = $(this)
            idata.push(getAdOptions(item, 'ad-end'))
        })
        var ad_end = idata;



        //annotation

        var idata = [] 
        tab_ad_annotations_content.find('.mvp-annotation-source').each(function(){
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

           }else if(type == 'html'){

            obj.path = item.find('.annotation_html_content').val()

               /* if (typeof(tinymce) != "undefined") {

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

           }else{

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
        

        var options = {}

        //randomize ad (save in media options); global ads have randomize saved in ad section
        options.randomizeAdPre = $('#randomizeAdPre').val()
        options.randomizeAdEnd = $('#randomizeAdEnd').val()





        //popup

        tab_ad_popup_content.find('.mvp-popup-source').each(function(){
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

           }else if(type == 'html'){

            obj.path = item.find('.popup_html_content').val()

              /*  if (typeof(tinymce) != "undefined") {

                  var uid = 'mvp-popup-editor-' + item.attr('data-id')

                  var editor = tinymce.get(uid);

                  if (editor) {
                      obj.path = editor.getContent();
                       console.log(obj.path)
                  } else {
                      obj.path = item.find('.popup_html_content').val()
                  }

                }else{

                  obj.path = item.find('.popup_html_content').val()
                }*/

           }else{

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

        var annotation = idata;






        
        console.log(options)

        var postData = [
            {name: 'action', value: 'mvp_save_ad_options'},
            {name: 'ad_id', value: editAdForm.attr('data-ad-id')},
            {name: 'global_ad_options', value: JSON.stringify(options)},
            {name: 'ad_pre', value: ad_pre.length ? JSON.stringify(ad_pre) : ''},
            {name: 'ad_mid', value: ad_mid.length ? JSON.stringify(ad_mid) : ''},
            {name: 'ad_end', value: ad_end.length ? JSON.stringify(ad_end) : ''},
            {name: 'annotation', value: annotation.length ? JSON.stringify(annotation) : ''},
            {name: 'security', value: mvp_data.security}
        ];

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            preloader.hide();
            editAdSubmit = false;

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
            editAdSubmit = false;
        }); 


       /* $('#mvp-edit-ad-form-submit').click();
        editAdSubmit = false;*/

        
      
    });

    function getAdOptions(item, ad_type){

        var obj = {}

        obj.ad_type = ad_type
        obj.type = item.find('.ad_type').val()
        obj.path = item.find('.ad_path').val().replace(/"/g, "'")
        obj.is360 = item.find('.ad_is360').val()

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
            if(item.find('.ad_rel').val())obj.rel = item.find('.ad_rel').val()
        }

        return obj;

    }


     //filter ads

    var adItemList = $('#mvp-ad-item-list');

    $('#mvp-filter-ad').on('keyup.apfilter',function(){

        var value = $(this).val(), i, j = 0, title, len = adItemList.children('.mvp-ad-item').length;

        for(i = 0; i < len; i++){

            title = adItemList.children('.mvp-ad-item').eq(i).find('.mvp-ad-title').val();

            if(title.indexOf(value) >- 1){
                adItemList.children('.mvp-ad-item').eq(i).show();
            }else{
                adItemList.children('.mvp-ad-item').eq(i).hide();
                j++;
            }
        }

    });

    //select all
    $('.mvp-ad-table').on('click', '.mvp-ad-all', function(){
        if($(this).is(':checked')){
            adItemList.find('.mvp-ad-indiv').prop('checked', true);
        }else{
            adItemList.find('.mvp-ad-indiv').prop('checked', false);
        }
    });


    //delete selected
    $('#mvp-delete-ads').on('click', function(){
        if(adItemList.find('.mvp-ad-indiv').length == 0)return false;//no media

        var selected = adItemList.find('.mvp-ad-indiv:checked');

        if(selected.length == 0) {
            alert(mvp_translate.attr('data-no-ads-selected'));
            return false;
        }

        var result = confirm(mvp_translate.attr('data-sure-to-delete'));
        if(result){

            preloader.show();

            var arr = [];

            selected.each(function(){
                arr.push(parseInt($(this).closest('.mvp-ad-row').attr('data-ad-id'),10));
            });

            deleteAd(arr)
            
        }
    });

    function deleteAd(arr){
            
        var postData = [
            {name: 'action', value: 'mvp_delete_ad'},
            {name: 'ad_id', value: arr},
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
                var i, len = arr.length;
                for(i = 0;i<len;i++){
                    adItemList.find('.mvp-ad-row[data-ad-id="'+arr[i]+'"]').remove();
                }
                $('.mvp-ad-all').prop('checked', false);
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
        });  

    }


    adItemList.on('click', '.mvp-delete-ad', function(){

        var result = confirm(mvp_translate.attr('data-sure-to-delete'));
        if(result){

            var ad_id = parseInt($(this).closest('.mvp-ad-row').attr('data-ad-id'),10);

            preloader.show()

            deleteAd([ad_id])

        }

        return false;

    })



    /* domain-rename */

    $('#mvp-ad-domain-rename').on('click', function(e){

        var from = $('#mvp-ad-domain-rename-from').val(),
        to = $('#mvp-ad-domain-rename-to').val()

        if(!isEmpty(from) && !isEmpty(to)){

            var result = confirm(mvp_translate.attr('data-sure-to-rename'));
            if(result){

                preloader.show();

                var ad_id = editAdForm.attr("data-ad-id")

                var postData = [
                    {name: 'action', value: 'mvp_ad_domain_rename'},
                    {name: 'ad_id', value: ad_id},
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

                    tab_ad_adverts_content.find('.mvp-ad-source').each(function(){
                        container = $(this)

                        path = container.find('.ad_path').val()
                        path = path.replace(from, to);
                        container.find(".ad_path").val(path)

                        path = container.find('.ad_poster').val()
                        path = path.replace(from, to);
                        container.find(".ad_poster").val(path)

                    })

                    tab_ad_annotations_content.find('.mvp-annotation-source').each(function(){
                        container = $(this)

                        path = container.find('.annotation_path').val()
                        path = path.replace(from, to);
                        container.find(".annotation_path").val(path);

                        //note, not done for html content since its editor

                    })

                    tab_ad_popup_content.find('.mvp-popup-source').each(function(){
                        container = $(this)

                        path = container.find('.popup_path').val()
                        path = path.replace(from, to);
                        container.find(".popup_path").val(path);

                        //note, not done for html content since its editor

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



    //export ads

    $('.mvp-table').on('click','.mvp-export-ad-btn', function(){

        preloader.show();

        var ad_id = $(this).closest('.mvp-ad-row').attr('data-ad-id'),
        ad_title = $(this).closest('.mvp-ad-row').find('.title-editable').val();

        ad_title = ad_title.replace(/\W/g, '');//safe chars

        var postData = [
            {name: 'action', value: 'mvp_export_ad'},
            {name: 'ad_id', value: ad_id},
            {name: 'ad_title', value: ad_title},
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

    //import ad

    var adFileInput = $('#mvp-ad-file-input').on('change', prepareAdUpload);

    var import_ad_btn = $('#mvp-import-ad').click(function(){
        adFileInput.trigger('click'); 
        return false;
    }); 

    var importAdData;

    function prepareAdUpload(event) { 

        //check if correct file uploaded
        if(event.target.files.length == 0) return;
        var fileName = event.target.files[0].name;
        if(fileName.indexOf('mvp_ad_id_') == -1){
            alert(mvp_translate.attr('data-upload-previously-exported-ad-zip'));
            return;
        }

        preloader.show();

        import_ad_btn.css('display','none');

        var file = event.target.files;
        var data = new FormData();
        var nonce = $('#mvp-import-ad-form').find("#_wpnonce").val();
        $.each(file, function(key, value){
            data.append("mvp_file_upload", value);
        });
        data.append("action", "mvp_import_ad");
        data.append("security", mvp_data.security );

        adFileInput.val('');

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            processData: false, 
            contentType: false, 
        }).done(function(response){

            if(response.global_ad){

                importAdData = {};

                importAdData.global_ad = {data:null, url:response.global_ad};
                if(response.ad)importAdData.ad = {data:null, url:response.ad};
                if(response.annotation)importAdData.annotation = {data:null, url:response.annotation};

                getCSVAd(importAdData.global_ad.url);

            }else{
                import_ad_btn.css('display','inline-block');
                preloader.hide();

                alert(mvp_translate.attr('data-error-importing'));
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            import_ad_btn.css('display','inline-block');
            preloader.hide();
            alert(mvp_translate.attr('data-error-importing'));
        }); 

    }

    function getCSVAd(url){

        if(typeof $.csv === 'undefined'){

            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = jquery_csv_js;
            script.onload = script.onreadystatechange = function() {
                if(!this.readyState || this.readyState == 'complete'){
                    getCSVAd(url);
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

                if(importAdData.global_ad.data == null){

                    var d = $.csv.toArray(response, {separator:'|', delimiter:'^'}, function(err, data){
                        importAdData.global_ad.data = data;
                        if(importAdData.ad)getCSVAd(importAdData.ad.url);
                        else if(importAdData.annotation)getCSVAd(importAdData.annotation.url);
                        else import_ad_db();//no ad in playlist
                    });

                }else if(importAdData.ad.data == null){

                    var d = $.csv.toArrays(response, {separator:'|', delimiter:'^'}, function(err, data){
                        importAdData.ad.data = data;
                        if(importAdData.annotation)getCSVAd(importAdData.annotation.url);
                        else import_ad_db();
                    });
                    
                }else if(importAdData.annotation.data == null){

                    var d = $.csv.toArrays(response, {separator:'|', delimiter:'^'}, function(err, data){
                        importAdData.annotation.data = data;
                        import_ad_db();
                    });    

                }
                  
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log('Error process CSV: ' + jqXHR, textStatus, errorThrown);
                preloader.hide();
                import_ad_btn.css('display','inline-block');
                alert(mvp_translate.attr('data-error-importing'));
            });

        }
    }

    function import_ad_db(){

        var postData = [
            {name: 'action', value: 'mvp_import_ad_db'},
            {name: 'global_ad', value: JSON.stringify(importAdData.global_ad.data)},
            {name: 'security', value: mvp_data.security}
        ];
        if(importAdData.ad)postData.push({name: 'ad', value: JSON.stringify(importAdData.ad.data)});
        if(importAdData.annotation)postData.push({name: 'annotation', value: JSON.stringify(importAdData.annotation.data)});

        $.ajax({
            url: mvp_data.ajax_url,
            type: 'post',
            data: postData,
            dataType: 'json',
        }).done(function(response){

            //go to edit page
            window.location = adItemList.attr('data-admin-url') + '?page=mvp_ad_manager&action=edit_ad&mvp_msg=ad_created&ad_id=' + response

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText, textStatus, errorThrown);
            preloader.hide();
            import_playlist_btn.css('display','inline-block');
            alert(mvp_translate.attr('data-error-importing'));
        }); 

    } 
  

    /* duplicate */

    $('.mvp-duplicate-ad').on('click', function(){
        return duplicateAd('Enter title for new ad:', $(this));
    });

    function duplicateAd(msg, target){
        var title = prompt(msg);

        if(title == null){//cancel
            return false;
        }else if(title.replace(/^\s+|\s+$/g, '').length == 0) {//empty
            duplicateAd(msg, target);
            return false;
        }else{

            preloader.show()
           
            var postData = [
                {name: 'action', value: 'mvp_duplicate_ad'},
                {name: 'security', value: mvp_data.security},
                {name: 'title', value: title},
                {name: 'ad_id', value: target.closest('.mvp-ad-row').attr('data-ad-id')},
            ];

            $.ajax({
                url: mvp_data.ajax_url,
                type: 'post',
                data: postData,
                dataType: 'json',   
            }).done(function(response){

                //go to edit ad page
                window.location = adItemList.attr('data-admin-url') + '?page=mvp_ad_manager&action=edit_ad&mvp_msg=ad_created&ad_id=' + response

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
	

});