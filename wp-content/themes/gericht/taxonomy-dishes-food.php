<?php
$args = array (
    'posts' => array(
        'posts_per_page' => 4,
        'post_type'   => 'food',
        'tax_query' => [[
            'taxonomy' => 'dishes',
            'field'    => 'slug',
            'terms'    => 'food'
        ]],
        'posts_status' => 'pupostblish',
        'paged' => '1'
    ),
    'template' => 'food'
);

get_template_part('menu_template', null, $args);

?>
