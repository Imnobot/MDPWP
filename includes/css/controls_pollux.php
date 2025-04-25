<?php 

	$markup .= "#".$wrapper_id." .mvp-player-controls-bottom,
	#".$wrapper_id." .mvp-settings-holder,
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
		background:".$options['themeBgColor'].";
	}
	#".$wrapper_id." .mvp-contr-btn{	
		width:25px;
		height:25px;
		float: left;
		position: relative;
		cursor: pointer;
	}
	#".$wrapper_id." .mvp-contr-btn svg{
		color:".$options['iconColor'].";
		height: 16px;
	}
	@media (hover: hover) {
	#".$wrapper_id." .mvp-contr-btn svg:hover{
		color:".$options['iconRolloverColor'].";
	}
	}
	#".$wrapper_id." .mvp-player-controls-bottom{
		position: absolute;
	    height: 50px;
	    bottom: 0;
	    left: 0;
	    width: 100%;
	}
	#".$wrapper_id." .mvp-player-controls-bottom-left{
		position: absolute;
		height: 25px;
		left: 20px;
		bottom: 13px;
	}
	#".$wrapper_id." .mvp-player-controls-bottom-middle{
		position: absolute;
		bottom: 13px;
		height: 25px;
	    left: 50%;
	    -webkit-transform: translateX(-50%);
	    -ms-transform: translateX(-50%);
	    transform: translateX(-50%);
	}
	#".$wrapper_id." .mvp-player-controls-bottom-right{
		position: absolute;
		height: 25px;
		right: 0;
		bottom: 13px;
	}
	#".$wrapper_id." .mvp-player-controls-bottom-right .mvp-contr-btn{
		margin-right: 15px;
	}

	#".$wrapper_id." .mvp-media-time-current,
	#".$wrapper_id." .mvp-media-time-separator,
	#".$wrapper_id." .mvp-media-time-total{
		position:relative;
		top:0px;
		left:0px;
		height:100%;
		line-height:25px !important;
		text-align: center;
		float:left;
		margin:0!important;
		padding: 0!important;
		font-size:12px!important;
		display: none;
		user-select:none;
	}
	#".$wrapper_id." .mvp-media-time-current{
		color: #ccc;
	}
	#".$wrapper_id." .mvp-media-time-separator,
	#".$wrapper_id." .mvp-media-time-total{
		color: #666;
	}

	#".$wrapper_id." .mvp-playback-toggle{
		height: 34px;
		width: 34px;
		bottom: 4px;
	}
	#".$wrapper_id." .mvp-playback-toggle svg{
		height: 17px;
	}
	#".$wrapper_id." .mvp-rewind-toggle svg,
	#".$wrapper_id." .mvp-skip-backward-toggle svg,
	#".$wrapper_id." .mvp-skip-forward-toggle svg,
	#".$wrapper_id." .mvp-previous-toggle svg,
	#".$wrapper_id." .mvp-next-toggle svg{
	    height: 13px;
	}
	#".$wrapper_id." .mvp-rewind-toggle,
	#".$wrapper_id." .mvp-skip-backward-toggle,
	#".$wrapper_id." .mvp-skip-forward-toggle,
	#".$wrapper_id." .mvp-previous-toggle,
	#".$wrapper_id." .mvp-playback-toggle,
	#".$wrapper_id." .mvp-next-toggle{
	    margin-right: 10px;
		border-radius: 100%;
	    background: #de5362;
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
		margin-bottom: 5px;
		border-radius: 3px;
		overflow: hidden;
	}
	#".$wrapper_id." .mvp-player-controls-top .mvp-contr-btn svg{
		height: 16px;
	}
	@media (hover: hover) {
	#".$wrapper_id." .mvp-player-controls-top .mvp-contr-btn:hover{
		background: #de5362;
	}
	}

	#".$wrapper_id." .mvp-media-time-current{
		color: ".$options['timeCurrentTextColor'].";
	}
	#".$wrapper_id." .mvp-media-time-separator,
	#".$wrapper_id." .mvp-media-time-total{
		color: ".$options['timeTotalTextColor'].";
	}

	#".$wrapper_id." .mvp-rewind-toggle,
	#".$wrapper_id." .mvp-skip-backward-toggle,
	#".$wrapper_id." .mvp-skip-forward-toggle,
	#".$wrapper_id." .mvp-previous-toggle,
	#".$wrapper_id." .mvp-playback-toggle,
	#".$wrapper_id." .mvp-next-toggle{
	    background: ".$options['playbackControlsBgColor'].";
	}
	
	@media (hover: hover) {
	#".$wrapper_id." .mvp-player-controls-top .mvp-contr-btn:hover{
		background: ".$options['topRightControlsBgHoverColor'].";
	}
	}

	#".$wrapper_id." .mvp-seekbar{
		position:absolute;
		width: 100%;
		top:-15px;
	    height: 15px;
	    overflow: hidden;
	    cursor: pointer;
	}
	#".$wrapper_id." .mvp-progress-bg{
		position:absolute;
		width:100%;
		bottom:0;
		height:7px;
		overflow: hidden;
	}
	#".$wrapper_id." .mvp-progress-bg{
		background: #6e7782;
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
	#".$wrapper_id." .mvp-progress-level{
		background: #de5362;
	}
	#".$wrapper_id." .mvp-progress-level-pointer{
	    position: relative;
		top:0;
	    width: 4px;
	    height: 100%;
		background:#fff;
	    float: right;
	 	margin-right: -2px;
	}

	#".$wrapper_id." .mvp-solo-progress-bg,
	#".$wrapper_id." .mvp-progress-bg{
		background: ".$options['seekbarBgColor'].";
	}
	
	#".$wrapper_id." .mvp-solo-progress-level,
	#".$wrapper_id." .mvp-progress-level{
		background:".$options['seekbarProgressColor'].";
	}
	#".$wrapper_id." .mvp-progress-level-pointer{
		background:".$options['seekbarProgressPointerColor'].";
	}

	#".$wrapper_id." .mvp-volume-wrapper{
		position: relative;
		float: left;
	}
	#".$wrapper_id." .mvp-volume-seekbar{
		position: relative;
	    top: 0;
	    margin-left: 25px;
	    width: 100px;
	    margin-right: 10px;
	    height: 25px;
	    cursor: pointer;
	    touch-action: none;
	}
	#".$wrapper_id." .mvp-volume-bg{
		position: absolute;
	    width: 80px;
	    height: 6px;
	    background: #6e7782;
	    left: 10px;
	    top: 10px;
	}
	#".$wrapper_id." .mvp-volume-level{
		position: absolute;
	    height: 100%;
	    background: #de5362;
	    left: 0;
	    top: 0;
	    transition: width 0.2s ease-out, height 0.2s ease-out;
	}
	#".$wrapper_id." .mvp-volume-level-pointer{
	    position: relative;
		top:0;
	    width: 2px;
	    height: 100%;
		background:#fff;
	    float: right;
	 	margin-right: -1px;
	}

	#".$wrapper_id." .mvp-volume-bg{
	    background: ".$options['volumeBgColor'].";
	}
	#".$wrapper_id." .mvp-volume-level{
	    background:".$options['volumeLevelColor'].";
	}
	#".$wrapper_id." .mvp-volume-level-pointer{
		background:".$options['volumeLevelPointerColor'].";
	}

	#".$wrapper_id." .mvp-settings-holder{
	    margin-bottom: 30px;
	}
	#".$wrapper_id." .mvp-menu-item{
	    font-size: 14px;
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