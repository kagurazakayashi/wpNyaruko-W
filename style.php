<?php 
function wpNyarukoGCSS($wpNyarukoOption) { ?>
<style>
body {
	margin: 0px;
	background-repeat: no-repeat;
    background-size: 100px 100px;
    background-color: #<?php echo $wpNyarukoOption['wpNyarukoColorBG']; ?>;
    color: #<?php echo $wpNyarukoOption['wpNyarukoColorT']; ?>;
    <?php 
    if ($wpNyarukoOption['wpNyarukoFont'] && $wpNyarukoOption['wpNyarukoFont'] != "") {
        echo "font-family: '".str_replace(",","','",$wpNyarukoOption['wpNyarukoFont'])."';";
    }
    if ($wpNyarukoOption['wpNyarukoFontSize'] && $wpNyarukoOption['wpNyarukoFontSize'] != "") {
        echo "font-size: ".$wpNyarukoOption['wpNyarukoFontSize']."px;";
    }
    ?>
	font-weight: extra-light,light,demi-light,medium;
	<?php
	echo "cursor: ";
    if ($wpNyarukoOption['wpNyarukoCursor'] && $wpNyarukoOption['wpNyarukoCursor'] != "") {
        echo "url('".$wpNyarukoOption['wpNyarukoCursor']."'), ";
    }
	echo "auto;";
    ?>
}
a:link {
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;
	text-decoration: none;
    <?php
	echo "cursor: ";
    if ($wpNyarukoOption['wpNyarukoHandCursor'] && $wpNyarukoOption['wpNyarukoHandCursor'] != "") {
        echo "url('".$wpNyarukoOption['wpNyarukoHandCursor']."'), ";
    }
	echo "auto;";
    ?>
}
a:visited {
	text-decoration: none;
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;
}
a:hover {
	text-decoration: none;
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;
}
a:active {
	text-decoration: none;
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;
}
h1 {
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH1']; ?>;
}
h2 {
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH2']; ?>;
}
h3 {
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH3']; ?>;
}
h4 {
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH4']; ?>;
}
/*顶端大图片*/
#bannerimg {
    position: relative;
    background-size: cover;
    width: 100%;
    height: 600px;
    background-color: #<?php echo $wpNyarukoOption['wpNyarukoColorBG']; ?>;
	overflow: hidden;
}
/*顶端大图片下端渐变*/
#bannerimg #bannerdw {
    position:absolute;
    left: 0px;
    bottom: 0px;
    width: 100%;
    height: 30%;
    background: linear-gradient(to bottom,rgba(255, 255, 255, 0) 0%,#<?php echo $wpNyarukoOption['wpNyarukoColorBG']; ?> 100%);
}
#bannerimg #mainmenubox li{
    float:left;
	width: <?php echo $wpNyarukoOption['wpNyarukoMenuItemW']; ?>px;
    <?php
    if (!$wpNyarukoOption['wpNyarukoMenuLeft'] || $wpNyarukoOption['wpNyarukoMenuLeft'] == "") {
		$mainmenu = wp_nav_menu(array(
			'container_id' => 'rightbottommenuboxff',
			'theme_location' => 'primary',
			'header-menu' => 'header-menu',
			'menu_id' => 'header-menu',
			'echo' => false,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 1
		));
        echo "width: calc(100% / ".substr_count($mainmenu,'<li').");";
    }
    ?>
}
#bannerimg #mainmenubox a:hover{
    color:#000;
    font-weight:bold;
    text-decoration:none;
    border-bottom: 5px solid #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
}
#rightbottommenuboxff .current-menu-item a {
	border-bottom: 5px solid #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
}
#rightbottommenuboxf a {
    display: block;
    line-height: 64px;
    text-align: center;
    text-decoration: none;
    background-color: #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
    color: #FFF;
    border-radius: 32px;
    width: 64px;
    height: 64px;
    font-size: 15px;
    <?php
	echo "cursor: ";
    if ($wpNyarukoOption['wpNyarukoHandCursor'] && $wpNyarukoOption['wpNyarukoHandCursor'] != "") {
        echo "url('".$wpNyarukoOption['wpNyarukoHandCursor']."'), ";
    }
	echo "pointer;";
    ?>
}
#rightbottommenuboxf a:hover {
    background-color: #<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;;
}
#rightbottommenuboxf #rightbottommenuswitch {
    display: block;
    width: 64px;
    height: 64px;
    background-color: #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
    border-radius: 32px;
    <?php
	echo "cursor: ";
    if ($wpNyarukoOption['wpNyarukoHandCursor'] && $wpNyarukoOption['wpNyarukoHandCursor'] != "") {
        echo "url('".$wpNyarukoOption['wpNyarukoHandCursor']."'), ";
    }
	echo "pointer;";
    ?>
}
#rightbottommenuboxf #rightbottommenuswitch:hover {
    background-color: #<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;
}
/*右上随机文字*/
#bannerimg #sentence {
    position:absolute;
    top: 45px;
    right: 20px;
    width: auto;
    height: auto;
    color: #000;
    text-shadow:#FFF 1px 0 0,#FFF 0 1px 0,#FFF -1px 0 0,#FFF 0 -1px 0;
    text-align: right;
    background-color: transparent;
    echo "font-size: ".$wpNyarukoOption['wpNyarukoFontSize']."px;";
}
#bannerimg #sentence:hover {
    text-shadow: none;
	background-color: rgba(255,255,255,0.8);
}

