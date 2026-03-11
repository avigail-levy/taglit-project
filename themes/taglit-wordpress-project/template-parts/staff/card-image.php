<?php
$post_image = get_field('post_image');
$image_url = '';

if (is_array($post_image) && !empty($post_image['url'])) {
    $image_url = $post_image['url'];
} elseif (is_string($post_image)) {
    $image_url = $post_image;
}
?>

<article class="staff-card staff-card--image">
    <?php if ($image_url): ?>
        <div class="staff-card__media">
            <img class="staff-card__image" src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
        </div>
    <?php endif; ?>

    <h3 class="staff-card__title"><?php the_title(); ?></h3>
</article>

