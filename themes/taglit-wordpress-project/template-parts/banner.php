<?php
$banner_bg_desktop = get_field('banner_background_desktop', 'option');
$banner_bg_mobile  = get_field('banner_background_mobile', 'option');
$banner_title      = get_field('banner_title', 'option');
$banner_text       = get_field('banner_text', 'option');

$selected_socials  = get_field('selected_socials', 'option'); 
$banner_link       = get_field('banner_button', 'option');

$banner_bg_desktop_url = is_array($banner_bg_desktop) ? $banner_bg_desktop['url'] : $banner_bg_desktop;
$banner_bg_mobile_url  = is_array($banner_bg_mobile) ? $banner_bg_mobile['url'] : $banner_bg_mobile;

$btn_url    = '';
$btn_text   = '';
$btn_target = '_self';

if ($banner_link && is_array($banner_link)) {
    $btn_url    = $banner_link['url'];
    $btn_text   = $banner_link['title'];
    $btn_target = $banner_link['target'] ? $banner_link['target'] : '_self';
}
?>

<section
    class="cta-banner"
    style="background-image: url('<?php echo esc_url($banner_bg_desktop_url); ?>');"
    <?php if ($banner_bg_mobile_url): ?>
        data-mobile-bg="<?php echo esc_url($banner_bg_mobile_url); ?>"
    <?php endif; ?>
>
    <div class="cta-banner__overlay"></div>

    <div class="cta-banner__inner container">
        <div class="cta-banner__content">

            <?php if ($banner_title): ?>
                <h2 class="cta-banner__title"><?php echo esc_html($banner_title); ?></h2>
            <?php endif; ?>

            <?php if ($banner_text): ?>
                <p class="cta-banner__text"><?php echo esc_html($banner_text); ?></p>
            <?php endif; ?>

            <?php if (!empty($selected_socials) || ($btn_url && $btn_text)) : ?>
                <div class="cta-banner__actions">

                    <?php if(!empty($selected_socials) && is_array($selected_socials)): ?>
                        <div class="cta-banner__socials">
                            <span class="cta-banner__share-label">Share On</span>
                            <div class="cta-banner__social-links d-flex gap-3">
                                <?php foreach($selected_socials as $social_id): 
                                    $icon_class = get_field('icon_class', $social_id);
                                    $social_url = get_field('social_url', $social_id);
                                    $icon_color = get_field('icon_color', $social_id);
                                ?>
                                    <a href="<?php echo esc_url($social_url); ?>" target="_blank" style="color: <?php echo esc_attr($icon_color); ?>;">
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