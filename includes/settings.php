<?php

$presets = array(
	'aviva' => 'aviva', 
    'vega' => 'vega', 
    'sirius' => 'sirius', 
    'pollux' => 'pollux', 
    'flat-dark' => 'flat dark', 
    'flat-light' => 'flat light', 
    'flat-gray' => 'flat gray', 
);

//load settings
$default_settings = mvp_get_settings();

$stmt = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);
if($stmt){
	$result = unserialize($stmt['options']);
	$settings = $result + $default_settings;
}else{
	$settings = $default_settings;
}

$global_custom_css = isset($settings['global_custom_css']) ? stripslashes($settings['global_custom_css']) : "";

?>


<div class="wrap">

	<?php include("notice.php"); ?>

	<h2><?php esc_html_e('Global settings', MVP_TEXTDOMAIN); ?></h2>

	<p></p>

	<?php if(!extension_loaded('zip')) : ?>
	  	<div class="notice notice-warning is-dismissible"> 
			<p><strong><?php esc_html_e('PHP zip extension not installed or enabled! Export player and playlist feature cannot be used.', MVP_TEXTDOMAIN); ?></strong></p>
		</div>
	<?php endif; ?>

	<form id="mvp-form-global-settings" method="post">

		<div class="mvp-admin">

            <div class="option-tab">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Credentials', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
		                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
		            </div>
                </div>
                <div class="option-content">
                    
                	<table class="form-table">
					    <tr valign="top">
					        <th><?php esc_html_e('Youtube application ID', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <input type="text" name="youtube_id" value="<?php if(isset($settings['youtube_id']))echo($settings['youtube_id']); ?>"><br>
					            <p class="info"><?php printf(__( 'Required if Youtube is used (not required if you just want to use Youtube single videos without API). Register <a href="%s" target="_blank">here</a> and create new project, enable YouTube Data API, go to Credentials, create API key. You can enter multiple keys separated by comma for quota backup.', MVP_TEXTDOMAIN), esc_url( 'https://console.developers.google.com' ));?></p>
					        </td>
					    </tr>
					    <tr valign="top">
					        <th><?php esc_html_e('Google Drive API key', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <input type="text" name="gdrive_app_id" value="<?php if(isset($settings['gdrive_app_id']))echo($settings['gdrive_app_id']); ?>"><br>
					            <p class="info"><?php printf(__( 'Required for Google drive music. Register <a href="%s" target="_blank">here</a>, create new project, enable Google Drive API, create Credentials, API key.', MVP_TEXTDOMAIN), esc_url( 'https://console.developers.google.com' ));?></p>
					        </td>
					    </tr>
					    <tr valign="top">
					        <th><?php esc_html_e('Vimeo Client Identifier', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <input type="text" name="vimeo_key" value="<?php if(isset($settings['vimeo_key']))echo($settings['vimeo_key']); ?>"><br>
					            <p class="info"><?php printf(__( 'Required if Vimeo is used (not required if you just want to use Vimeo single videos without API). Register <a href="%s" target="_blank">here</a> and get: Client Identifier, Client Secrets and Access Token with public and private scope.', MVP_TEXTDOMAIN), esc_url( 'https://developer.vimeo.com/apps/new' ));?></p>
					        </td>
					    </tr>
					    <tr valign="top">
					        <th><?php esc_html_e('Vimeo Client Secrets', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <input type="text" name="vimeo_secret" value="<?php if(isset($settings['vimeo_secret']))echo($settings['vimeo_secret']); ?>"><br>
					        </td>
					    </tr>
					    <tr valign="top">
					        <th><?php esc_html_e('Vimeo Access Token', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <input type="text" name="vimeo_token" value="<?php if(isset($settings['vimeo_token']))echo($settings['vimeo_token']); ?>"><br>
					        </td>
					    </tr>

					    <tr valign="top">
					        <th><?php esc_html_e('Amazon S3 user key', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <input type="text" name="s3k" value="<?php echo($settings['s3k']); ?>"><br>
					            <p class="info"><?php esc_html_e('Required for using videos from Amazon s3 private buckets. To get user credentials read plugin help / Working with media / Amazon S3 section.', MVP_TEXTDOMAIN); ?></p>
					        </td>
					    </tr>

					    <tr valign="top">
					        <th><?php esc_html_e('Amazon S3 user secret', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <input type="text" name="s3s" value="<?php echo($settings['s3s']); ?>"><br>
					        </td>
					    </tr>

					    <tr valign="top">
			                <th><?php esc_html_e('Cors url', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                    <input type="text" name="cors" value="<?php echo($settings['cors']); ?>">
			                    <p class="info"><?php esc_html_e('Cors url is used for loading video subtitles or chapters across domain.', MVP_TEXTDOMAIN); ?></p>
			                </td>
			            </tr>

					</table>

                </div>
            </div>

            <div class="option-tab-divider"></div>

            <div class="option-tab">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Watched percentage', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
		                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
		            </div>
                </div>
                <div class="option-content">

	           	    <table class="form-table" >

						<tr valign="top">
			                <th><?php esc_html_e('Clear watched percentage', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                    <button type="button" class="mvp-clear-watched-percentage-all">Clear</button><br>
			                    <span class="info"><?php esc_html_e('Player can display watched video percentage in playlist thumbnails (red line representing maximum reached time). Use this to clear watched percentage for all playlists.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/displayWatchedPercentage.jpg' ?>"/></p></div>
			                </td>
			            </tr>

			        </table>

				</div>
            </div>

            <div class="option-tab-divider"></div>

            <div class="option-tab">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Miscellaneous', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
		                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
		            </div>
                </div>
                <div class="option-content">
                    
                    <table class="form-table">

                    	<tr valign="top">
			                <th><?php esc_html_e('Delete plugin data on uninstall', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                	<select name="delete_plugin_data_on_uninstall">
					                <option value="0" <?php if(isset($settings['delete_plugin_data_on_uninstall']) && $settings['delete_plugin_data_on_uninstall'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
					                <option value="1" <?php if(isset($settings['delete_plugin_data_on_uninstall']) && $settings['delete_plugin_data_on_uninstall'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
					            </select><br>
					            <p class="info"><?php esc_html_e('This will delete all plugin data (players, playlists, videos...) when plugin is uninstalled.', MVP_TEXTDOMAIN); ?></p>
			                </td>
			            </tr>

                		<tr valign="top">
					        <th><?php esc_html_e('Youtube No Cookie', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <select name="youtube_no_cookie">
					                <option value="0" <?php if(isset($settings['youtube_no_cookie']) && $settings['youtube_no_cookie'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
					                <option value="1" <?php if(isset($settings['youtube_no_cookie']) && $settings['youtube_no_cookie'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
					            </select><br>
					            <p class="info"><?php esc_html_e('Serve Youtube videos from No Cookie domain', MVP_TEXTDOMAIN); ?></p>
					        </td>
					    </tr>

					    <tr valign="top">
					        <th><?php esc_html_e('Vimeo No Cookie', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <select name="vimeo_no_cookie">
					                <option value="0" <?php if(isset($settings['vimeo_no_cookie']) && $settings['vimeo_no_cookie'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
					                <option value="1" <?php if(isset($settings['vimeo_no_cookie']) && $settings['vimeo_no_cookie'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
					            </select><br>
					            <p class="info"><?php esc_html_e('Whether to prevent Vimeo player from tracking session data, including cookies. Keep in mind that setting this argument to true also blocks video stats.', MVP_TEXTDOMAIN); ?></p>
					        </td>
					    </tr>

					    <tr valign="top">
					        <th><?php esc_html_e('Insert javascript into footer', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <select name="js_to_footer">
					                <option value="0" <?php if(isset($settings['js_to_footer']) && $settings['js_to_footer'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
					                <option value="1" <?php if(isset($settings['js_to_footer']) && $settings['js_to_footer'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
					            </select><br>
					            <p class="info"><?php esc_html_e('Putting the js to footer (instead of the head) can fix some javascript conflicts.', MVP_TEXTDOMAIN); ?></p>
					        </td>
					    </tr>

					    <tr valign="top">
					        <th><?php esc_html_e('jQuery No Conflict mode', MVP_TEXTDOMAIN); ?></th>
					        <td>
					            <select name="no_conflict">
					                <option value="0" <?php if(isset($settings['no_conflict']) && $settings['no_conflict'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
					                <option value="1" <?php if(isset($settings['no_conflict']) && $settings['no_conflict'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
					            </select><br>
					            <p class="info"><?php esc_html_e('Can fix some javascript conflicts on the page.', MVP_TEXTDOMAIN); ?></p>
					        </td>
					    </tr>

					    <tr valign="top">
			                <th><?php esc_html_e('Toggle playback between multiple instances', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                    <select name="togglePlaybackOnMultipleInstances">
			                        <option value="0" <?php if(isset($settings['togglePlaybackOnMultipleInstances']) && $settings['togglePlaybackOnMultipleInstances'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
			                        <option value="1" <?php if(isset($settings['togglePlaybackOnMultipleInstances']) && $settings['togglePlaybackOnMultipleInstances'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
			                    </select><br>
			                    <p class="info"><?php esc_html_e('Pause playback if other instance playback is started in the same page', MVP_TEXTDOMAIN); ?></p>
			                </td>
			            </tr>

			            <tr valign="top">
			                <th><?php esc_html_e('Display all playlists in page', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                    <select name="displayAllPlaylistsInPage">
			                        <option value="0" <?php if(isset($settings['displayAllPlaylistsInPage']) && $settings['displayAllPlaylistsInPage'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
			                        <option value="1" <?php if(isset($settings['displayAllPlaylistsInPage']) && $settings['displayAllPlaylistsInPage'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
			                    </select><br>
			                    <span class="info"><?php esc_html_e('If true, display all playlists in page (from Playlist manager) when player runs. Useful if you want to use API method loadPlaylist (playlist-ID) on run-time. If false, display just active playlist from shortcode.', MVP_TEXTDOMAIN); ?></span>
			                </td>
			            </tr>

			            <tr valign="top">
			                <th><?php esc_html_e('Cache playlist in browser', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                    <select name="useCache">
			                        <option value="0" <?php if(isset($settings['useCache']) && $settings['useCache'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
			                        <option value="1" <?php if(isset($settings['useCache']) && $settings['useCache'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
			                    </select><br>
			                    <span class="info"><?php esc_html_e('Cache playlist in browser to limit api requests for Youtube, Vimeo and other services.', MVP_TEXTDOMAIN); ?></span>
			                </td>
			            </tr>

			            <tr valign="top">
			                <th><?php esc_html_e('Cache time', MVP_TEXTDOMAIN); ?></th>
			                <td>
							<input type="number" min="0" name="cacheTime" value="<?php echo isset($settings['cacheTime']) ? esc_attr($settings['cacheTime']) : '60'; ?>"><br>
							<span class="info"><?php esc_html_e('How long to cache playlist in browser. For example, if you load a Youtube playlist or a Vimeo channel, and set cacheTime:3600 (1 hour), everytime the page is reloaded within that hour, playlist will be loaded from cache.', MVP_TEXTDOMAIN); ?></span>
			                </td>
			            </tr>

			            <tr valign="top">
			                <th><?php esc_html_e('Override wordpress default video', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                    <select name="overide_wp_video">
			                        <option value="0" <?php if(isset($settings['overide_wp_video']) && $settings['overide_wp_video'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
			                        <option value="1" <?php if(isset($settings['overide_wp_video']) && $settings['overide_wp_video'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
			                    </select><br>
			                    <p class="info"><?php esc_html_e('Override wordpress videos in post with this player (html5, youtube, vimeo).', MVP_TEXTDOMAIN); ?></p>
			                </td>
			            </tr>

			            <tr valign="top">
			                <th><?php esc_html_e('Override wordpress default video skin', MVP_TEXTDOMAIN); ?></th>
							<td>
								<select name="overide_wp_video_skin">
									<?php foreach ($presets as $key => $value) : ?>
						                <option value="<?php echo($key); ?>" <?php if(isset($settings['overide_wp_video_skin']) && $settings['overide_wp_video_skin'] == $key) echo 'selected' ?>><?php echo(esc_html_e($value)); ?></option>
						            <?php endforeach; ?>
					            </select><br>
					            <p class="info"><?php esc_html_e('Select skin when override wordpress videos is used. Note: Vimeo chromeless skin is only available for videos hosted by a Plus account or higher. Note: if you are using 360 Virtual reality video, you need to add this attribute in shortcode is360="1"', MVP_TEXTDOMAIN); ?></p>
				            </td>
			            </tr>

			            <tr valign="top">
			                <th><?php esc_html_e('Add Font Awesome css for playlist icons.', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                	<select name="add_font_awesome_css">
			                        <option value="0" <?php if(isset($settings['add_font_awesome_css']) && $settings['add_font_awesome_css'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
			                        <option value="1" <?php if(isset($settings['add_font_awesome_css']) && $settings['add_font_awesome_css'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
			                    </select><br>
			                    <p class="info"><?php esc_html_e('Enqueue Font Awesome css that will be used for custom playlist icons.', MVP_TEXTDOMAIN); ?></p>
			                </td>
			            </tr>

			            <tr valign="top">
			                <th><?php esc_html_e('Font Awesome css url', MVP_TEXTDOMAIN); ?></th>
			                <td>
			                	<input name="fontAwesomeCssUrl" type="text" value="<?php echo($settings['fontAwesomeCssUrl']); ?>">
			                </td>
			            </tr>

					</table>

                </div>
            </div>

            <div class="option-tab-divider"></div>

            <div class="option-tab">
                <div class="option-toggle">
                    <span class="option-title"><?php esc_html_e('Global CSS', MVP_TEXTDOMAIN); ?></span>

                    <div class="option-toggle-icon">
		                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
		            </div>
                </div>
                <div class="option-content">

	           	    <p class="info"><?php esc_html_e('Add custom CSS that will apply to all players.', MVP_TEXTDOMAIN); ?></p>

                    <textarea id="mvp_global_custom_css_field" ><?php echo(esc_textarea($global_custom_css)); ?></textarea>

				</div>
            </div>

        </div>

        <div id="mvp-sticky-action" class="mvp-sticky">
            <div id="mvp-sticky-action-inner">
               
                <button id="mvp-edit-global-options-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Save Changes', MVP_TEXTDOMAIN); ?></button> 
            </div>
        </div>

        <div id="mvp-save-holder"></div>

	</form>
	
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