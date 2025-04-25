<?php

//load ads
$ads = $wpdb->get_results("SELECT id, title FROM {$global_ad_table} ORDER BY title ASC", ARRAY_A);

?>

<div class="wrap">

	<?php include("notice.php"); ?>

	<h2><?php esc_html_e('Manage ads', MVP_TEXTDOMAIN); ?></h2>

	<p><?php esc_html_e('From this section you can create and edit ads.', MVP_TEXTDOMAIN); ?> </p>

	<div class="list-actions">
		<div class="list-actions-wrap list-actions-left">
			<button id="mvp-delete-ads"><?php esc_html_e('Delete selected', MVP_TEXTDOMAIN); ?></button>
	  		<input type="text" id="mvp-filter-ad" placeholder="<?php esc_attr_e('Search by title..', MVP_TEXTDOMAIN); ?>">
  		</div>
    </div>

	<table class='mvp-table wp-list-table widefat mvp-ad-table'>
		<thead>
			<tr>
				<th style="width:1%"><input type="checkbox" class="mvp-ad-all"></th>
				<th>ID</th>
				<th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
				<th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
			</tr>
		</thead>
		<tbody id="mvp-ad-item-list" data-admin-url="<?php echo admin_url("admin.php"); ?>">

			<?php foreach($ads as $ad) : ?>
				<tr class="mvp-ad-row mvp-ad-item" data-title="<?php echo(esc_attr($ad["title"])); ?>" data-ad-id="<?php echo($ad['id']); ?>">

					<td><input type="checkbox" class="mvp-ad-indiv"></td>

					<td><?php echo($ad['id']); ?></td>		

					<td><input type="text" name="title" class="title-editable mvp-ad-title" data-title="<?php echo(esc_attr($ad['title'])); ?>" value="<?php echo(esc_html($ad['title'])); ?>" data-ad-id="<?php echo($ad['id']); ?>"/></td>

					<td><a href='admin.php?page=mvp_ad_manager&action=edit_ad&ad_id=<?php echo($ad['id']); ?>' title='<?php esc_attr_e('Edit', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Edit', MVP_TEXTDOMAIN); ?></a>

					&nbsp;&nbsp;|&nbsp;&nbsp;

					<a class="mvp-duplicate-ad" href='#' title='<?php esc_attr_e('Duplicate', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Duplicate', MVP_TEXTDOMAIN); ?>
						
					</a>&nbsp;&nbsp;|&nbsp;&nbsp;

					<?php if(extension_loaded('zip')) : ?>
					  	<a class="mvp-export-ad-btn" data-ad-id="<?php echo($ad['id']); ?>" href='#' title='<?php esc_attr_e('Export', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;	
					<?php endif; ?>

					<a href='#' class="mvp-delete-ad" style="color:#f00;"><?php esc_html_e('Delete', MVP_TEXTDOMAIN); ?></a></td>

				</tr>
			<?php endforeach; ?>	

		</tbody>		 
	</table>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">
            
        	<button type="button" class='button-primary' id="mvp-add-ad"><?php esc_html_e('Add New ad section', MVP_TEXTDOMAIN); ?></button> 
	  		<form id="mvp-import-ad-form" action="" method="POST" enctype="multipart/form-data">
	  			<?php wp_nonce_field('mvp-import-ad-nonce'); ?>
		  		<input type="file" id="mvp-ad-file-input">
		  		<button type="button" class='button-secondary' id="mvp-import-ad" title="<?php esc_attr_e('Upload ad previously exported zip file.', MVP_TEXTDOMAIN); ?>"><?php esc_html_e('Import Ad', MVP_TEXTDOMAIN); ?></button> 
		  	</form>

        </div>
    </div>

    <div id="mvp-save-holder"></div>  
	
</div>

<div id="mvp-add-ad-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

        		<form id="mvp-add-ad-form" method="post">

				<div class="mvp-admin mvp-bg">

					<table class="form-table">
						
						<tr valign="top">
							<th><?php esc_html_e('Ad section title', MVP_TEXTDOMAIN); ?></th>
							<td><input type="text" id="ad-title" required placeholder="<?php esc_attr_e('Enter ad title', MVP_TEXTDOMAIN); ?>"></td>
						</tr>

					</table>

				</div>

        		<div class="mvp-modal-actions">	
					<button id="mvp-add-ad-cancel" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
		            <button id="mvp-add-ad-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Add ad', MVP_TEXTDOMAIN); ?></button> 
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


