
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

		        <tr valign="top" id="gridType_field">
		            <th><?php esc_html_e('Choose grid type', MVP_TEXTDOMAIN); ?></th>
		            <td>
		                <select name="gridType" id="gridType">
		                    <?php foreach ($options['gridTypeArr'] as $key => $value) : ?>
		                        <option value="<?php echo($key); ?>" <?php if(isset($options['gridType']) && $options['gridType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
		                    <?php endforeach; ?>
		                </select>
		                <p class="info"><?php esc_html_e('Javascript grid uses mathematical breakpoints for grid positioning. CSS grid use css for grid styling. Masonry grid is also available. If your images are different dimensions (different widths or heights) its advisable to try CSS column count or Masonry grid.', MVP_TEXTDOMAIN); ?></p>
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
		            <th><?php esc_html_e('elect playlist items style', MVP_TEXTDOMAIN); ?></th>
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

		        <tr valign="top" id="navigationType-field">
		            <th><?php esc_html_e('Select playlist navigation type', MVP_TEXTDOMAIN); ?></th>
		            <td>
		                <select id="navigationType" name="navigationType">
		                    <?php foreach ($options['navigationTypeArr'] as $key => $value) : ?>
		                        <option value="<?php echo($key); ?>" <?php if(isset($options['navigationType']) && $options['navigationType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
		                    <?php endforeach; ?>
		                </select>
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

	            <tr valign="top">
	                <th><?php esc_html_e('Use big play button', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useBigPlay">
	                        <option value="0" <?php if(isset($options['useBigPlay']) && $options['useBigPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useBigPlay']) && $options['useBigPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Show big play button in the center before media starts and when paused.', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use seekbar', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useSeekbar">
	                        <option value="0" <?php if(isset($options['useSeekbar']) && $options['useSeekbar'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useSeekbar']) && $options['useSeekbar'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use bottom seekbar (shown when main controls hide)', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useSoloSeekbar">
	                        <option value="0" <?php if(isset($options['useSoloSeekbar']) && $options['useSoloSeekbar'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useSoloSeekbar']) && $options['useSoloSeekbar'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use play button', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="usePlay">
	                        <option value="0" <?php if(isset($options['usePlay']) && $options['usePlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['usePlay']) && $options['usePlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Use small play button.', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use next button', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useNext">
	                        <option value="0" <?php if(isset($options['useNext']) && $options['useNext'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useNext']) && $options['useNext'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use previous button', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="usePrevious">
	                        <option value="0" <?php if(isset($options['usePrevious']) && $options['usePrevious'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['usePrevious']) && $options['usePrevious'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use rewind button', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useRewind">
	                        <option value="0" <?php if(isset($options['useRewind']) && $options['useRewind'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useRewind']) && $options['useRewind'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use skip backward button (x seconds)', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useSkipBackward">
	                        <option value="0" <?php if(isset($options['useSkipBackward']) && $options['useSkipBackward'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useSkipBackward']) && $options['useSkipBackward'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use skip forward button (x seconds)', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useSkipForward">
	                        <option value="0" <?php if(isset($options['useSkipForward']) && $options['useSkipForward'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useSkipForward']) && $options['useSkipForward'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use current and total time', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useTime">
	                        <option value="0" <?php if(isset($options['useTime']) && $options['useTime'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useTime']) && $options['useTime'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use volume button', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useVolume">
	                        <option value="0" <?php if(isset($options['useVolume']) && $options['useVolume'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useVolume']) && $options['useVolume'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use volume seekbar', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useVolumeSeekbar">
	                        <option value="0" <?php if(isset($options['useVolumeSeekbar']) && $options['useVolumeSeekbar'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useVolumeSeekbar']) && $options['useVolumeSeekbar'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use unmute button', MVP_TEXTDOMAIN); ?></th>
	                <td>
	                    <select name="useUnmuteBtn">
	                        <option value="0" <?php if(isset($options['useUnmuteBtn']) && $options['useUnmuteBtn'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useUnmuteBtn']) && $options['useUnmuteBtn'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Use unmute button to unmute the video. Button will be shown above the player if Auto play is true and video starts muted.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/useUnmuteBtn.jpg' ?>"/></p></div>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use download button', MVP_TEXTDOMAIN); ?></th>    
	                <td>
	                    <select name="useDownload">
	                        <option value="0" <?php if(isset($options['useDownload']) && $options['useDownload'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useDownload']) && $options['useDownload'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use info button (video description)', MVP_TEXTDOMAIN); ?></th>          
	                <td>
	                    <select name="useInfo">
	                        <option value="0" <?php if(isset($options['useInfo']) && $options['useInfo'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useInfo']) && $options['useInfo'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use fullscreen button', MVP_TEXTDOMAIN); ?></th>   
	                <td>
	                    <select name="useFullscreen">
	                        <option value="0" <?php if(isset($options['useFullscreen']) && $options['useFullscreen'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useFullscreen']) && $options['useFullscreen'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use picture in picture button', MVP_TEXTDOMAIN); ?></th>         
	                <td>
	                    <select name="usePip">
	                        <option value="0" <?php if(isset($options['usePip']) && $options['usePip'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['usePip']) && $options['usePip'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use theater mode button', MVP_TEXTDOMAIN); ?></th>         
	                <td>
	                    <select name="useTheaterMode">
	                        <option value="0" <?php if(isset($options['useTheaterMode']) && $options['useTheaterMode'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useTheaterMode']) && $options['useTheaterMode'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use Chromecast button for casting', MVP_TEXTDOMAIN); ?></th>   
	                <td>
	                    <select name="useCasting">
	                        <option value="0" <?php if(isset($options['useCasting']) && $options['useCasting'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useCasting']) && $options['useCasting'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>


	            <tr valign="top">
	                <th><?php esc_html_e('Use playback rate menu', MVP_TEXTDOMAIN); ?></th>      
	                <td>
	                    <select name="usePlaybackRate">
	                        <option value="0" <?php if(isset($options['usePlaybackRate']) && $options['usePlaybackRate'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['usePlaybackRate']) && $options['usePlaybackRate'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use quality menu', MVP_TEXTDOMAIN); ?></th>      
	                <td>
	                    <select name="useQuality">
	                        <option value="0" <?php if(isset($options['useQuality']) && $options['useQuality'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useQuality']) && $options['useQuality'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use captions menu', MVP_TEXTDOMAIN); ?></th>         
	                <td>
	                    <select name="useSubtitle">
	                        <option value="0" <?php if(isset($options['useSubtitle']) && $options['useSubtitle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useSubtitle']) && $options['useSubtitle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use quick caption toggle button', MVP_TEXTDOMAIN); ?></th>         
	                <td>
	                    <select name="useCc">
	                        <option value="0" <?php if(isset($options['useCc']) && $options['useCc'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useCc']) && $options['useCc'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select>
	                    <p class="info"><?php esc_html_e('Show button to toggle caption state on/off (remember last used subtitle).', MVP_TEXTDOMAIN); ?></p>
	                </td>
	            </tr>
	            
	            <tr valign="top">
	                <th><?php esc_html_e('Use audio language menu (for live streaming)', MVP_TEXTDOMAIN); ?></th>         
	                <td>
	                    <select name="useAudioLanguage">
	                        <option value="0" <?php if(isset($options['useAudioLanguage']) && $options['useAudioLanguage'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['useAudioLanguage']) && $options['useAudioLanguage'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                </td>
	            </tr>

	            <tr valign="top">
	                <th><?php esc_html_e('Use playlist toggle button', MVP_TEXTDOMAIN); ?></th>         
	                <td>
	                    <select name="usePlaylistToggle">
	                        <option value="0" <?php if(isset($options['usePlaylistToggle']) && $options['usePlaylistToggle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                        <option value="1" <?php if(isset($options['usePlaylistToggle']) && $options['usePlaylistToggle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	                    </select><br>
	                    <span class="info"><?php esc_html_e('Open / close playlist button.', MVP_TEXTDOMAIN); ?></span>
	                </td>
	            </tr>

	    	</table> 	
