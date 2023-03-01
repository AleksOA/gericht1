<?php get_header(); ?>
<main>
    <section class="banner-top">
        <?php
        $args = get_field('banner_teams');
        get_template_part('banner', null, $args);
        ?>
    </section>


    <section class="banner">
        <div class="container">
            <div class="banner__slic" style="padding-top: 150px">
                <h1>single-member</h1>

                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); ?>
                        //

                        <h2><?php the_title(); ?></h2>

                        <div class="single_image-wrapper">
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail('thumbnails single');
                            } ?>
                        </div>


                        <p><?php the_content(); ?></p> <?php the_content(); ?>

                        //
                    <?php } // end while
                } // end if
                ?>
            </div>
        </div>
    </section>


</main>
<?php get_footer(); ?>
