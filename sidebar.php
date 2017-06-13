    <!-- Column 2 / Sidebar -->
    <div class="sidebarsbox">
        
    <?php if ( !function_exists('dynamic_sidebar') 
                        || !dynamic_sidebar('侧边栏1') ) : ?>
        <ul>
            <?php wp_list_categories('depth=1&title_li=&orderby=id&show_count=0&hide_empty=1&child_of=0'); ?>
        </ul>
    <?php endif; ?>
    

    
    </div>