<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */
$arg = array(
    'post_type' => array(
        'about',
    ),
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
    'posts_per_page' =>  1,
);
$query = new WP_Query($arg);
?>

<?php if ($query->have_posts()) : ?>

<?php while ($query->have_posts()) :$query->the_post(); ?>


<section id="<?php echo the_ID(); ?>" class="wrapperAboutUs <?php echo (the_field('background_post'));  ?> ">
    <div class="container">
        <div class="row">
            <div class="aboutUs clearfix">
                <header class="headerSectionLight">
                    <h1><?php the_title() ?></h1>
                </header>
                <?php
                if( have_rows('content') ):
                    while ( have_rows('content') ) : the_row();
                    ?>
                        <article class="clearfix aboutUsContent">
                            <div class="col-md-4 aboutUsContentLeft">
                                <h3><?php the_field('header_content') ?></h3>
                                <?php the_sub_field('left_colum') ?>
                            </div>
                            <div class="col-md-4 aboutUsContentCenter">
                                <?php the_sub_field('center_colum') ?>
                            </div>
                            <div class="col-md-4 aboutUsContentRight">
                                <?php the_sub_field('right_colum') ?>
                                <?php if( have_rows('icons') ) :?>
                                    <ul class="iconGroup">
                                        <?php while( have_rows('icons') ) : the_row();
                                            echo  '<li><a href="'.get_sub_field('icon_link').'">'.get_sub_field('icon_skin').'</a></li>';
                                        endwhile;?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query();?>
