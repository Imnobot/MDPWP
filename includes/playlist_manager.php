<?php


global $wpdb;
$settings_table = $wpdb->prefix . "mvp_settings";
$stmt = $wpdb->get_row("SELECT options FROM {$settings_table} WHERE id = '0'", ARRAY_A);

$default_settings = mvp_get_settings();

if($stmt){
	$result = unserialize($stmt['options']);
	$settings = $result + $default_settings;
}else{
	$settings = $default_settings;
}

$capability = !empty($settings['playlistCapability']) ? $settings['playlistCapability'] : MVP_CAPABILITY;





$user = wp_get_current_user();

if(!current_user_can($capability)){
    exit();
}

$current_user_id = $user->ID;




//load playlists

$is_admin = mvp_isAdmin($user);

if ($is_admin) {
	$playlist_data = $wpdb->get_results("SELECT id, user_id, title, options FROM $playlist_table ORDER BY title ASC", ARRAY_A);
}else{
	$playlist_data = $wpdb->get_results($wpdb->prepare("SELECT id, user_id, title, options FROM $playlist_table WHERE user_id=%d ORDER BY title ASC", $user->ID), ARRAY_A);
}


$user_playlist_created = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$playlist_table} WHERE user_id=%d", $user->ID));

$userLimit = mvp_checkUserLimit($settings, $user);

$userData = array('is_admin' => $is_admin, 'user_id' => $user->ID, 'limit' => $userLimit, 'playlist_created' => intval($user_playlist_created));

?>

<script type="text/javascript">
    var mvp_userData = <?php echo(json_encode($userData, JSON_HEX_TAG)); ?>;
</script>

