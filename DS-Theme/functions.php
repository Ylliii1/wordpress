<?php

function mytheme_enqueue(){
    //load main wordpress style.css
    wp_enqueue_style('ds-theme-style', get_stylesheet_uri());

    //load custom custom css from assets/css/style.css
    wp_enqueue_style('ds-theme-custom-style', get_template_directory_uri(). '/asstets/css/style.css', array());

    //load custom javascript filr
    wp_enqueue_script('ds-theme-custom-script', get_template_directory_uri(). '/asstets/js/sript.js', array('jquery'));

    //enqueue comments reply script
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'dstheme_enqueue_assets');

?>