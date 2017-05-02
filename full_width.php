<?php
/*
Template Name: Page without sidebar
*/
?>
<?php get_header(); ?>
	<!-- Column 1 / Content -->
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
	<div class="grid_12">
		<h4 class="page_title"><?php the_title(); ?></h4>
		<div class="hr dotted clearfix">&nbsp;</div>
		<?php the_content(); ?>
		<?php comments_template(); ?>
	</div>
	<?php else : ?>
	<div class="grid_12">
		Ã»ÓÐÈÎºÎÎÄÕÂ£¡
	</div>
	<?php endif; ?>
	<div class="hr grid_12 clearfix">&nbsp;</div>
<?php get_footer(); ?>
