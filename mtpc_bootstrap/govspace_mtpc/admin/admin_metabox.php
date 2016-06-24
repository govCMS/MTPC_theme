<?php
/**
 * @author m.bitenieks
 * @copyright 2011
 */


###############################################################################
# --------------------------- POST THUMBNAIL METABOX ------------------------ #
###############################################################################
$post_meta = 'madza_post_';

$meta_box_post = array(
    'id' => 'post-meta-box',
    'title' => 'Post Options',
    'post' => 'post',
    'context' => 'side',
    'priority' => 'default',
    'fields' => array(

        array(
            'name' => 'Show blog post text',
            'desc' => 'Select blog post text type',
            'id' => $post_meta . 'blog_text_type',
            'type' => 'select',
            'options' => array('Select...', 'No text', 'Full text', 'Excerpt'),
            'std' => ''
        ),
        array(
            'name' => 'Blog post thumbnail size',
            'desc' => 'Select thumbnail size for blog page',
            'id' => $post_meta . 'blog_thumb_size',
            'type' => 'select',
            'options' => array('Select...', 'Not image', 'Full image', 'Small image'),
            'std' => ''
        ),
        array(
            'name' => 'Single post thumbnail size',
            'desc' => 'Select thumbnail size for single page',
            'id' => $post_meta . 'single_thumb_size',
            'type' => 'select',
            'options' => array('Select...', 'No image', 'Big image', 'Middle image', 'Small image'),
            'std' => ''
        ),
        array(
            'name' => 'Single post slider AutoPlay',
            'desc' => 'Select for single page slider',
            'id' => $post_meta . 'single_thumb_autoplay',
            'type' => 'select',
            'options' => array('Select...', 'No', 'Yes'),
            'std' => ''
        ),


    )
);


add_action('admin_menu', 'mytheme_add_box_post');
function mytheme_add_box_post()
{
    global $meta_box_post;
    add_meta_box($meta_box_post['id'], $meta_box_post['title'], 'mytheme_show_box_post', $meta_box_post['post'], $meta_box_post['context'], $meta_box_post['priority']);
}


function mytheme_show_box_post()
{
    global $meta_box_post, $post;

    echo '<input type="hidden" name="mytheme_meta_box_nonce2" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<div class="bee-meta-box-frame">';

    foreach ($meta_box_post['fields'] as $field) {

        $meta = get_post_meta($post->ID, $field['id'], true);

        switch ($field['type']) {

            case "checkbox":
                echo '<div class="bee-meta-box-div">';
                echo '<strong>', $field['name'], '</strong><br /><span class="bee-metabox-border-2">';
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select></span>', '<br />';
                echo '<span class="bee-metabox-description">', $field['desc'], '</span>';
                echo '</div>';
                break;
                break;

            case 'select':
                echo '<div class="bee-meta-box-div">';
                echo '<strong>', $field['name'], '</strong><br /> <span class="bee-metabox-border-2">';
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select></span>', '<br />';
                echo '<span class="bee-metabox-description">', $field['desc'], '</span>';
                echo '</div>';
                break;

            case 'select':
                echo '<div class="bee-meta-box-div">';
                echo '<strong>', $field['name'], '</strong><br /><span class="bee-metabox-border-2">';
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select></span>', '<br />';
                echo '<span class="bee-metabox-description">', $field['desc'], '</span>';
                echo '</div>';
                break;

            case 'select':
                echo '<div class="bee-meta-box-div">';
                echo '<strong>', $field['name'], '</strong><br /><span class="bee-metabox-border-2">';
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select></span>', '<br />';
                echo '<span class="bee-metabox-description">', $field['desc'], '</span>';
                echo '</div>';
                break;

        }
    }

    echo '</div>';
}


add_action('save_post', 'mytheme_show_box_post2');
function mytheme_show_box_post2($post_id)
{
    global $meta_box_post;

    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce2'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box_post['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}


