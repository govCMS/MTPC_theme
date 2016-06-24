<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<!-- FULL PAGE -->

<div id="full-page">

    <?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php the_content(__('<div class="read_more">Read More &raquo;</div>', 'Gooseo')); ?>

        <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'Gooseo'), 'after' => '</div>')); ?>

        <div class="clear"></div>

    </div><!--END post -->

    <?php comments_template('', true); ?>

    <?php endwhile; ?>

</div><!--END FULL PAGE -->

<?php get_footer(); ?>

