<?php

    if(!empty($options["playerLoaderImgSrc"]) && !empty($options['playerLoaderImgW']) && !empty($options['playerLoaderImgH'])){//image preloader
        $loader = '<div class="mvp-player-loader mvp-player-loader-img" style="width:'.$options['playerLoaderImgW'].'px;height:'.$options['playerLoaderImgH'].'px;"><img src="'.esc_html($options["playerLoaderImgSrc"]).'" alt="loading"/></div>';
    }else{//css preloader
        $loader = '<div class="mvp-player-loader mvp-player-spinner"></div>';
    }
     
	return $loader; 

?>