<?php
/**
 * Social Share Wrapper - Handles "Share On" and "Or"
 * @var array $args['selected_socials']
 * @var string $args['btn_url']
 * @var string $args['btn_text']
 */

$selected_socials = isset($args['selected_socials']) ? $args['selected_socials'] : [];
$btn_url          = isset($args['btn_url']) ? $args['btn_url'] : '';
$btn_text         = isset($args['btn_text']) ? $args['btn_text'] : '';

if (!empty($selected_socials)) : ?>
    <div class="cta-social-links">
        <span class="cta__share-label">Share On</span>
        
        <?php 
        get_template_part('template-parts/social-links', null, [
            'selected_socials' => $selected_socials
        ]); 
        ?>
    <?php 
    if ($btn_url && $btn_text) : ?>
        <span class="cta-banner__or">Or</span>

        <?php if ($btn_url && $btn_text): ?>
                        <a class="cta-banner__button" href="<?php echo esc_url($btn_url); ?>
                        " target="<?php echo esc_attr($btn_target); ?>" rel="noopener noreferrer">
                            <?php echo esc_html($btn_text); ?>
                        </a>
                    <?php endif; ?>
    </div>
    <?php endif; ?>

<?php endif; ?>