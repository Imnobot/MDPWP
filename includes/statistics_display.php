<?php

	date_default_timezone_set('UTC');

	//load playlists
	$playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A);

?>

<div class="wrap" id="mvp-stat-wrap" data-admin-url="<?php echo esc_url(admin_url("admin.php")); ?>">

	<h2><?php esc_html_e('Video statistics', MVP_TEXTDOMAIN); ?></h2>

	<?php // Assuming notice.php exists and is included correctly
        $notice_path = dirname(__FILE__) . "/notice.php";
        if (file_exists($notice_path)) {
             include($notice_path);
        }
    ?>

	<div class="mvp-stats-header">

		<div class="mvp-stats-playlist-selector">
			<span style="vertical-align: middle;"><?php esc_html_e('Choose playlist to show statistics data:', MVP_TEXTDOMAIN); ?></span>
			<select name="mvp-stats-playlist-list" id="mvp-stats-playlist-list">
				<option value="-1"><?php esc_html_e('All playlists', MVP_TEXTDOMAIN); ?></option>
				<?php foreach ($playlists as $playlist) : ?>
		            <option value="<?php echo esc_attr($playlist['id']); ?>"><?php echo esc_html($playlist['title'].' - ID #'.$playlist['id']); ?></option>
		        <?php endforeach; ?>
		    </select>
		</div>

		<div>
		<button type="button" class='button-primary' id="mvp-clear-statistics" title='<?php esc_attr_e('Clear Statistics', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Clear Statistics', MVP_TEXTDOMAIN); ?></button>
		</div>

	</div>

	<div class="mvp-stats-total">
		<div class="mvp-stats-total-inner">

			<div>
	    	<p class="mvp-stats-total-value mvp-stats-total-time"></p><p class="mvp-stats-total-title"><?php esc_html_e('Total time played', MVP_TEXTDOMAIN); ?></p>
	    	</div>

	    	<div>
	    	<p class="mvp-stats-total-value mvp-stats-total-play"></p><p class="mvp-stats-total-title"><?php esc_html_e('Total plays', MVP_TEXTDOMAIN); ?></p>
	    	</div>

	    	<div>
	    	<p class="mvp-stats-total-value mvp-stats-total-download"></p><p class="mvp-stats-total-title"><?php esc_html_e('Total downloads', MVP_TEXTDOMAIN); ?></p>
	    	</div>

	    	<div>
	    	<p class="mvp-stats-total-value mvp-stats-total-finish"></p><p class="mvp-stats-total-title"><?php esc_html_e('Total finished', MVP_TEXTDOMAIN); ?></p>
	    	</div>

		</div>
	</div>

	<div class="mvp-stats-total-grap">
        <canvas class="mvp-stats-total-grap-canvas" width="100%" height="250"></canvas>
	</div>

	<div class="top-box-wrap">

		<div class="top-box mvp-box-top-play-day">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS OF THE DAY', MVP_TEXTDOMAIN); ?></h2>
					<?php /* === CORRECTED plugins_url() === */ ?>
					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat" ><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo esc_url(plugins_url('../assets/icons/list.png', __FILE__));?>"></span>

				</div>

				<div class="top-box-content">
					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>
				</div>

				<div class="top-box-content-total">
					<span class="top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
					<span class="top-box-content-total-value"></span>
				</div>

			</div>
		</div>

		<div class="top-box mvp-box-top-play-week">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS THIS WEEK', MVP_TEXTDOMAIN); ?></h2>
					<?php /* === CORRECTED plugins_url() === */ ?>
					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo esc_url(plugins_url('../assets/icons/list.png', __FILE__));?>"></span>
				</div>

				<div class="top-box-content">
					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>
				</div>

				<div class="top-box-content-total">
					<span class="top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
					<span class="top-box-content-total-value"></span>
				</div>

			</div>
		</div>

		<div class="top-box mvp-box-top-play-month">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS THIS MONTH', MVP_TEXTDOMAIN); ?></h2>
					<?php /* === CORRECTED plugins_url() === */ ?>
					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo esc_url(plugins_url('../assets/icons/list.png', __FILE__));?>"></span>

				</div>

				<div class="top-box-content">
					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>
				</div>

				<div class="top-box-content-total">
					<span class="top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
					<span class="top-box-content-total-value"></span>
				</div>

			</div>
		</div>

	</div>

	<div class="top-box-wrap">

		<div class="top-box mvp-box-top-play-all-time">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS ALL TIME', MVP_TEXTDOMAIN); ?></h2>
					<?php /* === CORRECTED plugins_url() === */ ?>
					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo esc_url(plugins_url('../assets/icons/list.png', __FILE__));?>"></span>

				</div>

				<div class="top-box-content">
					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>
				</div>

				<div class="top-box-content-total">
					<span class="top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
					<span class="top-box-content-total-value"></span>
				</div>

			</div>
		</div>

		<div class="top-box mvp-box-top-download-all-time">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP DOWNLOADS ALL TIME', MVP_TEXTDOMAIN); ?></h2>
					<?php /* === CORRECTED plugins_url() === */ ?>
					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo esc_url(plugins_url('../assets/icons/list.png', __FILE__));?>"></span>

				</div>

				<div class="top-box-content">
					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>
				</div>

				<div class="top-box-content-total">
					<span class="top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
					<span class="top-box-content-total-value"></span>
				</div>

			</div>
		</div>

		<div class="top-box mvp-box-top-finish-all-time">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP FINISHED ALL TIME', MVP_TEXTDOMAIN); ?></h2>
					<?php /* === CORRECTED plugins_url() === */ ?>
					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo esc_url(plugins_url('../assets/icons/list.png', __FILE__));?>"></span>

				</div>

				<div class="top-box-content">
					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>
				</div>

				<div class="top-box-content-total">
					<span class="top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
					<span class="top-box-content-total-value"></span>
				</div>

			</div>
		</div>

	</div>

	<div class="top-box-wrap">

		<div class="top-box mvp-box-top-plays-country-all-time">
			<div class="top-box-inner">
				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS PER COUNTRY ALL TIME', MVP_TEXTDOMAIN); ?></h2>
				</div>
				<div class="top-box-content">
					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('Country', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Continent', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Time played', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>
					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>
					<div class="top-box-content-total">
						<span class="top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
						<span class="top-box-content-total-value"></span>
					</div>
				</div>
			</div>
		</div>

		<div class="top-box mvp-box-top-plays-user-all-time">
			<div class="top-box-inner">
				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS PER USER ALL TIME', MVP_TEXTDOMAIN); ?></h2>
				</div>
				<div class="top-box-content">
					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('User name', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Role', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Time played', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>
					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>
					<div class="top-box-content-total">
						<span class="top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
						<span class="top-box-content-total-value"></span>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div id="mvp-stat-graph-options-wrap">

		<button type="button" class='button-primary' id="graph-options-btn" title='<?php esc_attr_e('Graph options', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Graph options', MVP_TEXTDOMAIN); ?></button>

		<div id="mvp-stat-graph-options">

			<div class="action">
		        <div class="action-title"><?php esc_html_e('Graph type', MVP_TEXTDOMAIN); ?></div>
		        <div class="item">
		            <input type="radio" class="hsrc graph-type" name="graph-type" value="bar" id="bar" checked="checked" /><label for="bar"> <?php esc_html_e('bar', MVP_TEXTDOMAIN); ?></label>
		        </div>
		        <div class="item">
		            <input type="radio" class="hsrc graph-type" name="graph-type" value="line" id="line" /><label for="line"> <?php esc_html_e('line', MVP_TEXTDOMAIN); ?></label>
		        </div>
		    </div>

		    <div class="action graph-data">
		        <div class="action-title"><?php esc_html_e('Data to display', MVP_TEXTDOMAIN); ?></div>
		        <div class="item">
		            <input type="checkbox" class="hsrc graph-data-display" value="c_play" id="plays" checked="checked" /><label for="plays"> <?php esc_html_e('plays', MVP_TEXTDOMAIN); ?></label>
		        </div>
		        <div class="item">
		            <input type="checkbox" class="hsrc graph-data-display" value="c_download" id="downloads" /><label for="downloads"> <?php esc_html_e('downloads', MVP_TEXTDOMAIN); ?></label>
		        </div>
		        <div class="item">
		            <input type="checkbox" class="hsrc graph-data-display" value="c_finish" id="finishes" /><label for="finishes"> <?php esc_html_e('finishes', MVP_TEXTDOMAIN); ?></label>
		        </div>
		    </div>

		    <div class="action">
		        <div class="action-title"><?php esc_html_e('Number of days to display', MVP_TEXTDOMAIN); ?></div>
		        <div class="item">
		            <input type="number" class="graph-return-days" min="1" step="1" value="7"/>
		        </div>
		    </div>

		</div>

	</div>

	<div class="list-actions">

  		<div class="list-actions-wrap list-actions-left mvp-playlist-actions">
  			<input type="text" id="mvp-filter-media" placeholder="<?php esc_attr_e('Search video..', MVP_TEXTDOMAIN); ?>">
  		</div>

  		<div class="list-actions-wrap list-actions-right mvp-media-pagination-container">
			<div class="mvp-pagination-per-page">
				<label for="mvp-pag-per-page-num" id="mvp-pag-per-page-label"><?php esc_html_e('Videos per page', MVP_TEXTDOMAIN); ?></label>
			    <input type="number" min="1" id="mvp-pag-per-page-num" value="10">
			    <button type="button" id="mvp-pag-per-page-btn"><?php esc_html_e('Set', MVP_TEXTDOMAIN); ?></button>
			</div>
			<div class="mvp-pagination-wrap"></div>
		</div>

    </div>

	<table class='mvp-table wp-list-table widefat stat-table' id="mvp-stat-list">
        <thead class="stat-table-header">
            <tr>
                <th class="mvp-sort-field" data-type="media_title" title="<?php esc_attr_e('Sort by Media Title', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Media Title', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">▼</span><span class="mvp-triangle-dir mvp-triangle-dir-down">▲</span></span></th>
                <th class="mvp-sort-field" data-type="playlist_title" title="<?php esc_attr_e('Sort by Playlist Title', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Playlist Title', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">▼</span><span class="mvp-triangle-dir mvp-triangle-dir-down">▲</span></span></th>
                <th class="mvp-sort-field" data-type="total_time" title="<?php esc_attr_e('Sort by Time Played', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Time played', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">▼</span><span class="mvp-triangle-dir mvp-triangle-dir-down">▲</span></span></th>
                <th class="mvp-sort-field" data-type="total_play" title="<?php esc_attr_e('Sort by Plays', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">▼</span><span class="mvp-triangle-dir mvp-triangle-dir-down">▲</span></span></th>
                <th class="mvp-sort-field" data-type="total_download" title="<?php esc_attr_e('Sort by Downloads', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Downloads', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">▼</span><span class="mvp-triangle-dir mvp-triangle-dir-down">▲</span></span></th>
                <th class="mvp-sort-field" data-type="total_finish" title="<?php esc_attr_e('Sort by Finishes', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Finishes', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">▼</span><span class="mvp-triangle-dir mvp-triangle-dir-down">▲</span></span></th>
                <th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
            </tr>
        </thead>
        <tbody id="media-item-list">
            <tr class="mvp-stat-row media-item media-item-container-hidden mvp-pagination-hidden">
                <td class="media-title"></td>
                <td class="media-playlist-title"></td> <?php /* Added this cell */ ?>
                <td class="media-duration" style="display: none;"></td> <?php /* Raw duration value if needed */ ?>
                <td class="media-time"></td>
                <td class="media-play"></td>
                <td class="media-download"></td>
                <td class="media-finish"></td>
                <td><a href='#' class="mvp-stat-create-graph"><?php esc_html_e('Create graph', MVP_TEXTDOMAIN); ?></a><a href='#' class="mvp-stat-remove-graph" style="display:none;"><?php esc_html_e('Remove graph', MVP_TEXTDOMAIN); ?></a></td> <?php /* Hide remove link initially */ ?>
            </tr>
        </tbody>
	</table>

</div><!-- end wrap -->

<div id="mvp-add-playlist-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">
				<form id="mvp-add-playlist-form" method="post">
					<div class="mvp-admin mvp-bg">
						<p><?php esc_html_e('Create playlist from these videos.', MVP_TEXTDOMAIN); ?></p>
						<table class="form-table">
							<tr valign="top">
								<th><label for="playlist-title-modal"><?php esc_html_e('Playlist title', MVP_TEXTDOMAIN); ?></label></th>
								<td><input type="text" name="playlist-title" id="playlist-title-modal" required placeholder="<?php esc_attr_e('Enter playlist title', MVP_TEXTDOMAIN); ?>"></td>
							</tr>
						</table>
					</div>
					<div class="mvp-modal-actions">
						<button id="mvp-add-playlist-cancel" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
			            <button id="mvp-add-playlist-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Add playlist', MVP_TEXTDOMAIN); ?></button>
	    			</div>
    			</form>
    		</div>
        </div>
    </div>
</div>


<div id="mvp-user-data-modal" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">
				<div class="mvp-admin mvp-bg">
					<h2><?php esc_html_e('TOP PLAYS PER USER ALL TIME', MVP_TEXTDOMAIN); ?> <span class="user-data-modal-title"></span></h2>
					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Time played', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>
				</div>
				<div class="mvp-modal-actions">
					<button id="mvp-user-data-close" type="button"><?php esc_html_e('Close', MVP_TEXTDOMAIN); ?></button>
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

<?php // Hidden div for translations used by JS ?>
<div id="mvp-translate" style="display:none;"
    data-view-detail="<?php esc_attr_e('View details', MVP_TEXTDOMAIN); ?>"
    data-create-graph-error="<?php esc_attr_e('Error creating graph. Please try again.', MVP_TEXTDOMAIN); ?>"
    data-title-required="<?php esc_attr_e('Playlist title is required.', MVP_TEXTDOMAIN); ?>"
    data-sure-to-clear-stat="<?php esc_attr_e('Are you sure you want to clear statistics for the selected playlist?', MVP_TEXTDOMAIN); ?>"
    data-clear-stat-error="<?php esc_attr_e('Error clearing statistics. Please try again.', MVP_TEXTDOMAIN); ?>"
    data-no-results="<?php esc_attr_e('No results found.', MVP_TEXTDOMAIN); ?>"
    data-total-plays-label="<?php esc_attr_e('Total plays per day', MVP_TEXTDOMAIN); ?>" <?php // Added for graph label ?>
    >
</div>