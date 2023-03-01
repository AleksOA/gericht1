<div class="book">
    <div class="book__wrapper">
        <div class="book__titles">
            <?php
                $title_one_book = get_field('title_one_book', 'options');
                $title_two_book = get_field('title_two_book', 'options');
            ?>
            <h5 class="book__title-one">
                <?php if( $title_one_book ) { echo $title_one_book ;} ?>
            </h5>
            <span class="book__image-spoon">
                <?php
                $spoon_new = get_field('spoon_new', 'options');
                $spoon_new_url = $spoon_new["url"];
                $spoon_new_alt = $spoon_new["alt"];
                ?>
                <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
            </span>
            <h2 class="book__title-two">
                <?php if( $title_two_book ) { echo $title_two_book ;} ?>
            </h2>
        </div>
        <div class="book__form">
            <?php echo do_shortcode( '[booking-form]' ); ?>
            <div class="book__button">
                <button class="book__btn">Book Now</button>
            </div>
        </div>
    </div>
</div>

