<?php get_header(); ?>

<main class="main-content">
    <div class="container">
        <div class="content-grid">
            <div class="posts-container">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post single-post'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <span class="post-author">by <?php the_author(); ?></span>
                                <span class="post-category"><?php the_category(', '); ?></span>
                                <?php if (has_tag()) : ?>
                                    <span class="post-tags"><?php the_tags('Tags: ', ', '); ?></span>
                                <?php endif; ?>
                            </div>
                            
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
                    
                    <nav class="post-navigation">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '← Previous Post'); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', 'Next Post →'); ?>
                        </div>
                    </nav>
                    
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