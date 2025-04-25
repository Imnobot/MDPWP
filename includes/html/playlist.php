<?php 

$markup .= '<div class="mvp-playlist-holder">
    <div class="mvp-playlist-inner-wrap">';

        if($options["makePlaylistSelector"]){

            $markup .= '<div class="mvp-playlist-selector-header">
                <div class="mvp-playlist-selector-header-inner">
                    <div class="mvp-playlist-selector-header-title"></div>  
                    <div class="mvp-playlist-selector-header-icon mvp-contr-btn">
                        <svg aria-hidden="true" role="img" viewBox="0 0 448 512"><path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </div>                          
                </div>
            </div>';

        }

        $markup .= '<div class="mvp-playlist-inner">
            <div class="mvp-playlist-content"></div>';

            if(strpos($options["navigationType"], 'buttons') !== false){//navigation buttons

                if($options["playlistPosition"] == 'hb'){//horizontal playlist

                    $markup .= '<div class="mvp-nav-backward mvp-nav-backward-horizontal mvp-contr-btn">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 192 512"><path d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path></svg>
                    </div>   
                    <div class="mvp-nav-forward mvp-nav-backward-horizontal mvp-contr-btn">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 192 512"><path d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>
                    </div>';

                }else{//vertical playlist

                    $markup .= '<div class="mvp-nav-backward mvp-nav-backward-vertical mvp-contr-btn">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg>
                    </div>   
                    <div class="mvp-nav-forward mvp-nav-backward-vertical mvp-contr-btn">
                        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path></svg>
                    </div>';

                }

            } 

        $markup .= '</div>';//end mvp-playlist-inner

        if($options["makePlaylistSelector"]){

            $markup .= '<div class="mvp-playlist-selector-holder">
                <div class="mvp-playlist-selector-content">
                    <div class="mvp-playlist-selector-container-wrap mvp-scroll-content">
                        <div class="mvp-playlist-selector-container"></div>
                    </div>
                </div>
            </div>  ';

        }

        //load more button
        if($options["playlistPosition"] == 'outer' || $options["playlistPosition"] == 'wall'){
            $markup .= '<div class="mvp-load-more-btn">'.esc_html($options["loadMoreBtnText"]).'</div>';
        }

        //search field
        if($options["showSearchField"]){

            $markup .= '<div class="mvp-playlist-bar">
                <input class="mvp-search-field mvp-input-field" type="text" autocapitalize="none" placeholder="'.esc_html($options["searchText"]).'" autocomplete="off">
            </div>';

        }

    $markup .= '</div><!-- end mvp-playlist-inner-wrap -->';

    //transcript
    if($options["useTranscript"]){

        $markup .= '<div class="mvp-transcript-holder">
            <div class="mvp-transcript-holder-inner">
                <div class="mvp-transcript-header">
                    <div class="mvp-transcript-header-inner">
                        <div class="mvp-transcript-header-title"></div>                                 
                        <div class="mvp-transcript-header-icon mvp-contr-btn">
                            <svg aria-hidden="true" role="img" viewBox="0 0 448 512"><path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                    </div>
                    <div class="mvp-transcript-close mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipClose']).'">
                        <svg aria-hidden="true" role="img" viewBox="0 0 320 512"><path d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"></path></svg>
                    </div>
                </div>
                <div class="mvp-transcript-content">
                    <div class="mvp-transcript-container-wrap mvp-scroll-content">
                        <div class="mvp-transcript-container"></div>
                    </div>
                    <div class="mvp-transcript-language-selector-wrap mvp-scroll-content">
                        <div class="mvp-transcript-language-selector"></div>
                    </div>
                </div>
                <div class="mvp-transcript-footer">
                    <input type="text" class="mvp-transcript-search-input mvp-input-field" placeholder="'.esc_attr($options['searchTranscriptText']).'">
                </div>
            </div>  
        </div>';

    }

    //transcript
    if($options["useChapterWindow"]){

        $markup .= '<div class="mvp-chapters-holder">
            <div class="mvp-chapters-holder-inner">
                <div class="mvp-chapters-header">
                    <div class="mvp-chapters-header-inner">
                        <div class="mvp-chapters-header-title">'.esc_html($options["chaptersMenuHeader"]).'</div>                                   
                    </div>
                    <div class="mvp-chapter-menu-controls">
                        <div class="mvp-prev-chapter-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipPrevChapter']).'">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512" class="svg-inline--fa fa-chevron-double-left fa-w-14 fa-3x"><path d="M34.5 239L228.9 44.7c9.4-9.4 24.6-9.4 33.9 0l22.7 22.7c9.4 9.4 9.4 24.5 0 33.9L131.5 256l154 154.7c9.3 9.4 9.3 24.5 0 33.9l-22.7 22.7c-9.4 9.4-24.6 9.4-33.9 0L34.5 273c-9.3-9.4-9.3-24.6 0-34zm192 34l194.3 194.3c9.4 9.4 24.6 9.4 33.9 0l22.7-22.7c9.4-9.4 9.4-24.5 0-33.9L323.5 256l154-154.7c9.3-9.4 9.3-24.5 0-33.9l-22.7-22.7c-9.4-9.4-24.6-9.4-33.9 0L226.5 239c-9.3 9.4-9.3 24.6 0 34z"></path></svg>
                        </div>
                        <div class="mvp-next-chapter-toggle mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipNextChapter']).'">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 512 512" ><path d="M477.5 273L283.1 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.5 0-33.9l154-154.7-154-154.7c-9.3-9.4-9.3-24.5 0-33.9l22.7-22.7c9.4-9.4 24.6-9.4 33.9 0L477.5 239c9.3 9.4 9.3 24.6 0 34zm-192-34L91.1 44.7c-9.4-9.4-24.6-9.4-33.9 0L34.5 67.4c-9.4 9.4-9.4 24.5 0 33.9l154 154.7-154 154.7c-9.3 9.4-9.3 24.5 0 33.9l22.7 22.7c9.4 9.4 24.6 9.4 33.9 0L285.5 273c9.3-9.4 9.3-24.6 0-34z"></path></svg>
                        </div>
                        <div class="mvp-chapters-close mvp-contr-btn" data-tooltip="'.esc_attr($options['tooltipClose']).'">
                            <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 320 512"><path d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"></path></svg>
                        </div>
                    </div>  
                </div>
                <div class="mvp-chapters-content">
                    <div class="mvp-chapters-container-wrap mvp-scroll-content">
                        <div class="mvp-chapters-container"></div>
                    </div>
                </div>
                <div class="mvp-chapters-footer">
                    <input type="text" class="mvp-chapters-search-input mvp-input-field" placeholder="'.esc_attr($options['searchChaptersText']).'">">
                </div>
            </div>  
        </div>';

    }

    $markup .= '<div class="mvp-playlist-filter-msg"><span>'.esc_html($options["searchNothingFoundMsg"]).'</span></div>';

$markup .= '</div><!-- end mvp-playlist-holder -->';

?>