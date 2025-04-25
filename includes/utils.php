<?php 

	function mvp_intToBool($value) {
	    return empty($value) ? 'false' : 'true';
	}

	function mvp_nullOrEmpty($v){
	    return (!isset($v) || trim($v)==='');
	}

	function mvp_compressCss($buffer){
		/* remove comments */
		$buffer = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $buffer) ;
		/* remove tabs, spaces, newlines, etc. */
		$arr = array("\r\n", "\r", "\n", "\t", "  ", "    ", "    ");
		$rep = array("", "", "", "", " ", " ", " ");
		$buffer = str_replace($arr, $rep, $buffer);
		$buffer = str_replace('"', "'", $buffer);
		/* remove whitespaces around {}:, */
		$buffer = preg_replace("/\s*([\{\}:,])\s*/", "$1", $buffer);
		/* remove last ; */
		$buffer = str_replace(';}', "}", $buffer);
		
		return $buffer;
	}

	function mvp_underscoreToCamelCase($string, $capitalizeFirstCharacter = false){
	    $str = str_replace('_', '', ucwords($string, '_'));
	    if (!$capitalizeFirstCharacter) {
	        $str = lcfirst($str);
	    }
	    return $str;
	}

	function mvp_removeSlashes($string){
	    $string = implode("",explode("\\",$string));
	    return stripslashes(trim($string));
	}

	function mvp_startsWith($haystack, $needle){
        $length = strlen($needle);
        if(substr($haystack, 0, $length) === $needle)return substr($haystack, 0, $length);
        else return $haystack;
	}

	function mvp_shuffleArray(&$data, $value){

	    $sub = array();
	    $index = 0;
	    $len = 0;
	    $start;
	    foreach($data as $row){
	        if($row['ad_type'] == $value){
	            if(!isset($start))$start = $index;
	            $len++;
	        }
	        $index++;
	    }

	    $sub = array_splice($data, $start, $len);
	    shuffle($sub);
	    array_splice($data, $start, 0, $sub);

	}

	function mvp_convertTime($time){
	    if ($time < 60) {
	        return $time.' sec';
	    } else if ($time >= 60 && $time < 3600) {
			$min = date("i", mktime(0, 0, $time));
	    	$sec = date("s", mktime(0, 0, $time));
			if($min < 10){
				$min = substr($min, -1);
			}
	        return $min.'.'.$sec.' min';
	    } else if ($time >= 3600 && $time < 86400) {
			$hour = date("H", mktime(0, 0, $time));
			$min = date("i", mktime(0, 0, $time));
			if($hour < 10){
				$hour = substr($hour, -1);
			}
	        return $hour.'.'.$min.' hr';
	    } else if ($time >= 86400 && $time) {
			$day = date("j", mktime(0, 0, $time, 0, 0));
			if($day < 10){
				$day = substr($day, -1);
			}
	        return '~'.$day.' days';
	    }
	}

	function mvp_convertCount($num){
		if($num == NULL)return '0';
	    if($num < 1000){
	        return $num;
	    } else {
	        return round(($num / 1000), 2).' K';
	    }
	} 

	/*function mvp_getAdOptions(&$options, $ad_type, $ad_data){//not used any more
		//called from edit_playlist.php and ad_manager.php

		$options['ad_type'] = $ad_type;
		$options['type'] = $ad_data['type'];
		$options['path'] = str_replace('"', "'", stripslashes($ad_data['path']));
		$options['is360'] = $ad_data['is360'];
		if(isset($ad_data['duration']))$options['duration'] = $ad_data['duration'];
		if(isset($ad_data['begin']))$options['begin'] = $ad_data['begin'];
		if($ad_data['poster'] !== '') $options['poster'] = str_replace('"', "'", stripslashes($ad_data['poster']));
		if($ad_data['skip_enable'] !== '') $options['skip_enable'] = $ad_data['skip_enable'];
		if($ad_data['link'] !== ''){
			$options['link'] = str_replace('"', "'", stripslashes($ad_data['link']));
			$options['target'] = $ad_data['target'];
		} 
	}

	function mvp_getAnnotationOptions(&$options, $an){//
		//called from edit_playlist.php and ad_manager.php

		$type = $an['type'];

		if($type == 'html' || $type == 'shortcode')$path = $an['path_ta'] !== '' ? str_replace('"', "'", stripslashes($an['path_ta'])) : NULL;
		else $path = $an['path'] !== '' ? str_replace('"', "'", stripslashes($an['path'])) : NULL;

		$options['type'] = $type;
		$options['path'] = $path;
		if($an['adsense_code'] !== '') $options['adsense_code'] = str_replace('"', "'",stripslashes( $an['adsense_code']));
		if($an['adsense_client'] !== '') $options['adsense_client'] = str_replace('"', "'", stripslashes($an['adsense_client']));
		if($an['adsense_slot'] !== '') $options['adsense_slot'] = str_replace('"', "'", stripslashes($an['adsense_slot']));
		if($an['width'] !== '') $options['width'] = $an['width'];
		if($an['height'] !== '') $options['height'] = $an['height'];
		if($an['show_time'] !== '') $options['show_time'] = $an['show_time'];
	    if($an['hide_time'] !== '') $options['hide_time'] = $an['hide_time'];
	    if($an['link'] !== ''){
	    	$options['link'] = str_replace('"', "'", stripslashes($an['link']));
			$options['target'] = $an['target'];
			if($an['rel'] !== '') $options['rel'] = str_replace('"', "'", stripslashes($an['rel']));
	    }
		$options['close_btn'] = $an['close_btn'];
		$options['close_btn_position'] = $an['close_btn_position'];
		$options['position'] = $an['position'];
		if($an['adit_class'] !== '') $options['adit_class'] = str_replace('"', "'", stripslashes($an['adit_class']));
		if($an['css'] !== '') $options['css'] = str_replace('"', "'", stripslashes($an['css']));

	}*/

	function mvp_get_editable_roles() {
	    global $wp_roles;

	    $all_roles = $wp_roles->roles;
	    $editable_roles = apply_filters('editable_roles', $all_roles);

	    return $editable_roles;
	}

	function mvp_get_current_user_roles() {
		if( is_user_logged_in() ) {
		    $user = wp_get_current_user();
		    $roles = ( array ) $user->roles;
		    return $roles; 
		} else {
		    return "";
		}
	}

	function mvp_strpos($haystack, $needle, $offset=0) {
	    if(!is_array($needle)) $needle = array($needle);
	    foreach($needle as $query) {
	        if(strpos($haystack, $query, $offset) !== false) return true; 
	    }
	    return false;
	}

	function mvp_getMasornyWidth($gutter, $number_of_cols){

		$column_width = 100 / $number_of_cols; //a float value, e.g. 33.33333333 in this example
		$item_width_diff = $gutter * ($number_of_cols - 1) / $number_of_cols; //in this example: 10*2/3 = 6.6666666
		if($item_width_diff < 0) $item_width_diff = 0;
		return $item_width_diff;
	}

	function mvp_checkPreset($preset){
		if($preset == 'flat-light' || $preset == 'flat-dark' || $preset == 'flat-gray') $preset = 'aviva';
		else if($preset == 'vega') $preset = 'sirius';
		else if($preset == 'grid1' || $preset == 'list1' || $preset == 'list2') $preset = 'aviva';

		if(!($preset == 'sirius' || $preset == 'aviva' || $preset == 'pollux'))$preset = 'aviva';

		return $preset;
	}

	function mvp_checkUserLimit($settings, $user){
		$userLimit = null;
		foreach ($settings['userLimit'] as $k => $v) {
			if(in_array($k, $user->roles)){
				$userLimit = $v;
				break;
			}
		}
		if($userLimit == null){
			if(isset($settings['userLimit']) && isset($settings['userLimit'][0]) && isset($settings['userLimit'][0]['default'])){
				$userLimit = $settings['userLimit'][0]['default'];
			}
		}
		return $userLimit;
	}

	function mvp_isAdmin($user){
		if(in_array('administrator', (array) $user->roles) || current_user_can( 'setup_network' ))return true;
		else return false;
	}

	function mvp_timezone_list() {
	    static $timezones = null;
	    
	    if ($timezones === null) {
	        $timezones = [];
	        $offsets = [];
	        $now = new DateTime('now', new DateTimeZone('UTC'));
	        
	        foreach (DateTimeZone::listIdentifiers() as $timezone) {
	            $now->setTimezone(new DateTimeZone($timezone));
	            $offsets[] = $offset = $now->getOffset();
	            $timezones[$timezone] = '(' . mvp_format_GMT_offset($offset) . ') ' . mvp_format_timezone_name($timezone);
	        }
	        
	        array_multisort($offsets, $timezones);
	    }
	    
	    return $timezones;
	}

	function mvp_format_GMT_offset($offset) {
	    $hours = intval($offset / 3600);
	    $minutes = abs(intval($offset % 3600 / 60));
	    return 'GMT' . ($offset!==false ? sprintf('%+03d:%02d', $hours, $minutes) : '');
	}

	function mvp_format_timezone_name($name) {
	    $name = str_replace('/', ', ', $name);
	    $name = str_replace('_', ' ', $name);
	    $name = str_replace('St ', 'St. ', $name);
	    return $name;
	}

	function mvp_checkDatePeriod($when, $now1, $timeZone){

		$now = new DateTime("now");
        $now->settime(0,0);//exclude time for comparison
        $timeZone = $now->getTimezone();

		if(isset($when['start_date']) && isset($when['end_date'])){
			$start_date = new DateTime($when['start_date'], $timeZone);
			$end_date = new DateTime($when['end_date'], $timeZone);

			if($now < $start_date || $now > $end_date){
				return false;
			}
			
		}
		else if(isset($when['start_date'])){
			$start_date = new DateTime($when['start_date'], $timeZone);

			if($now < $start_date){
				return false;
			}
		}
		else if(isset($when['end_date'])){
			$end_date = new DateTime($when['end_date'], $timeZone);

			if($now > $end_date){
				return false;
			}
		}

		return true;

	}

	function mvp_get_lang_arr(){

		return array(   
		    'ar' => 'العربية - Arabic',
		    'bg' => 'български - Bulgarian',
		    'cs' => 'Čeština - Czech',
		    'da' => 'Dansk - Danish',
		    'de' => 'Deutsch - German',
		    'el' => 'Ελληνικά - Greek',
		    'en' => 'English',
		    'es' => 'Español - Spanish',
		    'et' => 'Eesti Keel - Estonian',
		    'fa' => 'فارسی - Persian',
		    'fr' => 'Français - French',
		    'fil' => 'Filipino - Filipino',
		    'fi' => 'Suomen Kieli - Finnish',
		    'he' => 'עִברִית - Hebrew',
		    'hi' => 'हिंदी - Hindi',
		    'hr' => 'Hrvatski - Croatian',
		    'hu' => 'Magyar - Hungarian',
		    'id' => 'Bahasa Indonesia - Indonesian',
		    'it' => 'Italiano - Italian',
		    'ja' => '日本語 - Japanese',
		    'ko' => '한국어 - Korean',
		    'lv' => 'Latviski - Latvian',
		    'lt' => 'Lietuvių - Lithuanian',
		    'nl' => 'Nederlands - Dutch',
		    'no' => 'Norsk - Norwegian',
		    'pl' => 'Polski - Polish',
		    'pt' => 'Português - Portuguese',
		    'ro' => 'Română - Romanian',
		    'ru' => 'Русский - Russian',
		    'sk' => 'Slovenský - Slovak',
		    'sl' => 'Slovenščina - Slovenian',
		    'sq' => 'Shqip - Albanian',
		    'sv' => 'Svenska - Swedish',
		    'tg' => 'Тоҷикӣ - Tajik',
		    'th' => 'ไทย - Thai',
		    'tr' => 'Türkçe - Turkish',
		    'uk' => 'Yкраїнська - Ukrainian',
		    'vi' => 'Tiếng Việt - Vietnamese',
		    'zh-CN' => '简体中文 - Chinese Simplified',
		    'zh-HK' => '繁體中文（香港) - Chinese Traditional zh_HK',
		    'zh-TW' => '繁體中文（台灣) - Chinese Traditional zh_TW',
		);

	}

?>