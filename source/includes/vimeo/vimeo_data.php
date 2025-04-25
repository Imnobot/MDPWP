<?php

$type = $_POST['type'];
$page = isset($_POST['page']) ? $_POST['page'] : null;
$perPage = isset($_POST['perPage']) ? $_POST['perPage'] : null;
$path = isset($_POST['path']) ? $_POST['path'] : null;
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
$sort = isset($_POST['sort']) ? $_POST['sort'] : 'date';
$sortDirection = isset($_POST['sortDirection']) ? $_POST['sortDirection'] : 'asc';
$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
$filter_embeddable = isset($_POST['filter_embeddable']) ? $_POST['filter_embeddable'] : '';
$password = isset($_POST['vpwd']) ? base64_decode($_POST['vpwd']) : null;
$query = isset($_POST['query']) ? $_POST['query'] : null;

$vimeo_key = base64_decode($_POST['vaivk']);
$vimeo_secret = base64_decode($_POST['vaivs']);
$vimeo_token = base64_decode($_POST['vaivt']);

if(empty($vimeo_key)){
	$vimeo_key = "80bddb606ace9d6d9f331c6d89303a1d17e18e18"; 
	$vimeo_secret = "UhVyfik6YRFrHnui0OdTRe7vOQjH1MOhQArApO+q90PkweZOth/28kVoxUVX3pI1HKTYAgz2WDHOI7q5AdSmPg4g3YbPSv2IHteuyOVUU1axSRVR7MJawaYQKC3ncrHf";
	$vimeo_token = "0494c1c544fabda79ea36ae62db3487b";
}

require("autoload.php");
use Vimeo\Vimeo;
$vimeo = new Vimeo($vimeo_key, $vimeo_secret, $vimeo_token);


