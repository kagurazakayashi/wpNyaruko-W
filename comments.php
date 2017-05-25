<!-- Comment's List -->
<?php
    $wpNyarukoOption = get_option('wpNyaruko_options');
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
        die ('Please do not load this page directly. Thanks!');
    }
    $wpNyarukoCommentMode = false;
    if($wpNyarukoOption['wpNyarukoCommentMode']!='') {
        $wpNyarukoCommentMode = true;
    }
?>
    <?php if($wpNyarukoCommentMode) { ?>
	<li class="decmt-box">
        <p><?php echo $wpNyarukoOption['wpNyarukoCommentBox'] ?></a></p>
    </li>
    <?php } else { ?>
        <?php 
        if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
            // if there's a password
            // and it doesn't match the cookie
        ?>
        <li class="decmt-box">
            <p><a href="#addcomment">请输入密码再查看评论内容.</a></p>
        </li>
        <?php 
            } else if ( !comments_open() ) {
        ?>
        <li class="decmt-box">
            <p><a href="#addcomment">评论功能已经关闭!</a></p>
        </li>
        <?php 
            } else if ( !have_comments() ) { 
        ?>
        <li class="decmt-box">
            <p><a href="#addcomment">还没有任何评论，你来说两句吧</a></p>
        </li>
        <?php 
            } else {
                ?>
                <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/comments.js"></script>
                <div class="commitbgDiv">
	                <div class="commitDiv">
					<div id="t2" width="100%">
			            <?php 
                        wp_list_comments(array(
                            'max_depth'=> 0,
                            'end-callback'=> null,
                            'type'=> 'comment',
                            'avatar_size'=> 40,
                            'reverse_top_level'=> false,
                            'reverse_children'=> false,
                            'callback'=>'comment'
                        ));
                            }
                        ?>

                </div>
            </div>
        </div>
	<div class="commitinputDiv"></div>
    <?php } ?>
<!-- Comment Form -->
<?php 
if ( !comments_open() || $wpNyarukoCommentMode) :
// If registration required and not logged in.
elseif ( get_option('comment_registration') && !is_user_logged_in() ) : 
?>
<p>你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
<?php else  : ?>
<!-- Comment Form -->
<form id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <h3>发表评论</h3>
    <ul>
        <?php if ( !is_user_logged_in() ) : ?>
        <li class="clearfix">
            <label for="name">昵称</label>
            <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="23" tabindex="1" />
        </li>
        <li class="clearfix">
            <label for="email">电子邮件</label>
            <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="23" tabindex="2" />
        </li>
        <li class="clearfix">
            <label for="email">网址(选填)</label>
            <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="23" tabindex="3" />
        </li>
        <?php else : ?>
        <li class="clearfix">您已登录:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出 &raquo;</a></li>
        <?php endif; ?>
        <li class="clearfix">
            <label for="message">评论内容</label>
            <textarea id="message comment" name="comment" tabindex="4" rows="3" cols="40"></textarea>
        </li>
        <li class="clearfix">
            <!-- Add Comment Button -->
            <a href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()" class="button medium black right">发表评论</a> </li>
    </ul>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; 
function comment($comment, $args, $depth) {
    // while(list($key,$val)= each($comment)) { 
    //   echo $key." : ".$val."<br/>"; 
    // }
    $wpNyarukoOption = get_option('wpNyaruko_options');
    $chatme = "l";
    if ($comment->user_id == get_the_author_ID()) {
        $chatme = "r";
    }
?>
<div class="<?php echo $chatme; ?>2">
    <div class="t<?php echo $chatme; ?>">
        <?php if ($chatme=="r") {
        echo '<div class="trRight">';
        } else {
        echo '<span class="tlLeft">';
        }
        ?>
        <div class="commitname"><?php echo $comment->comment_author; ?></div>
        <div class="committime"><?php echo $comment->comment_date; ?></div>
        <?php if ($chatme=="r") {
        echo '</div>';
        } else {
            echo '</span>';
        }
        ?>
    </div>
    <div class="t2">
        <div class="<?php echo $chatme; ?>i">
            <img style="background:url(<?php bloginfo("template_url"); ?>/images/gravatar.png) no-repeat 100% 100%;" src=<?php
                if ($wpNyarukoOption['wpNyarukoGravatarProxy'] && $wpNyarukoOption['wpNyarukoGravatarProxyPage'] && $wpNyarukoOption['wpNyarukoGravatarProxy'] != "" && $wpNyarukoOption['wpNyarukoGravatarProxyPage'] != "") {
                    echo ('"'.$wpNyarukoOption['wpNyarukoGravatarProxyPage'].'&mail='.$comment->comment_author_email.'&size=64"');
                } else {
                    echo '"https://cn.gravatar.com/avatar/'.md5($comment->comment_author_email).'?s=64"';
                }
            ?> /><?php 
            include_once("ua.php");
            $userico = get_osico($comment->comment_agent);
            if ($userico[0] != "") {
                $usericoalt = $userico[2].' / '.$userico[3];
                echo '<a title="'.$usericoalt.'"><div class="commiticon" style="background-color:#'.$userico[1].';"><embed src="'.get_bloginfo("template_url").'/images/'.$userico[0].'.svg" 
type="image/svg+xml"
pluginspage="http://www.adobe.com/svg/viewer/install/" /></div></a>';
            }
            ?>
        </div>
		<div class="<?php echo $chatme; ?>d"></div>
        <span class="<?php echo $chatme; ?>s">
            <div class="<?php echo $chatme; ?>l">  
                <div class="d2"><?php echo $comment->comment_content; ?></div>
            </div>
        </span>
    </div>
</div><div class="cellline"></div>
<?php
}
?>