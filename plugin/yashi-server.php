<?php
/*
Plugin Name: Kagurazaka Yashi
Plugin URI:
Description: yoooooooooo.com
Version:0.1
Author:
Author URI:
*/
$password0 = false; //额外检查开关
$password1 = "userpassword"; ///wp-admin/?pwd=$password1 当天当IP记住
$password2 = "sysstr"; //无需用户提供
if (!class_exists("yashiserverc")) {
	class yashiserverc {
		// Ram using calc
		public function MemCalcs() {
			$memlimit = intval(ini_get('memory_limit')) ;
			$memused = intval(round(memory_get_usage() / 1024 / 1024, 2));
			$mem_use_percent = round($memused* 100 / $memlimit)."%";
			$mem_using = "已分配".$memlimit."内存,已使用".$memused."M,占用".$mem_use_percent;
			return $mem_using;
		}
		// Shows results on Admin Bar
		function Print_Admin_Bar($wp_admin_bar) {
			global $wp_admin_bar,$upresults,$srv_load,$mem_using;
			if ( !is_super_admin() || !is_admin_bar_showing() ) return;
			$wp_admin_bar->add_menu( array(
				'id'    => 'my-item1',
				'title' => '雅诗云主机',
			));
			$wp_admin_bar->add_menu( array(
				'id'    => 'my-item2',
				'title' => $this->MemCalcs(),
			));
			$wp_admin_bar->add_menu( array(
				'id'    => 'my-item3',
				'title' => '登入:'.$this->Getip()."/".$this->GetOS()."/".$this->GetBrowser(),
			));
		}
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
			} else {
				return "未知";
			}
		}

		////获得访客浏览器语言
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

			////获取访客操作系统
		function GetOs(){
			if(!empty($_SERVER['HTTP_USER_AGENT'])){
			$OS = $_SERVER['HTTP_USER_AGENT'];
				if (preg_match('/win/i',$OS)) {
				$OS = 'Windows';
			}elseif (preg_match('/mac/i',$OS)) {
				$OS = 'MAC';
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
			} else {
				return "未知";
			}
		}

		////获得访客真实ip
		function Getip(){
			$ip = null;
			$ips = [];
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
	}
}
if (class_exists("yashiserverc")) {
	$yashiserverc = new yashiserverc();
}
if (isset($yashiserverc)) {
	//!is_super_admin() || !is_admin_bar_showing()
	add_action('wp_before_admin_bar_render', array(&$yashiserverc, 'Print_Admin_Bar'));
	//lock
	if ($password0 == true && strstr($_SERVER['PHP_SELF'],"wp-admin")) {
		$vstr = $password2.$yashiserverc->Getip();
		if (!isset($_GET["pwd"]) || $_GET["pwd"] != $password1) {
			if (!isset($_COOKIE["wp-admin"]) || $_COOKIE["wp-admin"] != $vstr) {
				yashilock();
			}
		} else {
			setcookie("wp-admin", $vstr, time()+86400);
		}
	}
}
function yashilock() {
	$yashiserverc = new yashiserverc();
	echo '<!doctype html><!--yashigoto--><head><meta charset="utf-8"><title>Yashi Server</title><meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /><style>body{padding:0;margin:0;font-size:12pt;user-select:none}a:link{text-decoration:none;color:#69f}a:visited{text-decoration:none;color:#69f}a:hover{color:#69f}a:active{color:#69f}#hander{position:fixed;background-color:#fcf;width:100%;height:50px;box-shadow:0 1px 5px #888}#title{position:absolute;left:20px;height:50px;line-height:50px}#cont{position:absolute;right:20px;height:50px;line-height:50px}#foot{position:fixed;bottom:0;width:100%;text-align:center;font-size:10pt}#info{position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;}</style></head><body>';
	$info = "雅诗服务器认证";
	$info2 = '<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg version="1.1" id="Layer_9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<g>
	<polygon points="18.398,54.067 18.398,55.319 27.057,55.319 30.186,58.448 34.355,58.448 34.355,57.196 30.703,57.196 
		27.574,54.067 	"/>
	<path d="M41.865,38.736c0-1.381-1.123-2.503-2.504-2.503H18.398c-1.381,0-2.504,1.122-2.504,2.503v6.385
		c-0.047,0.211-0.078,0.429-0.078,0.655c0,0.226,0.031,0.443,0.078,0.655V59.7c0,1.38,1.123,2.503,2.504,2.503h20.963
		c1.381,0,2.504-1.123,2.504-2.503v-7.911c0.047-0.211,0.078-0.429,0.078-0.654c0-0.227-0.031-0.444-0.078-0.655V38.736z
		 M18.396,44.104c0.127-0.029,0.258-0.049,0.393-0.049h7.119c0.949,0,1.721,0.771,1.721,1.721s-0.771,1.721-1.721,1.721h-7.119
		c-0.135,0-0.266-0.02-0.393-0.049V44.104z M39.361,52.807c-0.125,0.029-0.256,0.049-0.391,0.049h-7.117
		c-0.949,0-1.723-0.772-1.723-1.721c0-0.949,0.773-1.722,1.723-1.722h7.117c0.135,0,0.266,0.02,0.391,0.049V52.807z M39.361,42.804
		h-6.703l-3.129-3.129h-4.17v1.252h3.652l3.129,3.129h7.221v4.146c-0.129-0.018-0.256-0.039-0.391-0.039h-7.117
		c-1.641,0-2.973,1.333-2.973,2.973c0,1.639,1.332,2.972,2.973,2.972h7.117c0.135,0,0.262-0.021,0.391-0.039V59.7H18.398
		l-0.002-10.991c0.131,0.017,0.26,0.04,0.393,0.04h7.119c1.639,0,2.973-1.334,2.973-2.973c0-1.64-1.334-2.973-2.973-2.973h-7.119
		c-0.135,0-0.262,0.022-0.393,0.04v-4.107h0.002h20.963V42.804z"/>
	<path d="M90.988,19.337H9.012c-1.381,0-2.504,1.123-2.504,2.503v56.32c0,1.381,1.123,2.503,2.504,2.503h81.977
		c1.381,0,2.504-1.122,2.504-2.503V21.84C93.492,20.46,92.369,19.337,90.988,19.337z M9.012,78.16V21.84h81.977l0.002,56.32H9.012z"
		/>
	<path d="M81.289,29.35H19.336c-0.518,0-0.938,0.42-0.938,0.938s0.42,0.938,0.938,0.938h61.953c0.52,0,0.939-0.42,0.939-0.938
		S81.809,29.35,81.289,29.35z"/>
</g>
</svg><p>请提供额外的登录手续</p>';
	echo '<div id="hander"><div id="title">'.$info.'</div><div id="cont"><a href="javascript:window.location.reload();">重试</a></div></div><table id="info" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td align="center" valign="middle">'.$info2.'</td></tr></tbody></table><div id="foot">访问IP：'.$yashiserverc->Getip().'<br>环境：'.$yashiserverc->GetOs().'/'.$yashiserverc->GetBrowser().'<br>&copy;Yashi Server</div>';
	echo '<script>(function(d,e,j,h,f,c,b){d.GoogleAnalyticsObject=f;d[f]=d[f]||function(){(d[f].q=d[f].q||[]).push(arguments)},d[f].l=1*new Date();c=e.createElement(j),b=e.getElementsByTagName(j)[0];c.async=1;c.src=h;b.parentNode.insertBefore(c,b)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create","UA-74595381-1","auto");ga("send","pageview");</script>';
	echo '</body></html>';
	die();
}
?>
