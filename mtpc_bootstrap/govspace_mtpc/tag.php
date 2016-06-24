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

    echo of_page_layout();
    echo "-content";

} ?>">

    <h1 class="page-title"><?php
    printf(__('Tag Archives: %s', 'Gooseo'), '<span>' . single_tag_title('', false) . '</span>');
        ?></h1>

<?php
 get_template_part('loop', 'tag');
    ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
