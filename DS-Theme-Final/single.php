<?php get_header() ?>


<div id="primary">
    <div id="main">
        <div class="container">
            <?php
            while( have_posts() ):
                the_post();
            if ( comments_open() || get_comments_number()){
                comments_template();
            }
            endwhile;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>