<p class="info ad-header"><?php esc_html_e('Adverts can be video, audio, image, Youtube single video or Vimeo single video with chromeless player. They can be added before main media starts, during main media play and after main media ends. Drag adverts up and down to change order.', MVP_TEXTDOMAIN); ?></p> 

<hr>

<div id="ad-section-pre-content">

	<p class="info"><?php esc_html_e('Add preroll advert that will play before main media starts. If multiple are added, they will play in sequence and after they all finish, main video will start.', MVP_TEXTDOMAIN); ?></p>
	<div class="mvp-preroll-content"></div>
	<button type="button" class="preroll-source-add"><?php esc_html_e('Add preroll', MVP_TEXTDOMAIN); ?></button><br>

	<table class="form-table">

		<tr valign="top">
	        <th><?php esc_html_e('Randomize prerolls', MVP_TEXTDOMAIN); ?></th>
	        <td>
				<select id="randomizeAdPre" name="randomizeAdPre">
	                <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	            </select><br>
	            <p class="info"><?php esc_html_e('If you have multiple prerolls, randomize their order.', MVP_TEXTDOMAIN); ?></p>
	        </td>
	    </tr>

	</table>

	<hr>

</div>

<div id="ad-section-mid-content">

	<p class="info"><?php esc_html_e('Add midroll advert that will play during main media. Midrolls are always sorted by Start time.', MVP_TEXTDOMAIN); ?></p>
	<div class="mvp-midroll-content"></div>
	<button type="button" class="midroll-source-add"><?php esc_html_e('Add midroll', MVP_TEXTDOMAIN); ?></button><br>

	<br>
	<hr>

</div>

<div id="ad-section-end-content">

	<br>
	<p class="info"><?php esc_html_e('Add endroll advert that will play after main media ends. If multiple are added, they will play in sequence and after they all finish, next media will be called.', MVP_TEXTDOMAIN); ?></p>
	<div class="mvp-endroll-content"></div>
	<button type="button" class="endroll-source-add"><?php esc_html_e('Add endroll', MVP_TEXTDOMAIN); ?></button><br>

	<table class="form-table" >

		<tr valign="top">
	        <th><?php esc_html_e('Randomize endrolls', MVP_TEXTDOMAIN); ?></th>
	        <td>
				<select id="randomizeAdEnd" name="randomizeAdEnd">
	                <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
	                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
	            </select><br>
	            <p class="info"><?php esc_html_e('If you have multiple endrolls, randomize their order.', MVP_TEXTDOMAIN); ?></p>
	        </td>
	    </tr>

	</table>

</div>	

