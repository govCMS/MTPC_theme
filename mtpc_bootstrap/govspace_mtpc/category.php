<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */

get_header(); ?>
<?php

$sidebar_key = "madza_sidebar_type";
$sidebar = get_post_meta($post->ID, $sidebar_key, true);

?>

<!--TEXT CONTENT -->
<div class="<?php 

if ($sidebar == "Right") {
    echo "right-content";
} else if ($sidebar == "Left") {
    echo "left-content";
}

else {

    echo of_blog_layout();
    echo "-content";

} ?>">

<?php
$category_description = category_description();
    if (!empty($category_description))
        echo '<div class="archive-meta">' . $category_description . '</div>';


    get_template_part('loop', 'category');
    ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
