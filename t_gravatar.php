<?php
/*
Template Name: 用户头像代理
*/
$wpNyarukoOption = get_option('wpNyaruko_options');
$wpNyarukoGravatarProxy = $wpNyarukoOption['wpNyarukoGravatarProxy'];
if (!$wpNyarukoOption['wpNyarukoGravatarProxy'] || $wpNyarukoGravatarProxy == "" || !isset($_GET["mail"]) || !isset($_GET["size"]) || !isset($_SERVER['HTTP_REFERER']) || (strpos($_SERVER['HTTP_REFERER'],home_url())!=0)) {
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    die();
}
$usergravatar = "https://www.gravatar.com/avatar/".md5($_GET["mail"])."?s=".$_GET["size"];
$ch = curl_init();
curl_setopt($hander,CURLOPT_HEADER,0);
curl_setopt($hander,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($hander,CURLOPT_RETURNTRANSFER,false);
curl_setopt($hander,CURLOPT_TIMEOUT,10);
if ($wpNyarukoGravatarProxy != "serverhost") {
    curl_setopt($hander,CURLOPT_PROXY,$wpNyarukoGravatarProxy);
}
header('Content-type: image/jpeg');
curl_exec($ch);
curl_close($ch);
?>