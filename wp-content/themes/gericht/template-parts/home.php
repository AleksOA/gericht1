<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
    <main>
        <section class="banner">
            <div class="container">
                <div class="button-top button-top-home-banner">
                    <a href="#aboutUs">
                        <p class="button-top__text" >SCROLL</p>
                        <span class="button-top__image"><img src="<?php echo get_template_directory_uri() . '/assets/images/footer/button-top.svg' ?>" alt=""></span>
                    </a>
                </div>
                <div class="banner__slick">
                    <?php
                    $slide = get_field('slide', 'options');
                    if($slide) :
                        foreach ($slide as $value) : ?>

                            <div class="banner__slick-item">
                                <div class="banner__slick-item-left-wrapper">
                                    <div class="banner__slick-item-left">
                                        <h5 class="banner__slick-item-title">
                                            <?php
                                            if($value){ echo $value['title_slide'];}
                                            ?>
                                        </h5>
                                        <span class="banner__slick-item-spoon">
                                            <?php
                                            $spoon_svg = get_field('spoon_svg', 'options');
                                            if($spoon_svg) : ?>
                                                <img src="<?php echo $spoon_svg ?>" alt="image spoon">
                                            <?php endif ?>
                                        </span>
                                        <h1 class="banner__slick-item-slogan">
                                            <?php
                                            if($value){ echo $value['slogan_slide'];}
                                            ?>
                                        </h1>
                                        <p class="banner__slick-item-text">
                                            <?php
                                            if($value){ echo $value['text_slide'];}
                                            ?>
                                        </p>
                                        <a class="banner__slick-item-button button-link" href="<?php echo get_permalink(439); ?>">Explore Menu</a>
                                    </div>
                                </div>
                                <div class="banner__slick-item-right">
                                    <div class="banner__slick-item-wrapper">
                                        <div class="banner__slick-item-image2">
                                            <img class="banner__slick-item-img2" src="<?php if($value){ echo $value['image_slide'];} ?>" alt="image dishes">
                                            <span class="banner__slick-item-span">q</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>

                </div>
            </div>
        </section>


        <section class="about" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/home/background_about.png' ?>'); position: relative; z-index: 1">
            <div class="container">
                <div class="about__inner">
                    <div id="aboutUs" class="about__box-left">
                       <div class="about__left">
                            <?php
                            $about_left = get_field('about_home', 'options')['about_left'];
                            if($about_left) {echo $about_left;}
                            ?>
                            <span class="about__spoon-left">
                            <?php
                            $spoon_svg = get_field('spoon_svg', 'options');
                            if($spoon_svg) : ?>
                                <img src="<?php echo $spoon_svg ?>" alt="image spoon">
                            <?php endif ?>
                            </span>
                            <a class="about__button button-link" href="<?php echo get_permalink(29); ?>">Know More</a>
                        </div>
                    </div>

                    <div class="about__images">
                        <img class="about__img" src="<?php
                        $item = get_field('about_home', 'options')['item'];
                        if($item) {echo $item;}
                        ?>" alt="image knife">
                        <img class="about__img-letter" src="<?php
                        $letter = get_field('about_home', 'options')['letter'];
                        if($letter) {echo $letter;}
                        ?>" alt="image letter G">
                    </div>

                    <div class="about__box-fight">
                        <div class="about__right">
                            <?php
                            $about_right = get_field('about_home', 'options')['about_right'];
                            if($about_right) {echo $about_right;}
                            ?>
                            <span class="about__spoon-right">
                            <?php
                            $spoon_svg = get_field('spoon_svg', 'options');
                            if($spoon_svg) : ?>
                                <img src="<?php echo $spoon_svg ?>" alt="image spoon">
                            <?php endif ?>
                        </span>
                            <a class="about__button button-link" href="<?php echo get_permalink(29); ?>">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="book__home">
            <?php echo do_shortcode( '[words_spoon]' ); ?>
            <?php  get_template_part('book'); ?>
        </section>

        <?php  get_template_part('dishes_menu'); ?>

        <?php  get_template_part('today_is_special'); ?>

        <?php  get_template_part('chefs_word'); ?>

        <?php  get_template_part('testimony'); ?>
        <section class="video-home">

            <?php
            $video = get_template_directory_uri() . '/assets/video/coverr-taking-pictures-on-a-boat-7292-1080p.mp4';
            $args = array(
                'video_url' => $video,
                'placeholder_url' => ''
            );

            get_template_part('video_about_us', null, $args )
            ?>
        </section>

        <section class="awards" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/footer/background-footer.png' ?>')">
           <?php
                $args = get_field('awards', 'options');
                get_template_part('awards', null, $args);
             ?>
        </section>

        <section class="blogs">
            <div class="container">
                <div class="blogs__wrapper">
                    <?php
                    $blogs_home = get_field('blogs_home', 'options');
                    ?>
                    <h5 class="blogs__title-one">
                        <?php if( $blogs_home["title_one_blogs_home"] ) { echo $blogs_home["title_one_blogs_home"] ;} ?>
                    </h5>
                    <span class="blogs__image-spoon">
                        <?php
                        $spoon_new = get_field('spoon_new', 'options');
                        $spoon_new_url = $spoon_new["url"];
                        $spoon_new_alt = $spoon_new["alt"];
                        ?>
                        <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                    </span>
                    <h2 class="blogs__title-two">
                        <?php if( $blogs_home["title_two_blogs_home"] ) { echo $blogs_home["title_two_blogs_home"] ;} ?>
                    </h2>
                    <div class="blogs__items">
                        <?php
                        $posts_home = $blogs_home["posts_home"];
                        ?>
                        <?php if( $posts_home ) : foreach ( $posts_home as $value ) : ?>
                            <?php $query = new WP_Query( $args );
                            while ( $query->have_posts() ) {$query->the_post();} wp_reset_postdata(); ?>

                            <div class="blogs__item">
                                    <div class="blogs__item-image">
                                        <?php
                                        $preview_image_post = get_field('preview_image_post', $value->ID);
                                        $post_img_url = $preview_image_post["url"];
                                        $post_img_alt = $preview_image_post["alt"];
                                        ?>
                                        <img class="blogs__item-img" src="<?php if( $post_img_url ) { echo $post_img_url;} ?>" alt="<?php if( $post_img_alt ) { echo $post_img_alt ;} ?>">
                                    </div>
                                    <div class="blogs__item-metadata">
                                        <p class="blogs__item-number">
                                            <?php $item_number = get_the_time('d M Y', $value->ID );
                                             if( $item_number ) { echo $item_number ;}
                                            ?>
                                        </p>
                                        <p class="blogs__item-author">
                                            <?php
                                            $item_author =  get_the_author();
                                            if( $item_author ) { echo '-' . $item_author ;}
                                            ?>
                                        </p>
                                    </div>
                                    <h4 class="blogs__item-title">
                                        <?php $item_title = get_the_title( $value->ID );
                                        if( $item_title ) { echo $item_title;}
                                        ?>
                                    </h4>
                                    <p class="blogs__item-text">
                                       <?php  $item_text =  get_the_excerpt( $value->ID );
                                       if( $item_text ) { echo $item_text;}
                                       ?>
                                    </p>
                                    <a class="blogs__item-more" href="<?php the_permalink($value->ID); ?>">Read more</a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="blogs__button-wrapper">
                        <a class="blogs__button button-link" href="<?php echo get_permalink(14);?>">View More</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="instagram_home">
            <?php  get_template_part('instagram'); ?>
        </section>
    </main>
<?php get_footer(); ?>


