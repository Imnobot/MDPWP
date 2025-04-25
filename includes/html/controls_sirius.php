<?php

$markup .= '<div class="mvp-ad-controls">
    <div class="mvp-volume-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipVolume']).'">
        <div class="mvp-btn mvp-btn-volume-up">
            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 576 512"><path d="M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zm233.32-51.08c-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 78.98-39.55 152.09-105.82 195.58-11.17 7.32-14.29 22.34-6.95 33.5 7.04 10.71 21.93 14.56 33.51 6.95C528.27 439.58 576 351.33 576 256S528.27 72.43 448.35 19.97zM480 256c0-63.53-32.06-121.94-85.77-156.24-11.19-7.14-26.03-3.82-33.12 7.46s-3.78 26.21 7.41 33.36C408.27 165.97 432 209.11 432 256s-23.73 90.03-63.48 115.42c-11.19 7.14-14.5 22.07-7.41 33.36 6.51 10.36 21.12 15.14 33.12 7.46C447.94 377.94 480 319.54 480 256zm-141.77-76.87c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 228.28 336 241.63 336 256c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.86z"></path></svg>
        </div>
        <div class="mvp-btn mvp-btn-volume-down">
            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 384 512"><path d="M215.03 72.04L126.06 161H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V89.02c0-21.47-25.96-31.98-40.97-16.98zm123.2 108.08c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 229.28 336 242.62 336 257c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.87z"></path></svg>
        </div>
        <div class="mvp-btn mvp-btn-volume-off">
            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 640 512"><path d="M633.82 458.1l-69-53.33C592.42 360.8 608 309.68 608 256c0-95.33-47.73-183.58-127.65-236.03-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 42.78-11.96 83.59-33.22 119.06l-38.12-29.46C503.49 318.68 512 288.06 512 256c0-63.09-32.06-122.09-85.77-156.16-11.19-7.09-26.03-3.8-33.12 7.41-7.09 11.2-3.78 26.03 7.41 33.13C440.27 165.59 464 209.44 464 256c0 21.21-5.03 41.57-14.2 59.88l-39.56-30.58c3.38-9.35 5.76-19.07 5.76-29.3 0-31.88-17.53-61.33-45.77-76.88-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61 11.76 6.46 19.12 18.18 20.4 31.06L288 190.82V88.02c0-21.46-25.96-31.98-40.97-16.97l-49.71 49.7L45.47 3.37C38.49-2.05 28.43-.8 23.01 6.18L3.37 31.45C-2.05 38.42-.8 48.47 6.18 53.9l588.36 454.73c6.98 5.43 17.03 4.17 22.46-2.81l19.64-25.27c5.41-6.97 4.16-17.02-2.82-22.45zM32 184v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V352.6L43.76 163.84C36.86 168.05 32 175.32 32 184z"></path></svg>
        </div>
    </div>
    <div class="mvp-fullscreen-toggle mvp-contr-btn">
        <div class="mvp-btn mvp-btn-fullscreen" data-tooltip="'.esc_attr($options['tooltipFullscreenEnter']).'">
            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M0 180V56c0-13.3 10.7-24 24-24h124c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H64v84c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12zM288 44v40c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12V56c0-13.3-10.7-24-24-24H300c-6.6 0-12 5.4-12 12zm148 276h-40c-6.6 0-12 5.4-12 12v84h-84c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24V332c0-6.6-5.4-12-12-12zM160 468v-40c0-6.6-5.4-12-12-12H64v-84c0-6.6-5.4-12-12-12H12c-6.6 0-12 5.4-12 12v124c0 13.3 10.7 24 24 24h124c6.6 0 12-5.4 12-12z"></path></svg>
        </div>
        <div class="mvp-btn mvp-btn-normal" data-tooltip="'.esc_attr($options['tooltipFullscreenExit']).'">
            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path fill="currentColor" d="M436 192H312c-13.3 0-24-10.7-24-24V44c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v84h84c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm-276-24V44c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v84H12c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24zm0 300V344c0-13.3-10.7-24-24-24H12c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-84h84c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12H312c-13.3 0-24 10.7-24 24v124c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12z"></path></svg>
        </div>
    </div>
</div>';

