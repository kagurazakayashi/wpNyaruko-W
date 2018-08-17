<?php echo "<script>var max_num_pages=".$wp_query->max_num_pages.";var now_num_pages=1;</script>";
if (!isset($_GET["data"])) { get_header(); ?>
<div id="archivehead">
<span class="sorting hidden">
<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>主页">主页</a>
<?php
global $wp_query;
cpath(false);
$typename = "";
$description = "";
if (is_category()) {
    $typename = single_cat_title('', false);
    echo "分类".cpath(true).$typename;
    if (category_description()) {
        $description = category_description();
    }
} elseif (is_tag()) {
    $typename = single_tag_title('', false);
    echo "标签".cpath(true).$typename;
    if (tag_description()) {
        $description = tag_description();
    }
} elseif (is_day()) {
    $typename = get_the_time('j日');
    echo "日期存档".cpath(true).get_the_time('Y年n月j日');
} elseif (is_month()) {
    $typename = get_the_time('n月');
    echo "月份存档".cpath(true).get_the_time('Y年n月');
} elseif (is_year()) {
    $typename = get_the_time('Y年');
    echo "年份存档".cpath(true).get_the_time('Y年');
} elseif (is_author()) {
    $typename = "";
    echo '作者存档';
} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
    echo '博客存档';
}
?>
</span>
<span class="sortby hidden">
<select onchange="if(this.value==''){this.selectedIndex=this.defOpt;}else{window.location=this.value;}">
    <option value="" selected>更改排序方式</option>
    <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'date'))); ?>">最新内容</option>
    <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'rand'))); ?>">随机阅读</option>
    <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'commented'))); ?>">评论最多</option>
    <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'title'))); ?>">标题排序</option>
    <!-- <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'ID'))); ?>">文章ID</option>
    <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'modified'))); ?>">修改时间</option> -->
</select>
</span>
<?php
if ($description != "") {
    echo '<div id="description" class="racing_text">'.$description.'</div>';
}
echo "</div>";
if ( isset($_GET['order']) && ($_GET['order']=='rand') ) 
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'rand',
		'paged' => $paged,
	);
	$arms = array_merge(
		$args,
		$wp_query->query
	);
	query_posts($arms);
}
else if ( isset($_GET['order']) && ($_GET['order']=='commented') )
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'comment_count',
		'order' => 'DESC',
		'paged' => $paged,
	);
    $arms = array_merge(
		$args,
		$wp_query->query
	);
    query_posts($arms);
}
else if ( isset($_GET['order']) && ($_GET['order']=='alpha') )
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'title',
		'order' => 'ASC',
		'paged' => $paged,
	);
    $arms = array_merge(
		$args,
		$wp_query->query
	);
    query_posts($arms);    query_posts($arms);
} ?>

	<!-- Column 1 /Content -->
	<div class="postlist">
		<!-- Blog Post -->
		<div id="postsbox">
<?php } $datacount = isset($_GET["data"])?$_GET["data"]+1:0; echo "<script>var paged=".(isset($_GET["paged"])?$_GET["paged"]:1).";datacount=".$datacount.";</script>" ?>
			<?php
				$indexint = $datacount;
				if (have_posts()) : while (have_posts()) : the_post();
				$indexint = postlistblock($indexint);
				endwhile; else : ?>
				<p id="nopost">没啦</p>
<?php endif; if (!isset($_GET["data"])) { get_header(); ?>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ceramictiles.js"></script>
		<script type="text/javascript">var wpNyarukoAutoLoadConf=[<?php echo '1,"'.@$wpNyarukoOption['wpNyarukoAutoLoadI'].'","'.@$wpNyarukoOption['wpNyarukoAutoLoadB'].'","'.@$wpNyarukoOption['wpNyarukoAutoLoad1'].'","'.@$wpNyarukoOption['wpNyarukoAutoLoad2'].'","'.@$wpNyarukoOption['wpNyarukoAutoLoad3'].'","'.@$wpNyarukoOption['wpNyarukoAutoLoad4'].'"'; ?>];</script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lan.js"></script>
		<script>resize();</script>
		<!-- Blog Navigation -->
		<p><?php if ($wp_query->max_num_pages == 1) {
			echo '<div id="loadstatus" value="2">'.@$wpNyarukoOption['wpNyarukoAutoLoad2'].'</div>';
		} else {
			$wpNyarukoAutoLoadI = intval(@$wpNyarukoOption['wpNyarukoAutoLoadI']);
			if ($wpNyarukoAutoLoadI != 0 && $wpNyarukoAutoLoadI != 1) {
				echo '<div id="loadstatus" value="0">'.@$wpNyarukoOption['wpNyarukoAutoLoad1'].'</div>';
			} else {
				echo '<div id="loadstatus" value="0">'.@$wpNyarukoOption['wpNyarukoAutoLoad3'].'</div>';
			}
		} ?></p>
    </div>
	<?php get_footer(); ?>
<?php } //$wp_query->max_num_pages ?>