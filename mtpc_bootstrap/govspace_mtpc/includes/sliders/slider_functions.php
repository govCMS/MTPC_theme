<?php







add_action('init', 'slider_manager');


function slider_manager()
{


    register_post_type('slides_options',


                       array(


                            'labels' => array(


                                'name' => __('Slider Manager'),


                                'singular_name' => __('Slide'),


                                'add_new' => __('Add New Slide'),


                                'add_new_item' => __('Add New Slide'),


                                'new_item' => __('New Slide'),


                                'menu_name' => __('Slider Manager')


                            ),


                            'public' => true,


                            'menu_icon' => 'http://cdn5.iconfinder.com/data/icons/fugue/icon/soap-header.png',


                            'supports' => array('title', 'editor', 'thumbnail'),


                            'capability_type' => 'post',


                            'register_meta_box_cb' => 'add_events_metaboxes'


                       )


    );


}


// Add the Events Meta Boxes


function add_events_metaboxes()
{


    add_meta_box('slide_link', 'Slide General Options', 'slide_link', 'slides_options', 'normal', 'high');


    add_meta_box('slider_anything', 'Anything Slider Options', 'slider_anything', 'slides_options', 'normal', 'high');


    //add_meta_box('slider_bx', 'BX Slider Options', 'slider_bx', 'slides_options', 'normal', 'high');


    //add_meta_box('slider_orbit', 'Orbit Slider Options', 'slider_orbit', 'slides_options', 'normal', 'high');


}


function slide_link()
{


    global $post;


    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .


         wp_create_nonce(plugin_basename(__FILE__)) . '" />';


    $_slide_link = get_post_meta($post->ID, '_slide_link', true);

    $_slide_title = get_post_meta($post->ID, '_slide_title', true);


    $options_title = array('Yes', 'No');


    echo '<p><strong>Show Content:</strong></p>';


    echo '<select name="_slide_title" id="_slide_title">';


    foreach ($options_title as $_option_type) {


        echo '<option', $_slide_title == $_option_type ? ' selected="selected"' : '', '>' . $_option_type . '</option>';


    }


    echo '</select>';


    echo '<br /><br /><p><strong>URL:</strong></p>';


    echo '<input name="_slide_link"  class="widefat" value="' . $_slide_link . '" />';


    echo'<p>Paste the full URL (include http://) of your custom link here.</p>';


    // Echo out the field


}


function slider_anything()
{


    global $post;


    // Noncename needed to verify where the data originated


    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .


         wp_create_nonce(plugin_basename(__FILE__)) . '" />';


    // Get the location data if its already been entered


    $_anything_slider_type = get_post_meta($post->ID, '_anything_slider_type', true);

    $_anything_slider_embed = get_post_meta($post->ID, '_anything_slider_embed', true);


    // Echo out the field


    $options_anything = array('Image', 'Video');


    echo '<p><strong>Content Type:</strong></p>';


    echo '<select name="_anything_slider_type" id="_anything_slider_type">';


    foreach ($options_anything as $_option_type) {


        echo '<option', $_anything_slider_type == $_option_type ? ' selected="selected"'
                : '', '>' . $_option_type . '</option>';


    }


    echo '</select>';


    echo '<p><strong>If you select Image</strong>, just set a featured image.</p>';


    echo '<p><strong>If you choose video</strong>, just copy and paste the video code here, Be sure to set the video width to 960px and height to ';
    if (get_option("of_anything_slider_height")) {
        echo get_option("of_anything_slider_height");
    } else {
        echo "350";
    }
    echo 'px to show a fullscreen video</p>';


    echo '<br /><p><strong>Video Embed Code:</strong></p>';


    echo '<textarea name="_anything_slider_embed"  class="widefat" cols="80" rows="4" />' . $_anything_slider_embed . '</textarea>';


}


