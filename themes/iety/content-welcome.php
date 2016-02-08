<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */
?>
<section id="<?php echo the_ID(); ?>" class="wrapperWelcome <?php echo (the_field('background_post'));  ?>" >
    <div class="container">
        <div class="welcome">
            <header class="headerSection ">
                <h1><?php the_title() ?></h1>
                <h3><?php the_field('header_post');?></h3>
                <div><span class="sep"></span></div>
                <div><span class="sep"></span></div>
                <div><span class="sep"></span></div>
            </header>
            <article class="welcomeContent clearfix">
                <div class="col-xs-12 col-md-push-4 col-md-4">
                    <figure class="clearfix welcomeLog" id="welcomeLog">
                        <?php

                        $image = get_field('logo_image');

                        if( !empty($image) ): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="clearfix" />
                        <?php endif; ?>

                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-pull-4 col-md-4 clearfix ">
                    <div class="welcomeContentLeft">
                        <?php the_field('welcome_content_left'); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 ">
                    <div class="welcomeContentRight">
                        <?php the_field('welcome_content_right'); ?>
                        <?php if( have_rows('icons') ) :?>
                            <ul class="iconGroup">
                            <?php while( have_rows('icons') ) : the_row();
                                echo  '<li><a href="'.get_sub_field('icon_link').'">'.get_sub_field('icon_skin').'</a></li>';
                            endwhile;?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>