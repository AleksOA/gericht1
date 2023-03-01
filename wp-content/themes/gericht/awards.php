<div class="container">
    <div class="awards__wrapper">
        <div class="awards__left">
            <div class="awards__content">
                <h5 class="awards__title-one"><?php if($args["section_title_awards"]) { echo $args["section_title_awards"];} ?></h5>
                <span class="awards__image-spoon">
                    <?php
                    $spoon_new = get_field('spoon_new', 'options');
                    $spoon_new_url = $spoon_new["url"];
                    $spoon_new_alt = $spoon_new["alt"];
                    ?>
                    <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                </span>
                <h2 class="awards__title-two"><?php if($args["title_awards"]) {echo $args["title_awards"];} ?></h2>
                <div class="awards__items">
                    <?php
                        if( $args["our_awards"] ) : foreach ( $args["our_awards"] as $value ) : ?>
                            <div class="awards__item">
                                <div class="awards__item-left">
                                    <div class="awards__item-image">
                                        <img class="awards__item-img"
                                             src="<?php if($value["image_awards"]["url"]) {echo $value["image_awards"]["url"];} ?>"
                                             alt="<?php if($value["image_awards"]["alt"]) {echo $value["image_awards"]["alt"];} ?>"
                                        >
                                    </div>
                                </div>
                                <div class="awards__item-right">
                                    <h5 class="awards__item-title"><?php if($value["title_award"]) {echo $value["title_award"];} ?></h5>
                                    <p class="awards__item-text"><?php if($value["text_award"]) {echo $value["text_award"];} ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="awards__right">
            <div class="awards__images">
                <img class="awards__img"
                     src="<?php if($args["image_main_awards"]["url"]) {echo $args["image_main_awards"]["url"];} ?>"
                     alt="<?php if($args["image_main_awards"]["alt"]) {echo $args["image_main_awards"]["alt"];} ?>">
                <?php if (array_key_exists('image_letter_awards', $args)) : ?>
                    <img class="awards__img-letter"
                         src="<?php if($args["image_letter_awards"]["url"]) {echo $args["image_letter_awards"]["url"];} ?>"
                         alt="<?php if($args["image_letter_awards"]["alt"]) {echo $args["image_letter_awards"]["alt"];} ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

