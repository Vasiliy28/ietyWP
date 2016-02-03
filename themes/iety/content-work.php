
<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */
?>
<section class="wrapperOurWork <?php echo (the_field('background_post'));  ?>" id="ourWork">
    <div class="container-fluid">
        <section class="ourWork">
            <header class="headerSection">
                <h1><?php the_title() ?></h1>
                <h3><?php the_field('header_post');?></h3>
                <div><span class="sep"></span></div>
                <div><span class="sep"></span></div>
                <div><span class="sep"></span></div>
            </header>
            <nav class="workMenu">
                <ul>
                    <li class="filter" data-filter="all">all <span></span></li>

                    <?php
                    $categories=  get_categories(array(
                        'taxonomy' =>'type_of_work',
                        'hide_empty' =>false
                    ));
                    foreach ($categories as $category) {
                        $option = '<li class="filter" data-filter=".'.$category->slug.'">';
                        $option .= $category->cat_name;
                        $option .= '<span></span></li>';
                        echo $option;
                    }
                    ?>
                </ul>
            </nav>

            <article id="allWorks" class="allWorks clearfix">
                <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 вас category2 category1 ">
                    <figure class="ourWorkEffect">
                        <img src="img/portfolio/1.jpg"  alt="img06"/>
                        <span></span>
                        <figcaption>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                            <a href="img/portfolio/1.jpg" class="popup">view</a>
                        </figcaption>

                    </figure>
                </div>
                <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 category1 category3 clearfix">
                    <figure class="ourWorkEffect">
                        <img src="img/portfolio/2.jpg" alt="img06"/>

                        <span></span>
                        <figcaption>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                            <a href="img/portfolio/2.jpg" class="popup">view</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 category3 category1 clearfix">
                    <figure class="ourWorkEffect">
                        <img src="img/portfolio/3.jpg" alt="img06"/>

                        <span></span>
                        <figcaption>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                            <a href="img/portfolio/3.jpg" class="popup">view</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 category3 clearfix">
                    <figure class="ourWorkEffect">
                        <img src="img/portfolio/4.jpg" alt="img06"/>

                        <span></span>
                        <figcaption>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                            <a href="img/portfolio/4.jpg" class="popup">view</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 category1 category3 clearfix">
                    <figure class="ourWorkEffect">
                        <img src="img/portfolio/5.jpg" alt="img06"/>

                        <span></span>
                        <figcaption>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                            <a href="img/portfolio/5.jpg" class="popup">view</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 category3 category2 clearfix">
                    <figure class="ourWorkEffect">
                        <img src="img/portfolio/6.jpg" alt="img06"/>
                        <span></span>
                        <figcaption>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                            <a href="img/portfolio/6.jpg" class="popup">view</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 category1 clearfix">
                    <figure class="ourWorkEffect">
                        <img src="img/portfolio/7.jpg" alt="img06"/>

                        <span></span>
                        <figcaption>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                            <a href="img/portfolio/7.jpg" class="popup">view</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 category3 category1 category2 clearfix ">
                    <figure class="ourWorkEffect">
                        <img src="img/portfolio/8.jpg" alt="img06"/>
                        <span></span>
                        <figcaption>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                            <a href="img/portfolio/8.jpg" class="popup">view</a>
                        </figcaption>
                    </figure>
                </div>
            </article>

        </section>

    </div>

</section>

