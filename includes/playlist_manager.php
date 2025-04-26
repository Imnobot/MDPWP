<?php

// Ensure this file is accessed via WordPress
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// *** FIX: Define $wpdb and $playlist_table before use ***
global $wpdb;
$playlist_table = $wpdb->prefix . "mvp_playlists";
// *** END FIX ***

//load playlists
$playlist_data = $wpdb->get_results("SELECT id, title, options FROM $playlist_table ORDER BY title ASC", ARRAY_A); // This query should now work

?>

<div class="wrap">

	<?php
    // Include notice file if it exists and is needed
    $notice_file = dirname(__FILE__) . '/notice.php';
    if (file_exists($notice_file)) {
        include($notice_file);
    }
    ?>

	<h2><?php esc_html_e('Manage Playlists', MVP_TEXTDOMAIN); ?></h2>

	<p><?php esc_html_e('From this section you can create and edit playlists. You can change playlist name by clicking on title row.', MVP_TEXTDOMAIN); ?></p>

	<div class="list-actions">
		<div class="list-actions-wrap list-actions-left">
			<!-- JSON Export Button -->
			<button type="button" id="mvp-export-json-button" class="button button-secondary"><?php esc_html_e('Export Selected (JSON)', MVP_TEXTDOMAIN); ?></button>
			<button id="mvp-delete-playlists" class="button button-secondary"><?php esc_html_e('Delete selected', MVP_TEXTDOMAIN); ?></button>
	  		<input type="text" id="mvp-filter-playlist" placeholder="<?php esc_attr_e('Search by title..', MVP_TEXTDOMAIN); ?>">
  		</div>
    </div>

	<table class='mvp-table wp-list-table widefat striped mvp-playlist-table'>
		<thead>
			<tr>
				<th style="width:1%"><input type="checkbox" class="mvp-playlist-all"></th>
				<th><?php esc_html_e('ID', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Thumb', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
			</tr>
		</thead>

		<tbody id="playlist-item-list" data-admin-url="<?php echo esc_url(admin_url("admin.php")); ?>">
			<?php if (!empty($playlist_data)) : ?>
				<?php foreach($playlist_data as $pd) :
					$playlist_id = (int) $pd['id'];
                    $playlist_title = esc_attr($pd['title']);
                    $edit_url = esc_url(admin_url("admin.php?page=mvp_playlist_manager&action=edit_playlist&playlist_id=" . $playlist_id));

                    $playlist_options = maybe_unserialize($pd['options']);
                    if (!is_array($playlist_options)) {
                        $playlist_options = [];
                    }
                    $thumb_url = isset($playlist_options['thumb']) && !empty($playlist_options['thumb']) ? esc_url($playlist_options['thumb']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D';
				?>
				<tr class="mvp-playlist-row playlist-item" data-playlist-id="<?php echo $playlist_id; ?>">

					<td><input type="checkbox" class="mvp-playlist-checkbox" name="playlist_select[]" value="<?php echo $playlist_id; ?>" data-playlist-id="<?php echo $playlist_id; ?>"></td>
					<td><?php echo $playlist_id; ?></td>
					<td><img class="pmimg" src="<?php echo $thumb_url; ?>" alt="<?php printf(esc_attr__('Thumbnail for %s', MVP_TEXTDOMAIN), $playlist_title); ?>" width="50" height="50" /></td>

					<td><input type="text" name="title" class="title-editable playlist-title" data-title="<?php echo $playlist_title; ?>" value="<?php echo $playlist_title; ?>" data-playlist-id="<?php echo $playlist_id; ?>" readonly /></td>

					<td>
                        <a href='<?php echo $edit_url; ?>' title='<?php esc_attr_e('Edit playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a class="mvp-duplicate-playlist" href="#" data-playlist-id="<?php echo $playlist_id; ?>" title='<?php esc_attr_e('Duplicate playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Duplicate', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;

                        <?php /* --- REMOVED ZIP EXPORT LINK ---
                        <?php if(extension_loaded('zip')) : ?>
                            <a class="mvp-export-playlist-btn" data-playlist-id="<?php echo $playlist_id; ?>" data-playlist-title="<?php echo $playlist_title; ?>" href='#' title='<?php esc_attr_e('Export playlist (Legacy ZIP)', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Export (ZIP)', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <?php endif; ?>
                        */ ?>

                        <a href="#" class="mvp-delete-playlist" data-playlist-id="<?php echo $playlist_id; ?>" title='<?php esc_attr_e('Delete playlist', MVP_TEXTDOMAIN); ?>' style="color:#a00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a>
					</td>

				</tr>
				<?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5"><?php esc_html_e('No playlists found.', MVP_TEXTDOMAIN); ?></td>
                </tr>
			<?php endif; ?>
		</tbody>

        <tfoot>
			<tr>
				<th style="width:1%"><input type="checkbox" class="mvp-playlist-all"></th>
				<th><?php esc_html_e('ID', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Thumb', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
			</tr>
		</tfoot>

	</table>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">

            <button type="button" class='button-primary' id="mvp-add-playlist"><?php esc_html_e('Add New Playlist', MVP_TEXTDOMAIN); ?></button>

            <!-- Import Section -->
            <hr style="margin: 15px 0;">

            <?php /* --- REMOVED ZIP IMPORT SECTION ---
            <!-- Old ZIP Import -->
            <div class="mvp-import-section">
                <h4 style="margin-bottom: 5px;"><?php esc_html_e('Import Playlist (ZIP - Legacy)', MVP_TEXTDOMAIN); ?></h4>
                <form id="mvp-import-playlist-form" action="" method="POST" enctype="multipart/form-data" style="display: inline-block; margin-right: 15px;">
                    <?php wp_nonce_field('mvp-import-playlist-nonce', '_wpnonce_zip_import'); // Unique nonce name for ZIP import ?>
                    <input type="file" name="mvp_file_upload" id="mvp-playlist-file-input" accept=".zip,application/zip">
                    <button type='button' class='button-secondary' id="mvp-import-playlist" title="<?php esc_attr_e('Import Playlist from legacy ZIP file', MVP_TEXTDOMAIN); ?>"><?php esc_html_e('Import ZIP', MVP_TEXTDOMAIN); ?></button>
                </form>
                 <div id="mvp-import-zip-status" style="display: none; margin-top: 5px;"></div> <!-- Status div for ZIP import -->
            </div>
            */ ?>

            <!-- New JSON Import -->
             <div class="mvp-import-section" style="margin-top: 5px;"> <!-- Adjusted margin -->
                 <h4 style="margin-bottom: 5px;"><?php esc_html_e('Import Playlists (JSON)', MVP_TEXTDOMAIN); ?></h4>
                 <form id="mvp-import-json-form" method="post" enctype="multipart/form-data" style="display: inline-block;">
                     <?php wp_nonce_field( 'mvp-import-playlist-nonce', '_wpnonce' ); ?>
                     <input type="hidden" name="action" value="mvp_import_playlists_json">
                     <p style="display: inline-block; margin: 0 10px 0 0;">
                         <input type="file" name="mvp_import_file[]" id="mvp_import_file" accept=".json,application/json" required multiple>
                     </p>
                     <button type="submit" id="mvp-import-json-button" class="button button-primary"><?php esc_html_e('Import JSON(s)', MVP_TEXTDOMAIN); ?></button>
                 </form>
                 <div id="mvp-import-status" style="display: none; margin-top: 10px; clear: both;"></div>
             </div>
            <!-- End Import Section -->

        </div>
    </div>

    <div id="mvp-save-holder"></div>

</div><!-- .wrap -->

<!-- Modal for Adding New Playlist -->
<div id="mvp-add-playlist-modal" class="mvp-modal" style="display: none;">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">
				<form id="mvp-add-playlist-form" method="post">
                    <h3 style="margin-top:0;"><?php esc_html_e('Add New Playlist Details', MVP_TEXTDOMAIN); ?></h3>
					<div class="mvp-admin mvp-bg">
						<table class="form-table">
							<tr valign="top">
								<th scope="row"><label for="playlist-title"><?php esc_html_e('Playlist title', MVP_TEXTDOMAIN); ?></label></th>
								<td><input type="text" name="playlist-title" id="playlist-title" required placeholder="<?php esc_attr_e('Enter playlist title', MVP_TEXTDOMAIN); ?>" class="regular-text"></td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Is admin retrieved', MVP_TEXTDOMAIN); ?></th>
								<td>
                                    <label for="is-backend-retrieved">
                                        <input type="checkbox" id="is-backend-retrieved" name="is-backend-retrieved">
                                        <?php esc_html_e('Select this if you will be using this playlist to retrieve Youtube playlist or a channel in the admin to save quota', MVP_TEXTDOMAIN); ?>
                                    </label>
                                </td>
							</tr>
						</table>
					</div>
                </form>
				<div class="mvp-modal-actions" style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #ddd; text-align: right;">
					<button id="mvp-add-playlist-cancel" type="button" class="button button-secondary"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
		            <button id="mvp-add-playlist-submit" type="button" class="button button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Add playlist', MVP_TEXTDOMAIN); ?></button>
    			</div>
    		</div><!-- .mvp-modal-content -->
        </div><!-- .mvp-modal-inner -->
    </div><!-- .mvp-modal-bg -->
</div><!-- #mvp-add-playlist-modal -->

<!-- Loader Element -->
<div id="mvp-loader" style="display: none;">
    <div class="mvp-loader-anim">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>