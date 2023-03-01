<?php
/*
 Template Name: Services
 */
?>

<?php get_header(); ?>
    <main>
        <section class="banners banner-top">
            <?php
                $args = get_field('banner_one_services');
                get_template_part('banner', null, $args);
            ?>
        </section>

        <section class="quality">
            <div class="container">
                <div class="quality__wrapper">
                    <div class="quality__content">
                        <?php
                        $content_quality = get_field('content_quality');
                        if( $content_quality ) { echo $content_quality ;}
                        ?>
                        <h5 class="quality__title-one"></h5>
                        <h2 class="quality__title-two"></h2>
                        <p class="quality__text"></p>
                    </div>
                    <div class="quality__button-wrapper">
                        <div class="quality__button-more">
                            <a class=" button-link" href="<?php echo get_permalink(29); ?>">Read More</a>
                        </div>
                        <div class="quality__button-contact">
                            <a class="button-link" href="<?php echo get_permalink(12); ?>">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php  get_template_part('dishes_menu'); ?>

        <section class="book__services">
            <?php  get_template_part('book'); ?>
        </section>

        <section class="banner-two">
            <?php
            $argss = get_field('banner_two_services');
            get_template_part('banner', null, $argss);
            ?>
        </section>
    </main>
<?php get_footer(); ?>

