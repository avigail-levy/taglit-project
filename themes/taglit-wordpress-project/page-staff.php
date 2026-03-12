<?php get_header(); ?>
<main class="site-main alumni-page">
    <?php get_template_part('template-parts/hero'); ?>
    
    <div class="container content-sections__layout">
        <?php get_template_part('template-parts/category-nav', null, array('taxonomy' => 'staff_category')); ?>
        
        <div class="content-sections__main">
            <?php 
            get_template_part('template-parts/content-loop', null, array(
                'post_type' => 'staff',
                'taxonomy'  => 'staff_category'
            )); 
            ?>
        </div>
    </div>
    <?php get_template_part('template-parts/banner'); ?>
</main>
<?php get_footer();?>