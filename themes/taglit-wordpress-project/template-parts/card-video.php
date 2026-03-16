<?php
$video_iframe             = get_field('video_link'); 
$use_custom_video_preview = get_field('use_custom_video_preview');
$video_preview_image      = get_field('video_preview_image');

$preview_url = '';
if ($use_custom_video_preview && !empty($video_preview_image)) {
    if (is_array($video_preview_image)) {
        $preview_url = $video_preview_image['url'];
    } else {
        $preview_url = $video_preview_image;
    }
}
?>

<article class="alumni-card alumni-card--video">
    <div class="alumni-card__media alumni-card__media--video" 
         data-video-embed="<?php echo esc_attr($video_iframe); ?>">
        
        <?php if (!empty($preview_url)): ?>
            <img class="alumni-card__image" src="<?php echo esc_url($preview_url); ?>
            " alt="<?php the_title_attribute(); ?>">
        <?php else: ?>
            <div class="alumni-card__video-placeholder" style="background-color: #000; width: 100%; height: 100%; min-height: 200px;"></div>
        <?php endif; ?>

        <?php if (!empty($video_iframe)): ?>
            <button type="button" class="alumni-card__play">
                <i class="fas fa-play-circle"></i>
            </button>
        <?php endif; ?>
    </div>

    <h3 class="alumni-card__title"><?php the_title(); ?></h3>
</article>