<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="logo">
        <?php 
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<a href="' . home_url() . '"><h1>' . get_bloginfo('name') . '</h1></a>';
        }
        ?>
    </div>

    <nav class="links">
        <?php 
        wp_nav_menu(array(
            'theme_location' => 'main_menu',
            'container'      => false,
            'menu_class'     => 'main-menu-list' 
        )); 
        ?>
    </nav>

    <div class="link">
        <?php 
        $front_id = get_option('page_on_front');
        
        $header_button = get_field('header_button', $front_id) ?: get_field('header_button', 'option');

        if ( $header_button ) : 
            $button_url    = $header_button['url'];
            $button_title  = $header_button['title'];
            $button_target = $header_button['target'] ? $header_button['target'] : '_self';
            ?>
            <a href="<?php echo esc_url($button_url); ?>" 
               class="login-btn" 
               target="<?php echo esc_attr($button_target); ?>">
                <?php echo esc_html($button_title); ?>
            </a>
        <?php endif; ?>
    </div>
</header>