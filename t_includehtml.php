<?php
/*
Template Name: 导入HTML文章
*/
?>
<?php get_header(); ?>
<h2><?php the_title(); ?></h2>
<div id="includehtml">
<?php
$imphtmlarr = explode("[IMP]",get_the_content());
$imphtml = $imphtmlarr[1];
$impdivarr = explode(",",$imphtml);
$impdiv = "";
if (count($impdivarr)>1) {
    $imphtml = $impdivarr[0];
    $impdiv = " ".$impdivarr[1];
}
echo '<script type="text/javascript">$("#includehtml").load("'.$imphtml.$impdiv.'")</script>';
?>
</div>
<?php get_footer(); ?>
<script>