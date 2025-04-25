<?php 






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

$user = wp_get_current_user();

if(!current_user_can($capability)){
    exit();
}





//load players
$players = $wpdb->get_results("SELECT id, title FROM {$player_table} ORDER BY title ASC", ARRAY_A);

if(isset($_GET['mvp_msg'])){
	$msg = $_GET['mvp_msg'];
	if($msg == 'playlist_created')$msg = esc_html__('Playlist created!', MVP_TEXTDOMAIN);
}else{
	$msg = null;
}

if(isset($_GET['playlist_id'])){//load media

	$playlist_id = $_GET['playlist_id'];

    $is_admin = mvp_isAdmin($user);

	//playlist data
	$playlist_data = $wpdb->get_row($wpdb->prepare("SELECT title, user_id, options FROM {$playlist_table} WHERE id = %d", $playlist_id), ARRAY_A);

	
	if(!$is_admin){
		if(!$playlist_data)exit();
		//prevent direct url enter to view playlist 
		$user_id = $playlist_data['user_id'];
		if(isset($user_id)){
			if(intval($user_id) != intval($user->ID)){
				exit();
			}
		}else{
			//old playlists dont have user id!
			exit();
		}
	}




	$user_media_created = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$media_table} WHERE playlist_id=%d AND user_id=%d", $playlist_id, $user->ID));

	$userLimit = mvp_checkUserLimit($settings, $user);

	$userData = array('is_admin' => $is_admin, 'user_id' => $user->ID, 'limit' => $userLimit, 'video_created' => intval($user_media_created));



	if($settings['trackPlaylistEdit'] == '1'){
		//check who is editing playlist
		$edit_data = $wpdb->get_row($wpdb->prepare("SELECT id, is_edit, edit_user_id FROM {$playlist_table} WHERE id=%d", $playlist_id), ARRAY_A);

		if($is_admin){
			if($edit_data['is_edit'] == '1' && $edit_data['edit_user_id'] != $user->ID){
				exit(printf(__('User #%s is editing this playlist!', MVP_TEXTDOMAIN), $edit_data['edit_user_id']));
			}
		}else{
			if($edit_data['is_edit'] == '1' && $edit_data['edit_user_id'] != $user->ID){
				exit(__('Admin is editing this playlist!', MVP_TEXTDOMAIN));
			}
		}
	}


	$default_playlist_options = mvp_playlist_options();
	if($playlist_data['options']){
		$pl_options = unserialize($playlist_data['options']);
		$playlist_options = $pl_options + $default_playlist_options;
	}else{
		$playlist_options = $default_playlist_options;
	}



	//media

	$stmt = $wpdb->prepare("SELECT * FROM $media_table WHERE playlist_id = %d ORDER BY order_id ASC", $playlist_id);
	$medias = $wpdb->get_results($stmt, ARRAY_A);


	$singleMediaSourcesArr = array('audio', 'video', 'image', 'youtube_single', 'vimeo_single', 'hls', 'dash');




}

?>

<script type="text/javascript">
    var mvp_userData = <?php echo(json_encode($userData, JSON_HEX_TAG)); ?>;
</script>

