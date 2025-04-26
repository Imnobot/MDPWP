<?php

/*
Plugin Name: Ultimate Media Gallery for WordPress
Plugin URI: https://codecanyon.net/user/Tean/portfolio
Description: Ultimate Media Gallery for WordPress
Version: 7.5
Author: Tean
Author URI: https://codecanyon.net/user/Tean/
*/




	if(!defined('ABSPATH'))exit;// Exit if accessed directly

	define('MVP_FILE_DIR', WP_CONTENT_DIR . '/uploads/mvp-file-dir/');
	define('MVP_FILE_DIR_URL', WP_CONTENT_URL . '/uploads/mvp-file-dir/');
	define('MVP_CAPABILITY', 'manage_options');
	define('MVP_BSF_MATCH', 'ebsfm:');//encrypt media
	define('MVP_PLUGINS_URL', plugins_url('/apmvp/source/'));
	define('MVP_TEXTDOMAIN', 'ultimate-media-gallery');

	include(dirname(__FILE__) . '/includes/utils.php');
	include(dirname(__FILE__) . '/includes/widgets.php');
	include(dirname(__FILE__) . '/includes/statistics.php');
	include(dirname(__FILE__) . '/includes/player_options.php');
	include(dirname(__FILE__) . '/source/includes/ipaddress.php');


	if(is_admin()){

		register_activation_hook(__FILE__, 'mvp_player_activate');
		register_uninstall_hook(__FILE__, 'mvp_player_uninstall');

		add_action('admin_menu', 'mvp_admin_menu');
		add_action('admin_enqueue_scripts', 'mvp_admin_enqueue_scripts');
		add_action('plugins_loaded', 'mvp_plugins_loaded'); // Hook is here

		//global
		add_action('wp_ajax_mvp_save_global_options', 'mvp_save_global_options');

		//player
		add_action('wp_ajax_mvp_create_player', 'mvp_create_player');
		add_action('wp_ajax_mvp_duplicate_player', 'mvp_duplicate_player');
		add_action('wp_ajax_mvp_edit_player_title', 'mvp_edit_player_title');
		add_action('wp_ajax_mvp_delete_player', 'mvp_delete_player');
		add_action('wp_ajax_mvp_save_player_options', 'mvp_save_player_options');

		//playlist
		add_action('wp_ajax_mvp_create_playlist', 'mvp_create_playlist');
		add_action('wp_ajax_mvp_edit_playlist_title', 'mvp_edit_playlist_title');
		add_action('wp_ajax_mvp_delete_playlist', 'mvp_delete_playlist'); // Hook is here
		add_action('wp_ajax_mvp_duplicate_playlist', 'mvp_duplicate_playlist');
		add_action('wp_ajax_mvp_save_playlist_options', 'mvp_save_playlist_options');

		add_action('wp_ajax_mvp_domain_rename', 'mvp_domain_rename');

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

		add_action('wp_ajax_mvp_add_more', 'mvp_add_more');
		add_action('wp_ajax_nopriv_mvp_add_more', 'mvp_add_more');

		//add_action('wp_ajax_mvp_set_disabled', 'mvp_set_disabled');
		add_action('wp_ajax_mvp_set_disabled_all', 'mvp_set_disabled_all');

		//export / import (OLD CSV/ZIP) --- REMOVED HOOKS ---
		// add_action('wp_ajax_mvp_clean_export', 'mvp_clean_export');
		// add_action('wp_ajax_mvp_export_playlist', 'mvp_export_playlist');
		// add_action('wp_ajax_mvp_import_playlist', 'mvp_import_playlist');
		// add_action('wp_ajax_mvp_import_playlist_db', 'mvp_import_playlist_db');

		// Player ZIP export/import (Keep for now, or remove if desired)
		add_action('wp_ajax_mvp_export_player', 'mvp_export_player');
		add_action('wp_ajax_mvp_import_player', 'mvp_import_player');
		add_action('wp_ajax_mvp_import_player_db', 'mvp_import_player_db');

		// Ad ZIP export/import (Keep for now, or remove if desired)
		add_action('wp_ajax_mvp_export_ad', 'mvp_export_ad');
		add_action('wp_ajax_mvp_import_ad', 'mvp_import_ad');
		add_action('wp_ajax_mvp_import_ad_db', 'mvp_import_ad_db');

        // --- JSON Export/Import Hooks ---
        add_action('wp_ajax_mvp_export_single_playlist_json', 'mvp_export_single_playlist_json'); // Single export
        add_action('wp_ajax_mvp_import_playlists_json', 'mvp_import_playlists_json'); // Bulk import
        // ------------------------------------

		add_filter('upload_mimes', 'mvp_enable_custom_mime');

		//stat
		add_action('wp_ajax_mvp_stat_clear', 'mvp_stat_clear');
		add_action('wp_ajax_mvp_stat_create_graph', 'mvp_stat_create_graph');
		add_action('wp_ajax_mvp_get_stat_data', 'mvp_get_stat_data');
		add_action('wp_ajax_mvp_get_stat_user_data', 'mvp_get_stat_user_data');

		add_action('wp_ajax_mvp_play_count', 'mvp_play_count');
		add_action('wp_ajax_nopriv_mvp_play_count', 'mvp_play_count');
		add_action('wp_ajax_mvp_download_count', 'mvp_download_count');
		add_action('wp_ajax_nopriv_mvp_download_count', 'mvp_download_count');
		add_action('wp_ajax_mvp_finish_count', 'mvp_finish_count');
		add_action('wp_ajax_nopriv_mvp_finish_count', 'mvp_finish_count');

		//watched percentage
		add_action('wp_ajax_mvp_set_watched_percentage', 'mvp_set_watched_percentage');
		add_action('wp_ajax_nopriv_mvp_set_watched_percentage', 'mvp_set_watched_percentage');
		add_action('wp_ajax_mvp_get_watched_percentage', 'mvp_get_watched_percentage');
		add_action('wp_ajax_nopriv_mvp_get_watched_percentage', 'mvp_get_watched_percentage');
		add_action('wp_ajax_mvp_clear_watched_percentage', 'mvp_clear_watched_percentage');
		add_action('wp_ajax_mvp_clear_watched_percentage_all', 'mvp_clear_watched_percentage_all');

		//annotation shortcode
		add_action('wp_ajax_mvp_annotation_shortcode', 'mvp_annotation_shortcode');
		add_action('wp_ajax_nopriv_mvp_annotation_shortcode', 'mvp_annotation_shortcode');

		add_action('init', 'mvp_init_setup');
		add_action('enqueue_block_editor_assets', 'mvp_enqueue_block_assets');

		add_action('wp_ajax_mvp_get_shortcode_atts', 'mvp_get_shortcode_atts');

		//add_action('add_meta_boxes', 'mvp_add_metabox_shortcode');

	}else{

		include(dirname(__FILE__) . '/includes/shortcode.php');

		add_shortcode('apmvp', 'mvp_add_player');
		add_shortcode('apmvp_video', 'mvp_video');
		add_shortcode('apmvp_ad', 'mvp_ad');
		add_shortcode('apmvp_get_stats', 'mvp_get_stats');
		add_shortcode('apmvp_playlist_display', 'mvp_playlist_display');

		add_action('wp_enqueue_scripts', 'mvp_enqueue_scripts');
		add_action('init', 'mvp_init_frontend');

	}

	add_action('widgets_init', 'mvp_register_widgets');


    ############################################//
	/* get all shortocde atts */
	//############################################//

	function mvp_get_shortcode_atts(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['player_id'])){

			$player_id = (int) $_POST['player_id']; // Cast to int

			global $wpdb;
			// $wpdb->show_errors(); // Not needed for production

		    $player_table = $wpdb->prefix . "mvp_players";
			$stmt = $wpdb->prepare("SELECT preset, options FROM {$player_table} WHERE id = %d", $player_id);
			$result = $wpdb->get_row($stmt, ARRAY_A);

            if (!$result) {
                wp_send_json_error('Player not found.'); // Handle player not found
                wp_die();
            }

			$default_options = mvp_player_options();
    		$preset_options = mvp_player_options_preset();

    		$player_options = maybe_unserialize($result['options']); // Safe unserialize
	        $preset = $result["preset"];

	        $preset = mvp_checkPreset($preset); // Ensure preset is valid

            // Ensure player_options is an array before merging
            if (!is_array($player_options)) {
                $player_options = [];
            }

            // Ensure preset_options[$preset] exists and is an array
            $current_preset_options = isset($preset_options[$preset]) && is_array($preset_options[$preset]) ? $preset_options[$preset] : [];

            // Correct merge order: Specific options -> Preset -> Defaults
	        $options = array_merge($default_options, $current_preset_options, $player_options);

			// No need to check $stmt !== false here, $wpdb->get_row returns null on failure which is handled above
	    	wp_send_json($options); // Use wp_send_json for consistency
            wp_die();

		}else{
            wp_send_json_error('Player ID not provided.');
			wp_die();
		}
	}

	//############################################//
	/* meta */
	//############################################//

	function mvp_add_metabox_shortcode() {

		wp_enqueue_script("mvp-metabox", plugins_url('/js/admin_global.js', __FILE__), array('jquery'));

		wp_enqueue_script("mvp-metabox-shortcode", plugins_url('/js/admin_shortcode.js', __FILE__), array('jquery'));

		wp_localize_script('mvp-metabox-shortcode', 'mvp_data', array('plugins_url' => plugins_url('', __FILE__),
														         'ajax_url' => admin_url( 'admin-ajax.php'),
														         'security'  => wp_create_nonce( 'mvp-security-nonce' )));

		$id = 'mvp-metabox-shortcode';
		$title = 'Ultimate media gallery Shortcode Generator';
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
		// $wpdb->show_errors(); // Not needed for production
		$player_table = $wpdb->prefix . "mvp_players";
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$global_ad_table = $wpdb->prefix . "mvp_global_ad";

		// Ensure the include file exists
        $include_file = dirname(__FILE__) . "/includes/shortcode_manager.php";
        if (file_exists($include_file)) {
		    include($include_file);
        } else {
            echo '<p>' . esc_html__('Error: Shortcode manager file not found.', MVP_TEXTDOMAIN) . '</p>';
        }

	}

	function mvp_minify_my_metabox( $classes ) {
	    array_push( $classes, 'closed' );
	    return $classes;
	}

	//############################################//
	/* statistics */
	//############################################//

	function mvp_get_stat_data(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

        $data = []; // Initialize data array

		if(isset($_POST['type'])){

			$type = sanitize_text_field($_POST["type"]); // Sanitize type

			if($type == 'player'){

				$player_id = isset($_POST["type_id"]) ? intval($_POST["type_id"]) : 0;
                // Potentially fetch player stats if needed in the future
                // $data = ... fetch player stats ...

			}else if($type == 'playlist'){

				$playlist_id = isset($_POST["type_id"]) ? intval($_POST["type_id"]) : 0;

                if ($playlist_id > 0) {
                    $data = array(
                        'results' => mvp_getAll($playlist_id, null, 'title'),
                        'total' => mvp_getTotal($playlist_id),
                        'top_day' => mvp_getTopPlayToday($playlist_id),
                        'top_day_grand_total' => mvp_getTopPlayLastXDaysTotal(null, $playlist_id, 30),
                        'top_week' => mvp_getTopPlayThisWeek($playlist_id),
                        'top_month' => mvp_getTopPlayThisMonth($playlist_id),
                        'top_plays' => mvp_getTopPlayAllTime($playlist_id),
                        'top_downloads' => mvp_getTopDownloadAllTime($playlist_id),
                        'top_finish' => mvp_getTopFinishAllTime($playlist_id),
                        'top_plays_country' => mvp_getTopPlaysPerCountryAllTime($playlist_id),
                        'top_plays_user' => mvp_getTopPlaysPerUserAllTime($playlist_id),
                    );
                } else {
                     wp_send_json_error('Invalid playlist ID.');
                     wp_die();
                }

			} else {
                 wp_send_json_error('Invalid statistics type.');
                 wp_die();
            }

		    wp_send_json($data); // Use wp_send_json
			wp_die();

		}else {
             wp_send_json_error('Statistics type not provided.');
			 wp_die();
		}

	}

	function mvp_stat_create_graph(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['media_id'])){

			$media_id = intval($_POST["media_id"]);
			$title = stripslashes(sanitize_text_field($_POST['title'])); // Sanitize title
			$return_days = intval($_POST["return_days"]);
            // Ensure data_display is handled safely
            $data_display_raw = isset($_POST['data_display']) ? stripcslashes($_POST['data_display']) : '[]';
            $data_display = json_decode($data_display_raw, true);
             if (json_last_error() !== JSON_ERROR_NONE || !is_array($data_display)) {
                $data_display = []; // Default to empty array on decode error
            }

			global $wpdb;
			// $wpdb->show_errors();
		    $statistics_table = $wpdb->prefix . "mvp_statistics";

		    $results = mvp_getTotalLastXDays($media_id, $title, $return_days, $data_display);

		    wp_send_json($results); // Use wp_send_json

			wp_die();

		}else {
             wp_send_json_error('Media ID not provided for graph.');
			 wp_die();
		}

	}

	function mvp_play_count(){

		// No nonce check here as it's called via nopriv too

		if(isset($_POST['media_id']) && isset($_POST['playlist_id'])){

			$media_id = (int)$_POST["media_id"];
			$playlist_id = (int)$_POST["playlist_id"];
			$date = date("Y-m-d");
			$title = stripslashes(sanitize_text_field($_POST['title'])); // Sanitize
			$thumb = stripslashes(esc_url_raw($_POST['thumb'])); // Sanitize as URL
			$currentTime = (int)$_POST['currentTime'];
			$duration = (int)$_POST['duration'];
			$percentToCountAsPlay = isset($_POST['percentToCountAsPlay']) ? (int) $_POST['percentToCountAsPlay'] : 0; // Default to 0
			$countryData = isset($_POST['countryData']) ? json_decode(stripcslashes($_POST['countryData']), true) : null;
			$video_url = stripslashes(esc_url_raw($_POST['video_url'])); // Sanitize as URL

            $play_add = 0;
            if ($duration > 0 && $percentToCountAsPlay > 0) {
                // Prevent division by zero
                if ($percentToCountAsPlay != 100) {
                     $percent = $duration / (100 / $percentToCountAsPlay);
                     if ($currentTime > $percent) {
                         $play_add = 1;
                     }
                } else { // 100% case
                    if ($currentTime >= $duration) { // Use >= for 100%
                        $play_add = 1;
                    }
                }
            } elseif ($currentTime > 0) { // Count play if any time passed and no percentage set? Maybe adjust logic
                // Decide if any play time counts as a play if percentage isn't set or is 0
                // $play_add = 1; // Uncomment if any play time counts
            }


			global $wpdb;
		    $statistics_table = $wpdb->prefix . "mvp_statistics";
		    $statistics_country_table = $wpdb->prefix . "mvp_statistics_country";
		    $statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play";
		    $statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
		    $statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";

		    //check if exist
		    $existing_stat_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $statistics_table WHERE media_id=%d AND title=%s AND c_date=%s", $media_id, $title, $date));

		    if( $existing_stat_id === null ){//create entry

				$stmt = $wpdb->insert(
                    $statistics_table,
                    [
                        'title' => $title,
                        'c_play' => $play_add, // Use calculated play_add
                        'c_time' => $currentTime,
                        'c_download' => 0,
                        'c_finish' => 0,
                        'c_date' => $date,
                        'media_id' => $media_id,
                        'playlist_id' => $playlist_id
                    ],
                    ['%s', '%d', '%d', '%d', '%d', '%s', '%d', '%d']
                );

		    }else{//update

		    	$stmt = $wpdb->query($wpdb->prepare(
                    "UPDATE $statistics_table SET c_play = c_play + %d, c_time = c_time + %d WHERE id = %d",
                    $play_add, $currentTime, $existing_stat_id
                 ));

		    }


		    //country
		    if(is_array($countryData) && !empty($countryData['country_code'])){
                // Sanitize country data
                $country = sanitize_text_field($countryData['country']);
                $country_code = sanitize_text_field($countryData['country_code']);
                $continent = sanitize_text_field($countryData['continent']);

			    $country_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $statistics_country_table WHERE country_code=%s", $country_code));

			  	if($country_id === null){
					$wpdb->insert(
                        $statistics_country_table,
                        ['country' => $country, 'country_code' => $country_code, 'continent' => $continent],
                        ['%s', '%s', '%s']
                    );
					$country_id = $wpdb->insert_id;
			    }

                if ($country_id) {
                    $existing_country_play_id = $wpdb->get_var($wpdb->prepare(
                        "SELECT id FROM $statistics_country_play_table WHERE media_id=%d AND title=%s AND c_date=%s AND country_id=%d",
                         $media_id, $title, $date, $country_id
                    ));

                    if ($existing_country_play_id === null) {
                        $wpdb->insert(
                            $statistics_country_play_table,
                            [
                                'title' => $title, 'thumb' => $thumb, 'video_url' => $video_url, 'c_play' => $play_add,
                                'c_time' => $currentTime, 'c_date' => $date, 'media_id' => $media_id,
                                'playlist_id' => $playlist_id, 'country_id' => $country_id
                            ],
                            ['%s', '%s', '%s', '%d', '%d', '%s', '%d', '%d', '%d']
                        );
                    } else {
                        $wpdb->query($wpdb->prepare(
                            "UPDATE $statistics_country_play_table SET c_play = c_play + %d, c_time = c_time + %d WHERE id = %d",
                            $play_add, $currentTime, $existing_country_play_id
                        ));
                    }
                }
		    }


		    //user
			if(is_user_logged_in()){
			    $current_user = wp_get_current_user();
			    $uid = $current_user->ID;

			    $user_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $statistics_user_table WHERE user_id=%d", $uid));

			  	if($user_id === null){
			  		$user_display_name = $current_user->display_name;
			  		$user_role = implode(",", $current_user->roles);

					$wpdb->insert(
                        $statistics_user_table,
                        ['user_id' => $uid, 'user_display_name' => $user_display_name, 'user_role' => $user_role],
                        ['%d', '%s', '%s']
                    );
					$user_id = $wpdb->insert_id;
			    }

                if ($user_id) {
                    $existing_user_play_id = $wpdb->get_var($wpdb->prepare(
                        "SELECT id FROM $statistics_user_play_table WHERE media_id=%d AND title=%s AND c_date=%s AND user_id=%d",
                        $media_id, $title, $date, $user_id
                    ));

                    if($existing_user_play_id === null){
                        $wpdb->insert(
                            $statistics_user_play_table,
                             [
                                'title' => $title, 'thumb' => $thumb, 'video_url' => $video_url, 'c_play' => $play_add,
                                'c_time' => $currentTime, 'c_date' => $date, 'media_id' => $media_id,
                                'playlist_id' => $playlist_id, 'user_id' => $user_id
                             ],
                            ['%s', '%s', '%s', '%d', '%d', '%s', '%d', '%d', '%d']
                        );
                    }else{
                        $wpdb->query($wpdb->prepare(
                            "UPDATE $statistics_user_play_table SET c_play = c_play + %d, c_time = c_time + %d WHERE id = %d",
                             $play_add, $currentTime, $existing_user_play_id
                         ));
                    }
                }
			}

		    // Return simple success or potentially the last statement result ($stmt)
	    	wp_send_json_success(['status' => 'counted']);
			wp_die();

		}else {
             wp_send_json_error('Required parameters missing for play count.');
			 wp_die();
		}
	}

	function mvp_download_count(){
        // No nonce check here as it's called via nopriv too

		if(isset($_POST['media_id']) && isset($_POST['playlist_id'])){

			$media_id = (int)$_POST["media_id"];
			$playlist_id = (int)$_POST["playlist_id"];
			$date = date("Y-m-d");
			$title = stripslashes(sanitize_text_field($_POST['title'])); // Sanitize

			global $wpdb;
			// $wpdb->show_errors();
		    $statistics_table = $wpdb->prefix . "mvp_statistics";

		    //check if exist
		    $existing_stat_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $statistics_table WHERE media_id=%d AND title=%s AND c_date=%s", $media_id, $title, $date));

		    if($existing_stat_id === null){//create entry
				$stmt = $wpdb->insert(
                     $statistics_table,
                     [
                         'title' => $title, 'c_play' => 0, 'c_time' => 0, 'c_download' => 1,
                         'c_finish' => 0, 'c_date' => $date, 'media_id' => $media_id, 'playlist_id' => $playlist_id
                     ],
                     ['%s', '%d', '%d', '%d', '%d', '%s', '%d', '%d']
                 );
		    }else{//update
		    	$stmt = $wpdb->query($wpdb->prepare(
                    "UPDATE $statistics_table SET c_download = c_download + 1 WHERE id = %d",
                    $existing_stat_id
                 ));
		    }

		    if($stmt !== false){
	    		wp_send_json_success(['status' => 'counted']);
	    	} else {
                wp_send_json_error(['status' => 'failed', 'error' => $wpdb->last_error]);
            }
			wp_die();

		}else {
            wp_send_json_error('Required parameters missing for download count.');
			wp_die();
		}

	}

	function mvp_finish_count(){
        // No nonce check here as it's called via nopriv too

		if(isset($_POST['media_id']) && isset($_POST['playlist_id'])){

			$media_id = (int)$_POST["media_id"];
			$playlist_id = (int)$_POST["playlist_id"];
			$date = date("Y-m-d");
			$title = stripslashes(sanitize_text_field($_POST['title'])); // Sanitize

			global $wpdb;
			// $wpdb->show_errors();
		    $statistics_table = $wpdb->prefix . "mvp_statistics";

		    //check if exist
            $existing_stat_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $statistics_table WHERE media_id=%d AND title=%s AND c_date=%s", $media_id, $title, $date));

		    if($existing_stat_id === null){//create entry
				$stmt = $wpdb->insert(
                     $statistics_table,
                     [
                         'title' => $title, 'c_play' => 0, 'c_time' => 0, 'c_download' => 0,
                         'c_finish' => 1, 'c_date' => $date, 'media_id' => $media_id, 'playlist_id' => $playlist_id
                     ],
                     ['%s', '%d', '%d', '%d', '%d', '%s', '%d', '%d']
                 );
		    }else{//update
		    	$stmt = $wpdb->query($wpdb->prepare(
                    "UPDATE $statistics_table SET c_finish = c_finish + 1 WHERE id = %d",
                    $existing_stat_id
                 ));
		    }

		    if($stmt !== false){
	    		wp_send_json_success(['status' => 'counted']);
	    	} else {
                wp_send_json_error(['status' => 'failed', 'error' => $wpdb->last_error]);
            }
			wp_die();

		}else {
             wp_send_json_error('Required parameters missing for finish count.');
			 wp_die();
		}

	}

	function mvp_get_stats($atts){

		if(!isset($atts['action']))return "Action parameter missing!";

		$action = $atts['action'];
		$playlist_id = isset($atts['playlist_id']) ? $atts["playlist_id"] : -1; // Keep allowing -1 for "all playlists" maybe? Or sanitize to 0/null
        $days = isset($atts['days']) ? intval($atts['days']) : 7;
        $limit = isset($atts['limit']) ? intval($atts['limit']) : 10;
        $dir = isset($atts['dir']) && in_array(strtoupper($atts['dir']), ['ASC', 'DESC']) ? strtoupper($atts['dir']) : 'DESC'; // Validate direction
        $title = isset($atts['title']) ? sanitize_text_field($atts['title']) : '';
        $hiperlink_video = isset($atts['hiperlink_video']) && $atts['hiperlink_video'] === '1' ? '1' : '0'; // Ensure 0 or 1

        $results = []; // Initialize results

        // Add more input validation if necessary (e.g., playlist_id format)

        if ($action == 'top_play_today') {
            $results = mvp_getTopPlayToday($playlist_id, $limit, $dir);
        } elseif ($action == 'top_play_last_x_days') {
            $results = mvp_getTopPlayLastXDays($playlist_id, $days, $limit, $dir);
        } elseif ($action == 'top_play_this_week') {
            $results = mvp_getTopPlayThisWeek($playlist_id, $limit, $dir);
        } elseif ($action == 'top_play_this_month') {
            $results = mvp_getTopPlayThisMonth($playlist_id, $limit, $dir);
        } elseif ($action == 'top_play_all_time') {
            $results = mvp_getTopPlayAllTime($playlist_id, $limit, $dir);
        } elseif ($action == 'top_download_all_time') {
            $results = mvp_getTopDownloadAllTime($playlist_id, $limit, $dir);
        } elseif ($action == 'top_finish_all_time') {
            $results = mvp_getTopFinishAllTime($playlist_id, $limit, $dir);
        } else {
            return "Action parameter incorrect!";
        }


		if(is_array($results) && count($results) > 0){ // Check if $results is a non-empty array

			$id = 'mvp-stat-wrap'.mt_rand();
            $player_id = isset($atts['player_id']) ? intval($atts['player_id']) : 0; // Get player ID for JS linking

		  	$markup = '<div class="mvp-stat-wrap" id="'.esc_attr($id).'">'; // Escape ID
            if (!empty($title)) {
                $markup .= '<div class="mvp-stat-wrap-header">
                                <span>'.esc_html($title).'</span>
                            </div>';
            }
            $markup .= '<ol>';
            foreach($results as $key) :
                $item_title = isset($key['title']) ? trim($key['title']) : '';
                $item_media_id = isset($key['media_id']) ? esc_attr($key['media_id']) : '';
                $item_count = isset($key['total_count']) ? (int) $key['total_count'] : 0;

                if($hiperlink_video == '1' && $player_id > 0 && !empty($item_media_id)){
                    $markup .= '<li class="mvp-stat-item" data-media-id="'. $item_media_id .'" title="'.esc_attr($item_title).'">';
                    $markup .= '<a href="#">'.esc_html($item_title).'</a>';
                }else{
                    $markup .= '<li class="mvp-stat-item">';
                    $markup .= esc_html($item_title);
                }

                $markup .= '<span class="mvp-stat-info"> ('. $item_count .')</span></li>';
            endforeach;
            $markup .= '</ol>
			</div>';

			if($player_id > 0 && $hiperlink_video == '1'){
        		// Generate JS safely
        		$markup .= "<script type=\"text/javascript\">
                    (function() {
                        var elem = document.getElementById('".esc_js($id)."');
                        if (!elem) return;
                        var items = elem.querySelectorAll('.mvp-stat-item[data-media-id]'); // Select only items with media ID
                        var i, len = items.length;
                        function playMedia(e) {
                            e.preventDefault();
                            var mediaId = this.getAttribute('data-media-id');
                            var mediaTitle = this.getAttribute('title');
                            if (typeof window.mvp_player".esc_js($player_id)." !== 'undefined' && window.mvp_player".esc_js($player_id).".loadMedia) {
                                window.mvp_player".esc_js($player_id).".loadMedia('id-title', mediaId, mediaTitle);
                            } else {
                                console.error('MVP Player ".esc_js($player_id)." not found or loadMedia not available.');
                            }
                            return false;
                        }
                        for (i = 0; i < len; i++) {
                            items[i].removeEventListener('click', playMedia); // Remove listener first to prevent duplicates
                            items[i].addEventListener('click', playMedia, false);
                        }
                    })();
				</script>";
			}

			return $markup;

		}else{
			return ''; // Return empty string if no results
		}

	}

	function mvp_stat_clear(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}
        if (!current_user_can(MVP_CAPABILITY)) {
            wp_send_json_error( 'Permission denied.' , 403);
            wp_die();
        }

		if(isset($_POST['playlist_id'])){

			$playlist_id = intval($_POST["playlist_id"]); // Sanitize

			global $wpdb;
		    $statistics_table = $wpdb->prefix . "mvp_statistics";
            $stmt = false; // Initialize stmt

	    	if($playlist_id > 0){ // Clear specific playlist
	    		$stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$statistics_table} WHERE playlist_id=%d", $playlist_id));
	    	}elseif ($playlist_id === -1) { // Clear all playlists (use === to be explicit)
	    		$stmt = $wpdb->query("DELETE FROM {$statistics_table}");
	    	} else {
                 wp_send_json_error('Invalid playlist ID for clearing stats.');
                 wp_die();
            }


	    	if($stmt !== false){
	    		wp_send_json_success("Statistics cleared successfully.");
	    	} else {
                wp_send_json_error('Failed to clear statistics. ' . $wpdb->last_error);
            }

		    wp_die();

		}else{
            wp_send_json_error('Playlist ID not provided for clearing stats.');
			wp_die();
		}
	}

	function mvp_get_stat_user_data(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}
        if (!current_user_can(MVP_CAPABILITY)) {
            wp_send_json_error( 'Permission denied.' , 403);
            wp_die();
        }

		if(isset($_POST['user_id'])){

			$user_id = intval($_POST["user_id"]);

            if ($user_id <= 0) {
                wp_send_json_error('Invalid user ID provided.');
                wp_die();
            }

			$results = mvp_getTopPlaysPerUserVideosAllTime($user_id);

		    wp_send_json($results); // Send as JSON

			wp_die();

		}else {
            wp_send_json_error('User ID not provided for user stats.');
			wp_die();
		}

	}

	//############################################//
	/* watched */
	//############################################//

	function mvp_set_watched_percentage(){
         // No nonce check - called via nopriv

		if(isset($_POST['media_id']) || isset($_POST['url'])){ // Require at least one identifier

            // Sanitize inputs
			$playlist_id = isset($_POST["playlist_id"]) && !mvp_nullOrEmpty($_POST["playlist_id"]) ? intval($_POST["playlist_id"]) : NULL;
			$watched = isset($_POST['watched']) ? (int)$_POST['watched'] : 0;
			$duration = isset($_POST['duration']) ? (int)$_POST['duration'] : 0;
			$media_id = isset($_POST["media_id"]) && !mvp_nullOrEmpty($_POST["media_id"]) ? intval($_POST["media_id"]) : NULL;
			$url = isset($_POST["url"]) && !mvp_nullOrEmpty($_POST["url"]) ? esc_url_raw($_POST["url"]) : NULL; // Sanitize URL


			global $wpdb;
		    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

            $stmt = false;
            $response_arr = [];

            // Prepare data array only with non-null values needed for insert/update
            $data_to_insert = [];
            if ($url !== null) $data_to_insert['title'] = $url; // Use 'title' column for URL
            if ($watched !== null) $data_to_insert['watched'] = $watched;
            if ($duration !== null) $data_to_insert['duration'] = $duration;
            if ($media_id !== null) $data_to_insert['media_id'] = $media_id;
            if ($playlist_id !== null) $data_to_insert['playlist_id'] = $playlist_id;

            // Prepare format array dynamically based on keys present
            $format = [];
            if (isset($data_to_insert['title'])) $format[] = '%s';
            if (isset($data_to_insert['watched'])) $format[] = '%d';
            if (isset($data_to_insert['duration'])) $format[] = '%d';
            if (isset($data_to_insert['media_id'])) $format[] = '%d';
            if (isset($data_to_insert['playlist_id'])) $format[] = '%d';

            if (empty($data_to_insert)) {
                wp_send_json_error('No valid data provided to set watched percentage.');
                wp_die();
            }

            // Determine existing record based on identifiers provided
            $existing_id = null;
		    if ($media_id && $url) {
		        $existing_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $watched_percentage_table WHERE media_id=%d AND title=%s", $media_id, $url));
		    } else if ($url) { // Only URL provided
		        $existing_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $watched_percentage_table WHERE title=%s AND media_id IS NULL", $url));
            } else if ($media_id) { // Only media_id provided (no URL) - less common case?
                $existing_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $watched_percentage_table WHERE media_id=%d AND title IS NULL", $media_id));
            }


		    if($existing_id === null){//create entry
		    	$stmt = $wpdb->insert( $watched_percentage_table, $data_to_insert, $format );
		    }else{//update only if larger
                // Only update 'watched' and potentially 'duration' if needed
                $stmt = $wpdb->query($wpdb->prepare(
                    "UPDATE $watched_percentage_table SET watched = GREATEST(%d, watched), duration = %d WHERE id = %d",
                    $watched, $duration, $existing_id
                ));
		    }

            // Build response based on what was processed
             if ($media_id !== null) $response_arr['media_id'] = $media_id;
             if ($url !== null) $response_arr['title'] = $url;
             $response_arr['watched'] = $watched;
             $response_arr['duration'] = $duration;
             $response_arr['update_status'] = ($stmt !== false);


			wp_send_json($response_arr);
			wp_die();

		}else {
            wp_send_json_error('Required identifiers (media_id or url) missing.');
			wp_die();
		}
	}

	function mvp_get_watched_percentage(){
        // No nonce check - called via nopriv

		if(isset($_POST['data'])){

			global $wpdb;
		    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

			//https://stackoverflow.com/questions/44706196/mysql-multiple-columns-in-in-clause

            $data_raw = stripcslashes($_POST['data']);
			$data = json_decode($data_raw, true);

            if (json_last_error() !== JSON_ERROR_NONE || !is_array($data) || empty($data)) {
                wp_send_json_error('Invalid or empty data provided.');
                wp_die();
            }

			$where_clauses = [];
            $where_values = [];

            foreach ($data as $item) {
                $item_url = isset($item['url']) ? esc_url_raw($item['url']) : null;
                $item_media_id = isset($item['media_id']) ? intval($item['media_id']) : null;

                if ($item_url !== null && $item_media_id !== null) {
                    $where_clauses[] = "(media_id = %d AND title = %s)";
                    $where_values[] = $item_media_id;
                    $where_values[] = $item_url;
                } elseif ($item_url !== null) {
                     $where_clauses[] = "(media_id IS NULL AND title = %s)";
                     $where_values[] = $item_url;
                } elseif ($item_media_id !== null) {
                    $where_clauses[] = "(media_id = %d AND title IS NULL)";
                    $where_values[] = $item_media_id;
                }
                 // Skip item if both are null
            }

            if (empty($where_clauses)) {
                 wp_send_json([]); // Return empty array if no valid conditions generated
                 wp_die();
            }

            $where_sql = implode(' OR ', $where_clauses);
			$query = "SELECT media_id, title, watched, duration FROM $watched_percentage_table WHERE " . $where_sql;

			$stmt = $wpdb->get_results($wpdb->prepare($query, $where_values), ARRAY_A);

			if($stmt !== false){
	    		wp_send_json($stmt); // Send result (might be empty array)
	    	} else {
                wp_send_json_error('Database error retrieving watched percentage. ' . $wpdb->last_error);
            }

			wp_die();

		}else {
             wp_send_json_error('Required data not provided.');
			 wp_die();
		}
	}

	function mvp_clear_watched_percentage(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}
        if (!current_user_can(MVP_CAPABILITY)) {
             wp_send_json_error( 'Permission denied.' , 403);
             wp_die();
        }

		if(isset($_POST['playlist_id'])){

			$playlist_id = (int)$_POST["playlist_id"];

            if ($playlist_id <= 0) {
                 wp_send_json_error( 'Invalid playlist ID provided.' );
                 wp_die();
            }

			global $wpdb;
		    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

			$stmt = $wpdb->query($wpdb->prepare(
                "UPDATE $watched_percentage_table SET watched='0' WHERE playlist_id=%d",
                 $playlist_id
             ));

			if($stmt !== false){
	    		wp_send_json_success(['cleared_count' => $stmt]); // Return number of rows affected
	    	} else {
                wp_send_json_error('Failed to clear watched percentage. ' . $wpdb->last_error);
            }

			wp_die();

		}else {
             wp_send_json_error( 'Playlist ID not provided.' );
			 wp_die();
		}
	}

	function mvp_clear_watched_percentage_all(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}
         if (!current_user_can(MVP_CAPABILITY)) { // Add capability check
             wp_send_json_error( 'Permission denied.' , 403);
             wp_die();
         }

		global $wpdb;
	    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

		$stmt = $wpdb->query("TRUNCATE TABLE $watched_percentage_table"); // TRUNCATE is faster if permissions allow

		if($stmt !== false){
    		wp_send_json_success(['status' => 'All watched percentages cleared.']);
    	} else {
             // If TRUNCATE fails (e.g., permissions), try DELETE
            $stmt_delete = $wpdb->query("DELETE FROM $watched_percentage_table");
             if ($stmt_delete !== false) {
                  wp_send_json_success(['status' => 'All watched percentages cleared (using DELETE).']);
             } else {
                wp_send_json_error('Failed to clear all watched percentages. ' . $wpdb->last_error);
             }
        }

		wp_die();

	}

	//############################################//
	/* Annotation Shortcode */
	//############################################//

	function mvp_annotation_shortcode(){
        // No nonce check - called via nopriv

		if(isset($_POST['shortcode'])){

			$shortcode_raw = isset($_POST['shortcode']) ? stripcslashes($_POST['shortcode']) : '';
			$shortcode = json_decode($shortcode_raw, true); // Assume shortcode comes as a JSON string like "[shortcode atts=val]"
			$annotation_id = isset($_POST['annotation_id']) ? sanitize_text_field($_POST['annotation_id']) : ''; // Sanitize ID

            // Basic validation of the shortcode format expected
            if (json_last_error() !== JSON_ERROR_NONE || !is_string($shortcode) || substr(trim($shortcode), 0, 1) !== '[' || substr(trim($shortcode), -1) !== ']') {
                 wp_send_json_error('Invalid shortcode format received.');
                 wp_die();
            }


			$output = do_shortcode($shortcode); // Execute the shortcode

			wp_send_json(["annotation_id" => $annotation_id, "output" => $output]);
			wp_die();

		}else {
             wp_send_json_error('Shortcode data not provided.');
			 wp_die();
		}
	}

	//############################################//
	/* mime */
	//############################################//

	function mvp_enable_custom_mime ( $mime_types = array() ) {
        // Ensure input is an array
        if (!is_array($mime_types)) $mime_types = [];

	   $mime_types['m3u8'] = 'application/x-mpegURL'; // Keep it simple
	   $mime_types['ts'] = 'video/MP2T';
	   $mime_types['xml'] = 'application/xml'; // Standard XML mime type
	   $mime_types['json'] = 'application/json';

	   return $mime_types;
	}

	function mvp_init_setup() {

		if (function_exists('register_block_type')) {
            register_block_type('ultimate-media-gallery/block', array(
                'attributes' => array(
                    'player_id' => array( 'type' => 'string' ),
                    'playlist_id' => array( 'type' => 'string' ),
                    'ad_id' => array( 'type' => 'string' )
                ),
                 // Consider adding render_callback if needed for dynamic blocks
                // 'render_callback' => 'mvp_render_gutenberg_block',
                 'editor_script' => 'apmvp-block', // Associate script with block
                 'editor_style' => 'mvp-block-editor-css', // Associate style with block
            ));
        }

	}

	function mvp_register_widgets(){
		register_widget('UltimateMediaGalleryWidget');
	}

	function mvp_init_frontend() {

		global $wpdb;
	    $settings_table = $wpdb->prefix . "mvp_settings";
	    $result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);

	    if($result){
	    	$settings = maybe_unserialize($result['options']); // Safe unserialize
             if (!is_array($settings)) $settings = [];

		    $overide_wp_video = isset($settings["overide_wp_video"]) ? (bool)($settings["overide_wp_video"]) : false;

		    if($overide_wp_video){
		    	add_filter('wp_video_shortcode_override', 'mvp_video_shortcode_override', 10, 2);
		    	// Careful with removing autop globally, might affect other content.
                // Consider applying only where the shortcode exists? Or use CSS to counteract.
		    	// add_filter('the_content', 'mvp_disable_wp_auto_p', 0 );
		    	add_filter('embed_oembed_html', 'mvp_embed_oembed_html', 99, 4);
		    	add_filter('video_embed_html', 'mvp_embed_oembed_html'); // Hook for self-hosted video embeds
		    }

	    }

	}

	function mvp_enqueue_block_assets() {
        // Only enqueue block assets for the editor screen
        if (is_admin() && function_exists('register_block_type')) {
			wp_enqueue_script(
                'apmvp-block',
                plugins_url('js/block.js', __FILE__),
                ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor'], // Add dependencies
                 filemtime(plugin_dir_path(__FILE__) . 'js/block.js'), // Versioning
                 true // In footer
             );

			wp_enqueue_style(
                'mvp-block-editor-css',
                plugins_url('/css/block.css', __FILE__),
                ['wp-edit-blocks'],
                filemtime(plugin_dir_path(__FILE__) . 'css/block.css') // Versioning
            );

			global $wpdb;
            $player_table = $wpdb->prefix . "mvp_players";
            $playlist_table = $wpdb->prefix . "mvp_playlists";
            $global_ad_table = $wpdb->prefix . "mvp_global_ad";

            //load players
            $players = $wpdb->get_results("SELECT id, title FROM {$player_table} ORDER BY title ASC", ARRAY_A);
            //load playlists
            $playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A);
            //load ads
            $ads = $wpdb->get_results("SELECT id, title FROM {$global_ad_table} ORDER BY title ASC", ARRAY_A);

            // Prepare data for localization - ensure it's structured for easy use in JS
            $block_data = [
                'players' => !empty($players) ? $players : [],
                'playlists' => !empty($playlists) ? $playlists : [],
                'ads' => !empty($ads) ? $ads : [],
                 // Add other necessary data like AJAX URL or nonces if the block needs them
                'ajax_url' => admin_url('admin-ajax.php'),
            ];

			wp_localize_script( 'apmvp-block', 'mvp_block_data', $block_data);

        }

    }

	function mvp_disable_wp_auto_p( $content ) {
        // This function is commented out in the init hook, but kept here for reference
        // Only remove autop if the shortcode is present? This is more complex.
        // if ( has_shortcode( $content, 'apmvp' ) || has_shortcode( $content, 'apmvp_video' ) ) {
	    //    remove_filter( 'the_content', 'wpautop' );
	    //    remove_filter( 'the_excerpt', 'wpautop' );
        // }
	    return $content;
	}

	function mvp_embed_oembed_html( $cache, $url = null, $attr = null, $post_ID = null ) {
        // This filter can be called with different arguments (e.g., video_embed_html only passes $cache)
        // We need the URL to decide what to do.
        if ($url === null && is_string($cache) && preg_match('/src=[\'"]([^\'"]+)[\'"]/', $cache, $matches)) {
            // Attempt to extract URL from cache if called via video_embed_html or similar
            $url = $matches[1];
        }

        if ($url === null) return $cache; // Cannot proceed without URL

        // Ensure $attr is an array
        if ($attr === null) $attr = [];


		if ( false !== strpos( $url, 'vimeo' ) ) {

			if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $matches)) {

				$attr['path'] = $matches[3];
				if(isset($attr['width']))$attr['wrapper_max_width'] = $attr['width'];
				$attr['type'] = 'vimeo_single';
				$attr['playlist_position'] = 'no-playlist'; // Force no playlist for overrides
				$attr['use_previous'] = '0';
				$attr['use_next'] = '0';
				$attr['noapi'] = '1'; // Assume no API needed for simple embed override
				$attr['vimeo_player_type'] = 'chromeless'; // Default player type
				return mvp_add_player($attr);

			}else{
				return $cache; // Return original WP embed if URL doesn't match pattern
			}

		}

		else if ( false !== strpos( $url, 'youtube' ) || false !== strpos( $url, 'youtu.be' ) ) {

			if ( preg_match("#(?<=v=)[a-zA-Z0-9\-_]+(?=&)|(?<=v\/)[^&\n\?]+|(?<=v=)[^&\n\?]+|(?<=youtu.be/)[^&\n\?]+#", $url, $matches)) { // Improved regex

				$attr['path'] = $matches[0];
				if(isset($attr['width']))$attr['wrapper_max_width'] = $attr['width'];
				$attr['type'] = 'youtube_single';
				$attr['playlist_position'] = 'no-playlist'; // Force no playlist
				$attr['use_previous'] = '0';
				$attr['use_next'] = '0';
				$attr['noapi'] = '1'; // Assume no API
				return mvp_add_player($attr);

			}else{
                // Check for YouTube playlist URL
				parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
				if(!empty($vars['list'])){

					$attr['path'] = $vars['list'];
					if(isset($attr['width']))$attr['wrapper_max_width'] = $attr['width'];
					$attr['type'] = 'youtube_playlist';
					// $attr['playlist_position'] = 'vrb'; // Let player defaults handle playlist position unless specified
					return mvp_add_player($attr);

				}else{
					return $cache; // Return original WP embed if not single video or playlist
				}
			}
		}
		// Add handling for self-hosted video embeds if needed (might conflict with wp_video_shortcode_override)
        // else if ( preg_match('/\.(mp4|webm|ogv)(\?.*)?$/i', $url) ) { ... }

		else return $cache; // Return original WP embed for other URLs

	}

	function mvp_video_shortcode_override( $html, $attr, $content = null ) { // Added $content default null

		// Check for common video file extensions in attributes
        $video_src = '';
        if (isset($attr['src'])) $video_src = $attr['src'];
        elseif (isset($attr['mp4'])) $video_src = $attr['mp4'];
        elseif (isset($attr['webm'])) $video_src = $attr['webm'];
        elseif (isset($attr['ogv'])) $video_src = $attr['ogv'];

		if(!empty($video_src)){
			$attr['path'] = $video_src; // Use the detected source
			if(isset($attr['width']))$attr['wrapper_max_width'] = $attr['width'];
            if(isset($attr['poster']))$attr['poster'] = $attr['poster']; // Pass poster if available
			$attr['type'] = 'video'; // Assume 'video' type
			$attr['playlist_position'] = 'no-playlist'; // Force no playlist
			$attr['use_previous'] = '0';
			$attr['use_next'] = '0';
			return mvp_add_player($attr);
		}else{
			return $html; // Return default WP video shortcode HTML if no source found
		}

	};

	function mvp_admin_menu(){

		add_menu_page("Ultimate Media Gallery Player manager", "Ultimate Media Gallery", MVP_CAPABILITY, "mvp_settings", "mvp_settings_page", 'dashicons-playlist-video');

		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Global Settings", MVP_CAPABILITY, 'mvp_settings');
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Player manager", MVP_CAPABILITY, 'mvp_player_manager', "mvp_player_manager_page");
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Playlist manager", MVP_CAPABILITY, 'mvp_playlist_manager', 'mvp_playlist_manager_page');
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Ad manager", MVP_CAPABILITY, 'mvp_ad_manager', 'mvp_ad_manager_page');
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Shortcodes", MVP_CAPABILITY, 'mvp_shortcodes', 'mvp_shortcodes_page');
		add_submenu_page('mvp_settings', "Ultimate Media Gallery", 'Statistics', MVP_CAPABILITY, 'mvp_statistics', 'mvp_statistics_page');
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Demo", MVP_CAPABILITY, 'mvp_demo', 'mvp_demo_page');

	}

	function mvp_settings_page(){

		global $wpdb;
		// $wpdb->show_errors();
		$settings_table = $wpdb->prefix . "mvp_settings";

        $include_file = dirname(__FILE__) . "/includes/settings.php";
        if (file_exists($include_file)) {
		    include($include_file);
        } else {
             echo '<div class="wrap"><h2>Error</h2><p>' . esc_html__('Settings page file not found.', MVP_TEXTDOMAIN) . '</p></div>';
        }
	}

	function mvp_player_manager_page(){

		global $wpdb;
		// $wpdb->show_errors();
		$player_table = $wpdb->prefix . "mvp_players";
		$playlist_table = $wpdb->prefix . "mvp_playlists"; // Needed? Maybe not directly on manager page.

		$action = "";
		if(isset($_GET['action'])){
			$action = sanitize_key($_GET['action']); // Sanitize action
		}

        $base_path = dirname(__FILE__) . "/includes/";

		switch($action) {
			case 'edit_player':
                 $include_file = $base_path . "edit_player.php";
                 if (file_exists($include_file)) include($include_file); else echo "Error: edit_player.php not found";
				 break;
            // Removed redundant cases
			// case 'save_options': // Handled via AJAX
			// case 'delete_player': // Handled via AJAX
			default:
                 $include_file = $base_path . "player_manager.php";
                 if (file_exists($include_file)) include($include_file); else echo "Error: player_manager.php not found";
				 break;
		}

	}

	function mvp_playlist_manager_page(){

		global $wpdb; // $wpdb defined here
		// $wpdb->show_errors();
        // Table names are defined here and used within the included file
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$media_table = $wpdb->prefix . "mvp_media";
		$ad_table = $wpdb->prefix . "mvp_ad";
		$annotation_table = $wpdb->prefix . "mvp_annotation";
		$path_table = $wpdb->prefix . "mvp_path";
		$subtitle_table = $wpdb->prefix . "mvp_subtitle";
		$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";
		$statistics_table = $wpdb->prefix . "mvp_statistics";


		$action = "";
		if(isset($_GET['action'])){
			$action = sanitize_key($_GET['action']); // Sanitize
		}

        $base_path = dirname(__FILE__) . "/includes/";

		switch($action) {

			case 'edit_playlist':
			case 'add_media_form': // Keep this if it's a valid action for edit_playlist screen
                 $include_file = $base_path . "edit_playlist.php";
                 if (file_exists($include_file)) include($include_file); else echo "Error: edit_playlist.php not found";
				 break;
			// case 'delete_playlist': // Handled via AJAX
			// 	 include("includes/playlist_manager.php");
			// 	 break;
			default:
                 $include_file = $base_path . "playlist_manager.php";
                 if (file_exists($include_file)) include($include_file); else echo "Error: playlist_manager.php not found";
				 break;
		}

	}

	function mvp_ad_manager_page(){

		global $wpdb;
		// $wpdb->show_errors();
		$ad_table = $wpdb->prefix . "mvp_ad";
		$annotation_table = $wpdb->prefix . "mvp_annotation";
		$global_ad_table = $wpdb->prefix . "mvp_global_ad";

		$action = "";
		if(isset($_GET['action'])){
			$action = sanitize_key($_GET['action']); // Sanitize
		}

        $base_path = dirname(__FILE__) . "/includes/";

		switch($action) {
			case 'edit_ad':
                 $include_file = $base_path . "edit_ad.php";
                 if (file_exists($include_file)) include($include_file); else echo "Error: edit_ad.php not found";
				 break;
			// case 'save_options': // Handled via AJAX
			// case 'delete_ad': // Handled via AJAX
			default:
                 $include_file = $base_path . "ad_manager.php";
                 if (file_exists($include_file)) include($include_file); else echo "Error: ad_manager.php not found";
				 break;
		}

	}

	function mvp_shortcodes_page(){

		global $wpdb;
		// $wpdb->show_errors();
		$player_table = $wpdb->prefix . "mvp_players";
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$global_ad_table = $wpdb->prefix . "mvp_global_ad";

        $include_file = dirname(__FILE__) . "/includes/shortcode_manager.php";
        if (file_exists($include_file)) {
		    include($include_file);
        } else {
             echo '<div class="wrap"><h2>Error</h2><p>' . esc_html__('Shortcode manager page file not found.', MVP_TEXTDOMAIN) . '</p></div>';
        }
	}

	function mvp_statistics_page(){

		global $wpdb;
		// $wpdb->show_errors();
		$statistics_table = $wpdb->prefix . "mvp_statistics";
		$playlist_table = $wpdb->prefix . "mvp_playlists";

        $include_file = dirname(__FILE__) . "/includes/statistics_display.php";
        if (file_exists($include_file)) {
		    include($include_file);
        } else {
             echo '<div class="wrap"><h2>Error</h2><p>' . esc_html__('Statistics display page file not found.', MVP_TEXTDOMAIN) . '</p></div>';
        }

	}

	function mvp_demo_page(){

		global $wpdb;
		// $wpdb->show_errors();

        $include_file = dirname(__FILE__) . "/includes/demo.php";
        if (file_exists($include_file)) {
		    include($include_file);
        } else {
             echo '<div class="wrap"><h2>Error</h2><p>' . esc_html__('Demo page file not found.', MVP_TEXTDOMAIN) . '</p></div>';
        }
	}



	function mvp_admin_enqueue_scripts( $hook_suffix ) {


		global $wpdb;
	    $settings_table = $wpdb->prefix . "mvp_settings";
		$stmt = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);

		$default_settings = mvp_get_settings();

		if($stmt){
			$result = maybe_unserialize($stmt['options']); // Safe unserialize
             if (!is_array($result)) $result = [];
			 $settings = array_merge($default_settings, $result); // Merge ensures defaults are present
		}else{
			$settings = $default_settings;
		}



		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_media(); // For WP Media library integration

		wp_enqueue_style('mvp-admin-css', plugins_url('/css/admin.css', __FILE__), [], filemtime(plugin_dir_path(__FILE__) . 'css/admin.css'));


		wp_enqueue_style("spectrum", plugins_url('/css/spectrum.css', __FILE__), [], '1.8.1'); // Add version
		wp_enqueue_script("spectrum", plugins_url('/js/spectrum.js', __FILE__), array('jquery'), '1.8.1', true); // Add version, load in footer

		wp_enqueue_script("mvp-general", plugins_url('/js/admin_global.js', __FILE__), array('jquery', 'jquery-ui-sortable'), filemtime(plugin_dir_path(__FILE__) . 'js/admin_global.js'), true); // Add version, load in footer

        // Determine current admin page base
        $current_screen = get_current_screen();
        $page_base = $current_screen ? $current_screen->base : '';

		// Load assets based on specific admin pages
		if ($page_base === 'toplevel_page_mvp_settings') { // Adjusted base for main settings page
             if (!empty($settings['fontAwesomeCssUrl'])) wp_enqueue_style("fa", esc_url($settings['fontAwesomeCssUrl']));//pi icons - Ensure URL is safe
        }
        elseif ($page_base === 'ultimate-media-gallery_page_mvp_player_manager') {
            // Player Manager specific assets
            wp_enqueue_style("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css", [], '4.0.13');
            wp_enqueue_script("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js", array('jquery'), '4.0.13', true);

            wp_enqueue_style("codemirror", plugins_url('/css/codemirror.min.css', __FILE__), [], '5.65.2'); // Example version
            wp_enqueue_script("codemirror", plugins_url('/js/codemirror.min.js', __FILE__), [], '5.65.2', true); // Example version
            // Potentially load JS modes for CSS/JS: wp_enqueue_script("codemirror-css", plugins_url('/js/mode/css/css.js', __FILE__), ['codemirror'], '5.65.2', true);
            // Potentially load admin_player_manager.js if needed
        }
        elseif ($page_base === 'ultimate-media-gallery_page_mvp_playlist_manager') {
             // Playlist Manager specific assets
             wp_enqueue_style("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css", [], '4.0.13');
             wp_enqueue_script("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js", array('jquery'), '4.0.13', true);

             // Enqueue Import/Export JS
             wp_enqueue_script("mvp-admin-import-export", plugins_url('/js/admin_import_export.js', __FILE__), array('jquery'), filemtime(plugin_dir_path(__FILE__) . 'js/admin_import_export.js'), true); // Versioning
             // Localize data for the import/export script
             wp_localize_script('mvp-admin-import-export', 'mvp_import_export_data', array(
                 'ajax_url' => admin_url('admin-ajax.php'),
                 'security' => wp_create_nonce('mvp-security-nonce') // Nonce for export/delete button action
             ));
             // Potentially load admin_playlist_manager.js if needed
        }
        elseif ($page_base === 'ultimate-media-gallery_page_mvp_ad_manager') {
            // Ad Manager specific assets (if any)
            // Potentially load admin_admanager.js if needed
        }
        elseif ($page_base === 'ultimate-media-gallery_page_mvp_statistics') {
            // Statistics specific assets
            wp_enqueue_script("selectize", "//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js", ['jquery'], '0.12.6', true);
	        wp_enqueue_style("selectize", "//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css", [], '0.12.6');
	        wp_enqueue_script("momentjs", "//cdn.jsdelivr.net/momentjs/latest/moment.min.js", [], null, true); // Use null version for CDN
	        wp_enqueue_script("chart", "//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js", ['momentjs'], '2.9.3', true);
	        wp_enqueue_script("mvp-admin-stat", plugins_url('/js/admin_stat.js', __FILE__), array('jquery', 'chart'), filemtime(plugin_dir_path(__FILE__) . 'js/admin_stat.js'), true); // Versioning
        }
        elseif ($page_base === 'ultimate-media-gallery_page_mvp_shortcodes') {
            if (!empty($settings['fontAwesomeCssUrl'])) wp_enqueue_style("fa", esc_url($settings['fontAwesomeCssUrl'])); // Ensure URL is safe
	        wp_enqueue_script("mvp-admin-shortcode", plugins_url('/js/admin_shortcode.js', __FILE__), array('jquery'), filemtime(plugin_dir_path(__FILE__) . 'js/admin_shortcode.js'), true); // Versioning
        }
        elseif ($page_base === 'ultimate-media-gallery_page_mvp_demo') {
            // Demo page assets (if any)
            // wp_enqueue_script("mvp-admin-demo", plugins_url('/js/admin_demo.js', __FILE__), array('jquery'), filemtime(plugin_dir_path(__FILE__) . 'js/admin_demo.js'), true);
        }


		// Localize general data available on most plugin pages
		wp_localize_script('mvp-general', 'mvp_data', array(
            'plugins_url' => plugins_url('', __FILE__),
			'fontAwesomeUrl' => isset($settings['fontAwesomeCssUrl']) ? esc_url($settings['fontAwesomeCssUrl']) : '', // Escape URL safely
			'ajax_url' => admin_url( 'admin-ajax.php'),
			'options' => $settings, // Pass merged settings
			'security'  => wp_create_nonce( 'mvp-security-nonce' ) // General nonce
        ));

	}

	function mvp_enqueue_scripts() {

		global $wpdb;
	    $settings_table = $wpdb->prefix . "mvp_settings";
	    $result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);

	    $default_settings = mvp_get_settings();

	    if($result){
            $db_settings = maybe_unserialize($result['options']);
            if (!is_array($db_settings)) $db_settings = [];
	    	$settings = array_merge($default_settings, $db_settings); // Merge
	    	$js_to_footer = isset($settings["js_to_footer"]) ? (bool)($settings["js_to_footer"]) : false;
	    }else{
	    	$settings = $default_settings;
	    	$js_to_footer = false;
	    }

	    wp_enqueue_script('jquery');

	    // Load Font Awesome conditionally based on settings
    	if (isset($settings['add_font_awesome_css']) && $settings['add_font_awesome_css'] == '1' && !empty($settings['fontAwesomeCssUrl'])) {
            wp_enqueue_style('fontawesome', esc_url($settings['fontAwesomeCssUrl']));
        }

		// Enqueue main plugin CSS and JS with versioning
		wp_enqueue_style('mvp', plugins_url('/source/css/mvp.css', __FILE__), [], filemtime(plugin_dir_path(__FILE__) . 'source/css/mvp.css'));
		wp_enqueue_script('mvp', plugins_url('/source/js/new.js', __FILE__), array('jquery'), filemtime(plugin_dir_path(__FILE__) . 'source/js/new.js'), $js_to_footer);

		// Localize minimal data needed for frontend JS
		wp_localize_script('mvp', 'mvp_data', array(
            'ajax_url' => admin_url( 'admin-ajax.php'),
            // Add other frontend specific settings if needed, e.g., 'someOption' => $settings['some_option'] ?? 'default_value'
        ));

	}

	// --- FUNCTION DEFINITION FOR mvp_plugins_loaded ---
    // This was missing in the previous version causing the fatal error
	function mvp_plugins_loaded() {

		//file dir for reading files from directory
		if(!file_exists(MVP_FILE_DIR))wp_mkdir_p(MVP_FILE_DIR);
		$upload_path = MVP_FILE_DIR."/plzip/"; // Still needed for ZIP export/import of Player/Ad if kept
		if(!file_exists($upload_path))wp_mkdir_p($upload_path);

		load_plugin_textdomain(MVP_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');

	    $current_version = get_option('mvp_video_player_version');

	    if($current_version == FALSE){
	    	update_option('mvp_video_player_version', '1.0');
	    }
	    $current_version = get_option('mvp_video_player_version');

	    global $wpdb;
		// $wpdb->show_errors(); // Turn off for production
		$charset_collate = $wpdb->get_charset_collate();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		// Table names...
		$settings_table = $wpdb->prefix . "mvp_settings";
		$player_table = $wpdb->prefix . "mvp_players";
		$media_table = $wpdb->prefix . "mvp_media";
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$path_table = $wpdb->prefix . "mvp_path";
		$subtitle_table = $wpdb->prefix . "mvp_subtitle";
		$ad_table = $wpdb->prefix . "mvp_ad";
		$annotation_table = $wpdb->prefix . "mvp_annotation";
		$statistics_table = $wpdb->prefix . "mvp_statistics";
		$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";
        $statistics_country_table = $wpdb->prefix . "mvp_statistics_country";
		$statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play";
		$statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
		$statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";


        // --- Version Update Checks ---
        // (Keep these as they handle database schema updates over time)
		if($current_version < '2.56'){
			update_option('mvp_video_player_version', '2.65'); $current_version = '2.65';
		}
		if($current_version == '2.65'){
			$sql = "SHOW COLUMNS FROM {$settings_table} LIKE 'options'";
	    	if($wpdb->get_results($sql)) { /* Column exists */ } else { $wpdb->query("ALTER TABLE {$settings_table} ADD COLUMN `options` text"); }
	    	update_option('mvp_video_player_version', 2.7); $current_version = 2.7;
		}
		if($current_version == '2.7'){
			$sql = "SHOW COLUMNS FROM {$player_table} LIKE 'custom_css'";
	    	if($wpdb->get_results($sql)) { /* Column exists */ } else { $wpdb->query("ALTER TABLE {$player_table} ADD COLUMN `custom_css` longtext DEFAULT NULL"); }
	    	update_option('mvp_video_player_version', 3.0); $current_version = 3.0;
		}
		if($current_version == '3.0'){
	    	update_option('mvp_video_player_version', 3.01); $current_version = 3.01;
		}
		if($current_version == '3.01'){
	    	update_option('mvp_video_player_version', 3.1); $current_version = 3.1;
		}
		if($current_version == '3.1'){
 			$players = $wpdb->get_results("SELECT id, options FROM {$player_table}", ARRAY_A);
		    if($players){ foreach($players as $pl) { $options = maybe_unserialize($pl['options']); if (!is_array($options)) $options = []; $options['playlistItemContent'] = ["thumb","title","description"]; $wpdb->update($player_table, ['options' => serialize($options)], ['id' => $pl['id']], ['%s'], ['%d']); } }
		    update_option('mvp_video_player_version', 3.15); $current_version = 3.15;
		}
		if($current_version == '3.15'){
 			$playlists = $wpdb->get_results("SELECT id, options FROM {$playlist_table}", ARRAY_A);
		    if($playlists){ foreach($playlists as $pl) { $options = maybe_unserialize($pl['options']); if($options && is_array($options)){ $changed = false; foreach($options as $key => $value){ if(strpos($key, '_') !== false){ $newkey = mvp_underscoreToCamelCase($key); $options[$newkey] = $options[$key]; unset($options[$key]); $changed = true; } } if ($changed) $wpdb->update($playlist_table, ['options' => serialize($options)], ['id' => $pl['id']], ['%s'], ['%d']); } } }
		    update_option('mvp_video_player_version', 3.3); $current_version = 3.3;
		}
        // ... (Keep other version checks similarly) ...
        if($current_version == '3.3') { update_option('mvp_video_player_version', 3.4); $current_version = 3.4; }
        if($current_version == '3.4') { update_option('mvp_video_player_version', 3.42); $current_version = 3.42; }
        if($current_version == '3.42') { update_option('mvp_video_player_version', 3.5); $current_version = 3.5; }
        if($current_version == '3.5') { update_option('mvp_video_player_version', 3.51); $current_version = 3.51; }
        if($current_version == '3.51') { update_option('mvp_video_player_version', 3.52); $current_version = 3.52; }
        if($current_version == '3.52') { update_option('mvp_video_player_version', 3.55); $current_version = 3.55; }
        if($current_version == '3.55') { update_option('mvp_video_player_version', 3.56); $current_version = 3.56; }
        if($current_version == '3.56') {
             // Update playback rate array structure if needed
             $players = $wpdb->get_results("SELECT id, options FROM {$player_table}", ARRAY_A);
             if ($players) { foreach ($players as $pl) { $options = maybe_unserialize($pl['options']); if (!is_array($options)) $options = []; unset($options['playbackRateArr']); $options['playbackRateArr'] = [ ['value' => 2, 'menu_title' => '2x'], ['value' => 1.5, 'menu_title' => '1.5x'], ['value' => 1.25, 'menu_title' => '1.25x'], ['value' => 1, 'menu_title' => '1x (Normal)'], ['value' => 0.5, 'menu_title' => '0.5x'] ]; $wpdb->update($player_table, ['options' => serialize($options)], ['id' => $pl['id']], ['%s'], ['%d']); } }
             update_option('mvp_video_player_version', 3.71); $current_version = 3.71;
        }
        if($current_version == '3.71') { update_option('mvp_video_player_version', 4.0); $current_version = 4.0; }
        if($current_version == '4.0'){
			$sql = "SHOW COLUMNS FROM {$ad_table} LIKE 'ad_id'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$ad_table} ADD COLUMN `ad_id` int(11) unsigned DEFAULT NULL"); }
			$sql = "SHOW COLUMNS FROM {$annotation_table} LIKE 'ad_id'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$annotation_table} ADD COLUMN `ad_id` int(11) unsigned DEFAULT NULL"); }
            if($wpdb->get_var( "show tables like '$global_ad_table'" ) != $global_ad_table){ $sql = "CREATE TABLE $global_ad_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(100) NOT NULL, `options` longtext DEFAULT NULL, PRIMARY KEY (`id`) ) $charset_collate;"; dbDelta( $sql ); }
			if($wpdb->get_var( "show tables like '$statistics_table'" ) != $statistics_table){ $sql = "CREATE TABLE $statistics_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `origtype` varchar(20) DEFAULT NULL, `title` varchar(300) DEFAULT NULL, `c_play` int(11) unsigned DEFAULT '0', `c_time` int(11) unsigned DEFAULT '0', `c_download` int(11) DEFAULT '0', `c_finish` int(11) unsigned DEFAULT '0', `c_date` date DEFAULT NULL, `media_id` int(11) unsigned NOT NULL, `playlist_id` int(11) unsigned DEFAULT NULL, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); }
			update_option('mvp_video_player_version', 4.5); $current_version = 4.5;
		}
        if($current_version == '4.5') { update_option('mvp_video_player_version', 4.55); $current_version = 4.55; }
        if($current_version == '4.55') { update_option('mvp_video_player_version', 4.56); $current_version = 4.56; }
        if($current_version == '4.56') { update_option('mvp_video_player_version', 4.57); $current_version = 4.57; }
		if($current_version == '4.57'){
			if($wpdb->get_var( "show tables like '$watched_percentage_table'" ) != $watched_percentage_table){ $sql = "CREATE TABLE $watched_percentage_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(300) DEFAULT NULL, `watched` MEDIUMINT unsigned DEFAULT NULL, `duration` MEDIUMINT unsigned DEFAULT NULL, `media_id` int(11) unsigned DEFAULT NULL, `playlist_id` int(11) unsigned DEFAULT NULL, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); }
			$sql = "SHOW COLUMNS FROM {$media_table} LIKE 'title'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$media_table} ADD COLUMN `title` varchar(300) DEFAULT NULL"); $media_data = $wpdb->get_results("SELECT id, options FROM {$media_table}", ARRAY_A); $values = []; $place_holders = []; if($media_data) { foreach ($media_data as $d) { $options = maybe_unserialize($d['options']); if(is_array($options) && isset($options['title']) && !empty($options['title'])) { $values[] = $options['title']; $values[] = $d['id']; $place_holders[] = "('%s', '%d')"; } } } if(!empty($values)) { $query = "INSERT INTO $media_table (title, id) VALUES " . implode( ', ', $place_holders ) . " ON DUPLICATE KEY UPDATE title=VALUES(title)"; $wpdb->query( $wpdb->prepare( "$query ", $values ) ); } }
 			$playlists = $wpdb->get_results("SELECT id, options FROM {$playlist_table}", ARRAY_A); if($playlists){ $values = []; $place_holders = []; foreach($playlists as $pl) { $options = maybe_unserialize($pl['options']); if(is_array($options)){ $options['sortOrder'] = 'order_id'; $values[] = serialize($options); $values[] = $pl['id']; $place_holders[] = "('%s', '%d')"; } } if(!empty($values)) { $query = "INSERT INTO $playlist_table (options, id) VALUES " . implode( ', ', $place_holders ) . " ON DUPLICATE KEY UPDATE options=VALUES(options)"; $wpdb->query( $wpdb->prepare( "$query ", $values ) ); } }
			$sql = "SHOW COLUMNS FROM {$statistics_table} LIKE 'c_download'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$statistics_table} ADD COLUMN `c_download` int(11) DEFAULT '0', ADD COLUMN `c_finish` int(11) unsigned DEFAULT '0'"); }
			$result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A); if($result) { $settings = maybe_unserialize($result['options']); if (!is_array($settings)) $settings = []; $settings['vimeo_no_cookie'] = 0; $wpdb->update($settings_table, ['options' => serialize($settings)], ['id' => 0], ['%s'], ['%d']); }
			$sql = "SHOW COLUMNS FROM {$player_table} LIKE 'custom_js'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$player_table} ADD COLUMN `custom_js` longtext DEFAULT NULL"); }
			update_option('mvp_video_player_version', 5.0); $current_version = 5.0;
		}
        if($current_version == '5.0'){
            $media_data = $wpdb->get_results("SELECT id, options FROM {$media_table}", ARRAY_A); if ($media_data) { foreach ($media_data as $d) { $options = maybe_unserialize($d['options']); if (is_array($options) && isset($options['type']) && ($options['type'] == 'video_360' || $options['type'] == 'image_360')) { $v = substr($options['type'], 0, 5); $options['type'] = $v; $options['is360'] = '1'; $wpdb->update($media_table, ['options' => serialize($options)], ['id' => $d['id']], ['%s'], ['%d']); } } }
            update_option('mvp_video_player_version', 5.01); $current_version = 5.01;
        }
        if($current_version == '5.01') { update_option('mvp_video_player_version', 5.02); $current_version = 5.02; }
        if($current_version == '5.02') { update_option('mvp_video_player_version', 5.05); $current_version = 5.05; }
        if($current_version == '5.05') { update_option('mvp_video_player_version', 5.06); $current_version = 5.06; }
        if($current_version == '5.06') { update_option('mvp_video_player_version', 5.07); $current_version = 5.07; }
        if($current_version == '5.07') { update_option('mvp_video_player_version', 5.1); $current_version = 5.1; }
        if($current_version == '5.1') { update_option('mvp_video_player_version', 5.11); $current_version = 5.11; }
        if($current_version == '5.11') { update_option('mvp_video_player_version', 5.12); $current_version = 5.12; }
        if($current_version == '5.12') { update_option('mvp_video_player_version', 5.15); $current_version = 5.15; }
        if($current_version == '5.15') { update_option('mvp_video_player_version', 5.16); $current_version = 5.16; }
		if($current_version <= '5.16'){
 			$players = $wpdb->get_results("SELECT id, options FROM {$player_table}", ARRAY_A); if($players){ foreach($players as $pl) { $options = maybe_unserialize($pl['options']); if (!is_array($options)) $options = []; $options['limitDescriptionText'] = '2'; $wpdb->update($player_table, ['options' => serialize($options)], ['id' => $pl['id']], ['%s'], ['%d']); } }
            // Foreign key removal was commented out, keep it that way unless issues arise
			update_option('mvp_video_player_version', 6.0); $current_version = 6.0;
		}
        // Add playlist_id columns if missing
		$sql = "SHOW COLUMNS FROM {$path_table} LIKE 'playlist_id'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$path_table} ADD COLUMN `playlist_id` int(11) unsigned"); }
		$sql = "SHOW COLUMNS FROM {$subtitle_table} LIKE 'playlist_id'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$subtitle_table} ADD COLUMN `playlist_id` int(11) unsigned"); }
		$sql = "SHOW COLUMNS FROM {$ad_table} LIKE 'playlist_id'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$ad_table} ADD COLUMN `playlist_id` int(11) unsigned"); }
		$sql = "SHOW COLUMNS FROM {$annotation_table} LIKE 'playlist_id'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$annotation_table} ADD COLUMN `playlist_id` int(11) unsigned"); }

        // Ensure newer stats tables exist
        if($wpdb->get_var( "show tables like '$statistics_country_table'" ) != $statistics_country_table){ $sql = "CREATE TABLE $statistics_country_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `country` varchar(100), `country_code` varchar(10), `continent` varchar(15), PRIMARY KEY (`id`) ) $charset_collate;"; dbDelta( $sql ); }
		if($wpdb->get_var( "show tables like '$statistics_country_play_table'" ) != $statistics_country_play_table){ $sql = "CREATE TABLE $statistics_country_play_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(300), `thumb` varchar(300), `video_url` varchar(300), `c_play` int(11) unsigned, `c_time` int(11) unsigned, `c_date` date, `media_id` int(11) unsigned, `playlist_id` int(11) unsigned, `country_id` int(11) unsigned, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); }
		if($wpdb->get_var( "show tables like '$statistics_user_table'" ) != $statistics_user_table){ $sql = "CREATE TABLE $statistics_user_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `user_id` smallint(11) unsigned, `user_display_name` varchar(100), `user_role` varchar(50), PRIMARY KEY (`id`), INDEX `user_id` (`user_id`) ) $charset_collate;"; dbDelta( $sql ); }
		if($wpdb->get_var( "show tables like '$statistics_user_play_table'" ) != $statistics_user_play_table){ $sql = "CREATE TABLE $statistics_user_play_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(300), `thumb` varchar(300), `video_url` varchar(300), `c_play` int(11) unsigned, `c_time` int(11) unsigned, `c_date` date, `media_id` int(11) unsigned, `playlist_id` int(11) unsigned, `user_id` int(11) unsigned, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); }

		// Add 'disabled' column if missing
		$sql = "SHOW COLUMNS FROM {$media_table} LIKE 'disabled'"; if(!$wpdb->get_results($sql)){ $wpdb->query("ALTER TABLE {$media_table} ADD COLUMN `disabled` tinyint DEFAULT 0"); }

        // Set current version after all checks/updates
		update_option('mvp_video_player_version', 7.5);
	}
	// --- END mvp_plugins_loaded ---


    // --- *** RESTORED FUNCTION: mvp_delete_playlist *** ---
	function mvp_delete_playlist(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}
        if (!current_user_can(MVP_CAPABILITY)) {
            wp_send_json_error( 'Permission denied.' , 403);
            wp_die();
        }

		if(isset($_POST['playlist_id'])){

            $playlist_ids_raw = explode(',', $_POST['playlist_id']);
            $ids = array_map('intval', $playlist_ids_raw);
            $ids = array_filter($ids, function($id) { return $id > 0; });

            if (empty($ids)) {
                wp_send_json_error('No valid playlist IDs provided for deletion.');
                wp_die();
            }

			global $wpdb;
			// $wpdb->show_errors();
		    $playlist_table = $wpdb->prefix . "mvp_playlists";
		    $media_table = $wpdb->prefix . "mvp_media";
		    $statistics_table = $wpdb->prefix . "mvp_statistics";
		    $ad_table = $wpdb->prefix . "mvp_ad";
			$annotation_table = $wpdb->prefix . "mvp_annotation";
			$path_table = $wpdb->prefix . "mvp_path";
			$subtitle_table = $wpdb->prefix . "mvp_subtitle";
			$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

            // Create placeholders for the IN clause
            $placeholders = implode(',', array_fill(0, count($ids), '%d'));

            // Use transaction for multi-table delete
            $wpdb->query('START TRANSACTION');
            $error = false;
            $deleted_count = 0;

            try {
                // Delete related data first
                $wpdb->query($wpdb->prepare("DELETE FROM {$path_table} WHERE playlist_id IN ($placeholders)", $ids));
                if ($wpdb->last_error) throw new Exception($wpdb->last_error);

                $wpdb->query($wpdb->prepare("DELETE FROM {$subtitle_table} WHERE playlist_id IN ($placeholders)", $ids));
                 if ($wpdb->last_error) throw new Exception($wpdb->last_error);

                $wpdb->query($wpdb->prepare("DELETE FROM {$ad_table} WHERE playlist_id IN ($placeholders)", $ids));
                 if ($wpdb->last_error) throw new Exception($wpdb->last_error);

                $wpdb->query($wpdb->prepare("DELETE FROM {$annotation_table} WHERE playlist_id IN ($placeholders)", $ids));
                 if ($wpdb->last_error) throw new Exception($wpdb->last_error);

                $wpdb->query($wpdb->prepare("DELETE FROM {$watched_percentage_table} WHERE playlist_id IN ($placeholders)", $ids));
                 if ($wpdb->last_error) throw new Exception($wpdb->last_error);

                $wpdb->query($wpdb->prepare("DELETE FROM {$statistics_table} WHERE playlist_id IN ($placeholders)", $ids));
                 if ($wpdb->last_error) throw new Exception($wpdb->last_error);

                // Now delete media items
                $wpdb->query($wpdb->prepare("DELETE FROM {$media_table} WHERE playlist_id IN ($placeholders)", $ids));
                 if ($wpdb->last_error) throw new Exception($wpdb->last_error);

                // Finally, delete the playlists themselves
                $deleted_count = $wpdb->query($wpdb->prepare("DELETE FROM {$playlist_table} WHERE id IN ($placeholders)", $ids));
                 if ($deleted_count === false) throw new Exception($wpdb->last_error); // Check for error on last delete

                 // If all deletions succeeded
                 $wpdb->query('COMMIT');
                 wp_send_json_success(['deleted_count' => $deleted_count]);

            } catch (Exception $e) {
                 $wpdb->query('ROLLBACK');
                 wp_send_json_error('Failed to delete playlist(s) and associated data. Error: ' . $e->getMessage());
            }

	    	wp_die();

		}else{
            wp_send_json_error('Playlist ID(s) not provided for deletion.');
			wp_die();
		}
	}
    // --- END mvp_delete_playlist ---


    // --- NEW SINGLE JSON Export Function ---
    /**
     * AJAX handler to export a single playlist as JSON.
     * Triggered multiple times by JS for multi-select export.
     */
    function mvp_export_single_playlist_json() {
        // 1. Security Checks
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'mvp-security-nonce')) {
            status_header(403); echo wp_json_encode(['success' => false, 'data' => ['message' => 'Invalid security token sent.']]); wp_die();
        }
        if (!current_user_can(MVP_CAPABILITY)) {
            status_header(403); echo wp_json_encode(['success' => false, 'data' => ['message' => 'Permission denied.']]); wp_die();
        }
        if (!isset($_POST['playlist_id']) || !is_numeric($_POST['playlist_id'])) {
            status_header(400); echo wp_json_encode(['success' => false, 'data' => ['message' => 'No valid playlist ID provided.']]); wp_die();
        }
        $playlist_id = intval($_POST['playlist_id']);

        // 2. Database Access
        global $wpdb;
        $playlist_table = $wpdb->prefix . "mvp_playlists";
        $media_table = $wpdb->prefix . "mvp_media";
        $path_table = $wpdb->prefix . "mvp_path";
        $subtitle_table = $wpdb->prefix . "mvp_subtitle";
        $ad_table = $wpdb->prefix . "mvp_ad";
        $annotation_table = $wpdb->prefix . "mvp_annotation";

        // 3. Fetch data for the single playlist
        $playlist_row = $wpdb->get_row($wpdb->prepare("SELECT title, options FROM {$playlist_table} WHERE id = %d", $playlist_id), ARRAY_A);
        if (!$playlist_row) {
            status_header(404); echo wp_json_encode(['success' => false, 'data' => ['message' => 'Playlist not found.']]); wp_die();
        }
        $playlist_title = $playlist_row['title'];
        $playlist_options = maybe_unserialize($playlist_row['options']);
        if (!is_array($playlist_options)) $playlist_options = [];

        $playlist_export_item = ['title' => $playlist_title, 'options' => $playlist_options, 'media' => []];

        // 4. Fetch media
        $media_rows = $wpdb->get_results($wpdb->prepare("SELECT id, title, options, order_id FROM {$media_table} WHERE playlist_id = %d ORDER BY order_id ASC", $playlist_id), ARRAY_A);
        if ($media_rows) {
            foreach ($media_rows as $media_row) {
                $media_id = (int) $media_row['id'];
                $media_options = maybe_unserialize($media_row['options']);
                if (!is_array($media_options)) $media_options = [];

                $media_export_item = [
                    'title' => $media_row['title'], 'order_id' => (int) $media_row['order_id'], 'options' => $media_options,
                    'paths' => [], 'subtitles' => [], 'ads' => [], 'annotations' => [],
                ];

                // 5. Fetch related data
                // Paths
                $path_rows = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$path_table} WHERE media_id = %d", $media_id), ARRAY_A);
                if ($path_rows) { foreach ($path_rows as $r) { $opts = maybe_unserialize($r['options']); if(is_array($opts)) $media_export_item['paths'][] = ['options' => $opts]; } }
                // Subtitles
                $subtitle_rows = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$subtitle_table} WHERE media_id = %d", $media_id), ARRAY_A);
                if ($subtitle_rows) { foreach ($subtitle_rows as $r) { $opts = maybe_unserialize($r['options']); if(is_array($opts)) $media_export_item['subtitles'][] = ['options' => $opts]; } }
                // Ads (media-specific)
                 $ad_rows = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE media_id = %d AND ad_id IS NULL", $media_id), ARRAY_A);
                 if ($ad_rows) { foreach ($ad_rows as $r) { $opts = maybe_unserialize($r['options']); if(is_array($opts)) $media_export_item['ads'][] = ['options' => $opts]; } }
                // Annotations (media-specific)
                 $annotation_rows = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE media_id = %d AND ad_id IS NULL", $media_id), ARRAY_A);
                 if ($annotation_rows) { foreach ($annotation_rows as $r) { $opts = maybe_unserialize($r['options']); if(is_array($opts)) $media_export_item['annotations'][] = ['options' => $opts]; } }

                $playlist_export_item['media'][] = $media_export_item;
            }
        }

        // Final export structure
        $export_data = [
            'version' => '1.1-mvp-json-single', 'exported_at' => gmdate('c'), 'playlist' => $playlist_export_item,
        ];

        // 6. Send JSON Response for Download
        $safe_title = sanitize_file_name($playlist_title);
        if (empty($safe_title)) $safe_title = 'playlist-' . $playlist_id;
        $filename = 'mvp_playlist_' . $safe_title . '_' . $playlist_id . '_' . date('Y-m-d') . '.json';
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache'); header("Expires: 0");
        echo wp_json_encode($export_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        wp_die();
    }
    // --- END NEW SINGLE JSON Export Function ---


    /**
     * AJAX handler to import playlists from one or more uploaded JSON files.
     * *** THIS IS THE UPDATED VERSION FOR BULK IMPORT ***
     */
    function mvp_import_playlists_json() {
        // 1. Security and Initial Checks
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'mvp-import-playlist-nonce')) {
             wp_send_json_error(['message' => 'Invalid security token sent.'], 403);
        }
         if (!current_user_can(MVP_CAPABILITY)) {
            wp_send_json_error(['message' => 'You do not have permission to import playlists.'], 403);
        }
        if (!isset($_FILES['mvp_import_file']) || !is_array($_FILES['mvp_import_file'])) {
            wp_send_json_error(['message' => 'No file data received. Ensure form input name is "mvp_import_file[]".'], 400);
        }
        if (empty($_FILES['mvp_import_file']['name']) || !is_array($_FILES['mvp_import_file']['name']) || empty(array_filter($_FILES['mvp_import_file']['name']))) {
             wp_send_json_error(['message' => 'No files were uploaded or files array is empty.'], 400);
        }

        // 2. Database Access
        global $wpdb;
        $playlist_table = $wpdb->prefix . "mvp_playlists"; $media_table = $wpdb->prefix . "mvp_media";
        $path_table = $wpdb->prefix . "mvp_path"; $subtitle_table = $wpdb->prefix . "mvp_subtitle";
        $ad_table = $wpdb->prefix . "mvp_ad"; $annotation_table = $wpdb->prefix . "mvp_annotation";

        // 3. Initialize counters and error storage
        $total_files_processed = 0; $total_playlists_imported = 0; $total_media_imported = 0;
        $errors = []; $processed_files_info = [];

        // 4. Start Transaction (covers ALL files)
        $wpdb->query('START TRANSACTION');

        try {
            // 5. Loop through each uploaded file
            $num_files = count($_FILES['mvp_import_file']['name']);
            for ($i = 0; $i < $num_files; $i++) {
                if (empty($_FILES['mvp_import_file']['name'][$i])) continue;

                $file_name = $_FILES['mvp_import_file']['name'][$i]; $tmp_name = $_FILES['mvp_import_file']['tmp_name'][$i];
                $file_error = $_FILES['mvp_import_file']['error'][$i]; // $file_type = $_FILES['mvp_import_file']['type'][$i];
                $current_file_label = "File #" . ($i + 1) . " ('" . esc_html($file_name) . "')";
                $total_files_processed++;

                // 5a. Check upload error
                if ($file_error !== UPLOAD_ERR_OK) {
                     $upload_errors = [
                        UPLOAD_ERR_INI_SIZE => "Exceeds php.ini size limit.", UPLOAD_ERR_FORM_SIZE => "Exceeds form size limit.",
                        UPLOAD_ERR_PARTIAL => "Partial upload.", UPLOAD_ERR_NO_FILE => "No file.", UPLOAD_ERR_NO_TMP_DIR => "No temp dir.",
                        UPLOAD_ERR_CANT_WRITE => "Cannot write.", UPLOAD_ERR_EXTENSION => "Extension stopped upload."];
                    $error_message = isset($upload_errors[$file_error]) ? $upload_errors[$file_error] : 'Unknown error.';
                    $errors[] = $current_file_label . ": Upload Error - " . $error_message; continue;
                 }
                 // 5b. Check file type
                 if (!file_exists($tmp_name)) { $errors[] = $current_file_label . ": Temporary file not found."; continue; }
                 $finfo = finfo_open(FILEINFO_MIME_TYPE); $mime_type = finfo_file($finfo, $tmp_name); finfo_close($finfo);
                 if ($mime_type !== 'application/json' && $mime_type !== 'text/plain') {
                     $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                     if ($file_ext !== 'json') { $errors[] = $current_file_label . ": Invalid file type (" . esc_html($mime_type) . "). Only .json allowed."; continue; }
                 }
                // 5c. Read/Decode JSON
                $json_content = file_get_contents($tmp_name);
                if ($json_content === false) { $errors[] = $current_file_label . ": Could not read file."; continue; }
                if (substr($json_content, 0, 3) === "\xEF\xBB\xBF") $json_content = substr($json_content, 3);
                $import_data = json_decode($json_content, true);
                if (json_last_error() !== JSON_ERROR_NONE) { $errors[] = $current_file_label . ": Invalid JSON - " . json_last_error_msg(); continue; }
                // 5d. Validate Structure
                if (!isset($import_data['playlist']) || !is_array($import_data['playlist'])) { $errors[] = $current_file_label . ": Invalid JSON structure (missing 'playlist')."; continue; }

                // --- Process Single Playlist ---
                $playlist_item = $import_data['playlist'];
                if (!isset($playlist_item['title'])) { $errors[] = $current_file_label . ": Playlist data missing title."; continue; }

                $playlist_title = sanitize_text_field($playlist_item['title']); $original_title_for_msg = $playlist_title;
                $playlist_title .= ' (Imported ' . date('Y-m-d H:i:s') . ')';
                $playlist_options = isset($playlist_item['options']) && is_array($playlist_item['options']) ? $playlist_item['options'] : [];

                // Insert Playlist
                $inserted_playlist = $wpdb->insert($playlist_table, ['title' => $playlist_title, 'options' => maybe_serialize($playlist_options)], ['%s', '%s']);
                if (!$inserted_playlist) { $errors[] = $current_file_label . ": Failed to insert playlist '" . esc_html($original_title_for_msg) . "'. Error: " . esc_html($wpdb->last_error); continue; }
                $new_playlist_id = $wpdb->insert_id; $total_playlists_imported++; $media_count_for_this_playlist = 0;

                // 6. Loop through Media
                if (isset($playlist_item['media']) && is_array($playlist_item['media'])) {
                    foreach ($playlist_item['media'] as $media_index => $media_item) {
                         if (!isset($media_item['title'])) { $errors[] = $current_file_label . ": Media #" . ($media_index + 1) . " missing title."; continue; }
                         $media_title = sanitize_text_field($media_item['title']); $media_order_id = isset($media_item['order_id']) ? intval($media_item['order_id']) : 0;
                         $media_options = isset($media_item['options']) && is_array($media_item['options']) ? $media_item['options'] : [];
                         // Insert Media
                        $inserted_media = $wpdb->insert($media_table, ['title' => $media_title, 'options' => maybe_serialize($media_options), 'order_id' => $media_order_id, 'playlist_id' => $new_playlist_id, 'disabled' => 0], ['%s', '%s', '%d', '%d', '%d']);
                        if (!$inserted_media) { $errors[] = $current_file_label . ": Failed inserting media '" . esc_html($media_title) . "'. Error: " . esc_html($wpdb->last_error); continue; }
                        $new_media_id = $wpdb->insert_id; $total_media_imported++; $media_count_for_this_playlist++;

                        // 7. Insert Related Data
                        // Paths
                        if (isset($media_item['paths']) && is_array($media_item['paths'])) { foreach ($media_item['paths'] as $p) { if (isset($p['options']) && is_array($p['options'])) { $ins = $wpdb->insert( $path_table, [ 'options' => maybe_serialize($p['options']), 'media_id' => $new_media_id, 'playlist_id' => $new_playlist_id ], ['%s', '%d', '%d'] ); if (!$ins) $errors[] = $current_file_label . ": Error inserting path: " . esc_html($wpdb->last_error); } } }
                        // Subtitles
                        if (isset($media_item['subtitles']) && is_array($media_item['subtitles'])) { foreach ($media_item['subtitles'] as $s) { if (isset($s['options']) && is_array($s['options'])) { $ins = $wpdb->insert( $subtitle_table, [ 'options' => maybe_serialize($s['options']), 'media_id' => $new_media_id, 'playlist_id' => $new_playlist_id ], ['%s', '%d', '%d'] ); if (!$ins) $errors[] = $current_file_label . ": Error inserting subtitle: " . esc_html($wpdb->last_error); } } }
                        // Ads
                        if (isset($media_item['ads']) && is_array($media_item['ads'])) { foreach ($media_item['ads'] as $a) { if (isset($a['options']) && is_array($a['options'])) { $ins = $wpdb->insert( $ad_table, [ 'options' => maybe_serialize($a['options']), 'media_id' => $new_media_id, 'playlist_id' => $new_playlist_id, 'ad_id' => null ], ['%s', '%d', '%d', null] ); if (!$ins) $errors[] = $current_file_label . ": Error inserting ad: " . esc_html($wpdb->last_error); } } }
                        // Annotations
                        if (isset($media_item['annotations']) && is_array($media_item['annotations'])) { foreach ($media_item['annotations'] as $an) { if (isset($an['options']) && is_array($an['options'])) { $ins = $wpdb->insert( $annotation_table, [ 'options' => maybe_serialize($an['options']), 'media_id' => $new_media_id, 'playlist_id' => $new_playlist_id, 'ad_id' => null ], ['%s', '%d', '%d', null] ); if (!$ins) $errors[] = $current_file_label . ": Error inserting annotation: " . esc_html($wpdb->last_error); } } }
                    }
                }
                // Store success info
                $processed_files_info[] = $current_file_label . ": Imported playlist '" . esc_html($original_title_for_msg) . "' with " . $media_count_for_this_playlist . " media items.";
            } // end loop files

            // 8. Commit or Rollback
            if (empty($errors)) {
                $wpdb->query('COMMIT');
                 wp_send_json_success(['message' => sprintf('Successfully processed %d file(s). Imported %d playlist(s) and %d media item(s) in total. Page will reload.', $total_files_processed, $total_playlists_imported, $total_media_imported)]);
            } else {
                $wpdb->query('ROLLBACK');
                $error_message = sprintf('Import failed during processing of %d file(s). %d playlist(s) and %d media item(s) were potentially processed before failure. No changes were saved. Check details.', $total_files_processed, $total_playlists_imported, $total_media_imported);
                 wp_send_json_error(['message' => $error_message, 'errors' => $errors, 'processed_files' => $processed_files_info], 400);
            }
        } catch (Exception $e) {
            $wpdb->query('ROLLBACK'); wp_send_json_error(['message' => 'Critical error during import: ' . $e->getMessage()], 500);
        }
        wp_die(); // Should be called by wp_send_json_*
    }
    // --- END NEW JSON Import Function ---


	//############################################//
	/* ads */ // (Ad functions remain unchanged unless ZIP export/import for Ads is also removed)
	//############################################//
    function mvp_edit_ad_title(){ if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) { wp_send_json_error( 'Invalid security token sent.' ); wp_die(); } if (!current_user_can(MVP_CAPABILITY)) { wp_send_json_error( 'Permission denied.' , 403); wp_die(); } if(isset($_POST['title']) && isset($_POST['id'])){ $title = sanitize_text_field(stripcslashes($_POST["title"])); $id = intval($_POST["id"]); if ($id <= 0 || empty($title)) { wp_send_json_error('Invalid ad ID or title.'); wp_die(); } global $wpdb; $global_ad_table = $wpdb->prefix . "mvp_global_ad"; $updated = $wpdb->update( $global_ad_table, ['title' => $title], ['id' => $id], ['%s'], ['%d'] ); if ($updated !== false) { wp_send_json_success('Ad title updated.'); } else { wp_send_json_error('Failed to update ad title. ' . $wpdb->last_error); } wp_die(); }else{ wp_send_json_error('Required data missing for title update.'); wp_die(); } }
	function mvp_delete_ad(){ if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) { wp_send_json_error( 'Invalid security token sent.' ); wp_die(); } if (!current_user_can(MVP_CAPABILITY)) { wp_send_json_error( 'Permission denied.' , 403); wp_die(); } if(isset($_POST['ad_id'])){ $ad_ids_raw = explode(',', $_POST['ad_id']); $ids = array_map('intval', $ad_ids_raw); $ids = array_filter($ids, function($id) { return $id > 0; }); if (empty($ids)) { wp_send_json_error('No valid ad IDs provided.'); wp_die(); } global $wpdb; $global_ad_table = $wpdb->prefix . "mvp_global_ad"; $ad_table = $wpdb->prefix . "mvp_ad"; $annotation_table = $wpdb->prefix . "mvp_annotation"; $placeholders = implode(',', array_fill(0, count($ids), '%d')); $wpdb->query('START TRANSACTION'); try { $wpdb->query($wpdb->prepare("DELETE FROM {$ad_table} WHERE ad_id IN ($placeholders)", $ids)); if ($wpdb->last_error) throw new Exception($wpdb->last_error); $wpdb->query($wpdb->prepare("DELETE FROM {$annotation_table} WHERE ad_id IN ($placeholders)", $ids)); if ($wpdb->last_error) throw new Exception($wpdb->last_error); $deleted_rows = $wpdb->query($wpdb->prepare("DELETE FROM {$global_ad_table} WHERE id IN ($placeholders)", $ids)); if ($deleted_rows === false) throw new Exception($wpdb->last_error); $wpdb->query('COMMIT'); wp_send_json_success(['deleted_count' => $deleted_rows]); } catch (Exception $e) { $wpdb->query('ROLLBACK'); wp_send_json_error('Failed to delete ad(s). Error: ' . $e->getMessage()); } wp_die(); }else{ wp_send_json_error('Ad ID(s) not provided.'); wp_die(); } }
	function mvp_duplicate_ad(){ if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) { wp_send_json_error( 'Invalid security token sent.' ); wp_die(); } if (!current_user_can(MVP_CAPABILITY)) { wp_send_json_error( 'Permission denied.' , 403); wp_die(); } if(isset($_POST['ad_id']) && isset($_POST['title'])){ $ad_id = intval($_POST['ad_id']); $title = sanitize_text_field(stripslashes($_POST['title'])); if ($ad_id <= 0 || empty($title)) { wp_send_json_error('Invalid source ad ID or title.'); wp_die(); } $title .= ' (Copy)'; global $wpdb; $global_ad_table = $wpdb->prefix . "mvp_global_ad"; $ad_table = $wpdb->prefix . "mvp_ad"; $annotation_table = $wpdb->prefix . "mvp_annotation"; $result = $wpdb->get_row($wpdb->prepare("SELECT options FROM {$global_ad_table} WHERE id = %d", $ad_id), ARRAY_A); if($result){ $wpdb->query('START TRANSACTION'); $insert_id = null; try { $inserted = $wpdb->insert($global_ad_table, ['title' => $title, 'options' => $result['options']], ['%s', '%s']); if (!$inserted) throw new Exception("Failed inserting new global ad: " . $wpdb->last_error); $insert_id = $wpdb->insert_id; $ads = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE ad_id = %d", $ad_id), ARRAY_A); if ($ads) { foreach($ads as $item){ $ins = $wpdb->insert($ad_table, ['options' => $item['options'], 'ad_id' => $insert_id], ['%s','%d']); if (!$ins) throw new Exception("Failed duplicating ad item: " . $wpdb->last_error); } } $annotations = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE ad_id = %d", $ad_id), ARRAY_A); if ($annotations) { foreach($annotations as $item){ $ins = $wpdb->insert($annotation_table, ['options' => $item['options'], 'ad_id' => $insert_id], ['%s','%d']); if (!$ins) throw new Exception("Failed duplicating annotation item: " . $wpdb->last_error); } } $wpdb->query('COMMIT'); wp_send_json_success(['new_ad_id' => $insert_id]); } catch (Exception $e) { $wpdb->query('ROLLBACK'); wp_send_json_error('Failed duplicating ad: ' . $e->getMessage()); } } else { wp_send_json_error('Source ad not found.'); } wp_die(); }else{ wp_send_json_error('Required data missing for ad duplication.'); wp_die(); } }
	function mvp_save_ad_options(){ if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) { wp_send_json_error( 'Invalid security token sent.' ); wp_die(); } if (!current_user_can(MVP_CAPABILITY)) { wp_send_json_error( 'Permission denied.' , 403); wp_die(); } if(isset($_POST['ad_id'])){ $ad_id = intval($_POST['ad_id']); if ($ad_id <= 0) { wp_send_json_error('Invalid ad ID.'); wp_die(); } global $wpdb; $global_ad_table = $wpdb->prefix . "mvp_global_ad"; $ad_table = $wpdb->prefix . "mvp_ad"; $annotation_table = $wpdb->prefix . "mvp_annotation"; $options_raw = isset($_POST['global_ad_options']) ? stripcslashes($_POST['global_ad_options']) : '{}'; $options = json_decode($options_raw, true); if (json_last_error() !== JSON_ERROR_NONE || !is_array($options)) { wp_send_json_error('Invalid ad options JSON.'); wp_die(); } $ad_pre_raw = isset($_POST['ad_pre']) ? stripcslashes($_POST['ad_pre']) : '[]'; $ad_pre = json_decode($ad_pre_raw, true); if (json_last_error() !== JSON_ERROR_NONE || !is_array($ad_pre)) $ad_pre = []; $ad_mid_raw = isset($_POST['ad_mid']) ? stripcslashes($_POST['ad_mid']) : '[]'; $ad_mid = json_decode($ad_mid_raw, true); if (json_last_error() !== JSON_ERROR_NONE || !is_array($ad_mid)) $ad_mid = []; $ad_end_raw = isset($_POST['ad_end']) ? stripcslashes($_POST['ad_end']) : '[]'; $ad_end = json_decode($ad_end_raw, true); if (json_last_error() !== JSON_ERROR_NONE || !is_array($ad_end)) $ad_end = []; $ann_raw = isset($_POST['annotation']) ? stripcslashes($_POST['annotation']) : '[]'; $ann = json_decode($ann_raw, true); if (json_last_error() !== JSON_ERROR_NONE || !is_array($ann)) $ann = []; $wpdb->query('START TRANSACTION'); try { $updated = $wpdb->update($global_ad_table, ['options' => serialize($options)], ['id' => $ad_id], ['%s'], ['%d']); if ($updated === false) throw new Exception("Failed updating global ad options: ".$wpdb->last_error); $wpdb->delete($ad_table, ['ad_id' => $ad_id], ['%d']); if (!empty($ad_pre)) { foreach ($ad_pre as $ad) { if (is_array($ad)) { $ins = $wpdb->insert($ad_table, ['options' => serialize($ad), 'ad_id' => $ad_id], ['%s','%d']); if (!$ins) throw new Exception("Failed inserting pre-ad: ".$wpdb->last_error); } } } if (!empty($ad_mid)) { foreach ($ad_mid as $ad) { if (is_array($ad)) { $ins = $wpdb->insert($ad_table, ['options' => serialize($ad), 'ad_id' => $ad_id], ['%s','%d']); if (!$ins) throw new Exception("Failed inserting mid-ad: ".$wpdb->last_error); } } } if (!empty($ad_end)) { foreach ($ad_end as $ad) { if (is_array($ad)) { $ins = $wpdb->insert($ad_table, ['options' => serialize($ad), 'ad_id' => $ad_id], ['%s','%d']); if (!$ins) throw new Exception("Failed inserting end-ad: ".$wpdb->last_error); } } } $wpdb->delete($annotation_table, ['ad_id' => $ad_id], ['%d']); if (!empty($ann)) { foreach ($ann as $a) { if (is_array($a)) { $ins = $wpdb->insert($annotation_table, ['options' => serialize($a), 'ad_id' => $ad_id], ['%s','%d']); if (!$ins) throw new Exception("Failed inserting annotation: ".$wpdb->last_error); } } } $wpdb->query('COMMIT'); wp_send_json_success('Ad options saved.'); } catch (Exception $e) { $wpdb->query('ROLLBACK'); wp_send_json_error('Failed saving ad options: ' . $e->getMessage()); } wp_die(); }else{ wp_send_json_error('Ad ID not provided.'); wp_die(); } }
	function mvp_ad_domain_rename(){ if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) { wp_send_json_error( 'Invalid security token sent.' ); wp_die(); } if (!current_user_can(MVP_CAPABILITY)) { wp_send_json_error( 'Permission denied.' , 403); wp_die(); } if(isset($_POST['ad_id'])){ $ad_id = intval($_POST['ad_id']); $from = isset($_POST['from']) ? wp_unslash($_POST['from']) : ''; $to = isset($_POST['to']) ? wp_unslash($_POST['to']) : ''; if ($ad_id <= 0 || empty($from)) { wp_send_json_error('Invalid ad ID or "from" domain.'); wp_die(); } global $wpdb; $ad_table = $wpdb->prefix . "mvp_ad"; $annotation_table = $wpdb->prefix . "mvp_annotation"; $wpdb->query('START TRANSACTION'); try { $ads = $wpdb->get_results($wpdb->prepare("SELECT id, options FROM {$ad_table} WHERE ad_id = %d", $ad_id), ARRAY_A); if ($ads) { foreach($ads as $item){ $ad_item_id = (int) $item['id']; $options = maybe_unserialize($item['options']); $changed = false; if (is_array($options)) { if(isset($options['path']) && is_string($options['path']) && strpos($options['path'], $from) !== false) { $options['path'] = str_replace($from, $to, $options['path']); $changed = true; } if(isset($options['poster']) && is_string($options['poster']) && strpos($options['poster'], $from) !== false) { $options['poster'] = str_replace($from, $to, $options['poster']); $changed = true; } } if ($changed) { $upd = $wpdb->update($ad_table, ['options' => serialize($options)], ['id' => $ad_item_id], ['%s'], ['%d']); if (!$upd) throw new Exception("Failed updating ad item ID {$ad_item_id}: " . $wpdb->last_error); } } } $anns = $wpdb->get_results($wpdb->prepare("SELECT id, options FROM {$annotation_table} WHERE ad_id = %d", $ad_id), ARRAY_A); if ($anns) { foreach($anns as $item){ $ann_item_id = (int) $item['id']; $options = maybe_unserialize($item['options']); $changed = false; if (is_array($options)) { if(isset($options['path']) && is_string($options['path']) && strpos($options['path'], $from) !== false) { $options['path'] = str_replace($from, $to, $options['path']); $changed = true; } } if ($changed) { $upd = $wpdb->update($annotation_table, ['options' => serialize($options)], ['id' => $ann_item_id], ['%s'], ['%d']); if (!$upd) throw new Exception("Failed updating annotation item ID {$ann_item_id}: " . $wpdb->last_error); } } } $wpdb->query('COMMIT'); wp_send_json_success('Ad domains/URLs potentially updated.'); } catch (Exception $e) { $wpdb->query('ROLLBACK'); wp_send_json_error('Error during ad domain rename: ' . $e->getMessage()); } wp_die(); }else{ wp_send_json_error('Required data missing for ad domain rename.'); wp_die(); } }
	function mvp_create_ad(){ if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) { wp_send_json_error( 'Invalid security token sent.' ); wp_die(); } if (!current_user_can(MVP_CAPABILITY)) { wp_send_json_error( 'Permission denied.' , 403); wp_die(); } if(isset($_POST['title']) && !empty(trim($_POST['title']))){ $title = sanitize_text_field(stripslashes($_POST['title'])); global $wpdb; $global_ad_table = $wpdb->prefix . "mvp_global_ad"; $stmt = $wpdb->insert($global_ad_table, ['title' => $title], ['%s']); if($stmt !== false){ wp_send_json_success(['new_ad_id' => $wpdb->insert_id]); } else { wp_send_json_error('Failed to create ad. ' . $wpdb->last_error); } wp_die(); }else{ wp_send_json_error('Ad title cannot be empty.'); wp_die(); } }
    function mvp_getAdData($atts){ if (!isset($atts['ad_id'])) return null; $ad_id = intval($atts['ad_id']); if ($ad_id <= 0) return null; global $wpdb; $global_ad_table = $wpdb->prefix . "mvp_global_ad"; $ad_table = $wpdb->prefix . "mvp_ad"; $annotation_table = $wpdb->prefix . "mvp_annotation"; $ad_options = null; $ad_data = null; $annotation_data = null; $stmt = $wpdb->get_row($wpdb->prepare("SELECT options FROM {$global_ad_table} WHERE id = %d", $ad_id), ARRAY_A); if ($stmt && isset($stmt['options'])) $ad_options = maybe_unserialize($stmt['options']); $stmt_ads = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE ad_id = %d", $ad_id), ARRAY_A); if($stmt_ads){ $ad_data = []; foreach($stmt_ads as $item){ $opts = maybe_unserialize($item['options']); if(is_array($opts)) $ad_data[] = $opts; } } $stmt_anns = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE ad_id = %d", $ad_id), ARRAY_A); if($stmt_anns){ $annotation_data = []; foreach($stmt_anns as $item){ $opts = maybe_unserialize($item['options']); if(is_array($opts)) $annotation_data[] = $opts; } } return ['ad_options' => $ad_options, 'ad_data' => $ad_data, 'annotation_data' => $annotation_data]; }


	//############################################//
	/* front end playlist display */ // (Unchanged)
	//############################################//
    function mvp_playlist_display($atts){ global $wpdb; $playlist_table = $wpdb->prefix . "mvp_playlists"; $data = array(); if(isset($atts['playlist_id'])){ $playlist_id_raw = explode(',', $atts['playlist_id']); $playlist_id = array_map('intval', $playlist_id_raw); $playlist_id = array_filter($playlist_id, function($id){ return $id > 0; }); } else { return ''; } if (empty($playlist_id)) return ''; $placeholders = implode(',', array_fill(0, count($playlist_id), '%d')); $results = $wpdb->get_results($wpdb->prepare("SELECT id, title, options FROM {$playlist_table} WHERE id IN ($placeholders) ORDER BY FIELD(id, $placeholders)", array_merge($playlist_id, $playlist_id)), ARRAY_A); if (!$results) return ''; foreach($results as $result){ $pl_options = maybe_unserialize($result['options']); if (!is_array($pl_options)) $pl_options = []; $data[] = array('id' => $result['id'], 'title' => $result['title'], 'description' => isset($pl_options['description']) ? $pl_options['description'] : null, 'thumb' => isset($pl_options['thumb']) ? esc_url($pl_options['thumb']) : null ); } $id = 'mvp-playlist-display-wrap-'.mt_rand(); $markup = '<div class="mvp-playlist-display-wrap" id="'.esc_attr($id).'">'; if(!empty($atts['header_title'])){ $markup .= '<div class="mvp-playlist-display-header"><span>'.esc_html($atts['header_title']).'</span></div>'; } $markup .= '<div class="mvp-playlist-display-wrap-inner">'; foreach($data as $d){ $active_class = (isset($atts['active_playlist']) && $atts['active_playlist'] == $d['id']) ? ' mvp-playlist-display-item-active' : ''; $markup .= '<div class="mvp-playlist-display-item'.$active_class.'" data-playlist-id="'.esc_attr($d['id']).'" title="'.esc_attr($d['title']).'">'; $markup .= '<div class="mvp-playlist-display-item-inner">'; if(isset($d['thumb'])){ $markup .= '<img class="mvp-playlist-display-item-thumb" src="'.esc_attr($d['thumb']).'" alt="'.esc_attr($d['title']).'"/>'; } $markup .= '<div class="mvp-playlist-display-item-title">'.esc_html($d['title']).'</div>'; $markup .= '</div>'; if(isset($d['description'])){ $markup .= '<div class="mvp-playlist-display-item-description">'.wp_kses_post($d['description']).'</div>'; } $markup .= '</div>'; } $markup .= '</div></div>'; if(isset($atts['player_id'])){ $player_id_js = intval($atts['player_id']); if ($player_id_js > 0) { $markup .= "<script type=\"text/javascript\">(function() { var elem = document.getElementById('".esc_js($id)."'); if (!elem) return; var items = elem.querySelectorAll('.mvp-playlist-display-item'); function loadPlaylist(e){ e.preventDefault(); if(this.classList.contains('mvp-playlist-display-item-active')) return false; var last_active = elem.querySelector('.mvp-playlist-display-item-active'); if(last_active) last_active.classList.remove('mvp-playlist-display-item-active'); this.classList.add('mvp-playlist-display-item-active'); var pid = '.mvp-playlist-' + this.getAttribute('data-playlist-id'); if (typeof window.mvp_player".esc_js($player_id_js)." !== 'undefined' && window.mvp_player".esc_js($player_id_js).".loadPlaylist) { window.mvp_player".esc_js($player_id_js).".loadPlaylist(pid); } else { console.error('MVP Player ".esc_js($player_id_js)." not found.'); } return false; } for (var i = 0; i < items.length; i++) { items[i].removeEventListener('click', loadPlaylist); items[i].addEventListener('click', loadPlaylist, false); } })();</script>"; } } return $markup; }


	//############################################//
	/* install */ // (Unchanged)
	//############################################//
    function mvp_player_uninstall() { global $wpdb; $settings_table = $wpdb->prefix . "mvp_settings"; $result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A); if($result){ $settings = maybe_unserialize($result['options']); if(!is_array($settings)) $settings = []; $delete_plugin_data_on_uninstall = isset($settings["delete_plugin_data_on_uninstall"]) ? (bool)($settings["delete_plugin_data_on_uninstall"]) : false; if($delete_plugin_data_on_uninstall){ if ( is_multisite() ) { $site_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs WHERE site_id = $wpdb->siteid;" ); foreach ( $site_ids as $site_id ) { switch_to_blog( $site_id ); mvp_deinstall(); restore_current_blog(); } }else{ mvp_deinstall(); } } } }
	function mvp_deinstall() { global $wpdb; $wpdb->query('SET foreign_key_checks=0'); $tables_to_drop = ['mvp_settings', 'mvp_players', 'mvp_path', 'mvp_subtitle', 'mvp_ad', 'mvp_annotation', 'mvp_watched_percentage', 'mvp_media', 'mvp_playlists', 'mvp_global_ad', 'mvp_statistics', 'mvp_statistics_country', 'mvp_statistics_country_play', 'mvp_statistics_user', 'mvp_statistics_user_play']; foreach ($tables_to_drop as $table_short_name) { $table_name = $wpdb->prefix . $table_short_name; $wpdb->query("DROP TABLE IF EXISTS {$table_name}"); } $wpdb->query('SET foreign_key_checks=1'); delete_option('mvp_video_player_version'); }
	function mvp_player_activate($network_wide){ global $wpdb; if ( is_multisite() ) { if ($network_wide) { $site_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs WHERE site_id = $wpdb->siteid;" ); foreach ( $site_ids as $site_id ) { switch_to_blog( $site_id ); mvp_install(); restore_current_blog(); } }else{ mvp_install(); } }else{ mvp_install(); } }
	function mvp_install(){ global $wpdb; $charset_collate = $wpdb->get_charset_collate(); require_once( ABSPATH . 'wp-admin/includes/upgrade.php' ); $settings_table = $wpdb->prefix . "mvp_settings"; if($wpdb->get_var( "show tables like '$settings_table'" ) != $settings_table){ $sql = "CREATE TABLE $settings_table ( `id` tinyint NOT NULL, `options` text NOT NULL, PRIMARY KEY (`id`) ) $charset_collate;"; dbDelta( $sql ); } $player_table = $wpdb->prefix . "mvp_players"; if($wpdb->get_var( "show tables like '$player_table'" ) != $player_table){ $sql = "CREATE TABLE $player_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(100) NOT NULL, `preset` varchar(50) NOT NULL, `options` text DEFAULT NULL, `custom_css` longtext DEFAULT NULL, `custom_js` longtext DEFAULT NULL, PRIMARY KEY (`id`) ) $charset_collate;"; dbDelta( $sql ); } $playlist_table = $wpdb->prefix . "mvp_playlists"; if($wpdb->get_var( "show tables like '$playlist_table'" ) != $playlist_table){ $sql = "CREATE TABLE $playlist_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(100) NOT NULL, `options` text DEFAULT NULL, PRIMARY KEY (`id`) ) $charset_collate;"; dbDelta( $sql ); } $media_table = $wpdb->prefix . "mvp_media"; if($wpdb->get_var( "show tables like '$media_table'" ) != $media_table){ $sql = "CREATE TABLE $media_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(300) DEFAULT NULL, `options` longtext DEFAULT NULL, `order_id` int(11) unsigned DEFAULT NULL, `playlist_id` int(11) unsigned NOT NULL, `disabled` tinyint DEFAULT 0, PRIMARY KEY (`id`), INDEX `playlist_id` (`playlist_id`) ) $charset_collate;"; dbDelta( $sql ); } $path_table = $wpdb->prefix . "mvp_path"; if($wpdb->get_var( "show tables like '$path_table'" ) != $path_table){ $sql = "CREATE TABLE $path_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `options` longtext DEFAULT NULL, `media_id` int(11) unsigned NOT NULL, `playlist_id` int(11) unsigned, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); } $subtitle_table = $wpdb->prefix . "mvp_subtitle"; if($wpdb->get_var( "show tables like '$subtitle_table'" ) != $subtitle_table){ $sql = "CREATE TABLE $subtitle_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `options` longtext DEFAULT NULL, `media_id` int(11) unsigned NOT NULL, `playlist_id` int(11) unsigned, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); } $ad_table = $wpdb->prefix . "mvp_ad"; if($wpdb->get_var( "show tables like '$ad_table'" ) != $ad_table){ $sql = "CREATE TABLE $ad_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `options` longtext DEFAULT NULL, `media_id` int(11) unsigned DEFAULT NULL, `playlist_id` int(11) unsigned, `ad_id` int(11) unsigned DEFAULT NULL, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); } $annotation_table = $wpdb->prefix . "mvp_annotation"; if($wpdb->get_var( "show tables like '$annotation_table'" ) != $annotation_table){ $sql = "CREATE TABLE $annotation_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `options` longtext DEFAULT NULL, `media_id` int(11) unsigned DEFAULT NULL, `playlist_id` int(11) unsigned, `ad_id` int(11) unsigned DEFAULT NULL, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); } $global_ad_table = $wpdb->prefix . "mvp_global_ad"; if($wpdb->get_var( "show tables like '$global_ad_table'" ) != $global_ad_table){ $sql = "CREATE TABLE $global_ad_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(100) NOT NULL, `options` longtext DEFAULT NULL, PRIMARY KEY (`id`) ) $charset_collate;"; dbDelta( $sql ); } $statistics_table = $wpdb->prefix . "mvp_statistics"; if($wpdb->get_var( "show tables like '$statistics_table'" ) != $statistics_table){ $sql = "CREATE TABLE $statistics_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `origtype` varchar(20) DEFAULT NULL, `title` varchar(300) DEFAULT NULL, `c_play` int(11) unsigned DEFAULT '0', `c_time` int(11) unsigned DEFAULT '0', `c_download` int(11) DEFAULT '0', `c_finish` int(11) unsigned DEFAULT '0', `c_date` date DEFAULT NULL, `media_id` int(11) unsigned NOT NULL, `playlist_id` int(11) unsigned DEFAULT NULL, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); } $statistics_country_table = $wpdb->prefix . "mvp_statistics_country"; if($wpdb->get_var( "show tables like '$statistics_country_table'" ) != $statistics_country_table){ $sql = "CREATE TABLE $statistics_country_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `country` varchar(100), `country_code` varchar(10), `continent` varchar(15), PRIMARY KEY (`id`) ) $charset_collate;"; dbDelta( $sql ); } $statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play"; if($wpdb->get_var( "show tables like '$statistics_country_play_table'" ) != $statistics_country_play_table){ $sql = "CREATE TABLE $statistics_country_play_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(300), `thumb` varchar(300), `video_url` varchar(300), `c_play` int(11) unsigned, `c_time` int(11) unsigned, `c_date` date, `media_id` int(11) unsigned, `playlist_id` int(11) unsigned, `country_id` int(11) unsigned, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); } $statistics_user_table = $wpdb->prefix . "mvp_statistics_user"; if($wpdb->get_var( "show tables like '$statistics_user_table'" ) != $statistics_user_table){ $sql = "CREATE TABLE $statistics_user_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `user_id` smallint(11) unsigned, `user_display_name` varchar(100), `user_role` varchar(50), PRIMARY KEY (`id`), INDEX `user_id` (`user_id`) ) $charset_collate;"; dbDelta( $sql ); } $statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play"; if($wpdb->get_var( "show tables like '$statistics_user_play_table'" ) != $statistics_user_play_table){ $sql = "CREATE TABLE $statistics_user_play_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(300), `thumb` varchar(300), `video_url` varchar(300), `c_play` int(11) unsigned, `c_time` int(11) unsigned, `c_date` date, `media_id` int(11) unsigned, `playlist_id` int(11) unsigned, `user_id` int(11) unsigned, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); } $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage"; if($wpdb->get_var( "show tables like '$watched_percentage_table'" ) != $watched_percentage_table){ $sql = "CREATE TABLE $watched_percentage_table ( `id` int(11) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(300) DEFAULT NULL, `watched` MEDIUMINT unsigned DEFAULT NULL, `duration` MEDIUMINT unsigned DEFAULT NULL, `media_id` int(11) unsigned DEFAULT NULL, `playlist_id` int(11) unsigned DEFAULT NULL, PRIMARY KEY (`id`), INDEX `media_id` (`media_id`) ) $charset_collate;"; dbDelta( $sql ); } }
    // (mvp_plugins_loaded definition is now correctly placed above)

?>