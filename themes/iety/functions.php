<?php
/**
 * Sydney child functions
 *
 */

show_admin_bar(false);


/**
 * Slider
 */

if ( ! function_exists( 'iety_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */


    function iety_setup() {


// This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'headerMenuIety' =>( 'Header Menu Iety' )
        ) );

        class description_walker extends Walker_Nav_Menu
        {
            function start_el(&$output, $item, $depth, $args)
            {
                global $wp_query;
                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

                $class_names = $value = '';

                $classes = empty( $item->classes ) ? array() : (array) $item->classes;

                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
                $class_names = ' class="'. esc_attr( $class_names ) . '"';

                $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

                $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

                $prepend = '<strong>';
                $append = '</strong>';
                $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

                if($depth != 0)
                {
                    $description = $append = $prepend = "";
                }

                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title ).$append;
                $item_output .= $description.$args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;

                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
        }

    }
endif; // sydney_setup
add_action( 'after_setup_theme', 'iety_setup',20 );



/**
 * Enqueue scripts and styles.
 */
function iety_scripts() {
    /**
     * remove Sydney Theme style and script
     */
    wp_dequeue_style('sydney-headings-fonts');
    wp_dequeue_style('sydney-body-fonts');
    wp_dequeue_style('sydney-style-inline-css');
    wp_dequeue_script('sydney-skip-link-focus-fix');
    wp_dequeue_script('sydney-masonry-init');

    wp_dequeue_script('sydney-main');


    /**
     *to plug stily and script for Iety theme
     */
    wp_enqueue_style('bootstrap' , get_stylesheet_directory_uri() . '/css/bootstrap/bootstrap.min.css');
    wp_enqueue_style('robotoFonts',get_stylesheet_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('animateCss' , get_stylesheet_directory_uri() . '/css/animate.min.css');
    wp_enqueue_style('twentytwenty' , get_stylesheet_directory_uri() . '/css/twentytwenty.css');
    wp_enqueue_style('magnific-popup' , get_stylesheet_directory_uri() . '/css/magnific-popup.css');
    wp_enqueue_style('main' , get_stylesheet_directory_uri() . '/css/main.css');
    wp_enqueue_style('media' , get_stylesheet_directory_uri() . '/css/media.css',array('main'));

    wp_enqueue_style( 'html5', 'http://html5shiv.googlecode.com/svn/trunk/html5.js');
    wp_style_add_data( 'html5', 'conditional', 'IE' );

    wp_enqueue_script('modernizrCustom', get_stylesheet_directory_uri() . '/js/modernizr.custom.js', array('jquery'));


    wp_enqueue_script('mixUp', get_stylesheet_directory_uri() . '/js/jQuery/jquery.mixup.min.js', array('jquery'),'',true);

    /*
     * eventMove need for twentytwenty.js
     */
    wp_enqueue_script('eventMove', get_stylesheet_directory_uri() . '/js/after/event.move.js','','',true);
    wp_enqueue_script('twentytwenty', get_stylesheet_directory_uri() . '/js/after/twentytwenty.js',array('eventMove'),'',true);

    wp_enqueue_script('magnificPopup', get_stylesheet_directory_uri() . '/js/jQuery/jquery.magnific-popup.min.js', array('jquery'),'',true);
    wp_enqueue_script('pageScroll2id', get_stylesheet_directory_uri() . '/js/jQuery/jquery.malihu.PageScroll2id.js', array('jquery'),'',true);


    /**
     * necessary scripts for mainIety.js
     */
    $allSkripts = array(
        'modernizrCustom',
        'mixUp',
        'eventMove',
        'twentytwenty',
        'magnificPopup',
        'pageScroll2id'
    );
    wp_enqueue_script('mainIety', get_stylesheet_directory_uri() . '/js/mainIety.js', $allSkripts ,'',true);
}
add_action( 'wp_enqueue_scripts', 'iety_scripts' ,20);


/*
 * Show posts of 'post', 'page' and 'movie' post types on home page
 */
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'page', 'work','history','welcome' ));

    return $query;
}

/*
 * create theme for dafault
 */
function removeParentFunction(){
    //custom titlw-tag for iety theme
    remove_action('wp_head','rsd_link');
    remove_action('wp_head','wlwmanifest_link');
    remove_action('wp_head','wp_generator');
    remove_theme_support( 'title-tag' );
    remove_theme_support( 'custom-background' );
    remove_action( 'tgmpa_register', 'sydney_recommend_plugin' );
    remove_action('admin_menu', 'sydney_add_theme_info');
    remove_action( 'customize_register', 'sydney_customize_register' );
    remove_action( 'widgets_init', 'sydney_widgets_init' );
    remove_action( 'after_setup_theme', 'sydney_custom_header_setup' );
    remove_action( 'wp_enqueue_scripts', 'sydney_custom_styles' );
    remove_action( 'wp_enqueue_scripts', 'sydney_enqueue_bootstrap', 9 );
}
add_action('after_setup_theme','removeParentFunction',20);

require get_stylesheet_directory()  . '/inc/slider.php';
require get_stylesheet_directory()  . '/inc/customizer.php';

/*
 * add custom post type
 */
require get_stylesheet_directory()  . '/post_types/work.php';
require get_stylesheet_directory()  . '/post_types/welcome.php';
require get_stylesheet_directory()  . '/post_types/history.php';
//require get_stylesheet_directory()  . '/inc/theme-options.php';




