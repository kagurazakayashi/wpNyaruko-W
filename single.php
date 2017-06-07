<?php get_header(); ?>
	
	<div style="width: 100%;">
    	<div id="scrolltextsingle"><?php get_sidebar(); ?></div>
		<div id="scrollpic" class="singleleftbox">
			<!-- Column 1 /Content -->
			<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
			<div id="singlebdiv">
				<div id="singlerightdiv">
					<span id="srdtop">
						<div id="srdtitle"><?php the_title(); ?></div>
						<div id="srddate"><?php the_time('Y年n月j日') ?> &bull; <?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; ?><?php edit_post_link('编辑', ' &bull; ', ''); ?></div>
					</span>
					<div id="srdcontentbox"><div id="srdcontent"><?php the_content(); ?></div></div>
				</div>
			</div>
			<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/single.js"></script>
			<div id="commentsbox"><p><b>评论区</b>（如果看不到，请先想办法访问谷歌233）</p><?php comments_template(); ?></div>
		    <?php else : ?>
		    <div class="errorbox">
		        没有文章！
		    </div>
		    <?php endif; ?>
		</div>
	<?php get_footer(); ?>
	</div>

