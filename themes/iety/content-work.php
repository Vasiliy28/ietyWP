
<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */
?>
<section id="<?php echo the_ID(); ?>" class="wrapperOurWork <?php echo (the_field('background_post'));  ?>">
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
            <?php
            if (have_rows('works')):
                while (have_rows('works')) : the_row();
                    $terms = get_sub_field('taxonomy_type_of_work');
                    if ($terms):
                        foreach ($terms as $term):
                            $cat .= ' ';
                            $cat .= $term->slug;
                            $cat .= ' ';
                        endforeach;

                    endif;?>
                    <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 <?php echo $cat; ?>">
                        <figure class="ourWorkEffect">
                            <img src="<?php the_sub_field('preview') ?>"  alt="img06"/>
                            <span></span>
                            <figcaption>
                                <p><?php the_sub_field('about_work') ?></p>
                                <a href="<?php the_sub_field('preview') ?>" class="popup">view</a>
                            </figcaption>

                        </figure>
                    </div>
            <?php
                    $cat = ' ';
                endwhile;
            endif;
            ?>
            </article>
        </section>
    </div>
</section>

