<?php
/**
 * Template part for displaying social links based on selection
 * * @var array $args['selected_socials']
 */

$selected_socials = isset($args['selected_socials']) ? $args['selected_socials'] : [];

if (!empty($selected_socials) && is_array($selected_socials)) : ?>
    <div class="cta-banner__social-links d-flex gap-3">
        <?php foreach ($selected_socials as $social_id) : 
            $icon_class = get_field('icon_class', $social_id);
            $link       = get_field('social_url', $social_id);
            $color      = get_field('icon_color', $social_id);
            $final_color = $color ? $color : '#0000FF';
        ?>
            <?php if ($link && $icon_class) : ?>
              <div class="social-button">  <a href="<?php echo esc_url($link); ?>" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   style="color: <?php echo esc_attr($final_color); ?>;">
                    <i class="<?php echo esc_attr($icon_class); ?>"></i>
                </a>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>