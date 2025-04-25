<?php

//load playlists
$playlist_data = $wpdb->get_results("SELECT id, title, options FROM $playlist_table ORDER BY title ASC", ARRAY_A);

?>

<div class="wrap">

	<?php include("notice.php"); ?>

	<h2><?php esc_html_e('Manage Playlists', MVP_TEXTDOMAIN); ?></h2>

	<p><?php esc_html_e('From this section you can create and edit playlists. You can change playlist name by clicking on title row.', MVP_TEXTDOMAIN); ?></p>

	<div class="list-actions">
		<div class="list-actions-wrap list-actions-left">
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

		<tbody id="playlist-item-list" data-admin-url="<?php echo admin_url("admin.php"); ?>">
			<?php foreach($playlist_data as $pd) : ?>
				<tr class="mvp-playlist-row playlist-item" data-playlist-id="<?php echo($pd['id']); ?>">

					<td><input type="checkbox" class="mvp-playlist-indiv" data-playlist-id="<?php echo($pd['id']); ?>"></td>
					<td><?php echo($pd['id']); ?></td>		
					<td><img class="pmimg" src="<?php

					$playlist_options = unserialize($pd['options']);

					echo (isset($playlist_options['thumb']) ? esc_html($playlist_options['thumb']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>"/></td>
					
					<td><input type="text" name="title" class="title-editable playlist-title" data-title="<?php echo(esc_html($pd['title'])); ?>" value="<?php echo(esc_html($pd['title'])); ?>" data-playlist-id="<?php echo($pd['id']); ?>"/></td>

					<td><a href='<?php echo admin_url("admin.php?page=mvp_playlist_manager&action=edit_playlist&playlist_id=".$pd['id']); ?>' title='<?php esc_attr_e('Edit playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;

					<a class="mvp-duplicate-playlist" href="#" title='<?php esc_attr_e('Duplicate playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Duplicate', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;

					<?php if(extension_loaded('zip')) : ?>
						<a class="mvp-export-playlist-btn" data-playlist-id="<?php echo($pd['id']); ?>" href='#' title='<?php esc_attr_e('Export playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
					<?php endif; ?>

					<a href="#" class="mvp-delete-playlist" title='<?php esc_attr_e('Delete playlist', MVP_TEXTDOMAIN); ?>' style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a>

					</td>

				</tr>
			<?php endforeach; ?>	

		</tbody>		 
	</table>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">
 
            <button type="button" class='button-primary' id="mvp-add-playlist"><?php esc_html_e('Add New Playlist', MVP_TEXTDOMAIN); ?></button> 

	  		<form id="mvp-import-playlist-form" action="" method="POST" enctype="multipart/form-data">
	  			<?php wp_nonce_field('mvp-import-playlist-nonce'); ?>
		  		<input type="file" id="mvp-playlist-file-input">
		  		<a class='button-secondary' href='#' id="mvp-import-playlist" title="Import Playlist"><?php esc_html_e('Import Playlist', MVP_TEXTDOMAIN); ?></a> 
		  	</form>

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

				</form>

				<div class="mvp-modal-actions">	
					<button id="mvp-add-playlist-cancel" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
		            <button id="mvp-add-playlist-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Add playlist', MVP_TEXTDOMAIN); ?></button> 
    			</div>

    			</form>

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

