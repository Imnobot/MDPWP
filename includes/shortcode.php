<?php

$GLOBALS['mvp_inline_js'] = '';

function mvp_add_player($atts, $content = null){


    static $mvp_unique_player_id = 0;


    if(isset($atts['instance_id'])){
        $instance_id = $atts['instance_id'];
        $wrapper_id = 'mvp-wrapper'.$instance_id;
        $instance = 'mvp_player'.$instance_id;
    }else{
        $instance_id = $mvp_unique_player_id;
        $wrapper_id = 'mvp-wrapper'.$mvp_unique_player_id;
        $instance = 'mvp_player'.$mvp_unique_player_id;
    }

    $default_settings = mvp_get_settings();
    $global_custom_css = NULL;

    //general settings
    global $wpdb;
    $wpdb->show_errors(); 
    $settings_table = $wpdb->prefix . "mvp_settings";
    $result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);
    if($result){

        $result = unserialize($result['options']);
        $settings = $result + $default_settings;
        
        $js_to_footer = mvp_intToBool($settings["js_to_footer"]);

        $global_custom_css = isset($settings['global_custom_css']) ? stripslashes($settings['global_custom_css']) : "";


    }else{
        $settings = $default_settings;
        $js_to_footer = false;
    }


   


    //get player options
    include_once('player_options.php');
    $default_options = mvp_player_options();
    $preset_options = mvp_player_options_preset();
    $embed_player_id = -1;

    if(isset($atts['player_id'])){
        $player_id = $atts['player_id'];
        $embed_player_id = $player_id;

        //get player options
        $player_table = $wpdb->prefix . "mvp_players";
        $stmt = $wpdb->prepare("SELECT preset, options, custom_css, custom_js FROM {$player_table} WHERE id = %d", $player_id);
        $result = $wpdb->get_row($stmt, ARRAY_A);

        if($result == NULL){
            exit("Invalid shortcode. Player ID '{$player_id}' does not exist!");
        }

        $player_options = unserialize($result['options']);
        $preset = $result["preset"];

        $preset = mvp_checkPreset($preset);

        $options = $player_options + $default_options + $preset_options[$preset];

        $custom_css = stripslashes($result['custom_css'] ?? ''); // Provide '' if null
        $custom_js = stripslashes($result['custom_js'] ?? '');   // Provide '' if null

    }else{

        if(isset($atts['instance_id']))$player_id = $atts['instance_id'];
        else $player_id = $mvp_unique_player_id;

        if(empty($atts['preset'])){
            if(isset($settings['overide_wp_video_skin']))$preset = $settings['overide_wp_video_skin'];
            else $preset = 'aviva';
        }else{
            $preset = $atts['preset'];
            $preset = mvp_checkPreset($preset);
        }
        
        $options = array_replace($default_options, $preset_options[$preset]);
        $custom_css = NULL;
        $custom_js = NULL;
    }

    

    $options['preset'] = $preset;



    //merge settings
    $options = $settings + $options;



    //override some options
    if(is_array($atts) && count($atts) > 0){
        foreach($atts as $att => $item){
            if($att != 'player_id' && $att != 'playlist_id'){
                $options[mvp_underscoreToCamelCase($att)] = $item;
            }
        }
    }

    


   /*
    echo '<pre>';
    var_dump($options);
    echo '</pre>';
  */


    $skin = $preset;
    //$skin = mvp_startsWith($skin, "flat");//remove (-light,-dark...) on flat skins




    //css
    $css = '';
    require_once(dirname(__FILE__)."/css/player.php");
    $css = mvp_player_css($wrapper_id, $options, MVP_PLUGINS_URL, $skin);
    //playlist css
    require_once(dirname(__FILE__)."/css/playlist.php");
    $css .= mvp_playlist_css($wrapper_id, $options);

    if(isset($options["limitDescriptionText"]) && $options["limitDescriptionText"] > 0){
        $css .= '.mvp-playlist-description-clamp{-webkit-line-clamp: '.$options["limitDescriptionText"].'!important;}';
    }

    //custom css
    if(!mvp_nullOrEmpty($custom_css))$css .= $custom_css; 

    if(!mvp_nullOrEmpty($global_custom_css))$css .= $global_custom_css; 

    //media end action custom
    $media_end_action_css = isset($options['media_end_action_css']) ? stripslashes($options['media_end_action_css']) : "";
    if(!mvp_nullOrEmpty($media_end_action_css))$css .= $media_end_action_css;  



    //scrollbar
    if($options['playlistScrollType'] == 'mcustomscrollbar'){
        wp_enqueue_style('mCustomScrollbar', plugins_url('apmvp/source/css/jquery.mCustomScrollbar.min.css'));
    }else if($options['playlistScrollType'] == 'perfect-scrollbar'){
        wp_enqueue_style('perfect-scrollbar', plugins_url('apmvp/source/css/perfect-scrollbar.css'));
    }


    //custom scripts
   if($options['gridType'] == 'masonry'){
        wp_enqueue_script('masonry', "https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js");
        wp_enqueue_script('imagesloaded', "https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js");
    }




    //ads
    if(isset($atts['ad_id']) && $atts['ad_id'] != ''){
        $ad_data_arr = mvp_getAdData($atts);

        $ad_options = $ad_data_arr['ad_options'];
        $ad_data = $ad_data_arr['ad_data'];
        $annotation_data = $ad_data_arr['annotation_data'];
    }else{
        $ad_options = null;
        $ad_data = null;
        $annotation_data = null;
    }



    //media

    $playlist = '';
    $activePlaylist = '';
    if(isset($atts['playlist_id'])){//get playlist by id

        $pids = explode(',',$atts['playlist_id']);
        $activePlaylist = $pids[0];//active playlist

        $playlist = mvp_get_playlist($pids, $instance_id, $atts, $options, $ad_data, $annotation_data, $ad_options);

    }else{//direct shortcode
        
        $activePlaylist = '0';

        //playlist markup

        $playlist = '<div class="mvp-playlist-list-'.$instance_id.'" style="display:none;">'.PHP_EOL;
        $playlist .= '<div class="mvp-playlist-anon mvp-playlist-'.$activePlaylist.'">'.PHP_EOL;

        //ads
        if($ad_data || $annotation_data){

            $playlist .= '<div class="mvp-global-playlist-data">';

            $encryptMediaPaths = false;
            if(!empty($atts["encrypt_media_paths"]))$encryptMediaPaths = true;

            $track = '';

            //ads
            if($ad_data)include('shortcode_ad_data.php');
            //annotations
            if($annotation_data)include('shortcode_annotation_data.php');

            $playlist .= $track;

            $playlist .= '</div>';//end mvp-global-playlist-data

        }

        if(isset($atts['plhtml'])){
            $playlist .= urldecode(stripslashes($atts['plhtml']));
        }else if(!empty($content)){
            $playlist .= do_shortcode($content);
        }else{
            $playlist .= mvp_video($atts);
        }

        /*if(!empty($content)){
            var_dump($content);
            $playlist .= do_shortcode($content);
        }else{
            if(isset($atts['plhtml'])){
                $playlist .= urldecode(stripslashes($atts['plhtml']));
            }else{
                $playlist .= mvp_video($atts);
            } 
        } */

        $playlist .= '</div>'.PHP_EOL;//end mvp-playlist 
        $playlist .= '</div>';//end mvp playlist list

    }


   
    $playlistPosition = $options["playlistPosition"];

    if($playlistPosition == "outer" || $playlistPosition == "wall"){
        $options["playlistStyle"] = $options["playlistGridStyle"];
    }

    if($playlistPosition == "no-playlist" || $playlistPosition == "wall"){
        $options["usePlaylistToggle"] = false;
    }

    //playback rate

    if(isset($options['playbackRate_value'])){

        $playbackRate_value = $options['playbackRate_value'];
        $playbackRate_menu_title = $options['playbackRate_menu_title'];
        
        $arr = array();

        foreach ($playbackRate_value as $id => $key) {
            if(!mvp_nullOrEmpty($key)){
                $arr[] = array(
                    'value' => $playbackRate_value[$id], 
                    'menu_title' => $playbackRate_menu_title[$id]
                );
            }
        }
     
        $options['playbackRateArr'] = $arr;

    }




    //js

    $js = '';
    if($js_to_footer == "true"){
        add_action('wp_print_footer_scripts', 'mvp_add_inline_js', 100);
        ob_start();
        $GLOBALS['mvp_inline_js'] .= mvp_get_constructor($instance_id, $options, $activePlaylist, $instance, $wrapper_id, $css, $atts, $preset, $embed_player_id, $custom_js);
        ob_get_contents();
        ob_clean();
        ob_end_clean();
    }else{
        $js = mvp_get_constructor($instance_id, $options, $activePlaylist, $instance, $wrapper_id, $css, $atts, $preset, $embed_player_id, $custom_js);
    }

  
    require_once(dirname(__FILE__)."/html/player.php");
    $html = mvp_player_html($wrapper_id, $preset, $options);



    $output = $html . $playlist . '</div>' . $js;//end player div, place playlists in player

   

    $mvp_unique_player_id++;

    return $output;

}

