<?php
/*
 Template Name: Contact Us
 */
?>

<?php get_header(); ?>
<main>
    <section class="banner-top">
        <?php
        $args = get_field('banner_contact_us');
        get_template_part('banner', null, $args);
        ?>
    </section>
    <section class="map">
        <div class="container">
            <div class="map__wrapper">
                <iframe class="map__map"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7570.956294519093!2d-90.30790308123191!3d38.672199676172646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87d8cadc84bc5a43%3A0x5307d760d720912f!2z0JrQu9C10LnRgtC-0L0sINCc0LjRgdGB0YPRgNC4LCDQodCo0JA!5e0!3m2!1sru!2sua!4v1676539504832!5m2!1sru!2sua" width="1300" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <section class="form-contact " style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/home/background_about.png' ?>')">
        <div class="container">
            <div class="form-contact__wrapper">
                <div class="form-contact__left">
                    <div class="form-contact__form">
                        <?php echo do_shortcode('[contact-form-7 id="524" title="Untitled"]'); ?>
                    </div>
                </div>
                <div class="form-contact__right">
                    <div class="form-contact__images">
                        <?php
                        $main_image_contact_us = get_field('main_image_contact_us');
                        ?>
                        <img class="form-contact__img"
                             src="<?php if($main_image_contact_us["url"]) {echo $main_image_contact_us["url"];} ?>"
                             alt="<?php if($main_image_contact_us["alt"]) {echo $main_image_contact_us["alt"];} ?>"
                        >
                        <div class="form-contact__image-letter">
                            <img class="form-contact__img-letter"
                                 <?php
                                 $letter_image_contact_us = get_field('letter_image_contact_us');
                                 ?>
                                 src="<?php if($letter_image_contact_us["url"]) {echo $letter_image_contact_us["url"];} ?>"
                                 alt="<?php if($letter_image_contact_us["alt"]) {echo $letter_image_contact_us["alt"];} ?>"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>
