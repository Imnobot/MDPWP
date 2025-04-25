<?php 

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
	#".$wrapper_id." .mvp-minimize-close{
		background: ".$options['themeBgColor'].";
	}
	#".$wrapper_id." .mvp-playlist-selector-holder,
	#".$wrapper_id." .mvp-transcript-holder,
	#".$wrapper_id." .mvp-chapters-holder{
	    background:#282828;
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
		height: 14px;
	}
	@media (hover: hover) {
	#".$wrapper_id." .mvp-contr-btn svg:hover{
		color:".$options['iconRolloverColor'].";
	}
	}

	#".$wrapper_id." .mvp-previous-toggle{
	    position: absolute; 
	    top: 50%; 
	    left: 12px; 
	    transform: translateY(-50%); 
	    height: 50px;
	}
	#".$wrapper_id." .mvp-next-toggle{
	    position: absolute; 
	    top: 50%; 
	    right: 12px; 
	    transform: translateY(-50%); 
	    height: 50px;
	}
	#".$wrapper_id." .mvp-previous-toggle svg,
	#".$wrapper_id." .mvp-next-toggle svg{
	    height: 18px;
	}

	#".$wrapper_id." .mvp-player-controls-top{
		position:absolute;
		top:15px;
		right:15px;
		height: 20px;
		z-index: 1;
	}

	#".$wrapper_id." .mvp-player-controls-bottom-wrap{
		position: absolute;
	    height: 40px;
	    bottom: 0;
	    left: 15px;
	    right: 15px;
	}
	#".$wrapper_id." .mvp-player-controls-bottom{
		display: flex;
		height: 100%;
	}
	#".$wrapper_id." .mvp-player-controls-bottom-left{
	}
	#".$wrapper_id." .mvp-player-controls-bottom-right{
		position: relative;
	    margin-left: auto;
	}

	#".$wrapper_id." .mvp-player-controls-gradient {
	    pointer-events: none;
	    left: 0;
	    right: 0;
	    bottom: 0;
	    position: absolute;
	    width: 100%;
	    height: 100%;
	    background: linear-gradient(180deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 30%, rgba(0,0,0,0) 70%, rgba(0,0,0,0.5) 100%);
	}

	#".$wrapper_id." .mvp-media-time-current,
	#".$wrapper_id." .mvp-media-time-total{
		position:relative;
		top: 50%;
		left:0px;
		text-align: center;
		float:left;
		margin:0!important;
		padding: 0!important;
		font-size:11px!important;
	    transform: translateY(-50%);
	}
	#".$wrapper_id." .mvp-media-time-current,
	#".$wrapper_id." .mvp-media-time-total{
		padding-left: 5px!important;
		padding-right: 5px!important;
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
		top:20px;
		height:1px;
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

	#".$wrapper_id." .mvp-volume-bg{
		background:".$options['volumeBgColor'].";
	}
	#".$wrapper_id." .mvp-volume-level{
		background:".$options['volumeLevelColor'].";
	}

	#".$wrapper_id." .mvp-volume-toggle{
		position: relative;
	}
	#".$wrapper_id." .mvp-volume-seekbar{
		position:absolute;
		top:-80px;
		left:0;
		width:30px;
		height:80px;
		display:none;
		cursor: pointer;
		touch-action: none;
	}
	@media (hover: hover) {
	#".$wrapper_id." .mvp-volume-wrapper:hover .mvp-volume-seekbar{
		display: block;
	}
	}
	#".$wrapper_id." .mvp-volume-bg{
		position:absolute;
		width:1px;
		height:60px;
		left:14px;
		bottom:10px;
	}
	#".$wrapper_id." .mvp-volume-level{
		position:absolute;
		width:100%;
		left:0;
		bottom:0;
	}
	#".$wrapper_id." .mvp-volume-level{
		transition: width 0.2s ease-out, height 0.2s ease-out;
	}

	#".$wrapper_id." .mvp-settings-holder{
	    margin-bottom: 0;
	}
	#".$wrapper_id." .mvp-menu-item{
	    font-size: 12px;
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