if($type == 'video_comments'){

	$video_id = $_REQUEST['video_id'];

	//https://developer.vimeo.com/api/playground/videos/{video_id}/comments
	
	$result = $vimeo->request("/videos/$video_id/comments", array(
								'page'=> $page,
								'per_page' => $perPage,
								'fields' => 'link,text,created_on,user.name,user.link,user.account,user.pictures.sizes',
								'direction' => $sortDirection							
								));

}else if($type == 'next_page'){//resume

	$result = $vimeo->request($path);

}else if($type == 'vimeo_channel_info'){

	//https://developer.vimeo.com/api/playground/channels/%7Bchannel_id%7D
	$result = $vimeo->request("/channels/$path", array(
													'fields' => 'uri,name,description,link,created_time,metadata.connections.users.total,metadata.connections.videos.total,user.name,user.link,user.pictures.sizes,user.account,header.sizes'
													));

}else if($type == 'vimeo_channel'){

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,duration,release_time,pictures.sizes',
				 'sort' => $sort);

	if($filter)$arr['filter'] = $filter;
	if($filter_embeddable)$arr['filter_embeddable'] = $filter_embeddable;

	if($query)$arr['query'] = $query;

	if($sort != 'default')$arr['direction'] = $sortDirection;

	//Get a list of videos in a Channel - https://developer.vimeo.com/api/reference/channels#get_channel_videos
	$result = $vimeo->request("/channels/$path/videos", $arr);

}else if($type == 'vimeo_group_info'){

	//https://developer.vimeo.com/api/reference/groups#GET/groups/{group_id}
	$result = $vimeo->request("/groups/$path", array(
													'fields' => 'uri,name,description,link,created_time,metadata.connections.user.total,metadata.connections.users.total,metadata.connections.videos.total,user.name,user.link,user.pictures.sizes,user.account,header.sizes'
													));

}else if($type == 'vimeo_group'){		

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,download,link,duration,release_time,pictures.sizes',
				 'sort' => $sort
				);

	if($filter)$arr['filter'] = $filter;
	if($filter_embeddable)$arr['filter_embeddable'] = $filter_embeddable;	
	if($query)$arr['query'] = $query;

	if($sort != 'default')$arr['direction'] = $sortDirection;															
												
	//Get a list of videos in a Group - https://developer.vimeo.com/api/reference/groups#get_group_videos
	$result = $vimeo->request("/groups/$path/videos", $arr);
	
}else if($type == 'vimeo_user_info'){	
	
	$result = $vimeo->request("/users/$user_id", array(
													'fields' => 'uri,name,bio,location,link,created_time,pictures.sizes,metadata.connections.followers.total,metadata.connections.likes.total,metadata.connections.videos.total'
													));

}else if($type == 'vimeo_user_channels_info'){	

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,pictures.sizes,metadata.connections.videos.total',
				);

	$result = $vimeo->request("/users/$user_id/channels", $arr);

}else if($type == 'vimeo_user_albums_info'){	

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,pictures.sizes,metadata.connections.videos.total',
				);

    $result = $vimeo->request("/users/$user_id/albums", $arr);

}else if($type == 'vimeo_user_groups_info'){	

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,pictures.sizes,metadata.connections.videos.total',
				);

	$result = $vimeo->request("/users/$user_id/groups", $arr);

}else if($type == 'vimeo_user_videos'){	

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,download,link,duration,logo,release_time,pictures.sizes',
				);
	
	$result = $vimeo->request("/users/$user_id/videos", $arr);

}else if($type == 'vimeo_user_album'){	

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,download,link,duration,logo,release_time,pictures.sizes'
				);	

	if($filter)$arr['filter'] = $filter;
	if($filter_embeddable)$arr['filter_embeddable'] = $filter_embeddable;

	if($sort != 'default')$arr['direction'] = $sortDirection;	
	
	//Get the list of videos in an Album - https://developer.vimeo.com/api/reference/showcases#get_album_videos
	$result = $vimeo->request("/users/$user_id/albums/$path/videos", $arr);
	
}else if($type == 'vimeo_album'){	
	//https://stackoverflow.com/questions/27833848/vimeo-api-v3-get-videos-by-album-id

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,download,link,duration,logo,release_time,pictures.sizes',
				 'sort' => $sort
				);	

	if($filter)$arr['filter'] = $filter;
	if($filter_embeddable)$arr['filter_embeddable'] = $filter_embeddable;
	if($query)$arr['query'] = $query;

	if($sort != 'default')$arr['direction'] = $sortDirection;	
	
	//Get the list of videos in an Album - https://developer.vimeo.com/api/playground/users/{user_id}/albums/{album_id}/videos
	$result = $vimeo->request("/albums/$path/videos", $arr);

}else if($type == 'vimeo_video_query'){	
												
	//Search for videos - https://developer.vimeo.com/api/playground/videos
	$arr = array(
			'page'=> $page,
			'per_page' => $perPage,
			'fields' => 'uri,name,description,download,link,duration,release_time,pictures.sizes',
			'sort' => $sort,
			'direction' => $sortDirection,										
			'query' => urlencode($path),
		);

	if($filter)$arr['filter'] = $filter;
	if($filter_embeddable)$arr['filter_embeddable'] = $filter_embeddable;

	$result = $vimeo->request("/videos", $arr);


}else if($type == 'vimeo_single_list'){	
												
	$result = $vimeo->request("/videos", array(
			'page'=> $page,
			'per_page' => $perPage,
			'fields' => 'uri,name,description,download,link,duration,release_time,privacy,pictures.sizes,user.account',
			'uris' => $path,
			));						

}else if($type == 'vimeo_single'){	

	//Get a video - https://developer.vimeo.com/api/playground/videos/{video_id}
	$result = $vimeo->request("/videos/$path", array(
													'fields' => 'uri,name,description,download,link,duration,release_time,pictures.sizes',
													));

}else if($type == 'vimeo_ondemand_info'){


	$result = $vimeo->request("/ondemand/pages/$path", array(
													'fields' => 'uri,name,description,link,created_time,metadata.connections.users.total,metadata.connections.videos.total,metadata.connections.likes.total,user.name,user.link,user.pictures.sizes,user.account,header.sizes'
													));

}else if($type == 'vimeo_ondemand'){	
	//https://stackoverflow.com/questions/59132417/how-to-get-ondemand-ids-for-vimeo-api

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,download,link,duration,logo,release_time,pictures.sizes',
				 'sort' => $sort
				);	

	if($filter)$arr['filter'] = $filter;
	if($filter_embeddable)$arr['filter_embeddable'] = $filter_embeddable;

	if($query)$arr['query'] = $query;

	if($sort != 'default')$arr['direction'] = $sortDirection;	
	
	$result = $vimeo->request("/ondemand/pages/$path/videos", $arr);

}else if($type == 'vimeo_folder'){	

	$arr = array('page'=> $page,
				 'per_page' => $perPage,
				 'fields' => 'uri,name,description,download,link,duration,logo,release_time,pictures.sizes',
				 'sort' => $sort,
				);	

	if($sort != 'default')$arr['direction'] = $sortDirection;	
	
	$result = $vimeo->request("/users/$user_id/projects/$path/videos", $arr);

}


echo json_encode($result);
exit;


?>