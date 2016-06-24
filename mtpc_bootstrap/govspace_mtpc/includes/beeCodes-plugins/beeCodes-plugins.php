<?php
function bc_Portfolio_Slider()
{


    global $post;
    $myposts = get_posts('post_type=portfolio&order=DESC&posts_per_page=999');
    foreach ($myposts as $post) {
        setup_postdata($post);
        $ignore[] = $post->ID;
        $portfolio_title = $post->post_title;
        $permalink = get_permalink();

        ////////////////////
        //GET INFO FROM ID//
        ////////////////////
        global $post;
        $slides = get_post_meta($post->ID, 'slides', true);


        ///////////////////////
        //START EXPORT FRAMES//
        ///////////////////////
        if ($slides != "") {
            ?>
        <?php


            //////////////
            //GET IMAGES//
            //////////////
            if ($slides != "") {

                foreach ($slides as $num => $slide) {

                    $_slider_image = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=300&w=300" width="300" height="300">';

                    if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {
                    }

                    else if ($slide['src'] != '') {

                        if ($slide['link_type'] == "Lightbox") {

                            $_slider_images .= '<div class="opacity-start"><a class="portfolio-hover-lightbox opacity-portfolio-slider" rel="prettyPhoto" alt="' . $slide['title'] . '" title="' . $slide['caption'] . '" href="' . $slide['src'] . '"></a><div class="caption-portfolio-slide"><h2>' . $portfolio_title . '</h2></div>' . $_slider_image . '</div>';

                        }
                        if ($slide['link_type'] == "Link manually") {

                            $_slider_images .= '<div class="opacity-start"><a class="portfolio-hover-link opacity-portfolio-slider" href="' . $slide['url_manual'] . '"></a><div class="caption-portfolio-slide"><h2>' . $portfolio_title . '</h2></div>' . $_slider_image . '</div>';

                        }
                        if ($slide['link_type'] == "Link to Category") {

                            $_slider_images .= '<div class="opacity-start"><a class="portfolio-hover-link opacity-portfolio-slider" href="' . get_category_link(get_cat_ID($slide['url_cat'])) . '"></a><div class="caption-portfolio-slide"><h2>' . $portfolio_title . '</h2></div>' . $_slider_image . '</div>';

                        }
                        if ($slide['link_type'] == "Link to Page") {

                            $_slider_images .= '<div class="opacity-start"><a class="portfolio-hover-link opacity-portfolio-slider" href="' . get_required_page($slide['url_page']) . '"></a><div class="caption-portfolio-slide"><h2>' . $portfolio_title . '</h2></div>' . $_slider_image . '</div>';

                        }
                        if ($slide['link_type'] == "Link to this Post") {

                            $_slider_images .= '<div class="opacity-start"><a class="portfolio-hover-link opacity-portfolio-slider" href="' . get_permalink() . '"></a><div class="caption-portfolio-slide"><h2>' . $portfolio_title . '</h2></div>' . $_slider_image . '</div>';

                        }
                        if ($slide['link_type'] == "Select...") {

                            $_slider_images .= '<div class="opacity-start"><a class="portfolio-hover-link opacity-portfolio-slider" href="' . get_permalink() . '"></a><div class="caption-portfolio-slide"><h2>' . $portfolio_title . '</h2></div>' . $_slider_image . '</div>';

                        }
                        if ($slide['link_type'] == "No link") {

                            $_slider_images .= '<div class="opacity-start"><div class="caption-portfolio-slide"><h2>' . $portfolio_title . '</h2></div>' . $_slider_image . '</div>';

                        }

                    }
                }
            } ?>
        <?php

        }

        if (!(empty($portfolio_image))) {

            $_portfolio_photo .= '<a title="' . $portfolio_title . '" href="' . $permalink . '">' . $_slider_images . '</a>';
        }
    } ?>

<script type="text/javascript">

    jQuery(document).ready(function() {

        $('.opacity-portfolio-slider, .caption-portfolio-slide').fadeOut();
        $(' .opacity-start').hover(

                function() {
                    $(this).children('.opacity-portfolio-slider').fadeIn();
                    $(this).children(' .caption-portfolio-slide').fadeIn();

                },

                function() {
                    $(this).children('.opacity-portfolio-slider').fadeOut();
                    $(this).children(' .caption-portfolio-slide').fadeOut();
                }

        );
    });

    $(document).ready(function() {

        $('.portfolio-shortcode-homepage-left').click(function() {


            $('.portfolio-shortcode-1, .portfolio-shortcode-2, .portfolio-shortcode-3, .portfolio-shortcode-4').cycle('next')


                    ;
            return false;
        });


        $('.portfolio-shortcode-homepage-right').click(function() {


            $('.portfolio-shortcode-1, .portfolio-shortcode-2, .portfolio-shortcode-3, .portfolio-shortcode-4').cycle('prev')


                    ;
            return false;
        });


    });
    $(document).ready(function() {


        $('.portfolio-shortcode-homepage-left').fadeOut();
        $('.portfolio-shortcode-homepage-right').fadeOut();

        $('.portfolio-div-1').hover(

                function() {

                    $('.portfolio-shortcode-homepage-left').fadeIn();
                },

                function() {

                    $('.portfolio-hover-link').fadeOut();
                    $('.portfolio-hover-lightbox').fadeOut();
                    $('.portfolio-shortcode-homepage-left').fadeOut();
                }

        );


        $('.portfolio-shortcode-homepage-left').hover(

                function() {

                    $('.portfolio-shortcode-homepage-left').fadeIn();
                },

                function() {

                    $('.portfolio-shortcode-homepage-left').fadeOut();
                }

        );

        $('.portfolio-shortcode-homepage-right').hover(

                function() {

                    $('.portfolio-shortcode-homepage-right').fadeIn();
                },

                function() {

                    $('.portfolio-shortcode-homepage-right').fadeOut();
                }

        );

        $('.portfolio-div-2').hover(
                function() {
                },

                function() {
                    $('.portfolio-hover-link').fadeOut();
                    $('.portfolio-hover-lightbox').fadeOut();
                }

        );

        $('.portfolio-div-3').hover(

                function() {
                },

                function() {

                    $('.portfolio-hover-link').fadeOut();
                    $('.portfolio-hover-lightbox').fadeOut();

                }

        );

        $('.portfolio-div-4').hover(

                function() {

                    $('.portfolio-shortcode-homepage-right').fadeIn();

                },

                function() {

                    $('.portfolio-hover-link').fadeOut();
                    $('.portfolio-hover-lightbox').fadeOut();
                    $('.portfolio-shortcode-homepage-right').fadeOut();

                }

        );
    });

    $(document).ready(function() {

        $('.portfolio-shortcode-1').cycle({
            fx: 'scrollHorz',
            startingSlide: 1,
            easeIn:  'easeOutQuad',
            easeOut: 'easeOutQuad',
            speed: 2000,
            fastOnEvent: 1000,
            pause: false
        });
    });

    $(document).ready(function() {

        $('.portfolio-shortcode-2').cycle({
            fx: 'scrollHorz',
            delay: 300,
            easeIn:  'easeOutQuad',
            easeOut: 'easeOutQuad',
            startingSlide: 2,
            speed: 2000,
            fastOnEvent: 1000,
            pause: false
        });
    });

    $(document).ready(function() {

        $('.portfolio-shortcode-3').cycle({
            fx: 'scrollHorz',
            delay: 600,
            easeIn:  'easeOutQuad',
            easeOut: 'easeOutQuad',
            startingSlide: 3,
            speed: 2000,
            fastOnEvent: 1000,
            pause: false
        });

    });

    $(document).ready(function() {

        $('.portfolio-shortcode-4').cycle({
            fx: 'scrollHorz',
            delay: 900,
            easeIn:  'easeOutQuad',
            easeOut: 'easeOutQuad',
            startingSlide: 4,
            speed: 2000,
            fastOnEvent: 1000,
            pause: false
        });
    });
</script>

<div class="portfolio-shortcode-homepage">
    <div class="portfolio-shortcode-homepage-left"></div>
    <div class="portfolio-div-1">

        <div class="portfolio-shortcode-1">
            <?php echo $_slider_images ?>
        </div>


    </div>

    <div class="portfolio-div-2">

        <div class="portfolio-shortcode-2">
            <?php echo $_slider_images ?>
        </div>


    </div>

    <div class="portfolio-div-3">

        <div class="portfolio-shortcode-3">
            <?php echo $_slider_images ?>
        </div>


    </div>

    <div class="portfolio-div-4">

        <div class="portfolio-shortcode-4">
            <?php echo $_slider_images ?>
        </div>


    </div>
    <div class="portfolio-shortcode-homepage-right"></div>
    <div class="clear"></div>
</div><!-- END portfolio div -->
<?php
}

