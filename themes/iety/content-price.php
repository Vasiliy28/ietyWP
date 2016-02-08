<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */
?>
<section id="<?php echo the_ID(); ?>" class="wrapperPrice <?php echo (the_field('background_post'));  ?>">
    <span></span><span></span>
    <div class="container">
        <div class="row">
            <section class="prices clearfix">
                <?php
                if (have_rows('cards')):
                    while (have_rows('cards')): the_row();?>
                        <div class="col-xs-6 col-md-3">
                            <article class="priceing">
                                <header>
                                    <h1><?php the_sub_field('name_card') ?></h1>
                                </header>
                                <div class="price"><?php the_sub_field('how_much')?>&#36;</div>
                                <p><?php the_sub_field('some_info') ?></p>
                                <?php the_sub_field('icon_card') ?>
                                <?php the_sub_field('list') ?>
                                <a href="#">Order</a>
                            </article>
                        </div>
                <?php
                    endwhile;
                endif
                ?>

            </section>

        </div>
    </div>
</section>
