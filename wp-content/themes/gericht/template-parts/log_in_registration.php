<?php
/*
 Template Name: Log In / Registration
 */
?>

<?php get_header(); ?>
<main>
    <h2 style="padding-top: 80px">Log In / Registration</h2>


    <?php
    $args = array (
        'posts' => array(
            'posts_per_page' => 4,
            'posts_type' => 'food',
            'posts_status' => 'publish',
            'paged' => '1'
        ),
        'template' => 'menu'
    );

    $args2 = array (
        'posts_per_page' => 2,
        'posts_type' => 'member',
        'posts_status' => 'publish',
        'paged' => '1'
    );


    $wwww = new WP_Query( $args2);
    $restaurants = get_posts( $args2 );

    echo '<pre>';
     var_dump($restaurants);
    echo '</pre>';

    ?>


</main>
<?php get_footer(); ?>
