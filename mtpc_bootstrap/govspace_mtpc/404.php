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

    <h1><?php _e('Not Found', "madza_translate"); ?></h1>

    <p><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help.', "madza_translate"); ?></p>
    <script type="text/javascript">
        // focus on search field after it has loaded
        document.getElementById('s') && document.getElementById('s').focus();
    </script>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>