<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */

get_header();

?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

<div class="left-sidebar">

    <div class="line_padding"></div>
    <div class="line_padding"></div>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>

</div>

<div class="left-content"><?php

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


        echo '<div class="line_padding"></div><ul class="blog-slide-class" id="blog-slide-' . $post->ID . '">';


        //////////////
        //GET IMAGES//
        //////////////
        if ($slides != "") {

            foreach ($slides as $num => $slide) {

                $_slider_image = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&w=600">';

                if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {

                    if ($slide['src'] == "embed" && $slide['title'] != "") {

                        echo '<li><iframe src="' . $slide['title'] . '" width="650" height="366" frameborder="0"></iframe></li>';

                    }

                }

                else if ($slide['src'] != '') {

                    if ($slide['link_type'] == "Lightbox") {

                        echo '<li>' . $_slider_image . '</li>';

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
        }

        echo '</ul><div class="circle-nav-class" id="circle-nav-' . $post->ID . '"></div>';

        ?>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#-delfunction-blog-slide-<?php echo $post->ID; ?>').cycle({
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

        <?php } ?>

</div>

<div class="clear"></div>

<!--<div id="portfolio-single-line"></div>-->
<?php endwhile; /* bc_Portfolio_Slider(); */ ?>
<div class="line_padding"></div>


<?php get_footer(); ?>