.lanleftdiv{
	background-color: #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
	width:10px;
	height:200px;
	position:relative;
	float:left;
}
.lancenterdiv .lcdtop{
	background-color: #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
	width:70px;
	height:30px;
	line-height:30px;
	text-align:center;
	margin-left:20px;
	font-size:14px;
	color:#fff;
	border-radius:0px 0px 5px 5px;
}
.lancenterdiv .lcdtop a {
	color: #FFF;
}
/*文章块*/
.blockbdiv{
	width:310px;
	height:400px;
	background: #<?php echo $wpNyarukoOption['wpNyarukoColorL']; ?>;
	box-shadow:0px 3px 5px lightgray;
	border-radius: 4px;
	overflow: hidden;
	position:absolute;
	user-select: none;
	<?php
	echo "cursor: ";
    if ($wpNyarukoOption['wpNyarukoHandCursor'] && $wpNyarukoOption['wpNyarukoHandCursor'] != "") {
        echo "url('".$wpNyarukoOption['wpNyarukoHandCursor']."'), ";
    }
	echo "pointer;";
    ?>
}
.blockbdiv:hover {
	box-shadow:0px 3px 5px gray;
	background: #<?php echo $wpNyarukoOption['wpNyarukoColorLL']; ?>;
}
.blocktopdiv .topline{
	width:100%;
	height:10px;
	line-height: 10px;
	background-color: #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
	position:absolute;
	top:0;
	text-align:right;
	font-size:6px;
	color:#fff;
}
.blocktopdiv .toptags{
	background-color: #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
	width:70px;
	height:30px;
	line-height:30px;
	text-align:center;
	margin-left:10px;
	font-size:14px;
	border-radius:0px 0px 5px 5px;
	position:absolute;
	top:5px;
	color:#fff;
}
.blocktopdiv .toptags a{
	color:#fff;
}
.blockbottomdiv .bottomtitle{
	width:300px;
	max-width:310px;
	text-align:center;
	font-size:20px;
	font-weight:bold;
	text-overflow:ellipsis;
	white-space:nowrap;
	overflow: hidden;
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH1']; ?>;
}
.blockbottomdiv .bottomcontent{
	width:300px;
	height:193px;
	word-break:break-all;
	overflow:hidden;
	font-size:13px;
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorT']; ?>;
}
#singleleftdiv{
	width: 10px;
	min-height: 90px;
	background-color: #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
	float: left;
}

