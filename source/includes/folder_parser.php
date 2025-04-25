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
	$content_url = $_REQUEST['content_url'];
	$type = $_REQUEST['type'];
	$limit = $_REQUEST['limit'];
	
	if(file_exists($dir)==false){
		echo 'Directory \'', $dir, '\' not found!';
	}else if( !is_readable($dir) ) {
		echo 'Directory \'', $dir, '\' is not readable! Check your permissions!';
	}else{
	
		$media = array();
		$i = 0;

		$di = new DirectoryIterator($dir);
		foreach ($di as $fileinfo) {
			$path_info = pathinfo($fileinfo->getPathname());
			if(isset($path_info['extension'])){
				if(in_array(strtolower($path_info['extension']), $type)){
					$fn = $fileinfo->getPathname();
					$media[] = array( 
						"SITE_URL" => SITE_URL, 
						"SITEPATH" => SITEPATH, 
						"fullpath" => $content_url."/".$path_info['basename'],
						//"fullpath" => SITE_URL.'/'.path2url_mvp(realpath($path_info['dirname'])).'/'.$path_info['basename'],  
						//"fullpath" => getUrl($_REQUEST['dir'], $path_info),
						"basename" => $path_info['basename'], 
						"extension" => $path_info['extension'],
						"dirname" => realpath($path_info['dirname']),
						"filename" => $path_info['filename']
					); 
					$i++;  
					if($i==$limit) break;
				}
			}
		}

		echo json_encode($media);
	}

	function path2url_mvp($dirname) {
		return str_replace(SITEPATH, '', str_replace('\\', '/', $dirname));
	}

	//Gets the corrected directory name
	function getRealDir($dir)
	{
		$realDir = getFullAbsolutePath(pathinfo($dir));
		$realDir = DIRECTORY_SEPARATOR . $realDir; //Quite odd! The separator was stripped off

		if(file_exists($realDir)==false)
		{
			echo 'Directory \'', $dir, '\' not found!';
			return false;
		}

		if(!is_readable($realDir))
		{
			echo 'Directory \'', $dir, '\' is not readable! Check your permissions!';
			return false;
		}

		return $realDir;
	}


	//Gets the url based on the given path info
	function getUrl($dir, $path_info)
	{
		$scriptFolder = dirname($_SERVER['PHP_SELF']);
		$audioFolder =  $dir;
		$audioFile =  $path_info['basename'];
		$url = $scriptFolder . '/'. $audioFolder . '/' . $audioFile;
		$url = getRealPath($url, '/');
		$url = SITE_URL . '/' . $url;
	    return $url;
	}

	//Gets the real path, but without resolving symbolic links . A replacement for PHP standard function realpath().
	function getRealPath($path, $dirSeperator = DIRECTORY_SEPARATOR)
	{
	    $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
	    $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
	    $absolutes = array();
	    foreach ($parts as $part) {
	        if ('.' == $part) continue;
	        if ('..' == $part) {
	            array_pop($absolutes);
	        } else {
	            $absolutes[] = $part;
	        }
	    }

	    return implode($dirSeperator, $absolutes);
	}

	//Gets the full absolute path based on the given path info
	//Note: Even if the path is correct, jsmediatags cannot read the file, probably because it (also) cannot handle a path containing a symbolic link
	function getFullAbsolutePath($path_info)
	{
	    $fullAbsolutePath = getRealPath(SITEPATH . DIRECTORY_SEPARATOR . dirname($_SERVER['PHP_SELF']) . DIRECTORY_SEPARATOR . $path_info['dirname'] . DIRECTORY_SEPARATOR . $path_info['basename']);
	    return $fullAbsolutePath;
	}

?>
