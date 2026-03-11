<?php
$video_iframe = get_field('video_link');
$use_custom_video_preview = get_field('use_custom_video_preview');
$video_preview_image = get_field('video_preview_image');

$preview_url = '';

if ($use_custom_video_preview && is_array($video_preview_image) && !empty($video_preview_image['url'])) {
    $preview_url = $video_preview_image['url'];
}
?>

<article class="staff-card staff-card--video">
    <?php if ($video_iframe): ?>
        <?php
        $video_url = $video_iframe;
        if (preg_match('/src=["\']([^"\']+)["\']/', $video_iframe, $matches)) {
            $video_url = $matches[1];
        } elseif (preg_match('/href=["\']([^"\']+)["\']/', $video_iframe, $matches)) {
            $video_url = $matches[1];
        } elseif (filter_var($video_iframe, FILTER_VALIDATE_URL)) {
            $video_url = $video_iframe;
        }
        ?>
        <a href="<?php echo esc_url($video_url); ?>" target="_blank" rel="noopener noreferrer" class="staff-card__media staff-card__media--video">
            <?php if ($preview_url): ?>
                <img class="staff-card__image" src="<?php echo esc_url($preview_url); ?>" alt="<?php the_title_attribute(); ?>">
            <?php else: ?>
                <div class="staff-card__video-placeholder"></div>
            <?php endif; ?>
            <span class="staff-card__play">
                <i class="fas fa-play-circle"></i>
            </span>
        </a>
    <?php else: ?>
        <div class="staff-card__media staff-card__media--video">
            <?php if ($preview_url): ?>
                <img class="staff-card__image" src="<?php echo esc_url($preview_url); ?>" alt="<?php the_title_attribute(); ?>">
            <?php else: ?>
                <div class="staff-card__video-placeholder"></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <h3 class="staff-card__title"><?php the_title(); ?></h3>
</article>

