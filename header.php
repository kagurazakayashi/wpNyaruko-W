<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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
<title>
<?php if ( is_home() ) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
        wp_title('',true);
    } ?>
</title>
<!-- Stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
<script type="text/javascript" src="/lib/jQuery/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/script.js"></script>
<?php
$description = '';
$keywords = '';

if (is_home() || is_page()) {
   // 将以下引号中的内容改成你的主页description
   $description = get_bloginfo('description');

   // 将以下引号中的内容改成你的主页keywords
   $keywords = "";
}
elseif (is_single()) {
   $description1 = get_post_meta($post->ID, "description", true);
   $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

   // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
   $description = $description1 ? $description1 : $description2;

   // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
   $keywords = get_post_meta($post->ID, "keywords", true);
   if($keywords == '') {
      $tags = wp_get_post_tags($post->ID);
      foreach ($tags as $tag ) {
         $keywords = $keywords . $tag->name . ", ";
      }
      $keywords = rtrim($keywords, ', ');
   }
}
elseif (is_category()) {
   // 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
   $description = category_description();
   $keywords = single_cat_title('', false);
}
elseif (is_tag()){
   // 标签的description可以到后台 - 文章 - 标签，修改标签的描述
   $description = tag_description();
   $keywords = single_tag_title('', false);
}
$description = trim(strip_tags($description));
$keywords = trim(strip_tags($keywords));
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php wp_head(); ?>

</head>
<?php flush(); ?>
<body>
    <div id="bodyhidden"></div>
  <?php
  $wpuploaddirs = wp_upload_dir();
  $wallpapers = scandir($wpuploaddirs["basedir"]."/wallpaper/");
  $wallpaperid = rand(0,count($wallpapers)-3)+2;
//   $sentencedir = $wpuploaddirs["basedir"]."/sentence/";
//   $sentences = scandir($sentencedir);
//   $sentenceid = rand(0,count($sentences)-3)+2;
  echo '<style>.bannerimgs {background-image: url('.$wpuploaddirs['baseurl'].'/wallpaper/'.$wallpapers[$wallpaperid].');}</style>';
//   $nowsentence = $sentencedir.$sentences[$sentenceid];
//   if(file_exists($nowsentence)){
//       $nowsentence = file_get_contents($nowsentence);
//       $nowsentence = str_replace("\n","<br />",$nowsentence);
//   } else {
//       $nowsentence = "ERROR:".$nowsentence;
//   }
  $sentences = $wpdb->get_results("select * from yashisentence order by rand() limit 1;")[0];
  $nowsentence = $sentences->text.'</br><a href="https://zh.moegirl.org/'.$sentences->from.'" target="_blank" title="点击这里可以在《萌娘百科》中搜索「'.$sentences->from.'」词条。可以刷新网页来看看其他句子。" >——'.$sentences->from.'</a>';
  ?>
  <div id="rightbottommenubox" value="0">
      <div id="rightbottommenuboxf">
          <?php wp_nav_menu(array(
              'container_id' => 'rightbottommenuboxff',
              'theme_location' => 'primary',
              'header-menu' => 'header-menu',
              'menu_id' => 'header-menu',
              'echo' => true,
              'before' => '',
              'after' => '',
              'link_before' => '',
              'link_after' => '',
              'depth' => 1
              ));?>
          <span id="rightbottommenuswitch">
              <span id="rightbottommenuswitch1"></span>
              <span id="rightbottommenuswitch2"></span>
          </span>
      </div>
  </div>
  <div id="bannerimg" class="bannerimgs">
      <div id="bannertw"></div>
      <div id="bannerdw"></div>
      <a title="返回<?php bloginfo('name'); ?>主页" href="<?php echo get_option('home'); ?>/">
      <img id="title" src="/yashi/wp-content/uploads/2017/05/yaship.gif" alt=<?php bloginfo('name'); ?> name=<?php bloginfo('name'); ?> />
      </a>
      <div id="sentence"><?=$nowsentence?></div>
      <div id="mainmenubox">
          <?php wp_nav_menu(array(
              'container_id' => 'rightbottommenuboxff',
              'theme_location' => 'primary',
              'header-menu' => 'header-menu',
              'menu_id' => 'header-menu',
              'echo' => true,
              'before' => '',
              'after' => '',
              'link_before' => '',
              'link_after' => '',
              'depth' => 1
              ));?>
          <div id="searchbox">
              <?php get_search_form(); ?>
          </div>
      </div>
      <!--<input type="text" name="keyword" id="keyword" onkeydown="entersearch()"/>-->
  </div>
  <div id="wrapper" class="page">
  <!--<div id="wrapper2" class="page2">-->
<!-- <?php bloginfo('description'); ?> -->