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
        if(isset($atts['ap_is_embed']))$js_to_footer = false;

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
    $schedule_pids = [];

    if(isset($atts['player_id'])){
        $player_id = $atts['player_id'];
        $embed_player_id = $player_id;

        //get player options
        $player_table = $wpdb->prefix . "mvp_players";
        $stmt = $wpdb->prepare("SELECT preset, options, custom_css, custom_js FROM {$player_table} WHERE id = %d", $player_id);
        $result = $wpdb->get_row($stmt, ARRAY_A);
        
        if($result == NULL){
            exit("Invalid shortcode mvp. Player ID '{$player_id}' does not exist!");
        }

        $player_options = unserialize($result['options']);
        $preset = $result["preset"];

        $preset = mvp_checkPreset($preset);

        $options = $player_options + $default_options + $preset_options[$preset];

        $custom_css = isset($result['custom_css']) ? stripslashes($result['custom_css']) : null;
        $custom_js = isset($result['custom_js']) ? stripslashes($result['custom_js']) : null;


        $options['hasSchedule'] = false;
        $options['isSchedule'] = false;
        $options['scheduleData'] = [];
        $options['scheduleTimeData'] = [];

        if(defined('MVP_SCHEDULE')){

            $schedule_table = $wpdb->prefix . "mvp_schedule";

            $stmt = $wpdb->prepare("SELECT options FROM {$schedule_table} WHERE player_id = %d", $player_id);
            $result = $wpdb->get_row($stmt, ARRAY_A);

            if($result){
                $sch_data = unserialize($result['options']);
                $sch_options = mvp_schedule_options();
                $schedule_data = $sch_data + $sch_options;

                if($schedule_data['useSchedule']){
                
                    if(count($schedule_data['schedule']) > 0){

                        $hasSchedule = false;

                        foreach ($schedule_data['schedule'] as $schedule) {
                            if(isset($schedule['disabled']))continue;
                            else $hasSchedule = true;
                        }

                        if($hasSchedule){

                            $options['hasSchedule'] = true;

                            $sch = mvp_check_schedule($schedule_data);
                            if($sch['is_schedule']){
                                $options['isSchedule'] = true;//check if is current scheduled
                                $options['scheduleData'] = $sch['data'];
                                $options['scheduleTimeData'] = $sch['time_data'];
                            }


                            //get all playlists for schedule
                            foreach ($schedule_data['schedule'] as $schedule) {
                                if(isset($schedule['schedule_content'])){
                                    $spids = explode(",", $schedule['schedule_content']);
                                    foreach ($spids as $spid) {
                                        if(!in_array($spid, $schedule_pids)){
                                            $schedule_pids[] = $spid;
                                        }
                                    }
                                     
                                }
                            }

                        }
                    }
                }
            }
        }




    }else{

        if(isset($atts['instance_id']))$player_id = $atts['instance_id'];
        else $player_id = $mvp_unique_player_id;

        if(empty($atts['preset'])){
            if(isset($settings['overide_wp_video_skin']))$preset = $settings['overide_wp_video_skin'];
            else $preset = 'aviva';
        }else{
            $preset = $atts['preset'];
        }
        $preset = mvp_checkPreset($preset);
        
        $options = array_replace($default_options, $preset_options[$preset]);
        $custom_css = NULL;
        $custom_js = NULL;


        $options['hasSchedule'] = false;
        $options['isSchedule'] = false;
        $options['scheduleData'] = [];
        $options['scheduleTimeData'] = [];

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




    //css
    $css = '';

    if($options["includePlayerCss"]){

        require_once(dirname(__FILE__)."/css/player.php");
        $css = mvp_player_css($wrapper_id, $options, MVP_PLUGINS_URL, $skin);
        //playlist css
        require_once(dirname(__FILE__)."/css/playlist.php");
        $css .= mvp_playlist_css($wrapper_id, $options);

    }

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
    if($options['playlistScrollType'] == 'mcustomscrollbar')$options['playlistScrollType'] = 'perfect-scrollbar';
    if($options['playlistScrollType'] == 'perfect-scrollbar'){
        wp_enqueue_style('perfect-scrollbar', plugins_url('apmvp/source/css/perfect-scrollbar.css'));
    }




    //lang
    $playerLanguage = $options["playerLanguage"];
    $locale = mvp_locale_data($playerLanguage);
    $options = $options + $locale;




    $current_user_roles = mvp_get_current_user_roles();



    //ads

    $ad_data = null;
    $annotation_data = null;
    $showAds = false;

    if(isset($atts['ad_id']) && $atts['ad_id'] != ''){

        $showAds = true;

        if($options["viewVideoWithoutAdsForLoggedInUser"] && is_user_logged_in()){
            $showAds = false;
        }

        if($current_user_roles && is_array($current_user_roles) && count($current_user_roles) > 0 && $options['viewVideoWithoutAdsUserRoles']){

            $showAds = count(array_intersect($options["viewVideoWithoutAdsUserRoles"], $current_user_roles)) == 0;

        }

        if($showAds){

            $ad_data_arr = mvp_getAdData($atts);

            //$ad_options = $ad_data_arr['ad_options'];
            $ad_data = $ad_data_arr['ad_data'];
            $annotation_data = $ad_data_arr['annotation_data'];

        }

    }

    $options["showAds"] = $showAds;



    //media

    $playlist = '';
    $activePlaylist = '';

    if($options['hasSchedule']){

        $playlist = mvp_get_playlist($schedule_pids, $instance_id, $atts, $options, $ad_data, $annotation_data);

    }else{

        if(isset($atts['playlist_id'])){//get playlist by id

            $pids = explode(',',$atts['playlist_id']);
            $activePlaylist = $pids[0];//active playlist

            if($activePlaylist){
                $playlist = mvp_get_playlist($pids, $instance_id, $atts, $options, $ad_data, $annotation_data);
            }

        }else{//direct shortcode
            
            $activePlaylist = '0';

            //playlist markup

            $playlist = '<div class="mvp-playlist-list-'.$instance_id.'" style="display:none;">'.PHP_EOL;
            $playlist .= '<div class="mvp-playlist-anon mvp-playlist-'.$activePlaylist.'">'.PHP_EOL;

            //ads
            if($ad_data || $annotation_data){

                $playlist .= '<div class="mvp-global-playlist-data">';

                $encryptMediaPaths = false;
                if(!empty($atts["encrypt_media_paths"]) && $atts["encrypt_media_paths"] == '1')$encryptMediaPaths = true;

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
            }else if(isset($atts['type']) && isset($atts['path'])){
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



    //html

    $html = '';

    //wrap is outer div which we can toggle visiblity
    if($options['hasSchedule']){
        $cl = $options['isSchedule'] && isset($options['scheduleData']['schedule_player']) ? ' mvp-player-schedule-shown' : ' mvp-player-disabled';
        $html .= '<div class="mvp-player-schedule'.$cl.'">';
    } 

    $customClass = !empty($options['customClass']) ? $options['customClass'] : '';
    $html .= '<div id="'.$wrapper_id.'"';
    if(!empty($customClass))$html .= ' class="'.$customClass.'"';
    $html .= '>';

    $shedule_closing = '';//needs to be after playlist closing div!
    if($options['hasSchedule']){
        $shedule_closing .= '</div>';
    } 



    $output = $html . $playlist . '</div>' . $shedule_closing . $js;//end player div, place playlists in player

   

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



    $hlsConfig = '';
    if(isset($options["hlsConfig"]) && !empty($options["hlsConfig"])){
        $hlsConfig = $options["hlsConfig"];
        $hlsConfig = str_replace('"', "'", $hlsConfig);
        $hlsConfig = trim(preg_replace('/\s+/', ' ', $hlsConfig));
        $hlsConfig = str_replace('</', '<\/', $hlsConfig);
    }

    $dashConfig = '';
    if(isset($options["dashConfig"]) && !empty($options["dashConfig"])){
        $dashConfig = $options["dashConfig"];
        $dashConfig = str_replace('"', "'", $dashConfig);
        $dashConfig = trim(preg_replace('/\s+/', ' ', $dashConfig));
        $dashConfig = str_replace('</', '<\/', $dashConfig);
    }



    if(defined('MVP_VIDEO_HEATMAP')){
        $trackVideoHeatmap = mvp_intToBool($options["trackVideoHeatmap"]);
        $showVideoHeatmap = mvp_intToBool($options["showVideoHeatmap"]);
    }else{
        $trackVideoHeatmap = mvp_intToBool(0);
        $showVideoHeatmap = mvp_intToBool(0);
    }

    //aws
    $useAws = 'false';
    $awsSourcePath = '';
    $useAwsAddonSrc = '';
    if(defined('MVP_AWS') && defined('MVP_AWS_PLUGINS_URL')){
        $useAws = 'true';
        $useAwsAddonSrc = MVP_AWS_PLUGINS_URL.'js/aws.js';
        $awsSourcePath = MVP_AWS_PLUGINS_URL;
    }

    
    

  


    $mediaId = '';//link directly to video
    if(isset($options["mediaId"]))$mediaId = $options["mediaId"];


    $useStatistics = 'false';
    if(defined('MVP_STAT')){
        $useStatistics = mvp_intToBool($options["useStatistics"]);
    }



    //player custom icons
    $buttonsTop = [];
    $buttonsBottom = [];
    if(isset($options['pi_icons'])){
        foreach($options['pi_icons'] as $icon){
            if($icon['position'] == 'top'){
                $buttonsTop[] = $icon;
            }elseif($icon['position'] == 'bottom'){
                $buttonsBottom[] = $icon;
            }
        }
    }


    

    $current_user_roles = mvp_get_current_user_roles();

    $upload_dir = str_replace('\\', '/', MVP_FILE_DIR);

    $slim = get_option( 'apenv_key_'.MVP_ID);

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

        var settings = {
            plugin_version: '.MVP_PLUGIN_VERSION.',
            ajax_url: "'.admin_url( 'admin-ajax.php').'",
            wpEmbedUrl:"'.plugins_url('/apmvp/').'",
            playerId: '.$embed_player_id.',
            restrictDownloadForLoggedInUser: '.mvp_intToBool($options["restrictDownloadForLoggedInUser"]).',
            downloadVideoUserRoles: "'.(is_array($options['downloadVideoUserRoles']) ? implode(",", $options['downloadVideoUserRoles']) : $options['downloadVideoUserRoles']).'",
            isUserLoggedIn: '.mvp_intToBool(is_user_logged_in()).',
            wp_login_url: "'.wp_login_url(get_permalink()).'",
            currentUserRoles: "'.(is_array($current_user_roles) ? implode(",", $current_user_roles) : $current_user_roles).'",

            showInlineAdsNonLoggedInUser: '.mvp_intToBool($options["showInlineAdsNonLoggedInUser"]).',
            showInlineAdsUserRoles: "'.(is_array($options['showInlineAdsUserRoles']) ? implode(",", $options['showInlineAdsUserRoles']) : $options['showInlineAdsUserRoles']).'",
            inlineAdsCountdown: "'.$options["inlineAdsCountdown"].'",
            inlineAdsOccurence: "'.$options["inlineAdsOccurence"].'",
            inlineAdsContinueInText: "'.$options["inlineAdsContinueInText"].'",
            inlineAdsUpgradeText: "'.$options["inlineAdsUpgradeText"].'",

            comingNextHeader: "'.$options["comingNextHeader"].'",
            comingNextCancelBtnText: "'.$options["comingNextCancelBtnText"].'",
            comingnextTime: "'.$options["comingnextTime"].'",

            playerClass: "'.$options["playerClass"].'",
            instanceName: "'.$instance.'",
            awsSourcePath: "'.$awsSourcePath.'",
            useAwsAddonSrc: "'.$useAwsAddonSrc.'",
            upload_dir: "'.$upload_dir.'",
            sourcePath: "'.MVP_PLUGINS_URL.'",
            ajax_url: "'.admin_url( 'admin-ajax.php').'",
            playlistList:".mvp-playlist-list-'.$instance_id.'",
            activePlaylist: "'.$activePlaylist.'",
            usePlayer: '.mvp_intToBool($options["usePlayer"]).',
            vrInfo:"'.$options["vrInfo"].'",
            autoRotatePanorama: '.mvp_intToBool($options["autoRotatePanorama"]).',
            autoRotateSpeed: "'.$options["autoRotateSpeed"].'",
            activeItem: '.$options["activeItem"].',
            showAds: '.mvp_intToBool($options["showAds"]).',
            volume: '.$options["volume"].',
            autoPlay: '.mvp_intToBool($options["autoPlay"]).',
            documentFullsceen: '.mvp_intToBool($options["documentFullsceen"]).',
            autoPlayAfterFirst: '.mvp_intToBool($options["autoPlayAfterFirst"]).',
            autoPlayInViewport: '.mvp_intToBool($options["autoPlayInViewport"]).',
            preload: "'.$options["preload"].'",
            preservePlaybackRate: '.mvp_intToBool($options["preservePlaybackRate"]).',
            crossorigin: "'.$options["crossorigin"].'",
            disableRemotePlayback: '.mvp_intToBool($options["disableRemotePlayback"]).',
            streamCamera: '.mvp_intToBool($options["streamCamera"]).',
            autoStartStream: '.mvp_intToBool($options["autoStartStream"]).',
            randomPlay: '.mvp_intToBool($options["randomPlay"]).',
            loopingOn: '.mvp_intToBool($options["loopingOn"]).',
            mediaEndAction: "'.$options["mediaEndAction"].'",
            textTrackStyle: '.json_encode($textTrackStyle).',
            buttonsTop: '.json_encode($buttonsTop).',
            buttonsBottom: '.json_encode($buttonsBottom).',
            aspectRatio: '.$options["aspectRatio"].',
            hasSchedule: '.mvp_intToBool($options["hasSchedule"]).',
            isSchedule: '.mvp_intToBool($options["isSchedule"]).',
            scheduleData: '.json_encode($options["scheduleData"]).',
            scheduleTimeData: '.json_encode($options["scheduleTimeData"]).',
            activateWhenParentVisible: '.mvp_intToBool($options["activateWhenParentVisible"]).',
            youtubeAppId: "'.$options["youtube_id"].'",
            gDriveAppId: "'.$options["gdrive_app_id"].'",
            facebookAppId: "'.$options["facebook_id"].'",
            autoResumeAfterAdd:"'.$options["autoResumeAfterAdd"].'",
            useSingleVideoEmbed: '.mvp_intToBool($options["useSingleVideoEmbed"]).',
            hideEmbedFunctionWhenEmbeded: '.mvp_intToBool($options["hideEmbedFunctionWhenEmbeded"]).',
            vimeoNoCookie: '.mvp_intToBool($options["vimeo_no_cookie"]).',
            togglePlaybackOnMultipleInstances: '.mvp_intToBool($options["togglePlaybackOnMultipleInstances"]).',
            youtubePlayerColor: "'.$options["youtubePlayerColor"].'",
            vimeoPlayerColor: "'.$options["vimeoPlayerColor"].'",
			playlistOpened: '.mvp_intToBool($options["playlistOpened"]).',
            showVideoTitle: '.mvp_intToBool($options["showVideoTitle"]).',
            blockYoutubeEvents: '.mvp_intToBool($options["blockYoutubeEvents"]).',
            hideShortsFromShowing: "'.$options["hideShortsFromShowing"].'",
            forceYtChromeless: '.mvp_intToBool($options["forceYtChromeless"]).',
            playlistScrollType: "'.$options['playlistScrollType'].'",
            rightClickContextMenu: "'.$options["rightClickContextMenu"].'",
            customContextMenuLink: "'.$options["customContextMenuLink"].'",
            customContextMenuLinkTarget: "'.$options["customContextMenuLinkTarget"].'",
            customContextMenuLinkTitle: "'.$options["customContextMenuLinkTitle"].'",
            hidePlaylistOnFullscreenEnter: '.mvp_intToBool($options["hidePlaylistOnFullscreenEnter"]).',
            openFsOnPlay: '.mvp_intToBool($options["openFsOnPlay"]).',
            hideQualityMenuOnSingleQuality: '.mvp_intToBool($options["hideQualityMenuOnSingleQuality"]).',
            useKeyboardNavigationForPlayback: '.mvp_intToBool($options["useKeyboardNavigationForPlayback"]).',
            useGlobalKeyboardControls: '.mvp_intToBool($options["useGlobalKeyboardControls"]).',
            createKeyboardInfo: '.mvp_intToBool($options["createKeyboardInfo"]).',
            modifierKey: "'.$options["modifierKey"].'",
            keyboardControls: '.json_encode($options["keyboardControls"], JSON_HEX_TAG).',
            clickOnBackgroundClosesLightbox: '.mvp_intToBool($options["clickOnBackgroundClosesLightbox"]).',
            playerRatio: '.$options["playerRatio"].',
            combinePlayerRatio: '.mvp_intToBool($options["combinePlayerRatio"]).',
            makePlaylistSelector: '.mvp_intToBool($options["makePlaylistSelector"]).',
            autoOpenPlaylistSelector: '.mvp_intToBool($options["autoOpenPlaylistSelector"]).',
            autoAdvanceToNextPlaylist: '.mvp_intToBool($options["autoAdvanceToNextPlaylist"]).',
            destroyPlaylistOnLightboxClose: '.mvp_intToBool($options["destroyPlaylistOnLightboxClose"]).',
            showPosterOnPause: '.mvp_intToBool($options["showPosterOnPause"]).',
            useLoadMoreBtn: '.mvp_intToBool($options["useLoadMoreBtn"]).',
            adUpcomingMsgTime: "'.$options["adUpcomingMsgTime"].'",
            playlistBottomHeight: '.$options["playlistBottomHeight"].',
            youtubePlayerType: "'.$options["youtubePlayerType"].'",
            vimeoPlayerType: "'.$options["vimeoPlayerType"].'",
            useAddToFavoritesToContextMenu: '.mvp_intToBool($options["useAddToFavoritesToContextMenu"]).',
            useAddToFavoritesToPlaylistItemMenu: '.mvp_intToBool($options["useAddToFavoritesToPlaylistItemMenu"]).',
            showFavIndicator: '.mvp_intToBool($options["showFavIndicator"]).',
            addToFavoritesText: "'.$options["addToFavoritesText"].'",
            removeFromFavoritesText: "'.$options["removeFromFavoritesText"].'",
            breakPointArr: '.$breakPointArr.',
            caption_breakPointArr: '.$caption_breakPointArr.',
            showAdUpcomingMsg: '.mvp_intToBool($options["showAdUpcomingMsg"]).',
            adUpcomingMsgText: "'.$options["adUpcomingMsgText"].'",
            useAdSeekbar: '.mvp_intToBool($options["useAdSeekbar"]).',
            useAdControls: '.mvp_intToBool($options["useAdControls"]).',
            autoLoadTranscript: '.mvp_intToBool($options["autoLoadTranscript"]).',
            pauseVideoOnDialogOpen: '.mvp_intToBool($options["pauseVideoOnDialogOpen"]).',
            playlistItemContent: "'.(is_array($options['playlistItemContent']) ? implode(",", $options['playlistItemContent']) : $options['playlistItemContent']).'",
            formatDateFromNow: '.mvp_intToBool($options["formatDateFromNow"]).',
            locale: "'.$options["locale"].'",
            playCountText: "'.$options["playCountText"].'",
            cors: "'.$options["cors"].'",
            gridType: "'.$options["gridType"].'",
            slim: '.json_encode($slim, JSON_HEX_TAG).',
            useGa: '.mvp_intToBool($options["useGa"]).',
            ageVerifyExpireTime: "'.$options["ageVerifyExpireTime"].'",
            gaTrackingId: "'.$options["gaTrackingId"].'",
            verticalBottomSepearator: "'.$options["verticalBottomSepearator"].'",
            mobileSeekbarMinWidth: "'.$options["mobileSeekbarMinWidth"].'",
            mobileControlsTopMinWidth: "'.$options["mobileControlsTopMinWidth"].'",
            elementsVisibilityArr: '.$elementsVisibilityArr.',
            playAdsOnlyOnce: '.mvp_intToBool($options["playAdsOnlyOnce"]).',
            showAnnotationsOnlyOnce: '.mvp_intToBool($options["showAnnotationsOnlyOnce"]).',
            hideAnnotationOnMobile: '.mvp_intToBool($options["hideAnnotationOnMobile"]).',
            resumeMediaAfterPopupClose: '.mvp_intToBool($options["resumeMediaAfterPopupClose"]).',
            useGlobalPopupCloseBtn: '.mvp_intToBool($options["useGlobalPopupCloseBtn"]).',
            showPopupsOnlyOnce: '.mvp_intToBool($options["showPopupsOnlyOnce"]).',
            randomizePausePopups: '.mvp_intToBool($options["randomizePausePopups"]).',
            hidePopupsOnMobile: '.mvp_intToBool($options["hidePopupsOnMobile"]).',
            rememberPlaybackPosition: "'.$options["rememberPlaybackPosition"].'",
            playbackPositionKey: "'.$options["playbackPositionKey"].'",
            useMobileNativePlayer: '.mvp_intToBool($options["useMobileNativePlayer"]).',
            rememberVideoQuality: '.mvp_intToBool($options["rememberVideoQuality"]).',
            vai:{vk:"'.base64_encode($options["vimeo_key"]).'",vs:"'.base64_encode($options["vimeo_secret"]).'",vt:"'.base64_encode($options["vimeo_token"]).'"},
            useSwipeNavigation: '.mvp_intToBool($options["useSwipeNavigation"]).',
            swipeAction: "'.$options["swipeAction"].'",
            swipeTolerance: "'.$options["swipeTolerance"].'",
            limitDescriptionText: '.$options["limitDescriptionText"].',
            convertUrlToLinksInDesc: '.mvp_intToBool($options["convertUrlToLinksInDesc"]).',
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
            requireSubtitlesFromFolder: '.mvp_intToBool($options["requireSubtitlesFromFolder"]).',
            youtubeThumbSize: "'.$options["youtubeThumbSize"].'",
            vimeoThumbSize: "'.$options["vimeoThumbSize"].'",
            displayWatchedPercentage: '.mvp_intToBool($options["displayWatchedPercentage"]).',
            useAudioEqualizer: '.mvp_intToBool($options["useAudioEqualizer"]).',
            useAirPlay: '.mvp_intToBool($options["useAirPlay"]).',
            theaterElement: "'.$options["theaterElement"].'",
            theaterElementClass: "'.$options["theaterElementClass"].'",
            saveCache:'.time().',
            syncTranscriptWithSubs: '.mvp_intToBool($options["syncTranscriptWithSubs"]).',
            useMobileListMenu: '.mvp_intToBool($options["useMobileListMenu"]).',
            useMobileChapterMenu: '.mvp_intToBool($options["useMobileChapterMenu"]).',
            focusVideoInTheater: '.mvp_intToBool($options["focusVideoInTheater"]).',
            hidePlaylistOnMinimize: '.mvp_intToBool($options["hidePlaylistOnMinimize"]).',
            useMinimizeCloseBtn: '.mvp_intToBool($options["useMinimizeCloseBtn"]).',
            rememeberCaptionState: '.mvp_intToBool($options["rememeberCaptionState"]).',
            keepCaptionFontSizeAfterManualResize: '.mvp_intToBool($options["keepCaptionFontSizeAfterManualResize"]).',
            autoAdvanceToNextMediaOnError: '.mvp_intToBool($options["autoAdvanceToNextMediaOnError"]).',
            wrapperMaxWidth: "'.$options["wrapperMaxWidth"].'",
            playlistSideWidth: "'.$options["playlistSideWidth"].'",
            useSortButtons: '.mvp_intToBool($options["useSortButtons"]).',   
            sortButtonsAlign: "'.$options["sortButtonsAlign"].'",
            defaultSort: "'.$options["defaultSort"].'",
            sortNewestText: "'.$options["sortNewestText"].'",
            sortOldestText: "'.$options["sortOldestText"].'",
            sortPopularText: "'.$options["sortPopularText"].'",
            useUnmuteBtn: '.mvp_intToBool($options["useUnmuteBtn"]).',
            unmuteBtnText: "'.$options["unmuteBtnText"].'",
            useBigPlay: '.mvp_intToBool($options["useBigPlay"]).',
            bigPlayImgSrc: "'.$options["bigPlayImgSrc"].'",
            bigPlayImgW: "'.$options["bigPlayImgW"].'",
            bigPlayImgH: "'.$options["bigPlayImgH"].'",
            useSeekbar: '.mvp_intToBool($options["useSeekbar"]).',
            useSoloSeekbar: '.mvp_intToBool($options["useSoloSeekbar"]).',
            useInfo: '.mvp_intToBool($options["useInfo"]).',
            useFullscreen: '.mvp_intToBool($options["useFullscreen"]).',
            useTime: '.mvp_intToBool($options["useTime"]).',
            usePip: '.mvp_intToBool($options["usePip"]).',
            useCc: '.mvp_intToBool($options["useCc"]).',
            useAirPlay: '.mvp_intToBool($options["useAirPlay"]).',
            usePlaybackRate: '.mvp_intToBool($options["usePlaybackRate"]).',
            useQuality: '.mvp_intToBool($options["useQuality"]).',
            useSubtitle: '.mvp_intToBool($options["useSubtitle"]).',
            useTranscript: '.mvp_intToBool($options["useTranscript"]).',
            useChapterToggle: '.mvp_intToBool($options["useChapterToggle"]).',
            useCasting: '.mvp_intToBool($options["useCasting"]).',
            useVolume: '.mvp_intToBool($options["useVolume"]).',
            usePlay: '.mvp_intToBool($options["usePlay"]).',
            useNext: '.mvp_intToBool($options["useNext"]).',
            usePrevious: '.mvp_intToBool($options["usePrevious"]).',
            useRewind: '.mvp_intToBool($options["useRewind"]).',
            useSkipBackward: '.mvp_intToBool($options["useSkipBackward"]).',
            useSkipForward: '.mvp_intToBool($options["useSkipForward"]).',
            useDownload: '.mvp_intToBool($options["useDownload"]).',
            usePlaylistToggle: '.mvp_intToBool($options["usePlaylistToggle"]).',
            useTheaterMode: '.mvp_intToBool($options["useTheaterMode"]).',
            useEmbed: '.mvp_intToBool($options["useEmbed"]).',

            useNativeShare: '.mvp_intToBool($options["useNativeShare"]).',
            nativeShareMedia: '.mvp_intToBool($options["nativeShareMedia"]).',
            useShare: '.mvp_intToBool($options["useShare"]).',
            useShareFacebook: '.mvp_intToBool($options["useShareFacebook"]).',
            useShareTwitter: '.mvp_intToBool($options["useShareTwitter"]).',
            useShareTumblr: '.mvp_intToBool($options["useShareTumblr"]).',
            useShareWhatsApp: '.mvp_intToBool($options["useShareWhatsApp"]).',
            useShareReddit: '.mvp_intToBool($options["useShareReddit"]).',
            useShareDigg: '.mvp_intToBool($options["useShareDigg"]).',
            useShareLinkedIn: '.mvp_intToBool($options["useShareLinkedIn"]).',
            useSharePinterest: '.mvp_intToBool($options["useSharePinterest"]).',

            tooltipTumblr: "'.$options["tooltipTumblr"].'",
            tooltipTwitter: "'.$options["tooltipTwitter"].'",
            tooltipFacebook: "'.$options["tooltipFacebook"].'",
            tooltipWhatsApp: "'.$options["tooltipWhatsApp"].'",
            tooltipReddit: "'.$options["tooltipReddit"].'",
            tooltipDigg: "'.$options["tooltipDigg"].'",
            tooltipLinkedIn: "'.$options["tooltipLinkedIn"].'",
            tooltipPinterest: "'.$options["tooltipPinterest"].'",
            tooltipEmail: "'.$options["tooltipEmail"].'",
            tooltipSms: "'.$options["tooltipSms"].'",
            tooltipShare: "'.$options["tooltipShare"].'",
            tooltipRepeat: "'.$options["tooltipRepeat"].'",
            tooltipClose: "'.$options["tooltipClose"].'",
            embedVideoText: "'.$options["embedVideoText"].'",
            copyVideoLinkText: "'.$options["copyVideoLinkText"].'",
            copyEmbedCodeBtnText: "'.$options["copyEmbedCodeBtnText"].'",
            copiedEmbedCodeBtnText: "'.$options["copiedEmbedCodeBtnText"].'",
            tooltipEmbed: "'.$options["tooltipEmbed"].'",

            ageVerifyHeader: "'.$options["ageVerifyHeader"].'",
            ageVerifyText: "'.$options["ageVerifyText"].'",
            ageVerifyEnterText: "'.$options["ageVerifyEnterText"].'",
            ageVerifyDividerText: "'.$options["ageVerifyDividerText"].'",
            ageVerifyExitText: "'.$options["ageVerifyExitText"].'",

            ofText: "'.$options["ofText"].'",
            tooltipSeek: "'.$options["tooltipSeek"].'",
            tooltipInfo: "'.$options["tooltipInfo"].'",
            tooltipQuality: "'.$options["tooltipQuality"].'",
            tooltipPlaybackRate: "'.$options["tooltipPlaybackRate"].'",
            tooltipSubtitles: "'.$options["tooltipSubtitles"].'",
            tooltipPlay: "'.$options["tooltipPlay"].'",
            tooltipPause: "'.$options["tooltipPause"].'",
            tooltipPrevious: "'.$options["tooltipPrevious"].'",
            tooltipNext: "'.$options["tooltipNext"].'",
            tooltipRewind: "'.$options["tooltipRewind"].'",
            tooltipSkipBackward: "'.$options["tooltipSkipBackward"].'",
            tooltipSkipForward: "'.$options["tooltipSkipForward"].'",
            tooltipPip: "'.$options["tooltipPip"].'",
            tooltipCc: "'.$options["tooltipCc"].'",
            tooltipAirPlay: "'.$options["tooltipAirPlay"].'",
            tooltipVr: "'.$options["tooltipVr"].'",
            tooltipVolume: "'.$options["tooltipVolume"].'",
            tooltipMute: "'.$options["tooltipMute"].'",
            tooltipDownload: "'.$options["tooltipDownload"].'",
            tooltipSettings: "'.$options["tooltipSettings"].'",
            tooltipFullscreenEnter: "'.$options["tooltipFullscreenEnter"].'",
            tooltipFullscreenExit: "'.$options["tooltipFullscreenExit"].'",
            tooltipAudioLanguage: "'.$options["tooltipAudioLanguage"].'",
            tooltipPlaylistToggle: "'.$options["tooltipPlaylistToggle"].'",
            tooltipTheaterMode: "'.$options["tooltipTheaterMode"].'",
            castConnectingMsg: "'.$options["castConnectingMsg"].'",
            tooltipPlayOnTv: "'.$options["tooltipPlayOnTv"].'",
            tooltipStopPlayingOnTv: "'.$options["tooltipStopPlayingOnTv"].'",
            tooltipLightboxPrevious: "'.$options["tooltipLightboxPrevious"].'",
            tooltipLightboxNext: "'.$options["tooltipLightboxNext"].'",
            chaptersMenuHeader: "'.$options["chaptersMenuHeader"].'",
            searchChaptersText: "'.$options["searchChaptersText"].'",
            tooltipPrevChapter: "'.$options["tooltipPrevChapter"].'",
            tooltipNextChapter: "'.$options["tooltipNextChapter"].'",
            tooltipChaptersMenu: "'.$options["tooltipChaptersMenu"].'",
            subtitleOffText: "'.$options["subtitleOffText"].'",
            privateContentTitle: "'.$options["privateContentTitle"].'",
            privateContentConfirm: "'.$options["privateContentConfirm"].'",
            privateContentInfo: "'.$options["privateContentInfo"].'",
            privateContentPasswordError: "'.$options["privateContentPasswordError"].'",
            customContextCopyVideoUrlText: "'.$options["customContextCopyVideoUrlText"].'",
            loadMoreBtnText: "'.$options["loadMoreBtnText"].'",
            upNextText: "'.$options["upNextText"].'",
            upNextPreviousText: "'.$options["upNextPreviousText"].'",
            adTitleText: "'.$options["adTitleText"].'",
            adSkipWaitText: "'.$options["adSkipWaitText"].'",
            adSkipReadyText: "'.$options["adSkipReadyText"].'",
            searchText: "'.$options["searchText"].'",
            showSearchField: '.mvp_intToBool($options["showSearchField"]).',
            searchNothingFoundMsg: "'.$options["searchNothingFoundMsg"].'",
            liveStreamText: "'.$options["liveStreamText"].'",
            upcomingLiveStreamText: "'.$options["upcomingLiveStreamText"].'",

            searchTranscriptText: "'.$options["searchTranscriptText"].'",
            tooltipTranscript: "'.$options["tooltipTranscript"].'",

            paginationPreviousBtnTitle: "'.$options["paginationPreviousBtnTitle"].'",
            paginationPreviousBtnText: "'.$options["paginationPreviousBtnText"].'",
            paginationNextBtnTitle: "'.$options["paginationNextBtnTitle"].'",
            paginationNextBtnText: "'.$options["paginationNextBtnText"].'",

            displayPosterOnMobile: '.mvp_intToBool($options["displayPosterOnMobile"]).',
            skin: "'.$options["preset"].'",
            slideshowDuration: "'.$options["slideshowDuration"].'",
            slideshowRandom: '.mvp_intToBool($options["slideshowRandom"]).',
            slideshowPauseWithAudio: '.mvp_intToBool($options["slideshowPauseWithAudio"]).',
            playlistPosition: "'.$options["playlistPosition"].'",
            playlistStyle: "'.$options["playlistStyle"].'",
            playerShadow: "'.$options["playerShadow"].'",
            playerTransition: "'.$options["playerTransition"].'",
            playerType: "'.$options["playerType"].'",
            useLightboxAdvanceButtons: '.mvp_intToBool($options["useLightboxAdvanceButtons"]).',
            selectorInit: '.mvp_intToBool($options["selectorInit"]).',
            disableVideoSkip: '.mvp_intToBool($options["disableVideoSkip"]).',
            disableSeekbar: '.mvp_intToBool($options["disableSeekbar"]).',
            disableSeekingPastWatchedPoint: '.mvp_intToBool($options["disableSeekingPastWatchedPoint"]).',
            showPrevNextVideoThumb: '.mvp_intToBool($options["showPrevNextVideoThumb"]).',
            upNextTime: "'.$options["upNextTime"].'",
            useStatistics: '.$useStatistics.', 
            useBlob: '.mvp_intToBool($options["useBlob"]).',
            showControlsBeforeStart: '.mvp_intToBool($options["showControlsBeforeStart"]).',
            useVideoTransform: '.mvp_intToBool($options["useVideoTransform"]).',
            saveTransformState: '.mvp_intToBool($options["saveTransformState"]).',
            tooltipZoomCenter: "'.$options["tooltipZoomCenter"].'",
            tooltipZoomReset: "'.$options["tooltipZoomReset"].'",
            settingsMenuZoomText: "'.$options["settingsMenuZoomText"].'",
            maxZoom: "'.$options["maxZoom"].'",
            offlineImage: "'.$options["offlineImage"].'",
            offlineImageUrl: "'.$options["offlineImageUrl"].'",
            offlineImageUrlTarget: "'.$options["offlineImageUrlTarget"].'",
            mediaEndActionCustom: "'.trim($media_end_action_html).'",
            mediaEndImage: "'.$options["mediaEndImage"].'",
            mediaEndImageUrl: "'.$options["mediaEndImageUrl"].'",
            mediaEndImageUrlTarget: "'.$options["mediaEndImageUrlTarget"].'",
            useBlob: '.mvp_intToBool($options["useBlob"]).',
            cueMakeMarkers: '.mvp_intToBool($options["cueMakeMarkers"]).',
            executeCueOnlyOnce: '.mvp_intToBool($options["executeCueOnlyOnce"]).',

            useAws: '.$useAws.',
            s3UrlExpireTime: "'.$options["s3UrlExpireTime"].'",
            s3Region: "'.$options["s3Region"].'",
            s3ThumbExtension: "'.$options["s3ThumbExtension"].'",
            getPosterFromBucket: '.mvp_intToBool($options["getPosterFromBucket"]).',
            getThumbFromBucket: '.mvp_intToBool($options["getThumbFromBucket"]).',
            getSubsFromBucket: '.mvp_intToBool($options["getSubsFromBucket"]).',
            s3:{s3k:"'.base64_encode($options["s3k"]).'",s3s:"'.base64_encode($options["s3s"]).'",s3_du:"'.base64_encode($options["s3_du"]).'",s3_kpid:"'.base64_encode($options["s3_kpid"]).'"},
            cf_expire: "'.$options["cf_expire"].'",
            useCloudfront: '.mvp_intToBool($options["useCloudfront"]).',

            trackVideoHeatmap: '.$trackVideoHeatmap.',
            showVideoHeatmap: '.$showVideoHeatmap.',
            heatmapColor: "'.$options["heatmapColor"].'",
            heatmapHeight: "'.$options["heatmapHeight"].'",

            keyboardInfoText: "'.$options["keyboardInfoText"].'",
            keyboardPreferencesText: "'.$options["keyboardPreferencesText"].'",

            useMobileCompactPlaylist: '.mvp_intToBool($options["useMobileCompactPlaylist"]).',

            //translation
            resumeScreenHeader: "'.$options["resumeScreenHeader"].'",
            resumeScreenContinue: "'.$options["resumeScreenContinue"].'",
            resumeScreenRestart: "'.$options["resumeScreenRestart"].'",

            restrictHeaderTitle: "'.$options["restrictHeaderTitle"].'",
            restrictDownloadForLoggedInUserMsg: "'.$options["restrictDownloadForLoggedInUserMsg"].'",
            restrictLoginBtnText: "'.$options["restrictLoginBtnText"].'",
            restrictLoginCancelBtnText: "'.$options["restrictLoginCancelBtnText"].'",
            restrictForUserRoleBtnText: "'.$options["restrictForUserRoleBtnText"].'",
            restrictForUserRoleMsg: "'.$options["restrictForUserRoleMsg"].'",
            restrictWatchForLoggedInUserMsg: "'.$options["restrictWatchForLoggedInUserMsg"].'",
            restrictDownloadUrl: "'.$options["restrictDownloadUrl"].'",
            restrictDownloadUrlTarget: "'.$options["restrictDownloadUrlTarget"].'",
            restrictWatchUrl: "'.$options["restrictWatchUrl"].'",
            restrictWatchUrlTarget: "'.$options["restrictWatchUrlTarget"].'",

            logoPath: "'.$options["logoPath"].'",
            logoUrl: "'.$options["logoUrl"].'",
            logoTarget: "'.$options["logoTarget"].'",
            logoRel: "'.$options["logoRel"].'",

            usePlayerLoader: '.mvp_intToBool($options["usePlayerLoader"]).',
            playerLoaderImgSrc: "'.$options["playerLoaderImgSrc"].'",
            playerLoaderImgW: "'.$options["playerLoaderImgW"].'",
            playerLoaderImgH: "'.$options["playerLoaderImgH"].'",
               
            //icons player

            closeIcon: "'.str_replace('"', "'", $options["closeIcon"]).'",
            dotsIcon: "'.str_replace('"', "'", $options["dotsIcon"]).'",
            zoomCenterIcon: "'.str_replace('"', "'", $options["zoomCenterIcon"]).'",
            zoomResetIcon: "'.str_replace('"', "'", $options["zoomResetIcon"]).'",
            unmuteIcon: "'.str_replace('"', "'", $options["unmuteIcon"]).'",
            shareTumblrIcon: "'.str_replace('"', "'", $options["shareTumblrIcon"]).'",
            shareTwitterIcon: "'.str_replace('"', "'", $options["shareTwitterIcon"]).'",
            shareFacebookIcon: "'.str_replace('"', "'", $options["shareFacebookIcon"]).'",
            shareWhatsAppIcon: "'.str_replace('"', "'", $options["shareWhatsAppIcon"]).'",
            shareLinkedInIcon: "'.str_replace('"', "'", $options["shareLinkedInIcon"]).'",
            shareRedditIcon: "'.str_replace('"', "'", $options["shareRedditIcon"]).'",
            shareDiggIcon: "'.str_replace('"', "'", $options["shareDiggIcon"]).'",
            sharePinterestIcon: "'.str_replace('"', "'", $options["sharePinterestIcon"]).'",
            shareEmailIcon: "'.str_replace('"', "'", $options["shareEmailIcon"]).'",
            shareSmsIcon: "'.str_replace('"', "'", $options["shareSmsIcon"]).'",
            comingNextIcon: "'.str_replace('"', "'", $options["comingNextIcon"]).'",
            upcomingLiveStreamIcon: "'.str_replace('"', "'", $options["upcomingLiveStreamIcon"]).'",
            relCloseIcon: "'.str_replace('"', "'", $options["relCloseIcon"]).'",
            relPrevIcon: "'.str_replace('"', "'", $options["relPrevIcon"]).'",
            relNextIcon: "'.str_replace('"', "'", $options["relNextIcon"]).'",
            annotationCloseIcon: "'.str_replace('"', "'", $options["annotationCloseIcon"]).'",
            lightboxCloseIcon: "'.str_replace('"', "'", $options["lightboxCloseIcon"]).'",
            lightboxPreviousIcon: "'.str_replace('"', "'", $options["lightboxPreviousIcon"]).'",
            lightboxNextIcon: "'.str_replace('"', "'", $options["lightboxNextIcon"]).'",
            minimizeCloseIcon: "'.str_replace('"', "'", $options["minimizeCloseIcon"]).'",

            kb_closeDialog: "'.$options["kb_closeDialog"].'",
            kb_seekBackward: "'.$options["kb_seekBackward"].'",
            kb_seekForward: "'.$options["kb_seekForward"].'",
            kb_togglePlayback: "'.$options["kb_togglePlayback"].'",
            kb_volumeUp: "'.$options["kb_volumeUp"].'",
            kb_volumeDown: "'.$options["kb_volumeDown"].'",
            kb_toggleMute: "'.$options["kb_toggleMute"].'",
            kb_nextMedia: "'.$options["kb_nextMedia"].'",
            kb_previousMedia: "'.$options["kb_previousMedia"].'",
            kb_rewind: "'.$options["kb_rewind"].'",
            kb_toggleFullscreen: "'.$options["kb_toggleFullscreen"].'",
            kb_toggleTheater: "'.$options["kb_toggleTheater"].'",
            kb_toggleSubtitle: "'.$options["kb_toggleSubtitle"].'",
            kb_subtitleSizeUp: "'.$options["kb_subtitleSizeUp"].'",
            kb_subtitleSizeDown: "'.$options["kb_subtitleSizeDown"].'",

            //playlist

            playlistSelectorLangToggleIcon: "'.str_replace('"', "'", $options["playlistSelectorLangToggleIcon"]).'",
            starIcon: "'.str_replace('"', "'", $options["starIcon"]).'",

            //icons controls

            volumeUpIcon: "'.str_replace('"', "'", $options["volumeUpIcon"]).'",
            volumeDownIcon: "'.str_replace('"', "'", $options["volumeDownIcon"]).'",
            volumeOffIcon: "'.str_replace('"', "'", $options["volumeOffIcon"]).'",
            fullscreenEnterIcon: "'.str_replace('"', "'", $options["fullscreenEnterIcon"]).'",
            fullscreenExitIcon: "'.str_replace('"', "'", $options["fullscreenExitIcon"]).'",
            playlistToggleIcon: "'.str_replace('"', "'", $options["playlistToggleIcon"]).'",
            videoInfoIcon: "'.str_replace('"', "'", $options["videoInfoIcon"]).'",
            shareToggleIcon: "'.str_replace('"', "'", $options["shareToggleIcon"]).'",
            embedToggleIcon: "'.str_replace('"', "'", $options["embedToggleIcon"]).'",
            downloadIcon: "'.str_replace('"', "'", $options["downloadIcon"]).'",
            pipIcon: "'.str_replace('"', "'", $options["pipIcon"]).'",
            prevVideoIcon: "'.str_replace('"', "'", $options["prevVideoIcon"]).'",
            nextVideoIcon: "'.str_replace('"', "'", $options["nextVideoIcon"]).'",
            playIcon: "'.str_replace('"', "'", $options["playIcon"]).'",
            pauseIcon: "'.str_replace('"', "'", $options["pauseIcon"]).'",
            rewindIcon: "'.str_replace('"', "'", $options["rewindIcon"]).'",
            skipBackwardIcon: "'.str_replace('"', "'", $options["skipBackwardIcon"]).'",
            skipForwardIcon: "'.str_replace('"', "'", $options["skipForwardIcon"]).'",
            vrIcon: "'.str_replace('"', "'", $options["vrIcon"]).'",
            ccToggleIcon: "'.str_replace('"', "'", $options["ccToggleIcon"]).'",
            transcriptIcon: "'.str_replace('"', "'", $options["transcriptIcon"]).'",
            settingsMenuIcon: "'.str_replace('"', "'", $options["settingsMenuIcon"]).'",
            prevChapterIcon: "'.str_replace('"', "'", $options["prevChapterIcon"]).'",
            nextChapterIcon: "'.str_replace('"', "'", $options["nextChapterIcon"]).'",
            chapterToggleIcon: "'.str_replace('"', "'", $options["chapterToggleIcon"]).'",
            chapterRepeatIcon: "'.str_replace('"', "'", $options["chapterRepeatIcon"]).'",
            chapterShareIcon: "'.str_replace('"', "'", $options["chapterShareIcon"]).'",
            theaterToggleIcon: "'.str_replace('"', "'", $options["theaterToggleIcon"]).'",
            castOffIcon: "'.str_replace('"', "'", $options["castOffIcon"]).'",
            castOnIcon: "'.str_replace('"', "'", $options["castOnIcon"]).'",
            airplayIcon: "'.str_replace('"', "'", $options["airplayIcon"]).'",
            bigPlayIcon: "'.str_replace('"', "'", $options["bigPlayIcon"]).'",

            hlsConfig:"'.$hlsConfig.'",
            dashConfig:"'.$dashConfig.'",
            mediaId:"'.$mediaId.'",

        }'."\n";

        if($options["selectorInit"]){

            $markup .= 'if(document.querySelector("'.$options["selectorInit"].'"))document.querySelector("'.$options["selectorInit"].'").addEventListener("click",  function(e){

                var id = e.currentTarget.getAttribute("data-media-id");

                if(!window.'.$instance.'){
                    settings.mediaId = id;
                    settings.selectorInit = true;//try to autoplay with sound
                    window.'.$instance.' = new mvp(document.getElementById("'.$wrapper_id.'"), settings);//init player first time
                }else{';
                    if($options["playerType"] == "lightbox"){
                        $markup .= 'window.'.$instance.'.openLightbox(id)';//reopen lightbox 
                    }
                $markup .= '}   

                return false;
            })';

        }else{
            $markup .= 'window.'.$instance.' = new mvp(document.getElementById("'.$wrapper_id.'"), settings)';
        }

        //custom js
        if(!mvp_nullOrEmpty($custom_js))$markup .= $custom_js; 

	$markup .= '};</script>'."\n";

    return $markup;

}

function mvp_get_playlist($pids, $instance_id, $atts, $options, $ad_data, $annotation_data) {

	global $wpdb;
	$playlist_table = $wpdb->prefix . "mvp_playlists";
	$media_table = $wpdb->prefix . "mvp_media";
    $favorites_table = $wpdb->prefix . "mvp_favorites";
    $statistics_table = $wpdb->prefix . "mvp_statistics";


    $playlists_to_display = array();
    $has_rel = false;



    if(isset($atts['single_video'])){
        //get only single video from playlist

        $options['makePlaylistSelector'] = false;

        $playlists_to_display[] = $atts['playlist_id'];  

    }else{

        if($options['makePlaylistSelector']){
            $playlistSelectorSelected = explode(',', $options['playlistSelectorSelected']);

            foreach($playlistSelectorSelected as $pss){
                if(!empty($pss)){//if no playlists were selected for playlist selector
                    $playlists_to_display[] = $pss;
                }
            }

            //check if active playlist is included in selector
            foreach($pids as $pid){
                if(!in_array($pid, $playlists_to_display)){
                    $playlists_to_display[] = $pid;
                }
            }  

        }
        else if(isset($options) && $options['displayAllPlaylistsInPage']){//get all playlists
            $ptd = $wpdb->get_results("SELECT id FROM {$playlist_table}", ARRAY_A);

            foreach($ptd as $pp){
                $playlists_to_display[] = $pp['id'];
            }
        }
        else{

            foreach($pids as $pid){//get selected playlists
                $playlists_to_display[] = $pid;
            }  
        }

        if(isset($atts['rel_playlist_id'])){//add related playlists 
            $rel_pids = explode(',',$atts['rel_playlist_id']);
            if(count($rel_pids)>0)$has_rel = true;

            foreach($rel_pids as $rel_pid){
                if(!in_array($rel_pid, $playlists_to_display)){
                    $playlists_to_display[] = $rel_pid;
                }
            }

        }

    }
  


    //playlist list
    $markup = '<div class="mvp-playlist-list-'.$instance_id.'" style="display:none;">'.PHP_EOL;

    $default_playlist_options = mvp_playlist_options();

	foreach($playlists_to_display as $pl_id) {

        //related playlist 
        if($has_rel && in_array($pl_id, $rel_pids)){
            $markup .= '<div class="mvp-playlist-'.$pl_id.' mvp-rel-playlist" data-playlist-id="'.$pl_id.'"';
            if(isset($atts['rel_num'])) $markup .= ' data-rel-num="'.$atts['rel_num'].'"';
        }else{
            $markup .= '<div class="mvp-playlist-'.$pl_id.'" data-playlist-id="'.$pl_id.'"';
        }

        //global playlist options
        $playlist_data = $wpdb->get_row($wpdb->prepare("SELECT title, options FROM {$playlist_table} WHERE id = %d", $pl_id), ARRAY_A);

        if(isset($playlist_data['options'])){
            $pl_options = $playlist_data['options'];
            $po = unserialize($pl_options);
            if($po){
                $playlist_options = $po + $default_playlist_options;
            }else{
                $playlist_options = $default_playlist_options;
            }
        }else{
            $playlist_options = $default_playlist_options;
        }

        if($options['makePlaylistSelector']){

            if(isset($playlist_data['title'])){
                $title = $playlist_data['title'];
                $title = str_replace('"', "'", $title);
            }else{
                $title = '';
            }
            
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
                else $limit = $playlist_options['paginationPerPage'];
            }
        }



        $encryptMediaPaths = $playlist_options['encryptMediaPaths'];


        if(isset($atts['single_video'])){

            $stmt = $wpdb->prepare("SELECT id, title, options FROM {$media_table} WHERE id=%d AND playlist_id = %d", $options["mediaId"], $pl_id);
            $medias = $wpdb->get_results($stmt, ARRAY_A);

            $track = '<div class="mvp-global-playlist-data"';

        }else{

            if(isset($atts['show_fav']) && isset($atts['user_id'])){
                $user_id = $atts['user_id'];

                if($wpdb->get_var( "show tables like '$statistics_table'" ) == $statistics_table){

                    $stmt = $wpdb->prepare("
                        SELECT mt.id, mt.title, mt.options,
                        SUM(DISTINCT st.c_play) AS c_play
                        FROM $media_table as mt 
                        LEFT JOIN $favorites_table ft on mt.id = ft.media_id 
                        LEFT JOIN $statistics_table st on mt.id = st.media_id 
                        WHERE mt.playlist_id = %d AND disabled = 0 AND ft.user_id=%d
                        GROUP BY mt.id
                        ORDER BY $sortOrder $sortDirection", $pl_id, $user_id);

                }else{

                    $stmt = $wpdb->prepare("SELECT mt.id, mt.title, mt.options FROM {$media_table} as mt
                        LEFT JOIN $favorites_table ft on mt.id = ft.media_id 
                        WHERE disabled = 0 AND mt.playlist_id = %d AND ft.user_id=%d
                        ORDER BY $sortOrder $sortDirection", $pl_id, $user_id);

                }

            }else{

                if($wpdb->get_var( "show tables like '$statistics_table'" ) == $statistics_table){

                    //add play count
                    $stmt = $wpdb->prepare("
                        SELECT mt.id, mt.title, mt.options,
                        SUM(DISTINCT st.c_play) AS c_play
                        FROM $media_table as mt 
                        LEFT JOIN $statistics_table st on mt.id = st.media_id 
                        WHERE mt.playlist_id = %d AND disabled = 0
                        GROUP BY mt.id
                        ORDER BY $sortOrder $sortDirection", $pl_id);

                }else{

                    $stmt = $wpdb->prepare("SELECT id, title, options FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d ORDER BY $sortOrder $sortDirection", $pl_id);

                }

            }

            $medias = $wpdb->get_results($stmt, ARRAY_A);

            if($addMoreOnTotalScroll){//scroll end

                $num_results = $wpdb->get_var($wpdb->prepare("SELECT COUNT(id) FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d", $pl_id));

                //global playlist options

                $track = '<div class="mvp-global-playlist-data" data-add-more-on-total-scroll="1" data-add-more-num-results="'.$num_results.'" data-add-more-limit="'.$limit.'"';

            }else if($usePagination){//pagination

                $num_results = $wpdb->get_var($wpdb->prepare("SELECT COUNT(id) FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d", $pl_id));

                //global playlist options

                $track = '<div class="mvp-global-playlist-data" data-use-pagination="1" data-pagination-current-page="0" data-add-more-num-results="'.$num_results.'" data-add-more-limit="'.$limit.'"';    

            }else{//retrieve all 

                $track = '<div class="mvp-global-playlist-data"';

            }

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
        if(!empty($playlist_options["pl_preview_seek"])){
            $track .= ' data-preview-seek="'.$playlist_options["pl_preview_seek"].'"';
        }
        if(!empty($playlist_options["vast"])){
            $track .= ' data-vast="'.$playlist_options["vast"].'"';

            if(!empty($playlist_options["vast_loop"])){
                $track .= ' data-vast-loop="1"';
            }
        }
        else if(isset($atts["vast"])){
            $track .= ' data-vast="'.$atts["vast"].'"';

            if(isset($atts["vast_loop"])){
                $track .= ' data-vast-loop="1"';
            }
        }
        if(!empty($encryptMediaPaths)){
            $track .= ' data-encrypt-media-paths="'.$encryptMediaPaths.'"';
        }
        else if(isset($atts["encryptMediaPaths"])){
            $encryptMediaPaths = $atts['encryptMediaPaths'];
            $track .= ' data-encrypt-media-paths="'.$encryptMediaPaths.'"';
        }

        $track .= '>';//mvp-global-playlist-data

        //ads
        if($ad_data)include('shortcode_ad_data.php');
        //annotations
        if($annotation_data)include('shortcode_annotation_data.php');

        $track .= '</div>';//end mvp-global-playlist-data

        $markup .= $track.PHP_EOL;

        //tracks

        foreach($medias as $media) {
            $markup .= mvp_shortcode_media($media, $options, true);
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

        $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['path'] ) ); 
        $path_array = explode( ',', $sanitize );

        if(count($path_array)>1){//multiple qualities
            $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['quality_title'] ) ); 
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
        if($type == "folder_video" || $type == "folder_audio" || $type == "folder_image" || $type == "folder_hls" || $type == "folder_dash"){

            if(!isset($media["folder_custom_url"]) || $media["folder_custom_url"] == '0'){
                $prefix = MVP_FILE_DIR;
            }
        }

        $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['path'] ) ); 

        if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($prefix.$sanitize);
        else $p = $prefix.$sanitize;

        if($type == "s3_bucket_video" || $type == "s3_video" || $type == "s3_bucket_audio" || $type == "s3_audio"){
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
    if(!empty($media["date"])){
        $track .= 'data-date="'.$media["date"].'" ';
    }
    if(isset($media["account_type"])){
        $track .= 'data-user-account="'.$media["account_type"].'" ';
    }
    if(isset($media["upload_date"])){
        $track .= 'data-upload-date="'.$media["upload_date"].'" ';
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
    if(!empty($media["hl"])){
        $track .= 'data-hl="'.$media["hl"].'" ';
    }
    if(!empty($media["cc_lang_pref"])){
        $track .= 'data-cc-lang-pref="'.$media["cc_lang_pref"].'" ';
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
        if(!empty($media["sort_direction"])){
            $track .= 'data-sort-direction="'.$media["sort_direction"].'" ';
        }else if(!empty($media["sort_dir"])){
            $track .= 'data-sort-direction="'.$media["sort_dir"].'" ';
        }else if(!empty($media["vimeo_sort_dir"])){
            $track .= 'data-sort-direction="'.$media["vimeo_sort_dir"].'" ';
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

    if(!empty($media["cue_start_time"]) && !empty($media["cue_code_type"]) && !empty($media["cue_code"])){

        $cue_start_time = preg_replace( '/\s*,\s*/', ',', $media['cue_start_time'] ); 
        $cue_start_time_array = explode( ',', $cue_start_time );

        $cue_code_type = preg_replace( '/\s*,\s*/', ',', $media['cue_code_type'] ); 
        $cue_code_type_array = explode( ',', $cue_code_type );

        $cue_code = preg_replace( '/\s*,\s*/', ',', $media['cue_code'] ); 
        $cue_code_array = explode( ',', $cue_code );

        $cplen = count($cue_start_time_array);

        //We need to make sure that arrays are exactly the same lenght before we continue
        if(count($cue_code_type_array) == $cplen && count($cue_code_array) == $cplen){

            $track .= '<div class="mvp-cuepoints">';

            foreach($cue_start_time_array as $k => $v){ 
                if(!empty($v) && !empty($cue_code_type_array[$k]) && !empty($cue_code_array[$k])){
                    $track .= '<div data-start="'.esc_attr($v).'" data-'.$cue_code_type_array[$k].'="'.esc_attr($cue_code_array[$k]).'"></div>';
                }
            }

            $track .= '</div>';

        }
    }

    //subtitles
    if(!empty($media["subtitle_src"]) && !empty($media["subtitle_label"])){

        $track .= '<div class="mvp-subtitles">';

        $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['subtitle_src'] ) ); 
        $subtitle_src_array = explode( ',', $sanitize );

        $sanitize = preg_replace( '/\s*,\s*/', ',', filter_var( $media['subtitle_label'] ) ); 
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

    //cue
    if(!empty($media["cue_point"])){

        $track .= '<div class="mvp-cuepoints">'; 

        foreach($media["cue_point"] as $cue){
            if(!empty($cue['cue_start_time']) && !empty($cue['cue_code_type']) && !empty($cue['cue_code'])){
                $track .= '<div data-start="'.esc_attr($cue['cue_start_time']).'" data-'.$cue['cue_code_type'].'="'.esc_attr($cue["cue_code"]).'"></div>';
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