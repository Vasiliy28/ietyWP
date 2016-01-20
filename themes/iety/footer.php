<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 18.01.16
 * Time: 13:48
 */
?>
</div>
</div>
</div><!-- #content -->

<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
    <?php get_sidebar('footer'); ?>
<?php endif; ?>

<a class="go-top"><i class="fa fa-angle-up"></i></a>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info container">
        <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'sydney' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'sydney' ), 'WordPress' ); ?></a>
        <span class="sep"> | </span>
        <?php printf( __( 'Theme: %2$s by %1$s.', 'sydney' ), 'aThemes', '<a href="http://athemes.com/theme/sydney" rel="designer">Sydney</a>' ); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
