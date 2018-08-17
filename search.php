<?php echo "<script>var max_num_pages=".$wp_query->max_num_pages.";var now_num_pages=1;</script>";
if (!isset($_GET["data"])) { get_header(); ?>
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