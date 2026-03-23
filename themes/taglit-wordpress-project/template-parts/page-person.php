<?php
$post_type = $args['post_type'];
$taxonomy  = $args['taxonomy'];
?>

<?php get_header(); ?>

<main class="site-main alumni-page">
    <?php get_template_part('template-parts/hero'); ?>

 

    <div class="container content-sections__layout">
    <div class="category-nav-div" >
    <?php get_template_part('template-parts/category-nav', null, array(
            'taxonomy' => $taxonomy
        )); ?>
    </div>
        <div class="content-sections__main">

            <?php 
            get_template_part('template-parts/content-loop', null, array(
                'post_type' => $post_type,
                'taxonomy'  => $taxonomy
            )); 
            ?>
        </div>
        
    </div>

    <?php get_template_part('template-parts/banner'); ?>
</main>

<?php get_footer(); ?>