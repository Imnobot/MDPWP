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
            "cors" => "https://cors-anywhere.herokuapp.com/",
            
            "delete_plugin_data_on_uninstall" => false,
            "js_to_footer" => false,
            "no_conflict" => false,
            "togglePlaybackOnMultipleInstances" => true,
            "overide_wp_video" => false,
            "overide_wp_video_skin" => "aviva",

            "createThumbFromVideo" => false,
            "createThumbFromVideoWidth" => 200,
            "createThumbFromVideoHeight" => 112,
            "createThumbFromVideoTime" => 0,

            "youtube_no_cookie" => false,
            "vimeo_no_cookie" => false,

            "add_font_awesome_css" => false,   
            "fontAwesomeCssUrl" => "https://use.fontawesome.com/releases/v5.7.2/css/all.css",  
  
        );

    }

    function mvp_playlist_options(){

        return array(

            //general
            "thumb" => "",

            //add more
            "addMoreOnTotalScroll" => false,
            "addMoreOnTotalScrollLimit" => 15,
            "sortOrder" => 'order_id',
            "sortDirection" => 'ASC',
            
            "encryptMediaPaths" => false,
            "isAdminRetrieved" => false,

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
            "lockVideoUserRoles" => array()

        );

    }

    function mvp_player_options(){

        return array(

            "presets" => array(
                'aviva' => 'aviva', 
                'pollux' => 'pollux', 
                'sirius' => 'sirius', 
                'flat' => 'flat', 
            ),

             //s3
            "s3UrlExpireTime" => "+15 seconds",
            "s3Region" => "us-east-1",
            "s3ThumbExtension" => "jpg",
            "getThumbFromBucket" => false,

            "playerClass" => "",
            "customClass" => "",
            "usePlayer" => true,

            "iframePlayerType" => array(
                'chromeless' => 'chromeless',
                'default' => 'default'
            ),
            "playerTypeArr" => array(    
                'normal' => 'normal',
                'lightbox' => 'lightbox',
            ),
            "playerType" => "normal",

            "selectorInit" => "",
            "playlistContent" => "",
            "addPlaylistEvents" => true,
            "addResizeEvent" => true,
            "addPlayerCss" => true,

            "useVideoTransform" => false,
            "saveTransformState" => false,

            "makePlaylistSelector" => false,
            "autoOpenPlaylistSelector" => false,
            "autoAdvanceToNextPlaylist" => false,
            "includePlaylistsIntoSelector" => "all",
            "playlistSelectorSelected" => "",

            "playlistPositionArr" => array(    
                "vrb" => "Vertical right and bottom",
                "hb" => "Horizontal bottom",
                "vb" => "Vertical bottom",
                "outer" => "Outer (below player, endless scroll)",
                "wall" => "Thumbnail grid with lightbox",
                "no-playlist" => "No playlist (use just player)"
            ),
            "playlistPosition" => "vrb",

            "navigationTypeArr" => array(    
                'scroll' => 'Scroll',
                'scroll-browser' => 'Default browser scroll',
                'buttons' => 'Buttons',
                'hover' => 'Mouse move',
            ),
            "navigationType" => "scroll",

            "playlistScrollTypeArr" => array(
                'mcustomscrollbar' => 'mCustomScrollbar',
                'perfect-scrollbar' => 'perfect-scrollbar',
            ),
            "playlistScrollType" => "perfect-scrollbar",
            "navigationStyleArr" => array(    
                'normal' => 'No spacing around thumbnails',
                'spaced' => 'Spacing around thumbnails'
            ),
            "navigationStyle" => "",

            "playlistScrollThemeArr" => array(
                'light' => 'light',
                'dark' => 'dark',
                'minimal' => 'minimal',
                'minimal-dark' => 'minimal-dark',
                'light-2' => 'light-2',
                'dark-2' => 'dark-2',
                'light-3' => 'light-3',
                'dark-3' => 'dark-3',
                'light-thick' => 'light-thick',
                'dark-thick' => 'dark-thick',
                'light-thin' => 'light-thin',
                'dark-thin' => 'dark-thin',
                'inset' => 'inset',
                'inset-dark' => 'inset-dark',
                'inset-2' => 'inset-2',
                'inset-2-dark' => 'inset-2-dark',
                'inset-3' => 'inset-3',
                'inset-3-dark' => 'inset-3-dark',
                'rounded' => 'rounded',
                'rounded-dark' => 'rounded-dark',
                'rounded-dots' => 'rounded-dots',
                'rounded-dots-dark' => 'rounded-dots-dark',
                '3d' => '3d',
                '3d-dark' => '3d-dark',
                '3d-thick' => '3d-thick',
                '3d-thick-dark' => '3d-thick-dark'
            ),
            "playlistScrollTheme" => "light",
            "playlistStyleArr" => array(    
                'drot' => 'Description right of thumbnail',
                'dot' => 'Description over thumbnail',
            ),
            "playlistStyle" => "drot",
            "playlistGridStyleArr" => array(    
                'gdot' => 'Description over thumbnail',
                'gdbt' => 'Description below thumbnail',
                'gdrot' => 'Description right of thumbnail',
            ),
            "playlistGridStyle" => "gdot",
            "gridTypeArr" => array(  
                'javascript' => 'Javascript grid',  
                'grid1' => 'CSS display grid',
                'grid2' => 'CSS column count',
                'masonry' => 'Masonry grid',
            ),
            "gridType" => 'javascript',
            "upNextTime" => "",
            "showVideoTitle" => false,

            "infoSkinArr" => array(    
                'info-dot' => 'Description over thumbnail',
                'info-dbt' => 'Description below thumbnail',
                'info-drot' => 'Description right of thumbnail',
            ),
            "infoSkin" => 'Description over thumbnail',

            "displayAllPlaylistsInPage" => false,

            "playlistItemContentArr" => array(   
                'thumb' => 'thumb', 
                'title' => 'title', 
                'description' => 'description',
                'date' => 'release date',
                'duration' => 'duration (seconds)'
            ),
            "playlistItemContent" => array("thumb","title","description"),
            "showLoadMore" => false,
            "showSearchField" => false,
            "playlistBottomHeight" => 300,
            "minimizeMaxWidth" => "70%",
            "wrapperMaxWidth" => "",
            "verticalBottomSepearator" => 700,
            "playlistSideWidth" => 320,

            "playerShadowArr" => array(   
                '' => 'No shadow', 
                'shadow-effect1' => 'Shadow effect 1',
                'shadow-effect2' => 'Shadow effect 2',
                'shadow-effect3' => 'Shadow effect 3',
                'shadow-effect4' => 'Shadow effect 4',
                'shadow-effect5' => 'Shadow effect 5',
                'shadow-effect6' => 'Shadow effect 6',
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

            //slideshow
            "slideshowDuration" => 10,
            "slideshowRandom" => false,
            "slideshowPauseWithAudio" => true,

            "offlineImage" => "",
            "offlineImageUrl" => "",
            "offlineImageUrlTarget" => "_blank",

            //preloader
            "usePlayerLoader" => true,
            "playerLoaderImgSrc" => "",
            "playerLoaderImgW" => "",
            "playerLoaderImgH" => "",
            
            "playerRatio" => "1.7777777",
            "combinePlayerRatio" => true,

            "useImaLoader" => true,
            "hideImaAdTimer" => false,
            "forceAdMutedOnIos" => true,

            "showControlsBeforeStart" => false,
            "rememberPlaybackPosition" => false,
            "playbackPositionKey" => "mvp-playback-position-",
            "resumeScreenHeader" => "You are watching&nbsp;",
            "resumeScreenContinue" => "Continue watching",
            "resumeScreenRestart" => "Restart from beginning",
            "showPrevNextVideoThumb" => true,
            "disableVideoSkip" => false,
            "disableSeekbar" => false,
            "disableSeekingPastWatchedPoint" => false,
            "minimizeOnScroll" => false,
            "minimizeOnScrollOnlyIfPlaying" => false,

            "minimizeClassArr" => array(    
                'mvp-minimize-bl' => 'Bottom left',
                'mvp-minimize-br' => 'Bottom right',
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
                'auto' => 'auto',
                'metadata' => 'metadata',
                'none' => 'none'
            ),
            "preload" => "auto",
            "randomPlay" => false,
            "loopingOn" => true,
            "mediaEndActionArr" => array(
                'next' => 'go to next media',
                'comingnext' => 'show coming next screen',
                'loop' => 'loop current media',
                'rewind' => 'rewind to beginning and stop',
                'poster' => 'show poster',
                'rel' => 'show related videos screen',
                'image' => 'show custom image',
                'custom' => 'show custom content'
            ),
            "mediaEndAction" => "next",

            "media_end_action_html" => "",
            "media_end_action_css" => "",

            "mediaEndImage" => "",
            "mediaEndImageUrl" => "",
            "mediaEndImageUrlTarget" => "_blank", 

            "playlistItemClickTrigger" => ".mvp-playlist-thumb",
            "playlistIconContainer" => ".mvp-playlist-info",

            "aspectRatioArr" => array(
                '1' => 'fit inside',
                '2' => 'fit outside (fill whole screen)',
                '0' => 'original (no size change)',
            ),
            "aspectRatio" => 1,
            "blockYoutubeEvents" => true,
            "youtubePlayerType" => "chromeless",
            "vimeoPlayerType" => "default",

            "useKeyboardNavigationForPlayback" => false,
            "useGlobalKeyboardControls" => false,
            "modifierKey" => "",

            "keyboardControlsArr" => array(   
                array('keycode' => 37, 'key' => 'left arrow', 'action' => 'seekBackward', 'action_display' => 'Seek backward'),
                array('keycode' => 39, 'key' => 'right arrow', 'action' => 'seekForward', 'action_display' => 'Seek forward'),
                array('keycode' => 32, 'key' => 'spacebar', 'action' => 'togglePlayback', 'action_display' => 'Toggle playback'),
                array('keycode' => 38, 'key' => 'up arrow', 'action' => 'volumeUp', 'action_display' => 'Volume up'),
                array('keycode' => 40, 'key' => 'volume down', 'action' => 'volumeDown', 'action_display' => 'Volume down'),
                array('keycode' => 77, 'key' => 'm', 'action' => 'toggleMute', 'action_display' => 'Toggle mute'),
                array('keycode' => 33, 'key' => 'page up', 'action' => 'nextMedia', 'action_display' => 'Next media'),
                array('keycode' => 34, 'key' => 'page down', 'action' => 'previousMedia', 'action_display' => 'Previous media'),
                array('keycode' => 82, 'key' => 'r', 'action' => 'rewind', 'action_display' => 'Rewind'),
                array('keycode' => 70, 'key' => 'f', 'action' => 'toggleFullscreen', 'action_display' => 'Toggle fullscreen'),
                array('keycode' => 84, 'key' => 't', 'action' => 'toggleTheater', 'action_display' => 'Toggle theater mode'),
                array('keycode' => 67, 'key' => 'c', 'action' => 'toggleSubtitle', 'action_display' => 'Toggle subtitle'),
                array('keycode' => 107, 'key' => '+', 'action' => 'subtitleSizeUp', 'action_display' => 'Subtitle size up'),
                array('keycode' => 109, 'key' => '-', 'action' => 'subtitleSizeDown', 'action_display' => 'Subtitle size down'),
            ),

            "keyboardControls" => array(
                array("keycode" => 37, "action" => "seekBackward", "disabled" => "0"),
                array("keycode" => 39, "action" => "seekForward", "disabled" => "0"),
                array("keycode" => 32, "action" => "togglePlayback", "disabled" => "0"),
                array("keycode" => 38, "action" => "volumeUp", "disabled" => "0"),
                array("keycode" => 40, "action" => "volumeDown", "disabled" => "0"),
                array("keycode" => 77, "action" => "toggleMute", "disabled" => "0"),
                array("keycode" => 33, "action" => "nextMedia", "disabled" => "0"),
                array("keycode" => 34, "action" => "previousMedia", "disabled" => "0"),
                array("keycode" => 82, "action" => "rewind", "disabled" => "0"),
                array("keycode" => 70, "action" => "toggleFullscreen", "disabled" => "0"),
                array("keycode" => 84, "action" => "toggleTheater", "disabled" => "0"),
                array("keycode" => 67, "action" => "toggleSubtitle", "disabled" => "0"),
                array("keycode" => 107, "action" => "subtitleSizeUp", "disabled" => "0"),
                array("keycode" => 109, "action" => "subtitleSizeDown", "disabled" => "0")
            ),

            "hideQualityMenuOnSingleQuality" => true,

            "vrInfo" => "",
            "enablePerspectiveWhenVrNotAvailable" => true,
            "autoRotatePanorama" => true,
            "autoRotateSpeed" => "0.5",

            "youtubePlayerColorArr" => array(
                'red' => 'red',
                'white' => 'white'
            ),
            "youtubePlayerColor" => "red",
            "vimeoPlayerColor" => "00adef",
            "useMobileNativePlayer" => false,
            "useSwipeNavigation" => false,
            "displayPosterOnMobile" => false,
            "rightClickContextMenuArr" => array(    
                'browser' => 'browser',
                'custom' => 'custom',
                'disabled' => 'disabled'
            ),
            "ageVerifyExpireTime" => 9999999,
            "rightClickContextMenu" => "custom",
            "encryptMediaPaths" => false,
            "seekTime" => 10,
            "seekToChapterStart" => true,
            "useChapterWindow" => false,
            "autoOpenChapterMenu" => true,
            "hideChapterMenuOnChapterSelect" => false,
            "useSingleVideoEmbed" => false,
            "hideEmbedFunctionWhenEmbeded" => true,
            "showChapterTitle" => true,
            "playlistOpened" => true,
            "hidePlaylistOnFullscreenEnter" => true,
            "limitDescriptionText" => 2,
            "clickOnBackgroundClosesLightbox" => true,
            "lightboxBorderSize" => 10,
            "playAdsOnlyOnce" => false,
            "showAnnotationsOnlyOnce" => false,
            "showStreamVideoBitrateMenu" => true,
            "showStreamAudioBitrateMenu" => true,
            "createAdMarkers" => true,
            "requirePosterFromFolder" => false,
            "requireThumbnailsFromFolder" => true,
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
            "useLightboxAdvanceButtons" => true,
            "useStatistics" => false,
            "percentToCountAsPlay" => "25",
            "useCache" => false,
            "cacheTime" => "",
            "displayWatchedPercentage" => false,
            "showPosterOnPause" => false,

            "adUpcomingMsgText" => "Ad will start in..",
            "showAdUpcomingMsg" => true,
            "adUpcomingMsgTime" => 5,
  
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
            "useAudioLanguage" => true,
            "useSubtitle" => true,
            "useTranscript" => false,
            "useChapterToggle" => true,
            "useCasting" => true,
            "useVolume" => true,
            "useVolumeSeekbar" => true,
            "usePlay" => true,
            "useNext" => false,
            "usePrevious" => false,
            "useRewind" => false,
            "useSkipBackward" => false,
            "useSkipForward" => false,
            "useDownload" => true,
            "usePlaylistToggle" => true,
            "useTheaterMode" => false,
            "useShare" => true,
            "useShareFacebook" => true,
            "useShareTwitter" => true,
            "useShareTumblr" => true,
            "useShareWhatsApp" => true,
            "useShareReddit" => true,
            "useShareDigg" => true,
            "useShareLinkedIn" => true,
            "useSharePinterest" => true,
            "useEmbed" => true,

            //restrict download
            "downloadVideoUserRoles" => array(),
            "restrictDownloadForLoggedInUser" => true,
            "restrictHeaderTitle" => "This content is restricted",
            "restrictDownloadForLoggedInUserMsg" => "You need to Log in or Register in order to download video.",

            "restrictLoginBtnText" => "Log in",
            "restrictLoginCancelBtnText" => "Cancel",
            "restrictForUserRoleBtnText" => "Subscribe",

            "restrictForUserRoleMsg" => "This content is restricted for your user role.",
            "restrictWatchForLoggedInUserMsg" => "You need to Log in or Register in order to view video.",

            "restrictDownloadUrl" => "#",
            "restrictDownloadUrlTarget" => "_self",
            "restrictWatchUrl" => "#",
            "restrictWatchUrlTarget" => "_self",

            //restrict ads
            "viewVideoWithoutAdsForLoggedInUser" => false,
            "viewVideoWithoutAdsUserRoles" => array(),

            //coming next
            "comingNextHeader" => "Coming Next",
            "comingNextCancelBtnText" => "CANCEL",
            "comingnextTime" => 10,

            //translation
            "tooltipTumblr" => "Share on Tumblr",
            "tooltipTwitter" => "Share on Twitter",
            "tooltipFacebook" => "Share on Facebook",
            "tooltipWhatsApp" => "Share On WhatsApp",
            "whatsAppWarning" => "Please share this content on mobile device!",
            "tooltipReddit" => "Share on Reddit",
            "tooltipDigg" => "Share on Digg",
            "tooltipLinkedIn" => "Share on LinkedIn",
            "tooltipPinterest" => "Share On Pinterest",
            "tooltipShare" => "Share",
            "tooltipClose" => "Close",
            "embedVideoText" => "Embed this video:",
            "copyVideoLinkText" => "Copy video link:",
            "copyEmbedCodeBtnText" => "Copy",
            "copiedEmbedCodeBtnText" => "Copied!",
            "tooltipEmbed" => "Embed",

            "ageVerifyHeader" => "Age Verification",
            "ageVerifyText" => "By clicking enter, I certify that I am over the age of 21 and will comply with this statement.",
            "ageVerifyEnterText" => "ENTER",
            "ageVerifyDividerText" => "or",
            "ageVerifyExitText" => "EXIT",

            "tooltipMoveLeft" => "Move left",
            "tooltipMoveRight" => "Move right",
            "tooltipMoveUp" => "Move up",
            "tooltipMoveDown" => "Move down",
            "tooltipZoomIn" => "Zoom in",
            "tooltipZoomOut" => "Zoom out",
            "tooltipRotateLeft" => "Rotate left",
            "tooltipRotateRight" => "Rotate right",
            "tooltipTransformReset" => "reset",

            "tooltipInfo" => "Info",
            "tooltipQuality" => "Quality",
            "tooltipPlaybackRate" => "Speed",
            "tooltipSubtitles" => "Subtitles",
            "tooltipPrevious" => "",
            "tooltipNext" => "",
            "tooltipRewind" => "Rewind",
            "tooltipSkipBackward" => "Skip backward",
            "tooltipSkipForward" => "Skip forward",
            "tooltipPip" => "Picture in picture",
            "tooltipCc" => "Subtitles",
            "tooltipAirPlay" => "AirPlay",
            "tooltipVr" => "Toggle VR mode",
            "tooltipVolume" => "Volume",
            "tooltipDownload" => "Download",
            "tooltipSettings" => "Settings",
            "tooltipFullscreenEnter" => "Fullscreen",
            "tooltipFullscreenExit" => "Exit Fullscreen",
            "tooltipAudioLanguage" => "Audio",
            "tooltipPlaylistToggle" => "Playlist",
            "tooltipTheaterMode" => "Theater mode",
            "castConnectingMsg" => "Connecting to Chromecast",
            "tooltipPlayOnTv" => "Play on TV",
            "tooltipStopPlayingOnTv" => "Stop playing on TV",
            "tooltipLightboxPrevious" => "Previous",
            "tooltipLightboxNext" => "Next",
            "chaptersMenuHeader" => "Chapters",
            "searchChaptersText" => "Search chapters",
            "tooltipPrevChapter" => "Previous chapter",
            "tooltipNextChapter" => "Next chapter",
            "tooltipChaptersMenu" => "Chapters",
            "subtitleOffText" => "Disabled",
            "privateContentTitle" => "This content is private",
            "privateContentConfirm" => "Submit",
            "privateContentInfo" => "Enter password to view",
            "privateContentPasswordError" => "Please enter valid password!",
            "customContextCopyVideoUrlText" => "Copy video url at current time",
            "loadMoreBtnText" => "Load more",
            "upNextText" => "Up Next",
            "upNextPreviousText" => "Previous",
            "adTitleText" => "Advertisement",
            "adSkipWaitText" => "You can skip ad in",
            "adSkipReadyText" => "SKIP AD &#62;",
            "searchText" => "Search...",
            "searchNothingFoundMsg" => "Nothing found",
            "searchDescriptionInPlaylist" => true,
            "liveStreamText" => "LIVE",
            "annotationCloseTooltip" => "Close",

            "searchTranscriptText" => "Search transcript",
            "tooltipTranscript" => "Transcript",
            "autoLoadTranscript" => false,

            //pagination
            "paginationPreviousBtnTitle" => "Previous",
            "paginationPreviousBtnText" => "Prev",
            "paginationNextBtnTitle" => "Next",
            "paginationNextBtnText" => "Next",

     

      
            //translation

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
            "unmuteBtnText" => "Enable volume",
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

            ),

            'pollux' => array(
            
                "elementsVisibilityArr" => array(
                    array(
                        'width' => 600,
                        'controls' => 'on',
                        'play' => 'on',
                        'next' => 'on',
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
                "seekbarProgressColor" => "rgb(222,83,98)",
                "seekbarProgressPointerColor" => "rgb(255,255,255)",

                "volumeBgColor" => "rgb(110,119,130)",
                "volumeLevelColor" => "rgb(222,83,98)",
                "volumeLevelPointerColor" => "rgb(255,255,255)",//individual

                "timeCurrentTextColor" => "rgb(204,204,204)",
                "timeTotalTextColor" => "rgb(102,102,102)",

                "shareItemHoverColor" => "rgb(222,83,98)",//individual

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


            ),

            'aviva' => array(
            
                "elementsVisibilityArr" => array(
                    array(
                        'width' => 600,
                        'controls' => 'on',
                        'play' => 'on',
                        'next' => 'on',
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

            ),

            'flat' => array(
            
                "elementsVisibilityArr" => array(
                    array(
                        'width' => 500,
                        'controls' => 'on',
                        'play' => 'on',
                        'next' => 'on',
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
                    ),
                ),

                //css

                "playerBgColor" => "rgb(17,17,17)",

                "iconColor" => "rgb(93,93,93)",
                "iconRolloverColor" => "rgb(216,0,115)",

                "bigPlayBgColor" => "rgba(255,255,255)",
                "bigPlayIconColor" => "rgb(93,93,93)",
                
                "themeBgColor" => "rgba(255,255,255)",

                "seekbarBgColor" => "rgb(93,93,93)",
                "seekbarLoadColor" => "rgb(237,237,237)",
                "seekbarProgressColor" => "rgb(216,0,115)",

                "volumeBgColor" => "rgb(93,93,93)",
                "volumeLevelColor" => "rgb(218,64,64)",

                "timeCurrentTextColor" => "rgb(93,93,93)",
                "timeTotalTextColor" => "rgb(93,93,93)",

                "settingsMenuHeaderBgColor" => "rgb(218,64,64)",
                "settingsMenuHeaderTextColor" => "rgb(255,255,255)",
                "settingsMenuItemActiveBgColor" => "rgb(218,64,64)",
                "settingsMenuItemActiveTextColor" => "rgb(255,255,255)",
                "settingsMenuItemTextColor" => "rgb(140,140,140)",
                "settingsMenuItemValueTextColor" => "rgb(221,221,221)",

                "subtitleTextColor" => "rgb(255,255,255)",
                "subtitleTextBgColor" => "rgb(0,0,0,0.3)",

                "customContextMenuBorderTopColor" => "rgb(214,214,214)",
                "customContextMenuTextColor" => "rgb(69,69,69)",
                "customContextMenuLinkBgColor" => "rgb(158,158,158)",
                "customContextMenuLinkTextColor" => "rgb(229,229,229)",

                "passwordHolderBgColor" => "rgba(0,0,0,0.7)",
                "passwordFieldBorderColor" => "rgb(51,51,51)",
                "passwordFieldBgColor" => "rgb(35,35,35)",
                "passwordFieldTextColor" => "rgb(255,255,255)",
                "passwordFieldTitleColor" => "rgb(93,93,93)",

                "tooltipBgColor" => "rgb(255,255,255)",
                "tooltipTextColor" => "rgb(85,85,85)",
                "preloaderColor" => "rgb(208,208,208)",

                "playerTitleTextColor" => "rgb(119,119,119)",
                "playerDescTextColor" => "rgb(187,187,187)",


                "playlistBgColor" => "rgb(255,255,255)",

                "playlistTitleTextColor" => "rgb(216,0,115)",
                "playlistDateTextColor" => "rgb(187,187,187)",
                "playlistDescTextColor" => "rgb(153,153,153)",

                "loadMoreBtnBgColor" => "rgb(255,255,255)",
                "loadMoreBtnTextColor" => "rgb(170,170,170)",
                "loadMoreBtnHoverBgColor" => "rgb(238,238,238)",
                "loadMoreBtnHoverTextColor" => "rgb(170,170,170)",

                "upNextTextColor" => "rgb(119,119,119)",
                "upNextHoverTextColor" => "rgb(153,153,153)",

                "chapterIndicatorColor" => "rgb(255,255,0)",
                "chapterHighlightColor" => "rgb(102,102,102)",
                "chapterTitleTextColor" => "rgb(102,102,102)",

                "adSkipMsgTextColor" => "rgb(119,119,119)",
                "adSkipMsgHoverTextColor" => "rgb(153,153,153)",

                "playlistDescriptionBgColor" => "rgba(255,255,255)",

                "playlistItemGdbtBgColor" => "rgba(255,255,255)",
                "playlistItemGdbtDrotSelectedBgColor" => "rgb(238,238,238)",

                //search
                "searchFilterTextColor" => "rgb(153,153,153)",  
                "searchFilterBgColor" => "rgb(93,93,93)",  

            )

        );

    }

?>