<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>

<main class="site-main alumni-page home-page"> 
<div class="sections__layout_out">
    <div class="container content-sections__layout">

<aside class="category-sidebar">
            <?php 
            get_template_part('template-parts/category-nav', null, array(
                'taxonomy' => array('alumni_category', 'staff_category')
            )); 
            ?>
 </aside>
        <div class="content-sections__main">
            <?php 
            // אלומני!!!!
            get_template_part('template-parts/content-loop', null, array(
                'post_type' => 'alumni',
                'taxonomy'  => 'alumni_category'
            )); 

            //  סטאף!!!!!
            get_template_part('template-parts/content-loop', null, array(
                'post_type' => 'staff',
                'taxonomy'  => 'staff_category'
            )); 
            ?>
        </div>
    </div>
    <div>
</main>

<?php get_template_part('template-parts/banner'); ?>
<?php get_footer(); ?>