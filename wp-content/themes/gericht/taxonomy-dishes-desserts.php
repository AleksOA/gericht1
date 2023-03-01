<?php
$args = array (
    'posts' => array(
        'posts_per_page' => 4,
        'post_type'   => 'food',
        'tax_query' => [[
            'taxonomy' => 'dishes',
            'field'    => 'slug',
            'terms'    => 'desserts'
        ]],
        'posts_status' => 'pupostblish',
        'paged' => '1'
    ),
    'template' => 'desserts'
);

get_template_part('menu_template', null, $args);

?>
