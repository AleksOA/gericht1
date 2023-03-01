

<!--This is need data for work  this a template.-->
<!--Add to page this code:-->
<!---->
<!--$args = array(-->
<!--    'sidebar_name' => 'sidebar',-->
<!--    'post_type'   => 'post', // widget Our Latest Posts-->
<!--    'taxonomy'   => 'category', // widget category-->
<!--);-->
<!---->
<!--    get_template_part('sidebar_template', null, $args);-->
<!---->

<?php
$args_sidebar = $args;

?>



<?php dynamic_sidebar($args_sidebar['sidebar_name']); ?>


<!--widget Our Latest Posts-->
<?php function post($atts){
    $args = shortcode_atts(array(
        'post_type'   => 'post'
    ),$atts);
    $args = array(
        'numberposts' => 1,
        'post_type'   => $args['post_type'],
        'post_status' => 'publish',
    );
    $result = wp_get_recent_posts( $args );

    one_post($result);
}?>



<?php function one_post($args ){ ?>
    <?php
    $post = $args[0];
    $post_ID = $post["ID"];
    ?>
    <article class="blog__post">
        <div class="blog__item blogs__item">
            <div class="blogs__item-image">
                <?php
                $preview_image_post = get_field('preview_image_post', $post_ID);
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
                    $item_author =  get_the_author($post_ID);
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

<?php } ?>



<!--widget category-->
<?php function widget_category($atts) {
    $args = shortcode_atts (array(
        'taxonomy'   => 'category',
    ), $atts );
    $terms = get_terms( [
        'taxonomy'   => $args['taxonomy'],
        'orderby' => 'count',
    ] );?>
    <?php
    ?>

    <div class="category">
        <?php if(  $terms ) : foreach (  $terms as $value ) : ?>
            <div class="category__item">
                <?php $term_link = get_term_link( $value->term_taxonomy_id , 'category'); ?>
                <p class="category__name">
                    <a href="<?php if( $term_link  ) { echo $term_link ;} ?>"><?php if( $value->name ) { echo $value->name ;} ?></a>
                </p>
                <p class="category__count">
                    <?php if( $value->count ) { echo '(' . $value->count  . ')' ;} ?>
                </p>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?php } ?>

<!--widget social-->
<?php function social() { ?>
    <div class="footer-bottom-center-social">
        <?php
        $social = get_field('social', 'options');
        if($social) {
            foreach ($social as $value) {?>
                <a target="_blank" href='<?php echo $value["name"] ?>'><img src="<?php echo $value["icon"]["url"] ?>" alt=""></a>
            <?php }
        }?>
    </div>
<?php } ?>
