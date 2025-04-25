<?php 

$ad_id = '';
$ad_options = '';

if(isset($_GET['ad_id'])){

    $ad_id = $_GET['ad_id'];


	//ad options
	$stmt = $wpdb->get_row($wpdb->prepare("SELECT title, options FROM {$global_ad_table} WHERE id = %d", $ad_id), ARRAY_A);
	$ad_title = $stmt['title'];
	$ad_options = unserialize($stmt['options']);

    //ads

    $stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$ad_table} WHERE ad_id = %d", $ad_id), ARRAY_A);
    $ad_data_global = array();
    foreach($stmt as $item){
        $ad_data_global[] = unserialize($item['options']);
    }

    //annotations

	$stmt = $wpdb->get_results($wpdb->prepare("SELECT options FROM {$annotation_table} WHERE ad_id = %d", $ad_id), ARRAY_A);
    $annotation_data_global = array();
    foreach($stmt as $item){
        $annotation_data_global[] = unserialize($item['options']);
    }
}

if(isset($_GET['mvp_msg'])){
	$msg = $_GET['mvp_msg'];
	if($msg == 'ad_created')$msg = 'Ad section created!'; 
}else{
	$msg = null;
}

?>

<script type="text/javascript">
    var adDataGlobal_arr = <?php echo(json_encode($ad_data_global, JSON_HEX_TAG)); ?>;
    var annotationDataGlobal_arr = <?php echo(json_encode($annotation_data_global, JSON_HEX_TAG)); ?>;
    var adDataGlobalOptions_arr = <?php echo(json_encode($ad_options, JSON_HEX_TAG)); ?>;
</script>


<div class='wrap'>

	<?php include("notice.php"); ?>

	<h2><?php esc_html_e('Edit ad', MVP_TEXTDOMAIN); ?> <span style="color:#FF0000; font-weight:bold;"><?php echo(esc_html($ad_title)); echo(' - ID #' . $ad_id); ?></span></h2>
	<br>	

	<form id="mvp-edit-ad-form" data-ad-id="<?php echo $ad_id; ?>">

		<div class="mvp-admin mvp-bg">

			<div class="option-tab">
			    <div class="option-toggle">
			        <span class="option-title"><?php esc_html_e('Ad section', MVP_TEXTDOMAIN); ?></span>
			    </div>
			    <div class="option-content">

				<div id="mvp-ad-tabs">

				    <ul class="mvp-tab-header">
				        <li id="mvp-tab-ad-adverts"><?php esc_html_e('Adverts', MVP_TEXTDOMAIN); ?></li>
				        <li id="mvp-tab-ad-annotations"><?php esc_html_e('Annotations', MVP_TEXTDOMAIN); ?></li>
				        <li id="mvp-tab-ad-maintenance"><?php esc_html_e('Maintenance', MVP_TEXTDOMAIN); ?></li>
				    </ul>

				    <div id="mvp-tab-ad-adverts-content" class="mvp-tab-content">
			    		<?php include('ad_section.php'); ?>
					</div>

		    		<div id="mvp-tab-ad-annotations-content" class="mvp-tab-content">
		    			<?php include('annotation_section.php'); ?>
					</div>

					<div id="mvp-tab-ad-maintenance-content" class="mvp-tab-content">

				    	<table class="form-table" >

				            <tr valign="top">
								<th><?php esc_html_e('Domain switch', MVP_TEXTDOMAIN); ?></th>
								<td>

									<p class="info"><?php esc_html_e('Rename from:', MVP_TEXTDOMAIN); ?></p>

									<input type="text" id="mvp-ad-domain-rename-from">

									<p class="info"><?php esc_html_e('Rename to:', MVP_TEXTDOMAIN); ?></p>

									<input type="text" id="mvp-ad-domain-rename-to">

									<button type="button" id="mvp-ad-domain-rename"><?php esc_attr_e('Rename', MVP_TEXTDOMAIN); ?></button>

									<p class="info"><?php esc_html_e('Use this to rename all urls in this ad section to new url.', MVP_TEXTDOMAIN); ?></p>

								</td>
							</tr>

				        </table>

					</div>

				</div>

				</div>

			</div>

		</div>	

	</form>

	<div id="mvp-sticky-action" class="mvp-sticky">
        <div id="mvp-sticky-action-inner">
            
            <button id="mvp-edit-ad-form-submit" type="button" class="button-primary" <?php disabled( !current_user_can(MVP_CAPABILITY) ); ?>><?php esc_html_e('Save Changes', MVP_TEXTDOMAIN); ?></button> 

            <a class="button-secondary" href="<?php echo admin_url("admin.php?page=mvp_ad_manager"); ?>"><?php esc_html_e('Back to Ad manager', MVP_TEXTDOMAIN); ?></a>

        </div>
    </div>

    <div id="mvp-save-holder"></div>

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

<div id="mvp-translate" 
data-fill-required-fields="<?php esc_attr_e('Please fill required fields in red!', MVP_TEXTDOMAIN); ?>" 
data-sure-to-delete="<?php esc_attr_e('Are you sure to delete?', MVP_TEXTDOMAIN); ?>" 
data-no-ads-selected="<?php esc_attr_e('No ads selected!', MVP_TEXTDOMAIN); ?>" 
data-error-importing="<?php esc_attr_e('Error importing!', MVP_TEXTDOMAIN); ?>" 
data-title-required="<?php esc_attr_e('Title is required!', MVP_TEXTDOMAIN); ?>" 
data-upload-previously-exported-ad-zip="<?php esc_attr_e('Make sure you upload previously exported ad zip file starting with mvp_ad_id_ !', MVP_TEXTDOMAIN); ?>" 

></div>