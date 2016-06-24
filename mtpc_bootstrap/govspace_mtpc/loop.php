<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */
$post_in_page = get_option("of_posts_in_page");
?>

<?php if (!have_posts()) : ?>
<div id="post-0" class="post error404 not-found">
    <h1 class="entry-title"><?php _e('Not Found', "madza_translate"); ?></h1>

    <div class="entry_content">
        <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', "madza_translate"); ?></p>

    </div>
    <!-- entry_content END -->
</div><!-- posts END -->
<?php endif; ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

    ?>
<div class="post-line-after">

    <?php


    ////////////////////
    //GET INFO FROM ID//
    ////////////////////
    global $post, $more;
    $more = 0;
    $blog_post_text_type = get_post_meta($post->ID, "madza_post_blog_text_type", true);
    $blog_post_image_type = get_post_meta($post->ID, "madza_post_blog_thumb_size", true);
    $slides = get_post_meta($post->ID, 'slides', true);



    if ($blog_post_image_type != "Small image") {
        ?>

    <!-- TITLE -->
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>"
                               title="<?php printf(esc_attr__('Permalink to %s', "madza_translate"), the_title_attribute('echo=0')); ?>"
                               rel="bookmark"><?php the_title(); ?></a></h1>

    <!-- META -->
    <div class="entry-meta<?php if (($slides != "" OR has_post_thumbnail()) && ($blog_post_image_type == "Small image")) {
        echo "-small-image";
    }?>">

        <?php if (count(get_the_category())) : ?>

        <div class="cat-links"><?php _e('Date: ', "madza_translate"); ?> <?php the_time('F jS, Y') ?>
            | <?php _e('Categories: ', "madza_translate"); ?>

            <?php printf(__('%2$s'), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list(', ')); ?>

            <?php echo " | "; ?>

            <?php _e('By: ', "madza_translate"); the_author_posts_link(); ?>

            <?php the_tags(" | Tags: ", ', '); ?>

            <?php echo " | "; ?>

            <?php comments_popup_link(__(' Comments: 0', "madza_translate"), __(' Comment: 1', "madza_translate"), __(' Comments: %', "madza_translate"), '0', '0'); ?>

        </div>

        <?php endif; ?>

    </div><!-- END META -->

        <?php
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //BLOG POST IMAGE//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ($blog_post_image_type != "Not image") {

        //OLD THUMB
        if ($slides == "" && has_post_thumbnail()) {
            ?>

        <div class="bee-blog-full-image">

            <a href="<?php the_permalink(); ?>"
               title="<?php printf(esc_attr__('Permalink to %s', "madza_translate"), the_title_attribute('echo=0')); ?>"
               rel="bookmark"><?php the_post_thumbnail(); ?></a>

        </div>
        <div class="post-old-thumb-bug"></div><?php

        }
        //END OLD THUMB


        //NEW THUMB
        if ($slides != "") {

            echo '<div class="bee-blog-';

            if ($blog_post_image_type == "Small image") {

                echo 'small-image';

            } else {

                echo 'full-image';

            }

            echo '"><ul class="blog-slide-class" id="blog-slide-' . $post->ID . '">';


            foreach ($slides as $num => $slide) {

                ///////////////
                //VIDEO EMBED//
                ///////////////
                if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {

                    if ($slide['src'] == "embed" && $slide['title'] != "") {

                        if ($blog_post_image_type == "Small image") {

                            echo '<li><iframe src="' . $slide['title'] . '" width="220" height="150" frameborder="0"></iframe></li>';

                        } else {

                            echo '<li><iframe src="' . $slide['title'] . '" width="600" height="356" frameborder="0"></iframe></li>';

                        }

                    }


                } //END VIDEO EMBED

                    //////////
                    //IMAGES//
                    //////////
                else if ($slide['src'] != '') {

                    if ($blog_post_image_type == "Small image") {

                        $_slider_image = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=230&w=220" width="220" height="230">';

                    } else {

                        $_slider_image = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=200&w=600" width="600" height="200">';

                    }

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

                        echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_permalink() . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "Select...") {

                        echo '<li><a class="portfolio-hover-link opacity-portfolio" href="' . get_permalink() . '"></a>' . $_slider_image . '</li>';

                    }
                    if ($slide['link_type'] == "No link") {

                        echo '<li>' . $_slider_image . '</li>';

                    }

                }
                //END IMAGES

            }
            //END FORECH

            echo '</ul><div class="circle-nav-class" id="circle-nav-' . $post->ID . '"></div></div>';

        }
        //END NEW THUMB

    }//END ALL THUMB

    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //BLOG POST IMAGE//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ($blog_post_image_type == "Small image") {
        ?>

    <!-- TITLE -->
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>"
                               title="<?php printf(esc_attr__('Permalink to %s', "madza_translate"), the_title_attribute('echo=0')); ?>"
                               rel="bookmark"><?php the_title(); ?></a></h1>

    <!-- META -->
    <div class="entry-meta<?php if (($slides != "" OR has_post_thumbnail()) && ($blog_post_image_type == "Small image")) {
        echo "-small-image";
    }?>">

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

    </div><!-- END META -->

        <?php } ?>

<!-- CONTENT -->
<div class="entry-content">

    <?php if ($blog_post_text_type == "Full text") {

    the_content('<div class="more-diva-2">' . __('Read More', "madza_translate") . '</div>');

} else if ($blog_post_text_type == "No text") {

} else {

    the_excerpt();

}?>

</div>
<!-- END CONTENT -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#blog-slide-<?php echo $post->ID; ?>').cycle({
            fx:         'fade',
            speed:       300,
            pager:      '#circle-nav-<?php echo $post->ID ?>',
            timeout:     0,
            before: onBefore,
            after: onAfter,
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

<div class="clear"></div>
</div><!--END LINE FRAME -->



<?php endwhile; else: ?>

<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php if (function_exists('wp_pagenavi')) {
    wp_pagenavi();
} ?>

<?php wp_reset_query(); ?>