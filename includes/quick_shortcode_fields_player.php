
	    	<table class="form-table">

	    		<tr valign="top" id="mvp-preset-field">
					<th><?php esc_html_e('Select skin', MVP_TEXTDOMAIN); ?></th>
					<td>
						<select id="preset" name="preset">
							<?php foreach ($options['presets'] as $key => $value) : ?>
				                <option value="<?php echo($key); ?>"><?php echo(esc_html_e($value)); ?></option>
				            <?php endforeach; ?>
			            </select><br>
		            </td>
				</tr>

		        <tr valign="top">
		            <th><?php esc_html_e('Select layout', MVP_TEXTDOMAIN); ?></th>
		            <td>
		                <select id="playlistPosition" name="playlistPosition">
		                    <?php foreach ($options['playlistPositionArr'] as $key => $value) : ?>
		                        <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </td>
		        </tr>

		        <tr valign="top">
		            <th></th>
		            <td>
		                <img id="playlist-position-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="playlist position"/>
		                <p class="info playlist-position-info" id="vrb-info"><?php esc_html_e('Vertical playlist on the right, on narrow screens playlist goes below the player.', MVP_TEXTDOMAIN); ?></p>
		                <p class="info playlist-position-info" id="vb-info"><?php esc_html_e('Vertical playlist below the player.', MVP_TEXTDOMAIN); ?></p>
		                <p class="info playlist-position-info" id="hb-info"><?php esc_html_e('Horizontal playlist below the player.', MVP_TEXTDOMAIN); ?></p>
		                <p class="info playlist-position-info" id="outer-info"><?php esc_html_e('Playlist below player, endless scroll.', MVP_TEXTDOMAIN); ?></p>
		                <p class="info playlist-position-info" id="wall-info"><?php esc_html_e('Grid grid with player opening as lightbox.', MVP_TEXTDOMAIN); ?></p>
		                <p class="info playlist-position-info" id="no-playlist-info"><?php esc_html_e('No playlist (use just player).', MVP_TEXTDOMAIN); ?></p>
		            </td>
		        </tr>
		    

		        <tr valign="top" id="playlistStyle-field">
		            <th><?php esc_html_e('Select playlist items style', MVP_TEXTDOMAIN); ?></th>
		            <td>
		                <select id="playlistStyle" name="playlistStyle">
		                    <?php foreach ($options['playlistStyleArr'] as $key => $value) : ?>
		                        <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </td>
		        </tr>

		        <tr valign="top" id="playlistStyle-field2">
		            <th></th>
		            <td>
		                <img id="playlist-style-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="playlist position"/>
		                <p class="info playlist-style-info" id="desc-next-to-thumb-info"><?php esc_html_e('Description right of thumbnail.', MVP_TEXTDOMAIN); ?></p>
		                <p class="info playlist-style-info" id="desc-over-thumb-info"><?php esc_html_e('Description over thumbnail.', MVP_TEXTDOMAIN); ?></p>
		            </td>
		        </tr>

		        <tr valign="top" id="playlistGridStyle-field">
		            <th><?php esc_html_e('Select playlist items style', MVP_TEXTDOMAIN); ?></th>
		            <td>
		                <select id="playlistGridStyle" name="playlistGridStyle">
		                    <?php foreach ($options['playlistGridStyleArr'] as $key => $value) : ?>
		                        <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </td>
		        </tr>

		        <tr valign="top" id="playlistGridStyle-field2">
		            <th></th>
		            <td>
		                <img id="playlist-grid-style-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="playlist position"/>
		                <p class="info playlist-grid-style-info" id="grid-desc-over-thumb-info"><?php esc_html_e('Description over thumbnail.', MVP_TEXTDOMAIN); ?></p>
		                <p class="info playlist-grid-style-info" id="grid-desc-below-thumb-info"><?php esc_html_e('Description below thumbnail.', MVP_TEXTDOMAIN); ?></p>
		            </td>
		        </tr>

		        <tr valign="top" id="playlistOpened_field">
	                <th><?php esc_html_e('Playlist opened on start', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="playlistOpened">
	                        <option value="0" <?php if(isset($options['playlistOpened']) && $options['playlistOpened'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['playlistOpened']) && $options['playlistOpened'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Choose whether the playlist is visible on player start.', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

		        <tr valign="top">
		            <th><?php esc_html_e('Player ratio', MVP_TEXTDOMAIN); ?></th>
		            <td>
		                <input type="number" name="playerRatio" step="any" value="<?php echo($options['playerRatio']); ?>"><br>
		                <span class="info"><?php esc_html_e('Aspect ratio of video area. Set video area ratio to fit your videos, for example 1.333333 = 4/3. Default is 16/9 (1.777777)', MVP_TEXTDOMAIN); ?></span>
		            </td>
	        	</tr>

	        	<tr valign="top">
	                <th><?php esc_html_e('Auto play', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="autoPlay">
	                        <option value="0" <?php if(isset($options['autoPlay']) && $options['autoPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['autoPlay']) && $options['autoPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Auto play media. This will mute video which is required for autoplay.', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Auto play in viewport', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="autoPlayInViewport">
	                        <option value="0" <?php if(isset($options['autoPlayInViewport']) && $options['autoPlayInViewport'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['autoPlayInViewport']) && $options['autoPlayInViewport'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Start playing media when player is visible on the page when user scrolls down the page.', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Random play', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="randomPlay">
	                        <option value="0" <?php if(isset($options['randomPlay']) && $options['randomPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['randomPlay']) && $options['randomPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Randomize playback of videos in playlist.', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Youtube player type', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="youtubePlayerType" id="youtubePlayerType">
	                        <?php foreach ($options['iframePlayerType'] as $key => $value) : ?>
	                            <option value="<?php echo($key); ?>" <?php if(isset($options['youtubePlayerType']) && $options['youtubePlayerType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
	                        <?php endforeach; ?>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Youtube player type. Chromeless has custom controls.', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Vimeo player type', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="vimeoPlayerType" id="vimeoPlayerType">
	                        <?php foreach ($options['iframePlayerType'] as $key => $value) : ?>
	                            <option value="<?php echo($key); ?>" <?php if(isset($options['vimeoPlayerType']) && $options['vimeoPlayerType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
	                        <?php endforeach; ?>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Vimeo player type. Chromeless is only available for videos hosted by a Plus account or higher!', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

	            <tr valign="top">
                    <th><?php esc_html_e('Choose player language', MVP_TEXTDOMAIN); ?></th>
                    <td>
                        <select name="playerLanguage" id="playerLanguage">
                            <?php foreach ($playerLanguageArr as $key => $value) : ?>
                                <option value="<?php echo($key); ?>" <?php if(isset($options['playerLanguage']) && $options['playerLanguage'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

	        </table>

	        <p class="info mvp-table-title"><?php esc_html_e('Choose which elements to display in the player', MVP_TEXTDOMAIN); ?></p>

	        <table class="form-table">

	        	<tr valign="top">
	                <th><?php esc_html_e('Use social sharing in player', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useShare" id="useShare">
	                        <option value="0" <?php if(isset($options['useShare']) && $options['useShare'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useShare']) && $options['useShare'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <?php include("player_use_elements.php"); ?>

	    	</table> 	
