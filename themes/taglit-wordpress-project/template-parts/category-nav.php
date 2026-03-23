<?php
$taxonomy = isset($args['taxonomy']) ? $args['taxonomy'] : 'alumni_category';

$terms = get_terms(array(
    'taxonomy'   => $taxonomy,
    'hide_empty' => true,
));

if (!empty($terms) && !is_wp_error($terms)) : ?>
    <aside class="category-nav category-sidebar" >
        <ul class="category-nav__list">
            <?php foreach ($terms as $term) :
                $hide_category = get_field('hide_category', $term);
                if ($hide_category) {
                    continue;
                }
                ?>
                <li class="category-nav__item">
                    <a href="#category-<?php echo esc_attr($term->slug); ?>" class="category-nav__link">
                        <?php echo esc_html($term->name); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </aside>
<?php endif; ?>