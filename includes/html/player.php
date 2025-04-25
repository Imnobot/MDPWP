<?php

function mvp_player_html($wrapperId, $preset, $options){

    //start markup

    $customClass = !empty($options['customClass']) ? $options['customClass'] : '';

    $markup = '<div id="'.$wrapperId.'" class="'.$customClass.'">

        <div class="mvp-player-wrap">

        <div class="mvp-player-holder">

            <div class="mvp-media-holder"></div>';

            if($preset == 'sirius')$markup .= '<div class="mvp-player-controls mvp-player-controls-gradient"></div>';

            //logo
            if(!empty($options["logoPath"])){

                if(empty($options["logoUrl"])){
                    $markup .= '<span class="mvp-logo"><img src="'.$options["logoPath"].'" alt="logo"></span>';
                }else{
                    $markup .= '<a class="mvp-logo" href="'.$options["logoUrl"].'" target="'.$options["logoTarget"].'" aria-label="logo" rel="'.$options["logoRel"].'"><img src="'.$options["logoPath"].'" alt="logo"></a>';
                }

            }

            if($options["useSubtitle"])$markup .= '<div class="mvp-subtitle-holder"><div class="mvp-subtitle-holder-inner"></div></div>';

            $markup .= '<div class="mvp-annotation-holder"></div>';

            $markup .= '<div class="mvp-upnext-wrap">
                <div class="mvp-upnext-inner">
                    <div class="mvp-upnext-thumb-wrap">
                        <div class="mvp-upnext-thumb"></div>
                        <span class="mvp-upnext-duration"></span>
                    </div>
                    <div class="mvp-upnext-info">
                        <div class="mvp-upnext-header">'.esc_html($options["upNextText"]).'</div>
                        <div class="mvp-upnext-title"></div>
                    </div>
                    <div class="mvp-upnext-close mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipClose']).'">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"></path></svg>
                    </div>
                </div>
            </div>';

            $unc = '';//classes for upnext positioning
            if($preset == 'pollux')$unc = ' mvp-upnext-l-center';
            else if($preset == 'sirius' || $preset == 'vega')$unc = ' mvp-upnext-l-side mvp-upnext-t-center';

            $markup .= '<div class="mvp-upnext-wrap2'.$unc.'">
                <div class="mvp-upnext-inner">
                    <div class="mvp-upnext-thumb-wrap">
                        <div class="mvp-upnext-thumb"></div>
                        <span class="mvp-upnext-duration"></span>
                    </div>
                    <div class="mvp-upnext-info">
                        <div class="mvp-upnext-header" data-next-title="'.esc_attr($options['upNextText']).'" data-prev-title="'.esc_attr($options['upNextPreviousText']).'"></div>
                        <div class="mvp-upnext-title"></div>
                    </div>
                </div>
            </div>';

            $markup .= '<div class="mvp-ad-skip-btn">
                <div class="mvp-ad-skip-msg"><div class="mvp-ad-skip-msg-text">'.esc_html($options['adSkipWaitText']).'</div></div>
                <div class="mvp-ad-skip-msg-end">'.esc_html($options['adSkipReadyText']).'</div>
                <div class="mvp-ad-skip-thumb"></div>
            </div>';

            if($options["showAdUpcomingMsg"])$markup .= '<div class="mvp-ad-info-start">
                <span class="mvp-ad-info-start-title">'.esc_html($options['adUpcomingMsgText']).'</span>
                <span class="mvp-ad-info-start-time"></span>
            </div>';

            $markup .= '<div class="mvp-ad-seekbar">
                <div class="mvp-ad-info">
                    <div class="mvp-ad-info-title">'.esc_html($options['adTitleText']).'</div>
                    <div class="mvp-ad-info-time"></div>
                </div>
                <div class="mvp-ad-progress-bg">
                    <div class="mvp-ad-load-level"></div>
                    <div class="mvp-ad-progress-level"></div>
                </div>
            </div>';
            
            if($options["useUnmuteBtn"])$markup .= '<div class="mvp-unmute-toggle"><svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 640 512"><path d="M633.82 458.1l-69-53.33C592.42 360.8 608 309.68 608 256c0-95.33-47.73-183.58-127.65-236.03-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 42.78-11.96 83.59-33.22 119.06l-38.12-29.46C503.49 318.68 512 288.06 512 256c0-63.09-32.06-122.09-85.77-156.16-11.19-7.09-26.03-3.8-33.12 7.41-7.09 11.2-3.78 26.03 7.41 33.13C440.27 165.59 464 209.44 464 256c0 21.21-5.03 41.57-14.2 59.88l-39.56-30.58c3.38-9.35 5.76-19.07 5.76-29.3 0-31.88-17.53-61.33-45.77-76.88-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61 11.76 6.46 19.12 18.18 20.4 31.06L288 190.82V88.02c0-21.46-25.96-31.98-40.97-16.97l-49.71 49.7L45.47 3.37C38.49-2.05 28.43-.8 23.01 6.18L3.37 31.45C-2.05 38.42-.8 48.47 6.18 53.9l588.36 454.73c6.98 5.43 17.03 4.17 22.46-2.81l19.64-25.27c5.41-6.97 4.16-17.02-2.82-22.45zM32 184v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V352.6L43.76 163.84C36.86 168.05 32 175.32 32 184z"></path></svg>'.esc_html($options["unmuteBtnText"]).'</div>';

            //include controls (thats only thing that is different per skin)
            $skin = $preset;
            //$skin = mvp_startsWith($skin, "flat");//remove (-light,-dark...) on flat skins
            require(dirname(__FILE__)."/controls_".$skin.".php");

            if($options["useShare"]){

                $markup .= '<div class="mvp-share-holder">
                <div class="mvp-share-holder-inner">
                    <div class="mvp-share-data">
                        <div class="mvp-share-inner">';

                            if($options["useShareTumblr"])$markup .= '<div class="mvp-share-item mvp-contr-btn" data-type="tumblr" data-tooltip="'.esc_attr($options["tooltipTumblr"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M309.8 480.3c-13.6 14.5-50 31.7-97.4 31.7-120.8 0-147-88.8-147-140.6v-144H17.9c-5.5 0-10-4.5-10-10v-68c0-7.2 4.5-13.6 11.3-16 62-21.8 81.5-76 84.3-117.1.8-11 6.5-16.3 16.1-16.3h70.9c5.5 0 10 4.5 10 10v115.2h83c5.5 0 10 4.4 10 9.9v81.7c0 5.5-4.5 10-10 10h-83.4V360c0 34.2 23.7 53.6 68 35.8 4.8-1.9 9-3.2 12.7-2.2 3.5.9 5.8 3.4 7.4 7.9l22 64.3c1.8 5 3.3 10.6-.4 14.5z"></path></svg>
                            </div>';
                            if($options["useShareTwitter"])$markup .= '<div class="mvp-share-item mvp-contr-btn" data-type="twitter" data-tooltip="'.esc_attr($options["tooltipTwitter"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                            </div>';
                            if($options["useShareFacebook"])$markup .= '<div class="mvp-share-item mvp-contr-btn" data-type="facebook" data-tooltip="'.esc_attr($options["tooltipFacebook"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                            </div>';
                            if($options["useShareWhatsApp"])$markup .= '<div class="mvp-share-item mvp-contr-btn" data-type="whatsapp" data-tooltip="'.esc_attr($options["tooltipWhatsApp"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>
                            </div>';
                            if($options["useShareLinkedIn"])$markup .= '<div class="mvp-share-item mvp-contr-btn" data-type="linkedin" data-tooltip="'.esc_attr($options["tooltipLinkedIn"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
                            </div>';
                            if($options["useShareReddit"])$markup .= '<div class="mvp-share-item mvp-contr-btn" data-type="reddit" data-tooltip="'.esc_attr($options["tooltipReddit"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M201.5 305.5c-13.8 0-24.9-11.1-24.9-24.6 0-13.8 11.1-24.9 24.9-24.9 13.6 0 24.6 11.1 24.6 24.9 0 13.6-11.1 24.6-24.6 24.6zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-132.3-41.2c-9.4 0-17.7 3.9-23.8 10-22.4-15.5-52.6-25.5-86.1-26.6l17.4-78.3 55.4 12.5c0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.3 24.9-24.9s-11.1-24.9-24.9-24.9c-9.7 0-18 5.8-22.1 13.8l-61.2-13.6c-3-.8-6.1 1.4-6.9 4.4l-19.1 86.4c-33.2 1.4-63.1 11.3-85.5 26.8-6.1-6.4-14.7-10.2-24.1-10.2-34.9 0-46.3 46.9-14.4 62.8-1.1 5-1.7 10.2-1.7 15.5 0 52.6 59.2 95.2 132 95.2 73.1 0 132.3-42.6 132.3-95.2 0-5.3-.6-10.8-1.9-15.8 31.3-16 19.8-62.5-14.9-62.5zM302.8 331c-18.2 18.2-76.1 17.9-93.6 0-2.2-2.2-6.1-2.2-8.3 0-2.5 2.5-2.5 6.4 0 8.6 22.8 22.8 87.3 22.8 110.2 0 2.5-2.2 2.5-6.1 0-8.6-2.2-2.2-6.1-2.2-8.3 0zm7.7-75c-13.6 0-24.6 11.1-24.6 24.9 0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.1 24.9-24.6 0-13.8-11-24.9-24.9-24.9z"></path></svg>
                            </div>';
                            if($options["useShareDigg"])$markup .= '<div class="mvp-share-item mvp-contr-btn" data-type="digg" data-tooltip="'.esc_attr($options["tooltipDigg"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512"><path d="M81.7 172.3H0v174.4h132.7V96h-51v76.3zm0 133.4H50.9v-92.3h30.8v92.3zm297.2-133.4v174.4h81.8v28.5h-81.8V416H512V172.3H378.9zm81.8 133.4h-30.8v-92.3h30.8v92.3zm-235.6 41h82.1v28.5h-82.1V416h133.3V172.3H225.1v174.4zm51.2-133.3h30.8v92.3h-30.8v-92.3zM153.3 96h51.3v51h-51.3V96zm0 76.3h51.3v174.4h-51.3V172.3z"></path></svg>
                            </div>';
                            if($options["useSharePinterest"])$markup .= '<div class="mvp-share-item mvp-contr-btn" data-type="pinterest" data-tooltip="'.esc_attr($options["tooltipPinterest"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 496 512"><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path></svg>
                            </div>';
                       $markup .= '</div>
                       <div class="mvp-share-close mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipClose"]).'">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>';
            
            }

            if($options['useEmbed']){

                $markup .= '<div class="mvp-embed-holder">
                    <div class="mvp-embed-holder-inner">
                        <div class="mvp-embed-data">
                            <div class="mvp-embed-inner">
                                <div class="mvp-embed-title">'.esc_html($options["embedVideoText"]).'</div>
                                <div class="mvp-embed-box">
                                    <div class="mvp-embed-field-wrap mvp-video-embed"></div>
                                    <div class="mvp-embed-copy" data-copy-text="'.esc_attr($options["copyEmbedCodeBtnText"]).'" data-copied-text="'.esc_attr($options["copiedEmbedCodeBtnText"]).'">'.esc_html($options["copyEmbedCodeBtnText"]).'</div>
                                </div>
                                <div class="mvp-embed-title">'.esc_html($options["copyVideoLinkText"]).'</div>
                                <div class="mvp-embed-box">
                                    <div class="mvp-embed-field-wrap mvp-video-link"></div>
                                    <div class="mvp-embed-copy" data-copy-text="'.esc_attr($options["copyEmbedCodeBtnText"]).'" data-copied-text="'.esc_attr($options["copiedEmbedCodeBtnText"]).'">'.esc_html($options["copyEmbedCodeBtnText"]).'</div>
                                </div>
                                <div class="mvp-embed-close mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipClose"]).'">
                                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"></path></svg>
                                </div>
                            </div>    
                        </div>    
                    </div>
                </div>';
            }

            if($options['useInfo']){
                $markup .= '<div class="mvp-info-holder">
                    <div class="mvp-info-holder-inner">
                        <div class="mvp-info-data">
                            <div class="mvp-info-inner">
                                <div class="mvp-player-title"></div>
                                <div class="mvp-player-desc"></div>
                            </div>
                            <div class="mvp-info-close mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipClose"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>';
            }

            //chapters menu
            $markup .= '<div class="mvp-chapter-menu-holder">
                <div class="mvp-chapter-menu-wrap">
                    <div class="mvp-chapter-menu-header">
                        <div class="mvp-chapter-menu-header-title">'.esc_html($options['chaptersMenuHeader']).'</div>

                        <div class="mvp-chapter-menu-controls">
                            <div class="mvp-prev-chapter-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipPrevChapter"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M34.5 239L228.9 44.7c9.4-9.4 24.6-9.4 33.9 0l22.7 22.7c9.4 9.4 9.4 24.5 0 33.9L131.5 256l154 154.7c9.3 9.4 9.3 24.5 0 33.9l-22.7 22.7c-9.4 9.4-24.6 9.4-33.9 0L34.5 273c-9.3-9.4-9.3-24.6 0-34zm192 34l194.3 194.3c9.4 9.4 24.6 9.4 33.9 0l22.7-22.7c9.4-9.4 9.4-24.5 0-33.9L323.5 256l154-154.7c9.3-9.4 9.3-24.5 0-33.9l-22.7-22.7c-9.4-9.4-24.6-9.4-33.9 0L226.5 239c-9.3 9.4-9.3 24.6 0 34z"></path></svg>
                            </div>    
                            <div class="mvp-next-chapter-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options["tooltipNextChapter"]).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512" ><path d="M477.5 273L283.1 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.5 0-33.9l154-154.7-154-154.7c-9.3-9.4-9.3-24.5 0-33.9l22.7-22.7c9.4-9.4 24.6-9.4 33.9 0L477.5 239c9.3 9.4 9.3 24.6 0 34zm-192-34L91.1 44.7c-9.4-9.4-24.6-9.4-33.9 0L34.5 67.4c-9.4 9.4-9.4 24.5 0 33.9l154 154.7-154 154.7c-9.3 9.4-9.3 24.5 0 33.9l22.7 22.7c9.4 9.4 24.6 9.4 33.9 0L285.5 273c9.3-9.4 9.3-24.6 0-34z"></path></svg>
                            </div>
                            <div class="mvp-chapter-menu-close mvp-contr-btn" data-tooltip="'.esc_html($options['tooltipClose']).'">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <ul class="mvp-chapter-menu"></ul>  
                </div>
            </div>'; 

            //context menu
            if($options["rightClickContextMenu"] == 'custom'){

                $markup .= '<div class="mvp-context-menu">
                    <ul>
                        <li class="mvp-context-copy-video-url">
                            <span>'.esc_html($options["customContextCopyVideoUrlText"]).'</span>
                        </li>
                        <li class="mvp-context-fullscreen">
                            <span class="mvp-context-fullscreen-enter">'.esc_html($options["tooltipFullscreenEnter"]).'</span>
                            <span class="mvp-context-fullscreen-exit">'.esc_html($options["tooltipFullscreenExit"]).'</span>
                        </li>';
                        if(!empty($options['customContextMenuLink'])){
                            $markup .= '<li class="mvp-context-link"><span><a href="'.$options["customContextMenuLink"].'" target="'.$options["customContextMenuLinkTarget"].'" aria-label="'.esc_attr($options["customContextMenuLinkTitle"]).'">'.esc_html($options["customContextMenuLinkTitle"]).'</a></span></li>';
                        }
                    $markup .= '</ul>   
                </div>';

            }

            $markup .= '<div class="mvp-pwd-holder">
                <div class="mvp-pwd-holder-inner">
                    <div class="mvp-pwd-data">
                        <div class="mvp-pwd-title">'.esc_html($options['privateContentTitle']).'</div>
                        <div class="mvp-pwd-box">
                            <div class="mvp-pwd-field-wrap"><input type="password" class="mvp-pwd-field mvp-input-field" placeholder="'.esc_attr($options['privateContentInfo']).'"></div>
                            <div class="mvp-pwd-confirm">'.esc_html($options['privateContentConfirm']).'</div>
                        </div>
                        <div class="mvp-pwd-error">'.esc_html($options['privateContentPasswordError']).'</div>
                    </div>
                </div>
            </div>';

            $markup .= '<div class="mvp-age-verify-holder">
                <div class="mvp-age-verify-holder-inner">
                    <div class="mvp-age-verify-data">
                        <div class="mvp-age-verify-header">'.esc_html($options['ageVerifyHeader']).'</div>
                        <div class="mvp-age-verify-title">'.esc_html($options['ageVerifyText']).'</div>
                        <div class="mvp-age-verify-btn mvp-age-verify-enter">'.esc_html($options['ageVerifyEnterText']).'</div>
                        <div class="mvp-age-verify-title">'.esc_html($options['ageVerifyDividerText']).'</div>
                        <div class="mvp-age-verify-btn mvp-age-verify-exit">'.esc_html($options['ageVerifyExitText']).'</div>
                    </div>
                </div>
            </div>';

            $markup .= '<div class="mvp-redirect-login-holder mvp-redirect-login-holder-download">
                <div class="mvp-redirect-login-holder-inner">
                    <div class="mvp-redirect-login-data">
                        <div class="mvp-redirect-login-inner">
                        <div class="mvp-redirect-login-header mvp-dialog-title">'.esc_html($options['restrictHeaderTitle']).'</div>';
                        if(is_user_logged_in()){
                             $markup .= '<span class="mvp-redirect-login-title">'.esc_html($options['restrictForUserRoleMsg']).'</span>';
                             $markup .= '<div class="mvp-redirect-login-action">
                                <a class="mvp-redirect-login-btn mvp-dialog-btn-horizontal" href="'.$options['restrictDownloadUrl'].'" target="'.$options['restrictDownloadUrlTarget'].'">'.esc_html($options['restrictForUserRoleBtnText']).'</a>
                                </div>';
                        }else{
                            $markup .= '<span class="mvp-redirect-login-title">'.esc_html($options['restrictDownloadForLoggedInUserMsg']).'</span>
                            <div class="mvp-redirect-login-action">
                                <a class="mvp-redirect-login-btn mvp-dialog-btn-horizontal" href="'.wp_login_url(get_permalink()).'">'.esc_html($options['restrictLoginBtnText']).'</a>
                                <div class="mvp-redirect-login-cancel mvp-dialog-btn-horizontal">
                                    <div class="mvp-redirect-login-btn">'.esc_html($options['restrictLoginCancelBtnText']).'</div>
                                </div>
                            </div>';
                        }
                        $markup .= '</div>
                    </div>
                </div>
            </div>';

            $markup .= '<div class="mvp-redirect-login-holder mvp-redirect-login-holder-watch">
                <div class="mvp-redirect-login-holder-inner">
                    <div class="mvp-redirect-login-data">
                        <div class="mvp-redirect-login-inner">
                        <div class="mvp-redirect-login-header mvp-dialog-title">'.esc_html($options['restrictHeaderTitle']).'</div>';
                        if(is_user_logged_in()){
                             $markup .= '<span class="mvp-redirect-login-title">'.esc_html($options['restrictForUserRoleMsg']).'</span>';
                             $markup .= '<div class="mvp-redirect-login-action">
                                <a class="mvp-redirect-login-btn mvp-dialog-btn-horizontal" href="'.$options['restrictWatchUrl'].'" target="'.$options['restrictWatchUrlTarget'].'">'.esc_html($options['restrictForUserRoleBtnText']).'</a>
                                </div>';
                        }else{
                            $markup .= '<span class="mvp-redirect-login-title">'.esc_html($options['restrictWatchForLoggedInUserMsg']).'</span>
                            <div class="mvp-redirect-login-action">
                                <a class="mvp-redirect-login-btn mvp-dialog-btn-horizontal" href="'.wp_login_url(get_permalink()).'">'.esc_html($options['restrictLoginBtnText']).'</a>
                                <div class="mvp-redirect-login-cancel mvp-dialog-btn-horizontal">
                                    <div class="mvp-redirect-login-btn">'.esc_html($options['restrictLoginCancelBtnText']).'</div>
                                </div>
                            </div>';
                        }
                        $markup .= '</div>
                    </div>
                </div>
            </div>';

            $markup .= '<div class="mvp-comingnext-holder">
                <div class="mvp-comingnext-poster-holder"></div>
                <div class="mvp-comingnext-poster-holder-shade"></div>
                <div class="mvp-comingnext-inner">
                    <div class="mvp-comingnext-data">
                        <div class="mvp-comingnext-data-header">'.esc_html($options['comingNextHeader']).'</div>
                        <div class="mvp-comingnext-data-title"></div>
                        <div class="mvp-comingnext-timer-wrap">
                            <svg class="mvp-comingnext-timer-circle" width="60" height="60">
                                <circle class="mvp-comingnext-timer-circle-stroke" r="27" cy="30" cx="30" stroke-width="3" stroke="#fff" fill="rgba(255,255,255,0.2)"/>
                            </svg>
                            <div class="mvp-comingnext-timer-play">
                                <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path d="M384 44v424c0 6.6-5.4 12-12 12h-48c-6.6 0-12-5.4-12-12V291.6l-195.5 181C95.9 489.7 64 475.4 64 448V64c0-27.4 31.9-41.7 52.5-24.6L312 219.3V44c0-6.6 5.4-12 12-12h48c6.6 0 12 5.4 12 12z"></path></svg>
                            </div>
                        </div>
                        <div class="mvp-comingnext-cancel">'.esc_html($options['comingNextCancelBtnText']).'</div>
                    </div>
                </div>
            </div>';  

            $markup .= '<div class="mvp-rel-holder">
                <div class="mvp-rel-playlist-holder">
                    <div class="mvp-rel-playlist-inner">
                        <div class="mvp-rel-playlist-content"></div>
                    </div>
                </div>  
                <div class="mvp-rel-close" data-tooltip="'.esc_html($options['tooltipClose']).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path></svg>
                </div>
                <div class="mvp-rel-prev" data-tooltip="'.esc_html($options['tooltipPrevious']).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 192 512"><path d="M25.1 247.5l117.8-116c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L64.7 256l102.2 100.4c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L25 264.5c-4.6-4.7-4.6-12.3.1-17z"></path></svg>
                </div>
                <div class="mvp-rel-next" data-tooltip="'.esc_html($options['tooltipNext']).'">
                    <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 192 512"><path d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z"></path></svg>
                </div>
            </div>';

            if($options['rememberPlaybackPosition']){
                $markup .= '<div class="mvp-resume-holder">
                    <div class="mvp-resume-holder-inner">
                        <div class="mvp-resume-data">
                            <div class="mvp-resume-inner">
                                <span class="mvp-resume-header">'.esc_html($options['resumeScreenHeader']).'<span class="mvp-resume-header-title"></span></span>
                                <div class="mvp-resume-action-container mvp-resume-continue">
                                    <div class="mvp-resume-title">'.esc_html($options['resumeScreenContinue']).'</div>
                                </div>
                                <div class="mvp-resume-action-container mvp-resume-restart">
                                    <div class="mvp-resume-title">'.esc_html($options['resumeScreenRestart']).'</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            
        $markup .= '</div><!-- end mvp-player-holder -->';	

        //include playlist
        if($options["playlistPosition"] != 'no-playlist'){
            require(dirname(__FILE__)."/playlist.php");
        }

        $markup .= '<div class="mvp-tooltip"></div> 

        <div class="mvp-preview-seek-wrap">
            <div class="mvp-preview-seek-inner"></div>
            <div class="mvp-preview-seek-info"></div>
         </div>';

        $markup .= '</div><!-- end mvp-player-wrap -->';    

    return $markup; 

}

?>