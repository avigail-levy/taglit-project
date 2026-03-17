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

<section class="hero-section">
    <div class="hero-bg-texture" style="background-image: url('<?php echo esc_url($bg_url); ?>');"></div>
    
    <div class="hero-flag-layer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/flag-israel-bcg.jpg');"></div>    
    <div class="hero__overlay"></div>

    <div class="hero__inner container">
        <div class="cta-banner__content">
            
            <?php if($logo_url): ?>
                <div class="cta-banner__logo">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="Hero Logo">
                </div>
            <?php endif; ?>
        <div class="heading-paragraph">  
            <?php if($title): ?>
                <h1 class="swords-of-iron_title"><?php echo esc_html($title); ?></h1>
            <?php endif; ?>

            <?php if($subtitle): ?>
                <p class="cta-hero_text"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </div>

            <?php if(($btn_text && $btn_url) || (!empty($selected_socials))): ?>
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