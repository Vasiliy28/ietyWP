<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */


$query_team = new WP_Query(array(
    'post_type' => 'team',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),

));

?>

<?php if ($query_team->have_posts()): ?>
<?php while ($query_team->have_posts()):$query_team->the_post() ?>
<?php if(has_term('header','category')):?>
<section id="<?php echo the_ID(); ?>" class="wrapperOurTeam  <?php echo(the_field('background_post')); ?> ">
    <div class="container">
        <div class="ourTeam">
            <header class="headerSectionLight">
                <h1><?php the_field('name_section') ?></h1>
            </header>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <article class="ourTeamContent ">
                <?php if ($query_team->have_posts()): ?>
                <?php while ($query_team->have_posts()):$query_team->the_post() ?>
                        <?php if(!(has_term('header','category'))):?>
                        <div class="col-md-6">
                            <figure>
                                <a href="#for_popup_<?php echo the_ID(); ?>" class="popup_team" ><img src="<?php the_field('image') ?>" alt="" class="clearfix"></a>
                                <figcaption class="clearfix adout_worker">
                                    <h1> <?php the_field('name') ?></h1>
                                    <h4><?php the_field('profession') ?></h4>
                                    <p><?php the_field('info') ?></p>
                                </figcaption>
                            </figure>
                            <div class="hidden">
                                <figure id="for_popup_<?php echo the_ID(); ?>" class="for_popup">
                                    <img src="<?php the_field('image') ?>" alt="" class="clearfix">
                                    <figcaption class="clearfix">
                                        <h1> <?php the_field('name') ?></h1>
                                        <h4><?php the_field('profession') ?></h4>
                                        <p><?php the_field('info') ?></p>
                                    </figcaption>
                                </figure>
                            </div>

                        </div>
                        <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </article>
        </div>
    </div>
</section>




