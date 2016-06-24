<?php

/**
 * @author madars.bitenieks
 * @profil http://themeforest.net/user/madza
 * @themes http://themeforest.net/user/madza/portfolio
 */
?>
<!--middle AREA -->
<div id="slider-middle">
    <ul id="anything-slider">  <?php 

        query_posts(array('post_type' => 'slides_options', 'order' => 'ASC'));

        if (have_posts()) : while (have_posts()) : the_post();
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'anything-slider-header');

            $custom = get_post_custom($post->ID);
            $slider_anything_type = $custom["_anything_slider_type"][0];

            $url = get_post_custom($post->ID);
            $link = $url["_slide_link"][0]; ?>

            <li> <?php

                if ($slider_anything_type == "Image") {
                    ?>

                    <?php if ($link == "") { ?>

                        <img src="<?php echo $thumbnail[0] ?>" width="<?php echo $thumbnail[1] ?>"
                             height="<?php echo $thumbnail[2] ?>">

                        <?php } else { ?>

                        <a href="<?php echo $link; ?>"><img alt="<?php the_content(); ?>"
                                                            src="<?php echo $thumbnail[0] ?>"
                                                            width="<?php echo $thumbnail[1] ?>"
                                                            height="<?php echo $thumbnail[2] ?>"></a>

                        <?php } ?>


                    <?php } else if ($slider_anything_type == "Video") { ?>

                    <?php $video_full = get_post_custom($post->ID);
                    echo $video_full_show = $video_full["_anything_slider_embed"][0]; ?>

                    <?php } ?>

            </li>

            <?php endwhile; else:  echo ""; endif; wp_reset_query(); ?>

    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#anything-slider')
                .anythingSlider({
                    width               : 960,
                    height              : <?php if (get_option("of_anything_slider_height")) {
                    echo get_option("of_anything_slider_height");
                } else {
                    echo "350";
                } ?>,
                    autoPlay            : true,
                    resizeContents      :  <?php if (get_option("of_anything_slider_resize")) {
                    echo get_option("of_anything_slider_resize");
                } else {
                    echo "true";
                } ?>,
                    autoPlayLocked      : true,
                    pauseOnHover        : true,
                    resumeOnVideoEnd    : true,
                    delay               : <?php if (get_option("of_anything_slider_delay")) {
                    echo get_option("of_anything_slider_delay");
                } else {
                    echo "3000";
                } ?>,
                    resumeDelay         : <?php if (get_option("of_anything_slider_resume_delay")) {
                    echo get_option("of_anything_slider_resume_delay");
                } else {
                    echo "15000";
                } ?>,
                    easing              : "easeInOutExpo",
                    animationTime       : <?php if (get_option("of_anything_slider_animation")) {
                    echo get_option("of_anything_slider_animation");
                } else {
                    echo "600";
                } ?>,
                });
        $('.anythingSlider').hover(function() {
                    $(this).find('.arrow').css('z-index', '9999');
                    $(this).find('.arrow').css('visibility', 'visible');
                },
                function() {
                    $(this).find('.arrow').css('visibility', 'hidden');
                });
    });
</script>