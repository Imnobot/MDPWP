<p class="info ad-info"><?php esc_html_e('Popups can be image, iframe, AdSense or any HTML placed over video area during playback. Popups can appear on video pause or on defined start time. Video is paused while popup is shown. Only one popup can be shown at a time. Popups are always centered above the video area.', MVP_TEXTDOMAIN); ?></p> 


<div class="mvp-popup-content"></div>
<button type="button" class="popup-add"><?php esc_html_e('Add popup', MVP_TEXTDOMAIN); ?></button><br>

<div class="option-tab mvp-popup-source-orig" style="display:none;">

	<div class="option-toggle">
		<div class="mvp-checkbox"></div>
		<div class="option-toggle-wrap">	
			<span class="option-title"></span>

	        <div class="option-toggle-icon">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            </div>
	    </div>
    </div>

    <div class="option-content">

    	<p class="info mvp-ri"><?php esc_html_e('* required fields', MVP_TEXTDOMAIN); ?></p>

    	<table class="form-table">

			<tr valign="top">
            	<th><?php esc_html_e('Popup type', MVP_TEXTDOMAIN); ?></th>
				<td>
                	<select class="popup_type popup_elem" name="" data-cname="type">
                        <option value="image"><?php esc_html_e('image', MVP_TEXTDOMAIN); ?></option>
                        <option value="iframe"><?php esc_html_e('iframe', MVP_TEXTDOMAIN); ?></option>
                        <option value="html"><?php esc_html_e('HTML', MVP_TEXTDOMAIN); ?></option>
                        <option value="shortcode"><?php esc_html_e('shortcode', MVP_TEXTDOMAIN); ?></option>
                        <option value="adsense-detail"><?php esc_html_e('AdSense details', MVP_TEXTDOMAIN); ?></option>
                        <option value="adsense-code"><?php esc_html_e('AdSense full code', MVP_TEXTDOMAIN); ?></option>
		            </select>
		            <p class="info popup_adsense_detail_info"><?php esc_html_e('Enter AdSense details (client, slot, width and height)', MVP_TEXTDOMAIN); ?></p>

		            <input type="hidden" class="display_type" name="display_type" value="popup">
	        	</td>
			</tr>  

            <tr valign="top" class="popup_path_field">
				<th><?php esc_html_e('Content *', MVP_TEXTDOMAIN); ?></th>
				<td>
					<img class="popup_path_preview mvp-img-preview" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" alt="">
					<textarea class="popup_path popup_elem" name="" data-cname="path" rows="3"></textarea> 
		            <button type="button" class="popup_path_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
		            <button type="button" class="popup_path_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>

		            <p class="info popup_image_info"><?php esc_html_e('Enter image url', MVP_TEXTDOMAIN); ?></p>

		            <p class="info popup_iframe_info"><?php esc_html_e('Enter iframe src attribute ONLY!', MVP_TEXTDOMAIN); ?></p>

		            <p class="info popup_shortcode_info"><?php esc_html_e('Add shortcode which will be executed in popup. Nested shortcodes are not supported.', MVP_TEXTDOMAIN); ?></p>

		            <p class="info popup_adsense_code_info"><?php esc_html_e('Enter AdSense ins tag ONLY, do not enter script tag here. If you have AdSense CSS, enter it below in CSS styling field.', MVP_TEXTDOMAIN); ?></p>

	            </td>
			</tr>

			<tr valign="top" class="popup_html_content_field">
				<th><?php esc_html_e('Content *', MVP_TEXTDOMAIN); ?></th>
				<td>

					<textarea class="popup_html_content popup_elem" name="" data-cname="html_content"></textarea>
					<p class="info"><?php esc_html_e('Add HTML which will be placed inside popup', MVP_TEXTDOMAIN); ?></p>
	            </td>
			</tr>

			<tr valign="top" class="adsense_client_field">
				<th><?php esc_html_e('AdSense client *', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="text" class="popup_adsense_client popup_elem" name="" data-cname="adsense_client" value="" placeholder="<?php esc_attr_e('Enter AdSense client', MVP_TEXTDOMAIN); ?>">
	            </td>
			</tr>
			<tr valign="top" class="adsense_slot_field">
				<th><?php esc_html_e('AdSense slot *', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="text" class="popup_adsense_slot popup_elem" name="" data-cname="adsense_slot" value="" placeholder="<?php esc_attr_e('Enter AdSense slot', MVP_TEXTDOMAIN); ?>">
	            </td>
			</tr>
			<tr valign="top" class="popup_width_field">
				<th><?php esc_html_e('AdSense width [px]', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="number" min="0" class="popup_width popup_elem" name="" data-cname="width" placeholder="<?php esc_attr_e('Enter AdSense width', MVP_TEXTDOMAIN); ?>" value="">
				</td>
			</tr>
			<tr valign="top" class="popup_height_field">
				<th><?php esc_html_e('AdSense height [px]', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="number" min="0" class="popup_height popup_elem" name="" data-cname="height" placeholder="<?php esc_attr_e('Enter AdSense height', MVP_TEXTDOMAIN); ?>" value="">
				</td>
			</tr>

			<tr valign="top">
				<th><?php esc_html_e('Start time', MVP_TEXTDOMAIN); ?></th>
				<td>
					<input type="text" class="popup_show_time popup_elem" name="" data-cname="show_time" placeholder="<?php esc_attr_e('p or start time', MVP_TEXTDOMAIN); ?>" value="">
		            <p class="info"><?php esc_html_e('When to show popup. Enter p to show on pause or start time in seconds.', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>
		
			<tr valign="top">
				<th><?php esc_html_e('Url link', MVP_TEXTDOMAIN); ?></th>
				<td>

					<div class="mvp-inline-form">
						<input type="text" class="popup_link popup_elem" name="" data-cname="link" placeholder="<?php esc_attr_e('Enter url link', MVP_TEXTDOMAIN); ?>" value="">

						<select class="popup_target popup_elem mvp-inline-form-target" name="" data-cname="target">
				            <option value="_blank"><?php esc_html_e('blank', MVP_TEXTDOMAIN); ?></option>
				            <option value="_parent"><?php esc_html_e('parent', MVP_TEXTDOMAIN); ?></option>
				            <option value="_self"><?php esc_html_e('self', MVP_TEXTDOMAIN); ?></option>
				        </select>

				        <input type="text" class="popup_rel popup_elem" name="" data-cname="rel" placeholder="<?php esc_attr_e('rel attribute', MVP_TEXTDOMAIN); ?>" value="">
				    </div>    

					<p class="info"><?php esc_html_e('Url link to open when popup is clicked. This will wrap whole popup in hyperlink tag.', MVP_TEXTDOMAIN); ?></p>
				</td>
			</tr>
			
			<tr valign="top">
            	<th><?php esc_html_e('Use close button', MVP_TEXTDOMAIN); ?></th>
				<td>
                	<select class="popup_close_btn popup_elem" name="" data-cname="close_btn">
                		<option value="0"><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                		<option value="1"><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
		            </select>
		            <p class="info"><?php esc_html_e('Use popup close button. Without close button popup cannot be closed. Note that video cannot continue if popup is not closed. If button to close popup is not used, only way to close popup is to use API method.', MVP_TEXTDOMAIN); ?></p>
	        	</td>
			</tr> 

			<tr valign="top">
				<th><?php esc_html_e('popup classes', MVP_TEXTDOMAIN); ?></th>
				<td>
		            <input type="text" class="popup_adit_class popup_elem" name="" data-cname="adit_class" value="">
		            <p class="info"><?php esc_html_e('Enter additional classes which will be attached to popup (separated by space).', MVP_TEXTDOMAIN); ?></p>
	            </td>
			</tr>

			<tr valign="top">
				<th><?php esc_html_e('CSS styling', MVP_TEXTDOMAIN); ?></th>
				<td>
					<textarea class="popup_css popup_elem" name="" data-cname="css" rows="5"></textarea>
		            <p class="info"><?php esc_html_e('Add custom CSS for popup. This can be also set in player custom CSS section instead.', MVP_TEXTDOMAIN); ?></p>
	            </td>
			</tr>  

		</table>

   		<button type="button" class="popup-source-remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button>

   	</div>	

</div>