###############################################################################
# -------------------------- IMAGE MANAGER METABOX -------------------------- #
###############################################################################


define('BEE_URL', get_template_directory_uri() . '/admin/meta_box');


$bee_sm = 'bee_sm_';

$bee_sm_metabox = array(
    'id' => 'bee_sm_metabox',
    'title' => 'Add featured media',
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high'
);
$bee_sm_metabox_post = array(
    'id' => 'bee_sm_metabox',
    'title' => 'Add featured media',
    'none' => 'none',
    'context' => 'normal',
    'priority' => 'high'
);
$bee_sm_metabox_portfolio = array(
    'id' => 'bee_sm_metabox',
    'title' => 'Add featured media',
    'post_type' => 'portfolio',
    'context' => 'normal',
    'priority' => 'high'
);


add_action('admin_menu', 'bee_sm_box');

// SLIDER MANAGER BOX //
function bee_sm_box()
{

    global $bee_sm_metabox, $bee_sm_metabox_post;

    add_meta_box($bee_sm_metabox['id'], $bee_sm_metabox['title'], 'bee_sm_wrap', $bee_sm_metabox['page'], $bee_sm_metabox['context'], $bee_sm_metabox['priority']);
    add_meta_box($bee_sm_metabox_post['id'], $bee_sm_metabox_post['title'], 'bee_sm_wrap', $bee_sm_metabox_post['post'], $bee_sm_metabox_post['context'], $bee_sm_metabox_post['priority']);
    add_meta_box($bee_sm_metabox_portfolio['id'], $bee_sm_metabox_portfolio['title'], 'bee_sm_wrap', $bee_sm_metabox_portfolio['portfolio'], $bee_sm_metabox_portfolio['context'], $bee_sm_metabox_portfolio['priority']);

}

global $slides, $post;


// SLIDER MANAGER WRAP

