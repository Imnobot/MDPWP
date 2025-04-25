<?php 

//load players
$players = $wpdb->get_results("SELECT id, title FROM {$player_table} ORDER BY title ASC", ARRAY_A);

//load playlists
$playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A);

//load ads
$ads = $wpdb->get_results("SELECT id, title FROM {$global_ad_table} ORDER BY title ASC", ARRAY_A);

?>

	<?php include("notice.php"); ?>

	<h2><?php esc_html_e('Shortcode manager', MVP_TEXTDOMAIN); ?></h2>
	<br>

	<div class="mvp-admin mvp-shortcode-manager-wrap">


	<div class="option-tab">
	    <div class="option-toggle">
	        <span class="option-title"><?php esc_html_e('Main Shortcodes', MVP_TEXTDOMAIN); ?></span>

	        <div class="option-toggle-icon">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            </div>
	    </div>

	    <div class="option-content">

	    	<p><?php esc_html_e('Select player and playlist you have already created, and copy shortcode into a page or post.', MVP_TEXTDOMAIN); ?></p>

    		<table class='mvp-table wp-list-table widefat'>
				<tbody>

					<tr valign="top">
						<th style="width:15%"><?php esc_html_e('Select player', MVP_TEXTDOMAIN); ?></th>
						<td>
				            <select id="shortcode_player">
								<?php foreach($players as $player) : ?>
					                <option value="<?php echo($player['id']); ?>"><?php echo($player['title']); echo(' - ID #' . $player['id']); ?></option>
								<?php endforeach; ?>	
							</select>
			            </td>
					</tr>

					<tr valign="top">
						<th><?php esc_html_e('Select playlist', MVP_TEXTDOMAIN); ?></th>
						<td>
				            <select id="shortcode_playlist">
								<?php foreach($playlists as $playlist) : ?>
					                <option value="<?php echo($playlist['id']); ?>"><?php echo($playlist['title']); echo(' - ID #' . $playlist['id']); ?></option>
								<?php endforeach; ?>	
							</select>
			            </td>
					</tr>

					<tr valign="top">
						<th><?php esc_html_e('Select ads', MVP_TEXTDOMAIN); ?></th>
						<td>
				            <select id="shortcode_ad">
				            	<option value=""><?php esc_html_e('None', MVP_TEXTDOMAIN); ?></option>
								<?php foreach($ads as $ad) : ?>
					                <option value="<?php echo($ad['id']); ?>"><?php echo($ad['title']); echo(' - ID #' . $ad['id']); ?></option>
								<?php endforeach; ?>	
							</select>
			            </td>
					</tr>

					<tr valign="top">
						<th><?php esc_html_e('Shortcode', MVP_TEXTDOMAIN); ?></th>
						<td>
				            <textarea id="shortcode_generator" class="mvp-shortcode-ta" rows="3"></textarea>
			            </td>
					</tr>

					<tr valign="top">
						<th><?php esc_html_e('Shortcode for PHP page', MVP_TEXTDOMAIN); ?></th>
						<td>
				            <textarea id="shortcode_for_php" class="mvp-shortcode-ta" rows="3"></textarea>
			            </td>
					</tr>

					<tr valign="top">
						<th><?php esc_html_e('Shortcode with all attributes', MVP_TEXTDOMAIN); ?></th>
						<td>
							<p><?php esc_html_e('Use this if you want to change individual parameters in shortcode.', MVP_TEXTDOMAIN); ?></p>
				            <textarea id="shortcode_generator_all_atts" class="mvp-shortcode-ta" rows="10"></textarea>
			            </td>
					</tr>
				
				</tbody>		 

			</table>

		</div>
    </div>

    <div class="option-tab-divider"></div>

	<div class="option-tab">
		<div class="option-toggle">
	        <span class="option-title"><?php esc_html_e('Quick shortcode generator', MVP_TEXTDOMAIN); ?></span>

	        <div class="option-toggle-icon">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            </div>
	    </div>
	    <div class="option-content">	

	    	<?php include("quick_shortcode_generator.php"); ?>

		</div>
	</div>


</div>