$markup .= '<div class="mvp-player-controls mvp-player-controls-top">';

    if($options["useShare"])$markup .= '<div class="mvp-share-toggle mvp-contr-btn" data-tooltip="Share">
        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z"></path></svg>
    </div>';

    if($options["useDownload"])$markup .= '<div class="mvp-download-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipDownload"]).'"><a href="#">
        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M382.56,233.376C379.968,227.648,374.272,224,368,224h-64V16c0-8.832-7.168-16-16-16h-64c-8.832,0-16,7.168-16,16v208h-64 c-6.272,0-11.968,3.68-14.56,9.376c-2.624,5.728-1.6,12.416,2.528,17.152l112,128c3.04,3.488,7.424,5.472,12.032,5.472 c4.608,0,8.992-2.016,12.032-5.472l112-128C384.192,245.824,385.152,239.104,382.56,233.376z"/><path d="M432,352v96H80v-96H16v128c0,17.696,14.336,32,32,32h416c17.696,0,32-14.304,32-32V352H432z"/></svg>
    </a></div>';

    if($options["useInfo"])$markup .= '<div class="mvp-info-toggle mvp-contr-btn" data-tooltip="Info">
        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg>
    </div>';

    if($options["useEmbed"])$markup .= '<div class="mvp-embed-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipEmbed"]).'">
        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z"></path></svg>
    </div>';

    if($options["usePip"])$markup .= '<div class="mvp-pip-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipPip"]).'">
        <svg width="24" height="24" viewBox="0 0 24 24"><path d="M19 7h-8v6h8V7zm2-4H3c-1.1 0-2 .9-2 2v14c0 1.1.9 1.98 2 1.98h18c1.1 0 2-.88 2-1.98V5c0-1.1-.9-2-2-2zm0 16.01H3V4.98h18v14.03z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    </div>';

    if($options["usePlaylistToggle"])$markup .= '<div class="mvp-playlist-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipPlaylistToggle"]).'">
            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></svg>
        </div>';

$markup .= '</div>';

if($options["usePrevious"])$markup .= '<div class="mvp-player-controls mvp-previous-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipPrevious']).'">
    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M229.9 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L94.569 282H436c6.627 0 12-5.373 12-12v-28c0-6.627-5.373-12-12-12H94.569l155.13-155.13c4.686-4.686 4.686-12.284 0-16.971L229.9 38.101c-4.686-4.686-12.284-4.686-16.971 0L3.515 247.515c-4.686 4.686-4.686 12.284 0 16.971L212.929 473.9c4.686 4.686 12.284 4.686 16.971-.001z"></path></svg>
</div>';

if($options["useNext"])$markup .= '<div class="mvp-player-controls mvp-next-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipNext']).'">
    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>
</div>';