<div class="option-tab mvp-ad-source-orig" style="display:none;">

	<div class="option-toggle">
		<span class="option-title"></span>
        
        <div class="option-toggle-icon">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
        </div>
	</div>

    <div class="option-content">

    	<p class="info mvp-ri"><?php esc_html_e('* required fields', MVP_TEXTDOMAIN); ?></p>

    	<table class="form-table ad-section-table">

            <tr valign="top">
            	<th><?php esc_html_e('Select media type', MVP_TEXTDOMAIN); ?></th>
				<td>
                	<select class="ad_type ad_elem" name="" data-cname="type">
		                <optgroup label="video">
                            <option value="video"><?php esc_html_e('video', MVP_TEXTDOMAIN); ?></option>
                        </optgroup>
                        <optgroup label="audio">
                            <option value="audio"><?php esc_html_e('audio', MVP_TEXTDOMAIN); ?></option>
                        </optgroup>
                        <optgroup label="image">
                            <option value="image"><?php esc_html_e('image', MVP_TEXTDOMAIN); ?></option>
                        </optgroup>
			            <optgroup label="youtube">
                            <option value="youtube_single"><?php esc_html_e('Youtube single video', MVP_TEXTDOMAIN); ?></option>
                        </optgroup>
                        <optgroup label="vimeo">
                            <option value="vimeo_single"><?php esc_html_e('Vimeo single video', MVP_TEXTDOMAIN); ?></option>
                        </optgroup>
		            </select>
	        	</td>
			</tr>    
            <tr valign="top">
				<th><?php esc_html_e('Path *', MVP_TEXTDOMAIN); ?></th>
				<td>
					<img class="ad_path_preview mvp-img-preview" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" alt="">
		            <input type="text" class="ad_path ad_elem" name="" data-cname="path" pattern=".*\S+.*" value="">
		            <button class="ad_path_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button><br>

		            <p class="info ad_video_info"><?php esc_html_e('Enter video url', MVP_TEXTDOMAIN); ?></p>
		            <p class="info ad_audio_info"><?php esc_html_e('Enter audio url', MVP_TEXTDOMAIN); ?></p>
		            <p class="info ad_image_info"><?php esc_html_e('Enter image url', MVP_TEXTDOMAIN); ?></p>
		            <p class="info ad_yt_single_info"><?php esc_html_e('Enter youtube video ID. For example, video ID is bold part:', MVP_TEXTDOMAIN); ?><br> <span class="info-light">https://www.youtube.com/watch?v=</span><span class="info-highlight2">tb935IxGBt4</span></p>
		            <p class="info ad_vim_single_info"><?php esc_html_e('Note: Vimeo player needs to be chromeless for adverts to work!', MVP_TEXTDOMAIN); ?><br><?php esc_html_e('Enter vimeo video ID. For example, video ID is bold part:', MVP_TEXTDOMAIN); ?><br> <span class="info-light">https://vimeo.com/</span><span class="info-highlight2">279267531</span></p>

	            </td>
			</tr>
			<tr valign="top" class="ad_is360_field">
				<th><?php esc_html_e('Is 360', MVP_TEXTDOMAIN); ?></th>
				<td>
		            <select class="ad_is360 ad_elem" name="" data-cname="is360">
			            <option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
		                <option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
			        </select>
		            <p class="info"><?php esc_html_e('Is 360 virtual reality video or image panorama.', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>
			<tr valign="top" class="ad_vrMode_field">
				<th><?php esc_html_e('Virtual reality mode', MVP_TEXTDOMAIN); ?></th>
				<td>
		            <select class="ad_vrMode ad_elem" name="" data-cname="vrMode">
			            <option value="monoscopic"><?php esc_html_e('monoscopic', MVP_TEXTDOMAIN); ?></option>
                		<option value="stereoscopic"><?php esc_html_e('stereoscopic', MVP_TEXTDOMAIN); ?></option>
			        </select>
		            <p class="info"><?php esc_html_e('Select virtual reality video mode.', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>
			<tr valign="top" class="ad_poster_field">
				<th><?php esc_html_e('Poster', MVP_TEXTDOMAIN); ?></th>
				<td>
					<img class="ad_poster_preview mvp-img-preview" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" alt="">
					<input type="text" class="ad_poster ad_elem" name="" data-cname="poster" placeholder="<?php esc_attr_e('Enter poster path', MVP_TEXTDOMAIN); ?>">
		            <button class="ad_poster_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button><br>
		            <p class="info"><?php esc_html_e('Poster is shown in video area while audio plays.', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>
			<tr valign="top" class="ad_duration_field">
				<th><?php esc_html_e('Duration *', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="number" min="0" class="ad_duration ad_elem" name="" data-cname="duration" placeholder="<?php esc_attr_e('Enter duration', MVP_TEXTDOMAIN); ?>">
		            <p class="info"><?php esc_html_e('How long to show the image, in seconds. Rounded to full second.', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>
			<tr valign="top" class="ad_begin_field">
				<th><?php esc_html_e('Start time *', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="text" class="ad_begin ad_elem" name="" data-cname="begin" placeholder="<?php esc_attr_e('Enter start time', MVP_TEXTDOMAIN); ?>">
		            <p class="info"><?php esc_html_e('When to start mid roll, in seconds or percentage for example (30%).', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>
			<tr valign="top" class="ad_skip_enable_field">
				<th><?php esc_html_e('Skip time', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="text" class="ad_skip_enable ad_elem" name="" data-cname="skip_enable" placeholder="<?php esc_attr_e('Enter skip time', MVP_TEXTDOMAIN); ?>">
		            <p class="info"><?php esc_html_e('When to show skip advert button, in seconds or percentage for example (30%). Leave empty and no skip button will be shown. Zero means skip button is shown from the start.', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>
			<tr valign="top">
				<th><?php esc_html_e('Url link', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="text" class="mvp_ad_link ad_elem" name="" data-cname="link" placeholder="<?php esc_attr_e('Enter url link', MVP_TEXTDOMAIN); ?>">

					<select class="ad_target ad_elem" name="" data-cname="target">
			            <option value="_blank"><?php esc_html_e('blank', MVP_TEXTDOMAIN); ?></option>
			            <option value="_parent"><?php esc_html_e('parent', MVP_TEXTDOMAIN); ?></option>
			        </select>

			        <input type="text" class="ad_rel ad_elem" name="" data-cname="target" placeholder="<?php esc_attr_e('rel attribute', MVP_TEXTDOMAIN); ?>">

					<p class="info"><?php esc_html_e('Url link to open when ad is paused (user clicks on the ad).', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>

		</table>

   		<button type="button" class="ad-source-remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button>

   	</div>	

</div>
