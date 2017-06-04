<?php
/*
Template Name: 自定义列表
*/
?>
<?php get_header(); ?>
<div class="postlist"><div id="postsbox">
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<?php 
$jsondata = json_decode(explode("[JSON]",get_the_content())[1]);
$indexint = 0;
foreach ($jsondata as $nowdata){
	$itemtype = $nowdata[0];
	$itemdate = $nowdata[1];
    $itemtitle = $nowdata[2];
    $itemsubtitle = $nowdata[3];
    $itemimage = $nowdata[4];
    $itemhref = $nowdata[5];
?>
<div id="blockbdiv<?php echo $indexint ?>" class="blockbdiv" onclick="blockbdivclick(<?php echo "'".$indexint."','"; echo $itemhref; echo "'"; ?>)" onmouseover="blockbdivblur(<?php echo $indexint ?>)" onmouseout="blockbdivfocus(<?php echo $indexint ?>)">
			<div id="blockhiddendiv<?php echo $indexint ?>" class="blockhiddendiv"></div>
				<div name="blocktopdiv" id="blocktopdiv<?php echo $indexint ?>" class="blocktopdiv">
					<img name="blocktopimg" id="blocktopimg<?php echo $indexint; ?>" src="<?php if ($itemimage == "") {
						bloginfo("template_url");
						echo "/images/default.jpg";
					} else {
						echo $itemimage;
					} ?>" alt="<?php echo $itemtitle; ?>" />
					<div class="topline"><?php echo $itemdate; ?></div>
					<div class="toptags"><?php echo $itemtype; ?></div>
				</div>
				<div class="blockbottomdiv">
					<div class="bottomtitle"><?php echo $itemtitle; ?></div>
					<div class="bottomcontent"><?php echo $itemsubtitle; ?></div>
				</div>
			</div>
			<script>blockbdivin($("#blockhiddendiv<?php echo $indexint ?>"));</script>
			<?php echo "<script>datacount=".$indexint.";</script>"; $indexint++; ?>
			<div class="postlisthr">&nbsp;</div>
<?php
} endif; ?>
</div></div>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ceramictiles.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lan.js"></script>
<script>resize();</script>
<?php get_footer(); ?>