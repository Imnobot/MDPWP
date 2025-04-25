<?php

$folder_sort = array(
    'filename-asc' => 'file name ascending', 
    'filename-desc' => 'file name descending', 
    'date-asc' => 'date ascending', 
    'date-desc' => 'date descending',
);

$gdrive_sort = array(
    'filename-asc' => 'file name ascending', 
    'filename-desc' => 'file name descending', 
);

$onedrive_sort = array(
    'filename-asc' => 'file name ascending', 
    'filename-desc' => 'file name descending', 
    'date-asc' => 'date ascending', 
    'date-desc' => 'date descending',
    'created-date-asc' => 'created date ascending', 
    'created-date-desc' => 'created date descending',
);

$yt_sort_arr = array(
    'relevance' => 'relevance',
    'date' => 'date', 
    'rating' => 'rating', 
    'title' => 'title', 
    'videoCount' => 'videoCount',
    'viewCount' => 'viewCount', 
);

$vimeo_channel_sort_arr = array(
    'added' => 'added', 
    'alphabetical' => 'alphabetical', 
    'comments' => 'comments', 
    'date' => 'date', 
    'default' => 'default', 
    'duration' => 'duration',
    'likes' => 'likes', 
    'manual' => 'manual',
    'modified_time' => 'modified_time', 
    'plays' => 'plays'
);

$vimeo_album_sort_arr = array(
    'alphabetical' => 'alphabetical', 
    'comments' => 'comments', 
    'date' => 'date', 
    'default' => 'default', 
    'duration' => 'duration',
    'likes' => 'likes', 
    'manual' => 'manual',
    'modified_time' => 'modified_time', 
    'plays' => 'plays'
);

$vimeo_group_sort_arr = array(
    'alphabetical' => 'alphabetical', 
    'comments' => 'comments', 
    'date' => 'date', 
    'duration' => 'duration',
    'likes' => 'likes', 
    'plays' => 'plays'
);

$vimeo_ondemand_sort_arr = array(
    'date' => 'date', 
    'default' => 'default',
    'episode' => 'episode', 
    'manual' => 'manual',
    'name' => 'name', 
    'purchase_time' => 'purchase time', 
    'release_date' => 'release date', 
);

$vimeo_folder_sort_arr = array(
    'alphabetical' => 'alphabetical', 
    'date' => 'date', 
    'default' => 'default', 
    'duration' => 'duration',
    'last_user_action_event_date' => 'last user action'
);

$vimeo_sort_dir_arr = array(    
    'asc' => 'ascending',
    'desc' => 'descending'
);

$target_arr = array(    
    '_blank' => '_blank',
    '_parent' => '_parent',
    '_self' => '_self'
);


?>

