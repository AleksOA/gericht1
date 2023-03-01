<article class="blog__post">
    <div class="blog__item blogs__item">
        <div class="blogs__item-image">
            <?php
            $post_ID = get_the_ID();
            $preview_image_post = get_field('image_test', $post_ID);
            $post_img_url = $preview_image_post["url"];
            $post_img_alt = $preview_image_post["alt"];
            ?>
            <img class="blogs__item-img" src="<?php if( $post_img_url ) { echo $post_img_url;} ?>" alt="<?php if( $post_img_alt ) { echo $post_img_alt ;} ?>">
        </div>
        <div class="blogs__item-metadata">
            <p class="blogs__item-number">
                <?php $item_number = get_the_time('d M Y', $post_ID );
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
            <?php $title = get_the_title($post_ID); ?>
            <?php if( $title  ) { echo $title ;} ?>
        </h4>
        <p class="blogs__item-text">
            <?php $excerpt = get_the_excerpt($post_ID); ?>
            <?php if( $excerpt  ) { echo $excerpt ;} ?>
        </p>
        <a class="blogs__item-more" href="<?php the_permalink($post_ID); ?>">Read more</a>
    </div>
</article>
