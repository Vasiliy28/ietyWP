<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */

$query_welcome = new WP_Query(array(
    'post_type' => array(
        'welcome',
    ),
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
));
?>

<?php if ($query_welcome->have_posts()) : ?>

<?php while ($query_welcome->have_posts()) :$query_welcome->the_post(); ?>
<?php if (has_term('header','category' )): ?>
<section id="<?php echo the_ID(); ?>" class="wrapperWelcome <?php echo(the_field('background_post')); ?>">
    <div class="container">
        <div class="welcome">
            <header class="headerSection ">
                <h1><?php the_field('name_section') ?></h1>
                <h3><?php the_field('discription_section'); ?></h3>
                <div><span class="sep"></span></div>
                <div><span class="sep"></span></div>
                <div><span class="sep"></span></div>
            </header>
            <?php endif; ?>

            <?php if (has_term('logo', 'category')): ?>
            <article class="welcomeContent clearfix">
                <div class="col-xs-12 col-md-push-4 col-md-4">
                    <figure class="clearfix welcomeLog" id="welcomeLog">
                        <?php
                        $image = get_field('welcome_logo');
                        if (!empty($image)): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"
                                 class="clearfix"/>
                        <?php endif; ?>

                    </figure>
                </div>
                <?php endif; ?>

                <?php if (has_term('about', 'category')): ?>
                    <div class="col-xs-12 col-sm-6 col-md-pull-4 col-md-4 clearfix ">
                        <div class="welcomeContentLeft">
                            <?php the_field('about'); ?>
                        </div>
                    </div>
                <?php endif ?>

                <?php if (has_term('info', 'category')): ?>
                <div class="col-xs-12 col-sm-6 col-md-4 ">
                    <div class="welcomeContentRight">
                        <?php the_field('info'); ?>
                        <?php endif ?>

                        <?php if (has_term('links', 'category')): ?>
                            <?php if (have_rows('links')) : ?>
                                <ul class="iconGroup">
                                    <?php while (have_rows('links')) : the_row();
                                        echo '<li><a href="' . get_sub_field('link') . '">' . get_sub_field('icon') . '</a></li>';
                                    endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        <?php endif ?>

                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query();?>
                    </div>
                </div>
            </article>
        </div>
    </div>

</section>