<?php get_header(); ?>
<!-- Column 1 / Content -->
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<h2><?php the_title(); ?></h2>
<div>
    <?php the_content(); ?>
    <!-- Contact Form -->
    <div id="commentsbox"><p><b>评论区</b>（如果看不到，请先想办法访问谷歌233）</p><?php comments_template(); ?></div>
</div>
<?php else : ?>
<div>
    没有找到你想要的页面！
</div>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>