#singlerightdiv{
	border-left: 10px solid #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
	height: 100%;
}
#srdtop{
	padding-left: 5px;
	padding-right: 5px;
	border-radius: 0px 10px 10px 0px;
	background-color: #<?php echo $wpNyarukoOption['wpNyarukoColor']; ?>;
	color: #fff;
	float: left;
}
/*评论区*/
.commitbgDiv .cellrep {
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: transparent;
	border-radius: 50px;
	line-height: 100%;
	color: #FFF;
	text-align: center;
	user-select: none;
	font-size: 20px;
	<?php
	echo "cursor: ";
    if ($wpNyarukoOption['wpNyarukoHandCursor'] && $wpNyarukoOption['wpNyarukoHandCursor'] != "") {
        echo "url('".$wpNyarukoOption['wpNyarukoHandCursor']."'), ";
    }
	echo "pointer;";
    ?>
}
.commitbgDiv .tl{
	height: 16px;
	color:#<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;
	font-size:8px;
	margin-left:73px;
}
.commitbgDiv .l2 .ls{
	background-color:#<?php echo $wpNyarukoOption['wpNyarukoColorCommentBG']; ?>;
	color:#<?php echo $wpNyarukoOption['wpNyarukoColorT']; ?>;
	min-height:50px;
	border-radius:5px;
	padding:5px;
	float:left;
	margin-left:-1px;
	/*box-shadow: 2px 2px 2px gray;*/
}
.commitbgDiv .l2 .ld{
	float:left;
	margin-top:7px;
	width: 0;
	height: 0;
	border-top: 5px solid transparent;
	border-right: 8px solid #<?php echo $wpNyarukoOption['wpNyarukoColorCommentBG']; ?>;
	border-bottom: 5px solid transparent;
}
.commitbgDiv .tr{
	height: 16px;
	text-align:right;
	color:#<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;
	font-size:8px;
	margin-right:73px;
}
.commitbgDiv .r2 .rs{
	background-color:#<?php echo $wpNyarukoOption['wpNyarukoColorCommentBG2']; ?>;
	color:#<?php echo $wpNyarukoOption['wpNyarukoColorT']; ?>;
	min-height:50px;
	border-radius:5px;
	padding:5px;
	float:right;
	/*box-shadow: -2px 2px 2px gray;*/
}
.commitbgDiv .r2 .rd{
	float:right;
	margin-top:7px;
	width: 0;
    height: 0;
    border-top: 5px solid transparent;
    border-left: 8px solid #<?php echo $wpNyarukoOption['wpNyarukoColorCommentBG2']; ?>;
    border-bottom: 5px solid transparent;
}
/*正文区域*/
#srdcontentbox {
	position:relative;
	left: <?php echo $wpNyarukoOption['wpNyarukoMarginLR']; ?>%;
	width: <?php echo (100 - (int)$wpNyarukoOption['wpNyarukoMarginLR'] * 2); ?>%;
}
#srdcontent{
	width: 100%;
	max-width: 100%;
	height: auto;
	word-wrap: break-word;
	padding-top: <?php echo $wpNyarukoOption['wpNyarukoMarginTB']; ?>px;
	padding-bottom: <?php echo $wpNyarukoOption['wpNyarukoMarginTB']; ?>px;
	color: #000;
	text-align: left;
	overflow: hidden;
}
/*评论区域*/
#sentcomment {
	width: 100px;
	height: 50px;
	border-radius:5px;
	border-style: solid none none none;
	border-top-color: #FFF;
}
#commentform input {
	border-style: none none solid none;
	border-bottom-color: #<?php echo $wpNyarukoOption['wpNyarukoColorCommentBG']; ?>;
}
#commentd {
	background-color: #<?php echo $wpNyarukoOption['wpNyarukoColorCommentBG']; ?>;
}
/*响应式布局*/
@media screen and (max-width: <?php echo $wpNyarukoOption['wpNyarukoPad']; ?>px) {
	#bannerimg #mainmenubox {
		width: 100%;
		border-top-left-radius: 0px;
		border-bottom-left-radius: 0px;
	}
	#foot #footbox {
		width: 100%;
		border-top-right-radius: 0px;
		border-bottom-right-radius: 0px;
	}
	/*滚动图片*/
	#scrollpic {
		width: 100%;
	}
	/*头条列表*/
	#scrolltext, #scrolltextsingle {
		width: 100%;
	}
	#singlebdiv{
		border-top-right-radius: 0px;
	}
}
@media screen and (max-width: <?php echo $wpNyarukoOption['wpNyarukoPhone']; ?>px) {
	#bannerimg #mainmenubox {
		visibility: hidden;
	}
	#bannerimg #sentence {
		top: 130px;
		right: auto;
		left: 20px;
	}
	#bannerimg {
		height: 300px;
	}
	.page {
		top: 300px;
	}
	/*滚动图片*/
	#scrollpic {
		width: 100%;
	}
	/*头条列表*/
	#scrolltext {
		width: 100%;
		display: none;
	}
	#commentd {
		min-width: 130px;
	}
	#newls {
		min-width: 130px;
	}
}
@media screen and (min-width: <?php echo $wpNyarukoOption['wpNyarukoPhone']; ?>px) {
	#rightbottommenubox {
		visibility: hidden;
	}
	.page {
		top: 600px;
	}
	#commentd {
		min-width: 480px;
	}
	#newls {
		min-width: 480px;
	}
}
</style>
<?php } ?>