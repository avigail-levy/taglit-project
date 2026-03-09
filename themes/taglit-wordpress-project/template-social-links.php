<?php
// home-page id-----
$home_id = get_option('page_on_front');

$fb    = get_field('facebook_link', $home_id);
$instush = get_field('instagram_link', $home_id);
$wa    = get_field('whatsapp_link', $home_id);
$tele  = get_field('telegram_link', $home_id);

if( $fb || $instush || $wa || $tele ) : ?>
    <div class="hero-socials">
        <span>Share On</span>
        <div class="social-icons">
            <?php if($instush) : ?>
                <a href="<?php echo esc_url($instush); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>

            <?php if($fb) : ?>
                <a href="<?php echo esc_url($fb); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
            <?php endif; ?>

            <?php if($wa) : ?>
                <a href="<?php echo esc_url($wa); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <?php endif; ?>

            <?php if($tele) : ?>
                <a href="<?php echo esc_url($tele); ?>" target="_blank"><i class="fab fa-telegram"></i></a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>