function slider_bx()
{


    global $post;


    // Noncename needed to verify where the data originated


    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .


         wp_create_nonce(plugin_basename(__FILE__)) . '" />';


    // Get the location data if its already been entered


    $_bx_slider_type = get_post_meta($post->ID, '_bx_slider_type', true);


    $dresscode = get_post_meta($post->ID, '_dresscode', true);


    // Echo out the field


    $options_bx = array('Image', 'Video', 'Content & Left Image', 'Content & Right Image', 'Content & Left Video', 'Content & Right Video');


    echo '<p><strong>Content Type:</strong></p>';


    echo '<select name="_bx_slider_type" id="_bx_slider_type">';


    foreach ($options_bx as $_option_type) {


        echo '<option', $_bx_slider_type == $_option_type ? ' selected="selected"'
                : '', '>' . $_option_type . '</option>';


    }


    echo '</select>';


    echo '<p><strong>If you select Image</strong>, just set a featured image.</p>';


    echo '<p><strong>If you choose video</strong>, just copy and paste the video code here, Be sure to set the video width to 960px and height to ';
    if (get_option("of_bx_slider_height")) {
        echo get_option("of_nivo_slider_height");
    } else {
        echo "350";
    }
    echo 'px to show a fullscreen video</p>';


    echo '<p><strong>If you choose content & video </strong>, just copy and paste the video code here, Be sure to set the video width to 600px and height to ';
    if (get_option("of_bx_slider_height")) {
        echo get_option("of_nivo_slider_height");
    } else {
        echo "350";
    }
    echo 'px to show a fullscreen video</p>';


    echo '<br /><p><strong>Video Embed Code:</strong></p>';


    echo '<textarea name="_dresscode"  class="widefat" cols="80" rows="4" />' . $dresscode . '</textarea>';


}


function slider_orbit()
{


    global $post;


    // Noncename needed to verify where the data originated


    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .


         wp_create_nonce(plugin_basename(__FILE__)) . '" />';


    // Get the location data if its already been entered


    $_orbit_slider_type = get_post_meta($post->ID, '_orbit_slider_type', true);

    $_orbit_slider_embed = get_post_meta($post->ID, '_orbit_slider_embed', true);


    // Echo out the field


    $options_orbit = array('Image', 'Video');


    echo '<p><strong>Content Type:</strong></p>';


    echo '<select name="_orbit_slider_type" id="_orbit_slider_type">';


    foreach ($options_orbit as $_option_type) {


        echo '<option', $_orbit_slider_type == $_option_type ? ' selected="selected"'
                : '', '>' . $_option_type . '</option>';


    }


    echo '</select>';


    echo '<p><strong>If you select Image</strong>, just set a featured image.</p>';


    echo '<p><strong>If you choose video</strong>, just copy and paste the video code here, Be sure to set the video width to 960px and height to ';
    if (get_option("of_orbit_slider_height")) {
        echo get_option("of_orbit_slider_height");
    } else {
        echo "350";
    }
    echo 'px to show a fullscreen video</p>';


    echo '<br /><p><strong>Video Embed Code:</strong></p>';


    echo '<textarea name="_orbit_slider_embed"  class="widefat" cols="80" rows="4" />' . $_orbit_slider_embed . '</textarea>';


}


// Save the Metabox Data


function wpt_save_events_meta($post_id, $post)
{


    // verify this came from the our screen and with proper authorization,


    // because save_post can be triggered at other times


    if (!wp_verify_nonce($_POST['eventmeta_noncename'], plugin_basename(__FILE__))) {


        return $post->ID;


    }


    // Is the user allowed to edit the post or page?


    if (!current_user_can('edit_post', $post->ID))


        return $post->ID;


    // OK, we're authenticated: we need to find and save the data


    // We'll put it into an array to make it easier to loop though.


    $events_meta['_slide_link'] = $_POST['_slide_link'];


    $events_meta['_slide_title'] = $_POST['_slide_title'];


    $events_meta['_bx_slider_type'] = $_POST['_bx_slider_type'];


    $events_meta['_dresscode'] = $_POST['_dresscode'];


    $events_meta['_orbit_slider_type'] = $_POST['_orbit_slider_type'];


    $events_meta['_orbit_slider_embed'] = $_POST['_orbit_slider_embed'];


    $events_meta['_anything_slider_type'] = $_POST['_anything_slider_type'];


    $events_meta['_anything_slider_embed'] = $_POST['_anything_slider_embed'];


    // Add values of $events_meta as custom fields


    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!


        if ($post->post_type == 'revision') return; // Don't store custom data twice


        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)


        if (get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value


            update_post_meta($post->ID, $key, $value);


        } else { // If the custom field doesn't have a value


            add_post_meta($post->ID, $key, $value);


        }


        if (!$value) delete_post_meta($post->ID, $key); // Delete if blank


    }


}


add_action('save_post', 'wpt_save_events_meta', 1, 2); // save the custom fields


?>