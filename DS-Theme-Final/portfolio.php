<?php get_header() ?>
<div class="row">
    <div class="col-8">
        <?php
        $args=[
            // 'cats'=>2,
            // 'category_name'=>'categoria 1',
            // 'category_in'=>array(2,3),
            // 'category_and'=>array(2,3),
            'posts_per_page'=>5
        ]

        $query=new WP Query($args)
            if($query->have_posts()):
                while($query->have_posts()) :$query->the_post(); ?>

                <h2> <?php $query->the_title() ?> </h2>
                <p><?php $query->the_content()?></p>
                <hr>
                <?php
                endwhile;
            endif;
                ?>

    </div>
    <div class="col-4">
        <?php
            if(is_active_sidebar('sidebar-blog')){
        ?>
        <ul>
            <?php dynamic_sidebar('sidebar-blog');?>
        </ul>
                <?php
                }
                ?>

    </div>
</div>

<?php get_footer()?>