<div class="wrap">

	<?php include("playeri.php"); ?>

	<div class="mvp-settings-wrap-panel aptenv-ready">
	<div id="mvp-playlist-manager-section">

	<?php include("notice.php"); ?>

	<h2><?php esc_html_e('Edit playlist', MVP_TEXTDOMAIN); ?> <span style="color:#FF0000; font-weight:bold;"><?php echo($playlist_data['title']); echo(' - ID #' . $playlist_id); ?></span></h2>

	<div class="mvp-admin" data-playlist-id="<?php echo($playlist_id); ?>">

		<form id="mvp-edit-playlist-form" method="post" enctype="multipart/form-data" action="<?php echo admin_url("admin.php?page=mvp_playlist_manager&action=edit_playlist&playlist_id=".$playlist_id); ?>">

		<div class="option-tab">

		    <div class="option-toggle">
		        <span class="option-title"><?php esc_html_e('Playlist options', MVP_TEXTDOMAIN); ?></span>

		        <div class="option-toggle-icon">
	                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
	            </div>
		    </div>

		    <div class="option-content">

			    <div id="mvp-playlist-options-tabs">

				    <ul class="mvp-tab-header">
				        <li id="mvp-tab-playlist-options-general"><?php esc_html_e('General', MVP_TEXTDOMAIN); ?></li>
				        <li id="mvp-tab-playlist-options-global"><?php esc_html_e('Global options', MVP_TEXTDOMAIN); ?></li>
				        <li id="mvp-tab-playlist-options-maintenance"><?php esc_html_e('Maintenance', MVP_TEXTDOMAIN); ?></li>
				        <li id="mvp-tab-playlist-options-advanced"><?php esc_html_e('Advanced', MVP_TEXTDOMAIN); ?></li>
				    </ul>

				    <div id="mvp-tab-playlist-options-general-content" class="mvp-tab-content">

				    	<table class="form-table" >

				    		<tr valign="top">
								<th><?php esc_html_e('Playlist thumbnail', MVP_TEXTDOMAIN); ?></th>
								<td>
									<img id="pl_thumb_preview" class="mvp-img-preview" src="<?php echo (isset($playlist_options['thumb']) ? esc_html($playlist_options['thumb']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt="">
									<input type="text" id="pl_thumb" name="thumb" value="<?php echo ($playlist_options['thumb']); ?>"> or
									<button id="pl_thumb_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
	                    			<button id="pl_thumb_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button> 
									<p class="info"><?php esc_html_e('Set playlist thumbnail which describes this playlist.', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th><?php esc_html_e('Playlist description', MVP_TEXTDOMAIN); ?></th>
								<td>
									<textarea id="pl_description" name="description" rows="3" ><?php echo (isset($playlist_options['description']) ? $playlist_options['description'] : ''); ?></textarea>
								</td>
							</tr>

					    </table>

					</div>

					<div id="mvp-tab-playlist-options-global-content" class="mvp-tab-content">

				    	<p><?php esc_html_e('Global playlist options will be applied to every media in playlist.', MVP_TEXTDOMAIN); ?></p>

				    	<table class="form-table" >
		            
							<tr valign="top">
		                        <th><?php esc_html_e('Password protected content', MVP_TEXTDOMAIN); ?></th>
		                        <td>
		                            <input type="text" name="pwd" placeholder="" value="<?php echo ($playlist_options['pwd']); ?>">
		                            <p class="info"><?php esc_html_e('Enter password to view videos in this playlist.', MVP_TEXTDOMAIN); ?></p>
		                        </td>
		                    </tr>

		                    <tr>
								<th><?php esc_html_e('Encrypt media paths', MVP_TEXTDOMAIN); ?></th>
								<td>
									<select name="encryptMediaPaths">
				                        <option value="0" <?php if(isset($playlist_options['encryptMediaPaths']) && $playlist_options['encryptMediaPaths'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
				                        <option value="1" <?php if(isset($playlist_options['encryptMediaPaths']) && $playlist_options['encryptMediaPaths'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
				                    </select><br>
				                    <span class="info"><?php esc_html_e('Hide video and subtitle urls from page source with encryption.', MVP_TEXTDOMAIN); ?></span>
								</td>
							</tr>

				            <tr valign="top">
								<th><?php esc_html_e('Start time', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="number" name="start" min="0" step="1" value="<?php echo ($playlist_options['start']); ?>">
									<p class="info"><?php esc_html_e('Enter media start time in seconds.', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>
							<tr valign="top">
								<th><?php esc_html_e('End time', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="number" name="end" min="0" step="1" value="<?php echo ($playlist_options['end']); ?>">
									<p class="info"><?php esc_html_e('Enter media end time in seconds.', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>
							<tr valign="top">
								<th><?php esc_html_e('Playback rate', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="number" name="playbackRate" step="0.1" value="<?php echo ($playlist_options['playbackRate']); ?>">
								</td>
							</tr>

							<tr valign="top" class="pl_field_wrap">
								<th><?php esc_html_e('Seekbar preview thumbnail', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="text" id="pl_preview_seek" name="pl_preview_seek" class="pl_field_val" value="<?php echo ($playlist_options['pl_preview_seek']); ?>">
						            <button type="button" id="pl_preview_seek_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
						            <p class="info"><?php esc_html_e('Enable thumbnail preview when seeking. Enter "auto" for automatic thumbnails (only for HTML5 video) or provide vtt file with time/image data (for all media types).', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>

							<tr valign="top" id="pl_vast_field">
								<th><?php esc_html_e('Vast url', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="text" name="vast" id="vast" value="<?php echo ($playlist_options['vast']); ?>">
									<button type="button" id="pl_vast_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
									<p class="info"><?php esc_html_e('Add vast url (VAST / VMAP / IMA / VPAID)', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>

							<tr valign="top">
						        <th><?php esc_html_e('Loop vast (play only VAST file)', MVP_TEXTDOMAIN); ?></th>
						        <td>
						            <select id="vast_loop" name="vast_loop">
						                <option value="0" <?php if(isset($playlist_options['vast_loop']) && $playlist_options['vast_loop'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
						                <option value="1" <?php if(isset($playlist_options['vast_loop']) && $playlist_options['vast_loop'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
						            </select>
						            <p class="info"><?php esc_html_e('Only for VAST with pre adverts! Use this is you have VAST with pre adverts and you just want to loop VAST without having any other videos in playlist.', MVP_TEXTDOMAIN); ?></p>
						        </td>
						    </tr>

							<?php if ($is_admin) : ?>

							<tr valign="top">
		                        <th><?php esc_html_e('Lock video time', MVP_TEXTDOMAIN); ?></th>
		                        <td>
		                            <input type="number" min="0" step="1" name="lockTime" value="<?php echo ($playlist_options['lockTime']); ?>">
		                            <p class="info"><?php esc_html_e('Lock video for logged in users. Enter time in seconds (0 means video is locked from beginning).', MVP_TEXTDOMAIN); ?></p>
		                        </td>
		                    </tr>

		                    <tr valign="top" id="lockVideoUserRoles_field">
					            <th><?php esc_html_e('Select user role which is able to access video', MVP_TEXTDOMAIN); ?></th>
					            <td>
					                <div class="item-content-list">

					                    <?php 
					                    $userRoles = mvp_get_editable_roles();

					                    foreach ($userRoles as $key => $value) : ?>
					                        <label class="container">
					                            <input type="checkbox" name="lockVideoUserRoles[]" value="<?php echo($key); ?>" <?php if(in_array($key, $playlist_options['lockVideoUserRoles'])) echo 'checked' ?>><?php echo($value["name"]); ?>
					                        </label><br>
					                    <?php endforeach; ?>

					                    <p class="info"><?php esc_html_e('Only selected user roles can view video without restriction. If no user roles selected everybody can access video. Valid only if Lock video time is set.', MVP_TEXTDOMAIN); ?></p>

					                </div>
					            </td>
					        </tr>

					        <tr valign="top">
		                        <th><?php esc_html_e('Lock video time for non logged in', MVP_TEXTDOMAIN); ?></th>
		                        <td>
		                            <input type="number" min="0" step="1" name="lockTime2" value="<?php echo ($playlist_options['lockTime2']); ?>">
		                            <p class="info"><?php esc_html_e('Lock video from users who are not logged in. Enter time in seconds (0 means video is locked from beginning).', MVP_TEXTDOMAIN); ?></p>
		                        </td>
		                    </tr>

		                    <?php endif; ?>

						</table>

					</div>	

					<div id="mvp-tab-playlist-options-maintenance-content" class="mvp-tab-content">

				    	<table class="form-table" >

							<tr valign="top">
				                <th><?php esc_html_e('Clear watched percentage', MVP_TEXTDOMAIN); ?></th>
				                <td>
				                    <button type="button" class="mvp-clear-watched-percentage" <?php disabled( !current_user_can($capability) ); ?>>Clear</button><br>
				                    <span class="info"><?php esc_html_e('Player can display watched video percentage in playlist thumbnails (red line representing maximum reached time). Use this to clear watched percentage for all videos in this playlist. This will clear data only for current user.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/displayWatchedPercentage.jpg' ?>"/></p></div>
				                </td>
				            </tr>

				            <?php if ($is_admin) : ?>

				            <tr valign="top">
								<th><?php esc_html_e('Domain switch', MVP_TEXTDOMAIN); ?></th>
								<td>

									<p class="info"><?php esc_html_e('Rename from:', MVP_TEXTDOMAIN); ?></p>

									<input type="text" id="mvp-domain-rename-from">

									<p class="info"><?php esc_html_e('Rename to:', MVP_TEXTDOMAIN); ?></p>

									<input type="text" id="mvp-domain-rename-to">

									<button type="button" id="mvp-domain-rename" <?php disabled( !current_user_can($capability) ); ?>><?php esc_attr_e('Rename', MVP_TEXTDOMAIN); ?></button>

									<p class="info"><?php esc_html_e('Use this to rename all video and other urls (thumbnail, subtitles...) in this playlist to new url.', MVP_TEXTDOMAIN); ?></p>

								</td>
							</tr>

							<?php endif; ?>

				        </table>

					</div>	

					<div id="mvp-tab-playlist-options-advanced-content" class="mvp-tab-content">

						<p class="info"><?php esc_html_e('These are advanced playlist options. Change only if you know what you are doing!', MVP_TEXTDOMAIN); ?></p>

				    	<table class="form-table" >

				    		<tr valign="top">
				                <th><?php esc_html_e('Get video details without API', MVP_TEXTDOMAIN); ?></th>
				                <td>
				                    <select name="getEmbedDetails">
				                        <option value="0" <?php if(isset($playlist_options['getEmbedDetails']) && $playlist_options['getEmbedDetails'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
				                        <option value="1" <?php if(isset($playlist_options['getEmbedDetails']) && $playlist_options['getEmbedDetails'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
				                    </select>
				                    <p class="info"><?php esc_html_e('Use this to load one or more Youtube or Vimeo single videos without an API key. Only works if this playlist contains just single Youtube or Vimeo videos, not other type of videos! For example, if you have 10 Youtube single videos in this playlist and you want to to get video title, description without using Youtube API to preverve quota.', MVP_TEXTDOMAIN); ?></p>
				                </td>
				            </tr>

							<tr valign="top">
				                <th><?php esc_html_e('Load more on total scroll', MVP_TEXTDOMAIN); ?></th>
				                <td>
				                    <select name="addMoreOnTotalScroll">
				                        <option value="0" <?php if(isset($playlist_options['addMoreOnTotalScroll']) && $playlist_options['addMoreOnTotalScroll'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
				                        <option value="1" <?php if(isset($playlist_options['addMoreOnTotalScroll']) && $playlist_options['addMoreOnTotalScroll'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
				                    </select>
				                    <p class="info"><?php esc_html_e('Limit number of videos shown in the playlist on start using this option. For example, show 50 videos in playlist on start, then when user scrolls to the bottom in playlist, it will load another 50, and so on.. Useful if you have a lot of videos in playlist and you want to deliver them in segments.', MVP_TEXTDOMAIN); ?></p>
				                </td>
				            </tr>

				            <tr valign="top">
								<th><?php esc_html_e('Load more limit', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="number" name="addMoreOnTotalScrollLimit" min="0" value="<?php echo ($playlist_options['addMoreOnTotalScrollLimit']); ?>">
									<p class="info"><?php esc_html_e('Number of results to retrieve on total scroll', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>

							<tr valign="top">
				                <th><?php esc_html_e('Use pagination (only for Grid layout)', MVP_TEXTDOMAIN); ?></th>
				                <td>
				                    <select name="usePagination">
				                        <option value="0" <?php if(isset($playlist_options['usePagination']) && $playlist_options['usePagination'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
				                        <option value="1" <?php if(isset($playlist_options['usePagination']) && $playlist_options['usePagination'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
				                    </select>
				                    <p class="info"><?php esc_html_e('Use pagination with Grid layout to create pagination buttons for navigating between each page. Pagination can only work with self hosted videos in this playlist (not Youtube or Vimeo)', MVP_TEXTDOMAIN); ?></p>
				                </td>
				            </tr>

				            <tr valign="top">
								<th><?php esc_html_e('Pagination items per page', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="number" name="paginationPerPage" min="0" value="<?php echo ($playlist_options['paginationPerPage']); ?>">
									<p class="info"><?php esc_html_e('How many items to display per page.', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>

				    	</table>

					</div>	

		  	    </div>

				<p class="mvp-actions"> 
		            <button id="mvp-edit-playlist-form-submit" type="button" class="button-primary" <?php disabled( !current_user_can($capability) ); ?>><?php esc_html_e('Save Playlist options', MVP_TEXTDOMAIN); ?></button> 
		        </p>

        	</div>   

        </div>   

		</form>	

	  	<div class="option-tab-divider"></div>

	  	<p><?php esc_html_e('From this section you can create and edit playlist tracks. Drag the tracks by ID column to change sort order in which they appear in the player. You can also sort by ID (created date), title field.', MVP_TEXTDOMAIN); ?></p>

	  	<?php $playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A); ?>
	  	
	  	<div class="list-actions">

		  	<div class="list-actions-wrap list-actions-left mvp-playlist-actions">

		  		<div class="list-actions-inner">

		  			<select id="mvp_playlist_action" >
		  				<option value=""><?php esc_html_e('Select action..', MVP_TEXTDOMAIN); ?></option>
						<option value="mvp-delete-media"><?php esc_html_e('Delete selected', MVP_TEXTDOMAIN); ?></option>
						<?php if ($is_admin) : ?>
						<option value="mvp-copy-media"><?php esc_html_e('Copy selected', MVP_TEXTDOMAIN); ?></option>
						<option value="mvp-move-media"><?php esc_html_e('Move selected', MVP_TEXTDOMAIN); ?></option>
						<?php endif; ?>
						<option value="mvp-deactivate-media"><?php esc_html_e('Deactivate selected', MVP_TEXTDOMAIN); ?></option>
						<option value="mvp-activate-media"><?php esc_html_e('Activate selected', MVP_TEXTDOMAIN); ?></option>
						<option value="mvp-show-favorite"><?php esc_html_e('Show favorites', MVP_TEXTDOMAIN); ?></option>
						<option value="mvp-show-all"><?php esc_html_e('Show all', MVP_TEXTDOMAIN); ?></option>
					</select>

					<button id="mvp_playlist_action_do" <?php disabled( !current_user_can($capability) ); ?>><?php esc_html_e('Apply', MVP_TEXTDOMAIN); ?></button>

			  		
			  		<input type="text" id="mvp-filter-media" placeholder="<?php esc_attr_e('Search by title..', MVP_TEXTDOMAIN); ?>">

		  		</div>

		        <div id="playlist-selector-wrap">
		        	<span><?php esc_html_e('Select destination playlist:', MVP_TEXTDOMAIN); ?></span><br>
					<select name="playlist_selector" id="playlist_selector" style="">
						<?php $playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A); 
							foreach ($playlists as $pl) {
								echo('<option value="'.$pl['id'].'">'.$pl['title'].' - ID #'.$pl['id'].'</option>');
							}
						?>
					</select>
					<button id="selected-ok"><?php esc_html_e('Ok', MVP_TEXTDOMAIN); ?></button>
			  		<button id="selected-cancel"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
				</div>

			</div>

	  		<div class="list-actions-wrap list-actions-right mvp-media-pagination-container">

				<div class="mvp-pagination-per-page">
					<label for="mvp-pag-per-page-num" id="mvp-pag-per-page-label"><?php esc_html_e('Videos per page', MVP_TEXTDOMAIN); ?></label>
				    <input type="number" min="1" id="mvp-pag-per-page-num" value="10">
				    <button type="button" id="mvp-pag-per-page-btn"><?php esc_html_e('Set', MVP_TEXTDOMAIN); ?></button>
				</div>

				<div class="mvp-pagination-wrap"></div>

			</div>

        </div>

	  	<div class="option-tab">

		    <div class="option-toggle">
		        <span class="option-title"><?php esc_html_e('Playlist media', MVP_TEXTDOMAIN); ?></span>

		        <div class="option-toggle-icon">
	                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
	            </div>
		    </div>

		    <div class="option-content mvp-edit-playlist">

				<table id="media-table" class='mvp-table wp-list-table widefat' data-playlist-id="<?php echo($playlist_id); ?>" data-is-admin="<?php echo $is_admin; ?>" data-track-playlist-edit="<?php echo $settings['trackPlaylistEdit']; ?>">
					<thead>
						<tr>
							<th style="width:1%"><input type="checkbox" class="mvp-media-all"></th>

							<th class="mvp-sort-field" data-type="id" title="<?php esc_attr_e('Sort by created date', MVP_TEXTDOMAIN); ?>"><a href="#">ID <span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></a></th>

							<th><?php esc_html_e('Type', MVP_TEXTDOMAIN); ?></th>

							<th><?php esc_html_e('Thumb', MVP_TEXTDOMAIN); ?></th>

							<th class="mvp-sort-field" data-type="title" title="<?php esc_attr_e('Sort by title', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?> <span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></a></th>

							<th><?php esc_html_e('Path', MVP_TEXTDOMAIN); ?></th>

							<th><?php esc_html_e('Favorite', MVP_TEXTDOMAIN); ?></th>

							<th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
						</tr>
					</thead>
					<tbody id="media-item-list">
						<?php foreach($medias as $media) : 

							$media_options = unserialize($media['options']);
							$media_title = isset($media['title']) ? $media['title'] : '';

						?>

						<?php  

							$checked = ($media['disabled'] == "1" ? "checked" : ""); 
							$checked_cl = ($media['disabled'] == "1" ? " mvp-item-disabled" : ""); 

						?>

							<tr class="media-item  mvp-pagination-hidden <?php echo $checked_cl ?>" data-media-id="<?php echo($media['id']); ?>" data-order-id="<?php echo($media['order_id']); ?>"
							>
								<td><input type="checkbox" class="mvp-media-indiv"></td>

								<td class="media-id" title="<?php esc_attr_e('Sort', MVP_TEXTDOMAIN); ?>"><?php echo($media['id']); ?></td>

								<td class="media-type"><?php echo($media_options['type']); ?></td>

								<td>
									<img class="mvp-media-thumb-img" src="<?php echo (isset($media_options['thumb']) ? esc_html($media_options['thumb']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt/>
								</td>

								<td class="media-title"><?php echo($media_title); ?></td>

								<td class="media-path"><?php 
									$media_id = $media['id'];
									$paths = $wpdb->get_var($wpdb->prepare("SELECT options FROM {$path_table} WHERE media_id = %d LIMIT 1", $media_id));

									if($paths){
										$path = unserialize($paths);
										echo esc_html($path['path']); 
									}

								?></td>

								<td>
								<?php if(in_array($media_options['type'], $singleMediaSourcesArr)) : ?>
									<input type="checkbox" class="mvp-media-favorite">
								<?php endif; ?>
								</td>

								<td>

								<?php if( current_user_can($capability) ) : ?>

								<a class="mvp-edit-media" href='#' title='<?php esc_attr_e('Edit media', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>

								&nbsp;&nbsp;|&nbsp;&nbsp;

								<a class="mvp-delete-media" href='#' title='<?php esc_attr_e('Delete media', MVP_TEXTDOMAIN); ?>' style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a>

								<?php endif; ?>

								&nbsp;&nbsp;|&nbsp;&nbsp;

							<a class="mvp-get-link" href='#' title='<?php esc_attr_e('Get quick link to this video', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Link', MVP_TEXTDOMAIN); ?></a>

								</td>

							</tr>

						<?php endforeach; ?>	

						<tr class="mvp-media-item-container-orig">

							<td><input type="checkbox" class="mvp-media-indiv"></td>

							<td class="media-id" title="<?php esc_attr_e('Sort', MVP_TEXTDOMAIN); ?>"></td>

							<td class="media-type"></td>

							<td class="media-thumb">
								<img class="mvp-media-thumb-img" src="<?php echo ('data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt/>
							</td>

							<td class="media-title"></td>

							<td class="media-path"></td>

							<td><input type="checkbox" class="mvp-media-favorite"></td>

							<td>

							<a class="mvp-edit-media" href='#' title='<?php esc_attr_e('Edit media', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>

							&nbsp;&nbsp;|&nbsp;&nbsp;

							<a class="mvp-delete-media" href='#' title='<?php esc_attr_e('Delete media', MVP_TEXTDOMAIN); ?>' style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a>

							&nbsp;&nbsp;|&nbsp;&nbsp;

							<a class="mvp-get-link" href='#' title='<?php esc_attr_e('Get link', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Link', MVP_TEXTDOMAIN); ?></a>

							

							</td>
						</tr>


					</tbody>		 
				</table>

			</div>
	    </div>
    </div>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">
        
        	<button id="mvp-add-media" type="button" class="button-primary" <?php disabled( !current_user_can($capability) ); ?>><?php esc_html_e('Add media', MVP_TEXTDOMAIN); ?></button> 

        	<button id="mvp-upload-multiple-media" type="button" class="button-primary" <?php disabled( !current_user_can($capability) ); ?>><?php esc_html_e('Upload multiple', MVP_TEXTDOMAIN); ?></button> 

            <a class="button-secondary" href="<?php echo admin_url("admin.php?page=mvp_playlist_manager"); ?>"><?php esc_html_e('Back to Playlist list', MVP_TEXTDOMAIN); ?></a>

        </div>
    </div>

    <div id="mvp-save-holder"></div>
	
</div>
</div>
</div>

<div id="mvp-edit-media-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

        		<div class="mvp-modal-size-btn">
        			<div class="mvp-modal-expand" title="<?php esc_attr_e('Expand', MVP_TEXTDOMAIN); ?>">
	        			<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path d="M212.686 315.314L120 408l32.922 31.029c15.12 15.12 4.412 40.971-16.97 40.971h-112C10.697 480 0 469.255 0 456V344c0-21.382 25.803-32.09 40.922-16.971L72 360l92.686-92.686c6.248-6.248 16.379-6.248 22.627 0l25.373 25.373c6.249 6.248 6.249 16.378 0 22.627zm22.628-118.628L328 104l-32.922-31.029C279.958 57.851 290.666 32 312.048 32h112C437.303 32 448 42.745 448 56v112c0 21.382-25.803 32.09-40.922 16.971L376 152l-92.686 92.686c-6.248 6.248-16.379 6.248-22.627 0l-25.373-25.373c-6.249-6.248-6.249-16.378 0-22.627z"></path></svg>
	        		</div>		
	        		<div class="mvp-modal-collapse" title="<?php esc_attr_e('Collapse', MVP_TEXTDOMAIN); ?>">
	        			<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M4.686 427.314L104 328l-32.922-31.029C55.958 281.851 66.666 256 88.048 256h112C213.303 256 224 266.745 224 280v112c0 21.382-25.803 32.09-40.922 16.971L152 376l-99.314 99.314c-6.248 6.248-16.379 6.248-22.627 0L4.686 449.941c-6.248-6.248-6.248-16.379 0-22.627zM443.314 84.686L344 184l32.922 31.029c15.12 15.12 4.412 40.971-16.97 40.971h-112C234.697 256 224 245.255 224 232V120c0-21.382 25.803-32.09 40.922-16.971L296 136l99.314-99.314c6.248-6.248 16.379-6.248 22.627 0l25.373 25.373c6.248 6.248 6.248 16.379 0 22.627z"></path></svg>
	        		</div>	
        		</div>

        		<?php 

        		//load playlists
				$additional_playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A);

        		include("add_media.php"); ?>
    		</div>
        </div>
    </div>
</div>


<div id="mvp-upload-multiple-type-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

        		<table class="form-table">

					<tr valign="top">
						<th><?php esc_html_e('Select files types to upload', MVP_TEXTDOMAIN); ?></th>
						<td>
							<label for="mvp-upload-multiple-type-video"><input type="checkbox" value="video" id="mvp-upload-multiple-type-video" checked="checked"><?php esc_html_e('Video', MVP_TEXTDOMAIN); ?></label><br>

							<label for="mvp-upload-multiple-type-audio"><input type="checkbox" value="audio" id="mvp-upload-multiple-type-audio"><?php esc_html_e('Audio', MVP_TEXTDOMAIN); ?></label><br>

							<label for="mvp-upload-multiple-type-image"><input type="checkbox" value="image" id="mvp-upload-multiple-type-image"><?php esc_html_e('Images', MVP_TEXTDOMAIN); ?></label>
			            </td>
					</tr>

				</table>

        		<div class="mvp-modal-actions">	
	        		<button id="mvp-upload-multiple-type-modal-cancel" class="button-secondary" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
	        		<button id="mvp-upload-multiple-type-modal-ok" class="button-primary" type="button"><?php esc_html_e('Ok', MVP_TEXTDOMAIN); ?></button> 
	        	</div>	

    		</div>
        </div>
    </div>
</div>


<div id="mvp-icon-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">
        		<input type="search" id="mvp-icon-search" placeholder="<?php esc_attr_e('Search', MVP_TEXTDOMAIN); ?>">
        		<button class="mvp-icon-modal-close button-primary" type="button"><?php esc_html_e('Close', MVP_TEXTDOMAIN); ?></button> 
        		<ul id="icon-picker-list">
					
				</ul>
				<button class="mvp-icon-modal-close button-primary" type="button"><?php esc_html_e('Close', MVP_TEXTDOMAIN); ?></button> 
    		</div>
        </div>
    </div>
</div>

<div id="mvp-video-link-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

	        	<?php

	        		$options = array(

		        		"presets" => array(
			                'aviva' => 'aviva', 
			                'pollux' => 'pollux', 
			                'sirius' => 'sirius', 
			            ),

			            "playlistPositionArr" => array(    
			                "vrb" => "Vertical right and bottom",
			                "hb" => "Horizontal bottom",
			                "vb" => "Vertical bottom",
			                "outer" => "Outer (below player, endless scroll)",
			                "wall" => "Thumbnail grid with lightbox",
			                "no-playlist" => "No playlist (use just player)"
			            )

		            );

	        	?>

	        	<p class="vlpt-header"><?php esc_html_e('Generate quick shortcode to this video:', MVP_TEXTDOMAIN); ?>&nbsp;<span id="vlpt-title"></span></p>

	        	<input type="hidden" id="vlpt-type">

        		<table class="form-table">

        			<tr valign="top">
						<th><?php esc_html_e('Select player type', MVP_TEXTDOMAIN); ?></th>
						<td>
							<div>
						      <label for="vlpt-anon"><input type="radio" id="vlpt-anon" name="vlpt" value="anon" checked> <?php esc_html_e('Anonymous', MVP_TEXTDOMAIN); ?></label>
						    
						      &nbsp;&nbsp;
						   
						      <label for="vlpt-player"><input type="radio" id="vlpt-player" name="vlpt" value="player"> <?php esc_html_e('Player', MVP_TEXTDOMAIN); ?></label>
						    </div>
			            </td>
					</tr>

					<tr valign="top" class="vlpt-player-field">
						<th><?php esc_html_e('Select player', MVP_TEXTDOMAIN); ?></th>
						<td>
				            <select id="vlpt-player-id">
								<?php foreach($players as $player) : ?>
					                <option value="<?php echo($player['id']); ?>"><?php echo($player['title']); echo(' - ID #' . $player['id']); ?></option>
								<?php endforeach; ?>	
							</select>
			            </td>
					</tr>

	        		<tr valign="top" class="vlpt-anon-field">
						<th><?php esc_html_e('Select skin', MVP_TEXTDOMAIN); ?></th>
						<td>
							<select id="preset" name="preset">
								<?php foreach ($options['presets'] as $key => $value) : ?>
					                <option value="<?php echo($key); ?>"><?php echo(esc_html_e($value)); ?></option>
					            <?php endforeach; ?>
				            </select><br>
			            </td>
					</tr>

			        <tr valign="top" class="vlpt-anon-field">
			            <th><?php esc_html_e('Select layout', MVP_TEXTDOMAIN); ?></th>
			            <td>
			                <select id="playlistPosition" name="playlistPosition">
			                    <?php foreach ($options['playlistPositionArr'] as $key => $value) : ?>
			                        <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
			                    <?php endforeach; ?>
			                </select>
			            </td>
			        </tr>

			        <tr valign="top" class="vlpt-anon-field">
			            <th></th>
			            <td>
			                <img id="playlist-position-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="playlist position"/>
			                <p class="info playlist-position-info" id="vrb-info"><?php esc_html_e('Vertical playlist on the right, on narrow screens playlist goes below the player.', MVP_TEXTDOMAIN); ?></p>
			                <p class="info playlist-position-info" id="vb-info"><?php esc_html_e('Vertical playlist below the player.', MVP_TEXTDOMAIN); ?></p>
			                <p class="info playlist-position-info" id="hb-info"><?php esc_html_e('Horizontal playlist below the player.', MVP_TEXTDOMAIN); ?></p>
			                <p class="info playlist-position-info" id="outer-info"><?php esc_html_e('Playlist stacked below player, endless scroll.', MVP_TEXTDOMAIN); ?></p>
			                <p class="info playlist-position-info" id="wall-info"><?php esc_html_e('Thumbnail grid with player opening as lightbox above it.', MVP_TEXTDOMAIN); ?></p>
			                <p class="info playlist-position-info" id="no-playlist-info"><?php esc_html_e('Hide visible playlist (display only player).', MVP_TEXTDOMAIN); ?></p>
			            </td>
			        </tr>

			        <tr valign="top">
		                <th><?php esc_html_e('Include whole playlist', MVP_TEXTDOMAIN); ?></th>
		                <td>
		                    <select id="includeWholePlaylist">
		                        <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
		                        <option value="1" selected><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
		                    </select>
		                    <p class="info"><?php esc_html_e('If false, only this video will be included.', MVP_TEXTDOMAIN); ?></p>
		                </td>
		            </tr>

		            <tr valign="top">
		                <th><?php esc_html_e('Auto play video', MVP_TEXTDOMAIN); ?></th>
		                <td>
		                    <select id="autoPlay">
		                        <option value="0" selected><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
		                        <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
		                    </select><br>
		                    <p class="info"><?php esc_html_e('Auto play media. This will mute video which is required for autoplay.', MVP_TEXTDOMAIN); ?></p>
		                </td>
		            </tr>

		            <tr valign="top">
		                <th><?php esc_html_e('Shortcode', MVP_TEXTDOMAIN); ?></th>
		                <td>

		                	<textarea id="mvp-pl-video-link" rows="3" ></textarea>
		                	<button class="mvp-video-get-shortcode" type="button"><?php esc_html_e('Get shortcode', MVP_TEXTDOMAIN); ?></button> 

		                 </td>
		            </tr>

			    </table>
        		
				<button class="mvp-video-link-modal-close button-primary" type="button"><?php esc_html_e('Close', MVP_TEXTDOMAIN); ?></button> 

    		</div>
        </div>
    </div>
</div>

<div id="mvp-add-media-limit-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

				<div class="mvp-modal-message">
					<h2><?php esc_html_e('Notice', MVP_TEXTDOMAIN); ?></h2>
					<p class="mvp-modal-message-content"><?php echo $settings['userVideoLimitText'] ?></p>
				</div>

				<div class="mvp-modal-actions">	
					<button id="mvp-add-media-limit-close" type="button"><?php esc_html_e('Close', MVP_TEXTDOMAIN); ?></button>
    			</div>

    		</div>
        </div>
    </div>
</div>

<div id="mvp-loader">
    <div class="mvp-loader-anim">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>