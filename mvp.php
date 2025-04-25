<?php

/*
Plugin Name: Modern Video Player  
Description: Ultimate Video Player for WordPress
Version: 11.61
Author: Tean
Author URI: https://codecanyon.net/user/Tean/
Plugin URI: https://interactivepixel.net
Update URI: https://interactivepixel.net_mvp
*/





	if(!defined('ABSPATH'))exit;// Exit if accessed directly

	define('MVP_FILE_DIR', WP_CONTENT_DIR . '/uploads/mvp-file-dir/');
	define('MVP_FILE_DIR_URL', WP_CONTENT_URL . '/uploads/mvp-file-dir/');
	define('MVP_CAPABILITY', 'manage_options');
	define('MVP_BSF_MATCH', 'ebsfm:');//encrypt media 
	define('MVP_PLUGINS_URL', plugins_url('/apmvp/source/'));
	define('MVP_TEXTDOMAIN', 'modern-video-player');

	define('MVP_PLUGIN_SLUG', plugin_basename( __DIR__ ));
	define('MVP_PLUGIN_VERSION', '11.61');

	define('MVP_ID', '21571689');

	include(dirname(__FILE__) . '/includes/utils.php');
	include(dirname(__FILE__) . '/includes/widgets.php');
	include(dirname(__FILE__) . '/includes/locale.php');
	include(dirname(__FILE__) . '/includes/player_options.php');
	


	if(is_admin()){

		register_activation_hook(__FILE__, 'mvp_player_activate'); 
		register_uninstall_hook(__FILE__, 'mvp_player_uninstall'); 

		add_action('admin_menu', 'mvp_admin_menu');
		add_action('admin_enqueue_scripts', 'mvp_admin_enqueue_scripts');
		add_action('plugins_loaded', 'mvp_plugins_loaded');

		//global
		add_action('wp_ajax_mvp_save_global_options', 'mvp_save_global_options');

		//player
		add_action('wp_ajax_mvp_create_player', 'mvp_create_player');
		add_action('wp_ajax_mvp_duplicate_player', 'mvp_duplicate_player');
		add_action('wp_ajax_mvp_edit_player_title', 'mvp_edit_player_title');
		add_action('wp_ajax_mvp_delete_player', 'mvp_delete_player');
		add_action('wp_ajax_mvp_save_player_options', 'mvp_save_player_options');
		add_action('wp_ajax_mvp_get_player_lang', 'mvp_get_player_lang');

		//playlist
		add_action('wp_ajax_mvp_edit_playlist_title', 'mvp_edit_playlist_title');
		add_action('wp_ajax_mvp_delete_playlist', 'mvp_delete_playlist');
		add_action('wp_ajax_mvp_duplicate_playlist', 'mvp_duplicate_playlist');
		add_action('wp_ajax_mvp_save_playlist_options', 'mvp_save_playlist_options');
		add_action('wp_ajax_mvp_create_playlist', 'mvp_create_playlist');

		add_action('wp_ajax_mvp_domain_rename', 'mvp_domain_rename');

		//favorites
		add_action('wp_ajax_mvp_get_favorites', 'mvp_get_favorites');
		add_action('wp_ajax_mvp_add_to_favorites', 'mvp_add_to_favorites');
		add_action('wp_ajax_mvp_remove_from_favorites', 'mvp_remove_from_favorites');

		//ad
		add_action('wp_ajax_mvp_edit_ad_title', 'mvp_edit_ad_title');
		add_action('wp_ajax_mvp_delete_ad', 'mvp_delete_ad');
		add_action('wp_ajax_mvp_duplicate_ad', 'mvp_duplicate_ad');
		add_action('wp_ajax_mvp_save_ad_options', 'mvp_save_ad_options');
		add_action('wp_ajax_mvp_create_ad', 'mvp_create_ad');
		add_action('wp_ajax_mvp_ad_domain_rename', 'mvp_ad_domain_rename');

		//media
		add_action('wp_ajax_mvp_update_media_order', 'mvp_update_media_order');
		add_action('wp_ajax_mvp_delete_media', 'mvp_delete_media');
		add_action('wp_ajax_mvp_copy_media', 'mvp_copy_media');
		add_action('wp_ajax_mvp_move_media', 'mvp_move_media');
		add_action('wp_ajax_mvp_edit_media', 'mvp_edit_media');
		add_action('wp_ajax_mvp_add_media', 'mvp_add_media');
		add_action('wp_ajax_mvp_add_media_multiple', 'mvp_add_media_multiple');

		//add_action('wp_ajax_mvp_set_disabled', 'mvp_set_disabled');
		add_action('wp_ajax_mvp_set_disabled_all', 'mvp_set_disabled_all');

		//export
		add_action('wp_ajax_mvp_clean_export', 'mvp_clean_export');
		add_action('wp_ajax_mvp_export_playlist', 'mvp_export_playlist');
		add_action('wp_ajax_mvp_import_playlist', 'mvp_import_playlist');
		add_action('wp_ajax_mvp_import_playlist_db', 'mvp_import_playlist_db');

		add_action('wp_ajax_mvp_export_player', 'mvp_export_player');
		add_action('wp_ajax_mvp_import_player', 'mvp_import_player');
		add_action('wp_ajax_mvp_import_player_db', 'mvp_import_player_db');

		add_action('wp_ajax_mvp_export_ad', 'mvp_export_ad');
		add_action('wp_ajax_mvp_import_ad', 'mvp_import_ad');
		add_action('wp_ajax_mvp_import_ad_db', 'mvp_import_ad_db');

		add_filter('upload_mimes', 'mvp_enable_custom_mime');

		//watched percentage
		add_action('wp_ajax_mvp_set_watched_percentage', 'mvp_set_watched_percentage');
		//add_action('wp_ajax_nopriv_mvp_set_watched_percentage', 'mvp_set_watched_percentage');
		add_action('wp_ajax_mvp_get_watched_percentage', 'mvp_get_watched_percentage');
		//add_action('wp_ajax_nopriv_mvp_get_watched_percentage', 'mvp_get_watched_percentage');
		add_action('wp_ajax_mvp_clear_watched_percentage', 'mvp_clear_watched_percentage');
		add_action('wp_ajax_mvp_clear_watched_percentage_all', 'mvp_clear_watched_percentage_all');


		//annotation shortcode
		add_action('wp_ajax_mvp_annotation_shortcode', 'mvp_annotation_shortcode');
		add_action('wp_ajax_nopriv_mvp_annotation_shortcode', 'mvp_annotation_shortcode');

		add_action('wp_ajax_mvp_popup_shortcode', 'mvp_popup_shortcode');
		add_action('wp_ajax_nopriv_mvp_popup_shortcode', 'mvp_popup_shortcode');
		
		add_action('init', 'mvp_init_setup');
		add_action('enqueue_block_editor_assets', 'mvp_enqueue_block_assets');

		add_action('wp_ajax_mvp_get_shortcode_atts', 'mvp_get_shortcode_atts');

		//add_action('add_meta_boxes', 'mvp_add_metabox_shortcode');

		add_action('wp_ajax_mvp_set_playlist_edit', 'mvp_set_playlist_edit');
		add_action('wp_ajax_mvp_check_playlist_edit', 'mvp_check_playlist_edit');

		include(dirname(__FILE__) . '/includes/updates.php');

		add_action('wp_ajax_mvp_check_r', 'mvp_check_r');
		add_action('wp_ajax_mvp_check_l', 'mvp_check_l');
		add_action('wp_ajax_mvp_dea_l', 'mvp_dea_l');
		add_action('wp_ajax_mvp_reg_man', 'mvp_reg_man');

	}else{

		include(dirname(__FILE__) . '/includes/shortcode.php');

		add_shortcode('apmvp', 'mvp_add_player');
		add_shortcode('apmvp_video', 'mvp_video');
		add_shortcode('apmvp_ad', 'mvp_ad');
		add_shortcode('apmvp_playlist_display', 'mvp_playlist_display');

		add_action('wp_enqueue_scripts', 'mvp_enqueue_scripts');
		add_action('init', 'mvp_init_frontend');

	}

	add_action('widgets_init', 'mvp_register_widgets');



	############################################//
	/* playlist edit */
	//############################################//

	function mvp_set_playlist_edit(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['playlist_id'])){

			$playlist_id = $_POST['playlist_id'];
			$is_edit = $_POST['is_edit'];

			if($is_edit == '1'){
				$current_user = wp_get_current_user();
				$edit_user_id = $current_user->ID;
			}else{
				$edit_user_id = null;
			} 

		   	global $wpdb;
			$wpdb->show_errors(); 
		    $playlist_table = $wpdb->prefix . "mvp_playlists";

		    $stmt = $wpdb->update(
		    	$playlist_table,
				array('is_edit' => $is_edit, 'edit_user_id' => $edit_user_id),
				array('id' => $playlist_id),
				array('%s', '%s'),
				array('%d')
		    );

	    	if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_check_playlist_edit(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}
	
	   	global $wpdb;
		$wpdb->show_errors(); 
	    $playlist_table = $wpdb->prefix . "mvp_playlists";

	    $stmt = $wpdb->get_results("SELECT id, is_edit, edit_user_id FROM {$playlist_table}", ARRAY_A);

	    $arr = array();
	    foreach ($stmt as $key => $value) {
	    	$arr[$key] = $value;
	    	//$arr['role'] = 
	    }

    	echo json_encode($arr);

    	wp_die();
    	
	}



    ############################################//
	/* get all shortocde atts */
	//############################################//

	function mvp_get_shortcode_atts(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['player_id'])){

			$player_id = $_POST['player_id'];

			global $wpdb;
			$wpdb->show_errors(); 

		    $player_table = $wpdb->prefix . "mvp_players";
			$stmt = $wpdb->prepare("SELECT preset, options FROM {$player_table} WHERE id = %d", $player_id);
			$result = $wpdb->get_row($stmt, ARRAY_A);

			$default_options = mvp_player_options();
    		$preset_options = mvp_player_options_preset();

    		$player_options = unserialize($result['options']);
	        $preset = $result["preset"];

	        $preset = mvp_checkPreset($preset); 	

	        $options = $player_options + $default_options + $preset_options[$preset];

			if($stmt !== false){
	    		echo json_encode($options);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	//############################################//
	/* meta */
	//############################################//

	function mvp_add_metabox_shortcode() {

		wp_enqueue_script("mvp-metabox", plugins_url('/js/admin_global.js'."?rand=" . rand(), __FILE__), array('jquery'));

		wp_localize_script('mvp-metabox-shortcode', 'mvp_data', array('plugins_url' => plugins_url('', __FILE__), 
														         'ajax_url' => admin_url( 'admin-ajax.php'),
														         'security'  => wp_create_nonce( 'mvp-security-nonce' )));

		$id = 'mvp-metabox-shortcode';
		$title = 'Modern Video Player Shortcode Generator';
		$posts = array('post', 'page');

		$args = array(
	       'public'   => true,
	       '_builtin' => false
	    );
       	$custom_post_types = get_post_types($args);
       	foreach ($custom_post_types as $screen){
       		$posts[] = $screen;
       	}

       	foreach ($posts as $screen){
			add_filter( "postbox_classes_{$screen}_{$id}", 'mvp_minify_my_metabox' );
       	}

		add_meta_box($id, $title, 'mvp_shortcode_metabox_data', $posts, 'normal', 'low'); 

	}

	function mvp_shortcode_metabox_data() {

		global $wpdb;
		$wpdb->show_errors(); 
		$player_table = $wpdb->prefix . "mvp_players";
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$global_ad_table = $wpdb->prefix . "mvp_global_ad";

		include("includes/shortcode_manager.php");

	}

	function mvp_minify_my_metabox( $classes ) {
	    array_push( $classes, 'closed' );
	    return $classes;
	}

	

	//############################################//
	/* watched */
	//############################################//

	function mvp_set_watched_percentage(){
	 	
		if(isset($_POST['media_id'])){

			$playlist_id = !mvp_nullOrEmpty($_POST["playlist_id"]) ? $_POST["playlist_id"] : NULL;
			$watched = (int)$_POST['watched'];
			$duration = (int)$_POST['duration'];
			$media_id = !mvp_nullOrEmpty($_POST["media_id"]) ? $_POST["media_id"] : NULL;
			$url = !mvp_nullOrEmpty($_POST["url"]) ? $_POST["url"] : NULL;

			$arr = array( 
				'title' => $url, //we use title to distinguish because of grouped media (yt playlist etc)
				'watched' => $watched, 
				'duration' => $duration, 
				'media_id' => $media_id,
				'playlist_id' => $playlist_id
			);

			if(is_user_logged_in()){ 
			    $current_user = wp_get_current_user();
			    $arr['user_id'] = $current_user->ID;
			    $user_id = $current_user->ID;
			}else{
				$arr['user_id'] = null;
				$user_id = null;
			}

			global $wpdb;
		    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

		    if($media_id && $url){

		    	//check if exist
			    $stmt = $wpdb->get_row($wpdb->prepare("SELECT id FROM $watched_percentage_table WHERE media_id=%d AND title=%s AND user_id=%d", $media_id, $url, $user_id));

			    if($wpdb->num_rows == 0){//create entry

			    	$stmt = $wpdb->insert(
				    	$watched_percentage_table,
						$arr,
						array( 
							'%s','%d','%d','%d','%d','%d'
						) 
				    );

			    }else{//update only if larger

					$query = "UPDATE $watched_percentage_table
					SET watched = GREATEST($watched, watched)
					WHERE media_id = %d AND title = %s AND user_id=%d";

					$values = array($media_id, $url, $user_id);

					$stmt = $wpdb->query( $wpdb->prepare( "$query ", $values ) );

			    }

			    $response_arr = array('update' => $stmt,
			    					  'media_id' => $media_id,
			    					  'title' => $url,
			    					  'watched' => $watched,
			    					  'duration' => $duration);

		    }else if($url){//use title for url so we dont change column

		    	//check if exist
			    $stmt = $wpdb->get_row($wpdb->prepare("SELECT id FROM $watched_percentage_table WHERE title=%s AND user_id=%d", $url, $user_id));

			    if($wpdb->num_rows == 0){//create entry

			    	$stmt = $wpdb->insert(
				    	$watched_percentage_table,
						$arr,
						array( 
							'%s','%d','%d','%d','%d','%d'
						) 
				    );

			    }else{//update only if larger

					$stmt = $wpdb->query( $wpdb->prepare("UPDATE $watched_percentage_table SET watched = GREATEST($watched, watched) WHERE title = %s AND user_id=%d", $url, $user_id ) );

			    }

			    $response_arr = array('title' => $url,
			    					  'watched' => $watched,
			    					  'duration' => $duration);

			}

			echo json_encode($response_arr);

			wp_die();

		}else {
			wp_die();
		}
	}

	function mvp_get_watched_percentage(){
	 	
		if(isset($_POST['data'])){

			if(is_user_logged_in()){ 
			    $current_user = wp_get_current_user();

				global $wpdb;
			    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

				//https://stackoverflow.com/questions/44706196/mysql-multiple-columns-in-in-clause

				$data = json_decode(stripcslashes($_POST['data']), true); 
				$len = count($data);
				$i = 0;
				$str = '(';
					foreach ($data as $d) {
						$title = $d['url'];
						if($d['media_id'] == null){
							$str .= '( media_id IS NULL AND title = \''.$title.'\' AND user_id = \''.$current_user->ID.'\' )';
						}else{
							$str .= '( media_id = \''.$d['media_id'].'\' AND title = \''.$title.'\' AND user_id = \''.$current_user->ID.'\')';
						}
						if($i < $len-1)$str .= ' OR ';
						$i++;
					}
				$str .= ')';

				$stmt = $wpdb->get_results("SELECT media_id, title, user_id, watched, duration FROM $watched_percentage_table WHERE {$str}", ARRAY_A);

				if($stmt !== false){
		    		echo json_encode($stmt);
		    	}

		    }

			wp_die();

		}else {
			wp_die();
		}
	}

	function mvp_clear_watched_percentage(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}
	 	
		if(isset($_POST['playlist_id'])){

			$playlist_id = (int)$_POST["playlist_id"];

			$current_user = wp_get_current_user();

			global $wpdb;
		    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

			$stmt = $wpdb->query($wpdb->prepare("UPDATE $watched_percentage_table SET watched='0' WHERE playlist_id=%d AND user_id=%d", $playlist_id, $current_user->ID));

			if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

			wp_die();

		}else {
			wp_die();
		}
	}

	function mvp_clear_watched_percentage_all(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		global $wpdb;
	    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

		$stmt = $wpdb->query("TRUNCATE $watched_percentage_table");

		if($stmt !== false){
    		echo json_encode($stmt);
    	}

		wp_die();

	}

	//############################################//
	/*  */
	//############################################//

	function mvp_annotation_shortcode(){

		if(isset($_POST['shortcode'])){

			$shortcode = json_decode(stripcslashes($_POST['shortcode']), true);
			$annotation_id = $_POST['annotation_id'];

			$output = do_shortcode($shortcode);

			echo json_encode(array("annotation_id"=>$annotation_id, "output"=> $output));

			wp_die();

		}else {
			wp_die();
		}
	}

	function mvp_popup_shortcode(){

		if(isset($_POST['shortcode'])){

			$shortcode = json_decode(stripcslashes($_POST['shortcode']), true);
			$annotation_id = $_POST['annotation_id'];

			$output = do_shortcode($shortcode);

			echo json_encode(array("annotation_id"=>$annotation_id, "output"=> $output));

			wp_die();

		}else {
			wp_die();
		}
	}

	//############################################//
	/* mime */
	//############################################//
	
	function mvp_enable_custom_mime ( $mime_types = array() ) {

	   $mime_types['m3u8'] = 'application/x-mpegURL,application/vnd.apple.mpegurl';
	   $mime_types['ts'] = 'video/MP2T';
	   $mime_types['xml'] = 'application/xml';
	   $mime_types['json'] = 'application/json';

	   return $mime_types;
	}

	function mvp_init_setup() {

		if (function_exists('register_block_type')) {
            register_block_type('modern-video-player/block', array(
                'attributes' => array(
                    'player_id' => array(
                        'type' => 'string'
                    ),
                    'playlist_id' => array(
                        'type' => 'string'
                    ),
                    'media_id' => array(
                        'type' => 'string'
                    ),
                    'ad_id' => array(
                        'type' => 'string'
                    )
                ))
            );
        }

	}

	function mvp_register_widgets(){
		register_widget('ModernVideoPlayerWidget');
	}

	function mvp_init_frontend() {

		global $wpdb;
	    $settings_table = $wpdb->prefix . "mvp_settings";
	    $result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);

	    if($result){
	    	$settings = unserialize($result['options']);
		    
		    $overide_wp_video = isset($settings["overide_wp_video"]) ? (bool)($settings["overide_wp_video"]) : false;

		    if($overide_wp_video){
		    	add_filter('wp_video_shortcode_override', 'mvp_video_shortcode_override', 10, 2);
		    	add_filter('the_content', 'mvp_disable_wp_auto_p', 0 );
		    	add_filter('embed_oembed_html', 'mvp_embed_oembed_html', 99, 4);
		    	add_filter('video_embed_html', 'mvp_embed_oembed_html');
		    }

	    }

	}

	function mvp_enqueue_block_assets() {
        if (function_exists('register_block_type')) {
			wp_enqueue_script('apmvp-block', plugins_url('js/block.js'."?rand=" . rand(), __FILE__), array( 'wp-blocks', 'wp-i18n', 'wp-element' ));

			wp_enqueue_style('mvp-block-editor-css', plugins_url('/css/block.css'."?rand=" . rand(), __FILE__), array('wp-edit-blocks'));

			global $wpdb;
            $player_table = $wpdb->prefix . "mvp_players";
            $playlist_table = $wpdb->prefix . "mvp_playlists";
            $media_table = $wpdb->prefix . "mvp_media";
            $global_ad_table = $wpdb->prefix . "mvp_global_ad";

            //load players
            $players = $wpdb->get_results("SELECT id, title FROM {$player_table} ORDER BY title ASC", ARRAY_A);
            //load playlists
            $playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A);

            //media
            $media_arr = array();
            $playlists_to_display = $wpdb->get_results("SELECT id FROM {$playlist_table}", ARRAY_A);
            foreach($playlists_to_display as $playlist_id) {

			    $stmt = $wpdb->prepare("SELECT id, title, options FROM $media_table WHERE playlist_id = %d AND disabled = 0 ORDER BY order_id ASC", $playlist_id);
				
				if($stmt !== false){
					$medias = $wpdb->get_results($stmt, ARRAY_A);

					$arr = array();

					foreach($medias as $media){
						$media_options = unserialize($media['options']);
						if(isset($media['title']))$media_options['title'] = $media['title'];
						$arr[] = array(
							"id" => $media['id'],
							"options" => $media_options
			    		);
					}

					$media_arr[] = array(
						'playlist_id' => $playlist_id['id'],
						'media' => $arr
					);

		    	}

            }

            //load ads
            $ads = $wpdb->get_results("SELECT id, title FROM {$global_ad_table} ORDER BY title ASC", ARRAY_A);

			wp_localize_script( 'apmvp-block', 'mvp_block_data', array(
			   'players' => json_encode($players, JSON_HEX_TAG),
		       'playlists' => json_encode($playlists, JSON_HEX_TAG),
		       'media' => json_encode($media_arr, JSON_HEX_TAG),
		       'ads' => json_encode($ads, JSON_HEX_TAG)));

        }

    }

	function mvp_disable_wp_auto_p( $content ) {
	    remove_filter( 'the_content', 'wpautop' );
	    remove_filter( 'the_excerpt', 'wpautop' );
	    return $content;
	}

	function mvp_embed_oembed_html( $cache, $url, $attr, $post_ID ) {

		if ( false !== strpos( $url, 'vimeo' ) ) {

			if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $matches)) {

				$attr['path'] = trim($matches[3]);
				if(isset($attr['width']))$attr['wrapper_max_width'] = $attr['width'];
				$attr['type'] = 'vimeo_single';
				$attr['playlist_position'] = 'no-playlist';
				$attr['use_previous'] = '0';
				$attr['use_next'] = '0';
				$attr['noapi'] = '1';
				$attr['vimeo_player_type'] = 'chromeless';
				return mvp_add_player($attr);

			}else{
				return $cache;
			}
		   
		}

		else if ( false !== strpos( $url, 'youtube' ) ) {

			if ( preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches)) {

				$attr['path'] = trim($matches[0]);
				if(isset($attr['width']))$attr['wrapper_max_width'] = $attr['width'];
				$attr['type'] = 'youtube_single';
				$attr['playlist_position'] = 'no-playlist';
				$attr['use_previous'] = '0';
				$attr['use_next'] = '0';
				$attr['noapi'] = '1';
				return mvp_add_player($attr);

			}else{
			
				parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
				if(!empty($vars['list'])){

					$attr['path'] = $vars['list'];
					if(isset($attr['width']))$attr['wrapper_max_width'] = $attr['width'];
					$attr['type'] = 'youtube_playlist';
					//$attr['playlist_position'] = 'vrb';
					return mvp_add_player($attr);

				}else{
					return $cache;
				}
			}
		}
		else return $cache;

	}

	function mvp_video_shortcode_override( $html, $attr ) {

		if(isset($attr['mp4']) || isset($attr['src'])){

			if(isset($attr['mp4']))$attr['path'] = $attr['mp4'];
			else if(isset($attr['src']))$attr['path'] = $attr['src'];

			if(isset($attr['width']))$attr['wrapper_max_width'] = $attr['width'];
			$attr['type'] = 'video';
			$attr['playlist_position'] = 'no-playlist';
			$attr['use_previous'] = '0';
			$attr['use_next'] = '0';
			return mvp_add_player($attr);
		}else{
			return "";
		}

	};

	function mvp_admin_menu(){

		global $wpdb;
	    $settings_table = $wpdb->prefix . "mvp_settings";
		$stmt = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);
		
		$default_settings = mvp_get_settings();

		if($stmt){
			$result = unserialize($stmt['options']);
			$settings = $result + $default_settings;
		}else{
			$settings = $default_settings;
		}

		$capability = !empty($settings['playlistCapability']) ? $settings['playlistCapability'] : MVP_CAPABILITY;


		add_menu_page("Modern Video Player Player manager", __('Modern Video Player', MVP_TEXTDOMAIN), MVP_CAPABILITY, "mvp_settings", "mvp_settings_page", 'dashicons-playlist-video');

		add_submenu_page("mvp_settings", __('Modern Video Player', MVP_TEXTDOMAIN), __('Global Settings', MVP_TEXTDOMAIN), MVP_CAPABILITY, 'mvp_settings');

		add_submenu_page("mvp_settings", __('Modern Video Player', MVP_TEXTDOMAIN), __('Player manager', MVP_TEXTDOMAIN), MVP_CAPABILITY, 'mvp_player_manager', "mvp_player_manager_page");	

		add_submenu_page("mvp_settings", __('Modern Video Player', MVP_TEXTDOMAIN), __('Playlist manager', MVP_TEXTDOMAIN), $capability, 'mvp_playlist_manager', 'mvp_playlist_manager_page');

		add_submenu_page("mvp_settings", __('Modern Video Player', MVP_TEXTDOMAIN), __('Ad manager', MVP_TEXTDOMAIN), MVP_CAPABILITY, 'mvp_ad_manager', 'mvp_ad_manager_page');

		add_submenu_page("mvp_settings", __('Modern Video Player', MVP_TEXTDOMAIN), __('Shortcodes', MVP_TEXTDOMAIN), MVP_CAPABILITY, 'mvp_shortcodes', 'mvp_shortcodes_page');

		add_submenu_page("mvp_settings", __('Modern Video Player', MVP_TEXTDOMAIN), __('Add-ons', MVP_TEXTDOMAIN), MVP_CAPABILITY, 'mvp_addon', 'mvp_addon_page');

	}

	function mvp_settings_page(){

		global $wpdb;
		$wpdb->show_errors(); 
		$settings_table = $wpdb->prefix . "mvp_settings";

		include("includes/settings.php");
	}

	function mvp_player_manager_page(){

		global $wpdb;
		$wpdb->show_errors(); 
		$player_table = $wpdb->prefix . "mvp_players";
		$playlist_table = $wpdb->prefix . "mvp_playlists";

		$action = "";
		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}

		switch($action) {

			case 'edit_player':
				include("includes/edit_player.php");
				break;

			default:
				include("includes/player_manager.php");
				break;
				
		}
		
	}

	function mvp_playlist_manager_page(){
		
		global $wpdb;
		$wpdb->show_errors(); 
		$player_table = $wpdb->prefix . "mvp_players";
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$media_table = $wpdb->prefix . "mvp_media";
		$ad_table = $wpdb->prefix . "mvp_ad";
		$annotation_table = $wpdb->prefix . "mvp_annotation";
		$path_table = $wpdb->prefix . "mvp_path";
		$subtitle_table = $wpdb->prefix . "mvp_subtitle";
		$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";
		$favorites_table = $wpdb->prefix . "mvp_favorites";



		$action = "";
		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}

		switch($action) {
			
			case 'edit_playlist':
				include("includes/edit_playlist.php");
				break;

			default:
				include("includes/playlist_manager.php");
				break;
				
		}

	}

	function mvp_ad_manager_page(){

		global $wpdb;
		$wpdb->show_errors(); 
		$ad_table = $wpdb->prefix . "mvp_ad";
		$annotation_table = $wpdb->prefix . "mvp_annotation";
		$global_ad_table = $wpdb->prefix . "mvp_global_ad";

		$action = "";
		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}

		switch($action) {
			
			case 'edit_ad':
				include("includes/edit_ad.php");
				break;

			default:
				include("includes/ad_manager.php");
				break;
				
		}
		
	}

	function mvp_shortcodes_page(){

		global $wpdb;
		$wpdb->show_errors(); 
		$player_table = $wpdb->prefix . "mvp_players";
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$global_ad_table = $wpdb->prefix . "mvp_global_ad";

		include("includes/shortcode_manager.php");
	}

	function mvp_addon_page(){

		global $wpdb;
		$wpdb->show_errors(); 

		include("includes/addon.php");
	}

	

	function mvp_admin_enqueue_scripts( $hook_suffix ) {

		if(in_array($hook_suffix, array('modern-video-player_page_mvp_player_manager', 'modern-video-player_page_mvp_playlist_manager', 'modern-video-player_page_mvp_ad_manager', 'modern-video-player_page_mvp_shortcodes', 'modern-video-player_page_mvp_demo', 'modern-video-player_page_mvp_shelf', 'toplevel_page_mvp_settings'))){	

			global $wpdb;
		    $settings_table = $wpdb->prefix . "mvp_settings";
			$stmt = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);
			
			$default_settings = mvp_get_settings();

			if($stmt){
				$result = unserialize($stmt['options']);
				$settings = $result + $default_settings;
			}else{
				$settings = $default_settings;
			}

			$cache = '';
	    	if($settings["preventCaching"])$cache = "?rand=" . rand();

			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_media();

			wp_enqueue_style("spectrum", plugins_url('/css/spectrum.css', __FILE__));
			wp_enqueue_script("spectrum", plugins_url('/js/spectrum.js', __FILE__), array('jquery'));	

			wp_enqueue_style('mvp-admin-css', plugins_url('/css/admin.css'.$cache, __FILE__));

			wp_enqueue_script("mvpglob", plugins_url('/js/glob.js', __FILE__), array('jquery'));

			wp_enqueue_script("mvp-general", plugins_url('/js/admin_general.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	

			switch ( $hook_suffix ) {

				case get_plugin_page_hookname( 'mvp_settings', 'mvp_settings' ):

					wp_enqueue_style("codemirror", plugins_url('/css/codemirror.min.css', __FILE__));
			        wp_enqueue_script("codemirror", plugins_url('/js/codemirror.min.js', __FILE__));

			        wp_enqueue_script("mvp-admin", plugins_url('/js/admin_global.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	


		        case get_plugin_page_hookname( 'mvp_player_manager', 'mvp_settings' ):

		        	wp_enqueue_style("fa", $settings['fontAwesomeCssUrl']);//player icons

		        	//multi select
					wp_enqueue_style("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css");	
					wp_enqueue_script("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js", array('jquery'));

			        wp_enqueue_style("codemirror", plugins_url('/css/codemirror.min.css', __FILE__));
			        wp_enqueue_script("codemirror", plugins_url('/js/codemirror.min.js', __FILE__));

			        wp_enqueue_script("mvp-admin", plugins_url('/js/admin_player_manager.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	


		        break;

		        case get_plugin_page_hookname( 'mvp_playlist_manager', 'mvp_settings' ):

		        	wp_enqueue_style("fa", $settings['fontAwesomeCssUrl']);//playlist icons

					//multi select
					wp_enqueue_style("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css");	
					wp_enqueue_script("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js", array('jquery'));

					wp_enqueue_script("mvp-ads", plugins_url('/js/admin_adcontent.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	

					wp_enqueue_script("mvp-admin", plugins_url('/js/admin_playlist_manager.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	

		        break;

		        case get_plugin_page_hookname( 'mvp_ad_manager', 'mvp_settings' ):

		        	wp_enqueue_script("mvp-ads", plugins_url('/js/admin_adcontent.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	

		        	wp_enqueue_script("mvp-admin", plugins_url('/js/admin_admanager.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	

		        break;

		        case get_plugin_page_hookname( 'mvp_shortcodes', 'mvp_settings' ):

		        	//we need ads and playlist manager because of quick shortcode generator
		        	wp_enqueue_script("mvp-ads", plugins_url('/js/admin_adcontent.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	

		        	wp_enqueue_script("mvp-admin", plugins_url('/js/admin_playlist_manager.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	

		        	wp_enqueue_script("mvp-shortcode", plugins_url('/js/admin_shortcode.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));	

		        break;

		        case get_plugin_page_hookname( 'mvp_demo', 'mvp_settings' ):

		        	wp_enqueue_script("mvp-admin", plugins_url('/js/admin_demo.js'."?rand=" . rand(), __FILE__), array('jquery', 'jquery-ui-sortable'));

		        break;
		    }

		    $l_data = array('plugins_url' => plugins_url('', __FILE__), 
							'fontAwesomeUrl' => $settings['fontAwesomeCssUrl'],	
				         	'ajax_url' => admin_url( 'admin-ajax.php'),
				         	'options' => $settings,
				         	'security'  => wp_create_nonce( 'mvp-security-nonce' ));

		    if(defined('MVP_SCHEDULE'))$l_data['mvp_schedule'] = '1';

			wp_localize_script('mvp-admin', 'mvp_data', $l_data); 

		}
	}

	function mvp_enqueue_scripts() {

		global $wpdb;
	    $settings_table = $wpdb->prefix . "mvp_settings";
	    $result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);

	    $default_settings = mvp_get_settings();

	    if($result){
	    	$settings = unserialize($result['options']) + $default_settings;
	    	$js_to_footer = isset($settings["js_to_footer"]) ? (bool)($settings["js_to_footer"]) : false;
	    }else{
	    	$settings = $default_settings;
	    	$js_to_footer = false;
	    }

	    $cache = '';
	    if($settings["preventCaching"])$cache = "?rand=" . rand();

	    //playlist icons
    	if($settings['add_font_awesome_css'] == '1')wp_enqueue_style('fontawesome', $settings['fontAwesomeCssUrl']);

		wp_enqueue_style('mvp', plugins_url('/source/css/mvp.css'.$cache, __FILE__));//main css

		wp_enqueue_script('mvp', plugins_url('/source/js/new.js'.$cache, __FILE__), array(), false, $js_to_footer);//main js

		wp_localize_script('mvp', 'mvp_data', array('ajax_url' => admin_url( 'admin-ajax.php'),
												   'security'  => wp_create_nonce( 'mvp-security-nonce' ))); 

	}

	//############################################//
	/* global */
	//############################################//

	function mvp_save_global_options(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['options'])){

			$settings = json_decode(stripcslashes($_POST['options']), true);

			global $wpdb;
			$wpdb->show_errors(); 
		    $settings_table = $wpdb->prefix . "mvp_settings";

			$id = $wpdb->get_row("SELECT id FROM {$settings_table}");
		    if($wpdb->num_rows > 0){

		    	$stmt = $wpdb->update(
			    	$settings_table,
					array('options' => serialize($settings)), 
					array('id' => 0),
					array('%s'),
					array('%d')
			    );

		    }else{

		    	$stmt = $wpdb->insert(
			    	$settings_table,
					array('options' => serialize($settings)), 
					array('%s')
			    );

		    }

			if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

	    	wp_die();

	    }else{
			wp_die();
		}

	}

	//############################################//
	/* player */
	//############################################//

	function mvp_duplicate_player(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['title']) && isset($_POST['player_id'])){

			$player_id = $_POST['player_id'];
			$title = stripslashes($_POST['title']);

			global $wpdb;
			$player_table = $wpdb->prefix . "mvp_players";

			$stmt = $wpdb->prepare("SELECT preset, options, custom_css, custom_js FROM {$player_table} WHERE id = %d", $player_id);//get player options
			
			if($stmt !== false){

				$result = $wpdb->get_row($stmt, ARRAY_A);

			    $stmt = $wpdb->insert(//copy player
			    	$player_table,
					array( 
						'title' => $title,
						'preset' => $result['preset'],
						'options' => $result['options'],
						'custom_css' => $result['custom_css'],
						'custom_js' => $result['custom_js']
					), 
					array( 
						'%s',
						'%s',
						'%s',
						'%s',
						'%s'
					) 
			    );

			    if($stmt !== false){
		    		echo json_encode($wpdb->insert_id);
		    	}

			}

		    wp_die();

		}else{
			wp_die();
		}

	}

	function mvp_create_player(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['title']) && isset($_POST['preset'])){

			$title = stripslashes($_POST['title']);
		    $preset = $_POST['preset'];

		    $default_options = mvp_player_options();
		    $preset_options = mvp_player_options_preset()[$preset];
			//$options = $default_options + $preset_options;
			$options = array_replace($default_options, $preset_options);//on add player we want to overwite options from individual preset. 

			global $wpdb;
			$player_table = $wpdb->prefix . "mvp_players";

			$stmt = $wpdb->insert(
		    	$player_table,
				array( 
					'title' => $title,
					'preset' => $preset,
					'options' => serialize($options)
				), 
				array( 
					'%s',
					'%s',
					'%s'				
				) 
		    );

		    if($stmt !== false){
	    		echo json_encode($wpdb->insert_id);
	    	}

		    wp_die();

		}else{
			wp_die();
		}
	}

	function mvp_edit_player_title(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['title']) && isset($_POST['id'])){

			$title = stripcslashes($_POST["title"]);
			$id = $_POST["id"];

			global $wpdb;
		    $player_table = $wpdb->prefix . "mvp_players";

		    $wpdb->update(
		    	$player_table,
				array( 
					'title' => $title
				), 
				array('id' => $id),
				array( 
					'%s'
				),
				array( 
					'%d'
				) 
		    );

		    wp_die();

		}else{
			wp_die();
		}
	}

	function mvp_delete_player(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['player_id'])){

			$player_id = $_POST['player_id'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $player_table = $wpdb->prefix . "mvp_players";

			$ids = explode(',',$player_id);
			$in = implode(',', array_fill(0, count($ids), '%d'));

		    $stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$player_table} WHERE id IN ($in)", $ids));

			if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_save_player_options(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['player_id'])){

			$player_id = $_POST['player_id'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $player_table = $wpdb->prefix . "mvp_players";

			$custom_css = !mvp_nullOrEmpty($_POST['custom_css']) ? $_POST['custom_css'] : NULL;
			$custom_js = !mvp_nullOrEmpty($_POST['custom_js']) ? $_POST['custom_js'] : NULL;
			$player_options = json_decode(stripcslashes($_POST['player_options']), true);

			$stmt = $wpdb->update(
		    	$player_table,
				array('options' => serialize($player_options), 'custom_css' => $custom_css, 'custom_js' => $custom_js), 
				array('id' => $player_id),
				array('%s','%s','%s'),
				array('%d')
		    );

		    if(isset($_POST['schedule'])){

				$schedule_table = $wpdb->prefix . "mvp_schedule";

				$schedule = json_decode(stripcslashes($_POST['schedule']), true);

				//check if exist
			    $wpdb->get_row($wpdb->prepare("SELECT id FROM $schedule_table WHERE player_id=%d", $player_id));

			    if($wpdb->num_rows == 0){//create entry

					$stmt = $wpdb->insert(
				    	$schedule_table,
						array( 
							'player_id' => $player_id,
							'options' => serialize($schedule)
						), 
						array( 
							'%d','%s'				
						) 
			    	);

			    }else{//update 

			    	$stmt = $wpdb->update(
				    	$schedule_table,
						array( 
							'options' => serialize($schedule)
						), 
						array( 
							'player_id' => $player_id
						), 
						array( 
							'%s'
						),
						array( 
							'%d'				
						) 
			    	);
			   
			    }

			}	

			if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_get_player_lang(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['lang'])){

	        $lang = stripslashes($_POST['lang']);

	        $locale = mvp_locale_data($lang);
	   
	        echo json_encode($locale);

	        wp_die();

	    }else{
	        wp_die();
	    }
	}


	//############################################//
	/* playlist */
	//############################################//

	function mvp_create_playlist(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['title'])){

			$title = stripslashes($_POST['title']);

			global $wpdb;
			$playlist_table = $wpdb->prefix . "mvp_playlists";

			$current_user = wp_get_current_user();

		    $stmt = $wpdb->insert(
		    	$playlist_table,
				array( 
					'title' => $title,
					'user_id' => $current_user->ID
				), 
				array( 
					'%s','%d'				
				) 
		    );

		    $lastid = $wpdb->insert_id;

		    if(isset($_POST['media_id'])){//from stats

		    	$media_id = $_POST['media_id'];
				$_ids = explode('_', $media_id);

				$ids = array();
				foreach($_ids as $id){
		            $ids[] = array("id" => $id);
		        }  

				mvp_duplicatePlaylist(null, $lastid, $ids, "playlist_id");

		    }else{

		    	if($stmt !== false){
		    		echo json_encode($lastid);
		    	}

		    }

		    wp_die();

		}else{
			wp_die();
		}
	}

	function mvp_save_playlist_options(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['playlist_id'])){

			$playlist_id = $_POST['playlist_id'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $playlist_table = $wpdb->prefix . "mvp_playlists";

		    $playlist_options = json_decode(stripcslashes($_POST['playlist_options']), true);

		    $stmt = $wpdb->update(
		    	$playlist_table,
				array('options' => serialize($playlist_options)), 
				array('id' => $playlist_id),
				array('%s'),
				array('%d')
		    );

	    	echo json_encode('SUCCESS');

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_edit_playlist_title(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['title']) && isset($_POST['id'])){

			$title = stripcslashes($_POST["title"]);
			$id = $_POST["id"];

			global $wpdb;
		    $playlist_table = $wpdb->prefix . "mvp_playlists";

		    $wpdb->update(
		    	$playlist_table,
				array( 
					'title' => $title
				), 
				array('id' => $id),
				array( 
					'%s'
				),
				array( 
					'%d'
				) 
		    );

		    wp_die();

		}else{
			wp_die();
		}
	}

	function mvp_delete_playlist(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['playlist_id'])){

			$playlist_id = $_POST['playlist_id'];
			$ids = explode(',',$playlist_id);
			$in = implode(',', array_fill(0, count($ids), '%d'));

			global $wpdb;
			$wpdb->show_errors(); 
		    $playlist_table = $wpdb->prefix . "mvp_playlists";
		    $media_table = $wpdb->prefix . "mvp_media";
		    $statistics_table = $wpdb->prefix . "mvp_video_statistics";
		    $ad_table = $wpdb->prefix . "mvp_ad";
			$annotation_table = $wpdb->prefix . "mvp_annotation";
			$path_table = $wpdb->prefix . "mvp_path";
			$subtitle_table = $wpdb->prefix . "mvp_subtitle";
			$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

		    //path
	    	$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$path_table} WHERE playlist_id IN ($in)", $ids));

	    	//sub
	    	$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$subtitle_table} WHERE playlist_id IN ($in)", $ids));

	    	//ad
	    	$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$ad_table} WHERE playlist_id IN ($in)", $ids));

	    	//ann
	    	$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$annotation_table} WHERE playlist_id IN ($in)", $ids));

	    	//media
	    	$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$media_table} WHERE playlist_id IN ($in)", $ids));

	    	//watched perc	
	    	$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$watched_percentage_table} WHERE playlist_id IN ($in)", $ids));

	    	//stat	
	    	if($wpdb->get_var( "show tables like '$statistics_table'" ) == $statistics_table){
		    	$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$statistics_table} WHERE playlist_id IN ($in)", $ids));
		    }

	    	//playlist
	    	$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$playlist_table} WHERE id IN ($in)", $ids));

			if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_duplicate_playlist(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['title']) && isset($_POST['playlist_id'])){

			$playlist_id = $_POST['playlist_id'];
			$title = stripslashes($_POST['title']);

			global $wpdb;
			$playlist_table = $wpdb->prefix . "mvp_playlists";

			//duplicate make new user id (only admin can duplicate)
			$options = $wpdb->get_var($wpdb->prepare("SELECT options FROM {$playlist_table} WHERE id = %d", $playlist_id));

		    $stmt = $wpdb->insert(
		    	$playlist_table,
				array( 
					'title' => $title,
					'options' => $options
				), 
				array( 
					'%s','%s'
				) 
		    );


			/*
			//duplicate preserve user id

			$results = $wpdb->get_row($wpdb->prepare("SELECT user_id, options FROM {$playlist_table} WHERE id = %d", $playlist_id), ARRAY_A);

		    $stmt = $wpdb->insert(
		    	$playlist_table,
				array( 
					'title' => $title,
					'options' => $results['options'],
					'user_id' => $results['user_id']
				), 
				array( 
					'%s','%s','%d'	
				) 
		    );*/

		    if($stmt !== false){//copy tracks

			    $lastid = $wpdb->insert_id;//playlist_id

		    	mvp_duplicatePlaylist($playlist_id, $lastid, null, "playlist_id");

			}

		    wp_die();

		}else{
			wp_die();
		}

	}

	function mvp_duplicatePlaylist($playlist_id = null, $lastid = null, $ids = null, $msg = null){

		global $wpdb;
		$wpdb->show_errors(); 
		$media_table = $wpdb->prefix . "mvp_media";
		$ad_table = $wpdb->prefix . "mvp_ad";
		$annotation_table = $wpdb->prefix . "mvp_annotation";
		$path_table = $wpdb->prefix . "mvp_path";
		$subtitle_table = $wpdb->prefix . "mvp_subtitle";

		$tn = 'mvp_temp_table'.time();
		$order_id = 0;

	    //copy playlist

		if($playlist_id != null){

			//get order
		    $stmt = $wpdb->get_row($wpdb->prepare("SELECT IFNULL(MAX(order_id)+1,0) AS order_id FROM {$media_table} WHERE playlist_id = %d", $lastid), ARRAY_A);
	        $order_id = $stmt['order_id'];
		}

		//copy tracks
		if($ids == null){
			$stmt = $wpdb->prepare("SELECT id FROM {$media_table} WHERE playlist_id = %d ORDER BY order_id", $playlist_id);
			$ids = $wpdb->get_results($stmt, ARRAY_A);
		}

		foreach ($ids as $id) {

			//duplicate tracks

			$stmt = $wpdb->query($wpdb->prepare("CREATE TEMPORARY TABLE {$tn} SELECT * FROM $media_table WHERE id=%d", $id['id']));

			//copy track by track
			if($stmt !== false){

				//media

				$wpdb->query("UPDATE {$tn} SET id=NULL, order_id=$order_id, playlist_id='$lastid'");//update playlist id
				$wpdb->query("INSERT INTO $media_table SELECT * FROM {$tn}");
				$last_media_insert_id = $wpdb->insert_id;//media_id
				$wpdb->query("DROP TABLE {$tn}");

				//copy path

				$wpdb->query($wpdb->prepare("CREATE TEMPORARY TABLE {$tn} SELECT * FROM $path_table WHERE media_id=%d", $id['id']));
				$wpdb->query("UPDATE {$tn} SET id=NULL, media_id='$last_media_insert_id'");//update media id
				$wpdb->query("INSERT INTO $path_table SELECT * FROM {$tn}");
				$wpdb->query("DROP TABLE {$tn}");

				//copy subtitles

				$wpdb->query($wpdb->prepare("CREATE TEMPORARY TABLE {$tn} SELECT * FROM $subtitle_table WHERE media_id=%d", $id['id']));
				$wpdb->query("UPDATE {$tn} SET id=NULL, media_id='$last_media_insert_id'");//update media id
				$wpdb->query("INSERT INTO $subtitle_table SELECT * FROM {$tn}");
				$wpdb->query("DROP TABLE {$tn}");

				//copy ads

				//media ads
				$wpdb->query($wpdb->prepare("CREATE TEMPORARY TABLE {$tn} SELECT * FROM $ad_table WHERE media_id=%d", $id['id']));
				$wpdb->query("UPDATE {$tn} SET id=NULL, media_id='$last_media_insert_id'");//update media id
				$wpdb->query("INSERT INTO $ad_table SELECT * FROM {$tn}");
				$wpdb->query("DROP TABLE {$tn}");

				//copy annotations

				//media annotations
				$wpdb->query($wpdb->prepare("CREATE TEMPORARY TABLE {$tn} SELECT * FROM $annotation_table WHERE media_id=%d", $id['id']));
				$wpdb->query("UPDATE {$tn} SET id=NULL, media_id='$last_media_insert_id'");//update media id
				$wpdb->query("INSERT INTO $annotation_table SELECT * FROM {$tn}");
				$wpdb->query("DROP TABLE {$tn}");

				$order_id++;

			}
			
		}

		if($msg != null){//for copy, move tracks
			if($stmt !== false){

				if($msg == "playlist_id"){//redirect to newly created playlist
					echo json_encode($lastid);
				}else if($msg == "copy_media" || $msg == "make_playlist"){
					echo json_encode("SUCCESS");
				}
	    		
	    	}
	    	wp_die();
		}
	}

	//############################################//
	/* favorites */
	//############################################//

	function mvp_get_favorites2(){
	 	
		if(isset($_POST['data'])){

			if(is_user_logged_in()){ 
			    $current_user = wp_get_current_user();

				global $wpdb;
			    $favorites_table = $wpdb->prefix . "mvp_favorites";

				//$data = json_decode(stripcslashes($_POST['data']), true); 
			
				/*$str = '(';
					foreach ($data as $d) {
						$str .= '( media_id = \''.$d['media_id'].'\' AND user_id = \''.$current_user->ID.'\')';
					}
				$str .= ')';*/

				$stmt = $wpdb->get_results($wpdb->prepare("SELECT media_id FROM $favorites_table WHERE user_id=%d", $current_user->ID), ARRAY_A);

				if($stmt !== false){
		    		echo json_encode($stmt);
		    	}

		    }

			wp_die();

		}else {
			wp_die();
		}
	}

	function mvp_get_favorites(){

		if(isset($_POST['playlist_id'])){

			$playlist_id = $_POST["playlist_id"];

			$current_user = wp_get_current_user();
			
			global $wpdb;
			$wpdb->show_errors(); 
			$favorites_table = $wpdb->prefix . "mvp_favorites";

			$stmt = $wpdb->get_results($wpdb->prepare("SELECT media_id FROM {$favorites_table} WHERE playlist_id = %d AND user_id=%d", $playlist_id, $current_user->ID), ARRAY_N);

			if($stmt !== false){

				$arr = array();
				foreach ($stmt as $s) {
					$arr[] = $s[0];
				}

			    echo json_encode($arr);
			}

		    wp_die();

		}else{
			wp_die();
		}

	}

	function mvp_add_to_favorites(){

		if(isset($_POST['media_id']) && isset($_POST['playlist_id'])){

			$media_id = $_POST["media_id"];
			$playlist_id = $_POST["playlist_id"];

			$current_user = wp_get_current_user();
			
			global $wpdb;
			$wpdb->show_errors(); 
			$favorites_table = $wpdb->prefix . "mvp_favorites";

			$stmt = $wpdb->insert(
				$favorites_table,
				array( 
					'playlist_id' => $playlist_id,
					'media_id' => $media_id,
					'user_id' => $current_user->ID
				), 
				array( 
					'%d','%d','%d'
				) 
		    );	

			if($stmt !== false){
			    echo json_encode(1);
			}

		    wp_die();

		}else{
			wp_die();
		}

	}

	function mvp_remove_from_favorites(){

		if(isset($_POST['media_id']) && isset($_POST['playlist_id'])){

			$media_id = intval($_POST["media_id"]);
			$playlist_id = intval($_POST["playlist_id"]);

			$current_user = wp_get_current_user();

			global $wpdb;
			$wpdb->show_errors(); 
			$favorites_table = $wpdb->prefix . "mvp_favorites";

			$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$favorites_table} WHERE media_id=%d AND user_id=%d AND playlist_id=%d", $media_id, $current_user->ID, $playlist_id));

			if($stmt !== false){
			    echo json_encode(1);
			}

		    wp_die();

		}else{
			wp_die();
		}

	}

	//############################################//
	/* media */
	//############################################//

	function mvp_update_media_order(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['media_id_arr']) && isset($_POST['order_id_arr']) && isset($_POST['playlist_id'])){

			$media_id_arr = explode(",",$_POST["media_id_arr"]);
			$order_id_arr = explode(",",$_POST["order_id_arr"]);
			$playlist_id = $_POST["playlist_id"];

			global $wpdb;
			$wpdb->show_errors(); 

		    $media_table = $wpdb->prefix . "mvp_media";

		    for($i=0;$i<count($media_id_arr);$i++) {

		        $stmt = $wpdb->update(
			    	$media_table,
					array( 
						'order_id' => $order_id_arr[$i]
					), 
					array('playlist_id' => $playlist_id, 'id' => $media_id_arr[$i]),
					array( 
						'%d'
					),
					array( 
						'%d','%d'
					) 
			    );

		    }

		    echo json_encode($stmt);

		    wp_die();

		}else{
			wp_die();
		}
	}

	function mvp_delete_media(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		header("Content-Type: application/json");

		if(isset($_POST['media_id'])){

			$media_id = $_POST['media_id'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $media_table = $wpdb->prefix . "mvp_media";
		    $statistics_table = $wpdb->prefix . "mvp_video_statistics";

			$ids = explode(',',$media_id);
			$in = implode(',', array_fill(0, count($ids), '%d'));

		    $stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$media_table} WHERE id IN ($in)", $ids));

			if($stmt !== false){

				if($wpdb->get_var( "show tables like '$statistics_table'" ) == $statistics_table){
					$wpdb->query($wpdb->prepare("DELETE FROM {$statistics_table} WHERE media_id IN ($in)", $ids));
	    		}

	    		echo json_encode($stmt);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_copy_media(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		header("Content-Type: application/json");

		if(isset($_POST['media_id']) && isset($_POST['destination_playlist_id'])){

			$media_id = $_POST['media_id'];
			$lastid = $_POST['destination_playlist_id'];

			$ids = explode(',',$media_id);

			$id_arr = array();
			foreach ($ids as $id) {
				$id_arr[] = array('id' => $id);
			}

	        mvp_duplicatePlaylist(null, $lastid, $id_arr, true);
	    	
		}else{
			wp_die();
		}
	}

	function mvp_move_media(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		header("Content-Type: application/json");

		if(isset($_POST['media_id']) && isset($_POST['destination_playlist_id'])){

			$media_id = $_POST['media_id'];
			$destination_playlist_id = $_POST['destination_playlist_id'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $media_table = $wpdb->prefix . "mvp_media";

			$ids = explode(',',$media_id);
			$in = implode(',', array_fill(0, count($ids), '%d'));

			//only update playlist_id

			$stmt = $wpdb->query($wpdb->prepare("UPDATE {$media_table} SET playlist_id = $destination_playlist_id WHERE id IN ($in)", $ids));

			if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_edit_media(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['media_id'])){

			$media_id = $_POST['media_id'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $media_table = $wpdb->prefix . "mvp_media";
		    $path_table = $wpdb->prefix . "mvp_path";
		    $subtitle_table = $wpdb->prefix . "mvp_subtitle";
		    $ad_table = $wpdb->prefix . "mvp_ad";
		    $annotation_table = $wpdb->prefix . "mvp_annotation";

		    //media

		    $stmt = $wpdb->prepare("SELECT title, options FROM {$media_table} WHERE id = %d", $media_id);
		    $result = $wpdb->get_row($stmt, ARRAY_A);
		    $data = unserialize($result['options']);

		    $data['title'] = $result['title'];

		    //path

		    $paths = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$path_table} WHERE media_id = %d", $media_id), ARRAY_A);

		    $multi_path_query_result = array();
		    foreach($paths as $item){
		        $multi_path_query_result[] = unserialize($item['options']);
		    }

		    //subtitle

		    $stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$subtitle_table} WHERE media_id = %d", $media_id), ARRAY_A);

		    $subtitle_query_result = array();
		    foreach($stmt as $item){
		        $subtitle_query_result[] = unserialize($item['options']);
		    }

			//ads

			$stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE media_id = %d", $media_id), ARRAY_A);
		    $ad_data = array();
		    foreach($stmt as $item){
		        $ad_data[] = unserialize($item['options']);
		    }

		    //annotations

			$stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE media_id = %d", $media_id), ARRAY_A);
		    $annotation_data = array();
		    foreach($stmt as $item){
		        $annotation_data[] = unserialize($item['options']);
		    }

			if($stmt !== false){
	    		$arr = array(
					"data" => $data,
					"multi_path_query_result" => $multi_path_query_result,
					"subtitle" => $subtitle_query_result,
					"ad_data" => $ad_data,
					"annotation_data" => $annotation_data
	    		);
	    		echo json_encode($arr);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_domain_rename(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['playlist_id'])){

			$playlist_id = $_POST['playlist_id'];
			$from = $_POST['from'];
			$to = $_POST['to'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $media_table = $wpdb->prefix . "mvp_media";
		    $path_table = $wpdb->prefix . "mvp_path";
		    $subtitle_table = $wpdb->prefix . "mvp_subtitle";

		    //media
			$stmt = $wpdb->prepare("SELECT id, options FROM $media_table WHERE playlist_id = %d", $playlist_id);

			$medias = $wpdb->get_results($stmt, ARRAY_A);

			$media_arr = array();

			foreach ($medias as $media) {

				$media_id = $media['id'];
				$options = unserialize($media['options']);

				$type = $options['type'];

				if(isset($options['mp4']))$options['mp4'] = str_replace($from, $to, $options['mp4']);

				if(isset($options['poster']))$options['poster'] = str_replace($from, $to, $options['poster']);

				if(isset($options['download']))$options['download'] = str_replace($from, $to, $options['download']);

				if(isset($options['hover_preview']))$options['hover_preview'] = str_replace($from, $to, $options['hover_preview']);

				if(isset($options['slideshow_images'])){
					$options['slideshow_images'] = str_replace($from, $to, $options['slideshow_images']);
				}

				if(isset($options['thumb']))$options['thumb'] = str_replace($from, $to, $options['thumb']);

				if(isset($options['preview_seek']))$options['preview_seek'] = str_replace($from, $to, $options['preview_seek']);

				if(isset($options['chapters']))$options['chapters'] = str_replace($from, $to, $options['chapters']);

				if(isset($options['vast']))$options['vast'] = str_replace($from, $to, $options['vast']);


				$stmt = $wpdb->update(
			    	$media_table,
					array( 
						'options' => serialize($options), 
					), 
					array('id' => $media_id),
					array( 
						'%s'
					),
					array( 
						'%d'
					) 
			    );

				
				//path

			    $paths = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$path_table} WHERE media_id = %d", $media_id), ARRAY_A);

			    $media_path = array();
			    foreach($paths as $item){
			    	$mp = unserialize($item['options']);
			    	$mp['path'] = str_replace($from, $to, $mp['path']); 
			        $media_path[] = $mp;

			    }

			    //delete current values 
				$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$path_table} WHERE media_id = %d", $media_id));

		    	//multi path
		    	if($type == 'video' || $type == 'audio'){

		    		for($i = 0; $i < count($media_path); $i++){   

			    		$stmt = $wpdb->insert(
					    	$path_table,
							array( 
								'options' => serialize($media_path[$i]), 
								'media_id' => $media_id,
								'playlist_id' => $playlist_id
							), 
							array( 
								'%s','%d','%d'
							) 
					    );	

			    	}

			    }else{//path

		    		$stmt = $wpdb->insert(
				    	$path_table,
						array( 
							'options' => serialize($media_path[0]), 
							'media_id' => $media_id,
							'playlist_id' => $playlist_id
						), 
						array( 
							'%s','%d','%d'
						) 
				    );	

			    }

			    //subtitles

			    $subtitles = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$subtitle_table} WHERE media_id = %d", $media_id), ARRAY_A);

			    $subtitle_query_result = array();
			    foreach($subtitles as $item){
			    	$mp = unserialize($item['options']);
			        if(isset($mp['src']))$mp['src'] = str_replace($from, $to, $mp['src']); 
			        $subtitle_query_result[] = $mp;
			    }

		    	//delete current values
				$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$subtitle_table} WHERE media_id = %d", $media_id));

		    	//new values

	    		for($i = 0; $i < count($subtitle_query_result); $i++){    

		    		$stmt = $wpdb->insert(
				    	$subtitle_table,
						array( 
							'options' => serialize($subtitle_query_result[$i]), 
							'media_id' => $media_id,
							'playlist_id' => $playlist_id
						), 
						array( 
							'%s','%d','%d'
						) 
				    );	

		    	}

			}
		   
	    	echo json_encode("");

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_add_media(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['options']) && isset($_POST['playlist_id'])){

			$options = json_decode(stripcslashes($_POST['options']), true);
			$playlist_id = $_POST['playlist_id'];
			$save_type = $_POST['save_type'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $media_table = $wpdb->prefix . "mvp_media";
		    $path_table = $wpdb->prefix . "mvp_path";
		    $subtitle_table = $wpdb->prefix . "mvp_subtitle";
		    $ad_table = $wpdb->prefix . "mvp_ad";
		    $annotation_table = $wpdb->prefix . "mvp_annotation";

		    $type = $_POST['type'];
		    $media_title = str_replace('"', "'", stripslashes($_POST['title']));

		    $first_insert_happend = null;


		    $current_user = wp_get_current_user();

		    if($save_type == 'add_media'){

		    	if(!empty($_POST['additional_playlist'])){
					$additional_playlist = explode(",", $_POST['additional_playlist']);
					$additional_playlist[] = $playlist_id;
				}else{
					$additional_playlist = array($playlist_id);
				}

				foreach ($additional_playlist as $playlist_to_insert) {

					$playlist_id = $playlist_to_insert;

					//media order
			        $stmt = $wpdb->get_row($wpdb->prepare("SELECT IFNULL(MAX(order_id)+1,0) AS order_id FROM {$media_table} WHERE playlist_id = %d", $playlist_id), ARRAY_A);
			        $order_id = $stmt['order_id'];

				    $stmt = $wpdb->insert(
				    	$media_table,
						array( 
							'title' => $media_title, 
							'options' => serialize($options), 
							'playlist_id' => $playlist_id,
							'order_id' => $order_id,
							'user_id' => $current_user->ID
						), 
						array( 
							'%s','%s','%d','%d','%d'
						) 
				    );

				    if($stmt !== false){

				    	$insert_id = $wpdb->insert_id;

				    	//multi path
				    	if($type == 'video' || $type == 'audio'){

				    		$media_path = json_decode(stripcslashes($_POST['media_path']), true);

				    		for($i = 0; $i < count($media_path); $i++){    

					    		$stmt = $wpdb->insert(
							    	$path_table,
									array( 
										'options' => serialize($media_path[$i]), 
										'media_id' => $insert_id,
										'playlist_id' => $playlist_id
									), 
									array( 
										'%s','%d','%d'
									) 
							    );	

					    	}

					    }else{//path

					    	$media_path = json_decode(stripcslashes($_POST['media_path']), true);

				    		$stmt = $wpdb->insert(
						    	$path_table,
								array( 
									'options' => serialize($media_path[0]), 
									'media_id' => $insert_id,
									'playlist_id' => $playlist_id
								), 
								array( 
									'%s','%d','%d'
								) 
						    );	

					    }

					    //subtitles

				    	if(!empty($_POST['subtitle_src'])){

				    		$subtitle_src = json_decode(stripcslashes($_POST['subtitle_src']), true);

				    		for($i = 0; $i < count($subtitle_src); $i++){    

					    		$stmt = $wpdb->insert(
							    	$subtitle_table,
									array( 
										'options' => serialize($subtitle_src[$i]), 
										'media_id' => $insert_id,
										'playlist_id' => $playlist_id
									), 
									array( 
										'%s','%d','%d'
									) 
							    );	

					    	}
				    		
					    }

				    	//ads

				    	if(!empty($_POST['ad_pre'])){
				    		
				    		$ad_pre = json_decode(stripcslashes($_POST['ad_pre']), true);

				    		for($i = 0; $i < count($ad_pre); $i++){  

				    			$stmt = $wpdb->insert(
							    	$ad_table,
									array( 
										'options' => serialize($ad_pre[$i]), 
										'media_id' => $insert_id,
										'playlist_id' => $playlist_id
									), 
									array( 
										'%s','%d','%d'
									) 
							    );

							}
					    	
				    	}

				    	if(!empty($_POST['ad_mid'])){
				    		
				    		$ad_mid = json_decode(stripcslashes($_POST['ad_mid']), true);

				    		for($i = 0; $i < count($ad_mid); $i++){  

				    			$stmt = $wpdb->insert(
							    	$ad_table,
									array( 
										'options' => serialize($ad_mid[$i]), 
										'media_id' => $insert_id,
										'playlist_id' => $playlist_id
									), 
									array( 
										'%s','%d','%d'
									) 
							    );

					    	}
					    	
				    	}

				    	if(!empty($_POST['ad_end'])){

				    		$ad_end = json_decode(stripcslashes($_POST['ad_end']), true);

				    		for($i = 0; $i < count($ad_end); $i++){  

				    			$stmt = $wpdb->insert(
							    	$ad_table,
									array( 
										'options' => serialize($ad_end[$i]), 
										'media_id' => $insert_id,
										'playlist_id' => $playlist_id
									), 
									array( 
										'%s','%d','%d'
									) 
							    );

					    	}
				    	
				    	}


				    	//annotations

						if(!empty($_POST['annotation'])){
				    		
				    		$annotation = json_decode(stripcslashes($_POST['annotation']), true);

				    		for($i = 0; $i < count($annotation); $i++){  

							    $stmt = $wpdb->insert(
							    	$annotation_table,
									array( 
										'options' => serialize($annotation[$i]), 
										'media_id' => $insert_id,
										'playlist_id' => $playlist_id
									), 
									array( 
										'%s','%d','%d'
									) 
							    );	

					    	}
				    	}

				    }//if($stmt !== false){


				    if(!$first_insert_happend){
				    	 $first_insert_happend = true;

				    	 if($stmt !== false){
							$data = array('insert_id' => $insert_id,
							 			  'order_id' => $order_id);
				    		echo json_encode($data);
				    	}
				    }

				}//foreach ($additional_playlist as $playlist_to_insert) {

		    }else{//edit media

		    	$media_id = $_POST['media_id'];

				$stmt = $wpdb->update(
			    	$media_table,
					array( 
						'title' => $media_title, 
						'options' => serialize($options), 
					), 
					array('id' => $media_id),
					array( 
						'%s','%s'
					),
					array( 
						'%d'
					) 
			    );

			    //path

		    	//delete current values 
				$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$path_table} WHERE media_id = %d", $media_id));
		    	//multi path
		    	if($type == 'video' || $type == 'audio'){

		    		$media_path = json_decode(stripcslashes($_POST['media_path']), true);

		    		for($i = 0; $i < count($media_path); $i++){    

			    		$stmt = $wpdb->insert(
					    	$path_table,
							array( 
								'options' => serialize($media_path[$i]), 
								'media_id' => $media_id,
								'playlist_id' => $playlist_id
							), 
							array( 
								'%s','%d','%d'
							) 
					    );	

			    	}

			    }else{//path

			    	$media_path = json_decode(stripcslashes($_POST['media_path']), true);

		    		$stmt = $wpdb->insert(
				    	$path_table,
						array( 
							'options' => serialize($media_path[0]), 
							'media_id' => $media_id,
							'playlist_id' => $playlist_id
						), 
						array( 
							'%s','%d','%d'
						) 
				    );	

			    }

			    //subtitles

		    	//delete current values
				$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$subtitle_table} WHERE media_id = %d", $media_id));

		    	//new values
		    	if(!empty($_POST['subtitle_src'])){

		    		$subtitle_src = json_decode(stripcslashes($_POST['subtitle_src']), true);

		    		for($i = 0; $i < count($subtitle_src); $i++){    

			    		$stmt = $wpdb->insert(
					    	$subtitle_table,
							array( 
								'options' => serialize($subtitle_src[$i]), 
								'media_id' => $media_id,
								'playlist_id' => $playlist_id
							), 
							array( 
								'%s','%d','%d'
							) 
					    );	

			    	}
		    		
			    }


		    	//ads

		    	//delete current values
				$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$ad_table} WHERE media_id = %d", $media_id));

		    	if(!empty($_POST['ad_pre'])){
		    		
		    		$ad_pre = json_decode(stripcslashes($_POST['ad_pre']), true);

		    		for($i = 0; $i < count($ad_pre); $i++){  

		    			$stmt = $wpdb->insert(
					    	$ad_table,
							array( 
								'options' => serialize($ad_pre[$i]), 
								'media_id' => $media_id,
								'playlist_id' => $playlist_id
							), 
							array( 
								'%s','%d','%d'
							) 
					    );

					}
			    	
		    	}

		    	if(!empty($_POST['ad_mid'])){
		    		
		    		$ad_mid = json_decode(stripcslashes($_POST['ad_mid']), true);

		    		for($i = 0; $i < count($ad_mid); $i++){  

		    			$stmt = $wpdb->insert(
					    	$ad_table,
							array( 
								'options' => serialize($ad_mid[$i]), 
								'media_id' => $media_id,
								'playlist_id' => $playlist_id
							), 
							array( 
								'%s','%d','%d'
							) 
					    );

			    	}
			    	
		    	}

		    	if(!empty($_POST['ad_end'])){

		    		$ad_end = json_decode(stripcslashes($_POST['ad_end']), true);

		    		for($i = 0; $i < count($ad_end); $i++){  

		    			$stmt = $wpdb->insert(
					    	$ad_table,
							array( 
								'options' => serialize($ad_end[$i]), 
								'media_id' => $media_id,
								'playlist_id' => $playlist_id
							), 
							array( 
								'%s','%d','%d'
							) 
					    );

			    	}
		    	
		    	}


		    	//annotations

		    	//delete current values
				$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$annotation_table} WHERE media_id = %d", $media_id));

				if(!empty($_POST['annotation'])){
		    		
		    		$annotation = json_decode(stripcslashes($_POST['annotation']), true);

		    		for($i = 0; $i < count($annotation); $i++){  

					    $stmt = $wpdb->insert(
					    	$annotation_table,
							array( 
								'options' => serialize($annotation[$i]), 
								'media_id' => $media_id,
								'playlist_id' => $playlist_id
							), 
							array( 
								'%s','%d','%d'
							) 
					    );	

			    	}
		    	}	

				if($stmt !== false){
		    		echo json_encode('SUCCESS');
		    	}
		    }

		    wp_die();

		}else{

			wp_die();
		}

	}

	function mvp_add_media_multiple(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['media']) && isset($_POST['playlist_id'])){

			$media = json_decode(stripcslashes($_POST['media']), true);
			$playlist_id = $_POST['playlist_id'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $media_table = $wpdb->prefix . "mvp_media";
		    $path_table = $wpdb->prefix . "mvp_path";

		    $current_user = wp_get_current_user();

		    $data = array();

		    $stmt = $wpdb->get_row($wpdb->prepare("SELECT IFNULL(MAX(order_id)+1,0) AS order_id FROM {$media_table} WHERE playlist_id = %d", $playlist_id), ARRAY_A);
			$order_id = intval($stmt['order_id']);

		    $len = count($media);
			for($i=0; $i < $len; $i++){ 

			    $options = $media[$i];

			    $media_title = isset($options['title']) ? $options['title'] : '';

				$stmt = $wpdb->insert(
			    	$media_table,
					array( 
						'title' => $media_title, 
						'options' => serialize($options), 
						'playlist_id' => $playlist_id,
						'order_id' => $order_id,
						'user_id' => $current_user->ID
					), 
					array( 
						'%s','%s','%d','%d','%d'
					) 
			    );

				if($stmt !== false){

					$insert_id = $wpdb->insert_id;

					$order_id++;

					$data[] = array('insert_id' => $insert_id,
					 			'order_id' => $order_id,
					 			'options' => $options);


					//multi path

		    		$media_path = array("path" => $options['path'], "quality_title" => "hd");

		    		$stmt = $wpdb->insert(
				    	$path_table,
						array( 
							'options' => serialize($media_path), 
							'media_id' => $insert_id,
							'playlist_id' => $playlist_id
						), 
						array( 
							'%s','%d','%d'
						) 
				    );	
		   

				}

			}

			if($stmt !== false){
				echo json_encode($data);
			}
			
	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_set_disabled(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['media_id'])){


			$media_id = $_POST['media_id'];
			$disabled = $_POST['disabled'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $media_table = $wpdb->prefix . "mvp_media";


		    $stmt = $wpdb->query($wpdb->prepare("UPDATE {$media_table} SET disabled = %s WHERE id = %d", $disabled, $media_id));

		    echo json_encode("");

			wp_die();

		}else{
			wp_die();
		}

	}

	function mvp_set_disabled_all(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['media_id'])){

			$media_id = $_POST['media_id'];
			$disabled = $_POST['disabled'];

			$ids = explode(',',$media_id);
			$in = implode(',', array_fill(0, count($ids), '%d'));

			global $wpdb;
			$wpdb->show_errors(); 
		    $media_table = $wpdb->prefix . "mvp_media";

		    $stmt = $wpdb->query($wpdb->prepare("UPDATE {$media_table} SET disabled = %s WHERE id IN ($in)", $disabled, ...$ids));


		    echo json_encode("");

			wp_die();

		}else{
			wp_die();
		}

	}

	

	function mvp_shortcode_media($m, $options, $include_all = true){

		$encryptMediaPaths = $options['encryptMediaPaths'];

	    global $wpdb;
	    $path_table = $wpdb->prefix . "mvp_path";
	    $subtitle_table = $wpdb->prefix . "mvp_subtitle";
	    $ad_table = $wpdb->prefix . "mvp_ad";
	    $annotation_table = $wpdb->prefix . "mvp_annotation";

	    $media = unserialize($m['options']);   

	    $type = $media["type"];

	    $track = '<div class="mvp-playlist-item" data-type="'.$type.'" data-media-id="'.$m["id"].'" ';
	    
	    //path
	    $paths = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$path_table} WHERE media_id = %d", $m["id"]), ARRAY_A);

	    $custom_html = null;

	    if($wpdb->num_rows > 0){
	        
	        if($type == "video" || $type == "audio"){

	        	$quality;
	        	$quality_mobile;

	            $path = 'data-path=\'[';
	            foreach($paths as $r){

	                $row = unserialize($r['options']);

	                if($type == "video"){
	                    $ext = "mp4";
	                }else if($type == "audio"){
	                    $ext = pathinfo($row['path'], PATHINFO_EXTENSION);
	                    if(mvp_nullOrEmpty($ext))$ext = "mp3";
	                }

	                if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($row['path']);
	                else $p = $row['path'];

	                $path .= '{"quality": "'.$row['quality_title'].'", "'.$ext.'": "'.$p.'"},';

	                if(!empty($row["def"]) && $row["def"] == $row['quality_title']){
	                    $quality = $row["quality_title"];
	                }
	                if(!empty($row["defMobile"]) && $row["defMobile"] == $row['quality_title']){
	                    $quality_mobile = $row["quality_title"];
	                }
	               
	            }
	            $path = substr_replace($path, "", -1);//remove last comma
	            $path .= ']\' ';

	            if(isset($quality)){
	                $path .= 'data-quality="'.$quality.'" ';
	            }
	            if(isset($quality_mobile)){
	                $path .= 'data-quality-mobile="'.$quality_mobile.'" ';
	            }

	        }else{

	            $prefix='';
	            if($type == "folder_video" || $type == "folder_audio" || $type == "folder_image" || $type == "folder_hls" || $type == "folder_dash"){

				    if(!isset($media["folder_custom_url"]) || $media["folder_custom_url"] == '0'){
				    	$prefix = MVP_FILE_DIR;
				    }
	            }

	            foreach($paths as $r){//only one

	                $row = unserialize($r['options']);

	                if($type == "custom_html"){

	                	$custom_html = $row['path'];
	                	$custom_html_id = 'custom_html_id_'.mt_rand();
	                	$p = $custom_html_id;

	                }else{

		                if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($prefix.$row['path']);
		                else $p = $prefix.$row['path'];

	                }

					if($type == "s3_bucket_video" || $type == "s3_video" || $type == "s3_bucket_audio" || $type == "s3_audio"){	    
			        	$path = 'data-bucket="'.$p.'" ';
					}else{
						$path = 'data-path="'.$p.'" ';
					}

					if($type == "folder_video" || $type == "folder_audio" || $type == "folder_image" || $type == "folder_hls" || $type == "folder_dash"){
						if(!isset($media["folder_custom_url"]) || $media["folder_custom_url"] == '0'){
	                		$path .= 'data-content-url="'.MVP_FILE_DIR_URL.$row['path'].'" ';
	                	}
	                }

	                if(!empty($row["quality_title"])){//yt?
	                    $path .= 'data-quality="'.$row["quality_title"].'" ';
	                }
	                if(!empty($row["mp4"])){
	                    $path .= 'data-mp4="'.$row["mp4"].'" ';
	                }

	                

	            }

	        }

	        $track .= $path;
	    }

	    if(!empty($media["exclude"])){
	        $track .= ' data-exclude="'.$media["exclude"].'"';
		}

	    if(!empty($media["bkey"])){
	        if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($media['bkey']);
	        else $p = $media['bkey'];

	        $track .= ' data-key="'.$p.'"';
		}

	    if(isset($media["account_type"])){
	        $track .= 'data-user-account="'.$media["account_type"].'" ';
	    }
	    if(isset($media["upload_date"])){
	        $track .= 'data-upload-date="'.$media["upload_date"].'" ';
	    }
	    if(!empty($media["noapi"])){
            $track .= 'data-noapi="1" ';
        }
        if(isset($media["lock_time"])){
	        $track .= 'data-lock-time="'.$media["lock_time"].'" ';
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
	    if(!empty($media["islive"])){
	        $track .= 'data-live-stream="1" ';
	    }
	    if(!empty($media["thumb"])){
	        $track .= 'data-thumb="'.$media["thumb"].'" ';
	    }
	    if(!empty($media["alt_text"])){
	        $track .= 'data-alt="'.$media["alt_text"].'" ';
	    }
	    if(!empty($m["title"])){//$m["title"] because title is sepearated from options!
	        $track .= 'data-title="'.trim($m["title"]).'" ';
	    }
	    if(!empty($media["date"])){
	        $track .= 'data-date="'.$media["date"].'" ';
	    }
	    if(!empty($media["description"])){
	        $track .= 'data-description="'.trim($media["description"]).'" ';
	    }

	    //stat
	    if(!empty($m["c_play"])){
	        $track .= 'data-play-count="'.trim($m["c_play"]).'" ';
	    }

	    if(!empty($media["slideshow_images"])){
	        $track .= 'data-slideshow-images="'.$media["slideshow_images"].'" ';
	    }
	    if(!empty($media["poster"])){
	        $track .= 'data-poster="'.$media["poster"].'" ';
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
	    if(!empty($media["duration"])){
	        $track .= 'data-duration="'.$media["duration"].'" ';
	    }
	    if(!empty($media["playback_rate"])){
	        $track .= 'data-playback-rate="'.$media["playback_rate"].'" ';
	    }
	    if(!empty($media["user_id"])){
	        $track .= 'data-user-id="'.$media["user_id"].'" ';
	    }
	    if(!empty($media["chapters"])){
	        $track .= 'data-chapters="'.$media["chapters"].'" ';

	        if(!empty($media["chapters_cors"])){
		        $track .= 'data-chapters-cors="'.$media["chapters_cors"].'" ';
		    }
	    }
	    if(!empty($media["vast"])){
	        $track .= 'data-vast="'.$media["vast"].'" ';

	        if(isset($media["vast_loop"])){
                $track .= ' data-vast-loop="1" ';
            }
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

	    if(isset($media["pi_icons"])){

	        $track .= ' data-playlist-icons=\'[';
	        $pi_icons = '';

	        foreach ($media["pi_icons"] as $icon) {

	        	$pi_icons .= '{';

	        	if(isset($icon['icon']))$pi_icons .= '"icon": "'.$icon['icon'].'"';
	        	if(isset($icon['rel']))$pi_icons .= ',"rel": "'.esc_attr($icon['rel']).'"';
	        	if(isset($icon['title']))$pi_icons .= ',"title": "'.esc_attr($icon['title']).'"';
	        	if(isset($icon['url']))$pi_icons .= ',"url": "'.esc_url($icon['url']).'"';
	        	if(isset($icon['target']))$pi_icons .= ',"target": "'.$icon['target'].'"';	
	        	if(isset($icon['class']))$pi_icons .= ',"class": "'.esc_attr($icon['class']).'"';	

	        	$pi_icons .= '},';			

	        }
	        $pi_icons = substr($pi_icons, 0, -1);//remove last comma

	        $track .= $pi_icons;
	        $track .= ']\''; 
	    }


	    if($type == "folder"){
		    if(!empty($media["folder_sort"])){
		        $track .= 'data-sort="'.$media["folder_sort"].'" ';
		    }
		    if(!empty($media["id3"])){
		        $track .= 'data-id3="'.$media["id3"].'" ';
		    }
		}
		else if($type == "gdrive_folder"){	    
		    if(!empty($media["gdrive_sort"])){
		        $track .= ' data-sort="'.$media["gdrive_sort"].'"';
		    }
		}
		else if($type == "onedrive_folder"){	    
		    if(!empty($media["onedrive_sort"])){
		        $track .= ' data-sort="'.$media["onedrive_sort"].'"';
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
	    if(!empty($media["age_verify"])){
	        $track .= 'data-age-verify="'.$media["age_verify"].'" ';
	    }
	    if(!empty($media["width"])){
	        $track .= 'data-width="'.$media["width"].'" ';
	    } 
	    if(!empty($media["height"])){
	        $track .= 'data-height="'.$media["height"].'" ';
	    } 


	    $track .= '>';

	    //custom html
	    if($custom_html){
	    	$track .= '<div class="mvp-custom-html" id="'.$custom_html_id.'">'.$custom_html.'</div>';
	    }

	    if($include_all){//reel dont use the rest

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

		    //subtitles
		    $subtitles = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$subtitle_table} WHERE media_id = %d", $m["id"]), ARRAY_A);

		    if($wpdb->num_rows > 0){
		        
		        $subtitle = '<div class="mvp-subtitles">';
		        foreach($subtitles as $r){

		            $row = unserialize($r['options']);

		            if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($row['src']);
		            else $p = $row['src'];

		            $subtitle .= '<div data-label="'.$row["label"].'" data-src="'.$p.'"';

		            if(!empty($row["def"]) && $row["def"] == $row["label"]){
		                $subtitle .= ' data-default';
		            }

		            if(!empty($row["cors"])){
		                $subtitle .= ' data-cors="'.$row["cors"].'"';
		            }

		            $subtitle .= '></div>';
		           
		        }
		        $subtitle .= '</div>';//end mvp-subtitles
		        
		        $track .= $subtitle;
		    }

		    //ads
	        $stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE media_id = %d", $m["id"]), ARRAY_A);
	        if($wpdb->num_rows > 0){
	            $ad_data = array();
	            foreach($stmt as $item){
	                $ad_data[] = unserialize($item['options']);
	            }

	            //randomize ad comes from media
	            $ad_options = array();
				$ad_options["randomizeAdPre"] = isset($media["randomizeAdPre"]) ? $media["randomizeAdPre"] : '0';
				$ad_options["randomizeAdEnd"] = isset($media["randomizeAdEnd"]) ? $media["randomizeAdEnd"] : '0';
		
	            include('includes/shortcode_ad_data.php');
	        }

		    //annotations
	        $stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE media_id = %d", $m["id"]), ARRAY_A);
	        if($wpdb->num_rows > 0){
	            $annotation_data = array();
	            foreach($stmt as $item){
	                $annotation_data[] = unserialize($item['options']);
	            }
	            include('includes/shortcode_annotation_data.php');
	        }

		    /*if(!empty($media["custom_content"])){
		        $track .= $media["custom_content"];
		    }*/

		    if(!empty($media["description_custom"])){
		        $track .= '<div class="mvp-custom-playlist-item-description">'.$media["description_custom"].'</div>';
		    }

		}



	    $track .= '</div>';//end div

	    return $track.PHP_EOL;

	}


	//############################################//
	/* export player */
	//############################################//

	function mvp_export_player(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['player_id']) && isset($_POST['player_title'])){

			$player_id = $_POST['player_id'];
			$player_title = $_POST['player_title'];

			global $wpdb;
			$wpdb->show_errors(); 

		    $player_table = $wpdb->prefix . "mvp_players";

			// create zip file
			$zipname = 'mvp_player_id_'.$player_id.'_'.$player_title.'_'.date('m-d-Y_hia').'.zip';
			$zip = new ZipArchive;

			$upload_path1 = MVP_FILE_DIR."/plzip/";
			$zip->open($upload_path1.$zipname, ZipArchive::CREATE);

			//player
			$stmt = $wpdb->prepare("SELECT id, title, preset, options, custom_css, custom_js FROM {$player_table} WHERE id = %d", $player_id);//we need to select in specific order for bulk import!
			$result = $wpdb->get_results($stmt, ARRAY_N);
			mvp_getOutput("mvp_players", $result, $zip);

			// close the archive
			$zip->close();

			$upload_path2 = MVP_FILE_DIR_URL."/plzip/";
			echo json_encode(array('zip' => $upload_path2.$zipname, 'zip_clean' => $upload_path1.$zipname));

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_import_player(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		header("Content-Type: application/json");

		$posted_data =  isset( $_POST ) ? $_POST : array();
		$file_data = isset( $_FILES ) ? $_FILES : array();

		$data = array_merge( $posted_data, $file_data );

		$fileName = $data["mvp_file_upload"]["name"];
		$temp_name = $data["mvp_file_upload"]["tmp_name"];
		$fileError = $data["mvp_file_upload"]["error"];
		$upload_path = MVP_FILE_DIR."/plzip/";

		$response = array();

		if($fileError > 0){

			$error = array(
				0 => "There is no error, the file uploaded with success",
				1 => "The uploaded file exceeds the upload_max_files in server settings",
				2 => "The uploaded file exceeds the MAX_FILE_SIZE from html form",
				3 => "The uploaded file uploaded only partially",
				4 => "No file was uploaded",
				6 => "Missing a temporary folder",
				7 => "Failed to write file to disk",
				8 => "A PHP extension stoped file to upload" );

			$response["response"] = "ERROR";
            $response["error"] = $error[ $fileError ];

		} else {

			if( move_uploaded_file( $temp_name, $upload_path.$fileName ) ){
	            		
				//unzip

	            WP_Filesystem();

	            $unzipfile = unzip_file( $upload_path.$fileName, $upload_path);
				   
			    if ( is_wp_error( $unzipfile ) ) {
			    	$response["response"] = "ERROR";
			        $response["error"] = 'There was an error unzipping the file.'; 
			    } else {
			    	$response["response"] = "SUCCESS";

			        //process csv

			        global $wpdb;
					$wpdb->show_errors(); 
					$player_table = $wpdb->prefix . "mvp_players";

			        //players
				    $csv = str_replace('\\', '/', $upload_path."mvp_players".'.csv');
				    if(!file_exists($csv)){//in case wrong zip is uploaded (check only one file)
				    	$response["response"] = "ERROR";
            			$response["error"] = "No player file inside archive!";
            			echo json_encode( $response );
						die();
				    } 

				    $arr = array('player' => MVP_FILE_DIR_URL . '/plzip/' . "mvp_players".'.csv');

		    		echo json_encode($arr);
					wp_die();

			    }
        		
        	} else {

        		$response["response"] = "ERROR";
        		$response["error"]= "Upload Failed!";
        	}

        }

        echo json_encode( $response );
		wp_die();

	}

	function mvp_import_player_db(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['player'])){

			$player = json_decode(stripcslashes($_POST['player']), true);

			global $wpdb;
			$wpdb->show_errors(); 
		    $player_table = $wpdb->prefix . "mvp_players";

			$stmt = $wpdb->insert(
		    	$player_table,
				array( 
					'title' => $player[1], 
					'preset' => $player[2], 
					'options' => $player[3], 
					'custom_css' => $player[4],
					'custom_js' => $player[5]
				), 
				array( 
					'%s','%s','%s','%s','%s'
				) 
		    );
			

	    	//delete files
	    	$upload_path = MVP_FILE_DIR."/plzip/";
	        $files = glob($upload_path.'/*'); 
			foreach($files as $file){ 
				if(is_file($file))unlink($file); 
			}

			if($stmt !== false){
	    		echo json_encode($wpdb->insert_id);
	    	}

			wp_die();

		}else {
			wp_die();
		}	

	}

	//############################################//
	/* export ads */
	//############################################//

	function mvp_export_ad(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(!extension_loaded('zip'))wp_die('PHP zip extension not installed or enabled!');

		if(isset($_POST['ad_id']) && isset($_POST['ad_title'])){

			$ad_id = $_POST['ad_id'];
			$ad_title = $_POST['ad_title'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $global_ad_table = $wpdb->prefix . "mvp_global_ad";
		    $ad_table = $wpdb->prefix . "mvp_ad";
			$annotation_table = $wpdb->prefix . "mvp_annotation";

			// create zip file
			$zipname = 'mvp_ad_id_'.$ad_id.'_'.$ad_title.'_'.date('m-d-Y_hia').'.zip';
			$zip = new ZipArchive;

			$upload_path1 = MVP_FILE_DIR."/plzip/";
			$zip->open($upload_path1.$zipname, ZipArchive::CREATE);

			//ad
			$stmt = $wpdb->prepare("SELECT id, title, options FROM {$global_ad_table} WHERE id = %d", $ad_id);//we need to select in specific order for bulk import!
			$result = $wpdb->get_results($stmt, ARRAY_N);
			mvp_getOutput("mvp_global_ad", $result, $zip);

			if($wpdb->num_rows > 0){

				//ad
				$stmt = $wpdb->prepare("SELECT id, options, ad_id FROM {$ad_table} WHERE ad_id = %d", $ad_id);
				$result = $wpdb->get_results($stmt, ARRAY_N);
				if($wpdb->num_rows > 0)mvp_getOutput("mvp_ad", $result, $zip);

				//annotation
				$stmt = $wpdb->prepare("SELECT id, options, ad_id FROM {$annotation_table} WHERE ad_id = %d", $ad_id);
				$result = $wpdb->get_results($stmt, ARRAY_N);
				if($wpdb->num_rows > 0)mvp_getOutput("mvp_annotation", $result, $zip);

			}

			// close the archive
			$zip->close();

			$upload_path2 = MVP_FILE_DIR_URL."/plzip/";
			echo json_encode(array('zip' => $upload_path2.$zipname, 'zip_clean' => $upload_path1.$zipname));

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_import_ad(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		header("Content-Type: application/json");

		$posted_data =  isset( $_POST ) ? $_POST : array();
		$file_data = isset( $_FILES ) ? $_FILES : array();

		$data = array_merge( $posted_data, $file_data );

		$fileName = $data["mvp_file_upload"]["name"];
		$temp_name = $data["mvp_file_upload"]["tmp_name"];
		$fileError = $data["mvp_file_upload"]["error"];
		$upload_path = MVP_FILE_DIR."/plzip/";

		$response = array();

		if($fileError > 0){

			$error = array(
				0 => "There is no error, the file uploaded with success",
				1 => "The uploaded file exceeds the upload_max_files in server settings",
				2 => "The uploaded file exceeds the MAX_FILE_SIZE from html form",
				3 => "The uploaded file uploaded only partially",
				4 => "No file was uploaded",
				6 => "Missing a temporary folder",
				7 => "Failed to write file to disk",
				8 => "A PHP extension stoped file to upload" );

			$response["response"] = "ERROR";
            $response["error"] = $error[ $fileError ];

		} else {

			if( move_uploaded_file( $temp_name, $upload_path.$fileName ) ){
	            		
				//unzip

	            WP_Filesystem();

	            $unzipfile = unzip_file( $upload_path.$fileName, $upload_path);
				   
			    if ( is_wp_error( $unzipfile ) ) {
			    	$response["response"] = "ERROR";
			        $response["error"] = 'There was an error unzipping the file.'; 
			    } else {
			    	$response["response"] = "SUCCESS";

			        //process csv

			        global $wpdb;
					$wpdb->show_errors(); 
					$global_ad_table = $wpdb->prefix . "mvp_global_ad";
					$ad_table = $wpdb->prefix . "mvp_ad";
					$annotation_table = $wpdb->prefix . "mvp_annotation";

			        //ads
				    $csv = str_replace('\\', '/', $upload_path."mvp_global_ad".'.csv');
				    if(!file_exists($csv)){//in case wrong zip is uploaded (check only one file)
				    	$response["response"] = "ERROR";
            			$response["error"] = "No ad file inside archive!";
            			echo json_encode( $response );
						wp_die();
				    } 

				    $arr = array('global_ad' => MVP_FILE_DIR_URL . '/plzip/' . "mvp_global_ad".'.csv');

				    //ad
				    $csv = str_replace('\\', '/', $upload_path."mvp_ad".'.csv');
				    if(file_exists($csv)){
				    	$arr['ad'] = MVP_FILE_DIR_URL . '/plzip/' . "mvp_ad".'.csv';
				    }

				    //annotation
				    $csv = str_replace('\\', '/', $upload_path."mvp_annotation".'.csv');
				    if(file_exists($csv)){
				    	$arr['annotation'] = MVP_FILE_DIR_URL . '/plzip/' . "mvp_annotation".'.csv';
				    }

		    		echo json_encode($arr);

					wp_die();

			    }
        		
        	} else {

        		$response["response"] = "ERROR";
        		$response["error"]= "Upload Failed!";
        	}

        }

        echo json_encode( $response );
		wp_die();

	}

	function mvp_import_ad_db(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['global_ad'])){

			$global_ad = json_decode(stripcslashes($_POST['global_ad']), true);

			global $wpdb;
			$wpdb->show_errors(); 
		    $global_ad_table = $wpdb->prefix . "mvp_global_ad";
		    $ad_table = $wpdb->prefix . "mvp_ad";
			$annotation_table = $wpdb->prefix . "mvp_annotation";
			$charset_collate = $wpdb->get_charset_collate();

			$stmt = $wpdb->insert(
		    	$global_ad_table,
				array( 
					'title' => $global_ad[1], 
					'options' => $global_ad[2]
				), 
				array( 
					'%s','%s'
				) 
		    );

		    $last_global_ad_id = $wpdb->insert_id;

		    $wpdb->query("SET FOREIGN_KEY_CHECKS=0");

		    //ad

		    if(isset($_POST['ad'])){

				$ad = json_decode(stripcslashes($_POST['ad']), true);

			    $len = count($ad);
				for($i=0; $i < $len; $i++){ 
					
					$stmt = $wpdb->insert(
				    	$ad_table,
						array( 
							'options' => $ad[$i][1], 
							'ad_id' => $last_global_ad_id
						), 
						array( 
							'%s','%d'
						) 
				    );

				}   

			   
			}

		    //annotation

		    if(isset($_POST['annotation'])){

				$annotation = json_decode(stripcslashes($_POST['annotation']), true);

			    $len = count($annotation);
				for($i=0; $i < $len; $i++){ 
					
					$stmt = $wpdb->insert(
				    	$annotation_table,
						array( 
							'options' => $annotation[$i][1], 
							'ad_id' => $last_global_ad_id
						), 
						array( 
							'%s','%d'
						) 
				    );

				}    

			}

		    $wpdb->query("SET FOREIGN_KEY_CHECKS=1");
		  
	    	//delete files
	    	$upload_path = MVP_FILE_DIR."/plzip/";
	        $files = glob($upload_path.'/*'); 
			foreach($files as $file){ 
				if(is_file($file))unlink($file); 
			}

			if($stmt !== false){
	    		echo json_encode($last_global_ad_id);
	    	}

			wp_die();

		}else {
			wp_die();
		}	

	}

	//############################################//
	/* export playlist */
	//############################################//

	function mvp_export_playlist(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['playlist_id']) && isset($_POST['playlist_title'])){

			$playlist_id = $_POST['playlist_id'];
			$playlist_title = $_POST['playlist_title'];

			global $wpdb;
			$wpdb->show_errors(); 

		    $playlist_table = $wpdb->prefix . "mvp_playlists";
			$media_table = $wpdb->prefix . "mvp_media";
			$ad_table = $wpdb->prefix . "mvp_ad";
			$annotation_table = $wpdb->prefix . "mvp_annotation";
			$path_table = $wpdb->prefix . "mvp_path";
			$subtitle_table = $wpdb->prefix . "mvp_subtitle";

			// create zip file
			$zipname = 'mvp_playlist_id_'.$playlist_id.'_'.$playlist_title.'_'.date('m-d-Y_hia').'.zip';
			$zip = new ZipArchive;

			$upload_path1 = MVP_FILE_DIR."/plzip/";
			$zip->open($upload_path1.$zipname, ZipArchive::CREATE);


			//playlist
			$stmt = $wpdb->prepare("SELECT id, user_id, title, options FROM {$playlist_table} WHERE id = %d", $playlist_id);//we need to select in specific order for bulk import!
			$result = $wpdb->get_results($stmt, ARRAY_N);
			mvp_getOutput("mvp_playlists", $result, $zip);

			//media 
			$stmt = $wpdb->prepare("SELECT id, user_id, title, options, order_id, playlist_id FROM {$media_table} WHERE playlist_id = %d", $playlist_id);
			$result = $wpdb->get_results($stmt, ARRAY_A);

			if($wpdb->num_rows > 0){
				mvp_getOutput("mvp_media", $result, $zip);

				$ids = array();
				foreach($result as $row){
				    $ids[] = $row['id'];
				}
				$in = implode(',', array_fill(0, count($ids), '%d'));

				//path
				$stmt = $wpdb->prepare("SELECT id, options, media_id FROM {$path_table} WHERE media_id IN ($in)", $ids);
				$result = $wpdb->get_results($stmt, ARRAY_N);
				if($wpdb->num_rows > 0)mvp_getOutput("mvp_path", $result, $zip);

				//subtitle
				$stmt = $wpdb->prepare("SELECT id, options, media_id FROM {$subtitle_table} WHERE media_id IN ($in)", $ids);
				$result = $wpdb->get_results($stmt, ARRAY_N);
				if($wpdb->num_rows > 0)mvp_getOutput("mvp_subtitle", $result, $zip);

				//ad
				$stmt = $wpdb->prepare("SELECT id, options, media_id FROM {$ad_table} WHERE media_id IN ($in)", $ids);
				$result = $wpdb->get_results($stmt, ARRAY_N);
				if($wpdb->num_rows > 0)mvp_getOutput("mvp_ad", $result, $zip);

				//annotation
				$stmt = $wpdb->prepare("SELECT id, options, media_id FROM {$annotation_table} WHERE media_id IN ($in)", $ids);
				$result = $wpdb->get_results($stmt, ARRAY_N);
				if($wpdb->num_rows > 0)mvp_getOutput("mvp_annotation", $result, $zip);

			}

			// close the archive
			$zip->close();

			$upload_path2 = MVP_FILE_DIR_URL."/plzip/";
			echo json_encode(array('zip' => $upload_path2.$zipname, 'zip_clean' => $upload_path1.$zipname));

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_clean_export(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['zipname'])){
			@unlink($_POST['zipname']);
		}

		wp_die();
		
	}

	function mvp_getOutput($table, $result, $zip){

	    // create a temporary file
	    $size = 1 * 1024 * 1024;
	    $fp = fopen('php://temp/maxmemory:$size', 'w');
	    if (false === $fp) {
	        die('Failed to create temporary file');
	    }
	    fprintf($fp, chr(0xEF).chr(0xBB).chr(0xBF));

	    foreach($result as $row){
	        $trimmed_array = array_map('trim',array_values($row));
	        $line = str_replace('^', '', $trimmed_array);
	        fputcsv($fp, $line, '|','^');
	    }

	    // return to the start of the stream
	    rewind($fp);

	    $zip->addFromString($table.'.csv', stream_get_contents($fp) );
	    //close the file
	    fclose($fp);

	}

	function mvp_import_playlist(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		header("Content-Type: application/json");

		$posted_data =  isset( $_POST ) ? $_POST : array();
		$file_data = isset( $_FILES ) ? $_FILES : array();

		$data = array_merge( $posted_data, $file_data );

		$fileName = $data["mvp_file_upload"]["name"];
		$temp_name = $data["mvp_file_upload"]["tmp_name"];
		$fileError = $data["mvp_file_upload"]["error"];
		$upload_path = MVP_FILE_DIR."/plzip/";

		$response = array();

		if($fileError > 0){

			$error = array(
				0 => "There is no error, the file uploaded with success",
				1 => "The uploaded file exceeds the upload_max_files in server settings",
				2 => "The uploaded file exceeds the MAX_FILE_SIZE from html form",
				3 => "The uploaded file uploaded only partially",
				4 => "No file was uploaded",
				6 => "Missing a temporary folder",
				7 => "Failed to write file to disk",
				8 => "A PHP extension stoped file to upload" );

			$response["response"] = "ERROR";
            $response["error"] = $error[ $fileError ];

		} else {

			if( move_uploaded_file( $temp_name, $upload_path.$fileName ) ){
	            		
				//unzip

	            WP_Filesystem();

	            $unzipfile = unzip_file( $upload_path.$fileName, $upload_path);
				   
			    if ( is_wp_error( $unzipfile ) ) {
			    	$response["response"] = "ERROR";
			        $response["error"] = 'There was an error unzipping the file.'; 
			    } else {
			    	$response["response"] = "SUCCESS";

			        //process csv

			        global $wpdb;
					$wpdb->show_errors(); 
					$playlist_table = $wpdb->prefix . "mvp_playlists";
					$media_table = $wpdb->prefix . "mvp_media";
					$ad_table = $wpdb->prefix . "mvp_ad";
					$annotation_table = $wpdb->prefix . "mvp_annotation";
					$path_table = $wpdb->prefix . "mvp_path";
					$subtitle_table = $wpdb->prefix . "mvp_subtitle";

			        //playlists
				    $csv = str_replace('\\', '/', $upload_path."mvp_playlists".'.csv');
				    if(!file_exists($csv)){//in case wrong zip is uploaded (check only one file)
				    	$response["response"] = "ERROR";
            			$response["error"] = "No playlist file inside archive!";
            			echo json_encode( $response );
						wp_die();
				    } 

				    $arr = array('playlist' => MVP_FILE_DIR_URL . '/plzip/' . "mvp_playlists".'.csv');

				    //media
				    $csv = str_replace('\\', '/', $upload_path."mvp_media".'.csv');
				    if(file_exists($csv)){
				    	$arr['media'] = MVP_FILE_DIR_URL . '/plzip/' . "mvp_media".'.csv';
				    }

				    //path
				    $csv = str_replace('\\', '/', $upload_path."mvp_path".'.csv');
				    if(file_exists($csv)){
				    	$arr['path'] = MVP_FILE_DIR_URL . '/plzip/' . "mvp_path".'.csv';
				    }

				    //subtitle
				    $csv = str_replace('\\', '/', $upload_path."mvp_subtitle".'.csv');
				    if(file_exists($csv)){
				    	$arr['subtitle'] = MVP_FILE_DIR_URL . '/plzip/' . "mvp_subtitle".'.csv';
				    }

				    //ad
				    $csv = str_replace('\\', '/', $upload_path."mvp_ad".'.csv');
				    if(file_exists($csv)){
				    	$arr['ad'] = MVP_FILE_DIR_URL . '/plzip/' . "mvp_ad".'.csv';
				    }

				    //annotation
				    $csv = str_replace('\\', '/', $upload_path."mvp_annotation".'.csv');
				    if(file_exists($csv)){
				    	$arr['annotation'] = MVP_FILE_DIR_URL . '/plzip/' . "mvp_annotation".'.csv';
				    }

		    		echo json_encode($arr);

	    			wp_die();
				 
			    }
        		
        	} else {

        		$response["response"] = "ERROR";
        		$response["error"]= "Upload Failed!";
        	}

        }

        echo json_encode( $response );
		wp_die();

	}

	function mvp_import_playlist_db(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['playlist'])){

			$playlist = json_decode(stripcslashes($_POST['playlist']), true);

			global $wpdb;
			$wpdb->show_errors(); 
			$charset_collate = $wpdb->get_charset_collate();

		    $playlist_table = $wpdb->prefix . "mvp_playlists";
			$media_table = $wpdb->prefix . "mvp_media";
			$path_table = $wpdb->prefix . "mvp_path";
			$subtitle_table = $wpdb->prefix . "mvp_subtitle";
			$ad_table = $wpdb->prefix . "mvp_ad";
			$annotation_table = $wpdb->prefix . "mvp_annotation";

			//playlist

			$stmt = $wpdb->insert(
		    	$playlist_table,
				array( 
					'user_id' => null, 
					'title' => $playlist[2], 
					'options' => $playlist[3]
				), 
				array( 
					'%d','%s','%s'
				) 
		    );
		   
		    $last_playlist_id = $wpdb->insert_id;

		    $wpdb->query("SET FOREIGN_KEY_CHECKS=0");

		   	//media

		   	if(isset($_POST['media'])){

			    //path

			    if(isset($_POST['path'])){

			    	$path = json_decode(stripcslashes($_POST['path']), true);

				    $path_temp = 'path_temp'.time();

				    $sql = "CREATE TEMPORARY TABLE {$path_temp} (
				      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				      `options` longtext NOT NULL,
				      `media_id` int(11) unsigned NOT NULL,
				      PRIMARY KEY (`id`)
				    ) $charset_collate;";
				    $wpdb->query($sql); 

					$len = count($path);
					for($i=0; $i < $len; $i++){ 
						
						$stmt = $wpdb->insert(
					    	$path_temp,
							array( 
								'options' => $path[$i][1],
								'media_id' => $path[$i][2]
							), 
							array( 
								'%s','%d'
							) 
					    );

					}

				}

			    //subtitle

			    if(isset($_POST['subtitle'])){

					$subtitle = json_decode(stripcslashes($_POST['subtitle']), true);

				    $subtitle_temp = 'subtitle_temp'.time();

				    $sql = "CREATE TEMPORARY TABLE {$subtitle_temp} (
				      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				      `options` longtext NOT NULL,
				      `media_id` int(11) unsigned NOT NULL,
				      PRIMARY KEY (`id`)
				    ) $charset_collate;";
				    $wpdb->query($sql);    

					$len = count($subtitle);
					for($i=0; $i < $len; $i++){ 
						
						$stmt = $wpdb->insert(
					    	$subtitle_temp,
							array( 
								'options' => $subtitle[$i][1],
								'media_id' => $subtitle[$i][2]
							), 
							array( 
								'%s','%d'
							) 
					    );

					}  

				}

			    //ad

			    if(isset($_POST['ad'])){

					$ad = json_decode(stripcslashes($_POST['ad']), true);

				    $ad_temp = 'ad_temp'.time();

				    $sql = "CREATE TEMPORARY TABLE {$ad_temp} (
				      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				      `options` longtext NOT NULL,
				      `media_id` int(11) unsigned DEFAULT NULL,
				      PRIMARY KEY (`id`)
				    ) $charset_collate;";
				    $wpdb->query($sql);    

				    $len = count($ad);
					for($i=0; $i < $len; $i++){ 
						
						$stmt = $wpdb->insert(
					    	$ad_temp,
							array( 
								'options' => $ad[$i][1], 
								'media_id' => $ad[$i][2]
							), 
							array( 
								'%s','%d'
							) 
					    );

					}    

				}

			    //annotation

			    if(isset($_POST['annotation'])){

					$annotation = json_decode(stripcslashes($_POST['annotation']), true);

				    $annotation_temp = 'annotation_temp'.time();

				    $sql = "CREATE TEMPORARY TABLE {$annotation_temp} (
				      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				      `options` longtext NOT NULL,
					  `media_id` int(11) unsigned DEFAULT NULL,
				      PRIMARY KEY (`id`)
				    ) $charset_collate;";
				    $wpdb->query($sql);    

				    $len = count($annotation);
					for($i=0; $i < $len; $i++){ 
						
						$stmt = $wpdb->insert(
					    	$annotation_temp,
							array( 
								'options' => $annotation[$i][1], 
								'media_id' => $annotation[$i][2],
							), 
							array( 
								'%s','%d'
							) 
					    );

					}    

				}

				//media

				$media = json_decode(stripcslashes($_POST['media']), true);
			   
			    $len = count($media);
				for($i=0; $i < $len; $i++){ 
					
					$stmt = $wpdb->insert(
				    	$media_table,
						array( 
							'user_id' => $media[$i][1],
							'title' => $media[$i][2],
							'options' => $media[$i][3], 
							'order_id' => $media[$i][4], 
							'playlist_id' => $last_playlist_id
						), 
						array( 
							'%d','%s','%s','%d','%d'
						) 
				    );

				    $old_media_id = $media[$i][0];
				    $last_media_id = $wpdb->insert_id;

				    //path

				    if(isset($_POST['path'])){

				        $sql = "INSERT INTO $path_table (id, options, media_id)
				                  SELECT NULL, options, $last_media_id
				                  FROM {$path_temp} WHERE media_id='$old_media_id'";
				        $wpdb->query($sql); 

				    }

				    //subtitles

			        if(isset($_POST['subtitle'])){

				        $sql = "INSERT INTO $subtitle_table (id, options, media_id)
				                  SELECT NULL, options, $last_media_id
				                  FROM {$subtitle_temp} WHERE media_id='$old_media_id'";
				        $wpdb->query($sql); 

				    }

			        //ad

			        if(isset($_POST['ad'])){

				        $sql = "INSERT INTO $ad_table (id, options, media_id)
				                  SELECT NULL, options, $last_media_id
				                  FROM {$ad_temp} WHERE media_id='$old_media_id'";
				        $wpdb->query($sql); 

				    }

			        //annotation

			        if(isset($_POST['annotation'])){

				        $sql = "INSERT INTO $annotation_table (id, options, media_id)
				                  SELECT NULL, options, $last_media_id
				                  FROM {$annotation_temp} WHERE media_id='$old_media_id'";
				        $wpdb->query($sql); 

				    }

				}


			}//end if media exist


		    //drop temp tables
		    if(isset($path_temp))$wpdb->query("DROP TABLE {$path_temp}");
		    if(isset($subtitle_temp))$wpdb->query("DROP TABLE {$subtitle_temp}");
		    if(isset($ad_temp))$wpdb->query("DROP TABLE {$ad_temp}");
		    if(isset($annotation_temp))$wpdb->query("DROP TABLE {$annotation_temp}");
		    $wpdb->query("SET FOREIGN_KEY_CHECKS=1");
			


	    	//delete files
    		$upload_path = MVP_FILE_DIR."/plzip/";
	        $files = glob($upload_path.'/*'); 
			foreach($files as $file){ 
				if(is_file($file))unlink($file); 
			}

			if($stmt !== false){
	    		echo json_encode($last_playlist_id);
	    	}
					
			wp_die();

		}else {
			wp_die();
		}	

	}

	//############################################//
	/* ads */
	//############################################//

	function mvp_edit_ad_title(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['title']) && isset($_POST['id'])){

			$title = stripcslashes($_POST["title"]);
			$id = $_POST["id"];

			global $wpdb;
		    $global_ad_table = $wpdb->prefix . "mvp_global_ad";

		    $wpdb->update(
		    	$global_ad_table,
				array( 
					'title' => $title
				), 
				array('id' => $id),
				array( 
					'%s'
				),
				array( 
					'%d'
				) 
		    );

		    echo json_encode("");

		    wp_die();

		}else{
			wp_die();
		}
	}

	function mvp_delete_ad(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['ad_id'])){

			$ad_id = $_POST['ad_id'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $global_ad_table = $wpdb->prefix . "mvp_global_ad";
		    $ad_table = $wpdb->prefix . "mvp_ad";

			$ids = explode(',',$ad_id);
			$in = implode(',', array_fill(0, count($ids), '%d'));

		    $stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$global_ad_table} WHERE id IN ($in)", $ids));

			$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$ad_table} WHERE ad_id IN ($in)", $ids));

			if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_duplicate_ad(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['ad_id'])){

			$ad_id = $_POST['ad_id'];
			$title = $_POST['title'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $global_ad_table = $wpdb->prefix . "mvp_global_ad";
		    $ad_table = $wpdb->prefix . "mvp_ad";
	        $annotation_table = $wpdb->prefix . "mvp_annotation";

			$stmt = $wpdb->prepare("SELECT options FROM {$global_ad_table} WHERE id = %d", $ad_id);

			if($stmt !== false){

				$result = $wpdb->get_row($stmt, ARRAY_A);

			    $stmt = $wpdb->insert(//copy ad
			    	$global_ad_table,
					array( 
						'title' => $title,
						'options' => $result['options']
					), 
					array( 
						'%s',
						'%s'
					) 
			    );

			    $insert_id = $wpdb->insert_id;

			    //ads

			    $stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE ad_id = %d", $ad_id), ARRAY_A);

			    foreach($stmt as $item){

	    			$wpdb->insert(
				    	$ad_table,
						array( 
							'options' => $item['options'], 
							'ad_id' => $insert_id
						), 
						array( 
							'%s','%d'
						) 
				    );

				}

			    //annotations

				$stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE ad_id = %d", $ad_id), ARRAY_A);
			
				foreach($stmt as $item){

	    			$wpdb->insert(
				    	$annotation_table,
						array( 
							'options' => $item['options'], 
							'ad_id' => $insert_id
						), 
						array( 
							'%s','%d'
						) 
				    );

				}

			    if($stmt !== false){
		    		echo json_encode($insert_id);
		    	}

			}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_save_ad_options(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['ad_id'])){

			$ad_id = $_POST['ad_id'];

			global $wpdb;
			$wpdb->show_errors(); 
			$global_ad_table = $wpdb->prefix . "mvp_global_ad";
	        $ad_table = $wpdb->prefix . "mvp_ad";
	        $annotation_table = $wpdb->prefix . "mvp_annotation";



			$global_ad_options = json_decode(stripcslashes($_POST['global_ad_options']), true);

			$stmt = $wpdb->update(
		    	$global_ad_table,
				array('options' => serialize($global_ad_options)), 
				array('id' => $ad_id),
				array('%s'),
				array('%d')
		    );


			//ads

	    	//delete current values
			$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$ad_table} WHERE ad_id = %d", $ad_id));

	    	if(!empty($_POST['ad_pre'])){
	    		
	    		$ad_pre = json_decode(stripcslashes($_POST['ad_pre']), true);

	    		for($i = 0; $i < count($ad_pre); $i++){  

	    			$stmt = $wpdb->insert(
				    	$ad_table,
						array( 
							'options' => serialize($ad_pre[$i]), 
							'ad_id' => $ad_id
						), 
						array( 
							'%s','%d'
						) 
				    );

				}
		    	
	    	}

	    	if(!empty($_POST['ad_mid'])){
	    		
	    		$ad_mid = json_decode(stripcslashes($_POST['ad_mid']), true);

	    		for($i = 0; $i < count($ad_mid); $i++){  

	    			$stmt = $wpdb->insert(
				    	$ad_table,
						array( 
							'options' => serialize($ad_mid[$i]), 
							'ad_id' => $ad_id
						), 
						array( 
							'%s','%d'
						) 
				    );

		    	}
		    	
	    	}

	    	if(!empty($_POST['ad_end'])){

	    		$ad_end = json_decode(stripcslashes($_POST['ad_end']), true);

	    		for($i = 0; $i < count($ad_end); $i++){  

	    			$stmt = $wpdb->insert(
				    	$ad_table,
						array( 
							'options' => serialize($ad_end[$i]), 
							'ad_id' => $ad_id
						), 
						array( 
							'%s','%d'
						) 
				    );

		    	}
	    	
	    	}


	    	//annotations

	    	//delete current values
			$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$annotation_table} WHERE ad_id = %d", $ad_id));

			if(!empty($_POST['annotation'])){
	    		
	    		$annotation = json_decode(stripcslashes($_POST['annotation']), true);

	    		for($i = 0; $i < count($annotation); $i++){  

				    $stmt = $wpdb->insert(
				    	$annotation_table,
						array( 
							'options' => serialize($annotation[$i]), 
							'ad_id' => $ad_id
						), 
						array( 
							'%s','%d'
						) 
				    );	

		    	}
	    	}

			if($stmt !== false){
	    		echo json_encode($stmt);
	    	}

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_ad_domain_rename(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['ad_id'])){

			$ad_id = $_POST['ad_id'];
			$from = $_POST['from'];
			$to = $_POST['to'];

			global $wpdb;
			$wpdb->show_errors(); 
		    $global_ad_table = $wpdb->prefix . "mvp_global_ad";
	        $ad_table = $wpdb->prefix . "mvp_ad";
	        $annotation_table = $wpdb->prefix . "mvp_annotation";


	        //ads

	        $stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE ad_id = %d", $ad_id), ARRAY_A);

		    $ad_data_global = array();
		    foreach($stmt as $item){
		        $mp = unserialize($item['options']);
		    	$mp['path'] = str_replace($from, $to, $mp['path']); 
		    	if(isset($mp['poster']))$mp['poster'] = str_replace($from, $to, $mp['poster']); 
		        $ad_data_global[] = $mp;
		    }

		    //delete current values
			$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$ad_table} WHERE ad_id = %d", $ad_id));

			//inset
			for($i = 0; $i < count($ad_data_global); $i++){  

    			$stmt = $wpdb->insert(
			    	$ad_table,
					array( 
						'options' => serialize($ad_data_global[$i]), 
						'ad_id' => $ad_id
					), 
					array( 
						'%s','%d'
					) 
			    );

	    	}


	    	//annotations

			$stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE ad_id = %d", $ad_id), ARRAY_A);

			$annotation_data_global = array();
			foreach($stmt as $item){
			    $mp = unserialize($item['options']);
		    	$mp['path'] = str_replace($from, $to, $mp['path']); 
		        $annotation_data_global[] = $mp;
			}


	    	//delete current values
			$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$annotation_table} WHERE ad_id = %d", $ad_id));

			//insert
    		for($i = 0; $i < count($annotation_data_global); $i++){  

			    $stmt = $wpdb->insert(
			    	$annotation_table,
					array( 
						'options' => serialize($annotation_data_global[$i]), 
						'ad_id' => $ad_id
					), 
					array( 
						'%s','%d'
					) 
			    );	

	    	}
		   
	    	echo json_encode("");

	    	wp_die();
	    	
		}else{
			wp_die();
		}
	}

	function mvp_create_ad(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['title'])){

			$title = stripslashes($_POST['title']);

			global $wpdb;
			$wpdb->show_errors(); 
		    $global_ad_table = $wpdb->prefix . "mvp_global_ad";

			$stmt = $wpdb->insert(
		    	$global_ad_table,
				array( 
					'title' => $title
				), 
				array( 
					'%s'					
				) 
		    );
		 
		    if($stmt !== false){
	    		echo json_encode($wpdb->insert_id);
			}

	    	wp_die();
	    	
		}else{
			wp_die();
		}

	}


	

    function mvp_getAdData($atts){

        $ad_id = $atts['ad_id'];

        global $wpdb;
        $global_ad_table = $wpdb->prefix . "mvp_global_ad";
        $ad_table = $wpdb->prefix . "mvp_ad";
        $annotation_table = $wpdb->prefix . "mvp_annotation";

        $ad_options = null;
	    $ad_data = null;
	    $annotation_data = null;

        //options

        $stmt = $wpdb->get_row($wpdb->prepare("SELECT options FROM {$global_ad_table} WHERE id = %d", $ad_id), ARRAY_A);
        $ad_options = unserialize($stmt['options']);

        //ads

        $stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE ad_id = %d", $ad_id), ARRAY_A);
        if($wpdb->num_rows > 0){
            $ad_data = array();
            foreach($stmt as $item){
                $ad_data[] = unserialize($item['options']);
            }
        }

        //annotations

        $stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE ad_id = %d", $ad_id), ARRAY_A);
        if($wpdb->num_rows > 0){
            $annotation_data = array();
            foreach($stmt as $item){
                $annotation_data[] = unserialize($item['options']);
            }
        }

        return array('ad_options' => $ad_options,
		        	 'ad_data' => $ad_data,
		        	 'annotation_data' => $annotation_data);

    }

    //############################################//
	/* front end playlist display */
	//############################################//

	function mvp_playlist_display($atts){

		global $wpdb;
        $playlist_table = $wpdb->prefix . "mvp_playlists";
        $data = array();
		
		if(isset($atts['playlist_id'])){

			$playlist_id = explode(',', $atts['playlist_id']);

		}else{
			return '';
		}

		$in = implode(',', array_fill(0, count($playlist_id), '%d'));

		$playlist_id = array_merge($playlist_id,$playlist_id);

		$results = $wpdb->get_results($wpdb->prepare("SELECT id, title, options FROM {$playlist_table} WHERE id IN ($in) ORDER BY FIELD(id, $in)", $playlist_id), ARRAY_A);

		foreach($results as $result){

			$pl_options = unserialize($result['options']);

			$data[] = array('id' => $result['id'], 
							'title' => $result['title'],
							'description' => isset($pl_options['description']) ? $pl_options['description'] : null,
							'thumb' => $pl_options['thumb']);

		}

		$id = 'mvp-playlist-display-wrap-'.mt_rand();//to limit selector for click

	  	$markup = '<div class="mvp-playlist-display-wrap" id="'.$id.'">';

			if(!empty($atts['header_title'])){
				$markup .= '<div class="mvp-playlist-display-header">
					<span>'.esc_html($atts['header_title']).'</span>
				</div>';
			}

			$markup .= '<div class="mvp-playlist-display-wrap-inner">';

			foreach($data as $d){

				if(isset($atts['active_playlist']) && $atts['active_playlist'] == $d['id'])$active_class = ' mvp-playlist-display-item-active';
				else $active_class = '';

				$markup .= '<div class="mvp-playlist-display-item'.$active_class.'" data-playlist-id="'.esc_attr($d['id']).'" title="'.esc_attr($d['title']).'">';

				$markup .= '<div class="mvp-playlist-display-item-inner">';

				if(isset($d['thumb'])){
					$markup .= '<img class="mvp-playlist-display-item-thumb" src="'.esc_attr($d['thumb']).'" alt="'.esc_attr($d['title']).'"/>';
				}
				
				$markup .= '<div class="mvp-playlist-display-item-title">'.esc_html($d['title']).'</div>';

				$markup .= '</div>';//mvp-playlist-display-item-inner

				if(isset($d['description'])){
					$markup .= '<div class="mvp-playlist-display-item-description">'.$d['description'].'</div>';
				}
				
				$markup .= '</div>';//mvp-playlist-display-item
			
			}
			$markup .= '</div>

		</div>';//mvp-playlist-display-wrap

		if(isset($atts['player_id'])){

			$player_id = $atts['player_id'];

    		//click to load playlist in player 
    		$markup .= '<script type="text/javascript">
				var elem = document.getElementById("'.$id.'"),
				items = elem.querySelectorAll(".mvp-playlist-display-item"), i, len = items.length;
				for (i = 0; i < len; i++) {
				    items[i].addEventListener("click", function(e){ 
				    	e.preventDefault();

				    	if(this.classList.contains("mvp-playlist-display-item-active"))return false;//active item
				    	var last_active = elem.getElementsByClassName("mvp-playlist-display-item-active");
				    	if(last_active.length)last_active[0].classList.remove("mvp-playlist-display-item-active");
				    	this.classList.add("mvp-playlist-display-item-active");

				    	var pid = ".mvp-playlist-"+this.getAttribute("data-playlist-id");
				    	mvp_player'.$player_id.'.loadPlaylist(pid); return false;  
					}, false);
				}
			</script>';   

		}

		return $markup;
		
	}

	//############################################//
	/*  */
	//############################################//

	function mvp_get_url() {
		return get_bloginfo('url');
	}

	function mvp_post_url($token, $plugin) {

		$url = 'https://interactivepixel.net/vcode/?time='.time();

		$response = wp_remote_post($url, array(
			'method' => 'POST',
			'timeout'     => 60,
			'redirection' => 5,
			'blocking'    => true,
			'httpversion' => '1.0',
			'sslverify'   => true,
			'headers' => array('Content-Type' => 'application/x-www-form-urlencoded'),
			'body' => array(
			    'token' => $token,
			    'plugin' => $plugin,
			    'website' => mvp_get_url()
			)
		));

		if(is_wp_error($response)){
		    $response = '{"error": '.$response->get_error_message().'}';
		}else{
			$response = wp_remote_retrieve_body($response);
		}

		return $response;
	}

	function mvp_reg_man() {

		if(isset($_POST['token'])){

			$data = trim($_POST['token']);

			$arr = explode(';', $data);
			$r = [];
			for($i=0; $i < count($arr); $i++){
			    $key_value = explode('-', $arr[$i]);
			    $r[$key_value[0]] = $key_value[1];
			}
			$r['time'] = time(); 
			$r['wsidchk'] = '1'; 
			update_option( 'apenv_key_' . MVP_ID, $r, false );

			echo json_encode($r);
			wp_die();

		}else{

			echo json_encode(false);
			wp_die();
		}
	}

	function mvp_check_r() {

		if(isset($_POST['token'])){

			$token = trim($_POST['token']);

			$response = mvp_post_url($token, MVP_ID );

			$r = json_decode($response, true);

			if(isset($r['msgs'])) {
				$r['time'] = time(); 
				update_option( 'apenv_key_' . MVP_ID, $r, false );
			}else{
				delete_option( 'apenv_key_' . MVP_ID );
			}

			echo json_encode($response);
			wp_die();

		}else{

			echo json_encode(false);
			wp_die();
		}
	}

	function mvp_check_l() {

		if(get_option( 'apenv_key_' . MVP_ID)){

			$opt = get_option( 'apenv_key_' . MVP_ID);
			echo json_encode($opt);
			wp_die();

		}else{
			echo json_encode(false);
			wp_die();
		}

	}

	function mvp_dea_l() {

		if(isset($_POST['token'])){

			$token = trim($_POST['token']);

			$url = 'https://interactivepixel.net/vcode/index2.php';

			$response = wp_remote_post($url, array(
				'method' => 'POST',
				'timeout'     => 60,
				'redirection' => 5,
				'blocking'    => true,
				'httpversion' => '1.0',
				'sslverify'   => true,
				'headers' => array('Content-Type' => 'application/x-www-form-urlencoded'),
				'body' => array(
				    'token' => $token,
				    'plugin' => MVP_ID,
				    'website' => mvp_get_url()
				)
			));	

			delete_option( 'apenv_key_' . MVP_ID );
			echo json_encode(false);
			wp_die();

		}

	}


	//############################################//
	/* install */
	//############################################//

	function mvp_player_uninstall() {

		global $wpdb;
	    $settings_table = $wpdb->prefix . "mvp_settings";
	    $result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);

	    if($result){

		    $settings = unserialize($result['options']);
		    $delete_plugin_data_on_uninstall = isset($settings["delete_plugin_data_on_uninstall"]) ? (bool)($settings["delete_plugin_data_on_uninstall"]) : false;

		    if($delete_plugin_data_on_uninstall){
				
				global $wpdb;

			    if ( is_multisite() ) {

					$site_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs WHERE site_id = $wpdb->siteid;" );
					foreach ( $site_ids as $site_id ) {
				        switch_to_blog( $site_id );
				        mvp_deinstall();
				        restore_current_blog();
				    }

		    	}else{
		    		mvp_deinstall();
		    	}
		    }
	    }
		    
	}

	function mvp_deinstall() {

		global $wpdb;
		$wpdb->show_errors(); 

		$wpdb->query('SET foreign_key_checks=0');

	    $settings_table = $wpdb->prefix . "mvp_settings";
	    $sql = "DROP TABLE IF EXISTS $settings_table;";
	    $wpdb->query($sql);

	    $player_table = $wpdb->prefix . "mvp_players";
	    $sql = "DROP TABLE IF EXISTS $player_table;";
	    $wpdb->query($sql);

		$path_table = $wpdb->prefix . "mvp_path";
	    $sql = "DROP TABLE IF EXISTS $path_table;";
	    $wpdb->query($sql);

		$subtitle_table = $wpdb->prefix . "mvp_subtitle";
	    $sql = "DROP TABLE IF EXISTS $subtitle_table;";
	    $wpdb->query($sql);

	    $ad_table = $wpdb->prefix . "mvp_ad";
	    $sql = "DROP TABLE IF EXISTS $ad_table;";
	    $wpdb->query($sql);

		$annotation_table = $wpdb->prefix . "mvp_annotation";
	    $sql = "DROP TABLE IF EXISTS $annotation_table;";
	    $wpdb->query($sql);

	 	$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";
	    $sql = "DROP TABLE IF EXISTS $watched_percentage_table;";
	    $wpdb->query($sql);

	    $media_table = $wpdb->prefix . "mvp_media";
	    $sql = "DROP TABLE IF EXISTS $media_table;";
	    $wpdb->query($sql);

	    $playlist_table = $wpdb->prefix . "mvp_playlists";
	    $sql = "DROP TABLE IF EXISTS $playlist_table;";
	    $wpdb->query($sql);

	    $favorites_table = $wpdb->prefix . "mvp_favorites";
	    $sql = "DROP TABLE IF EXISTS $favorites_table;";
	    $wpdb->query($sql);

	    $global_ad_table = $wpdb->prefix . "mvp_global_ad";
	    $sql = "DROP TABLE IF EXISTS $global_ad_table;";
	    $wpdb->query($sql);

	    $wpdb->query('SET foreign_key_checks=1');

		delete_option('mvp_video_player_version');
	}

	function mvp_player_activate($network_wide){

		global $wpdb;

		if ( is_multisite() ) {

    		if ($network_wide) {
    			$site_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs WHERE site_id = $wpdb->siteid;" );
    			foreach ( $site_ids as $site_id ) {
			        switch_to_blog( $site_id );
			        mvp_install();
			        restore_current_blog();
			    }
    		}else{
    			mvp_install();
    		}

    	}else{
    		mvp_install();
    	}

	}

	function mvp_install(){

		//database
		global $wpdb;
		$wpdb->show_errors(); 
		$charset_collate = $wpdb->get_charset_collate();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		//WHEN altering tables, playlist_manager.php copy playlist; mvp.php copy tracks, import playlist!

		$settings_table = $wpdb->prefix . "mvp_settings";
		if($wpdb->get_var( "show tables like '$settings_table'" ) != $settings_table){

			$sql = "CREATE TABLE $settings_table ( 
				`id` tinyint NOT NULL,
				`options` text,
			    PRIMARY KEY (`id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$player_table = $wpdb->prefix . "mvp_players";
		if($wpdb->get_var( "show tables like '$player_table'" ) != $player_table){

			$sql = "CREATE TABLE $player_table ( 
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			    `title` varchar(100) NOT NULL,
			    `preset` varchar(50) NOT NULL,
			    `options` text DEFAULT NULL,
			    `custom_css` longtext DEFAULT NULL,
			    `custom_js` longtext DEFAULT NULL,
			    PRIMARY KEY (`id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$playlist_table = $wpdb->prefix . "mvp_playlists";
		if($wpdb->get_var( "show tables like '$playlist_table'" ) != $playlist_table){

			$sql = "CREATE TABLE $playlist_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`title` varchar(100) NOT NULL,
				`options` text DEFAULT NULL,
			    PRIMARY KEY (`id`)
			) $charset_collate;";
			dbDelta( $sql );

		}


		$media_table = $wpdb->prefix . "mvp_media";
		if($wpdb->get_var( "show tables like '$media_table'" ) != $media_table){

			$sql = "CREATE TABLE $media_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			    `title` varchar(300) DEFAULT NULL,
			    `options` longtext DEFAULT NULL,
			    `order_id` int(11) unsigned DEFAULT NULL,
			    `playlist_id` int(11) unsigned NOT NULL,
			    `disabled` tinyint DEFAULT 0,
			    PRIMARY KEY (`id`),
			    INDEX `playlist_id` (`playlist_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$path_table = $wpdb->prefix . "mvp_path";
		if($wpdb->get_var( "show tables like '$path_table'" ) != $path_table){

			$sql = "CREATE TABLE $path_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			    `options` longtext DEFAULT NULL,
			    `media_id` int(11) unsigned NOT NULL,
			    `playlist_id` int(11) unsigned,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$subtitle_table = $wpdb->prefix . "mvp_subtitle";
		if($wpdb->get_var( "show tables like '$subtitle_table'" ) != $subtitle_table){

			$sql = "CREATE TABLE $subtitle_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			    `options` longtext DEFAULT NULL,
			    `media_id` int(11) unsigned NOT NULL,
			    `playlist_id` int(11) unsigned,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$ad_table = $wpdb->prefix . "mvp_ad";
		if($wpdb->get_var( "show tables like '$ad_table'" ) != $ad_table){

			$sql = "CREATE TABLE $ad_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			    `options` longtext DEFAULT NULL,
			    `media_id` int(11) unsigned DEFAULT NULL,
			    `playlist_id` int(11) unsigned,
			    `ad_id` int(11) unsigned DEFAULT NULL,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$annotation_table = $wpdb->prefix . "mvp_annotation";
		if($wpdb->get_var( "show tables like '$annotation_table'" ) != $annotation_table){

			$sql = "CREATE TABLE $annotation_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			    `options` longtext DEFAULT NULL,
			    `media_id` int(11) unsigned DEFAULT NULL,
			    `playlist_id` int(11) unsigned,
			    `ad_id` int(11) unsigned DEFAULT NULL,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$global_ad_table = $wpdb->prefix . "mvp_global_ad";
		if($wpdb->get_var( "show tables like '$global_ad_table'" ) != $global_ad_table){

			$sql = "CREATE TABLE $global_ad_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			    `title` varchar(100) NOT NULL,
			    `options` longtext DEFAULT NULL,
			    PRIMARY KEY (`id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

	}

	function mvp_plugins_loaded() {

		//file dir for reading files from directory
		if(!file_exists(MVP_FILE_DIR))wp_mkdir_p(MVP_FILE_DIR);
		$upload_path = MVP_FILE_DIR."/plzip/";
		if(!file_exists($upload_path))wp_mkdir_p($upload_path);

		load_plugin_textdomain(MVP_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');

	    $current_version = get_option('mvp_video_player_version');

	    if($current_version == FALSE){
	    	update_option('mvp_video_player_version', '1.0');
	    }
	    $current_version = get_option('mvp_video_player_version');

	    global $wpdb;
		$wpdb->show_errors(); 
		$charset_collate = $wpdb->get_charset_collate();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$settings_table = $wpdb->prefix . "mvp_settings";
		$player_table = $wpdb->prefix . "mvp_players";
		$media_table = $wpdb->prefix . "mvp_media";
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$path_table = $wpdb->prefix . "mvp_path";
		$subtitle_table = $wpdb->prefix . "mvp_subtitle";
		$ad_table = $wpdb->prefix . "mvp_ad";
		$annotation_table = $wpdb->prefix . "mvp_annotation";
		$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

	


		$sql = "SHOW COLUMNS FROM {$settings_table} LIKE 'options'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$settings_table} ADD COLUMN `options` text";
    		$result = $wpdb->query($sql);
    	}


    	//custom css

		$sql = "SHOW COLUMNS FROM {$player_table} LIKE 'custom_css'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$player_table} ADD COLUMN `custom_css` longtext DEFAULT NULL";
    		$result = $wpdb->query($sql);
    	}

		//custom javascript

		$sql = "SHOW COLUMNS FROM {$player_table} LIKE 'custom_js'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$player_table} ADD COLUMN `custom_js` longtext DEFAULT NULL";
    		$result = $wpdb->query($sql);
    	}
	


	

	
	

		//remove playlist id, ads are now sepearate from playlists, add column ad_id.

		$sql = "SHOW COLUMNS FROM {$ad_table} LIKE 'ad_id'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){

			$sql = "ALTER TABLE {$ad_table} ADD COLUMN `ad_id` int(11) unsigned DEFAULT NULL";
		    $result = $wpdb->query($sql);

		}

		$sql = "SHOW COLUMNS FROM {$annotation_table} LIKE 'ad_id'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){

		    $sql = "ALTER TABLE {$annotation_table} ADD COLUMN `ad_id` int(11) unsigned DEFAULT NULL";
		    $result = $wpdb->query($sql);

		}

		//ad global ad table for ads and annotations

		$global_ad_table = $wpdb->prefix . "mvp_global_ad";
		if($wpdb->get_var( "show tables like '$global_ad_table'" ) != $global_ad_table){

			$sql = "CREATE TABLE $global_ad_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			    `title` varchar(100) NOT NULL,
			    `options` longtext NOT NULL,
			    PRIMARY KEY (`id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		//watched perc

		$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";
		if($wpdb->get_var( "show tables like '$watched_percentage_table'" ) != $watched_percentage_table){

			$sql = "CREATE TABLE $watched_percentage_table ( 
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`title` varchar(300) DEFAULT NULL,
			    `watched` MEDIUMINT unsigned DEFAULT NULL,
			    `duration` MEDIUMINT unsigned DEFAULT NULL,
			    `media_id` int(11) unsigned DEFAULT NULL,
			    `playlist_id` int(11) unsigned DEFAULT NULL,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}


		//add title so we can sort videos by title

		$sql = "SHOW COLUMNS FROM {$media_table} LIKE 'title'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){

		    $sql = "ALTER TABLE {$media_table} ADD COLUMN `title` varchar(300) DEFAULT NULL";
		    $result = $wpdb->query($sql);

			//move title 

	    	$media_data = $wpdb->get_results("SELECT id, options FROM {$media_table}", ARRAY_A);

	    	$values = array();
			$place_holders = array();

	    	foreach ($media_data as $d) { 

				$options = unserialize($d['options']);

				foreach($options as $key => $value){
					if($key == 'title' && !empty($value)){

						array_push( $values, $value, $d['id']);
						$place_holders[] = "('%s', '%d')"; 
					}
				}

			}

			if(count($values)){

				$query = "INSERT INTO $media_table (title, id) VALUES ";
				$query .= implode( ', ', $place_holders );

				$query .= "ON DUPLICATE KEY UPDATE title=VALUES(title)";

				$wpdb->query( $wpdb->prepare( "$query ", $values ) );

			}

		}

		



	
		$sql = "SHOW COLUMNS FROM {$path_table} LIKE 'playlist_id'";
    	$result = $wpdb->query($sql);

	    if($wpdb->num_rows == 0){
	    	$sql = "ALTER TABLE {$path_table} ADD COLUMN `playlist_id` int(11) unsigned";
		    $result = $wpdb->query($sql);
		}

		$sql = "SHOW COLUMNS FROM {$subtitle_table} LIKE 'playlist_id'";
    	$result = $wpdb->query($sql);

	    if($wpdb->num_rows == 0){
	    	$sql = "ALTER TABLE {$subtitle_table} ADD COLUMN `playlist_id` int(11) unsigned";
		    $result = $wpdb->query($sql);
		}

		$sql = "SHOW COLUMNS FROM {$ad_table} LIKE 'playlist_id'";
    	$result = $wpdb->query($sql);

	    if($wpdb->num_rows == 0){
	    	$sql = "ALTER TABLE {$ad_table} ADD COLUMN `playlist_id` int(11) unsigned";
		    $result = $wpdb->query($sql);
		}

		$sql = "SHOW COLUMNS FROM {$annotation_table} LIKE 'playlist_id'";
    	$result = $wpdb->query($sql);

	    if($wpdb->num_rows == 0){
	    	$sql = "ALTER TABLE {$annotation_table} ADD COLUMN `playlist_id` int(11) unsigned";
		    $result = $wpdb->query($sql);
		}




		//disabled

		$sql = "SHOW COLUMNS FROM {$media_table} LIKE 'disabled'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$media_table} ADD COLUMN `disabled` tinyint DEFAULT 0";
    		$result = $wpdb->query($sql);
    	}



    	//user id playlist
		$sql = "SHOW COLUMNS FROM {$playlist_table} LIKE 'user_id'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$playlist_table} ADD COLUMN `user_id` int(11) unsigned DEFAULT NULL";
    		$result = $wpdb->query($sql);
    	}

		//user id media (so we can count how many videos user added)
		$sql = "SHOW COLUMNS FROM {$media_table} LIKE 'user_id'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$media_table} ADD COLUMN `user_id` int(11) unsigned DEFAULT NULL";
    		$result = $wpdb->query($sql);
    	}

    	
    	//favorites
		$favorites_table = $wpdb->prefix . "mvp_favorites";
		if($wpdb->get_var( "show tables like '$favorites_table'" ) != $favorites_table){

			$sql = "CREATE TABLE $favorites_table (
			    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`user_id` int(11) unsigned DEFAULT NULL,
				`playlist_id` int(11) unsigned DEFAULT NULL,
				`media_id` int(11) unsigned DEFAULT NULL,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		//watch perc user id
		$sql = "SHOW COLUMNS FROM {$watched_percentage_table} LIKE 'user_id'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$watched_percentage_table} ADD COLUMN `user_id` int(11) unsigned DEFAULT NULL";
    		$result = $wpdb->query($sql);
    	}
    		
		//playlist is edited
		$sql = "SHOW COLUMNS FROM {$playlist_table} LIKE 'is_edit'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$playlist_table} 
    		ADD COLUMN `is_edit` tinyint DEFAULT 0,
    		ADD COLUMN `edit_user_id` tinyint unsigned DEFAULT NULL";
    		$result = $wpdb->query($sql);
    	}
    	


		update_option('mvp_video_player_version', MVP_PLUGIN_VERSION);
	
		


	}


?>