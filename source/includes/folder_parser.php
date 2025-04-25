<?php

	header('Content-type: text/xml');

	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

	if($_SERVER['HTTP_HOST'] == "localhost"){
		define('SITE_URL', $protocol . $_SERVER['HTTP_HOST'] . '/');
		define('SITEPATH', $_SERVER['DOCUMENT_ROOT'] . '/');
	}
	else{ 
		define('SITE_URL', $protocol . $_SERVER['HTTP_HOST']);
		define('SITEPATH', $_SERVER['DOCUMENT_ROOT']);
	}

	$dir = $_REQUEST['dir'];
	$type = json_decode(stripslashes($_REQUEST['type']));
	$content_url = isset($_REQUEST['content_url']) ? $_REQUEST['content_url'] : null;
	$limit = $_REQUEST['limit'];
	$requireSubtitlesFromFolder = isset($_REQUEST['requireSubtitlesFromFolder']) ? true : false;
	$content_type = isset($_REQUEST['content_type']) ? $_REQUEST['content_type'] : null;
	
	if(file_exists($dir)==false){
		echo 'Directory \'', $dir, '\' not found!';
	}else if( !is_readable($dir) ) {
		echo 'Directory \'', $dir, '\' is not readable! Check your permissions!';
	}else{
	
		$media = array();
		$subtitles = array();
		$i = 0;

		try {
	        $di = new DirectoryIterator($dir);
	    } catch (Exception $e) {
	        echo json_encode('Error reading folder: ' . $e->getMessage());
	        exit;
	    }

		foreach ($di as $fileinfo) {

			if($content_type){

			    if ($fileinfo->isDir() && !$fileinfo->isDot() && $fileinfo->getFilename() != 'poster' && $fileinfo->getFilename() != 'thumb'){
			        $media[] = getDirContentType($fileinfo->getRealpath(), $content_type);
			    }

			}else{

				$path_info = pathinfo($fileinfo->getPathname());

				if(isset($path_info['extension'])){
					if(in_array(strtolower($path_info['extension']), $type)){
						$fn = $fileinfo->getPathname();

						if(isset($content_url)){
							$fullpath = $content_url."/".$path_info['basename'];
						}else{
							$fullpath = SITE_URL.'/'.path2url(realpath($path_info['dirname'])).'/'.$path_info['basename'];
						}

						$media[] = array( 
							"SITE_URL" => SITE_URL, 
							"SITEPATH" => SITEPATH, 
							"fullpath" => $fullpath,  
							"basename" => $path_info['basename'], 
							"extension" => $path_info['extension'],
							"dirname" => realpath($path_info['dirname']),
							"filename" => $path_info['filename'],
							"filemtime" => filemtime($path_info['dirname'].'/'.$path_info['basename'])
						); 
						$i++;  
						if($i==$limit) break;
					}
				}

			}
			
		}

		//get subs
		if($requireSubtitlesFromFolder){
			$si = new DirectoryIterator($dir.'/subtitles');
			foreach ($si as $fileinfo) {
			    if ($fileinfo->isDir() && !$fileinfo->isDot()) {
			        $subtitles[$fileinfo->getFilename()] = getDirContentSub($fileinfo->getRealpath());
			    }
			}
		}

		//merge with videos
		if(count($subtitles) > 0){
			foreach($media as &$file){
			    if(isset($subtitles[$file['filename']])){
			    	$file['subtitles'] = $subtitles[$file['filename']];
			    }
			}
		}

		echo json_encode($media);
	}

	function getDirContentSub($dir){

		$type = array('srt','vtt');

		$media = array();

		try {
	        $di = new DirectoryIterator($dir);
	    } catch (Exception $e) {
	        echo json_encode('Error reading folder: ' . $e->getMessage());
	        exit;
	    }

		foreach ($di as $fileinfo) {
			$path_info = pathinfo($fileinfo->getPathname());
			if(isset($path_info['extension'])){
				if(in_array(strtolower($path_info['extension']), $type)){

					if(isset($content_url)){
						$fullpath = $content_url."/".$path_info['basename'];
					}else{
						$fullpath = SITE_URL.'/'.path2url(realpath($path_info['dirname'])).'/'.$path_info['basename'];
					}

					$media[] = array( 
						"src" => $fullpath,  
						"extension" => $path_info['extension'],
						"label" => $path_info['filename'],
					); 

				}
			}
			
		}

		return $media;
	}

	function getDirContentType($dir, $ext){

		$type = array($ext);

		try {
	        $di = new DirectoryIterator($dir);
	    } catch (Exception $e) {
	        echo json_encode('Error reading folder: ' . $e->getMessage());
	        exit;
	    }

		foreach ($di as $fileinfo) {
			$path_info = pathinfo($fileinfo->getPathname());
			if(isset($path_info['extension'])){
				if(in_array(strtolower($path_info['extension']), $type)){

					if(isset($content_url)){
						$fullpath = $content_url."/".$path_info['basename'];
					}else{
						$fullpath = SITE_URL.'/'.path2url(realpath($path_info['dirname'])).'/'.$path_info['basename'];
					}

					$media = array( 
						"SITE_URL" => SITE_URL, 
						"SITEPATH" => SITEPATH, 
						"fullpath" => $fullpath,  
						"basename" => $path_info['basename'], 
						"extension" => $path_info['extension'],
						"dirname" => realpath($path_info['dirname']),
						"filename" => $path_info['filename'],
						"filemtime" => filemtime($path_info['dirname'].'/'.$path_info['basename'])
					); 

				}
			}
			
		}

		return $media;
	}


	function path2url($dirname) {
		return str_replace(SITEPATH, '', str_replace('\\', '/', $dirname));
	}

?>