function bee_sm_wrap()
{

    global $bee_sm_metabox, $bee_sm_metabox_post, $post, $slides;

    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .

         wp_create_nonce(plugin_basename(__FILE__)) . '" />';


    ?>

<div id="bee-appendo-wrap">
<div style="display: none;">


    <div class="bee-metabox-wrap bee-metabox-wrap-working bee-metabox-wrap-embed">


        <div class="sm-image sm-image_id">
            <input type="text" class="sm-upload-input" value="embed" id="src[]"/>
            <span><strong>Video Embed</strong></span>

            <div class="sm-image-thumb">
                <div class="sm-embed-image"></div>
            </div>
        </div>

        <div class="sm-content">
            <span><strong>Video link</strong></span>
                                <span class="bee-metabox-border">
                                        <input type="text" id="title[]" class="add-attr-sm-title"
                                               value="<?php echo $slide['title']; ?>"/>
                                </span>

            <span><strong>Link sample for YouTube:</strong> <br/>http://www.youtube.com/embed/VIDEO_NR  http://www.youtube.com/embed/GgR6dyzkKHI </span>
            <br/><br/>
            <span><strong>Link sample for Vimeo:</strong> <br/>http://player.vimeo.com/video/VIDEO_NR  http://player.vimeo.com/video/23041114 </span>
            <br/><br/>

            <input style="display: none;" type="text" id="caption[]" class="add-caption"
                   value="<?php echo $slide['caption']; ?>"/>
            <input style="display: none;" type="text" id="link_type[]" class="add-link_type"
                   value="<?php echo $slide['link_type']; ?>"/>
            <input style="display: none;" type="text" id="url_manual[]" class="add-url_manual"
                   value="<?php echo $slide['url_manual']; ?>"/>
            <input style="display: none;" type="text" id="url_page[]" class="add-url_page"
                   value="<?php echo $slide['url_page']; ?>"/>
            <input style="display: none;" type="text" id="url_cat[]" class="add-url_cat"
                   value="<?php echo $slide['url_cat']; ?>"/>

            <div class="clear"></div>
        </div>

        <div class="sm-option">

            <div class="sm-option-delete"></div>

        </div>

        <div class="clear"></div>

    </div>


    <div class="bee-metabox-wrap bee-metabox-wrap-working bee-metabox-wrap-add">

        <div class="sm-image sm-image_id">
            <input type="text" class="sm-upload-input" value="<?php echo $slide['src']; ?>" id="src[]"/>
            <span><strong>Image Upload</strong></span>

            <div class="sm-image-thumb">
                <div class="sm-image-thumb-in"><?php echo $prevImg; ?></div>
            </div>
            <div class="sm-upload-button-frame"><a class="sm-upload-button" title="Upload Button">Upload</a></div>
        </div>

        <div class="sm-content">
            <span><strong>Caption Title</strong></span>
                            <span class="bee-metabox-border">
                                    <input type="text" id="title[]" class="add-attr-sm-title"
                                           value="<?php echo $slide['title']; ?>"/>
                            </span>

            <span><strong>Caption</strong></span>
            <textarea id="caption[]" class="add-attr-sm-caption"><?php echo $slide['caption']; ?></textarea>

            <span><strong>Apply link to the image?</strong></span>

            <div>
                                 <span class="bee-metabox-border">
          
                                       <select class="select_js" id="link_type[]"><?php

                                           $options_title = array('Select...', 'No link', 'Lightbox', 'Link to this Post', 'Link to Page', 'Link to Category', 'Link manually');

                                           foreach ($options_title as $link_v) {

                                               echo '<option', $slide['link_type'] == $link_v ? ' selected="selected"'
                                                       : '', '>' . $link_v . '</option>';

                                           }?>

                                       </select>
                                </span>
                                
                                <span class="bee-metabox-border url_manualhides"
                                      style="display: none; margin-top:-5px;">
                                        <input type="text" id="url_manual[]" class="url_manual_visible"
                                               value="<?php echo $slide['url_manual']; ?>"/>
                                </span>
                                
                                <span class="bee-metabox-border url_pagehides" style="display: none; margin-top:-5px;">
                                
                                        <select id="url_page[]" class="url_page_visible"><?php

                                            $of_pages = array();
                                            $of_pages_obj = get_pages('sort_column=post_parent,menu_order');

                                            foreach ($of_pages_obj as $of_page) {

                                                $of_pages[$of_page->ID] = $of_page->post_name;

                                            }
                                            $page_tmp = array_unshift($of_pages, "Select page");

                                            foreach ($of_pages as $link_v) {

                                                echo '<option', $slide['url_page'] == $link_v ? ' selected="selected"'
                                                        : '', '>' . $link_v . '</option>';

                                            }?>

                                        </select>
                                </span>
                                
                                <span class="bee-metabox-border url_cathides" style="display: none; margin-top:-5px;">
                                
                                        <select id="url_cat[]" class="url_cat_visible"><?php

                                            $of_categories = array();
                                            $of_categories_obj = get_categories('hide_empty=0');
                                            foreach ($of_categories_obj as $of_cat) {

                                                $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;

                                            }
                                            $categories_tmp = array_unshift($of_categories, "Select category");

                                            foreach ($of_categories as $link_v) {

                                                echo '<option', $slide['url_cat'] == $link_v ? ' selected="selected"'
                                                        : '', '>' . $link_v . '</option>';

                                            }?>

                                        </select>
                                </span>
            </div>
        </div>

        <div class="sm-option">

            <div class="sm-option-delete"></div>

        </div>

        <div class="clear"></div>

    </div>
</div>
    <?php if (get_post_meta($post->ID, 'slides', true)) { ?>

    <?php

    $slides = get_post_meta($post->ID, 'slides', true);
    foreach ($slides as $key => $slide) {


        if ($slide['src'] == "embed") {
            ?>

        <div class="bee-metabox-wrap bee-metabox-wrap-working bee-metabox-wrap-remove-block">

            <div class="sm-image sm-image_id">
                <input type="text" class="sm-upload-input" value="<?php echo $slide['src']; ?>" id="src[]"
                       name="src[]"/>
                <span><strong>Video Embed</strong></span>

                <div class="sm-image-thumb">
                    <div class="sm-embed-image"></div>
                </div>
            </div>

            <div class="sm-content">
                <span><strong>Video link</strong></span>
                                <span class="bee-metabox-border">
                                        <input type="text" id="title[]" name="title[]" class="add-attr-sm-title"
                                               value="<?php echo $slide['title']; ?>"/>
                                </span>

                <span><strong>Link sample for YouTube:</strong> <br/>http://www.youtube.com/embed/VIDEO_NR  http://www.youtube.com/embed/GgR6dyzkKHI </span>
                <br/><br/>
                <span><strong>Link sample for Vimeo:</strong> <br/>http://player.vimeo.com/video/VIDEO_NR  http://player.vimeo.com/video/23041114 </span>
                <br/><br/>
                <input style="display: none;" type="text" name="caption[]" id="caption[]" class="add-caption"
                       value="<?php echo $slide['caption']; ?>"/>
                <input style="display: none;" type="text" name="link_type[]" id="link_type[]" class="add-link_type"
                       value="<?php echo $slide['link_type']; ?>"/>
                <input style="display: none;" type="text" name="url_manual[]" id="url_manual[]" class="add-url_manual"
                       value="<?php echo $slide['url_manual']; ?>"/>
                <input style="display: none;" type="text" name="url_page[]" id="url_page[]" class="add-url_page"
                       value="<?php echo $slide['url_page']; ?>"/>
                <input style="display: none;" type="text" name="url_cat[]" id="url_cat[]" class="add-url_cat"
                       value="<?php echo $slide['url_cat']; ?>"/>


                <div class="clear"></div>
            </div>

            <div class="sm-option">

                <div class="sm-option-delete"></div>

            </div>

            <div class="clear"></div>

        </div>


            <?php
        } else {

            //get post id of the hidden post that stores the image
            $postId = get_post_meta($post->ID, 'slides', true);


            if (!preg_match('!\.jpg$|\.jpeg$|\.png$|\.gif$!', $slide['src']) && $slide['src'] != "") {
                $prevImg = '<a href="#" class="sm-remove-image">delete</a><img width="117px" height="117px" src="' . get_template_directory_uri() . '/images/video.png" alt="" />';
            }
            else if ($slide['src'] != '') {
                $prevImg = '<a href="#" class="sm-remove-image">delete</a><img width="117px" height="117px" src="' . get_template_directory_uri() . '/includes/thumb.php?src=' . $slide['src'] . '&h=117&w=117" alt="" />';
            }?>

        <div class="bee-metabox-wrap bee-metabox-wrap-working bee-metabox-wrap-remove-block">

            <div class="sm-image sm-image_id">
                <input type="text" class="sm-upload-input" value="<?php echo $slide['src']; ?>" name="src[]"
                       id="src[]"/>
                <span><strong>Image Upload</strong></span>

                <div class="sm-image-thumb">
                    <div class="sm-image-thumb-in"><?php echo $prevImg; ?></div>
                </div>
                <div class="sm-upload-button-frame"><a class="sm-upload-button" title="Upload Button">Upload</a></div>
            </div>

            <div class="sm-content">
                <span><strong>Caption Title</strong></span>
                            <span class="bee-metabox-border">
                                    <input type="text" name="title[]" id="title[]"
                                           value="<?php echo $slide['title']; ?>"/>
                            </span>

                <span><strong>Caption</strong></span>
                <textarea name="caption[]" id="caption[]"><?php echo $slide['caption']; ?></textarea>

                <span><strong>Apply link to the image?</strong></span>

                <div>
                                 <span class="bee-metabox-border">
          
                                       <select name="link_type[]" class="select_js" id="link_type[]"><?php

                                           $options_title = array('Select...', 'No link', 'Lightbox', 'Link to this Post', 'Link to Page', 'Link to Category', 'Link manually');

                                           foreach ($options_title as $link_v) {

                                               echo '<option', $slide['link_type'] == $link_v ? ' selected="selected"'
                                                       : '', '>' . $link_v . '</option>';

                                           }?>

                                       </select>
                                </span>
                                
                                <span class="bee-metabox-border url_manualhides"
                                      style="display: none; margin-top:-5px;">
                                        <input type="text" name="url_manual[]" id="url_manual[]"
                                               class="url_manual_visible" value="<?php echo $slide['url_manual']; ?>"/>
                                </span>
                                
                                <span class="bee-metabox-border url_pagehides" style="display: none; margin-top:-5px;">
                                
                                        <select name="url_page[]" id="url_page[]" class="url_page_visible"><?php

                                            $of_pages = array();
                                            $of_pages_obj = get_pages('sort_column=post_parent,menu_order');

                                            foreach ($of_pages_obj as $of_page) {

                                                $of_pages[$of_page->ID] = $of_page->post_name;

                                            }
                                            $page_tmp = array_unshift($of_pages, "Select page");

                                            foreach ($of_pages as $link_v) {

                                                echo '<option', $slide['url_page'] == $link_v ? ' selected="selected"'
                                                        : '', '>' . $link_v . '</option>';

                                            }?>

                                        </select>
                                </span>
                                
                                <span class="bee-metabox-border url_cathides" style="display: none; margin-top:-5px;">
                                
                                        <select name="url_cat[]" id="url_cat[]" class="url_cat_visible"><?php

                                            $of_categories = array();
                                            $of_categories_obj = get_categories('hide_empty=0');
                                            foreach ($of_categories_obj as $of_cat) {

                                                $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;

                                            }
                                            $categories_tmp = array_unshift($of_categories, "Select category");

                                            foreach ($of_categories as $link_v) {

                                                echo '<option', $slide['url_cat'] == $link_v ? ' selected="selected"'
                                                        : '', '>' . $link_v . '</option>';

                                            }?>

                                        </select>
                                </span>
                </div>
            </div>

            <div class="sm-option">

                <div class="sm-option-delete"></div>

            </div>

            <div class="clear"></div>

        </div>

            <?php }
    } ?>

    <?php } else { ?>

<div class="bee-metabox-wrap bee-metabox-wrap-remove-block">

    <div class="sm-image sm-image_id">
        <input type="text" class="sm-upload-input" value="" name="src[]" id="src[]"/>
        <span><strong>Image Upload</strong></span>

        <div class="sm-image-thumb">
            <div class="sm-image-thumb-in"><?php echo $prevImg; ?></div>
        </div>
        <div class="sm-upload-button-frame"><a class="sm-upload-button" title="Upload Button">Upload</a></div>
    </div>

    <div class="sm-content">
        <span><strong>Caption Title</strong></span>
                            <span class="bee-metabox-border">
                                    <input type="text" name="title[]" id="title[]" value=""/>
                            </span>

        <span><strong>Caption</strong></span>
        <textarea name="caption[]" id="caption[]"></textarea>

        <span><strong>Apply link to the image?</strong></span>

        <div>
                                 <span class="bee-metabox-border">
          
                                       <select name="link_type[]" class="select_js" id="link_type[]"><?php

                                           $options_title = array('Select...', 'No link', 'Lightbox', 'Link to this Post', 'Link to Page', 'Link to Category', 'Link manually');

                                           foreach ($options_title as $link_v) {

                                               echo '<option', $slide['link_type'] == $link_v ? ' selected="selected"'
                                                       : '', '>' . $link_v . '</option>';

                                           }?>

                                       </select>
                                </span>
                                
                                <span class="bee-metabox-border url_manualhides"
                                      style="display: none; margin-top:-5px;">
                                        <input type="text" name="url_manual[]" id="url_manual[]"
                                               class="url_manual_visible" value=""/>
                                </span>
                                
                                <span class="bee-metabox-border url_pagehides" style="display: none; margin-top:-5px;">
                                
                                        <select name="url_page[]" id="url_page[]" class="url_page_visible"><?php

                                            $of_pages = array();
                                            $of_pages_obj = get_pages('sort_column=post_parent,menu_order');

                                            foreach ($of_pages_obj as $of_page) {

                                                $of_pages[$of_page->ID] = $of_page->post_name;

                                            }
                                            $page_tmp = array_unshift($of_pages, "Select page");

                                            foreach ($of_pages as $link_v) {

                                                echo '<option', $slide['url_page'] == $link_v ? ' selected="selected"'
                                                        : '', '>' . $link_v . '</option>';

                                            }?>

                                        </select>
                                </span>
                                
                                <span class="bee-metabox-border url_cathides" style="display: none; margin-top:-5px;">
                                
                                        <select name="url_cat[]" id="url_cat[]" class="url_cat_visible"><?php

                                            $of_categories = array();
                                            $of_categories_obj = get_categories('hide_empty=0');
                                            foreach ($of_categories_obj as $of_cat) {

                                                $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;

                                            }
                                            $categories_tmp = array_unshift($of_categories, "Select category");

                                            foreach ($of_categories as $link_v) {

                                                echo '<option', $slide['url_cat'] == $link_v ? ' selected="selected"'
                                                        : '', '>' . $link_v . '</option>';

                                            }?>

                                        </select>
                                </span>
        </div>
    </div>

    <div class="sm-option">

        <div class="sm-option-delete"></div>

    </div>

    <div class="clear"></div>

</div>

    <?php } ?>


</div>

<div class="clear"></div>
<div class="appendoButtons">
    <div class="appendoButtonsdiv">Add new Image</div>
    <div class="appendoButtons-embed">Add new Video</div>
    <div class="clear"></div>
</div>


                                                                                  <?php

}

