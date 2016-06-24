<?php
/**
 * @author m.bitenieks
 * @copyright 2011
 */

?>

<?php



global $post;

$portfolio_shortcode = '';

$myposts = get_posts('post_type=slides_options&order=ASC&posts_per_page=999');


foreach ($myposts as $post) {

    setup_postdata($post);

    $ignore[] = $post->ID;

    $portfolio_title = $post->post_title;

    $permalink = get_permalink();

    $title = get_the_title();


    $image_id = get_post_thumbnail_id();

    $image_url = wp_get_attachment_image_src($image_id, 'large');

    $image_url = $image_url[0];


    $portfolio_slug = basename(get_permalink());


    $conents = get_post_custom($post->ID);

    $show_contents = $conents["_slide_title"][0];


    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'beecodes-slider-big');

    $portfolio_image = get_the_post_thumbnail($post->ID, 'beecodes-slider-small');

    $url = get_post_custom($post->ID);

    $link = $url["_slide_link"][0];


    if (!(empty($portfolio_image))) {


        $_slide_photo .= '' .

                         $portfolio_image . '';

        $_portfolio_title .= '';


    }


    $_slider_title .= '<div class="beeCodes-title">';


    if ($link != "") {

        $_slider_title .= '<a class="link-hide" alt="' . $slide['title'] . '" title="' . $slide['caption'] . '" href="' . $link . '"></a>';

    }


    if ($show_contents != "No") {

        $_slider_title .= '<h1>' . $title . '</h1>';

        if (get_the_content() != "") {

            $_slider_title .= '<div class="beeCodes-content">' . get_the_content() . '</div>';

        }

    }

    $_slider_title .= '</div>';


    $_slider_image .= '<img src="' . $thumbnail[0] . '" width="' . $thumbnail[1] . '" height="' . $thumbnail[2] . '">';


}

wp_reset_query();?>

<script type="text/javascript">

$(document).ready(function() {

    $('.beeCodes-frame-hover-1').click(function() {


        $('.beeCodes-slide-1, .beeCodes-slide-3, .beeCodes-slider, .beeCodes-content-scroll').cycle('prev')


                ;
        return false;
    });


    $('.beeCodes-frame-hover-3').click(function() {


        $('.beeCodes-slide-1, .beeCodes-slide-3, .beeCodes-slider, .beeCodes-content-scroll').cycle('next')


                ;
        return false;
    });


});


$(document).ready(function() {

    $('.beeCodes-general-frame').hover(


            function() {


                $('.beeCodes-hover-2,.beeCodes-content-scroll').fadeIn();

            },


            function() {


                $('.beeCodes-hover-2,.beeCodes-content-scroll').fadeOut();


            }


    );

});


$(document).ready(function() {

    $('.beeCodes-frame-hover-1').hover(


            function() {
                $('.beeCodes-hover-1').fadeIn();
            },


            function() {
                $('.beeCodes-hover-1').fadeOut();
            }


    );

});


$(document).ready(function() {

    $('.beeCodes-frame-hover-3').hover(


            function() {
                $('.beeCodes-hover-3').fadeIn();
            },


            function() {
                $('.beeCodes-hover-3').fadeOut();
            }


    );

});


$(document).ready(function() {

    $('.beeCodes-content-scroll').cycle({

        fx: 'scrollVert',

        delay: 1,

        startingSlide: 2,

        fastOnEvent: 1000,

        timeout: 4000,

        speed: 4000,

        pause: false,

        backwards:  true

    });

});


$(document).ready(function() {

    $('.beeCodes-slide-1').cycle({

        fx: 'scrollHorz',

        delay: 1,

        startingSlide: 1,

        fastOnEvent:   1000,

        timeout: 4000,

        speed: 4000,

        pause: false,

        backwards:  true

    });

});


$(document).ready(function() {

    $('.beeCodes-slider').cycle({

        fx: 'scrollHorz',

        delay: 1,

        startingSlide: 2,

        fastOnEvent: 1000,

        timeout: 4000,

        speed: 4000,

        pause: false,

        backwards:  true

    });

});

$(document).ready(function() {

    $('.beeCodes-slide-3').cycle({

        fx: 'scrollHorz',

        fxFn:  null,

        delay: 1,

        startingSlide: 3,

        fastOnEvent:   1000,

        timeout: 4000,

        speed: 4000,

        pause: false,

        backwards:  true

    });


});

</script>





<!-- GENERAL SLIDER IMAGE -->

<div class="beeCodes-general-frame">


    <div class="beeCodes-slider"><?php echo $_slider_image; ?></div>


    <div class="beeCodes-hover-2">


        <!-- SLIDER CONENT -->

        <div class="beeCodes-content-scroll"><?php echo $_slider_title; ?></div>

        <!--END -->


    </div>


</div><!-- END -->









<!-- SMALL SLIDER IMAGES -->

<div class="beeCodes-slider-frame">

    <div class="beeCodes-slider-item">


        <!-- LEFT SLIDER IMAGES -->

        <div class="beeCodes-slider-frame-position-1">

            <div class="beeCodes-slider-frame-in">

                <div class="beeCodes-left-frame">

                    <div class="beeCodes-frame-hover-1">

                        <div class="beeCodes-slide-1"><?php echo $_slide_photo ?></div>

                        <div class="beeCodes-hover-1">

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- END LEFT SLIDER IMAGES -->


        <!-- RIGHT SLIDER IMAGES -->

        <div class="beeCodes-slider-frame-position-3">

            <div class="beeCodes-slider-frame-in">

                <div class="beeCodes-right-frame">

                    <div class="beeCodes-frame-hover-3">

                        <div class="beeCodes-slide-3"><?php echo $_slide_photo ?></div>

                        <div class="beeCodes-hover-3">

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- END RIGHT SLIDER IMAGES -->

        <div class="clear"></div>

    </div>

</div><!-- END SMALL SLIDER IMAGES -->