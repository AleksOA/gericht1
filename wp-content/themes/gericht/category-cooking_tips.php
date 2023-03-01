<?php
$args = array (
    'posts' => array(
        'posts_per_page' => 4,
        'posts_type' => 'post',
        'cat' => 22,
        'posts_status' => 'publish',
        'paged' => '1'
    ),
    'template' => 'cooking_tips'
);

get_template_part('blog_template', null, $args);

?>
