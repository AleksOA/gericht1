<?php
/*
 Template Name: Team
 */
?>

<?php get_header(); ?>
    <main>
        <section class="banner-top">
            <?php
            $args = get_field('banner_teams');
            get_template_part('banner', null, $args);
            ?>
        </section>

        <section class="teams">
            <div class="container">
                <div class="teams__wrapper">
                    <div class="teams__items">
                        <?php
                        $headChef = get_posts( array(
                            'numberposts' => 1,
                            'post_type'   => 'member',
                            'tax_query' => [[
                                'taxonomy' => 'position',
                                'field'    => 'slug',
                                'terms'    => 'headchef'
                            ]]
                        ) )[0];

                        $chefs = get_posts( array(
                            'numberposts' => 5,
                            'exclude'     => array($headChef->ID),
                            'post_type'   => 'member',
                        ) );
                        ?>

                        <?php teamItem( $headChef ); ?>

                        <?php if( $chefs ) : foreach ( $chefs as $value ) :
                                teamItem( $value );
                             endforeach;
                         endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="video-home">
            <?php
            $video = get_template_directory_uri() . '/assets/video/coverr-taking-pictures-on-a-boat-7292-1080p.mp4';
            $args = array(
                'video_url' => $video,
                'placeholder_url' => ''
            );

            get_template_part('video_about_us', null, $args )
            ?>
        </section>

        <section class="laurels">
            <?php
            $args = get_field('awards', 'options');
            get_template_part('awards', null, $args);
            ?>
        </section>


        <section>
            <?php
            $argss = get_field('awards_members', 153);
            ?>
            <?php  get_template_part('awards.php', null, $argss); ?>
        </section>
    </main>
<?php get_footer(); ?>