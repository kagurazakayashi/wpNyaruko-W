<form id="searchform" name="searchform" method="get" action="<?php bloginfo('home'); ?>/" >
<?php 
/*
$select = wp_dropdown_categories(array(
    'class' => 'search_select',
    'show_option_all' => 0,
    'show_option_none' => 0,
    'orderby' => 'name',
    'show_last_updated' => 0,
    'show_count' => 0,
    'hide_empty' => 1,
    'echo' => 1,
    'hierarchical' => 0,
    'selected' => -1,
    'depth' => 1
));
*/
?>
<input type="text" name="s" id="searchkeyword" onkeydown="searchenter()" onclick="searchclick()"  onBlur="searchblur()" onFocus="searchfocus()" value="搜索" />
<!--<input type="image" value="" src="" />-->
</form>