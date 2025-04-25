<?php 

$section = '<div class="mvp-ad-section">'.PHP_EOL;

//shuffle ads
if($ad_options['randomizeAdPre'] == '1')mvp_shuffleArray($ad_data, 'ad-pre');
if($ad_options['randomizeAdEnd'] == '1')mvp_shuffleArray($ad_data, 'ad-end');

foreach($ad_data as $row){

    $type = $row["type"];

    $item = '<div class="mvp-ad mvp-'.$row["ad_type"].'" data-type="'.$type.'" ';

    if($type == "video" || $type == "audio"){

        $quality;

        $ad_path = 'data-path=\'[';

        if($type == "video"){
            $ext = "mp4";
        }else if($type == "audio"){
            $ext = pathinfo($row['path'], PATHINFO_EXTENSION);
            if(mvp_nullOrEmpty($ext))$ext = "mp3";
        }

        if($encryptMediaPaths)$p = MVP_BSF_MATCH.base64_encode($row['path']);
        else $p = $row['path'];

        $ad_path .= '{"quality": "default", "'.$ext.'": "'.$p.'"},';
      
        $ad_path = substr_replace($ad_path, "", -1);//remove last comma
        $ad_path .= ']\' ';

    }else{

        $ad_path = 'data-path="'.$row['path'].'" ';

    }
    
    $item .= $ad_path;

    if(!empty($row["is360"])){
        $item .= 'data-is360="1" ';
    }
    if(!empty($row["duration"])){
        $item .= 'data-duration="'.$row["duration"].'" ';
    }
    if(!empty($row["poster"])){
        $item .= 'data-poster="'.$row["poster"].'" ';
    }
    if(isset($row["skip_enable"])){
        $item .= 'data-skip-enable="'.$row["skip_enable"].'" ';
    }
    if(isset($row["begin"])){
        $item .= 'data-begin="'.$row["begin"].'" ';
    }
    if(!empty($row["link"])){
        $item .= 'data-link="'.$row["link"].'" ';
        if(!empty($row["target"])){
            $item .= 'data-target="'.$row["target"].'" ';
        }
        if(!empty($row["rel"])){
            $item .= 'data-rel="'.$row["rel"].'" ';
        }
    }

    $item .= '></div>';

    $section .= $item.PHP_EOL;
       
}
$section .= '</div>'.PHP_EOL;

$track .= $section;
?>