add_action('save_post', 'bee_sm_save', 1, 2);

global $slides;
function bee_sm_save($post_id, $post)
{
    global $slides;


    // verify this came from the our screen and with proper authorization,

    // because save_post can be triggered at other times

    if (!wp_verify_nonce($_POST['eventmeta_noncename'], plugin_basename(__FILE__))) {

        return $post->ID;

    }


    // Is the user allowed to edit the post or page?

    if (!current_user_can('edit_post', $post->ID))

        return $post->ID;


    // Add values of $events_meta as custom fields

    // Add values of $events_meta as custom fields
    $slides = array();
    foreach ($_POST['src'] as $key => $value) {
        $slides[] = array(
            'src' => $value,
            'title' => $_POST['title'][$key],
            'caption' => $_POST['caption'][$key],
            'link_type' => $_POST['link_type'][$key],
            'url_manual' => $_POST['url_manual'][$key],
            'url_page' => $_POST['url_page'][$key],
            'url_cat' => $_POST['url_cat'][$key]
        );
    }


    update_post_meta($post->ID, 'slides', $slides);


}


// METABOX INIT 
function bee_metabox_init()
{

    if (is_admin()) {

        // scripts
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('jquery-appendo', BEE_URL . '/js/jquery.appendo.js', false, '1.0', false);
        wp_enqueue_script('bee-metabox-js', BEE_URL . '/js/metabox.js', false, '1.0', false);

        // styles
        wp_enqueue_style('bee-metabox-style', BEE_URL . '/css/metabox.css', false, '1.0', 'all');


    }

}

