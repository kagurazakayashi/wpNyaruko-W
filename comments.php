<!-- Comment's List -->

    <div class="commitinputDiv">
    <div class="commitinputDiv">
    <div class="commitinputDiv">
<?php
    $wpNyarukoOption = get_option('wpNyaruko_options');
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
        die ('Please do not load this page directly. Thanks!');
    }
    $wpNyarukoCommentMode = false;
    if(@$wpNyarukoOption['wpNyarukoCommentMode']!='') {
        $wpNyarukoCommentMode = true;
    }
?>
    <?php if($wpNyarukoCommentMode) { ?>
	<li class="decmt-box">
        <p><?php echo @$wpNyarukoOption['wpNyarukoCommentBox'] ?></a></p>
    </li>
    <?php } else { ?>
        <?php 
        if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
            // if there's a password
            // and it doesn't match the cookie
        ?>
            <div><p><a href="#addcomment">请输入密码再查看评论内容.</a></p>
        <?php 
            } else if ( !comments_open() ) {
        ?>
            <div><p><a href="#addcomment">评论功能已经关闭!</a></p>
        <?php 
            } else if ( !have_comments() ) {
        ?>
            <div><p><a href="#addcomment">还没有任何评论，你来说两句吧</a></p>
        <?php 
            } else {
                ?>
                <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/md5.js"></script>
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
                        echo "</div></div>";
                            }
                        ?>

                </div>
            </div>
        </div>
    <?php } ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/comments.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/qrcode.js"></script>
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
<a name="respond"></a><h3>发表评论</h3>
<?php if ( !is_user_logged_in() ) : ?>
<p><table border="0" cellspacing="10" cellpadding="0">
  <tbody>
    <tr>
      <td width="100">昵称</td>
      <td><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="15" maxlength="20" tabindex="1" /></td>
    </tr>
    <tr>
      <td>电子邮件</td>
      <td><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="15" maxlength="20" tabindex="2" onblur="emailonblur()" /></td>
    </tr>
    <tr>
      <td>网址(选填)</td>
      <td><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="15" maxlength="20" tabindex="3" /></td>
    </tr>
  </tbody>
</table></p>
<?php else : ?>
<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>
（<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">登出</a>）
<?php endif; 
if (isset($_GET["replytoname"])) {
    $commenttoname = base64_decode($_GET["replytoname"]); ?>
    <div id="committodiv"><a title="点此取消回复 <?php echo $commenttoname; ?> 的评论，改为回复文章作者。" href="<?php
    echo $_SERVER['PHP_SELF'].'?';
    $pidval = gpage();
    echo "=".$pidval;
    ?>#respond">@ <?php echo $commenttoname; ?> :</a></div>
<?php } ?>
<div class="commitbgDiv">
<div class="l2">
<?php $replyinfo = @getreplyinfo();
$current_user = get_currentuserinfo();
?>
    <div class="t2">
        <div class="li">
            <a id="comsimga" title="请先填写邮箱，然后点击空白处，再点击这里可以修改头像和信息。" href="<?php if (is_user_logged_in()) echo "https://cn.gravatar.com/".md5($current_user->user_email); ?>" target="_blank"><img class="comsimg" src="<?php 
            if ( is_user_logged_in() ) {
                if (usepxy($wpNyarukoOption)) {
                    echo ($wpNyarukoOption['wpNyarukoGravatarProxyPage'].'&mail='.$current_user->user_email.'&size=64');
                } else {
                    echo 'https://cn.gravatar.com/avatar/'.md5($current_user->user_email).'?s=64';
                }
            } else {
                echo bloginfo("template_url")."/images/gravatar.png";
            }
?>" none="<?php bloginfo("template_url"); ?>/images/gravatar.png" pxy="<?php
    if (usepxy($wpNyarukoOption)) {
        echo @$wpNyarukoOption['wpNyarukoGravatarProxyPage'];
    }
