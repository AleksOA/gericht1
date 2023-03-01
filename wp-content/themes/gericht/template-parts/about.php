<?php
/*
Template Name: About us
*/
?>

<?php get_header(); ?>
<main>
    <section class="banner-top">
        <?php
        $args = get_field('banner_one_about');
        get_template_part('banner', null, $args);
        ?>
    </section>

    <section class="history">
        <div class="container">
            <div class="history__wrapper">
                <?php
                    $title_section_two_about = get_field('title_section_two_about');
                ?>
                <h5 class="history__title-one">
                    <?php if( $title_section_two_about["title_one_section_two_about"] ) { echo $title_section_two_about["title_one_section_two_about"] ;} ?>
                </h5>
                <span class="history__image-spoon">
                        <?php
                        $spoon_new = get_field('spoon_new', 'options');
                        $spoon_new_url = $spoon_new["url"];
                        $spoon_new_alt = $spoon_new["alt"];
                        ?>
                        <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                    </span>
                <h2 class="history__title-two">
                    <?php if( $title_section_two_about["title_two_section_two_about"]) { echo $title_section_two_about["title_two_section_two_about"] ;} ?>
                </h2>
                <div class="history__content">
                    <div class="history__content-left">
                        <?php
                        $section_left_section_two_about = get_field('section_left_section_two_about');
                        ?>
                        <p class="history__left-text">
                            <?php if( $section_left_section_two_about["text_left_section_two_about"] ) { echo $section_left_section_two_about["text_left_section_two_about"] ;} ?>
                        </p>
                        <div class="history__left-imag">
                            <img class="history__left-img"
                                 src="<?php if( $section_left_section_two_about["image_left_section_two_about"]["url"] ) { echo $section_left_section_two_about["image_left_section_two_about"]["url"] ;} ?>"
                                 alt="<?php if( $section_left_section_two_about["image_left_section_two_about"]["alt"] ) { echo $section_left_section_two_about["image_left_section_two_about"]["alt"] ;} ?>">
                        </div>
                    </div>
                    <div class="history__content-right">
                        <?php
                        $section_right_section_two_about = get_field('section_right_section_two_about');
                        ?>
                        <div class="history__right-imag">
                            <img class="history__right-img"
                                 src="<?php if( $section_right_section_two_about["image_right_section_two_about"]["url"] ) { echo $section_right_section_two_about["image_right_section_two_about"]["url"] ;} ?>"
                                 alt="<?php if( $section_right_section_two_about["image_right_section_two_about"]["alt"] ) { echo $section_right_section_two_about["image_right_section_two_about"]["alt"] ;} ?>">
                        </div>
                        <h3 class="history__right-title">
                            <?php if( $section_right_section_two_about["title_right_section_two_about"] ) { echo $section_right_section_two_about["title_right_section_two_about"] ;} ?>
                        </h3>
                        <div class="history__right-items">
                            <div class="history__right-item">
                                <h3 class="history__right-item-value">
                                    <?php if( $section_right_section_two_about["value_one_right_section_two_about"] ) { echo $section_right_section_two_about["value_one_right_section_two_about"] ;} ?>
                                </h3>
                                <span class="history__item-image-spoon">
                                    <?php
                                    $spoon_new = get_field('spoon_new', 'options');
                                    $spoon_new_url = $spoon_new["url"];
                                    $spoon_new_alt = $spoon_new["alt"];
                                    ?>
                                    <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                                </span>
                                <h4 class="history__right-item-name">
                                    <?php if( $section_right_section_two_about["name_one_right_section_two_about"] ) { echo $section_right_section_two_about["name_one_right_section_two_about"] ;} ?>
                                </h4>
                            </div>
                            <div class="history__item-image">
                                <img class="history__item-img"
                                     src="<?php echo get_template_directory_uri() . '/assets/images/about/Vector_9.svg' ?>"
                                     alt="Glow">
                            </div>
                            <div class="history__right-item">
                                <h3 class="history__right-item-value">
                                    <?php if( $section_right_section_two_about["value_two_right_section_two_about"] ) { echo $section_right_section_two_about["value_two_right_section_two_about"] ;} ?>
                                </h3>
                                <span class="history__item-image-spoon">
                                    <?php
                                    $spoon_new = get_field('spoon_new', 'options');
                                    $spoon_new_url = $spoon_new["url"];
                                    $spoon_new_alt = $spoon_new["alt"];
                                    ?>
                                    <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                                </span>
                                <h4 class="history__right-item-name">
                                    <?php if( $section_right_section_two_about["name_two_right_section_two_about"] ) { echo $section_right_section_two_about["name_two_right_section_two_about"] ;} ?>
                                </h4>
                            </div>
                            <div class="history__item-image">
                                <img class="history__item-img"
                                     src="<?php echo get_template_directory_uri() . '/assets/images/about/Vector_9.svg' ?>"
                                     alt="Glow">
                            </div>
                            <div class="history__right-item">
                                <h3 class="history__right-item-value">
                                    <?php if( $section_right_section_two_about["value_three_right_section_two_about"] ) { echo $section_right_section_two_about["value_three_right_section_two_about"] ;} ?>
                                </h3>
                                <span class="history__item-image-spoon">
                                    <?php
                                    $spoon_new = get_field('spoon_new', 'options');
                                    $spoon_new_url = $spoon_new["url"];
                                    $spoon_new_alt = $spoon_new["alt"];
                                    ?>
                                    <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                                </span>
                                <h4 class="history__right-item-name">
                                    <?php if( $section_right_section_two_about["name_three_right_section_two_about"] ) { echo $section_right_section_two_about["name_three_right_section_two_about"] ;} ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="about-video">
        <div class="container">
            <div class="about-video__wrapper">
                <?php
                $title_one_about_video = get_field('title_one_about_video');
                $title_two_about_video = get_field('title_two_about_video');
                $text_about_video = get_field('text_about_video');
                $video_about_video = get_field('video_about_video');
                ?>

                <div class="about-video__top">
                    <h5 class="about-video__title-one">
                        <?php if( $title_one_about_video ) { echo $title_one_about_video ;} ?>
                    </h5>
                    <span class="about-video__item-image-spoon">
                        <?php
                        $spoon_new = get_field('spoon_new', 'options');
                        $spoon_new_url = $spoon_new["url"];
                        $spoon_new_alt = $spoon_new["alt"];
                        ?>
                        <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                    </span>
                    <h2 class="about-video__title-two">
                        <?php if( $title_two_about_video ) { echo $title_two_about_video ;} ?>
                    </h2>
                    <p class="about-video__text">
                        <?php if( $text_about_video ) { echo $text_about_video ;} ?>
                    </p>
                </div>
                <div class="about-video__bottom">
                    <?php
                    $videoAbout = get_field('video_about_video')["url"];

                    $args = array(
                        'video_url' => $videoAbout,
                        'placeholder_url' => ''
                    );
                    get_template_part('video_about_us', null, $args);
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('chefs_word') ?>

    <?php get_template_part('testimony') ?>

    <section class="instagram_about">
        <?php  get_template_part('instagram') ?>
    </section>

</main>
<?php get_footer(); ?>

