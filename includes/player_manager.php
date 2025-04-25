<?php

$options = mvp_player_options();
$presets = $options['presets'];

//load players
$players = $wpdb->get_results("SELECT id, title, preset FROM {$player_table} ORDER BY title ASC", ARRAY_A);

?>


<div class="wrap">

	<?php include("playeri.php"); ?>

	<div class="mvp-settings-wrap-panel aptenv-ready">
	<div id="mvp-player-manager-section">

	<?php include("notice.php"); ?>

	<h2><?php esc_html_e('Manage Players', MVP_TEXTDOMAIN); ?></h2>

	<p><?php esc_html_e('From this section you can create and edit players. You can change player name by clicking on title row.', MVP_TEXTDOMAIN); ?></p>

	<div class="list-actions">
		<div class="list-actions-wrap list-actions-left">
			<button id="mvp-delete-players"><?php esc_html_e('Delete selected', MVP_TEXTDOMAIN); ?></button>
  			<input type="text" id="mvp-filter-player" placeholder="<?php esc_attr_e('Search by title..', MVP_TEXTDOMAIN); ?>">
  		</div>
    </div>

	<table class='mvp-table wp-list-table widefat mvp-player-table'>
		<thead>
			<tr>
				<th style="width:1%"><input type="checkbox" class="mvp-player-all"></th>
				<th>ID</th>
				<th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Skin', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
			</tr>
		</thead>
		<tbody id="mvp-player-item-list" data-admin-url="<?php echo admin_url("admin.php"); ?>">
			<?php foreach($players as $player) : ?>

				<tr class="mvp-player-row player-item" data-title="<?php echo(esc_html($player['title'])); ?>" data-player-id="<?php echo($player['id']); ?>">

					<td><input type="checkbox" class="mvp-player-indiv" data-player-id="<?php echo($player['id']); ?>"></td>
					<td><?php echo($player['id']); ?></td>	

					<td><input type="text" name="title" class="title-editable player-title" data-title="<?php echo(esc_html($player['title'])); ?>" value="<?php echo(esc_html($player['title'])); ?>" data-player-id="<?php echo($player['id']); ?>"/></td>

					<td><?php 

					$preset = mvp_checkPreset($player['preset']);
					echo($preset); 

					?></td>

					<td><a href='admin.php?page=mvp_player_manager&action=edit_player&player_id=<?php echo($player['id']); ?>' title='Edit player'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;

					<a class="mvp-duplicate-player" href='#' title='<?php esc_attr_e('Duplicate player', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Duplicate', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;

					<?php if(extension_loaded('zip')) : ?>
						<a class="mvp-export-player-btn" data-player-id="<?php echo($player['id']); ?>" href='#' title='<?php esc_attr_e('Export player', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
					<?php endif; ?>

					<a href="#" class="mvp-delete-player" title="<?php esc_attr_e('Delete player', MVP_TEXTDOMAIN); ?>" style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a></td>

				</tr>
			<?php endforeach; ?>	

		</tbody>		 
	</table>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">
            
        	<button type="button" class='button-primary' id="mvp-add-player"><?php esc_html_e('Add New Player', MVP_TEXTDOMAIN); ?></button> 
	  		<form id="mvp-import-player-form" action="" method="POST" enctype="multipart/form-data">
	  			<?php wp_nonce_field('mvp-import-player-nonce'); ?>
		  		<input type="file" id="mvp-player-file-input">
		  		<button type="button" class='button-secondary' id="mvp-import-player" title="<?php esc_attr_e('Upload player previously exported zip file.', MVP_TEXTDOMAIN); ?>"><?php esc_html_e('Import Player', MVP_TEXTDOMAIN); ?></button> 
		  	</form>

        </div>
    </div>

    <div id="mvp-save-holder"></div>
	
</div>
</div>
</div>

<div id="mvp-add-player-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

        		<form id="mvp-add-player-form" method="post">
        		
        		<div class="mvp-admin mvp-bg">

					<table class="form-table">
						
						<tr valign="top">
							<th><?php esc_html_e('Enter player title', MVP_TEXTDOMAIN); ?></th>
							<td><input type="text" id="player-title" name="player-title" placeholder="<?php esc_attr_e('Enter player title', MVP_TEXTDOMAIN); ?>"></td>
						</tr>

						<tr valign="top" id="mvp-preset-field">
							<th><?php esc_html_e('Select skin', MVP_TEXTDOMAIN); ?></th>
							<td>
								<select id="mvp-player-preset" name="mvp-player-preset">
									<?php foreach ($presets as $key => $value) : ?>
						                <option value="<?php echo($key); ?>"><?php echo(esc_html_e($value)); ?></option>
						            <?php endforeach; ?>
					            </select><br>
				            </td>
						</tr>

						<tr valign="top">
							<th></th>
							<td>
			
					            <p class="info mvp-player-info player-info-grid1"><?php esc_html_e('Thumbnail grid, can be used with CSS grid. Special skin (playlist display without player). Its used in combination with another player. Playlist tracks can be played and enqueued in another player (normal or lightbox). You need 2 shortcodes for this, one for the grid and another for the player (check plugin help documentation / Custom player skins section)', MVP_TEXTDOMAIN); ?></p>

					            <p class="info mvp-player-info player-info-list1"><?php esc_html_e('Horizontal list of thumbnails. Special skin (playlist display without player). Its used in combination with another player. Playlist tracks can be played and enqueued in another player (normal or lightbox). You need 2 shortcodes for this, one for the list and another for the player (check plugin help documentation / Custom player skins section)', MVP_TEXTDOMAIN); ?></p>

					            <p class="info mvp-player-info player-info-list2"><?php esc_html_e('Vertical list of thumbnails. Special skin (playlist display without player). Its used in combination with another player. Playlist tracks can be played and enqueued in another player (normal or lightbox). You need 2 shortcodes for this, one for the list and another for the player (check plugin help documentation / Custom player skins section)', MVP_TEXTDOMAIN); ?></p>

					            <br>

					            <img id="preset-preview" src="" alt=""/>

							</td>
						</tr>

					</table>

				</div>

				<div class="mvp-modal-actions">	
					<button id="mvp-add-player-cancel" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
		            <button id="mvp-add-player-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Add player', MVP_TEXTDOMAIN); ?></button> 
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


