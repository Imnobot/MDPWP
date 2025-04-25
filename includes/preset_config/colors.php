<div id="mvp-css-tabs">

    <ul class="mvp-tab-header">
        <li id="mvp-tab-css-general"><?php esc_html_e('General', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-player-controls"><?php esc_html_e('Player controls', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-right-click"><?php esc_html_e('Right click menu', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-upnext"><?php esc_html_e('Up next', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-chapter"><?php esc_html_e('Chapter', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-ad"><?php esc_html_e('Ad', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-subtitle"><?php esc_html_e('Subtitle', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-lightbox"><?php esc_html_e('Lightbox', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-playlist"><?php esc_html_e('Playlist', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-search"><?php esc_html_e('Search field', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-loadmore"><?php esc_html_e('Load more', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-unmute"><?php esc_html_e('Unmute', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-css-rel"><?php esc_html_e('Related videos', MVP_TEXTDOMAIN); ?></li>
    </ul>

    <div id="mvp-tab-css-general-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Theme background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="themeBgColor" class="mvp-checkbox" value="<?php echo($options['themeBgColor']); ?>">
                </td>
            </tr>   
            <tr valign="top">
                <th><?php esc_html_e('Player background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playerBgColor" class="mvp-checkbox" value="<?php echo($options['playerBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Player dialog background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="dialogBgColor" class="mvp-checkbox" value="<?php echo($options['dialogBgColor']); ?>">
                    <p class="info"><?php esc_html_e('Background color of social sharing, description, login, resume screen.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Player title text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playerTitleTextColor" class="mvp-checkbox" value="<?php echo($options['playerTitleTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Player description text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playerDescTextColor" class="mvp-checkbox" value="<?php echo($options['playerDescTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top" class="mvp-css-config-pollux">
                <th><?php esc_html_e('Share item hover color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="shareItemHoverColor" class="mvp-checkbox" value="<?php echo(isset($options['shareItemHoverColor'])?$options['shareItemHoverColor']:''); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="tooltipBgColor" class="mvp-checkbox" value="<?php echo($options['tooltipBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Tooltip text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="tooltipTextColor" class="mvp-checkbox" value="<?php echo($options['tooltipTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Preloader color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="preloaderColor" class="mvp-checkbox" value="<?php echo($options['preloaderColor']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-css-player-controls-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Icon color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="iconColor" class="mvp-checkbox" value="<?php echo($options['iconColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Icon hover color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="iconRolloverColor" class="mvp-checkbox" value="<?php echo($options['iconRolloverColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Big play background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="bigPlayBgColor" class="mvp-checkbox" value="<?php echo(isset($options['bigPlayBgColor'])?$options['bigPlayBgColor']:''); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Big play icon color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="bigPlayIconColor" class="mvp-checkbox" value="<?php echo($options['bigPlayIconColor']); ?>">
                </td>
            </tr>
            <tr valign="top" class="mvp-css-config-pollux">
                <th><?php esc_html_e('Playback controls background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playbackControlsBgColor" class="mvp-checkbox" value="<?php echo(isset($options['playbackControlsBgColor'])?$options['playbackControlsBgColor']:''); ?>">
                </td>
            </tr>
            
            <tr valign="top">
                <th><?php esc_html_e('Seekbar background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="seekbarBgColor" class="mvp-checkbox" value="<?php echo($options['seekbarBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Seekbar load color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="seekbarLoadColor" class="mvp-checkbox" value="<?php echo($options['seekbarLoadColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Seekbar progress color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="seekbarProgressColor" class="mvp-checkbox" value="<?php echo($options['seekbarProgressColor']); ?>">
                </td>
            </tr>
            <tr valign="top" class="mvp-css-config-pollux">
                <th><?php esc_html_e('Seekbar progress pointer color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="seekbarProgressPointerColor" class="mvp-checkbox" value="<?php echo(isset($options['seekbarProgressPointerColor'])?$options['seekbarProgressPointerColor']:''); ?>">
                </td>
            </tr>
            <tr valign="top" class="mvp-css-config-pollux">
                <th><?php esc_html_e('Top right controls background hover color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="topRightControlsBgHoverColor" class="mvp-checkbox" value="<?php echo(isset($options['topRightControlsBgHoverColor'])?$options['topRightControlsBgHoverColor']:''); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Volume background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="volumeBgColor" class="mvp-checkbox" value="<?php echo($options['volumeBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Volume level color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="volumeLevelColor" class="mvp-checkbox" value="<?php echo($options['volumeLevelColor']); ?>">
                </td>
            </tr>
            <tr valign="top" class="mvp-css-config-pollux">
                <th><?php esc_html_e('Volume level pointer color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="volumeLevelPointerColor" class="mvp-checkbox" value="<?php echo(isset($options['volumeLevelPointerColor'])?$options['volumeLevelPointerColor']:''); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Current time text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="timeCurrentTextColor" class="mvp-checkbox" value="<?php echo($options['timeCurrentTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Total time text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="timeTotalTextColor" class="mvp-checkbox" value="<?php echo($options['timeTotalTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Settings menu header background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="settingsMenuHeaderBgColor" class="mvp-checkbox" value="<?php echo($options['settingsMenuHeaderBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Settings menu header text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="settingsMenuHeaderTextColor" class="mvp-checkbox" value="<?php echo($options['settingsMenuHeaderTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Settings menu item active background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="settingsMenuItemActiveBgColor" class="mvp-checkbox" value="<?php echo($options['settingsMenuItemActiveBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Settings menu item active text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="settingsMenuItemActiveTextColor" class="mvp-checkbox" value="<?php echo($options['settingsMenuItemActiveTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Settings menu item text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="settingsMenuItemTextColor" class="mvp-checkbox" value="<?php echo($options['settingsMenuItemTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Settings menu item value text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="settingsMenuItemValueTextColor" class="mvp-checkbox" value="<?php echo($options['settingsMenuItemValueTextColor']); ?>">
                </td>
            </tr>
            
        </table>

    </div>

    <div id="mvp-tab-css-subtitle-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Subtitle text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="subtitleTextColor" class="mvp-checkbox" value="<?php echo($options['subtitleTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Subtitle text background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="subtitleTextBgColor" class="mvp-checkbox" value="<?php echo($options['subtitleTextBgColor']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-css-right-click-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Custom context menu Border Top color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="customContextMenuBorderTopColor" class="mvp-checkbox" value="<?php echo($options['customContextMenuBorderTopColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Custom context menu text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="customContextMenuTextColor" class="mvp-checkbox" value="<?php echo($options['customContextMenuTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Custom context menu Link background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="customContextMenuLinkBgColor" class="mvp-checkbox" value="<?php echo($options['customContextMenuLinkBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Custom context menu Link text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="customContextMenuLinkTextColor" class="mvp-checkbox" value="<?php echo($options['customContextMenuLinkTextColor']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-css-upnext-content" class="mvp-tab-content">

        <table class="form-table">
            
            <tr valign="top">
                <th><?php esc_html_e('Up next text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="upNextTextColor" class="mvp-checkbox" value="<?php echo($options['upNextTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Up next hover text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="upNextHoverTextColor" class="mvp-checkbox" value="<?php echo($options['upNextHoverTextColor']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-css-chapter-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Chapter indicator color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="chapterIndicatorColor" class="mvp-checkbox" value="<?php echo($options['chapterIndicatorColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Chapter highlight color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="chapterHighlightColor" class="mvp-checkbox" value="<?php echo($options['chapterHighlightColor']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-css-ad-content" class="mvp-tab-content">

        <table class="form-table">
            
            <tr valign="top">
                <th><?php esc_html_e('Ad seekbar background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="adSeekbarBgColor" class="mvp-checkbox" value="<?php echo($options['adSeekbarBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Ad seekbar progress color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="adSeekbarProgressColor" class="mvp-checkbox" value="<?php echo($options['adSeekbarProgressColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Ad info time remaining text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="adInfoTimeRemainingTextColor" class="mvp-checkbox" value="<?php echo($options['adInfoTimeRemainingTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Ad info time remaining background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="adInfoTimeRemainingBgColor" class="mvp-checkbox" value="<?php echo($options['adInfoTimeRemainingBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Ad indicator in seekbar color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="adIndicatorColor" class="mvp-checkbox" value="<?php echo($options['adIndicatorColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Ad skip message text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="adSkipMsgTextColor" class="mvp-checkbox" value="<?php echo($options['adSkipMsgTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Ad skip message text hover color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="adSkipMsgHoverTextColor" class="mvp-checkbox" value="<?php echo($options['adSkipMsgHoverTextColor']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-css-lightbox-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Lightbox border color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="lightboxBorderColor" class="mvp-checkbox" value="<?php echo($options['lightboxBorderColor']); ?>">
                </td>
            </tr>            
            <tr valign="top">
                <th><?php esc_html_e('Lightbox background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="lightboxBgColor" class="mvp-checkbox" value="<?php echo($options['lightboxBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Lightbox icon color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="lightboxIconColor" class="mvp-checkbox" value="<?php echo($options['lightboxIconColor']); ?>">
                </td>
            </tr>
            
        </table>

    </div>

    <div id="mvp-tab-css-playlist-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Playlist background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playlistBgColor" class="mvp-checkbox" value="<?php echo($options['playlistBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Playlist title text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playlistTitleTextColor" class="mvp-checkbox" value="<?php echo($options['playlistTitleTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Playlist date text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playlistDateTextColor" class="mvp-checkbox" value="<?php echo($options['playlistDateTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Playlist description text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playlistDescTextColor" class="mvp-checkbox" value="<?php echo($options['playlistDescTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Playlist description background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playlistDescriptionBgColor" class="mvp-checkbox" value="<?php echo($options['playlistDescriptionBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Playlist item grid description below thumbnail background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playlistItemGdbtBgColor" class="mvp-checkbox" value="<?php echo($options['playlistItemGdbtBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Playlist item grid description below thumbnail, description right of thumbnail selected background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="playlistItemGdbtDrotSelectedBgColor" class="mvp-checkbox" value="<?php echo($options['playlistItemGdbtDrotSelectedBgColor']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-css-loadmore-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Load more button background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="loadMoreBtnBgColor" class="mvp-checkbox" value="<?php echo($options['loadMoreBtnBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Load more button text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="loadMoreBtnTextColor" class="mvp-checkbox" value="<?php echo($options['loadMoreBtnTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Load more button hover background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="loadMoreBtnHoverBgColor" class="mvp-checkbox" value="<?php echo($options['loadMoreBtnHoverBgColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Load more button hover text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="loadMoreBtnHoverTextColor" class="mvp-checkbox" value="<?php echo($options['loadMoreBtnHoverTextColor']); ?>">
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-css-search-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Search filter text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="searchFilterTextColor" class="mvp-checkbox" value="<?php echo($options['searchFilterTextColor']); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th><?php esc_html_e('Search filter background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="searchFilterBgColor" class="mvp-checkbox" value="<?php echo($options['searchFilterBgColor']); ?>">
                </td>
            </tr>
            
        </table>

    </div>

    <div id="mvp-tab-css-unmute-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Unmute button text color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="unmuteBtnTextColor" class="mvp-checkbox" value="<?php echo($options['unmuteBtnTextColor']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Unmute button background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="unmuteBtnBgColor" class="mvp-checkbox" value="<?php echo($options['unmuteBtnBgColor']); ?>">
                </td>
            </tr>

        </table>

    </div> 

    <div id="mvp-tab-css-rel-content" class="mvp-tab-content">

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Related video screen background color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="relHolderBgColor" class="mvp-checkbox" value="<?php echo($options['relHolderBgColor']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Related video screen icon color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="relHolderIconColor" class="mvp-checkbox" value="<?php echo($options['relHolderIconColor']); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Related video screen icon hover color', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <input name="relHolderIconHoverColor" class="mvp-checkbox" value="<?php echo($options['relHolderIconHoverColor']); ?>">
                </td>
            </tr>

        </table>

    </div> 

</div>
