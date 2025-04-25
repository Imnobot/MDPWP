<?php 

	$markup .= "#".$wrapper_id." .mvp-settings-holder,
	#".$wrapper_id." .mvp-player-controls-bottom,
	#".$wrapper_id." .mvp-volume-seekbar,
	#".$wrapper_id." .mvp-player-controls-top .mvp-contr-btn,
	#".$wrapper_id." .mvp-share-data,
	#".$wrapper_id." .mvp-info-data,
	#".$wrapper_id." .mvp-embed-data,
	#".$wrapper_id." .mvp-context-menu,
	#".$wrapper_id." .mvp-pwd-data,
	#".$wrapper_id." .mvp-resume-data,
	#".$wrapper_id." .mvp-redirect-login-data,
	#".$wrapper_id." .mvp-upnext-inner,
	#".$wrapper_id." .mvp-chapter-menu-wrap,
	#".$wrapper_id." .mvp-ad-skip-btn,
	#".$wrapper_id." .mvp-ad-controls .mvp-contr-btn,
	#".$wrapper_id." .mvp-nav-forward,
	#".$wrapper_id." .mvp-nav-backward,
	#".$wrapper_id." .mvp-minimize-close,
	#".$wrapper_id." .mvp-tooltip,
	#".$wrapper_id." .mvp-transcript-holder,
	#".$wrapper_id." .mvp-chapters-holder,
	#".$wrapper_id." .mvp-playlist-selector-holder{
		background: ".$options['themeBgColor'].";
	}

	#".$wrapper_id." .mvp-contr-btn{
		width:40px;
		height:100%;
		float: left;
		position: relative;
		cursor: pointer;
	}

	#".$wrapper_id." .mvp-contr-btn svg{
		color:".$options['iconColor'].";
		height: 15px;
	}
	@media (hover: hover) {
	#".$wrapper_id." .mvp-contr-btn:hover svg{
		color:".$options['iconRolloverColor'].";
	}
	}

	#".$wrapper_id." .mvp-player-controls-bottom{
		position: absolute;
	    height: 50px;
	    bottom: 0;
	    left: 0;
	    width: 100%;
	    display: flex;
	}
	#".$wrapper_id." .mvp-player-controls-top{
		position:absolute;
		width:40px;
		top:10px;
		right:10px;
	}
	#".$wrapper_id." .mvp-player-controls-top .mvp-contr-btn{
		height: 40px;
		width: 40px;
		margin-bottom: 1px;
		overflow: hidden;
	}

	#".$wrapper_id." .mvp-player-controls-bottom-left{
	}
	#".$wrapper_id." .mvp-player-controls-bottom-right{
		position: relative;
	    margin-left: auto;
	}

	#".$wrapper_id." .mvp-playback-toggle{
		background: ".$options['iconRolloverColor'].";
	}
	#".$wrapper_id." .mvp-playback-toggle svg{
		color:".$options['themeBgColor']."!important;
	}


	#".$wrapper_id." .mvp-media-time-current,
	#".$wrapper_id." .mvp-media-time-separator,
	#".$wrapper_id." .mvp-media-time-total{
		position:relative;
		top: 50%;
		left:0px;
		text-align: center;
		float:left;
		margin:0!important;
		font-size:12px!important;
	    transform: translateY(-50%);
	}
	#".$wrapper_id." .mvp-media-time-current,
	#".$wrapper_id." .mvp-media-time-total{
		padding-left: 10px;
		padding-right: 10px;
	}

	#".$wrapper_id." .mvp-media-time-current{
		color: ".$options['timeCurrentTextColor'].";
	}
	#".$wrapper_id." .mvp-media-time-separator,
	#".$wrapper_id." .mvp-media-time-total{
		color: ".$options['timeTotalTextColor'].";
	}

	#".$wrapper_id." .mvp-seekbar-wrap{
		position:relative;
		margin: 0 10px;
	    height: 100%;
	    overflow: hidden;
	}
	#".$wrapper_id." .mvp-seekbar{
	    overflow: hidden;
	    height: 100%;
	    cursor: pointer;
	    touch-action: none;
	    flex: 1;
	}
	#".$wrapper_id." .mvp-progress-bg{
		position:relative;
		width:100%;
		top:21px;
		height:7px;
		overflow: hidden;
	}
	#".$wrapper_id." .mvp-load-level{
		position:absolute;
		top:0;
		height:100%;
	}
	#".$wrapper_id." .mvp-progress-level{
		position:absolute;
		top:0;
		height:100%;
		transition: width 0.2s linear;
	}

	#".$wrapper_id." .mvp-solo-progress-bg,
	#".$wrapper_id." .mvp-progress-bg{
		background:".$options['seekbarBgColor'].";
	}
	#".$wrapper_id." .mvp-load-level{
		background:".$options['seekbarLoadColor'].";
	}
	#".$wrapper_id." .mvp-solo-progress-level,
	#".$wrapper_id." .mvp-progress-level{
		background:".$options['seekbarProgressColor'].";
	}
	#".$wrapper_id." .mvp-player-controls-bottom-right .mvp-volume-wrapper{
		float:left;
		height: 100%;
	}
	#".$wrapper_id." .mvp-volume-seekbar{
		position: absolute;
	    top: -80px;
	    left: 0;
	    width: 40px;
	    height: 80px;
	    cursor: pointer;
	    touch-action: none;
	    display: none;
	}
	@media (hover: hover) {
	#".$wrapper_id." .mvp-volume-wrapper:hover .mvp-volume-seekbar{
		display: block;
	}
	}
	#".$wrapper_id." .mvp-volume-bg{
		position: absolute;
	    width: 6px;
	    height: 60px;
	    left: 17px;
	    bottom: 10px;
	}
	#".$wrapper_id." .mvp-volume-level{
		position: absolute;
	    width: 100%;
	    left: 0;
	    bottom: 0;
	    transition: width 0.2s ease-out, height 0.2s ease-out;
	}

	#".$wrapper_id." .mvp-volume-bg{
		background:".$options['volumeBgColor'].";
	}
	#".$wrapper_id." .mvp-volume-level{
		background:".$options['volumeLevelColor'].";
	}

	#".$wrapper_id." .mvp-settings-holder{
	    margin-bottom: 1px;
	}
	#".$wrapper_id." .mvp-menu-item{
	    font-size: 12px;
	}
		
	#".$wrapper_id." .mvp-settings-menu-item-value{
		color: ".$options['settingsMenuItemValueTextColor'].";
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




