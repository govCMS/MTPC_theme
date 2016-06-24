<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */
?>

<div class="clear"></div>

</div><!--END CONTENT -->

</div><!--END TEXTURE -->

</div><!--END CONTENT FULL -->



<!-- ******************** FOOTER START ******************** -->
<div id="footer">
<div id="texture-footer">
<?php

if (get_option('of_middle_footer') == 'true') {
    ?>

<!-- FOOTER COLUMNS START -->
<div id="footer_columns_middle">
<div class="middle">
    <?php

    if (get_option('of_middle_footer_html')) {
        ?>

    <div class="footer_widget_middle">

        <?php

        echo get_option('of_middle_footer_html');

        ?>

    </div>

        <?php

    } else {

        if (get_option('of_footer_column_layout_middle') == '01') {
            ?>

        <div class="one">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == "02") {
            ?>

        <div class="one_half">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_half last">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == 03) {
            ?>

        <div class="one_third">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_third">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

        <div class="one_third last">

            <?php dynamic_sidebar('footer-middle-column-3'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == 04) {
            ?>

        <div class="one_fourth">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_fourth">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

        <div class="one_fourth">

            <?php dynamic_sidebar('footer-middle-column-3'); ?>

        </div>

        <div class="one_fourth last">

            <?php dynamic_sidebar('footer-middle-column-4'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == 05) {
            ?>

        <div class="one_fifth">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_fifth">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

        <div class="one_fifth">

            <?php dynamic_sidebar('footer-middle-column-3'); ?>

        </div>

        <div class="one_fifth">

            <?php dynamic_sidebar('footer-middle-column-4'); ?>

        </div>

        <div class="one_fifth last">

            <?php dynamic_sidebar('footer-middle-column-5'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == 06) {
            ?>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-3'); ?>

        </div>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-4'); ?>

        </div>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-5'); ?>

        </div>

        <div class="one_sixth last">

            <?php dynamic_sidebar('footer-middle-column-6'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == 07) {
            ?>

        <div class="one_fourth">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_fourth">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

        <div class="one_half last">

            <?php dynamic_sidebar('footer-middle-column-3'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == '08') {
            ?>

        <div class="one_half">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-3'); ?>

        </div>

        <div class="one_sixth last">

            <?php dynamic_sidebar('footer-middle-column-4'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == '09') {
            ?>

        <div class="one_half">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_fourth">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

        <div class="one_fourth last">

            <?php dynamic_sidebar('footer-middle-column-3'); ?>

        </div>

            <?php

        }

        elseif (get_option('of_footer_column_layout_middle') == '10') {
            ?>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-1'); ?>

        </div>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-2'); ?>

        </div>

        <div class="one_sixth">

            <?php dynamic_sidebar('footer-middle-column-3'); ?>

        </div>

        <div class="one_half last">

            <?php dynamic_sidebar('footer-middle-column-4'); ?>

        </div>

            <?php

        }

    }

    ?>

<div class="clear"></div>

</div>
<!-- middle END -->
</div> <!--FOOTER COLUMNS middle END -->

    <?php

}

if (get_option('of_bottom_footer') == 'true') {
    ?>


<!-- SUB FOOTER START -->
<div id="sub_footer">

    <div class="middle">

        <div class="line-sub-footer"></div>

        <!-- SUB FOOTER LEFT COLUMN START -->
<!--        Commented out to enable footer_menu to be centered-->
        <div class="one_half"> <?php echo get_option('of_bottom_footer_copyright'); ?> </div>
        <!-- SUB FOOTER LEFT COLUMN END -->

        <!-- SUB FOOTER RIGHT COLUMN START -->
        <div class="one_half last">

            <?php

            if (get_option('of_bottom_footer_html')) {

                echo get_option('of_bottom_footer_html');

            } else {

                if (get_option('of_bottom_footer_type') == "menu") {
                    ?>

                    <div id="footer_menu">
                        <?php wp_nav_menu(array('theme_location' => 'footer_menu', 'depth' => 0,)); ?>
                    </div>

                    <?php

                }

                elseif (get_option('of_bottom_footer_type') == "social") {
                    ?>

                    <div id="footer_social">

                        <?php if (get_option("social_twetter")) { ?>

                        <a target="_blank" href="<?php echo get_option("social_twetter")?>"><img width="24px"
                                                                                                 height="24px"
                                                                                                 src="http://png-3.findicons.com/files/icons/2155/social_media_bookmark/32/twitter.png"/>
                        </a>

                        <?php } ?>

                        <?php if (get_option("social_facebook")) { ?>

                        <a target="_blank" href="<?php echo get_option("social_facebook")?>"><img width="24px"
                                                                                                  height="24px"
                                                                                                  src="http://png-3.findicons.com/files/icons/2155/social_media_bookmark/32/facebook.png"/>
                        </a>

                        <?php } ?>

                        <?php if (get_option("social_linkedin")) { ?>

                        <a target="_blank" href="<?php echo get_option("social_linkedin")?>"><img width="24px"
                                                                                                  height="24px"
                                                                                                  src="http://png-3.findicons.com/files/icons/2155/social_media_bookmark/32/linkedin.png"/>
                        </a>

                        <?php } ?>

                        <?php if (get_option("social_flickr")) { ?>

                        <a target="_blank" href="<?php echo get_option("social_flickr")?>"><img width="24px"
                                                                                                height="24px"
                                                                                                src="http://png-3.findicons.com/files/icons/2155/social_media_bookmark/32/flickr.png"/>
                        </a>

                        <?php } ?>

                        <?php if (get_option("social_digg")) { ?>

                        <a target="_blank" href="<?php echo get_option("social_digg")?>"><img width="24px" height="24px"
                                                                                              src="http://png-5.findicons.com/files/icons/2155/social_media_bookmark/32/digg.png"/>
                        </a>

                        <?php } ?>

                        <?php if (get_option("social_delicious")) { ?>

                        <a target="_blank" href="<?php echo get_option("social_delicious")?>"><img width="24px"
                                                                                                   height="24px"
                                                                                                   src="http://png-5.findicons.com/files/icons/2155/social_media_bookmark/32/delicious.png"/>
                        </a>

                        <?php } ?>

                        <?php if (get_option("social_reddit")) { ?>

                        <a target="_blank" href="<?php echo get_option("social_reddit")?>"><img width="24px"
                                                                                                height="24px"
                                                                                                src="http://png-2.findicons.com/files/icons/2155/social_media_bookmark/32/reddit.png"/>
                        </a>

                        <?php } ?>

                        <?php if (get_option("social_technorati")) { ?>

                        <a target="_blank" href="<?php echo get_option("social_technorati")?>"><img width="24px"
                                                                                                    height="24px"
                                                                                                    src="http://png-2.findicons.com/files/icons/2155/social_media_bookmark/32/technorati.png"/>
                        </a>

                        <?php } ?>

                        <a target="_blank" href="<?php bloginfo('rdf_url'); ?>"><img width="24px" height="24px"
                                                                                     src="http://png-3.findicons.com/files/icons/2155/social_media_bookmark/32/rss.png"/>
                        </a>

                    </div>

                    <?php

                }

                elseif (get_option('of_bottom_footer_type') == "twitter") {
                    ?>

                    <div id="footer_twitter">

                        <ul id="twitter_update_list"></ul>

                    </div>

                    <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
                    <script type="text/javascript"
                            src="http://twitter.com/statuses/user_timeline/<?php echo get_option('of_footer_twitter'); ?>.json?callback=twitterCallback2&amp;count=1"></script>


                    <?php

                }

            }

            ?>

        </div>
        <!-- SUB FOOTER RIGHT COLUMN END -->

        <div class="clear"></div>

    </div>
    <!-- middle END -->

</div> <!-- SUB FOOTER END -->
    <?php

}

?>

</div>
<!--END Footer -->
</div><!--END All-div -->
</div><!-- TEXTURE END -->
</div><!-- HEAD END -->

<?php wp_footer(); ?>

</body>

</html>
