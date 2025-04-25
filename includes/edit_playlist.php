<?php 

if(isset($_GET['mvp_msg'])){
	$msg = $_GET['mvp_msg'];
	if($msg == 'playlist_created')$msg = 'Playlist created!'; 
}else{
	$msg = null;
}

if(isset($_GET['playlist_id'])){//load media

	$playlist_id = $_GET['playlist_id'];

	//playlist data
	$playlist_data = $wpdb->get_row($wpdb->prepare("SELECT title, options FROM {$playlist_table} WHERE id = %d", $playlist_id), ARRAY_A);
	$pl_options = unserialize($playlist_data['options']);
	$default_playlist_options = mvp_playlist_options();
	if(!$pl_options){
		$playlist_options = $default_playlist_options;
	}else{
		$playlist_options = $pl_options + $default_playlist_options;
	}

	//media
	/*$stmt = $wpdb->prepare("SELECT id, disabled, title, options, order_id FROM $media_table WHERE playlist_id = %d 
        ORDER BY order_id ASC", $playlist_id);*/

	$stmt = $wpdb->prepare("
				SELECT mt.id, mt.disabled, mt.title, mt.options, mt.order_id, st.c_play, st.c_finish
				FROM $media_table as mt 
				LEFT JOIN $statistics_table st on mt.id = st.media_id 
				WHERE mt.playlist_id = %d
				GROUP BY mt.id
				ORDER BY order_id ASC", $playlist_id);

	$medias = $wpdb->get_results($stmt, ARRAY_A);



}

?>

<div class="wrap">

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
				    </ul>

				    <div id="mvp-tab-playlist-options-general-content" class="mvp-tab-content">

				    	<input type="hidden" name="isAdminRetrieved" value="<?php echo $playlist_options['isAdminRetrieved'] ?>">
				    	<input type="hidden" name="youtubeUrlType" id="youtubeUrlType" value="<?php echo (isset($playlist_options['youtubeUrlType']) ? $playlist_options['youtubeUrlType'] : ''); ?>">
				    	<input type="hidden" name="youtubeUrl" id="youtubeUrl" value="<?php echo (isset($playlist_options['youtubeUrl']) ? $playlist_options['youtubeUrl'] : ''); ?>">

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

							<tr valign="top">
				                <th><?php esc_html_e('Get video details without API', MVP_TEXTDOMAIN); ?></th>
				                <td>
				                    <select name="getEmbedDetails">
				                        <option value="0" <?php if(isset($playlist_options['getEmbedDetails']) && $playlist_options['getEmbedDetails'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
				                        <option value="1" <?php if(isset($playlist_options['getEmbedDetails']) && $playlist_options['getEmbedDetails'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
				                    </select>
				                    <p class="info"><?php esc_html_e('Use this to load one or more Youtube or Vimeo single videos without an API key.', MVP_TEXTDOMAIN); ?></p>
				                </td>
				            </tr>

							<tr valign="top">
				                <th><?php esc_html_e('Retrieve more on total scroll', MVP_TEXTDOMAIN); ?></th>
				                <td>
				                    <select name="addMoreOnTotalScroll">
				                        <option value="0" <?php if(isset($playlist_options['addMoreOnTotalScroll']) && $playlist_options['addMoreOnTotalScroll'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
				                        <option value="1" <?php if(isset($playlist_options['addMoreOnTotalScroll']) && $playlist_options['addMoreOnTotalScroll'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
				                    </select>
				                    <p class="info"><?php esc_html_e('Limit number of videos shown in the playlist on start using this option. Works in conjuntion with Retrieve more limit (for example, set Retrieve more limit 10 which will show 10 videos in playlist on start, then when user scrolls to the bottom, it will load another 10, and so on.. Useful if you have a lot of videos in playlist and you want to deliver them in segments.', MVP_TEXTDOMAIN); ?></p>
				                </td>
				            </tr>

				            <tr valign="top">
								<th><?php esc_html_e('Retrieve more limit', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="number" name="addMoreOnTotalScrollLimit" min="0" value="<?php echo ($playlist_options['addMoreOnTotalScrollLimit']); ?>">
									<p class="info"><?php esc_html_e('Number of results to retrieve on total scroll', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>

							<tr valign="top">
				                <th><?php esc_html_e('Use pagination', MVP_TEXTDOMAIN); ?></th>
				                <td>
				                    <select name="usePagination">
				                        <option value="0" <?php if(isset($playlist_options['usePagination']) && $playlist_options['usePagination'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
				                        <option value="1" <?php if(isset($playlist_options['usePagination']) && $playlist_options['usePagination'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
				                    </select>
				                    <p class="info"><?php esc_html_e('Use pagination with Grid layout and create pagination buttons. Pagination can only work with self hosted videos in this playlist! Youtube and Vimeo use load more feature instead of pagination.', MVP_TEXTDOMAIN); ?></p>
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

							<tr valign="top" id="pl_vast_field">
								<th><?php esc_html_e('Vast url', MVP_TEXTDOMAIN); ?></th>
								<td>
									<input type="text" name="vast" id="vast" value="<?php echo ($playlist_options['vast']); ?>">
									<button type="button" id="pl_vast_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
									<p class="info"><?php esc_html_e('Add vast url (VAST / VMAP / IMA / VPAID)', MVP_TEXTDOMAIN); ?></p>
								</td>
							</tr>

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
					                        </label>
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

						</table>

					</div>	

					<div id="mvp-tab-playlist-options-maintenance-content" class="mvp-tab-content">

				    	<table class="form-table" >

							<tr valign="top">
				                <th><?php esc_html_e('Clear watched percentage', MVP_TEXTDOMAIN); ?></th>
				                <td>
				                    <button type="button" class="mvp-clear-watched-percentage">Clear</button><br>
				                    <span class="info"><?php esc_html_e('Player can display watched video percentage in playlist thumbnails (red line representing maximum reached time). Use this to clear watched percentage for all videos in this playlist.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/displayWatchedPercentage.jpg' ?>"/></p></div>
				                </td>
				            </tr>

				            <tr valign="top">
								<th><?php esc_html_e('Domain switch', MVP_TEXTDOMAIN); ?></th>
								<td>

									<p class="info"><?php esc_html_e('Rename from:', MVP_TEXTDOMAIN); ?></p>

									<input type="text" id="mvp-domain-rename-from">

									<p class="info"><?php esc_html_e('Rename to:', MVP_TEXTDOMAIN); ?></p>

									<input type="text" id="mvp-domain-rename-to">

									<button type="button" id="mvp-domain-rename"><?php esc_attr_e('Rename', MVP_TEXTDOMAIN); ?></button>

									<p class="info"><?php esc_html_e('Use this to rename all video and other urls (thumbnail, subtitles...) in this playlist to new url.', MVP_TEXTDOMAIN); ?></p>

								</td>
							</tr>

				        </table>

					</div>	

		  	    </div>

				<p class="mvp-actions"> 
		            <button id="mvp-edit-playlist-form-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Save Playlist options', MVP_TEXTDOMAIN); ?></button> 
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
						<option value="mvp-copy-media"><?php esc_html_e('Copy selected', MVP_TEXTDOMAIN); ?></option>
						<option value="mvp-move-media"><?php esc_html_e('Move selected', MVP_TEXTDOMAIN); ?></option>
						<option value="mvp-deactivate-media"><?php esc_html_e('Deactivate selected', MVP_TEXTDOMAIN); ?></option>
						<option value="mvp-activate-media"><?php esc_html_e('Activate selected', MVP_TEXTDOMAIN); ?></option>
					</select>

					<button id="mvp_playlist_action_do"><?php esc_html_e('Apply', MVP_TEXTDOMAIN); ?></button>

			  		
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

				<table id="media-table" class='mvp-table wp-list-table widefat' data-playlist-id="<?php echo($playlist_id); ?>">
					<thead>
						<tr>
							<th style="width:1%"><input type="checkbox" class="mvp-media-all"></th>

							<th class="mvp-sort-field" data-type="id" title="<?php esc_attr_e('Sort by created date', MVP_TEXTDOMAIN); ?>"><a href="#">ID <span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></a></th>

							<th><?php esc_html_e('Type', MVP_TEXTDOMAIN); ?></th>

							<th><?php esc_html_e('Thumb', MVP_TEXTDOMAIN); ?></th>

							<th class="mvp-sort-field" data-type="title" title="<?php esc_attr_e('Sort by title', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?> <span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></a></th>

							<th><?php esc_html_e('Path', MVP_TEXTDOMAIN); ?></th>

							<th class="mvp-sort-field" data-type="play" title="<?php esc_attr_e('Sort by plays', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?> <span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></a></th>

							<th class="mvp-sort-field" data-type="finish" title="<?php esc_attr_e('Sort by finishes', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Finishes', MVP_TEXTDOMAIN); ?> <span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></a></th>

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

								<td class="media-id"><?php echo($media['id']); ?></td>

								<td><?php echo($media_options['type']); ?></td>

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

								<td class="media-play"><?php 
								$c_play = isset($media['c_play']) ? $media['c_play'] : 0;
								echo($c_play); ?></td>

								<td class="media-finish"><?php 
								$c_finish = isset($media['c_finish']) ? $media['c_finish'] : 0;
								echo($c_finish); ?></td>

								<td>

								<a class="mvp-edit-media" href='#' title='<?php esc_attr_e('Edit media', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>

								&nbsp;&nbsp;|&nbsp;&nbsp;

								<a class="mvp-delete-media" href='#' title='<?php esc_attr_e('Delete media', MVP_TEXTDOMAIN); ?>' style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a>

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

							<td class="media-play">0</td>

							<td class="media-finish">0</td>

							<td>

							<a class="mvp-edit-media" href='#' title='<?php esc_attr_e('Edit media', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>

							&nbsp;&nbsp;|&nbsp;&nbsp;

							<a class="mvp-delete-media" href='#' title='<?php esc_attr_e('Delete media', MVP_TEXTDOMAIN); ?>' style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a>

							</td>
						</tr>


					</tbody>		 
				</table>

			</div>
	    </div>
    </div>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">

			<button id="mvp-update-playlist" type="button" class="button-primary mvp-update-playlist-hidden" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Update playlist', MVP_TEXTDOMAIN); ?></button> 
        
        	<button id="mvp-add-media" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Add media', MVP_TEXTDOMAIN); ?></button> 

            <a class="button-secondary" href="<?php echo admin_url("admin.php?page=mvp_playlist_manager"); ?>"><?php esc_html_e('Back to Playlist list', MVP_TEXTDOMAIN); ?></a>

        </div>
    </div>

    <div id="mvp-save-holder"></div>
	
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

<div id="mvp-loader">
    <div class="mvp-loader-anim">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>