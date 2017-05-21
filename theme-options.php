<?php 
function getOptions() {
    $options = get_option('wpNyaruko_options'); //SELECT * FROM `cxc_options` WHERE `option_name` = 'wpNyaruko_options'
    if (!is_array($options)) {
        $options['wpNyarukoTest'] = '此处可以任意填写一些笔记';
        $options['wpNyarukoLogo'] = '/wp-content/uploads/logo.png';
        $options['wpNyarukoColor'] = 'FE99CC';
        $options['wpNyarukoColorH'] = 'CC00FF';
        $options['wpNyarukoColorT'] = '000000';
        $options['wpNyarukoColorI'] = 'FFFFFF';
        $options['wpNyarukoColorH1'] = 'CC00FF';
        $options['wpNyarukoColorH2'] = 'CC00FF';
        $options['wpNyarukoColorH3'] = 'FE99CC';
        $options['wpNyarukoColorH4'] = '000000';
        $options['wpNyarukoColorBG'] = 'FFFFFF';
        $options['wpNyarukoColorL'] = 'FFF0F5';
        $options['wpNyarukoColorLL'] = 'FFF0F5';
        $options['wpNyarukoCursor'] = '';
        $options['wpNyarukoHandCursor'] = '';
        $options['wpNyarukoMenuLeft'] = 'off';
        $options['wpNyarukoMenuItemW'] = '90';
        $options['wpNyarukoPad'] = '950';
        $options['wpNyarukoPhone'] = '750';
        $options['wpNyarukoPicDir'] = 'wallpaper';
        $options['wpNyarukoTextTable'] = 'sentence';
        $options['wpNyarukoSearchName'] = '百度';
        $options['wpNyarukoSearchURL'] = 'https://www.baidu.com/s?ie=UTF-8&wd=';
        $options['wpNyarukoFont'] = '思源黑体,Source Han Sans,苹方黑体,PingFang SC,冬青黑体,Hiragino Sans GB,微软雅黑,Microsoft YaHei,Hiragino Sans GB,STHeiti Light,SimHei';
        $options['wpNyarukoFontSize'] = '12';
        $options['wpNyarukoIndexKeywords'] = '';
        $options['wpNyarukoRSSArticle'] = 'on';
        $options['wpNyarukoRSSComment'] = 'off';
        $options['wpNyarukoJQ'] = '/lib/jQuery/jquery.min.js';
        $options['wpNyarukoCommentMode'] = 'on';
        $options['wpNyarukoCommentBox'] = '正在加载 Disqus 评论……';
        $options['wpNyarukoCommentTitle'] = '<b>评论区</b>（如果看不到，请先想办法访问谷歌233）';
        $options['wpNyarukoHeader'] = '<meta name="copyright" content="Copyright xxx, All rights Reserved.">';
        $options['wpNyarukoFooter'] = '版权所有 &copy; 。自豪地使用 <a rel="external" title="WordPress主页" target="_blank" class="link" href="http://wordpress.org/">WordPress</a> 。使用 <a title="开源是一种态度" target="_blank" href="https://github.com/kagurazakayashi/wpNyaruko-W">wpNyaruko-W</a> 作为本站主题。<!--备案号--><!--统计代码-->';
        $options['wpNyarukoScrollpic'] = '此处为自定义HTML，右侧是一个小工具区';
        update_option('wpNyaruko_options', $options);
        die('<div id="wpNyarukoInfo" style="text-align: center; width: 100%; height: 25px; line-height: 25px; border-radius: 0px 0px 5px 5px; overflow: hidden; background-color: yellow; box-shadow: 0px 0px 5px gray; font-size: 12px;">欢迎使用 wpNyaruko 主题，请先完成初始设定。<a href="themes.php?page=theme-options.php">现在开始</a></div>');
    }
    return $options;
}
function init() {
  if (is_admin()) {
    if(isset($_GET['reset'])) {
      delete_option('wpNyaruko_options');
    }
    if(isset($_POST['input_save'])) {
        $options = getOptions();
        $options['wpNyarukoTest'] = stripslashes($_POST['wpNyarukoTest']);
        $options['wpNyarukoLogo'] = stripslashes($_POST['wpNyarukoLogo']);
        $options['wpNyarukoColor'] = stripslashes($_POST['wpNyarukoColor']);
        $options['wpNyarukoColorH'] = stripslashes($_POST['wpNyarukoColorH']);
        $options['wpNyarukoColorT'] = stripslashes($_POST['wpNyarukoColorT']);
        $options['wpNyarukoColorI'] = stripslashes($_POST['wpNyarukoColorI']);
        $options['wpNyarukoColorH1'] = stripslashes($_POST['wpNyarukoColorH1']);
        $options['wpNyarukoColorH2'] = stripslashes($_POST['wpNyarukoColorH2']);
        $options['wpNyarukoColorH3'] = stripslashes($_POST['wpNyarukoColorH3']);
        $options['wpNyarukoColorH4'] = stripslashes($_POST['wpNyarukoColorH4']);
        $options['wpNyarukoColorBG'] = stripslashes($_POST['wpNyarukoColorBG']);
        $options['wpNyarukoColorL'] = stripslashes($_POST['wpNyarukoColorL']);
        $options['wpNyarukoColorLL'] = stripslashes($_POST['wpNyarukoColorLL']);
        $options['wpNyarukoCursor'] = stripslashes($_POST['wpNyarukoCursor']);
        $options['wpNyarukoHandCursor'] = stripslashes($_POST['wpNyarukoHandCursor']);
        $options['wpNyarukoMenuLeft'] = stripslashes($_POST['wpNyarukoMenuLeft']);
        $options['wpNyarukoMenuItemW'] = stripslashes($_POST['wpNyarukoMenuItemW']);
        $options['wpNyarukoPad'] = stripslashes($_POST['wpNyarukoPad']);
        $options['wpNyarukoPhone'] = stripslashes($_POST['wpNyarukoPhone']);
        $options['wpNyarukoPicDir'] = stripslashes($_POST['wpNyarukoPicDir']);
        $options['wpNyarukoTextTable'] = stripslashes($_POST['wpNyarukoTextTable']);
        $options['wpNyarukoSearchName'] = stripslashes($_POST['wpNyarukoSearchName']);
        $options['wpNyarukoSearchURL'] = stripslashes($_POST['wpNyarukoSearchURL']);
        $options['wpNyarukoFont'] = stripslashes($_POST['wpNyarukoFont']);
        $options['wpNyarukoFontSize'] = stripslashes($_POST['wpNyarukoFontSize']);
        $options['wpNyarukoIndexKeywords'] = stripslashes($_POST['wpNyarukoIndexKeywords']);
        $options['wpNyarukoRSSArticle'] = stripslashes($_POST['wpNyarukoRSSArticle']);
        $options['wpNyarukoRSSComment'] = stripslashes($_POST['wpNyarukoRSSComment']);
        $options['wpNyarukoJQ'] = stripslashes($_POST['wpNyarukoJQ']);
        $options['wpNyarukoCommentMode'] = stripslashes($_POST['wpNyarukoCommentMode']);
        $options['wpNyarukoCommentBox'] = stripslashes($_POST['wpNyarukoCommentBox']);
        $options['wpNyarukoCommentTitle'] = stripslashes($_POST['wpNyarukoCommentTitle']);
        $options['wpNyarukoHeader'] = stripslashes($_POST['wpNyarukoHeader']);
        $options['wpNyarukoFooter'] = stripslashes($_POST['wpNyarukoFooter']);
        $options['wpNyarukoScrollpic'] = stripslashes($_POST['wpNyarukoScrollpic']);
        update_option('wpNyaruko_options', $options);
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
  $options = getOptions();
?>
<form action="#" method="post" enctype="multipart/form-data" name="op_form" id="op_form">
    <table border="0" cellspacing="0" cellpadding="10">
    <tbody>
    <tr>
      <td>笔记(不呈现)</td>
      <td><input name="wpNyarukoTest" type="text" id="wpNyarukoTest" value="<?php echo($options['wpNyarukoTest']); ?>" size="64" maxlength="128" /></td>
    </tr>
    <tr>
      <td>标题图片网址</td>
      <td><input name="wpNyarukoLogo" type="text" id="wpNyarukoLogo" value="<?php echo($options['wpNyarukoLogo']); ?>" size="64" maxlength="128" /></td>
    </tr>
    <tr>
      <td>首选字体(用,分隔)</td>
      <td><input name="wpNyarukoFont" type="text" id="wpNyarukoFont" value="<?php echo($options['wpNyarukoFont']); ?>" size="38" maxlength="300" />　字号：<input name="wpNyarukoFontSize" type="text" id="wpNyarukoFontSize" value="<?php echo($options['wpNyarukoFontSize']); ?>" size="2" maxlength="2" />像素 (留空为自动)</td>
    </tr>
    <tr>
      <td>主题色</td>
      <td>修饰：#<input name="wpNyarukoColor" type="text" id="wpNyarukoColor" value="<?php echo($options['wpNyarukoColor']); ?>" size="6" maxlength="6" />　强调：#<input name="wpNyarukoColorH" type="text" id="wpNyarukoColorH" value="<?php echo($options['wpNyarukoColorH']); ?>" size="6" maxlength="6" />　文本：#<input name="wpNyarukoColorT" type="text" id="wpNyarukoColorT" value="<?php echo($options['wpNyarukoColorT']); ?>" size="6" maxlength="6" />　内嵌：#<input name="wpNyarukoColorI" type="text" id="wpNyarukoColorI" value="<?php echo($options['wpNyarukoColorI']); ?>" size="6" maxlength="6" /></td>
    </tr>
    <tr>
      <td>页面色</td>
      <td>网页背景：#<input name="wpNyarukoColorBG" type="text" id="wpNyarukoColorBG" value="<?php echo($options['wpNyarukoColorBG']); ?>" size="6" maxlength="6" />　列表项：#<input name="wpNyarukoColorL" type="text" id="wpNyarukoColorL" value="<?php echo($options['wpNyarukoColorL']); ?>" size="6" maxlength="6" />　当前列表项：#<input name="wpNyarukoColorLL" type="text" id="wpNyarukoColorLL" value="<?php echo($options['wpNyarukoColorLL']); ?>" size="6" maxlength="6" />
    </tr>
    <tr>
      <td>标题色</td>
      <td>一级：#<input name="wpNyarukoColorH1" type="text" id="wpNyarukoColorH1" value="<?php echo($options['wpNyarukoColorH1']); ?>" size="6" maxlength="6" />　二级：#<input name="wpNyarukoColorH2" type="text" id="wpNyarukoColorH2" value="<?php echo($options['wpNyarukoColorH2']); ?>" size="6" maxlength="6" />　三级：#<input name="wpNyarukoColorH3" type="text" id="wpNyarukoColorH3" value="<?php echo($options['wpNyarukoColorH3']); ?>" size="6" maxlength="6" />　四级：#<input name="wpNyarukoColorH4" type="text" id="wpNyarukoColorH4" value="<?php echo($options['wpNyarukoColorH4']); ?>" size="6" maxlength="6" /></td>
    </tr>
    <tr>
      <td>自定义鼠标指针</td>
      <td><input name="wpNyarukoCursor" type="text" id="wpNyarukoCursor" value="<?php echo($options['wpNyarukoCursor']); ?>" size="32" maxlength="100" />(cur文件,留空为默认)</td>
    </tr>
    <tr>
      <td>自定义手形指针</td>
      <td><input name="wpNyarukoHandCursor" type="text" id="wpNyarukoHandCursor" value="<?php echo($options['wpNyarukoHandCursor']); ?>" size="32" maxlength="100" />(cur文件,留空为默认)</td>
    </tr>
    <tr>
      <td>主选单项布局</td>
      <td><input name="wpNyarukoMenuLeft" type="checkbox" id="wpNyarukoMenuLeft" <?php if($options['wpNyarukoMenuLeft']!='')echo('checked'); ?> />使用左对齐而不是分散对齐，每个菜单项宽度<input name="wpNyarukoMenuItemW" type="text" id="wpNyarukoMenuItemW" value="<?php echo($options['wpNyarukoMenuItemW']); ?>" size="3" maxlength="3" />像素</td>
    </tr>
    <tr>
      <td>响应式布局</td>
      <td>低于<input name="wpNyarukoPad" type="text" id="wpNyarukoPad" value="<?php echo($options['wpNyarukoPad']); ?>" size="4" maxlength="4" />像素时显示平板布局，低于<input name="wpNyarukoPhone" type="text" id="wpNyarukoPhone" value="<?php echo($options['wpNyarukoPhone']); ?>" size="3" maxlength="3" />像素时显示手机布局</td>
    </tr>
    <tr>
      <td>响应式加载</td>
      <td>滚动到页面底部时自动加载<input name="wpNyarukoAutoLoad" type="text" id="wpNyarukoAutoLoad" value="10" size="3" maxlength="3" disabled="true" />篇文章，最多加载<input name="wpNyarukoAutoLoadI" type="text" id="wpNyarukoAutoLoadI" value="-1" size="3" maxlength="3" disabled="true" />次</td>
    </tr>
    <tr>
      <td>随机图片扫描文件夹</td>
      <td>~/wp-content/uploads/<input name="wpNyarukoPicDir" type="text" id="wpNyarukoPicDir" value="<?php echo($options['wpNyarukoPicDir']); ?>" size="32" maxlength="100" />/</td>
    </tr>
    <tr>
      <td>随机文字查询表</td>
      <td><input name="wpNyarukoTextTable" type="text" id="wpNyarukoTextTable" value="<?php echo($options['wpNyarukoTextTable']); ?>" size="32" maxlength="100" />(留空可禁用)</td>
    </tr>
    <tr>
      <td>随机文字搜索引擎名称</td>
      <td><input name="wpNyarukoSearchName" type="text" id="wpNyarukoSearchName" value="<?php echo($options['wpNyarukoSearchName']); ?>" size="15" maxlength="30" /></td>
    </tr>
    <tr>
      <td>随机文字搜索引擎接口</td>
      <td><input name="wpNyarukoSearchURL" type="text" id="wpNyarukoSearchURL" value="<?php echo($options['wpNyarukoSearchURL']); ?>" size="40" maxlength="100" />关键字</td>
    </tr>
    <tr>
      <td>主页关键字</td>
      <td><input name="wpNyarukoIndexKeywords" type="text" id="wpNyarukoIndexKeywords" value="<?php echo($options['wpNyarukoIndexKeywords']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>RSS 订阅</td>
      <td><input name="wpNyarukoRSSArticle" type="checkbox" id="wpNyarukoRSSArticle" <?php if($options['wpNyarukoRSSArticle']!='')echo('checked'); ?> />文章　<input name="wpNyarukoRSSComment" type="checkbox" id="wpNyarukoRSSComment" <?php if($options['wpNyarukoRSSComment']!='')echo('checked'); ?> />评论</td>
    </tr>
    <tr>
      <td>自定义 jQuery 路径</td>
      <td><input name="wpNyarukoJQ" type="text" id="wpNyarukoJQ" value="<?php echo($options['wpNyarukoJQ']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>评论方式</td>
      <td><input name="wpNyarukoCommentMode" type="checkbox" id="wpNyarukoCommentMode" <?php if($options['wpNyarukoCommentMode']!='')echo('checked'); ?> />使用第三方评论系统</td>
    </tr>
    <tr>
      <td>第三方评论<br/>平台加载HTML</td>
      <td><textarea name="wpNyarukoCommentBox" cols="64" rows="5" maxlength="2000" id="wpNyarukoCommentBox"><?php echo($options['wpNyarukoCommentBox']); ?></textarea></td>
    </tr>
    <tr>
      <td>评论区<br/>前置HTML</td>
      <td><textarea name="wpNyarukoCommentTitle" cols="64" rows="5" maxlength="2000" id="wpNyarukoCommentTitle"><?php echo($options['wpNyarukoCommentTitle']); ?></textarea></td>
    </tr>
    <tr>
      <td>页头信息HTML<br/>额外加载文件HTML</td>
      <td><textarea name="wpNyarukoHeader" cols="64" rows="10" maxlength="2000" id="wpNyarukoHeader"><?php echo($options['wpNyarukoHeader']); ?></textarea></td>
    </tr>
    <tr>
      <td>页脚内容HTML<br/>备案号HTML<br/>统计HTML</td>
      <td><textarea name="wpNyarukoFooter" cols="64" rows="10" maxlength="2000" id="wpNyarukoFooter"><?php echo($options['wpNyarukoFooter']); ?></textarea></td>
    </tr>
    <tr>
      <td>首页顶部<br/>左侧模块<br/>自定义HTML</td>
      <td>顶部由此自定义块和一个小工具块组成。如果留空，小工具也会隐藏。<br/><textarea name="wpNyarukoScrollpic" cols="64" rows="10" maxlength="2000" id="wpNyarukoScrollpic"><?php echo($options['wpNyarukoScrollpic']); ?></textarea></td>
    </tr>
    <tr>
      <td>自定义列表项<br/>(代替自动生成<br/>的文章列表)</td>
      <td>请创建一个JSON列表页面，<br/>定义每个块显示的内容，包含在[JSON][JSON]中。<br/>然后为此页面使用「自定义列表」模板。<br/>例子：<br/><code>[JSON][["type","date","title","txt","jpg","goto"],["type","date","title","txt","jpg","goto"]][JSON]</code></td>
    </tr>
    <tr>
      <td>使用自己的网页<br/>代替某个页面<br/>(例如主页)</td>
      <td>请创建一个写有目标网址的页面，<br/>网址包含在[GOTO][GOTO]中。<br/>然后为此页面使用「自定义列表」模板。<br/>例子：<br/><code>[GOTO]/home.html[GOTO]</code></td>
    </tr>
  </tbody>
    </table>
    <hr><p><input id="submitoption" type="submit" name="input_save" value="应用这些设定" />　<a href="themes.php?page=theme-options.php&reset">恢复初始设定</a>　<?php } ?><a title="开源是一种态度" target="_blank" href="https://github.com/cxchope/wpNyaruko-W" target="_blank">Github</a></p></form><p><br/></p>
</div>
<?php
}
add_action('admin_menu', 'init');
?>