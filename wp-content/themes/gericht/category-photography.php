<?php
$args = array (
    'posts' => array(
        'posts_per_page' => 4,
        'posts_type' => 'post',
        'cat' => 20,
        'posts_status' => 'publish',
        'paged' => '1'
        ),
    'template' => 'photography'
);

get_template_part('blog_template', null, $args);

?>