<table class="form-table">

	<tr valign="top" id="select_media_type_field">
		<th><?php esc_html_e('Select media type', MVP_TEXTDOMAIN); ?></th>
		<td>
            <input type="hidden" id="disabled_field">


            <select id="type" name="type">
                <optgroup label="video">
                    <option value="video"><?php esc_html_e('video', MVP_TEXTDOMAIN); ?></option>
                    <option value="folder_video"><?php esc_html_e('Folder with video files', MVP_TEXTDOMAIN); ?></option>
                </optgroup>  
                <optgroup label="Live streaming">
                    <option value="hls"><?php esc_html_e('HLS Live Streaming', MVP_TEXTDOMAIN); ?></option>
                    <option value="dash"><?php esc_html_e('MPEG DASH Live Streaming', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="audio">
                    <option value="audio"><?php esc_html_e('Audio', MVP_TEXTDOMAIN); ?></option>
                    <option value="folder_audio"><?php esc_html_e('Folder with audio files', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="image">
                    <option value="image"><?php esc_html_e('image', MVP_TEXTDOMAIN); ?></option>
                    <option value="folder_image"><?php esc_html_e('Folder with image files', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="Amazon">
                    <option value="s3_bucket_video"><?php esc_html_e('Read bucket of video files', MVP_TEXTDOMAIN); ?></option>
                    <option value="s3_video"><?php esc_html_e('Add single video from the bucket', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="Google drive">
                    <option value="gdrive_folder"><?php esc_html_e('Google Drive folder', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="One drive">
                    <option value="onedrive_folder"><?php esc_html_e('One Drive folder', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
	            <optgroup label="youtube">
                    <option value="youtube_single"><?php esc_html_e('Youtube single video', MVP_TEXTDOMAIN); ?></option>
                    <option value="youtube_single_list"><?php esc_html_e('multiple Youtube single videos', MVP_TEXTDOMAIN); ?></option>
                    <option value="youtube_playlist"><?php esc_html_e('Youtube playlist', MVP_TEXTDOMAIN); ?></option>
                    <option value="youtube_playlist_backend"><?php esc_html_e('Youtube playlist in backend', MVP_TEXTDOMAIN); ?></option>
                    <option value="youtube_channel"><?php esc_html_e('Youtube channel', MVP_TEXTDOMAIN); ?></option>
                    <option value="youtube_channel_backend"><?php esc_html_e('Youtube channel in backend', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="vimeo">
                    <option value="vimeo_single"><?php esc_html_e('Vimeo single video', MVP_TEXTDOMAIN); ?></option>
                    <option value="vimeo_single_list"><?php esc_html_e('multiple Vimeo single videos', MVP_TEXTDOMAIN); ?></option>
                    <option value="vimeo_channel"><?php esc_html_e('Vimeo channel', MVP_TEXTDOMAIN); ?></option>
                    <option value="vimeo_album"><?php esc_html_e('Vimeo album (showcase)', MVP_TEXTDOMAIN); ?></option>
                    <option value="vimeo_user_album"><?php esc_html_e('Vimeo album (showcase) by username', MVP_TEXTDOMAIN); ?></option>
                    <option value="vimeo_group"><?php esc_html_e('Vimeo group', MVP_TEXTDOMAIN); ?></option>
                    <option value="vimeo_user_videos"><?php esc_html_e('Vimeo user', MVP_TEXTDOMAIN); ?></option>
                    <option value="vimeo_ondemand"><?php esc_html_e('Vimeo collection', MVP_TEXTDOMAIN); ?></option>
                    <option value="vimeo_folder"><?php esc_html_e('Vimeo folder', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="XML">
                    <option value="xml"><?php esc_html_e('XML file', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="JSON">
                    <option value="json"><?php esc_html_e('JSON file', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
                <optgroup label="custom">
                    <option value="custom_html"><?php esc_html_e('custom HTML', MVP_TEXTDOMAIN); ?></option>
                    <option value="custom"><?php esc_html_e('custom HTML from external file', MVP_TEXTDOMAIN); ?></option>
                </optgroup>
            </select>
        </td>
	</tr>
	<tr valign="top" id="path_field">
		<th><?php esc_html_e('Path', MVP_TEXTDOMAIN); ?></th>
		<td>

            <textarea class="mvp-media-path-ta" id="path" name="path" rows="2"></textarea>

            <button type="button" id="path_upload" name="path_upload" class="mvp-field-top"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
            <button type="button" id="path_remove" class="mvp-field-top"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>

            <p id="video_info" class="info"><?php esc_html_e('Enter video url', MVP_TEXTDOMAIN); ?></p>

            <p id="audio_info" class="info"><?php esc_html_e('Enter audio url', MVP_TEXTDOMAIN); ?></p>

            <p id="image_info" class="info"><?php esc_html_e('Enter image url', MVP_TEXTDOMAIN); ?></p>

            <p id="folder_info" class="info"><?php esc_html_e('Place your folder with files in \'wp-content/uploads/mvp-file-dir\' directory and enter folder name here. Or provide custom folder url on your server.', MVP_TEXTDOMAIN); ?></p>

            <p id="gdrive_info" class="info"><?php esc_html_e('Enter folder ID which needs to be public, for example:', MVP_TEXTDOMAIN); ?> 0ByzcNpNrQNpWUFNGcXNCS2lyX1E</p>

            <p id="onedrive_info" class="info"><?php esc_html_e('Enter folder share url which needs to be public, for example:', MVP_TEXTDOMAIN); ?> https://1drv.ms/u/s!Av88sx97IzeiaR3CCQxJcw7WvqI</p>

            <p id="hls_info" class="info"><?php esc_html_e('Enter m3u8 url. Example:', MVP_TEXTDOMAIN); ?> <span class="info-highlight">https://bitmovin-a.akamaihd.net/content/sintel/hls/playlist.m3u8</span></p>

            <p id="dash_info" class="info"><?php esc_html_e('Enter manifest url. Example:', MVP_TEXTDOMAIN); ?> <span class="info-highlight">https://dash.akamaized.net/akamai/bbb_30fps/bbb_30fps.mpd</span></p>

            <p id="yt_video_info" class="info"><?php esc_html_e('Enter video ID, only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://www.youtube.com/watch?v=</span><span class="info-highlight2">tb935IxGBt4</span></p>

            <p id="yt_video_multiple_info" class="info"><?php esc_html_e('Enter one or more video IDs separated by comma. Example:', MVP_TEXTDOMAIN); ?> <span class="info-highlight2">5zYArkwq2PQ,M4z90wlwYs8</span></p>

            <p id="yt_playlist_info" class="info"><?php esc_html_e('Enter playlist ID, only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://www.youtube.com/playlist?list=</span><span class="info-highlight2">PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI</span></p>

            <p id="yt_backend_info" class="info"><?php esc_html_e('Videos will be retrieved now, and all the videos you see here will be visible in the player on the front page. This means if you add new videos to your Youtube account later on, new videos will not be visible in the player unless you add the videos here again using the "Update playlist" button. Use this if you have a lot of traffic on your website and Youtube quota is not enough for you.', MVP_TEXTDOMAIN); ?></p>

            <p id="yt_channel_info" class="info"><?php esc_html_e('Enter channel ID, only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://www.youtube.com/channel/</span><span class="info-highlight2">UCqhnX4jA0A5paNd1v-zEysw</span></p>

            <p id="yt_user_info" class="info"><?php esc_html_e('Enter only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://www.youtube.com/user/</span><span class="info-highlight2">LoungeMusic100</span></p>

            <p id="vim_video_info" class="info"><?php esc_html_e('Enter video ID, only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://vimeo.com/</span><span class="info-highlight2">279267531</span></p>

            <p id="vim_video_multiple_info" class="info"><?php esc_html_e('Enter one or more video IDs separated by comma. Example:', MVP_TEXTDOMAIN); ?> <span class="info-highlight2">22669590,34267586</span></p>

            <p id="vim_channel_info" class="info"><?php esc_html_e('Enter channel ID, only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://vimeo.com/channels/</span><span class="info-highlight2">jesc</span></p>

            <p id="vim_group_info" class="info"><?php esc_html_e('Enter groud ID, only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://vimeo.com/groups/</span><span class="info-highlight2">166603</span></p>

            <p id="vim_album_info" class="info"><?php esc_html_e('Enter album ID, only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://vimeo.com/album/</span><span class="info-highlight2">3391770</span></p>

            <p class="info" id="vim_ondemand_info"><?php esc_html_e('Enter on demand ID, only bold part, example:', MVP_TEXTDOMAIN); ?> <span class="info-light">https://vimeo.com/ondemand/</span><span class="info-highlight2">loyisogola</span></p>

            <p id="vim_folder_info" class="info"><?php esc_html_e('Enter folder ID', MVP_TEXTDOMAIN); ?></p>

            <p id="xml_info" class="info"><?php esc_html_e('Enter XML url. File needs to be located on the same domain. Example of xml file is located in plugin help package.', MVP_TEXTDOMAIN); ?></p>

            <p id="json_info" class="info"><?php esc_html_e('Enter json or txt url. File needs to be located on the same domain. Example of json file is located in plugin help package.', MVP_TEXTDOMAIN); ?></p>

            <p id="custom_html_info" class="info"><?php printf(__( 'Enter HTML here. <a href="%s" target="_blank">Validate your HTML</a> to make sure it doesnt break the player markup.', MVP_TEXTDOMAIN), esc_url( 'https://validator.w3.org/#validate_by_input' ));?><br><?php esc_html_e('Do not place javascript code here.', MVP_TEXTDOMAIN); ?></p>

            <p id="custom_info" class="info"><?php esc_html_e('Load custom HTML in the player over external file. Use this to load any iframe into the player for example. Example of custom file is located in plugin help package.', MVP_TEXTDOMAIN); ?></p>

            <p id="s3_bucket_video_info" class="info"><?php esc_html_e('Add bucket name', MVP_TEXTDOMAIN); ?></p>

        </td>
	</tr>

    <tr valign="top" id="exclude_field">
        <th><?php esc_html_e('Exclude videos', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="exclude" name="exclude">
            <p class="info"><?php esc_html_e('Exclude specific videos from showing in the player. Enter one or more video ids separated by comma, example: xxxxxxxx,xxxxxxxx', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="bkey_field">
        <th><?php esc_html_e('Object key', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="bkey" name="bkey">
            <p class="info"><?php esc_html_e('This is basically file name in bucket. When you right click on the file in bucket you will get its properties, one of them is key.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="mp4_field">
        <th><?php esc_html_e('MP4 url', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="mp4" name="mp4">
            <p class="info"><?php esc_html_e('Add url to mp4 video as a backup for browsers that do not support live streaming (IOS does not support HLS currently)', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="folder_custom_url_field">
        <th><?php esc_html_e('Is custom folder url', MVP_TEXTDOMAIN); ?></th>
        <td>
            <label><input id="folder_custom_url" name="folder_custom_url" type="checkbox" value="1"> <?php esc_html_e('Select this if you are reading custom folder url on your server.', MVP_TEXTDOMAIN); ?></label>
        </td>
    </tr>

    <tr valign="top" id="id3_field">
        <th><?php esc_html_e('Read ID3 tags', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="id3" name="id3">
                <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
            </select>
        </td>
    </tr>

    <tr valign="top" id="folder_sort_field">
        <th><?php esc_html_e('Sort method', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="folder_sort" name="folder_sort">
                <?php foreach ($folder_sort as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
            <p class="info"><?php esc_html_e('Sort method when reading files from directory.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="gdrive_sort_field">
        <th><?php esc_html_e('Sort method', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="gdrive_sort" name="gdrive_sort">
                <?php foreach ($gdrive_sort as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select><br>
            <p class="info"><?php esc_html_e('Sort method when reading files from directory.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="onedrive_sort_field">
        <th><?php esc_html_e('Sort method', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="onedrive_sort" name="onedrive_sort">
                <?php foreach ($onedrive_sort as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select><br>
            <p class="info"><?php esc_html_e('Sort method when reading files from directory.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

	<tr valign="top" id="user_id_field">
		<th><?php esc_html_e('Vimeo username', MVP_TEXTDOMAIN); ?></th>
		<td>
			<input type="text" id="user_id" name="user_id">
			<p class="info"><?php esc_html_e('Enter only bold part:', MVP_TEXTDOMAIN); ?><br> <span class="info-light">https://vimeo.com/</span><span class="info-highlight2">cameranera</span></p>
		</td>
	</tr>

    <tr valign="top" id="multi_path_field">
		<th><?php esc_html_e('Path', MVP_TEXTDOMAIN); ?></th>
		<td id="multi_path_content">

            <div class="multi_path_section_orig">
                <input type="text" class="multi_path" name="multi_path[]" pattern=".*\S+.*">
                <button class="multi_path_upload" name="multi_path_upload[]"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button><br>
                <input type="text" class="quality_title mvp-label-field" name="quality_title[]" placeholder="<?php esc_attr_e('Menu title quality', MVP_TEXTDOMAIN); ?>" title="Title which appears in menu quality selector" pattern=".*\S+.*"><br>
                <div class="mvp_quality_radio">
                    <label><input type="radio" class="quality_default" name="quality_default[]"><?php esc_html_e('Make this quality default on start', MVP_TEXTDOMAIN); ?></label>
                </div>
                <div class="mvp_quality_mobile_radio">
                    <label><input type="radio" class="quality_mobile_default" name="quality_mobile_default[]"><?php esc_html_e('Make this quality default on start on Mobile', MVP_TEXTDOMAIN); ?></label>
                </div>
                <button type="button" class="multi_path_field_remove"><?php esc_html_e('Remove quality', MVP_TEXTDOMAIN); ?></button>
            </div>
       
            <button type="button" id="multi_path_field_add"><?php esc_html_e('Add quality', MVP_TEXTDOMAIN); ?></button>

		</td>
	</tr>

    <tr valign="top" id="vpwd_field">
        <th><?php esc_html_e('Video password', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="vpwd" name="vpwd">
            <p class="info"><?php esc_html_e('Enter password if video is password protected.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="yt_sort_field">
        <th><?php esc_html_e('Video sort order', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="yt_sort" name="yt_sort">
                <?php foreach ($yt_sort_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr valign="top" id="vimeo_channel_sort_field">
        <th><?php esc_html_e('Video sort order', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="vimeo_channel_sort" name="vimeo_channel_sort">
                <?php foreach ($vimeo_channel_sort_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr valign="top" id="vimeo_album_sort_field">
        <th><?php esc_html_e('Video sort order', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="vimeo_album_sort" name="vimeo_album_sort">
                <?php foreach ($vimeo_album_sort_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr valign="top" id="vimeo_group_sort_field">
        <th><?php esc_html_e('Video sort order', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="vimeo_group_sort" name="vimeo_group_sort">
                <?php foreach ($vimeo_group_sort_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr valign="top" id="vimeo_ondemand_sort_field">
        <th><?php esc_html_e('Video sort order', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="vimeo_ondemand_sort" name="vimeo_ondemand_sort">
                <?php foreach ($vimeo_ondemand_sort_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr valign="top" id="vimeo_folder_sort_field">
        <th><?php esc_html_e('Video sort order', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="vimeo_folder_sort" name="vimeo_folder_sort">
                <?php foreach ($vimeo_folder_sort_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr valign="top" id="vimeo_sort_dir_field">
        <th><?php esc_html_e('Video sort order direction', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="vimeo_sort_dir" name="vimeo_sort_dir">
                <?php foreach ($vimeo_sort_dir_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>

    <tr valign="top" id="limit_field">
        <th><?php esc_html_e('Results limit', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="number" id="limit" name="limit" min="1" step="1" value="20">
            <p class="info"><?php esc_html_e('How many videos to show on start.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="load_more_field">
		<th><?php esc_html_e('Enable Load more option', MVP_TEXTDOMAIN); ?></th>
		<td>
			<select id="load_more" name="load_more">
                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            </select>
            <p class="info"><?php esc_html_e('Load more videos when user scrolls to the bottom.', MVP_TEXTDOMAIN); ?></p>
		</td>
	</tr>
    <tr valign="top" id="is360_field">
        <th><?php esc_html_e('Is 360', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="is360" name="is360">
                <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
            </select>
            <p class="info"><?php esc_html_e('Choose this if content is 360 virtual reality video or image panorama.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>
    <tr valign="top" id="vrMode_field">
        <th><?php esc_html_e('Virtual reality mode', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="vrMode" name="vrMode">
                <option value="monoscopic"><?php esc_html_e('monoscopic', MVP_TEXTDOMAIN); ?></option>
                <option value="stereoscopic"><?php esc_html_e('stereoscopic', MVP_TEXTDOMAIN); ?></option>
            </select>
            <p class="info"><?php esc_html_e('Select virtual reality video mode.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>
    <tr valign="top" id="noapi_field">
        <th><?php esc_html_e('Use without api', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="noapi" name="noapi">
                <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
            </select>
            <p class="info"><?php esc_html_e('Select yes if you want to play Youtube or Vimeo single videos by providing video thumbnail, title and description yourself so it doesnt use quota to retrieve them.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>
    <tr valign="top" id="islive_field">
        <th><?php esc_html_e('Is live stream', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="islive" name="islive">
                <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
            </select>
            <p class="info"><?php esc_html_e('Select yes if video is a live stream. This will show "LIVE" indicator in controls. When LIVE is active, seekbar and video time are hidden.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>
    <tr valign="top" id="lock_time_field">
        <th><?php esc_html_e('Lock video time', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="number" min="0" step="1" id="lock_time" name="lock_time">
            <p class="info"><?php esc_html_e('Lock video for logged in users. Enter time in seconds (0 means video is locked from beginning).', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>
	<tr valign="top" id="poster_field">
		<th><?php esc_html_e('Poster', MVP_TEXTDOMAIN); ?></th>
		<td>
            <img id="poster_preview" class="mvp-img-preview" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" alt="">
			<input type="text" id="poster" name="poster">
            <button type="button" id="poster_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
            <button type="button" id="poster_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>
            <p id="poster_info" class="info"><?php esc_html_e('Note: if autoplay is on, poster is skipped automatically.', MVP_TEXTDOMAIN); ?></p>
            <p id="poster_audio_info"><?php esc_html_e('Enter image poster url. Poster is shown in video area while audio plays.', MVP_TEXTDOMAIN); ?></p>
		</td>
	</tr>
    <tr valign="top" id="poster_frame_time_field">
        <th><?php esc_html_e('Video frame as poster', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="number" step="0.1" id="poster_frame_time" name="poster_frame_time">
            <p class="info"><?php esc_html_e('Set any video frame time as poster. For example, set 2 to display frame at 2 seconds into the video as poster. Requires video auto play false in Player settings. Do not set Poster and video start time if you want this feature.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="slideshow_field">
        <th><?php esc_html_e('Image slideshow', MVP_TEXTDOMAIN); ?></th>
        <td>

            <span id="slideshow_images-wrap">
                <span id="slideshow_images_field" class="slideshow_images_field_hidden"></span>
                <button type="button" id="slideshow_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
                <button type="button" id="slideshow_remove_all"><?php esc_html_e('Remove all', MVP_TEXTDOMAIN); ?></button>
                <input type="hidden" id="slideshow_images">
            </span>
            
            <p class="info"><?php esc_html_e('Upload images that will play in slideshow while audio plays.', MVP_TEXTDOMAIN); ?></p>
           
        </td>
    </tr>

	<tr valign="top" id="thumb_field">
		<th><?php esc_html_e('Thumbnail', MVP_TEXTDOMAIN); ?></th>
		<td>
            <img id="thumb_preview" class="mvp-img-preview" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" alt="">
			<input type="text" id="thumb" name="thumb">
            <button type="button" id="thumb_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
            <button type="button" id="thumb_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>
            <p class="info"><?php esc_html_e('Thumbnail image for playlist.', MVP_TEXTDOMAIN); ?></p>
		</td>
	</tr>
    <tr valign="top" id="thumb_alt_field">
        <th><?php esc_html_e('Thumbnail alt text', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="alt_text" name="alt_text">
            <p class="info"><?php esc_html_e('Set alt text. Default is video title.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>
    <tr valign="top" id="hover_preview_field">
        <th><?php esc_html_e('Thumbnail hover preview', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="hover_preview" name="hover_preview">
            <button type="button" id="hover_preview_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
            <p class="info"><?php esc_html_e('Show animated preview when hovering over playlist item thumbnail. Upload gif or a small video.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>
	<tr valign="top" id="title_field">
		<th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
		<td>
			<textarea class="mvp-media-path-ta" id="title" name="title" rows="3"></textarea>
		</td>
	</tr>
	<tr valign="top" id="description_field">
		<th><?php esc_html_e('Description', MVP_TEXTDOMAIN); ?></th>
		<td>
			<textarea class="mvp-media-path-ta" id="description" name="description" rows="3"></textarea>
		</td>
	</tr>
	<tr valign="top" id="download_field">
		<th><?php esc_html_e('Download path', MVP_TEXTDOMAIN); ?></th>
		<td>
			<input type="text" id="download" name="download">
            <button type="button" id="download_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
		</td>
	</tr>
	<tr valign="top" id="start_field">
		<th><?php esc_html_e('Start time', MVP_TEXTDOMAIN); ?></th>
		<td>
			<input type="number" id="start" name="start" min="0" step="1"><br>
            <p class="info"><?php esc_html_e('You can use start and end time to loop video between 5 and 10 seconds for example.', MVP_TEXTDOMAIN); ?></p>
		</td>
	</tr>
	<tr valign="top" id="end_field">
		<th><?php esc_html_e('End time', MVP_TEXTDOMAIN); ?></th>
		<td>
			<input type="number" id="end" name="end" min="0" step="1"
		</td>
	</tr>
	<tr valign="top" id="playback_rate_field">
		<th><?php esc_html_e('Playback rate', MVP_TEXTDOMAIN); ?></th>
		<td>
			<input type="number" id="playback_rate" name="playback_rate" step="0.1">
		</td>
	</tr>

    <tr valign="top" id="playlist_icons_field">
        <th><?php esc_html_e('Additional playlist icons', MVP_TEXTDOMAIN); ?></th>
        <td>

          

            <div id="mvp-pi-table-wrap" class="mvp-value-table-wrap"></div>

            <p class="info"><?php esc_html_e('Create additional icons in playlist and attach url to them.', MVP_TEXTDOMAIN); ?></p>

            <button type="button" id="pi_add"><?php esc_html_e('Add icon', MVP_TEXTDOMAIN); ?></button><br><br>

            <table class="mvp-pi-table-orig" style="display:none;">
              <thead>
                <tr>
                  <th align="left"><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
                  <th align="left"><?php esc_html_e('Url', MVP_TEXTDOMAIN); ?></th>
                  <th align="left"><?php esc_html_e('Target', MVP_TEXTDOMAIN); ?></th>
                  <th align="left"><?php esc_html_e('Rel', MVP_TEXTDOMAIN); ?></th>
                  <th align="left"><?php esc_html_e('Icon', MVP_TEXTDOMAIN); ?></th>
                  <th align="left"><?php esc_html_e('Custom class', MVP_TEXTDOMAIN); ?></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              
              <tbody>
                <tr class="mvp-icon-table">

                  <td><input type="text" class="mvp-pi-title" placeholder="<?php esc_attr_e('Title shown on hover', MVP_TEXTDOMAIN); ?>"></td>

                  <td><input type="text" class="mvp-pi-url"></td>

                  <td><select class="mvp-pi-target">
                    <?php foreach ($target_arr as $key => $value) : ?>
                        <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                    <?php endforeach; ?>
                  </select>
                  </td>

                  <td><input type="text" class="mvp-pi-rel" placeholder="<?php esc_attr_e('rel attribute', MVP_TEXTDOMAIN); ?>"></td>

                  <td>
                    <input type="text" class="mvp-pi-icon"><br>

                    <p class="mvp-pi-icon-field">
                        <span class="mvp-pi-icon-preview"></span>
                        <button type="button" class="mvp-add-fa-icon mvp-is-pi"><?php esc_attr_e('Add Font Awesome', MVP_TEXTDOMAIN); ?></button>
                    </p>

                  </td>
                  
                  <td><input type="text" class="mvp-pi-class" placeholder="<?php esc_attr_e('custom class', MVP_TEXTDOMAIN); ?>"></td>

                  <td>

                      <button type="button" class="pi_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button>

                      <button type="button" class="mvp-pi-icon-sort"><?php esc_html_e('Sort', MVP_TEXTDOMAIN); ?></button>

                  </td>

                  
                </tr>

              </tbody>
            </table>

           

        </td>
    </tr>


	<tr valign="top" id="preview_seek_field">
		<th><?php esc_html_e('Seekbar preview thumbnail', MVP_TEXTDOMAIN); ?></th>
		<td>
			<input type="text" id="preview_seek" name="preview_seek">
            <button type="button" id="preview_seek_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
            <p class="info"><?php esc_html_e('Enable thumbnail preview when seeking. Enter "auto" for automatic thumbnails (only for HTML5 video) or provide vtt file with time/image data (for all media types).', MVP_TEXTDOMAIN); ?></p>
		</td>
	</tr>
	<tr valign="top" id="chapters_field">
		<th><?php esc_html_e('Chapters', MVP_TEXTDOMAIN); ?></th>
		<td>
			<input type="text" id="chapters" name="chapters">
            <button type="button" id="chapters_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
            <br>
            <label><input type="checkbox" id="chapters_cors" name="chapters_cors"><?php esc_html_e('Chapters require cors (is cross domain)', MVP_TEXTDOMAIN); ?></label>
            <br>
            <p class="info"><?php esc_html_e('Add video chapters. Requires vtt file with chapter data.', MVP_TEXTDOMAIN); ?></p>
		</td>
	</tr>

	<tr valign="top" id="subtitle_field">
		<th><?php esc_html_e('Subtitles', MVP_TEXTDOMAIN); ?></th>
		<td id="subtitle_content">

            <div class="subtitle_section_orig">
                <input type="text" class="subtitle_src" name="subtitle_src[]" pattern=".*\S+.*">
                <button class="subtitle_src_upload" name="subtitle_src_upload[]"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button><br>
                <input type="text" class="subtitle_label mvp-label-field" name="subtitle_label[]" placeholder="<?php esc_attr_e('Subtitle menu label', MVP_TEXTDOMAIN); ?>" pattern=".*\S+.*"><br>
                <div>
                    <label><input type="checkbox" class="subtitle_default" name="subtitle_default[]"><?php esc_html_e('Make this subtitle default on start', MVP_TEXTDOMAIN); ?></label>

                    <br>
                    <label><input type="checkbox" class="subtitle_cors" name="class[]"><?php esc_html_e('Subtitle requires cors (is cross domain)', MVP_TEXTDOMAIN); ?></label>

                </div>
                <button type="button" class="subtitle_field_remove"><?php esc_html_e('Remove subtitle', MVP_TEXTDOMAIN); ?></button>
            </div>

	        <button type="button" id="subtitle_field_add"><?php esc_html_e('Add subtitle', MVP_TEXTDOMAIN); ?></button><br>
	        <div style="clear:both"></div>
	        <p class="info"><?php esc_html_e('Add subtitle in srt / vtt format.', MVP_TEXTDOMAIN); ?></p>
		</td>
	</tr>

    <tr valign="top">
        <th><?php esc_html_e('Vast url', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="vast" name="vast">
            <button id="vast_upload" name="vast_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
            <p class="info"><?php esc_html_e('Add vast url (VAST / VMAP / IMA / VPAID)', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="duration_field">
        <th><?php esc_html_e('Duration', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="number" min="0" id="duration" name="duration">
            <p class="info duration-image-info"><?php esc_html_e('How long to show media, in seconds.', MVP_TEXTDOMAIN); ?></p>
            <p class="info duration-media-info"><?php esc_html_e('Media duration in seconds. Add duration manually for self hosted media if you want to show duration in video description.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top">
        <th><?php esc_html_e('Url link', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="link" name="link">
            <p class="info"><?php esc_html_e('Url link to open when you click on video area (Not valid for 360 videos and images). Can be used for clicktag ads.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>
    <tr valign="top"> 
        <th><?php esc_html_e('Url target', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="target" name="target">
                <?php foreach ($target_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
	<tr valign="top" id="end_link_field">
		<th><?php esc_html_e('End Url link', MVP_TEXTDOMAIN); ?></th>
		<td>
			<input type="text" id="end_link" name="end_link">
			<p class="info"><?php esc_html_e('Url link to open when media is finished.', MVP_TEXTDOMAIN); ?></p>
		</td>
	</tr>
	<tr valign="top" id="end_target_field">	
		<th><?php esc_html_e('End Url target', MVP_TEXTDOMAIN); ?></th>
		<td>
			<select id="end_target" name="end_target">
	            <?php foreach ($target_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
	        </select>
		</td>
	</tr>

    <tr valign="top" id="pwd_field">
        <th><?php esc_html_e('Password protected content', MVP_TEXTDOMAIN); ?></th>
        <td>
            <input type="text" id="pwd" name="pwd">
            <p class="info"><?php esc_html_e('Enter password to view this media.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="age-verify_field">
        <th><?php esc_html_e('Video requires age verification', MVP_TEXTDOMAIN); ?></th>
        <td>
            <select id="age_verify" name="age_verify">
                <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
            </select>
        </td>
    </tr>

    <tr valign="top" id="mvp_size_field">
        <th><?php esc_html_e('Video width and height [px]', MVP_TEXTDOMAIN); ?></th>
        <td>
            <p class="mvp-form-inline">
            <input type="number" min="0" step="1" id="width" name="width" placeholder="<?php esc_attr_e('width', MVP_TEXTDOMAIN); ?>">
            <input type="number" min="0" step="1" id="height" name="height" placeholder="<?php esc_attr_e('height', MVP_TEXTDOMAIN); ?>">
            </p>
            <p class="info"><?php esc_html_e('Only required if you want to apply Aspect ratio to Youtube and Vimeo videos, then you need to set video width and height values here.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

    <tr valign="top" id="additional_playlist_field">
        <th><strong><?php esc_html_e('Add video to additional playlists', MVP_TEXTDOMAIN); ?></strong></th>
        <td>
            <select id="mvp-add-media-playlist-list" multiple>
                <?php foreach($additional_playlists as $playlist) : ?>

                    <?php if($playlist['id'] != $playlist_id) : ?>
                    <option value="<?php echo($playlist['id']); ?>"><?php echo($playlist['title']); echo(' - ID #' . $playlist['id']); ?></option>
                    <?php endif; ?>    

                <?php endforeach; ?>    
            </select>

            <button type="button" id="mvp-clear-additional-playlist"><?php esc_html_e('Clear selected', MVP_TEXTDOMAIN); ?></button>

            <input type="hidden" id="mvp-additional-playlist">

            <p class="info"><?php esc_html_e('By default, media is added to current working playlist. You can select additional playlists to add this media to.', MVP_TEXTDOMAIN); ?></p>
        </td>
    </tr>

</table>

<input type="hidden" id="vimeo_account_type">
<input type="hidden" id="vimeo_upload_date">
