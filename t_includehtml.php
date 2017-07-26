<?php
/*
Template Name: 导入HTML文章
*/
?>
<?php get_header(); ?>
<h2><?php the_title(); ?></h2>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<div class="includehtml"></div>
<?php
$imphtmlarr = explode("[IMP]",get_the_content());
if (count($imphtmlarr) > 1) {
    $imphtml = $imphtmlarr[1];
    $impdivarr = explode(",",$imphtml);
    $impdiv = "";
    if (count($impdivarr)>1) {
        $imphtml = $impdivarr[0];
        $impdiv = " ".$impdivarr[1];
    }
    echo '<script type="text/javascript">$(".includehtml").load("'.$imphtml.'","'.$impdiv.'")</script>';
} else {
    echo "错误：没有写 [IMP] 关键字";
}
endif; ?>
<?php get_footer(); ?>
<script>