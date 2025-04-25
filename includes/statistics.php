<?php

	function mvp_getTopPlayToday($playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($playlist_id != '-1'){
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, c_play AS total_count FROM {$statistics_table} WHERE c_date= CURDATE() AND playlist_id = %d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
		}else{
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, c_play AS total_count FROM {$statistics_table} WHERE c_date= CURDATE() GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTopPlayLastXDaysTotal($player_id = null, $playlist_id = null, $x = null, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($player_id != null){

			//it's supported in MySql 8.0 and later, MariaDB 10.2 and later
			/*$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
			FROM (
			    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
			       , row_number() over (partition by date(c_date) order by sum(c_play) desc) as 
			    rn
			    FROM {$statistics_table} 
			    WHERE c_date > NOW() - INTERVAL %d DAY AND player_id = %d
			    GROUP BY date(c_date), media_id, title
			    HAVING SUM(c_play) > 0 
			) t
			GROUP BY stat_day
			ORDER BY stat_day", $x, $player_id), ARRAY_A);*/


			$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
			FROM (
			    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
			    FROM {$statistics_table} 
			    WHERE c_date > NOW() - INTERVAL %d DAY AND player_id = %d
			    GROUP BY date(c_date), media_id, title
			    HAVING SUM(c_play) > 0 
			    ORDER BY sum(c_play) DESC
			) t
			GROUP BY stat_day
			ORDER BY stat_day", $x, $player_id), ARRAY_A);

		}
		else if($playlist_id == '-1'){

			/*$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
			FROM (
			    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
			       , row_number() over (partition by date(c_date) order by sum(c_play) desc) as 
			    rn
			    FROM {$statistics_table} 
			    WHERE c_date > NOW() - INTERVAL %d DAY 
			    GROUP BY date(c_date), media_id, title
			    HAVING SUM(c_play) > 0 
			) t
			GROUP BY stat_day
			ORDER BY stat_day", $x), ARRAY_A);*/

			$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
			FROM (
			    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
			    FROM {$statistics_table} 
			    WHERE c_date > NOW() - INTERVAL %d DAY 
			    GROUP BY date(c_date), media_id, title
			    HAVING SUM(c_play) > 0 
			    ORDER BY sum(c_play) DESC
			) t
			GROUP BY stat_day
			ORDER BY stat_day", $x), ARRAY_A);

		}
		else{

			/*$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
			FROM (
			    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
			       , row_number() over (partition by date(c_date) order by sum(c_play) desc) as 
			    rn
			    FROM {$statistics_table} 
			    WHERE c_date > NOW() - INTERVAL %d DAY AND playlist_id = %d
			    GROUP BY date(c_date), media_id, title
			    HAVING SUM(c_play) > 0 
			) t
			GROUP BY stat_day
			ORDER BY stat_day", $x, $playlist_id), ARRAY_A);*/

			$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
			FROM (
			    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
			    FROM {$statistics_table} 
			    WHERE c_date > NOW() - INTERVAL %d DAY AND playlist_id = %d
			    GROUP BY date(c_date), media_id, title
			    HAVING SUM(c_play) > 0 
			    ORDER BY sum(c_play) DESC
			) t
			GROUP BY stat_day
			ORDER BY stat_day", $x, $playlist_id), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTopPlayLastXDays($playlist_id, $x, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($playlist_id != '-1'){
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date > NOW() - INTERVAL %d DAY AND playlist_id = %d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $x, $playlist_id, $limit), ARRAY_A);
		}else{
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date > NOW() - INTERVAL %d DAY GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $x, $limit), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTopPlayThisWeek($playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';
		
		if($playlist_id != '-1'){
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE YEARWEEK(`c_date`, 1) = YEARWEEK(CURDATE(), 1) AND playlist_id = %d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
		}else{
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE YEARWEEK(`c_date`, 1) = YEARWEEK(CURDATE(), 1) GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
		}

		return $results;
	}

	function mvp_getTopPlayThisMonth($playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';
		
		if($playlist_id != '-1'){
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date >= DATE_FORMAT(NOW(),'%Y-%m-01') AND playlist_id = %d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
		}else{
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date >= DATE_FORMAT(NOW(),'%Y-%m-01') GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
		}

		return $results;
	}

	function mvp_getTopPlayAllTime($playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($playlist_id != '-1'){
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE playlist_id = %d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
		}else{
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTopDownloadAllTime($playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($playlist_id != '-1'){
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_download) AS total_count FROM {$statistics_table} WHERE playlist_id = %d GROUP BY media_id, title HAVING SUM(c_download) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
		}else{
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_download) AS total_count FROM {$statistics_table} GROUP BY media_id, title HAVING SUM(c_download) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTotalLastXDays($media_id, $title, $x, $data_display){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

	    $str = implode(", ",$data_display);

	    $results = $wpdb->get_results($wpdb->prepare("SELECT {$str}, c_date FROM {$statistics_table} WHERE media_id = %d AND title = %s AND c_date > NOW() - INTERVAL %d DAY ORDER BY c_date", $media_id, $title, $x), ARRAY_A);

		return $results;

	}

	function mvp_getTopFinishAllTime($playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($playlist_id != '-1'){
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_finish) AS total_count FROM {$statistics_table} WHERE playlist_id = %d GROUP BY media_id, title HAVING SUM(c_finish) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
		}else{
			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_finish) AS total_count FROM {$statistics_table} GROUP BY media_id, title HAVING SUM(c_finish) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTopPlaysPerCountryAllTime($playlist_id = null, $player_id = null, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";
	    $statistics_country_table = $wpdb->prefix . "mvp_statistics_country";
	    $statistics_country_play_table = $wpdb->prefix . "mvp_statistics_country_play";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($playlist_id == '-1'){

			$results = $wpdb->get_results($wpdb->prepare("
				SELECT scpt.media_id, scpt.title, scpt.thumb, SUM(scpt.c_play) AS total_count, SUM(scpt.c_time) AS c_time, sct.country, sct.country_code, sct.continent     
				FROM $statistics_country_play_table as scpt 
				LEFT JOIN $statistics_country_table sct on scpt.country_id = sct.id 
				GROUP BY sct.country 
				HAVING SUM(scpt.c_play) > 0 
				ORDER BY total_count $dir 
				LIMIT 0,%d", $limit), ARRAY_A);

		}else if($playlist_id == '-2'){
			
			$results = array();

		}else if($playlist_id != null){
	
			$results = $wpdb->get_results($wpdb->prepare("
				SELECT scpt.media_id, scpt.title, scpt.thumb, SUM(scpt.c_play) AS total_count, SUM(scpt.c_time) AS c_time, sct.country, sct.country_code, sct.continent    
				FROM $statistics_country_play_table as scpt 
				LEFT JOIN $statistics_country_table sct on scpt.country_id = sct.id 
				WHERE playlist_id = %d
				GROUP BY sct.country 
				HAVING SUM(scpt.c_play) > 0 
				ORDER BY total_count $dir 
				LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
		
		}else if($player_id != null){

			$results = $wpdb->get_results($wpdb->prepare("
				SELECT scpt.media_id, scpt.title, scpt.thumb, SUM(scpt.c_play) AS total_count, SUM(scpt.c_time) AS c_time, sct.country, sct.country_code, sct.continent     
				FROM $statistics_country_play_table as scpt 
				LEFT JOIN $statistics_country_table sct on scpt.country_id = sct.id 
				WHERE player_id = %d
				GROUP BY sct.country 
				HAVING SUM(scpt.c_play) > 0 
				ORDER BY total_count $dir 
				LIMIT 0,%d", $player_id, $limit), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTopPlaysPerUserAllTime($playlist_id = null, $player_id = null, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
	    $statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($playlist_id == '-1'){

			$results = $wpdb->get_results($wpdb->prepare("
				SELECT supt.media_id, supt.title, supt.thumb, SUM(supt.c_play) AS total_count, SUM(supt.c_time) AS c_time, sut.user_id, sut.user_display_name, sut.user_role
				FROM $statistics_user_play_table as supt 
				LEFT JOIN $statistics_user_table sut on supt.user_id = sut.id 
				GROUP BY sut.user_id 
				HAVING SUM(supt.c_play) > 0 
				ORDER BY total_count $dir 
				LIMIT 0,%d", $limit), ARRAY_A);

		}else if($playlist_id == '-2'){
			
			$results = array();

		}else if($playlist_id != null){

				$results = $wpdb->get_results($wpdb->prepare("
				SELECT supt.media_id, supt.title, supt.thumb, SUM(supt.c_play) AS total_count, SUM(supt.c_time) AS c_time, sut.user_id, sut.user_display_name, sut.user_role
				FROM $statistics_user_play_table as supt 
				LEFT JOIN $statistics_user_table sut on supt.user_id = sut.id 
				WHERE playlist_id = %d
				GROUP BY sut.user_id 
				HAVING SUM(supt.c_play) > 0 
				ORDER BY total_count $dir 
				LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
		
		}else if($player_id != null){

			$results = $wpdb->get_results($wpdb->prepare("
				SELECT supt.media_id, supt.title, supt.thumb, SUM(supt.c_play) AS total_count, SUM(supt.c_time) AS c_time, sut.user_id, sut.user_display_name, sut.user_role
				FROM $statistics_user_play_table as supt 
				LEFT JOIN $statistics_user_table sut on supt.user_id = sut.id 
				WHERE player_id = %d
				GROUP BY sut.user_id 
				HAVING SUM(supt.c_play) > 0 
				ORDER BY total_count $dir 
				LIMIT 0,%d", $player_id, $limit), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTopPlaysPerUserForVideoAllTime($playlist_id, $media_id, $limit = null){

		global $wpdb;
	    $statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
	    $statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";

		$results;
		$limit = isset($limit) ? $limit : 10;

		$results = $wpdb->get_results($wpdb->prepare("
		SELECT supt.media_id, supt.title, supt.thumb, SUM(supt.c_play) AS total_count, SUM(supt.c_time) AS c_time, sut.user_id, sut.user_display_name, sut.user_role
		FROM $statistics_user_play_table as supt 
		LEFT JOIN $statistics_user_table sut on supt.user_id = sut.id 
		WHERE playlist_id = %d AND media_id = %d
		GROUP BY sut.user_id 
		HAVING SUM(supt.c_play) > 0 
		ORDER BY total_count DESC
		LIMIT 0,%d", $playlist_id, $media_id, $limit), ARRAY_A);
	
		return $results;

	}

	function mvp_getTopPlaysPerUserVideosAllTime($user_id, $limit = null){

		global $wpdb;
	    $statistics_user_table = $wpdb->prefix . "mvp_statistics_user";
	    $statistics_user_play_table = $wpdb->prefix . "mvp_statistics_user_play";

		$results;
		$limit = isset($limit) ? $limit : 10;

		$results = $wpdb->get_results($wpdb->prepare("
		SELECT supt.media_id, supt.title, supt.thumb, SUM(supt.c_play) AS total_count, SUM(supt.c_time) AS c_time, sut.user_id, sut.user_display_name, sut.user_role
		FROM $statistics_user_play_table as supt 
		LEFT JOIN $statistics_user_table sut on supt.user_id = sut.id 
		WHERE sut.user_id = %d
		GROUP BY media_id, title 
		HAVING SUM(supt.c_play) > 0 
		ORDER BY total_count DESC
		LIMIT 0,%d", $user_id, $limit), ARRAY_A);
	
		return $results;

	}

	function mvp_getTotal($playlist_id){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;

		if($playlist_id != '-1'){
			$results = $wpdb->get_row($wpdb->prepare("SELECT SUM(c_play) AS c_play, SUM(c_time) AS c_time, SUM(c_download) AS c_download, SUM(c_finish) AS c_finish FROM {$statistics_table} WHERE playlist_id = %d", $playlist_id), ARRAY_A);
		}else{
			$results = $wpdb->get_row("SELECT SUM(c_play) AS c_play, SUM(c_time) AS c_time, SUM(c_download) AS c_download, SUM(c_finish) AS c_finish FROM {$statistics_table}", ARRAY_A);
		}

		return $results;

	}

	function mvp_getAll($playlist_id = null, $player_id = null, $order = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($order == 'play')$order = 'total_play';
		else if($order == 'time')$order = 'total_time';
		else if($order == 'finish')$order = 'total_finish';
		else if($order == 'download')$order = 'total_download';

		if($playlist_id == '-1'){

			$results = $wpdb->get_results("SELECT media_id, title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} GROUP BY media_id, title ORDER BY $order $dir", ARRAY_A);

		}else if($playlist_id == '-2'){

			$results = $wpdb->get_results("SELECT title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} WHERE media_id IS null GROUP BY title ORDER BY $order $dir", ARRAY_A);

		}else if($playlist_id != null){

			$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} WHERE playlist_id = %d GROUP BY media_id, title ORDER BY $order $dir", $playlist_id), ARRAY_A);
		
		}

		return $results;

	}

	function mvp_getIdsForPlaylistCreation($results){

		$ids = array();
		foreach($results as $key){
			if(!in_array($key['media_id'], $ids)) $ids[] = $key['media_id'];
		}
		$ids = implode("_", $ids);

		return $ids;

	}

?>