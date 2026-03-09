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
        $login_text = get_field('login_button_text', $front_id) ?: get_field('login_button_text');
        $login_url  = get_field('login_button_url', $front_id) ?: get_field('login_button_url');

        if ( ! $login_text && is_user_logged_in() ) {
            $login_text = "Login"; 
        }

        if ( $login_text ) : ?>
            <a href="<?php echo esc_url($login_url); ?>" class="login-btn">
                <?php echo esc_html($login_text); ?>
            </a>
        <?php endif; ?>
    </div>
</header>