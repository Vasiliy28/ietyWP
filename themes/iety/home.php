<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 18.01.16
 * Time: 13:47
 */
get_header(); ?>

        <?php if ( have_posts() ) : ?>


                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    get_template_part( 'content', get_post_format() );
                    ?>

                <?php endwhile; ?>




        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
if ( get_theme_mod('blog_layout','classic') == 'classic' ) :
    get_sidebar();
endif;
?>
<?php get_footer(); ?>
