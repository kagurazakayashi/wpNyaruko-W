<?php
$wpNyarukoOption = get_option('wpNyaruko_options');
if($wpNyarukoOption['wpNyarukoPHPDebug']!='') {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  echo "<!-- wpNyaruko DEBUG MODE -->";
} else {
  ini_set('display_errors', '0');
}
if ($wpNyarukoOption['wpNyarukoPHPDebug'])
if(is_admin()) {
  require ('theme-options.php');
}
/** widgets */
if( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => '侧边栏1',
		'id'  => 'sidebar-1',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}

if (function_exists('register_nav_menus')){
	register_nav_menus(array(
	//主键key调用nav时使用，值value为后台菜单显示名称
		'primary' => 'Primary Navigation'
	));
}
// function delete_menu_more_class($var) {
// return is_array($var) ? array() : '';
// }
// add_filter('nav_menu_css_class', 'delete_menu_more_class', 100, 1);
// add_filter('nav_menu_item_id', 'delete_menu_more_class', 100, 1);
// add_filter('page_css_class', 'delete_menu_more_class', 100, 1);


/*获取图片开始*/
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 
//获取文章中第一张图片的路径并输出
$first_img = $matches [1] [0];
 
//如果文章无图片，获取自定义图片
 
if(empty($first_img)){ //Defines a default image
$first_img = bloginfo("template_url")."/images/default.jpg";
 
//请自行设置一张default.jpg图片
}
 
return $first_img;
}
/*获取图片完*/


// 添加自定义字段面板
$new_meta_boxes =
array(
  "description" => array(
    "name" => "_description",
    "std" => "这里填默认的网页描述",
    "title" => "网页描述:"),

  "keywords" => array(
    "name" => "_keywords",
    "std" => "这里填默认的网页关键字",
    "title" => "关键字:"),

  "uuumoe1" => array(
    "name" => "_uuumoe1",
    "std" => "",
    "title" => "uuumoe1:")
);

function new_meta_boxes() {
  global $post, $new_meta_boxes;

  foreach($new_meta_boxes as $meta_box) {
    $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

    if($meta_box_value == "")
      $meta_box_value = $meta_box['std'];

    // 自定义字段标题
    echo'<h4>'.$meta_box['title'].'</h4>';

    // 自定义字段输入框
    echo '<textarea cols="60" rows="3" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';
  }
   
  echo '<input type="hidden" name="ludou_metaboxes_nonce" id="ludou_metaboxes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}

function create_meta_box() {
  if ( function_exists('add_meta_box') ) {
    add_meta_box( 'new-meta-boxes', '自定义模块', 'new_meta_boxes', 'post', 'normal', 'high' );
  }
}

function save_postdata( $post_id ) {
  global $new_meta_boxes;
   
  if ( !wp_verify_nonce( $_POST['ludou_metaboxes_nonce'], plugin_basename(__FILE__) ))
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
  /* Remove their stuff */
  $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

function new_excerpt_length($length) {
    return 195;
}
add_filter('excerpt_length', 'new_excerpt_length');
function new_excerpt_more($more) {
    return '...[点击阅览全文]';
}
add_filter('excerpt_more', 'new_excerpt_more');

function to_reply() { 
$raonclick = 'to_reply("<?php comment_ID() ?>", "<?php comment_author();?>")';
echo "<a onclick='".$raonclick."' href='#respond' style='cursor:pointer;' />回复</a>";
}
function getreplyinfo() {
  return [get_comment_ID(),get_comment_author()];
}
?>