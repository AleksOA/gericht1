<section class="dishes-menu" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/sestions_free/dishes_menu/img-background-dishes.png' ?>')">
    <div class="container">
        <nav class="dishes-menu__menu">
            <?php wp_nav_menu([
                'theme_location' => 'dishes-menu',
                'container' => null,
                'menu_class' => 'nav',
                'menu_id' => 'navDishesMenu'
            ]); ?>
        </nav>
    </div>
</section>
