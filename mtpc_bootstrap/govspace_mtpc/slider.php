<?php

/*
Template Name: Slider
*/

get_header(); ?>

<div id="container">
    <div id="content" role="main">

        <?php if (have_posts()) while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (is_front_page()) { ?>
            <h2 class="entry-title"><?php the_title(); ?></h2>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>

            <div class="entry-content">
                <script type="text/javascript">
                    $(window).load(function() {
                        $('#slider').nivoSlider();
                    });
                </script>

                <div id="slider">
                    <?php foreach ($slides as $num => $slide) : ?>

                    <?php if ($slide['link'] != '') echo '<a href="' . $slide['link'] . '">'; ?>
                    <img src="<?php echo $slide['src'] ?>" alt="" title="<?php echo $slide['caption']; ?>">
                    <?php if ($slide['link'] != '') echo '</a>'; ?>

                    <?php endforeach; ?>
                </div>

            </div>
            <!-- .entry-content -->
        </div><!-- #post-## -->

        <?php comments_template('', true); ?>

        <?php endwhile; ?>

    </div>
    <!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>