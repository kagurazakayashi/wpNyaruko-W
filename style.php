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
    if ($wpNyarukoOption['wpNyarukoCursor'] && $wpNyarukoOption['wpNyarukoCursor'] != "") {
        echo "cursor: url('".$wpNyarukoOption['wpNyarukoCursor']."'), auto;";
    }
    ?>
}
a:link {
	color: #<?php echo $wpNyarukoOption['wpNyarukoColorH']; ?>;
	text-decoration: none;
    <?php
    if ($wpNyarukoOption['wpNyarukoHandCursor'] && $wpNyarukoOption['wpNyarukoHandCursor'] != "") {
        echo "cursor: url('".$wpNyarukoOption['wpNyarukoHandCursor']."'), auto;";
    }
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
        echo "width: calc(100% / 5);";
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
    cursor: pointer;
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
    cursor: pointer;
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
	cursor:pointer;
	user-select: none;
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
}
@media screen and (min-width: <?php echo $wpNyarukoOption['wpNyarukoPhone']; ?>px) {
	#rightbottommenubox {
		visibility: hidden;
	}
	.page {
		top: 600px;
	}
}
</style>
<?php } ?>