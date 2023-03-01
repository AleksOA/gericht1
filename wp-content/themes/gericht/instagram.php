



<div class="instagram" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/footer/background-footer.png' ?>')">
    <div class="instagram__wrapper">
        <div class="container">
            <div class="instagram__content">
                <?php
                    $instagram_free = get_field('instagram_free', 'options');
                ?>

                <h5 class="instagram__title-one">
                    <?php if( $instagram_free["title_one_instagram_free"] ) { echo $instagram_free["title_one_instagram_free"] ;} ?>
                </h5>
                <span class="instagram__image-spoon">
                        <?php
                        $spoon_new = get_field('spoon_new', 'options');
                        $spoon_new_url = $spoon_new["url"];
                        $spoon_new_alt = $spoon_new["alt"];
                        ?>
                        <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                </span>
                <h2 class="instagram__title-two">
                    <?php if( $instagram_free["title_two_instagram_free"] ) { echo $instagram_free["title_two_instagram_free"] ;} ?>
                </h2>
                <p class="instagram__text">
                    <?php if( $instagram_free["text-instagram_free"] ) { echo $instagram_free["text-instagram_free"] ;} ?>
                </p>
                <div class="instagram__button-wrapper">
                    <a class="instagram__button button-link" href="https://www.instagram.com/feriorua/" target="_blank">View More</a>
                </div>
            </div>
            <div class="instagram_slider">
                <?php echo do_shortcode( '[insta-gallery id="1"]' ); ?>
            </div>
        </div>


    </div>
</div>
