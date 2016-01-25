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

<a class="go-top"><i class="fa fa-angle-up"></i></a>

<footer class="mainFooter ">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-4  footerAbout">
                <h3>Ietty</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, assumenda aut ipsam laboriosam nihil
                    tenetur?</p>
                <p>Accusamus aliquam aliquid ea error nemo odit, repellendus voluptates. Dolore est in labore obcaecati
                    officia?</p>
            </div>
            <div class="col-xs-6  col-sm-3 col-sm-offset-0 col-md-offset-1 col-md-3 footerLinks" >
                <h3>Quick Lincks</h3>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 footerFollow">
                <h3>Following Us</h3>
                <div class="iconsGroupFooter">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                </div>
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
