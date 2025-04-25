
<?php 

	function mvp_playlist_css($wrapper_id, $options){

		$markup = "#".$wrapper_id.".mvp-vlb .mvp-playlist-holder,
		#".$wrapper_id.".mvp-vrb .mvp-playlist-holder,
		#".$wrapper_id.".mvp-vb .mvp-playlist-holder,
		#".$wrapper_id.".mvp-ht .mvp-playlist-holder,
		#".$wrapper_id.".mvp-hb .mvp-playlist-holder,
		#".$wrapper_id.".mvp-transcript-holder,
		#".$wrapper_id.".mvp-chapters-holder{
			background: ".$options['playlistBgColor'].";
		}

		#".$wrapper_id.".mvp-ps-gdbt .mvp-playlist-item{
			background:".$options['playlistItemGdbtBgColor'].";
		}
		#".$wrapper_id.".mvp-ps-drot .mvp-playlist-item-selected,
		#".$wrapper_id.".mvp-ps-gdbt .mvp-playlist-item-selected{
			background:".$options['playlistItemGdbtDrotSelectedBgColor'].";
		}

		#".$wrapper_id.".mvp-ps-dot .mvp-playlist-info,
		#".$wrapper_id.".mvp-ps-gdot .mvp-playlist-info{
		    background:".$options['playlistDescriptionBgColor'].";
		}

		#".$wrapper_id." .mvp-playlist-title {
			color:".$options['playlistTitleTextColor'].";
		}
		#".$wrapper_id." .mvp-playlist-published-date{
			color:".$options['playlistDateTextColor'].";
		}
		#".$wrapper_id." .mvp-playlist-description{
			color:".$options['playlistDescTextColor'].";
		}

		/* load more button */

		#".$wrapper_id." .mvp-load-more-btn{
			background:".$options['loadMoreBtnBgColor'].";
			color:".$options['loadMoreBtnTextColor'].";
		}
		@media (hover: hover) {
		#".$wrapper_id." .mvp-load-more-btn:hover{
			background:".$options['loadMoreBtnHoverBgColor'].";
			color:".$options['loadMoreBtnHoverTextColor'].";
		}
		}
		.mvp-visible {
			opacity: 1!important;
			transition: opacity 500ms ease-out;
		}
		.mvp-holder-visible{
		    opacity: 1!important;
		}";

		return $markup;

	}

?>