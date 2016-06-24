<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */

get_header();

$slides = get_post_meta($post->ID, 'slides', true);
$sidebar = get_post_meta($post->ID, "madza_sidebar_type", true);
$single_thumb = get_post_meta($post->ID, "madza_post_single_thumb_size", true);
$single_autoplay = get_post_meta($post->ID, "madza_post_single_thumb_autoplay", true);


if (have_posts()) while (have_posts()) : the_post();


    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //BIG THUMB FRAME//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($single_thumb == "Big image" && (get_option("of_single_featured_image") == "true")) {


        //OLD THUMB
        if ($slides == "") {

            the_post_thumbnail('header_image');

        }


        //NEW THUMBS
        if ($slides != "") {

            echo '<div class="bee-big-slider"><ul class="blog-slide-class" id="blog-slide-' . $post->ID . '">';

            foreach ($slides as $num => $slide) {

                if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {

                    if ($slide['src'] == "embed" && $slide['title'] != "") {

                        echo '<li><iframe src="' . $slide['title'] . '" width="960" height="540" frameborder="0"></iframe></li>';

                    }


                }

                else if ($slide['src'] != '') {

                    $_slider_image = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=300 &w=960" width="960" height="300" >';

                    if ($slide['link_type'] == "Lightbox") {

                        echo '<li><a class="portfolio-hover-lightbox opacity-portfolio" rel="prettyPhoto[' . $post->ID . ']" alt="' . $slide['title'] . '" title="' . $slide['caption'] . '" href="' . $slide['src'] . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link manually") {

                        echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . $slide['url_manual'] . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to Category") {

                        echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_category_link(get_cat_ID($slide['url_cat'])) . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to Page") {

                        echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_required_page($slide['url_page']) . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to this Post") {

                        echo '<li>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Select...") {

                        echo '<li>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "No link") {

                        echo '<li>' . $_slider_image . '</li>';

                    }

                }
            }
            echo '</ul><div class="clear"></div><div class="circle-nav-class single-big-img" id="circle-nav-' . $post->ID . '"></div></div>';


        }

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //END BIG THUMB FRAME//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////


    ?>

<!--TEXT CONTENT -->
<div class="<?php  if ($sidebar == "Right") {
    echo "right-content";
} else if ($sidebar == "Left") {
    echo "left-content";
} else {
    echo of_single_layout();
    echo "-content";
} ?>">

