<?php

function iron_swords_enqueue_assets() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'iron_swords_enqueue_assets');


function iron_swords_setup() {
    register_nav_menus(array(
        'main_menu' => 'Main Navigation Menu'
    ));

    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'iron_swords_setup');


// Register Custom Post Typess
function iron_swords_register_post_types() {
    
    register_post_type('alumni', array(
        'labels' => array(
            'name' => 'Alumni',
            'singular_name' => 'Alumni Post',
            'add_new_item' => 'Add New Alumni Post'
        ),
        'public'      => true,
        'has_archive' => false,
        'rewrite'      => array('slug' => 'alumni-posts'),
        'menu_icon'   => 'dashicons-groups',
        'supports'    => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));

    register_post_type('staff', array(
        'labels' => array(
            'name' => 'Staff',
            'singular_name' => 'Staff Post',
            'add_new_item' => 'Add New Staff Post'
        ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-businessman',
        'supports'    => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'iron_swords_register_post_types');

// Register Custom Taxonomies
function iron_swords_register_taxonomies() {

  $alumni_labels = array(
      'name'              => 'Alumni Categories',
      'singular_name'     => 'Alumni Category',
      'search_items'      => 'Search Alumni Categories',
      'all_items'         => 'All Alumni Categories',
      'parent_item'       => 'Parent Alumni Category',
      'parent_item_colon' => 'Parent Alumni Category:',
      'edit_item'         => 'Edit Alumni Category',
      'update_item'       => 'Update Alumni Category',
      'add_new_item'      => 'Add New Alumni Category',
      'new_item_name'     => 'New Alumni Category Name',
      'menu_name'         => 'Alumni Categories',
  );

  $alumni_args = array(
      'hierarchical'      => true,
      'labels'            => $alumni_labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array('slug' => 'alumni-category'),
      'show_in_rest'      => true,
  );

  register_taxonomy('alumni_category', array('alumni'), $alumni_args);

  $staff_labels = array(
      'name'              => 'Staff Categories',
      'singular_name'     => 'Staff Category',
      'search_items'      => 'Search Staff Categories',
      'all_items'         => 'All Staff Categories',
      'parent_item'       => 'Parent Staff Category',
      'parent_item_colon' => 'Parent Staff Category:',
      'edit_item'         => 'Edit Staff Category',
      'update_item'       => 'Update Staff Category',
      'add_new_item'      => 'Add New Staff Category',
      'new_item_name'     => 'New Staff Category Name',
      'menu_name'         => 'Staff Categories',
  );

  $staff_args = array(
      'hierarchical'      => true,
      'labels'            => $staff_labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array('slug' => 'staff-category'),
      'show_in_rest'      => true,
  );

  register_taxonomy('staff_category', array('staff'), $staff_args);
}
add_action('init', 'iron_swords_register_taxonomies');

//check it!!!
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'    => 'General Settings',
            'menu_title'    => 'General Settings',
            'menu_slug'     => 'general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}