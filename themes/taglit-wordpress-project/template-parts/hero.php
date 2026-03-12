<?php 

$logo       = get_field('hero_logo', 'option'); 
$title      = get_field('hero_title', 'option');
$subtitle   = get_field('hero_subtitle', 'option'); 
$bg_desktop = get_field('hero_background_desktop', 'option'); 

$hero_link  = get_field('hero_btn', 'option'); 
 
$selected_socials = get_field('selected_socials', 'option'); 
$btn_url    = '';
$btn_text   = '';
$btn_target = '_self';

if ($hero_link && is_array($hero_link)) {
    $btn_url    = $hero_link['url'];
    $btn_text   = $hero_link['title'];
    $btn_target = $hero_link['target'] ? $hero_link['target'] : '_self';
}

$bg_url = is_array($bg_desktop) ? $bg_desktop['url'] : $bg_desktop;
$logo_url = is_array($logo) ? $logo['url'] : $logo;
?>

<section class="hero-section cta-banner" style="background-image: url('<?php echo esc_url($bg_url); ?>');">
    <div class="cta-banner__overlay"></div>

    <div class="cta-banner__inner container">
        <div class="cta-banner__content">
            
            <?php if($logo_url): ?>
                <div class="cta-banner__logo" style="margin-bottom: 20px;">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="Hero Logo" style="max-width: 200px; height: auto;">
                </div>
            <?php endif; ?>

            <?php if($title): ?>
                <h1 class="cta-banner__title"><?php echo esc_html($title); ?></h1>
            <?php endif; ?>

            <?php if($subtitle): ?>
                <p class="cta-banner__text"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>

            <?php if(($btn_text && $btn_url) || (!empty($selected_socials))): ?>
                <div class="cta-banner__actions">
                    
                    <?php if(!empty($selected_socials) && is_array($selected_socials)): ?>
                        <div class="cta-banner__socials">
                            <span class="cta-banner__share-label">Share On</span>
                            <div class="cta-banner__social-links d-flex gap-3">
                                <?php foreach($selected_socials as $social_id): 
                                    $icon_class = get_field('icon_class', $social_id);
                                    $link       = get_field('social_url', $social_id);
                                    $color      = get_field('icon_color', $social_id);
                                ?>
                                    <a href="<?php echo esc_url($link); ?>" target="_blank" style="color: <?php echo esc_attr($color); ?>;">
                                        <i class="<?php echo esc_attr($icon_class); ?>"></i>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($selected_socials) && ($btn_url && $btn_text)): ?>
                        <span class="cta-banner__or">Or</span>
                    <?php endif; ?>

                    <?php if ($btn_url && $btn_text): ?>
                        <a class="cta-banner__button" 
                           href="<?php echo esc_url($btn_url); ?>" 
                           target="<?php echo esc_attr($btn_target); ?>" 
                           rel="noopener noreferrer">
                            <?php echo esc_html($btn_text); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>