$markup .= '<div class="mvp-player-controls">

    <div class="mvp-player-controls-bottom-wrap">

        <div class="mvp-player-controls-bottom">

            <div class="mvp-player-controls-bottom-left">';

                if($options["usePlay"])$markup .= '<div class="mvp-playback-toggle mvp-contr-btn">
                    <div class="mvp-btn mvp-btn-play">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 373.008 373.008"><path d="M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z"/></svg>
                    </div>
                    <div class="mvp-btn mvp-btn-pause">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 26 26"><path d="M4.667,0h6v26h-6V0z M15.333,0v26h6V0H15.333z"/></svg>
                    </div>
                </div>';

                if($options["useRewind"])$markup .= '<div class="mvp-rewind-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipRewind']).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M12 8h27.711c6.739 0 12.157 5.548 11.997 12.286l-2.347 98.568C93.925 51.834 170.212 7.73 256.793 8.001 393.18 8.428 504.213 120.009 504 256.396 503.786 393.181 392.835 504 256 504c-63.926 0-122.202-24.187-166.178-63.908-5.113-4.618-5.354-12.561-.482-17.433l19.738-19.738c4.498-4.498 11.753-4.785 16.501-.552C160.213 433.246 205.895 452 256 452c108.322 0 196-87.662 196-196 0-108.322-87.662-196-196-196-79.545 0-147.941 47.282-178.675 115.302l126.389-3.009c6.737-.16 12.286 5.257 12.286 11.997V212c0 6.627-5.373 12-12 12H12c-6.627 0-12-5.373-12-12V20C0 13.373 5.373 8 12 8z"></path></svg>
                </div>';

                if($options["useSkipBackward"])$markup .= '<div class="mvp-skip-backward-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipSkipBackward']).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M267.5 281.2l192 159.4c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6L267.5 232c-15.3 12.8-15.3 36.4 0 49.2zM464 130.3V382L313 256.6l151-126.3zM11.5 281.2l192 159.4c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6L11.5 232c-15.3 12.8-15.3 36.4 0 49.2zM208 130.3V382L57 256.6l151-126.3z"></path></svg>
                </div>';

                if($options["useSkipForward"])$markup .= '<div class="mvp-skip-forward-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipSkipForward']).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M244.5 230.8L52.5 71.4C31.9 54.3 0 68.6 0 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160.6c15.3-12.8 15.3-36.4 0-49.2zM48 381.7V130.1l151 125.4L48 381.7zm452.5-150.9l-192-159.4C287.9 54.3 256 68.6 256 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160.6c15.3-12.8 15.3-36.4 0-49.2zM304 381.7V130.1l151 125.4-151 126.2z"></path></svg>
                </div>';

                if($options["useTime"])$markup .= '<div class="mvp-media-time-current"></div>';

                $markup .= '<div class="mvp-live-note">
                    <div class="mvp-live-note-inner">
                        <div class="mvp-live-note-icon"></div>
                        <div class="mvp-live-note-title">'.esc_html($options["liveStreamText"]).'</div>
                    </div>  
                </div>';  

            $markup .= '</div>';    

            if($options["useSeekbar"])$markup .= '<div class="mvp-seekbar">
                <div class="mvp-seekbar-wrap">
                    <div class="mvp-progress-bg">
                        <div class="mvp-load-level"></div>
                        <div class="mvp-progress-level"></div>
                    </div>
                </div>
            </div>';

            $markup .= '<div class="mvp-player-controls-bottom-right">';

                if($options["useTime"])$markup .= '<div class="mvp-media-time-total"></div>';

                $markup .= '<div class="mvp-vr-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipVr']).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 640 512"><path d="M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h160.22c25.19 0 48.03-14.77 58.36-37.74l27.74-61.64C286.21 331.08 302.35 320 320 320s33.79 11.08 41.68 28.62l27.74 61.64C399.75 433.23 422.6 448 447.78 448H608c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM160 304c-35.35 0-64-28.65-64-64s28.65-64 64-64 64 28.65 64 64-28.65 64-64 64zm320 0c-35.35 0-64-28.65-64-64s28.65-64 64-64 64 28.65 64 64-28.65 64-64 64z"></path></svg>
                </div>';

                if($options["useCc"])$markup .= '<div class="mvp-cc-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipCc']).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM218.1 287.7c2.8-2.5 7.1-2.1 9.2.9l19.5 27.7c1.7 2.4 1.5 5.6-.5 7.7-53.6 56.8-172.8 32.1-172.8-67.9 0-97.3 121.7-119.5 172.5-70.1 2.1 2 2.5 3.2 1 5.7l-17.5 30.5c-1.9 3.1-6.2 4-9.1 1.7-40.8-32-94.6-14.9-94.6 31.2.1 48 51.1 70.5 92.3 32.6zm190.4 0c2.8-2.5 7.1-2.1 9.2.9l19.5 27.7c1.7 2.4 1.5 5.6-.5 7.7-53.5 56.9-172.7 32.1-172.7-67.9 0-97.3 121.7-119.5 172.5-70.1 2.1 2 2.5 3.2 1 5.7L420 222.2c-1.9 3.1-6.2 4-9.1 1.7-40.8-32-94.6-14.9-94.6 31.2 0 48 51 70.5 92.2 32.6z"></path></svg>
                </div>';

                if($options["useTranscript"])$markup .= '<div class="mvp-transcript-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipTranscript']).'">
                    <svg aria-hidden="true" role="img" viewBox="0 0 384 512"><path d="M126.2 286.4l64.2-63.6c2.1-2.1 2.1-5.5 0-7.6l-12.6-12.7c-2.1-2.1-5.5-2.1-7.6 0l-47.6 47.2-20.6-20.9c-2.1-2.1-5.5-2.1-7.6 0l-12.7 12.6c-2.1 2.1-2.1 5.5 0 7.6l37.1 37.4c1.9 2.1 5.3 2.1 7.4 0zM336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM192 48c8.8 0 16 7.2 16 16s-7.2 16-16 16-16-7.2-16-16 7.2-16 16-16zm144 408c0 4.4-3.6 8-8 8H56c-4.4 0-8-3.6-8-8V120c0-4.4 3.6-8 8-8h40v32c0 8.8 7.2 16 16 16h160c8.8 0 16-7.2 16-16v-32h40c4.4 0 8 3.6 8 8v336zM112 328c-13.3 0-24 10.7-24 24s10.7 24 24 24 24-10.7 24-24-10.7-24-24-24zm168-88h-63.3c-1.3 1.8-2.1 3.9-3.7 5.5L186.2 272H280c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0 96H168c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8z"></path></svg>
                </div>';

                if($options['usePlaybackRate'] || $options['useSubtitle'] || $options['useQuality'] || $options['useAudioLanguage']){

                    $markup .= '<div class="mvp-settings-wrap mvp-contr-btn">
                        <div class="mvp-settings-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipSettings']).'">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"></path></svg>
                        </div>
                        <div class="mvp-settings-holder">
                            <div class="mvp-settings-home">
                                <ul>';
                                    if($options['usePlaybackRate'])$markup .= '<li class="mvp-menu-item" data-target="mvp-playback-rate-menu-holder"><span class="mvp-settings-menu-item-title">'.esc_html($options["tooltipPlaybackRate"]).'</span><span class="mvp-settings-menu-item-value mvp-playback-rate-menu-value">1</span></li>';
                                    if($options['useSubtitle'])$markup .= '<li class="mvp-menu-item mvp-subtitle-settings-menu mvp-force-hide" data-target="mvp-subtitle-menu-holder"><span class="mvp-settings-menu-item-title">'.esc_html($options["tooltipSubtitles"]).'</span><span class="mvp-settings-menu-item-value mvp-subtitle-menu-value"></span></li>';
                                    if($options['useQuality'])$markup .= '<li class="mvp-menu-item mvp-quality-settings-menu mvp-force-hide" data-target="mvp-quality-menu-holder"><span class="mvp-settings-menu-item-title">'.esc_html($options["tooltipQuality"]).'</span><span class="mvp-settings-menu-item-value mvp-quality-menu-value"></span></li>';
                                    if($options['useAudioLanguage'])$markup .= '<li class="mvp-menu-item mvp-audio-language-settings-menu mvp-force-hide" data-target="mvp-audio-language-menu-holder"><span class="mvp-settings-menu-item-title">'.esc_html($options["tooltipAudioLanguage"]).'</span><span class="mvp-settings-menu-item-value mvp-audio-language-menu-value"></span></li>';
                                $markup .= '</ul>
                            </div>';
                            if($options['useQuality'])$markup .= '<div class="mvp-quality-menu-holder mvp-settings-menu">
                                <div class="mvp-menu-header">
                                    <span>'.esc_html($options["tooltipQuality"]).'</span>
                                </div>
                                <ul class="mvp-quality-menu"></ul>
                            </div>';
                            if($options['usePlaybackRate']){
                                $markup .= '<div class="mvp-playback-rate-menu-holder mvp-settings-menu">
                                    <div class="mvp-menu-header">
                                        <span>'.esc_html($options["tooltipPlaybackRate"]).'</span>
                                    </div>
                                    <ul class="mvp-playback-rate-menu">';
                                        foreach ($options["playbackRateArr"] as $key){
                                            $markup .= '<li class="mvp-menu-item" data-value="'.$key['value'].'">'.$key['menu_title'].'</li>';
                                        }
                                    $markup .= '</ul>
                                </div>';
                            }
                            if($options['useSubtitle'])$markup .= '<div class="mvp-subtitle-menu-holder mvp-settings-menu">
                                <div class="mvp-menu-header">
                                    <span>'.esc_html($options["tooltipSubtitles"]).'</span>
                                </div>
                                <ul class="mvp-subtitle-menu"></ul>
                            </div>';
                            if($options['useAudioLanguage'])$markup .= '<div class="mvp-audio-language-menu-holder mvp-settings-menu">
                                <div class="mvp-menu-header">
                                    <span>'.esc_html($options["tooltipAudioLanguage"]).'</span>
                                </div>
                                <ul class="mvp-audio-language-menu"></ul>
                            </div>';
                        $markup .= '</div>
                    </div>';

                }

                if($options["useChapterToggle"]){

                    $markup .= '<div class="mvp-prev-chapter-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipPrevChapter"]).'">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path fill="currentColor" d="M390.3 473.9L180.9 264.5c-4.7-4.7-4.7-12.3 0-17L390.3 38.1c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17L246.4 256l180.7 181.1c4.7 4.7 4.7 12.3 0 17l-19.8 19.8c-4.7 4.7-12.3 4.7-17 0zm-143 0l19.8-19.8c4.7-4.7 4.7-12.3 0-17L86.4 256 267.1 74.9c4.7-4.7 4.7-12.3 0-17l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L20.9 247.5c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0z"></path></svg>
                        </div>

                    <div class="mvp-next-chapter-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipNextChapter"]).'">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M57.7 38.1l209.4 209.4c4.7 4.7 4.7 12.3 0 17L57.7 473.9c-4.7 4.7-12.3 4.7-17 0l-19.8-19.8c-4.7-4.7-4.7-12.3 0-17L201.6 256 20.9 74.9c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0zm143 0l-19.8 19.8c-4.7 4.7-4.7 12.3 0 17L361.6 256 180.9 437.1c-4.7 4.7-4.7 12.3 0 17l19.8 19.8c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17L217.7 38.1c-4.7-4.7-12.3-4.7-17 0z"></path></svg>
                    </div>

                    <div class="mvp-chapter-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipChaptersMenu"]).'">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12z"></path></svg>
                    </div>';

                }

                if($options["useVolume"]){

                    $markup .= '<div class="mvp-volume-wrapper mvp-contr-btn">
                    <div class="mvp-volume-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipVolume']).'">
                        <div class="mvp-btn mvp-btn-volume-up">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 576 512"><path d="M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zm233.32-51.08c-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 78.98-39.55 152.09-105.82 195.58-11.17 7.32-14.29 22.34-6.95 33.5 7.04 10.71 21.93 14.56 33.51 6.95C528.27 439.58 576 351.33 576 256S528.27 72.43 448.35 19.97zM480 256c0-63.53-32.06-121.94-85.77-156.24-11.19-7.14-26.03-3.82-33.12 7.46s-3.78 26.21 7.41 33.36C408.27 165.97 432 209.11 432 256s-23.73 90.03-63.48 115.42c-11.19 7.14-14.5 22.07-7.41 33.36 6.51 10.36 21.12 15.14 33.12 7.46C447.94 377.94 480 319.54 480 256zm-141.77-76.87c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 228.28 336 241.63 336 256c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.86z"></path></svg>
                        </div>
                        <div class="mvp-btn mvp-btn-volume-down">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 384 512"><path d="M215.03 72.04L126.06 161H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V89.02c0-21.47-25.96-31.98-40.97-16.98zm123.2 108.08c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 229.28 336 242.62 336 257c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.87z"></path></svg>
                        </div>
                        <div class="mvp-btn mvp-btn-volume-off">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 640 512"><path d="M633.82 458.1l-69-53.33C592.42 360.8 608 309.68 608 256c0-95.33-47.73-183.58-127.65-236.03-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 42.78-11.96 83.59-33.22 119.06l-38.12-29.46C503.49 318.68 512 288.06 512 256c0-63.09-32.06-122.09-85.77-156.16-11.19-7.09-26.03-3.8-33.12 7.41-7.09 11.2-3.78 26.03 7.41 33.13C440.27 165.59 464 209.44 464 256c0 21.21-5.03 41.57-14.2 59.88l-39.56-30.58c3.38-9.35 5.76-19.07 5.76-29.3 0-31.88-17.53-61.33-45.77-76.88-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61 11.76 6.46 19.12 18.18 20.4 31.06L288 190.82V88.02c0-21.46-25.96-31.98-40.97-16.97l-49.71 49.7L45.47 3.37C38.49-2.05 28.43-.8 23.01 6.18L3.37 31.45C-2.05 38.42-.8 48.47 6.18 53.9l588.36 454.73c6.98 5.43 17.03 4.17 22.46-2.81l19.64-25.27c5.41-6.97 4.16-17.02-2.82-22.45zM32 184v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V352.6L43.76 163.84C36.86 168.05 32 175.32 32 184z"></path></svg>
                        </div>
                    </div>';
                    $markup .= '<div class="mvp-volume-seekbar">
                        <div class="mvp-volume-bg">
                            <div class="mvp-volume-level"></div>
                        </div>
                    </div>';
                $markup .= '</div>';

                }

                if($options["useTheaterMode"])$markup .= '<div class="mvp-theater-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipTheaterMode"]).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 640 512"><path d="M592 96.5H48c-26.5 0-48 21.5-48 48v223c0 26.5 21.5 48 48 48h544c26.5 0 48-21.5 48-48v-223c0-26.5-21.5-48-48-48zm-6 271H54c-3.3 0-6-2.7-6-6v-211c0-3.3 2.7-6 6-6h532c3.3 0 6 2.7 6 6v211c0 3.3-2.7 6-6 6z"></path></svg>
                </div>';

                if($options["useCasting"])$markup .= '<div class="mvp-cast-toggle mvp-contr-btn">
                    <div class="mvp-btn mvp-cast-off" data-tooltip="'.esc_attr($options['tooltipPlayOnTv']).'">
                        <svg height="17" viewBox="0 0 512 512"><path d="M447.8,64H64c-23.6,0-42.7,19.1-42.7,42.7v63.9H64v-63.9h383.8v298.6H298.6V448H448c23.6,0,42.7-19.1,42.7-42.7V106.7 C490.7,83.1,471.4,64,447.8,64z M21.3,383.6L21.3,383.6l0,63.9h63.9C85.2,412.2,56.6,383.6,21.3,383.6L21.3,383.6z M21.3,298.6V341 c58.9,0,106.6,48.1,106.6,107h42.7C170.7,365.6,103.7,298.7,21.3,298.6z M213.4,448h42.7c-0.5-129.5-105.3-234.3-234.8-234.6l0,42.4 C127.3,255.6,213.3,342,213.4,448z"></path></svg>
                    </div>
                    <div class="mvp-btn mvp-cast-on" data-tooltip="'.esc_attr($options['tooltipStopPlayingOnTv']).'">
                        <svg viewBox="0 0 48 48"><path d="M0 0h48v48h-48z" fill="none" opacity=".1"/><path d="M0 0h48v48h-48z" fill="none"/><path d="M2 36v6h6c0-3.31-2.69-6-6-6zm0-8v4c5.52 0 10 4.48 10 10h4c0-7.73-6.27-14-14-14zm36-14h-28v3.27c7.92 2.56 14.17 8.81 16.73 16.73h11.27v-20zm-36 6v4c9.94 0 18 8.06 18 18h4c0-12.15-9.85-22-22-22zm40-14h-36c-2.21 0-4 1.79-4 4v6h4v-6h36v28h-14v4h14c2.21 0 4-1.79 4-4v-28c0-2.21-1.79-4-4-4z"/></svg>
                    </div>  
                </div>';

                if($options["useAirPlay"])$markup .= '<div class="mvp-airplay-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipAirPlay']).'">
                    <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><path d="M0 0h48v48H0V0z" id="a"/></defs><defs><path d="M0 0h48v48H0V0z" id="c"/></defs><clipPath id="b"><use overflow="visible" xlink:href="#a"/></clipPath><clipPath clip-path="url(#b)" id="d"><use overflow="visible" xlink:href="#c"/></clipPath><path clip-path="url(#d)" d="M42 6H6c-2.2 0-4 1.8-4 4v24c0 2.2 1.8 4 4 4h8v-4H6V10h36v24h-8v4h8c2.2 0 4-1.8 4-4V10c0-2.2-1.8-4-4-4zM12 44h24L24 32z"/></svg>
                </div>';

                if($options["useFullscreen"])$markup .= '<div class="mvp-fullscreen-toggle mvp-contr-btn">
                    <div class="mvp-btn mvp-btn-fullscreen" data-tooltip="'.esc_attr($options['tooltipFullscreenEnter']).'">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M0 212V88c0-13.3 10.7-24 24-24h124c6.6 0 12 5.4 12 12v24c0 6.6-5.4 12-12 12H48v100c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12zM352 76v24c0 6.6 5.4 12 12 12h100v100c0 6.6 5.4 12 12 12h24c6.6 0 12-5.4 12-12V88c0-13.3-10.7-24-24-24H364c-6.6 0-12 5.4-12 12zm148 212h-24c-6.6 0-12 5.4-12 12v100H364c-6.6 0-12 5.4-12 12v24c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24V300c0-6.6-5.4-12-12-12zM160 436v-24c0-6.6-5.4-12-12-12H48V300c0-6.6-5.4-12-12-12H12c-6.6 0-12 5.4-12 12v124c0 13.3 10.7 24 24 24h124c6.6 0 12-5.4 12-12z"></path></svg>
                    </div>
                    <div class="mvp-btn mvp-btn-normal" data-tooltip="'.esc_attr($options['tooltipFullscreenExit']).'">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M500 224H376c-13.3 0-24-10.7-24-24V76c0-6.6 5.4-12 12-12h24c6.6 0 12 5.4 12 12v100h100c6.6 0 12 5.4 12 12v24c0 6.6-5.4 12-12 12zm-340-24V76c0-6.6-5.4-12-12-12h-24c-6.6 0-12 5.4-12 12v100H12c-6.6 0-12 5.4-12 12v24c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24zm0 236V312c0-13.3-10.7-24-24-24H12c-6.6 0-12 5.4-12 12v24c0 6.6 5.4 12 12 12h100v100c0 6.6 5.4 12 12 12h24c6.6 0 12-5.4 12-12zm240 0V336h100c6.6 0 12-5.4 12-12v-24c0-6.6-5.4-12-12-12H376c-13.3 0-24 10.7-24 24v124c0 6.6 5.4 12 12 12h24c6.6 0 12-5.4 12-12z"></path></svg>
                    </div>
                </div>';

            $markup .= '</div>

        </div>

    </div>    

