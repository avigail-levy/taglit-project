<?php
$video_iframe = get_field('video_link');
$use_custom_video_preview = get_field('use_custom_video_preview');
$video_preview_image = get_field('video_preview_image');

$preview_url = '';

if ($use_custom_video_preview && is_array($video_preview_image) && !empty($video_preview_image['url'])) {
    $preview_url = $video_preview_image['url'];
}
?>

<article class="alumni-card alumni-card--video">
    <div class="alumni-card__media alumni-card__media--video">
        <?php if ($preview_url): ?>
            <img class="alumni-card__image" src="<?php echo esc_url($preview_url); ?>
            " alt="<?php the_title_attribute(); ?>">
        <?php else: ?>
            <div class="alumni-card__video-placeholder"></div>
        <?php endif; ?>

        <?php if ($video_iframe): ?>
            <span class="alumni-card__play">
                <i class="fas fa-play-circle"></i>
            </span>
        <?php endif; ?>
    </div>

    <h3 class="alumni-card__title"><?php the_title(); ?></h3>
</article>