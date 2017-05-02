<?php
/*
Template Name: contract
*/
?>
<?php get_header(); ?>
	<!-- Caption Line -->
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
	<h2 class="grid_12 caption clearfix"><?php the_title(); ?></h2>
	<div class="hr grid_12 clearfix">&nbsp;</div>
	<!-- Column 1 / Content -->
	<div class="grid_8">
		<?php the_content(); ?>
		<?php comments_template(); ?>
	</div>
	<?php else : ?>
	<div class="grid_8">
		Ã»ÓÐÈÎºÎÎÄÕÂ£¡
	</div>
	<?php endif; ?>
	<!-- Column 2 / Sidebar -->
	<div class="grid_4 contact">
		<!-- Adress and Phone Details -->
		<h4>Address and Phone</h4>
		<div class="hr dotted clearfix">&nbsp;</div>
		<ul>
			<li> <strong>Your Company Name</strong><br />
				1458 Sample Road, Redvalley<br />
				City (State) H4Q 1J7<br />
				Country<br />
				<br />
			</li>
			<li>USA - (888) 888-8888</li>
			<li>Worldwide - (888) 888-8888</li>
		</ul>
		<!-- Email Addresses -->
		<h4>Emails</h4>
		<div class="hr dotted clearfix">&nbsp;</div>
		<ul>
			<li>General - <a href="mailto:info@yourcompany.com">info@yourcompany.com</a></li>
			<li>Sales - <a href="mailto:sales@yourcompany.com">sales@yourcompany.com</a></li>
		</ul>
		<!-- Social Profile Links -->
		<h4>Social Profiles</h4>
		<div class="hr dotted clearfix">&nbsp;</div>
		<ul>
			<li class="float"><a href="#"><img alt="" src="images/twitter.png" title="Twitter" /></a></li>
			<li class="float"><a href="#"><img alt="" src="images/facebook.png" title="Facebook" /></a></li>
			<li class="float"><a href="#"><img alt="" src="images/stumbleupon.png" title="StumbleUpon" /></a></li>
			<li class="float"><a href="#"><img alt="" src="images/flickr.png" title="Flickr" /></a></li>
			<li class="float"><a href="#"><img alt="" src="images/delicious.png" title="Delicious" /></a></li>
		</ul>
	</div>
	<div class="hr grid_12 clearfix">&nbsp;</div>
<?php get_footer(); ?>