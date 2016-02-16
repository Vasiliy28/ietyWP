<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 18.01.16
 * Time: 13:47
 */
get_header(); ?>
<?php
/*$arg = array(
    'post_type' => array(
        'welcome',
        'history',
        'work',
        'about',
        'team',
        'price',
        'contact'),
    'orderby' => array(
        'menu_order' => 'ASC',
        ),
);
$query = new WP_Query($arg);
?>
<?php if ($query->have_posts()) :  ?>


    <?php while ($query->have_posts()) : $query->the_post(); ?>

        <?php
        if ('history' == get_post_type()) {
            get_template_part('content', 'history');
        }
        if ($post->post_type == 'welcome') {
            get_template_part('content', 'welcome');
        }
        if ($post->post_type == 'work') {
            get_template_part('content', 'work');
        }
        if ($post->post_type == 'about') {
            get_template_part('content', 'about');
        }
        if ($post->post_type == 'team') {
            get_template_part('content', 'team');
        }
        if ($post->post_type == 'price') {
            get_template_part('content', 'price');
        }
        if ($post->post_type == 'contact') {
            get_template_part('content', 'contact');
        }

        ?>

    <?php endwhile; ?>
<?php else : ?>

    <?php get_template_part('content', 'none'); ?>

<?php endif; */?>

<?php get_template_part('content', 'welcome');?>
<?php get_template_part('content', 'history');?>
<?php get_template_part('content', 'work');?>
<?php get_template_part('content', 'about');?>
<?php get_template_part('content', 'contact');?>

<?php
if (get_theme_mod('blog_layout', 'classic') == 'classic') :
    get_sidebar();
endif;
?>
<?php get_footer(); ?>

