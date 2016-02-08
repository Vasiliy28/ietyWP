<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */
?>
<section id="<?php echo the_ID(); ?>" class="wrapperOurTeam  <?php echo (the_field('background_post'));  ?> ">
    <div class="container">
        <div class="ourTeam">
            <header class="headerSectionLight">
                <h1><?php the_title(); ?></h1>
            </header>
            <article class="ourTeamContent ">
            <?php
            if (have_rows('team')):?>
                <div class="col-md-6 ourTeamLeft">
                 <?php
                 while (have_rows('team')): the_row();
                     if (get_sub_field('layout_in_post') == "left") :?>
                         <figure >
                             <a href=""><img src="<?php the_sub_field('image') ?>" alt="" class="clearfix"></a>
                             <figcaption class="clearfix">
                                 <h1> <?php the_sub_field('name') ?></h1>
                                 <h4><?php the_sub_field('profession') ?></h4>
                                 <p><?php the_sub_field('info') ?></p>
                             </figcaption>
                         </figure>
                         <?php
                     endif;
                 endwhile;
                 ?>
                </div>
                <div class="col-md-6 ourTeamRight">
                    <?php
                    while (have_rows('team')): the_row();
                        if (get_sub_field('layout_in_post') == "right") :?>
                            <figure >
                                <a href=""><img src="<?php the_sub_field('image') ?>" alt="" class="clearfix"></a>
                                <figcaption class="clearfix">
                                    <h1> <?php the_sub_field('name') ?></h1>
                                    <h4><?php the_sub_field('profession') ?></h4>
                                    <p><?php the_sub_field('info') ?></p>
                                </figcaption>
                            </figure>
                    <?php
                        endif;
                    endwhile;
                    ?>
                </div>
                <?php
            endif;
            ?>
            </article>

        </div>


    </div>
</section>