function mvp_add_inline_js(){
    echo $GLOBALS['mvp_inline_js'];
}

function mvp_get_constructor($instance_id, $options, $activePlaylist, $instance, $wrapper_id, $css, $atts, $preset, $embed_player_id, $custom_js = null) {

    if(isset($atts['active_playlist'])){
        if($atts['active_playlist'] == '')$activePlaylist = '';
        else $activePlaylist = ".mvp-playlist-".$atts['active_playlist'];
    }else if($activePlaylist != ''){
        $activePlaylist = ".mvp-playlist-".$activePlaylist;
    }




    //options
    $no_conflict = isset($options["no_conflict"]) ? mvp_intToBool($options["no_conflict"]) : "false";
    $playlistPosition = $options["playlistPosition"];



    //grid breakpoints
    $breakPointArr = "''";
    if($options['gridType'] == 'javascript'){
        if($playlistPosition == 'outer' || $playlistPosition == 'wall'){

            if(isset($options['bp_width'])){

                $bp_width = $options['bp_width'];
                $bp_column = $options['bp_column'];
                $bp_gutter = $options['bp_gutter'];

                $breakPointArr = '[';
                
                foreach ($bp_width as $id => $key) {
                    if(!mvp_nullOrEmpty($key)){
                        $breakPointArr .= '{width:'.$bp_width[$id].', column:'.$bp_column[$id].', gutter:'.$bp_gutter[$id].'},';
                    }
                }
                $breakPointArr = rtrim($breakPointArr,',');
                $breakPointArr .= ']';

            }else if(!isset($options['breakpoints_set']) && isset($options['breakPointArr'])){

                $breakPointArr = '[';
                foreach ($options['breakPointArr'] as $id => $key) {
                    $breakPointArr .= '{width:'.$key['width'].', column:'.$key['column'].', gutter:'.$key['gutter'].'},';
                }
                $breakPointArr = rtrim($breakPointArr,',');
                $breakPointArr .= ']';

            }
        }
    }

    //elements visibility

    if(isset($options['ev'])){
        $elementsVisibilityArr = '[';
        foreach ($options['ev'] as $arr) {
            if(count($arr) > 1 && isset($arr['width'])){//if there are elements set to hide 
                $width = $arr['width'];
                unset($arr['width']);
                $elements = json_encode(array_keys($arr));
                $elementsVisibilityArr .= '{width:'.$width.', elements:'.$elements.'}';
                $elementsVisibilityArr .= ',';
            }
        }
        $elementsVisibilityArr = rtrim(trim($elementsVisibilityArr), ',');//remove last comma
        $elementsVisibilityArr .= ']';

    }else if(!isset($options['breakpoints_set']) && isset($options['elementsVisibilityArr'])){

        $elementsVisibilityArr = '[';
        foreach ($options['elementsVisibilityArr'] as $arr) {
            if(count($arr) > 1 && isset($arr['width'])){//if there are elements set to hide 
                $width = $arr['width'];
                unset($arr['width']);
                $elements = json_encode(array_keys($arr));
                $elementsVisibilityArr .= '{width:'.$width.', elements:'.$elements.'},';
            }
        }
        $elementsVisibilityArr = rtrim(trim($elementsVisibilityArr), ',');//remove last comma
        $elementsVisibilityArr .= ']';    

    }else{
        $elementsVisibilityArr = "''";
    }


    //caption breakpoints

    if(isset($options['caption_bp_width'])){

        $caption_bp_width = $options['caption_bp_width'];
        $caption_bp_font_size = $options['caption_bp_font_size'];

        $caption_breakPointArr = '[';
        
        foreach ($caption_bp_width as $id => $key) {
            if(!mvp_nullOrEmpty($key)){
                $caption_breakPointArr .= '{width:'.$caption_bp_width[$id].', size:'.$caption_bp_font_size[$id].'},';
            }
        }
        $caption_breakPointArr = rtrim($caption_breakPointArr,',');
        $caption_breakPointArr .= ']';

    }else if(!isset($options['breakpoints_set']) && isset($options['caption_breakPointArr'])){

        $caption_breakPointArr = '[';
        
        foreach ($options['caption_breakPointArr'] as $id => $key) {
            $caption_breakPointArr .= '{width:'.$key['width'].', size:'.$key['font_size'].'},';
        }
        $caption_breakPointArr = rtrim($caption_breakPointArr,',');
        $caption_breakPointArr .= ']';

    }else{
        $caption_breakPointArr = "''";
    }

    //cast subs
    $textTrackStyle = array(
        "fontScale" => $options['tts_fontScale'],
        "foregroundColor" => $options['tts_foregroundColor'],
        "backgroundColor" => $options['tts_backgroundColor'],
        "edgeColor" => $options['tts_edgeColor'],
        "edgeType" => $options['tts_edgeType'],
        "fontStyle" => $options['tts_fontStyle'],
        "fontFamily" => $options['tts_fontFamily'],
        "fontGenericFamily" => $options['tts_fontGenericFamily']
    );

    //media end action custom
    $media_end_action_html = isset($options['media_end_action_html']) ? stripslashes($options['media_end_action_html']) : "";

    if($media_end_action_html != '')$media_end_action_html = str_replace('"', "'", $media_end_action_html);


   

    $ip_info = mvp_ip_info("Visitor", "Location");

    $current_user_roles = mvp_get_current_user_roles();

	$markup = '<script>';

        if(!empty($css)){

            $markup .= 'var htmlDivCss = "'.mvp_compressCss($css).'";
            var htmlDiv = document.getElementById("mvp-inline-css");
            if(htmlDiv){
                htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
            }else{
                var htmlDiv = document.createElement("div");
                htmlDiv.innerHTML = "<style id=\'mvp-inline-css\'>" + htmlDivCss + "</style>";
                document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
            }';

        }

        $markup .= 'if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad); else onLoad();  
    function onLoad() {    
        var mvpjq = jQuery;     
	    if('.$no_conflict.' == true){ mvpjq.noConflict();}
        var settings = {
            ajax_url: "'.admin_url( 'admin-ajax.php').'",
            wpEmbedUrl:"'.plugins_url('/apmvp/').'",
            playerId: '.$embed_player_id.',
            restrictDownloadForLoggedInUser: '.mvp_intToBool($options["restrictDownloadForLoggedInUser"]).',
            downloadVideoUserRoles: "'.(is_array($options['downloadVideoUserRoles']) ? implode(",", $options['downloadVideoUserRoles']) : $options['downloadVideoUserRoles']).'",
            viewVideoWithoutAdsForLoggedInUser: '.mvp_intToBool($options["viewVideoWithoutAdsForLoggedInUser"]).',
            viewVideoWithoutAdsUserRoles: "'.(is_array($options['viewVideoWithoutAdsUserRoles']) ? implode(",", $options['viewVideoWithoutAdsUserRoles']) : $options['viewVideoWithoutAdsUserRoles']).'",
            isUserLoggedIn: '.mvp_intToBool(is_user_logged_in()).',
            currentUserRoles: "'.(is_array($current_user_roles) ? implode(",", $current_user_roles) : $current_user_roles).'",
            playerClass: "'.$options["playerClass"].'",
            instanceName: "'.$instance.'",
            sourcePath: "'.MVP_PLUGINS_URL.'",
            ajax_url: "'.admin_url( 'admin-ajax.php').'",
            playlistList:".mvp-playlist-list-'.$instance_id.'",
            activePlaylist: "'.$activePlaylist.'",
            usePlayer: '.mvp_intToBool($options["usePlayer"]).',
            addPlaylistEvents: '.mvp_intToBool($options["addPlaylistEvents"]).',
            addResizeEvent: '.mvp_intToBool($options["addResizeEvent"]).',
            vrInfo:"'.$options["vrInfo"].'",
            autoRotatePanorama: '.mvp_intToBool($options["autoRotatePanorama"]).',
            autoRotateSpeed: "'.$options["autoRotateSpeed"].'",
            activeItem: '.$options["activeItem"].',
            volume: '.$options["volume"].',
            autoPlay: '.mvp_intToBool($options["autoPlay"]).',
            autoPlayAfterFirst: '.mvp_intToBool($options["autoPlayAfterFirst"]).',
            autoPlayInViewport: '.mvp_intToBool($options["autoPlayInViewport"]).',
            preload: "'.$options["preload"].'",
            randomPlay: '.mvp_intToBool($options["randomPlay"]).',
            loopingOn: '.mvp_intToBool($options["loopingOn"]).',
            mediaEndAction: "'.$options["mediaEndAction"].'",
            textTrackStyle: '.json_encode($textTrackStyle).',
            aspectRatio: '.$options["aspectRatio"].',
            activateWhenParentVisible: "'.$options["activateWhenParentVisible"].'",
            youtubeAppId: "'.$options["youtube_id"].'",
            gDriveAppId: "'.$options["gdrive_app_id"].'",
            facebookAppId: "'.$options["facebook_id"].'",
            whatsAppWarning: "'.$options["whatsAppWarning"].'",
            useSingleVideoEmbed: '.mvp_intToBool($options["useSingleVideoEmbed"]).',
            hideEmbedFunctionWhenEmbeded: '.mvp_intToBool($options["hideEmbedFunctionWhenEmbeded"]).',
            youtubeNoCookie: '.mvp_intToBool($options["youtube_no_cookie"]).',
            vimeoNoCookie: '.mvp_intToBool($options["vimeo_no_cookie"]).',
            togglePlaybackOnMultipleInstances: '.mvp_intToBool($options["togglePlaybackOnMultipleInstances"]).',
            youtubePlayerColor: "'.$options["youtubePlayerColor"].'",
            vimeoPlayerColor: "'.$options["vimeoPlayerColor"].'",
			playlistOpened: '.mvp_intToBool($options["playlistOpened"]).',
            showVideoTitle: '.mvp_intToBool($options["showVideoTitle"]).',
            blockYoutubeEvents: '.mvp_intToBool($options["blockYoutubeEvents"]).',
            playlistScrollType: "'.$options['playlistScrollType'].'",
            playlistScrollTheme: "'.$options["playlistScrollTheme"].'",
            rightClickContextMenu: "'.$options["rightClickContextMenu"].'",
            hidePlaylistOnFullscreenEnter: '.mvp_intToBool($options["hidePlaylistOnFullscreenEnter"]).',
            hideQualityMenuOnSingleQuality: '.mvp_intToBool($options["hideQualityMenuOnSingleQuality"]).',
            useKeyboardNavigationForPlayback: '.mvp_intToBool($options["useKeyboardNavigationForPlayback"]).',
            useGlobalKeyboardControls: '.mvp_intToBool($options["useGlobalKeyboardControls"]).',
            modifierKey: "'.$options["modifierKey"].'",
            keyboardControls: '.json_encode($options["keyboardControls"], JSON_HEX_TAG).',
            clickOnBackgroundClosesLightbox: '.mvp_intToBool($options["clickOnBackgroundClosesLightbox"]).',
            playerRatio: '.$options["playerRatio"].',
            combinePlayerRatio: '.mvp_intToBool($options["combinePlayerRatio"]).',
            makePlaylistSelector: '.mvp_intToBool($options["makePlaylistSelector"]).',
            autoOpenPlaylistSelector: '.mvp_intToBool($options["autoOpenPlaylistSelector"]).',
            autoAdvanceToNextPlaylist: '.mvp_intToBool($options["autoAdvanceToNextPlaylist"]).',
            showPosterOnPause: '.mvp_intToBool($options["showPosterOnPause"]).',
            adUpcomingMsgTime: "'.$options["adUpcomingMsgTime"].'",
            playlistBottomHeight: '.$options["playlistBottomHeight"].',
            youtubePlayerType: "'.$options["youtubePlayerType"].'",
            vimeoPlayerType: "'.$options["vimeoPlayerType"].'",
            breakPointArr: '.$breakPointArr.',
            caption_breakPointArr: '.$caption_breakPointArr.',
            autoLoadTranscript: '.mvp_intToBool($options["autoLoadTranscript"]).',
            pauseVideoOnDialogOpen: '.mvp_intToBool($options["pauseVideoOnDialogOpen"]).',
            playlistItemContent: "'.(is_array($options['playlistItemContent']) ? implode(",", $options['playlistItemContent']) : $options['playlistItemContent']).'",
            subtitleOffText: "'.$options["subtitleOffText"].'",
            cors: "'.$options["cors"].'",
            gridType: "'.$options["gridType"].'",
            useGa: '.mvp_intToBool($options["useGa"]).',
            ipInfo: '.json_encode($ip_info, JSON_HEX_TAG).',
            ageVerifyExpireTime: "'.$options["ageVerifyExpireTime"].'",
            gaTrackingId: "'.$options["gaTrackingId"].'",
            verticalBottomSepearator: '.$options["verticalBottomSepearator"].',
            elementsVisibilityArr: '.$elementsVisibilityArr.',
            playAdsOnlyOnce: '.mvp_intToBool($options["playAdsOnlyOnce"]).',
            showAnnotationsOnlyOnce: '.mvp_intToBool($options["showAnnotationsOnlyOnce"]).',
            rememberPlaybackPosition: "'.$options["rememberPlaybackPosition"].'",
            playbackPositionKey: "'.$options["playbackPositionKey"].'",
            useMobileNativePlayer: '.mvp_intToBool($options["useMobileNativePlayer"]).',
            vai:{vk:"'.base64_encode($options["vimeo_key"]).'",vs:"'.base64_encode($options["vimeo_secret"]).'",vt:"'.base64_encode($options["vimeo_token"]).'"},
            useSwipeNavigation: '.mvp_intToBool($options["useSwipeNavigation"]).',
            castConnectingMsg: "'.$options["castConnectingMsg"].'",
            limitDescriptionText: '.$options["limitDescriptionText"].',
            minimizeOnScroll: '.mvp_intToBool($options["minimizeOnScroll"]).',
            minimizeOnScrollOnlyIfPlaying: '.mvp_intToBool($options["minimizeOnScrollOnlyIfPlaying"]).',
            minimizeClass: "'.$options["minimizeClass"].'",
            percentToCountAsPlay: "'.$options["percentToCountAsPlay"].'",
            showStreamVideoBitrateMenu: '.mvp_intToBool($options["showStreamVideoBitrateMenu"]).',
            showStreamAudioBitrateMenu: '.mvp_intToBool($options["showStreamAudioBitrateMenu"]).',
            seekTime: '.(!mvp_nullOrEmpty($options["seekTime"]) ? $options["seekTime"] : 10).',
            seekToChapterStart: '.mvp_intToBool($options["seekToChapterStart"]).',
            useChapterWindow: '.mvp_intToBool($options["useChapterWindow"]).',
            autoOpenChapterMenu: '.mvp_intToBool($options["autoOpenChapterMenu"]).',
            showChapterTitle: '.mvp_intToBool($options["showChapterTitle"]).',
            hideChapterMenuOnChapterSelect: '.mvp_intToBool($options["hideChapterMenuOnChapterSelect"]).',
            useImaLoader: '.mvp_intToBool($options["useImaLoader"]).',
            hideImaAdTimer: '.mvp_intToBool($options["hideImaAdTimer"]).',
            forceAdMutedOnIos: '.mvp_intToBool($options["forceAdMutedOnIos"]).',
            createAdMarkers: '.mvp_intToBool($options["createAdMarkers"]).',
            requirePosterFromFolder: '.mvp_intToBool($options["requirePosterFromFolder"]).',
            requireThumbnailsFromFolder: '.mvp_intToBool($options["requireThumbnailsFromFolder"]).',
            youtubeThumbSize: "'.$options["youtubeThumbSize"].'",
            vimeoThumbSize: "'.$options["vimeoThumbSize"].'",
            displayWatchedPercentage: '.mvp_intToBool($options["displayWatchedPercentage"]).',
            useAudioEqualizer: '.mvp_intToBool($options["useAudioEqualizer"]).',
            useAirPlay: '.mvp_intToBool($options["useAirPlay"]).',
            theaterElement: "'.$options["theaterElement"].'",
            theaterElementClass: "'.$options["theaterElementClass"].'",
            focusVideoInTheater: '.mvp_intToBool($options["focusVideoInTheater"]).',
            hidePlaylistOnMinimize: '.mvp_intToBool($options["hidePlaylistOnMinimize"]).',
            useMinimizeCloseBtn: '.mvp_intToBool($options["useMinimizeCloseBtn"]).',
            rememeberCaptionState: '.mvp_intToBool($options["rememeberCaptionState"]).',
            keepCaptionFontSizeAfterManualResize: '.mvp_intToBool($options["keepCaptionFontSizeAfterManualResize"]).',
            wrapperMaxWidth: "'.$options["wrapperMaxWidth"].'",
            playlistSideWidth: "'.$options["playlistSideWidth"].'",
            tooltipClose: "'.$options["tooltipClose"].'",
            tooltipLightboxPrevious: "'.$options["tooltipLightboxPrevious"].'",
            tooltipLightboxNext: "'.$options["tooltipLightboxNext"].'",
            displayPosterOnMobile: '.mvp_intToBool($options["displayPosterOnMobile"]).',
            skin: "'.$options["preset"].'",
            slideshowDuration: "'.$options["slideshowDuration"].'",
            slideshowRandom: '.mvp_intToBool($options["slideshowRandom"]).',
            slideshowPauseWithAudio: '.mvp_intToBool($options["slideshowPauseWithAudio"]).',
            navigationType: "'.$options["navigationType"].'",
            playlistPosition: "'.$options["playlistPosition"].'",
            playlistStyle: "'.$options["playlistStyle"].'",
            navigationStyle: "'.$options["navigationStyle"].'",
            playerShadow: "'.$options["playerShadow"].'",
            playerType: "'.$options["playerType"].'",
            useLightboxAdvanceButtons: '.mvp_intToBool($options["useLightboxAdvanceButtons"]).',
            selectorInit: '.mvp_intToBool($options["selectorInit"]).',
            disableVideoSkip: '.mvp_intToBool($options["disableVideoSkip"]).',
            disableSeekbar: '.mvp_intToBool($options["disableSeekbar"]).',
            disableSeekingPastWatchedPoint: '.mvp_intToBool($options["disableSeekingPastWatchedPoint"]).',
            showPrevNextVideoThumb: '.mvp_intToBool($options["showPrevNextVideoThumb"]).',
            comingnextTime: "'.$options["comingnextTime"].'",
            upNextTime: "'.$options["upNextTime"].'",
            useStatistics: '.mvp_intToBool($options["useStatistics"]).',
            showControlsBeforeStart: '.mvp_intToBool($options["showControlsBeforeStart"]).',
            useCache: '.mvp_intToBool($options["useCache"]).',
            cacheTime: "'.$options["cacheTime"].'",
            playlistContent: "'.$options["playlistContent"].'",
            paginationPreviousBtnTitle: "'.$options["paginationPreviousBtnTitle"].'",
            paginationPreviousBtnText: "'.$options["paginationPreviousBtnText"].'",
            paginationNextBtnTitle: "'.$options["paginationNextBtnTitle"].'",
            paginationNextBtnText: "'.$options["paginationNextBtnText"].'",
            s3UrlExpireTime: "'.$options["s3UrlExpireTime"].'",
            s3Region: "'.$options["s3Region"].'",
            s3ThumbExtension: "'.$options["s3ThumbExtension"].'",
            getThumbFromBucket: '.mvp_intToBool($options["getThumbFromBucket"]).',
            s3:{s3k:"'.base64_encode($options["s3k"]).'",s3s:"'.base64_encode($options["s3s"]).'"},
            useVideoTransform: '.mvp_intToBool($options["useVideoTransform"]).',
            saveTransformState: '.mvp_intToBool($options["saveTransformState"]).',
            offlineImage: "'.$options["offlineImage"].'",
            offlineImageUrl: "'.$options["offlineImageUrl"].'",
            offlineImageUrlTarget: "'.$options["offlineImageUrlTarget"].'",
            mediaEndActionCustom: "'.trim($media_end_action_html).'",
            mediaEndImage: "'.$options["mediaEndImage"].'",
            mediaEndImageUrl: "'.$options["mediaEndImageUrl"].'",
            mediaEndImageUrlTarget: "'.$options["mediaEndImageUrlTarget"].'",

        }'."\n";

        if($options["selectorInit"]){

            $markup .= 'mvpjq("'.$options["selectorInit"].'").on("click", function(){
                var id = mvpjq(this).attr("data-media-id");
                if(!window.'.$instance.'){
                    settings.mediaId = id;
                    settings.selectorInit = true;//try to autoplay with sound
                    window.'.$instance.'=mvpjq("#'.$wrapper_id.'").mvp(settings);//init player first time
                }else{';
                    if($options["playerType"] == "lightbox"){
                        $markup .= 'window.'.$instance.'.openLightbox(id)';//reopen lightbox 
                    }
                $markup .= '}   
                return false;
            })';

        }else{
            $markup .= 'window.'.$instance.'=mvpjq("#'.$wrapper_id.'").mvp(settings);'."\n";
        }

        //custom js
        if(!mvp_nullOrEmpty($custom_js))$markup .= $custom_js; 

	$markup .= '};</script>'."\n";

    return $markup;

}

