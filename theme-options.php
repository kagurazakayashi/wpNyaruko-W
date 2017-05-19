<?php 
add_action('admin_init', 'register_theme_settings');
function register_theme_settings() {
    register_setting("theme_mods_wpNyaruko","theme_mods_wpNyaruko");
}
add_action('admin_menu', 'add_theme_options_menu');
function add_theme_options_menu() {
    add_theme_page('wpNyaruko Theme Options','wpNyaruko 主题选项','edit_theme_options','theme-options', 'theme_settings_admin');
}
function theme_settings_admin() {
?>
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/style-admin.css" type="text/css" media="screen" /><img id="optionbg" class="optionfull" src="<?php bloginfo("template_url") ?>/nya.jpg" /></div><div id="optionbg2" class="optionfull"></div>
<div id="optionbox">
    <h1>wpNyaruko 主题首选项</h1><hr>
    <table border="0" cellspacing="0" cellpadding="10">
    <tbody>
    <tr>
      <td>标题图片网址</td>
      <td><input name="textfield" type="text" id="textfield" value="/yashi/wp-content/uploads/2017/05/yaship.gif" size="64" maxlength="128"></td>
    </tr>
    <tr>
      <td>主题前景色</td>
      <td><input name="textfield" type="text" id="textfield" value="#FE99CC" size="7" maxlength="7"></td>
    </tr>
    <tr>
      <td>随机图片扫描文件夹</td>
      <td>~/wp-content/uploads/<input name="textfield" type="text" id="textfield" value="wallpaper/" size="32" maxlength="100"></td>
    </tr>
    <tr>
      <td>随机文字查询表</td>
      <td><input name="textfield" type="text" id="textfield" value="yashisentence" size="32" maxlength="100">(留空可禁用)</td>
    </tr>
    <tr>
      <td>随机文字搜索引擎名称</td>
      <td><input name="textfield" type="text" id="textfield" value="萌娘百科" size="15" maxlength="30"></td>
    </tr>
    <tr>
      <td>随机文字搜索引擎接口</td>
      <td><input name="textfield" type="text" id="textfield" value="https://zh.moegirl.org/" size="32" maxlength="100">关键字</td>
    </tr>
    <tr>
      <td>RSS 订阅</td>
      <td><input name="textfield" type="checkbox" id="textfield" checked="true">文章　<input name="textfield" type="checkbox" id="textfield" checked="true">评论</td>
    </tr>
    <tr>
      <td>自定义 jQuery 路径</td>
      <td><input name="textfield" type="text" id="textfield" value="/lib/jQuery/jquery.min.js" size="32" maxlength="100"></td>
    </tr>
    <tr>
      <td>页头信息</td>
      <td><textarea name="textfield" cols="64" rows="10" maxlength="2000" id="textfield"><meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="abstract" content="KagurazakaYashi 神楽坂雅詩 BLOG">
<meta name="author" content="cxchope">
<meta name="classification" content="Personal website, Blog">
<meta name="copyright" content="Copyright KagurazakaYashi, All rights Reserved.">
<meta name="designer" content="KagurazakaYashi">
<meta name="distribution" content="Global">
<meta name="language" content="zh-CN">
<meta name="publisher" content="KagurazakaYashi 神楽坂雅詩">
<meta name="rating" content="General">
<meta name="resource-type" content="Document">
<meta name="revisit-after" content="7">
<meta name="subject" content="Blog">
<meta name="template" content="Yashi">
<meta name="server" content="YashiServer-BJA">
<meta name="theme-color" content="#FE99CC">
<link rel="shortcut icon" href="/yashi/favicon.ico">
<link rel="icon" href="/yashi/resources/Android-192.png" />
<link rel="apple-touch-icon" href="/yashi/resources/iPhone3x-180.png" />
<link rel="apple-touch-icon-precomposed" href="/yashi/resources/iPhone3x-180.png" />
      </textarea></td>
    </tr>
    <tr>
      <td>页脚内容</td>
      <td><textarea name="textfield" cols="64" rows="10" maxlength="2000" id="textfield">本站部分资源来自网络转载,版权归原作者所有,如果有侵犯到您的权益,请联系我删除,谢谢！<a title="前往留言板" target="_blank" href="https://github.com/kagurazakayashi/kagurazakayashi.github.com/issues">Contact webmaster</a> | 版权所有 &copy; 2017 神楽坂雅詩 | Powered By <a rel="external" title="WordPress主页" target="_blank" class="link" href="http://wordpress.org/">WordPress</a> | <a title="开源是一种态度" target="_blank" href="https://github.com/cxchope/wpNyaruko-W">wpNyaruko-W</a> Theme by <a title="神楽坂雅詩的个人网站" target="_blank" href="/yashi">KagurazakaYashi</a> | 推荐使用最新版本的<a href="https://www.google.com/chrome" target="_blank">Chrome</a>浏览器访问 | 可能会向你的计算机中写入Cookie，详情请阅读<a id="showprivacy" class="linkbtn" href="javascript:showprivacy();">网站隐私权声明</a> | 可以在<a href="https://github.com/kagurazakayashi/" target="_blank">我的GitHub</a>上查阅本网站的<a href="https://github.com/kagurazakayashi/kagurazakayashi.github.com/commits/master" target="_blank">源码</a> | <span id="icpid"></span><script type="text/javascript" src="/analytics.js"></script>
      </textarea></td>
    </tr>
  </tbody>
    </table>
    <hr><p><input id="submitoption" type="submit" name="input_save" value="应用这些设定" />　　<a title="开源是一种态度" target="_blank" href="https://github.com/cxchope/wpNyaruko-W" target="_blank">Github</a></p>
</div>
<?php
}
//add_action('admin_menu', 'init');
?>