<?php get_header(); ?>

	<div id="singleleftbox" style="width: 80%; float: left;">
		<!-- Column 1 /Content -->
		<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
		<div id="singlebdiv">
			<div id="singleleftdiv"></div>
			<div id="singlerightdiv">
				<span id="srdtop">
					<div id="srdtitle"><?php the_title(); ?></div>
					<div id="srddate"><?php the_time('Y年n月j日') ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?><?php edit_post_link('编辑', ' &bull; ', ''); ?></div>
				</span>
				<div id="srdcontent"><?php the_content(); ?></div>
			</div>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/single.js"></script>
	    <?php else : ?>
	    <div class="errorbox">
	        没有文章！
	    </div>
	    <?php endif; ?>
	</div>
    <div style="width: 20%; float: left;"><?php get_sidebar(); ?></div>
	<?php get_footer(); ?>
