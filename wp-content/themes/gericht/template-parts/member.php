<?php
/*
 Template Name: Member
 layout Template Post Type: member
 */
?>

<?php get_header(); ?>
<main>
    <section class="banner-top">
        <?php
        $args = get_field('banner_single_member');
        get_template_part('banner', null, $args);
        ?>
    </section>


    <section class="about-member">
        <div class="container">
            <div class="about-wrapper">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="about-member__left">
                        <div class="about-member__image">
                            <?php
                                $post_ID = get_the_ID();
                                $photo_member = get_field('photo_member', $post_ID );
                            ?>
                            <img class="about-member__img"
                                 src="<?php if( $photo_member["url"] ) { echo $photo_member["url"] ;} ?>"
                                 alt="<?php if( $photo_member["alt"] ) { echo $photo_member["alt"] ;} ?>">
                        </div>
                    </div>
                    <div class="about-member__right">
                        <h5 class="about-member__title-one">
                            <?php
                                $position = get_the_terms( $post_ID, 'position' )[0]->name;
                                if( $position ) { echo $position ;}
                            ?>
                        </h5>
                        <span class="about-member__item-image-spoon">
                            <?php
                            $spoon_new = get_field('spoon_new', 'options');
                            $spoon_new_url = $spoon_new["url"];
                            $spoon_new_alt = $spoon_new["alt"];
                            ?>
                            <img src="<?php if($spoon_new_url) {echo $spoon_new_url;} ?>" alt="<?php if($spoon_new_alt) {echo $spoon_new_alt;} ?>">
                        </span>
                        <h2 class="about-member__title-two">
                            <?php the_title(); ?>
                        </h2>
                        <p class="about-member__text">
                            <?php
                                $about_myself = get_field('about_myself', $post_ID);
                                if( $about_myself  ) { echo $about_myself  ;}
                            ?>
                        </p>
                        <ul class="about-member__list">
                            <?php
                            $benefits_member = get_field('benefits_member', $post_ID);
                            ?>
                            <?php if( $benefits_member ) : foreach ( $benefits_member as $value ) : ?>
                                <li class="about-member__list-item">
                                    <h6 class="about-member__list-text">
                                        <?php if( $value["adventage_member"] ) { echo $value["adventage_member"] ;} ?>
                                    </h6>
                                </li>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
                        <p class="about-member__autograph">
                            <?php the_title(); ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section class="awards-member" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/footer/background-footer.png' ?>')">
        <?php
        $args = get_field('awards_members', $post_ID);
        ?>
        <?php  get_template_part('awards', null, $args); ?>
    </section>
</main>
<?php get_footer(); ?>