</div>';

if($options["usePlayerLoader"])$markup .= require(dirname(__FILE__)."/loader.php");

if($options["useBigPlay"]){

    if(!empty($options["bigPlayImgSrc"]) && !empty($options['bigPlayImgW']) && !empty($options['bigPlayImgH'])){
        $markup .= '<div class="mvp-big-play mvp-big-play-img" style="width:'.$options['bigPlayImgW'].'px;height:'.$options['bigPlayImgH'].'px;"><img src="'.esc_html($options["bigPlayImgSrc"]).'" alt="play"/></div>';
    }else{
        $markup .= '<div class="mvp-big-play">
        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 373.008 373.008"><path d="M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z"/></svg>
    </div>';
    }
}

if($options["useVideoTransform"]){

    $markup .= '<div class="mvp-transform-controls">

        <div class="mvp-transform-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipTransform"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM104 432c0 13.3-10.7 24-24 24s-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24z"/></svg></div>

        <div class="mvp-transform-control-inner">
        
            <div class="mvp-transform-move-left mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipMoveLeft"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M234.8 36.25c3.438 3.141 5.156 7.438 5.156 11.75c0 3.891-1.406 7.781-4.25 10.86L53.77 256l181.1 197.1c6 6.5 5.625 16.64-.9062 22.61c-6.5 6-16.59 5.594-22.59-.8906l-192-208c-5.688-6.156-5.688-15.56 0-21.72l192-208C218.2 30.66 228.3 30.25 234.8 36.25z"/></svg></div>

            <div class="mvp-transform-move-right mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipMoveRight"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M85.14 475.8c-3.438-3.141-5.156-7.438-5.156-11.75c0-3.891 1.406-7.781 4.25-10.86l181.1-197.1L84.23 58.86c-6-6.5-5.625-16.64 .9062-22.61c6.5-6 16.59-5.594 22.59 .8906l192 208c5.688 6.156 5.688 15.56 0 21.72l-192 208C101.7 481.3 91.64 481.8 85.14 475.8z"/></svg></div>

            <div class="mvp-transform-move-up mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipMoveUp"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M443.8 330.8C440.6 334.3 436.3 336 432 336c-3.891 0-7.781-1.406-10.86-4.25L224 149.8l-197.1 181.1c-6.5 6-16.64 5.625-22.61-.9062c-6-6.5-5.594-16.59 .8906-22.59l208-192c6.156-5.688 15.56-5.688 21.72 0l208 192C449.3 314.3 449.8 324.3 443.8 330.8z"/></svg></div>

            <div class="mvp-transform-move-down mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipMoveDown"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M4.251 181.1C7.392 177.7 11.69 175.1 16 175.1c3.891 0 7.781 1.406 10.86 4.25l197.1 181.1l197.1-181.1c6.5-6 16.64-5.625 22.61 .9062c6 6.5 5.594 16.59-.8906 22.59l-208 192c-6.156 5.688-15.56 5.688-21.72 0l-208-192C-1.343 197.7-1.749 187.6 4.251 181.1z"/></svg></div>

            <div class="mvp-transform-zoom-in mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipZoomIn"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M432 256C432 264.8 424.8 272 416 272h-176V448c0 8.844-7.156 16.01-16 16.01S208 456.8 208 448V272H32c-8.844 0-16-7.15-16-15.99C16 247.2 23.16 240 32 240h176V64c0-8.844 7.156-15.99 16-15.99S240 55.16 240 64v176H416C424.8 240 432 247.2 432 256z"/></svg></div>

            <div class="mvp-transform-zoom-out mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipZoomOut"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M432 256C432 264.8 424.8 272 416 272H32c-8.844 0-16-7.15-16-15.99C16 247.2 23.16 240 32 240h384C424.8 240 432 247.2 432 256z"/></svg></svg></div>

            <div class="mvp-transform-rotate-left mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipRotateLeft"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M256.1 32.11c-52.22 0-103.2 18.27-143.2 51.58C111.6 84.73 110.8 86.03 109.9 87.32L59.31 36.69c-4.562-4.562-11.5-5.875-17.44-3.469C35.91 35.69 32 41.53 32 48v128C32 184.8 39.16 192 48 192h128c6.469 0 12.31-3.906 14.78-9.875s1.094-12.88-3.469-17.44L131.8 109.1c.4961-.3281 1.076-.4453 1.541-.8359C167.7 79.72 211.3 64 256 64c105.9 0 192 86.13 192 192s-86.13 192-192 192c-59.47 0-114.7-26.91-151.4-73.88c-5.469-6.969-15.5-8.219-22.47-2.719c-6.938 5.438-8.157 15.5-2.719 22.47c42.81 54.72 107.3 86.02 176.7 86.02C379.6 479.9 480 379.5 480 256S379.6 32.11 256.1 32.11zM64 160V86.63L137.4 160H64z"/></svg></div>

            <div class="mvp-transform-rotate-right mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipRotateRight"]).'"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M32.05 256.1c0 123.5 100.4 223.9 223.9 223.9c104.4 0 180-76.8 180-95.94c0-9.377-7.705-16.03-15.98-16.03C399.5 367.1 369.3 448 256 448c-105.9 0-192-86.13-192-192s86.13-192 192-192c75.11 0 123.1 44.4 124.2 45.15l-55.54 55.54c-3.055 3.055-4.681 7.16-4.681 11.33C320 184.9 327.2 192 336 192h128C472.8 192 480 184.8 480 176v-128c0-8.606-6.901-15.97-15.97-15.97c-4.171 0-8.291 1.598-11.35 4.653L402.1 87.32c-8.646-13.15-70.2-55.25-146.1-55.25C132.4 32.07 32.05 132.6 32.05 256.1zM374.6 160L448 86.63V160H374.6z"/></svg></div>
            
            <div class="mvp-transform-reset mvp-contr-btn">'.esc_html($options["tooltipTransformReset"]).'</div>
            
        </div>

    </div>';

}

if($options["useSoloSeekbar"]){
    $markup .= '<div class="mvp-solo-seekbar">
        <div class="mvp-solo-progress-bg">
            <div class="mvp-solo-progress-level"><div class="mvp-progress-level-pointer"></div></div>
        </div>
    </div>';
}


?> 
