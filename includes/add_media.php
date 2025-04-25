<div>

	<form id="mvp-edit-media-form" method="post" action="">

		<div class="mvp-admin mvp-bg">

			<div id="mvp-media-tabs">

			    <ul class="mvp-tab-header">
			        <li id="mvp-tab-media-main"><?php esc_html_e('Media', MVP_TEXTDOMAIN); ?></li>
			        <li id="mvp-tab-media-adverts"><?php esc_html_e('Adverts', MVP_TEXTDOMAIN); ?></li>
			        <li id="mvp-tab-media-annotations"><?php esc_html_e('Annotations', MVP_TEXTDOMAIN); ?></li>
			        <li id="mvp-tab-media-popup"><?php esc_html_e('Popups', MVP_TEXTDOMAIN); ?></li>
			    </ul>

			    <div id="mvp-tab-media-main-content" class="mvp-tab-content">
	                <?php include('add_media_fields.php'); ?>
				</div>

	    		<div id="mvp-tab-media-adverts-content" class="mvp-tab-content">
	    			<?php include('ad_section.php'); ?>
				</div>

	    		<div id="mvp-tab-media-annotations-content" class="mvp-tab-content">
	    			<?php include('annotation_section.php'); ?>
				</div>

				<div id="mvp-tab-media-popup-content" class="mvp-tab-content">
	    			<?php include('popup_section.php'); ?>
				</div>

			</div>

		</div>

        <p class="mvp-modal-actions">     
            <button type="button" id="mvp-edit-media-form-cancel" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
            <button type="button" id="mvp-edit-media-form-submit" class="button-primary mvp-edit-playlist-mode" type="button" <?php disabled( !current_user_can($capability) ); ?>><?php esc_html_e('Save changes', MVP_TEXTDOMAIN); ?></button> 
        </p>

      
	</form>

</div>

