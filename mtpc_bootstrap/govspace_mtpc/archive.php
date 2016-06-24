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

    if (have_posts())
        the_post();
    ?>

    <h4 class="page-title">
        <?php if (is_day()) : ?>
        <?php printf(__('Daily Archives: <span>%s</span>', 'madza_translate'), get_the_date()); ?>
        <?php elseif (is_month()) : ?>
        <?php printf(__('Monthly Archives: <span>%s</span>', 'madza_translate'), get_the_date('F Y')); ?>
        <?php  elseif (is_year()) : ?>
        <?php printf(__('Yearly Archives: <span>%s</span>', 'madza_translate'), get_the_date('Y')); ?>
        <?php  else : ?>
        <?php _e('Blog Archives', 'madza_translate'); ?>
        <?php endif; ?>
    </h4>

<?php
rewind_posts();
    get_template_part('loop', 'archive');
    ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
