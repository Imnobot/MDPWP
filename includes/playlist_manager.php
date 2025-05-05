<?php

//load playlists
$playlist_data = $wpdb->get_results("SELECT id, title, options FROM $playlist_table ORDER BY title ASC", ARRAY_A);

?>

<div class="wrap">

	<?php // Assuming notice.php exists and is included correctly
        $notice_path = dirname(__FILE__) . "/notice.php";
        if (file_exists($notice_path)) {
             include($notice_path);
        }
    ?>

	<h2><?php esc_html_e('Manage Playlists', MVP_TEXTDOMAIN); ?></h2>

	<p><?php esc_html_e('From this section you can create and edit playlists. You can change playlist name by clicking on title row.', MVP_TEXTDOMAIN); ?></p>

	<div class="list-actions">
		<div class="list-actions-wrap list-actions-left">
			<button type="button" id="mvp-export-json-button" class="button button-secondary"><?php esc_html_e('Export Selected (JSON)', MVP_TEXTDOMAIN); ?></button>
			<button id="mvp-delete-playlists"><?php esc_html_e('Delete selected', MVP_TEXTDOMAIN); ?></button>
	  		<input type="text" id="mvp-filter-playlist" placeholder="<?php esc_attr_e('Search by title..', MVP_TEXTDOMAIN); ?>">
  		</div>
    </div>

	<table class='mvp-table wp-list-table widefat mvp-playlist-table'>
		<thead>
			<tr>
				<th style="width:1%"><input type="checkbox" class="mvp-playlist-all"></th>
				<th>ID</th>
				<th><?php esc_html_e('Thumb', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
			</tr>
		</thead>

		<tbody id="playlist-item-list" data-admin-url="<?php echo esc_url(admin_url("admin.php")); ?>">
			<?php foreach($playlist_data as $pd) : ?>
				<tr class="mvp-playlist-row playlist-item" data-playlist-id="<?php echo esc_attr($pd['id']); ?>">

					<td><input type="checkbox" class="mvp-playlist-checkbox" name="playlist_select[]" value="<?php echo esc_attr($pd['id']); ?>" data-playlist-id="<?php echo esc_attr($pd['id']); ?>"></td>
					<td><?php echo esc_html($pd['id']); ?></td>
					<td><img class="pmimg" src="<?php
                        // --- FIX: Use maybe_unserialize and check result ---
                        $playlist_options = maybe_unserialize($pd['options']);
                        if (!is_array($playlist_options)) $playlist_options = []; // Ensure it's an array
                        // --- End Fix ---
                        $thumb_url = (isset($playlist_options['thumb']) && !empty($playlist_options['thumb'])) ? esc_url($playlist_options['thumb']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';
                        echo $thumb_url;
                    ?>"/></td>

					<td><input type="text" name="title" class="title-editable playlist-title" data-title="<?php echo esc_attr($pd['title']); ?>" value="<?php echo esc_attr($pd['title']); ?>" data-playlist-id="<?php echo esc_attr($pd['id']); ?>"/></td>

					<td><a href='<?php echo esc_url(admin_url("admin.php?page=mvp_playlist_manager&action=edit_playlist&playlist_id=".$pd['id'])); ?>' title='<?php esc_attr_e('Edit playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>  |  

					<a class="mvp-duplicate-playlist" href="#" title='<?php esc_attr_e('Duplicate playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Duplicate', MVP_TEXTDOMAIN); ?></a>  |  

                    <!-- Removed ZIP export link -->

					<a href="#" class="mvp-delete-playlist" title='<?php esc_attr_e('Delete playlist', MVP_TEXTDOMAIN); ?>' style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a>

					</td>

				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">

            <button type="button" class='button-primary' id="mvp-add-playlist"><?php esc_html_e('Add New Playlist', MVP_TEXTDOMAIN); ?></button>

            <!-- Import Section -->
            <hr style="margin: 15px 0;">

            <!-- Removed Old ZIP Import Form -->

            <!-- New JSON Import -->
             <h4 style="margin-bottom: 5px; margin-top: 10px;"><?php esc_html_e('Import Playlists (JSON)', MVP_TEXTDOMAIN); ?></h4>
             <form id="mvp-import-json-form" method="post" enctype="multipart/form-data" style="display: inline-block;">
                 <?php wp_nonce_field( 'mvp-import-playlist-nonce' ); // Re-using same nonce action name, but WP generates unique nonce value ?>
                 <input type="hidden" name="action" value="mvp_import_playlists_json">
                 <p style="display: inline-block; margin: 0 10px 0 0;">
                     <input type="file" name="mvp_import_file[]" id="mvp_import_file" accept=".json,application/json" required multiple>
                 </p>
                 <button type="submit" id="mvp-import-json-button" class="button button-primary"><?php esc_html_e('Import JSON', MVP_TEXTDOMAIN); ?></button>
             </form>
             <!-- Added Status Div -->
             <div id="mvp-import-status" style="display: none; margin-top: 10px; clear: both;"></div>
            <!-- End Import Section -->

        </div>
    </div>

    <div id="mvp-save-holder"></div>

</div>

<div id="mvp-add-playlist-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

				<form id="mvp-add-playlist-form" method="post">

					<div class="mvp-admin mvp-bg">

						<table class="form-table">

							<tr valign="top">
								<th><?php esc_html_e('Playlist title', MVP_TEXTDOMAIN); ?></th>
								<td><input type="text" name="playlist-title" id="playlist-title" required placeholder="Enter playlist title"></td>
							</tr>

							<tr valign="top">
								<th><?php esc_html_e('Is admin retrieved', MVP_TEXTDOMAIN); ?></th>
								<td><label><input type="checkbox" id="is-backend-retrieved"><?php esc_html_e('Select this if you will be using this playlist to retrieve Youtube playlist or a channel in the admin to save quota', MVP_TEXTDOMAIN); ?></label></td>
							</tr>

						</table>

					</div>

				</form> <!-- This </form> tag was outside the table but inside the content div. Keeping structure but noting it might be slightly off. -->

				<div class="mvp-modal-actions">
					<button id="mvp-add-playlist-cancel" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
		            <button id="mvp-add-playlist-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Add playlist', MVP_TEXTDOMAIN); ?></button>
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