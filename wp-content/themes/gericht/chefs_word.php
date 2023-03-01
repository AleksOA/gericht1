<section class="chefs-word" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/footer/background-footer.png' ?>')">
    <div class="container">
        <div class="chefs-word__wrapper">
            <?php
            $arg = [
                'post_type' => 'member',
                'tax_query' => [
                    [
                        'taxonomy' => 'position',
                        'field' => 'slug',
                        'terms' => 'headchef',
                    ]
                ]
            ];

            $headchef  = get_posts($arg);
            $headchefID = $headchef[0]->ID;
            $arr_photo_member = get_field('photo_member', $headchefID);
            $photo_member = $arr_photo_member["sizes"]["chefs word size"];
            $title_image_member= $arr_photo_member["alt"];
            ?>
            <div class="chefs-word__left">
<!--                <div class="chefs-word__image">-->
<!--                    <img class="chefs-word__img"-->
<!--                         src="--><?php //if($photo_member){echo $photo_member;} ?><!--"-->
<!--                         alt="--><?php //if($title_image_member){echo $title_image_member;} ?><!--"-->
<!--                    >-->
<!--                </div>-->
                <div class="chefs-word__image">
                    <img class="chefs-word__img"
                         src="<?php if($photo_member){echo $photo_member;} ?>"
                         alt="<?php if($title_image_member){echo $title_image_member;} ?>">
                    <span class="chefs-word__span">q</span>
                </div>
            </div>
            <div class="chefs-word__right">
                <div class="chefs-word__right-wrapper">
                    <h5 class="chefs-word__title">
                        <?php
                        $title_word = get_field('title_word', $headchefID);
                        if($title_word){echo $title_word;}
                        ?>
                    </h5>
                    <span class="chefs-word__image-spoon">
                        <?php
                        $spoon_svg = get_field('spoon_svg', 'options');
                        if($spoon_svg) : ?>
                            <img src="<?php echo $spoon_svg ?>" alt="<?php if(get_field('title_image_item', 'options')){echo get_field('title_image_item', 'options');} ?>">
                        <?php endif ?>
                    </span>
                    <h2 class="chefs-word__name-word">
                        <?php
                        $name_of_the_word_chef = get_field('name_of_the_word_chef', $headchefID);
                        if($name_of_the_word_chef){echo $name_of_the_word_chef;}
                        ?>
                    </h2>

                    <p class="chefs-word__word">
                        <?php
                        $quotes_image = get_field('quotes_image', 'options');
                        $quotes_image_url = $quotes_image["url"];
                        $quotes_image_alt = $quotes_image["alt"];
                        ?>

                        <span><img class="chefs-word__word-quotes" src="<?php if($quotes_image_url){echo $quotes_image_url;} ?>" alt="<?php if($quotes_image_alt){echo $quotes_image_alt;} ?>"></span>

                        <?php
                        $text_of_word = get_field('text_of_word', $headchefID);
                        if($text_of_word){echo $text_of_word;}
                        ?>
                    </p>
                    <h4 class="chefs-word__name-chef">
                        <?php
                        $post_title = $headchef[0]->post_title;
                        if($post_title) {echo $post_title;}
                        ?>
                    </h4>
                    <p class="chefs-word__about-chef">
                        <?php
                        $more_about_the_author = get_field('more_about_the_author', $headchefID);
                        if($more_about_the_author){echo $more_about_the_author;}
                        ?>
                    </p>
                    <p class="chefs-word__autograph">
                        <?php
                            $post_title = $headchef[0]->post_title;
                            if($post_title) {echo $post_title;}
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
