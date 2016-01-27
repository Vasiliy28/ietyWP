<?php
/**
 * Slider template
 *
 * @package Sydney
 */

//Slider template
if ( ! function_exists( 'iety_slider_template' ) ) :
    function iety_slider_template() {



            //Get the slider options
            $speed      = get_theme_mod('slider_speed', '4000');
        $slider_button      = get_theme_mod('slider_button_text', 'Click to begin');
        $slider_button_url  = get_theme_mod('slider_button_url','#primary');

            ?>
        <section class="wrapperMainPicture " id="headerPage" data-speed="<?php echo esc_attr($speed); ?>">

        <figure class="slides-container" id="back">
                    <?php
                    if ( get_theme_mod('slider_image_1', get_stylesheet_directory_uri() . '/img/room1.jpg') ) {
                        echo '<img src="' . esc_url(get_theme_mod('slider_image_1', get_stylesheet_directory_uri() . '/img/room1.jpg')) . '"></img>';

                    }
                    if ( get_theme_mod('slider_image_2', get_stylesheet_directory_uri() . '/img/room5.jpg') ) {
                        echo '<img src="' . esc_url(get_theme_mod('slider_image_2', get_stylesheet_directory_uri() . '/img/room5.jpg')) . '"></img>';
                    }
                    if ( get_theme_mod('slider_image_3') ) {
                        echo '<img src="' . esc_url(get_theme_mod('slider_image_3')) . '"></img>';
                    }
                    if ( get_theme_mod('slider_image_4') ) {
                        echo '<img src="' . esc_url(get_theme_mod('slider_image_4')) . '"></img>';
                    }
                    if ( get_theme_mod('slider_image_5') ) {
                        echo '<img src="' . esc_url(get_theme_mod('slider_image_5')) . '"></img>';
                    }
                    ?>
                </figure>

            <div class="mainLinkWrap" id="mainLinkWrap">
                <a class="mainLink" type="submit" href="#"><span data-letters-l="Finde"
                                                                 data-letters-r="more">Finde more</span></a>
                <span></span>
            </div>
        </section>
            <?php

    }
endif;