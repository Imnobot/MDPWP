<?php

    function mvp_get_settings(){

        return array(

            "youtube_id" => "",
            "facebook_id" => "",
            "gdrive_app_id" => "",
            "vimeo_key" => "",
            "vimeo_secret" => "",
            "vimeo_token" => "",
            "s3k" => "",
            "s3s" => "",
            "s3_du" => "",
            "s3_kpid" => "",
            "useCloudfront" => false,
            "cf_expire" => 300,
            "cors" => "https://cors-anywhere.herokuapp.com/",
            
            "delete_plugin_data_on_uninstall" => false,
            "js_to_footer" => false,
            "togglePlaybackOnMultipleInstances" => true,
            "overide_wp_video" => false,
            "overide_wp_video_skin" => "aviva",
            "preventCaching" => true,  

            "createThumbFromVideo" => false,
            "createThumbFromVideoWidth" => 200,
            "createThumbFromVideoHeight" => 112,
            "createThumbFromVideoTime" => 0,

            "vimeo_no_cookie" => false,

            "add_font_awesome_css" => false,   
            "fontAwesomeCssUrl" => "https://use.fontawesome.com/releases/v5.7.2/css/all.css",  

            "includePlayerCss" => true,

            //users
            "playlistCapability" => 'manage_options',
            "userLimit" => array(
                "default" => array(
                    "playlistLimit" => 1,
                    "videoLimit" => 2,
                ), 
                "editor" => array(
                    "playlistLimit" => 5,
                    "videoLimit" => 20,
                ), 
                "author" => array(
                    "playlistLimit" => 2,
                    "videoLimit" => 10,
                ), 
            ), 
             "userPlaylistLimitText" => "You have reached maximum number of playlists you can create. <a href='#'>Upgrade to Pro membership to allow for more playlists.</a>", 
            "userVideoLimitText" => "You have reached maximum number of videos you can create. <a href='#'>Upgrade to Pro membership to allow for more videos.</a>", 

            "trackPlaylistEdit" => false,

                
        );

    }

    function mvp_playlist_options(){

        return array(

            //general
            "thumb" => "",

            //add more
            "addMoreOnTotalScroll" => false,
            "addMoreOnTotalScrollLimit" => 50,
            "sortOrder" => 'order_id',
            "sortDirection" => 'ASC',
            
            "encryptMediaPaths" => false,
            "useBlob" => false,

            //pagination
            "usePagination" => false,
            "paginationPerPage" => 12,

            //global
            "getEmbedDetails" => false,
            "pwd" => "",
            "start" => "",
            "end" => "",
            "playbackRate" => "",
            "lockTime" => "",
            "lockTime2" => "",
            "vast" => "",
            "pl_preview_seek" => "",
            "lockVideoUserRoles" => array()

        );

    }

    function mvp_player_options(){

        return array(

            "presets" => array(
                'aviva' => 'aviva', 
                'pollux' => 'pollux', 
                'sirius' => 'sirius', 
            ),


            "playerClass" => "",
            "customClass" => "",
            "usePlayer" => true,

            "hlsConfig" => "",
            "dashConfig" => "",

            "iframePlayerType" => array(
                'chromeless' => esc_html__('chromeless', MVP_TEXTDOMAIN),
                'default' => esc_html__('default', MVP_TEXTDOMAIN),
            ),
            "playerTypeArr" => array(    
                'normal' => esc_html__('normal', MVP_TEXTDOMAIN),
                'lightbox' => esc_html__('lightbox', MVP_TEXTDOMAIN),
            ),
            "playerType" => "normal",

            "selectorInit" => "",
            "addPlayerCss" => true,

            "useVideoTransform" => false,
            "saveTransformState" => false,
            "maxZoom" => 5,


            //favorites
            "useAddToFavoritesToContextMenu" => false,
            "useAddToFavoritesToPlaylistItemMenu" => false,
            "showFavIndicator" => true,

            "destroyPlaylistOnLightboxClose" => false,

            "autoAdvanceToNextMediaOnError" => false,
            "rememberVideoQuality" => false,

            "makePlaylistSelector" => false,
            "autoOpenPlaylistSelector" => false,
            "autoAdvanceToNextPlaylist" => false,
            "includePlaylistsIntoSelector" => "all",
            "playlistSelectorSelected" => "",

            "playlistPositionArr" => array(    
                "vrb" => esc_html__("Vertical right and bottom", MVP_TEXTDOMAIN),
                "hb" => esc_html__("Horizontal bottom", MVP_TEXTDOMAIN),
                "vb" => esc_html__("Vertical bottom", MVP_TEXTDOMAIN),
                "outer" => esc_html__("Outer (below player, endless scroll)", MVP_TEXTDOMAIN),
                "wall" => esc_html__("Thumbnail grid with lightbox", MVP_TEXTDOMAIN),
                "no-playlist" => esc_html__("No visible playlist (use just player)", MVP_TEXTDOMAIN),
            ),
            "playlistPosition" => "vrb",

            "playlistScrollTypeArr" => array(
                'perfect-scrollbar' => esc_html__('perfect-scrollbar', MVP_TEXTDOMAIN),
                'browser' => esc_html__('Default browser scroll', MVP_TEXTDOMAIN),
            ),
            "playlistScrollType" => "browser",

            "playlistStyleArr" => array(    
                'drot' => esc_html__('Description right of thumbnail', MVP_TEXTDOMAIN),
                'dot' => esc_html__('Description over thumbnail', MVP_TEXTDOMAIN),
            ),
            "playlistStyle" => "drot",
            "playlistGridStyleArr" => array(    
                'gdot' => esc_html__('Description over thumbnail', MVP_TEXTDOMAIN),
                'gdbt' => esc_html__('Description below thumbnail', MVP_TEXTDOMAIN),
                'gdrot' => esc_html__('Description right of thumbnail', MVP_TEXTDOMAIN),
            ),
            "playlistGridStyle" => "gdot",
            "gridTypeArr" => array(  
                'javascript' => esc_html__('Javascript grid', MVP_TEXTDOMAIN),
                'grid1' => esc_html__('CSS display grid', MVP_TEXTDOMAIN),
                'grid2' => esc_html__('CSS column count', MVP_TEXTDOMAIN),
            ),
            "gridType" => 'javascript',
            "upNextTime" => "",
            "showVideoTitle" => false,

            "infoSkinArr" => array(    
                'info-dot' => esc_html__('Description over thumbnail', MVP_TEXTDOMAIN),
                'info-dbt' => esc_html__('Description below thumbnail', MVP_TEXTDOMAIN),
                'info-drot' => esc_html__('Description right of thumbnail', MVP_TEXTDOMAIN),
            ),
            "infoSkin" => 'Description over thumbnail',

            "displayAllPlaylistsInPage" => false,

            "playlistItemContentArr" => array(   
                'thumb' => esc_html__('thumb', MVP_TEXTDOMAIN), 
                'title' => esc_html__('title', MVP_TEXTDOMAIN),
                'playCount' => esc_html__('Play count (comes from statistics)', MVP_TEXTDOMAIN),
                'date' => esc_html__('release date', MVP_TEXTDOMAIN),
                'description' => esc_html__('description', MVP_TEXTDOMAIN),
                'duration' => esc_html__('duration (seconds)', MVP_TEXTDOMAIN),
            ),
            "playCountText" => "views",
            "playlistItemContent" => array("thumb","title","description"),



            "formatDateFromNow" => false,
            "locale" => "en",//Format Date language locale in playlist items
            "showSearchField" => false,
            "playlistBottomHeight" => 300,
            "minimizeMaxWidth" => "70%",
            "wrapperMaxWidth" => "",
            "verticalBottomSepearator" => 750,
            "mobileSeekbarMinWidth" => 800,
            "mobileControlsTopMinWidth" => 500,
            "playlistSideWidth" => 320,

            "playerTransition" => "alpha",
            "playerTransitionArr" => array(   
                'slide' => esc_html__('slide', MVP_TEXTDOMAIN),
                'alpha' => esc_html__('alpha', MVP_TEXTDOMAIN),
            ),

            "playerShadowArr" => array(   
                '' => 'No shadow', 
                'shadow-effect1' => esc_html__('Shadow effect 1', MVP_TEXTDOMAIN),
                'shadow-effect2' => esc_html__('Shadow effect 2', MVP_TEXTDOMAIN),
                'shadow-effect3' => esc_html__('Shadow effect 3', MVP_TEXTDOMAIN),
                'shadow-effect4' => esc_html__('Shadow effect 4', MVP_TEXTDOMAIN),
                'shadow-effect5' => esc_html__('Shadow effect 5', MVP_TEXTDOMAIN),
                'shadow-effect6' => esc_html__('Shadow effect 6', MVP_TEXTDOMAIN),
            ),
            "playerShadow" => "",

            "logoPath" => "",
            "logoUrl" => "",
            "targetArr" => array(
                '_blank' => '_blank',
                '_self' => '_self',
                '_parent' => '_parent'
            ),
            "logoTarget" => "_blank",
            "logoRel" => "",

            "pauseVideoOnDialogOpen" => false,

            "forceYtChromeless" => false,

            //slideshow
            "slideshowDuration" => 10,
            "slideshowRandom" => false,
            "slideshowPauseWithAudio" => true,

            "offlineImage" => "",
            "offlineImageUrl" => "",
            "offlineImageUrlTarget" => "_blank",

            "hideShortsFromShowing" => "",

            //preloader
            "usePlayerLoader" => true,
            "autoResumeAfterAdd" => true,
            "playerLoaderImgSrc" => "",
            "playerLoaderImgW" => "",
            "playerLoaderImgH" => "",
            
            "playerRatio" => "1.7777777",
            "combinePlayerRatio" => true,

            "documentFullsceen" => false,

            "useImaLoader" => true,
            "hideImaAdTimer" => false,
            "forceAdMutedOnIos" => true,

            "useMobileListMenu" => false,
            "useMobileChapterMenu" => false,

            "useMobileCompactPlaylist" => false,

            "showControlsBeforeStart" => false,
            "rememberPlaybackPosition" => false,
            "playbackPositionKey" => "mvp-playback-position-",

            "showPrevNextVideoThumb" => true,
            "disableVideoSkip" => false,
            "disableSeekbar" => false,
            "disableSeekingPastWatchedPoint" => false,

            "minimizeOnScroll" => false,
            "minimizeOnScrollOnlyIfPlaying" => false,
            "minimizeClassArr" => array(    
                'mvp-minimize-bl' => esc_html__('Bottom left', MVP_TEXTDOMAIN),
                'mvp-minimize-br' => esc_html__('Bottom right', MVP_TEXTDOMAIN),
                'mvp-minimize-tl' => esc_html__('Top left', MVP_TEXTDOMAIN),
                'mvp-minimize-tr' => esc_html__('Top right', MVP_TEXTDOMAIN),
            ),
            "minimizeClass" => "mvp-minimize-bl",
            "useMinimizeCloseBtn" => false,

            "instanceName" => "",
            "sourcePath" => "",
            "activePlaylist" => "",
            "activeItem" => 0,
            "volume" => 0.5,
            "autoPlay" => true,
            "autoPlayAfterFirst" => false,
            "autoPlayInViewport" => false,
            "activateWhenParentVisible" => false,
            "preloadArr" => array(
                'auto' => esc_html__('auto', MVP_TEXTDOMAIN),
                'metadata' => esc_html__('metadata', MVP_TEXTDOMAIN),
                'none' => esc_html__('none', MVP_TEXTDOMAIN),
            ),
            "preload" => "auto",
            "crossorigin" => "",
            "disableRemotePlayback" => true,
            "randomPlay" => false,
            "loopingOn" => true,
            "mediaEndActionArr" => array(
                'next' => esc_html__('go to next media', MVP_TEXTDOMAIN),
                'comingnext' => esc_html__('show coming next screen', MVP_TEXTDOMAIN),
                'loop' => esc_html__('loop current media', MVP_TEXTDOMAIN),
                'rewind' => esc_html__('rewind to beginning and stop', MVP_TEXTDOMAIN),
                'poster' => esc_html__('show poster', MVP_TEXTDOMAIN),
                'rel' => esc_html__('show related videos screen', MVP_TEXTDOMAIN),
                'image' => esc_html__('show custom image', MVP_TEXTDOMAIN),
                'custom' => esc_html__('show custom content', MVP_TEXTDOMAIN),
            ),
            "mediaEndAction" => "next",

            "media_end_action_html" => "",
            "media_end_action_css" => "",

            "mediaEndImage" => "",
            "mediaEndImageUrl" => "",
            "mediaEndImageUrlTarget" => "_blank", 

            "aspectRatioArr" => array(
                '1' => esc_html__('fit inside', MVP_TEXTDOMAIN),
                '2' => esc_html__('fit outside (fill whole screen)', MVP_TEXTDOMAIN),
                '0' => esc_html__('original (no size change)', MVP_TEXTDOMAIN),
            ),
            "aspectRatio" => 1,
            "blockYoutubeEvents" => true,
            "youtubePlayerType" => "chromeless",
            "vimeoPlayerType" => "default",

            "useKeyboardNavigationForPlayback" => false,
            "useGlobalKeyboardControls" => false,
            "modifierKey" => "",
            "createKeyboardInfo" => false,

            "keyboardControls" => array(
                array("keycode" => 27, "action" => "closeDialog"),
                array("keycode" => 37, "action" => "seekBackward"),
                array("keycode" => 39, "action" => "seekForward"),
                array("keycode" => 32, "action" => "togglePlayback"),
                array("keycode" => 38, "action" => "volumeUp"),
                array("keycode" => 40, "action" => "volumeDown"),
                array("keycode" => 77, "action" => "toggleMute"),
                array("keycode" => 34, "action" => "nextMedia"),
                array("keycode" => 33, "action" => "previousMedia"),
                array("keycode" => 82, "action" => "rewind"),
                array("keycode" => 70, "action" => "toggleFullscreen"),
                array("keycode" => 84, "action" => "toggleTheater"),
                array("keycode" => 67, "action" => "toggleSubtitle"),
                array("keycode" => 107, "action" => "subtitleSizeUp"),
                array("keycode" => 109, "action" => "subtitleSizeDown")
            ),

            "keyboardActions" => array(
                "closeDialog" => esc_html__('Close dialog (info, share..)', MVP_TEXTDOMAIN),
                "seekBackward" => esc_html__('Seek backward', MVP_TEXTDOMAIN),
                "seekForward" => esc_html__('Seek forward', MVP_TEXTDOMAIN),
                "togglePlayback" => esc_html__('Toggle playback', MVP_TEXTDOMAIN),
                "volumeUp" => esc_html__('Volume up', MVP_TEXTDOMAIN),
                "volumeDown" => esc_html__('Volume down', MVP_TEXTDOMAIN),
                "toggleMute" => esc_html__('Toggle mute', MVP_TEXTDOMAIN),
                "nextMedia" => esc_html__('Next media', MVP_TEXTDOMAIN),
                "previousMedia" => esc_html__('Previous media', MVP_TEXTDOMAIN),
                "rewind" => esc_html__('Rewind', MVP_TEXTDOMAIN),
                "toggleFullscreen" => esc_html__('Toggle fullscreen', MVP_TEXTDOMAIN),
                "toggleTheater" => esc_html__('Toggle theater mode', MVP_TEXTDOMAIN),
                "toggleSubtitle" => esc_html__('Toggle subtitle', MVP_TEXTDOMAIN),
                "subtitleSizeUp" => esc_html__('Subtitle size up', MVP_TEXTDOMAIN),
                "subtitleSizeDown" => esc_html__('Subtitle size down', MVP_TEXTDOMAIN)
            ),

            "hideQualityMenuOnSingleQuality" => true,

            "vrInfo" => "",
            "enablePerspectiveWhenVrNotAvailable" => true,
            "autoRotatePanorama" => true,
            "autoRotateSpeed" => "0.5",

            "youtubePlayerColorArr" => array(
                'red' => esc_html__('red', MVP_TEXTDOMAIN),
                'white' => esc_html__('white', MVP_TEXTDOMAIN)
            ),
            "youtubePlayerColor" => "red",
            "vimeoPlayerColor" => "00adef",

            "useMobileNativePlayer" => false,

            "streamCamera" => false,
            "autoStartStream" => false,

            "useSwipeNavigation" => false,
            "swipeAction" => "advance",
            "swipeTolerance" => 100,
            "swipeActionArr" => array(    
                'advance' => esc_html__('Advance to next / previous video', MVP_TEXTDOMAIN),
                'rewind' => esc_html__('Skip forward / backward X seconds', MVP_TEXTDOMAIN)
            ),

            "displayPosterOnMobile" => false,

            "ageVerifyExpireTime" => 9999999,

            "cueMakeMarkers" => true,
            "executeCueOnlyOnce" => false,

            "rightClickContextMenuArr" => array(    
                'browser' => esc_html__('browser', MVP_TEXTDOMAIN),
                'custom' => esc_html__('custom', MVP_TEXTDOMAIN),
                'disabled' => esc_html__('disabled', MVP_TEXTDOMAIN)
            ),
            "rightClickContextMenu" => "disabled",

            "encryptMediaPaths" => false,
            "seekTime" => 10,
            "seekToChapterStart" => true,

            "useChapterWindow" => false,
            "autoOpenChapterMenu" => true,
            "hideChapterMenuOnChapterSelect" => false,
            "showChapterTitle" => true,

            "useSingleVideoEmbed" => false,
            "useBlob" => false,
            "hideEmbedFunctionWhenEmbeded" => true,
            
            "playlistOpened" => true,
            "hidePlaylistOnFullscreenEnter" => true,
            "openFsOnPlay" => false,

            "limitDescriptionText" => 2,
            "convertUrlToLinksInDesc" => false,

            "clickOnBackgroundClosesLightbox" => true,
            "lightboxBorderSize" => 10,
            "useLightboxAdvanceButtons" => true,

            "useLoadMoreBtn" => true,

            "showAnnotationsOnlyOnce" => false,
            "hideAnnotationOnMobile" => false,

            "resumeMediaAfterPopupClose" => true,
            "showPopupsOnlyOnce" => false,
            "randomizePausePopups" => false,
            "hidePopupsOnMobile" => false,
            "useGlobalPopupCloseBtn" => false,

            "showStreamVideoBitrateMenu" => true,
            "showStreamAudioBitrateMenu" => true,
            
            "requirePosterFromFolder" => false,
            "requireThumbnailsFromFolder" => true,
            "requireSubtitlesFromFolder" => false,

            "youtubeThumbSizeArr" => array(    
                'default' => 'default 120x90',
                'medium' => 'medium 320x180',
                'high' => 'high 480x360',
                'standard' => 'standard 640x480',
                'maxres' => 'maxres 1280x720'
            ),
            "youtubeThumbSize" => "medium",
            "vimeoThumbSizeArr" => array(    
                '100x75' => '100x75',
                '200x150' => '200x150',
                '295x166' => '295x166',
                '640x360' => '640x360',
                '960x540' => '960x540',
                '1280x720' => '1280x720',
                '1920x1080' => '1920x1080'
            ),
            "vimeoThumbSize" => "295x166",

            "useAudioEqualizer" => false,

            "theaterElement" => "",
            "theaterElementClass" => "",
            "focusVideoInTheater" => false,

            "hidePlaylistOnMinimize" => false,
            
            "useStatistics" => false,
            "percentToCountAsPlay" => "25",

            "displayWatchedPercentage" => false,
            "showPosterOnPause" => false,

            "playAdsOnlyOnce" => false,
            "createAdMarkers" => true,
            "showAdUpcomingMsg" => true,
            "adUpcomingMsgTime" => 5,
            "useAdSeekbar" => true,
            "useAdControls" => true,


            "useSortButtons" => false,       
            "sortButtonsAlign" => 'left', 
            "defaultSort"  => 'newest',
            "defaultSortArr" => array(
                "newest" => esc_html__('Newest', MVP_TEXTDOMAIN),
                "oldest" => esc_html__('Oldest', MVP_TEXTDOMAIN),
                "popular" => esc_html__('Popular', MVP_TEXTDOMAIN),
            ),
  
            //ga
            "useGa" => false,
            "gaTrackingId" => "",

            "breakPointArr" => array(//outer, wall layout
                  array(
                      'width' => 0,
                      'column' => 1,
                      'gutter' => 0
                  ),
                  array(
                      'width' => 500,
                      'column' => 2,
                      'gutter' => 0
                  ),
                  array(
                      'width' => 700,
                      'column' => 3,
                      'gutter' => 0
                  ),
                  array(
                      'width' => 1100,
                      'column' => 4,
                      'gutter' => 0
                  ),
                  array(
                      'width' => 1600,
                      'column' => 5,
                      'gutter' => 0
                  ),
            ),

            "rememeberCaptionState" => true,
            "keepCaptionFontSizeAfterManualResize" => false,
            "caption_breakPointArr" => array(
                  array(
                      'width' => 0,
                      'font_size' => 18
                  ),
                  array(
                      'width' => 480,
                      'font_size' => 20
                  ),
                  array(
                      'width' => 768,
                      'font_size' => 22
                  ),
                  array(
                      'width' => 1024,
                      'font_size' => 24
                  ),
                  array(
                      'width' => 1280,
                      'font_size' => 36
                  ),
            ),

            "preservePlaybackRate" => false,

            "playbackRateArr" => array(
                  array(
                      'value' => 2,
                      'menu_title' => '2x'
                  ),
                  array(
                      'value' => 1.5,
                      'menu_title' => '1.5x'
                  ),
                  array(
                      'value' => 1.25,
                      'menu_title' => '1.25x'
                  ),
                  array(
                      'value' => 1,
                      'menu_title' => '1x (Normal)'
                  ),
                  array(
                      'value' => 0.5,
                      'menu_title' => '0.5x'
                  ),
            ),

            //s3
            "s3UrlExpireTime" => "+15 seconds",
            "s3Region" => "us-east-1",
            "s3ThumbExtension" => "jpg",
            "getPosterFromBucket" => false,
            "getThumbFromBucket" => false,
            "getSubsFromBucket" => false,

            //cast subs
            "tts_fontScale" => 1.0,
            "tts_foregroundColor" => "rgba(255,255,255,1)",
            "tts_backgroundColor" => "rgba(0,0,0,0)",
            "tts_edgeColor" => "rgba(0,0,0,0.4)",
            "tts_edgeType" => "DROP_SHADOW",
            "tts_fontStyle" => "NORMAL",
            "tts_fontFamily" => "Serif",
            "tts_fontGenericFamily" => "CURSIVE",

            "edgeTypeArr" => array(
                "NONE" => "NONE",
                "OUTLINE" => "OUTLINE", 
                "DROP_SHADOW" => "DROP_SHADOW",
                "RAISED" => "RAISED",
                "DEPRESSED" => "DEPRESSED"
            ),

            "fontStyleArr" => array(
                "NORMAL" => "NORMAL",
                "BOLD" => "BOLD", 
                "BOLD_ITALIC" => "BOLD_ITALIC",
                "ITALIC" => "ITALIC"
            ),

            "fontGenericFamilyArr" => array(
                "SANS_SERIF" => "SANS_SERIF",
                "MONOSPACED_SANS_SERIF" => "MONOSPACED_SANS_SERIF", 
                "SERIF" => "SERIF",
                "MONOSPACED_SERIF" => "MONOSPACED_SERIF",
                "CASUAL" => "CASUAL", 
                "CURSIVE" => "CURSIVE",
                "SMALL_CAPITALS" => "SMALL_CAPITALS"
            ),

            //buttons
            "useBigPlay" => true,
            "bigPlayImgSrc" => "",
            "bigPlayImgW" => "",
            "bigPlayImgH" => "",
            "useSeekbar" => true,
            "useSoloSeekbar" => true,
            "useInfo" => true,
            "useFullscreen" => true,
            "useTime" => true,
            "usePip" => false,//picture in picture
            "useCc" => true,//caption toggle
            "useAirPlay" => true,
            "usePlaybackRate" => true,
            "useQuality" => true,
            "useSubtitle" => true,
            "useTranscript" => false,
            "useChapterToggle" => true,
            "useCasting" => false,
            "useVolume" => true,
            "usePlay" => true,
            "useNext" => false,
            "usePrevious" => false,
            "useRewind" => false,
            "useSkipBackward" => false,
            "useSkipForward" => false,
            "useDownload" => true,
            "usePlaylistToggle" => true,
            "useTheaterMode" => false,

            "useNativeShare" => false,
            "nativeShareMedia" => false,
            "useShare" => true,
            "useShareFacebook" => true,
            "useShareTwitter" => true,
            "useShareTumblr" => true,
            "useShareWhatsApp" => true,
            "useShareReddit" => true,
            "useShareDigg" => true,
            "useShareLinkedIn" => true,
            "useSharePinterest" => true,
            "useShareEmail" =>  true,
            "useShareSms" =>  true,

            "useEmbed" => true,

            //restrict download
            "downloadVideoUserRoles" => array(),
            "restrictDownloadForLoggedInUser" => true,
            "restrictDownloadUrl" => "#",
            "restrictDownloadUrlTarget" => "_self",
            "restrictWatchUrl" => "#",
            "restrictWatchUrlTarget" => "_self",

            //inline ads
            "showInlineAdsNonLoggedInUser" => false,
            "showInlineAdsUserRoles" => array(),
            "inlineAdsCountdown" => 5,
            "inlineAdsOccurence" => 5000,

            //restrict ads
            "viewVideoWithoutAdsForLoggedInUser" => false,
            "viewVideoWithoutAdsUserRoles" => array(),

            //coming next
            "comingnextTime" => 10,


            //translation

            "playerLanguage" => "en",
            "autoLoadTranscript" => false,
            "syncTranscriptWithSubs" => false,


      
            //context

            "customContextMenuLink" => "",
            "customContextMenuLinkTarget" => "_blank",
            "customContextMenuLinkTitle" => "",

            //shared css

            //dialog
            "dialogBgColor" => "rgba(0,0,0,0.7)",

            //lightbox
            "lightboxBorderColor" => "rgb(255,255,255)",
            "lightboxBgColor" => "rgba(0,0,0,0.8)",
            "lightboxIconColor" => "rgb(170,170,170)",

            //ad seekbar
            "adSeekbarBgColor" => "rgb(204,204,204)",
            "adSeekbarProgressColor" => "rgb(255,255,0)",
            "adInfoTimeRemainingTextColor" => "rgb(255,255,255)",
            "adInfoTimeRemainingBgColor" => "rgba(0,0,0,0.3)",

            //ad indicator in seekbar
            "adIndicatorColor" => "rgb(255,255,0)",  

            //unmute
            "useUnmuteBtn" => true,
            "unmuteBtnTextColor" => "rgb(34,34,34)",  
            "unmuteBtnBgColor" => "rgb(255,255,255)", 

            //rel
            "relHolderBgColor" => "rgb(34,34,34)", 
            "relHolderIconColor" => "rgb(233,233,233)",  
            "relHolderIconHoverColor" => "rgb(255,255,255)",  

            //load more
            "loadMoreBtnBgColor" => "rgb(158,158,158)",
            "loadMoreBtnTextColor" => "rgb(238,238,238)",
            "loadMoreBtnHoverBgColor" => "rgb(63,81,181)",
            "loadMoreBtnHoverTextColor" => "rgb(225,225,225)",

            "scrollTrackColor" => "rgb(238,238,238)", 
            "scrollDragColor" => "rgb(153,153,153)",  


            //icons player

            "closeIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 320 512'><path d='M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z'></path></svg>",

            "dotsIcon" => "<svg viewBox='0 0 128 512'><path d='M56 472a56 56 0 1 1 0-112 56 56 0 1 1 0 112zm0-160a56 56 0 1 1 0-112 56 56 0 1 1 0 112zM0 96a56 56 0 1 1 112 0A56 56 0 1 1 0 96z'/></svg>",

            "zoomCenterIcon" => "<svg viewBox='0 0 512 512'><path d='M256 0c17.7 0 32 14.3 32 32V42.4c93.7 13.9 167.7 88 181.6 181.6H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H469.6c-13.9 93.7-88 167.7-181.6 181.6V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V469.6C130.3 455.7 56.3 381.7 42.4 288H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H42.4C56.3 130.3 130.3 56.3 224 42.4V32c0-17.7 14.3-32 32-32zM107.4 288c12.5 58.3 58.4 104.1 116.6 116.6V384c0-17.7 14.3-32 32-32s32 14.3 32 32v20.6c58.3-12.5 104.1-58.4 116.6-116.6H384c-17.7 0-32-14.3-32-32s14.3-32 32-32h20.6C392.1 165.7 346.3 119.9 288 107.4V128c0 17.7-14.3 32-32 32s-32-14.3-32-32V107.4C165.7 119.9 119.9 165.7 107.4 224H128c17.7 0 32 14.3 32 32s-14.3 32-32 32H107.4zM256 224a32 32 0 1 1 0 64 32 32 0 1 1 0-64z'/></svg>",

            "zoomResetIcon" => "<svg viewBox='0 0 320 512'><path d='M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z'/></svg>",

            "unmuteIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 640 512'><path d='M633.82 458.1l-69-53.33C592.42 360.8 608 309.68 608 256c0-95.33-47.73-183.58-127.65-236.03-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 42.78-11.96 83.59-33.22 119.06l-38.12-29.46C503.49 318.68 512 288.06 512 256c0-63.09-32.06-122.09-85.77-156.16-11.19-7.09-26.03-3.8-33.12 7.41-7.09 11.2-3.78 26.03 7.41 33.13C440.27 165.59 464 209.44 464 256c0 21.21-5.03 41.57-14.2 59.88l-39.56-30.58c3.38-9.35 5.76-19.07 5.76-29.3 0-31.88-17.53-61.33-45.77-76.88-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61 11.76 6.46 19.12 18.18 20.4 31.06L288 190.82V88.02c0-21.46-25.96-31.98-40.97-16.97l-49.71 49.7L45.47 3.37C38.49-2.05 28.43-.8 23.01 6.18L3.37 31.45C-2.05 38.42-.8 48.47 6.18 53.9l588.36 454.73c6.98 5.43 17.03 4.17 22.46-2.81l19.64-25.27c5.41-6.97 4.16-17.02-2.82-22.45zM32 184v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V352.6L43.76 163.84C36.86 168.05 32 175.32 32 184z'></path></svg>",

            "shareTumblrIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 320 512'><path d='M309.8 480.3c-13.6 14.5-50 31.7-97.4 31.7-120.8 0-147-88.8-147-140.6v-144H17.9c-5.5 0-10-4.5-10-10v-68c0-7.2 4.5-13.6 11.3-16 62-21.8 81.5-76 84.3-117.1.8-11 6.5-16.3 16.1-16.3h70.9c5.5 0 10 4.5 10 10v115.2h83c5.5 0 10 4.4 10 9.9v81.7c0 5.5-4.5 10-10 10h-83.4V360c0 34.2 23.7 53.6 68 35.8 4.8-1.9 9-3.2 12.7-2.2 3.5.9 5.8 3.4 7.4 7.9l22 64.3c1.8 5 3.3 10.6-.4 14.5z'></path></svg>",

            "shareTwitterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z'></path></svg>",

            "shareFacebookIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 320 512'><path d='M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z'></path></svg>",

            "shareWhatsAppIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z'></path></svg>",

            "shareLinkedInIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z'></path></svg>",

            "shareRedditIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M201.5 305.5c-13.8 0-24.9-11.1-24.9-24.6 0-13.8 11.1-24.9 24.9-24.9 13.6 0 24.6 11.1 24.6 24.9 0 13.6-11.1 24.6-24.6 24.6zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-132.3-41.2c-9.4 0-17.7 3.9-23.8 10-22.4-15.5-52.6-25.5-86.1-26.6l17.4-78.3 55.4 12.5c0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.3 24.9-24.9s-11.1-24.9-24.9-24.9c-9.7 0-18 5.8-22.1 13.8l-61.2-13.6c-3-.8-6.1 1.4-6.9 4.4l-19.1 86.4c-33.2 1.4-63.1 11.3-85.5 26.8-6.1-6.4-14.7-10.2-24.1-10.2-34.9 0-46.3 46.9-14.4 62.8-1.1 5-1.7 10.2-1.7 15.5 0 52.6 59.2 95.2 132 95.2 73.1 0 132.3-42.6 132.3-95.2 0-5.3-.6-10.8-1.9-15.8 31.3-16 19.8-62.5-14.9-62.5zM302.8 331c-18.2 18.2-76.1 17.9-93.6 0-2.2-2.2-6.1-2.2-8.3 0-2.5 2.5-2.5 6.4 0 8.6 22.8 22.8 87.3 22.8 110.2 0 2.5-2.2 2.5-6.1 0-8.6-2.2-2.2-6.1-2.2-8.3 0zm7.7-75c-13.6 0-24.6 11.1-24.6 24.9 0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.1 24.9-24.6 0-13.8-11-24.9-24.9-24.9z'></path></svg>",

            "shareDiggIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M81.7 172.3H0v174.4h132.7V96h-51v76.3zm0 133.4H50.9v-92.3h30.8v92.3zm297.2-133.4v174.4h81.8v28.5h-81.8V416H512V172.3H378.9zm81.8 133.4h-30.8v-92.3h30.8v92.3zm-235.6 41h82.1v28.5h-82.1V416h133.3V172.3H225.1v174.4zm51.2-133.3h30.8v92.3h-30.8v-92.3zM153.3 96h51.3v51h-51.3V96zm0 76.3h51.3v174.4h-51.3V172.3z'></path></svg>",

            "sharePinterestIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 496 512'><path d='M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z'></path></svg>",

            "shareEmailIcon" =>  "<svg role='img' viewBox='0 0 512 512'><path d='M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z'/></svg>",

            "shareSmsIcon" =>  "<svg role='img' viewBox='0 0 512 512'><path d='M256 448c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9c-5.5 9.2-11.1 16.6-15.2 21.6c-2.1 2.5-3.7 4.4-4.9 5.7c-.6 .6-1 1.1-1.3 1.4l-.3 .3 0 0 0 0 0 0 0 0c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c28.7 0 57.6-8.9 81.6-19.3c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9zM96 212.8c0-20.3 16.5-36.8 36.8-36.8H152c8.8 0 16 7.2 16 16s-7.2 16-16 16H132.8c-2.7 0-4.8 2.2-4.8 4.8c0 1.6 .8 3.1 2.2 4l29.4 19.6c10.3 6.8 16.4 18.3 16.4 30.7c0 20.3-16.5 36.8-36.8 36.8H112c-8.8 0-16-7.2-16-16s7.2-16 16-16h27.2c2.7 0 4.8-2.2 4.8-4.8c0-1.6-.8-3.1-2.2-4l-29.4-19.6C102.2 236.7 96 225.2 96 212.8zM372.8 176H392c8.8 0 16 7.2 16 16s-7.2 16-16 16H372.8c-2.7 0-4.8 2.2-4.8 4.8c0 1.6 .8 3.1 2.2 4l29.4 19.6c10.2 6.8 16.4 18.3 16.4 30.7c0 20.3-16.5 36.8-36.8 36.8H352c-8.8 0-16-7.2-16-16s7.2-16 16-16h27.2c2.7 0 4.8-2.2 4.8-4.8c0-1.6-.8-3.1-2.2-4l-29.4-19.6c-10.2-6.8-16.4-18.3-16.4-30.7c0-20.3 16.5-36.8 36.8-36.8zm-152 6.4L256 229.3l35.2-46.9c4.1-5.5 11.3-7.8 17.9-5.6s10.9 8.3 10.9 15.2v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V240l-19.2 25.6c-3 4-7.8 6.4-12.8 6.4s-9.8-2.4-12.8-6.4L224 240v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-6.9 4.4-13 10.9-15.2s13.7 .1 17.9 5.6z'/></svg>",

            "comingNextIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M384 44v424c0 6.6-5.4 12-12 12h-48c-6.6 0-12-5.4-12-12V291.6l-195.5 181C95.9 489.7 64 475.4 64 448V64c0-27.4 31.9-41.7 52.5-24.6L312 219.3V44c0-6.6 5.4-12 12-12h48c6.6 0 12 5.4 12 12z'></path></svg>",

            "upcomingLiveStreamIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 576 512'><path d='M108.2 71c13.8 11.1 16 31.2 5 45C82.4 154.4 64 203 64 256s18.4 101.6 49.1 140c11.1 13.8 8.8 33.9-5 45s-33.9 8.8-45-5C23.7 386.7 0 324.1 0 256S23.7 125.3 63.2 76c11.1-13.8 31.2-16 45-5zm359.7 0c13.8-11.1 33.9-8.8 45 5C552.3 125.3 576 187.9 576 256s-23.7 130.7-63.2 180c-11.1 13.8-31.2 16-45 5s-16-31.2-5-45c30.7-38.4 49.1-87 49.1-140s-18.4-101.6-49.1-140c-11.1-13.8-8.8-33.9 5-45zM232 256a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm-27.5-74.7c-17.8 19.8-28.5 46-28.5 74.7s10.8 54.8 28.5 74.7c11.8 13.2 10.7 33.4-2.5 45.2s-33.4 10.7-45.2-2.5C129 342.2 112 301.1 112 256s17-86.2 44.8-117.3c11.8-13.2 32-14.3 45.2-2.5s14.3 32 2.5 45.2zm214.7-42.7C447 169.8 464 210.9 464 256s-17 86.2-44.8 117.3c-11.8 13.2-32 14.3-45.2 2.5s-14.3-32-2.5-45.2c17.8-19.8 28.5-46 28.5-74.7s-10.8-54.8-28.5-74.7c-11.8-13.2-10.7-33.4 2.5-45.2s33.4-10.7 45.2 2.5z'/></svg>",

            "relCloseIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 320 512'><path d='M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z'></path></svg>",
            
            "relPrevIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 192 512'><path d='M25.1 247.5l117.8-116c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L64.7 256l102.2 100.4c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L25 264.5c-4.6-4.7-4.6-12.3.1-17z'></path></svg>",

            "relNextIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 192 512'><path d='M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z'></path></svg>",


            //playlist

            "playlistSelectorLangToggleIcon" => "<svg aria-hidden='true' role='img' viewBox='0 0 448 512'><path d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'></path></svg>",

            "starIcon" => "<svg viewBox='0 0 576 512'><path d='M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z'/></svg>",
        


            //internal

            "annotationCloseIcon" => "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'><path fill='currentColor' d='M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z'></path></svg>",

            "lightboxCloseIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 384 512'><path d='M217.5 256l137.2-137.2c4.7-4.7 4.7-12.3 0-17l-8.5-8.5c-4.7-4.7-12.3-4.7-17 0L192 230.5 54.8 93.4c-4.7-4.7-12.3-4.7-17 0l-8.5 8.5c-4.7 4.7-4.7 12.3 0 17L166.5 256 29.4 393.2c-4.7 4.7-4.7 12.3 0 17l8.5 8.5c4.7 4.7 12.3 4.7 17 0L192 281.5l137.2 137.2c4.7 4.7 12.3 4.7 17 0l8.5-8.5c4.7-4.7 4.7-12.3 0-17L217.5 256z'></path></svg>",

            "lightboxPreviousIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 256 512'><path d='M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z'></path></svg>",

            "lightboxNextIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 256 512'><path d='M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z'></path></svg>",

            "minimizeCloseIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 320 512'><path d='M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z'></path></svg>",




            //heatmap

            "trackVideoHeatmap" => false,
            "showVideoHeatmap" => false,
            "heatmapHeight" => 40,
            "heatmapColor" => "rgba(255, 255, 255, 0.7)",
            

        );
    }

    function mvp_player_options_preset(){

        return array(

            'sirius' => array(
            
                "elementsVisibilityArr" => array(
                    array(
                        'width' => 500,
                        'controls' => 'on',
                        'play' => 'on',
                        'next' => 'on',
                        'rewind' => 'on',
                        'previous' => 'on',
                        'seekbar' => 'on',
                        'fullscreen' => 'on',
                        'settings' => 'on',
                        'share' => 'on',
                        'info' => 'on',
                        'volume' => 'on',
                        'playlist' => 'on',
                        'chapter' => 'on',
                        'annotations' => 'on',
                        'popups' => 'on',
                    ),
                ),

                //css

                "playerBgColor" => "rgb(17,17,17)",

                "iconColor" => "rgb(221,221,221)",
                "iconRolloverColor" => "rgb(255,255,255)",

                "bigPlayIconColor" => "rgb(221,221,221)",
                "bigPlayBgColor" => "rgba(255,255,255,0)",
                
                "themeBgColor" => "rgba(0,0,0,0.5)",

                "seekbarBgColor" => "rgb(187,187,187)",
                "seekbarLoadColor" => "rgb(204,204,204)",
                "seekbarProgressColor" => "rgb(255,255,255)",

                "volumeBgColor" => "rgb(187,187,187)",
                "volumeLevelColor" => "rgb(255,255,255)",

                "timeCurrentTextColor" => "rgb(238,238,238)",
                "timeTotalTextColor" => "rgb(238,238,238)",

                "settingsMenuHeaderBgColor" => "rgb(255,255,255)",
                "settingsMenuHeaderTextColor" => "rgb(85,85,85)",
                "settingsMenuItemActiveBgColor" => "rgb(255,255,255)",
                "settingsMenuItemActiveTextColor" => "rgb(85,85,85)",
                "settingsMenuItemTextColor" => "rgb(238,238,238)",
                "settingsMenuItemValueTextColor" => "rgb(136,136,136)",

                "subtitleTextColor" => "rgb(255,255,255)",
                "subtitleTextBgColor" => "rgb(0,0,0,0.3)",

                "customContextMenuBorderTopColor" => "rgba(206,206,206,0.44)",
                "customContextMenuTextColor" => "rgb(238,238,238)",
                "customContextMenuLinkBgColor" => "rgb(158,158,158)",
                "customContextMenuLinkTextColor" => "rgb(229,229,229)",

                "passwordHolderBgColor" => "rgba(0,0,0,0.7)",
                "passwordFieldBorderColor" => "rgb(51,51,51)",
                "passwordFieldBgColor" => "rgb(35,35,35)",
                "passwordFieldTextColor" => "rgb(255,255,255)",
                "passwordFieldTitleColor" => "rgb(255,255,255)",

                "tooltipBgColor" => "rgb(255,255,255)",
                "tooltipTextColor" => "rgb(51,51,51)",
                "preloaderColor" => "rgb(238,238,238)",

                "playerTitleTextColor" => "rgb(225,225,225)",
                "playerDescTextColor" => "rgb(187,187,187)",


                //playlist
                "playlistBgColor" => "rgb(40,40,40)",
              
                "playlistTitleTextColor" => "rgba(225,225,225)",
                "playlistDateTextColor" => "rgb(187,187,187)",
                "playlistDescTextColor" => "rgb(119,119,119)",

                "loadMoreBtnBgColor" => "rgb(40,40,40)",
                "loadMoreBtnTextColor" => "rgb(238,238,238)",
                "loadMoreBtnHoverBgColor" => "rgb(58,58,58)",
                "loadMoreBtnHoverTextColor" => "rgb(225,225,225)",

                "upNextTextColor" => "rgb(238,238,238)",
                "upNextHoverTextColor" => "rgb(225,225,225)",

                "chapterIndicatorColor" => "rgb(255,255,0)",
                "chapterHighlightColor" => "rgba(255,255,255,0.8)",
                "chapterTitleTextColor" => "rgb(225,225,225)",

                "adSkipMsgTextColor" => "rgb(238,238,238)",
                "adSkipMsgHoverTextColor" => "rgb(255,255,255)",

                "playlistDescriptionBgColor" => "rgba(0,0,0,0.5)",

                "playlistItemGdbtBgColor" => "rgb(40,40,40)",
                "playlistItemGdbtDrotSelectedBgColor" => "rgb(58,58,58)",

                //search
                "searchFilterTextColor" => "rgb(153,153,153)",  
                "searchFilterBgColor" => "rgb(238,238,238)",  



                //icons controls

                "volumeUpIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 576 512'><path d='M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zm233.32-51.08c-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 78.98-39.55 152.09-105.82 195.58-11.17 7.32-14.29 22.34-6.95 33.5 7.04 10.71 21.93 14.56 33.51 6.95C528.27 439.58 576 351.33 576 256S528.27 72.43 448.35 19.97zM480 256c0-63.53-32.06-121.94-85.77-156.24-11.19-7.14-26.03-3.82-33.12 7.46s-3.78 26.21 7.41 33.36C408.27 165.97 432 209.11 432 256s-23.73 90.03-63.48 115.42c-11.19 7.14-14.5 22.07-7.41 33.36 6.51 10.36 21.12 15.14 33.12 7.46C447.94 377.94 480 319.54 480 256zm-141.77-76.87c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 228.28 336 241.63 336 256c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.86z'></path></svg>",

                "volumeDownIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 384 512'><path d='M215.03 72.04L126.06 161H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V89.02c0-21.47-25.96-31.98-40.97-16.98zm123.2 108.08c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 229.28 336 242.62 336 257c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.87z'></path></svg>",

                "volumeOffIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 640 512'><path d='M633.82 458.1l-69-53.33C592.42 360.8 608 309.68 608 256c0-95.33-47.73-183.58-127.65-236.03-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 42.78-11.96 83.59-33.22 119.06l-38.12-29.46C503.49 318.68 512 288.06 512 256c0-63.09-32.06-122.09-85.77-156.16-11.19-7.09-26.03-3.8-33.12 7.41-7.09 11.2-3.78 26.03 7.41 33.13C440.27 165.59 464 209.44 464 256c0 21.21-5.03 41.57-14.2 59.88l-39.56-30.58c3.38-9.35 5.76-19.07 5.76-29.3 0-31.88-17.53-61.33-45.77-76.88-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61 11.76 6.46 19.12 18.18 20.4 31.06L288 190.82V88.02c0-21.46-25.96-31.98-40.97-16.97l-49.71 49.7L45.47 3.37C38.49-2.05 28.43-.8 23.01 6.18L3.37 31.45C-2.05 38.42-.8 48.47 6.18 53.9l588.36 454.73c6.98 5.43 17.03 4.17 22.46-2.81l19.64-25.27c5.41-6.97 4.16-17.02-2.82-22.45zM32 184v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V352.6L43.76 163.84C36.86 168.05 32 175.32 32 184z'></path></svg>",

                "fullscreenEnterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M0 180V56c0-13.3 10.7-24 24-24h124c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H64v84c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12zM288 44v40c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12V56c0-13.3-10.7-24-24-24H300c-6.6 0-12 5.4-12 12zm148 276h-40c-6.6 0-12 5.4-12 12v84h-84c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24V332c0-6.6-5.4-12-12-12zM160 468v-40c0-6.6-5.4-12-12-12H64v-84c0-6.6-5.4-12-12-12H12c-6.6 0-12 5.4-12 12v124c0 13.3 10.7 24 24 24h124c6.6 0 12-5.4 12-12z'></path></svg>",

                "fullscreenExitIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M436 192H312c-13.3 0-24-10.7-24-24V44c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v84h84c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm-276-24V44c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v84H12c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24zm0 300V344c0-13.3-10.7-24-24-24H12c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-84h84c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12H312c-13.3 0-24 10.7-24 24v124c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12z'></path></svg>",

                "playlistToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z'></path></svg>",

                "videoInfoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z'></path></svg>",

                "shareToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z'></path></svg>",

                "embedToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z'></path></svg>",

                "downloadIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M382.56,233.376C379.968,227.648,374.272,224,368,224h-64V16c0-8.832-7.168-16-16-16h-64c-8.832,0-16,7.168-16,16v208h-64 c-6.272,0-11.968,3.68-14.56,9.376c-2.624,5.728-1.6,12.416,2.528,17.152l112,128c3.04,3.488,7.424,5.472,12.032,5.472 c4.608,0,8.992-2.016,12.032-5.472l112-128C384.192,245.824,385.152,239.104,382.56,233.376z'/><path d='M432,352v96H80v-96H16v128c0,17.696,14.336,32,32,32h416c17.696,0,32-14.304,32-32V352H432z'/></svg>",

                "pipIcon" => "<svg width='24' height='24' viewBox='0 0 24 24'><path d='M19 7h-8v6h8V7zm2-4H3c-1.1 0-2 .9-2 2v14c0 1.1.9 1.98 2 1.98h18c1.1 0 2-.88 2-1.98V5c0-1.1-.9-2-2-2zm0 16.01H3V4.98h18v14.03z'/><path d='M0 0h24v24H0z' fill='none'/></svg>",

                "prevVideoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M229.9 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L94.569 282H436c6.627 0 12-5.373 12-12v-28c0-6.627-5.373-12-12-12H94.569l155.13-155.13c4.686-4.686 4.686-12.284 0-16.971L229.9 38.101c-4.686-4.686-12.284-4.686-16.971 0L3.515 247.515c-4.686 4.686-4.686 12.284 0 16.971L212.929 473.9c4.686 4.686 12.284 4.686 16.971-.001z'></path></svg>",

                "nextVideoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z'></path></svg>",

                "playIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 373.008 373.008'><path d='M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z'/></svg>",

                "pauseIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 26 26'><path d='M4.667,0h6v26h-6V0z M15.333,0v26h6V0H15.333z'/></svg>",

                "rewindIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M12 8h27.711c6.739 0 12.157 5.548 11.997 12.286l-2.347 98.568C93.925 51.834 170.212 7.73 256.793 8.001 393.18 8.428 504.213 120.009 504 256.396 503.786 393.181 392.835 504 256 504c-63.926 0-122.202-24.187-166.178-63.908-5.113-4.618-5.354-12.561-.482-17.433l19.738-19.738c4.498-4.498 11.753-4.785 16.501-.552C160.213 433.246 205.895 452 256 452c108.322 0 196-87.662 196-196 0-108.322-87.662-196-196-196-79.545 0-147.941 47.282-178.675 115.302l126.389-3.009c6.737-.16 12.286 5.257 12.286 11.997V212c0 6.627-5.373 12-12 12H12c-6.627 0-12-5.373-12-12V20C0 13.373 5.373 8 12 8z'></path></svg>",

                "skipBackwardIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M267.5 281.2l192 159.4c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6L267.5 232c-15.3 12.8-15.3 36.4 0 49.2zM464 130.3V382L313 256.6l151-126.3zM11.5 281.2l192 159.4c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6L11.5 232c-15.3 12.8-15.3 36.4 0 49.2zM208 130.3V382L57 256.6l151-126.3z'></path></svg>",

                "skipForwardIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M244.5 230.8L52.5 71.4C31.9 54.3 0 68.6 0 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160.6c15.3-12.8 15.3-36.4 0-49.2zM48 381.7V130.1l151 125.4L48 381.7zm452.5-150.9l-192-159.4C287.9 54.3 256 68.6 256 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160.6c15.3-12.8 15.3-36.4 0-49.2zM304 381.7V130.1l151 125.4-151 126.2z'></path></svg>",

                "vrIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 640 512'><path d='M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h160.22c25.19 0 48.03-14.77 58.36-37.74l27.74-61.64C286.21 331.08 302.35 320 320 320s33.79 11.08 41.68 28.62l27.74 61.64C399.75 433.23 422.6 448 447.78 448H608c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM160 304c-35.35 0-64-28.65-64-64s28.65-64 64-64 64 28.65 64 64-28.65 64-64 64zm320 0c-35.35 0-64-28.65-64-64s28.65-64 64-64 64 28.65 64 64-28.65 64-64 64z'></path></svg>",

                "ccToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM218.1 287.7c2.8-2.5 7.1-2.1 9.2.9l19.5 27.7c1.7 2.4 1.5 5.6-.5 7.7-53.6 56.8-172.8 32.1-172.8-67.9 0-97.3 121.7-119.5 172.5-70.1 2.1 2 2.5 3.2 1 5.7l-17.5 30.5c-1.9 3.1-6.2 4-9.1 1.7-40.8-32-94.6-14.9-94.6 31.2.1 48 51.1 70.5 92.3 32.6zm190.4 0c2.8-2.5 7.1-2.1 9.2.9l19.5 27.7c1.7 2.4 1.5 5.6-.5 7.7-53.5 56.9-172.7 32.1-172.7-67.9 0-97.3 121.7-119.5 172.5-70.1 2.1 2 2.5 3.2 1 5.7L420 222.2c-1.9 3.1-6.2 4-9.1 1.7-40.8-32-94.6-14.9-94.6 31.2 0 48 51 70.5 92.2 32.6z'></path></svg>",

                "transcriptIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 384 512'><path d='M224 0H0V512H384V160H224V0zm32 0V128H384L256 0zM112 256H272h16v32H272 112 96V256h16zm0 64H272h16v32H272 112 96V320h16zm0 64H272h16v32H272 112 96V384h16z'/></svg>",

                "settingsMenuIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z'></path></svg>",

                "prevChapterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path fill='currentColor' d='M390.3 473.9L180.9 264.5c-4.7-4.7-4.7-12.3 0-17L390.3 38.1c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17L246.4 256l180.7 181.1c4.7 4.7 4.7 12.3 0 17l-19.8 19.8c-4.7 4.7-12.3 4.7-17 0zm-143 0l19.8-19.8c4.7-4.7 4.7-12.3 0-17L86.4 256 267.1 74.9c4.7-4.7 4.7-12.3 0-17l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L20.9 247.5c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0z'></path></svg>",

                "nextChapterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M57.7 38.1l209.4 209.4c4.7 4.7 4.7 12.3 0 17L57.7 473.9c-4.7 4.7-12.3 4.7-17 0l-19.8-19.8c-4.7-4.7-4.7-12.3 0-17L201.6 256 20.9 74.9c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0zm143 0l-19.8 19.8c-4.7 4.7-4.7 12.3 0 17L361.6 256 180.9 437.1c-4.7 4.7-4.7 12.3 0 17l19.8 19.8c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17L217.7 38.1c-4.7-4.7-12.3-4.7-17 0z'></path></svg>",

                "chapterToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12z'></path></svg>",

                "chapterRepeatIcon" => "<svg viewBox='0 0 512 512'><path d='M496 240C487.2 240 480 247.2 480 256c0 79.41-64.59 144-144 144H192L192 336c0-6.219-3.594-11.84-9.219-14.5C180.6 320.5 178.3 320 176 320c-3.672 0-7.312 1.25-10.25 3.719l-96 80C66.11 406.8 64 411.3 64 416s2.109 9.254 5.75 12.29l96 80c4.781 4 11.45 4.812 17.03 2.219C188.4 507.9 192 502.2 192 496L192 432H336c97.05 0 176-78.97 176-176C512 247.2 504.8 240 496 240zM160 461.8L105 416L160 370.2V461.8zM176 112l143.1-.002L320 176c0 6.219 3.594 11.84 9.219 14.5C331.4 191.5 333.7 192 336 192c3.672 0 7.312-1.25 10.25-3.719l96-80C445.9 105.2 448 100.7 448 95.1s-2.109-9.253-5.75-12.28l-96-80c-4.781-4-11.45-4.812-17.03-2.219C323.6 4.148 320 9.773 320 15.99L319.1 80H176C78.95 80 0 158.1 0 256c0 8.844 7.156 16 16 16S32 264.8 32 256C32 176.6 96.59 112 176 112zM352 50.15l55 45.85L352 141.8V50.15z'/></svg>",

                "chapterShareIcon" => "<svg viewBox='0 0 512 512'><path d='M176 224h275.8l-158.1-131.7c-6.781-5.656-7.688-15.75-2.031-22.53c5.688-6.812 15.78-7.687 22.53-2.031l192 159.1C509.9 230.8 512 235.2 512 239.1c0 4.75-2.094 9.253-5.75 12.28l-192 159.1c-3 2.5-6.625 3.719-10.25 3.719c-4.562 0-9.125-1.969-12.28-5.75c-5.656-6.781-4.75-16.87 2.031-22.53l158.1-131.7H176c-79.41 0-144 64.59-144 143.1v31.1C32 440.8 24.84 448 16 448S0 440.8 0 432v-31.1C0 302.1 78.97 224 176 224z'/></svg>",

                "theaterToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 640 512'><path d='M592 96.5H48c-26.5 0-48 21.5-48 48v223c0 26.5 21.5 48 48 48h544c26.5 0 48-21.5 48-48v-223c0-26.5-21.5-48-48-48zm-6 271H54c-3.3 0-6-2.7-6-6v-211c0-3.3 2.7-6 6-6h532c3.3 0 6 2.7 6 6v211c0 3.3-2.7 6-6 6z'></path></svg>",

                "castOffIcon" => "<svg height='17' viewBox='0 0 512 512'><path d='M447.8,64H64c-23.6,0-42.7,19.1-42.7,42.7v63.9H64v-63.9h383.8v298.6H298.6V448H448c23.6,0,42.7-19.1,42.7-42.7V106.7 C490.7,83.1,471.4,64,447.8,64z M21.3,383.6L21.3,383.6l0,63.9h63.9C85.2,412.2,56.6,383.6,21.3,383.6L21.3,383.6z M21.3,298.6V341 c58.9,0,106.6,48.1,106.6,107h42.7C170.7,365.6,103.7,298.7,21.3,298.6z M213.4,448h42.7c-0.5-129.5-105.3-234.3-234.8-234.6l0,42.4 C127.3,255.6,213.3,342,213.4,448z'></path></svg>",

                "castOnIcon" => "<svg viewBox='0 0 48 48'><path d='M0 0h48v48h-48z' fill='none' opacity='.1'/><path d='M0 0h48v48h-48z' fill='none'/><path d='M2 36v6h6c0-3.31-2.69-6-6-6zm0-8v4c5.52 0 10 4.48 10 10h4c0-7.73-6.27-14-14-14zm36-14h-28v3.27c7.92 2.56 14.17 8.81 16.73 16.73h11.27v-20zm-36 6v4c9.94 0 18 8.06 18 18h4c0-12.15-9.85-22-22-22zm40-14h-36c-2.21 0-4 1.79-4 4v6h4v-6h36v28h-14v4h14c2.21 0 4-1.79 4-4v-28c0-2.21-1.79-4-4-4z'/></svg>",

                "airplayIcon" => "<svg height='48' viewBox='0 0 48 48' width='48' aria-hidden='true' focusable='false' role='img' xmlns:xlink='http://www.w3.org/1999/xlink'><defs><path d='M0 0h48v48H0V0z' id='a'/></defs><defs><path d='M0 0h48v48H0V0z' id='c'/></defs><clipPath id='b'><use overflow='visible' xlink:href='#a'/></clipPath><clipPath clip-path='url(#b)' id='d'><use overflow='visible' xlink:href='#c'/></clipPath><path clip-path='url(#d)' d='M42 6H6c-2.2 0-4 1.8-4 4v24c0 2.2 1.8 4 4 4h8v-4H6V10h36v24h-8v4h8c2.2 0 4-1.8 4-4V10c0-2.2-1.8-4-4-4zM12 44h24L24 32z'/></svg>",

                "bigPlayIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 373.008 373.008'><path d='M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z'/></svg>",
                

            ),

            'pollux' => array(
            
                "elementsVisibilityArr" => array(
                    array(
                        'width' => 600,
                        'controls' => 'on',
                        'play' => 'on',
                        'next' => 'on',
                        'rewind' => 'on',
                        'previous' => 'on',
                        'seekbar' => 'on',
                        'fullscreen' => 'on',
                        'settings' => 'on',
                        'share' => 'on',
                        'volume' => 'on',
                        'playlist' => 'on',
                        'time' => 'on',
                        'info' => 'on',
                        'chapter' => 'on',
                        'annotations' => 'on',
                        'popups' => 'on',
                    ),
                ),

                //css

                "playerBgColor" => "rgb(17,17,17)",

                "iconColor" => "rgb(238,238,238)",
                "iconRolloverColor" => "rgb(255,255,255)",

                "playbackControlsBgColor" => "rgb(222,83,98)",//individual
                "topRightControlsBgHoverColor" => "rgb(222,83,98)",//individual

                "bigPlayBgColor" => "rgb(50,58,69)",
                "bigPlayIconColor" => "rgb(238,238,238)",
                
                "themeBgColor" => "rgb(50,58,69)",

                "seekbarBgColor" => "rgb(110,119,130)",
                "seekbarLoadColor" => "rgb(110,119,130)",
                "seekbarProgressColor" => "rgb(222,83,98)",
                "seekbarProgressPointerColor" => "rgb(255,255,255)",

                "volumeBgColor" => "rgb(110,119,130)",
                "volumeLevelColor" => "rgb(222,83,98)",
                "volumeLevelPointerColor" => "rgb(255,255,255)",//individual

                "timeCurrentTextColor" => "rgb(204,204,204)",
                "timeTotalTextColor" => "rgb(102,102,102)",

                "settingsMenuHeaderBgColor" => "rgb(255,255,255)",
                "settingsMenuHeaderTextColor" => "rgb(85,85,85)",
                "settingsMenuItemActiveBgColor" => "rgb(255,255,255)",
                "settingsMenuItemActiveTextColor" => "rgb(85,85,85)",
                "settingsMenuItemTextColor" => "rgb(238,238,238)",
                "settingsMenuItemValueTextColor" => "rgb(136,136,136)",

                "subtitleTextColor" => "rgb(255,255,255)",
                "subtitleTextBgColor" => "rgb(0,0,0,0.3)",

                "customContextMenuBorderTopColor" => "rgb(102,102,102)",
                "customContextMenuTextColor" => "rgb(238,238,238)",
                "customContextMenuLinkBgColor" => "rgb(158,158,158)",
                "customContextMenuLinkTextColor" => "rgb(229,229,229)",

                "passwordHolderBgColor" => "rgba(0,0,0,0.7)",
                "passwordFieldBorderColor" => "rgba(51,51,51,0)",
                "passwordFieldBgColor" => "rgb(35,35,35)",
                "passwordFieldTextColor" => "rgb(255,255,255)",
                "passwordFieldTitleColor" => "rgb(255,255,255)",

                "tooltipBgColor" => "rgb(222,83,98)",
                "tooltipTextColor" => "rgb(255,255,255)",
                "preloaderColor" => "rgb(255,255,255)",

                "playerTitleTextColor" => "rgb(225,225,225)",
                "playerDescTextColor" => "rgb(187,187,187)",


                "playlistBgColor" => "rgb(50,58,69)",

                "playlistTitleTextColor" => "rgba(255,255,255)",
                "playlistDateTextColor" => "rgb(187,187,187)",
                "playlistDescTextColor" => "rgb(102,102,102)",

                "loadMoreBtnBgColor" => "rgb(50,58,69)",
                "loadMoreBtnTextColor" => "rgb(238,238,238)",
                "loadMoreBtnHoverBgColor" => "rgb(50,58,69)",
                "loadMoreBtnHoverTextColor" => "rgb(225,225,225)",

                "upNextTextColor" => "rgb(238,238,238)",
                "upNextHoverTextColor" => "rgb(225,225,225)",

                "chapterIndicatorColor" => "rgb(255,255,0)",
                "chapterHighlightColor" => "rgba(255,255,255,0.8)",
                "chapterTitleTextColor" => "rgb(225,225,225)",

                "adSkipMsgTextColor" => "rgb(238,238,238)",
                "adSkipMsgHoverTextColor" => "rgb(255,255,255)",

                "playlistDescriptionBgColor" => "rgb(50,58,69)",

                "playlistItemGdbtBgColor" => "rgb(50,58,69)",
                "playlistItemGdbtDrotSelectedBgColor" => "rgb(238,238,238)",

                //search
                "searchFilterTextColor" => "rgb(153,153,153)",  
                "searchFilterBgColor" => "rgb(238,238,238)",  


                //icons controls

                "volumeUpIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 576 512'><path d='M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zm233.32-51.08c-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 78.98-39.55 152.09-105.82 195.58-11.17 7.32-14.29 22.34-6.95 33.5 7.04 10.71 21.93 14.56 33.51 6.95C528.27 439.58 576 351.33 576 256S528.27 72.43 448.35 19.97zM480 256c0-63.53-32.06-121.94-85.77-156.24-11.19-7.14-26.03-3.82-33.12 7.46s-3.78 26.21 7.41 33.36C408.27 165.97 432 209.11 432 256s-23.73 90.03-63.48 115.42c-11.19 7.14-14.5 22.07-7.41 33.36 6.51 10.36 21.12 15.14 33.12 7.46C447.94 377.94 480 319.54 480 256zm-141.77-76.87c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 228.28 336 241.63 336 256c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.86z'></path></svg>",

                "volumeDownIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 384 512'><path d='M215.03 72.04L126.06 161H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V89.02c0-21.47-25.96-31.98-40.97-16.98zm123.2 108.08c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 229.28 336 242.62 336 257c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.87z'></path></svg>",

                "volumeOffIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 640 512'><path d='M633.82 458.1l-69-53.33C592.42 360.8 608 309.68 608 256c0-95.33-47.73-183.58-127.65-236.03-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 42.78-11.96 83.59-33.22 119.06l-38.12-29.46C503.49 318.68 512 288.06 512 256c0-63.09-32.06-122.09-85.77-156.16-11.19-7.09-26.03-3.8-33.12 7.41-7.09 11.2-3.78 26.03 7.41 33.13C440.27 165.59 464 209.44 464 256c0 21.21-5.03 41.57-14.2 59.88l-39.56-30.58c3.38-9.35 5.76-19.07 5.76-29.3 0-31.88-17.53-61.33-45.77-76.88-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61 11.76 6.46 19.12 18.18 20.4 31.06L288 190.82V88.02c0-21.46-25.96-31.98-40.97-16.97l-49.71 49.7L45.47 3.37C38.49-2.05 28.43-.8 23.01 6.18L3.37 31.45C-2.05 38.42-.8 48.47 6.18 53.9l588.36 454.73c6.98 5.43 17.03 4.17 22.46-2.81l19.64-25.27c5.41-6.97 4.16-17.02-2.82-22.45zM32 184v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V352.6L43.76 163.84C36.86 168.05 32 175.32 32 184z'></path></svg>",

                "fullscreenEnterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M212.686 315.314L120 408l32.922 31.029c15.12 15.12 4.412 40.971-16.97 40.971h-112C10.697 480 0 469.255 0 456V344c0-21.382 25.803-32.09 40.922-16.971L72 360l92.686-92.686c6.248-6.248 16.379-6.248 22.627 0l25.373 25.373c6.249 6.248 6.249 16.378 0 22.627zm22.628-118.628L328 104l-32.922-31.029C279.958 57.851 290.666 32 312.048 32h112C437.303 32 448 42.745 448 56v112c0 21.382-25.803 32.09-40.922 16.971L376 152l-92.686 92.686c-6.248 6.248-16.379 6.248-22.627 0l-25.373-25.373c-6.249-6.248-6.249-16.378 0-22.627z'/></svg>",

                "fullscreenExitIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M4.686 427.314L104 328l-32.922-31.029C55.958 281.851 66.666 256 88.048 256h112C213.303 256 224 266.745 224 280v112c0 21.382-25.803 32.09-40.922 16.971L152 376l-99.314 99.314c-6.248 6.248-16.379 6.248-22.627 0L4.686 449.941c-6.248-6.248-6.248-16.379 0-22.627zM443.314 84.686L344 184l32.922 31.029c15.12 15.12 4.412 40.971-16.97 40.971h-112C234.697 256 224 245.255 224 232V120c0-21.382 25.803-32.09 40.922-16.971L296 136l99.314-99.314c6.248-6.248 16.379-6.248 22.627 0l25.373 25.373c6.248 6.248 6.248 16.379 0 22.627z'/></svg>",

                "playlistToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z'></path></svg>",

                "videoInfoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm0-338c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z'></path></svg>",

                "shareToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M352 320c-25.6 0-48.9 10-66.1 26.4l-98.3-61.5c5.9-18.8 5.9-39.1 0-57.8l98.3-61.5C303.1 182 326.4 192 352 192c53 0 96-43 96-96S405 0 352 0s-96 43-96 96c0 9.8 1.5 19.6 4.4 28.9l-98.3 61.5C144.9 170 121.6 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.6 0 48.9-10 66.1-26.4l98.3 61.5c-2.9 9.4-4.4 19.1-4.4 28.9 0 53 43 96 96 96s96-43 96-96-43-96-96-96zm0-272c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM96 304c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm256 160c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z'></path></svg>",

                "embedToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z'></path></svg>",

                "downloadIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 576 512'><path d='M528 288h-92.1l46.1-46.1c30.1-30.1 8.8-81.9-33.9-81.9h-64V48c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v112h-64c-42.6 0-64.2 51.7-33.9 81.9l46.1 46.1H48c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V336c0-26.5-21.5-48-48-48zm-400-80h112V48h96v160h112L288 368 128 208zm400 256H48V336h140.1l65.9 65.9c18.8 18.8 49.1 18.7 67.9 0l65.9-65.9H528v128zm-88-64c0-13.3 10.7-24 24-24s24 10.7 24 24-10.7 24-24 24-24-10.7-24-24z'></path></svg>",

                "pipIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M464 0H144c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h320c26.51 0 48-21.49 48-48v-48h48c26.51 0 48-21.49 48-48V48c0-26.51-21.49-48-48-48zM362 464H54a6 6 0 0 1-6-6V150a6 6 0 0 1 6-6h42v224c0 26.51 21.49 48 48 48h224v42a6 6 0 0 1-6 6zm96-96H150a6 6 0 0 1-6-6V54a6 6 0 0 1 6-6h308a6 6 0 0 1 6 6v308a6 6 0 0 1-6 6z'></path></svg>",

                "prevVideoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 444.531 444.531'><path d='M213.13,222.409L351.88,83.653c7.05-7.043,10.567-15.657,10.567-25.841c0-10.183-3.518-18.793-10.567-25.835 l-21.409-21.416C323.432,3.521,314.817,0,304.637,0s-18.791,3.521-25.841,10.561L92.649,196.425 c-7.044,7.043-10.566,15.656-10.566,25.841s3.521,18.791,10.566,25.837l186.146,185.864c7.05,7.043,15.66,10.564,25.841,10.564 s18.795-3.521,25.834-10.564l21.409-21.412c7.05-7.039,10.567-15.604,10.567-25.697c0-10.085-3.518-18.746-10.567-25.978 L213.13,222.409z'/></svg>",

                "nextVideoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 444.819 444.819'><path d='M352.025,196.712L165.884,10.848C159.029,3.615,150.469,0,140.187,0c-10.282,0-18.842,3.619-25.697,10.848L92.792,32.264 c-7.044,7.043-10.566,15.604-10.566,25.692c0,9.897,3.521,18.56,10.566,25.981l138.753,138.473L92.786,361.168 c-7.042,7.043-10.564,15.604-10.564,25.693c0,9.896,3.521,18.562,10.564,25.98l21.7,21.413 c7.043,7.043,15.612,10.564,25.697,10.564c10.089,0,18.656-3.521,25.697-10.564l186.145-185.864 c7.046-7.423,10.571-16.084,10.571-25.981C362.597,212.321,359.071,203.755,352.025,196.712z'/></svg>",

                "playIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z'></path></svg>",

                "pauseIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z'/></svg>",

                "rewindIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M255.545 8c-66.269.119-126.438 26.233-170.86 68.685L48.971 40.971C33.851 25.851 8 36.559 8 57.941V192c0 13.255 10.745 24 24 24h134.059c21.382 0 32.09-25.851 16.971-40.971l-41.75-41.75c30.864-28.899 70.801-44.907 113.23-45.273 92.398-.798 170.283 73.977 169.484 169.442C423.236 348.009 349.816 424 256 424c-41.127 0-79.997-14.678-110.63-41.556-4.743-4.161-11.906-3.908-16.368.553L89.34 422.659c-4.872 4.872-4.631 12.815.482 17.433C133.798 479.813 192.074 504 256 504c136.966 0 247.999-111.033 248-247.998C504.001 119.193 392.354 7.755 255.545 8z'></path></svg>",

                "skipBackwardIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2zm256 0l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2z'></path></svg>",

                "skipForwardIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M500.5 231.4l-192-160C287.9 54.3 256 68.6 256 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160c15.3-12.8 15.3-36.4 0-49.2zm-256 0l-192-160C31.9 54.3 0 68.6 0 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160c15.3-12.8 15.3-36.4 0-49.2z'></path></svg>",

                "vrIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 640 512'><path d='M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h160.22c25.19 0 48.03-14.77 58.36-37.74l27.74-61.64C286.21 331.08 302.35 320 320 320s33.79 11.08 41.68 28.62l27.74 61.64C399.75 433.23 422.6 448 447.78 448H608c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM160 304c-35.35 0-64-28.65-64-64s28.65-64 64-64 64 28.65 64 64-28.65 64-64 64zm320 0c-35.35 0-64-28.65-64-64s28.65-64 64-64 64 28.65 64 64-28.65 64-64 64z'></path></svg>",

                "ccToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM218.1 287.7c2.8-2.5 7.1-2.1 9.2.9l19.5 27.7c1.7 2.4 1.5 5.6-.5 7.7-53.6 56.8-172.8 32.1-172.8-67.9 0-97.3 121.7-119.5 172.5-70.1 2.1 2 2.5 3.2 1 5.7l-17.5 30.5c-1.9 3.1-6.2 4-9.1 1.7-40.8-32-94.6-14.9-94.6 31.2.1 48 51.1 70.5 92.3 32.6zm190.4 0c2.8-2.5 7.1-2.1 9.2.9l19.5 27.7c1.7 2.4 1.5 5.6-.5 7.7-53.5 56.9-172.7 32.1-172.7-67.9 0-97.3 121.7-119.5 172.5-70.1 2.1 2 2.5 3.2 1 5.7L420 222.2c-1.9 3.1-6.2 4-9.1 1.7-40.8-32-94.6-14.9-94.6 31.2 0 48 51 70.5 92.2 32.6z'></path></svg>",

                "transcriptIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 384 512'><path d='M224 0H0V512H384V160H224V0zm32 0V128H384L256 0zM112 256H272h16v32H272 112 96V256h16zm0 64H272h16v32H272 112 96V320h16zm0 64H272h16v32H272 112 96V384h16z'/></svg>",

                "settingsMenuIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z'></path></svg>",

                "prevChapterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M34.5 239L228.9 44.7c9.4-9.4 24.6-9.4 33.9 0l22.7 22.7c9.4 9.4 9.4 24.5 0 33.9L131.5 256l154 154.7c9.3 9.4 9.3 24.5 0 33.9l-22.7 22.7c-9.4 9.4-24.6 9.4-33.9 0L34.5 273c-9.3-9.4-9.3-24.6 0-34zm192 34l194.3 194.3c9.4 9.4 24.6 9.4 33.9 0l22.7-22.7c9.4-9.4 9.4-24.5 0-33.9L323.5 256l154-154.7c9.3-9.4 9.3-24.5 0-33.9l-22.7-22.7c-9.4-9.4-24.6-9.4-33.9 0L226.5 239c-9.3 9.4-9.3 24.6 0 34z'></path></svg>",

                "nextChapterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512' ><path d='M477.5 273L283.1 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.5 0-33.9l154-154.7-154-154.7c-9.3-9.4-9.3-24.5 0-33.9l22.7-22.7c9.4-9.4 24.6-9.4 33.9 0L477.5 239c9.3 9.4 9.3 24.6 0 34zm-192-34L91.1 44.7c-9.4-9.4-24.6-9.4-33.9 0L34.5 67.4c-9.4 9.4-9.4 24.5 0 33.9l154 154.7-154 154.7c-9.3 9.4-9.3 24.5 0 33.9l22.7 22.7c9.4 9.4 24.6 9.4 33.9 0L285.5 273c9.3-9.4 9.3-24.6 0-34z'></path></svg>",

                "chapterToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12z'></path></svg>",

                "chapterShareIcon" => "<svg viewBox='0 0 512 512'><path d='M152 184h271.5l-127.2-109.8c-10.03-8.656-11.12-23.81-2.469-33.84c8.688-10.06 23.85-11.21 33.85-2.487l176 151.1C508.1 194.4 512 201 512 208c0 6.968-3.029 13.58-8.31 18.14l-176 151.1c-4.531 3.937-10.13 5.847-15.69 5.847c-6.719 0-13.41-2.812-18.16-8.312c-8.656-10.03-7.562-25.19 2.469-33.84l127.2-109.8H152c-57.34 0-104 46.65-104 103.1v119.1C48 469.3 37.25 480 24 480S0 469.3 0 456v-119.1C0 252.2 68.19 184 152 184z'/></svg>",

                "chapterRepeatIcon" => "<svg viewBox='0 0 512 512'><path d='M176 128h143.1l-.0065 56c0 9.703 5.846 18.45 14.82 22.17s19.28 1.656 26.16-5.203l80.01-80c9.373-9.371 9.373-24.57 0-33.94l-80.01-80c-6.877-6.859-17.19-8.922-26.16-5.203S319.1 14.3 319.1 24V80H176C78.95 80 0 158.1 0 256c0 13.25 10.75 24 24 24S48 269.3 48 256C48 185.4 105.4 128 176 128zM488 232c-13.25 0-24 10.75-24 24c0 70.59-57.42 128-128 128H192l.0114-56c0-9.703-5.846-18.45-14.82-22.17S157.9 304.2 151 311l-80.01 80c-9.373 9.371-9.373 24.57 0 33.94l80.01 80c6.877 6.859 17.19 8.922 26.16 5.203S192 497.7 192 488L192 432H336c97.05 0 176-78.97 176-176C512 242.8 501.3 232 488 232z'/></svg>",

                "theaterToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M0 212V88c0-13.3 10.7-24 24-24h124c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H64v84c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12zM352 76v40c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12V88c0-13.3-10.7-24-24-24H364c-6.6 0-12 5.4-12 12zm148 212h-40c-6.6 0-12 5.4-12 12v84h-84c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24V300c0-6.6-5.4-12-12-12zM160 436v-40c0-6.6-5.4-12-12-12H64v-84c0-6.6-5.4-12-12-12H12c-6.6 0-12 5.4-12 12v124c0 13.3 10.7 24 24 24h124c6.6 0 12-5.4 12-12z'></path></svg>",

                "castOffIcon" => "<svg height='17' viewBox='0 0 512 512'><path d='M447.8,64H64c-23.6,0-42.7,19.1-42.7,42.7v63.9H64v-63.9h383.8v298.6H298.6V448H448c23.6,0,42.7-19.1,42.7-42.7V106.7 C490.7,83.1,471.4,64,447.8,64z M21.3,383.6L21.3,383.6l0,63.9h63.9C85.2,412.2,56.6,383.6,21.3,383.6L21.3,383.6z M21.3,298.6V341 c58.9,0,106.6,48.1,106.6,107h42.7C170.7,365.6,103.7,298.7,21.3,298.6z M213.4,448h42.7c-0.5-129.5-105.3-234.3-234.8-234.6l0,42.4 C127.3,255.6,213.3,342,213.4,448z'></path></svg>",

                "castOnIcon" => "<svg viewBox='0 0 48 48'><path d='M0 0h48v48h-48z' fill='none' opacity='.1'/><path d='M0 0h48v48h-48z' fill='none'/><path d='M2 36v6h6c0-3.31-2.69-6-6-6zm0-8v4c5.52 0 10 4.48 10 10h4c0-7.73-6.27-14-14-14zm36-14h-28v3.27c7.92 2.56 14.17 8.81 16.73 16.73h11.27v-20zm-36 6v4c9.94 0 18 8.06 18 18h4c0-12.15-9.85-22-22-22zm40-14h-36c-2.21 0-4 1.79-4 4v6h4v-6h36v28h-14v4h14c2.21 0 4-1.79 4-4v-28c0-2.21-1.79-4-4-4z'/></svg>",

                "airplayIcon" => "<svg height='48' viewBox='0 0 48 48' width='48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><defs><path d='M0 0h48v48H0V0z' id='a'/></defs><defs><path d='M0 0h48v48H0V0z' id='c'/></defs><clipPath id='b'><use overflow='visible' xlink:href='#a'/></clipPath><clipPath clip-path='url(#b)' id='d'><use overflow='visible' xlink:href='#c'/></clipPath><path clip-path='url(#d)' d='M42 6H6c-2.2 0-4 1.8-4 4v24c0 2.2 1.8 4 4 4h8v-4H6V10h36v24h-8v4h8c2.2 0 4-1.8 4-4V10c0-2.2-1.8-4-4-4zM12 44h24L24 32z'/></svg>",

                "bigPlayIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 373.008 373.008'><path d='M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z'/></svg>",



            ),

            'aviva' => array(
            
                "elementsVisibilityArr" => array(
                    array(
                        'width' => 600,
                        'controls' => 'on',
                        'play' => 'on',
                        'next' => 'on',
                        'rewind' => 'on',
                        'previous' => 'on',
                        'seekbar' => 'on',
                        'settings' => 'on',
                        'fullscreen' => 'on',
                        'settings' => 'on',
                        'share' => 'on',
                        'info' => 'on',
                        'volume' => 'on',
                        'playlist' => 'on',
                        'chapter' => 'on',
                        'annotations' => 'on',
                        'popups' => 'on',
                    ),
                ),

                //css

                "playerBgColor" => "rgb(17,17,17)",

                "iconColor" => "rgb(215,230,235)",
                "iconRolloverColor" => "rgb(255,255,255)",

                "bigPlayBgColor" => "rgb(53,59,73)",
                "bigPlayIconColor" => "rgb(215,230,235)",
                
                "themeBgColor" => "rgb(53,59,73)",

                "seekbarBgColor" => "rgb(209,227,231)",
                "seekbarLoadColor" => "rgb(209,227,231)",
                "seekbarProgressColor" => "rgb(98,118,143)",

                "volumeBgColor" => "rgb(209,227,231)",
                "volumeLevelColor" => "rgb(98,118,143)",

                "timeCurrentTextColor" => "rgb(98,118,143)",
                "timeTotalTextColor" => "rgb(215,230,235)",

                "settingsMenuHeaderBgColor" => "rgb(255,255,255)",
                "settingsMenuHeaderTextColor" => "rgb(85,85,85)",
                "settingsMenuItemActiveBgColor" => "rgb(255,255,255)",
                "settingsMenuItemActiveTextColor" => "rgb(85,85,85)",
                "settingsMenuItemTextColor" => "rgb(238,238,238)",
                "settingsMenuItemValueTextColor" => "rgb(153,153,153)",

                "subtitleTextColor" => "rgb(255,255,255)",
                "subtitleTextBgColor" => "rgb(0,0,0,0.3)",

                "customContextMenuBorderTopColor" => "rgb(102,102,102)",
                "customContextMenuTextColor" => "rgb(238,238,238)",
                "customContextMenuLinkBgColor" => "rgb(158,158,158)",
                "customContextMenuLinkTextColor" => "rgb(229,229,229)",

                "passwordHolderBgColor" => "rgba(0,0,0,0.7)",
                "passwordFieldBorderColor" => "rgba(51,51,51,0)",
                "passwordFieldBgColor" => "rgb(35,35,35)",
                "passwordFieldTextColor" => "rgb(255,255,255)",
                "passwordFieldTitleColor" => "rgb(204,204,204)",

                "tooltipBgColor" => "rgb(53,59,73)",
                "tooltipTextColor" => "rgb(255,255,255)",
                "preloaderColor" => "rgb(238,238,238)",

                "playerTitleTextColor" => "rgb(225,225,225)",
                "playerDescTextColor" => "rgb(187,187,187)",


                "playlistBgColor" => "rgb(53,59,73)",

                "playlistTitleTextColor" => "rgba(255,255,255)",
                "playlistDateTextColor" => "rgb(187,187,187)",
                "playlistDescTextColor" => "rgb(153,153,153)",

                "loadMoreBtnBgColor" => "rgb(53,59,73)",
                "loadMoreBtnTextColor" => "rgb(238,238,238)",
                "loadMoreBtnHoverBgColor" => "rgb(53,59,73)",
                "loadMoreBtnHoverTextColor" => "rgb(225,225,225)",

                "upNextTextColor" => "rgb(238,238,238)",
                "upNextHoverTextColor" => "rgb(225,225,225)",

                "chapterIndicatorColor" => "rgb(255,255,0)",
                "chapterHighlightColor" => "rgba(255,255,255,0.8)",
                "chapterTitleTextColor" => "rgb(225,225,225)",

                "adSkipMsgTextColor" => "rgb(238,238,238)",
                "adSkipMsgHoverTextColor" => "rgb(255,255,255)",

                "playlistDescriptionBgColor" => "rgb(53,59,73)",

                "playlistItemGdbtBgColor" => "rgb(53,59,73)",
                "playlistItemGdbtDrotSelectedBgColor" => "rgb(215,230,235)",

                //search
                "searchFilterTextColor" => "rgb(153,153,153)",  
                "searchFilterBgColor" => "rgb(215,230,235)",  



                //controls

                "volumeUpIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 576 512'><path d='M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zm233.32-51.08c-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 78.98-39.55 152.09-105.82 195.58-11.17 7.32-14.29 22.34-6.95 33.5 7.04 10.71 21.93 14.56 33.51 6.95C528.27 439.58 576 351.33 576 256S528.27 72.43 448.35 19.97zM480 256c0-63.53-32.06-121.94-85.77-156.24-11.19-7.14-26.03-3.82-33.12 7.46s-3.78 26.21 7.41 33.36C408.27 165.97 432 209.11 432 256s-23.73 90.03-63.48 115.42c-11.19 7.14-14.5 22.07-7.41 33.36 6.51 10.36 21.12 15.14 33.12 7.46C447.94 377.94 480 319.54 480 256zm-141.77-76.87c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 228.28 336 241.63 336 256c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.86z'></path></svg>",

                "volumeDownIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 384 512'><path d='M215.03 72.04L126.06 161H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V89.02c0-21.47-25.96-31.98-40.97-16.98zm123.2 108.08c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 229.28 336 242.62 336 257c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.87z'></path></svg>",

                "volumeOffIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 640 512'><path d='M633.82 458.1l-69-53.33C592.42 360.8 608 309.68 608 256c0-95.33-47.73-183.58-127.65-236.03-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 42.78-11.96 83.59-33.22 119.06l-38.12-29.46C503.49 318.68 512 288.06 512 256c0-63.09-32.06-122.09-85.77-156.16-11.19-7.09-26.03-3.8-33.12 7.41-7.09 11.2-3.78 26.03 7.41 33.13C440.27 165.59 464 209.44 464 256c0 21.21-5.03 41.57-14.2 59.88l-39.56-30.58c3.38-9.35 5.76-19.07 5.76-29.3 0-31.88-17.53-61.33-45.77-76.88-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61 11.76 6.46 19.12 18.18 20.4 31.06L288 190.82V88.02c0-21.46-25.96-31.98-40.97-16.97l-49.71 49.7L45.47 3.37C38.49-2.05 28.43-.8 23.01 6.18L3.37 31.45C-2.05 38.42-.8 48.47 6.18 53.9l588.36 454.73c6.98 5.43 17.03 4.17 22.46-2.81l19.64-25.27c5.41-6.97 4.16-17.02-2.82-22.45zM32 184v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V352.6L43.76 163.84C36.86 168.05 32 175.32 32 184z'></path></svg>",

                "fullscreenEnterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M448 344v112a23.94 23.94 0 0 1-24 24H312c-21.39 0-32.09-25.9-17-41l36.2-36.2L224 295.6 116.77 402.9 153 439c15.09 15.1 4.39 41-17 41H24a23.94 23.94 0 0 1-24-24V344c0-21.4 25.89-32.1 41-17l36.19 36.2L184.46 256 77.18 148.7 41 185c-15.1 15.1-41 4.4-41-17V56a23.94 23.94 0 0 1 24-24h112c21.39 0 32.09 25.9 17 41l-36.2 36.2L224 216.4l107.23-107.3L295 73c-15.09-15.1-4.39-41 17-41h112a23.94 23.94 0 0 1 24 24v112c0 21.4-25.89 32.1-41 17l-36.19-36.2L263.54 256l107.28 107.3L407 327.1c15.1-15.2 41-4.5 41 16.9z'></path></svg>",

                "fullscreenExitIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M200 288H88c-21.4 0-32.1 25.8-17 41l32.9 31-99.2 99.3c-6.2 6.2-6.2 16.4 0 22.6l25.4 25.4c6.2 6.2 16.4 6.2 22.6 0L152 408l31.1 33c15.1 15.1 40.9 4.4 40.9-17V312c0-13.3-10.7-24-24-24zm112-64h112c21.4 0 32.1-25.9 17-41l-33-31 99.3-99.3c6.2-6.2 6.2-16.4 0-22.6L481.9 4.7c-6.2-6.2-16.4-6.2-22.6 0L360 104l-31.1-33C313.8 55.9 288 66.6 288 88v112c0 13.3 10.7 24 24 24zm96 136l33-31.1c15.1-15.1 4.4-40.9-17-40.9H312c-13.3 0-24 10.7-24 24v112c0 21.4 25.9 32.1 41 17l31-32.9 99.3 99.3c6.2 6.2 16.4 6.2 22.6 0l25.4-25.4c6.2-6.2 6.2-16.4 0-22.6L408 360zM183 71.1L152 104 52.7 4.7c-6.2-6.2-16.4-6.2-22.6 0L4.7 30.1c-6.2 6.2-6.2 16.4 0 22.6L104 152l-33 31.1C55.9 198.2 66.6 224 88 224h112c13.3 0 24-10.7 24-24V88c0-21.3-25.9-32-41-16.9z'></path></svg>",

                "playlistToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z'></path></svg>",

                "videoInfoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z'></path></svg>",

                "shareToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M448 80v352c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h352c26.51 0 48 21.49 48 48zM304 296c-14.562 0-27.823 5.561-37.783 14.671l-67.958-40.775a56.339 56.339 0 0 0 0-27.793l67.958-40.775C276.177 210.439 289.438 216 304 216c30.928 0 56-25.072 56-56s-25.072-56-56-56-56 25.072-56 56c0 4.797.605 9.453 1.74 13.897l-67.958 40.775C171.823 205.561 158.562 200 144 200c-30.928 0-56 25.072-56 56s25.072 56 56 56c14.562 0 27.823-5.561 37.783-14.671l67.958 40.775a56.088 56.088 0 0 0-1.74 13.897c0 30.928 25.072 56 56 56s56-25.072 56-56C360 321.072 334.928 296 304 296z'></path></svg>",

                "embedToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z'></path></svg>",

                "downloadIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z'></path></svg>",

                "pipIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M464 0H144c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h320c26.51 0 48-21.49 48-48v-48h48c26.51 0 48-21.49 48-48V48c0-26.51-21.49-48-48-48zM362 464H54a6 6 0 0 1-6-6V150a6 6 0 0 1 6-6h42v224c0 26.51 21.49 48 48 48h224v42a6 6 0 0 1-6 6zm96-96H150a6 6 0 0 1-6-6V54a6 6 0 0 1 6-6h308a6 6 0 0 1 6 6v308a6 6 0 0 1-6 6z'></path></svg>",

                "prevVideoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M64 468V44c0-6.6 5.4-12 12-12h48c6.6 0 12 5.4 12 12v176.4l195.5-181C352.1 22.3 384 36.6 384 64v384c0 27.4-31.9 41.7-52.5 24.6L136 292.7V468c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12z'></path></svg>",

                "nextVideoIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M384 44v424c0 6.6-5.4 12-12 12h-48c-6.6 0-12-5.4-12-12V291.6l-195.5 181C95.9 489.7 64 475.4 64 448V64c0-27.4 31.9-41.7 52.5-24.6L312 219.3V44c0-6.6 5.4-12 12-12h48c6.6 0 12 5.4 12 12z'></path></svg>",

                "playIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 373.008 373.008'><path d='M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z'/></svg>",

                "pauseIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z'/></svg>",

                "rewindIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M255.545 8c-66.269.119-126.438 26.233-170.86 68.685L48.971 40.971C33.851 25.851 8 36.559 8 57.941V192c0 13.255 10.745 24 24 24h134.059c21.382 0 32.09-25.851 16.971-40.971l-41.75-41.75c30.864-28.899 70.801-44.907 113.23-45.273 92.398-.798 170.283 73.977 169.484 169.442C423.236 348.009 349.816 424 256 424c-41.127 0-79.997-14.678-110.63-41.556-4.743-4.161-11.906-3.908-16.368.553L89.34 422.659c-4.872 4.872-4.631 12.815.482 17.433C133.798 479.813 192.074 504 256 504c136.966 0 247.999-111.033 248-247.998C504.001 119.193 392.354 7.755 255.545 8z'></path></svg>",

                "skipBackwardIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2zm256 0l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2z'></path></svg>",

                "skipForwardIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M500.5 231.4l-192-160C287.9 54.3 256 68.6 256 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160c15.3-12.8 15.3-36.4 0-49.2zm-256 0l-192-160C31.9 54.3 0 68.6 0 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160c15.3-12.8 15.3-36.4 0-49.2z'></path></svg>",

                "vrIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 640 512'><path d='M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h160.22c25.19 0 48.03-14.77 58.36-37.74l27.74-61.64C286.21 331.08 302.35 320 320 320s33.79 11.08 41.68 28.62l27.74 61.64C399.75 433.23 422.6 448 447.78 448H608c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM160 304c-35.35 0-64-28.65-64-64s28.65-64 64-64 64 28.65 64 64-28.65 64-64 64zm320 0c-35.35 0-64-28.65-64-64s28.65-64 64-64 64 28.65 64 64-28.65 64-64 64z'></path></svg>",

                "ccToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM218.1 287.7c2.8-2.5 7.1-2.1 9.2.9l19.5 27.7c1.7 2.4 1.5 5.6-.5 7.7-53.6 56.8-172.8 32.1-172.8-67.9 0-97.3 121.7-119.5 172.5-70.1 2.1 2 2.5 3.2 1 5.7l-17.5 30.5c-1.9 3.1-6.2 4-9.1 1.7-40.8-32-94.6-14.9-94.6 31.2.1 48 51.1 70.5 92.3 32.6zm190.4 0c2.8-2.5 7.1-2.1 9.2.9l19.5 27.7c1.7 2.4 1.5 5.6-.5 7.7-53.5 56.9-172.7 32.1-172.7-67.9 0-97.3 121.7-119.5 172.5-70.1 2.1 2 2.5 3.2 1 5.7L420 222.2c-1.9 3.1-6.2 4-9.1 1.7-40.8-32-94.6-14.9-94.6 31.2 0 48 51 70.5 92.2 32.6z'></path></svg>",

                "transcriptIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 384 512'><path d='M224 0H0V512H384V160H224V0zm32 0V128H384L256 0zM112 256H272h16v32H272 112 96V256h16zm0 64H272h16v32H272 112 96V320h16zm0 64H272h16v32H272 112 96V384h16z'/></svg>",

                "settingsMenuIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z'></path></svg>",

                "prevChapterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 448 512'><path d='M34.5 239L228.9 44.7c9.4-9.4 24.6-9.4 33.9 0l22.7 22.7c9.4 9.4 9.4 24.5 0 33.9L131.5 256l154 154.7c9.3 9.4 9.3 24.5 0 33.9l-22.7 22.7c-9.4 9.4-24.6 9.4-33.9 0L34.5 273c-9.3-9.4-9.3-24.6 0-34zm192 34l194.3 194.3c9.4 9.4 24.6 9.4 33.9 0l22.7-22.7c9.4-9.4 9.4-24.5 0-33.9L323.5 256l154-154.7c9.3-9.4 9.3-24.5 0-33.9l-22.7-22.7c-9.4-9.4-24.6-9.4-33.9 0L226.5 239c-9.3 9.4-9.3 24.6 0 34z'></path></svg>",

                "nextChapterIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512' ><path d='M477.5 273L283.1 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.5 0-33.9l154-154.7-154-154.7c-9.3-9.4-9.3-24.5 0-33.9l22.7-22.7c9.4-9.4 24.6-9.4 33.9 0L477.5 239c9.3 9.4 9.3 24.6 0 34zm-192-34L91.1 44.7c-9.4-9.4-24.6-9.4-33.9 0L34.5 67.4c-9.4 9.4-9.4 24.5 0 33.9l154 154.7-154 154.7c-9.3 9.4-9.3 24.5 0 33.9l22.7 22.7c9.4 9.4 24.6 9.4 33.9 0L285.5 273c9.3-9.4 9.3-24.6 0-34z'></path></svg>",

                "chapterToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 512 512'><path d='M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12z'></path></svg>",

                "chapterShareIcon" => "<svg viewBox='0 0 512 512'><path d='M152 184h271.5l-127.2-109.8c-10.03-8.656-11.12-23.81-2.469-33.84c8.688-10.06 23.85-11.21 33.85-2.487l176 151.1C508.1 194.4 512 201 512 208c0 6.968-3.029 13.58-8.31 18.14l-176 151.1c-4.531 3.937-10.13 5.847-15.69 5.847c-6.719 0-13.41-2.812-18.16-8.312c-8.656-10.03-7.562-25.19 2.469-33.84l127.2-109.8H152c-57.34 0-104 46.65-104 103.1v119.1C48 469.3 37.25 480 24 480S0 469.3 0 456v-119.1C0 252.2 68.19 184 152 184z'/></svg>",

                "chapterRepeatIcon" => "<svg viewBox='0 0 512 512'><path d='M176 128h143.1l-.0065 56c0 9.703 5.846 18.45 14.82 22.17s19.28 1.656 26.16-5.203l80.01-80c9.373-9.371 9.373-24.57 0-33.94l-80.01-80c-6.877-6.859-17.19-8.922-26.16-5.203S319.1 14.3 319.1 24V80H176C78.95 80 0 158.1 0 256c0 13.25 10.75 24 24 24S48 269.3 48 256C48 185.4 105.4 128 176 128zM488 232c-13.25 0-24 10.75-24 24c0 70.59-57.42 128-128 128H192l.0114-56c0-9.703-5.846-18.45-14.82-22.17S157.9 304.2 151 311l-80.01 80c-9.373 9.371-9.373 24.57 0 33.94l80.01 80c6.877 6.859 17.19 8.922 26.16 5.203S192 497.7 192 488L192 432H336c97.05 0 176-78.97 176-176C512 242.8 501.3 232 488 232z'/></svg>",

                "theaterToggleIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 459 459'><path d='M408,51H51C22.95,51,0,73.95,0,102v255c0,28.05,22.95,51,51,51h357c28.05,0,51-22.95,51-51V102 C459,73.95,436.05,51,408,51z M408,357H51V102h357V357z'/></svg>",

                "castOffIcon" => "<svg height='17' viewBox='0 0 512 512'><path d='M447.8,64H64c-23.6,0-42.7,19.1-42.7,42.7v63.9H64v-63.9h383.8v298.6H298.6V448H448c23.6,0,42.7-19.1,42.7-42.7V106.7 C490.7,83.1,471.4,64,447.8,64z M21.3,383.6L21.3,383.6l0,63.9h63.9C85.2,412.2,56.6,383.6,21.3,383.6L21.3,383.6z M21.3,298.6V341 c58.9,0,106.6,48.1,106.6,107h42.7C170.7,365.6,103.7,298.7,21.3,298.6z M213.4,448h42.7c-0.5-129.5-105.3-234.3-234.8-234.6l0,42.4 C127.3,255.6,213.3,342,213.4,448z'></path></svg>",

                "castOnIcon" => "<svg viewBox='0 0 48 48'><path d='M0 0h48v48h-48z' fill='none' opacity='.1'/><path d='M0 0h48v48h-48z' fill='none'/><path d='M2 36v6h6c0-3.31-2.69-6-6-6zm0-8v4c5.52 0 10 4.48 10 10h4c0-7.73-6.27-14-14-14zm36-14h-28v3.27c7.92 2.56 14.17 8.81 16.73 16.73h11.27v-20zm-36 6v4c9.94 0 18 8.06 18 18h4c0-12.15-9.85-22-22-22zm40-14h-36c-2.21 0-4 1.79-4 4v6h4v-6h36v28h-14v4h14c2.21 0 4-1.79 4-4v-28c0-2.21-1.79-4-4-4z'/></svg>",

                "airplayIcon" => "<svg height='48' viewBox='0 0 48 48' width='48'><defs><path d='M0 0h48v48H0V0z' id='a'/></defs><defs><path d='M0 0h48v48H0V0z' id='c'/></defs><clipPath id='b'><use overflow='visible' xlink:href='#a'/></clipPath><clipPath clip-path='url(#b)' id='d'><use overflow='visible' xlink:href='#c'/></clipPath><path clip-path='url(#d)' d='M42 6H6c-2.2 0-4 1.8-4 4v24c0 2.2 1.8 4 4 4h8v-4H6V10h36v24h-8v4h8c2.2 0 4-1.8 4-4V10c0-2.2-1.8-4-4-4zM12 44h24L24 32z'/></svg>",

                "bigPlayIcon" => "<svg aria-hidden='true' focusable='false' role='img' viewBox='0 0 373.008 373.008' role='img' aria-label='Play'><path d='M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z'/></svg>",

                   
            ),

        );

    }

?>