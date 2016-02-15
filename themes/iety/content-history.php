<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */


$query_header = new WP_Query(array(
    'post_type' => 'history',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
    'type_post_history' =>'history_header',
    'posts_per_page' =>  1,
));
$query_past = new WP_Query(array(
    'post_type' => 'history',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),
    'when' =>'past',

));
$query_now = new WP_Query(array(
    'post_type' => 'history',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),

    'when' => 'now',
));
$query_name_of_colum = new WP_Query(array(
    'post_type' => 'history',
    'orderby' => array(
        'menu_order' => 'ASC',
    ),

    'type_post_history' =>'history_name_of_colum',
));
?>

<?php if ($query_header->have_posts()): ?>
<?php while ($query_header->have_posts()):$query_header->the_post() ?>
<section id="<?php echo the_ID(); ?>" class="wrapperOurHistory <?php echo(the_field('background_post')); ?> twentytwenty-container ">
    <div class="twentytwentyLeft"></div>
    <div class="twentytwentyRight"></div>
    <div class="container ">
        <div class="ourHistory ">
            <header class="headerSectionLight">
                <h1><?php the_field('name_section') ?></h1>
            </header>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query();?>
            <article class="ourHistoryContent clearfix ">
                <div class="col-xs-6 col-md-6 leftContentHistory">
                    <?php if ($query_name_of_colum ->have_posts()): ?>
                    <?php while ($query_name_of_colum->have_posts()):$query_name_of_colum->the_post() ?>
                            <?php if (have_rows('name_of_colum')):
                                while (have_rows('name_of_colum')) : the_row();
                                    $term =get_sub_field('category')->slug;
                                    if($term=='past'):?>
                                        <header>
                                            <i class="fa <?php the_sub_field('icon'); ?> fa-flip-horizontal"></i>
                                            <h3><?php the_sub_field('name'); ?></h3>
                                        </header>
                                    <?php endif;?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query();?>
                    <?php if ($query_past ->have_posts()): ?>
                        <?php while ($query_past->have_posts()):$query_past->the_post() ?>
                                <div class="history">
                                    <header><?php the_title(); ?></header>
                                    <?php if (have_rows('period')):
                                        while (have_rows('period')) : the_row(); ?>
                                            <p class="year"><?php the_sub_field('from') ?> - <?php the_sub_field('to') ?></p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <p><?php the_field('info'); ?></p>
                                </div>

                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php wp_reset_query();?>
                </div>
                <div class="col-xs-6 rightContentHistory">
                    <?php if ($query_name_of_colum ->have_posts()): ?>
                        <?php while ($query_name_of_colum->have_posts()):$query_name_of_colum->the_post() ?>
                            <?php if (have_rows('name_of_colum')):
                                while (have_rows('name_of_colum')) : the_row();
                                    $term =get_sub_field('category')->slug;
                                    if($term=='now'):?>
                                        <header>
                                            <h3><?php the_sub_field('name'); ?></h3>
                                            <i class="fa <?php the_sub_field('icon'); ?>"></i>

                                        </header>
                                    <?php endif;?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query();?>

                    <?php if ($query_now->have_posts()): ?>
                        <?php while ($query_now->have_posts()):$query_now->the_post() ?>
                                <div class="history">
                                    <header><?php the_title(); ?></header>
                                    <?php if (have_rows('period')):
                                        while (have_rows('period')) : the_row(); ?>
                                            <p class="year"><?php the_sub_field('from') ?> - <?php the_sub_field('to') ?></p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <p><?php the_field('info'); ?></p>
                                </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php wp_reset_query();?>
                </div>
            </article>
        </div>
    </div>
</section>








<!--<section id="<?php echo the_ID(); ?>"
             class="wrapperOurHistory <?php echo(the_field('background_post')); ?> twentytwenty-container ">

        <div class="twentytwentyLeft">

        </div>
        <div class="twentytwentyRight">

        </div>
        <div class="container ">
            <div class="ourHistory ">
                <header class="headerSectionLight">
                    <h1><?php the_field('header_post'); ?></h1>
                </header>
                <article class="ourHistoryContent clearfix ">
                    <?php if (have_rows('history_profile')): ?>
                        <div class="col-xs-6 col-md-6 leftContentHistory">
                            <?php if (have_rows('name_left_col')):
    while (have_rows('name_left_col')) : the_row(); ?>
                                    <header>
                                        <i class="fa <?php the_sub_field('icon_col'); ?> fa-flip-horizontal"></i>
                                        <h3><?php the_sub_field('name_col'); ?></h3>
                                    </header>
                                <?php endwhile;
endif;
    while (have_rows('history_profile')) : the_row();
        if (get_sub_field('layout_in_post') == "left") : ?>
                                    <div class="history">
                                        <header><?php the_sub_field('specialty'); ?></header>
                                        <p class="year"><?php the_sub_field('period'); ?></p>
                                        <p><?php the_sub_field('about'); ?></p>
                                    </div>
                                <?php endif;

    endwhile; ?>
                        </div>
                        <div class="col-xs-6 rightContentHistory">
                            <?php if (have_rows('name_right_col')):
        while (have_rows('name_right_col')) : the_row(); ?>
                                    <header>
                                        <h3><?php the_sub_field('name_col'); ?></h3>
                                        <i class="fa <?php the_sub_field('icon_col'); ?> "></i>
                                    </header>
                                <?php endwhile;
    endif;
    while (have_rows('history_profile')) : the_row();
        if (get_sub_field('layout_in_post') == "right") : ?>
                                    <div class="history">
                                        <header><?php the_sub_field('specialty'); ?></header>
                                        <p class="year"><?php the_sub_field('period'); ?></p>
                                        <p><?php the_sub_field('about'); ?></p>
                                    </div>
                                <?php endif;

    endwhile; ?>
                        </div>
                    <?php endif; ?>
                </article>
            </div>
        </div>
    </section>-->
