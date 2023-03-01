        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="footer__block-form">
                        <h5 class="footer__block-form-title-one">Newsletter</h5>
                        <span class="footer__block-form-spoon">
                             <?php
                             $spoon_svg = get_field('spoon_svg', 'options');
                             if($spoon_svg) : ?>
                                 <img src="<?php echo $spoon_svg ?>" alt="image spoon">
                             <?php endif ?>
                        </span>
                        <h2 class="footer__block-form-title-two">Subscribe to Our Newsletter</h2>
                        <p class="footer__block-form-text">And never miss latest Updates!</p>
                        <?php echo do_shortcode('[contact-form-7 id="40" title="Footer News letter"]'); ?>
                    </div>  
                </div>
            </div>
            <div class="footer__bottom-background" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/footer/background-footer.png' ?>'); position: relative; z-index: 1">
                <div class="container">
                    <div class="footer-end">
                        <div class="footer-bottom">

                            <div class="footer-bottom-left">
                                <?php
                                    $footer_left_column = get_field('footer_left_column', 'options');
                                ?>
                                <div class="test"><?php echo $footer_left_column ? : "" ?></div>
                            </div>
                            <div class="footer-bottom-center">
                                <div class="logo footer-logo">
                                    <a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
                                </div>
                                <?php
                                    $footer_center_column = get_field('footer_center_column', 'options');
                                    if($footer_center_column){echo $footer_center_column;}
                                ?>

                                <div class="footer-bottom-center-spoon">
                                    <?php
                                    $spoon_svg = get_field('spoon_svg', 'options');
                                    if($spoon_svg) : ?>
                                        <img src="<?php echo $spoon_svg ?>" alt="image spoon">
                                   <?php endif ?>
                                </div>
                                <div class="footer-bottom-center-social">
                                    <?php
                                    $social = get_field('social', 'options');
                                    if($social) {
                                        foreach ($social as $value) {?>
                                             <a target="_blank" href='<?php echo $value["name"] ?>'><img src="<?php echo $value["icon"]["url"] ?>" alt=""></a>
                                        <?php }
                                    }?>
                                </div>
                            </div>
                            <div class="footer-bottom-right">
                                <?php
                                    $footer_right_column = get_field('footer_right_column', 'options');
                                    if($footer_right_column) {echo $footer_right_column;}
                                ?>
                            </div>
                        </div>
                        <div class="end">
                            <p>
                                <?php
                                $footer_end = get_field('footer_end', 'options');
                                if($footer_end) {echo $footer_end;}
                                ?>
                            </p>
                        </div>
                        <div class="button-top button-footer">
                            <a href="#header">
                                <p class="button-top__text" >TOP</p>
                                <span class="button-top__image"><img src="<?php echo get_template_directory_uri() . '/assets/images/footer/button-top.svg' ?>" alt=""></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        
        <?php wp_footer(); ?>
<!--            </div>-->
        </div>
    </body>

</html>