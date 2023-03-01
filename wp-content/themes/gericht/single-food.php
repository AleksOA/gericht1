<?php get_header('dishes_menu'); ?>
<div class="container">
    <?php if ( have_posts() ) :
    while ( have_posts()  ) : the_post(); ?>
    <?php $post_ID = get_the_ID(); ?>
    <main>
        <div class="blog__top">
            <div class="blog__top-content">
                <p class="blog__date">
                    <?php $item_number = get_the_time('d M Y', get_the_ID() );
                    if( $item_number ) { echo $item_number ;}
                    ?>
                </p>
                <p class="blog__author">
                    <?php
                    $item_author =  get_the_author();
                    if( $item_author ) { echo '-' . $item_author ;}
                    ?>
                </p>
            </div>
            <h2 class="blog__top-title">
                <?php if( get_the_title() ) { echo get_the_title() ;} ?>
            </h2>
            <div class="blog__top-image">
                <?php $top_image = get_field('image_for_single_page');
                $top_image_url = $top_image['url'];
                $top_image_alt = $top_image['alt'];
                ?>
                <img class="blog__top-img"
                     src="<?php if( $top_image_url ) { echo $top_image_url ;} ?>"
                     alt="<?php if( $top_image_alt ) { echo $top_image_alt ;} ?>"
                >
            </div>
        </div>
    </main>
    <div class="blog__content">
        <div class="blog__column-primary">
            <main>
                <div class="blog__top-item">
                    <p>
                        <?php if( get_the_content() ) { echo get_the_content() ;} ?>
                    </p>
                </div>
                <div class="blog__center-item">
                    <?php
//                    $data_for_single_post = get_field('data_for_single_post');
//                    $data_for_single_post = get_field('data_for_single_food');
//                    echo $data_for_single_post'<pre>';
//                     var_dump($data_for_single_post);
//                    echo '</pre>';
//                    echo $data_for_single_post
//                    echo '<pre>';
//                     var_dump($data_for_single_posta);
//                    echo '</pre>';

                    ?>
                    <?php if( have_rows('data_for_single_food2') ):
                        while ( have_rows('data_for_single_food2') ) : the_row(); ?>

                            <?php if( get_row_layout() == 'section_one_text_food' ): ?>
                                <?php  $text = get_sub_field('text_post_section_one_food'); ?>
                                <div class="blog__center-text-one">
                                    <?php if( $text) { echo $text;} ?>
                                </div>


                            <?php elseif ( get_row_layout() == 'section_video_food' ): ?>
                                <?php $video_blog = get_sub_field('video_food')["url"] ?>
                                <?php $placeholder_blog = get_sub_field('placeholder_video_food')["url"] ?>

                                <div class="blog__center-video">
                                    <?php
                                    $args = array(
                                        'video_url' => $video_blog,
                                        'placeholder_url' => $placeholder_blog
                                    );
                                    get_template_part('video_about_us', null, $args);
                                    ?>
                                </div>

                            <?php elseif ( get_row_layout() == 'section_two_text_food' ): ?>
                                <?php $text_two = get_sub_field('text_food_section_two') ?>

                                <div class="blog__center-text-two">
                                    <?php if( $text_two) { echo $text_two;} ?>
                                </div>

                            <?php elseif ( get_row_layout() == 'section_quote_food' ): ?>
                                <?php $text_quote = get_sub_field('quote_food_text') ?>

                                <div class="blog__center-quote">
                                    <?php if( $text_quote ) { echo $text_quote;} ?>
                                </div>

                            <?php elseif ( get_row_layout() == 'section_three_text_food' ): ?>
                                <?php $text_text_three = get_sub_field('text_food_section_three') ?>
                                <?php $text_image_three = get_sub_field('image_food_section_three') ?>
                                <?php $text_text_two_three = get_sub_field('text_two_food_section_three') ?>

                                <div class="blog__center-text-three">
                                    <div class="blog__center-text-one-three">
                                        <?php if( $text_text_three ) { echo $text_text_three;} ?>
                                    </div>
                                    <div class="blog__center-text-three-image">
                                        <div class="blog__center-image">
                                            <img class="blog__center-text-three-img"
                                                 src="<?php if( $text_image_three['url'] ) { echo $text_image_three['url'] ;} ?>"
                                                 alt="<?php if( $text_image_three['alt'] ) { echo $text_image_three['alt'] ;} ?>"
                                            >
                                        </div>
                                    </div>
                                    <div class="blog__center-text-two-three">
                                        <?php if( $text_text_two_three ) { echo $text_text_two_three;} ?>
                                    </div>
                                </div>

                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="blog__bottom-place">
                    <div class="blog__tags">
                        <p><?php the_tags('#', '  #', ''); ?></p>
                    </div>
                    <div class="blog__comment-like">
                        <p class="blog__comment-like-item">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/sestions_free/breadcrumbs/Vector_comment.svg' ?>"
                                 alt="icon comment">
                            Comment
                        </p>
                        <p class="blog__comment-like-item">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/sestions_free/breadcrumbs/Vector_like.svg' ?>"
                                 alt="icon like">
                            Like
                        </p>
                    </div>
                </div>
            </main>
        </div>
        <?php endwhile;?>
        <?php endif; ?>
        <div class="blog__column-secondary">
            <aside id="sidebar" class="blog__sidebar">
                <?php get_sidebar('dishes_menu'); ?>
            </aside>
        </div>
    </div>
    <div class="container-two">
        <div class="comments-wrapper">
            <section>
                <?php
                $comments_number = get_comments_number_text( '0', '1', '%');
                ?>
                <h4 class="comments-number"><?php if( $comments_number ) { echo 'Comment(' . $comments_number . ')' ;} ?></h4>

                <?php
                $commenter = wp_get_current_commenter();
                $req = get_option( 'require_name_email' );
                $aria_req = ( $req ? " aria-required='true'" : '' );
                $consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
                $args = array(
                    'comment_field' => '<p class="comment-form-comment"> 
                                            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Hello There, My message..."></textarea>
                                            </p>',
                    'fields' => array(
                        'author' => '<p class="comment-form-author">
                                            <input id="author" 
                                            name="author" 
                                            type="text"
                                            value="' . esc_attr( $commenter['comment_author'] ) . '" 
                                            size="30"
                                            placeholder="Name"/>
                                        </p>',
                        'email'  => '<p class="comment-form-email">
                                            <input id="email" name="email"
                                            type="email"
                                            value="' . esc_attr(  $commenter['comment_author_email'] ) . '" 
                                            size="30"
                                             placeholder="Email"/>
                                        </p>',
                        'cookies' => '<p class="comment-form-cookies-consent">'.
                            sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent ) .'
                                             <label for="wp-comment-cookies-consent">'. __( 'Save my name and email in this browser for the next time I comment.' ) .'</label>
                                        </p>',

                    ),
                    'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s comment-form-submit" value="Submit" />',
                    'comment_notes_before' => '',
                    'logged_in_as' => '',
                    'title_reply' => 'Post a Comment',
                    'title_reply_before' => '<p id="reply-title" class="comment-reply-title">',
                    'title_reply_after' => '</p>',
                    'title_reply_to' => 'Reply to %s'

                );
                ?>
                <?php if(is_singular()) {?>
                    <?php comments_template('/short-comments.php'); ?>

                    <div class="comment-form-wrapper">
                        <?php comment_form( $args, $post_ID); ?>
                    </div>


                <?php } ?>


            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>
