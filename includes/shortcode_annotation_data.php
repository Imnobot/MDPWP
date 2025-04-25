<?php 
$section = '<div class="mvp-annotation-section">'.PHP_EOL;

$annotation_css = '';

foreach($annotation_data as $row){

    $type = $row["type"];

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
        $ann_path = '<img src="'.$row["path"].'" alt="">';
    }
    else if($type == "iframe"){
        $ann_path = '<iframe src="about:blank" data-src="'.$row["path"].'" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
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

        $item .= '<div class="mvp-annotation-close'.$close_btn_class.'" title="Close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path></svg>
        </div>';
    }

    $item .= '</div>';

    $section .= $item.PHP_EOL;

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