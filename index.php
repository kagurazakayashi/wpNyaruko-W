<?php echo "<script>var max_num_pages=".$wp_query->max_num_pages.";var now_num_pages=1;</script>";
if (!isset($_GET["data"])) { get_header(); ?>
	<div style="width: 100%;">
		<div id="scrollpic"><?php echo do_shortcode("[huge_it_slider id='2']"); ?></div>
		<div id="scrolltext"><?php get_sidebar(); ?></div>
	</div>
	<!-- Column 1 /Content -->
	<div class="postlist">
		<!-- Blog Post -->
		<div id="postsbox">
<?php } $datacount = isset($_GET["data"])?$_GET["data"]+1:0; echo "<script>var paged=".(isset($_GET["paged"])?$_GET["paged"]:1).";datacount=".$datacount.";</script>" ?>
			<?php
				$indexint=$datacount;
				if (have_posts()) : while (have_posts()) : the_post();
			?>
			<div id="blockbdiv<?php echo $indexint ?>" class="blockbdiv" onclick="blockbdivclick(<?php echo "'".$indexint."','"; the_permalink(); echo "'"; ?>)" onmouseover="blockbdivblur(<?php echo $indexint ?>)" onmouseout="blockbdivfocus(<?php echo $indexint ?>)">
			<div id="blockhiddendiv<?php echo $indexint ?>" class="blockhiddendiv"></div>
				<div name="blocktopdiv" id="blocktopdiv<?php echo $indexint ?>" class="blocktopdiv">
					<img name="blocktopimg" id="blocktopimg<?php echo $indexint ?>" src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" />
					<div class="topline"><?php the_time('Y-m-d') ?>&nbsp;</div>
					<div class="toptags"><?php $category = get_the_category(); echo '<a href="'.get_category_link(end($category)->term_id ).'">'.end($category)->cat_name.'</a>'; ?></div>
				</div>
				<div class="blockbottomdiv">
					<div class="bottomtitle"><?php the_title(); ?></div>
					<div class="bottomcontent"><?php
							the_excerpt();
							// $content = get_the_content();
							// $content = preg_replace('/<img.*? \/>/','',$content);
							// $content = str_replace(array("\r\n", "\r", "\n"), "<br/>", $content);
							// $content = str_replace("<br/><br/>", "<br/>", $content);
							// $content = str_replace("<br/><br/>", "<br/>", $content);
							// $contentStart = substr($content,0,5);
							// if ($contentStart == "<br/>") {
							// 	$content = substr($content,5,(strlen($content)-5));
							// }
							// echo $content;
							?></div>
				</div>
			</div>
			<script>blockbdivin($("#blockhiddendiv<?php echo $indexint ?>"));</script>
			<?php echo "<script>datacount=".$indexint.";</script>"; $indexint++; ?>
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