<?php

/**
 * @author m.bitenieks
 * @copyright 2010
 */
?>

<?php $slides = get_post_meta($post->ID, 'slides', true);

if ($slides != "") {

    foreach ($slides as $num => $slide) {

        if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {
        }

        else if ($slide['src'] != '') {

            $_slider_title .= '<div class="beeCodes-title">';

            if ($slide['title'] != "") {

                if ($slide['title'] != "") {

                    $_slider_title .= '<h1>' . $slide['title'] . '</h1>';

                }
                if ($slide['caption'] != "") {

                    $_slider_title .= '<div class="beeCodes-content">' . $slide['caption'] . '</div>';

                }

            }

            if ($slide['link_type'] == "Lightbox") {

                $_slider_title .= '<a class="link-hide" rel="prettyPhoto" alt="' . $slide['title'] . '" title="' . $slide['caption'] . '" href="' . $slide['src'] . '">' . $slide['caption'] . '<a>';

            } else if ($slide['link_type'] == "Link manually") {

                $_slider_title .= '<a class="link-hide" href="' . $slide['url_manual'] . '"><a>';

            } else if ($slide['link_type'] == "Link to Category") {

                $_slider_title .= '<a class="link-hide" href="' . get_category_link(get_cat_ID($slide['url_cat'])) . '"><a>';

            } else if ($slide['link_type'] == "Link to Page") {

                $_slider_title .= '<a class="link-hide" href="' . get_required_page($slide['url_page']) . '"><a>';

            } else if ($slide['link_type'] == "Link to this Post") {

                $_slider_title .= '<a class="link-hide" href="' . get_permalink() . '"><a>';

            }

            $_slider_title .= '</div>';


            $_slider_image .= '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=450&w=960" width="960" height="450">';
            $_slide_photo .= '<img src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=225&w=480" width="480" height="225">';

        }

    }

    ?>


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
        <div class="beeCodes-content-scroll"><?php echo $_slider_title; ?></div>
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

<?php } ?> 