<div id="mvp-style-tabs">

    <ul class="mvp-tab-header">
        <li id="mvp-tab-layout"><?php esc_html_e('Layout', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-icons"><?php esc_html_e('Elements', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-ev"><?php esc_html_e('Breakpoints', MVP_TEXTDOMAIN); ?></li>
        <li id="mvp-tab-playlist-selector"><?php esc_html_e('Playlist selector', MVP_TEXTDOMAIN); ?></li>
    </ul>

    <div id="mvp-tab-layout-content" class="mvp-tab-content">

    <table class="form-table">

        <tr valign="top">
            <th><?php esc_html_e('Select layout', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select id="playlistPosition" name="playlistPosition">
                    <?php foreach ($options['playlistPositionArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['playlistPosition']) && $options['playlistPosition'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

        <tr valign="top">
            <th></th>
            <td>
                <img id="playlist-position-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="playlist position"/>
                <p class="info playlist-position-info" id="vrb-info"><?php esc_html_e('Vertical playlist on the right, on narrow screens playlist goes below the player.', MVP_TEXTDOMAIN); ?></p>
                <p class="info playlist-position-info" id="vb-info"><?php esc_html_e('Vertical playlist below the player.', MVP_TEXTDOMAIN); ?></p>
                <p class="info playlist-position-info" id="hb-info"><?php esc_html_e('Horizontal playlist below the player.', MVP_TEXTDOMAIN); ?></p>
                <p class="info playlist-position-info" id="outer-info"><?php esc_html_e('Playlist stacked below player, endless scroll.', MVP_TEXTDOMAIN); ?></p>
                <p class="info playlist-position-info" id="wall-info"><?php esc_html_e('Thumbnail grid with player opening as lightbox above it.', MVP_TEXTDOMAIN); ?></p>
                <p class="info playlist-position-info" id="no-playlist-info"><?php esc_html_e('Hide visible playlist (display only player).', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top" id="playerType_field">
            <th><?php esc_html_e('Select player type', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select name="playerType" id="playerType">
                    <?php foreach ($options['playerTypeArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['playerType']) && $options['playerType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="info"><?php esc_html_e('Use normal inline player or open player as lightbox.', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top" id="gridType_field">
            <th><?php esc_html_e('Choose grid type', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select name="gridType" id="gridType">
                    <?php foreach ($options['gridTypeArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['gridType']) && $options['gridType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="info"><?php esc_html_e('Javascript grid uses mathematical breakpoints for grid positioning. CSS grid use css for grid styling. Masonry grid is also available. If your images are different dimensions (different widths or heights) its advisable to try CSS column count or Masonry grid.', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top" id="breakPoints_field">
            <th><?php esc_html_e('Thumbnail grid breakpoints', MVP_TEXTDOMAIN); ?></th>
            <td>

                <div class="mvp-br-table-section">

                <div id="mvp-br-table-wrap" class="mvp-value-table-wrap"></div>

                <button type="button" id="breakPoint_add"><?php esc_html_e('Add breakpoint', MVP_TEXTDOMAIN); ?></button><br><br>

                <table class="mvp-br-table-orig" style="display:none;">
                  <thead>
                    <tr>
                      <th align="left"><?php esc_html_e('Player width', MVP_TEXTDOMAIN); ?></th>
                      <th align="left"><?php esc_html_e('Columns', MVP_TEXTDOMAIN); ?></th>
                      <th align="left"><?php esc_html_e('Gutter', MVP_TEXTDOMAIN); ?></th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr class="mvp-breakpoint">
                      <td><input class="bp-width" name="bp_width[]" type="number" min="0" value="" disabled/></td>
                      <td><input class="bp-column" name="bp_column[]" type="number" min="1" value="" disabled/></td>
                      <td><input class="bp-gutter" name="bp_gutter[]" type="number" min="0" value="" disabled/></td>
                      <td><button class="breakPoint_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button></td>
                    </tr>
                  </tbody>
                </table>

            </td>
        </tr>
        
        <tr valign="top" id="playlistStyle-field">
            <th><?php esc_html_e('Select playlist items style', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select id="playlistStyle" name="playlistStyle">
                    <?php foreach ($options['playlistStyleArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['playlistStyle']) && $options['playlistStyle'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

        <tr valign="top" id="playlistStyle-field2">
            <th></th>
            <td>
                <img id="playlist-style-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="playlist position"/>
                <p class="info playlist-style-info" id="desc-next-to-thumb-info"><?php esc_html_e('Description right of thumbnail.', MVP_TEXTDOMAIN); ?></p>
                <p class="info playlist-style-info" id="desc-over-thumb-info"><?php esc_html_e('Description over thumbnail.', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top" id="playlistGridStyle-field">
            <th><?php esc_html_e('Select playlist items style', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select id="playlistGridStyle" name="playlistGridStyle">
                    <?php foreach ($options['playlistGridStyleArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['playlistGridStyle']) && $options['playlistGridStyle'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

        <tr valign="top" id="playlistGridStyle-field2">
            <th></th>
            <td>
                <img id="playlist-grid-style-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="playlist position"/>
                <p class="info playlist-grid-style-info" id="grid-desc-over-thumb-info"><?php esc_html_e('Description over thumbnail.', MVP_TEXTDOMAIN); ?></p>
                <p class="info playlist-grid-style-info" id="grid-desc-below-thumb-info"><?php esc_html_e('Description below thumbnail.', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top" id="playlistItemContent-field">
            <th><?php esc_html_e('Select playlist item content', MVP_TEXTDOMAIN); ?></th>
            <td>
                <div class="item-content-list">

                    <?php foreach ($options['playlistItemContentArr'] as $key => $value) : ?>
                        <label class="container">
                            <input type="checkbox" name="playlistItemContent[]" value="<?php echo($key); ?>" <?php if(in_array($key, $options['playlistItemContent'])) echo 'checked' ?>><?php echo($value); ?>
                        </label>
                    <?php endforeach; ?>

                </div>
                <p><?php esc_html_e('Select content to show in playlist items.', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top" id="navigationType-field">
            <th><?php esc_html_e('Select playlist navigation type', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select id="navigationType" name="navigationType">
                    <?php foreach ($options['navigationTypeArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['navigationType']) && $options['navigationType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

         <tr valign="top" id="navigationStyle-field">
            <th><?php esc_html_e('Select navigation style', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select id="navigationStyle" name="navigationStyle">
                    <?php foreach ($options['navigationStyleArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['navigationStyle']) && $options['navigationStyle'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

        <tr valign="top" id="playlistScrollType-field">
            <th><?php esc_html_e('Choose scroll in playlist', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select name="playlistScrollType" id="playlistScrollType">
                    <?php foreach ($options['playlistScrollTypeArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['playlistScrollType']) && $options['playlistScrollType'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p><?php esc_html_e('Choose which playlist scroll to use.', MVP_TEXTDOMAIN); ?></p>
                
            </td>
        </tr>

        <tr valign="top" id="playlistScrollTheme-field">
            <th><?php esc_html_e('Select scroll theme', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select name="playlistScrollTheme">
                    <?php foreach ($options['playlistScrollThemeArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['playlistScrollTheme']) && $options['playlistScrollTheme'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="info"><?php printf(__( 'View scroll examples <a href="%s" target="_blank">here</a>', MVP_TEXTDOMAIN), esc_url( 'http://manos.malihu.gr/repository/custom-scrollbar/demo/examples/scrollbar_themes_demo.html' ));?></p>

            </td>
        </tr>

        <tr valign="top">
            <th><?php esc_html_e('Player ratio', MVP_TEXTDOMAIN); ?></th>
            <td>
                <input type="number" name="playerRatio" step="any" value="<?php echo($options['playerRatio']); ?>"><br>
                <span class="info"><?php esc_html_e('Aspect ratio of video area. Set video area ratio to fit your videos, for example 1.333333 = 4/3. Default is 16/9 (1.777777)', MVP_TEXTDOMAIN); ?></span>
            </td>
        </tr>

        <tr valign="top" id="combinePlayerRatio_field">
            <th><?php esc_html_e('Combine player ratio', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select name="combinePlayerRatio">
                    <option value="0" <?php if(isset($options['combinePlayerRatio']) && $options['combinePlayerRatio'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                    <option value="1" <?php if(isset($options['combinePlayerRatio']) && $options['combinePlayerRatio'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                </select><br>
                <span class="info"><?php esc_html_e('Valid for layouts when playlist is on the side. If true, when playlist is on the side and you open / close playlist, player height will grow / shrink to keep video ratio.', MVP_TEXTDOMAIN); ?></span>
            </td>
        </tr>
        
        <tr valign="top" id="wrapperMaxWidth_field">
            <th><?php esc_html_e('Restrict player width (px or %)', MVP_TEXTDOMAIN); ?></th>
            <td>
                <input type="text" name="wrapperMaxWidth" id="wrapperMaxWidth" value="<?php echo($options['wrapperMaxWidth']); ?>">
                <p class="info"><?php esc_html_e('Set player maximum width. Enter value like 900px or 70%.', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top" class="verticalBottomSepearator_field">
            <th><?php esc_html_e('Vertical bottom separator [px]', MVP_TEXTDOMAIN); ?></th>
            <td>
                <input type="number" name="verticalBottomSepearator" id="verticalBottomSepearator" min="0" value="<?php echo($options['verticalBottomSepearator']); ?>"><br>
                <span class="info"><?php esc_html_e('The limit for when vertical playlist on the right drops below player on narrow screens.', MVP_TEXTDOMAIN); ?></span>
            </td>
        </tr>

        <tr valign="top" class="verticalBottomSepearator_field">
            <th><?php esc_html_e('Playlist right width [px]', MVP_TEXTDOMAIN); ?></th>
            <td>
                <input type="number" name="playlistSideWidth" id="playlistSideWidth" min="0" value="<?php echo($options['playlistSideWidth']); ?>"><br>
                <span class="info"><?php esc_html_e('Width of the playlist on the right.', MVP_TEXTDOMAIN); ?></span>
            </td>
        </tr>

        <tr valign="top" id="playlistBottomHeight_field">
            <th><?php esc_html_e('Playlist bottom height [px]', MVP_TEXTDOMAIN); ?></th>
            <td>
                <input type="number" name="playlistBottomHeight" min="0" value="<?php echo($options['playlistBottomHeight']); ?>"><br>
                <span class="info"><?php esc_html_e('Height of the vertical playlist when its below the player.', MVP_TEXTDOMAIN); ?></span>
            </td>
        </tr>

        <tr valign="top" id="showSearchField_field">
            <th><?php esc_html_e('Use search field in playlist', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select name="showSearchField">
                    <option value="0" <?php if(isset($options['showSearchField']) && $options['showSearchField'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                    <option value="1" <?php if(isset($options['showSearchField']) && $options['showSearchField'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                </select><br>
                <span class="info"><?php esc_html_e('Show search field in the playlist to search for videos.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/showSearchField.jpg' ?>"/></p></div>
            </td>
        </tr>

        <tr valign="top" id="playerShadow_field">
            <th><?php esc_html_e('Select player shadow', MVP_TEXTDOMAIN); ?></th>
            <td>
                <select id="playerShadow" name="playerShadow">
                <?php foreach ($options['playerShadowArr'] as $key => $value) : ?>
                        <option value="<?php echo($key); ?>" <?php if(isset($options['playerShadow']) && $options['playerShadow'] == $key) echo 'selected' ?>><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="info"><?php esc_html_e('Select shadow effect below the player.', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th><?php esc_html_e('Additional classes', MVP_TEXTDOMAIN); ?></th>
            <td>
                <input type="text" name="customClass" value="<?php echo($options['customClass']); ?>">
                <p class="info"><?php esc_html_e('Add additional classes for the player (separated by space).', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr valign="top" id="selectorInit_field">
            <th><?php esc_html_e('DOM selector', MVP_TEXTDOMAIN); ?></th>
            <td>
                <input type="text" name="selectorInit" id="selectorInit" value="<?php echo($options['selectorInit']); ?>">
                <br>
                <span class="info"><?php esc_html_e('Specify DOM selector (ID, or classname, for example: "#my-div") if you want to open player on click. This is only required if player type is a lightbox, but you can also initiate a standard player by clicking on some element in your page (in this case player will be hidden until this element is clicked).', MVP_TEXTDOMAIN); ?></span>
            </td>
        </tr>

        <tr valign="top">
            <th><?php esc_html_e('Activate when parent visible selector', MVP_TEXTDOMAIN); ?></th>
            <td>

                <select name="activateWhenParentVisible">
                    <option value="0" <?php if(isset($options['activateWhenParentVisible']) && $options['activateWhenParentVisible'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                    <option value="1" <?php if(isset($options['activateWhenParentVisible']) && $options['activateWhenParentVisible'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                </select><br>

                <p class="info"><?php esc_html_e('If player is placed in some element which is hidden on page load (with CSS display none like a tab for example) then player might have an issue to resize itself correctly on start. Use this option so player can monitor when parent becomes visible so it can correctly resize itself.', MVP_TEXTDOMAIN); ?></p>
            </td>
        </tr>

    </table>

    </div>

    <div id="mvp-tab-icons-content" class="mvp-tab-content">

        <p class="info"><?php esc_html_e('Choose which elements to display in the player', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Use big play button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useBigPlay">
                        <option value="0" <?php if(isset($options['useBigPlay']) && $options['useBigPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useBigPlay']) && $options['useBigPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Show big play button in the center before media starts and when paused.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Big play image url', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <img id="bigPlayImgSrc_preview" class="mvp-img-preview" src="<?php echo (isset($options['bigPlayImgSrc']) ? esc_html($options['bigPlayImgSrc']) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D'); ?>" alt="">
                    <input type="text" id="bigPlayImgSrc" name="bigPlayImgSrc" value="<?php echo($options['bigPlayImgSrc']); ?>">
                    <button type="button" id="bigPlayImgSrc_upload"><?php esc_html_e('Upload', MVP_TEXTDOMAIN); ?></button> 
                    <button type="button" id="bigPlayImgSrc_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button><br>  
                    <span class="info"><?php esc_html_e('Upload your own big play image.', MVP_TEXTDOMAIN); ?></span>  

                    <input type="hidden" id="bigPlayImgW" name="bigPlayImgW" value="<?php echo($options['bigPlayImgW']); ?>">
                    <input type="hidden" id="bigPlayImgH" name="bigPlayImgH" value="<?php echo($options['bigPlayImgH']); ?>">         
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use seekbar', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useSeekbar">
                        <option value="0" <?php if(isset($options['useSeekbar']) && $options['useSeekbar'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useSeekbar']) && $options['useSeekbar'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use bottom seekbar (shown when main controls hide)', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useSoloSeekbar">
                        <option value="0" <?php if(isset($options['useSoloSeekbar']) && $options['useSoloSeekbar'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useSoloSeekbar']) && $options['useSoloSeekbar'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use play button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="usePlay">
                        <option value="0" <?php if(isset($options['usePlay']) && $options['usePlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['usePlay']) && $options['usePlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Use small play button.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use next video button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useNext">
                        <option value="0" <?php if(isset($options['useNext']) && $options['useNext'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useNext']) && $options['useNext'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use previous video button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="usePrevious">
                        <option value="0" <?php if(isset($options['usePrevious']) && $options['usePrevious'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['usePrevious']) && $options['usePrevious'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use rewind to beginning button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useRewind">
                        <option value="0" <?php if(isset($options['useRewind']) && $options['useRewind'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useRewind']) && $options['useRewind'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use skip backward button (x seconds)', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useSkipBackward">
                        <option value="0" <?php if(isset($options['useSkipBackward']) && $options['useSkipBackward'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useSkipBackward']) && $options['useSkipBackward'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use skip forward button (x seconds)', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useSkipForward">
                        <option value="0" <?php if(isset($options['useSkipForward']) && $options['useSkipForward'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useSkipForward']) && $options['useSkipForward'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use current and total time', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useTime">
                        <option value="0" <?php if(isset($options['useTime']) && $options['useTime'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useTime']) && $options['useTime'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use volume button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useVolume">
                        <option value="0" <?php if(isset($options['useVolume']) && $options['useVolume'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useVolume']) && $options['useVolume'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use unmute button', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="useUnmuteBtn">
                        <option value="0" <?php if(isset($options['useUnmuteBtn']) && $options['useUnmuteBtn'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useUnmuteBtn']) && $options['useUnmuteBtn'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Use unmute button to unmute the video. Button will be shown above the player if Auto play is true and video starts muted.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/useUnmuteBtn.jpg' ?>"/></p></div>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use download button', MVP_TEXTDOMAIN); ?></th>    
                <td>
                    <select name="useDownload">
                        <option value="0" <?php if(isset($options['useDownload']) && $options['useDownload'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useDownload']) && $options['useDownload'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Download button is automatically hidden is video does not have download url set.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use info button (video description)', MVP_TEXTDOMAIN); ?></th>          
                <td>
                    <select name="useInfo">
                        <option value="0" <?php if(isset($options['useInfo']) && $options['useInfo'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useInfo']) && $options['useInfo'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use embed button', MVP_TEXTDOMAIN); ?></th>          
                <td>
                    <select name="useEmbed">
                        <option value="0" <?php if(isset($options['useEmbed']) && $options['useEmbed'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useEmbed']) && $options['useEmbed'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Show video title about the player', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="showVideoTitle">
                        <option value="0" <?php if(isset($options['showVideoTitle']) && $options['showVideoTitle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['showVideoTitle']) && $options['showVideoTitle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use fullscreen button', MVP_TEXTDOMAIN); ?></th>   
                <td>
                    <select name="useFullscreen">
                        <option value="0" <?php if(isset($options['useFullscreen']) && $options['useFullscreen'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useFullscreen']) && $options['useFullscreen'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use picture in picture button', MVP_TEXTDOMAIN); ?></th>         
                <td>
                    <select name="usePip">
                        <option value="0" <?php if(isset($options['usePip']) && $options['usePip'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['usePip']) && $options['usePip'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use theater mode button', MVP_TEXTDOMAIN); ?></th>         
                <td>
                    <select name="useTheaterMode">
                        <option value="0" <?php if(isset($options['useTheaterMode']) && $options['useTheaterMode'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useTheaterMode']) && $options['useTheaterMode'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use Chromecast button for casting', MVP_TEXTDOMAIN); ?></th>   
                <td>
                    <select name="useCasting">
                        <option value="0" <?php if(isset($options['useCasting']) && $options['useCasting'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useCasting']) && $options['useCasting'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use playback rate menu', MVP_TEXTDOMAIN); ?></th>      
                <td>
                    <select name="usePlaybackRate">
                        <option value="0" <?php if(isset($options['usePlaybackRate']) && $options['usePlaybackRate'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['usePlaybackRate']) && $options['usePlaybackRate'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use video quality menu', MVP_TEXTDOMAIN); ?></th>      
                <td>
                    <select name="useQuality">
                        <option value="0" <?php if(isset($options['useQuality']) && $options['useQuality'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useQuality']) && $options['useQuality'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('This is for self hosted media. Youtube and Vimeo automatically choose best suitable quality on their side.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use captions menu (subtitles)', MVP_TEXTDOMAIN); ?></th>         
                <td>
                    <select name="useSubtitle">
                        <option value="0" <?php if(isset($options['useSubtitle']) && $options['useSubtitle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useSubtitle']) && $options['useSubtitle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use transcript window', MVP_TEXTDOMAIN); ?></th>         
                <td>
                    <select name="useTranscript">
                        <option value="0" <?php if(isset($options['useTranscript']) && $options['useTranscript'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useTranscript']) && $options['useTranscript'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use quick caption toggle button', MVP_TEXTDOMAIN); ?></th>         
                <td>
                    <select name="useCc">
                        <option value="0" <?php if(isset($options['useCc']) && $options['useCc'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useCc']) && $options['useCc'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Show button to toggle caption state on/off (remember last used subtitle).', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Use AirPlay button', MVP_TEXTDOMAIN); ?></th>         
                <td>
                    <select name="useAirPlay">
                        <option value="0" <?php if(isset($options['useAirPlay']) && $options['useAirPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['useAirPlay']) && $options['useAirPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" id="usePlaylistToggle-field">
                <th><?php esc_html_e('Use playlist toggle button', MVP_TEXTDOMAIN); ?></th>         
                <td>
                    <select name="usePlaylistToggle">
                        <option value="0" <?php if(isset($options['usePlaylistToggle']) && $options['usePlaylistToggle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['usePlaylistToggle']) && $options['usePlaylistToggle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                    <span class="info"><?php esc_html_e('Open / close playlist button.', MVP_TEXTDOMAIN); ?></span>
                </td>
            </tr>

        </table>

    </div>

    <div id="mvp-tab-ev-content" class="mvp-tab-content">

        <p class="info"><?php esc_html_e('Choose which elements to display on narrow screens.', MVP_TEXTDOMAIN); ?></p>

        <div id="mvp-ev-wrap"></div>

        <div class="option-tab ev-unit-wrap-orig" style="display:none;">
            <div class="option-toggle">
                <span class="option-title"></span>
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" ><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            </div>
            <div class="option-content">
              
                <p class="info"><?php esc_html_e('Set breakpoint width [px]:', MVP_TEXTDOMAIN); ?></p>
            
                <input class="ev_width ev-elem" name="" data-cname="width" type="number" min="0" value="">
             
                <p class="info"><?php esc_html_e('What elements to show when player is below that width:', MVP_TEXTDOMAIN); ?></p>

                <div class="ev-unit-list">

                    <label class="container">
                      <input type="checkbox" class="ev_next ev-elem" name="" data-cname="next"><?php esc_html_e('next', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_previous ev-elem" name="" data-cname="previous"><?php esc_html_e('previous', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_rewind ev-elem" name="" data-cname="rewind"><?php esc_html_e('rewind', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_skip_backward ev-elem" name="" data-cname="skip_backward"><?php esc_html_e('skip backward', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_skip_forward ev-elem" name="" data-cname="skip_forward"><?php esc_html_e('skip forward', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_play ev-elem" name="" data-cname="play"><?php esc_html_e('play', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_seekbar ev-elem" name="" data-cname="seekbar"><?php esc_html_e('seekbar', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_time ev-elem" name="" data-cname="time"><?php esc_html_e('time', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_volume ev-elem" name="" data-cname="volume"><?php esc_html_e('volume', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_download ev-elem" name="" data-cname="download"><?php esc_html_e('download', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_share ev-elem" name="" data-cname="share"><?php esc_html_e('share', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_info ev-elem" name="" data-cname="info"><?php esc_html_e('description (info button)', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_subtitles ev-elem" name="" data-cname="subtitles"><?php esc_html_e('captions', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_cc ev-elem" name="" data-cname="cc"><?php esc_html_e('caption toggle', MVP_TEXTDOMAIN); ?>
                    </label>
                     <label class="container">
                      <input type="checkbox" class="ev_chapter ev-elem" name="" data-cname="chapter"><?php esc_html_e('chapter menu toggle', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_playback_rate ev-elem" name="" data-cname="playback_rate"><?php esc_html_e('playback rate (speed)', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_quality ev-elem" name="" data-cname="quality"><?php esc_html_e('playback quality', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_audio_language ev-elem" name="" data-cname="audio_language"><?php esc_html_e('audio language (for live streaming)', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_fullscreen ev-elem" name="" data-cname="fullscreen"><?php esc_html_e('fullscreen', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_pip ev-elem" name="" data-cname="pip"><?php esc_html_e('picture in picture', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_theater ev-elem" name="" data-cname="theater"><?php esc_html_e('theater mode', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_playlist ev-elem" name="" data-cname="playlist"><?php esc_html_e('playlist button', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_annotations ev-elem" name="" data-cname="annotations"><?php esc_html_e('annotations', MVP_TEXTDOMAIN); ?>
                    </label>
                    <label class="container">
                      <input type="checkbox" class="ev_upnext ev-elem" name="" data-cname="upnext"><?php esc_html_e('upnext', MVP_TEXTDOMAIN); ?>
                    </label>

                </div>

                <button type="button" class="ev_breakPoint_remove"><?php esc_html_e('Remove breakpoint', MVP_TEXTDOMAIN); ?></button>

            </div>

        </div>

        <button type="button" id="ev_breakPoint_add"><?php esc_html_e('Add breakpoint', MVP_TEXTDOMAIN); ?></button><br><br>

    </div>

    <div id="mvp-tab-playlist-selector-content" class="mvp-tab-content">

        <p class="info"><?php esc_html_e('Options for playlist selector', MVP_TEXTDOMAIN); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th><?php esc_html_e('Create playlist selector', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="makePlaylistSelector">
                        <option value="0" <?php if(isset($options['makePlaylistSelector']) && $options['makePlaylistSelector'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['makePlaylistSelector']) && $options['makePlaylistSelector'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto open playlist selector on start', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="autoOpenPlaylistSelector">
                        <option value="0" <?php if(isset($options['autoOpenPlaylistSelector']) && $options['autoOpenPlaylistSelector'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['autoOpenPlaylistSelector']) && $options['autoOpenPlaylistSelector'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Auto advance to next playlist', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="autoAdvanceToNextPlaylist">
                        <option value="0" <?php if(isset($options['autoAdvanceToNextPlaylist']) && $options['autoAdvanceToNextPlaylist'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
                        <option value="1" <?php if(isset($options['autoAdvanceToNextPlaylist']) && $options['autoAdvanceToNextPlaylist'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
                    </select>
                    <p class="info"><?php esc_html_e('Auto advance to next playlist. If this is true, Loop playlist on playlist end option is false and next playlist is auto loaded when last video finishes playing in current playlist.', MVP_TEXTDOMAIN); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th><?php esc_html_e('Inlude playlists', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select name="includePlaylistsIntoSelector" id="includePlaylistsIntoSelector">
                        <option value="all" <?php if(isset($options['includePlaylistsIntoSelector']) && $options['includePlaylistsIntoSelector'] == "all") echo 'selected' ?>><?php esc_html_e('All playlists', MVP_TEXTDOMAIN); ?></option>
                        <option value="selected" <?php if(isset($options['includePlaylistsIntoSelector']) && $options['includePlaylistsIntoSelector'] == "selected") echo 'selected' ?>><?php esc_html_e('Selected', MVP_TEXTDOMAIN); ?></option>
                    </select>
                </td>
            </tr>

            <tr valign="top" id="playlist-selector-field">
                <th><?php esc_html_e('Choose playlists to include into selector', MVP_TEXTDOMAIN); ?></th>
                <td>
                    <select id="playlist-selector-playlist-list" multiple>
                        <?php 

                        $playlists = $wpdb->get_results("SELECT id, title FROM {$playlist_table} ORDER BY title ASC", ARRAY_A);

                        foreach($playlists as $playlist) : ?>

                        <option value="<?php echo($playlist['id']); ?>"><?php echo($playlist['title']); echo(' - ID #' . $playlist['id']); ?></option>

                        <?php endforeach; ?>    
                    </select>

                    <button type="button" id="mvp-playlist-selector-select-all"><?php esc_html_e('Select all', MVP_TEXTDOMAIN); ?></button>

                    <button type="button" id="mvp-playlist-selector-clear-selected"><?php esc_html_e('Clear selected', MVP_TEXTDOMAIN); ?></button>

                    <input type="hidden" name="playlistSelectorSelected" id="mvp-playlist-selector-selected" value="<?php echo $options['playlistSelectorSelected'] ?>">
                </td>
            </tr>

        </table>

    </div>

</div>