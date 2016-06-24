<?php



add_action('init', 'price_table');

function price_table()
{

    register_post_type('price_table',

                       array(

                            'labels' => array(

                                'name' => __('All Features'),

                                'singular_name' => __('Feature'),

                                'add_new' => __('Add New Feature'),

                                'add_new_item' => __('Add New Feature'),

                                'new_item' => __('New Feature'),

                                'menu_name' => __('Pricing Table')

                            ),

                            'public' => true,

                            'menu_icon' => 'http://cdn1.iconfinder.com/data/icons/cologne/16x16/cost.png',

                            'supports' => array("title"),

                            'capability_type' => 'post',

                            'register_meta_box_cb' => 'add_price_table_metaboxes'

                       )

    );

}


function add_price_table_metaboxes()
{

    if ((get_option('of_pricing_table_plans') == '2') OR (get_option('of_pricing_table_plans') == '3') OR (get_option('of_pricing_table_plans') == '4')) {
        add_meta_box('first_plan', 'First Plan Feature', 'first_plan', 'price_table', 'normal', 'high');
    }

    if ((get_option('of_pricing_table_plans') == '2') OR (get_option('of_pricing_table_plans') == '3') OR (get_option('of_pricing_table_plans') == '4')) {
        add_meta_box('second_plan', 'Second Plan Feature', 'second_plan', 'price_table', 'normal', 'high');
    }

    if ((get_option('of_pricing_table_plans') == '3') OR (get_option('of_pricing_table_plans') == '4')) {
        add_meta_box('third_plan', 'Third Plan Feature', 'third_plan', 'price_table', 'normal', 'high');
    }

    if (get_option('of_pricing_table_plans') == '4') {
        add_meta_box('fourch_plan', 'Fourth Plan Feature', 'fourch_plan', 'price_table', 'normal', 'high');
    }


}

//FIRST PLAN
if ((get_option('of_pricing_table_plans') == '2') OR (get_option('of_pricing_table_plans') == '3') OR (get_option('of_pricing_table_plans') == '4')) {

    function first_plan()
    {

        $type = array('Text', 'Icon Yes', 'Icon Not');

        global $post;

        echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .

             wp_create_nonce(plugin_basename(__FILE__)) . '" />';

        $_first_type = get_post_meta($post->ID, '_first_type', true);
        $_first_text = get_post_meta($post->ID, '_first_text', true);

        echo '<p><strong>Feature Type</strong>:</p>';

        echo '<select name="_first_type" id="_first_type">';

        foreach ($type as $_option_type) {

            echo '<option', $_first_type == $_option_type ? ' selected="selected"'
                    : '', '>' . $_option_type . '</option>';

        }

        echo '</select>';

        echo '<p><strong>Text</strong>:</p>';

        echo '<input name="_first_text"  class="widefat" value="' . $_first_text . '" />';

    }
}


//SECOND PLAN
if ((get_option('of_pricing_table_plans') == '2') OR (get_option('of_pricing_table_plans') == '3') OR (get_option('of_pricing_table_plans') == '4')) {

    function second_plan()
    {

        $type = array('Text', 'Icon Yes', 'Icon Not');

        global $post;

        echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .

             wp_create_nonce(plugin_basename(__FILE__)) . '" />';

        $_second_type = get_post_meta($post->ID, '_second_type', true);
        $_second_text = get_post_meta($post->ID, '_second_text', true);

        echo '<p><strong>Feature Type</strong>:</p>';

        echo '<select name="_second_type" id="_second_type">';

        foreach ($type as $_option_type) {

            echo '<option', $_second_type == $_option_type ? ' selected="selected"'
                    : '', '>' . $_option_type . '</option>';

        }

        echo '</select>';

        echo '<p><strong>Text</strong>:</p>';

        echo '<input name="_second_text"  class="widefat" value="' . $_second_text . '" />';

    }
}

//THIRD PLAN
if ((get_option('of_pricing_table_plans') == '3') OR (get_option('of_pricing_table_plans') == '4')) {
    function third_plan()
    {

        $type = array('Text', 'Icon Yes', 'Icon Not');

        global $post;

        echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .

             wp_create_nonce(plugin_basename(__FILE__)) . '" />';

        $_third_type = get_post_meta($post->ID, '_third_type', true);
        $_third_text = get_post_meta($post->ID, '_third_text', true);

        echo '<p><strong>Feature Type</strong>:</p>';

        echo '<select name="_third_type" id="_third_type">';

        foreach ($type as $_option_type) {

            echo '<option', $_third_type == $_option_type ? ' selected="selected"'
                    : '', '>' . $_option_type . '</option>';

        }

        echo '</select>';

        echo '<p><strong>Text</strong>:</p>';

        echo '<input name="_third_text"  class="widefat" value="' . $_third_text . '" />';

    }
}
//FOURCH PLAN

if (get_option('of_pricing_table_plans') == '4') {

    function fourch_plan()
    {

        $type = array('Text', 'Icon Yes', 'Icon Not');

        global $post;

        echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .

             wp_create_nonce(plugin_basename(__FILE__)) . '" />';

        $_fourch_type = get_post_meta($post->ID, '_fourch_type', true);
        $_fourch_text = get_post_meta($post->ID, '_fourch_text', true);

        echo '<p><strong>Feature Type</strong>:</p>';

        echo '<select name="_fourch_type" id="_fourch_type">';

        foreach ($type as $_option_type) {

            echo '<option', $_fourch_type == $_option_type ? ' selected="selected"'
                    : '', '>' . $_option_type . '</option>';

        }

        echo '</select>';

        echo '<p><strong>Text</strong>:</p>';

        echo '<input name="_fourch_text"  class="widefat" value="' . $_fourch_text . '" />';

    }
}
// Save the Metabox Data


function wpt_save_price_table_meta($post_id, $post)
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


    $events_meta['_first_type'] = $_POST['_first_type'];
    $events_meta['_first_text'] = $_POST['_first_text'];
    $events_meta['_second_type'] = $_POST['_second_type'];
    $events_meta['_second_text'] = $_POST['_second_text'];
    $events_meta['_third_type'] = $_POST['_third_type'];
    $events_meta['_third_text'] = $_POST['_third_text'];
    $events_meta['_fourch_type'] = $_POST['_fourch_type'];
    $events_meta['_fourch_text'] = $_POST['_fourch_text'];


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


add_action('save_post', 'wpt_save_price_table_meta', 1, 2); // save the custom fields


?>