add_action('admin_init', 'bee_metabox_init');


$of_categories = array();
$of_categories_obj = get_terms('portfolio_taxonomy', $args);
$categories_tmp = array_unshift($of_categories, 'Select...', 'All');
foreach ($of_categories_obj as $of_cat) {

    $of_categories[$of_cat->slug] = $of_cat->slug;

}
// $categories_tmp = array_unshift($of_categories, "Select category");

//foreach ($of_categories as $link_v ) {

//echo '<option', $slide['url_cat'] == $link_v ? ' selected="selected"' : '', '>'. $link_v .'</option>';

//}


$madza = 'madza_';

$meta_box = array(
    'id' => 'my-meta-box',
    'title' => 'Page Options',
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        //1-select
        array(
            'name' => 'Header:',
            'desc' => 'Select header type.',
            'id' => $madza . 'header_type',
            'type' => 'select',
            'options' => array('Select...', 'No header image or slider', 'beeCodes Slider', 'Anything Slider', 'Nivo Slider', 'Image from URL')
        ),
        //2-text
        array(
            'name' => 'Image URL:',
            'desc' => 'Enter Image URL here if selected "Image from URL", included http://',
            'id' => $madza . 'header_url',
            'type' => 'text',
            'std' => ''
        ),
        //3-select
        array(
            'name' => 'Title Type:',
            'desc' => 'Select page title type.',
            'id' => $madza . 'title_type',
            'type' => 'select',
            'options' => array('Title only', 'SubTitle only', 'Title & SubTitle text', 'disable')
        ),
        //4-textare
        array(
            'name' => 'SubTitle:',
            'desc' => 'Enter custom SubTitle text, can use HTML atributes.',
            'id' => $madza . 'custom_text',
            'type' => 'textarea',
            'std' => ''
        ),
        //5-select
        array(
            'name' => 'Sidebar:',
            'desc' => 'Select sidebar position.',
            'id' => $madza . 'sidebar_type',
            'type' => 'select',
            'options' => array('Select...', 'Right', 'Left')
        ),
        //6-select
        array(
            'name' => 'Comment:',
            'desc' => 'Enable or disable comments.',
            'id' => $madza . 'comment',
            'type' => 'select',
            'options' => array('Select...', 'No', 'Yes')
        ),
        //7-checkbox
        array(
            'name' => 'SubPages:',
            'desc' => 'Turn ON/OFF Subpages in sidebar.',
            'id' => $madza . 'subpages',
            'type' => 'checkbox',
            'std' => ''
        ),
        //8-checkbox
        array(
            'name' => 'ParentPages:',
            'desc' => 'Turn ON/OFF ParentPages in sidebar.',
            'id' => $madza . 'parentpages',
            'type' => 'checkbox',
            'std' => ''
        ),
        //9-checkbox
        array(
            'name' => 'Categories:',
            'desc' => 'Turn ON/OFF Categories in sidebar.',
            'id' => $madza . 'categories',
            'type' => 'checkbox',
            'std' => ''
        ),
        //10-checkbox
        array(
            'name' => 'Page Widgets:',
            'desc' => 'Turn ON/OFF page widget in sidebar.',
            'id' => $madza . 'widget_1',
            'type' => 'checkbox',
            'std' => ''
        ),
        //11-checkbox
        array(
            'name' => 'Blog Widgets:',
            'desc' => 'Turn ON/OFF blog widget in sidebar.',
            'id' => $madza . 'widget_2',
            'type' => 'checkbox',
            'std' => ''
        ),
        //12-checkbox
        array(
            'name' => 'Contact Page Widgets:',
            'desc' => 'Turn ON/OFF contact page widget in sidebar.',
            'id' => $madza . 'widget_3',
            'type' => 'checkbox',
            'std' => ''
        ),
        //13-select
        array(
            'name' => 'Portfolio Category',
            'desc' => 'Only if selected portfolio template',
            'id' => $madza . 'portfolio_cat',
            'type' => 'select',
            'options' => $of_categories
        ),


    )
);

