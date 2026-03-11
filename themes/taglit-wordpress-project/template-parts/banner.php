<?php
$banner_bg_desktop = get_field('banner_background_desktop', 'option');
$banner_bg_mobile  = get_field('banner_background_mobile', 'option');
$banner_title      = get_field('banner_title', 'option');
$banner_text       = get_field('banner_text', 'option');
$show_banner_socials = get_field('show_banner_socials', 'option');

$btn_text = get_field('hero_btn_text', 'option');
$btn_url  = get_field('hero_btn_url', 'option');

$banner_bg_desktop_url = '';
$banner_bg_mobile_url  = '';

if (is_array($banner_bg_desktop) && !empty($banner_bg_desktop['url'])) {
    $banner_bg_desktop_url = $banner_bg_desktop['url'];
} elseif (is_string($banner_bg_desktop)) {
    $banner_bg_desktop_url = $banner_bg_desktop;
}

if (is_array($banner_bg_mobile) && !empty($banner_bg_mobile['url'])) {
    $banner_bg_mobile_url = $banner_bg_mobile['url'];
} elseif (is_string($banner_bg_mobile)) {
    $banner_bg_mobile_url = $banner_bg_mobile;
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

    <div class="cta-banner__inner">
        <div class="cta-banner__content">

            <?php if ($banner_title): ?>
                <h2 class="cta-banner__title"><?php echo esc_html($banner_title); ?></h2>
            <?php endif; ?>

            <?php if ($banner_text): ?>
                <p class="cta-banner__text"><?php echo esc_html($banner_text); ?></p>
            <?php endif; ?>

            <?php if ($show_banner_socials || ($btn_text && $btn_url)) : ?>
                <div class="cta-banner__actions">

                    <?php if ($show_banner_socials): ?>
                        <div class="cta-banner__socials">
                            <span class="cta-banner__share-label">Share On</span>
                            <?php get_template_part('template-parts/social-links'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($show_banner_socials && $btn_text && $btn_url): ?>
                        <span class="cta-banner__or">Or</span>
                    <?php endif; ?>

                    <?php if ($btn_text && $btn_url): ?>
                        <a class="cta-banner__button" href="<?php echo esc_url($btn_url); ?>" target="_blank" rel="noopener noreferrer">
                            <?php echo esc_html($btn_text); ?>
                        </a>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
</section>