<?php
$pagestime = microtime(true);
$wpNyarukoOption = get_option('wpNyaruko_options');
if(@$wpNyarukoOption['wpNyarukoPHPDebug']!='') {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
} else {
  ini_set('display_errors', '0');
}
if(@$wpNyarukoOption['wpNyarukoBanBrowser']!='') {
  include_once("broswerchk.php");
  broswerchkto($wpNyarukoOption['wpNyarukoBanBrowser']);
}
if(is_admin()) {
  require ('theme-options.php');
}
/** widgets */
if( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => '主页右上菜单区域',
		'id'  => 'index',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
  register_sidebar(array(
		'name' => '文章右侧边栏区域',
		'id'  => 'page',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}
if (function_exists('register_nav_menus')){
	register_nav_menus(array(
	//主键key调用nav时使用，值value为后台菜单显示名称
    'primary' => '主菜单第一页',
    'primary2' => '主菜单第二页'
	));
}
if (function_exists('register_sidebar_widget')){
  register_sidebar_widget("wpNyaruko:当前页面二维码","b_qr");
}
add_action( 'widgets_admin_page', 'b_qr_admin' );
function b_qr_admin() {
	echo '<p style="clear:both;">添加你想要的内容哦</p>';
}
// function delete_menu_more_class($var) {
// return is_array($var) ? array() : '';
// }
// add_filter('nav_menu_css_class', 'delete_menu_more_class', 100, 1);
// add_filter('nav_menu_item_id', 'delete_menu_more_class', 100, 1);
// add_filter('page_css_class', 'delete_menu_more_class', 100, 1);

// 小工具
function b_qr() {
  include(TEMPLATEPATH . '/b_qr.php');
}
/*获取图片开始*/
function catch_image($npost=null,$showdefaultimg=true,$iscontent=false) {
    global $post;
    if (!$npost) $npost = $post;
    $first_img = '';
    $raimage = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
    $ncontent = $iscontent ? $npost : $npost->post_content;
    $output = preg_match_all($raimage, $ncontent, $matches);
    //获取文章中第一张图片的路径并输出
    $first_img = @$matches[1][0];
    if(empty($first_img) && $showdefaultimg){
        $first_img = get_bloginfo("template_url")."/images/default.jpg";
    }
    return $first_img;
}
/*获取图片完*/

// 添加自定义字段面板
$new_meta_boxes =
array(
  "reproduced" => array(
    "name" => "_reproduced",
    "std" => "",
    "title" => "转载自: (如果是转载的文章，请在此填写来源网站和链接，用英文逗号分隔。例如「XX网,http://xx」，留空视为原创)"),
  "description" => array(
    "name" => "_description",
    "std" => "",
    "title" => "网页描述:"),
  "keywords" => array(
    "name" => "_keywords",
    "std" => "",
    "title" => "关键字:")
);
if (plug_wsgp_installed()) {
  $new_meta_boxes = nyarukoWSGPmetabox();//array_merge(nyarukoWSGPmetabox(),$new_meta_boxes);
}
function new_meta_boxes() {
  global $post, $new_meta_boxes;

  foreach($new_meta_boxes as $meta_box) {
    $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

    if($meta_box_value == "")
      $meta_box_value = $meta_box['std'];

    // 自定义字段标题
    echo'<h4>'.$meta_box['title'].'</h4>';

    // 自定义字段输入框
    echo '<textarea cols="60" rows="1" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';
  }
   
  echo '<input type="hidden" name="metaboxes_nonce" id="metaboxes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}

function create_meta_box() {
  if ( function_exists('add_meta_box') ) {
    add_meta_box( 'new-meta-boxes', '自定义模块', 'new_meta_boxes', 'post', 'normal', 'high' );
  }
}

function save_postdata( $post_id ) {
  global $new_meta_boxes;
   
   if (isset($_POST['metaboxes_nonce'])) {
     if ( !wp_verify_nonce( $_POST['metaboxes_nonce'], plugin_basename(__FILE__) ))
    return;
   
  if ( !current_user_can( 'edit_posts', $post_id ))
    return;
               
  foreach($new_meta_boxes as $meta_box) {
    $data = $_POST[$meta_box['name'].'_value'];

    if($data == "")
      delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
    else
      update_post_meta($post_id, $meta_box['name'].'_value', $data);
   }
   }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

// 添加自定义字段面板
function aurelius_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">
        <div class="gravatar"> <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
 <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> </div>
        <div class="comment_content" id="comment-<?php comment_ID(); ?>">   
            <div class="clearfix">
                    <?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>
                    <div class="comment-meta commentmetadata">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div>
                    &nbsp;&nbsp;&nbsp;<?php edit_comment_link('修改'); ?>
            </div>

            <div class="comment_text">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em>你的评论正在审核，稍后会显示出来！</em><br />
        <?php endif; ?>
        <?php comment_text(); ?>
            </div>
        </div>
<?php } ?>

<?php
/*搜索*/
if(is_search()){
add_filter('posts_orderby_request', 'search_orderby_filter');
}
function search_orderby_filter($orderby = ''){
    global $wpdb;
    $keyword = $wpdb->prepare($_REQUEST['s']);
    return "((CASE WHEN {$wpdb->posts}.post_title LIKE '%{$keyword}%' THEN 2 ELSE 0 END) + (CASE WHEN {$wpdb->posts}.post_content LIKE '%{$keyword}%' THEN 1 ELSE 0 END)) DESC,
{$wpdb->posts}.post_modified DESC, {$wpdb->posts}.ID ASC";
}
/**
 * 让 WordPress 只搜索文章的标题
 */
// function wpse_11826_search_by_title( $search, $wp_query ) {
//   if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
//     global $wpdb;
//     $q = $wp_query->query_vars;
//     $n = ! empty( $q['exact'] ) ? '' : '%';
//     $search = array();
//     foreach ( ( array ) $q['search_terms'] as $term )
//       $search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );
//     if ( ! is_user_logged_in() )
//       $search[] = "$wpdb->posts.post_password = ''";
//     $search = ' AND ' . implode( ' AND ', $search );
//   }
//   return $search;
// }
// add_filter( 'posts_search', 'wpse_11826_search_by_title', 10, 2 );
/*搜索*/

/*高亮搜索的内容*/
function search_word_replace($buffer){
  if(is_search()){
    $arr = explode(" ", get_search_query());
    $arr = array_unique($arr);
    foreach($arr as $v)
      if($v)
        $buffer = preg_replace("/(".$v.")/i", "<span style=\"background-color:#ff0;\"><strong>$1</strong></span>", $buffer);
    }
  return $buffer;
}
add_filter("the_title", "search_word_replace", 200);
// add_filter("the_excerpt", "search_word_replace", 200);
// add_filter("the_content", "search_word_replace", 200);
/*高亮搜索的内容*/

// 移除Wordpress后台顶部左上角的W图标
function annointed_admin_bar_remove() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

function new_excerpt_length($length) {
    $wpNyarukoOption = get_option('wpNyaruko_options');
    return $wpNyarukoOption['wpNyarukoWordlimit'];
}
add_filter('excerpt_length', 'new_excerpt_length');
function new_excerpt_more($more) {
    $wpNyarukoOption = get_option('wpNyaruko_options');
    return $wpNyarukoOption['wpNyarukoWLInfo'];
}
add_filter('excerpt_more', 'new_excerpt_more');

function to_reply() { 
$raonclick = 'to_reply("<?php comment_ID() ?>", "<?php comment_author();?>")';
echo "<a onclick='".$raonclick."' href='#respond' style='cursor:pointer;' />回复</a>";
}
function getreplyinfo() {
  return [get_comment_ID(),get_comment_author(),base64_encode(get_comment_author())];
}
function plug_wsgp_installed() {
  return defined('NYARUKOWSGP_PLUGIN_URL');
}
function postlistblock($indexint) {
  if (plug_wsgp_installed()) {
    nyarukoWSGPpostlistblock($indexint);
  } else {
  ?>
  <div id="blockbdiv<?php echo $indexint ?>" class="blockbdiv" onclick="blockbdivclick(<?php echo "'".$indexint."','"; the_permalink(); echo "'"; ?>)" onmouseover="blockbdivblur(<?php echo $indexint ?>)" onmouseout="blockbdivfocus(<?php echo $indexint ?>)">
      <div name="blocktopdiv" id="blocktopdiv<?php echo $indexint ?>" class="blocktopdiv">
        <img name="blocktopimg" id="blocktopimg<?php echo $indexint ?>" src="<?php 
        echo catch_image();
        ?>" alt="<?php the_title(); ?>" />
        <div class="topline"><?php the_time('Y-m-d') ?>&nbsp;</div>
        <div class="toptags"><?php $category = get_the_category(); echo '<a href="'.get_category_link(end($category)->term_id ).'">'.end($category)->cat_name.'</a>'; ?></div>
      </div>
      <div class="blockbottomdiv">
        <div class="bottomtitle"><?php the_title(); ?></div>
        <div class="bottomcontent"><?php the_excerpt(); ?></div>
      </div>
  </div>
  <?php } ?>
			<script>blockbdivin($("#blockhiddendiv<?php echo $indexint ?>"));</script>
			<?php echo "<script>datacount=".$indexint.";</script>"; $indexint++; ?>
			<div class="postlisthr">&nbsp;</div>
  <?php
  return $indexint;
}
function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } 
    else 
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
function cpath($i) {
    $n = '&emsp;>&emsp;';
    if ($i) return $n;
    echo $n;
}

function contentconv($content) {
    $wpNyarukoOption = get_option('wpNyaruko_options');
    $content = @$wpNyarukoOption['wpNyarukoSingleExCodeA'].$content.$wpNyarukoOption['wpNyarukoSingleExCodeB'];
    if (@$wpNyarukoOption['wpNyarukoTableOverflowS']!='') {
        $content = str_replace("<table","<div class=\"scrolltable\"><table",$content);
        $content = str_replace("</table>","</table></div>",$content);
    }
    return $content;
}
?>