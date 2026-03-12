<?php
$post_type = get_field('post_type_selection');

if ($post_type === 'video') {
    get_template_part('template-parts/card', 'video');
} elseif ($post_type === 'social') {
    get_template_part('template-parts/card', 'social');
} else {
    get_template_part('template-parts/card', 'image');
}