?>" /></a><?php 
            include_once("ua.php");
            $userico = get_osico($_SERVER['HTTP_USER_AGENT']);
            if ($userico[0] != "") {
                $usericoalt = $userico[2].' / '.$userico[3];
                $svgtype = ".png";
                if(@$wpNyarukoOption['wpNyarukoSVG']!='') {
                    $svgtype = ".svg";
                }
                $svgsrc = get_bloginfo("template_url").'/images/'.$userico[0].$svgtype;
                echo '<a title="'.$usericoalt.'"><div class="commiticon" style="background-color:#'.$userico[1].';"><img class="commiticonimg" src="'.$svgsrc.'" alt="'.$usericoalt.'" /></div></a>';
                /*
<img src="'.$svgsrc.'" alt="'.$usericoalt.'" />
<embed src="'.$svgsrc.'" 
type="image/svg+xml"
pluginspage="http://www.adobe.com/svg/viewer/install/" />
*/
            }
            ?>
        </div>
		<div class="ld"></div>
        <span class="ls" id="newls">
            <div class="ll">  
                <input type="hidden" id="comment" name="comment" value=""></input>
                <div class="d2"><div id="commentd" tabindex="4" contenteditable="true" onfocus="emailonblur()"></div></div>
            </div>
        </span>
    </div>
</div>
</div>
<div id="newcellline"></div>
<?php 
    comment_id_fields();
    do_action('comment_form', $post->ID);
?>
<div id="sentcommentbox"><a href="javascript:void(0);" onClick="commentsubmit()" id="sentcomment">按Enter键或点此发送</a></div>
</form>
<form id="commentone" name="commentone" action="<?php echo $_SERVER['PHP_SELF']; ?>#respond" method="get">
<input id="commentoneid" type="hidden" name="<?php $pidval = gpage(); ?>" value="<?php echo $pidval; ?>">
<input id="commentoneto" type="hidden" name="replytocom" value="">
<input id="commentonename" type="hidden" name="replytoname" value="">
</form>
<?php
    endif;
function gpage() {
    if (isset($_GET["page_id"])) {
        echo "page_id";
        return $_GET["page_id"];
    } else if (isset($_GET["p"])) {
        echo "p";
        return $_GET["p"];
    } else {
        echo "noid";
    }
    return "";
}
function comment($comment, $args, $depth) {
    comment_reply_link();
    $wpNyarukoOption = get_option('wpNyaruko_options');
    // while(list($key,$val)= each($comment)) { 
    //   echo $key." : ".$val."<br/>"; 
    // }
    $chatme = "l";
    if ($comment->user_id == get_the_author_ID()) {
        $chatme = "r";
    }
?>
<a name="comment<?php echo $comment->comment_ID; ?>"></a>
<div class="<?php echo $chatme; ?>2">
<?php $replyinfo = getreplyinfo(); ?>
<div class="cellrep" onmousemove="cellmousemove($(this));" onmouseout="cellmouseout($(this));" onclick="to_reply('<?php echo $replyinfo[0]; ?>','<?php echo $replyinfo[1]; ?>','<?php echo $replyinfo[2]; ?>');"></div>
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
            <a href="<?php echo $comment->comment_author_url; ?>" title="<?php echo $comment->comment_author_url; ?>" target="_blank"><img class="comsimg" style="background:url(<?php bloginfo("template_url"); ?>/images/gravatar.png) no-repeat 100% 100%;" src=<?php
                if (usepxy($wpNyarukoOption)) {
                    echo ('"'.$wpNyarukoOption['wpNyarukoGravatarProxyPage'].'&mail='.$comment->comment_author_email.'&size=64"');
                } else {
                    echo '"https://cn.gravatar.com/avatar/'.md5($comment->comment_author_email).'?s=64"';
                }
            ?> /></a><?php 
            include_once("ua.php");
            $userico = get_osico($comment->comment_agent);
            if ($userico[0] != "") {
                $usericoalt = $userico[2].' / '.$userico[3];
                $svgtype = ".png";
                if(@$wpNyarukoOption['wpNyarukoSVG']!='') {
                    $svgtype = ".svg";
                }
                $svgsrc = get_bloginfo("template_url").'/images/'.$userico[0].$svgtype;
                echo '<a title="'.$usericoalt.'"><div class="commiticon" style="background-color:#'.$userico[1].';"><img class="commiticonimg" src="'.$svgsrc.'" alt="'.$usericoalt.'" /></div></a>';
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
</div>