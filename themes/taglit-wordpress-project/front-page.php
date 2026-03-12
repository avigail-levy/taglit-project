<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>

<main class="site-main alumni-page home-page"> 
    <div class="container content-sections__layout">
        
    <aside class="category-sidebar">
    <div class="category-group">
        <h3 class="sidebar-title">Alumni</h3>
        <?php get_template_part('template-parts/category-nav', null, array('taxonomy' => 'alumni_category')); ?>
    </div>

    <div class="category-group">
        <h3 class="sidebar-title">Staff</h3>
        <?php get_template_part('template-parts/category-nav', null, array('taxonomy' => 'staff_category')); ?>
    </div>
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
</main>

<?php get_template_part('template-parts/banner'); ?>
<?php get_footer(); ?>