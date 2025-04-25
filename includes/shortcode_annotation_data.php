<?php 
$section = '<div class="mvp-annotation-section">'.PHP_EOL;

$annotation_css = '';

foreach($annotation_data as $row){

    //popups were inttroduced after so old items do not have display_type prop
    if(isset($row["display_type"]))$display_type = $row["display_type"];//popup or annotation
    else $display_type = 'annotation';

    $type = $row["type"];

    if($display_type == 'annotation'){

        $adit_class = '';

        if($type == "iframe")$adit_class .= ' mvp-annotation-iframe';
        else if($type == "shortcode")$adit_class .= ' mvp-annotation-shortcode';
        else if($type == "adsense-detail" || $type == "adsense-code")$adit_class .= ' mvp-'.$type;

        if(!empty($row["adit_class"])){
            $adit_class .= ' '.$row["adit_class"];
        }

        if(!empty($row["position"])){
            $adit_class .= ' mvp-annotation-position-'.$row["position"];
        }

        $item = '<div class="mvp-annotation'.$adit_class.'"';

        if(!empty($row["show_time"])){
            $item .= ' data-show="'.$row["show_time"].'"';
        }
        if(!empty($row["hide_time"])){
            $item .= ' data-hide="'.$row["hide_time"].'"';
        }


        //adsense detail
        if($type == "adsense-detail"){

            if(!empty($row["adsense_client"])){
                $item .= ' data-ad-client="'.$row["adsense_client"].'"';
            }
            if(!empty($row["adsense_slot"])){
                $item .= ' data-ad-slot="'.$row["adsense_slot"].'"';
            }
            if(!empty($row["width"])){
                $item .= ' data-width="'.$row["width"].'"';
            }
            if(!empty($row["height"])){
                $item .= ' data-height="'.$row["height"].'"';
            }

        }


        $item .= '>';

        if(!empty($row["link"])){//link start node
            if(!empty($row["target"])){
                $target = $row["target"];
            }else{
                $target = '_blank'; 
            }
            $item .= '<a href="'.$row["link"].'" target="'.$target.'"';
            if(!empty($row["rel"])){
                $item .= ' rel="'.$row["rel"].'"';
            }
            $item .= '>';
        }

        $ann_path = '';

        if($type == "image"){
            $ann_path = '<img class="mvp-annotation-img" src="'.$row["path"].'" alt="">';
        }
        else if($type == "iframe"){
            $ann_path = '<iframe src="about:blank" data-src="'.$row["path"].'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>';
        }
        else if($type == "html"){
            $ann_path = $row["path"];
        }
        else if($type == "shortcode"){
            $ann_path = '<div class="mvp-annotation-shortcode-content">'.$row["path"].'</div>';
        }
        else if($type == "adsense-code"){
            $ann_path = $row["path"];
        }

        $item .= $ann_path;

        if(!empty($row["link"])){//link close node
            $item .= '</a>';
        }
        
        if(!empty($row["close_btn"])){

            $close_btn_class = '';
            if(!empty($row["close_btn_position"])){
                $close_btn_class .= ' mvp-annotation-close-'.$row["close_btn_position"];
            }else{
                $close_btn_class .= ' mvp-annotation-close-tr';
            }

            $item .= '<div class="mvp-annotation-close'.$close_btn_class.'" title="'.esc_attr($options['tooltipClose']).'">
                '.$options['annotationCloseIcon'].'
            </div>';
        }

        $item .= '</div>';

        $section .= $item.PHP_EOL;

    }else if($display_type == 'popup'){

        $adit_class = '';

        if($type == "iframe")$adit_class .= ' mvp-popup-iframe';
        else if($type == "shortcode")$adit_class .= ' mvp-popup-shortcode';
        else if($type == "adsense-detail" || $type == "adsense-code")$adit_class .= ' mvp-'.$type;

        if(!empty($row["adit_class"])){
            $adit_class .= ' '.$row["adit_class"];
        }

        $item = '<div class="mvp-popup'.$adit_class.'"';

        if(!empty($row["show_time"])){
            if($row["show_time"] == 'p')$show_time = 'pause';
            else $show_time = $row["show_time"];
            $item .= ' data-show="'.$show_time.'"';
        }


        //adsense detail
        if($type == "adsense-detail"){

            if(!empty($row["adsense_client"])){
                $item .= ' data-ad-client="'.$row["adsense_client"].'"';
            }
            if(!empty($row["adsense_slot"])){
                $item .= ' data-ad-slot="'.$row["adsense_slot"].'"';
            }
            if(!empty($row["width"])){
                $item .= ' data-width="'.$row["width"].'"';
            }
            if(!empty($row["height"])){
                $item .= ' data-height="'.$row["height"].'"';
            }

        }


        $item .= '>';

        if(!empty($row["link"])){//link start node
            if(!empty($row["target"])){
                $target = $row["target"];
            }else{
                $target = '_blank'; 
            }
            $item .= '<a href="'.$row["link"].'" target="'.$target.'"';
            if(!empty($row["rel"])){
                $item .= ' rel="'.$row["rel"].'"';
            }
            $item .= '>';
        }

        $ann_path = '';

        if($type == "image"){
            $ann_path = '<img class="mvp-popup-img" src="'.$row["path"].'" alt="">';
        }
        else if($type == "iframe"){
            $ann_path = '<iframe src="about:blank" data-src="'.$row["path"].'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>';
        }
        else if($type == "html"){
            $ann_path = $row["path"];
        }
        else if($type == "shortcode"){
            $ann_path = '<div class="mvp-popup-shortcode-content">'.$row["path"].'</div>';
        }
        else if($type == "adsense-code"){
            $ann_path = $row["path"];
        }

        $item .= $ann_path;

        if(!empty($row["link"])){//link close node
            $item .= '</a>';
        }
        
        if(!$options['useGlobalPopupCloseBtn']){
            if(!empty($row["close_btn"])){

                $close_btn_class = '';
                if(!empty($row["close_btn_position"])){
                    $close_btn_class .= ' mvp-popup-close-'.$row["close_btn_position"];
                }else{
                    $close_btn_class .= ' mvp-popup-close-tr';
                }

                $item .= '<div class="mvp-popup-close'.$close_btn_class.'" title="'.esc_attr($options['tooltipClose']).'">
                    '.$options['annotationCloseIcon'].'
                </div>';
            }
        }

        $item .= '</div>';

        $section .= $item.PHP_EOL;    

    }

    if(!empty($row["css"])){
        $annotation_css .= stripcslashes($row["css"]);
    }

}
$section .= '</div>'.PHP_EOL;

if(!mvp_nullOrEmpty($annotation_css)){
    ?>
    <script>
        var htmlDivCss = "<?php echo mvp_compressCss($annotation_css); ?>";
        var htmlDiv = document.getElementById('mvp-annotation-inline-css');
        if(htmlDiv){
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        }else{
            var htmlDiv = document.createElement('div');
            htmlDiv.id = "mvp-annotation-inline-css";
            htmlDiv.innerHTML = "<style>" + htmlDivCss + '</style>';
            document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>
    <?php 
}

$track .= $section;
?>