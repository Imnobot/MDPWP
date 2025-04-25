<p><?php esc_html_e('Generate video shortcode here for one or multiple videos and use it directly in your page without creating a player in Player manager beforehand.', MVP_TEXTDOMAIN); ?></p>

<div id="mvp-edit-media-modal">

	<div id="mvp-quick-sh-tabs">

	    <ul class="mvp-tab-header">
	        <li id="mvp-quick-sh-tab-video"><?php esc_html_e('Video', MVP_TEXTDOMAIN); ?></li>
	        <li id="mvp-quick-sh-tab-adverts"><?php esc_html_e('Adverts', MVP_TEXTDOMAIN); ?></li>
	        <li id="mvp-quick-sh-tab-player"><?php esc_html_e('Player', MVP_TEXTDOMAIN); ?></li>
	    </ul>

		<div id="mvp-quick-sh-tab-video-content" class="mvp-tab-content">    

			<p><?php esc_html_e('Add video', MVP_TEXTDOMAIN); ?></p>

			<div id="mvp-edit-media-form" class="option-content-box mvp-not-form mvp-get-video-shortcode-submit">	

				<div class="mvp-quick-shortcode-field">

		    	<?php 

		    	$additional_playlists = array();
		    	$playlist_id = -1;

		    	include("add_media_fields.php"); 

		    	$options = mvp_player_options();
				$presets = $options['presets'];

		    	?>

		    	</div>

	    	</div>

		</div>

		<div id="mvp-quick-sh-tab-adverts-content" class="mvp-tab-content">    

			<p><?php esc_html_e('Add adverts for current video', MVP_TEXTDOMAIN); ?></p>

			<div id="mvp-tab-shortcode-adverts-content" class="mvp-quick-shortcode-field">

				<?php include('ad_section.php'); ?>

			</div>

		</div>

		<div id="mvp-quick-sh-tab-player-content" class="mvp-tab-content">    

			<p><?php esc_html_e('Select player features (only basic features are available here. If you want to deeply configure the player, you need to create new player in Player manager section and combine player_id="PLAYER_ID" with your video shortcode)', MVP_TEXTDOMAIN); ?></p>

	    	<div id="mvp-quick-player-shortcode-form" class="option-content-box mvp-not-form">	

		    	<div id="mvp-quick-shortcode-field-player" class="mvp-quick-shortcode-field" >

		    		<?php include("quick_shortcode_fields_player.php"); ?>

			    </div><!-- mvp-quick-player-shortcode-form --> 

		    </div><!-- mvp-quick-shortcode-field-player --> 

		</div><!-- mvp-quick-sh-tab-player-content -->

	</div><!-- mvp-quick-sh-tabs -->

	<button type="button" id="mvp-edit-media-form-submit" style="margin: 10px 0;" class="button-primary mvp-get-video-shortcode-mode" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Get shortcode', MVP_TEXTDOMAIN); ?></button> 

	<button type="button" id="mvp-edit-media-form-submit2" style="margin: 10px 0;" class="button-primary mvp-get-video-shortcode-mode"><?php disabled( !current_user_can(MVP_CAPABILITY) ); ?><?php esc_html_e('Add video to existing shortcode', MVP_TEXTDOMAIN); ?></button>

	<textarea id="mvp-quick-video-shortcode-ta" rows="5" style="width:100%; display: block;"></textarea>

</div><!-- mvp-edit-media-modal -->
