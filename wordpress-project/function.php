<?php

function modernpress_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'modernpress'),
        'footer' => esc_html__('Footer Menu', 'modernpress'),
    ));
    
    add_image_size('modernpress-featured', 800, 400, true);
}
add_action('after_setup_theme', 'modernpress_setup');

function modernpress_scripts() {
    wp_enqueue_style('modernpress-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('modernpress-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'modernpress_scripts');

function modernpress_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'modernpress'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'modernpress'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name' => sprintf(esc_html__('Footer %d', 'modernpress'), $i),
            'id' => 'footer-' . $i,
            'description' => sprintf(esc_html__('Footer widget area %d', 'modernpress'), $i),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
}
add_action('widgets_init', 'modernpress_widgets_init');

function modernpress_customize_register($wp_customize) {
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'modernpress'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Welcome to ' . get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'modernpress'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_description', array(
        'default' => get_bloginfo('description'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'modernpress'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_button_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Hero Button Text', 'modernpress'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_button_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('hero_button_url', array(
        'label' => __('Hero Button URL', 'modernpress'),
        'section' => 'hero_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'modernpress_customize_register');

function modernpress_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    wp_list_pages(array(
        'title_li' => '',
        'depth' => 1,
    ));
    echo '</ul>';
}

function modernpress_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'modernpress_excerpt_length');

function modernpress_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'modernpress_excerpt_more');

function modernpress_custom_post_types() {
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio Item',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Portfolio Item',
            'edit_item' => 'Edit Portfolio Item',
            'new_item' => 'New Portfolio Item',
            'view_item' => 'View Portfolio Item',
            'search_items' => 'Search Portfolio',
            'not_found' => 'No portfolio items found',
            'not_found_in_trash' => 'No portfolio items found in trash',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'portfolio'),
    ));
}
add_action('init', 'modernpress_custom_post_types');