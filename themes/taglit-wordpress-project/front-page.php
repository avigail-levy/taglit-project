<?php get_header(); ?>

<?php 
$title      = get_field('hero_title');
$subtitle   = get_field('hero_subtitle');
$bg_image   = get_field('hero_background'); 
$btn_text   = get_field('hero_btn_text');
$btn_url    = get_field('hero_btn_url'); 
?>
<section class="hero-section" style="--hero-bg: url('<?php echo esc_url($bg_image); ?>');">
    <div class="hero-texture-overlay"></div> 

    <div class="container hero-container">
        <div class="hero-content">
            
            <!-- <div class="hero-top-logo mb-4">
                 <img src="<?php echo get_template_directory_uri(); ?>/images/beyond-logo.png" alt="Beyond Logo">
            </div> -->

            <?php if($title): ?>
                <h1 class="hero-main-title"><?php echo esc_html($title); ?></h1>
            <?php endif; ?>

            <?php if($subtitle): ?>
                <p class="hero-description mx-auto"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>

            <div class="hero-actions mt-5">
                <?php if($btn_text): ?>
                    <a href="<?php echo esc_url($btn_url); ?>" class="btn-support-now">
                        <?php echo esc_html($btn_text); ?>
                    </a>
                <?php endif; ?>
            </div>

            <?php get_template_part('template-social-links'); ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>