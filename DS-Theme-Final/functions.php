<?php
function load_script(){
    wp_enqueue_style('style',get_stylesheet_uri(),array(),filemtime(get_template_directory(). '/style.css'),'all');
}
add_action('wp_enqueue_scripts','load_script');

?>