add_action('bc_Portfolio_Slider', 'bc_Portfolio_Slider');


function bc_Blog_Home_Posts()
{

    echo '<ul class="home-page-posts-portfolio"><li>';
    echo '<h2>Recent Projects</h2>';
    echo '<p>Donec sed odio dui. Nulla vitae elit libero, a phar augue. Nullam id dolor id nibh. Donec sed odio.</p>';
    echo '<a class="read-more-link" href="#" target="_self">Read more</a>';
    echo '</li>';

    global $post;
    $myposts = get_posts('post_type=post&order=DESC&posts_per_page=3');
    foreach ($myposts as $post) {
        setup_postdata($post);
        $ignore[] = $post->ID;
        $portfolio_title = $post->post_title;
        $permalink = get_permalink();

        $text = get_the_content();

        ////////////////////
        //GET INFO FROM ID//
        ////////////////////
        global $post;
        $slides = get_post_meta($post->ID, 'slides', true);


        //NEW THUMB
        if ($slides != "") {
            echo '<li>';
            foreach ($slides as $num => $slide) {

                ///////////////
                //VIDEO EMBED//
                ///////////////
                if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {
                } //END VIDEO EMBED

                    //////////
                    //IMAGES//
                    //////////
                else if ($slide['src'] != '') {

                    $slide_show = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=100&w=212.5" width="212.5" height="100">';

                }


            }
            //END FORECH

            echo $slide_show;

            echo '<div class="home-page-post-portfolio-link"><a href="#"><strong>' . $portfolio_title . '</strong></a> <p>' . substr($text, 0, 33) . '  ...</p> </div>';

            echo '</li>';
        }
        //END NEW THUMB


    }
    //END POST

    echo "</ul><div class='clear'></div>";

}

