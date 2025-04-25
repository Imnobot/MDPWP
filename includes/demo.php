<?php 

$examples = array(

	'aviva_vrb_scroll_drot' => 'Playlist vertical right / bottom, description right of thumbnail, scroll navigation, skin aviva',
	'pollux_vrb_buttons_dot' => 'Playlist vertical right / bottom, description over thumbnail, button navigation, skin pollux',
	'sirius_vb_scroll_drot' => 'Playlist vertical bottom, description right of thumbnail, scroll navigation, skin sirius',
	'aviva_hb_buttons_dot_spaced' => 'Playlist horizontal bottom, description over thumbnail, button navigation spaced, skin aviva',
	'flat_outer_gdot' => 'Playlist outer (below player, endless scroll), description over thumbnail, skin flat',
	'flat_wall_gdbt' => 'Playlist grid wall with lightbox, description below thumbnail, skin flat',
    'pollux_no_playlist' =>' Use just player (no visible playlist), skin pollux',

    'grid1' => 'Display playlist in grid layout 1, description below thumbnail, player opens in lightbox, show percentage watched',
    'grid2' => 'Display playlist in grid layout 2, description over thumbnail, player opens in lightbox, useful for different sized images',
    'grid3' => 'Display playlist in grid layout 3, description right of thumbnail, player opens in lightbox',
    'masonry' => 'Display playlist in grid layout masonry, description below thumbnail, player opens in lightbox, , useful for different sized images',
);

?>

<div class="wrap">

	<h2><?php esc_html_e('Quick Import examples', MVP_TEXTDOMAIN); ?></h2>

	<p><?php printf(__( 'Here are some demo examples on different player styles. For more details on shortcodes, check <a href="%s" target="_blank">Shortcode</a> section and plugin documentation.', MVP_TEXTDOMAIN), esc_url( 'admin_url("admin.php?page=mvp_shortcodes")' ));?></p>

	<p><a href='<?php echo admin_url("admin.php?page=mvp_settings"); ?>'><?php esc_html_e('Note: if you are using Youtube or Vimeo videos set API keys in Credentails!', MVP_TEXTDOMAIN); ?></a> </p>

	<select id="style-imports" style="min-width: 900px;">
		<?php foreach ($examples as $key => $value) : ?>
            <option value="<?php echo($key); ?>"><?php echo($value);?></option>
		<?php endforeach; ?>	
	</select>

	<img id="mvp-sample-import" src="" alt=""/>

	<p><strong><?php esc_html_e('Shortcode:', MVP_TEXTDOMAIN); ?></strong></p>

	<textarea class="mvp-demo-sc" id="aviva_vrb_scroll_drot" style="width: 70%;" rows="3">[apmvp playlist_position="vrb" preset="aviva" playlist_style="drot" navigation_type="scroll" playlist_scroll_type="mcustomscrollbar2 type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="20" load_more="1"]</textarea>

	<textarea class="mvp-demo-sc" id="pollux_vrb_buttons_dot" style="width: 70%;" rows="3">[apmvp playlist_position="vrb" preset="pollux" playlist_style="dot" navigation_type="buttons" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="20" load_more="1"]</textarea>

	<textarea class="mvp-demo-sc" id="sirius_vb_scroll_drot" style="width: 70%;" rows="3">[apmvp playlist_position="vb" preset="sirius" playlist_style="drot" navigation_type="scroll" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="20" load_more="1"]</textarea>

	<textarea class="mvp-demo-sc" id="aviva_hb_buttons_dot_spaced" style="width: 70%;" rows="3">[apmvp playlist_position="hb" preset="aviva" playlist_style="dot" navigation_type="buttons" navigation_style="spaced" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="20" load_more="1"]</textarea>

	<textarea class="mvp-demo-sc" id="flat_outer_gdot" style="width: 70%;" rows="3">[apmvp playlist_position="outer" preset="flat" playlist_grid_style="gdot" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="9" load_more="1"]</textarea>

	<textarea class="mvp-demo-sc" id="flat_wall_gdbt" style="width: 70%;" rows="3">[apmvp playlist_position="wall" preset="flat" playlist_grid_style="gdbt" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="9" load_more="1" active_item="-1" show_search_field="1"]</textarea>

	<textarea class="mvp-demo-sc" id="pollux_no_playlist" style="width: 70%;" rows="3">[apmvp playlist_position="no-playlist" preset="pollux" type="youtube_single" path="pSOoXLRBDuk" noapi="1"]</textarea>

	<textarea class="mvp-demo-sc" id="grid1" style="width: 70%;" rows="3">[apmvp playlist_position="wall" grid_type="javascript" playlist_grid_style="gdbt" playlist_item_content="thumb,title,date,description,duration" show_search_field="1" display_watched_percentage="1" preset="aviva" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="9" load_more="1"]</textarea>

	<textarea class="mvp-demo-sc" id="grid2" style="width: 70%;" rows="3">[apmvp playlist_position="wall" grid_type="grid2" playlist_grid_style="gdot" playlist_item_content="thumb,title,date,description,duration" show_search_field="1" preset="aviva" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="16" load_more="1"]</textarea>

	<textarea class="mvp-demo-sc" id="grid3" style="width: 70%;" rows="3">[apmvp playlist_position="wall" grid_type="grid3" playlist_grid_style="gdrot" playlist_item_content="thumb,title,date,description,duration" show_search_field="1" preset="aviva" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="9" load_more="1"]</textarea>

	<textarea class="mvp-demo-sc" id="grid3" style="width: 70%;" rows="3">[apmvp playlist_position="wall" grid_type="masonry" playlist_grid_style="gdot" playlist_item_content="thumb,title,date,description,duration" show_search_field="1" preset="aviva" type="youtube_playlist" path="PLFgquLnL59alCl_2TQvOiD5Vgm1hCaGSI" limit="15" load_more="1"]</textarea>


	


</div>