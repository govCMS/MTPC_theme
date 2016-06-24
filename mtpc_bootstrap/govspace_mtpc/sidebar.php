<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */
?>

<?php

$sidebar_key = "madza_sidebar_type";
$sidebar = get_post_meta($post->ID, $sidebar_key, true);

$widget_key = "madza_widget_1";
$widget_1 = get_post_meta($post->ID, $widget_key, true);

$widget_key = "madza_widget_2";
$widget_2 = get_post_meta($post->ID, $widget_key, true);

$widget_key = "madza_widget_3";
$widget_3 = get_post_meta($post->ID, $widget_key, true);

$category_key = "madza_categories";
$category = get_post_meta($post->ID, $category_key, true);

$subpage_key = "madza_subpage";
$subpage = get_post_meta($post->ID, $subpage_key, true);

$flickr_key = "madza_flickr";
$flickr = get_post_meta($post->ID, $flickr_key, true);

$twitter_key = "madza_twitter";
$twitter = get_post_meta($post->ID, $twitter_key, true);

$subpage_key = "madza_subpages";
$subpage = get_post_meta($post->ID, $subpage_key, true);

$parentpage_key = "madza_parentpages";
$parentpage = get_post_meta($post->ID, $parentpage_key, true);

$checkbox = "on";

if (get_option('of_contact_widget_position') == "right") {

    $class = 'class="right-sidebar">';

} else if (get_option('of_contact_widget_position') == "left") {

    $class = 'class="left-sidebar">';

}

?>

<!-- **************************************** RIGHT OR LEFT SIDEBAR **************************************** -->
<div <?php  if (is_page_template('contact-page.php')) {
    echo $class;
} else {
    ?> class="<?php

    if ($sidebar == 'Right') {
        echo 'right-sidebar';
    } else if ($sidebar == 'Left') {
        echo 'left-sidebar';
    }

    else {

        if (is_page()) {
            echo of_page_layout();
            echo '-sidebar';
        }

        else if (is_single()) {
            echo of_single_layout();
            echo '-sidebar';
        }

        else {
            echo of_blog_layout();
            echo '-sidebar';
        }

    } ?>"> <?php } ?>

<!-- PORTS PAGE WIDGETS -->
<?php

if ($widget_1 == $checkbox && get_the_title() == "Ports") {

    if (is_active_sidebar('sidebar-widget-area-4')) : dynamic_sidebar('sidebar-widget-area-4');

    endif;

}
?>

<!-- SUBPAGE AREA -->
<?php

if ($subpage == $checkbox) {

    if ($post->ID) {

        $children2 = wp_list_pages("depth=1&title_li=&child_of=" . $post->ID . "&echo=0");

        $titlenamer2 = get_the_title($post->ID);

    }

    if ($children2) {
        ?>

    <div class="menu_categories">

        <h3><?php echo $titlenamer2; ?></h3>

        <ul>

            <?php echo $children2; ?>

        </ul>

    </div>

        <?php
    }
} ?><!-- END SUBPAGE AREA -->

<!-- PARRENTPAGE AREA -->
<?php

if ($parentpage == $checkbox) {

    if ($post->post_parent) {

        $children = wp_list_pages("depth=1&title_li=&child_of=" . $post->post_parent . "&echo=0");

        $titlenamer = get_the_title($post->post_parent);

    }

    if ($titlenamer) {
        ?>

    <div class="menu_categories">

        <h3><?php echo $titlenamer; ?></h3>

        <ul>

            <?php echo $children; ?>

        </ul>

    </div>

        <?php
    }
} ?><!-- END PARRENTPAGE AREA -->

<!-- CATEGORIES AREA -->
<?php
if (is_page()) {
    if ($category == $checkbox) {
        ?>

    <div class="menu_categories">

        <h3><?php _e("Categories", "madza_translate"); ?></h3>

        <ul>

            <?php wp_list_categories('title_li=&use_desc_for_title=0&orderby=name'); ?>

        </ul>

    </div>

        <?php

    }
}

else if (is_single()) {

    if (get_option('of_single_categories') == "true") {
        ?>

    <div class="menu_categories">

        <h3><?php _e("Categories", "madza_translate"); ?></h3>

        <ul>

            <?php wp_list_categories('title_li=&use_desc_for_title=0&orderby=name'); ?>

        </ul>

    </div>

        <?php

    }
}

else {

    if (get_option('of_blog_categories') == "true") {
        ?>

    <div class="menu_categories">

        <h3><?php _e("Categories", "madza_translate"); ?></h3>

        <ul>

            <?php wp_list_categories('title_li=&use_desc_for_title=0&orderby=name'); ?>

        </ul>

    </div>

        <?php

    }
}




?><!-- END CATEGORIES AREA -->

<!-- WIDGET AREAS -->
<?php
    if (is_page()) {
    if ($widget_1 == $checkbox) {

        if (is_active_sidebar('sidebar-widget-area-1')) : dynamic_sidebar('sidebar-widget-area-1');

        endif;

    }

}

else if (is_single()) {

    if (get_option('of_blog_widget') == "true") {

        if (is_active_sidebar('sidebar-widget-area-2')) : dynamic_sidebar('sidebar-widget-area-2');

        endif;

    }

}

else {

    if (get_option('of_blog_widget') == "true") {

        if (is_active_sidebar('sidebar-widget-area-2')) : dynamic_sidebar('sidebar-widget-area-2');

        endif;

    }

}

if (is_page()) {
    if ($widget_2 == $checkbox) {

        if (is_active_sidebar('sidebar-widget-area-2')) : dynamic_sidebar('sidebar-widget-area-2');

        endif;

    }

}

if (is_page()) {
    if ($widget_3 == $checkbox) {

        if (is_active_sidebar('sidebar-widget-area-3')) : dynamic_sidebar('sidebar-widget-area-3');

        endif;

    }

}

?><!-- END WIDGET AREAS  -->

</div><!--END RIGHT OR LEFT SIDEBAR -->