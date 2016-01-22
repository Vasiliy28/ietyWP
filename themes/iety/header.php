<?php
/**
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) : ?>
        <?php if ( get_theme_mod('site_favicon') ) : ?>
            <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
        <?php endif; ?>
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="preloader">
    <div class="spinner">
        <div class="pre-bounce1"></div>
        <div class="pre-bounce2"></div>
    </div>
</div>
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sydney' ); ?></a>
    <header class="header backgroundDark" id="header">
        <div class="container">
            <div class="col-xs-1 col-md-offset-1   hidden-xs hidden-sm">

                <?php if ( get_theme_mod('site_logo') ) : ?>
                    <figure class="logo" id="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
                    </figure>
                <?php else : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php endif; ?>

            </div>
            <div class="col-sm-12 col-md-10">
                <nav class="navPage" id="navPage">
                    <?php wp_nav_menu( array(
                        'theme_location'  => 'headerMenuIety',
                        'container' => false,
                        'after' => '<span></span>',
                        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                        'menu_class'  =>'itemPage',
                    ) ); ?>
                    <div class="coverNavPage"></div>
                </nav>
            </div>
        </div>
    </header>

<?php iety_slider_template() ?>