add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box()
{
    global $meta_box;

    add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function mytheme_show_box()
{
    global $meta_box, $post;


    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
        '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
        '<td>';
        switch ($field['type']) {
            //1-select
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>',
                '<br />', $field['desc'];
                break;
            //2-text
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta
                        : $field['std'], '" size="30" style="width:97%" />',
                '<br />', $field['desc'];
                break;
            //3-select    
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>', '<br />', $field['desc'];
                break;
            //4-textarea
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '"  size="30" style="width:97%" >', $meta
                        ? $meta : $field['std'], '</textarea>',
                '<br />', $field['desc'];
                break;
            //5-select
            case 'select':
                echo '<select multiple="multiple" size="2" name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>', '<br />', $field['desc'];
                break;
            //6-select
            case 'select':
                echo '<select multiple="multiple" size="2" name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>', '<br />', $field['desc'];
                break;
            //7-checkbox    
            case "checkbox":
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta
                        ? ' checked="checked"' : '', ' />', '<br />', $field['desc'];
                break;
            //8-checkbox
            case "checkbox":
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '" value="true" ', $meta
                        ? ' checked="checked"' : '', ' />', '<br />', $field['desc'];
                break;
            //9-checkbox
            case "checkbox":
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta
                        ? ' checked="checked"' : '', ' />', '<br />', $field['desc'];
                break;
            //10-checkbox
            case "checkbox":
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta
                        ? ' checked="checked"' : '', ' />', '<br />', $field['desc'];
                break;
            //11-checkbox
            case "checkbox":
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta
                        ? ' checked="checked"' : '', ' />', '<br />', $field['desc'];
                break;
            //11-checkbox
            case "checkbox":
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta
                        ? ' checked="checked"' : '', ' />', '<br />', $field['desc'];
                break;
            //12-checkbox
            case "checkbox":
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta
                        ? ' checked="checked"' : '', ' />', '<br />', $field['desc'];
                break;
            //13-checkbox
            case 'select':
                echo '<select  name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>', '<br />', $field['desc'];
                break;


        }
        echo     '<td>',
        '</tr>';
    }

    echo '</table>';
}

