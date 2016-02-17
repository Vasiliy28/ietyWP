<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */


$query_header = new WP_Query(array(
    'post_type' => 'team',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
    'posts_per_page' =>  1,
    'post_name' => 'header'
));
$query_worker = new WP_Query(array(
    'post_type' => 'team',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
    'category_team' =>'worker')
);
?>

<?php if ($query_header->have_posts()): ?>
<?php while ($query_header->have_posts()):$query_header->the_post() ?>
<section id="<?php echo the_ID(); ?>" class="wrapperOurTeam  <?php echo(the_field('background_post')); ?> ">
    <div class="container">
        <div class="ourTeam">
            <header class="headerSectionLight">
                <h1><?php the_field('name_section') ?></h1>
            </header>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <article class="ourTeamContent ">
                <?php if ($query_worker->have_posts()): ?>
                <?php while ($query_worker->have_posts()):$query_worker->the_post() ?>
                        <div class="col-md-6">
                            <figure>
                                <a href=""><img src="<?php the_field('image') ?>" alt="" class="clearfix"></a>
                                <figcaption class="clearfix">
                                    <h1> <?php the_field('name') ?></h1>
                                    <h4><?php the_field('profession') ?></h4>
                                    <p><?php the_field('info') ?></p>
                                </figcaption>
                            </figure>
                        </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </article>
        </div>
    </div>
</section>




