<?php get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>
<?php
$terms = get_terms(array(
    'taxonomy'   => 'alumni_category',
    'hide_empty' => true,
));

if (!empty($terms) && !is_wp_error($terms)) :
    foreach ($terms as $term) :

        $hide_category = get_field('hide_category', $term);
        if ($hide_category) {
            continue;
        }
        ?>
        
        <section class="alumni-category-section" id="category-<?php echo esc_attr($term->slug); ?>">
            <div class="container">
                <h2 class="category-title">
                    <?php
                    $icon = get_field('category_icon_class', $term);
                    if ($icon) :
                    ?>
                        <i class="<?php echo esc_attr($icon); ?>"></i>
                    <?php endif; ?>
                    <?php echo esc_html($term->name); ?>
                </h2>

                <div class="alumni-grid">
                    <?php
                    $alumni_query = new WP_Query(array(
                        'post_type'      => 'alumni',
                        'posts_per_page' => -1,
                        'post_status'    => 'publish',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'alumni_category',
                                'field'    => 'term_id',
                                'terms'    => $term->term_id,
                            ),
                        ),
                    ));

                    if ($alumni_query->have_posts()) :
                        while ($alumni_query->have_posts()) :
                            $alumni_query->the_post();
                            get_template_part('template-parts/alumni/card');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No posts found in this category.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </section>

    <?php
    endforeach;
endif;
?>

<?php get_template_part('template-parts/banner'); ?>
<?php get_footer(); ?>