add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id)
{
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

/*PORTFOLIO META BOX*/

$portfolio = 'madza_portfolio_';

$meta_box_portfolio = array(
    'id' => 'my-meta-box',
    'title' => 'Hover Text',
    'page' => 'portfolio',
    'context' => 'side',
    'priority' => 'high',
    'fields' => array(

        array(
            'name' => 'Hover Text:',
            'desc' => 'Enter hover text here, max 350 characters.',
            'id' => $portfolio . 'hover_text',
            'type' => 'textarea',
            'std' => ''
        ),


    )
);

$meta_box_portfolio_sm = array(
    'id' => 'my-meta-box-sm',
    'title' => 'Feature Media',
    'page' => 'portfolio',
    'context' => 'normal',
    'priority' => 'high',
);


add_action('admin_menu', 'mytheme_add_box_portfolio');

// Add meta box
function mytheme_add_box_portfolio()
{
    global $meta_box_portfolio, $meta_box_portfolio_sm;

    add_meta_box($meta_box_portfolio['id'], $meta_box_portfolio['title'], 'mytheme_show_box_portfolio', $meta_box_portfolio['page'], $meta_box_portfolio['context'], $meta_box_portfolio['priority']);
    add_meta_box($meta_box_portfolio_sm['id'], $meta_box_portfolio_sm['title'], 'bee_sm_wrap', $meta_box_portfolio_sm['page'], $meta_box_portfolio_sm['context'], $meta_box_portfolio_sm['priority']);

}

// Callback function to show fields in meta box
function mytheme_show_box_portfolio()
{
    global $meta_box_portfolio, $post;


    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box_portfolio['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        switch ($field['type']) {

            case 'textarea':
                echo '<textarea maxlength=350 name="', $field['id'], '" id="', $field['id'], '"  size="30" style="width:97%" >', $meta
                        ? $meta : $field['std'], '</textarea>',
                '<br />', $field['desc'];
                break;

        }
    }

    echo '</table>';
}

add_action('save_post', 'mytheme_save_data_portfolio');

// Save data from meta box
function mytheme_save_data_portfolio($post_id)
{
    global $meta_box_portfolio;

    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box_portfolio['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

?>