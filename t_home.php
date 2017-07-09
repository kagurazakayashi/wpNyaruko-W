<?php
/*
Template Name: 跳转页
*/
$wpNyarukoOption = get_option('wpNyaruko_options');
if(@$wpNyarukoOption['wpNyarukoBanBrowser']!='') {
  include_once("broswerchk.php");
  broswerchkto($wpNyarukoOption['wpNyarukoBanBrowser']);
}
if (have_posts()) : the_post(); update_post_caches($posts);
echo '<!doctype html><!--yashigoto--><head><meta charset="utf-8"><title>';
bloginfo('name');
echo '</title><meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /><style>body{padding:0;margin:0;font-size:12pt;user-select:none}a:link{text-decoration:none;color:#69f}a:visited{text-decoration:none;color:#69f}a:hover{color:#69f}a:active{color:#69f}@-webkit-keyframes ball-spin-fade-loader{50%{opacity:1;-webkit-transform:scale(0.4);transform:scale(0.4)}100%{opacity:.3;-webkit-transform:scale(1);transform:scale(1)}}@keyframes ball-spin-fade-loader{50%{opacity:1;-webkit-transform:scale(0.4);transform:scale(0.4)}100%{opacity:.3;-webkit-transform:scale(1);transform:scale(1)}}.ball-spin-fade-loader{position:fixed;top:50%;left:50%;width:64px;height:64px}.ball-spin-fade-loader>div:nth-child(1){top:25px;left:0;-webkit-animation:ball-spin-fade-loader 1s 0s infinite linear;animation:ball-spin-fade-loader 1s 0s infinite linear}.ball-spin-fade-loader>div:nth-child(2){top:17.04545px;left:17.04545px;-webkit-animation:ball-spin-fade-loader 1s .12s infinite linear;animation:ball-spin-fade-loader 1s .12s infinite linear}.ball-spin-fade-loader>div:nth-child(3){top:0;left:25px;-webkit-animation:ball-spin-fade-loader 1s .24s infinite linear;animation:ball-spin-fade-loader 1s .24s infinite linear}.ball-spin-fade-loader>div:nth-child(4){top:-17.04545px;left:17.04545px;-webkit-animation:ball-spin-fade-loader 1s .36s infinite linear;animation:ball-spin-fade-loader 1s .36s infinite linear}.ball-spin-fade-loader>div:nth-child(5){top:-25px;left:0;-webkit-animation:ball-spin-fade-loader 1s .48s infinite linear;animation:ball-spin-fade-loader 1s .48s infinite linear}.ball-spin-fade-loader>div:nth-child(6){top:-17.04545px;left:-17.04545px;-webkit-animation:ball-spin-fade-loader 1s .6s infinite linear;animation:ball-spin-fade-loader 1s .6s infinite linear}.ball-spin-fade-loader>div:nth-child(7){top:0;left:-25px;-webkit-animation:ball-spin-fade-loader 1s .72s infinite linear;animation:ball-spin-fade-loader 1s .72s infinite linear}.ball-spin-fade-loader>div:nth-child(8){top:17.04545px;left:-17.04545px;-webkit-animation:ball-spin-fade-loader 1s .84s infinite linear;animation:ball-spin-fade-loader 1s .84s infinite linear}.ball-spin-fade-loader>div{background-color:#f6c;width:15px;height:15px;border-radius:100%;margin:2px;-webkit-animation-fill-mode:both;animation-fill-mode:both;position:absolute}#hander{position:fixed;background-color:#fcf;width:100%;height:50px;box-shadow:0 1px 5px #888}#title{position:absolute;left:20px;height:50px;line-height:50px}#cont{position:absolute;right:20px;height:50px;line-height:50px}#foot{position:fixed;bottom:0;width:100%;text-align:center;font-size:10pt}</style></head><body>';
$gotourl = explode("[GOTO]",get_the_content())[1];
$info = "正在向服务器请求网页";
echo '<div id="hander"><div id="title">'.$info.'</div><div id="cont"><a href="'.$gotourl.'" target="_top" title="如果没有自动前往，请点击这里">继续</a></div></div><div class="ball-spin-fade-loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div><div id="foot">访问IP：'.Getip().'<br>环境：'.GetOs().'/'.GetBrowser().'<br>如果没有自动前往，请点击右上角继续按钮。<br>&copy;Yashi Server | <span id="icpid"></span><script type="text/javascript" src="/analytics.js"></script></div>';
echo '<meta http-equiv=refresh content="1;url='.$gotourl.'">';
echo '</body></html>';
else :
echo "ERR";
endif;
function GetBrowser(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
    $br = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/MSIE/i',$br)) {
                            $br = 'MSIE';
                        }elseif (preg_match('/Firefox/i',$br)) {
        $br = 'Firefox';
    }elseif (preg_match('/Chrome/i',$br)) {
        $br = 'Chrome';
            }elseif (preg_match('/Safari/i',$br)) {
        $br = 'Safari';
    }elseif (preg_match('/Opera/i',$br)) {
            $br = 'Opera';
    }else {
            $br = 'Other';
    }
    return $br;
}else{return "未知";}
}
function GetLang(){
    if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
    $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $lang = substr($lang,0,5);
    if(preg_match("/zh-cn/i",$lang)){
        $lang = "简体中文";
    }elseif(preg_match("/zh/i",$lang)){
        $lang = "繁体中文";
    }else{
            $lang = "English";
    }
    return $lang;
    }else{return "未知";}
}
function GetOs(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
    $OS = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/win/i',$OS)) {
        $OS = 'Windows';
    }elseif (preg_match('/mac/i',$OS)) {
        $OS = 'Apple';
    }elseif (preg_match('/linux/i',$OS)) {
        $OS = 'Linux';
    }elseif (preg_match('/unix/i',$OS)) {
        $OS = 'Unix';
    }elseif (preg_match('/bsd/i',$OS)) {
        $OS = 'BSD';
    }else {
        $OS = '未知';
    }
                return $OS;
    }else{return "未知";}
}
function Getip(){
    $ip = false;
    $ips = false;
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ //获取代理ip
    $ips = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
    }
    if($ip){
        $ips = array_unshift($ips,$ip);
    }
    $count = count($ips);
    for($i=0;$i<$count;$i++){
        if(!preg_match("/^(10|172\.16|192\.168)\./i",$ips[$i])){//排除局域网ip
        $ip = $ips[$i];
        break;
        }
    }
    $tip = empty($_SERVER['REMOTE_ADDR']) ? $ip : $_SERVER['REMOTE_ADDR'];
    if($tip=="127.0.0.1"){ //获得本地真实IP
        return $this->get_onlineip();
    }else{
        return $tip;
    }
}
?>