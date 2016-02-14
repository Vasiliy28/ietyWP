<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */


$arg = array(
    'post_type' => array(
        'welcome',
    ),
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
);
$query = new WP_Query($arg);
?>


<?php if ($query->have_posts()) : ?>

<?php while ($query->have_posts()) :
$query->the_post(); ?>
<?php if (has_term('welcome_header', 'type_post_welcome')): ?>
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

            <?php if (has_term('welcome_logo', 'type_post_welcome')): ?>
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

                <?php if (has_term('welcome_about', 'type_post_welcome')): ?>
                    <div class="col-xs-12 col-sm-6 col-md-pull-4 col-md-4 clearfix ">
                        <div class="welcomeContentLeft">
                            <?php the_field('about'); ?>
                        </div>
                    </div>
                <?php endif ?>

                <?php if (has_term('welcome_info', 'type_post_welcome')): ?>
                <div class="col-xs-12 col-sm-6 col-md-4 ">
                    <div class="welcomeContentRight">
                        <?php the_field('info'); ?>
                        <?php endif ?>

                        <?php if (has_term('welcome_links', 'type_post_welcome')): ?>
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
                    </div>
                </div>
            </article>
        </div>
    </div>

</section>