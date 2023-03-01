
<?php if(have_comments()) :  ?>
    <?php
    $args = array(
        'style' => 'li',
        'callback' => 'mytheme_comment',
        'max_depth' => 3,
        'avatar_size' => 150
    );
    ?>

    <div class="commentlist">
        <?php wp_list_comments($args); ?>
    </div>
<?php endif; ?>


<?php
    function mytheme_comment( $comment, $args, $depth ) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }

        $classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
        ?>

        <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) { ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
        } ?>

        <div class="comment-author vcard">
            <?php
            if ( $args['avatar_size'] != 0 ) {

                 echo get_avatar( $comment, $args['avatar_size'] );


            }

            ?>
        </div>
        <div class="comment-wrapper">
            <div class="comment-author">
                <?php
                printf(
                    __( '<cite class="fn"><h5>%s</h5></cite>' ),
                    get_comment_author_link()
                );
                ?>
            </div>

            <div class="comment-meta commentmetadata">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php
                    printf(
                        __( '<p>%1$s</p>' ),
                        get_comment_date('j M Y')
                    ); ?>
                </a>
                <?php if ( $comment->comment_approved == '0' ) { ?>
                    <em class="comment-awaiting-moderation">
                        <?php _e( 'Your comment is awaiting moderation.' ); ?>
                    </em><br/>
                <?php } ?>
            </div>

            <?php comment_text(); ?>

            <div class="reply">
                <p>
                <?php
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        )
                    )
                ); ?></p>
            </div>
        </div>
        <?php if ( 'div' != $args['style'] ) { ?>
            </div>
        <?php } ?>
    <?php }