<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */

get_header(); ?>

<?php if (get_option("of_homepage") == "true" && is_front_page()) { ?>

<div id="full-page">

    <?php if (get_option('of_homepage_columns') == "1" OR get_option('of_homepage_columns') == "2" OR get_option('of_homepage_columns') == "3" OR get_option('of_homepage_columns') == "4") { ?>

    <?php if (get_option('of_homepage_columns') == "1") { ?>

        <div class="one">

            <?php dynamic_sidebar('homepage-column-1'); ?>

        </div>

        <?php } elseif (get_option('of_homepage_columns') == "2") { ?>

        <div class="one_half">

            <?php dynamic_sidebar('homepage-column-1'); ?>

        </div>

        <div class="one_half last">

            <?php dynamic_sidebar('homepage-column-2'); ?>

        </div>

        <?php } elseif (get_option('of_homepage_columns') == 3) { ?>

        <div class="one_third">

            <?php dynamic_sidebar('homepage-column-1'); ?>

        </div>

        <div class="one_third">

            <?php dynamic_sidebar('homepage-column-2'); ?>

        </div>

        <div class="one_third last">

            <?php dynamic_sidebar('homepage-column-3'); ?>

        </div>

        <?php } elseif (get_option('of_homepage_columns') == 4) { ?>

        <div class="one_fourth">

            <?php dynamic_sidebar('homepage-column-1'); ?>

        </div>

        <div class="one_fourth">

            <?php dynamic_sidebar('homepage-column-2'); ?>

        </div>

        <div class="one_fourth">

            <?php dynamic_sidebar('homepage-column-3'); ?>

        </div>

        <div class="one_fourth last">

            <?php dynamic_sidebar('homepage-column-4'); ?>

        </div>

        <?php } ?>

    <div class="clear"></div>

    <?php
}



    if (get_option('of_homepage_portfolio') == "true") {

        echo '<div class="line-home"></div>';
        bc_Portfolio_Home_Posts();
    }


    if (get_option('of_homepage_content') == "homepage_content_yes") {

//        echo '<div class="line-home"></div>';

        $args = array(
            'pagename' => get_option('of_homepage_content_page'),
            'post_type' => 'page',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'caller_get_posts' => 1
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <?php the_content(); ?>
                <?php
                                      endwhile;
        }
        wp_reset_query();

    } ?>

    <div class="clear"></div>

</div>

<?php } else { ?>

<?php $sidebar_key = "madza_sidebar_type";
    $sidebar = get_post_meta($post->ID, $sidebar_key, true); ?>

<!--TEXT CONTENT -->

<div class="<?php  if ($sidebar == "Right") {
    echo "right-content";
} else if ($sidebar == "Left") {
    echo "left-content";
} else {
    echo of_blog_layout();
    echo "-content";
} ?>">

    <?php get_template_part('loop', 'index'); ?>

</div>

<?php get_sidebar(); ?>

<?php } ?>

<?php get_footer(); ?>
