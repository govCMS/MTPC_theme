<?php
/*
Template Name: Portfolio Small Images
*/

get_header(); ?>

<div id="full-page-portfolio">

    <?php function portfolio__function()
{ ?>

    <ul id="applications" class="image-grid"> <?php

        global $post;
        $categorys = get_post_meta($post->ID, "madza_portfolio_cat", true);

        if ($categorys == "Select..." OR $categorys == "All") {

            $args = array(
                'post_type' => 'portfolio',
                'order' => 'ASC',
                'posts_per_page' => 999,
                'orderby' => 'date',
                'order' => 'DSC',
            );


        } else {

            $args = array(
                'post_type' => 'portfolio',
                'tax_query' => array(array('taxonomy' => 'portfolio_taxonomy', 'field' => 'slug', 'terms' => $categorys)),
                'order' => 'ASC',
                'posts_per_page' => 999,
                'orderby' => 'date',
                'order' => 'DSC',
            );

        }
        query_posts($args);

        while (have_posts()) : the_post();

            ////////////////////
            //GET INFO FROM ID//
            ////////////////////
                               global $post;
                               $term_obj = wp_get_object_terms($post->id, 'portfolio_taxonomy');
                               $portfolio_title = $post->post_title;
                               $portfolio_taxonomy = get_the_term_list($post->ID, 'portfolio_taxonomy', '', ' ', '');
                               $portfolio_taxonomy_format = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_taxonomy);
                               $terms_as_text = strip_tags(get_the_term_list($wp_query->post->ID, 'portfolio_taxonomy', '', ' ', ''));
                               $portfolio_title = $post->post_title;
                               $get_text = get_post_meta($post->ID, "madza_portfolio_hover_text", true);
                               $slides = get_post_meta($post->ID, 'slides', true);


            ///////////////////////
            //START EXPORT FRAMES//
            ///////////////////////
                               if ($slides != "") {
                                   ?>

                                   <li class="<?php echo $terms_as_text; ?> portfolio-small-images sorting">

                                       <ul class="portfolio-sliders"> <?php


                                           //////////////
                                           //GET IMAGES//
                                           //////////////
                                           if ($slides != "") {

                                               foreach ($slides as $num => $slide) {

                                                   $_slider_image = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=250&w=320" width="320" height="250">';

                                                   if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {
                                                   }

                                                   else if ($slide['src'] != '') {

                                                       if ($slide['link_type'] == "Lightbox") {

                                                           echo '<li><a class="portfolio-hover-lightbox opacity-portfolio" rel="prettyPhoto[' . $portfolio_title . ']" alt="' . $slide['title'] . '" title="' . $slide['caption'] . '" href="' . $slide['src'] . '"></a>' . $_slider_image . '<div class="caption"><h2>' . $portfolio_title . '</h2></div></li>';

                                                       }
                                                       if ($slide['link_type'] == "Link manually") {

                                                           echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . $slide['url_manual'] . '"></a>' . $_slider_image . '<div class="caption"><h2>' . $portfolio_title . '</h2></div></li>';

                                                       }
                                                       if ($slide['link_type'] == "Link to Category") {

                                                           echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_category_link(get_cat_ID($slide['url_cat'])) . '"></a>' . $_slider_image . '<div class="caption"><h2>' . $portfolio_title . '</h2></div></li>';

                                                       }
                                                       if ($slide['link_type'] == "Link to Page") {

                                                           echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_required_page($slide['url_page']) . '"></a>' . $_slider_image . '<div class="caption"><h2>' . $portfolio_title . '</h2></div></li>';

                                                       }
                                                       if ($slide['link_type'] == "Link to this Post") {

                                                           echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_permalink() . '"></a>' . $_slider_image . '<div class="caption"><h2>' . $portfolio_title . '</h2></div></li>';

                                                       }
                                                       if ($slide['link_type'] == "Select...") {

                                                           echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_permalink() . '"></a>' . $_slider_image . '<div class="caption"><h2>' . $portfolio_title . '</h2></div></li>';

                                                       }
                                                       if ($slide['link_type'] == "No link") {

                                                           echo '<li>' . $_slider_image . '<div class="caption"><h2>' . $portfolio_title . '</h2></div></li>';

                                                       }

                                                   }
                                               }
                                           } ?>
                                       </ul>

                                   </li><!--END li --> <?php

                               }

        endwhile; wp_reset_query(); ?>

    </ul><!--END ul -->
    <div class="clear"></div>

    <?php } ?>

    <?php portfolio__function(); ?>

</div><!--END portfolio column -->



<?php get_footer(); ?>