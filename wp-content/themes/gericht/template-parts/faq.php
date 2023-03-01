<?php
/*
 Template Name: FAQ
 */
?>

<?php get_header(); ?>
<main>
    <section class="banner-top">
        <?php
        $args = get_field('banner_faq');
        get_template_part('banner', null, $args);
        ?>
    </section>

    <section class="faq">
        <div class="container">
            <div class="faq__wrapper">
                <?php
                $Image_for_section = get_field('Image_for_section');
                ?>
                <div class="faq__left">
                    <div class="faq__image">
                        <img class="faq__img"
                             src="<?php if( $Image_for_section["url"] ) { echo $Image_for_section["url"] ;} ?>"
                             alt="<?php if( $Image_for_section["alt"] ) { echo $Image_for_section["alt"] ;} ?>"
                        >
                        <span class="faq__image_background">q</span>
                    </div>
                </div>
                <div class="faq__right">
                    <?php
                    $questions_and_answer = get_field('questions_and_answer');
                    if( $questions_and_answer ) : foreach ( $questions_and_answer as $item ) : ?>
                        <div class="faq__item">
                            <div class="faq__question">
                                <h5 class="faq__question-text">
                                    <?php if( $item["question_faq"] ) { echo $item["question_faq"] ;} ?>
                                </h5>
                            </div>
                            <div class="faq__answer">
                                <p class="faq__answer-text">
                                    <?php if( $item["answer_faq"] ) { echo $item["answer_faq"] ;} ?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>







</main>
<?php get_footer(); ?>


