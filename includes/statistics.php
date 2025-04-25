<?php

	function mvp_getTopPlayToday($user_id, $playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($user_id != null){

			if($playlist_id != '-1'){

				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, c_play AS total_count FROM {$statistics_table} WHERE c_date=CURDATE() AND playlist_id=%d AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $user_id, $limit), ARRAY_A);
			
			}
			else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, c_play AS total_count FROM {$statistics_table} WHERE c_date=CURDATE() AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $user_id, $limit), ARRAY_A);
			}

		}else{

			if($playlist_id != '-1'){

				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, c_play AS total_count FROM {$statistics_table} WHERE c_date=CURDATE() AND playlist_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
			
			}
			else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, c_play AS total_count FROM {$statistics_table} WHERE c_date=CURDATE() GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
			}	
		}

		return $results;

	}

	function mvp_getTopPlayLastXDaysTotal($user_id, $playlist_id = null, $x = null, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($user_id != null){

			if($playlist_id == '-1'){

				$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
				FROM (
				    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
				    FROM {$statistics_table} 
				    WHERE c_date > NOW() - INTERVAL %d DAY AND user_id=%d
				    GROUP BY date(c_date), media_id, title
				    HAVING SUM(c_play) > 0 
				    ORDER BY sum(c_play) DESC
				) t
				GROUP BY stat_day
				ORDER BY stat_day", $x, $user_id), ARRAY_A);

			}
			else{

				$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
				FROM (
				    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
				    FROM {$statistics_table} 
				    WHERE c_date > NOW() - INTERVAL %d DAY AND playlist_id=%d  AND user_id=%d
				    GROUP BY date(c_date), media_id, title
				    HAVING SUM(c_play) > 0 
				    ORDER BY sum(c_play) DESC
				) t
				GROUP BY stat_day
				ORDER BY stat_day", $x, $playlist_id, $user_id), ARRAY_A);
			}

		}else{

			if($playlist_id == '-1'){

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
				    WHERE c_date > NOW() - INTERVAL %d DAY AND playlist_id=%d
				    GROUP BY date(c_date), media_id, title
				    HAVING SUM(c_play) > 0 
				) t
				GROUP BY stat_day
				ORDER BY stat_day", $x, $playlist_id), ARRAY_A);*/

				$results = $wpdb->get_results($wpdb->prepare("SELECT stat_day, sum(total_count) as total_count
				FROM (
				    SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count 
				    FROM {$statistics_table} 
				    WHERE c_date > NOW() - INTERVAL %d DAY AND playlist_id=%d
				    GROUP BY date(c_date), media_id, title
				    HAVING SUM(c_play) > 0 
				    ORDER BY sum(c_play) DESC
				) t
				GROUP BY stat_day
				ORDER BY stat_day", $x, $playlist_id), ARRAY_A);
			}

		}

		return $results;

	}

	function mvp_getTopPlayLastXDays($user_id, $playlist_id, $x, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($user_id != null){

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date > NOW() - INTERVAL %d DAY AND playlist_id=%d AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $x, $playlist_id, $user_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date > NOW() - INTERVAL %d DAY AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $x, $user_id, $limit), ARRAY_A);
			}

		}else{

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date > NOW() - INTERVAL %d DAY AND playlist_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $x, $playlist_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date > NOW() - INTERVAL %d DAY GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $x, $limit), ARRAY_A);
			}

		}

		return $results;

	}

	function mvp_getTopPlayThisWeek($user_id, $playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($user_id != null){
		
			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE YEARWEEK(`c_date`, 1) = YEARWEEK(CURDATE(), 1) AND playlist_id=%d AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $user_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE YEARWEEK(`c_date`, 1) = YEARWEEK(CURDATE(), 1) AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $user_id, $limit), ARRAY_A);
			}

		}else{

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE YEARWEEK(`c_date`, 1) = YEARWEEK(CURDATE(), 1) AND playlist_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE YEARWEEK(`c_date`, 1) = YEARWEEK(CURDATE(), 1) GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
			}

		}

		return $results;
	}

	function mvp_getTopPlayThisMonth($user_id, $playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($user_id != null){
		
			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date >= DATE_FORMAT(NOW(),'%Y-%m-01') AND playlist_id=%d AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $user_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date >= DATE_FORMAT(NOW(),'%Y-%m-01') AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $user_id, $limit), ARRAY_A);
			}

		}else{

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date >= DATE_FORMAT(NOW(),'%Y-%m-01') AND playlist_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE c_date >= DATE_FORMAT(NOW(),'%Y-%m-01') GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
			}

		}

		return $results;
	}

	function mvp_getTopPlayAllTime($user_id, $playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($user_id != null){

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE playlist_id=%d AND user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $user_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE user_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $user_id, $limit), ARRAY_A);
			}

		}else{

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} WHERE playlist_id=%d GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_count FROM {$statistics_table} GROUP BY media_id, title HAVING SUM(c_play) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
			}
		}

		return $results;

	}

	function mvp_getTopDownloadAllTime($user_id, $playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($user_id != null){

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_download) AS total_count FROM {$statistics_table} WHERE playlist_id=%d AND user_id=%d GROUP BY media_id, title HAVING SUM(c_download) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $user_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_download) AS total_count FROM {$statistics_table} WHERE user_id=%d GROUP BY media_id, title HAVING SUM(c_download) > 0 ORDER BY total_count $dir LIMIT 0,%d", $user_id, $limit), ARRAY_A);
			}

		}else{

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_download) AS total_count FROM {$statistics_table} WHERE playlist_id=%d GROUP BY media_id, title HAVING SUM(c_download) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_download) AS total_count FROM {$statistics_table} GROUP BY media_id, title HAVING SUM(c_download) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
			}

		}

		return $results;

	}

	function mvp_getTotalLastXDays($user_id, $media_id, $title, $x, $data_display){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

	    $str = implode(", ",$data_display);

	    if($user_id != null){

		    $results = $wpdb->get_results($wpdb->prepare("SELECT {$str}, c_date FROM {$statistics_table} WHERE media_id = %d AND title = %s AND c_date > NOW() - INTERVAL %d DAY AND user_id=%d ORDER BY c_date", $media_id, $title, $user_id, $x), ARRAY_A);

		}else{

			 $results = $wpdb->get_results($wpdb->prepare("SELECT {$str}, c_date FROM {$statistics_table} WHERE media_id = %d AND title = %s AND c_date > NOW() - INTERVAL %d DAY ORDER BY c_date", $media_id, $title, $x), ARRAY_A);
		}

		return $results;

	}

	function mvp_getTopFinishAllTime($user_id, $playlist_id, $limit = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		if($user_id != null){

			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_finish) AS total_count FROM {$statistics_table} WHERE playlist_id=%d AND user_id=%d GROUP BY media_id, title HAVING SUM(c_finish) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $user_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_finish) AS total_count FROM {$statistics_table} WHERE user_id=%d GROUP BY media_id, title HAVING SUM(c_finish) > 0 ORDER BY total_count $dir LIMIT 0,%d", $user_id, $limit), ARRAY_A);
			}

		}else{
			
			if($playlist_id != '-1'){
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_finish) AS total_count FROM {$statistics_table} WHERE playlist_id=%d GROUP BY media_id, title HAVING SUM(c_finish) > 0 ORDER BY total_count $dir LIMIT 0,%d", $playlist_id, $limit), ARRAY_A);
			}else{
				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_finish) AS total_count FROM {$statistics_table} GROUP BY media_id, title HAVING SUM(c_finish) > 0 ORDER BY total_count $dir LIMIT 0,%d", $limit), ARRAY_A);
			}

		}

		return $results;

	}

	function mvp_getTotal($user_id, $playlist_id){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;

		if($user_id != null){

			if($playlist_id != '-1'){
				$results = $wpdb->get_row($wpdb->prepare("SELECT SUM(c_play) AS c_play, SUM(c_time) AS c_time, SUM(c_download) AS c_download, SUM(c_finish) AS c_finish FROM {$statistics_table} WHERE playlist_id=%d AND user_id=%d", $playlist_id, $user_id), ARRAY_A);
			}else{
				$results = $wpdb->get_row($wpdb->prepare("SELECT SUM(c_play) AS c_play, SUM(c_time) AS c_time, SUM(c_download) AS c_download, SUM(c_finish) AS c_finish FROM {$statistics_table} WHERE user_id=%d", $user_id), ARRAY_A);
			}

		}else{

			if($playlist_id != '-1'){
				$results = $wpdb->get_row($wpdb->prepare("SELECT SUM(c_play) AS c_play, SUM(c_time) AS c_time, SUM(c_download) AS c_download, SUM(c_finish) AS c_finish FROM {$statistics_table} WHERE playlist_id=%d", $playlist_id), ARRAY_A);
			}else{
				$results = $wpdb->get_row("SELECT SUM(c_play) AS c_play, SUM(c_time) AS c_time, SUM(c_download) AS c_download, SUM(c_finish) AS c_finish FROM {$statistics_table}", ARRAY_A);
			}

		}

		return $results;

	}

	function mvp_getAll($user_id, $playlist_id = null, $dir = null){

		global $wpdb;
	    $statistics_table = $wpdb->prefix . "mvp_statistics";

		$results;
		$limit = isset($limit) ? $limit : 10;
		$dir = isset($dir) ? strtoupper($dir) : 'DESC';
		if(!($dir == 'DESC' || $dir == 'ASC'))$dir = 'DESC';

		$order = 'play';
		if($order == 'play')$order = 'total_play';
		else if($order == 'time')$order = 'total_time';
		else if($order == 'finish')$order = 'total_finish';
		else if($order == 'download')$order = 'total_download';

		if($user_id != null){

			if($playlist_id == '-1'){

				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} WHERE user_id=%d GROUP BY media_id, title ORDER BY $order $dir", $user_id), ARRAY_A);

			}else if($playlist_id == '-2'){

				$results = $wpdb->get_results($wpdb->prepare("SELECT title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} WHERE media_id IS null AND user_id=%d GROUP BY title ORDER BY $order $dir", $user_id), ARRAY_A);

			}else if($playlist_id != null){

				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} WHERE playlist_id=%d AND user_id=%d GROUP BY media_id, title ORDER BY $order $dir", $playlist_id, $user_id), ARRAY_A);
			
			}

		}else{

			if($playlist_id == '-1'){

				$results = $wpdb->get_results("SELECT media_id, title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} GROUP BY media_id, title ORDER BY $order $dir", ARRAY_A);

			}else if($playlist_id == '-2'){

				$results = $wpdb->get_results("SELECT title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} WHERE media_id IS null GROUP BY title ORDER BY $order $dir", ARRAY_A);

			}else if($playlist_id != null){

				$results = $wpdb->get_results($wpdb->prepare("SELECT media_id, title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$statistics_table} WHERE playlist_id=%d GROUP BY media_id, title ORDER BY $order $dir", $playlist_id), ARRAY_A);
			
			}

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