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
data-admin-edit-playlist="<?php esc_attr_e('Admin is currently editing this playlist.', MVP_TEXTDOMAIN); ?>"
data-user-edit-playlist="<?php esc_attr_e('User ID # is currently editing this playlist.', MVP_TEXTDOMAIN); ?>"
data-can-upload="<?php esc_attr_e('Number of songs that can be added to this playlist is', MVP_TEXTDOMAIN); ?>"

data-schedule-day-invalid="<?php esc_attr_e('Choose week days! If you want to have schedule every day, then change schedule period to daily.', MVP_TEXTDOMAIN); ?>"
data-schedule-time-invalid="<?php esc_attr_e('End time cannot be less or equal to start time!', MVP_TEXTDOMAIN); ?>"
data-schedule-date-invalid="<?php esc_attr_e('End date cannot be less than start date!', MVP_TEXTDOMAIN); ?>"
data-delete-all-schedule="<?php esc_attr_e('This will delete all schedules. Continue?', MVP_TEXTDOMAIN); ?>"
data-really-delete-all-schedule="<?php esc_attr_e('Really delete all schedules?', MVP_TEXTDOMAIN); ?>"
data-enter-new-title-player="<?php esc_attr_e('Enter title for new player', MVP_TEXTDOMAIN); ?>"
data-enter-new-title-schedule="<?php esc_attr_e('Enter title for new schedule', MVP_TEXTDOMAIN); ?>"
data-add-schedule="<?php esc_attr_e('Add', MVP_TEXTDOMAIN); ?>"
data-edit-schedule="<?php esc_attr_e('Edit', MVP_TEXTDOMAIN); ?>"
data-delete-schedule="<?php esc_attr_e('Delete', MVP_TEXTDOMAIN); ?>"
data-disable-schedule="<?php esc_attr_e('Disable', MVP_TEXTDOMAIN); ?>"
data-enable-schedule="<?php esc_attr_e('Enable', MVP_TEXTDOMAIN); ?>"
data-yes="<?php esc_attr_e('Yes', MVP_TEXTDOMAIN); ?>"
data-schedule-play-order-sequence="<?php esc_attr_e('In sequence', MVP_TEXTDOMAIN); ?>"
data-schedule-play-order-random="<?php esc_attr_e('Random', MVP_TEXTDOMAIN); ?>"
data-schedule-period-daily="<?php esc_attr_e('Daily', MVP_TEXTDOMAIN); ?>"
data-schedule-period-weekly="<?php esc_attr_e('Weekly', MVP_TEXTDOMAIN); ?>"
data-schedule-overlap="<?php esc_attr_e('Warning! Schedule conflict detected. Some schedules have overlapping display times.', MVP_TEXTDOMAIN); ?>"
data-no-schedules="<?php esc_attr_e('You have deleted all existing schedules! Continue?', MVP_TEXTDOMAIN); ?>"
data-schedule-ignore="<?php esc_attr_e('Ignore this schedule when comparing schedules? Schedule will not be deleted just ignored.', MVP_TEXTDOMAIN); ?>"
data-low-high-invalid="<?php esc_attr_e('Low time limit cannot be higher or equal than high time limit!', MVP_TEXTDOMAIN); ?>"
data-no-file-selected="<?php esc_attr_e('No file selected! Please upload file.', MVP_TEXTDOMAIN); ?>"
data-no-logged-in-user="<?php esc_attr_e('Not logged in', MVP_TEXTDOMAIN); ?>"
data-delete="<?php esc_attr_e('Delete', MVP_TEXTDOMAIN); ?>"

data-stat-plays="<?php esc_attr_e('Plays', MVP_TEXTDOMAIN); ?>"
data-stat-finishes="<?php esc_attr_e('Finishes', MVP_TEXTDOMAIN); ?>"
data-stat-seconds="<?php esc_attr_e('Seconds played', MVP_TEXTDOMAIN); ?>"
data-stat-engagement="<?php esc_attr_e('Engagement', MVP_TEXTDOMAIN); ?>"

data-remove="<?php esc_attr_e('Remove', MVP_TEXTDOMAIN); ?>"
data-sure="<?php esc_attr_e('Are you sure?', MVP_TEXTDOMAIN); ?>"
data-exist="<?php esc_attr_e('Already exist!', MVP_TEXTDOMAIN); ?>"


></div>