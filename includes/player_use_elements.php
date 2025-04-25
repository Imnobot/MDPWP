<tr valign="top">
    <th><?php esc_html_e('Use big play button', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useBigPlay" id="useBigPlay">
            <option value="0" <?php if(isset($options['useBigPlay']) && $options['useBigPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useBigPlay']) && $options['useBigPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
        <span class="info"><?php esc_html_e('Show big play button in the center before media starts and when paused.', MVP_TEXTDOMAIN); ?></span>
    </td>
</tr>

<tr valign="top" id="bigPlayImgSrc_field">
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
        <select name="useSeekbar" id="useSeekbar">
            <option value="0" <?php if(isset($options['useSeekbar']) && $options['useSeekbar'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useSeekbar']) && $options['useSeekbar'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use bottom seekbar (shown when main controls hide)', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useSoloSeekbar" id="useSoloSeekbar">
            <option value="0" <?php if(isset($options['useSoloSeekbar']) && $options['useSoloSeekbar'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useSoloSeekbar']) && $options['useSoloSeekbar'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use play button', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="usePlay" id="usePlay">
            <option value="0" <?php if(isset($options['usePlay']) && $options['usePlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['usePlay']) && $options['usePlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
        <span class="info"><?php esc_html_e('Use small play button.', MVP_TEXTDOMAIN); ?></span>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use next video button', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useNext" id="useNext">
            <option value="0" <?php if(isset($options['useNext']) && $options['useNext'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useNext']) && $options['useNext'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use previous video button', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="usePrevious" id="usePrevious">
            <option value="0" <?php if(isset($options['usePrevious']) && $options['usePrevious'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['usePrevious']) && $options['usePrevious'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use rewind to beginning button', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useRewind" id="useRewind">
            <option value="0" <?php if(isset($options['useRewind']) && $options['useRewind'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useRewind']) && $options['useRewind'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use skip backward button (x seconds)', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useSkipBackward" id="useSkipBackward">
            <option value="0" <?php if(isset($options['useSkipBackward']) && $options['useSkipBackward'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useSkipBackward']) && $options['useSkipBackward'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use skip forward button (x seconds)', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useSkipForward" id="useSkipForward">
            <option value="0" <?php if(isset($options['useSkipForward']) && $options['useSkipForward'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useSkipForward']) && $options['useSkipForward'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use current and total time', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useTime" id="useTime">
            <option value="0" <?php if(isset($options['useTime']) && $options['useTime'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useTime']) && $options['useTime'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use volume button', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useVolume" id="useVolume">
            <option value="0" <?php if(isset($options['useVolume']) && $options['useVolume'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useVolume']) && $options['useVolume'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use unmute button', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="useUnmuteBtn" id="useUnmuteBtn">
            <option value="0" <?php if(isset($options['useUnmuteBtn']) && $options['useUnmuteBtn'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useUnmuteBtn']) && $options['useUnmuteBtn'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
        <span class="info"><?php esc_html_e('Use unmute button to unmute the video. Button will be shown above the player if Auto play is true and video starts muted.', MVP_TEXTDOMAIN); ?></span><div class="mvp-help-tip"><p><img src="<?php echo plugins_url().'/apmvp/images/useUnmuteBtn.jpg' ?>"/></p></div>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use download button', MVP_TEXTDOMAIN); ?></th>    
    <td>
        <select name="useDownload" id="useDownload">
            <option value="0" <?php if(isset($options['useDownload']) && $options['useDownload'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useDownload']) && $options['useDownload'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
        <span class="info"><?php esc_html_e('Download button is automatically hidden is video does not have download url set.', MVP_TEXTDOMAIN); ?></span>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use info button (video description)', MVP_TEXTDOMAIN); ?></th>          
    <td>
        <select name="useInfo" id="useInfo">
            <option value="0" <?php if(isset($options['useInfo']) && $options['useInfo'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useInfo']) && $options['useInfo'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use embed button', MVP_TEXTDOMAIN); ?></th>          
    <td>
        <select name="useEmbed" id="useEmbed">
            <option value="0" <?php if(isset($options['useEmbed']) && $options['useEmbed'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useEmbed']) && $options['useEmbed'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Show video title about the player', MVP_TEXTDOMAIN); ?></th>
    <td>
        <select name="showVideoTitle" id="showVideoTitle">
            <option value="0" <?php if(isset($options['showVideoTitle']) && $options['showVideoTitle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['showVideoTitle']) && $options['showVideoTitle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use fullscreen button', MVP_TEXTDOMAIN); ?></th>   
    <td>
        <select name="useFullscreen" id="useFullscreen">
            <option value="0" <?php if(isset($options['useFullscreen']) && $options['useFullscreen'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useFullscreen']) && $options['useFullscreen'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use picture in picture button', MVP_TEXTDOMAIN); ?></th>         
    <td>
        <select name="usePip" id="usePip">
            <option value="0" <?php if(isset($options['usePip']) && $options['usePip'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['usePip']) && $options['usePip'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use theater mode button', MVP_TEXTDOMAIN); ?></th>         
    <td>
        <select name="useTheaterMode" id="useTheaterMode">
            <option value="0" <?php if(isset($options['useTheaterMode']) && $options['useTheaterMode'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useTheaterMode']) && $options['useTheaterMode'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use Chromecast button for casting', MVP_TEXTDOMAIN); ?></th>   
    <td>
        <select name="useCasting" id="useCasting">
            <option value="0" <?php if(isset($options['useCasting']) && $options['useCasting'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useCasting']) && $options['useCasting'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use playback rate menu', MVP_TEXTDOMAIN); ?></th>      
    <td>
        <select name="usePlaybackRate" id="usePlaybackRate">
            <option value="0" <?php if(isset($options['usePlaybackRate']) && $options['usePlaybackRate'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['usePlaybackRate']) && $options['usePlaybackRate'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use video quality menu', MVP_TEXTDOMAIN); ?></th>      
    <td>
        <select name="useQuality" id="useQuality">
            <option value="0" <?php if(isset($options['useQuality']) && $options['useQuality'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useQuality']) && $options['useQuality'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
        <span class="info"><?php esc_html_e('This is for self hosted media. Youtube and Vimeo automatically choose best suitable quality on their side.', MVP_TEXTDOMAIN); ?></span>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use captions menu (subtitles)', MVP_TEXTDOMAIN); ?></th>         
    <td>
        <select name="useSubtitle" id="useSubtitle">
            <option value="0" <?php if(isset($options['useSubtitle']) && $options['useSubtitle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useSubtitle']) && $options['useSubtitle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use transcript window', MVP_TEXTDOMAIN); ?></th>         
    <td>
        <select name="useTranscript" id="useTranscript">
            <option value="0" <?php if(isset($options['useTranscript']) && $options['useTranscript'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useTranscript']) && $options['useTranscript'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select>
        <p class="info"><?php esc_html_e('Transcript window shows video subtitles above playlist area.', MVP_TEXTDOMAIN); ?></p>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use quick caption toggle button', MVP_TEXTDOMAIN); ?></th>         
    <td>
        <select name="useCc" id="useCc">
            <option value="0" <?php if(isset($options['useCc']) && $options['useCc'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useCc']) && $options['useCc'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select>
        <p class="info"><?php esc_html_e('Show button to toggle caption state on/off (remember last used subtitle).', MVP_TEXTDOMAIN); ?></p>
    </td>
</tr>

<tr valign="top">
    <th><?php esc_html_e('Use AirPlay button', MVP_TEXTDOMAIN); ?></th>         
    <td>
        <select name="useAirPlay" id="useAirPlay">
            <option value="0" <?php if(isset($options['useAirPlay']) && $options['useAirPlay'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['useAirPlay']) && $options['useAirPlay'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select>
    </td>
</tr>

<tr valign="top" id="usePlaylistToggle-field">
    <th><?php esc_html_e('Use playlist toggle button', MVP_TEXTDOMAIN); ?></th>         
    <td>
        <select name="usePlaylistToggle" id="usePlaylistToggle">
            <option value="0" <?php if(isset($options['usePlaylistToggle']) && $options['usePlaylistToggle'] == "0") echo 'selected' ?>><?php esc_html_e('no', MVP_TEXTDOMAIN); ?></option>
            <option value="1" <?php if(isset($options['usePlaylistToggle']) && $options['usePlaylistToggle'] == "1") echo 'selected' ?>><?php esc_html_e('yes', MVP_TEXTDOMAIN); ?></option>
        </select><br>
        <span class="info"><?php esc_html_e('Open / close playlist button.', MVP_TEXTDOMAIN); ?></span>
    </td>
</tr>

<tr valign="top" id="playlist_icons_field">
    <th><?php esc_html_e('Additional player icons', MVP_TEXTDOMAIN); ?></th>
    <td>

        <div id="mvp-pi-table-wrap" class="mvp-value-table-wrap"></div>

        <p class="info"><?php esc_html_e('Create additional icons in player and attach url to them. We suggest using SVG code, but you can also use Font Awesome icons or plain images.', MVP_TEXTDOMAIN); ?></p>

        <button type="button" id="pi_add"><?php esc_html_e('Add icon', MVP_TEXTDOMAIN); ?></button><br><br>

        <table class="mvp-pi-table-orig" style="display:none;">
          <thead>
            <tr>
              <th align="left"><?php esc_html_e('Icon position', MVP_TEXTDOMAIN); ?></th>
              <th align="left"><?php esc_html_e('Title', MVP_TEXTDOMAIN); ?></th>
              <th align="left"><?php esc_html_e('Url', MVP_TEXTDOMAIN); ?></th>
              <th align="left"><?php esc_html_e('Target', MVP_TEXTDOMAIN); ?></th>
              <th align="left"><?php esc_html_e('Rel', MVP_TEXTDOMAIN); ?></th>
              <th align="left"><?php esc_html_e('Icon', MVP_TEXTDOMAIN); ?></th>
              <th align="left"><?php esc_html_e('Custom class', MVP_TEXTDOMAIN); ?></th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          
          <tbody>
            <tr class="mvp-icon-table">

                <td>
                    <select class="mvp-pi-position">
                        <option value="bottom"><?php esc_html_e('In bottom controls', MVP_TEXTDOMAIN); ?></option>
                        <option value="top"><?php esc_html_e('In top controls', MVP_TEXTDOMAIN); ?></option>
                    </select><br>
                </td>

              <td><input type="text" class="mvp-pi-title" placeholder="<?php esc_attr_e('Title', MVP_TEXTDOMAIN); ?>"></td>

              <td><input type="text" class="mvp-pi-url" placeholder="<?php esc_attr_e('Url link', MVP_TEXTDOMAIN); ?>"></td>

              <td><select class="mvp-pi-target">
                <?php foreach ($target_arr as $key => $value) : ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
              </select>
              </td>

              <td><input type="text" class="mvp-pi-rel" placeholder="<?php esc_attr_e('rel attribute', MVP_TEXTDOMAIN); ?>"></td>

              <td>
                <input type="text" class="mvp-pi-icon" placeholder="<?php esc_attr_e('Icon (svg, image or font-awesome)', MVP_TEXTDOMAIN); ?>"><br>

                <p class="mvp-pi-icon-field">
                    <span class="mvp-pi-icon-preview"></span>
                    <button type="button" class="mvp-add-fa-icon mvp-is-pi"><?php esc_attr_e('Add Font Awesome', MVP_TEXTDOMAIN); ?></button>
                </p>

              </td>
              
              <td><input type="text" class="mvp-pi-class" placeholder="<?php esc_attr_e('custom class', MVP_TEXTDOMAIN); ?>"></td>

              <td>

                  <button type="button" class="pi_remove"><?php esc_html_e('Remove', MVP_TEXTDOMAIN); ?></button>

                  <button type="button" class="mvp-pi-icon-sort"><?php esc_html_e('Sort', MVP_TEXTDOMAIN); ?></button>

              </td>

              
            </tr>

          </tbody>
        </table>

       

    </td>
</tr>