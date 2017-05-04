<?php
/*
Plugin Name: Kagurazaka Yashi
Plugin URI:
Description: yoooooooooo.com
Version:0.1
Author:
Author URI:
*/

if (!class_exists("yashiserverc")) {
	class yashiserverc {
		// Ram using calc
		public function MemCalcs() {
			$memlimit = ini_get('memory_limit') ;
			$memused = round(memory_get_usage() / 1024 / 1024, 2);
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
			}else{return "未知";}
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
			 }else{return "未知";}
			}

			////获得访客真实ip
			function Getip(){
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
	add_action('wp_before_admin_bar_render', array(&$yashiserverc, 'Print_Admin_Bar'));
}
?>
