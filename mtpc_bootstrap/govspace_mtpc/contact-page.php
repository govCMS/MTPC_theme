<?php
 /*
 Template Name: Contact Page
 */
?>

<?php get_header(); ?>

<?php 

if (get_option('of_contact_widget') == "true") {

    if (get_option('of_contact_widget_position') == "right") {

        $class = 'class="right-content">';

    } else if (get_option('of_contact_widget_position') == "left") {

        $class = 'class="left-content">';

    }

} else {

    $class = 'id="full-page">';

}

?>

<!--BLOG CONTENT -->
<div <?php if (is_page_template('contact-page.php')) {
    echo $class;
} else { ?> class="<?php

    if ($sidebar == "Right") {
        echo "right-content";
    } else if ($sidebar == "Left") {
        echo "left-content";
    }

    else {
        echo of_page_layout();
        echo "-content";
    } ?>"> <?php } ?>


<?php

if (get_option('of_contact_form') == "true") {

    if (get_option('of_contact_form_title')) {

        echo "<h2>";
        echo get_option("of_contact_form_title");
        echo "</h2>";

    }

    if (get_option('of_contact_form_description')) {

        echo "<p>";
        echo get_option("of_contact_form_description");
        echo "</p>";

    }

    $name_translate = __("Name", "madza_translate");
    $email_translate = __("E-mail", "madza_translate");

    ?>



    <div class="widget_chortcode">
        <div id="contact_form_holder_2">

            <div id="message"></div>

            <form method="post"
                  action="<?php echo get_template_directory_uri(); echo "/includes/contact-form/" ?>contact.php"
                  name="contactform" id="contactform">

                <fieldset>

                    <p>
                        <?php echo __('Name:*', "madza_translate"); ?><br/>
                        <input name="name" type="text" id="name" size="30" value=""/>
                    </p>

                    <p>
                        <?php echo __('E-mail:*', "madza_translate"); ?><br/>
                        <input name="email" type="text" id="email" size="30" value=""/>
                    </p>

                    <p>
                        Topic:*<br/>
                        <select id="subject" name="subject">
                            General Comment, Arriving, Departing, Planning, Website Issue, Support
                            <option selected="selected" value="General Comment">General Comment</option>
                            <option value="Arriving">Arriving</option>
                            <option value="Departing">Departing</option>
                            <option value="Planning">Planning</option>
                            <option value="Website Issue">Website Issue</option>
                            <option value="Support">Support</option>
                        </select>
                    </p>


                    <p>
                        <?php echo __('Message:*', "madza_translate"); ?>
                        <textarea name="comments" rows="7" id="comments"></textarea>
                    </p>

<!--                    <p>For security please enter the text from the image:<span class="required">*</span><br/>-->
<!--                        <input name="verify" type="text" id="verify" size="6" value="" style="width: 55px;"/><img-->
<!--                                id="ver-img"-->
<!--                                src="--><?php //echo get_template_directory_uri(); echo "/includes/contact-form/" ?><!--image.php"-->
<!--                                border="0">-->
<!--                    </p>-->

                    <div class="clear"></div>
                    <input type="submit" class="submit" id="send_message"
                           value="<?php _e("Send", "madza_translate"); ?>"/>

                </fieldset>

            </form>

        </div>
    </div>

    <?php

}

if (get_option('of_contact_content') == "contact_content_yes") {

    echo '<div class="line-home"></div>';

    ?>

    <?php if (get_option('of_contact_content') == "contact_content_yes") {

        $args = array(
            'pagename' => get_option('of_contact_content_page'),
            'post_type' => 'page',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'caller_get_posts' => 1
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <?php the_content(); ?>
                <?php
                                      endwhile;
        }
        wp_reset_query();

    }
} ?>


</div><!--END BLOG CONTENT -->

<?php if (get_option('of_contact_widget') == "true") {
    get_sidebar();
} ?>

<?php get_footer(); ?>
