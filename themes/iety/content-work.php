
<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */

$query_work = new WP_Query(array(
    'post_type' => 'work',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),

    'posts_per_page' =>  1,
));


$query_work_type = new WP_Query(array(
    'post_type' => 'work',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'operator' => 'NOT EXISTS',
        )
    )

));

?>
<?php if ($query_work->have_posts()): ?>
<?php while ($query_work->have_posts()):$query_work->the_post() ?>
<?php if (has_term('header', 'category')): ?>
<section id="<?php echo the_ID(); ?>" class="wrapperOurWork <?php echo(the_field('background_post')); ?>">
    <div class="container-fluid">
        <section class="ourWork">
            <header class="headerSection">
                <h1><?php the_field('name_section') ?></h1>
                <h3><?php the_field('discription_section'); ?></h3>
                <div><span class="sep"></span></div>
                <div><span class="sep"></span></div>
                <div><span class="sep"></span></div>
            </header>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
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
            <?php if ($query_work_type->have_posts()): ?>
            <?php while ($query_work_type->have_posts()):$query_work_type->the_post(); ?>
                    <?php $terms = get_field('type');
                    if ($terms):
                        foreach ($terms as $term):
                            $cat .= ' ';
                            $cat .= $term->slug;
                            $cat .= ' ';
                        endforeach;
                    endif;?>
                    <div class="mix col-xs-12 col-sm-6 col-md-4 col-lg-3 <?php echo $cat; ?>">
                        <figure class="ourWorkEffect">
                            <img src="<?php the_field('preview') ?>"  alt="img06"/>
                            <span></span>
                            <figcaption>
                                <p><?php the_field('about') ?></p>
                                <a href="<?php the_field('preview') ?>" class="popup">view</a>
                            </figcaption>
                        </figure>
                    </div>

                    <?php $cat = ' ';?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
                </article>
        </section>
    </div>
</section>






