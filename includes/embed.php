<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="../source/css/mvp.css" />

	<style>
       *{
            margin:0;
            padding:0;
            border:0;
            outline:none;
        }
        a{ 
            text-decoration: none; 
        }
    </style>

    <script src="../source/js/new.js"></script>

</head>
<body>

<?php

include_once('../../../../wp-load.php');
include_once('../mvp.php');

$str = $_SERVER['QUERY_STRING'];

if(strpos($str, 'origtype') !== false){//single embed
    $str = urldecode(stripslashes($str));
}

parse_str($str, $atts);

$atts['ap_is_embed'] = '1';

echo mvp_add_player($atts);

?>

</body>
</html>
