<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 18.01.16
 * Time: 13:47
 */
get_header(); ?>


<?php if (have_posts()) : ?>


    <?php while (have_posts()) : the_post(); ?>

        <?php
        if (in_category('cat_welcome')) {
            get_template_part('content', 'welcome');
        }
        ?>

    <?php endwhile; ?> <!--post Welcome-->

    <?php while (have_posts()) : the_post(); ?>

        <?php
        if (in_category('cat_history')) {
            get_template_part('content', 'history');
        }

        ?>

    <?php endwhile; ?> <!--post History-->

    <?php while (have_posts()) : the_post(); ?>

        <?php
        if (in_category('cat_work')) {
            get_template_part('content', 'work');
        }

        ?>

    <?php endwhile; ?> <!--post Work -->

    <?php while (have_posts()) : the_post(); ?>

        <?php
        if (in_category('cat_about')) {
            get_template_part('content', 'about');
        }

        ?>

    <?php endwhile; ?> <!--post About -->

    <?php while (have_posts()) : the_post(); ?>

        <?php
        if (in_category('cat_contact')) {
            get_template_part('content', 'contact');
        }

        ?>

    <?php endwhile; ?> <!--post Contact -->

    <?php while (have_posts()) : the_post(); ?>

        <?php
        if (in_category('cat_team')) {
            get_template_part('content', 'team');
        }

        ?>

    <?php endwhile; ?> <!--post Team -->

    <?php while (have_posts()) : the_post(); ?>

        <?php
        if (in_category('cat_price')) {
            get_template_part('content', 'price');
        }

        ?>

    <?php endwhile; ?> <!--post Price -->

<?php else : ?>

    <?php get_template_part('content', 'none'); ?>

<?php endif; ?>


<?php
if (get_theme_mod('blog_layout', 'classic') == 'classic') :
    get_sidebar();
endif;
?>
<?php get_footer(); ?>

