<?php
$args = array (
    'posts' => array(
        'posts_per_page' => 4,
        'posts_type' => 'post',
        'posts_status' => 'publish',
        'paged' => '1'
    ),
    'template' => 'blogs'
);

get_template_part('blog_template', null, $args);

?>