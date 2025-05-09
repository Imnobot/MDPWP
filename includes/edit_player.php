<?php 

$title = "";
$custom_css = "";
$custom_js = "";
$media_end_action_html = "";
$media_end_action_css = "";

if(isset($_GET['player_id'])){

    $player_id = $_GET['player_id'];

    $stmt = $wpdb->prepare("SELECT * FROM {$player_table} WHERE id = %d", $player_id);
    $result = $wpdb->get_row($stmt, ARRAY_A);
    
    if($result){
        $preset = $result['preset'];

        $preset = mvp_checkPreset($preset);

        $player_options = unserialize($result['options']);
        $default_options = mvp_player_options();
        $preset_options = mvp_player_options_preset()[$preset];
        $options = $player_options + $default_options + $preset_options;
        $title = $result['title'];
        $custom_css = isset($result['custom_css']) ? stripslashes($result['custom_css']) : '';
$custom_js = isset($result['custom_js']) ? stripslashes($result['custom_js']) : '';
        $media_end_action_html = isset($player_options['media_end_action_html']) ? stripslashes($player_options['media_end_action_html']) : "";
        $media_end_action_css = isset($player_options['media_end_action_css']) ? stripslashes($player_options['media_end_action_css']) : "";

    }

    $skin = $preset;

    //$preset = mvp_startsWith($preset, "flat");//remove (-light,-dark...) on flat skins

    //breakpoints
    $mvp_breakPoint_arr = array();

    if(isset($options['bp_width']) && isset($options['bp_column']) && isset($options['bp_gutter'])){

        $bp_width = $options['bp_width'];
        $bp_column = $options['bp_column'];
        $bp_gutter = $options['bp_gutter'];
        
        foreach ($bp_width as $id => $key) {
            if(!mvp_nullOrEmpty($key)){
                $mvp_breakPoint_arr[] = array(
                    'width'  => $bp_width[$id],
                    'column' => $bp_column[$id],
                    'gutter'  => $bp_gutter[$id],
                );
            }
        }
    }
    else if(!isset($options['breakpoints_set']) && isset($options['breakPointArr'])){
        $mvp_breakPoint_arr = $options['breakPointArr'];
    }

    //visiblity
    $mvp_elementsVisibility_arr = array();

    if(isset($options['ev'])){
        foreach ($options['ev'] as $arr) {
            $mvp_elementsVisibility_arr[] = $arr;
        }
    }
    else if(!isset($options['breakpoints_set']) && isset($options['elementsVisibilityArr'])){
        $mvp_elementsVisibility_arr = $options['elementsVisibilityArr'];
    }

    //caption breakpoints
    $mvp_caption_breakPoint_arr = array();

    if(isset($options['caption_bp_width']) && isset($options['caption_bp_font_size'])){

        $caption_bp_width = $options['caption_bp_width'];
        $caption_bp_font_size = $options['caption_bp_font_size'];
        
        foreach ($caption_bp_width as $id => $key) {
            if(!mvp_nullOrEmpty($key)){
                $mvp_caption_breakPoint_arr[] = array(
                    'width'  => $caption_bp_width[$id],
                    'font_size'  => $caption_bp_font_size[$id],
                );
            }
        }
    }
    else if(!isset($options['breakpoints_set']) && isset($options['caption_breakPointArr'])){
        $mvp_caption_breakPoint_arr = $options['caption_breakPointArr'];
    }


    //playback rate
    $mvp_playbackRate_arr = array();

    if(isset($options['playbackRate_value']) && isset($options['playbackRate_menu_title'])){

        $playbackRate_value = $options['playbackRate_value'];
        $playbackRate_menu_title = $options['playbackRate_menu_title'];
        
        foreach ($playbackRate_value as $id => $key) {
            if(!mvp_nullOrEmpty($key)){
                $mvp_playbackRate_arr[] = array(
                    'value'  => $playbackRate_value[$id],
                    'menu_title'  => $playbackRate_menu_title[$id],
                );
            }
        }
    }
    else if(!isset($options['playbackrate_set']) && isset($options['playbackRateArr'])){
        $mvp_playbackRate_arr = $options['playbackRateArr'];
    }

    $sectionTitle = 'Edit Player';

}

