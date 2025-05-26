<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <nav class="main-navigation" id="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'container' => false,
                    'fallback_cb' => 'modernpress_fallback_menu',
                ));
                ?>
            </nav>
            
            <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                ☰
            </button>
        </div>
    </div>
</header>

<?php if (is_front_page() && !is_paged()) : ?>
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1><?php echo get_theme_mod('hero_title', 'Welcome to ' . get_bloginfo('name')); ?></h1>
            <p><?php echo get_theme_mod('hero_description', get_bloginfo('description')); ?></p>
            <?php if (get_theme_mod('hero_button_text')) : ?>
                <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '#')); ?>" class="btn">
                    <?php echo esc_html(get_theme_mod('hero_button_text')); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>