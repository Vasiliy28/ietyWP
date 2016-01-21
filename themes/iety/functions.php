<?php
/**
 * Sydney child functions
 *
 */

show_admin_bar(false);


/**
 * Slider
 */
require get_stylesheet_directory()  . '/inc/slider.php';
require get_stylesheet_directory()  . '/inc/customizer.php';
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
    wp_dequeue_script('sydney-skip-link-focus-fix');
    wp_dequeue_script('sydney-masonry-init');
    wp_dequeue_script('sydney-main');

    /**
     *to plug stily and script for Iety theme
     */
    wp_enqueue_style('robotoFonts',get_stylesheet_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('animateCss' , get_stylesheet_directory_uri() . '/css/animate.min.css');
    wp_enqueue_style('twentytwenty' , get_stylesheet_directory_uri() . '/css/twentytwenty.css');
    wp_enqueue_style('magnific-popup' , get_stylesheet_directory_uri() . '/css/magnific-popup.css');
    wp_enqueue_style('main' , get_stylesheet_directory_uri() . '/css/main.css');
    wp_enqueue_style('media' , get_stylesheet_directory_uri() . '/css/media.css',array('main'));

    wp_enqueue_style( 'html5', 'http://html5shiv.googlecode.com/svn/trunk/html5.js');
    wp_style_add_data( 'html5', 'conditional', 'IE' );

    wp_enqueue_script('modernizrCustom', get_stylesheet_directory_uri() . '/js/modernizr.custom.js', array('jquery'));
    wp_enqueue_script('waypoint', get_template_directory_uri() . '/js/waypoints.js', array('jquery'),'',true);

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
        'waypoint',
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
 * create theme for dafault
 */
function removeParentFunction(){
    //custom titlw-tag for iety theme
    remove_theme_support( 'title-tag' );
    remove_theme_support( 'custom-background' );
    remove_action( 'tgmpa_register', 'sydney_recommend_plugin' );
    remove_action('admin_menu', 'sydney_add_theme_info');
    remove_action( 'customize_register', 'sydney_customize_register' );
    remove_action( 'widgets_init', 'sydney_widgets_init' );
    remove_action( 'after_setup_theme', 'sydney_custom_header_setup' );
}
add_action('after_setup_theme','removeParentFunction',20);


