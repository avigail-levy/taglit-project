<?php
$social_query = new WP_Query(array(
    'post_type'      => 'socials',
    'posts_per_page' => -1, 
    'post_status'    => 'publish'
));

if ($social_query->have_posts()) : ?>
    <div class="social-icons d-flex gap-2">
        <?php while ($social_query->have_posts()) : $social_query->the_post(); 
            $icon_class = get_field('icon_class'); 
            $social_url = get_field('social_url'); 
            $icon_color = get_field('icon_color'); 
            
            $color = $icon_color ? $icon_color : '#0000FF';
        ?>
            <?php if ($social_url && $icon_class) : ?>
                <a href="<?php echo esc_url($social_url); ?>" 
                   target="_blank" 
                   class="social-icon-circle" 
                   rel="noopener noreferrer"
                   style="background-color: <?php echo esc_attr($color); ?>;">
                    <i class="<?php echo esc_attr($icon_class); ?>"></i>
                </a>
            <?php endif; ?>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php endif; ?>