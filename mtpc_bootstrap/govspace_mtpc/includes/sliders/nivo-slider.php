<?php

/**
 * @author m.bitenieks
 * @copyright 2010
 */
?>
<!--middle AREA -->
<div id="slider-middle">

    <!--If Slider Images -->

    <div id="header_image_silder">

        <div id="slider_frame">

            <div id="slider_image">

                <?php 
                query_posts(array('post_type' => 'slides_options', 'order' => 'ASC'));

                if (have_posts()) : while (have_posts()) : the_post();
                    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'nivo-slider-header');

                    $url = get_post_custom($post->ID);
                    $link = $url["_slide_link"][0];
                    $id = get_the_ID();
                    ?>

                    <?php if ($link == "") { ?>

                        <img title="#htmlcaption<?php echo $id; ?>" src="<?php echo $thumbnail[0] ?>"
                             width="<?php echo $thumbnail[1] ?>" height="<?php echo $thumbnail[2] ?>">

                        <?php } else { ?>

                        <a href="<?php echo $link; ?>"><img title="#htmlcaption<?php echo $id; ?>"
                                                            src="<?php echo $thumbnail[0] ?>"
                                                            width="<?php echo $thumbnail[1] ?>"
                                                            height="<?php echo $thumbnail[2] ?>"></a>

                        <?php } ?>



                    <?php

                                    endwhile; else:

                    echo "";

                endif;

                wp_reset_query();

                ?>

            </div>
        </div>
    </div>
</div><!-- END middle AREA -->
<?php 
query_posts(array('post_type' => 'slides_options', 'order' => 'ASC'));

if (have_posts()) : while (have_posts()) : the_post();
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'nivo-slider-header');
    $title = get_post_custom($post->ID);
    $show_title = $title["_slide_title"][0];
    $id = get_the_ID();
    ?>

<div id="htmlcaption<?php echo $id; ?>" class="nivo-html-caption">
    <?php if ($show_title == "No") {
} else { ?>
    <div class="title-slider"><h1><?php the_title(); ?> </h1></div>

    <div class="clear"></div>
    <?php if ($post->post_content == "") {
    } else { ?>
        <div class="content-slider"><?php the_content(); ?></div>
        <?php } ?>
    <?php } ?>
</div>

<?php

                    endwhile; else:

    echo "";

endif;

wp_reset_query();

?>

<script type="text/javascript">
    $(window).load(function() {
        $('#slider_image').nivoSlider({
            captionOpacity:<?php if (get_option("of_nivo_slider_opacity")) {
            echo "0.";
            echo get_option("of_nivo_slider_opacity");
        } else {
            echo "0";
        } ?>,
            pauseOnHover:<?php if (get_option("of_nivo_slider_hover")) {
            echo get_option("of_nivo_slider_hover");
        } else {
            echo "true";
        } ?>,
            controlNav:<?php if (get_option("of_nivo_slider_control")) {
            echo get_option("of_nivo_slider_control");
        } else {
            echo "true";
        } ?>,
            directionNav:<?php if (get_option("of_nivo_slider_nav")) {
            echo get_option("of_nivo_slider_nav");
        } else {
            echo "false";
        } ?>,

            effect:'<?php if (get_option("of_nivo_slider_effect")) {
                echo get_option("of_nivo_slider_effect");
            } else {
                echo "random";
            } ?>',
            animSpeed:<?php if (get_option("of_nivo_slider_speed")) {
            echo get_option("of_nivo_slider_speed");
        } else {
            echo "1000";
        } ?>,
            pauseTime:<?php if (get_option("of_nivo_slider_pause")) {
            echo get_option("of_nivo_slider_pause");
        } else {
            echo "3000";
        } ?>,
            slices:<?php if (get_option("of_nivo_slider_slices")) {
            echo get_option("of_nivo_slider_slices");
        } else {
            echo "20";
        } ?>,
            startSlide:<?php if (get_option("of_nivo_slider_start")) {
            echo get_option("of_nivo_slider_start");
        } else {
            echo "0";
        } ?>

        });
    });
    jQuery(document).ready(function() {
        Cufon.refresh();
    });
</script>