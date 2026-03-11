<?php
$post_image = get_field('post_image');
$social_url = get_field('social_page_url');

$image_url = '';

if (is_array($post_image) && !empty($post_image['url'])) {
    $image_url = $post_image['url'];
} elseif (is_string($post_image)) {
    $image_url = $post_image;
}
?>

<article class="alumni-card alumni-card--social">
    <?php if ($social_url): ?>
        <a class="alumni-card__social-link" href="<?php echo esc_url($social_url); ?>" target="_blank" rel="noopener noreferrer">
            <div class="alumni-card__social-avatar">
                <?php if ($image_url): ?>
                    <img class="alumni-card__social-image" src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
                <?php endif; ?>
            </div>
            <h3 class="alumni-card__social-title"><?php the_title(); ?></h3>
        </a>
    <?php else: ?>
        <div class="alumni-card__social-avatar">
            <?php if ($image_url): ?>
                <img class="alumni-card__social-image" src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>
        </div>
        <h3 class="alumni-card__social-title"><?php the_title(); ?></h3>
    <?php endif; ?>
</article>