<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */
?>

<section class="wrapperOurHistory <?php echo (the_field('background_post'));  ?> twentytwenty-container " id="ourHistory">

    <div class="twentytwentyLeft" >

    </div>
    <div class="twentytwentyRight">

    </div>
    <div class="container ">
        <div class="ourHistory ">
            <header class="headerSectionLight">
                <h1><?php the_field('header_post');?></h1>
            </header>
            <article class="ourHistoryContent clearfix ">
                <?php if( have_rows('history_profile') ): ?>
                    <div class="col-xs-6 col-md-6 leftContentHistory">
                        <?php if (have_rows('name_left_col')):
                            while (have_rows('name_left_col')) : the_row(); ?>
                                <header>
                                    <i class="fa <?php the_sub_field('icon_col'); ?> fa-flip-horizontal"></i>
                                    <h3><?php the_sub_field('name_col'); ?></h3>
                                </header>
                            <?php endwhile;
                        endif;
                        while( have_rows('history_profile') ) : the_row();
                            if(get_sub_field('layout_in_post') == "left") : ?>
                                <div class="history">
                                    <header><?php the_sub_field('specialty'); ?></header>
                                    <p class="year"><?php the_sub_field('period'); ?></p>
                                    <p><?php the_sub_field('about'); ?></p>
                                </div>
                            <?php endif;

                        endwhile; ?>
                    </div>
                    <div class="col-xs-6 rightContentHistory">
                        <?php if (have_rows('name_right_col')):
                            while (have_rows('name_right_col')) : the_row(); ?>
                                <header>
                                    <h3><?php the_sub_field('name_col'); ?></h3>
                                    <i class="fa <?php the_sub_field('icon_col'); ?> "></i>
                                </header>
                            <?php endwhile;
                        endif;
                        while( have_rows('history_profile') ) : the_row();
                            if(get_sub_field('layout_in_post') == "right") : ?>
                                <div class="history">
                                    <header><?php the_sub_field('specialty'); ?></header>
                                    <p class="year"><?php the_sub_field('period'); ?></p>
                                    <p><?php the_sub_field('about'); ?></p>
                                </div>
                            <?php endif;

                        endwhile; ?>
                    </div>
                <?php endif; ?>
            </article>
        </div>
    </div>
</section>
