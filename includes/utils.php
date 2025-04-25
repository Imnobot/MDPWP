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

	function mvp_getAdOptions(&$options, $ad_type, $ad_data){
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

	function mvp_getAnnotationOptions(&$options, $an){
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
		if($an['margin_top'] !== '') $options['margin_top'] = $an['margin_top'];
		if($an['margin_right'] !== '') $options['margin_right'] = $an['margin_right'];
		if($an['margin_bottom'] !== '') $options['margin_bottom'] = $an['margin_bottom'];
		if($an['margin_left'] !== '') $options['margin_left'] = $an['margin_left'];
		if($an['opacity'] !== '') $options['opacity'] = $an['opacity'];
		if($an['adit_class'] !== '') $options['adit_class'] = str_replace('"', "'", stripslashes($an['adit_class']));
		if($an['css'] !== '') $options['css'] = str_replace('"', "'", stripslashes($an['css']));

	}

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
		if($preset == 'flat-light' || $preset == 'flat-dark' || $preset == 'flat-gray') $preset = 'flat';
		if($preset == 'vega') $preset = 'sirius';
		return $preset;
	}

?>