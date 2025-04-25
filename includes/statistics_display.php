<?php

	date_default_timezone_set('UTC');

	//load playlists
	$playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A);

?>

<div class="wrap">

	<?php include("playeri.php"); ?>

	<div class="mvp-settings-wrap-panel aptenv-ready">
	<div id="mvp-stat-section" data-admin-url="<?php echo admin_url("admin.php"); ?>">

	<h2><?php esc_html_e('Video statistics', MVP_TEXTDOMAIN); ?></h2>

	<?php include("notice.php"); ?>

	<div class="mvp-stats-header">

		<div class="mvp-stats-selector">

			<div class="mvp-stats-playlist-selector">
				<span style="vertical-align: middle;"><?php esc_html_e('Choose playlist to show statistics data:', MVP_TEXTDOMAIN); ?></span>

				<input type="text" id="mvp-stats-playlist-list" list="mvp-stats-playlist-list-select">
				<datalist id="mvp-stats-playlist-list-select">
				    <option value="-1"><?php esc_html_e('All playlists', MVP_TEXTDOMAIN); ?></option>
					<?php foreach ($playlists as $playlist) : ?>
			            <option value="<?php echo($playlist['id']); ?>"><?php echo($playlist['title'].' - ID #'.$playlist['id']); ?></option>
			        <?php endforeach; ?>
				</datalist>

			</div>

			<div class="mvp-stats-user-selector">
				<span style="vertical-align: middle;"><?php esc_html_e('Choose user to show statistics data:', MVP_TEXTDOMAIN); ?></span>
				<select id="mvp-stats-user-list">
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

		</div>	
		



		<div>
			<button type="button" class='button-primary' id="mvp-clear-statistics" title='<?php esc_attr_e('Clear Statistics', MVP_TEXTDOMAIN); ?>'><?php esc_html_e('Clear Statistics', MVP_TEXTDOMAIN); ?></button>
			<p><?php esc_html_e('This will clear statistics for selected users.', MVP_TEXTDOMAIN); ?></p>
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

					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat" ><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo(plugins_url('apmvp/assets/icons/list.png'));?>"></span>	

				</div>

				<div class="top-box-content">

					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('#', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>

					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>

					<div class="mvp-top-box-content-total">

						<div class="mvp-top-box-content-total-wrap">
							<span class="mvp-top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
							<span class="mvp-top-box-content-total-value"></span>
						</div>

						<button type="button" class="mvp-stat-export mvp-stat-hidden"><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></button>
					</div>

				</div>

			</div>
		</div>

		<div class="top-box mvp-box-top-play-week">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS THIS WEEK', MVP_TEXTDOMAIN); ?></h2>

					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo(plugins_url('apmvp/assets/icons/list.png'));?>"></span>	
				</div>

				<div class="top-box-content">

					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('#', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>

					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>

					<div class="mvp-top-box-content-total">

						<div class="mvp-top-box-content-total-wrap">
							<span class="mvp-top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
							<span class="mvp-top-box-content-total-value"></span>
						</div>

						<button type="button" class="mvp-stat-export mvp-stat-hidden"><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></button>
					</div>

				</div>

			</div>
		</div>

		<div class="top-box mvp-box-top-play-month">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS THIS MONTH', MVP_TEXTDOMAIN); ?></h2>

					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo(plugins_url('apmvp/assets/icons/list.png'));?>"></span>	

				</div>

				<div class="top-box-content">

					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('#', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>

					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>

					<div class="mvp-top-box-content-total">

						<div class="mvp-top-box-content-total-wrap">
							<span class="mvp-top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
							<span class="mvp-top-box-content-total-value"></span>
						</div>

						<button type="button" class="mvp-stat-export mvp-stat-hidden"><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></button>
					</div>

				</div>

			</div>
		</div>

	</div>

	<div class="top-box-wrap">

		<div class="top-box mvp-box-top-play-all-time">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP PLAYS ALL TIME', MVP_TEXTDOMAIN); ?></h2>

					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo(plugins_url('apmvp/assets/icons/list.png'));?>"></span>	

				</div>

				<div class="top-box-content">

					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('#', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>

					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>

					<div class="mvp-top-box-content-total">

						<div class="mvp-top-box-content-total-wrap">
							<span class="mvp-top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
							<span class="mvp-top-box-content-total-value"></span>
						</div>

						<button type="button" class="mvp-stat-export mvp-stat-hidden"><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></button>
					</div>

				</div>

			</div>
		</div>

		<div class="top-box mvp-box-top-download-all-time">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP DOWNLOADS ALL TIME', MVP_TEXTDOMAIN); ?></h2>

					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo(plugins_url('apmvp/assets/icons/list.png'));?>"></span>	

				</div>

				<div class="top-box-content">

					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('#', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Downloads', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>

					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>

					<div class="mvp-top-box-content-total">

						<div class="mvp-top-box-content-total-wrap">
							<span class="mvp-top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
							<span class="mvp-top-box-content-total-value"></span>
						</div>

						<button type="button" class="mvp-stat-export mvp-stat-hidden"><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></button>
					</div>

				</div>

			</div>
		</div>

		<div class="top-box mvp-box-top-finish-all-time">
			<div class="top-box-inner">

				<div class="top-box-title">
					<h2><?php esc_html_e('TOP FINISHED ALL TIME', MVP_TEXTDOMAIN); ?></h2>

					<span class="mvp-stat-icon2 mvp-create-playlist-from-stat"><img title="<?php esc_attr_e('Create playlist from these videos', MVP_TEXTDOMAIN); ?>" src="<?php echo(plugins_url('apmvp/assets/icons/list.png'));?>"></span>	

				</div>

				<div class="top-box-content">

					<table class="mvp-table wp-list-table widefat inline-stat-table inline-stat-table-hidden">
	                <thead>
	                    <tr>
	                        <th><?php esc_html_e('#', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
	                        <th><?php esc_html_e('Finishes', MVP_TEXTDOMAIN); ?></th>
	                    </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>

					<div class="mvp-stat-no-data mvp-stat-hidden"><p><?php esc_html_e('Data Not Available', MVP_TEXTDOMAIN); ?></p></div>

					<div class="mvp-top-box-content-total">

						<div class="mvp-top-box-content-total-wrap">
							<span class="mvp-top-box-content-total-title"><?php esc_html_e('Grand total:', MVP_TEXTDOMAIN); ?></span>
							<span class="mvp-top-box-content-total-value"></span>
						</div>

						<button type="button" class="mvp-stat-export mvp-stat-hidden"><?php esc_html_e('Export', MVP_TEXTDOMAIN); ?></button>
					</div>

				</div>
			</div>
		</div>

	</div>

	<div id="mvp-stat-graph-options-wrap">

		<button type="button" class='button-primary' id="graph-options-btn" title='Graph options'><?php esc_html_e('Graph options', MVP_TEXTDOMAIN); ?></button>

		<div id="mvp-stat-graph-options">

			<div class="action">
		        <div class="action-title"><?php esc_html_e('Graph type', MVP_TEXTDOMAIN); ?></div>
		        <div class="item">
		            <input type="radio" class="hsrc graph-type" name="graph-type" value="bar" id="bar" checked="" /><label for="bar"> <?php esc_html_e('bar', MVP_TEXTDOMAIN); ?></label>
		        </div>
		        <div class="item">
		            <input type="radio" class="hsrc graph-type" name="graph-type" value="line" id="line" /><label for="line"> <?php esc_html_e('line', MVP_TEXTDOMAIN); ?></label>
		        </div>   
		    </div>

		    <div class="action graph-data">
		        <div class="action-title"><?php esc_html_e('Data to display', MVP_TEXTDOMAIN); ?></div>
		        <div class="item">
		            <input type="checkbox" class="hsrc graph-data-display" value="c_play" id="plays" checked="" /><label for="plays"> <?php esc_html_e('plays', MVP_TEXTDOMAIN); ?></label>
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

  			<input type="text" id="mvp-stat-filter-media" placeholder="<?php esc_attr_e('Search video..', MVP_TEXTDOMAIN); ?>">

  		</div>

  		<div class="list-actions-wrap list-actions-right mvp-media-pagination-container">

			<div class="mvp-pagination-per-page">
				<label for="mvp-stat-pag-per-page-num" id="mvp-pag-per-page-label"><?php esc_html_e('Videos per page', MVP_TEXTDOMAIN); ?></label>
			    <input type="number" min="1" id="mvp-stat-pag-per-page-num" value="10">
			    <button type="button" id="mvp-stat-pag-per-page-btn"><?php esc_html_e('Set', MVP_TEXTDOMAIN); ?></button>
			</div>

		<div class="mvp-stat-pagination-wrap"></div>

		</div>

    </div>

	<table class='mvp-table wp-list-table widefat stat-table' id="mvp-stat-list">
		<thead class="stat-table-header">
			<tr>

				<th class="mvp-sort-field" data-type="title" title="<?php esc_attr_e('Sort', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></th>

				<th class="mvp-sort-field" data-type="duration" title="<?php esc_attr_e('Sort', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Time played', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></th>

				<th class="mvp-sort-field" data-type="play" title="<?php esc_attr_e('Sort', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Plays', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></th>

				<th class="mvp-sort-field" data-type="download" title="<?php esc_attr_e('Sort', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Downloads', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></th>

				<th class="mvp-sort-field" data-type="finish" title="<?php esc_attr_e('Sort', MVP_TEXTDOMAIN); ?>"><a href="#"><?php esc_html_e('Finishes', MVP_TEXTDOMAIN); ?></a><span class="mvp-triangle-dir-wrap"><span class="mvp-triangle-dir mvp-triangle-dir-up">&#9660;</span><span class="mvp-triangle-dir mvp-triangle-dir-down">&#9650;</span></span></th>

				<th><?php esc_html_e('Actions', MVP_TEXTDOMAIN); ?></th>
			</tr>
		</thead>
		<tbody id="mvp-stat-media-item-list">
			
			<tr class="mvp-stat-row media-item media-item-container-hidden mvp-pagination-hidden">

				<td class="media-title"></td>
				<td class="media-duration" style="display: none;"></td>
				<td class="media-time"></td>
				<td class="media-play"></td>
				<td class="media-download"></td>
				<td class="media-finish"></td>

				<td><a href='#' class="mvp-stat-create-graph"><?php esc_html_e('Create graph', MVP_TEXTDOMAIN); ?></a><a href='#' class="mvp-stat-remove-graph"><?php esc_html_e('Remove graph', MVP_TEXTDOMAIN); ?></a></td>
				
			</tr>

		</tbody>		 
	</table>

</div>
</div>
</div>

<div id="mvp-add-playlist-modal-stat" class="mvp-modal">
    <div class="mvp-modal-bg">
        <div class="mvp-modal-inner">
        	<div class="mvp-modal-content">

				<form id="mvp-add-playlist-form" method="post">

					<div class="mvp-admin mvp-bg">

						<p><?php esc_html_e('Create playlist from these videos.', MVP_TEXTDOMAIN); ?></p>

						<table class="form-table">
							
							<tr valign="top">
								<th><?php esc_html_e('Playlist title', MVP_TEXTDOMAIN); ?></th>
								<td><input type="text" name="playlist-title" id="playlist-title" required placeholder="<?php esc_attr_e('Enter playlist title', MVP_TEXTDOMAIN); ?>"></td>
							</tr>

						</table>

					</div>

					<div class="mvp-modal-actions">	
						<button id="mvp-add-playlist-cancel-stat" type="button"><?php esc_html_e('Cancel', MVP_TEXTDOMAIN); ?></button>
			            <button id="mvp-add-playlist-submit-stat" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Add playlist', MVP_TEXTDOMAIN); ?></button> 
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

