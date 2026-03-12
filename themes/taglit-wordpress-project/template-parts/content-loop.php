<?php
$taxonomy = $args['taxonomy'];
$post_type = $args['post_type'];

$terms = get_terms(array(
    'taxonomy'   => $taxonomy,
    'hide_empty' => true,
));

if (!empty($terms) && !is_wp_error($terms)) :
    foreach ($terms as $term) :
        $hide_category = get_field('hide_category', $term);
        if ($hide_category) continue;
        ?>
        
        <section class="alumni-category-block" id="category-<?php echo esc_attr($term->slug); ?>">
            <h2 class="category-title">
                <?php
                $icon = get_field('category_icon_class', $term);
                if ($icon): ?>
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                <?php endif; ?>
                <?php echo esc_html($term->name); ?>
            </h2>

            <div class="alumni-grid">
                <?php
                $query = new WP_Query(array(
                    'post_type'      => $post_type,
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                ));

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/card');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>
    <?php
    endforeach;
endif;