function mvp_get_playlist($pids, $instance_id, $atts, $options, $ad_data, $annotation_data, $ad_options) {

	global $wpdb;
	$playlist_table = $wpdb->prefix . "mvp_playlists";
	$media_table = $wpdb->prefix . "mvp_media";


    if($options['makePlaylistSelector']){
        $playlists_to_display = array();
        $playlistSelectorSelected = explode(',', $options['playlistSelectorSelected']);

        foreach($playlistSelectorSelected as $pss){
            $playlists_to_display[] = array("id" => $pss);
        }
    }
    else if(isset($options) && $options['displayAllPlaylistsInPage']){//get all playlists
        $playlists_to_display = $wpdb->get_results("SELECT id FROM {$playlist_table}", ARRAY_A);
    }
    else{
        $playlists_to_display = array();

        if(isset($atts['rel_playlist_id'])){//add related playlists to page so we can load them
            $rel_pids = explode(',',$atts['rel_playlist_id']);

            foreach($rel_pids as $rel_pid){
                if(in_array($rel_pid, $pids)){//remove if this playlist is in rel
                    $key = array_search($rel_pid, $pids);
                    if($key !== false)unset($pids[$key]);
                }
                $playlists_to_display[] = array("id" => $rel_pid, "rel" => true);
            }
        }
        
        foreach($pids as $pid){//get selected playlists
            $playlists_to_display[] = array("id" => $pid);
        }  
    }

    //playlist list
    $markup = '<div class="mvp-playlist-list-'.$instance_id.'" style="display:none;">'.PHP_EOL;

    $default_playlist_options = mvp_playlist_options();

	foreach($playlists_to_display as $playlist) {

        $pl_id = $playlist['id'];

        //related playlist 
        $is_rel = '';
        if(isset($playlist['rel']))$is_rel = ' mvp-rel-playlist';//is rel playlist

        $markup .= '<div class="mvp-playlist-'.$pl_id.$is_rel.'" data-playlist-id="'.$pl_id.'"';

        if(isset($atts['rel_num'])) $markup .= ' data-rel-num="'.$rel_num.'"';

        //global playlist options
        $playlist_data = $wpdb->get_row($wpdb->prepare("SELECT title, options FROM {$playlist_table} WHERE id = %d", $pl_id), ARRAY_A);

        $pl_options = $playlist_data['options'];

        if(!$pl_options){
            $playlist_options = $default_playlist_options;
        }else{
            $po = unserialize($pl_options);
            $playlist_options = $po + $default_playlist_options;
        }


        if($options['makePlaylistSelector']){

            $title = $playlist_data['title'];
            $title = str_replace('"', "'", $title);
            $markup .= ' data-title="'.$title.'"';

            if(isset($playlist_options["description"])){
                $desc = $playlist_options["description"];
                $desc = str_replace('"', "'", $desc);
                $markup .= ' data-description="'.$desc.'"';
            }
            if(isset($playlist_options["thumb"])){
                $markup .= ' data-thumb="'.$playlist_options["thumb"].'"';
            }
        }

        $markup .= '>'.PHP_EOL;


        //add more
        $addMoreOnTotalScroll = $playlist_options['addMoreOnTotalScroll'];
        $limit = $playlist_options['addMoreOnTotalScrollLimit'];
        $sortOrder = 'order_id';
        $sortDirection = 'ASC';

        if(isset($atts["add_more"]))$addMoreOnTotalScroll = true;
        if(isset($atts["add_more_limit"]))$limit = $atts["add_more_limit"];

        $allowed = array("ASC", "DESC");
        if(!in_array($sortDirection, $allowed))$sortDirection = 'ASC';//escape


        //pagination (only with grid)
        $usePagination = NULL;
        if($options["playlistPosition"] == 'outer' || $options["playlistPosition"] == 'wall'){
            if($playlist_options["usePagination"] || isset($atts["use_pagination"])){
                $usePagination = true;
                if(isset($atts["pagination_per_page"]))$limit = $atts["pagination_per_page"];
            }
        }
        


        $encryptMediaPaths = $playlist_options['encryptMediaPaths'];


        if($addMoreOnTotalScroll){//scroll end

            $num_results = $wpdb->get_var($wpdb->prepare("SELECT COUNT(id) FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d", $pl_id));

            $stmt = $wpdb->prepare("SELECT id, title, options FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d ORDER BY $sortOrder $sortDirection LIMIT $limit", $pl_id);
            $medias = $wpdb->get_results($stmt, ARRAY_A);

            //global playlist options

            $track = '<div class="mvp-global-playlist-data" data-add-more-on-total-scroll="1" data-add-more-num-results="'.$num_results.'" data-add-more-offset="'.$limit.'" data-add-more-limit="'.$limit.'" data-add-more-sort-order="'.$sortOrder.'" data-add-more-sort-direction="'.$sortDirection.'"';

        }else if($usePagination){//pagination

            $num_results = $wpdb->get_var($wpdb->prepare("SELECT COUNT(id) FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d", $pl_id));

            $stmt = $wpdb->prepare("SELECT id, title, options FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d ORDER BY $sortOrder $sortDirection LIMIT $limit", $pl_id);
            $medias = $wpdb->get_results($stmt, ARRAY_A);

            //global playlist options

            $track = '<div class="mvp-global-playlist-data" data-use-pagination="1" data-pagination-current-page="0" data-add-more-num-results="'.$num_results.'" data-add-more-offset="'.$limit.'" data-add-more-limit="'.$limit.'" data-add-more-sort-order="'.$sortOrder.'" data-add-more-sort-direction="'.$sortDirection.'"';    

        }else{//retrieve all 

            $stmt = $wpdb->prepare("SELECT id, title, options FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d ORDER BY $sortOrder $sortDirection", $pl_id);
            $medias = $wpdb->get_results($stmt, ARRAY_A);

            $track = '<div class="mvp-global-playlist-data"';

        }

        
        if(!empty($playlist_options['pwd'])){
            $track .= ' data-pwd="'.md5($playlist_options['pwd']).'"';
        }

        if(is_user_logged_in()){
            if(!mvp_nullOrEmpty($playlist_options["lockTime"])){
                $track .= ' data-lock-time="'.$playlist_options["lockTime"].'"';
           
                if(!empty($playlist_options['lockVideoUserRoles'])){
                    $lockVideoUserRoles = is_array($playlist_options['lockVideoUserRoles']) ? implode(",", $playlist_options['lockVideoUserRoles']) : $playlist_options['lockVideoUserRoles'];
                    $track .= ' data-lock-video-user-roles="'.$lockVideoUserRoles.'"';
                }
            }
        }else{
            if(!mvp_nullOrEmpty($playlist_options["lockTime2"])){
                $track .= ' data-lock-time="'.$playlist_options["lockTime2"].'"';
            } 
        }
        
        if(!empty($playlist_options["getEmbedDetails"])){
            $track .= ' data-get-embed-details="1"';
        }
        if(!empty($playlist_options["start"])){
            $track .= ' data-start="'.$playlist_options["start"].'"';
        }
        else if(isset($atts["start"])){
            $track .= ' data-start="'.$atts["start"].'"';
        }
        if(!empty($playlist_options["end"])){
            $track .= ' data-end="'.$playlist_options["end"].'"';
        }
        else if(isset($atts["end"])){
            $track .= ' data-end="'.$atts["end"].'"';
        }
        if(!empty($playlist_options["playbackRate"])){
            $track .= ' data-playback-rate="'.$playlist_options["playbackRate"].'"';
        }
        else if(isset($atts["playbackRate"])){
            $track .= ' data-playback-rate="'.$atts["playbackRate"].'"';
        }
        if(!empty($playlist_options["vast"])){
            $track .= ' data-vast="'.$playlist_options["vast"].'"';
        }
        else if(isset($atts["vast"])){
            $track .= ' data-vast="'.$atts["vast"].'"';
        }
        if(!empty($encryptMediaPaths)){
            $track .= ' data-encrypt-media-paths="'.$encryptMediaPaths.'"';
        }
        else if(isset($atts["encryptMediaPaths"])){
            $encryptMediaPaths = $atts['encryptMediaPaths'];
            $track .= ' data-encrypt-media-paths="'.$encryptMediaPaths.'"';
        }

        $track .= '>';//end mvp-global-playlist-data

        //ads
        if($ad_data)include('shortcode_ad_data.php');
        //annotations
        if($annotation_data)include('shortcode_annotation_data.php');

        $track .= '</div>';//end mvp-global-playlist-data

        $markup .= $track.PHP_EOL;

        //tracks

        foreach($medias as $media) {
            $markup .= mvp_shortcode_media($media, $encryptMediaPaths);
        }

        $markup .= PHP_EOL;
                
        $markup .= '</div>'.PHP_EOL;//end mvp-playlist 

    }

    $markup .= '</div>';//end mvp playlist list

	return $markup;
	
}

