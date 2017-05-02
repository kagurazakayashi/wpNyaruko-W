<?php echo "<script>var max_num_pages=".$wp_query->max_num_pages.";var now_num_pages=1;</script>";
if (!isset($_GET["data"])) { get_header(); ?>
	<!-- Column 1 /Content -->
	
<?php
global $wp_query;

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
    query_posts($arms);
} ?>

	<!-- Column 1 /Content -->
	<div class="postlist">
		<!-- Blog Post -->
		<div id="postsbox">
<?php } $datacount = isset($_GET["data"])?$_GET["data"]:0; echo "<script>var paged=".(isset($_GET["paged"])?$_GET["paged"]:1).";datacount=".$datacount.";</script>" ?>
			<?php
				$indexint=$datacount;
				if (have_posts()) : while (have_posts()) : the_post();
			?>
			<div id=<?php echo "blockbdiv".$indexint++; ?> class="blockbdiv" onclick="javascrtpt:window.location.href='<?php the_permalink(); ?>'">
				<div name="blocktopdiv" class="blocktopdiv">
					<img name="blocktopimg" id="blocktopimg" src="<?php echo catch_that_image() ?>" alt=""/>
					<div class="topline"><?php the_time('Y-m-d') ?>&nbsp;</div>
					<div class="toptags"><?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; ?></div>
				</div>
				<div class="blockbottomdiv">
					<div class="bottomtitle"><?php the_title(); ?></div>
					<div class="bottomcontent"><?php
							$content = get_the_content();
							$content = preg_replace('/<img.*? \/>/','',$content);
							$content = str_replace(array("\r\n", "\r", "\n"), "<br/>", $content);
							$content = str_replace("<br/><br/>", "<br/>", $content);
							$content = str_replace("<br/><br/>", "<br/>", $content);
							$contentStart = substr($content,0,5);
							if ($contentStart == "<br/>") {
								$content = substr($content,5,(strlen($content)-5));
							}
							echo $content;
							?></div>
				</div>
			</div>
			<?php echo "<script>datacount=".$indexint.";</script>" ?>
			<div class="postlisthr">&nbsp;</div>
			<?php endwhile; else : ?>
				<p id="nopost">没啦</p>
<?php endif; if (!isset($_GET["data"])) { get_header(); ?>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ceramictiles.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lan.js"></script>
		<script>resize();</script>
		<!-- Blog Navigation -->
		<p><?php if ($wp_query->max_num_pages == 1) {
			echo '<div id="loadstatus" value="2">没有更多内容了</div>';
		} else {
			echo '<div id="loadstatus" value="0">滚动到页面最下方加载更多内容</div>';
		} ?></p>
    </div>
	<?php get_footer(); ?>
<?php } //$wp_query->max_num_pages ?>