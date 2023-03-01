<section class="testimony">
    <div class="container">
        <div class="testimony__wrapper">
            <h5 class="testimony__title-one">
                <?php
                $title_one_testimony = get_field('title_one_testimony', 'options');
                if($title_one_testimony) {echo $title_one_testimony;}
                ?>
            </h5>
            <span class="testimony__image-spoon">
                <?php
                $spoon_new = get_field('spoon_new', 'options');
                $spoon_new_url = $spoon_new["url"];
                $spoon_new_alt = $spoon_new["alt"];
                ?>
                    <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">

            </span>
            <h2 class="testimony__title-two">
                <?php
                $title_two_testimony = get_field('title_two_testimony', 'options');
                if($title_two_testimony) {echo $title_two_testimony;}
                ?>
            </h2>
            <div class="testimony__items">
                <?php
                $arr_posts = get_posts(['post_type' => 'testimony']);
                $quotes_image = get_field('quotes_image', 'options');
                $quotes_image_url = $quotes_image["url"];
                $quotes_image_alt = $quotes_image["alt"];
                ?>
                <?php if( $arr_posts ) : foreach ( $arr_posts as $value ) : ?>

                    <?php
                        $current_post = $value->ID;
                        $quote_testimony = get_field('quote_testimony', $current_post);
                        $profession_testimony = get_field('profession_testimony', $current_post);
                        $image_testimony = get_field('image_testimony', $current_post);
                        $image_testimony_url = $image_testimony["sizes"]["medium"];
                        $image_testimony_alt = $image_testimony["alt"];
                    ?>
                    <div class="testimony__item">
                        <div class="testimony__item-left">
                            <div class="testimony__item-image">
                                <img class="testimony__item-img" src="<?php if( $image_testimony_url ) { echo $image_testimony_url ;} ?>" alt="<?php if( $image_testimony_alt ) { echo $image_testimony_alt ;} ?>">
                                <img class="testimony__item-quotes" src="<?php if( $quotes_image_url ) { echo $quotes_image_url ;} ?>" alt="<?php if( $quotes_image_alt ) { echo $quotes_image_alt ;} ?>">
                            </div>
                        </div>
                        <div class="testimony__item-right">
                            <p class="testimony__item-quote"><?php if( $quote_testimony ) { echo $quote_testimony ;} ?></p>
                            <h4 class="testimony__item-name"><?php echo $value->post_title; ?></h4>
                            <p class="testimony__item-profession"><?php if( $profession_testimony ) { echo $profession_testimony ;} ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

