<?php

add_action('wp_enqueue_scripts','style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('init', 'true_jquery_register' );
add_action( 'after_setup_theme', 'register_my_menu' );
add_action( 'init', 'register_post_types' );

add_filter( 'use_block_editor_for_post', '__return_false' );


function style_theme() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('custom-google-fonts-Cormorant+Upright', 'https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@400;600;700&display=swap" rel="stylesheet');
    wp_enqueue_style('custom-google-fonts-Open+Sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet');
    wp_enqueue_style('custom-google-fonts-Reenie_Beanie', 'https://fonts.googleapis.com/css2?family=Reenie+Beanie&display=swap" rel="stylesheet" rel="stylesheet');
}

function scripts_theme() {
    wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js');


}

function true_jquery_register() {
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, null, true );
		wp_enqueue_script( 'jquery' );
	}
}

function register_my_menu() {
    register_nav_menu( 'header-main', 'Header menu main' );
    register_nav_menu( 'header-right', 'Header menu right' );
    register_nav_menu( 'dishes-menu', 'Dishes menu' );
  }

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

function register_post_types(){

    register_post_type( 'food', [
        'label'  => null,
        'labels' => [
            'name'               => 'Food',
            'singular_name'      => 'Food',
            'add_new'            => 'Add New food',
            'add_new_item'       => 'Adding food',
            'edit_item'          => 'Editing food',
            'new_item'           => 'New food',
            'view_item'          => 'View food',
            'search_items'       => 'Search food',
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Food',
        ],
        'description'            => 'It is portfolio with our works',
        'public'                 => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'rest_base'           => null,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-coffee',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

}

// Allow SVG admin upload
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

//member image size
add_image_size( 'our chefs size', 412, 520 );
add_image_size( 'chef singl size', 580, 733 );
add_image_size( 'chefs word size', 586, 741 );
add_image_size( 'thumb-single', 1300, 430, true);
add_image_size( 'thumb-blog', 412, 430, true );




// ===========

add_action('after_setup_theme', 'register_theme_support');

function register_theme_support () {
    add_theme_support( 'post-thumbnails', array( 'post' ) );
}



$separator_url = get_template_directory_uri() . '/assets/images/sestions_free/breadcrumbs/Vector.png';
$myseparator = '<img class="breadcrumbs-img" src="' . $separator_url . '" alt=" Symbol more ">';



// Breadcrumbs
function custom_breadcrumbs() {
    global $myseparator;
    // Settings
    $separator        = $myseparator;
    $breadcrums_id    = 'breadcrumbs';
    $breadcrums_class = 'breadcrumbs';
    $home_title       = 'Homepage';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy = 'product_cat';

    // Get the query & post information
    global $post, $wp_query;

    // Do not display on the homepage
    if ( ! is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
//        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
//        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && ! is_tax() && ! is_category() && ! is_tag() ) {

//            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( $prefix, false ) . '</strong></li>';

//           =========== My code start=============
            if( !empty($prefix) ) {
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( $prefix, false ) . '</strong></li>';
            }
            if( empty($prefix) ) {
                $prefix = '';
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( $prefix, false ) . '</strong></li>';
            }
//           =========== My code finish =============

        } else if ( is_archive() && is_tax() && ! is_category() && ! is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if ( $post_type != 'post' ) {

                $post_type_object  = get_post_type_object( $post_type );
                $post_type_archive = get_post_type_archive_link( $post_type );

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if ( $post_type != 'post' ) {

                $post_type_object  = get_post_type_object( $post_type );
                $post_type_archive = get_post_type_archive_link( $post_type );

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if ( ! empty( $category ) ) {

                // Get last category post is in
                $last_category = end( array_values( $category ) );

                // Get parent any categories and create array
                $get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
                $cat_parents     = explode( ',', $get_cat_parents );

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach ( $cat_parents as $parents ) {
                    $cat_display .= '<li class="item-cat">' . $parents . '</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists( $custom_taxonomy );
            if ( empty( $last_category ) && ! empty( $custom_taxonomy ) && $taxonomy_exists ) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link( $taxonomy_terms[0]->term_id, $custom_taxonomy );
                $cat_name       = $taxonomy_terms[0]->name;

            }


            // Check if the post is in a category
            if ( ! empty( $last_category ) ) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                // Else if post is in a custom taxonomy
            } else if ( ! empty( $cat_id ) ) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title( '', false ) . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if ( $post->post_parent ) {

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );


                // Get parents in the right order
                $anc = array_reverse( $anc );


                // Parent page loop
                if ( ! isset( $parents ) ) {
                    $parents = null;
                }
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink( $ancestor ) . '" title="' . get_the_title( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
//                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id       = get_query_var( 'tag_id' );
            $taxonomy      = 'post_tag';
            $args          = 'include=' . $term_id;
            $terms         = get_terms( $taxonomy, $args );
            $get_term_id   = $terms[0]->term_id;
            $get_term_slug = $terms[0]->slug;
            $get_term_name = $terms[0]->name;


            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time( 'Y' ) . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><a class="bread-month bread-month-' . get_the_time( 'm' ) . '" href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time( 'm' ) . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time( 'j' ) . '"><strong class="bread-current bread-' . get_the_time( 'j' ) . '"> ' . get_the_time( 'jS' ) . ' ' . get_the_time( 'M' ) . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time( 'Y' ) . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><strong class="bread-month bread-month-' . get_the_time( 'm' ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time( 'Y' ) . '"><strong class="bread-current bread-current-' . get_the_time( 'Y' ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var( 'paged' ) ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var( 'paged' ) . '"><strong class="bread-current bread-current-' . get_query_var( 'paged' ) . '" title="Page ' . get_query_var( 'paged' ) . '">' . __( 'Page' ) . ' ' . get_query_var( 'paged' ) . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';
    }
}


// Rendering card of member on the team page
function teamItem( $args ) {
    echo'<div class="teams__item">';
      echo '<div class="teams__item-image">';

            $photo_member = get_field('photo_member', $args->ID );
            $social_madia_member = get_field('social_madia_member', $args->ID );

            echo '<img class="teams__item-img"';
                 if($photo_member["url"]) { echo 'src="' . $photo_member["url"] . '"' ;}
                 if($photo_member["alt"]) { echo 'alt="' . $photo_member["alt"] . '"' ;}
            echo '>';
            echo '<div class="teams__item-cover">';
               echo '<div class="teams__item-cover-socials">';
                    if( $social_madia_member ) : foreach ( $social_madia_member as $value ) :
                            if( $value["url_social_media_member"] ) { echo '<a class="teams__item-cover-social-img" href="' . $value["url_social_media_member"] . '">' ;}
                                    if( $value["icon_social_member"]["url"] ) { echo '<img class="teams__item-cover-social-img" src="' . $value["icon_social_member"]["url"] . '"' ;}
                                    if($value["icon_social_member"]["alt"]) { echo 'alt="' . $value["icon_social_member"]["alt"] . '"' ;}
                                echo '>';
                            echo '</a>';
                        endforeach;
                    endif;
                echo '</div>';
                echo '<a class="teams__item-more blogs__item-more" href="' . get_permalink($args->ID) . '">Read more</a>';
            echo '</div>';
        echo '</div>';
        if($args->post_title) {echo '<h3 class="teams__item-name">' . $args->post_title . '</h3>';}

        $position = get_the_terms( $args->ID, 'position' )[0]->name;
        if($position) {echo '<p class="teams__item-position">' . $position . '</p>';}
    echo '</div>';
}

// Register sidebar
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){

    register_sidebar( array(
        'name'          => 'Sidebar',
        'id'            => "sidebar",
        'description'   => '',
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => "</h4>\n",
        'before_sidebar' => '', // WP 5.6
        'after_sidebar'  => '', // WP 5.6
    ) );
}

add_action( 'widgets_init', 'register_my_two_widgets' );
function register_my_two_widgets(){

    register_sidebar( array(
        'name'          => 'Sidebar dishes menu',
        'id'            => "sidebar_dishes_menu",
        'description'   => '',
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => "</h4>\n",
        'before_sidebar' => '', // WP 5.6
        'after_sidebar'  => '', // WP 5.6
    ) );
}


// Shortcodes
add_shortcode('post_preview', 'post'); // widget last post
function post($atts){
    $args = shortcode_atts(array(
        'post_type'   => $atts['post_type'],
    ),$atts);

    $args = array(
        'numberposts' => 1,
        'post_type'   => $args['post_type'],
        'post_status' => 'publish',
    );

    $result = wp_get_recent_posts( $args );
    one_post($result);
}
function one_post($args ){ ?>
    <?php
    $post = $args[0];
    $post_ID = $post["ID"];
    $post_type = $post["post_type"];
    ?>
    <article class="blog__post">
        <div class="blog__item blogs__item">
            <div class="blogs__item-image">
                <?php
                if($post_type == 'post') {
                    $preview_image_post = get_field('preview_image_post', $post_ID);
                    $post_img_url = $preview_image_post["url"];
                    $post_img_alt = $preview_image_post["alt"];
                }
                if($post_type == 'food') {
                    $preview_image_post = get_field('image_test', $post_ID);
                    $post_img_url = $preview_image_post["url"];
                    $post_img_alt = $preview_image_post["alt"];
                }

                ?>
                <img class="blogs__item-img" src="<?php if( $post_img_url ) { echo $post_img_url;} ?>" alt="<?php if( $post_img_alt ) { echo $post_img_alt ;} ?>">
            </div>
            <div class="blogs__item-metadata">
                <p class="blogs__item-number">
                    <?php $item_number = get_the_time('d M Y', $post_ID );
                    if( $item_number ) { echo $item_number ;}
                    ?>
                </p>
                <p class="blogs__item-author">
                    <?php
                    $item_author =  get_the_author($post_ID);
                    if( $item_author ) { echo '-' . $item_author ;}
                    ?>
                </p>
            </div>
            <h4 class="blogs__item-title">
                <?php $title = get_the_title($post_ID); ?>
                <?php if( $title  ) { echo $title ;} ?>
            </h4>
            <p class="blogs__item-text">
                <?php $excerpt = get_the_excerpt($post_ID); ?>
                <?php if( $excerpt  ) { echo $excerpt ;} ?>
            </p>
            <a class="blogs__item-more" href="<?php the_permalink($post_ID); ?>">Read more</a>
        </div>
    </article>

<?php }

add_shortcode('widget_category', 'widget_category'); // widget category

// widget category
function widget_category($atts) {
    $args = shortcode_atts (array(
        'taxonomy'   => $atts['taxonomy'],
    ), $atts );

    $terms = get_terms( [
        'taxonomy'   => $args['taxonomy'],
        'orderby' => 'count',
    ] );?>


    <div class="category">
        <?php if(  $terms ) : foreach (  $terms as $value ) : ?>
            <div class="category__item">
                <?php $term_link = get_term_link( $value->term_taxonomy_id , $value->taxonomy ); ?>
                <p class="category__name">
                    <a href="<?php if( $term_link  ) { echo $term_link ;} ?>"><?php if( $value->name ) { echo $value->name ;} ?></a>
                </p>
                <p class="category__count">
                    <?php if( $value->count ) { echo '(' . $value->count  . ')' ;} ?>
                </p>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?php }

add_shortcode('share', 'social'); // widget share
// widget social
function social() { ?>
    <div class="footer-bottom-center-social">
        <?php
        $social = get_field('social', 'options');
        if($social) {
            foreach ($social as $value) {?>
                <a target="_blank" href='<?php echo $value["name"] ?>'><img src="<?php echo $value["icon"]["url"] ?>" alt=""></a>
            <?php }
        }?>
    </div>
<?php }






// emblem

add_shortcode('words_spoon', 'words_around_spoons');

function words_around_spoons() {
    echo '<div class="emblem__wrapper">';
        echo '<div class="emblem__around-image">';
            echo '<img class="emblem__around-img"';
                echo 'src="' . get_template_directory_uri() . '/assets/images/sestions_free/emblem/around.svg "';
                echo 'alt="Words"';
                 echo '>';
        echo '</div>';
        echo '<div class="emblem__spoons-image">';
        echo '<img class="emblem__spoons-img"';
             echo 'src="' . get_template_directory_uri() . '/assets/images/sestions_free/emblem/spoons.svg"';
             echo 'alt="Spoons"';
         echo '>';
    echo '</div>';
echo '</div>';
}


// AJAX blog
if( wp_doing_ajax() ){
    add_action( 'wp_ajax_nextPost', 'display_post' );
    add_action( 'wp_ajax_nopriv_nextPost', 'display_post' );
}


function display_post() {
    $paged = $_POST['paged'];
    $template = $_POST['template'];
    $post_type = '';

    if($template == 'blogs') {
        $post_type = 'post';
        $args = array(
            'posts_per_page' => 4,
            'post_type' => 'post',
            'posts_status' => 'publish',
            'paged' => $paged
        );
    }

    if($template == 'baking') {
        $post_type = 'post';
        $args = array(
            'posts_per_page' => 4,
            'post_type' => 'post',
            'cat' => 21,
            'posts_status' => 'publish',
            'paged' => $paged
        );
    }

    if($template == 'photography') {
        $post_type = 'post';
        $args = array(
            'posts_per_page' => 4,
            'post_type' => 'post',
            'cat' => 20,
            'posts_status' => 'publish',
            'paged' => $paged
        );
    }

    if($template == 'cooking_tips') {
        $post_type = 'post';
        $args = array(
            'posts_per_page' => 4,
            'post_type' => 'post',
            'cat' => 22,
            'posts_status' => 'publish',
            'paged' => $paged
        );
    }

    if($template == 'bar') {
        $post_type = 'food';
        $args = array(
            'posts_per_page' => 4,
            'post_type'   => 'food',
            'tax_query' => [[
                'taxonomy' => 'dishes',
                'field'    => 'slug',
                'terms'    => 'bar'
            ]],
            'posts_status' => 'pupostblish',
            'paged' => $paged
        );
    }

    if($template == 'desserts') {
        $post_type = 'food';
        $args = array(
            'posts_per_page' => 4,
            'post_type'   => 'food',
            'tax_query' => [[
                'taxonomy' => 'dishes',
                'field'    => 'slug',
                'terms'    => 'desserts'
            ]],
            'posts_status' => 'pupostblish',
            'paged' => $paged
        );
    }

    if($template == 'food') {
        $post_type = 'food';
        $args = array(
            'posts_per_page' => 4,
            'post_type'   => 'food',
            'tax_query' => [[
                'taxonomy' => 'dishes',
                'field'    => 'slug',
                'terms'    => 'food'
            ]],
            'posts_status' => 'pupostblish',
            'paged' => $paged
        );
    }

    if($template == 'menu') {
        $post_type = 'food';
        $args = array (
            'posts_per_page' => 4,
            'post_type' => 'food',
            'posts_status' => 'publish',
            'paged' => $paged
        );
    }


    $blog_posts = new WP_Query( $args);

    if ($blog_posts->have_posts() ) :
    while ( $blog_posts->have_posts()  ) : $blog_posts->the_post();
        if($post_type == 'post') {
            get_template_part('blog_post_template');
        }
        if($post_type == 'food') {
            get_template_part('menu_post_template');
        }

    endwhile;
    endif;
    wp_die();
}

add_action('wp_enqueue_scripts', 'my_assets');

function my_assets(){
    wp_enqueue_script('jquer', get_template_directory_uri() . '/assets/js/jquer.js', array('jquery'));
    wp_localize_script('jquer', 'ajaxData', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        )
    );
}


// Comments, butto
//========================================
function wpse218049_enqueue_comments_reply() {

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js (into footer)
        wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
    }
}
add_action(  'wp_enqueue_scripts', 'wpse218049_enqueue_comments_reply' );

//========================================================



// Log in / registration
//========================================================


// Redirect from login page , for example:  http://yoursite.com/wp-login.php
//==============================

function custom_login() {
    echo header("Location: " . get_bloginfo( 'url' ) . "/login");
}

add_action('login_head', 'custom_login');

function login_link_url( $url ) {
    $url = get_bloginfo( 'url' ) . "/login";
    return $url;
}
add_filter( 'login_url', 'login_link_url', 10, 2 );




// Redirect
//=================================
function register_link_url( $url ) {
    if ( ! is_user_logged_in() ) {
        if ( get_option('users_can_register') )
            $url = '<li><a href="' . get_bloginfo( 'url' ) . "/register" . '">' . __('Register', 'yourtheme') . '</a></li>';
        else  $url = '';
    } else {
        $url = '<li><a href="' . admin_url() . '">' . __('Site Admin', 'yourtheme') . '</a></li>';
    }
    return $url;
}
add_filter( 'register', 'register_link_url', 10, 2 );



//========================================================

