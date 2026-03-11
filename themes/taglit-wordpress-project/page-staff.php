<?php
/**
 * Template Name: Staff Page
 */

get_header(); ?>

<main id="main" class="site-main staff-page">

    <?php get_template_part('template-parts/hero'); ?>

    <section class="content-sections">
        <div class="container content-sections__layout">

            <?php get_template_part('template-parts/category-nav', null, array(
                'taxonomy' => 'staff_category'
            )); ?>

            <div class="content-sections__main">
                <?php
                $terms = get_terms(array(
                    'taxonomy'   => 'staff_category',
                    'hide_empty' => true,
                ));

                if (!empty($terms) && !is_wp_error($terms)) :
                    foreach ($terms as $term) :

                        $hide_category = get_field('hide_category', $term);
                        if ($hide_category) {
                            continue;
                        }
                        ?>

                        <section class="staff-category-block" id="category-<?php echo esc_attr($term->slug); ?>">
                            <h2 class="category-title">
                                <?php
                                $icon = get_field('category_icon_class', $term);
                                if ($icon): ?>
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                <?php endif; ?>

                                <?php echo esc_html($term->name); ?>
                            </h2>

                            <div class="staff-grid">
                                <?php
                                $staff_query = new WP_Query(array(
                                    'post_type'      => 'staff',
                                    'posts_per_page' => -1,
                                    'post_status'    => 'publish',
                                    'tax_query'      => array(
                                        array(
                                            'taxonomy' => 'staff_category',
                                            'field'    => 'term_id',
                                            'terms'    => $term->term_id,
                                        ),
                                    ),
                                ));

                                if ($staff_query->have_posts()) :
                                    while ($staff_query->have_posts()) :
                                        $staff_query->the_post();
                                        get_template_part('template-parts/staff/card');
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </section>

                    <?php
                    endforeach;
                endif;
                ?>
            </div>

        </div>
    </section>

    <?php get_template_part('template-parts/banner'); ?>

</main>

<?php get_footer(); ?>
