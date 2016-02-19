<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 18.01.16
 * Time: 13:48
 */
?>

<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
    <?php get_sidebar('footer'); ?>
<?php endif; ?>

<?php $query_footer = new WP_Query(array(
'post_type' => 'post',
'orderby' => array(
'menu_order' => 'ASC',
),
    'post_name' => 'footer',
    'posts_per_page' => 1,
));

?>




<a class="go-top"><i class="fa fa-angle-up"></i></a>
<div class="wrapperHamburger-icon visible-xs">
    <a id="hamburger-icon" class="hamburger-icon" href="#" title="Menu">
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
    </a>
</div>
<footer class="mainFooter ">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-4  footerAbout">
                <?php if ($query_footer->have_posts()): ?>
                    <?php while ($query_footer->have_posts()):$query_footer->the_post() ?>
                        <?php the_content() ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-xs-6  col-sm-3 col-sm-offset-0 col-md-offset-1 col-md-3 footerLinks" >
                <h3>Quick Lincks</h3>
                <?php wp_nav_menu( array(
                    'theme_location'  => 'footerMenuIety',
                    'walker' => new True_Walker_Nav_Menu()
                ) ); ?>
            </div>
            <div class="col-xs-12 col-sm-4 footerFollow">

                <?php if ($query_footer->have_posts()): ?>
                    <?php while ($query_footer->have_posts()):$query_footer->the_post() ?>
                        <h3>Following Us</h3>
                        <?php if (have_rows('links')) : ?>
                            <div class="iconsGroupFooter">
                                <?php while (have_rows('links')) : the_row();
                                    echo '<a href="' . get_sub_field('link') . '">' . get_sub_field('icon') . '</a>';
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>


            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 copy">
                <p><span> &copy; </span> Iety 2016</p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
