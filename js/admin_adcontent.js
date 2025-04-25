jQuery(document).ready(function($) {
    "use strict"



    //############################################//
    /* ad content */
    //############################################//

    var mvp_translate = $('#mvp-translate')


    var MVPAdContent = function (data){



    var empty_src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D',
    self = this

    var tab_ad_content;

    if($('#mvp-tab-media-adverts-content').length){

        tab_ad_content = $('#mvp-tab-media-adverts-content');

    }else if($('#mvp-tab-ad-adverts-content').length){

        tab_ad_content = $('#mvp-tab-ad-adverts-content');

    }else if($('#mvp-tab-shortcode-adverts-content').length){

        tab_ad_content = $('#mvp-tab-shortcode-adverts-content');
    }





    if(tab_ad_content){

        //remove ad
        tab_ad_content.on('click', '.ad-source-remove', function(){

            var result = confirm("Are you sure to delete?");
            if(result){

                var parent = $(this).closest('.mvp-ad-source'),
                ad_id = parent.attr('data-id'),
                p_class = parent.attr('data-type')

                parent.remove();

            }
        })

        tab_ad_content.on('click', '.ad-section-content-btn', function(){
            var item = $(this)

            if(item.hasClass('ad-section-pre-btn')){

                $('#ad-section-pre-content').toggle()

                $('#ad-section-timeline').find('.ad-section-timeline-point-pre').toggle()

            }
            else if(item.hasClass('ad-section-mid-btn')){
                $('#ad-section-mid-content').toggle()

                $('#ad-section-timeline').find('.ad-section-timeline-point-mid').toggle()

            }
            else if(item.hasClass('ad-section-end-btn')){
                $('#ad-section-end-content').toggle()

                $('#ad-section-timeline').find('.ad-section-timeline-point-end').toggle()

            }

            if(item.hasClass('ad-section-btn-hidden')){
                item.removeClass('ad-section-btn-hidden')
            }else{
                item.addClass('ad-section-btn-hidden')
            }

        })




        var preroll_content = tab_ad_content.find('.mvp-preroll-content').sortable({
            handle: ".option-toggle",
            update: function(event, ui) {
                //self.adjustAd('ad_pre');
            }
        }),
        midroll_content = tab_ad_content.find('.mvp-midroll-content').sortable({
            handle: ".option-toggle",
            update: function(event, ui) {
                //self.adjustAd('ad_mid');
            }
        }),
        endroll_content = tab_ad_content.find('.mvp-endroll-content').sortable({
            handle: ".option-toggle",
            update: function(event, ui) {
                //self.adjustAd('ad_end');
            }
        });

        //toggle fields in ads

        tab_ad_content.on('change', '.ad_type', function(){

            var item = $(this), parent = item.closest('.mvp-ad-source');

            var type = item.val();

            parent.find('.ad-path').val('')
            parent.find('.ad_path_upload').attr('data-type', type).hide()
            parent.find('.ad_begin').val('');
            parent.find('.ad_skip_enable').val('');
            parent.find('.mvp_ad_link').val('');
            parent.find('.ad_rel').val('');
            parent.find('.ad_poster_preview').attr('src',empty_src);

            if(type == 'video' || type == 'video_360'){
                parent.find('.ad_video_info').show();
                parent.find('.ad_path_upload').show();
            }else{
                parent.find('.ad_video_info').hide();
            }
            if(type == 'audio'){
                parent.find('.ad_poster_field').val('').show();
                parent.find('.ad_audio_info').show();
                parent.find('.ad_path_upload').show();
            }else{
                parent.find('.ad_poster_field').hide();
                parent.find('.ad_audio_info').hide();
            }
            if(type == 'image' || type == 'image_360'){
                parent.find('.ad_duration_field').val('').show();
                parent.find('.ad_duration').attr('ap-required', true);
                parent.find('.ad_image_info').show();
                parent.find('.ad_path_upload').show();
            }else{
                parent.find('.ad_duration_field').hide();
                parent.find('.ad_duration').attr('ap-required', false);
                parent.find('.ad_image_info').hide();
            }
            if(type == 'youtube_single'){
                parent.find('.ad_yt_single_info').show();
            }else{
                parent.find('.ad_yt_single_info').hide();
            }
            if(type == 'vimeo_single'){
                parent.find('.ad_vim_single_info').show();
            }else{
                parent.find('.ad_vim_single_info').hide();
            }
            if(type == 'youtube_single' || type == 'vimeo_single' || type == 'image' || type == 'video'){
                parent.find('.ad_is360_field').show();
                if(type == 'video')parent.find('.ad_vrMode_field').show();
                else parent.find('.ad_vrMode_field').hide();
            }else{
                parent.find('.ad_is360_field').hide();
                parent.find('.ad_vrMode_field').hide();
            }


            //set title
            var _type = item.find("option:selected").text();
            if(parent.hasClass('ad-pre')){
                parent.find('.option-title').html('PREROLL: ' + _type);
            }
            else if(parent.hasClass('ad-mid')){
                parent.find('.option-title').html('MIDROLL: ' + _type);
            }
            else if(parent.hasClass('ad-end')){
                parent.find('.option-title').html('ENDROLL: ' + _type);
            }

        })
        .on('click', '.ad_path_upload, .ad_poster_upload', function(e){
            e.preventDefault();

            var upload_btn = $(this), library, source, custom_uploader, came_from;

            if(upload_btn.hasClass('ad_path_upload')){
                source = upload_btn.parent().find('.ad_path');
            }else{//ad_poster_upload
                source = upload_btn.parent().find('.ad_poster');
            }

            //dont reuse if we cant change library (when we change type)

            if($(e.currentTarget).hasClass('ad_poster_upload')){
                library = "image";
                came_from = 'audio';
            }else{

                var type = $(e.currentTarget).attr('data-type');
                
                if(type == 'video' || type == 'video_360'){
                    library = "video";
                }else if(type == 'audio'){
                    library = "audio";
                }else if(type == 'image' || type == 'image_360'){
                    library = "image";
                    came_from = 'image';
                }
            }
            
            custom_uploader = wp.media({
            library:{
                    type: library
                }
            })
            .on("select", function(){
                var attachment = custom_uploader.state().get("selection").first().toJSON();
                $(source).val(attachment.url);

                if(came_from == 'audio'){
                    upload_btn.parent().find('.ad_poster_preview').attr('src',attachment.url);
                }else if(came_from == 'image'){
                    upload_btn.parent().find('.ad_path_preview').attr('src',attachment.url);
                }
            })
            .open();
            
        })
        .on('keyup', '.ad_begin', function(e){//start time / title for midroll
            var input = $(this), val = input.val(), 
            _type = input.closest('.mvp-ad-source').find('.ad_type').find("option:selected").text();

            if(val != ''){
                input.closest('.mvp-ad-source').find('.option-title').html('MIDROLL: ' + _type + ' - start ' + val);
            }else{
                input.closest('.mvp-ad-source').find('.option-title').html('MIDROLL: ' + _type);
            }

        }); 
 
        var preroll_source_add = tab_ad_content.find('.preroll-source-add').on('click',function(e){
            self.addAdSource('ad-pre');
           // self.adjustAd('ad_pre');
        }); 
        var midroll_source_add = tab_ad_content.find('.midroll-source-add').on('click',function(e){
            self.addAdSource('ad-mid');
            //self.adjustAd('ad_mid');
        });  
        var endroll_source_add = tab_ad_content.find('.endroll-source-add').on('click',function(e){
            self.addAdSource('ad-end');
            //self.adjustAd('ad_end');
        });   

    }   

    this.setRandomize = function(data){
        var r = data.randomizeAdPre == undefined ? '0' : data.randomizeAdPre;
        var r2 = data.randomizeAdEnd == undefined ? '0' : data.randomizeAdEnd;
        tab_ad_content.find('#randomizeAdPre').val(r)
        tab_ad_content.find('#randomizeAdEnd').val(r2)
    }




    

    //we still need this for ad manager because its not ajax yet
    this.adjustAd = function(prefix){

        var i = 0, content;

        if(prefix == 'ad_pre'){
            content = preroll_content;
        }
        else if(prefix == 'ad_mid'){
            content = midroll_content;
        }
        else if(prefix == 'ad_end'){
            content = endroll_content;
        }

        content.find('.mvp-ad-source').each(function(){
            var bp = $(this);

            bp.find('.ad_elem').each(function(){
                var elem = $(this);
                var name = elem.attr('data-cname'), nn = prefix+'['+i+']['+name+']';
                elem.attr('name', nn);
            });

            i++;
        });

    }

    function populateAdItem(bp, item){

        bp.find('.ad_type').find('option[value="'+item.type+'"]').attr("selected", 'selected').change();
        bp.find('.ad_path').val(item.path);
        if(item.type == 'image')bp.find('.ad_path_preview').attr('src', item.path);
        bp.find('.ad_poster').val(item.poster);
        if(item.poster)bp.find('.ad_poster_preview').attr('src',item.poster);
        bp.find('.ad_duration').val(item.duration);
        bp.find('.ad_begin').val(item.begin);
        bp.find('.ad_is360').find('option[value="'+item.is360+'"]').attr("selected", 'selected').change();
        bp.find('.ad_yt_quality').find('option[value="'+item.yt_quality+'"]').attr("selected", 'selected').change();
        bp.find('.ad_skip_enable').val(item.skip_enable);
        bp.find('.mvp_ad_link').val(item.link);
        bp.find('.ad_target').find('option[value="'+item.target+'"]').attr("selected", 'selected').change();
        bp.find('.ad_rel').val(item.rel);

    }

    function getAdId(destination){

        var arr = []
        destination.find('.mvp-ad-source').each(function(){
            var d = parseInt($(this).attr('data-id'),10)
            arr.push(d)
        })

        if(arr.length == 0){
            return 0; 
        }else{
            sortArray(arr)
            return arr[arr.length-1] + 1
        }

    }

    function sortArray(arr) {
        arr.sort(function(a, b) {
            return a - b;
        });
    }



    this.addAdSource = function(ad_type, item, closed){

        var destination;

        if(ad_type == 'ad-pre'){
            destination = preroll_content;
        }
        else if(ad_type == 'ad-mid'){
            destination = midroll_content;
        }
        else if(ad_type == 'ad-end'){
            destination = endroll_content;
        }

        var p_class = ad_type.substr(ad_type.indexOf('-')+1)

        var ad_id = getAdId(destination)

        var bp = tab_ad_content.find('.mvp-ad-source-orig').clone().removeClass('mvp-ad-source-orig').addClass('mvp-ad-source').addClass(ad_type).attr({'data-id': ad_id, 'data-type': p_class}).show().appendTo(destination);

        if(closed)bp.addClass('option-closed');//close accordions on start

        bp.find('.ad_path').attr('ap-required', true);

        if(ad_type == 'ad-pre'){

            if(typeof item !== 'undefined'){
                populateAdItem(bp, item);
            }else{
                bp.find('.ad_type').change();
            }

            bp.find('.ad_begin_field').hide();

            var type = bp.find('.ad_type').val(),
            s = 'PREROLL, type: ' + type

           // bp.find('.option-title').html(s);

            //remove ad button
           /* bp.find('.ad-source-remove').on('click',function(e){
                var result = confirm("Are you sure to delete advert?");
                if(result){
                    $(this).closest('.mvp-ad-source').remove();
                    //self.adjustAd('ad_pre');
                }
            });  */

        }
        else if(ad_type == 'ad-mid'){

            bp.find('.ad_begin').attr('ap-required', true);

            if(typeof item !== 'undefined'){
                populateAdItem(bp, item);
                bp.find('.option-title').html('MIDROLL: '+item.type+' - start ' + item.begin);
            }else{
                bp.find('.ad_type').change();
               // bp.find('.option-title').html('MIDROLL');
            }

            //remove ad button
           /* bp.find('.ad-source-remove').on('click',function(e){
                var result = confirm("Are you sure to delete advert?");
                if(result){
                    $(this).closest('.mvp-ad-source').remove();
                    //self.adjustAd('ad_mid');
                }
            });   */    
        }
        else if(ad_type == 'ad-end'){

            if(typeof item !== 'undefined'){
                populateAdItem(bp, item);
            }else{
                bp.find('.ad_type').change();
            }

            bp.find('.ad_begin_field').hide();

            //bp.find('.option-title').html('ENDROLL');

            //remove ad button
           /* bp.find('.ad-source-remove').on('click',function(e){
                var result = confirm("Are you sure to delete advert?");
                if(result){
                    $(this).closest('.mvp-ad-source').remove();
                    //self.adjustAd('ad_end'); 
                }
            });    */   

        }


        //live
        
    }

    if(typeof adData_arr !== 'undefined'){

        var i, len = adData_arr.length;

        if(len > 0){//load ad sources from db
            for(i=0;i<len;i++){
                self.addAdSource(adData_arr[i].ad_type, adData_arr[i], true);
            }
            /*self.adjustAd('ad_pre');
            self.adjustAd('ad_mid');
            self.adjustAd('ad_end');*/
        }
    }
    else if(typeof adDataGlobal_arr !== 'undefined'){

        var i, len = adDataGlobal_arr.length;

        if(len > 0){//load ad sources from db
            for(i=0;i<len;i++){
                self.addAdSource(adDataGlobal_arr[i].ad_type, adDataGlobal_arr[i], true);
            }
           /* self.adjustAd('ad_pre');
            self.adjustAd('ad_mid');
            self.adjustAd('ad_end');*/
        }
    }

    if(typeof adDataGlobalOptions_arr !== 'undefined'){
        self.setRandomize(adDataGlobalOptions_arr)
    }










    //############################################//
    /* annotation content */
    //############################################//

    var tab_annotation_content, tab_popup_content, annotation_type, popup_type, display_type_to_add;

    if($('#mvp-tab-media-annotations-content').length){//from edit media
        tab_annotation_content = $('#mvp-tab-media-annotations-content');
    }else if($('#mvp-tab-ad-annotations-content').length){//from edit ad
        tab_annotation_content = $('#mvp-tab-ad-annotations-content');
    }

    if($('#mvp-tab-media-popup-content').length){//from edit media
        tab_popup_content = $('#mvp-tab-media-popup-content');
    }else if($('#mvp-tab-ad-popup-content').length){//from edit ad
        tab_popup_content = $('#mvp-tab-ad-popup-content');
    }

    if(tab_annotation_content){

        //remove annotation
        tab_annotation_content.on('click', '.annotation-source-remove', function(e){
            var result = confirm(mvp_translate.attr('data-sure-to-delete'));
            if(result){
                $(this).closest('.mvp-annotation-source').remove();
                //self.adjustAnnotation();
            }
        });   

        var annotation_content = tab_annotation_content.find('.mvp-annotation-content').sortable({
            handle: ".option-toggle-wrap",
            update: function(event, ui) {
                //self.adjustAnnotation();
            }
        });

        //toggle fields in annotation

        tab_annotation_content.on('change', '.annotation_type', function(){

            var item = $(this), parent = item.closest('.mvp-annotation-source');

            annotation_type = item.val();

            parent.find('.annotation_path_field').hide();
            parent.find('.annotation_path').val('').prop({required: false}).attr('ap-required', false).hide()
            parent.find('.annotation_path_preview').attr('src',empty_src);
            parent.find('.annotation_path_upload').hide();
            parent.find('.annotation_path_remove').hide();

            parent.find('.annotation_html_content_field').hide();
            parent.find('.annotation_html_content').attr('ap-required', false)

            parent.find('.adsense_client_field').hide();
            parent.find('.adsense_slot_field').hide();
            parent.find('.annotation_width_field').hide();
            parent.find('.annotation_height_field').hide();

            parent.find('.annotation_adsense_client').val('').attr('ap-required', false);
            parent.find('.annotation_adsense_slot').val('').attr('ap-required', false);
            parent.find('.annotation_width').val('').attr('ap-required', false);
            parent.find('.annotation_height').val('').attr('ap-required', false);

            parent.find('.annotation_show_time').val('')
            parent.find('.annotation_end_time').val('')
            parent.find('.annotation_link').val('')
            parent.find('.annotation_rel').val('')
            parent.find('.annotation_adit_class').val('')
            parent.find('.annotation_css').text('');

            parent.find('.annotation_image_info').hide();
            parent.find('.annotation_iframe_info').hide();
            parent.find('.annotation_html_info').hide();
            parent.find('.annotation_shortcode_info').hide();
            parent.find('.annotation_adsense_detail_info').hide();
            parent.find('.annotation_adsense_code_info').hide();

            if(annotation_type == 'image'){
                parent.find('.annotation_path').attr('ap-required', true).show();
                parent.find('.annotation_path_upload').show();
                parent.find('.annotation_image_info').show();
                parent.find('.annotation_path_field').show();
            }
            else if(annotation_type == 'iframe'){
                parent.find('.annotation_path').attr('ap-required', true).show();
                parent.find('.annotation_iframe_info').show();
                parent.find('.annotation_path_field').show();
            }
            else if(annotation_type == 'html'){

                parent.find('.annotation_html_content_field').show();

               /* if (typeof(tinymce) != "undefined") {

                }else{
                   parent.find('.annotation_html_content').attr('ap-required', true)
                }*/

                 parent.find('.annotation_html_content').attr('ap-required', true)

            }
            else if(annotation_type == 'shortcode'){
                parent.find('.annotation_path').attr('ap-required', true).show();
                parent.find('.annotation_shortcode_info').show();
                parent.find('.annotation_path_field').show();
            }
            else if(annotation_type == 'adsense-detail'){
                parent.find('.adsense_client_field').show();
                parent.find('.adsense_slot_field').show();
                parent.find('.annotation_width_field').show();
                parent.find('.annotation_height_field').show();
                parent.find('.annotation_adsense_client').attr('ap-required', true);
                parent.find('.annotation_adsense_slot').attr('ap-required', true);
                //parent.find('.annotation_width').attr('ap-required', true);
               // parent.find('.annotation_height').attr('ap-required', true);
                parent.find('.annotation_adsense_detail_info').show();
            }
            else if(annotation_type == 'adsense-code'){
                parent.find('.annotation_path').attr('ap-required', true).show();
                parent.find('.annotation_path_field').show();
                parent.find('.annotation_adsense_code_info').show();
            }

            parent.find('.option-title').html('Annotation type: ' + annotation_type);

        })
        .on('click', '.annotation_path_upload', function(e){
            e.preventDefault();

            var parent = $(this).closest('.annotation_path_field'), library, source, custom_uploader;

            source = parent.find('.annotation_path');
            library = "image";
            
            custom_uploader = wp.media({
            library:{
                    type: library
                }
            })
            .on("select", function(){
                var attachment = custom_uploader.state().get("selection").first().toJSON();
                $(source).val(attachment.url);

                parent.find('.annotation_path_preview').attr('src',attachment.url);
                parent.find('.annotation_path_remove').show();
            })
            .open();
            
        })
        .on('click', '.annotation_path_remove', function(e){
            e.preventDefault();

            var parent = $(this).closest('.annotation_path_field')
            parent.find('.annotation_path').val('');
            parent.find('.annotation_path_preview').attr('src',empty_src);

            $(this).hide();
            
        })
        .on('keyup', '.annotation_show_time', function(e){//start time / title for annotation
            var input = $(this), val = input.val(), start = '0';
            if(val && val != ''){
                start = val.toString();
            }
            var parent = input.closest('.mvp-annotation-source'),
            type = parent.find('.annotation_type').val()

            var title = 'Annotation type: ' + type + ', start: ' + start

            parent.find('.option-title').html(title);
        }); 

        tab_annotation_content.find('.annotation-add').on('click',function(e){
            annotation_type = 'image';
            display_type_to_add = 'annotation'
            self.addAnnotationSource();
            //self.adjustAnnotation();
        }); 

    }  

    if(tab_popup_content){

        //remove popup
        tab_popup_content.on('click', '.popup-source-remove', function(e){
            var result = confirm(mvp_translate.attr('data-sure-to-delete'));
            if(result){
                $(this).closest('.mvp-popup-source').remove();
                //self.adjustAnnotation();
            }
        });   

        var popup_content = tab_popup_content.find('.mvp-popup-content').sortable({
            handle: ".option-toggle-wrap",
            update: function(event, ui) {
                //self.adjustAnnotation();
            }
        });

        //toggle fields in popup

        tab_popup_content.on('change', '.popup_type', function(){

            var item = $(this), parent = item.closest('.mvp-popup-source');

            popup_type = item.val();

            parent.find('.popup_path_field').hide();
            parent.find('.popup_path').val('').prop({required: false}).attr('ap-required', false).hide()
            parent.find('.popup_path_preview').attr('src',empty_src);
            parent.find('.popup_path_upload').hide();
            parent.find('.popup_path_remove').hide();

            parent.find('.popup_html_content_field').hide();
            parent.find('.popup_html_content').attr('ap-required', false)

            parent.find('.adsense_client_field').hide();
            parent.find('.adsense_slot_field').hide();
            parent.find('.popup_width_field').hide();
            parent.find('.popup_height_field').hide();

            parent.find('.popup_adsense_client').val('').attr('ap-required', false);
            parent.find('.popup_adsense_slot').val('').attr('ap-required', false);
            parent.find('.popup_width').val('').attr('ap-required', false);
            parent.find('.popup_height').val('').attr('ap-required', false);

            parent.find('.popup_show_time').val('p').attr('ap-required', true);
            parent.find('.popup_link').val('')
            parent.find('.popup_rel').val('')
            parent.find('.popup_adit_class').val('')
            parent.find('.popup_css').text('');

            parent.find('.popup_image_info').hide();
            parent.find('.popup_iframe_info').hide();
            parent.find('.popup_html_info').hide();
            parent.find('.popup_shortcode_info').hide();
            parent.find('.popup_adsense_detail_info').hide();
            parent.find('.popup_adsense_code_info').hide();

            if(popup_type == 'image'){
                parent.find('.popup_path').attr('ap-required', true).show();
                parent.find('.popup_path_upload').show();
                parent.find('.popup_image_info').show();
                parent.find('.popup_path_field').show();
            }
            else if(popup_type == 'iframe'){
                parent.find('.popup_path').attr('ap-required', true).show();
                parent.find('.popup_iframe_info').show();
                parent.find('.popup_path_field').show();
            }
            else if(popup_type == 'html'){

                parent.find('.popup_html_content_field').show();

               /* if (typeof(tinymce) != "undefined") {

                }else{
                  parent.find('.popup_html_content').attr('ap-required', true)
                }*/

                parent.find('.popup_html_content').attr('ap-required', true)

            }
            else if(popup_type == 'shortcode'){
                parent.find('.popup_path').attr('ap-required', true).show();
                parent.find('.popup_shortcode_info').show();
                parent.find('.popup_path_field').show();
            }
            else if(popup_type == 'adsense-detail'){
                parent.find('.adsense_client_field').show();
                parent.find('.adsense_slot_field').show();
                parent.find('.popup_width_field').show();
                parent.find('.popup_height_field').show();
                parent.find('.popup_adsense_client').attr('ap-required', true);
                parent.find('.popup_adsense_slot').attr('ap-required', true);
                //parent.find('.popup_width').attr('ap-required', true);
               // parent.find('.popup_height').attr('ap-required', true);
                parent.find('.popup_adsense_detail_info').show();
            }
            else if(popup_type == 'adsense-code'){
                parent.find('.popup_path').attr('ap-required', true).show();
                parent.find('.popup_path_field').show();
                parent.find('.popup_adsense_code_info').show();
            }

            parent.find('.option-title').html('Popup type: ' + popup_type);

        })
        .on('click', '.popup_path_upload', function(e){
            e.preventDefault();

            var parent = $(this).closest('.popup_path_field'), library, source, custom_uploader;

            source = parent.find('.popup_path');
            library = "image";
            
            custom_uploader = wp.media({
            library:{
                    type: library
                }
            })
            .on("select", function(){
                var attachment = custom_uploader.state().get("selection").first().toJSON();
                $(source).val(attachment.url);

                parent.find('.popup_path_preview').attr('src',attachment.url);
                parent.find('.popup_path_remove').show();
            })
            .open();
            
        })
        .on('click', '.popup_path_remove', function(e){
            e.preventDefault();

            var parent = $(this).closest('.popup_path_field')
            parent.find('.popup_path').val('');
            parent.find('.popup_path_preview').attr('src',empty_src);

            $(this).hide();
            
        })
        .on('keyup', '.popup_show_time', function(e){//start time / title for popup
            var input = $(this), val = input.val(), start = 'pause';
            if(val && val != ''){
                start = val.toString();
                if(start == 'p')start = 'pause'
            }

            var parent = input.closest('.mvp-popup-source'),
            type = parent.find('.popup_type').val()

            var title = 'Popup type: ' + type + ', start: ' + start

            parent.find('.option-title').html(title);
        }); 

        tab_popup_content.find('.popup-add').on('click',function(e){
            popup_type = 'image';
            display_type_to_add = 'popup'
            self.addAnnotationSource();
            //self.adjustAnnotation();
        }); 

    }    

    /*this.adjustAnnotation = function(){

        var i = 0, prefix = 'annotation';

        annotation_content.find('.mvp-annotation-source').each(function(){
            var bp = $(this);

            bp.find('.annotation_elem').each(function(){
                var elem = $(this);
                var name = elem.attr('data-cname'), nn = prefix+'['+i+']['+name+']';
                elem.attr('name', nn);
            });

            i++;
        });

    }*/

    this.addAnnotationSource = function(item, closed){
        //console.log(item, annotation_type)

        if(!display_type_to_add){//display_type ws introducted with popup annotation and we use the same table for storing so we need a prop to differentate between annotation and popup
            if(item.display_type)display_type_to_add = item.display_type
            else display_type_to_add = 'annotation'
        }

        if(display_type_to_add == 'annotation'){

          var bp = tab_annotation_content.find('.mvp-annotation-source-orig').clone().removeClass('mvp-annotation-source-orig').addClass('mvp-annotation-source').show().appendTo(annotation_content);

        }else{

          var bp = tab_popup_content.find('.mvp-popup-source-orig').clone().removeClass('mvp-popup-source-orig').addClass('mvp-popup-source').show().appendTo(popup_content);

        }

        


        //editor
       /*  var uid = Math.floor(Math.random() * 999999999999)
        bp.attr('data-id', uid)

        if (typeof(tinymce) != "undefined"){

         var edit_id = 'mvp-'+display_type_to_add+'-editor-' + uid

          bp.find('.'+display_type_to_add+'_html_content').attr('id', edit_id)

          wp.editor.initialize(edit_id, {
              tinymce: {
                  wpautop: false,
                  toolbar1: 'formatselect bold italic | bullist numlist | blockquote | alignleft aligncenter alignright | link unlink | wp_more | spellchecker' 
              }, 
              quicktags: true,
              mediaButtons: true,
          });

        }*/




        if(closed)bp.addClass('option-closed');//close accordions on start

        if(typeof item !== 'undefined'){

           if(display_type_to_add == 'annotation'){

             bp.find('.display_type').val('annotation');

              bp.find('.annotation_type').find('option[value="'+item.type+'"]').attr("selected", 'selected').change();
              bp.find('.annotation_adit_class').val(item.adit_class);
              bp.find('.annotation_show_time').val(item.show_time);
              bp.find('.annotation_end_time').val(item.hide_time);
              bp.find('.annotation_link').val(item.link);
              bp.find('.annotation_target').find('option[value="'+item.target+'"]').attr("selected", 'selected').change();
              bp.find('.annotation_rel').val(item.rel);
              bp.find('.annotation_close_btn').find('option[value="'+item.close_btn+'"]').attr("selected", 'selected').change();
              bp.find('.annotation_close_btn_position').find('option[value="'+item.close_btn_position+'"]').attr("selected", 'selected').change();
              bp.find('.annotation_position').find('option[value="'+item.position+'"]').attr("selected", 'selected').change();
              if(item.css)bp.find('.annotation_css').text(item.css);

              if(annotation_type == 'image' || annotation_type == 'iframe'){
                  bp.find('.annotation_path').val(item.path);
                  if(annotation_type == 'image'){
                      bp.find('.annotation_path_preview').attr('src', item.path);
                      bp.find('.annotation_path_remove').show();
                  }
              }
              else if(annotation_type == 'html'){

                bp.find('.annotation_html_content').val(item.path);

                /*if (typeof(tinymce) != "undefined"){

                    var edit_id = 'mvp-annotation-editor-' + bp.attr('data-id')

                    //event of ready?
                    var interval = setInterval(function(){
                      var editor = tinymce.get(edit_id);
                      if (editor) {
                        clearInterval(interval)
                        editor.setContent(item.path);
                        editor.save( { no_events: true } );
                      }
                    },100)

                }else{
                   bp.find('.annotation_html_content').val(item.path);
                }*/

              }
              else if(annotation_type == 'shortcode'){
                  bp.find('.annotation_path').val(item.path);
              }
              else if(annotation_type == 'adsense-detail'){
                  bp.find('.annotation_adsense_client').val(item.adsense_client);
                  bp.find('.annotation_adsense_slot').val(item.adsense_slot);
                  bp.find('.annotation_width').val(item.width);
                  bp.find('.annotation_height').val(item.height);
              }
              else if(annotation_type == 'adsense-code'){
                  bp.find('.annotation_path').val(item.path);
              }


              var time = '0';
              if(item.show_time)time = item.show_time;
              bp.find('.option-title').html('Annotation type: ' + item.type + ', start: ' + time);

            }else{

             bp.find('.display_type').val('popup');

              bp.find('.popup_type').find('option[value="'+item.type+'"]').attr("selected", 'selected').change();
              bp.find('.popup_adit_class').val(item.adit_class);
              bp.find('.popup_show_time').val(item.show_time);
              bp.find('.popup_link').val(item.link);
              bp.find('.popup_target').find('option[value="'+item.target+'"]').attr("selected", 'selected').change();
              bp.find('.popup_rel').val(item.rel);
              bp.find('.popup_close_btn').find('option[value="'+item.close_btn+'"]').attr("selected", 'selected').change();
              if(item.css)bp.find('.popup_css').text(item.css);

              if(popup_type == 'image' || popup_type == 'iframe'){
                  bp.find('.popup_path').val(item.path);
                  if(popup_type == 'image'){
                      bp.find('.popup_path_preview').attr('src', item.path);
                      bp.find('.popup_path_remove').show();
                  }
              }
              else if(popup_type == 'html'){

                bp.find('.popup_html_content').val(item.path);

               /* if (typeof(tinymce) != "undefined"){

                   var edit_id = 'mvp-popup-editor-' + bp.attr('data-id')

                    //event of ready?
                    var interval = setInterval(function(){
                      var editor = tinymce.get(edit_id);
                      if (editor) {
                        clearInterval(interval)
                        editor.setContent(item.path);
                        editor.save( { no_events: true } );
                      }
                    },100)

                }else{
                   bp.find('.popup_html_content').val(item.path);
                }*/

              }
              else if(popup_type == 'shortcode'){
                  bp.find('.popup_path').val(item.path);
              }
              else if(popup_type == 'adsense-detail'){
                  bp.find('.popup_adsense_client').val(item.adsense_client);
                  bp.find('.popup_adsense_slot').val(item.adsense_slot);
                  bp.find('.popup_width').val(item.width);
                  bp.find('.popup_height').val(item.height);
              }
              else if(popup_type == 'adsense-code'){
                  bp.find('.popup_path').val(item.path);
              }


              var time = 'start';
              if(item.show_time)time = item.show_time;
              if(time == 'p')time = 'pause'
              bp.find('.option-title').html('Popup type: ' + item.type + ', start: ' + time);


            }

        }else{

           if(display_type_to_add == 'annotation'){

            bp.find('.annotation_type').change();
            bp.find('.annotation_path').val('')
            bp.find('.annotation_html_content').val('')

          }else{

            bp.find('.popup_type').change();
            bp.find('.popup_path').val('')
            bp.find('.popup_html_content').val('')

          }

        }

        display_type_to_add  = null;

    }

    if(typeof annotationDataGlobal_arr !== 'undefined'){

        var i, len = annotationDataGlobal_arr.length;

        if(len > 0){//load ad sources from db
            for(i=0;i<len;i++){
                self.addAnnotationSource(annotationDataGlobal_arr[i], true);
            }
           // self.adjustAnnotation();
        }

    }    


    


 /*
    setTimeout(function(){
        updateSticky()
    },100)
*/





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
    
    }


   
     window.MVPAdContent = MVPAdContent;

});