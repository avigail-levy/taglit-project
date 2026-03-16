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
    </div>

    <?php 
    if ($btn_url && $btn_text) : ?>
        <span class="cta-banner__or">Or</span>
    <?php endif; ?>

<?php endif; ?>