function mvp_video($media, $content = null){

    //tracks

    $encryptMediaPaths = false;
    if(!empty($media["encrypt_media_paths"]))$encryptMediaPaths = true;

    $type = $media['type'];

    $track = '<div class="mvp-playlist-item" data-type="'.$type.'" ';

    //path
       
    if($type == "video" || $type == "audio"){

        $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['path'], FILTER_SANITIZE_STRING ) ); 
        $path_array = explode( ',', $sanitize );

        if(count($path_array)>1){//multiple qualities
            $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['quality_title'], FILTER_SANITIZE_STRING ) ); 
            $quality_title_array = explode( ',', $sanitize );
        }else{
            $quality_title_array = ['default'];//dont require quality on single quality
        }

        //We need to make sure that our two arrays are exactly the same lenght before we continue
        if(count($path_array) != count($quality_title_array))return "Shortcode PATH needs to contain the same amount of values as QUALITY_TITLE parameter!";

        $path = 'data-path=\'[';

        foreach($path_array as $k => $v){ 

            if($type == "video"){
                $ext = "mp4";
            }else if($type == "audio"){
                $ext = pathinfo($v, PATHINFO_EXTENSION);
                if(mvp_nullOrEmpty($ext))$ext = "mp3";
            }

            if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($v);
            else $p = $v;

            $path .= '{"quality": "'.$quality_title_array[$k].'", "'.$ext.'": "'.$p.'"},';    

        }

        $path = substr_replace($path, "", -1);//remove last comma
        $path .= ']\' ';

        if(!empty($media['quality'])){
            $track .= 'data-quality="'.$media['quality'].'" ';
        }else{
            $track .= 'data-quality="'.$quality_title_array[0].'" ';
        }

        if(!empty($media['quality_mobile'])){
            $track .= 'data-quality-mobile="'.$media['quality_mobile'].'" ';
        }

    }else{

        $prefix='';
        if($type == "folder_video" || $type == "folder_audio" || $type == "folder_image"){

            if(!isset($media["folder_custom_url"]) || $media["folder_custom_url"] == '0'){
                $prefix = MVP_FILE_DIR;
            }
        }

        $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['path'], FILTER_SANITIZE_STRING ) ); 

        if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($prefix.$sanitize);
        else $p = $prefix.$sanitize;

        if($type == "s3_bucket_video" || $type == "s3_video"){      
            $path = 'data-bucket="'.$p.'" ';
        }else{
            $path = 'data-path="'.$p.'" ';
        }

        if(!empty($media['quality'])){
            $track .= 'data-quality="'.$media['quality'].'" ';
        }
    }
    
    $track .= $path;

    if(!empty($media["exclude"])){
        $track .= ' data-exclude="'.$media["exclude"].'"';
    }

    if(!empty($media["bkey"])){
        if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($media['bkey']);
        else $p = $media['bkey'];

        $track .= ' data-key="'.$p.'"';
    }

    if(!empty($media["mp4"])){
        $track .= 'data-mp4="'.$media["mp4"].'" ';
    }
    if(!empty($media["user_id"])){
        $track .= 'data-user-id="'.$media["user_id"].'" ';
    }
    if(!empty($media["is360"])){
        $track .= 'data-is360="1" ';
    }
    if(!empty($media["vrmode"])){
        $track .= 'data-vr-mode="'.$media["vrmode"].'" ';
    }
    if(!empty($media["noapi"])){
        $track .= 'data-noapi="1" ';
    }
    if(isset($media["lock_time"])){
        $track .= 'data-lock-time="'.$media["lock_time"].'" ';
    }
    if(!empty($media["islive"])){
        $track .= 'data-live-stream="1" ';
    }
    if(!empty($media["thumb"])){
        $track .= 'data-thumb="'.$media["thumb"].'" ';
    }
    if(!empty($media["alt_text"])){
        $track .= 'data-alt="'.$media["alt_text"].'" ';
    }
    if(!empty($media["title"])){
        $track .= 'data-title="'.$media["title"].'" ';
    }
    if(!empty($media["description"])){
        $track .= 'data-description="'.$media["description"].'" ';
    }
    if(!empty($media["poster"])){
        $track .= 'data-poster="'.$media["poster"].'" ';
    }
    if(!empty($media["slideshow_images"])){
        $track .= 'data-slideshow-images="'.$media["slideshow_images"].'" ';
    }
    if(!empty($media["poster_frame_time"])){
        $track .= 'data-poster-frame-time="'.$media["poster_frame_time"].'" ';
    }
    if(!empty($media["download"])){
        $track .= 'data-download="'.$media["download"].'" ';
    }
    if(!empty($media["preview_seek"])){
        $track .= 'data-preview-seek="'.$media["preview_seek"].'" ';
    }
    if(!empty($media["hover_preview"])){
        $track .= 'data-hover-preview="'.$media["hover_preview"].'" ';
    }
    if(!empty($media["share"])){
        $track .= 'data-share="'.$media["share"].'" ';
    }
    if(!empty($media["limit"])){
        $track .= 'data-limit="'.$media["limit"].'" ';
    }
    if(!empty($media["start"])){
        $track .= 'data-start="'.$media["start"].'" ';
    }
    if(!empty($media["end"])){
        $track .= 'data-end="'.$media["end"].'" ';
    }
    if(!empty($media["playback_rate"])){
        $track .= 'data-playback-rate="'.$media["playback_rate"].'" ';
    }
    if(!empty($media["user_id"])){
        $track .= 'data-user-id="'.$media["user_id"].'" ';
    }
    if(!empty($media["load_more"]) && $media["load_more"] == '1'){
        $track .= 'data-load-more="1" ';
    }
    if(!empty($media["duration"])){
        $track .= 'data-duration="'.$media["duration"].'" ';
    }
    if(!empty($media["chapters"])){
        $track .= 'data-chapters="'.$media["chapters"].'" ';

        if(!empty($media["chapters_cors"])){
            $track .= 'data-chapters-cors="'.$media["chapters_cors"].'" ';
        }
    }
    if(!empty($media["vast"])){
        $track .= 'data-vast="'.$media["vast"].'" ';
    }
    if(!empty($media["link"])){
        $track .= 'data-link="'.$media["link"].'" ';
        if(!empty($media["target"])){
            $track .= 'data-target="'.$media["target"].'" ';
        }
    }
    if(!empty($media["end_link"])){
        $track .= 'data-end-link="'.$media["end_link"].'" ';
        if(!empty($media["end_target"])){
            $track .= 'data-end-target="'.$media["end_target"].'" ';
        }
    }
    if(!empty($media["sort_type"])){
        $track .= 'data-sort="'.$media["sort_type"].'" ';
        if(!empty($media["sort_dir"])){
            $track .= 'data-sort-direction="'.$media["sort_dir"].'" ';
        }
    }
    if(!empty($media["pwd"])){
        $track .= 'data-pwd="'.md5($media["pwd"]).'" ';
    }
    if(!empty($media["vpwd"])){
        $track .= 'data-vpwd="'.base64_encode($media["vpwd"]).'" ';
    }
    if(!empty($media["id3"])){
        $track .= 'data-id3="'.$media["id3"].'" ';
    }
    if(!empty($media["age_verify"])){
        $track .= 'data-age-verify="'.$media["age_verify"].'" ';
    }

    $track .= '>';

    //subtitles
    if(!empty($media["subtitle_src"]) && !empty($media["subtitle_label"])){

        $track .= '<div class="mvp-subtitles">';

        $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['subtitle_src'], FILTER_SANITIZE_STRING ) ); 
        $subtitle_src_array = explode( ',', $sanitize );

        $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['subtitle_label'], FILTER_SANITIZE_STRING ) ); 
        $subtitle_label_array = explode( ',', $sanitize );

        $subtitle_cors_array = null;
        if(!empty($media["subtitle_cors"])){
            $subtitle_cors_array = explode( ',', $media["subtitle_cors"] );
        }

        //We need to make sure that our two arrays are exactly the same lenght before we continue
        if(count($subtitle_src_array) != count($subtitle_label_array))return "Shortcode 'subtitle_src' needs to contain the same amount of values as 'subtitle_label' parameter!";

        foreach($subtitle_src_array as $k => $v){ 

            if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($v);
            else $p = $v;

            $track .= '<div data-label="'.$subtitle_label_array[$k].'" data-src="'.$p.'"';

            if(isset($subtitle_cors_array)){
                if(!empty($subtitle_label_array[$k])){
                    $track .= ' data-cors="1"';
                }
            }

            if(isset($media["subtitle_active"])){
                if($media["subtitle_active"] == $subtitle_label_array[$k]){
                    $track .= ' data-default></div>'.PHP_EOL;
                    unset($media["subtitle_active"]);
                }else{
                    $track .= '></div>'.PHP_EOL;
                }
            }else{
                $track .= '></div>'.PHP_EOL;
            }
        }

        $track .= '</div>';
    }


    if(!empty($content)){

        //ads
        if(strpos($content, 'apmvp_ad') !== false){
            $track .= '<div class="mvp-ad-section">';
            $track .= do_shortcode($content);
            $track .= '</div>';
        }
    }

    $track .= '</div>';//end div

    return $track;
        
}

function mvp_ad($media, $content = null){

    $ad_type = $media['ad_type'];

    $ad = '<div class="mvp-ad mvp-'.$ad_type.'"';

        if(isset($media['type']))$ad .= ' data-type="'.$media['type'].'"';
        if(isset($media['path']))$ad .= ' data-path="'.$media['path'].'"';
        if(isset($media['poster']))$ad .= ' data-poster="'.$media['poster'].'"';
        if(isset($media['skip_enable']))$ad .= ' data-skip-enable="'.$media['skip_enable'].'"'; 
        if(isset($media['begin']))$ad .= ' data-begin="'.$media['begin'].'"'; 
        if(isset($media['duration']))$ad .= ' data-duration="'.$media['duration'].'"';

        if(isset($media['link'])){
            $ad .= ' data-link="'.$media['link'].'"'; 
            if(isset($media['target']))$ad .= ' data-target="'.$media['target'].'"'; 
            if(isset($media['rel']))$ad .= ' data-rel="'.$media['rel'].'"'; 
        }

    $ad .= '></div>'.PHP_EOL;

    return $ad;                        

}

?>