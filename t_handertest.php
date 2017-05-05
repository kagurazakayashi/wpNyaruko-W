<?php
/*
Template Name: 页头页脚测试页面
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<h2><?php the_title(); ?></h2>
<div>
    <?php the_content(); ?>
</div>
<?php endif; ?>
<?php get_footer(); ?>