if(isset($_GET['mvp_msg'])){
    $msg = $_GET['mvp_msg'];
    if($msg == 'player_created')$msg = 'Player created!'; 
}else{
    $msg = null;
}




?>

<script type="text/javascript">
    var mvp_breakPoint_arr = <?php echo(json_encode($mvp_breakPoint_arr, JSON_HEX_TAG)); ?>;
    var mvp_elementsVisibility_arr = <?php echo(json_encode($mvp_elementsVisibility_arr, JSON_HEX_TAG)); ?>;
    var mvp_caption_breakPoint_arr = <?php echo(json_encode($mvp_caption_breakPoint_arr, JSON_HEX_TAG)); ?>;
    var mvp_playbackRate_arr = <?php echo(json_encode($mvp_playbackRate_arr, JSON_HEX_TAG)); ?>;
    var mvp_allKeyboardControls_arr = <?php echo(json_encode($options['keyboardControlsArr'], JSON_HEX_TAG)); ?>;
    var mvp_keyboardControls_arr = <?php echo(json_encode($options['keyboardControls'], JSON_HEX_TAG)); ?>;
</script>

<div class='wrap'>

    <?php include("notice.php"); ?>

	<h2><?php echo($sectionTitle); ?> <span style="color:#FF0000; font-weight:bold;"><?php if(isset($player_id))echo($skin.' - '. $title . ' - ID #' . $player_id); ?></span></h2>

    <form id="mvp-edit-player-form" method="post" data-preset="<?php echo(esc_html($preset)); ?>" data-player-id="<?php echo $player_id ?>">

		<div class="mvp-admin">

            <div class="option-tab mvp-player-style">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Style', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
                    </div>
                </div>
                <div class="option-content">
                    <?php require_once(dirname(__FILE__)."/style.php");  ?>
                </div>
            </div>

            <div class="option-tab-divider"></div>

            <div class="option-tab mvp-player-general">
    		    <div class="option-toggle">
    		        <span class="option-title"><?php esc_html_e('General settings', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
                    </div>
    		    </div>
    		    <div class="option-content">
                    <?php require_once(dirname(__FILE__)."/general.php"); ?>
          	    </div>
            </div>

            <div class="option-tab-divider"></div>

            <div class="option-tab">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Translation', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
                    </div>
                </div>
                <div class="option-content">
                    <?php require_once(dirname(__FILE__)."/translation.php"); ?>
                </div>
            </div>

            <div class="option-tab-divider"></div>

            <div class="option-tab">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Colors', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
                    </div>
                </div>
                <div class="option-content">
                    <?php require_once(dirname(__FILE__)."/preset_config/colors.php"); ?>
                </div>
                <div class="option-content">
                    
                </div>
            </div>  

            <div class="option-tab-divider"></div>

            <div class="option-tab">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Custom CSS', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
                    </div>
                </div>
                <div class="option-content">

                    <p class="info"><?php esc_html_e('Add custom CSS for the player.', MVP_TEXTDOMAIN); ?></p>

                    <textarea id="mvp_custom_css_field" style="display:none;"><?php echo(esc_textarea($custom_css)); ?></textarea>
                </div>
            </div>

            <div class="option-tab-divider"></div>

            <div class="option-tab">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Custom Javascript', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
                    </div>
                </div>
                <div class="option-content">

                    <p class="info"><?php esc_html_e('Add custom javascript for the player.', MVP_TEXTDOMAIN); ?></p>

                    <textarea id="mvp_custom_js_field" style="display:none;"><?php echo(esc_textarea($custom_js)); ?></textarea>
                </div>
            </div>

        </div>
       
	</form>

    <div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">
            
            <button id="mvp-edit-player-form-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Save Changes', MVP_TEXTDOMAIN); ?></button> 

            <a class="button-secondary" href="<?php echo admin_url("admin.php?page=mvp_player_manager"); ?>"><?php esc_html_e('Back to Player manager', MVP_TEXTDOMAIN); ?></a>

        </div>
    </div>

    <div id="mvp-save-holder"></div>

</div>

<div id="mvp-loader">
    <div class="mvp-loader-anim">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>


