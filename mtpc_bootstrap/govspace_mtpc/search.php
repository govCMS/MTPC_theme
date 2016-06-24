<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */
?>
<?php get_header(); ?>


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

    <?php if (have_posts()) : ?>
    <?php get_template_part('loop', 'search'); ?>
    <?php else : ?>
    <div id="post-0" class="post no-results not-found">
        <h2 class="entry-title"><?php _e('Nothing Found', "madza_translate"); ?></h2>

        <div class="entry-content">
            <p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', "madza_translate"); ?></p>

        </div>
    </div>
    <?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
