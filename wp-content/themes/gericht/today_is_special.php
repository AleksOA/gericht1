<section class="today-is-special">
    <div class="container">
        <h5 class="today-is-special__text">
            <?php
                $text_section_ts = get_field('text_section_ts', 'options');
                if($text_section_ts) {echo $text_section_ts;}
            ?>
        </h5>
        <span class="today-is-special__image-spoon">
            <?php
            $spoon_svg = get_field('spoon_svg', 'options');
            if($spoon_svg) : ?>
                <img src="<?php echo $spoon_svg ?>" alt="image spoon">
            <?php endif ?>
        </span>
        <h2 class="today-is-special__title">
            <?php
            $title_section_ts = get_field('title_section_ts', 'options');
            if($title_section_ts) {echo $title_section_ts;}
            ?>
        </h2>
        <div class="today-is-special__menu">
            <div class="today-is-special__left">
                <h3 class="today-is-special__menu-title">
                    <?php
                    $title_column_left = get_field('title_column_left', 'options');
                    if($title_column_left) {echo $title_column_left;}
                    ?>
                </h3>
                <?php $output_to_column_left = get_field('output_to_column_left', 'options');
                if($output_to_column_left ) : foreach ($output_to_column_left as $value) : ?>
                    <div class="today-is-special__menu-item">
                        <div class="today-is-special__menu-item-top">
                            <h5 class="today-is-special__menu-name"><?php echo $value->post_title; ?></h5>
                            <div class="today-is-special__menu-prise">
                                <h5 class="today-is-special__menu-currency">
                                    <?php
                                    $currency = get_field('currency', $value);
                                    if($currency) {echo  $currency;}
                                    ?>
                                </h5>
                                <h5 class="today-is-special__menu-number">
                                    <?php
                                    $price = get_field('price', $value);
                                    if($price) {echo  $price;}
                                    ?>
                                </h5>
                            </div>
                        </div>
                        <div class="today-is-special__menu-item-top-bottom">
                            <p class="today-is-special__menu-item-details">
                                <?php
                                $details = get_field('details', $value);
                                if($details) {echo  $details;}
                                ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php endif; ?>

            </div>
            <div class="today-is-special__center">
                <div class="today-is-special__image">
                    <img class="today-is-special__img" src="<?php echo get_template_directory_uri() . '/assets/images/sestions_free/today_is_special/today_is_special.png' ?>" alt="image bar still life">
                </div>
            </div>
            <div class="today-is-special__center today-is-special--first" bis_skin_checked="1">
                <div class="today-is-special__image" bis_skin_checked="1">
                    <img class="today-is-special__img" src="<?php echo get_template_directory_uri() . '/assets/images/sestions_free/today_is_special/today_is_special.png' ?>" alt="image bar still life">
                </div>
            </div>
            <div class="today-is-special__right">
                <h3 class="today-is-special__menu-title">
                    <?php
                    $title_column_right = get_field('title_column_right', 'options');
                    if($title_column_right) {echo $title_column_right;}
                    ?>
                </h3>
                <?php $output_to_column_right = get_field('output_to_column_right', 'options');
                if($output_to_column_right ) : foreach ($output_to_column_right as $value) : ?>
                    <div class="today-is-special__menu-item">
                        <div class="today-is-special__menu-item-top">
                            <h5 class="today-is-special__menu-name"><?php echo $value->post_title; ?></h5>
                            <div class="today-is-special__menu-prise">
                                <h5 class="today-is-special__menu-currency">
                                    <?php
                                    $currency = get_field('currency', $value);
                                    if($currency) {echo  $currency;}
                                    ?>
                                </h5>
                                <h5 class="today-is-special__menu-number">
                                    <?php
                                    $price = get_field('price', $value);
                                    if($price) {echo  $price;}
                                    ?>
                                </h5>
                            </div>
                        </div>
                        <div class="today-is-special__menu-item-top-bottom">
                            <p class="today-is-special__menu-item-details">
                                <?php
                                $details = get_field('details', $value);
                                if($details) {echo  $details;}
                                ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="today-is-special__button-wrapper">
            <a class="today-is-special__button button-link" href="<?php echo get_term_link(5);; ?>">View More</a>
        </div>

    </div>
</section>
