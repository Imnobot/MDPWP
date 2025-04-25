<?php 

$userRoles = mvp_get_editable_roles();

?>

<div id="mvp-general-tabs">

    <ul class="mvp-tab-header">
        <li id="mvp-tab-playback"><?php esc_html_e('Playback', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-general"><?php esc_html_e('General', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-media-end-action"><?php esc_html_e('Media end action', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-keyboard"><?php esc_html_e('Keyboard', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-playlist"><?php esc_html_e('Playlist', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-lightbox"><?php esc_html_e('Lightbox', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-caption"><?php esc_html_e('Subtitles', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-playbackRate"><?php esc_html_e('Playback rate', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-youtube"><?php esc_html_e('Youtube Player', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-vimeo"><?php esc_html_e('Vimeo Player', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-audio"><?php esc_html_e('Audio', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-s3"><?php esc_html_e('Amazon S3', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-vast"><?php esc_html_e('Vast', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-vr"><?php esc_html_e('Virtual reality', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-stream"><?php esc_html_e('Live streaming', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-advert"><?php esc_html_e('Adverts', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-logo"><?php esc_html_e('Logo', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-offline"><?php esc_html_e('Offline image', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-preloader"><?php esc_html_e('Preloader', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-contextmenu"><?php esc_html_e('Context menu', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-cast"><?php esc_html_e('Casting', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-chapter"><?php esc_html_e('Chapters', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-share"><?php esc_html_e('Social sharing', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-embed"><?php esc_html_e('Embed', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-transform"><?php esc_html_e('Video transform', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-age-verify"><?php esc_html_e('Age verify', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-ga"><?php esc_html_e('Google Analytics', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-stats"><?php esc_html_e('Statistics', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-folder"><?php esc_html_e('Folder playlist', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-minimize"><?php esc_html_e('Minimize on scroll', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-theater"><?php esc_html_e('Theater mode', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-restrict"><?php esc_html_e('Restrict content', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-restrict-ad"><?php esc_html_e('Restrict ads', MVP_TEXTDOMAIN); ?></li> 
        <li id="mvp-tab-playlist-icons"><?php esc_html_e('Playlist icons', MVP_TEXTDOMAIN); ?></li> 
    </ul>

    <div id="mvp-tab-playback-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Active media on player start', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="activeItem" value="<?php echo($options['activeItem']); ?>" required><br>
                    <span class="info"><?php esc_html_e('Enter number, counting starts from zero (-1 = no media loaded, 0 = first media, 1 = second media etc..). If you are using a Wall layout with lightbox, its advisable to set this to -1, so no video is loaded on start, only when user clicks on thumbnail, video will open in lightbox.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Default volume', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="volume" value="<?php echo($options['volume']); ?>" required><br>
                    <span class="info"><?php esc_html_e('Enter number between 0 and 1.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto play', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="autoPlay">
                        <option value="0" <?php if(isset($options['autoPlay']) && $options['autoPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['autoPlay']) && $options['autoPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Auto play media. This will mute video which is required for autoplay.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto play after first', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="autoPlayAfterFirst">
                        <option value="0" <?php if(isset($options['autoPlayAfterFirst']) && $options['autoPlayAfterFirst'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['autoPlayAfterFirst']) && $options['autoPlayAfterFirst'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Auto play media after first media has been manually started (user needs to click to start first video, other videos will play automatically).', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto play in viewport', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="autoPlayInViewport">
                        <option value="0" <?php if(isset($options['autoPlayInViewport']) && $options['autoPlayInViewport'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['autoPlayInViewport']) && $options['autoPlayInViewport'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Start playing media when player is visible on the page when user scrolls down the page.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Preload media attribute', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="preload">
                        <?php foreach ($options['preloadArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['preload']) && $options['preload'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="info"><?php esc_html_e('Valid for HTML5 video.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Random play', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="randomPlay">
                        <option value="0" <?php if(isset($options['randomPlay']) && $options['randomPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['randomPlay']) && $options['randomPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Randomize playback of videos in playlist.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Loop playlist on playlist end', MVP_TEXTDOMAIN); ?></th>
                <td>
                <select name="loopingOn">
                    <option value="0" <?php if(isset($options['loopingOn']) && $options['loopingOn'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                    <option value="1" <?php if(isset($options['loopingOn']) && $options['loopingOn'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                </select>
                <p class="info"><?php esc_html_e('Go to first video when last video in playlist finishes playing.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr>
                <th><?php esc_html_e('Display poster on mobile', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="displayPosterOnMobile">
                        <option value="0" <?php if(isset($options['displayPosterOnMobile']) && $options['displayPosterOnMobile'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['displayPosterOnMobile']) && $options['displayPosterOnMobile'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Display poster on mobile instead of playing video to preserve bandwidth. Note: each video in playlist needs to have poster defined for this to work.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Show poster on video pause', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="showPosterOnPause">
                        <option value="0" <?php if(isset($options['showPosterOnPause']) && $options['showPosterOnPause'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showPosterOnPause']) && $options['showPosterOnPause'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Show poster everytime video is paused. Video needs to have poster set for this to work.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>
            
            <tr valign="top">
                <th><?php esc_html_e('Coming next video screen', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" min="0" name="comingnextTime" value="<?php echo($options['comingnextTime']); ?>"><br>
                    <span class="info"><?php esc_html_e('How long is Coming next video screen shown before next video starts (in seconds).', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/comingnextTime.jpg' ?>"/></p></div>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Disable skiping video', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="disableVideoSkip">
                        <option value="0" <?php if(isset($options['disableVideoSkip']) && $options['disableVideoSkip'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['disableVideoSkip']) && $options['disableVideoSkip'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Disable user to skip video in any way (disable seekbar, previous, next buttons, click playlist item).', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Disable seeking through video', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="disableSeekbar">
                        <option value="0" <?php if(isset($options['disableSeekbar']) && $options['disableSeekbar'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['disableSeekbar']) && $options['disableSeekbar'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Disable user to seek through video.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Disable seeking past watched time', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="disableSeekingPastWatchedPoint">
                        <option value="0" <?php if(isset($options['disableSeekingPastWatchedPoint']) && $options['disableSeekingPastWatchedPoint'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['disableSeekingPastWatchedPoint']) && $options['disableSeekingPastWatchedPoint'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('This will prevent user from seeking into not yet watched part of the video.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Default skip time', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" min="0" name="seekTime" value="<?php echo($options['seekTime']); ?>"><br>
                    <span class="info"><?php esc_html_e('Default skip time value for skip backward / skip forward commands (seconds).', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Create advert markers in seekbar', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="createAdMarkers">
                        <option value="0" <?php if(isset($options['createAdMarkers']) && $options['createAdMarkers'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['createAdMarkers']) && $options['createAdMarkers'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Create markers for the mid-roll adverts in seekbar.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Play adverts only once per media', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="playAdsOnlyOnce">
                        <option value="0" <?php if(isset($options['playAdsOnlyOnce']) && $options['playAdsOnlyOnce'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['playAdsOnlyOnce']) && $options['playAdsOnlyOnce'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('If user seeks back in time, adverts that were already shown will not be shown again.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Show annotations only once per media', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="showAnnotationsOnlyOnce">
                        <option value="0" <?php if(isset($options['showAnnotationsOnlyOnce']) && $options['showAnnotationsOnlyOnce'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showAnnotationsOnlyOnce']) && $options['showAnnotationsOnlyOnce'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('If user seeks back in time, annotations that were closed will not be shown again.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Up Next screen', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" min="0" name="upNextTime" placeholder="<?php esc_attr_e('Enter seconds', MVP_TEXTDOMAIN); ?>" value="<?php echo($options['upNextTime']); ?>">
                    <br>
                    <span class="info"><?php esc_html_e('Time before "Up Next" thumbnail is shown for next playing media. For example, setting it to 20 will make it appear 20 seconds before current media ends. Leave empty to disable this feature.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/upNextTime.jpg' ?>"/></p></div>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Remember playback position', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select id="rememberPlaybackPosition" name="rememberPlaybackPosition">
                        <option value="0" <?php if(isset($options['rememberPlaybackPosition']) && $options['rememberPlaybackPosition'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['rememberPlaybackPosition']) && $options['rememberPlaybackPosition'] == "1") echo 'selected' ?>><?php esc_html_e('Remember only last video time', MVP_TEXTDOMAIN); ?></option>

                        <option value="all" <?php if(isset($options['rememberPlaybackPosition']) && $options['rememberPlaybackPosition'] == "all") echo 'selected' ?>><?php esc_html_e('Remember all video times', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Remember playback position and ask user to continue watching where left off or start from the beginning.', MVP_TEXTDOMAIN); ?></p><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/useResumeScreen.jpg' ?>"/></p></div>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Clear playback position', MVP_TEXTDOMAIN); ?></th>
                <td>
                    
                    <button type="button" id="clear_playback_position"><?php esc_html_e('Clear', MVP_TEXTDOMAIN); ?></button>

                    <p class="info"><?php esc_html_e('This will clear all video times for all playlists so no more videos will be resumed.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Pause video on dialog open', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select id="pauseVideoOnDialogOpen" name="pauseVideoOnDialogOpen">
                        <option value="0" <?php if(isset($options['pauseVideoOnDialogOpen']) && $options['pauseVideoOnDialogOpen'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['pauseVideoOnDialogOpen']) && $options['pauseVideoOnDialogOpen'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Pause video when share, embed, video info dialogs are opened above the video.', MVP_TEXTDOMAIN); ?>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-general-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th>Media aspect ratio</th>
                <td>
                    <select name="aspectRatio">
                        <?php foreach ($options['aspectRatioArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['aspectRatio']) && $options['aspectRatio'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <span class="info">Set default media resize option inside player (valid for self hosted media).<br>Fit inside will always show whole video, but may leave blank spaces around the video, depending on the resolution.<br>Fit outside will always cover the whole screen with video, leaving no blank spaces, but may cut part of the video, depending on the resolution.</span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use swipe navigation', MVP_TEXTDOMAIN); ?></th>
                <td> 
                    <select name="useSwipeNavigation">
                        <option value="0" <?php if(isset($options['useSwipeNavigation']) && $options['useSwipeNavigation'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useSwipeNavigation']) && $options['useSwipeNavigation'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Use swipe navigation on touch sensitive devices to move to next or previous media when swiping on player. Note: Works with self hosted audio, video and images, Youtube or Vimeo chromeless players. It does not work with 360 videos or images which require gesture control to move!', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>
            
            <tr valign="top">
                <th><?php esc_html_e('Use IOS native player', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useMobileNativePlayer">
                        <option value="0" <?php if(isset($options['useMobileNativePlayer']) && $options['useMobileNativePlayer'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useMobileNativePlayer']) && $options['useMobileNativePlayer'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Use native player on IOS. If this is true, you will loose ability to have video subtitles, annotations and some other options displayed above the video area on IOS.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Show next and previous video thumbnail', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="showPrevNextVideoThumb">
                        <option value="0" <?php if(isset($options['showPrevNextVideoThumb']) && $options['showPrevNextVideoThumb'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showPrevNextVideoThumb']) && $options['showPrevNextVideoThumb'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Show next and previous video thumbnail when hovering next and previous buttons.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/showPrevNextVideoThumb.jpg' ?>"/></p></div>

                </td>
            </tr>
               
        </table>

    </div>

    <div id="mvp-tab-media-end-action-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Media end action', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="mediaEndAction" id="mediaEndAction">
                        <?php foreach ($options['mediaEndActionArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['mediaEndAction']) && $options['mediaEndAction'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <p class="info"><?php esc_html_e('Action to apply when each media finishes playing.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

        </table>

        <table class="form-table" id="mvp-media-end-action-image-wrap">

            <tr valign="top">
                <th><?php esc_html_e('Custom image', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <img id="mediaEndImage_preview" class="mvp-img-preview" src="<?php echo (isset($options['mediaEndImage']) ? esc_html($options['mediaEndImage']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt="">
                    <input type="text" id="mediaEndImage" name="mediaEndImage" value="<?php echo($options['mediaEndImage']); ?>">  
                    <button type="button" id="mediaEndImage_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button> 
                    <button type="button" id="mediaEndImage_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>             
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Custom image url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="mediaEndImageUrl" value="<?php echo($options['mediaEndImageUrl']); ?>"><br>
                    <span class="info"><?php esc_html_e('Make image clickable by providing url link.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Custom image url target', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="mediaEndImageUrlTarget">
                        <?php foreach ($options['targetArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['mediaEndImageUrlTarget']) && $options['mediaEndImageUrlTarget'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

        </table>

        <div id="mvp-media-end-action-custom-wrap">
            <p><?php esc_html_e('Add HTML for custom end screen.', MVP_TEXTDOMAIN); ?></p>
            <textarea id="media_end_action_html"><?php echo(esc_textarea($media_end_action_html)); ?></textarea>

            <p><?php esc_html_e('Add CSS for custom end screen.', MVP_TEXTDOMAIN); ?></p>
            <textarea id="media_end_action_css"><?php echo(esc_textarea($media_end_action_css)); ?></textarea>
        </div>

    </div>        

    <div id="mvp-tab-lightbox-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Use lightbox next and previous buttons', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useLightboxAdvanceButtons">
                        <option value="0" <?php if(isset($options['useLightboxAdvanceButtons']) && $options['useLightboxAdvanceButtons'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useLightboxAdvanceButtons']) && $options['useLightboxAdvanceButtons'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Next and previous buttons in lightbox allow to advance video. If you have single video in player you can remove them.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Click on background closes lightbox', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="clickOnBackgroundClosesLightbox">
                        <option value="0" <?php if(isset($options['clickOnBackgroundClosesLightbox']) && $options['clickOnBackgroundClosesLightbox'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['clickOnBackgroundClosesLightbox']) && $options['clickOnBackgroundClosesLightbox'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('When player is opened in lightbox, click on background around the player closes ligthbox.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Lightbox border size [px]', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" name="lightboxBorderSize" value="<?php echo($options['lightboxBorderSize']); ?>">
                <br>
                <span class="info"><?php esc_html_e('Border around the lightbox.', MVP_TEXTDOMAIN); ?></span>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-caption-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top" id="caption_breakPoints_field">
                <th><?php esc_html_e('Captions font size breakpoints', MVP_TEXTDOMAIN); ?></th>
                <td>

                    <div class="mvp-caption-br-table-section">

                    <div id="mvp-caption-br-table-wrap" class="mvp-value-table-wrap"></div>

                    <button type="button" id="caption_breakPoint_add"><?php esc_html_e('Add breakpoint', MVP_TEXTDOMAIN); ?></button><br><br>

                    <table class="mvp-caption-br-table-orig" style="display:none;">
                      <thead>
                        <tr>
                          <th align="left"><?php esc_html_e('Player width', MVP_TEXTDOMAIN); ?></th>
                          <th align="left"><?php esc_html_e('Font size', MVP_TEXTDOMAIN); ?></th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr class="mvp-breakpoint">
                          <td><input class="caption-bp-width" name="caption_bp_width[]" type="number" min="0" value="" disabled/></td>
                          <td><input class="caption-bp-font-size" name="caption_bp_font_size[]" type="number" min="1" value="" disabled/></td>
                          <td><button type="button" class="caption_breakPoint_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button></td>
                        </tr>
                      </tbody>
                    </table>

                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Keep caption font size after manual resize', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="keepCaptionFontSizeAfterManualResize">
                        <option value="0" <?php if(isset($options['keepCaptionFontSizeAfterManualResize']) && $options['keepCaptionFontSizeAfterManualResize'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['keepCaptionFontSizeAfterManualResize']) && $options['keepCaptionFontSizeAfterManualResize'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Keep caption font size after manual resize using keyboard controls', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Remember last used subtitle', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="rememeberCaptionState">
                        <option value="0" <?php if(isset($options['rememeberCaptionState']) && $options['rememeberCaptionState'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['rememeberCaptionState']) && $options['rememeberCaptionState'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('For example, if your last used subtitle was English, everytime the player runs in page and goes to a different video English subtitle would be used.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto open transcript on video start', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="autoLoadTranscript">
                        <option value="0" <?php if(isset($options['autoLoadTranscript']) && $options['autoLoadTranscript'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['autoLoadTranscript']) && $options['autoLoadTranscript'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Auto open transcript window on video start (transcript window shows subtitles).', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-playbackRate-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top" id="playbackRate_field">
                <th><?php esc_html_e('Playback rate menu values', MVP_TEXTDOMAIN); ?></th>
                <td>

                    <div class="mvp-playbackRate-br-table-section">

                    <div id="mvp-playbackRate-br-table-wrap" class="mvp-value-table-wrap"></div>

                    <button type="button" id="playbackRate_add"><?php esc_html_e('Add playback rate', MVP_TEXTDOMAIN); ?></button><br><br>

                    <table class="mvp-playbackRate-br-table-orig" style="display:none;">
                      <thead>
                        <tr>
                          <th align="left"><?php esc_html_e('Value', MVP_TEXTDOMAIN); ?></th>
                          <th align="left"><?php esc_html_e('Menu title', MVP_TEXTDOMAIN); ?></th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr class="mvp-breakpoint">
                          <td><input class="playbackRate-value" name="playbackRate_value[]" type="number" min="0.25" max="4" value="" disabled/></td>
                          <td><input class="playbackRate-menu-title" name="playbackRate_menu_title[]" type="text" value="" disabled/></td>
                          <td><button type="button" class="playbackRate_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button></td>
                        </tr>
                      </tbody>
                    </table>

                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-keyboard-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Use keyboard navigation for playback', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useKeyboardNavigationForPlayback">
                        <option value="0" <?php if(isset($options['useKeyboardNavigationForPlayback']) && $options['useKeyboardNavigationForPlayback'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useKeyboardNavigationForPlayback']) && $options['useKeyboardNavigationForPlayback'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Use keyboard buttons to toggle player actions.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use global keyboard navigation.', MVP_TEXTDOMAIN); ?></th>
                <td>

                    <select name="useGlobalKeyboardControls">
                        <option value="0" <?php if(isset($options['useGlobalKeyboardControls']) && $options['useGlobalKeyboardControls'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useGlobalKeyboardControls']) && $options['useGlobalKeyboardControls'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('If true, keyboard controls are always active. Supports only single player per page. This method may interfere with other keyboard inputs on the page. Use with caution.', MVP_TEXTDOMAIN); ?></span>
               </td>
            </tr>

            <tr valign="top" id="mvp-keyboard-controls-field">
                <th><?php esc_html_e('Keyboard controls', MVP_TEXTDOMAIN); ?></th>
                <td id="mvp-keyboard-controls-field-inner">

                    <table class="mvp-value-table-wrap-orig">
                      <thead>
                        <tr>
                          <th align="left"><?php esc_html_e('Enter key here', MVP_TEXTDOMAIN); ?></th>
                          <th align="left"><?php esc_html_e('Key', MVP_TEXTDOMAIN); ?></th>
                          <th align="left"><?php esc_html_e('Action', MVP_TEXTDOMAIN); ?></th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr>
                          <td><input class="mvp-keyboard-key-enter" type="text" maxlength="1"></td>
                          <td><input class="mvp-keyboard-key" type="text" readonly></td>
                          <td><input class="mvp-keyboard-action-display" type="text" readonly></td>
                          <td><button type="button" class="keyboard-controls-toggle"><?php esc_html_e('Disable', MVP_TEXTDOMAIN); ?></button></td>


                          <input class="mvp-keyboard-keycode" type="hidden">
                          <input class="mvp-keyboard-action" type="hidden">
                        </tr>
                      </tbody>
                    </table>

                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Modifier key', MVP_TEXTDOMAIN); ?></th>
                <td>

                    <p><label><?php esc_html_e('Add modifier key (Shift, Alt, or Control) to be used as double keys so you can control with double press.', MVP_TEXTDOMAIN); ?></label></p>

                    <p><input id="noModifier" type="radio" name="modifierKey" value="" <?php if(isset($options['modifierKey']) && $options['modifierKey'] == "") echo 'checked' ?>><label for="noModifier"><?php esc_html_e('None', MVP_TEXTDOMAIN); ?></label></p>

                    <p><input id="shiftKey" type="radio" name="modifierKey" value="shiftKey" <?php if(isset($options['modifierKey']) && $options['modifierKey'] == "shiftKey") echo 'checked' ?>><label for="shiftKey">Shift</label></p>

                    <p><input id="ctrlKey" type="radio" name="modifierKey" value="ctrlKey" <?php if(isset($options['modifierKey']) && $options['modifierKey'] == "ctrlKey") echo 'checked' ?>><label for="ctrlKey">Control</label></p>

                    <p><input id="altKey" type="radio" name="modifierKey" value="altKey" <?php if(isset($options['modifierKey']) && $options['modifierKey'] == "altKey") echo 'checked' ?>><label for="altKey">Alt</label></p>

                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-playlist-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top" id="playlistOpened_field">
                <th><?php esc_html_e('Playlist opened on start', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="playlistOpened">
                        <option value="0" <?php if(isset($options['playlistOpened']) && $options['playlistOpened'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['playlistOpened']) && $options['playlistOpened'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Choose whether the playlist is visible on player start.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top" id="hidePlaylistOnFullscreenEnter_field">
                <th><?php esc_html_e('Hide playlist on fullscreen enter', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="hidePlaylistOnFullscreenEnter">
                        <option value="0" <?php if(isset($options['hidePlaylistOnFullscreenEnter']) && $options['hidePlaylistOnFullscreenEnter'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['hidePlaylistOnFullscreenEnter']) && $options['hidePlaylistOnFullscreenEnter'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Hide playlist (if opened) when player enters fullscreen.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Limit description text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" name="limitDescriptionText" value="<?php echo($options['limitDescriptionText']); ?>"><br>
                    <span class="info"><?php esc_html_e('Choose number of lines to show in playlist description. If there is more text to show, description will be stripped down to chosen number of lines. Set zero (0) for no limit.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/limitDescriptionText.jpg' ?>"/></p></div>

                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Display watched percentage in thumbnails', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="displayWatchedPercentage">
                        <option value="0" <?php if(isset($options['displayWatchedPercentage']) && $options['displayWatchedPercentage'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['displayWatchedPercentage']) && $options['displayWatchedPercentage'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Display video percentage played in thumbnails. Creates a red line in thumbnail representing how much of the video has been watched so far.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/displayWatchedPercentage.jpg' ?>"/></p></div>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-youtube-content" class="mvp-tab-content">

        <table class="form-table">
           
            <tr valign="top">
                <th><?php esc_html_e('Youtube player type', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="youtubePlayerType" id="youtubePlayerType">
                        <?php foreach ($options['iframePlayerType'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['youtubePlayerType']) && $options['youtubePlayerType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <span class="info"><?php esc_html_e('Youtube player type. Chromeless has custom controls.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top" class="youtubePlayerTypeDefault_field">
                <th><?php esc_html_e('Youtube player color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="youtubePlayerColor">
                        <?php foreach ($options['youtubePlayerColorArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['youtubePlayerColor']) && $options['youtubePlayerColor'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <span class="info"><?php esc_html_e('This parameter specifies the color that will be used in the players video progress bar to highlight the amount of the video that the viewer has already seen. (only for Youtube default player)', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Youtube preffered thumbnail size in playlist', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="youtubeThumbSize">
                        <?php foreach ($options['youtubeThumbSizeArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['youtubeThumbSize']) && $options['youtubeThumbSize'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </td>
            </tr>

            <tr valign="top" class="youtubePlayerTypeChromeless_field">
                <th><?php esc_html_e('Block Youtube right click', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="blockYoutubeEvents">
                        <option value="0" <?php if(isset($options['blockYoutubeEvents']) && $options['blockYoutubeEvents'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['blockYoutubeEvents']) && $options['blockYoutubeEvents'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Place transparent div over youtube iframe to disable right click over the player (only for Youtube chromeless player).', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>
            
           
        </table>

    </div>

    <div id="mvp-tab-vimeo-content" class="mvp-tab-content">

        <table class="form-table">
          
            <tr valign="top">
                <th><?php esc_html_e('Vimeo player type', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="vimeoPlayerType" id="vimeoPlayerType">
                        <?php foreach ($options['iframePlayerType'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['vimeoPlayerType']) && $options['vimeoPlayerType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <span class="info"><?php esc_html_e('Vimeo player type. Chromeless is only available for videos hosted by a Plus account or higher!', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top" class="vimeoPlayerTypeDefault_field">
                <th><?php esc_html_e('Vimeo player color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="vimeoPlayerColor" class="mvp-checkbox" value="<?php echo($options['vimeoPlayerColor']); ?>"><br>
                    <span class="info"><?php esc_html_e('Specify the color of the video controls.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Vimeo preffered thumbnail size in playlist', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="vimeoThumbSize">
                        <?php foreach ($options['vimeoThumbSizeArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['vimeoThumbSize']) && $options['vimeoThumbSize'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <span class="info"><?php esc_html_e('Note that Vimeo does not always respect those heights but widths are accurate.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-audio-content" class="mvp-tab-content">

        <p><?php esc_html_e('While audio plays there are several options to show in the player area. You can show single poster image, image slideshow or audio visualizer.', MVP_TEXTDOMAIN); ?></p>

        <h4><?php esc_html_e('Audio visualizer settings:', MVP_TEXTDOMAIN); ?></h4>

        <table class="form-table">
          
            <tr valign="top">
                <th><?php esc_html_e('Use audio visualizer', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useAudioEqualizer">
                        <option value="0" <?php if(isset($options['useAudioEqualizer']) && $options['useAudioEqualizer'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useAudioEqualizer']) && $options['useAudioEqualizer'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Audio visualizer as alternative to poster showing while audio plays. On IOS audio visualizer is not available.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>
           
        </table>

        <br><br>

        <h4><?php esc_html_e('Image slideshow settings:', MVP_TEXTDOMAIN); ?></h4>

        <table class="form-table">
          
            <tr valign="top">
                <th><?php esc_html_e('Slideshow duration (seconds)', MVP_TEXTDOMAIN); ?></th>
                <td>
                <input type="number" min="0" name="slideshowDuration" value="<?php echo($options['slideshowDuration']); ?>">
                    <p class="info"><?php esc_html_e('How long to show each image in slideshow.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Randomize slideshow images', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="slideshowRandom">
                        <option value="0" <?php if(isset($options['slideshowRandom']) && $options['slideshowRandom'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['slideshowRandom']) && $options['slideshowRandom'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Shuffle slideshow images', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Pause slideshow with audio', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="slideshowPauseWithAudio">
                        <option value="0" <?php if(isset($options['slideshowPauseWithAudio']) && $options['slideshowPauseWithAudio'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['slideshowPauseWithAudio']) && $options['slideshowPauseWithAudio'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Wheater to pause slideshow while audio is paused', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-s3-content" class="mvp-tab-content">

        <h4><?php esc_html_e('Settings when reading video files from Amazon S3:', MVP_TEXTDOMAIN); ?></h4>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('S3 URL expire time', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="s3UrlExpireTime" value="<?php echo($options['s3UrlExpireTime']); ?>">
                    <p class="info"><?php esc_html_e('The time at which the URL should expire. This can be a Unix timestamp, a PHP DateTime object, or a string that can be evaluated by strtotime(). Valid for both video and thumbnails!', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('AWS region', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="s3Region" value="<?php echo($options['s3Region']); ?>">
                    <p class="info"><?php esc_html_e('Add region that bucket was created with.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Read image thumbnails from bucket', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="getThumbFromBucket">
                        <option value="0" <?php if(isset($options['getThumbFromBucket']) && $options['getThumbFromBucket'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['getThumbFromBucket']) && $options['getThumbFromBucket'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Use this to automatically fetch image thumbnails from a bucket. Requires CORS set on bucket. Your thumbnails in the bucket need to have the same name as video files!', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Thumb extension', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="s3ThumbExtension" value="<?php echo($options['s3ThumbExtension']); ?>">
                    <p class="info"><?php esc_html_e('Specify extension that thumbnails in the bucket will have (all thumbnails are expected to have the same extension).', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>
       
        </table>

    </div>

    <div id="mvp-tab-vast-content" class="mvp-tab-content">

        <h4><?php esc_html_e('Settings for loading VAST (VAST / VMAP / IMA)', MVP_TEXTDOMAIN); ?></h4>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Use IMA SDK loader', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useImaLoader">
                        <option value="0" <?php if(isset($options['useImaLoader']) && $options['useImaLoader'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useImaLoader']) && $options['useImaLoader'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Use IMA SDK loader for loading vast files.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Force ad muted on IOS', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="forceAdMutedOnIos">
                        <option value="0" <?php if(isset($options['forceAdMutedOnIos']) && $options['forceAdMutedOnIos'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['forceAdMutedOnIos']) && $options['forceAdMutedOnIos'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('This is some fix for IOS (safari / chrome) to try to play vast video muted because playing it with sound may not work and vast will be automatically skipped. Recommended to set true.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Hide IMA ad timer', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="hideImaAdTimer">
                        <option value="0" <?php if(isset($options['hideImaAdTimer']) && $options['hideImaAdTimer'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['hideImaAdTimer']) && $options['hideImaAdTimer'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('This will hide IMA official ad loader time over vast video which sometimes can be visible on mobile.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>
       
        </table>

    </div>

    <div id="mvp-tab-vr-content" class="mvp-tab-content">

        <p><?php esc_html_e('Here are settings for 360 virtual reality video and image panorama.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('360 image/video indicator', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <img id="vrInfo_preview" class="mvp-img-preview" src="<?php echo (isset($options['vrInfo']) ? esc_html($options['vrInfo']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt="">
                    <input type="text" id="vrInfo" name="vrInfo" value="<?php echo($options['vrInfo']); ?>"> 
                    <button id="vrInfo_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button>
                    <button id="vrInfo_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button>       
                    <br><span class="info"><?php esc_html_e('Image which is shown over the player when 360 virtual reality video or image panorama starts to remind user this is 360 media and can be dragged around. Valid for self hosted media.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/vrInfo.jpg' ?>"/></p></div>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto rotate panorama images', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="autoRotatePanorama">
                        <option value="0" <?php if(isset($options['autoRotatePanorama']) && $options['autoRotatePanorama'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['autoRotatePanorama']) && $options['autoRotatePanorama'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Auto rotate panorama images (like rotating camera).', MVP_TEXTDOMAIN); ?></span>

                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto rotate panorama speed', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" id="autoRotateSpeed" name="autoRotateSpeed" value="<?php echo($options['autoRotateSpeed']); ?>">   
                    <p class="info"><?php esc_html_e('Speed of auto rotation. Positive number rotates in the left direction. If you want to rotate in the right direction enter negative number (-0.5)', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-stream-content" class="mvp-tab-content">

        <p><?php esc_html_e('Here are settings for live streaming in the player (hls, dash)', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">
          
            <tr valign="top">
                <th><?php esc_html_e('Show video quality menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="showStreamVideoBitrateMenu">
                        <option value="0" <?php if(isset($options['showStreamVideoBitrateMenu']) && $options['showStreamVideoBitrateMenu'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showStreamVideoBitrateMenu']) && $options['showStreamVideoBitrateMenu'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Show video bitrate menu for live streaming.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/showStreamAudioBitrateMenu.jpg' ?>"/></p></div>

                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Show audio quality menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="showStreamAudioBitrateMenu">
                        <option value="0" <?php if(isset($options['showStreamAudioBitrateMenu']) && $options['showStreamAudioBitrateMenu'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showStreamAudioBitrateMenu']) && $options['showStreamAudioBitrateMenu'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Show audio bitrate menu for live streaming.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/showStreamAudioBitrateMenu.jpg' ?>"/></p></div>
                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-advert-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Show Ad upcoming message for midroll adverts', MVP_TEXTDOMAIN); ?></th>
                <td>

                    <select name="showAdUpcomingMsg">
                        <option value="0" <?php if(isset($options['showAdUpcomingMsg']) && $options['showAdUpcomingMsg'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showAdUpcomingMsg']) && $options['showAdUpcomingMsg'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Show "Ad will start in... seconds" message while main video plays.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/showAdUpcomingMsg.jpg' ?>"/></p></div>
                </td>
            </tr>
          
            <tr valign="top">
                <th><?php esc_html_e('Ad upcoming message show time', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" id="adUpcomingMsgTime" name="adUpcomingMsgTime" value="<?php echo($options['adUpcomingMsgTime']); ?>">   
                    <p class="info"><?php esc_html_e('Time before midroll advert starts to show message (seconds)', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-logo-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Player logo image url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <img id="logo_preview" class="mvp-img-preview" src="<?php echo (isset($options['logoPath']) ? esc_html($options['logoPath']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt="">
                    <input type="text" id="logoPath" name="logoPath" value="<?php echo($options['logoPath']); ?>">  
                    <button type="button" id="logo_path_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button> 
                    <button type="button" id="logo_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>             
                    <span class="info"><?php esc_html_e('Show your logo above the video.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Logo url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="logoUrl" value="<?php echo($options['logoUrl']); ?>"><br>
                    <span class="info"><?php esc_html_e('Make logo clickable by providing url link.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Logo url target', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="logoTarget">
                        <?php foreach ($options['targetArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['logoTarget']) && $options['logoTarget'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Logo rel attribute', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="logoRel" value="<?php echo($options['logoRel']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-offline-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Offline image url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <img id="offlineImage_preview" class="mvp-img-preview" src="<?php echo (isset($options['offlineImage']) ? esc_html($options['offlineImage']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt="">
                    <input type="text" id="offlineImage" name="offlineImage" value="<?php echo($options['offlineImage']); ?>">  
                    <button type="button" id="offlineImage_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button> 
                    <button type="button" id="offlineImage_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>             
                    <span class="info"><?php esc_html_e('You can display image of choice over the player area when your stream is offline or in scenario when the player does not currently have any videos to play.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Offline image url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="offlineImageUrl" value="<?php echo($options['offlineImageUrl']); ?>"><br>
                    <span class="info"><?php esc_html_e('Make Offline image clickable by providing url link.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Offline image url target', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="offlineImageUrlTarget">
                        <?php foreach ($options['targetArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['offlineImageUrlTarget']) && $options['offlineImageUrlTarget'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-preloader-content" class="mvp-tab-content">

        <p><?php esc_html_e('Preloader shown over the player while video is loading. By default css spinner is shown, but you can upload your own image instead.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Use preloader above the player', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="usePlayerLoader">
                        <option value="0" <?php if(isset($options['usePlayerLoader']) && $options['usePlayerLoader'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['usePlayerLoader']) && $options['usePlayerLoader'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Preloader image url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <img id="playerLoaderImgSrc_preview" class="mvp-img-preview" src="<?php echo (isset($options['playerLoaderImgSrc']) ? esc_html($options['playerLoaderImgSrc']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt="">
                    <input type="text" id="playerLoaderImgSrc" name="playerLoaderImgSrc" value="<?php echo($options['playerLoaderImgSrc']); ?>">
                    <button type="button" id="playerLoaderImgSrc_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button> 
                    <button type="button" id="playerLoaderImgSrc_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>             
                </td>
            </tr>
          
            <input type="hidden" id="playerLoaderImgW" name="playerLoaderImgW" value="<?php echo($options['playerLoaderImgW']); ?>">
            <input type="hidden" id="playerLoaderImgH" name="playerLoaderImgH" value="<?php echo($options['playerLoaderImgH']); ?>">

        </table>

    </div>

    <div id="mvp-tab-contextmenu-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Right click context menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="rightClickContextMenu" id="rightClickContextMenu">
                        <?php foreach ($options['rightClickContextMenuArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['rightClickContextMenu']) && $options['rightClickContextMenu'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <span class="info"><?php esc_html_e('Use browser default context menu, custom or disable right click.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/rightClickContextMenu.jpg' ?>"/></p></div>

                </td>
            </tr>

            <tr valign="top" class="mvp_customContextMenu">
                <th><?php esc_html_e('Custom context menu Url link', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" id="customContextMenuLink" name="customContextMenuLink" value="<?php echo($options['customContextMenuLink']); ?>">
                    <br><span class="info"><?php esc_html_e('Set url link which will appear in context menu.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top" class="mvp_customContextMenu">
                <th><?php esc_html_e('Custom context menu Url link target', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="customContextMenuLinkTarget">
                        <?php foreach ($options['targetArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['customContextMenuLinkTarget']) && $options['customContextMenuLinkTarget'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><span class="info"><?php esc_html_e('Set url link target.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top" class="mvp_customContextMenu">
                <th><?php esc_html_e('Custom context menu Url title', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" id="customContextMenuLinkTitle" name="customContextMenuLinkTitle" value="<?php echo($options['customContextMenuLinkTitle']); ?>">
                    <br><span class="info"><?php esc_html_e('Set url link title.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-cast-content" class="mvp-tab-content">

        <p><?php esc_html_e('Casting with Chromecast subtitle settings', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Font sizing', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" min="0" name="tts_fontScale" value="<?php echo($options['tts_fontScale']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Subtitle foreground color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="tts_foregroundColor" class="mvp-checkbox" value="<?php echo($options['tts_foregroundColor']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Subtitle background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="tts_backgroundColor" class="mvp-checkbox" value="<?php echo($options['tts_backgroundColor']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Subtitle edge color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="tts_edgeColor" class="mvp-checkbox" value="<?php echo($options['tts_edgeColor']); ?>">
                </td>
            </tr> 

            <tr valign="top">
                <th><?php esc_html_e('Subtitle edge type', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="tts_edgeType">
                        <?php foreach ($options['edgeTypeArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['tts_edgeType']) && $options['tts_edgeType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Subtitle font style', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="tts_fontStyle">
                        <?php foreach ($options['fontStyleArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['tts_fontStyle']) && $options['tts_fontStyle'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>  

            <tr valign="top">
                <th><?php esc_html_e('Font family', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tts_fontFamily" value="<?php echo($options['tts_fontFamily']); ?>">
                    <br><span class="info"><?php esc_html_e('If Font family is not available in the receiver Generic font family will be used.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Generic font family', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="tts_fontGenericFamily">
                        <?php foreach ($options['fontGenericFamilyArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['tts_fontGenericFamily']) && $options['tts_fontGenericFamily'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-chapter-content" class="mvp-tab-content">

        <table class="form-table">
            <tr valign="top">
                <th><?php esc_html_e('Use chapter window', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useChapterWindow">
                        <option value="0" <?php if(isset($options['useChapterWindow']) && $options['useChapterWindow'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useChapterWindow']) && $options['useChapterWindow'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Chapters can either be shown in chapter menu (which opens above the player) or chapter window (which is shown above playlist). Default is chapter menu.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Seek to chapter start', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="seekToChapterStart">
                        <option value="0" <?php if(isset($options['seekToChapterStart']) && $options['seekToChapterStart'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['seekToChapterStart']) && $options['seekToChapterStart'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Setting to this to true will seek to chapter start when user clicks anywhere inside chapter area on the seekbar.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto open chapters menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="autoOpenChapterMenu">
                        <option value="0" <?php if(isset($options['autoOpenChapterMenu']) && $options['autoOpenChapterMenu'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['autoOpenChapterMenu']) && $options['autoOpenChapterMenu'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Auto open chapters menu on start if video has chapters.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Hide chapter menu on select chapter', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="hideChapterMenuOnChapterSelect">
                        <option value="0" <?php if(isset($options['hideChapterMenuOnChapterSelect']) && $options['hideChapterMenuOnChapterSelect'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['hideChapterMenuOnChapterSelect']) && $options['hideChapterMenuOnChapterSelect'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Hide chapter menu after we click on chapter menu item.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Show chapter title above video', MVP_TEXTDOMAIN); ?></th>
                <td> 
                    <select name="showChapterTitle">
                        <option value="0" <?php if(isset($options['showChapterTitle']) && $options['showChapterTitle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showChapterTitle']) && $options['showChapterTitle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Show controls before video start', MVP_TEXTDOMAIN); ?></th>
                <td> 
                    <select name="showControlsBeforeStart">
                        <option value="0" <?php if(isset($options['showControlsBeforeStart']) && $options['showControlsBeforeStart'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showControlsBeforeStart']) && $options['showControlsBeforeStart'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <p class="info"><?php esc_html_e('Show controls and chapter menu before video start (requires additional settings check help documentation).', MVP_TEXTDOMAIN); ?></p>

                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-share-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Use social sharing in player', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useShare" id="useShare">
                        <option value="0" <?php if(isset($options['useShare']) && $options['useShare'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useShare']) && $options['useShare'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top" class="mvp_share">
                <th><?php esc_html_e('Use Facebook share', MVP_TEXTDOMAIN); ?></th>     
                <td>
                    <select name="useShareFacebook">
                        <option value="0" <?php if(isset($options['useShareFacebook']) && $options['useShareFacebook'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useShareFacebook']) && $options['useShareFacebook'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" class="mvp_share">
                <th><?php esc_html_e('Use Twitter share', MVP_TEXTDOMAIN); ?></th>     
                <td>
                    <select name="useShareTwitter">
                        <option value="0" <?php if(isset($options['useShareTwitter']) && $options['useShareTwitter'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useShareTwitter']) && $options['useShareTwitter'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" class="mvp_share">
                <th><?php esc_html_e('Use Tumblr share', MVP_TEXTDOMAIN); ?></th>     
                <td>
                    <select name="useShareTumblr">
                        <option value="0" <?php if(isset($options['useShareTumblr']) && $options['useShareTumblr'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useShareTumblr']) && $options['useShareTumblr'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" class="mvp_share">
                <th><?php esc_html_e('Use WhatsApp share', MVP_TEXTDOMAIN); ?></th>     
                <td>
                    <select name="useShareWhatsApp">
                        <option value="0" <?php if(isset($options['useShareWhatsApp']) && $options['useShareWhatsApp'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useShareWhatsApp']) && $options['useShareWhatsApp'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" class="mvp_share">
                <th><?php esc_html_e('Use Reddit share', MVP_TEXTDOMAIN); ?></th>     
                <td>
                    <select name="useShareReddit">
                        <option value="0" <?php if(isset($options['useShareReddit']) && $options['useShareReddit'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useShareReddit']) && $options['useShareReddit'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" class="mvp_share">
                <th><?php esc_html_e('Use Digg share', MVP_TEXTDOMAIN); ?></th>     
                <td>
                    <select name="useShareDigg">
                        <option value="0" <?php if(isset($options['useShareDigg']) && $options['useShareDigg'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useShareDigg']) && $options['useShareDigg'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" class="mvp_share">
                <th><?php esc_html_e('Use LinkedIn share', MVP_TEXTDOMAIN); ?></th>     
                <td>
                    <select name="useShareLinkedIn">
                        <option value="0" <?php if(isset($options['useShareLinkedIn']) && $options['useShareLinkedIn'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useShareLinkedIn']) && $options['useShareLinkedIn'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" class="mvp_share">
                <th><?php esc_html_e('Use Pinterest share', MVP_TEXTDOMAIN); ?></th>     
                <td>
                    <select name="useSharePinterest">
                        <option value="0" <?php if(isset($options['useSharePinterest']) && $options['useSharePinterest'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useSharePinterest']) && $options['useSharePinterest'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>  

        </table>            

    </div>

    <div id="mvp-tab-embed-content" class="mvp-tab-content">

        <p><?php esc_html_e('Player embed code settings.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">
            
            <tr valign="top">
                <th><?php esc_html_e('Generate single video embed', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useSingleVideoEmbed">
                        <option value="0" <?php if(isset($options['useSingleVideoEmbed']) && $options['useSingleVideoEmbed'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useSingleVideoEmbed']) && $options['useSingleVideoEmbed'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('You can either generate embed code for a whole playlist or a single video.', MVP_TEXTDOMAIN); ?></p>

                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Hide embed functionality when video is embeded', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="hideEmbedFunctionWhenEmbeded">
                        <option value="0" <?php if(isset($options['hideEmbedFunctionWhenEmbeded']) && $options['hideEmbedFunctionWhenEmbeded'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['hideEmbedFunctionWhenEmbeded']) && $options['hideEmbedFunctionWhenEmbeded'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('You can choose wheater to hide embed button when player is already embeded in the page, since it cannot use embed from this location.', MVP_TEXTDOMAIN); ?></p>

                </td>
            </tr>

        </table>            

    </div>
    
    <div id="mvp-tab-transform-content" class="mvp-tab-content">

        <p><?php esc_html_e('Video transform settings.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">
            
            <tr valign="top">
                <th><?php esc_html_e('Use video transform', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useVideoTransform">
                        <option value="0" <?php if(isset($options['useVideoTransform']) && $options['useVideoTransform'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useVideoTransform']) && $options['useVideoTransform'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('This will add transform controls in the player area.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/transform.jpg' ?>"/></p></div>

                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Save transform state', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="saveTransformState">
                        <option value="0" <?php if(isset($options['saveTransformState']) && $options['saveTransformState'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['saveTransformState']) && $options['saveTransformState'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('This will save transform state after editing, so next time video will load with same transform settings.', MVP_TEXTDOMAIN); ?></p>

                </td>
            </tr>

        </table>            

    </div>

    <div id="mvp-tab-age-verify-content" class="mvp-tab-content">

        <p><?php esc_html_e('Age verification settings.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">
            
            <tr valign="top">
                <th><?php esc_html_e('Age verify expire time', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" min="0" name="ageVerifyExpireTime" value="<?php echo($options['ageVerifyExpireTime']); ?>">
                    <p class="info"><?php esc_html_e('Once user submits age verify screen, this is the time (in seconds) after age verify will expire and the screen will appear again on video. If you want this to never expire (meaning user will only submit this screen once) set this to very large number.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

        </table>            

    </div>

    <div id="mvp-tab-ga-content" class="mvp-tab-content">

        <p><?php esc_html_e('Activate Google Analytics in player so you can track player events inside Google Analytics dashboard.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">
            
            <tr valign="top">
                <th><?php esc_html_e('Use Google Analytics', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useGa">
                        <option value="0" <?php if(isset($options['useGa']) && $options['useGa'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useGa']) && $options['useGa'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Google Analytics tracking ID', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="gaTrackingId" value="<?php echo($options['gaTrackingId']); ?>">
                    <p class="info"><?php printf(__( 'Get tracking ID <a href="%s" target="_blank">here</a>', MVP_TEXTDOMAIN), esc_url( 'https://support.google.com/analytics/answer/1008080' ));?></p>

                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-folder-content" class="mvp-tab-content">

        <p><?php esc_html_e('Here are settings for when loading playlist from folder.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Require poster from folder', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="requirePosterFromFolder">
                        <option value="0" <?php if(isset($options['requirePosterFromFolder']) && $options['requirePosterFromFolder'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['requirePosterFromFolder']) && $options['requirePosterFromFolder'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('If true, player will assume you have poster images as per required folder organization when loading playlist from folder.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Require thumbnails from folder', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="requireThumbnailsFromFolder">
                        <option value="0" <?php if(isset($options['requireThumbnailsFromFolder']) && $options['requireThumbnailsFromFolder'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['requireThumbnailsFromFolder']) && $options['requireThumbnailsFromFolder'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('If true, player will assume you have thumbnail images as per required folder organization when loading playlist from folder.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-minimize-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Minimize on page scroll', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="minimizeOnScroll">
                        <option value="0" <?php if(isset($options['minimizeOnScroll']) && $options['minimizeOnScroll'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['minimizeOnScroll']) && $options['minimizeOnScroll'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Minimize player on page scroll when it gets out of visible area. Works will all player layouts except Outer and Grid wall with lightbox.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Minimize on page scroll only if playing', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="minimizeOnScrollOnlyIfPlaying">
                        <option value="0" <?php if(isset($options['minimizeOnScrollOnlyIfPlaying']) && $options['minimizeOnScrollOnlyIfPlaying'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['minimizeOnScrollOnlyIfPlaying']) && $options['minimizeOnScrollOnlyIfPlaying'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Minimize on page scroll when player gets out of visible area only if video is playing. Minimize on page scroll needs to be true as well for this to work.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Minimize on scroll position', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="minimizeClass">
                    <?php foreach ($options['minimizeClassArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['minimizeClass']) && $options['minimizeClass'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="info"><?php esc_html_e('Choose position to minimize the player to.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Hide playlist on minimize', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="hidePlaylistOnMinimize">
                        <option value="0" <?php if(isset($options['hidePlaylistOnMinimize']) && $options['hidePlaylistOnMinimize'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['hidePlaylistOnMinimize']) && $options['hidePlaylistOnMinimize'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Hide playlist when player is minimized.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Minimize player max width (px or %)', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="minimizeMaxWidth" value="<?php echo($options['minimizeMaxWidth']); ?>"><br>
                    <span class="info"><?php esc_html_e('Max width of the player when minimized. Enter value like 900px or 70%.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use minimize close button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useMinimizeCloseBtn">
                        <option value="0" <?php if(isset($options['useMinimizeCloseBtn']) && $options['useMinimizeCloseBtn'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useMinimizeCloseBtn']) && $options['useMinimizeCloseBtn'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Use button to close player when minimized.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

        </table>    

    </div>

    <div id="mvp-tab-theater-content" class="mvp-tab-content">

        <p><?php esc_html_e('Theater mode is available with all layouts except Grid wall with lightbox. You can restrict the width of the player in Player style / layout tab, and when theater mode is requested, player will become full width. Ideally if you have player in empty fullwidth container in your webpage, when theater mode is activated, you dont need to do anything. Otherwise if you have multi column layout or some kind of width restriction, margin or padding on the parent that holds the player, then you would need to make parent have fullwidth before theater mode happens. You can attach custom class to DOM selector when theater mode happens. When theater mode happens, your DOM selector will get custom class, and in there you can adjust parent to have full width available.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Theater element', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="theaterElement" value="<?php echo($options['theaterElement']); ?>"><br>
                    <span class="info"><?php esc_html_e('Add DOM selector which will get class attached when player enters theater mode (you can add multiple classes, for example: ".classA, .classB")', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Theater element class', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="theaterElementClass" value="<?php echo($options['theaterElementClass']); ?>"><br>
                    <span class="info"><?php esc_html_e('Add class which will be attached to DOM selector when player enters theater mode (for example: "foo")', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Focus video in theater', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="focusVideoInTheater">
                        <option value="0" <?php if(isset($options['focusVideoInTheater']) && $options['focusVideoInTheater'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['focusVideoInTheater']) && $options['focusVideoInTheater'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Scroll page to video top when theater mode is activated.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-restrict-content" class="mvp-tab-content">

        <p><?php esc_html_e('Restrict access from non logged in users or users with specific user roles. Set custom url to redirect user.', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Allow only logged in users to download video', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select id="restrictDownloadForLoggedInUser" name="restrictDownloadForLoggedInUser">
                        <option value="0" <?php if(isset($options['restrictDownloadForLoggedInUser']) && $options['restrictDownloadForLoggedInUser'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['restrictDownloadForLoggedInUser']) && $options['restrictDownloadForLoggedInUser'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Users who are not logged in will be presented with a message to login for download.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top" id="downloadVideoUserRoles-field">
                <th><?php esc_html_e('Select user role which is able to download video', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <div class="item-content-list">

                        <?php 

                        foreach ($userRoles as $key => $value) : ?>

                            <label class="container">
                                <input type="checkbox" name="downloadVideoUserRoles[]" value="<?php echo($key); ?>" <?php if(in_array($key, $options['downloadVideoUserRoles'])) echo 'checked' ?>><?php echo($value["name"]); ?>
                            </label>
                        <?php endforeach; ?>

                        <p class="info"><?php esc_html_e('Only selected user roles can download video. If no user roles are selected everybody can download video.', MVP_TEXTDOMAIN); ?></p>

                    </div>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict video download url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictDownloadUrl" value="<?php echo($options['restrictDownloadUrl']); ?>"><br>
                    <span class="info"><?php esc_html_e('Set custom url for restrict video download.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict video download url target', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="restrictDownloadUrlTarget">
                        <?php foreach ($options['targetArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['restrictDownloadUrlTarget']) && $options['restrictDownloadUrlTarget'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict video watch url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictWatchUrl" value="<?php echo($options['restrictWatchUrl']); ?>"><br>
                    <span class="info"><?php esc_html_e('Set custom url for restrict video watch.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict video watch url target', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="restrictWatchUrlTarget">
                        <?php foreach ($options['targetArr'] as $key => $value) : ?>
                            <option value="<?php echo($key); ?>" <?php if(isset($options['restrictWatchUrlTarget']) && $options['restrictWatchUrlTarget'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-restrict-ad-content" class="mvp-tab-content">

        <p><?php esc_html_e('Select which users can view video without ads (pre advert, mid advert, end advert).', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Allow only logged in users to view video without ads', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select id="viewVideoWithoutAdsForLoggedInUser" name="viewVideoWithoutAdsForLoggedInUser">
                        <option value="0" <?php if(isset($options['viewVideoWithoutAdsForLoggedInUser']) && $options['viewVideoWithoutAdsForLoggedInUser'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['viewVideoWithoutAdsForLoggedInUser']) && $options['viewVideoWithoutAdsForLoggedInUser'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Users who are not logged in will have ads playing.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top" id="viewVideoWithoutAdsUserRoles-field">
                <th><?php esc_html_e('Select user role which is able to view video without ads', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <div class="item-content-list">

                        <?php 
                        foreach ($userRoles as $key => $value) : ?>

                            <label class="container">
                                <input type="checkbox" name="viewVideoWithoutAdsUserRoles[]" value="<?php echo($key); ?>" <?php if(in_array($key, $options['viewVideoWithoutAdsUserRoles'])) echo 'checked' ?>><?php echo($value["name"]); ?>
                            </label>
                        <?php endforeach; ?>

                        <p class="info"><?php esc_html_e('Only selected user roles can view video without ads. If no user roles are selected everybody will have ads playing.', MVP_TEXTDOMAIN); ?></p>

                    </div>
                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-playlist-icons-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Playlist icon container', MVP_TEXTDOMAIN); ?></th>
                <td>
                    
                    <input type="text" name="playlistIconContainer" value="<?php echo($options['playlistIconContainer']); ?>">
                    <p class="info"><?php esc_html_e('Element to add playlist icons into.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Playlist icon click trigger', MVP_TEXTDOMAIN); ?></th>
                <td>
                    
                    <input type="text" name="playlistItemClickTrigger" value="<?php echo($options['playlistItemClickTrigger']); ?>">
                    <p class="info"><?php esc_html_e('What element triggers the click (to load new video).', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>
           
        </table>

    </div>

    <div id="mvp-tab-stats-content" class="mvp-tab-content">

        <p><?php esc_html_e('Statistics options', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Use video statistics', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useStatistics">
                        <option value="0" <?php if(isset($options['useStatistics']) && $options['useStatistics'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useStatistics']) && $options['useStatistics'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Count video plays and time played', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Percent listened to count as played', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="number" min="1" max="100" name="percentToCountAsPlay" value="<?php echo($options['percentToCountAsPlay']); ?>">
                    <p class="info"><?php esc_html_e('Set percentage of video that user needs to watch to be counted as played. 100 means full video. Default is 25. Note that user can skip video which may interfere with results. You can disable video skip in Player options.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

        </table>

    </div>    
            
</div>