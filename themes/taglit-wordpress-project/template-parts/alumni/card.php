<?php
$post_type = get_field('post_type_selection');

if ($post_type === 'video') {
    get_template_part('template-parts/alumni/card', 'video');
} elseif ($post_type === 'social') {
    get_template_part('template-parts/alumni/card', 'social');
} else {
    get_template_part('template-parts/alumni/card', 'image');
}