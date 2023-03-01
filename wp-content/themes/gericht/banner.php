<div class="banner__wrapper">
    <div class="banner__background" style="background-image: url('<?php echo $args["banner_element"]["background_banner"]["url"] ?>')">
        <div class="banner__contents">
            <h1 class="banner__title">
                <?php if( $args["banner_element"]["title_banner"] ) { echo $args["banner_element"]["title_banner"];} ?>
            </h1>
            <div class="banner__content">
                <div class="banner__content-text">
                    <?php if( $args["banner_element"]["content_banner"] ) { echo $args["banner_element"]["content_banner"];} ?>
                </div>
                <div class="banner__breadcrumbs">
                    <?php  custom_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>
</div>