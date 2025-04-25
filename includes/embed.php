<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

echo mvp_add_player($atts);

?>

</body>
</html>
