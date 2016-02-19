<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */

$query_price = new WP_Query(array(
    'post_type' => 'price',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),

));


?>
<?php if ($query_price->have_posts()): ?>
<?php while ($query_price->have_posts()):$query_price->the_post() ?>
<?php if(has_term('header','category')):?>
<section id="<?php echo the_ID(); ?>" class="wrapperPrice <?php echo(the_field('background_post')); ?>">
    <span></span><span></span>
    <div class="container">
        <div class="row">
            <section class="prices clearfix">
                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
                <?php if ($query_price->have_posts()): ?>
                    <?php while ($query_price->have_posts()):$query_price->the_post() ?>
                        <?php if(!(has_term('header','category'))):?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 ">
                            <article class="priceing">
                                <header>
                                    <h1><?php the_field('name_card') ?></h1>
                                </header>
                                <div class="price"><?php the_field('how_much') ?>&#36;</div>
                                <p><?php the_field('some_info') ?></p>
                                <?php the_field('icon_card') ?>
                                <?php the_field('list') ?>
                                <a href="#">Order</a>
                            </article>
                        </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </section>
        </div>
    </div>
</section>
