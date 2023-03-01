<?php get_header(); ?>

    <section class="not-found" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/footer/background-footer.png' ?>')">
        <div class="container">
            <div class="not-found__content">
                <div class="not-found__image-404">
                    <img class="not-found__img-404" src="<?php echo get_template_directory_uri() . '/assets/images/404/404.svg' ?>" alt="404">
                </div>
                <div class="not-found__image-spoon">
                    <img class="not-found__img-spoon" src="<?php echo get_template_directory_uri() . '/assets/images/404/spoon404.svg' ?>" alt="Spoon">
                </div>
                <h5 class="not-found__text">
                    Oops! The page you are looking for does not exist. It might have been moved or deleted.
                </h5>
                <a class="not-found__button button-link" href="<?php echo get_permalink(91); ?>">Back To Home</a>
            </div>
        </div>
        <div class="not-found__end">
            <p class="not-found__end-text">2021 Gerícht. All Rights reserved.</p>
        </div>
    </section>

