<?php 
function getOptions() {
    $wpNyarukoOption = get_option('wpNyaruko_options'); //SELECT * FROM `cxc_options` WHERE `option_name` = 'wpNyaruko_options'
    if (!is_array($wpNyarukoOption)) {
        $wpNyarukoOption['wpNyarukoTest'] = '此处可以任意填写一些笔记';
        $wpNyarukoOption['wpNyarukoLogo'] = '/wp-content/uploads/logo.png';
        $wpNyarukoOption['wpNyarukoColor'] = 'FE99CC';
        $wpNyarukoOption['wpNyarukoColorH'] = 'CC00FF';
        $wpNyarukoOption['wpNyarukoColorT'] = '000000';
        $wpNyarukoOption['wpNyarukoColorI'] = 'FFFFFF';
        $wpNyarukoOption['wpNyarukoColorH1'] = 'CC00FF';
        $wpNyarukoOption['wpNyarukoColorH2'] = 'CC00FF';
        $wpNyarukoOption['wpNyarukoColorH3'] = 'FE99CC';
        $wpNyarukoOption['wpNyarukoColorH4'] = '000000';
        $wpNyarukoOption['wpNyarukoColorBG'] = 'FFFFFF';
        $wpNyarukoOption['wpNyarukoColorL'] = 'FFF0F5';
        $wpNyarukoOption['wpNyarukoColorLL'] = 'FFF0F5';
        $wpNyarukoOption['wpNyarukoColorCommentBG'] = '#FFCCFF';
        $wpNyarukoOption['wpNyarukoColorCommentBG2'] = '#FF99FF';
        $wpNyarukoOption['wpNyarukoMarginTB'] = '80';
        $wpNyarukoOption['wpNyarukoMarginLR'] = '10';
        $wpNyarukoOption['wpNyarukoCursor'] = '';
        $wpNyarukoOption['wpNyarukoHandCursor'] = '';
        $wpNyarukoOption['wpNyarukoMenuLeft'] = 'off';
        $wpNyarukoOption['wpNyarukoMenuItemW'] = '90';
        $wpNyarukoOption['wpNyarukoPad'] = '950';
        $wpNyarukoOption['wpNyarukoPhone'] = '750';
        $wpNyarukoOption['wpNyarukoPicDir'] = 'wallpaper';
        $wpNyarukoOption['wpNyarukoTextTable'] = 'sentence';
        $wpNyarukoOption['wpNyarukoSearchName'] = '百度';
        $wpNyarukoOption['wpNyarukoSearchURL'] = 'https://www.baidu.com/s?ie=UTF-8&wd=';
        $wpNyarukoOption['wpNyarukoFont'] = '思源黑体,Source Han Sans,苹方黑体,PingFang SC,冬青黑体,Hiragino Sans GB,微软雅黑,Microsoft YaHei,Hiragino Sans GB,STHeiti Light,SimHei';
        $wpNyarukoOption['wpNyarukoFontSize'] = '13';
        $wpNyarukoOption['wpNyarukoIndexKeywords'] = '';
        $wpNyarukoOption['wpNyarukoRSSArticle'] = 'on';
        $wpNyarukoOption['wpNyarukoRSSComment'] = '';
        $wpNyarukoOption['wpNyarukoJQ'] = '/lib/jQuery/jquery.min.js';
        $wpNyarukoOption['wpNyarukoCommentMode'] = '';
        $wpNyarukoOption['wpNyarukoGravatarProxyPage'] = '';
        $wpNyarukoOption['wpNyarukoGravatarProxy'] = '';
        $wpNyarukoOption['wpNyarukoCommentBox'] = '正在加载 Disqus 评论……';
        $wpNyarukoOption['wpNyarukoCommentTitle'] = '<b>评论区</b>（如果看不到，请先想办法访问谷歌233）';
        $wpNyarukoOption['wpNyarukoHeader'] = '<meta name="copyright" content="Copyright xxx, All rights Reserved.">';
        $wpNyarukoOption['wpNyarukoFooter'] = '版权所有 &copy; 。自豪地使用 <a rel="external" title="WordPress主页" target="_blank" class="link" href="http://wordpress.org/">WordPress</a> 。使用 <a title="开源是一种态度" target="_blank" href="https://github.com/kagurazakayashi/wpNyaruko-W">wpNyaruko-W</a> 作为本站主题。<!--备案号--><!--统计代码-->';
        $wpNyarukoOption['wpNyarukoScrollpic'] = '此处为自定义HTML，右侧是一个小工具区';
        $wpNyarukoOption['wpNyarukoScrollpicSC'] = '';
        $wpNyarukoOption['wpNyarukoCommentSysIco'] = 'on';
        $wpNyarukoOption['wpNyarukoCommentSysIcoInfo'] = 'on';
        $wpNyarukoOption['wpNyarukoPHPDebug'] = '';
        $wpNyarukoOption['wpNyarukoConsoleLog'] = '欢迎光临我的博客！页面生成用时：';
        $wpNyarukoOption['wpNyarukoConsoleLogT'] = 'on';
        $wpNyarukoOption['wpNyarukoSVG'] = 'on';
        $wpNyarukoOption['wpNyarukoBanBrowser'] = '';
        $wpNyarukoOption['wpNyarukoWordlimit'] = '85';
        $wpNyarukoOption['wpNyarukoWLInfo'] = '...[点击阅览全文]';
        update_option('wpNyaruko_options', $wpNyarukoOption);
        die('<div id="wpNyarukoInfo" style="text-align: center; width: 100%; height: 25px; line-height: 25px; border-radius: 0px 0px 5px 5px; overflow: hidden; background-color: yellow; box-shadow: 0px 0px 5px gray; font-size: 12px;">欢迎使用 wpNyaruko 主题，请先完成初始设定。<a href="themes.php?page=theme-options.php">现在开始</a></div>');
    }
    return $wpNyarukoOption;
}
function init() {
  if (is_admin()) {
    if(isset($_GET['reset'])) {
      delete_option('wpNyaruko_options');
    }
    if(isset($_POST['input_save'])) {
        $wpNyarukoOption = getOptions();
        @$wpNyarukoOption['wpNyarukoTest'] = stripslashes($_POST['wpNyarukoTest']);
        @$wpNyarukoOption['wpNyarukoLogo'] = stripslashes($_POST['wpNyarukoLogo']);
        @$wpNyarukoOption['wpNyarukoColor'] = stripslashes($_POST['wpNyarukoColor']);
        @$wpNyarukoOption['wpNyarukoColorH'] = stripslashes($_POST['wpNyarukoColorH']);
        @$wpNyarukoOption['wpNyarukoColorT'] = stripslashes($_POST['wpNyarukoColorT']);
        @$wpNyarukoOption['wpNyarukoColorI'] = stripslashes($_POST['wpNyarukoColorI']);
        @$wpNyarukoOption['wpNyarukoColorH1'] = stripslashes($_POST['wpNyarukoColorH1']);
        @$wpNyarukoOption['wpNyarukoColorH2'] = stripslashes($_POST['wpNyarukoColorH2']);
        @$wpNyarukoOption['wpNyarukoColorH3'] = stripslashes($_POST['wpNyarukoColorH3']);
        @$wpNyarukoOption['wpNyarukoColorH4'] = stripslashes($_POST['wpNyarukoColorH4']);
        @$wpNyarukoOption['wpNyarukoColorBG'] = stripslashes($_POST['wpNyarukoColorBG']);
        @$wpNyarukoOption['wpNyarukoColorL'] = stripslashes($_POST['wpNyarukoColorL']);
        @$wpNyarukoOption['wpNyarukoColorLL'] = stripslashes($_POST['wpNyarukoColorLL']);
        @$wpNyarukoOption['wpNyarukoCursor'] = stripslashes($_POST['wpNyarukoCursor']);
        @$wpNyarukoOption['wpNyarukoHandCursor'] = stripslashes($_POST['wpNyarukoHandCursor']);
        @$wpNyarukoOption['wpNyarukoMenuLeft'] = stripslashes($_POST['wpNyarukoMenuLeft']);
        @$wpNyarukoOption['wpNyarukoMenuItemW'] = stripslashes($_POST['wpNyarukoMenuItemW']);
        @$wpNyarukoOption['wpNyarukoPad'] = stripslashes($_POST['wpNyarukoPad']);
        @$wpNyarukoOption['wpNyarukoPhone'] = stripslashes($_POST['wpNyarukoPhone']);
        @$wpNyarukoOption['wpNyarukoPicDir'] = stripslashes($_POST['wpNyarukoPicDir']);
        @$wpNyarukoOption['wpNyarukoTextTable'] = stripslashes($_POST['wpNyarukoTextTable']);
        @$wpNyarukoOption['wpNyarukoSearchName'] = stripslashes($_POST['wpNyarukoSearchName']);
        @$wpNyarukoOption['wpNyarukoSearchURL'] = stripslashes($_POST['wpNyarukoSearchURL']);
        @$wpNyarukoOption['wpNyarukoFont'] = stripslashes($_POST['wpNyarukoFont']);
        @$wpNyarukoOption['wpNyarukoFontSize'] = stripslashes($_POST['wpNyarukoFontSize']);
        @$wpNyarukoOption['wpNyarukoIndexKeywords'] = stripslashes($_POST['wpNyarukoIndexKeywords']);
        @$wpNyarukoOption['wpNyarukoRSSArticle'] = stripslashes($_POST['wpNyarukoRSSArticle']);
        @$wpNyarukoOption['wpNyarukoRSSComment'] = stripslashes($_POST['wpNyarukoRSSComment']);
        @$wpNyarukoOption['wpNyarukoJQ'] = stripslashes($_POST['wpNyarukoJQ']);
        @$wpNyarukoOption['wpNyarukoCommentMode'] = stripslashes($_POST['wpNyarukoCommentMode']);
        @$wpNyarukoOption['wpNyarukoCommentBox'] = stripslashes($_POST['wpNyarukoCommentBox']);
        @$wpNyarukoOption['wpNyarukoCommentTitle'] = stripslashes($_POST['wpNyarukoCommentTitle']);
        @$wpNyarukoOption['wpNyarukoHeader'] = stripslashes($_POST['wpNyarukoHeader']);
        @$wpNyarukoOption['wpNyarukoFooter'] = stripslashes($_POST['wpNyarukoFooter']);
        @$wpNyarukoOption['wpNyarukoScrollpic'] = stripslashes($_POST['wpNyarukoScrollpic']);
        @$wpNyarukoOption['wpNyarukoGravatarProxyPage'] = stripslashes($_POST['wpNyarukoGravatarProxyPage']);
        @$wpNyarukoOption['wpNyarukoGravatarProxy'] = stripslashes($_POST['wpNyarukoGravatarProxy']);
        @$wpNyarukoOption['wpNyarukoCommentSysIco'] = stripslashes($_POST['wpNyarukoCommentSysIco']);
        @$wpNyarukoOption['wpNyarukoCommentSysIcoInfo'] = stripslashes($_POST['wpNyarukoCommentSysIcoInfo']);
        @$wpNyarukoOption['wpNyarukoPHPDebug'] = stripslashes($_POST['wpNyarukoPHPDebug']);
        @$wpNyarukoOption['wpNyarukoColorCommentBG'] = stripslashes($_POST['wpNyarukoColorCommentBG']);
        @$wpNyarukoOption['wpNyarukoColorCommentBG2'] = stripslashes($_POST['wpNyarukoColorCommentBG2']);
        @$wpNyarukoOption['wpNyarukoMarginTB'] = stripslashes($_POST['wpNyarukoMarginTB']);
        @$wpNyarukoOption['wpNyarukoMarginLR'] = stripslashes($_POST['wpNyarukoMarginLR']);
        @$wpNyarukoOption['wpNyarukoConsoleLog'] = stripslashes($_POST['wpNyarukoConsoleLog']);
        @$wpNyarukoOption['wpNyarukoConsoleLogT'] = stripslashes($_POST['wpNyarukoConsoleLogT']);
        @$wpNyarukoOption['wpNyarukoSVG'] = stripslashes($_POST['wpNyarukoSVG']);
        @$wpNyarukoOption['wpNyarukoBanBrowser'] = stripslashes($_POST['wpNyarukoBanBrowser']);
        @$wpNyarukoOption['wpNyarukoWordlimit'] = stripslashes($_POST['wpNyarukoWordlimit']);
        @$wpNyarukoOption['wpNyarukoWLInfo'] = stripslashes($_POST['wpNyarukoWLInfo']);
        @$wpNyarukoOption['wpNyarukoScrollpicSC'] = stripslashes($_POST['wpNyarukoScrollpicSC']);
        update_option('wpNyaruko_options', $wpNyarukoOption);
    } else {
        getOptions();
    }
  }
    add_theme_page('wpNyaruko Theme Options','wpNyaruko 主题选项', 'edit_themes', basename(__FILE__),  'display');
}
function display() {
?>
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/style-admin.css" type="text/css" media="screen" /><img id="optionbg" class="optionfull" src="<?php bloginfo("template_url") ?>/nya.jpg" /></div><div id="optionbg2" class="optionfull"></div>
<div id="optionbox">
<?php 
  if(isset($_POST['input_save'])) {
    echo '<div id="wpNyarukoInfo">已受理您的变更。</div>';
  }
?>
<h1>wpNyaruko 主题首选项</h1><hr>
<?php
if(!is_admin()) {
  echo '<p>欢迎使用 wpNyaruko 主题，<br/>请使用管理员权限登录来继续设置。</p><hr><p>';
} else {
  $wpNyarukoOption = getOptions();
?>
<form action="#" method="post" enctype="multipart/form-data" name="op_form" id="op_form">
    <table border="0" cellspacing="0" cellpadding="10">
    <tbody>
    <tr>
      <td>笔记(不呈现)</td>
      <td><input name="wpNyarukoTest" type="text" id="wpNyarukoTest" value="<?php echo(@$wpNyarukoOption['wpNyarukoTest']); ?>" size="64" maxlength="128" /></td>
    </tr>
    <tr>
      <td>标题图片网址</td>
      <td><input name="wpNyarukoLogo" type="text" id="wpNyarukoLogo" value="<?php echo(@$wpNyarukoOption['wpNyarukoLogo']); ?>" size="64" maxlength="128" /></td>
    </tr>
    <tr>
      <td>首选字体(用,分隔)</td>
      <td><input name="wpNyarukoFont" type="text" id="wpNyarukoFont" value="<?php echo(@$wpNyarukoOption['wpNyarukoFont']); ?>" size="38" maxlength="300" />　字号：<input name="wpNyarukoFontSize" type="text" id="wpNyarukoFontSize" value="<?php echo(@$wpNyarukoOption['wpNyarukoFontSize']); ?>" size="2" maxlength="2" />像素 (留空为自动)</td>
    </tr>
    <tr>
      <td>主题色</td>
      <td>修饰：#<input name="wpNyarukoColor" type="text" id="wpNyarukoColor" value="<?php echo(@$wpNyarukoOption['wpNyarukoColor']); ?>" size="6" maxlength="6" />　强调：#<input name="wpNyarukoColorH" type="text" id="wpNyarukoColorH" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorH']); ?>" size="6" maxlength="6" />　文本：#<input name="wpNyarukoColorT" type="text" id="wpNyarukoColorT" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorT']); ?>" size="6" maxlength="6" />　内嵌：#<input name="wpNyarukoColorI" type="text" id="wpNyarukoColorI" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorI']); ?>" size="6" maxlength="6" /></td>
    </tr>
    <tr>
      <td>页面色</td>
      <td>网页背景：#<input name="wpNyarukoColorBG" type="text" id="wpNyarukoColorBG" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorBG']); ?>" size="6" maxlength="6" />　列表项：#<input name="wpNyarukoColorL" type="text" id="wpNyarukoColorL" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorL']); ?>" size="6" maxlength="6" />　当前列表项：#<input name="wpNyarukoColorLL" type="text" id="wpNyarukoColorLL" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorLL']); ?>" size="6" maxlength="6" />
    </tr>
    <tr>
      <td>标题色</td>
      <td>一级：#<input name="wpNyarukoColorH1" type="text" id="wpNyarukoColorH1" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorH1']); ?>" size="6" maxlength="6" />　二级：#<input name="wpNyarukoColorH2" type="text" id="wpNyarukoColorH2" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorH2']); ?>" size="6" maxlength="6" />　三级：#<input name="wpNyarukoColorH3" type="text" id="wpNyarukoColorH3" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorH3']); ?>" size="6" maxlength="6" />　四级：#<input name="wpNyarukoColorH4" type="text" id="wpNyarukoColorH4" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorH4']); ?>" size="6" maxlength="6" /></td>
    </tr>
    <tr>
      <td>评论色</td>
      <td>评论：#<input name="wpNyarukoColorCommentBG" type="text" id="wpNyarukoColorCommentBG" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorCommentBG']); ?>" size="6" maxlength="6" />　回复：#<input name="wpNyarukoColorCommentBG2" type="text" id="wpNyarukoColorCommentBG2" value="<?php echo(@$wpNyarukoOption['wpNyarukoColorCommentBG2']); ?>" size="6" maxlength="6" /></td>
    </tr>
    <tr>
      <td>矢量图形</td>
      <td><input name="wpNyarukoSVG" type="checkbox" id="wpNyarukoSVG" <?php if(@$wpNyarukoOption['wpNyarukoSVG']!='')echo('checked'); ?> />使用 svg 矢量图形（替换 png ，但部分浏览器不支持 svg ）</td>
    </tr>
    <tr>
      <td>文章概览</td>
      <td>文章列表中只预览前<input name="wpNyarukoWordlimit" type="text" id="wpNyarukoWordlimit" value="<?php echo(@$wpNyarukoOption['wpNyarukoWordlimit']); ?>" size="3" maxlength="3" />个字，并在后面添加<input name="wpNyarukoWLInfo" type="text" id="wpNyarukoWLInfo" value="<?php echo(@$wpNyarukoOption['wpNyarukoWLInfo']); ?>" size="20" maxlength="20" /></td>
    </tr>
    <tr>
      <td>文章正文内边距</td>
      <td>上下边距：<input name="wpNyarukoMarginTB" type="text" id="wpNyarukoMarginTB" value="<?php echo(@$wpNyarukoOption['wpNyarukoMarginTB']); ?>" size="4" maxlength="4" />像素　左右边距：<input name="wpNyarukoMarginLR" type="text" id="wpNyarukoMarginLR" value="<?php echo(@$wpNyarukoOption['wpNyarukoMarginLR']); ?>" size="3" maxlength="3" />%</td>
    </tr>
    <tr>
      <td>自定义鼠标指针</td>
      <td><input name="wpNyarukoCursor" type="text" id="wpNyarukoCursor" value="<?php echo(@$wpNyarukoOption['wpNyarukoCursor']); ?>" size="32" maxlength="100" />(cur文件,留空为默认)</td>
    </tr>
    <tr>
      <td>自定义手形指针</td>
      <td><input name="wpNyarukoHandCursor" type="text" id="wpNyarukoHandCursor" value="<?php echo(@$wpNyarukoOption['wpNyarukoHandCursor']); ?>" size="32" maxlength="100" />(cur文件,留空为默认)</td>
    </tr>
    <tr>
      <td>主选单项布局</td>
      <td><input name="wpNyarukoMenuLeft" type="checkbox" id="wpNyarukoMenuLeft" <?php if(@$wpNyarukoOption['wpNyarukoMenuLeft']!='')echo('checked'); ?> />使用左对齐而不是分散对齐，每个菜单项宽度<input name="wpNyarukoMenuItemW" type="text" id="wpNyarukoMenuItemW" value="<?php echo(@$wpNyarukoOption['wpNyarukoMenuItemW']); ?>" size="3" maxlength="3" />像素</td>
    </tr>
    <tr>
      <td>响应式布局</td>
      <td>低于<input name="wpNyarukoPad" type="text" id="wpNyarukoPad" value="<?php echo(@$wpNyarukoOption['wpNyarukoPad']); ?>" size="4" maxlength="4" />像素时显示平板布局，低于<input name="wpNyarukoPhone" type="text" id="wpNyarukoPhone" value="<?php echo(@$wpNyarukoOption['wpNyarukoPhone']); ?>" size="3" maxlength="3" />像素时显示手机布局</td>
    </tr>
    <tr>
      <td>响应式加载</td>
      <td>滚动到页面底部时自动加载<input name="wpNyarukoAutoLoad" type="text" id="wpNyarukoAutoLoad" value="10" size="3" maxlength="3" disabled="true" />篇文章，最多加载<input name="wpNyarukoAutoLoadI" type="text" id="wpNyarukoAutoLoadI" value="-1" size="3" maxlength="3" disabled="true" />次</td>
    </tr>
    <tr>
      <td>随机图片扫描文件夹</td>
      <td>~/wp-content/uploads/<input name="wpNyarukoPicDir" type="text" id="wpNyarukoPicDir" value="<?php echo(@$wpNyarukoOption['wpNyarukoPicDir']); ?>" size="32" maxlength="100" />/</td>
    </tr>
    <tr>
      <td>随机文字查询表</td>
      <td><input name="wpNyarukoTextTable" type="text" id="wpNyarukoTextTable" value="<?php echo(@$wpNyarukoOption['wpNyarukoTextTable']); ?>" size="32" maxlength="100" />(留空可禁用)</td>
    </tr>
    <tr>
      <td>随机文字搜索引擎名称</td>
      <td><input name="wpNyarukoSearchName" type="text" id="wpNyarukoSearchName" value="<?php echo(@$wpNyarukoOption['wpNyarukoSearchName']); ?>" size="15" maxlength="30" /></td>
    </tr>
    <tr>
      <td>随机文字搜索引擎接口</td>
      <td><input name="wpNyarukoSearchURL" type="text" id="wpNyarukoSearchURL" value="<?php echo(@$wpNyarukoOption['wpNyarukoSearchURL']); ?>" size="40" maxlength="100" />关键字</td>
    </tr>
    <tr>
      <td>主页关键字</td>
      <td><input name="wpNyarukoIndexKeywords" type="text" id="wpNyarukoIndexKeywords" value="<?php echo(@$wpNyarukoOption['wpNyarukoIndexKeywords']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>RSS 订阅</td>
      <td><input name="wpNyarukoRSSArticle" type="checkbox" id="wpNyarukoRSSArticle" <?php if(@$wpNyarukoOption['wpNyarukoRSSArticle']!='')echo('checked'); ?> />文章　<input name="wpNyarukoRSSComment" type="checkbox" id="wpNyarukoRSSComment" <?php if(@$wpNyarukoOption['wpNyarukoRSSComment']!='')echo('checked'); ?> />评论</td>
    </tr>
    <tr>
      <td>自定义 jQuery 路径</td>
      <td><input name="wpNyarukoJQ" type="text" id="wpNyarukoJQ" value="<?php echo(@$wpNyarukoOption['wpNyarukoJQ']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>Gravatar代理页面</td>
      <td><input name="wpNyarukoGravatarProxyPage" type="text" id="wpNyarukoGravatarProxyPage" value="<?php echo(@$wpNyarukoOption['wpNyarukoGravatarProxyPage']); ?>" size="40" maxlength="100" />(指向 t_gravatar 模板页面)</td>
    </tr>
    <tr>
      <td>Gravatar代理地址</td>
      <td><input name="wpNyarukoGravatarProxy" type="text" id="wpNyarukoGravatarProxy" value="<?php echo(@$wpNyarukoOption['wpNyarukoGravatarProxy']); ?>" size="40" maxlength="100" />(http://proxyserver:host)<br/>留空为禁用(用户直连),只填"serverhost"字样为服务器直接中转(海外服推荐)</td>
    </tr>
    <tr>
      <td>评论者信息显示</td>
      <td><input name="wpNyarukoCommentSysIco" type="checkbox" id="v" <?php if(@$wpNyarukoOption['wpNyarukoCommentSysIco']!='')echo('checked'); ?> />在头像右下角显示系统图标　<input name="wpNyarukoCommentSysIcoInfo" type="checkbox" id="wpNyarukoCommentSysIcoInfo" <?php if(@$wpNyarukoOption['wpNyarukoCommentSysIcoInfo']!='')echo('checked'); ?> />鼠标移到系统图标上显示系统和浏览器版本</td>
    </tr>
    <tr>
      <td>评论方式</td>
      <td><input name="wpNyarukoCommentMode" type="checkbox" id="wpNyarukoCommentMode" <?php if(@$wpNyarukoOption['wpNyarukoCommentMode']!='')echo('checked'); ?> />使用第三方评论系统</td>
    </tr>
    <tr>
      <td>第三方评论<br/>平台加载HTML</td>
      <td><textarea name="wpNyarukoCommentBox" cols="64" rows="5" maxlength="2000" id="wpNyarukoCommentBox"><?php echo(@$wpNyarukoOption['wpNyarukoCommentBox']); ?></textarea></td>
    </tr>
    <tr>
      <td>评论区<br/>前置HTML</td>
      <td><textarea name="wpNyarukoCommentTitle" cols="64" rows="5" maxlength="2000" id="wpNyarukoCommentTitle"><?php echo(@$wpNyarukoOption['wpNyarukoCommentTitle']); ?></textarea></td>
    </tr>
    <tr>
      <td>页头信息HTML<br/>额外加载文件HTML</td>
      <td><textarea name="wpNyarukoHeader" cols="64" rows="10" maxlength="2000" id="wpNyarukoHeader"><?php echo(@$wpNyarukoOption['wpNyarukoHeader']); ?></textarea></td>
    </tr>
    <tr>
      <td>页脚内容HTML<br/>备案号HTML<br/>统计HTML</td>
      <td><textarea name="wpNyarukoFooter" cols="64" rows="10" maxlength="2000" id="wpNyarukoFooter"><?php echo(@$wpNyarukoOption['wpNyarukoFooter']); ?></textarea></td>
    </tr>
    <tr>
      <td>首页顶部<br/>左侧模块<br/>自定义HTML</td>
      <td>顶部由此自定义块和一个小工具块组成。如果留空，小工具也会隐藏。<br/><textarea name="wpNyarukoScrollpic" cols="64" rows="8" maxlength="2000" id="wpNyarukoScrollpic"><?php echo(@$wpNyarukoOption['wpNyarukoScrollpic']); ?></textarea><br/><input name="wpNyarukoScrollpicSC" type="checkbox" id="wpNyarukoScrollpicSC" <?php if(@$wpNyarukoOption['wpNyarukoScrollpicSC']!='')echo('checked'); ?> />将这些内容理解为 Wordpress 短代码，可配合滚动图等插件使用。</td>
    </tr>
    <tr>
      <td>自定义列表项<br/>(代替自动生成<br/>的文章列表)</td>
      <td>请创建一个JSON列表页面，<br/>定义每个块显示的内容，包含在[JSON][JSON]中。<br/>然后为此页面使用「自定义列表」模板。<br/>例子：<br/><code>[JSON][["type","date","title","txt","jpg","goto"],["type","date","title","txt","jpg","goto"]][JSON]</code></td>
    </tr>
    <tr>
      <td>使用自己的网页<br/>代替某个页面<br/>(例如主页)</td>
      <td>请创建一个写有目标网址的页面，<br/>网址包含在[GOTO][GOTO]中。<br/>然后为此页面使用「自定义列表」模板。<br/>例子：<br/><code>[GOTO]/home.html[GOTO]</code></td>
    </tr>
    <tr>
      <td>获得当前网<br/>页的二维码</td>
      <td>直接插入以下代码到需要的地方即可（二维码选项见README.md）：<br/><code>&lt;div id="qrview" class="qrview"&gt;&lt;/div&gt;&lt;script type="text/javascript"&gt;qr();&lt;/script&gt;</code></td>
    </tr>
    <tr>
      <td>在控制台输<br/>出一段内容</td>
      <td><input name="wpNyarukoConsoleLog" type="text" id="wpNyarukoConsoleLog" value="<?php echo(@$wpNyarukoOption['wpNyarukoConsoleLog']); ?>" size="64" maxlength="512" /><br/><input name="wpNyarukoConsoleLogT" type="checkbox" id="wpNyarukoConsoleLogT" <?php if(@$wpNyarukoOption['wpNyarukoConsoleLogT']!='')echo('checked'); ?> />在输出的信息后面加入页面执行时间</td>
    </tr>
    <tr>
      <td>阻止不兼<br/>容浏览器</td>
      <td>如果主题认为当前浏览器是不兼容的,则转到以下网页：（留空则不阻止）<br/><input name="wpNyarukoBanBrowser" type="text" id="wpNyarukoBanBrowser" value="<?php echo(@$wpNyarukoOption['wpNyarukoBanBrowser']); ?>" size="64" maxlength="512" /></td>
    </tr>
    <tr>
      <td>PHP调试</td>
      <td><input name="wpNyarukoPHPDebug" type="checkbox" id="wpNyarukoPHPDebug" <?php if(@$wpNyarukoOption['wpNyarukoPHPDebug']!='')echo('checked'); ?> />显示所有PHP警告和错误(display_errors,E_ALL),不建议在生产环境使用</td>
    </tr>
  </tbody>
    </table>
    <hr><p><input id="submitoption" type="submit" name="input_save" value="应用这些设定" />　<a href="themes.php?page=theme-options.php&reset">恢复初始设定</a>　<?php } ?><a title="开源是一种态度" target="_blank" href="https://github.com/cxchope/wpNyaruko-W" target="_blank">Github</a></p></form><p><br/></p>
</div>
<?php
}
add_action('admin_menu', 'init');
?>