<?php 
function getOptions() {
    $options = get_option('wpNyaruko_options');
    if (!is_array($options)) {
        $options['wpNyarukoTest'] = '此处可以任意填写一些笔记';
        $options['wpNyarukoLogo'] = '/wp-content/uploads/logo.png';
        $options['wpNyarukoColor'] = 'FE99CC';
        $options['wpNyarukoPicDir'] = 'wallpaper';
        $options['wpNyarukoTextTable'] = 'sentence';
        $options['wpNyarukoSearchName'] = '百度';
        $options['wpNyarukoSearchURL'] = 'https://www.baidu.com/s?ie=UTF-8&wd=';
        $options['wpNyarukoRSSArticle'] = 'true';
        $options['wpNyarukoRSSComment'] = 'false';
        $options['wpNyarukoJQ'] = '/lib/jQuery/jquery.min.js';
        $options['wpNyarukoHeader'] = '<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>';
        $options['wpNyarukoFooter'] = '版权所有 &copy; 。自豪地使用 <a rel="external" title="WordPress主页" target="_blank" class="link" href="http://wordpress.org/">WordPress</a> 。使用 <a title="开源是一种态度" target="_blank" href="https://github.com/kagurazakayashi/wpNyaruko-W">wpNyaruko-W</a> 作为本站主题。';
        update_option('wpNyaruko_options', $options);
    }
    return $options;
}
function init() {        
    if(isset($_POST['input_save'])) {
        $options = getOptions();
        $options['wpNyarukoTest'] = stripslashes($_POST['wpNyarukoTest']);
        $options['wpNyarukoLogo'] = stripslashes($_POST['wpNyarukoLogo']);
        $options['wpNyarukoColor'] = stripslashes($_POST['wpNyarukoColor']);
        $options['wpNyarukoPicDir'] = stripslashes($_POST['wpNyarukoPicDir']);
        $options['wpNyarukoTextTable'] = stripslashes($_POST['wpNyarukoTextTable']);
        $options['wpNyarukoSearchName'] = stripslashes($_POST['wpNyarukoSearchName']);
        $options['wpNyarukoSearchURL'] = stripslashes($_POST['wpNyarukoSearchURL']);
        $options['wpNyarukoRSSArticle'] = stripslashes($_POST['wpNyarukoRSSArticle']);
        $options['wpNyarukoRSSComment'] = stripslashes($_POST['wpNyarukoRSSComment']);
        $options['wpNyarukoJQ'] = stripslashes($_POST['wpNyarukoJQ']);
        $options['wpNyarukoHeader'] = stripslashes($_POST['wpNyarukoHeader']);
        $options['wpNyarukoFooter'] = stripslashes($_POST['wpNyarukoFooter']);
        update_option('wpNyaruko_options', $options);
    } else {
        getOptions();
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
      <td><input name="wpNyarukoTest" type="text" id="wpNyarukoTest" value="<?php echo($options['wpNyarukoTest']); ?>" size="64" maxlength="128"></td>
    </tr>
    <tr>
      <td>标题图片网址</td>
      <td><input name="wpNyarukoLogo" type="text" id="wpNyarukoLogo" value="<?php echo($options['wpNyarukoLogo']); ?>" size="64" maxlength="128"></td>
    </tr>
    <tr>
      <td>主题前景色</td>
      <td>#<input name="wpNyarukoColor" type="text" id="wpNyarukoColor" value="<?php echo($options['wpNyarukoColor']); ?>" size="6" maxlength="6"></td>
    </tr>
    <tr>
      <td>随机图片扫描文件夹</td>
      <td>~/wp-content/uploads/<input name="wpNyarukoPicDir" type="text" id="wpNyarukoPicDir" value="<?php echo($options['wpNyarukoPicDir']); ?>" size="32" maxlength="100">/</td>
    </tr>
    <tr>
      <td>随机文字查询表</td>
      <td><input name="wpNyarukoTextTable" type="text" id="wpNyarukoTextTable" value="<?php echo($options['wpNyarukoTextTable']); ?>" size="32" maxlength="100">(留空可禁用)</td>
    </tr>
    <tr>
      <td>随机文字搜索引擎名称</td>
      <td><input name="wpNyarukoSearchName" type="text" id="wpNyarukoSearchName" value="<?php echo($options['wpNyarukoSearchName']); ?>" size="15" maxlength="30"></td>
    </tr>
    <tr>
      <td>随机文字搜索引擎接口</td>
      <td><input name="wpNyarukoSearchURL" type="text" id="wpNyarukoSearchURL" value="<?php echo($options['wpNyarukoSearchURL']); ?>" size="32" maxlength="100">关键字</td>
    </tr>
    <tr>
      <td>RSS 订阅</td>
      <td><input name="wpNyarukoRSSArticle" type="checkbox" id="wpNyarukoRSSArticle" checked="<?php echo($options['wpNyarukoRSSArticle']); ?>">文章　<input name="wpNyarukoRSSComment" type="checkbox" id="wpNyarukoRSSComment" checked="<?php echo($options['wpNyarukoRSSComment']); ?>">评论</td>
    </tr>
    <tr>
      <td>自定义 jQuery 路径</td>
      <td><input name="wpNyarukoJQ" type="text" id="wpNyarukoJQ" value="<?php echo($options['wpNyarukoJQ']); ?>" size="32" maxlength="100"></td>
    </tr>
    <tr>
      <td>页头信息</td>
      <td><textarea name="wpNyarukoHeader" cols="64" rows="10" maxlength="2000" id="wpNyarukoHeader"><?php echo($options['wpNyarukoHeader']); ?></textarea></td>
    </tr>
    <tr>
      <td>页脚内容</td>
      <td><textarea name="wpNyarukoFooter" cols="64" rows="10" maxlength="2000" id="wpNyarukoFooter"><?php echo($options['wpNyarukoFooter']); ?></textarea></td>
    </tr>
  </tbody>
    </table>
    <hr><p><input id="submitoption" type="submit" name="input_save" value="应用这些设定" />　　<?php } ?><a title="开源是一种态度" target="_blank" href="https://github.com/cxchope/wpNyaruko-W" target="_blank">Github</a></p></form><p><br/></p>
</div>
<?php
}
add_action('admin_menu', 'init');
?>