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
		add_action('plugins_loaded', 'mvp_plugins_loaded');

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
		add_action('wp_ajax_mvp_delete_playlist', 'mvp_delete_playlist');
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

		//export / import (OLD CSV/ZIP)
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

        // --- NEW JSON Export/Import Hooks ---
        add_action('wp_ajax_mvp_export_playlists_json', 'mvp_export_playlists_json');
        add_action('wp_ajax_mvp_import_playlists_json', 'mvp_import_playlists_json');
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
	/* statistics */
	//############################################//

	function mvp_get_stat_data(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['type'])){

			$type = $_POST["type"];

			if($type == 'player'){

				$player_id = $_POST["type_id"];

			}else if($type == 'playlist'){

				$playlist_id = $_POST["type_id"];

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

			}

		    echo json_encode($data);

			wp_die('');

		}else {
			wp_die('');
		}

	}

	function mvp_stat_create_graph(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['media_id'])){

			$media_id = $_POST["media_id"];
			$title = stripslashes($_POST['title']);
			$return_days = $_POST["return_days"];
			$data_display = json_decode(stripcslashes($_POST['data_display']), true);

			global $wpdb;
			$wpdb->show_errors();
		    $statistics_table = $wpdb->prefix . "mvp_statistics";

		    $results = mvp_getTotalLastXDays($media_id, $title, $return_days, $data_display);

		    echo json_encode($results);

			wp_die('');

		}else {
			wp_die('');
		}

	}

	function mvp_play_count(){

		// Check if required POST variables are set first
		if (!isset($_POST['media_id'], $_POST['playlist_id'], $_POST['title'], $_POST['thumb'], $_POST['currentTime'], $_POST['duration'], $_POST['percentToCountAsPlay'], $_POST['video_url'])) {
			 // Optionally send a JSON error, but for a non-AJAX endpoint just dying might be okay depending on context
			 // wp_send_json_error(['message' => 'Missing required play count data.']);
			 wp_die('Missing required play count data.');
		}
	
		// --- Sanitize ALL Inputs ---
		$media_id             = absint($_POST['media_id']);
		$playlist_id          = absint($_POST['playlist_id']);
		// Use wp_unslash because WP adds slashes to POST data automatically
		$title                = sanitize_text_field(wp_unslash($_POST['title']));
		$thumb                = esc_url_raw(wp_unslash($_POST['thumb'])); // Assuming thumb is a URL
		$currentTime          = absint($_POST['currentTime']);
		$duration             = absint($_POST['duration']);
		$percentToCountAsPlay = absint($_POST['percentToCountAsPlay']); // Assuming percentage is 0-100 integer
		$video_url            = esc_url_raw(wp_unslash($_POST['video_url'])); // Assuming video_url is a URL
		$countryData          = isset($_POST['countryData']) ? json_decode(wp_unslash($_POST['countryData']), true) : null;
		$date                 = current_time('Y-m-d'); // Use WP function for current time based on site settings
	
		// Basic validation for percentage
		if ($percentToCountAsPlay < 0 || $percentToCountAsPlay > 100) {
			$percentToCountAsPlay = 100; // Default to 100% if invalid value provided
		}
		if ($duration <= 0) { // Avoid division by zero
			$play_add = 0;
		} else {
			$percent_threshold = $duration * ($percentToCountAsPlay / 100);
			$play_add = ($currentTime > $percent_threshold) ? 1 : 0;
		}
		// --- End Sanitization ---
	
	
		global $wpdb;
		// $wpdb->show_errors(); // Keep for debugging if needed, remove for production
	
		$statistics_table             = $wpdb->prefix . "mvp_statistics";
		$statistics_country_table     = $wpdb->prefix . "mvp_statistics_country";
		$statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play";
		$statistics_user_table        = $wpdb->prefix . "mvp_statistics_user";
		$statistics_user_play_table   = $wpdb->prefix . "mvp_statistics_user_play";
	
		// Check if entry exists for this media, title, and date in the main stats table
		// Note: Using title in WHERE clause might be inefficient or problematic if titles change. Using media_id only might be better if titles are not strictly unique per ID.
		// Current logic checks based on media_id, title, and date.
		$existing_stat_id = $wpdb->get_var($wpdb->prepare(
			"SELECT id FROM $statistics_table WHERE media_id = %d AND title = %s AND c_date = %s",
			$media_id, $title, $date
		));
	
		if ($existing_stat_id === null) { // create entry if not found
			$stmt = $wpdb->query($wpdb->prepare(
				"INSERT INTO $statistics_table (title, c_play, c_time, c_download, c_finish, c_date, media_id, playlist_id) VALUES (%s, %d, %d, 0, 0, %s, %d, %d)",
				$title,
				$play_add, // Only count the play (1) if threshold met, otherwise insert 0 for the first hit
				$currentTime,
				$date,
				$media_id,
				$playlist_id
			));
		} else { // update existing entry
			// Update play count only if threshold met, always update time
			$stmt = $wpdb->query($wpdb->prepare(
				"UPDATE $statistics_table SET c_play = c_play + %d, c_time = c_time + %d WHERE id = %d",
				$play_add,
				$currentTime,
				$existing_stat_id // Use the ID we found for efficiency
			));
			// Original query updated based on media_id, title, date - less efficient:
			// $stmt = $wpdb->query($wpdb->prepare(
			//     "UPDATE $statistics_table SET c_play = c_play + %d, c_time = c_time + %d WHERE media_id = %d AND title = %s AND c_date = %s LIMIT 1",
			//     $play_add, $currentTime, $media_id, $title, $date
			// ));
		}
	
		// --- Country Statistics ---
		if (is_array($countryData) && !empty($countryData['country_code'])) {
	
			// Sanitize country data elements
			$country_code = sanitize_text_field($countryData['country_code']);
			$country      = isset($countryData['country']) ? sanitize_text_field($countryData['country']) : '';
			$continent    = isset($countryData['continent']) ? sanitize_text_field($countryData['continent']) : '';
	
			// Find or create country entry
			$country_id = $wpdb->get_var($wpdb->prepare(
				"SELECT id FROM $statistics_country_table WHERE country_code = %s", $country_code
			));
	
			if ($country_id === null) {
				$wpdb->query($wpdb->prepare(
					"INSERT INTO $statistics_country_table (country, country_code, continent) VALUES (%s, %s, %s)",
					$country, $country_code, $continent
				));
				$country_id = $wpdb->insert_id;
			}
	
			if ($country_id) { // Proceed only if we have a valid country_id
				 // Check if entry exists for this media, title, date, and country
				$existing_country_play_id = $wpdb->get_var($wpdb->prepare(
					"SELECT id FROM $statistics_country_play_table WHERE media_id = %d AND title = %s AND c_date = %s AND country_id = %d",
					$media_id, $title, $date, $country_id
				));
	
				if ($existing_country_play_id === null) { // Create country play entry
					$wpdb->query($wpdb->prepare(
						"INSERT INTO $statistics_country_play_table (title, thumb, video_url, c_play, c_time, c_date, media_id, playlist_id, country_id) VALUES (%s, %s, %s, %d, %d, %s, %d, %d, %d)",
						$title,
						$thumb,
						$video_url,
						$play_add, // Count play (1) if threshold met, else 0
						$currentTime,
						$date,
						$media_id,
						$playlist_id,
						$country_id
					));
				} else { // Update country play entry
					 $wpdb->query($wpdb->prepare(
						"UPDATE $statistics_country_play_table SET c_play = c_play + %d, c_time = c_time + %d WHERE id = %d",
						$play_add,
						$currentTime,
						$existing_country_play_id
					));
					 // Original query updated based on media_id, title, date, country_id - less efficient:
					 // $wpdb->query($wpdb->prepare(
					 //    "UPDATE $statistics_country_play_table SET c_play = c_play + %d, c_time = c_time + %d WHERE media_id = %d AND title = %s AND c_date = %s AND country_id = %d LIMIT 1",
					 //    $play_add, $currentTime, $media_id, $title, $date, $country_id
					 // ));
				}
			}
		} // End Country Statistics
	
		// --- User Statistics ---
		if (is_user_logged_in()) {
			$current_user = wp_get_current_user();
			$wp_user_id = $current_user->ID; // This is the WordPress user ID
	
			// Find or create user entry in our stats user table
			$stats_user_id = $wpdb->get_var($wpdb->prepare(
				"SELECT id FROM $statistics_user_table WHERE user_id = %d", $wp_user_id
			));
	
			if ($stats_user_id === null) {
				$user_display_name = sanitize_text_field($current_user->display_name);
				$user_role = implode(",", array_map('sanitize_key', $current_user->roles)); // Sanitize roles
	
				$wpdb->query($wpdb->prepare(
					"INSERT INTO $statistics_user_table (user_id, user_display_name, user_role) VALUES (%d, %s, %s)",
					$wp_user_id, $user_display_name, $user_role
				));
				$stats_user_id = $wpdb->insert_id; // This is the ID from *our* stats user table
			}
	
			if ($stats_user_id) { // Proceed only if we have a valid stats_user_id
				// Check if entry exists for this media, title, date, and user
				$existing_user_play_id = $wpdb->get_var($wpdb->prepare(
					"SELECT id FROM $statistics_user_play_table WHERE media_id = %d AND title = %s AND c_date = %s AND user_id = %d",
					$media_id, $title, $date, $stats_user_id
				));
	
				if ($existing_user_play_id === null) { // Create user play entry
					 $wpdb->query($wpdb->prepare(
						"INSERT INTO $statistics_user_play_table (title, thumb, video_url, c_play, c_time, c_date, media_id, playlist_id, user_id) VALUES (%s, %s, %s, %d, %d, %s, %d, %d, %d)",
						$title,
						$thumb,
						$video_url,
						$play_add, // Count play (1) if threshold met, else 0
						$currentTime,
						$date,
						$media_id,
						$playlist_id,
						$stats_user_id // Use the ID from our stats user table
					));
				} else { // Update user play entry
					$wpdb->query($wpdb->prepare(
						"UPDATE $statistics_user_play_table SET c_play = c_play + %d, c_time = c_time + %d WHERE id = %d",
						$play_add,
						$currentTime,
						$existing_user_play_id
					));
					 // Original query updated based on media_id, title, date, user_id - less efficient:
					 // $wpdb->query($wpdb->prepare(
					 //   "UPDATE $statistics_user_play_table SET c_play = c_play + %d, c_time = c_time + %d WHERE media_id = %d AND title = %s AND c_date = %s AND user_id = %d LIMIT 1",
					 //   $play_add, $currentTime, $media_id, $title, $date, $stats_user_id
					 // ));
				}
			}
		} // End User Statistics
	
		// Send a minimal success response (or potentially the result of $stmt if needed)
		// Using wp_send_json_success is better for AJAX, but this endpoint might not strictly be AJAX?
		// If it's called via JS fetch/XHR, use wp_send_json_*. If it's a simple POST maybe just die.
		echo json_encode(['status' => 'recorded']); // Minimal response
	
		wp_die(); // End execution
	}

	function mvp_download_count(){

		// Check if required POST variables are set
		if (!isset($_POST['media_id'], $_POST['playlist_id'], $_POST['title'])) {
			// Send JSON error if this is definitely an AJAX endpoint
			// wp_send_json_error(['message' => 'Missing required download count data.']);
			wp_die('Missing required download count data.');
		}
	
		// --- Sanitize Inputs ---
		$media_id    = absint($_POST['media_id']);
		$playlist_id = absint($_POST['playlist_id']);
		// Use wp_unslash because WP adds slashes to POST data automatically
		$title       = sanitize_text_field(wp_unslash($_POST['title']));
		$date        = current_time('Y-m-d'); // Use WP function for current time
		// --- End Sanitization ---
	
		global $wpdb;
		// $wpdb->show_errors(); // Keep for debugging if needed, remove for production
		$statistics_table = $wpdb->prefix . "mvp_statistics";
	
		// Check if entry exists for this media, title, and date
		$existing_stat_id = $wpdb->get_var($wpdb->prepare(
			"SELECT id FROM $statistics_table WHERE media_id = %d AND title = %s AND c_date = %s",
			$media_id, $title, $date
		));
	
		$stmt = false; // Initialize stmt
	
		if ($existing_stat_id === null) { // Create entry if not found
			$stmt = $wpdb->query($wpdb->prepare(
				"INSERT INTO $statistics_table (title, c_play, c_time, c_download, c_finish, c_date, media_id, playlist_id) VALUES (%s, 0, 0, 1, 0, %s, %d, %d)",
				$title,
				$date,
				$media_id,
				$playlist_id
			));
		} else { // Update existing entry
			$stmt = $wpdb->query($wpdb->prepare(
				"UPDATE $statistics_table SET c_download = c_download + 1 WHERE id = %d",
				$existing_stat_id
			));
			// Original less efficient query:
			// $stmt = $wpdb->query($wpdb->prepare(
			//     "UPDATE $statistics_table SET c_download = c_download + 1 WHERE media_id = %d AND title = %s AND c_date = %s LIMIT 1",
			//     $media_id, $title, $date
			// ));
		}
	
		if ($stmt !== false) {
			// Use wp_send_json_success if confirmed AJAX, otherwise simple echo might suffice
			echo json_encode(['status' => 'download recorded']);
		} else {
			// Handle potential error, maybe log it
			echo json_encode(['status' => 'error', 'message' => 'Failed to record download. DB Error: ' . $wpdb->last_error]);
		}
	
		wp_die(); // End execution
	}

	function mvp_finish_count(){

		// Check if required POST variables are set
		if (!isset($_POST['media_id'], $_POST['playlist_id'], $_POST['title'])) {
			 // Send JSON error if this is definitely an AJAX endpoint
			// wp_send_json_error(['message' => 'Missing required finish count data.']);
			wp_die('Missing required finish count data.');
		}
	
		// --- Sanitize Inputs ---
		$media_id    = absint($_POST['media_id']);
		$playlist_id = absint($_POST['playlist_id']);
		 // Use wp_unslash because WP adds slashes to POST data automatically
		$title       = sanitize_text_field(wp_unslash($_POST['title']));
		$date        = current_time('Y-m-d'); // Use WP function for current time
		// --- End Sanitization ---
	
		global $wpdb;
		// $wpdb->show_errors(); // Keep for debugging if needed, remove for production
		$statistics_table = $wpdb->prefix . "mvp_statistics";
	
		// Check if entry exists for this media, title, and date
		$existing_stat_id = $wpdb->get_var($wpdb->prepare(
			"SELECT id FROM $statistics_table WHERE media_id = %d AND title = %s AND c_date = %s",
			$media_id, $title, $date
		));
	
		$stmt = false; // Initialize stmt
	
		if ($existing_stat_id === null) { // Create entry if not found
			$stmt = $wpdb->query($wpdb->prepare(
				"INSERT INTO $statistics_table (title, c_play, c_time, c_download, c_finish, c_date, media_id, playlist_id) VALUES (%s, 0, 0, 0, 1, %s, %d, %d)",
				$title,
				$date,
				$media_id,
				$playlist_id
			));
		} else { // Update existing entry
			$stmt = $wpdb->query($wpdb->prepare(
				"UPDATE $statistics_table SET c_finish = c_finish + 1 WHERE id = %d",
				$existing_stat_id
			));
			 // Original less efficient query:
			// $stmt = $wpdb->query($wpdb->prepare(
			//     "UPDATE $statistics_table SET c_finish = c_finish + 1 WHERE media_id = %d AND title = %s AND c_date = %s LIMIT 1",
			//     $media_id, $title, $date
			// ));
		}
	
		if ($stmt !== false) {
			// Use wp_send_json_success if confirmed AJAX, otherwise simple echo might suffice
			echo json_encode(['status' => 'finish recorded']);
		} else {
			// Handle potential error
			echo json_encode(['status' => 'error', 'message' => 'Failed to record finish. DB Error: ' . $wpdb->last_error]);
		}
	
		wp_die(); // End execution
	}

	function mvp_get_stats($atts){

		if(!isset($atts['action']))return "Action parameter missing!";

		$action = $atts['action'];
		$playlist_id = isset($atts['playlist_id']) ? $atts["playlist_id"] : -1;
        $days = isset($atts['days']) ? $atts['days'] : 7;
        $limit = isset($atts['limit']) ? $atts['limit'] : 10;
        $dir = isset($atts['dir']) ? strtoupper($atts['dir']) : 'DESC';
        $title = isset($atts['title']) ? $atts['title'] : '';
        $hiperlink_video = isset($atts['hiperlink_video']) ? $atts['hiperlink_video'] : '0';

        if($action == 'top_play_today')$results = mvp_getTopPlayToday($playlist_id, $limit, $dir);
        else if($action == 'top_play_last_x_days')$results = mvp_getTopPlayLastXDays($playlist_id, $days, $limit, $dir);
        else if($action == 'top_play_this_week')$results = mvp_getTopPlayThisWeek($playlist_id, $limit, $dir);
        else if($action == 'top_play_this_month')$results = mvp_getTopPlayThisMonth($playlist_id, $limit, $dir);
        else if($action == 'top_play_all_time')$results = mvp_getTopPlayAllTime($playlist_id, $limit, $dir);
        else if($action == 'top_download_all_time')$results = mvp_getTopDownloadAllTime($playlist_id, $limit, $dir);
        else if($action == 'top_finish_all_time')$results = mvp_getTopFinishAllTime($playlist_id, $limit, $dir);
		else return "Action parameter incorrect!";

		if(count($results) > 0){

			$id = 'mvp-stat-wrap'.mt_rand();//to limit selector for click

		  	$markup = '<div class="mvp-stat-wrap" id="'.$id.'">
					<div class="mvp-stat-wrap-header">
						<span>'.esc_html($title).'</span>
					</div>
					<ol>';
					foreach($results as $key) :

						if($hiperlink_video == '1'){

							$markup .= '<li class="mvp-stat-item" data-media-id="'.esc_attr($key['media_id']).'" title="'.esc_attr(trim($key['title'])).'">';//we need title and artist and special song selection if songs come from grouped source (and media-id is the same)
							$markup .= '<a href="#">'.esc_html($key['title']).'</a>';

						}else{

							$markup .= '<li class="mvp-stat-item">';

							$markup .= esc_html(trim($key['title']));
						}

						$markup .= '<span class="mvp-stat-info">('.$key['total_count'].')</span></li>';
					endforeach;
					$markup .= '</ol>
			</div>';

			if(isset($atts['player_id']) && $hiperlink_video == '1'){
        		$player_id = $atts['player_id'];
        		//click to play in player (note: we must use the same playlist_id that is loaded in the player)
        		$markup .= '<script type="text/javascript">
					var elem = document.getElementById("'.$id.'"),
					items = elem.querySelectorAll(".mvp-stat-item"), i, len = items.length;
					for (i = 0; i < len; i++) {
					    items[i].addEventListener("click", function(e) {
					    	e.preventDefault();
					    	mvp_player'.$player_id.'.loadMedia("id-title", this.getAttribute("data-media-id"), this.getAttribute("title")); return false;
						}, false);
					}
				</script>';
			}

			return $markup;

		}else{
			return '';
		}

	}

	function mvp_stat_clear(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
			wp_send_json_error( 'Invalid security token sent.' );
			wp_die();
		}
	
		if(isset($_POST['playlist_id'])){
	
			$playlist_id = $_POST["playlist_id"];
	
			global $wpdb;
			$wpdb->show_errors(); // Good for debugging, maybe remove in production
	
			// Define all relevant stats tables
			$statistics_table = $wpdb->prefix . "mvp_statistics";
			$statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play";
			$statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";
			// Optional: You might also want to clear the base country/user tables if needed,
			// but usually clearing the 'play' tables is sufficient.
			// $statistics_country_table = $wpdb->prefix . "mvp_statistics_country";
			// $statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
	
			$success = true; // Flag to track overall success
	
			if($playlist_id != -1){ // Clear for a specific playlist
				$playlist_id = (int)$playlist_id; // Ensure it's an integer
	
				// Delete from main stats table
				$stmt1 = $wpdb->query($wpdb->prepare("DELETE FROM {$statistics_table} WHERE playlist_id=%d", $playlist_id));
				if ($stmt1 === false) $success = false;
	
				// Delete from country play stats table
				$stmt2 = $wpdb->query($wpdb->prepare("DELETE FROM {$statistics_country_play_table} WHERE playlist_id=%d", $playlist_id));
				if ($stmt2 === false) $success = false;
	
				// Delete from user play stats table
				$stmt3 = $wpdb->query($wpdb->prepare("DELETE FROM {$statistics_user_play_table} WHERE playlist_id=%d", $playlist_id));
				if ($stmt3 === false) $success = false;
	
			} else { // Clear ALL statistics (playlist_id is -1)
	
				// TRUNCATE is generally faster for clearing entire tables
				$stmt1 = $wpdb->query("TRUNCATE TABLE {$statistics_table}");
				 if ($stmt1 === false) $success = false;
	
				$stmt2 = $wpdb->query("TRUNCATE TABLE {$statistics_country_play_table}");
				 if ($stmt2 === false) $success = false;
	
				$stmt3 = $wpdb->query("TRUNCATE TABLE {$statistics_user_play_table}");
				if ($stmt3 === false) $success = false;
	
				// Optional: Truncate base country/user tables if you want to reset them completely
				// $wpdb->query("TRUNCATE TABLE {$statistics_country_table}");
				// $wpdb->query("TRUNCATE TABLE {$statistics_user_table}");
			}
	
			if($success){
				echo json_encode("SUCCESS");
			} else {
				 echo json_encode("ERROR: Failed to clear all statistics tables. Check server error logs."); // Provide more specific error if needed
			}
	
			wp_die();
	
		}else{
			wp_die('Playlist ID not specified.'); // Give a clearer error
		}
	}

	function mvp_get_stat_user_data(){

		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security' ) ) {
		    wp_send_json_error( 'Invalid security token sent.' );
		    wp_die();
		}

		if(isset($_POST['user_id'])){

			$user_id = $_POST["user_id"];

			$results = mvp_getTopPlaysPerUserVideosAllTime($user_id);

		    echo json_encode($results);

			wp_die('');

		}else {
			wp_die('');
		}

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
				'title' => $url,
				'watched' => $watched,
				'duration' => $duration,
				'media_id' => $media_id,
				'playlist_id' => $playlist_id
			);

			global $wpdb;
		    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

		    if($media_id && $url){

		    	//check if exist
			    $stmt = $wpdb->get_row($wpdb->prepare("SELECT id FROM $watched_percentage_table WHERE media_id=%d AND title=%s", $media_id, $url));

			    if($wpdb->num_rows == 0){//create entry

			    	$stmt = $wpdb->insert(
				    	$watched_percentage_table,
						$arr,
						array(
							'%s','%d','%d','%d','%d'
						)
				    );

			    }else{//update only if larger

					$query = "UPDATE $watched_percentage_table
					SET watched = GREATEST($watched, watched)
					WHERE media_id = %d AND title = %s";

					$values = array($media_id, $url);

					$stmt = $wpdb->query( $wpdb->prepare( "$query ", $values ) );

			    }

			    $response_arr = array('update' => $stmt,
			    					  'media_id' => $media_id,
			    					  'title' => $url,
			    					  'watched' => $watched,
			    					  'duration' => $duration);

		    }else if($url){//use title for url so we dont change column

		    	//check if exist
			    $stmt = $wpdb->get_row($wpdb->prepare("SELECT id FROM $watched_percentage_table WHERE title=%s", $url));

			    if($wpdb->num_rows == 0){//create entry

			    	$stmt = $wpdb->insert(
				    	$watched_percentage_table,
						$arr,
						array(
							'%s','%d','%d','%d','%d'
						)
				    );

			    }else{//update only if larger

					$stmt = $wpdb->query( $wpdb->prepare("UPDATE $watched_percentage_table SET watched = GREATEST($watched, watched) WHERE title = %s", $url ) );

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
						$str .= '( media_id IS NULL AND title = \''.$title.'\' )';
					}else{
						$str .= '( media_id = \''.$d['media_id'].'\' AND title = \''.$title.'\' )';
					}
					if($i < $len-1)$str .= ' OR ';
					$i++;
				}
			$str .= ')';

			$stmt = $wpdb->get_results("SELECT media_id, title, watched, duration FROM $watched_percentage_table WHERE {$str}", ARRAY_A);

			if($stmt !== false){
	    		echo json_encode($stmt);
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

			global $wpdb;
		    $watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";

			$stmt = $wpdb->query($wpdb->prepare("UPDATE $watched_percentage_table SET watched='0' WHERE playlist_id=%d", $playlist_id));

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
            register_block_type('ultimate-media-gallery/block', array(
                'attributes' => array(
                    'player_id' => array(
                        'type' => 'string'
                    ),
                    'playlist_id' => array(
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
		register_widget('UltimateMediaGalleryWidget');
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
			wp_enqueue_script('apmvp-block', plugins_url('js/block.js', __FILE__), array( 'wp-blocks', 'wp-i18n', 'wp-element' ));

			wp_enqueue_style('mvp-block-editor-css', plugins_url('/css/block.css', __FILE__), array('wp-edit-blocks'));

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

			wp_localize_script( 'apmvp-block', 'mvp_block_data', array('players' => json_encode($players, JSON_HEX_TAG),
																       'playlists' => json_encode($playlists, JSON_HEX_TAG),
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

				$attr['path'] = $matches[3];
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

				$attr['path'] = $matches[0];
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

	function mvp_video_shortcode_override( $html, $attr, $content ) {

		if(isset($attr['mp4'])){
			$attr['path'] = $attr['mp4'];
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

		add_menu_page("Ultimate Media Gallery Player manager", "Ultimate Media Gallery", MVP_CAPABILITY, "mvp_settings", "mvp_settings_page", 'dashicons-playlist-video');

		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Global Settings", MVP_CAPABILITY, 'mvp_settings');
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Player manager", MVP_CAPABILITY, 'mvp_player_manager', "mvp_player_manager_page");
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Playlist manager", MVP_CAPABILITY, 'mvp_playlist_manager', 'mvp_playlist_manager_page');
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Ad manager", MVP_CAPABILITY, 'mvp_ad_manager', 'mvp_ad_manager_page');
		add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Shortcodes", MVP_CAPABILITY, 'mvp_shortcodes', 'mvp_shortcodes_page');
		add_submenu_page('mvp_settings', "Ultimate Media Gallery", 'Statistics', MVP_CAPABILITY, 'mvp_statistics', 'mvp_statistics_page');
		// --- REMOVED DEMO START ---
		//add_submenu_page("mvp_settings", "Ultimate Media Gallery", "Demo", MVP_CAPABILITY, 'mvp_demo', 'mvp_demo_page');
		// --- REMOVED DEMO END ---

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

			case 'save_options':
			case 'delete_player':
			default:
				include("includes/player_manager.php");
				break;

		}

	}

	function mvp_playlist_manager_page(){

		global $wpdb;
		$wpdb->show_errors();
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
			$action = $_GET['action'];
		}

		switch($action) {

			case 'edit_playlist':
			case 'add_media_form':
				include("includes/edit_playlist.php");
				break;

			case 'delete_playlist':
				include("includes/playlist_manager.php");
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

			case 'save_options':
			case 'delete_ad':
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

	function mvp_statistics_page(){

		global $wpdb;
		$wpdb->show_errors();
		$statistics_table = $wpdb->prefix . "mvp_statistics";
		$playlist_table = $wpdb->prefix . "mvp_playlists";

		include("includes/statistics_display.php");

	}

	// --- REMOVED DEMO START ---
	/*
	function mvp_demo_page(){

		global $wpdb;
		$wpdb->show_errors();

		include("includes/demo.php");
	}
	*/
	// --- REMOVED DEMO END ---



	function mvp_admin_enqueue_scripts( $hook_suffix ) {


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



		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_media();

		wp_enqueue_style('mvp-admin-css', plugins_url('/css/admin.css', __FILE__));


		wp_enqueue_style("spectrum", plugins_url('/css/spectrum.css', __FILE__));
		wp_enqueue_script("spectrum", plugins_url('/js/spectrum.js', __FILE__), array('jquery'));

		wp_enqueue_script("mvp-general", plugins_url('/js/admin_global.js', __FILE__), array('jquery'));

		switch ( $hook_suffix ) {

			case get_plugin_page_hookname( 'mvp_settings', 'mvp_settings' ):

				wp_enqueue_style("fa", $settings['fontAwesomeCssUrl']);//pi icons

				//wp_enqueue_script("mvp-admin", plugins_url('/js/admin_global.js', __FILE__), array('jquery'));

	        case get_plugin_page_hookname( 'mvp_player_manager', 'mvp_settings' ):

	        	//multi select
				wp_enqueue_style("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css");
				wp_enqueue_script("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js", array('jquery'));

		        wp_enqueue_style("codemirror", plugins_url('/css/codemirror.min.css', __FILE__));
		        wp_enqueue_script("codemirror", plugins_url('/js/codemirror.min.js', __FILE__));

				//wp_enqueue_script("mvp-admin", plugins_url('/js/admin_player_manager.js', __FILE__), array('jquery'));

	        break;

	        case get_plugin_page_hookname( 'mvp_playlist_manager', 'mvp_settings' ):

				//wp_enqueue_script("mvp-admin", plugins_url('/js/admin_playlist_manager.js', __FILE__), array('jquery'));
				//wp_enqueue_script("mvp-ads", plugins_url('/js/admin_adcontent.js', __FILE__), array('jquery'));

				//multi select
				wp_enqueue_style("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css");
				wp_enqueue_script("select2", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js", array('jquery'));

				// --- Enqueue NEW JS for JSON Import/Export ---
                // (Create this file and add the JS code provided previously)
                wp_enqueue_script("mvp-admin-import-export", plugins_url('/js/admin_import_export.js', __FILE__), array('jquery'), '1.0', true);
                // ---------------------------------------------

	        break;

	        case get_plugin_page_hookname( 'mvp_ad_manager', 'mvp_settings' ):

				//wp_enqueue_script("mvp-admin", plugins_url('/js/admin_admanager.js', __FILE__), array('jquery'));
				//wp_enqueue_script("mvp-ads", plugins_url('/js/admin_adcontent.js', __FILE__), array('jquery'));

	        break;

	        case get_plugin_page_hookname( 'mvp_statistics', 'mvp_settings' ):

	        	wp_enqueue_script("selectize", "//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js");

	        	wp_enqueue_style("selectize", "//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css");

	        	wp_enqueue_script("momentjs", "//cdn.jsdelivr.net/momentjs/latest/moment.min.js");

	        	wp_enqueue_script("chart", "//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js");

	        	wp_enqueue_script("mvp-admin", plugins_url('/js/admin_stat.js', __FILE__), array('jquery'));

	        break;

	        case get_plugin_page_hookname( 'mvp_shortcodes', 'mvp_settings' ):

	        	wp_enqueue_style("fa", $settings['fontAwesomeCssUrl']);//pi icons

	        	//wp_enqueue_script("mvp-admin", plugins_url('/js/admin_playlist_manager.js', __FILE__), array('jquery'));

	        	//wp_enqueue_script("mvp-ads", plugins_url('/js/admin_adcontent.js', __FILE__), array('jquery'));

	        	wp_enqueue_script("mvp-admin-shortcode", plugins_url('/js/admin_shortcode.js', __FILE__), array('jquery'));

	        break;

			// --- REMOVED DEMO START ---
	        /*
	        case get_plugin_page_hookname( 'mvp_demo', 'mvp_settings' ):

	        	wp_enqueue_script("mvp-admin", plugins_url('/js/admin_demo.js', __FILE__), array('jquery'));

	        break;
	        */
			// --- REMOVED DEMO END ---
	    }



		wp_localize_script('mvp-general', 'mvp_data', array('plugins_url' => plugins_url('', __FILE__),
																 'fontAwesomeUrl' => $settings['fontAwesomeCssUrl'],
														         'ajax_url' => admin_url( 'admin-ajax.php'),
														         'options' => $settings,
														         'security'  => wp_create_nonce( 'mvp-security-nonce' )));

        // --- Localize data for the NEW import/export script ---
        // We reuse the same nonce ('mvp-security-nonce') for export JS trigger
        // The import nonce is handled by wp_nonce_field in the form
        wp_localize_script('mvp-admin-import-export', 'mvp_import_export_data', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('mvp-security-nonce') // Nonce for export button action
             // Add any other specific data needed by the new JS here
        ));
        // -------------------------------------------------------
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

	    wp_enqueue_script('jquery');

	    //playlist icons
    	if($settings['add_font_awesome_css'] == '1')wp_enqueue_style('fontawesome', $settings['fontAwesomeCssUrl']);

		wp_enqueue_style('mvp', plugins_url('/source/css/mvp.css', __FILE__));//main css

		wp_enqueue_script('mvp', plugins_url('/source/js/new.js', __FILE__), array('jquery'), false, $js_to_footer);//main js

		wp_localize_script('mvp', 'mvp_data', array('ajax_url' => admin_url( 'admin-ajax.php')));

	}
	/**
 * Recursively sanitizes an array or value.
 * Uses appropriate sanitization based on expected data type (heuristic).
 * PRESERVES ORIGINAL KEY CASING.
 *
 * @param mixed $data The data to sanitize (string, array, etc.).
 * @return mixed Sanitized data.
 */
function mvp_sanitize_options_recursive( $data ) {
    if ( is_array( $data ) ) {
        // Recursively sanitize array elements
        // *** Keep original keys ***
        foreach ( $data as $key => $value ) {
            // Sanitize the value, but use the original key
            $data[ $key ] = mvp_sanitize_options_recursive( $value );
        }
        return $data;
    } elseif ( is_object( $data ) ) {
        // Recursively sanitize object properties
        // *** Keep original keys ***
        $vars = get_object_vars( $data );
        foreach ( $vars as $key => $value ) {
            // Sanitize the value, but use the original key
            $data->$key = mvp_sanitize_options_recursive( $value );
        }
        return $data;
    } elseif ( is_string( $data ) ) {
        // Determine sanitization based on context (this is tricky without knowing all options)
        // Heuristic: If it looks like a URL, sanitize as URL. If it might contain HTML, use wp_kses_post. Otherwise, sanitize_text_field.
        // This needs refinement based on the specific settings fields expected.

        // Use wp_check_invalid_utf8 to prevent potential issues, then sanitize
        $data = wp_check_invalid_utf8( $data );

        // Basic check for common script/event handlers - strip if found (adjust list as needed)
        // This is a basic attempt, not foolproof XSS protection.
        if ( preg_match( '/<(script|style|iframe|object|embed)/i', $data ) || preg_match( '/(on[a-z]+)=/i', $data ) ) {
             // If it contains potentially dangerous tags or inline event handlers, strip all tags.
             // Consider wp_kses() with specific allowed tags if some HTML is needed.
             return strip_tags( $data );
        } elseif ( filter_var( $data, FILTER_VALIDATE_URL ) ) {
             // Allow valid URLs
            return esc_url_raw( $data );
        } elseif ( preg_match( '/^rgba?\([\d.,\s]+\)$/i', $data ) || preg_match('/^#([a-f0-9]{3}){1,2}$/i', $data) ) {
             // Allow CSS color values (basic check)
             return sanitize_text_field( $data ); // Sanitize just in case, but allows format
        } elseif ( preg_match( '/<[a-z][\s\S]*>/i', $data ) ) {
            // If it seems to contain general HTML (and didn't match dangerous tags above)
            // Use wp_kses_post for general content HTML.
             // Ensure this allows necessary HTML for specific fields if any.
            return wp_kses_post( $data );
        } else {
            // Default fallback for plain text, CSS classes, selectors etc.
            return sanitize_text_field( $data );
        }
    } elseif ( is_numeric( $data ) ) {
         // Allow numbers (integers, floats)
         return $data;
    } elseif ( is_bool( $data ) ) {
        // Allow booleans
        return $data;
    } else {
        // Handle other types (null, etc.) - return as is
        return $data;
    }
}
	//############################################//
	/* global */
	//############################################//

	function mvp_save_global_options(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) { // Check nonce, don't die yet
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
			// wp_die() is called by wp_send_json_error
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to save settings.'], 403 );
		}
	
		// 3. Check if options data exists
		if (!isset($_POST['options'])) {
			wp_send_json_error( ['message' => 'No options data received.'], 400 );
		}
	
		// 4. Decode and Sanitize Options
		// Use wp_unslash as WP automatically adds slashes to POST data
		$raw_options_json = wp_unslash( $_POST['options'] );
		$decoded_options = json_decode( $raw_options_json, true ); // Decode as associative array
	
		if ( json_last_error() !== JSON_ERROR_NONE ) {
			wp_send_json_error( ['message' => 'Invalid JSON data received: ' . json_last_error_msg()], 400 );
		}
	
		if ( !is_array($decoded_options) ) {
			 wp_send_json_error( ['message' => 'Decoded options are not an array.'], 400 );
		}
	
		// Sanitize the entire options array recursively
		$sanitized_settings = mvp_sanitize_options_recursive( $decoded_options );
	
		// Note: The recursive sanitizer is generic. If specific fields need very specific sanitization
		// (e.g., only allowing certain HTML tags, ensuring a value is 'on' or 'off'),
		// you might need to add targeted sanitization *after* the recursive call for those fields.
		// Example: $sanitized_settings['specific_field'] = ($sanitized_settings['specific_field'] === 'on') ? 'on' : 'off';
	
	
		// 5. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$settings_table = $wpdb->prefix . "mvp_settings";
	
		// Serialize the *sanitized* settings for storage
		$options_to_save = serialize( $sanitized_settings );
	
		// Check if settings row exists (assuming ID '0' is always used for global settings)
		$existing_id = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM {$settings_table} WHERE id = %d", 0 ) );
	
		$stmt = false;
		if ( $existing_id !== null ) {
			// Update existing settings
			$stmt = $wpdb->update(
				$settings_table,
				['options' => $options_to_save], // Data
				['id' => 0],                     // Where
				['%s'],                          // Format of data
				['%d']                           // Format of where
			);
		} else {
			// Insert new settings row (should only happen once ideally)
			$stmt = $wpdb->insert(
				$settings_table,
				[
					'id' => 0, // Explicitly set ID 0
					'options' => $options_to_save
				],
				[
					'%d', // id format
					'%s'  // options format
				]
			);
		}
	
		// 6. Send Response
		if ($stmt !== false) {
			wp_send_json_success( ['message' => 'Settings saved successfully.'] );
		} else {
			wp_send_json_error( ['message' => 'Database error: Could not save settings. ' . $wpdb->last_error], 500 );
		}
		// wp_die() is called by wp_send_json_success/error
	}

	//############################################//
	/* player */
	//############################################//

	function mvp_duplicate_player(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to duplicate players.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['title']) || !isset($_POST['player_id'])) {
			wp_send_json_error( ['message' => 'Missing required fields (title or player_id).'], 400 );
		}
	
		// Sanitize inputs
		$new_title = sanitize_text_field(wp_unslash($_POST['title']));
		$player_id = absint($_POST['player_id']); // Source player ID
	
		if (empty(trim($new_title))) {
			wp_send_json_error( ['message' => 'New player title cannot be empty.'], 400 );
		}
		if ($player_id <= 0) {
			 wp_send_json_error( ['message' => 'Invalid source Player ID provided.'], 400 );
		}
	
		// 4. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$player_table = $wpdb->prefix . "mvp_players";
	
		// Fetch the source player data securely
		// Use prepare even for SELECT for consistency and potential future benefit
		$source_player = $wpdb->get_row( $wpdb->prepare(
			"SELECT preset, options, custom_css, custom_js FROM {$player_table} WHERE id = %d",
			$player_id
		), ARRAY_A ); // Get as associative array
	
		if (!$source_player) {
			wp_send_json_error( ['message' => 'Source player not found.'], 404 );
		}
	
		// Prepare data for insertion (preset and options are assumed safe from the DB)
		// custom_css and custom_js are trickier. If they allow arbitrary JS/CSS, they ARE a potential XSS vector.
		// If they are meant to be pure CSS/JS, maybe skip sanitization assuming admin knows what they are doing.
		// For added security, you *could* try to sanitize them, but it's complex.
		// Let's assume for now they are copied as-is, relying on the admin's input being trusted.
		$preset     = $source_player['preset']; // Assumed safe key from DB
		$options    = $source_player['options']; // Serialized string from DB, assumed safe
		$custom_css = $source_player['custom_css']; // Potential XSS if malformed CSS/HTML allowed
		$custom_js  = $source_player['custom_js']; // Potential XSS if malformed JS/HTML allowed
	
		// Insert the new (duplicated) player
		$inserted = $wpdb->insert(
			$player_table,
			[
				'title'      => $new_title, // Sanitized new title
				'preset'     => $preset,
				'options'    => $options,
				'custom_css' => $custom_css,
				'custom_js'  => $custom_js
			],
			[
				'%s', // title
				'%s', // preset
				'%s', // options (serialized string)
				'%s', // custom_css (text/longtext)
				'%s'  // custom_js (text/longtext)
			]
		);
	
		// 5. Send Response
		if ($inserted !== false) {
			wp_send_json_success( [
				'message' => 'Player duplicated successfully.',
				'new_player_id' => $wpdb->insert_id
			] );
		} else {
			wp_send_json_error( ['message' => 'Database error: Could not duplicate player. ' . $wpdb->last_error], 500 );
		}
		// wp_die() is called by wp_send_json_success/error
	}

	function mvp_create_player(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to create players.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['title']) || !isset($_POST['preset'])) {
			wp_send_json_error( ['message' => 'Missing required fields (title or preset).'], 400 );
		}
	
		// Sanitize inputs
		$title = sanitize_text_field(wp_unslash($_POST['title']));
		$received_preset = sanitize_key(wp_unslash($_POST['preset'])); // Presets should be simple keys
	
		if (empty(trim($title))) {
			wp_send_json_error( ['message' => 'Player title cannot be empty.'], 400 );
		}
	
		// 4. Prepare Player Options (Validate Preset)
		$default_options = mvp_player_options(); // Assuming this returns an array of defaults
		$all_preset_options = mvp_player_options_preset(); // Assuming this returns an array like ['preset_key' => [options], ...]
	
		if (!is_array($default_options) || !is_array($all_preset_options)) {
			 wp_send_json_error( ['message' => 'Internal configuration error: Invalid player options or presets defined.'], 500 );
		}
	
		$valid_preset_keys = array_keys($all_preset_options);
	
		// Define a safe default preset key
		$default_preset_key = 'minimal'; // Make sure 'minimal' exists in your presets!
		if (!in_array($default_preset_key, $valid_preset_keys)) {
			 // Fallback to the first available preset if 'minimal' doesn't exist
			 $default_preset_key = !empty($valid_preset_keys) ? $valid_preset_keys[0] : null;
		}
	
		 if (!$default_preset_key) {
			// This should not happen if mvp_player_options_preset() is defined correctly
			wp_send_json_error( ['message' => 'Configuration error: No valid player presets found.'], 500 );
		 }
	
		// Check if the received preset is valid. If not, use the default.
		if (!empty($received_preset) && in_array($received_preset, $valid_preset_keys)) {
			$preset_key_to_use = $received_preset; // Use the valid received preset
		} else {
			 // Optional: Log this issue for debugging
			 error_log("MVP Plugin Warning: Invalid or empty preset ('" . esc_html($received_preset) . "') received during player creation. Defaulting to '" . esc_html($default_preset_key) . "'.");
			 $preset_key_to_use = $default_preset_key; // Use the default preset
		}
	
		// Get the options for the chosen preset
		$preset_options = $all_preset_options[$preset_key_to_use];
	
		// Merge default options with preset options (preset overrides defaults)
		// Use array_replace_recursive if you want deeper merging for nested options
		$options = array_replace($default_options, $preset_options);
	
		// 5. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$player_table = $wpdb->prefix . "mvp_players";
	
		// Serialize the final options array for storage
		$options_to_save = serialize( $options ); // No need to sanitize here, as we constructed the array from known defaults and presets
	
		// Insert the new player
		$stmt = $wpdb->insert(
			$player_table,
			[
				'title'   => $title,            // Sanitized title
				'preset'  => $preset_key_to_use, // Validated preset key
				'options' => $options_to_save    // Serialized options
			],
			[
				'%s', // title
				'%s', // preset name
				'%s'  // serialized options
			]
		);
	
		// 6. Send Response
		if ($stmt !== false) {
			// Send success response with the new ID
			wp_send_json_success( [
				'message' => 'Player created successfully.',
				'new_player_id' => $wpdb->insert_id
			] );
		} else {
			// Send specific error if insert fails
			wp_send_json_error( ['message' => 'Database error: Could not save the new player. ' . $wpdb->last_error], 500 );
		}
		// wp_die() is called by wp_send_json_success/error
	}

	function mvp_edit_player_title(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to edit player titles.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['title']) || !isset($_POST['id'])) {
			wp_send_json_error( ['message' => 'Missing required fields (title or ID).'], 400 );
		}
	
		// Sanitize inputs
		// Use wp_unslash as WP automatically adds slashes to POST data
		$title = sanitize_text_field(wp_unslash($_POST['title']));
		$id    = absint($_POST['id']); // Ensure ID is an integer
	
		if (empty(trim($title))) {
			wp_send_json_error( ['message' => 'Player title cannot be empty.'], 400 );
		}
		if ($id <= 0) {
			 wp_send_json_error( ['message' => 'Invalid Player ID provided.'], 400 );
		}
	
		// 4. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$player_table = $wpdb->prefix . "mvp_players";
	
		// Update the player title
		$updated = $wpdb->update(
			$player_table,
			[
				'title' => $title // Sanitized title
			],
			['id' => $id],      // Where clause
			['%s'],             // Format for data (%s for title)
			['%d']              // Format for where clause (%d for id)
		);
	
		// 5. Send Response
		if ($updated !== false) {
			// $updated will be the number of rows affected (0 or 1) or false on error.
			wp_send_json_success( ['message' => 'Player title updated successfully.'] );
		} else {
			wp_send_json_error( ['message' => 'Database error: Could not update player title. ' . $wpdb->last_error], 500 );
		}
		// wp_die() is called by wp_send_json_success/error
	}

	function mvp_delete_player(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to delete players.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['player_id'])) {
			wp_send_json_error( ['message' => 'No Player ID(s) provided.'], 400 );
		}
	
		// Sanitize the input: comma-separated IDs
		// Use wp_unslash as WP automatically adds slashes to POST data
		$raw_ids = wp_unslash($_POST['player_id']);
		$id_array = explode(',', $raw_ids);
	
		// Sanitize each ID in the array to ensure they are integers
		$sanitized_ids = array_map('absint', $id_array);
	
		// Filter out any potential zero or negative IDs resulting from sanitization
		$valid_ids = array_filter($sanitized_ids, function($id) {
			return $id > 0;
		});
	
		if (empty($valid_ids)) {
			wp_send_json_error( ['message' => 'No valid Player IDs provided for deletion.'], 400 );
		}
	
		// 4. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$player_table = $wpdb->prefix . "mvp_players";
	
		// Prepare the IN clause securely
		// How many IDs are there?
		$id_count = count($valid_ids);
		// Prepare the placeholders for the IN clause (%d, %d, %d...)
		$id_placeholders = implode(', ', array_fill(0, $id_count, '%d'));
	
		// Construct the full SQL query using prepare
		$sql = $wpdb->prepare(
			"DELETE FROM {$player_table} WHERE id IN ($id_placeholders)",
			$valid_ids // Pass the array of sanitized IDs as arguments to prepare
		);
	
		// Execute the deletion
		$deleted = $wpdb->query($sql);
	
		// 5. Send Response
		if ($deleted !== false) {
			// $deleted contains the number of rows affected
			wp_send_json_success( ['message' => sprintf('%d player(s) deleted successfully.', $deleted)] );
		} else {
			wp_send_json_error( ['message' => 'Database error: Could not delete player(s). ' . $wpdb->last_error], 500 );
		}
		// wp_die() is called by wp_send_json_success/error
	}

	function mvp_save_player_options(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to save player options.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['player_id']) || !isset($_POST['player_options'])) {
			wp_send_json_error( ['message' => 'Missing required fields (player_id or player_options).'], 400 );
		}
	
		// Sanitize player ID
		$player_id = absint($_POST['player_id']);
		if ($player_id <= 0) {
			 wp_send_json_error( ['message' => 'Invalid Player ID provided.'], 400 );
		}
	
		// --- DEBUGGING: Log raw POST data ---
		// error_log('MVP Debug SAVE OPTIONS - Raw POST: ' . print_r($_POST, true));
		// ---
	
		// 4. Decode and Sanitize Options
		$raw_options_json = wp_unslash( $_POST['player_options'] );
		$decoded_options = json_decode( $raw_options_json, true ); // Decode as associative array
	
		if ( json_last_error() !== JSON_ERROR_NONE ) {
			wp_send_json_error( ['message' => 'Invalid JSON data for options received: ' . json_last_error_msg()], 400 );
		}
		if ( !is_array($decoded_options) ) {
			 wp_send_json_error( ['message' => 'Decoded player options are not an array.'], 400 );
		}
	
		// --- DEBUGGING: Log Decoded Options ---
		if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
			error_log('MVP Debug SAVE OPTIONS (' . $player_id . ') - Decoded Options: ' . print_r($decoded_options, true));
		}
		// ---
	
		// Sanitize the options array recursively
		$sanitized_player_options = mvp_sanitize_options_recursive( $decoded_options );
	
		// --- DEBUGGING: Log Sanitized Options ---
		 if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
			error_log('MVP Debug SAVE OPTIONS (' . $player_id . ') - Sanitized Options: ' . print_r($sanitized_player_options, true));
		}
		// ---
	
		// Serialize the *sanitized* options
		$options_to_save = serialize( $sanitized_player_options );
	
		// --- DEBUGGING: Log Serialized Options ---
		if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
			error_log('MVP Debug SAVE OPTIONS (' . $player_id . ') - Serialized for DB: ' . $options_to_save);
		}
		// ---
	
		// 5. Handle Custom CSS and JS
		$custom_css = isset($_POST['custom_css']) ? wp_unslash($_POST['custom_css']) : null;
		$custom_js  = isset($_POST['custom_js']) ? wp_unslash($_POST['custom_js']) : null;
		$custom_css = ( $custom_css === '' ) ? '' : $custom_css;
		$custom_js  = ( $custom_js === '' ) ? '' : $custom_js;
	
		 // --- DEBUGGING: Log Custom CSS/JS ---
		if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
			error_log('MVP Debug SAVE OPTIONS (' . $player_id . ') - Custom CSS: ' . $custom_css);
			error_log('MVP Debug SAVE OPTIONS (' . $player_id . ') - Custom JS: ' . $custom_js);
		}
		// ---
	
	
		// 6. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Keep enabled for debugging if needed
		$player_table = $wpdb->prefix . "mvp_players";
	
		// Update the player data
		$updated = $wpdb->update(
			$player_table,
			[
				'options'    => $options_to_save,
				'custom_css' => $custom_css,
				'custom_js'  => $custom_js
			],
			['id' => $player_id], // Where clause
			[
				'%s', // options format
				'%s', // custom_css format
				'%s'  // custom_js format
			],
			['%d']    // Where format
		);
	
		 // --- DEBUGGING: Log Update Result ---
		if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
			error_log('MVP Debug SAVE OPTIONS (' . $player_id . ') - \$wpdb->update result: ' . print_r($updated, true));
			if ($updated === false) {
				 error_log('MVP Debug SAVE OPTIONS (' . $player_id . ') - DB Error: ' . $wpdb->last_error);
			}
		}
		// ---
	
		// 7. Send Response
		if ($updated !== false) {
			// Send a more informative success message including rows affected
			wp_send_json_success( [
				'message' => 'Player options save executed.',
				'rows_affected' => $updated // Will be 0 if data hasn't changed, 1 if changed, false on error
			] );
		} else {
			wp_send_json_error( ['message' => 'Database error: Could not save player options. ' . $wpdb->last_error], 500 );
		}
		// wp_die() is called by wp_send_json_success/error
	}

	//############################################//
	/* playlist */
	//############################################//

	function mvp_create_playlist(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to create playlists.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['title'])) {
			wp_send_json_error( ['message' => 'Missing required field (title).'], 400 );
		}
	
		// Sanitize inputs
		$title = sanitize_text_field(wp_unslash($_POST['title']));
		if (empty(trim($title))) {
			wp_send_json_error( ['message' => 'Playlist title cannot be empty.'], 400 );
		}
	
		// 4. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$playlist_table = $wpdb->prefix . "mvp_playlists";
	
		// Insert the new playlist (options are typically NULL or empty on creation)
		$inserted = $wpdb->insert(
			$playlist_table,
			[
				'title'   => $title, // Sanitized title
				'options' => null     // Start with null options
			],
			[
				'%s', // title format
				'%s'  // options format (even if null, specify string)
			]
		);
	
		// 5. Handle Response / Optional Media Copying
		if ($inserted === false) {
			 wp_send_json_error( ['message' => 'Database error: Could not create playlist. ' . $wpdb->last_error], 500 );
		}
	
		$lastid = $wpdb->insert_id;
	
		// Handle optional media copying (needs sanitization if used)
		if (isset($_POST['media_id']) && !empty($_POST['media_id'])) {
			// This part involves copying media based on potentially complex IDs (e.g., "1_5_10")
			// It calls mvp_duplicatePlaylist which we haven't reviewed/secured yet.
			// Sanitize the incoming media_id string first.
			// Assuming it's underscore-separated integers.
			$raw_media_ids = wp_unslash($_POST['media_id']);
			$_ids_raw = explode('_', $raw_media_ids);
			$_ids_sanitized = array_map('absint', $_ids_raw);
			$valid_media_ids = array_filter($_ids_sanitized, function($id) { return $id > 0; });
	
			if (!empty($valid_media_ids)) {
				// Reformat for mvp_duplicatePlaylist expectation (array of arrays)
				 $ids_for_duplication = array_map(function($id) { return ["id" => $id]; }, $valid_media_ids);
	
				// Call the duplication function (ensure mvp_duplicatePlaylist is also secured later)
				// We need to check the return value of mvp_duplicatePlaylist if it's modified to indicate success/failure
				 mvp_duplicatePlaylist(null, $lastid, $ids_for_duplication, "playlist_id"); // "playlist_id" tells it to echo json response
	
				 // Note: mvp_duplicatePlaylist currently calls wp_die() itself, so execution might end there.
				 // It would be better if it returned a status and we handled the final response here.
				 // Assuming it echoes the $lastid on success as per current logic:
				 exit; // Exit after mvp_duplicatePlaylist handles the response
	
			} else {
				// If media IDs were provided but none were valid, send success for playlist creation but maybe a notice
				 wp_send_json_success( [
					'message' => 'Playlist created, but invalid media IDs provided for duplication.',
					'new_playlist_id' => $lastid
				] );
			}
	
		} else {
			// Standard success response if no media copying was requested
			wp_send_json_success( [
				'message' => 'Playlist created successfully.',
				'new_playlist_id' => $lastid
			] );
		}
		 // wp_die() is called by wp_send_json_success/error or mvp_duplicatePlaylist
	}

	function mvp_save_playlist_options(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to save playlist options.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['playlist_id']) || !isset($_POST['playlist_options'])) {
			wp_send_json_error( ['message' => 'Missing required fields (playlist_id or playlist_options).'], 400 );
		}
	
		// Sanitize playlist ID
		$playlist_id = absint($_POST['playlist_id']);
		if ($playlist_id <= 0) {
			 wp_send_json_error( ['message' => 'Invalid Playlist ID provided.'], 400 );
		}
	
		// 4. Decode and Sanitize Options
		$raw_options_json = wp_unslash( $_POST['playlist_options'] );
		$decoded_options = json_decode( $raw_options_json, true ); // Decode as associative array
	
		if ( json_last_error() !== JSON_ERROR_NONE ) {
			wp_send_json_error( ['message' => 'Invalid JSON data for options received: ' . json_last_error_msg()], 400 );
		}
		 if ( !is_array($decoded_options) ) {
			 wp_send_json_error( ['message' => 'Decoded playlist options are not an array.'], 400 );
		}
	
		// Sanitize the options array recursively (using the helper function with preserved keys)
		$sanitized_playlist_options = mvp_sanitize_options_recursive( $decoded_options );
	
		// Serialize the *sanitized* options
		$options_to_save = serialize( $sanitized_playlist_options );
	
		 // --- DEBUGGING (Optional) ---
		// if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
		//    error_log('MVP Debug SAVE PLAYLIST OPTIONS (' . $playlist_id . ') - Sanitized: ' . print_r($sanitized_playlist_options, true));
		//    error_log('MVP Debug SAVE PLAYLIST OPTIONS (' . $playlist_id . ') - Serialized: ' . $options_to_save);
		//}
		// ---
	
		// 5. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$playlist_table = $wpdb->prefix . "mvp_playlists";
	
		// Update the playlist options
		$updated = $wpdb->update(
			$playlist_table,
			[
				'options' => $options_to_save // Serialized sanitized options
			],
			['id' => $playlist_id], // Where clause
			['%s'],                 // Format for data
			['%d']                  // Format for where
		);
	
		// 6. Send Response
		if ($updated !== false) {
			wp_send_json_success( [
				'message' => 'Playlist options saved successfully.',
				'rows_affected' => $updated
				] );
		} else {
			wp_send_json_error( ['message' => 'Database error: Could not save playlist options. ' . $wpdb->last_error], 500 );
		}
		 // wp_die() is called by wp_send_json_success/error
	}

	function mvp_edit_playlist_title(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to edit playlist titles.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['title']) || !isset($_POST['id'])) {
			wp_send_json_error( ['message' => 'Missing required fields (title or id).'], 400 );
		}
	
		// Sanitize inputs
		$title = sanitize_text_field(wp_unslash($_POST['title']));
		$id    = absint($_POST['id']); // Ensure ID is an integer
	
		if (empty(trim($title))) {
			wp_send_json_error( ['message' => 'Playlist title cannot be empty.'], 400 );
		}
		 if ($id <= 0) {
			 wp_send_json_error( ['message' => 'Invalid Playlist ID provided.'], 400 );
		}
	
		// 4. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$playlist_table = $wpdb->prefix . "mvp_playlists";
	
		// Update the playlist title
		$updated = $wpdb->update(
			$playlist_table,
			[
				'title' => $title // Sanitized title
			],
			['id' => $id],      // Where clause
			['%s'],             // Format for data
			['%d']              // Format for where
		);
	
		// 5. Send Response
		if ($updated !== false) {
			wp_send_json_success( ['message' => 'Playlist title updated successfully.'] );
		} else {
			wp_send_json_error( ['message' => 'Database error: Could not update playlist title. ' . $wpdb->last_error], 500 );
		}
		// wp_die() is called by wp_send_json_success/error
	}

	function mvp_delete_playlist(){

		// 1. Security Check (Nonce)
		if ( ! check_ajax_referer( 'mvp-security-nonce', 'security', false ) ) {
			wp_send_json_error( ['message' => 'Invalid security token sent.'], 403 );
		}
	
		// 2. Capability Check
		if ( ! current_user_can( MVP_CAPABILITY ) ) {
			wp_send_json_error( ['message' => 'You do not have permission to delete playlists.'], 403 );
		}
	
		// 3. Validate Inputs
		if (!isset($_POST['playlist_id'])) {
			wp_send_json_error( ['message' => 'No Playlist ID(s) provided.'], 400 );
		}
	
		// Sanitize the input: comma-separated IDs
		$raw_ids = wp_unslash($_POST['playlist_id']);
		$id_array = explode(',', $raw_ids);
		$sanitized_ids = array_map('absint', $id_array);
		$valid_ids = array_filter($sanitized_ids, function($id) { return $id > 0; });
	
		if (empty($valid_ids)) {
			wp_send_json_error( ['message' => 'No valid Playlist IDs provided for deletion.'], 400 );
		}
	
		// 4. Database Interaction
		global $wpdb;
		// $wpdb->show_errors(); // Remove for production
		$playlist_table = $wpdb->prefix . "mvp_playlists";
		$media_table = $wpdb->prefix . "mvp_media";
		$statistics_table = $wpdb->prefix . "mvp_statistics";
		$statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play"; // Added
		$statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play"; // Added
		$ad_table = $wpdb->prefix . "mvp_ad";
		$annotation_table = $wpdb->prefix . "mvp_annotation";
		$path_table = $wpdb->prefix . "mvp_path";
		$subtitle_table = $wpdb->prefix . "mvp_subtitle";
		$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";
	
		// Prepare the IN clause securely for playlist IDs
		$id_count = count($valid_ids);
		$id_placeholders = implode(', ', array_fill(0, $id_count, '%d'));
	
		// Start Transaction (recommended for multi-table deletes)
		$wpdb->query('START TRANSACTION');
		$success = true; // Track success across all queries
	
		// Define tables to delete from based on playlist_id
		$tables_to_delete = [
			$path_table,
			$subtitle_table,
			$ad_table, // Deletes ads linked ONLY to these playlists (media or playlist level)
			$annotation_table, // Deletes annotations linked ONLY to these playlists (media or playlist level)
			$media_table,
			$watched_percentage_table,
			$statistics_table,
			$statistics_country_play_table, // Added
			$statistics_user_play_table,   // Added
			$playlist_table // Delete the playlist itself last
		];
	
		 // Loop through tables and delete associated records
		 foreach ($tables_to_delete as $table_name) {
			$column_to_check = ($table_name === $playlist_table) ? 'id' : 'playlist_id'; // Check 'id' for the main playlist table
	
			// Prepare and execute the delete query
			$sql = $wpdb->prepare(
				"DELETE FROM {$table_name} WHERE {$column_to_check} IN ($id_placeholders)",
				$valid_ids
			);
			$result = $wpdb->query($sql);
	
			if ($result === false) {
				$success = false;
				error_log("MVP Delete Playlist Error: Failed to delete from {$table_name}. Error: " . $wpdb->last_error); // Log error
				break; // Stop deletion process on first error
			}
		}
	
	
		// 5. Commit or Rollback Transaction and Send Response
		if ($success) {
			$wpdb->query('COMMIT');
			wp_send_json_success( ['message' => sprintf('%d playlist(s) and associated data deleted successfully.', $id_count)] );
		} else {
			$wpdb->query('ROLLBACK');
			wp_send_json_error( ['message' => 'Database error occurred during deletion. Some data might not have been deleted. Check error log. Error: ' . $wpdb->last_error], 500 );
		}
		 // wp_die() is called by wp_send_json_success/error
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

			$ids = explode(',',$media_id);
			$in = implode(',', array_fill(0, count($ids), '%d'));

		    $stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$media_table} WHERE id IN ($in)", $ids));

			if($stmt !== false){

				$statistics_table = $wpdb->prefix . "mvp_statistics";
				$wpdb->query($wpdb->prepare("DELETE FROM {$statistics_table} WHERE media_id IN ($in)", $ids));

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
							'order_id' => $order_id
						),
						array(
							'%s','%s','%d','%d'
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
		    $ad_table = $wpdb->prefix . "mvp_ad";
		    $annotation_table = $wpdb->prefix . "mvp_annotation";

			$data = array();

			$len = count($media);
			for($i=0; $i < $len; $i++){

			    $options = $media[$i];

			    $media_title = $options['title'];
			    $order_id = $i;

			    $stmt = $wpdb->insert(
			    	$media_table,
					array(
						'title' => $media_title,
						'options' => serialize($options),
						'playlist_id' => $playlist_id,
						'order_id' => $order_id
					),
					array(
						'%s','%s','%d','%d'
					)
			    );

			    if($stmt !== false){

			    	$insert_id = $wpdb->insert_id;

			    	//path

			    	$media_path = array('path' => $options['path']);

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

			    	//ads

			    	if(!empty($_POST['ad_pre'])){

			    		$ad_pre = json_decode(stripcslashes($_POST['ad_pre']), true);//same ads for all media

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

					$data[] = array('insert_id' => $insert_id,
					 			'order_id' => $order_id,
					 			'options' => $options);

			    }

			}



			//save original youtube url for update
			if(isset($_POST['youtube_url']) && !mvp_nullOrEmpty($_POST['youtube_url']) && isset($_POST['youtube_url_type']) && !mvp_nullOrEmpty($_POST['youtube_url_type'])){

			    $playlist_table = $wpdb->prefix . "mvp_playlists";

			    //playlist data
				$playlist_data = $wpdb->get_row($wpdb->prepare("SELECT  options FROM {$playlist_table} WHERE id = %d", $playlist_id), ARRAY_A);
				$pl_options = unserialize($playlist_data['options']);

			    $pl_options['youtubeUrl'] = $_POST['youtube_url'];
			    $pl_options['youtubeUrlType'] = $_POST['youtube_url_type'];

			    $stmt = $wpdb->update(
			    	$playlist_table,
					array('options' => serialize($pl_options)),
					array('id' => $playlist_id),
					array('%s'),
					array('%d')
			    );

			}



			echo json_encode($data);

		    wp_die();

		}else{

			wp_die();
		}

	}



	function mvp_add_more(){

		if(isset($_POST['playlist_id'])){

			$playlist_id = (int)$_POST['playlist_id'];
			$offset = (int)$_POST['addMoreOffset'];
			$limit = (int)$_POST['addMoreLimit'];
			$sortOrder = $_POST['addMoreSortOrder'];
			$sortDirection = $_POST['addMoreSortDirection'];
			$encryptMediaPaths = $_POST['encryptMediaPaths'];

        	global $wpdb;
		    $wpdb->show_errors();
			$media_table = $wpdb->prefix . "mvp_media";

			$stmt = $wpdb->prepare("SELECT id, title, options FROM {$media_table} WHERE disabled = 0 AND playlist_id = %d ORDER BY $sortOrder $sortDirection LIMIT $offset, $limit", $playlist_id);
			$medias = $wpdb->get_results($stmt, ARRAY_A);

			/*
			note: faster pagination could work for order_id sort (use order_id in both directions) but not for title sort. We would need another column id for that.
			https://developer.wordpress.com/2014/02/14/an-efficient-alternative-to-paging-with-sql-offsets/
			*/

	    	$markup = array();

	    	foreach($medias as $media) {
                $markup[] = mvp_shortcode_media($media, $encryptMediaPaths = true);
            }

			echo json_encode($markup);


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



	function mvp_shortcode_media($m, $encryptMediaPaths = false){

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
	            if($type == "folder_video" || $type == "folder_audio" || $type == "folder_image"){

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

	                if($type == "s3_bucket_video" || $type == "s3_video"){
			        	$path = 'data-bucket="'.$p.'" ';
					}else{
						$path = 'data-path="'.$p.'" ';
					}

					if($type == "folder_video" || $type == "folder_audio" || $type == "folder_image"){
	                	$path .= 'data-content-url="'.MVP_FILE_DIR_URL.$row['path'].'" ';
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
	    if(!empty($m["title"])){
	        $track .= 'data-title="'.trim($m["title"]).'" ';
	    }
	    if(!empty($media["description"])){
	        $track .= 'data-description="'.trim($media["description"]).'" ';
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
	    if(!empty($media["limit"])){
	        $track .= 'data-limit="'.$media["limit"].'" ';
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
	    if(!empty($media["load_more"]) && $media["load_more"] == '1'){
	        $track .= 'data-load-more="1" ';
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

	    if(isset($media["pi_icons"])){

	        $track .= ' data-playlist-icons=\'[';
	        $pi_icons = '';

	        foreach ($media["pi_icons"] as $icon) {

	        	$pi_icons .= '{"icon": "'.$icon['icon'].'"';

	        	if(isset($icon['rel']))$pi_icons .= ',"rel": "'.$icon['rel'].'"';
	        	if(isset($icon['title']))$pi_icons .= ',"title": "'.$icon['title'].'"';
	        	if(isset($icon['url']))$pi_icons .= ',"url": "'.$icon['url'].'"';
	        	if(isset($icon['target']))$pi_icons .= ',"target": "'.$icon['target'].'"';
	        	if(isset($icon['class']))$pi_icons .= ',"class": "'.$icon['class'].'"';

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

	    if(!empty($media["custom_content"])){
	        $track .= $media["custom_content"];
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
						wp_die();
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
	/* export playlist (OLD CSV/ZIP) */
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
			$stmt = $wpdb->prepare("SELECT id, title, options FROM {$playlist_table} WHERE id = %d", $playlist_id);//we need to select in specific order for bulk import!
			$result = $wpdb->get_results($stmt, ARRAY_N);
			mvp_getOutput("mvp_playlists", $result, $zip);

			//media
			$stmt = $wpdb->prepare("SELECT id, options, order_id, playlist_id FROM {$media_table} WHERE playlist_id = %d", $playlist_id); // Missing title here
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
					'title' => $playlist[1],
					'options' => $playlist[2]
				),
				array(
					'%s','%s'
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
							'options' => $media[$i][1], // Missing title here
							'order_id' => $media[$i][2],
							'playlist_id' => $last_playlist_id
						),
						array(
							'%s','%d','%d'
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

    // --- NEW JSON Export/Import Functions ---

    /**
     * AJAX handler to export selected playlists as JSON.
     */
    function mvp_export_playlists_json() {
        // 1. Security Checks
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'mvp-security-nonce')) {
            // Send error as JSON, more appropriate for direct AJAX calls if the form submission fails
            // However, since this is triggered by a form submit for download, direct output or wp_die might also occur.
            // For consistency, let's stick to wp_send_json_error for potential future JS fetch calls.
            status_header(403); // Set HTTP status code
            echo wp_json_encode(['success' => false, 'data' => ['message' => 'Invalid security token sent.']]);
            wp_die();
        }
        if (!current_user_can(MVP_CAPABILITY)) {
            status_header(403);
            echo wp_json_encode(['success' => false, 'data' => ['message' => 'You do not have permission to export playlists.']]);
            wp_die();
        }
        if (!isset($_POST['playlist_ids']) || !is_array($_POST['playlist_ids'])) {
            status_header(400);
            echo wp_json_encode(['success' => false, 'data' => ['message' => 'No playlist IDs provided.']]);
            wp_die();
        }

        $playlist_ids = array_map('intval', $_POST['playlist_ids']); // Sanitize IDs
        if (empty($playlist_ids)) {
            status_header(400);
            echo wp_json_encode(['success' => false, 'data' => ['message' => 'No valid playlist IDs provided.']]);
            wp_die();
        }

        // 2. Database Access
        global $wpdb;
        $playlist_table = $wpdb->prefix . "mvp_playlists";
        $media_table = $wpdb->prefix . "mvp_media";
        $path_table = $wpdb->prefix . "mvp_path";
        $subtitle_table = $wpdb->prefix . "mvp_subtitle";
        $ad_table = $wpdb->prefix . "mvp_ad";
        $annotation_table = $wpdb->prefix . "mvp_annotation";

        $export_data = [
            'version'     => '1.0-mvp-json',
            'exported_at' => gmdate('c'), // ISO 8601 format (UTC)
            'playlists'   => [],
        ];

        // 3. Loop through requested playlists
        foreach ($playlist_ids as $playlist_id) {
            $playlist_row = $wpdb->get_row($wpdb->prepare("SELECT title, options FROM {$playlist_table} WHERE id = %d", $playlist_id), ARRAY_A);

            if (!$playlist_row) {
                continue; // Skip if playlist not found
            }

            $playlist_options = maybe_unserialize($playlist_row['options']);
            if (!is_array($playlist_options)) { // Ensure options is an array/object
                 $playlist_options = [];
            }


            $playlist_export_item = [
                'title'   => $playlist_row['title'],
                'options' => $playlist_options,
                'media'   => [],
            ];

            // 4. Fetch media for this playlist
            $media_rows = $wpdb->get_results($wpdb->prepare("SELECT id, title, options, order_id FROM {$media_table} WHERE playlist_id = %d ORDER BY order_id ASC", $playlist_id), ARRAY_A);

            if ($media_rows) {
                foreach ($media_rows as $media_row) {
                    $media_id = $media_row['id']; // This is the OLD media ID
                    $media_options = maybe_unserialize($media_row['options']);
                     if (!is_array($media_options)) {
                         $media_options = [];
                     }

                    $media_export_item = [
                        'title'       => $media_row['title'], // Include the title!
                        'order_id'    => (int) $media_row['order_id'],
                        'options'     => $media_options,
                        'paths'       => [],
                        'subtitles'   => [],
                        'ads'         => [],
                        'annotations' => [],
                    ];

                    // 5. Fetch related data for this media item
                    // Paths
                    $path_rows = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$path_table} WHERE media_id = %d", $media_id), ARRAY_A);
                    if ($path_rows) {
                        foreach ($path_rows as $path_row) {
                            $path_options = maybe_unserialize($path_row['options']);
                            if (is_array($path_options)) {
                                 $media_export_item['paths'][] = ['options' => $path_options];
                            }
                        }
                    }

                    // Subtitles
                    $subtitle_rows = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$subtitle_table} WHERE media_id = %d", $media_id), ARRAY_A);
                    if ($subtitle_rows) {
                        foreach ($subtitle_rows as $subtitle_row) {
                             $subtitle_options = maybe_unserialize($subtitle_row['options']);
                             if (is_array($subtitle_options)) {
                                $media_export_item['subtitles'][] = ['options' => $subtitle_options];
                             }
                        }
                    }

                    // Ads (associated with media, not global ads)
                     $ad_rows = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE media_id = %d AND ad_id IS NULL", $media_id), ARRAY_A);
                     if ($ad_rows) {
                        foreach ($ad_rows as $ad_row) {
                             $ad_options = maybe_unserialize($ad_row['options']);
                             if (is_array($ad_options)) {
                                $media_export_item['ads'][] = ['options' => $ad_options];
                             }
                        }
                    }

                    // Annotations (associated with media, not global ads)
                     $annotation_rows = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE media_id = %d AND ad_id IS NULL", $media_id), ARRAY_A);
                     if ($annotation_rows) {
                        foreach ($annotation_rows as $annotation_row) {
                             $annotation_options = maybe_unserialize($annotation_row['options']);
                             if (is_array($annotation_options)) {
                                 $media_export_item['annotations'][] = ['options' => $annotation_options];
                             }
                        }
                    }

                    $playlist_export_item['media'][] = $media_export_item;
                } // end foreach media_row
            } // end if media_rows

            $export_data['playlists'][] = $playlist_export_item;
        } // end foreach playlist_ids

        // 6. Send JSON Response for Download
        $filename = 'mvp_playlists_export_' . date('Y-m-d_His') . '.json';
        header('Content-Type: application/json; charset=utf-8'); // Ensure UTF-8
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header("Expires: 0"); // Prevents caching
        echo wp_json_encode($export_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); // Use wp_json_encode for better WP integration, ensure unicode is not escaped
        wp_die(); // Important for AJAX handlers / direct output

    }


    /**
     * AJAX handler to import playlists from an uploaded JSON file.
     */
    function mvp_import_playlists_json() {
        // 1. Security and File Upload Checks
        // Use the nonce from the form in playlist_manager.php
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'mvp-import-playlist-nonce')) {
             wp_send_json_error(['message' => 'Invalid security token sent.'], 403);
             wp_die();
        }
         if (!current_user_can(MVP_CAPABILITY)) {
            wp_send_json_error(['message' => 'You do not have permission to import playlists.'], 403);
            wp_die();
        }
        if (!isset($_FILES['mvp_import_file'])) {
            wp_send_json_error(['message' => 'No file uploaded.'], 400);
            wp_die();
        }

        $file = $_FILES['mvp_import_file'];

        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $upload_errors = [
                UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
                UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
                UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded.",
                UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
                UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
                UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
                UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload.",
            ];
            $error_message = isset($upload_errors[$file['error']]) ? $upload_errors[$file['error']] : 'Unknown upload error.';
            wp_send_json_error(['message' => $error_message], 500);
            wp_die();
        }

        // Check file type (basic check)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        // Allow application/json and text/plain (sometimes JSON is uploaded as plain text)
        if ($mime_type !== 'application/json' && $mime_type !== 'text/plain') {
             // More specific check for file extension as fallback
             $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
             if ($file_ext !== 'json') {
                wp_send_json_error(['message' => 'Invalid file type detected (' . esc_html($mime_type) . '). Please upload a .json file.'], 415);
                wp_die();
             }
        }


        // 2. Read and Decode JSON
        $json_content = file_get_contents($file['tmp_name']);
        if ($json_content === false) {
            wp_send_json_error(['message' => 'Could not read uploaded file.'], 500);
            wp_die();
        }

        // Remove UTF-8 BOM if present (can interfere with json_decode)
        if (substr($json_content, 0, 3) === "\xEF\xBB\xBF") {
            $json_content = substr($json_content, 3);
        }

        $import_data = json_decode($json_content, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            wp_send_json_error(['message' => 'Invalid JSON file: ' . json_last_error_msg()], 400);
            wp_die();
        }

        // 3. Validate Basic Structure
        if (!isset($import_data['playlists']) || !is_array($import_data['playlists'])) {
            wp_send_json_error(['message' => 'Invalid JSON structure: Missing "playlists" array.'], 400);
            wp_die();
        }

        // 4. Database Access
        global $wpdb;
        $playlist_table = $wpdb->prefix . "mvp_playlists";
        $media_table = $wpdb->prefix . "mvp_media";
        $path_table = $wpdb->prefix . "mvp_path";
        $subtitle_table = $wpdb->prefix . "mvp_subtitle";
        $ad_table = $wpdb->prefix . "mvp_ad";
        $annotation_table = $wpdb->prefix . "mvp_annotation";

        $imported_playlists = 0;
        $imported_media = 0;
        $errors = [];

        // 5. Start Transaction (Optional but recommended for bulk inserts)
        $wpdb->query('START TRANSACTION');

        try {
            // 6. Loop through Playlists in JSON
            foreach ($import_data['playlists'] as $playlist_index => $playlist_item) {
                if (!isset($playlist_item['title'])) {
                    $errors[] = "Playlist #" . ($playlist_index + 1) . " is missing a title. Skipping.";
                    continue;
                }

                // Sanitize and prepare playlist data
                $playlist_title = sanitize_text_field($playlist_item['title']);
                // Add suffix to avoid exact title conflicts (you might want a setting for this)
                $playlist_title .= ' (Imported ' . date('Y-m-d H:i:s') . ')';
                $playlist_options = isset($playlist_item['options']) && is_array($playlist_item['options']) ? $playlist_item['options'] : [];

                // Insert Playlist
                $inserted_playlist = $wpdb->insert(
                    $playlist_table,
                    [
                        'title'   => $playlist_title,
                        'options' => maybe_serialize($playlist_options), // Re-serialize for DB
                    ],
                    ['%s', '%s']
                );

                if (!$inserted_playlist) {
                    $errors[] = "Failed to insert playlist: " . esc_html($playlist_title) . ". Error: " . esc_html($wpdb->last_error);
                    continue; // Skip media if playlist insertion failed
                }

                $new_playlist_id = $wpdb->insert_id;
                $imported_playlists++;

                // 7. Loop through Media in the current Playlist
                if (isset($playlist_item['media']) && is_array($playlist_item['media'])) {
                    foreach ($playlist_item['media'] as $media_index => $media_item) {
                         if (!isset($media_item['title'])) {
                            $errors[] = "Media item #" . ($media_index + 1) . " in playlist '" . esc_html($playlist_title) . "' is missing a title. Skipping.";
                            continue;
                        }

                        // Sanitize and prepare media data
                        $media_title = sanitize_text_field($media_item['title']);
                        $media_order_id = isset($media_item['order_id']) ? intval($media_item['order_id']) : 0;
                        $media_options = isset($media_item['options']) && is_array($media_item['options']) ? $media_item['options'] : [];

                         // Insert Media
                        $inserted_media = $wpdb->insert(
                            $media_table,
                            [
                                'title'       => $media_title,
                                'options'     => maybe_serialize($media_options),
                                'order_id'    => $media_order_id,
                                'playlist_id' => $new_playlist_id,
                                'disabled'    => 0, // Ensure imported items are enabled by default
                            ],
                            ['%s', '%s', '%d', '%d', '%d']
                        );

                        if (!$inserted_media) {
                             $errors[] = "Failed to insert media: " . esc_html($media_title) . " for playlist '" . esc_html($playlist_title) . "'. Error: " . esc_html($wpdb->last_error);
                             continue; // Skip related data if media insertion failed
                        }

                        $new_media_id = $wpdb->insert_id;
                        $imported_media++;

                        // 8. Loop through and Insert Related Data (Paths, Subs, Ads, Annotations)
                        // Paths
                        if (isset($media_item['paths']) && is_array($media_item['paths'])) {
                            foreach ($media_item['paths'] as $path_item) {
                                 if (isset($path_item['options']) && is_array($path_item['options'])) {
                                    $wpdb->insert(
                                        $path_table,
                                        [
                                            'options'     => maybe_serialize($path_item['options']),
                                            'media_id'    => $new_media_id,
                                            'playlist_id' => $new_playlist_id, // Add playlist ID here too
                                        ],
                                        ['%s', '%d', '%d']
                                    );
                                    // Basic error check - could be more robust
                                    if ($wpdb->last_error) $errors[] = "Error inserting path for media '" . esc_html($media_title) . "': " . esc_html($wpdb->last_error);
                                }
                            }
                        }
                        // Subtitles
                        if (isset($media_item['subtitles']) && is_array($media_item['subtitles'])) {
                             foreach ($media_item['subtitles'] as $sub_item) {
                                 if (isset($sub_item['options']) && is_array($sub_item['options'])) {
                                    $wpdb->insert(
                                        $subtitle_table,
                                        [
                                            'options'     => maybe_serialize($sub_item['options']),
                                            'media_id'    => $new_media_id,
                                            'playlist_id' => $new_playlist_id,
                                        ],
                                         ['%s', '%d', '%d']
                                    );
                                    if ($wpdb->last_error) $errors[] = "Error inserting subtitle for media '" . esc_html($media_title) . "': " . esc_html($wpdb->last_error);
                                 }
                            }
                        }
                        // Ads
                        if (isset($media_item['ads']) && is_array($media_item['ads'])) {
                             foreach ($media_item['ads'] as $ad_item) {
                                if (isset($ad_item['options']) && is_array($ad_item['options'])) {
                                    $wpdb->insert(
                                        $ad_table,
                                        [
                                            'options'     => maybe_serialize($ad_item['options']),
                                            'media_id'    => $new_media_id,
                                            'playlist_id' => $new_playlist_id,
                                            'ad_id'       => null, // Ensure it's linked to media, not global ad
                                        ],
                                        ['%s', '%d', '%d', null] // Use specific format types
                                    );
                                    if ($wpdb->last_error) $errors[] = "Error inserting ad for media '" . esc_html($media_title) . "': " . esc_html($wpdb->last_error);
                                }
                            }
                        }
                        // Annotations
                        if (isset($media_item['annotations']) && is_array($media_item['annotations'])) {
                            foreach ($media_item['annotations'] as $ann_item) {
                                if (isset($ann_item['options']) && is_array($ann_item['options'])) {
                                    $wpdb->insert(
                                        $annotation_table,
                                        [
                                            'options'     => maybe_serialize($ann_item['options']),
                                            'media_id'    => $new_media_id,
                                            'playlist_id' => $new_playlist_id,
                                            'ad_id'       => null, // Ensure it's linked to media, not global ad
                                        ],
                                         ['%s', '%d', '%d', null] // Use specific format types
                                    );
                                    if ($wpdb->last_error) $errors[] = "Error inserting annotation for media '" . esc_html($media_title) . "': " . esc_html($wpdb->last_error);
                                }
                            }
                        }

                    } // end foreach media_item
                } // end if has media
            } // end foreach playlist_item

            // 9. Commit or Rollback Transaction
            if (empty($errors)) {
                $wpdb->query('COMMIT');
                 wp_send_json_success([
                    'message' => sprintf(
                        'Successfully imported %d playlist(s) and %d media item(s). Page will reload.',
                        $imported_playlists,
                        $imported_media
                    )
                ]);
            } else {
                $wpdb->query('ROLLBACK');
                 wp_send_json_error([
                    'message' => 'Import failed with errors. No changes were made. Please check the error details.',
                    'errors'  => $errors // Send back the specific errors
                ], 500); // Use 500 for server-side processing error during transaction
            }

        } catch (Exception $e) {
            $wpdb->query('ROLLBACK');
            wp_send_json_error(['message' => 'An unexpected critical error occurred during import: ' . $e->getMessage()], 500);
        }

        // This line should technically not be reached if commit/rollback works and wp_send_json_* calls wp_die()
        wp_die();

    }

    // ------------------------------------

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

			$ids = explode(',',$ad_id);
			$in = implode(',', array_fill(0, count($ids), '%d'));

		    $stmt = $wpdb->query($wpdb->prepare("DELETE FROM {$global_ad_table} WHERE id IN ($in)", $ids));

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

	    $global_ad_table = $wpdb->prefix . "mvp_global_ad";
	    $sql = "DROP TABLE IF EXISTS $global_ad_table;";
	    $wpdb->query($sql);

	    $statistics_table = $wpdb->prefix . "mvp_statistics";
	    $sql = "DROP TABLE IF EXISTS $statistics_table;";
	    $wpdb->query($sql);

		$statistics_country_table = $wpdb->prefix . "mvp_statistics_country";
	    $sql = "DROP TABLE IF EXISTS $statistics_country_table;";
	    $wpdb->query($sql);

		$statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play";
	    $sql = "DROP TABLE IF EXISTS $statistics_country_play_table;";
	    $wpdb->query($sql);

		$statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
	    $sql = "DROP TABLE IF EXISTS $statistics_user_table;";
	    $wpdb->query($sql);

		$statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";
	    $sql = "DROP TABLE IF EXISTS $statistics_user_play_table;";
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
				`options` text NOT NULL,
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

		$statistics_table = $wpdb->prefix . "mvp_statistics";
		if($wpdb->get_var( "show tables like '$statistics_table'" ) != $statistics_table){

			$sql = "CREATE TABLE $statistics_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`origtype` varchar(20) DEFAULT NULL,
				`title` varchar(300) DEFAULT NULL,
			    `c_play` int(11) unsigned DEFAULT '0',
			    `c_time` int(11) unsigned DEFAULT '0',
			    `c_download` int(11) DEFAULT '0',
			    `c_finish` int(11) unsigned DEFAULT '0',
			    `c_date` date DEFAULT NULL,
			    `media_id` int(11) unsigned NOT NULL,
			    `playlist_id` int(11) unsigned DEFAULT NULL,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

        $statistics_country_table = $wpdb->prefix . "mvp_statistics_country";
		if($wpdb->get_var( "show tables like '$statistics_country_table'" ) != $statistics_country_table){

			$sql = "CREATE TABLE $statistics_country_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`country` varchar(100),
				`country_code` varchar(10),
				`continent` varchar(15),
			    PRIMARY KEY (`id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play";
		if($wpdb->get_var( "show tables like '$statistics_country_play_table'" ) != $statistics_country_play_table){

			$sql = "CREATE TABLE $statistics_country_play_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`title` varchar(300),
		    	`thumb` varchar(300),
		    	`video_url` varchar(300),
			    `c_play` int(11) unsigned,
			    `c_time` int(11) unsigned,
			    `c_date` date,
			    `media_id` int(11) unsigned,
			    `playlist_id` int(11) unsigned,
			    `country_id` int(11) unsigned,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
		if($wpdb->get_var( "show tables like '$statistics_user_table'" ) != $statistics_user_table){

			$sql = "CREATE TABLE $statistics_user_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`user_id` smallint(11) unsigned,
				`user_display_name` varchar(100),
				`user_role` varchar(50),
			    PRIMARY KEY (`id`),
			    INDEX `user_id` (`user_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";
		if($wpdb->get_var( "show tables like '$statistics_user_play_table'" ) != $statistics_user_play_table){

			$sql = "CREATE TABLE $statistics_user_play_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`title` varchar(300),
		    	`thumb` varchar(300),
		    	`video_url` varchar(300),
			    `c_play` int(11) unsigned,
			    `c_time` int(11) unsigned,
			    `c_date` date,
			    `media_id` int(11) unsigned,
			    `playlist_id` int(11) unsigned,
			    `user_id` int(11) unsigned,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

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
		$statistics_table = $wpdb->prefix . "mvp_statistics";
		$watched_percentage_table = $wpdb->prefix . "mvp_watched_percentage";



		if($current_version < '2.56'){

			update_option('mvp_video_player_version', '2.65');
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '2.65'){

			$sql = "SHOW COLUMNS FROM {$settings_table} LIKE 'options'";
	    	$result = $wpdb->query($sql);

	    	if($wpdb->num_rows == 0){
	    		$sql = "ALTER TABLE {$settings_table} ADD COLUMN `options` text";
	    		$result = $wpdb->query($sql);
	    	}

	    	update_option('mvp_video_player_version', 2.7);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '2.7'){

			$sql = "SHOW COLUMNS FROM {$player_table} LIKE 'custom_css'";
	    	$result = $wpdb->query($sql);

	    	if($wpdb->num_rows == 0){
	    		$sql = "ALTER TABLE {$player_table} ADD COLUMN `custom_css` longtext DEFAULT NULL";
	    		$result = $wpdb->query($sql);
	    	}

	    	update_option('mvp_video_player_version', 3.0);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.0'){

	    	update_option('mvp_video_player_version', 3.01);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.01'){


	    	update_option('mvp_video_player_version', 3.1);
			$current_version = get_option('mvp_video_player_version');
		}

		if($current_version == '3.1'){

			//update playlist item content

 			$players = $wpdb->get_results("SELECT id, options FROM {$player_table}", ARRAY_A);
		    if($players){
		    	foreach($players as $pl) {
			        $options = unserialize($pl['options']);

			        $options['playlistItemContent'] = array("thumb","title","description");

			        $stmt = $wpdb->update(
				    	$player_table,
						array('options' => serialize($options)),
						array('id' => $pl['id']),
						array('%s'),
						array('%d')
				    );

			    }
		    }

		    update_option('mvp_video_player_version', 3.15);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.15'){

			//camelCase playlist options

 			$playlists = $wpdb->get_results("SELECT id, options FROM {$playlist_table}", ARRAY_A);
		    if($playlists){
		    	foreach($playlists as $pl) {
			        $options = unserialize($pl['options']);

			        if($options){

				        foreach($options as $key => $value){
				        	if(strpos($key, '_') !== false){
							    $newkey = mvp_underscoreToCamelCase($key);
								$options[$newkey] = $options[$key];
								unset($options[$key]);
							}
						}

				        $stmt = $wpdb->update(
					    	$playlist_table,
							array('options' => serialize($options)),
							array('id' => $pl['id']),
							array('%s'),
							array('%d')
					    );

					}

			    }
		    }

		    update_option('mvp_video_player_version', 3.3);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.3'){

			update_option('mvp_video_player_version', 3.4);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.4'){

			update_option('mvp_video_player_version', 3.42);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.42'){

			update_option('mvp_video_player_version', 3.5);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.5'){

			update_option('mvp_video_player_version', 3.51);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.51'){

			update_option('mvp_video_player_version', 3.52);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.52'){

			update_option('mvp_video_player_version', 3.55);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.55'){

			update_option('mvp_video_player_version', 3.56);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.56'){

			//update playback rate

 			$players = $wpdb->get_results("SELECT id, options FROM {$player_table}", ARRAY_A);
		    if($players){
		    	foreach($players as $pl) {
			        $options = unserialize($pl['options']);

			        unset($options['playbackRateArr']);

			        $options['playbackRateArr'] = array(
		                  array(
		                      'value' => 2,
		                      'menu_title' => '2x'
		                  ),
		                  array(
		                      'value' => 1.5,
		                      'menu_title' => '1.5x'
		                  ),
		                  array(
		                      'value' => 1.25,
		                      'menu_title' => '1.25x'
		                  ),
		                  array(
		                      'value' => 1,
		                      'menu_title' => '1x (Normal)'
		                  ),
		                  array(
		                      'value' => 0.5,
		                      'menu_title' => '0.5x'
		                  ),
		            );

			        $stmt = $wpdb->update(
				    	$player_table,
						array('options' => serialize($options)),
						array('id' => $pl['id']),
						array('%s'),
						array('%d')
				    );

			    }
		    }

			update_option('mvp_video_player_version', 3.71);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '3.71'){

			update_option('mvp_video_player_version', 4.0);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '4.0'){

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

			//statistics

			if($wpdb->get_var( "show tables like '$statistics_table'" ) != $statistics_table){

				$sql = "CREATE TABLE $statistics_table (
					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					`origtype` varchar(20) DEFAULT NULL,
					`title` varchar(300) NOT NULL,
				    `c_play` int(11) unsigned NOT NULL,
				    `c_time` int(11) unsigned NOT NULL,
				    `c_date` date NOT NULL,
				    `media_id` int(11) unsigned NOT NULL,
				    `playlist_id` int(11) unsigned DEFAULT NULL,
				    PRIMARY KEY (`id`),
				    INDEX `media_id` (`media_id`)
				) $charset_collate;";
				dbDelta( $sql );

			}

			update_option('mvp_video_player_version', 4.5);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '4.5'){

			update_option('mvp_video_player_version', 4.55);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '4.55'){

			update_option('mvp_video_player_version', 4.56);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '4.56'){

			update_option('mvp_video_player_version', 4.57);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '4.57'){

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

			//update sort order

 			$playlists = $wpdb->get_results("SELECT id, options FROM {$playlist_table}", ARRAY_A);
		    if($playlists){

		    	$values = array();
				$place_holders = array();

		    	foreach($playlists as $pl) {
			        $options = unserialize($pl['options']);

			        if($options){
						$options['sortOrder'] = 'order_id';

						array_push( $values, serialize($options), $pl['id']);
						$place_holders[] = "('%s', '%d')";
					}

			    }

			    if(count($values)){

				    $query = "INSERT INTO $playlist_table (options, id) VALUES ";
					$query .= implode( ', ', $place_holders );

					$query .= "ON DUPLICATE KEY UPDATE options=VALUES(options)";

					$wpdb->query( $wpdb->prepare( "$query ", $values ) );

				}
			}


			//stats finish and download

			$sql = "SHOW COLUMNS FROM {$statistics_table} LIKE 'c_download'";
	    	$result = $wpdb->query($sql);

	    	if($wpdb->num_rows == 0){

				$sql = "ALTER TABLE {$statistics_table} ADD COLUMN `c_download` int(11) DEFAULT '0',
														ADD COLUMN `c_finish` int(11) unsigned DEFAULT '0'";
			    $result = $wpdb->query($sql);

			}

			//settings table

			$settings_table = $wpdb->prefix . "mvp_settings";
		    $result = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);
		    $settings = unserialize($result['options']);
		    $settings['vimeo_no_cookie'] = 0;

		    $stmt = $wpdb->update(
		    	$settings_table,
				array('options' => serialize($settings)),
				array('id' => 0),
				array('%s'),
				array('%d')
		    );

			//custom javascript

			$sql = "SHOW COLUMNS FROM {$player_table} LIKE 'custom_js'";
	    	$result = $wpdb->query($sql);

	    	if($wpdb->num_rows == 0){
	    		$sql = "ALTER TABLE {$player_table} ADD COLUMN `custom_js` longtext DEFAULT NULL";
	    		$result = $wpdb->query($sql);
	    	}


			update_option('mvp_video_player_version', 5.0);
			$current_version = get_option('mvp_video_player_version');

		}
		if($current_version == '5.0'){

			//update 360

	    	$media_data = $wpdb->get_results("SELECT id, options FROM {$media_table}", ARRAY_A);

	    	foreach ($media_data as $d) {

				$options = unserialize($d['options']);

				foreach($options as $key => $value){
					if($key == 'type' && ($value == 'video_360' || $value == 'image_360')){

						$v = substr($value, 0, 5);///remove _ 360

						$options['type'] = $v;
						$options['is360'] = '1';

						$stmt = $wpdb->update(
					    	$media_table,
							array('options' => serialize($options)),
							array('id' => $d['id']),
							array('%s'),
							array('%d')
					    );

					}
				}

			}

			update_option('mvp_video_player_version', 5.01);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.01'){
			update_option('mvp_video_player_version', 5.02);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.02'){
			update_option('mvp_video_player_version', 5.05);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.05'){
			update_option('mvp_video_player_version', 5.06);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.06'){
			update_option('mvp_video_player_version', 5.07);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.07'){
			update_option('mvp_video_player_version', 5.1);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.1'){
			update_option('mvp_video_player_version', 5.11);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.11'){
			update_option('mvp_video_player_version', 5.12);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.12'){
			update_option('mvp_video_player_version', 5.15);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version == '5.15'){
			update_option('mvp_video_player_version', 5.16);
			$current_version = get_option('mvp_video_player_version');
		}
		if($current_version <= '5.16'){

			//update limitDescriptionText

 			$players = $wpdb->get_results("SELECT id, options FROM {$player_table}", ARRAY_A);
		    if($players){
		    	foreach($players as $pl) {
			        $options = unserialize($pl['options']);

			        $options['limitDescriptionText'] = '2';

			        $stmt = $wpdb->update(
				    	$player_table,
						array('options' => serialize($options)),
						array('id' => $pl['id']),
						array('%s'),
						array('%d')
				    );

			    }
		    }

		    //remove fk
			/*$sql = "ALTER TABLE $path_table DROP FOREIGN KEY mvp_path_ibfk_1";
		    $wpdb->query($sql);

		    $sql = "ALTER TABLE $subtitle_table DROP FOREIGN KEY mvp_subtitle_ibfk_1";
		    $wpdb->query($sql);

		    $sql = "ALTER TABLE $ad_table DROP FOREIGN KEY mvp_ad_ibfk_1";
		    $wpdb->query($sql);

		    $sql = "ALTER TABLE $annotation_table DROP FOREIGN KEY mvp_annotation_ibfk_1";
		    $wpdb->query($sql);

		    $sql = "ALTER TABLE $statistics_table DROP FOREIGN KEY mvp_stat_ibfk_1";
		    $wpdb->query($sql);

			$sql = "ALTER TABLE $media_table DROP FOREIGN KEY mvp_media_ibfk_1";
		    $wpdb->query($sql);

		    $sql = "ALTER TABLE $watched_percentage_table DROP FOREIGN KEY mvp_wperc_ibfk_1";
			$wpdb->query($sql);

			$sql = "ALTER TABLE $watched_percentage_table MODIFY COLUMN `playlist_id` int(11) unsigned DEFAULT NULL";
			$wpdb->query($sql);*/

			update_option('mvp_video_player_version', 6.0);
			$current_version = get_option('mvp_video_player_version');
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




		$statistics_country_table = $wpdb->prefix . "mvp_statistics_country";
		if($wpdb->get_var( "show tables like '$statistics_country_table'" ) != $statistics_country_table){

			$sql = "CREATE TABLE $statistics_country_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`country` varchar(100),
				`country_code` varchar(10),
				`continent` varchar(15),
			    PRIMARY KEY (`id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play";
		if($wpdb->get_var( "show tables like '$statistics_country_play_table'" ) != $statistics_country_play_table){

			$sql = "CREATE TABLE $statistics_country_play_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`title` varchar(300),
		    	`thumb` varchar(300),
		    	`video_url` varchar(300),
			    `c_play` int(11) unsigned,
			    `c_time` int(11) unsigned,
			    `c_date` date,
			    `media_id` int(11) unsigned,
			    `playlist_id` int(11) unsigned,
			    `country_id` int(11) unsigned,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
		if($wpdb->get_var( "show tables like '$statistics_user_table'" ) != $statistics_user_table){

			$sql = "CREATE TABLE $statistics_user_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`user_id` smallint(11) unsigned,
				`user_display_name` varchar(100),
				`user_role` varchar(50),
			    PRIMARY KEY (`id`),
			    INDEX `user_id` (`user_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		$statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";
		if($wpdb->get_var( "show tables like '$statistics_user_play_table'" ) != $statistics_user_play_table){

			$sql = "CREATE TABLE $statistics_user_play_table (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`title` varchar(300),
		    	`thumb` varchar(300),
		    	`video_url` varchar(300),
			    `c_play` int(11) unsigned,
			    `c_time` int(11) unsigned,
			    `c_date` date,
			    `media_id` int(11) unsigned,
			    `playlist_id` int(11) unsigned,
			    `user_id` int(11) unsigned,
			    PRIMARY KEY (`id`),
			    INDEX `media_id` (`media_id`)
			) $charset_collate;";
			dbDelta( $sql );

		}

		//disabled

		$sql = "SHOW COLUMNS FROM {$media_table} LIKE 'disabled'";
    	$result = $wpdb->query($sql);

    	if($wpdb->num_rows == 0){
    		$sql = "ALTER TABLE {$media_table} ADD COLUMN `disabled` tinyint DEFAULT 0";
    		$result = $wpdb->query($sql);
    	}



		update_option('mvp_video_player_version', 7.5);




	}


?>