<h1><?php the_title(); ?></h1>


    <?php

    if ($slides != "") {
        foreach ($slides as $num => $slide) {

            if ($slide['src'] != '') {
                $slides2 = "true";
            }

        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //MIDDLE THUMB FRAME//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    if (($single_thumb == "Middle image" or $single_thumb == "Select...") && ($slides2 == "true" or has_post_thumbnail()) && (get_option("of_single_featured_image") == "true")) {

        //OLD THUMB
        if ($slides == "") {

            the_post_thumbnail();

        }


        //NEW THUMBS
        if ($slides != "") {

            echo '<div class="bee-middle-slider"><ul class="blog-slide-class" id="blog-slide-' . $post->ID . '">';

            foreach ($slides as $num => $slide) {


                if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {

                    if ($slide['src'] == "embed" && $slide['title'] != "") {

                        echo '<li><iframe src="' . $slide['title'] . '" width="610" height="356" frameborder="0"></iframe></li>';

                    }


                }

                else if ($slide['src'] != '') {

                    $_slider_image = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=200&w=610" width="610" height="200">';

                    if ($slide['link_type'] == "Lightbox") {

                        echo '<li><a class="portfolio-hover-lightbox opacity-portfolio" rel="prettyPhoto[' . $post->ID . ']" alt="' . $slide['title'] . '" title="' . $slide['caption'] . '" href="' . $slide['src'] . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link manually") {

                        echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . $slide['url_manual'] . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to Category") {

                        echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_category_link(get_cat_ID($slide['url_cat'])) . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to Page") {

                        echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_required_page($slide['url_page']) . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to this Post") {

                        echo '<li>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Select...") {

                        echo '<li>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "No link") {

                        echo '<li>' . $_slider_image . '</li>';

                    }

                }
            }
            echo '</ul><div class="circle-nav-class" id="circle-nav-' . $post->ID . '"></div></div>';


        }

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //END MIDDLE THUMB FRAME//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////


    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //SMALL THUMB FRAME//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($single_thumb == "Small image" && (get_option("of_single_featured_image") == "true")) {


        //OLD THUMB
        if ($slides == "") {

            the_post_thumbnail();

        }


        //NEW THUMBS
        if ($slides != "") {

            echo '<div class="bee-small-slider"><ul class="blog-slide-class" id="blog-slide-' . $post->ID . '">';

            foreach ($slides as $num => $slide) {


                if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {

                    if ($slide['src'] == "embed" && $slide['title'] != "") {

                        echo '<li><div class="slider-top-space"></div><iframe src="' . $slide['title'] . '" width="300" height="200" frameborder="0"></iframe></li>';

                    }


                }

                else if ($slide['src'] != '') {

                    $_slider_image = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=300&w=300" width="300" height="300">';

                    if ($slide['link_type'] == "Lightbox") {

                        echo '<li><div class="slider-top-space"></div><a class="portfolio-hover-lightbox opacity-portfolio" rel="prettyPhoto[' . $post->ID . ']" alt="' . $slide['title'] . '" title="' . $slide['caption'] . '" href="' . $slide['src'] . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link manually") {

                        echo '<li><div class="slider-top-space"></div><a class="portfolio-hover-link opacity-portfolio" href="' . $slide['url_manual'] . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to Category") {

                        echo '<li><div class="slider-top-space"></div><a class="portfolio-hover-link opacity-portfolio" href="' . get_category_link(get_cat_ID($slide['url_cat'])) . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to Page") {

                        echo '<li><div class="slider-top-space"></div><a class="portfolio-hover-link opacity-portfolio" href="' . get_required_page($slide['url_page']) . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Link to this Post") {

                        echo '<li><div class="slider-top-space"></div>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Select...") {

                        echo '<li><div class="slider-top-space"></div>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "No link") {

                        echo '<li><div class="slider-top-space"></div>' . $_slider_image . '</li>';

                    }

                }
            }
            echo '</ul><div class="circle-nav-class" id="circle-nav-' . $post->ID . '"></div></div>';


        }

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //END SMALL THUMB FRAME//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////


    ?>

<div class="entry-content">

    <?php the_content(); ?>

    <div class="single-meta-frame">

        <?php if (count(get_the_category())) : ?>

        <?php _e('Date: ', "madza_translate"); ?> <?php the_time('F jS, Y') ?>
        | <?php _e('Categories: ', "madza_translate"); ?>

        <?php printf(__('%2$s'), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list(', ')); ?>

        <?php echo " | "; ?>

        <?php _e('By: ', "madza_translate");
        the_author_posts_link(); ?>

        <?php the_tags(" | Tags: ", ', '); ?>

        <?php echo " | "; ?>

        <?php comments_popup_link(__(' Comments: 0', "madza_translate"), __(' Comment: 1', "madza_translate"), __(' Comments: %', "madza_translate"), '0', '0'); ?>

        <?php endif; ?>

    </div>
</div><!-- .entry_content -->

<div class="clear"></div>
    <?php if (!dynamic_sidebar('text-widget-area')) : ?>

        <?php endif; // end text widget area ?>



    <?php

    if (get_option("of_about_author") == "true") {

        if (get_the_author_meta('description')) : // If a user has filled out their description, show a bio on their entries
            ?>



        <div id="entry_author_info">

            <div id="author_avatar">

                <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('Gooseo_author_bio_avatar_size', 40)); ?>

            </div>
            <!-- #euthor_avatar -->

            <div id="author_description">

                <h4><?php printf(esc_attr__('%s', 'Gooseo'), get_the_author()); ?></h4>

                <p><?php the_author_meta('description'); ?></p>

            </div>
            <!-- #author_description -->

            <div class="clear"></div>

        </div><!-- #entry_author_info -->

            <?php endif;
    } ?>
<div class="line-single"></div>
<div class="clear"></div>


<div class="clear"></div>

<div id="comments_frame">

    <?php comments_template('', true); ?>

</div>

    <?php endwhile; // end of the loop. ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#blog-slide-<?php echo $post->ID; ?>').cycle({
            fx:         'fade',
            speed:       300,
            pager:      '#circle-nav-<?php echo $post->ID ?>',
        <?php if ($single_autoplay == "Yes") {
        } else {
            echo "timeout: 0, ";
        } ?>
            before: onBefore,
            after: onAfter,
            pause: true,
            sync: true
        });
        function onAfter(curr, next, opts, fwd) {
            var $ht = $(this).height();

            $(this).parent().animate({height: $ht});
        }

        ;
        function onBefore(curr, next, opts, fwd) {
            var $ht = $(this).height();

            $(this).parent().animate({height: $ht});
        }

        ;
    });
</script>

</div><!--END TEXT CONTENT -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
