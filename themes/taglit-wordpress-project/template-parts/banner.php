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

<section class="cta-banner" style="background-image: url('<?php echo esc_url($banner_bg_desktop_url); ?>');">
    <div class="banner__overlay"></div>
    <div class="banner__inner container">
        <div class="cta-banner__content">

            <?php if ($banner_title): ?><h2 class="cta-banner__title"><?php echo esc_html($banner_title); ?></h2><?php endif; ?>
            <?php if ($banner_text): ?><p class="cta-banner__text"><?php echo esc_html($banner_text); ?></p><?php endif; ?>

            <?php if (!empty($selected_socials) || ($btn_url && $btn_text)) : ?>
                <div class="cta-banner__actions">

                    <?php 
                    get_template_part('template-parts/social-share-wrapper', null, [
                        'selected_socials' => $selected_socials,
                        'btn_url'          => $btn_url,
                        'btn_text'         => $btn_text
                    ]); 
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>