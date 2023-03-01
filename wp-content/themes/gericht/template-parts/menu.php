<?php
/*
Template Name: Menu
*/
?>

<?php
$args = array (
    'posts' => array(
        'posts_per_page' => 4,
        'post_type' => 'food',
        'posts_status' => 'publish',
        'paged' => '1'
    ),
    'template' => 'menu'
);

get_template_part('menu_template', null, $args);

?>