<div class="wrap">

	<?php include("playeri.php"); ?>

	<div class="mvp-settings-wrap-panel aptenv-ready">
	<div id="mvp-playlist-manager-section">

	<?php include("notice.php"); ?>

	<h2><?php esc_html_e('Manage Playlists', MVP_TEXTDOMAIN); ?></h2>

	<p><?php esc_html_e('From this section you can create and edit playlists. You can change playlist name by clicking on title row.', MVP_TEXTDOMAIN); ?></p>

	<div class="list-actions">
		<div class="list-actions-wrap list-actions-left">
			<button id="mvp-delete-playlists"><?php esc_html_e('Delete selected', MVP_TEXTDOMAIN); ?></button>
	  		<input type="text" id="mvp-filter-playlist" placeholder="<?php esc_attr_e('Search..', MVP_TEXTDOMAIN); ?>">

	  		<?php if ($is_admin) : ?>

	  		<div class="mvp-playlist-user-selector">
				<span><?php esc_html_e('Choose user playlists:', MVP_TEXTDOMAIN); ?></span>
				<select id="mvp-playlist-user-list">
					<option value=""><?php esc_html_e('Show all', MVP_TEXTDOMAIN); ?></option>
					<?php 
					$users = get_users( 
						array( 
						'fields' => array( 'ID', 'display_name') ) 
					);
					foreach($users as $user){
						?> <option value="<?php echo($user->ID); ?>"><?php echo($user->display_name.' - ID #'.$user->ID); ?></option>
						<?php 
				    }?>
			    </select>
			</div>

			<?php endif; ?>

  		</div>
    </div>

	<table class='mvp-table wp-list-table widefat mvp-playlist-table' data-user-id="<?php echo $current_user_id; ?>" data-is-admin="<?php echo $is_admin; ?>" data-track-playlist-edit="<?php echo $settings['trackPlaylistEdit']; ?>">
		<thead>
			<tr>
				<th style="width:1%"><input type="checkbox" class="mvp-playlist-all"></th>
				<th>ID</th>

				<?php if ($is_admin) : ?>
					<th><?php esc_html_e('User', MVP_TEXTDOMAIN); ?></th>
				<?php endif; ?>

				<th><?php esc_html_e('Thumb', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
			</tr>
		</thead>

		<tbody id="mvp-playlist-item-list" data-admin-url="<?php echo admin_url("admin.php"); ?>" >

			<?php foreach($playlist_data as $pd) : ?>
				<tr class="mvp-playlist-row playlist-item" data-playlist-id="<?php echo($pd['id']); ?>" 
				 <?php if(isset($pd['user_id'])) : ?>
				 	data-user-id="<?php echo $pd['user_id']; ?>" 
				 <?php endif; ?> 
				>

					<td><input type="checkbox" class="mvp-playlist-indiv" data-playlist-id="<?php echo($pd['id']); ?>" ></td>
					<td class="mvp-playlist-id-field"><?php echo($pd['id']); ?></td>	

					<?php if ($is_admin) : ?>
						<td class="user-id">
							<?php if(isset($pd['user_id'])){
								$user = get_user_by( 'id', $pd['user_id'] );

								//echo($user->display_name); 
								//echo '<br>';
								?>
								<a href="<?php esc_attr_e( get_edit_user_link( $pd['user_id'] ) ); ?>">
							        <?php esc_html_e( $user->display_name ); ?> (ID #<?php echo($pd['user_id']); ?>)
							    </a>
							    <?php
							}
						 ?>
						</td>
					<?php endif; ?>

					<?php

					if($pd['options']){
						$playlist_options = unserialize($pd['options']);
						$thumb = isset($playlist_options['thumb']) ? $playlist_options['thumb'] : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D';
					}else{
						$thumb = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D';
					}

					?>
					<td><img class="pmimg" src="<?php echo $thumb; ?>"/></td>
					
					<td><input type="text" name="title" class="title-editable playlist-title" data-title="<?php echo(esc_html($pd['title'])); ?>" value="<?php echo(esc_html($pd['title'])); ?>" data-playlist-id="<?php echo($pd['id']); ?>"/></td>

					<td><a class="mvp-playlist-action-btn" href='<?php echo admin_url("admin.php?page=mvp_playlist_manager&action=edit_playlist&playlist_id=".$pd['id']); ?>' title='<?php esc_attr_e('Edit playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;

					<?php if($is_admin) : ?>

						<a class="mvp-duplicate-playlist mvp-playlist-action-btn" href="#" title='<?php esc_attr_e('Duplicate playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Duplicate', MVP_TEXTDOMAIN); ?></a>

						&nbsp;&nbsp;|&nbsp;&nbsp;
						
						<?php if(extension_loaded('zip')) : ?>
							<a class="mvp-export-playlist-btn mvp-playlist-action-btn" data-playlist-id="<?php echo($pd['id']); ?>" href='#' title='<?php esc_attr_e('Export playlist', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<?php endif; ?>

					<?php endif; ?>

					<a href="#" class="mvp-delete-playlist mvp-playlist-action-btn" title='<?php esc_attr_e('Delete playlist', MVP_TEXTDOMAIN); ?>' style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a>

					</td>

				</tr>
			<?php endforeach; ?>	

		</tbody>		 
	</table>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">
 
            <button type="button" class='button-primary' id="mvp-add-playlist"><?php esc_html_e('Add New Playlist', MVP_TEXTDOMAIN); ?></button> 

            <?php if($is_admin) : ?>

	  		<form id="mvp-import-playlist-form" action="" method="POST" enctype="multipart/form-data">
	  			<?php wp_nonce_field('mvp-import-playlist-nonce'); ?>
		  		<input type="file" id="mvp-playlist-file-input" accept=".json,application/json">
		  		<a class='button-secondary' href='#' id="mvp-import-playlist" title="Import Playlist"><?php esc_html_e('Import Playlist', MVP_TEXTDOMAIN); ?></a> 
		  	</form>

		  	<?php endif; ?>

        </div>
    </div>

    <div id="mvp-save-holder"></div>

</div>
</div>
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

						</table>

					</div>

				</form>

				<div class="mvp-modal-actions">	
					<button id="mvp-add-playlist-cancel" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
		            <button id="mvp-add-playlist-submit" type="button" class="button-primary" <?php disabled( !current_user_can($capability) ); ?>><?php esc_html_e('Add playlist', MVP_TEXTDOMAIN); ?></button> 
    			</div>

    			</form>

    		</div>
        </div>
    </div>
</div>

<div id="mvp-add-playlist-limit-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

				<div class="mvp-modal-message">
					<h2><?php esc_html_e('Notice', MVP_TEXTDOMAIN); ?></h2>
					<p class="mvp-modal-message-content"><?php echo $settings['userPlaylistLimitText'] ?></p>
				</div>

				<div class="mvp-modal-actions">	
					<button id="mvp-add-playlist-limit-close" type="button"><?php esc_html_e('Close', MVP_TEXTDOMAIN); ?></button>
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

