<?php 

	$seekbarLoadColor = isset($options['seekbarLoadColor'])?$options['seekbarLoadColor']:'rgba(0,0,0,0)';

	$markup .= "#".$wrapper_id." .mvp-settings-holder,
	#".$wrapper_id." .mvp-share-data,
	#".$wrapper_id." .mvp-info-data,
	#".$wrapper_id." .mvp-context-menu,
	#".$wrapper_id." .mvp-volume-seekbar,
	#".$wrapper_id." .mvp-pwd-data,
	#".$wrapper_id." .mvp-resume-data,
	#".$wrapper_id." .mvp-redirect-login-data,
	#".$wrapper_id." .mvp-upnext-inner,
	#".$wrapper_id." .mvp-chapter-menu-wrap,
	#".$wrapper_id." .mvp-ad-skip-btn,
	#".$wrapper_id." .mvp-embed-data,	
	#".$wrapper_id." .mvp-ad-controls .mvp-contr-btn,
	#".$wrapper_id." .mvp-nav-forward,
	#".$wrapper_id." .mvp-nav-backward,
	#".$wrapper_id." .mvp-zoom-data-holder,
	#".$wrapper_id." .mvp-minimize-close{
		background: ".$options['themeBgColor'].";
	}
	#".$wrapper_id." .mvp-playlist-selector-holder,
	#".$wrapper_id." .mvp-transcript-holder,
	#".$wrapper_id." .mvp-chapters-holder{
	    background:".$options['playlistBgColor'].";
	}

	#".$wrapper_id." .mvp-contr-btn svg{
		color:".$options['iconColor'].";
	}
	@media (hover: hover) {
	#".$wrapper_id." .mvp-contr-btn svg:hover{
		color:".$options['iconRolloverColor'].";
	}
	}
	
	#".$wrapper_id." .mvp-media-time-current{
		color: ".$options['timeCurrentTextColor'].";
	}
	#".$wrapper_id." .mvp-media-time-separator,
	#".$wrapper_id." .mvp-media-time-total{
		color: ".$options['timeTotalTextColor'].";
	}

	#".$wrapper_id." .mvp-progress-bg{
		background:".$options['seekbarBgColor'].";
	}
	#".$wrapper_id." .mvp-load-level::-webkit-progress-value{
	    background-color:".$seekbarLoadColor.";
	}
	#".$wrapper_id." .mvp-load-level::-moz-progress-bar{
	    background-color:".$seekbarLoadColor.";
	}
	#".$wrapper_id." .mvp-input-progress {
	    color:".$options['seekbarProgressColor'].";
	}
	#".$wrapper_id." .mvp-input-volume {
    	color: ".$options['volumeBgColor'].";
    }
    #".$wrapper_id." .mvp-input-volume::-webkit-slider-runnable-track {
	    background-color: ".$options['volumeLevelColor'].";
	}
	#".$wrapper_id." .mvp-solo-progress-level::-webkit-progress-value{
	    background-color:".$options['seekbarProgressColor'].";
	}
	#".$wrapper_id." .mvp-solo-progress-level::-moz-progress-bar{
	    background-color:".$options['seekbarProgressColor'].";
	}

	#".$wrapper_id." .mvp-settings-menu-item-value{
		color:".$options['settingsMenuItemValueTextColor'].";
	}
	#".$wrapper_id." .mvp-settings-holder .mvp-menu-header{
	    background-image: url('".$plugins_url."/data/svg/left-arrow.svg');
	}
	
	#".$wrapper_id." .mvp-menu-header{
		background-color: ".$options['settingsMenuHeaderBgColor'].";
		color: ".$options['settingsMenuHeaderTextColor'].";
	}
	#".$wrapper_id." .mvp-menu-item{
		color: ".$options['settingsMenuItemTextColor'].";
	}
	@media (hover: hover) {
	#".$wrapper_id." .mvp-menu-item:hover{
		background: ".$options['settingsMenuItemActiveBgColor'].";
		color: ".$options['settingsMenuItemActiveTextColor'].";
	}
	}	
	#".$wrapper_id." .mvp-menu-active{
		background: ".$options['settingsMenuItemActiveBgColor'].";
		color: ".$options['settingsMenuItemActiveTextColor'].";
	}";

?>