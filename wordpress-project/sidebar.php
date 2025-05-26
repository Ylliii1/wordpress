<?php


if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<div class="widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>
    
    <?php if (!dynamic_sidebar('sidebar-1')) : ?>
        
        <div class="widget">
            <h3 class="widget-title">Recent Posts</h3>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                foreach ($recent_posts as $post) :
                ?>
                    <li>
                        <a href="<?php echo get_permalink($post['ID']); ?>">
                            <?php echo $post['post_title']; ?>
                        </a>
                    </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>
        
        <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <ul>
                <?php wp_list_categories(array(
                    'orderby' => 'name',
                    'title_li' => '',
                )); ?>
            </ul>
        </div>
        
        <div class="widget">
            <h3 class="widget-title">Archives</h3>
            <ul>
                <?php wp_get_archives(array(
                    'type' => 'monthly',
                    'limit' => 12,
                )); ?>
            </ul>
        </div>
        
    <?php endif; ?>
</div>