<?php 

	function mvp_player_css($wrapper_id, $options, $plugins_url, $preset){

		$markup = '';

		if($options["selectorInit"]){
			$markup .= "#".$wrapper_id."{
				display: none;
			}";
		}
				
		$markup .= "#".$wrapper_id." .mvp-media-holder{
			background: ".$options['playerBgColor'].";
		}";

		//include controls (thats only thing that is different per skin)
		require(dirname(__FILE__)."/controls_".$preset.".php");

		$markup .= "#".$wrapper_id." .mvp-info-holder,
		#".$wrapper_id." .mvp-share-holder,
		#".$wrapper_id." .mvp-resume-holder,
		#".$wrapper_id." .mvp-redirect-login-holder{
		    background: ".$options['dialogBgColor'].";
		}
		#".$wrapper_id." .mvp-subtitle{
		    color: ".$options['subtitleTextColor']."!important;
		    background: ".$options['subtitleTextBgColor']."!important;
		}
		#".$wrapper_id." .mvp-player-title{
			color: ".$options['playerTitleTextColor'].";
		}
		#".$wrapper_id." .mvp-player-desc{
			color: ".$options['playerDescTextColor'].";
		}
		#".$wrapper_id." .mvp-big-play{
			background: ".$options['bigPlayBgColor'].";
		}
		#".$wrapper_id." .mvp-big-play svg{
			color:".$options['bigPlayIconColor'].";
		}
		@media (hover: hover) {
		#".$wrapper_id." .mvp-big-play:hover svg{
			color:".$options['iconRolloverColor']."!important;
		}
		}
		#".$wrapper_id." .mvp-player-loader{
			background-color: ".$options['preloaderColor'].";
		}
		#".$wrapper_id." .mvp-context-menu li{
			border-bottom: 1px solid ".$options['customContextMenuBorderTopColor'].";
			color:".$options['customContextMenuTextColor']."!important;
		}
		#".$wrapper_id." .mvp-context-link span {
			background-color: ".$options['customContextMenuLinkBgColor']."!important;
		}
		#".$wrapper_id." .mvp-context-link span a {
			color: ".$options['customContextMenuLinkTextColor']."!important;
		}
		#".$wrapper_id." .mvp-tooltip{
			background:".$options['tooltipBgColor'].";
			color:".$options['tooltipTextColor'].";
		}
		#".$wrapper_id." .mvp-rel-holder{
			background:".$options['relHolderBgColor'].";
		}
		#".$wrapper_id." .mvp-rel-prev svg,
		#".$wrapper_id." .mvp-rel-next svg,
		#".$wrapper_id." .mvp-rel-close svg{
		    color: ".$options['relHolderIconColor'].";
		}
		@media (hover: hover) {
		#".$wrapper_id." .mvp-rel-prev:hover svg,
		#".$wrapper_id." .mvp-rel-next:hover svg,
		#".$wrapper_id." .mvp-rel-close:hover svg{
		    color: ".$options['relHolderIconHoverColor'].";
		}
		}
		.".$wrapper_id." .mvp-lightbox{
		    background: ".$options['lightboxBgColor'].";
		}";

		if(!empty($options["lightboxMaxWidth"])){
			$markup .= ".".$wrapper_id." .mvp-lightbox-inner{
			    max-width: ".$options['lightboxMaxWidth'].";
			}";
		}

		if(!empty($options["lightboxBorderSize"])){
			$markup .= ".".$wrapper_id." .mvp-lightbox-content-inner{
			    background: ".$options['lightboxBorderColor'].";
			    padding: ".$options['lightboxBorderSize']."px
			}";
		}
	
		$markup .= ".".$wrapper_id." .mvp-lightbox-close svg,
		.".$wrapper_id." .mvp-lightbox-prev svg,
		.".$wrapper_id." .mvp-lightbox-next svg{
			color:".$options['lightboxIconColor'].";
		}

		/* up next */

		#".$wrapper_id." .mvp-upnext-info{
			color:".$options['upNextTextColor'].";
		}
		@media (hover: hover) {
		#".$wrapper_id." .mvp-upnext-info:hover{
			color:".$options['upNextHoverTextColor'].";
		}
		}

		/* chapter */				

		#".$wrapper_id." .mvp-chapter-indicator{
		    border-right: 2px solid ".$options['chapterIndicatorColor'].";
		}
		#".$wrapper_id." .mvp-chapter-indicator-highlight-visible{
			border-top-color: ".$options['chapterHighlightColor'].";
		}
		#".$wrapper_id." .mvp-chapter-title{
			color:".$options['chapterTitleTextColor'].";
		}

		/* ad seekbar */
		
		#".$wrapper_id." .mvp-ad-progress-bg{
			background:".$options['adSeekbarBgColor'].";
		}
		#".$wrapper_id." .mvp-ad-progress-level{
			background:".$options['adSeekbarProgressColor'].";
		}
		#".$wrapper_id." .mvp-ad-info{
		    color:".$options['adInfoTimeRemainingTextColor'].";
		    background:".$options['adInfoTimeRemainingBgColor'].";
		}
		#".$wrapper_id." .mvp-ad-skip-msg,
		#".$wrapper_id." .mvp-ad-skip-msg-end{
			color:".$options['adSkipMsgTextColor'].";
		}
		@media (hover: hover) {
		#".$wrapper_id." .mvp-ad-skip-msg:hover,
		#".$wrapper_id." .mvp-ad-skip-msg-end:hover{
			color:".$options['adSkipMsgHoverTextColor'].";
		}
		}	

		/* ad markers */
		#".$wrapper_id." .mvp-ad-indicator{
		    background:".$options['adIndicatorColor'].";
		}";

		if(!empty($options["minimizeMaxWidth"])){
			$markup .= "#".$wrapper_id." .mvp-minimize-bl,
			#".$wrapper_id." .mvp-minimize-br{
			    max-width: ".$options['minimizeMaxWidth'].";
			}";
		}

		/* unmute */
		$markup .= "#".$wrapper_id." .mvp-unmute-toggle{
		    color: ".$options['unmuteBtnTextColor'].";
		    background: ".$options['unmuteBtnBgColor'].";
		}

		";

		return $markup;

	}

?>