add_action('bc_Blog_Home_Posts', 'bc_Blog_Home_Posts');


function bc_Portfolio_Home_Posts()
{

    echo '<ul class="home-page-posts-portfolio"><li>';
    echo '<h2>' . get_option("of_homepage_portfolio_title") . '</h2>';
    echo '<p>' . get_option("of_homepage_portfolio_description") . '</p>';

    if (get_option("of_homepage_portfolio_button") != null) {
        echo '<a class="read-more-link" href="' . get_option("of_homepage_portfolio_button_link") . '" target="_self">' . get_option("of_homepage_portfolio_button") . '</a>';
    }
    echo '</li>';

    global $post;
    $myposts = get_posts('post_type=portfolio&order=DESC&posts_per_page=3');
    foreach ($myposts as $post) {
        setup_postdata($post);
        $ignore[] = $post->ID;
        $portfolio_title = $post->post_title;
        $permalink = get_permalink();

        $text = get_the_content();

        ////////////////////
        //GET INFO FROM ID//
        ////////////////////
        global $post;
        $slides = get_post_meta($post->ID, 'slides', true);


        //NEW THUMB
        if ($slides != "") {
            echo '<li>';
            foreach ($slides as $num => $slide) {

                ///////////////
                //VIDEO EMBED//
                ///////////////
                if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {
                } //END VIDEO EMBED

                    //////////
                    //IMAGES//
                    //////////
                else if ($slide['src'] != '') {

                    $slide_show = '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&amp;h=150&amp;w=200" width="200" height="150">';

                }


            }
            //END FORECH

            echo $slide_show;

            echo '<div class="home-page-post-portfolio-link"><a href="' . $permalink . '">' . $portfolio_title . '</a> <p>' . substr($text, 0, 73) . ' ...</p> </div>';

            echo '</li>';
        }
        //END NEW THUMB


    }
    //END POST

    wp_reset_query();

    echo '</ul><div class="clear"></div>';

}

add_action('bc_Portfolio_Home_Posts', 'bc_Portfolio_Home_Posts');
?>