<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */


$query_history = new WP_Query(array(
    'post_type' => 'history',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
));

?>

<?php if ($query_history->have_posts()): ?>
<?php while ($query_history->have_posts()):$query_history->the_post() ?>
<?php if (has_term('header', 'category')): ?>
<section id="<?php echo the_ID(); ?>" class="wrapperOurHistory <?php echo(the_field('background_post')); ?>">
    <div class="container ">
        <div class="ourHistory ">
            <span></span>
            <header class="headerSectionLight">
                <h1><?php the_field('name_section') ?></h1>
            </header>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <article class="ourHistoryContent clearfix ">
                <div class="col-xs-12 col-sm-6 leftContentHistory">
                    <?php if ($query_history->have_posts()): ?>
                        <?php while ($query_history->have_posts()):$query_history->the_post() ?>
                            <?php if (have_rows('name_of_colum')):
                                while (have_rows('name_of_colum')) : the_row();
                                    $term = get_sub_field('category')->slug;
                                    if ($term == 'past'):?>
                                        <header>
                                            <i class="fa <?php the_sub_field('icon'); ?> fa-flip-horizontal"></i>
                                            <h3><?php the_sub_field('name'); ?></h3>
                                        </header>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    <?php if ($query_history->have_posts()): ?>
                        <?php while ($query_history->have_posts()):$query_history->the_post() ?>
                            <?php if (has_term('past', 'when')): ?>
                                <div class="history">
                                    <header><?php the_title(); ?></header>
                                    <?php if (have_rows('period')):
                                        while (have_rows('period')) : the_row(); ?>
                                            <p class="year"><?php the_sub_field('from') ?>
                                                - <?php the_sub_field('to') ?></p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <p><?php the_field('info'); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php wp_reset_query(); ?>
                </div>
                <div class="col-xs-12 col-sm-6 rightContentHistory">
                    <?php if ($query_history->have_posts()): ?>
                        <?php while ($query_history->have_posts()):$query_history->the_post() ?>
                            <?php if (have_rows('name_of_colum')):
                                while (have_rows('name_of_colum')) : the_row();
                                    $term = get_sub_field('category')->slug;
                                    if ($term == 'now'):?>
                                        <header>
                                            <h3><?php the_sub_field('name'); ?></h3>
                                            <i class="fa <?php the_sub_field('icon'); ?>"></i>
                                        </header>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>

                    <?php if ($query_history->have_posts()): ?>
                        <?php while ($query_history->have_posts()):$query_history->the_post() ?>
                            <?php if (has_term('now', 'when')): ?>
                                <div class="history">
                                    <header><?php the_title(); ?></header>
                                    <?php if (have_rows('period')):
                                        while (have_rows('period')) : the_row(); ?>
                                            <p class="year"><?php the_sub_field('from') ?>
                                                - <?php the_sub_field('to') ?></p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <p><?php the_field('info'); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </article>
        </div>
    </div>
</section>
