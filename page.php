<?php get_header(); $wpNyarukoOption = get_option('wpNyaruko_options'); ?>
	<div id="scrollpic" class="singleleftbox">
		<!-- Column 1 /Content -->
		<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
		<div id="singlebdiv">
			<div id="singlerightdiv">
				<span id="srdtop">
					<div id="srdtitle"><?php the_title(); ?></div>
					<div id="srddate"><?php the_time('Y年n月j日') ?> &bull; <?php
					 $category = get_the_category();
					 if (count($category) == 0) {
						echo "页面";
					 } else {
						$category = $category[0];
						echo '<a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
					 }
					 edit_post_link('编辑', ' &bull; ', '');
					 ?></div>
				</span>
				<div id="srdcontentbox"><div id="srdcontent">
					<?php if (@$wpNyarukoOption['wpNyarukoAuthorPage']!='' && get_the_author_description() != "") { ?>
					<hr><table id="authorinfo" width="100%" border="0" cellspacing="0" cellpadding="10px">
						<tbody>
							<tr>
							<td width="128px" align="center" valign="middle">
								<div id="authorimg"><a title="<?php the_author(); ?>" href="<?php the_author_url(); ?>" ><img class="comsimg" style="background:url(<?php bloginfo("template_url"); ?>/images/gravatar.png) no-repeat 100% 100%;" src=<?php
									if (usepxy($wpNyarukoOption)) {
										echo ('"'.$wpNyarukoOption['wpNyarukoGravatarProxyPage'].'&mail='.get_the_author_email().'&size=128"');
									} else {
										echo '"https://cn.gravatar.com/avatar/'.md5(get_the_author_email()).'?s=128"';
									}
								?> alt="<?php the_author(); ?>" /></a></div>
							</td>
							<td><span>
								<p><a title="<?php the_author_url(); ?>" href="<?php the_author_url(); ?>" ><?php the_author(); ?></a></p>
								<p><?php the_author_description(); ?></p>
							</span></td>
							</tr>
						</tbody>
					</table><hr>
					<?php } ?>
					<?php the_content(); ?>
				</div></div>
			</div>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/single.js"></script>
		<div id="commentsbox"><p><?php echo @$wpNyarukoOption['wpNyarukoCommentTitle'] ?></p><?php comments_template(); ?></div>
	    <?php else : ?>
	    <div class="errorbox">
	        没有文章！
	    </div>
	    <?php endif; ?>
	</div>
    <div id="scrolltextsingle"><?php get_sidebar('page'); ?></div>
	<?php get_footer(); ?>
	<?php 
	function usepxy($wpNyarukoOption)
	{
		if ($wpNyarukoOption['wpNyarukoGravatarProxy'] && $wpNyarukoOption['wpNyarukoGravatarProxyPage'] && $wpNyarukoOption['wpNyarukoGravatarProxy'] != "" && $wpNyarukoOption['wpNyarukoGravatarProxyPage'] != "") {
			return true;
		}
		return false;
	}
	?>