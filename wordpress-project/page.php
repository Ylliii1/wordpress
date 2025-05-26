<?php get_header(); ?>

<main class="main-content">
    <div class="container">
        <div class="content-grid">
            <div class="posts-container">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="page-<?php the_ID(); ?>" <?php post_class('post single-page'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            
                            <div class="post-content-full">
                                <?php the_content(); ?>
                            </div>
                            
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">',
                                'after' => '</div>',
                            ));
                            ?>
                        </div>
                    </article>
                    
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                    
                <?php endwhile; ?>
            </div>
            
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>