<?php if(isset($msg)) : ?>
  	<div class="updated notice is-dismissible"> 
		<p><strong><?php echo($msg); ?></strong></p>
	</div>
<?php elseif(isset($msge)) : ?>	
	<div class="error notice is-dismissible">
	    <p><strong><?php echo($msge); ?></strong></p>
	</div>
<?php endif; ?>

<div id="mvp-translate" 
data-fill-required-fields="<?php esc_attr_e('Please fill required fields!', MVP_TEXTDOMAIN); ?>" 
data-sure-to-clear-stat="<?php esc_attr_e('Are you sure to clear statistics?', MVP_TEXTDOMAIN); ?>"
data-key-exist="<?php esc_attr_e('Key already exist!', MVP_TEXTDOMAIN); ?>" 
data-sure-to-delete="<?php esc_attr_e('Are you sure to delete?', MVP_TEXTDOMAIN); ?>" 
data-enter-number="<?php esc_attr_e('Enter number?', MVP_TEXTDOMAIN); ?>" 
data-no-media-selected="<?php esc_attr_e('No media selected!', MVP_TEXTDOMAIN); ?>" 
data-error-importing="<?php esc_attr_e('Error importing!', MVP_TEXTDOMAIN); ?>" 
data-title-required="<?php esc_attr_e('Title is required!', MVP_TEXTDOMAIN); ?>" 
data-no-players-selected="<?php esc_attr_e('No players selected!', MVP_TEXTDOMAIN); ?>" 
data-upload-previously-exported-player-zip="<?php esc_attr_e('Make sure you upload previously exported player zip file starting with mvp_player_id_ !', MVP_TEXTDOMAIN); ?>" 
data-player-type-lightbox-needs-dom="<?php esc_attr_e('Player type Lightbox needs to have DOM selector defined. This is an element in page (link, image etc..) which will open player in lightbox when user clicks on it. Please fill this field!', MVP_TEXTDOMAIN); ?>" 
data-no-ads-selected="<?php esc_attr_e('No ads selected!', MVP_TEXTDOMAIN); ?>" 
data-upload-previously-exported-ad-zip="<?php esc_attr_e('Make sure you upload previously exported ad zip file starting with mvp_ad_id_ !', MVP_TEXTDOMAIN); ?>" 
data-no-playlist-selected="<?php esc_attr_e('No playlists selected!', MVP_TEXTDOMAIN); ?>" 
data-upload-previously-exported-playlist-zip="<?php esc_attr_e('Make sure you upload previously exported playlist zip file starting with mvp_playlist_id_ !', MVP_TEXTDOMAIN); ?>" 
data-wrong-media="<?php esc_attr_e('It looks like you are trying to enter Youtube video as mp4, choose correct media type for your video!', MVP_TEXTDOMAIN); ?>" 
data-enter-just-id="<?php esc_attr_e('Enter just ID part, not the whole url!', MVP_TEXTDOMAIN); ?>"
data-player-type-lightbox-needs-dom="<?php esc_attr_e('Player type Lightbox needs to have DOM selector defined. This is an element in page (link, image etc..) which will open player in lightbox when user clicks on it. Please fill this field!', MVP_TEXTDOMAIN); ?>" 
data-enter-playlist-title="<?php esc_attr_e('Enter title for new playlist:', MVP_TEXTDOMAIN); ?>"
data-number-of-video-to-retrieve="<?php esc_attr_e('Enter number of videos to retrieve:', MVP_TEXTDOMAIN); ?>"
data-select-additional-playlists="<?php esc_attr_e('Select additional playlists', MVP_TEXTDOMAIN); ?>"
data-select-playlists="<?php esc_attr_e('Select playlists', MVP_TEXTDOMAIN); ?>"
data-create-graph-error="<?php esc_attr_e('Create graph error occured!', MVP_TEXTDOMAIN); ?>" 
data-clear-stat-error="<?php esc_attr_e('Clear statistics error occured!', MVP_TEXTDOMAIN); ?>" 
data-view-detail="<?php esc_attr_e('View details', MVP_TEXTDOMAIN); ?>" 
data-media-selected="<?php esc_attr_e('No media selected!', MVP_TEXTDOMAIN); ?>" 
data-sure-to-rename="<?php esc_attr_e('Are you sure you want to rename?', MVP_TEXTDOMAIN); ?>"
data-sure-to-clear="<?php esc_attr_e('Are you sure you want to clear?', MVP_TEXTDOMAIN); ?>"


></div>