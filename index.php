<?php $wpNyarukoOption = get_option('wpNyaruko_options');
echo "<script type='text/javascript'>var max_num_pages=".$wp_query->max_num_pages.";if(typeof now_num_pages=='undefined') var now_num_pages=".(isset($_GET["paged"])?$_GET["paged"]:1).";</script>";
if (!isset($_GET["data"])) { get_header(); ?>
	<?php if(@$wpNyarukoOption['wpNyarukoScrollpic'] && $wpNyarukoOption['wpNyarukoScrollpic']!="") { ?>
	<div id="indexinfoshow">
		<div id="scrollpic"><?php
		$wpNyarukoScrollpic = @$wpNyarukoOption['wpNyarukoScrollpic'];
		if(@$wpNyarukoOption['wpNyarukoScrollpicSC']!='') {
			echo do_shortcode($wpNyarukoScrollpic);
		} else {
			echo $wpNyarukoScrollpic;
		}
		?></div>
		<div id="scrolltext"><?php get_sidebar('index'); ?></div>
	</div>
	<?php } ?>
	<!-- Column 1 /Content -->
	<div class="postlist">
		<!-- Blog Post -->
		<div id="postsbox">
<?php } $datacount = isset($_GET["data"])?$_GET["data"]+1:0; echo "<script type='text/javascript'>var datacount=".$datacount.";</script>" ?>
			<?php
				$indexint = $datacount;
				if (have_posts()) : while (have_posts()) : the_post();
				$indexint = postlistblock($indexint);
				endwhile; else : ?>
				<p id="nopost">没啦</p>
<?php endif; if (!isset($_GET["data"])) { get_header(); ?>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ceramictiles.js"></script>
		<script type="text/javascript">var wpNyarukoAutoLoadConf=[<?php echo '1,'.@$wpNyarukoOption['wpNyarukoAutoLoadI'].','.@$wpNyarukoOption['wpNyarukoAutoLoadB'].',"'.@$wpNyarukoOption['wpNyarukoAutoLoad1'].'","'.@$wpNyarukoOption['wpNyarukoAutoLoad2'].'","'.@$wpNyarukoOption['wpNyarukoAutoLoad3'].'","'.@$wpNyarukoOption['wpNyarukoAutoLoad4'].'"'; ?>];</script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lan.js"></script>
		<script>resize();</script>
		<!-- Blog Navigation -->
		<p><?php if ($wp_query->max_num_pages == 1) {
			echo '<div id="loadstatus" value="2">'.@$wpNyarukoOption['wpNyarukoAutoLoad2'].'</div>';
		} else {
			$wpNyarukoAutoLoadI = intval(@$wpNyarukoOption['wpNyarukoAutoLoadI']);
			if ($wpNyarukoAutoLoadI != 0) {
				echo '<div id="loadstatus" value="0">'.@$wpNyarukoOption['wpNyarukoAutoLoad1'].'</div>';
			} else {
				echo '<div id="loadstatus" value="0"><a href="javascript:loadnextpage();" title="跳转到第2页">'.@$wpNyarukoOption['wpNyarukoAutoLoad3'].'</a></div>';
			}
		} ?></p>
    </div>
	<?php get_footer(); ?>
<?php } //$wp_query->max_num_pages ?>