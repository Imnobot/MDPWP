<div id="mvp-translation-tabs">

    <ul class="mvp-tab-header">
        <li id="mvp-tab-translation-general"><?php esc_html_e('General', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-player-controls"><?php esc_html_e('Player controls', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-share"><?php esc_html_e('Social sharing', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-embed"><?php esc_html_e('Embed', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-transform"><?php esc_html_e('Video transform', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-age-verify"><?php esc_html_e('Age verify', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-right-click"><?php esc_html_e('Right click menu', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-keyboard"><?php esc_html_e('Keyboard', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-password"><?php esc_html_e('Password', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-lightbox"><?php esc_html_e('Lightbox', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-login"><?php esc_html_e('Login', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-resume"><?php esc_html_e('Resume screen', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-comingnext"><?php esc_html_e('Coming next', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-cast"><?php esc_html_e('Casting', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-chapters"><?php esc_html_e('Chapters', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-transcript"><?php esc_html_e('Transcript', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-advert"><?php esc_html_e('Adverts', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-video-sort"><?php esc_html_e('Video sort buttons', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-grid-pagination"><?php esc_html_e('Grid pagination', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-translation-favorites"><?php esc_html_e('Add to favorites', MVP_TEXTDOMAIN); ?></li>
    </ul>

    <div id="mvp-tab-translation-general-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Load More Button Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="loadMoreBtnText" value="<?php echo($options['loadMoreBtnText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Search field text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="searchText" value="<?php echo($options['searchText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Search field nothing found message', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="searchNothingFoundMsg" value="<?php echo($options['searchNothingFoundMsg']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Up Next Thumbnail Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="upNextText" value="<?php echo($options['upNextText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Up Previous Thumbnail Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="upNextPreviousText" value="<?php echo($options['upNextPreviousText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Subtitle Off Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="subtitleOffText" value="<?php echo($options['subtitleOffText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Ad skip ready text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="adSkipReadyText" value="<?php echo($options['adSkipReadyText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Unmute button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="unmuteBtnText" value="<?php echo($options['unmuteBtnText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip close dialog (share, info..)', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipClose" value="<?php echo($options['tooltipClose']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Live stream text (LIVE)', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="liveStreamText" value="<?php echo($options['liveStreamText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Live stream scheduled text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="upcomingLiveStreamText" value="<?php echo($options['upcomingLiveStreamText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Play count text after play count number in playlist items', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="playCountText" value="<?php echo($options['playCountText']); ?>"><br>
                </td>
            </tr>

            

        </table>

    </div>

    <div id="mvp-tab-translation-share-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On Tumblr', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipTumblr" value="<?php echo($options['tooltipTumblr']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On Twitter', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipTwitter" value="<?php echo($options['tooltipTwitter']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On Facebook', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipFacebook" value="<?php echo($options['tooltipFacebook']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On WhatsApp', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipWhatsApp" value="<?php echo($options['tooltipWhatsApp']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On Reddit', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipReddit" value="<?php echo($options['tooltipReddit']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On Digg', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipDigg" value="<?php echo($options['tooltipDigg']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On LinkedIn', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipLinkedIn" value="<?php echo($options['tooltipLinkedIn']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On Pinterest', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPinterest" value="<?php echo($options['tooltipPinterest']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On Email', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipEmail" value="<?php echo($options['tooltipEmail']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share On Sms', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipSms" value="<?php echo($options['tooltipSms']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Share', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipShare" value="<?php echo($options['tooltipShare']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-embed-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Tooltip embed', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipEmbed" value="<?php echo($options['tooltipEmbed']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Embed video text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="embedVideoText" value="<?php echo($options['embedVideoText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Copy video link text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="copyVideoLinkText" value="<?php echo($options['copyVideoLinkText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Copy embed code button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="copyEmbedCodeBtnText" value="<?php echo($options['copyEmbedCodeBtnText']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Copied embed code button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="copiedEmbedCodeBtnText" value="<?php echo($options['copiedEmbedCodeBtnText']);?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-transform-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Zoom to center button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipZoomCenter" value="<?php echo($options['tooltipZoomCenter']);?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Reset zoom button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipZoomReset" value="<?php echo($options['tooltipZoomReset']);?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Settings menu Zoom button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="settingsMenuZoomText" value="<?php echo($options['settingsMenuZoomText']);?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-age-verify-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Age verify header text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="ageVerifyHeader" value="<?php echo($options['ageVerifyHeader']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Age verify main text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="ageVerifyText" value="<?php echo($options['ageVerifyText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Age verify Enter button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="ageVerifyEnterText" value="<?php echo($options['ageVerifyEnterText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Age verify divider text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="ageVerifyDividerText" value="<?php echo($options['ageVerifyDividerText']);?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Age verify Exit button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="ageVerifyExitText" value="<?php echo($options['ageVerifyExitText']);?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-player-controls-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Play', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPlay" value="<?php echo($options['tooltipPlay']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Pause', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPause" value="<?php echo($options['tooltipPause']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Description Toggle', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipInfo" value="<?php echo($options['tooltipInfo']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Previous', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPrevious" value="<?php echo($options['tooltipPrevious']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Next', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipNext" value="<?php echo($options['tooltipNext']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Rewind', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipRewind" value="<?php echo($options['tooltipRewind']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Skip Backward', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipSkipBackward" value="<?php echo($options['tooltipSkipBackward']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Skip Forward', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipSkipForward" value="<?php echo($options['tooltipSkipForward']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Video Quality menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipQuality" value="<?php echo($options['tooltipQuality']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Playback Rate menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPlaybackRate" value="<?php echo($options['tooltipPlaybackRate']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Audio Language menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipAudioLanguage" value="<?php echo($options['tooltipAudioLanguage']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Volume', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipVolume" value="<?php echo($options['tooltipVolume']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Mute', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipMute" value="<?php echo($options['tooltipMute']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Captions menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipSubtitles" value="<?php echo($options['tooltipSubtitles']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip toggle captions', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipCc" value="<?php echo($options['tooltipCc']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip toggle virtual reality mode', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipVr" value="<?php echo($options['tooltipVr']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Download', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipDownload" value="<?php echo($options['tooltipDownload']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip settings menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipSettings" value="<?php echo($options['tooltipSettings']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip AirPlay', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipAirPlay" value="<?php echo($options['tooltipAirPlay']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Fullscreen Enter', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipFullscreenEnter" value="<?php echo($options['tooltipFullscreenEnter']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Fullscreen Exit', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipFullscreenExit" value="<?php echo($options['tooltipFullscreenExit']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Toggle Playlist', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPlaylistToggle" value="<?php echo($options['tooltipPlaylistToggle']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Theater mode', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipTheaterMode" value="<?php echo($options['tooltipTheaterMode']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Picture in picture', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPip" value="<?php echo($options['tooltipPip']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Seek', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipSeek" value="<?php echo($options['tooltipSeek']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Of text for seekbar (1:05 of 3:10)', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="ofText" value="<?php echo($options['ofText']); ?>"><br>
                </td>
            </tr>


     

        </table>

    </div>

    <div id="mvp-tab-translation-lightbox-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Lightbox Previous', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipLightboxPrevious" value="<?php echo($options['tooltipLightboxPrevious']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip Lightbox Next', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipLightboxNext" value="<?php echo($options['tooltipLightboxNext']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-keyboard-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Settings menu open keyboard dialog button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="keyboardInfoText" value="<?php echo($options['keyboardInfoText']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Keyboard dialog header text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="keyboardPreferencesText" value="<?php echo($options['keyboardPreferencesText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Close dialog (info, share..)', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_closeDialog" value="<?php echo($options['kb_closeDialog']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Seek backward', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_seekBackward" value="<?php echo($options['kb_seekBackward']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Seek forward', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_seekForward" value="<?php echo($options['kb_seekForward']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Toggle playback', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_togglePlayback" value="<?php echo($options['kb_togglePlayback']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Volume up', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_volumeUp" value="<?php echo($options['kb_volumeUp']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Volume down', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_volumeDown" value="<?php echo($options['kb_volumeDown']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Toggle mute', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_toggleMute" value="<?php echo($options['kb_toggleMute']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Next media', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_nextMedia" value="<?php echo($options['kb_nextMedia']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Previous media', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_previousMedia" value="<?php echo($options['kb_previousMedia']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Rewind', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_rewind" value="<?php echo($options['kb_rewind']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Toggle fullscreen', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_toggleFullscreen" value="<?php echo($options['kb_toggleFullscreen']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Toggle theater mode', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_toggleTheater" value="<?php echo($options['kb_toggleTheater']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Toggle subtitle', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_toggleSubtitle" value="<?php echo($options['kb_toggleSubtitle']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Subtitle size up', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_subtitleSizeUp" value="<?php echo($options['kb_subtitleSizeUp']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Subtitle size down', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="kb_subtitleSizeDown" value="<?php echo($options['kb_subtitleSizeDown']); ?>"><br>
                </td>
            </tr>
           
        </table>

    </div>


    <div id="mvp-tab-translation-password-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Password protected content title', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="privateContentTitle" value="<?php echo($options['privateContentTitle']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Password protected confirm button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="privateContentConfirm" value="<?php echo($options['privateContentConfirm']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Password protected content info', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="privateContentInfo" value="<?php echo($options['privateContentInfo']); ?>"><br>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Password protected content wrong password error message', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="privateContentPasswordError" value="<?php echo($options['privateContentPasswordError']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-right-click-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Custom context menu copy video url text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="customContextCopyVideoUrlText" value="<?php echo($options['customContextCopyVideoUrlText']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-login-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Restrict content header message', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictHeaderTitle" value="<?php echo($options['restrictHeaderTitle']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Login to download video message', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictDownloadForLoggedInUserMsg" value="<?php echo($options['restrictDownloadForLoggedInUserMsg']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Login to watch video message', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictWatchForLoggedInUserMsg" value="<?php echo($options['restrictWatchForLoggedInUserMsg']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict content for specific user role message', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictForUserRoleMsg" value="<?php echo($options['restrictForUserRoleMsg']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict content for specific user role message', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictForUserRoleMsg" value="<?php echo($options['restrictForUserRoleMsg']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict login button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictLoginBtnText" value="<?php echo($options['restrictLoginBtnText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict login cancel button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictLoginCancelBtnText" value="<?php echo($options['restrictLoginCancelBtnText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Restrict for user role button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="restrictForUserRoleBtnText" value="<?php echo($options['restrictForUserRoleBtnText']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-resume-content" class="mvp-tab-content">

        <p><?php esc_html_e('Resume playback position prompt - ask user to continue watching where left off or start from the beginning', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Resume screen header text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="resumeScreenHeader" value="<?php echo($options['resumeScreenHeader']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Resume screen continue text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="resumeScreenContinue" value="<?php echo($options['resumeScreenContinue']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Resume screen restart text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="resumeScreenRestart" value="<?php echo($options['resumeScreenRestart']); ?>"><br>
                </td>
            </tr>


        </table>

    </div>

    <div id="mvp-tab-translation-comingnext-content" class="mvp-tab-content">

        <p><?php esc_html_e('Coming next screen shown before next video', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Coming next header', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="comingNextHeader" value="<?php echo($options['comingNextHeader']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Coming next cancel button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="comingNextCancelBtnText" value="<?php echo($options['comingNextCancelBtnText']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-cast-content" class="mvp-tab-content">

        <p><?php esc_html_e('Casting with Chromecast', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Connecting to Chromecast message', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="castConnectingMsg" value="<?php echo($options['castConnectingMsg']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Play On Tv', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPlayOnTv" value="<?php echo($options['tooltipPlayOnTv']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Stop Playing On Tv', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipStopPlayingOnTv" value="<?php echo($options['tooltipStopPlayingOnTv']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-chapters-content" class="mvp-tab-content">

        <p><?php esc_html_e('Chapters menu', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Header above chapters menu', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="chaptersMenuHeader" value="<?php echo($options['chaptersMenuHeader']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip toggle chapters menu button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipChaptersMenu" value="<?php echo($options['tooltipChaptersMenu']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip previous chapter button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipPrevChapter" value="<?php echo($options['tooltipPrevChapter']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip next chapter button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipNextChapter" value="<?php echo($options['tooltipNextChapter']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Search chapters input placeholder', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="searchChaptersText" value="<?php echo($options['searchChaptersText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip Repeat chapter', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipRepeat" value="<?php echo($options['tooltipRepeat']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-transcript-content" class="mvp-tab-content">

        <p><?php esc_html_e('Transcript', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Search transcript input placeholder', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="searchTranscriptText" value="<?php echo($options['searchTranscriptText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Tooltip transcript', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="tooltipTranscript" value="<?php echo($options['tooltipTranscript']); ?>"><br>
                </td>
            </tr>
            
        </table>

    </div>

    <div id="mvp-tab-translation-advert-content" class="mvp-tab-content">

        <p><?php esc_html_e('Adverts', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Ad upcoming message text for midroll adverts', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="adUpcomingMsgText" value="<?php echo($options['adUpcomingMsgText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Advertisement text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="adTitleText" value="<?php echo($options['adTitleText']); ?>"><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Advertisement skip in text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="adSkipWaitText" value="<?php echo($options['adSkipWaitText']); ?>"><br>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-video-sort-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Sort by newest Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="sortNewestText" value="<?php echo($options['sortNewestText']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Sort by oldest Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="sortOldestText" value="<?php echo($options['sortOldestText']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Sort by popular Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="sortPopularText" value="<?php echo($options['sortPopularText']); ?>">
                </td>
            </tr>


        </table>

    </div>

    <div id="mvp-tab-translation-grid-pagination-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Pagination previous button Title', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="paginationPreviousBtnTitle" value="<?php echo($options['paginationPreviousBtnTitle']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Pagination previous button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="paginationPreviousBtnText" value="<?php echo($options['paginationPreviousBtnText']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Pagination next button Title', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="paginationNextBtnTitle" value="<?php echo($options['paginationNextBtnTitle']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Pagination next button text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="paginationNextBtnText" value="<?php echo($options['paginationNextBtnText']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-translation-favorites-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Add video to Favorites Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="addToFavoritesText" value="<?php echo($options['addToFavoritesText']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Remove video from Favorites Text', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input type="text" name="removeFromFavoritesText" value="<?php echo($options['removeFromFavoritesText']); ?>">
                </td>
            </tr>
          
        </table>

    </div>
    
</div>
