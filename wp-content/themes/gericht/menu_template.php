<?php get_header('dishes_menu'); ?>
<div class="container">
    <div class="blog__content">
        <div class="blog__column-primary">
            <main>
                <div class="blog__posts" id="blogPosts">
                    <?php
                    $blog_posts = new WP_Query( $args['posts']);
                   ?>
                    <?php if ($blog_posts->have_posts() ) :
                        while ( $blog_posts->have_posts()  ) : $blog_posts->the_post(); ?>
                            <?php get_template_part('menu_post_template'); ?>
                        <?php endwhile;?>
                    <?php endif; ?>
                </div>

                <?php $max_pages = $blog_posts->max_num_pages; ?>

                <a id="buttonViewMoreBlog"
                   class="blog__button button-link"
                   href="#"
                   data-max_pages="<?php if( $max_pages ) { echo $max_pages;} ?>"
                   data-template="<?php if( $args['template'] ) { echo $args['template'];} ?>"
                >View More</a>
            </main>
        </div>
        <div class="blog__column-secondary">
            <aside id="sidebar" class="blog__sidebar">
                <?php get_sidebar('dishes_menu'); ?>
            </aside>
        </div>
    </div>
</div>
<?php get_footer(); ?>

