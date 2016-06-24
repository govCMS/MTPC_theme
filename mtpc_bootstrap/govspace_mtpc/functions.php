<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 *
 */

/**
 *****************************************************************************************************************
 *** DIRECTORY  **************************************************************************************************
 *****************************************************************************************************************
 */

if (STYLESHEETPATH == TEMPLATEPATH) {
    define('OF_FILEPATH', TEMPLATEPATH);
    define('OF_DIRECTORY', get_template_directory_uri());
} else {
    define('OF_FILEPATH', STYLESHEETPATH);
    define('OF_DIRECTORY', get_stylesheet_directory_uri());
}

/**
 *****************************************************************************************************************
 *** BASIC HOOKS  ************************************************************************************************
 *****************************************************************************************************************
 */
function set_javascript_url()
{
    ?>
<script>
    var templateUrl = '<?php echo get_template_directory_uri(); ?>';
</script>
<?php

}

add_action('admin_head', 'set_javascript_url');
function jquery_scripts()
{
    if (!is_admin()) {

        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js', false);
        wp_enqueue_script('jquery');
        //        wp_enqueue_script('nivo_slider', get_template_directory_uri() . '/includes/nivo/jquery.nivo.slider.js', array('jquery'));
        wp_enqueue_script('effect_directory', get_template_directory_uri() . '/includes/effects.js', array('jquery'));
        wp_enqueue_script('png_fix', get_template_directory_uri() . '/includes/jquery.pngFix.js', array('jquery'));
        wp_enqueue_script('quicksand', get_template_directory_uri() . '/includes/jquery.quicksand.js', array('jquery'));
        wp_enqueue_script('pretty_photo', get_template_directory_uri() . '/includes/prettyphoto/js/jquery.prettyPhoto.js', array('jquery'));
        //        wp_enqueue_script('anything_slider', get_template_directory_uri() . '/includes/sliders/anything-slider/js/jquery.anythingslider.min.js', array('jquery'));
        //        wp_enqueue_script('anything_slider-fx', get_template_directory_uri() . '/includes/sliders/anything-slider/js/jquery.anythingslider.fx.min.js', array('jquery'));
        wp_enqueue_script('drop-down-menu', get_template_directory_uri() . '/includes/drop-down-menu/tinydropdown.js', array('jquery'));
        //        wp_enqueue_script('image-zoom', get_template_directory_uri() . '/includes/portfolio-hover/imagezoom.js', array('jquery'));
        wp_enqueue_script('colorpicker-demo', get_template_directory_uri() . '/admin/js/colorpicker.js', array('jquery'));
        wp_enqueue_script('contact-form', get_template_directory_uri() . '/includes/contact-form/js/jquery.jigowatt.js', array('jquery'));
        wp_enqueue_script('circle-plugin', get_template_directory_uri() . '/includes/jquery.cycle.all.min.js', array('jquery'));
        wp_enqueue_script('easing', get_template_directory_uri() . '/includes/jquery.easing.1.3.js', array('jquery'));
        wp_enqueue_script('image-loader', get_template_directory_uri() . '/includes/jquery.krioImageLoader.js', array('jquery'));
        wp_enqueue_script('cokie', get_template_directory_uri() . '/includes/jquery-cokie.js', array('jquery'));

        wp_enqueue_style('colorpicker-style-demo', get_template_directory_uri() . '/admin/css/colorpicker.css');
        wp_enqueue_style('image-zoom-style', get_template_directory_uri() . '/includes/portfolio-hover/imagezoom.css');
        //        wp_enqueue_style('anything_slider_style', get_template_directory_uri() . '/includes/sliders/anything-slider/css/anythingslider.css');
        wp_enqueue_style('shortcode_style', get_template_directory_uri() . '/css/shortcodes.css');
        //        wp_enqueue_style('nivo_style', get_template_directory_uri() . '/includes/nivo/nivo-slider.css');
        wp_enqueue_style('prettyphoto_style', get_template_directory_uri() . '/includes/prettyphoto/css/prettyPhoto.css');
        wp_enqueue_style('shortcode_style', get_template_directory_uri() . '/css/shortcodes.css');
    }
}

add_action('init', 'jquery_scripts');


/** HEADER HOOKS **/
function jquery_plugins()
{

    if (!is_admin()) { // instruction to only load if it is not the admin area


        /** PLUGIN HOOKS **/
        ?>
    <?php if (is_singular()) wp_enqueue_script("comment-reply"); ?>
    <?php if (get_option("of_size_headers_fonts") == 'Google fonts') { ?>

        <link href='http://fonts.googleapis.com/css?family=<?php echo get_option("of_size_headers_font_type"); ?>'
              rel='stylesheet' type='text/css'>

        <?php } ?>
    <?php if (is_page_template('contact-page.php')) { ?>
        <script type="text/javascript">VideoJS.setupAllWhenReady();</script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript">
            var map;
            function initialize() {
                var myLatlng = new google.maps.LatLng(<?php echo get_option("of_contact_map_latitudes"); ?>,<?php echo get_option("of_contact_map_longitudes"); ?>);
                var myOptions = {
                    zoom: <?php echo get_option("of_contact_map_zoom"); ?>,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                google.maps.event.addListener(map, 'zoom_changed', function() {
                    setTimeout(moveToDarwin, 3000);
                });

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title:"<?php echo get_option("of_contact_map_address"); ?>"
                });
                google.maps.event.addListener(marker, 'click', function() {
                    map.setZoom(<?php echo get_option("of_contact_map_zoom"); ?>);
                });
            }
            function moveToDarwin() {
                var darwin = new google.maps.LatLng(<?php echo get_option("of_contact_map_latitudes"); ?>,<?php echo get_option("of_contact_map_longitudes"); ?>);
                map.setCenter(darwin);
            }

        </script>
        <?php
        }

        // Load the interactive map for the Ports page
        if (get_the_title() == "Ports") {
            ?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/ports-map.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                loadPortsMap();
            });</script>
        <?php

        }
        ?>

    <!--[if lt IE 7]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
    <![endif]-->
    <!--[if IE 6]>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
    <![endif]-->
    <!--[if IE 8]>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
    <![endif]-->
    <link rel="icon" href="<?php echo get_option('of_custom_favicon'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo get_option('of_custom_favicon'); ?>" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">




    <script type="text/javascript">
        $(document).ready(function() {
            $("#content-full, .beeCodes-slide-1, .beeCodes-slider, .beeCodes-slide-3").krioImageLoader();
        });
        $(document).ready(function() {
            $(document).pngFix();
        });
    </script>
    <?php
    /** CUSTOM HOOKS **/
        require_once (OF_FILEPATH . '/css/style.php'); // Theme style settings

        if (get_option("of_custom_style")) {
            ?>

        <style type="text/css"> <?php
    echo get_option('of_custom_style');
            ?>
        </style> <?php

        }

        /** lt IE 8 style fixes: */
        ?>
    <!--[if lt IE 8]>
    <style type="text/css">
        .home .home-tile {
            display: inline;
        }

        #footer_menu {
            margin-right: 359.5px;
        }
    </style>
    <![endif]-->

    <?php

    }
}

add_action('wp_head', 'jquery_plugins');


/** FOOTER HOOKS **/
function jquery_plugins_footer()
{

    if (!is_admin()) {
        ?>

    <script type="text/javascript">

        var dropdown = new TINY.dropdown.init("dropdown", {id:'menu', active:'menuhover'});

        $(document).ready(function() {
            $("a[rel^='prettyPhoto']").prettyPhoto();
        });

    </script>

    <?php

        //ADMIN PANEL CUSTOM CODE
        echo get_option('of_custom_code');

        //ADMIN PANEL GOOGLE ANALYTICS
        echo get_option('of_google_analytics');
    }
}

add_action('wp_footer', 'jquery_plugins_footer');
/**
 *****************************************************************************************************************
 *** GENERAL OPTIONS  ********************************************************************************************
 *****************************************************************************************************************
 */

/**
 * CONTACT FORM FOOTER WIDGET
 */
class FooterContactForm extends WP_Widget
{

    function FooterContactForm()
    {
        parent::WP_Widget(false, $name = 'Footer Contact Form');
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $text = apply_filters('widget_title', $instance['text']);
        $email = apply_filters('widget_title', $instance['email']);
        ?>
    <?php echo $before_widget; ?>


    <?php if ($title) {
        echo $before_title . $title . $after_title;
    }
        ?>
    <?php if ($text) { ?>
    <div class="textwidget"><p><?php echo $text ?></p></div>
    <?php } ?>
    <div id="contact_form_holder">
        <form action="<?php echo get_template_directory_uri(); ?>/includes/send_email.php" method="post"
              id="contact_form">


            <div><input type="text" name="name" id="name"
                        onfocus="if(this.value=='<?php _e('Name', "madza_translate"); ?>')this.value='';"
                        onblur="if(this.value=='')this.value='<?php _e('Name', "madza_translate"); ?>';"
                        value="<?php _e('Name', "madza_translate"); ?>"></div>

            <div class="clear"></div>
            <div><input type="text" name="email" id="email"
                        onfocus="if(this.value=='<?php _e('E-mail', "madza_translate"); ?>')this.value='';"
                        onblur="if(this.value=='')this.value='<?php _e('E-mail', "madza_translate"); ?>';"
                        value="<?php _e('E-mail', "madza_translate"); ?>"></div>
            <input type="text" name="email_to" style="display: none;" value="<?php echo $email; ?>" id="email_to">
            <input type="text" name="subject" style="display: none;"
                   value="<?php _e('Contact Form', "madza_translate"); ?>" id="subject">

            <div><textarea name="message" rows="6" id="message"></textarea></div>


            <input type="submit" id="send_message" value="<?php _e('Send', "madza_translate"); ?>">

            <div class="clear"></div>
            <div id="mail_success" class="success"><img
                    src="<?php echo get_template_directory_uri(); ?>/images/success.png"><?php _e('Thank You!', "madza_translate"); ?>
            </div>
            <div id="mail_fail" class="error"><img
                    src="<?php echo get_template_directory_uri(); ?>/images/error.png"><?php _e('Sorry! Try later.', "madza_translate"); ?>
            </div>

        </form>
    </div>



    <?php echo $after_widget; ?>
    <?php

    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);
        $instance['email'] = strip_tags($new_instance['email']);
        return $instance;
    }

    function form($instance)
    {
        $title = esc_attr($instance['title']);
        $text = esc_attr($instance['text']);
        $email = esc_attr($instance['email']);
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', "madza_translate"); ?> <input
            class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
            name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></label></p>

    <p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', "madza_translate"); ?> <textarea
            class="widefat" id="<?php echo $this->get_field_id('text'); ?>"
            name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></label></p>

    <p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Your e-mail:', "madza_translate"); ?> <input
            class="widefat" id="<?php echo $this->get_field_id('email'); ?>"
            name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>"/></label></p>
    <?php

    }

}

add_action('widgets_initss', create_function('', 'return register_widget("FooterContactForm");'));


add_action('after_setup_theme', 'Gooseo_setup');
if (!function_exists('Gooseo_setup')):
    function Gooseo_setup()
    {

        add_editor_style();

        remove_filter('the_content', 'shortcode_unautop');

        function remove_wpautop($content)
        {
            $content = do_shortcode(shortcode_unautop($content));
            $content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);
            return $content;
        }

        function formatter($content)
        {
            $new_content = '';
            $pattern_full = '{(\[raw\].*?\[/raw\])}is';
            $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
            $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
            foreach ($pieces as $piece) {
                if (preg_match($pattern_contents, $piece, $matches)) {
                    $new_content .= $matches[1];
                } else {
                    $new_content .= wptexturize(wpautop($piece));
                }
            }
            return $new_content;
        }

        remove_filter('the_content', 'wpautop');
        remove_filter('the_content', 'wptexturize');
        add_filter('the_content', 'formatter', 99);
        add_filter('the_content', 'shortcode_unautop');
        add_filter('widget_text', 'shortcode_unautop');
        add_filter('widget_text', 'do_shortcode');

        add_theme_support('post-thumbnails');

        add_theme_support('automatic-feed-links');

        if (!isset($content_width))
            $content_width = 600;

        //TRANLATION
        load_theme_textdomain('madza_translate', TEMPLATEPATH . '/languages');

        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if (is_readable($locale_file))
            require_once($locale_file);
        //END TRANLATION

        //MENU
        register_nav_menus(array(
                                'header_menu' => __('Header Navigation', 'madza_translate'),
                           ));

        register_nav_menus(array(
                                'footer_menu' => __('Footer Navigation', 'madza_translate'),
                           ));
        //END MENU

        set_post_thumbnail_size(600, 200, true);

    }
endif;

function Gooseo_page_menu_args($args)
{
    $args['show_home'] = true;
    return $args;
}

add_filter('wp_page_menu_args', 'Gooseo_page_menu_args');


//Continue Reading
function Gooseo_continue_reading_link()
{
    return ' <div class="more-diva-2"><span class="more-link-2"><a href="' . get_permalink() . '">' . __('Read More', "madza_translate") . '</a></span></div>';
}

add_action('Gooseo_continue_reading_link', 'Gooseo_continue_reading_link');
function Gooseo_auto_excerpt_more($more)
{
    return ' &hellip;' . Gooseo_continue_reading_link();
}

add_filter('excerpt_more', 'Gooseo_auto_excerpt_more');

function Gooseo_custom_excerpt_more($output)
{
    if (has_excerpt() && !is_attachment()) {
        $output .= Gooseo_continue_reading_link();
    }
    return $output;
}

add_filter('get_the_excerpt', 'Gooseo_custom_excerpt_more');


function new_excerpt_length($length)
{
    return get_option("of_excerpt");
}

add_filter('excerpt_length', 'new_excerpt_length');

function get_required_page($page = '')
{
    global $wpdb;

    $result = wp_cache_get($page . '-guid', __FUNCTION__);

    if ($result === false) {
        $result = $wpdb->get_var("SELECT p.guid
					FROM $wpdb->posts p
					WHERE p.post_status = 'publish'
					AND p.post_title = '{$page}' ");

        if ($result) {
            wp_cache_add($page . '-guid', $result, __FUNCTION__);
        }
    }
    return $result;
}

/**
 *****************************************************************************************************************
 *** COMENT FUNCTION  ********************************************************************************************
 *****************************************************************************************************************
 */
if (!function_exists('Gooseo_comment')) :

    function Gooseo_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case '' :
                ?>

                <div id="comment-<?php comment_ID(); ?>">
                    <div class="comment_vcard">
                        <div class="comment_photo">
                            <?php echo get_avatar($comment, 40); ?>
                            <div class="clear"></div>
                        </div>
                        <div class="comment_text">
                            <div class="comment_name"><?php printf(__('<h5>%s</h5>', 'madza_translate'), sprintf('%s', get_comment_author_link())); ?></div>
                            <div class="comment_date">

                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <?php
                                                            /* translators: 1: date, 2: time */
                                    printf(__('%1$s at %2$s', 'madza_translate'), get_comment_date(), get_comment_time()); ?></a><?php edit_comment_link(__('(Edit)', 'madza_translate'), ' ');
                                ?>


                            </div>
                            <div class="comment_conent"><?php comment_text(); ?></div>
                            <div class="reply_link"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div>

                        </div>


                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.', 'madza_translate'); ?></em>
                    <br/>
                    <?php endif; ?>
                </div><!-- #comment-##  -->

                                    <?php
                                                break;
            case 'pingback'  :
            case 'trackback' :
                ?>
                <li class="post pingback">
                    <p><?php _e('Pingback:', 'madza_translate'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', "madza_translate")); ?></p>
                    <?php
                                                break;
        endswitch;
    }
endif;

function my_search_form($form)
{

    $form = '<h2>Search</h2>
    
        <form method="get" id="searchform" action="' . home_url('/') . '/">
        
            <div id="search_icon"></div>
            
            <input type="text" value="' . the_search_query() . '" name="s" id="s3" class="search_input3" />
            
            <div id="searchsubmit_div_3"><input type="submit" id="searchsubmit3" value="' . esc_attr__('Search') . '" class="search_submit3"/></div>
           
        </form>
    
   ';

    return $form;
}

add_filter('get_search_form', 'my_search_form');

/**
 *****************************************************************************************************************
 *** WIDGET AREAS  ***********************************************************************************************
 *****************************************************************************************************************
 */
function sidebar_widget_1()
{
    register_sidebar(array(
                          'name' => __('Page Sidebar Widget Area'),
                          'id' => 'sidebar-widget-area-1',
                          'description' => __('The page sidebar widget area'),
                          'before_widget' => '<div class="menu_categories">',
                          'after_widget' => '</div>',
                          'before_title' => '<h3>',
                          'after_title' => '</h3>',
                     ));
}

add_action('widgets_init', 'sidebar_widget_1');

function sidebar_widget_2()
{
    register_sidebar(array(
                          'name' => __('Blog Sidebar Widget Area'),
                          'id' => 'sidebar-widget-area-2',
                          'description' => __('The blog sidebar widget area'),
                          'before_widget' => '<div class="menu_categories">',
                          'after_widget' => '</div>',
                          'before_title' => '<h3>',
                          'after_title' => '</h3>',
                     ));
}

add_action('widgets_init', 'sidebar_widget_2');

function sidebar_widget_3()
{
    register_sidebar(array(
                          'name' => __('Contact Page Sidebar Widget Area'),
                          'id' => 'sidebar-widget-area-3',
                          'description' => __('The Contact Page sidebar widget area'),
                          'before_widget' => '<div class="menu_categories">',
                          'after_widget' => '</div>',
                          'before_title' => '<h3>',
                          'after_title' => '</h3>',
                     ));
}

add_action('widgets_init', 'sidebar_widget_3');

function sidebar_widget_4()
{
    register_sidebar(array(
                          'name' => __('Ports Page Sidebar Widget Area'),
                          'id' => 'sidebar-widget-area-4',
                          'description' => __('The Ports page sidebar widget area'),
                          'before_widget' => '<div class="menu_categories">',
                          'after_widget' => '</div>',
                          'before_title' => '<h3>',
                          'after_title' => '</h3>',
                     ));
}

add_action('widgets_init', 'sidebar_widget_4');

if (get_option('of_homepage_columns') == '1' OR get_option('of_homepage_columns') == '2' OR get_option('of_homepage_columns') == '3' OR get_option('of_homepage_columns') == '4') {
    function homepage_widget_1()
    {
        register_sidebar(array(
                              'name' => __('Homepage Column 1'),
                              'id' => 'homepage-column-1',
                              'description' => __('Homepage Column 1 Widget Area'),
                              'before_widget' => '<div>',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'homepage_widget_1');
}

if (get_option('of_homepage_columns') == '2' OR get_option('of_homepage_columns') == '3' OR get_option('of_homepage_columns') == '4') {
    function homepage_widget_2()
    {
        register_sidebar(array(
                              'name' => __('Homepage Column 2'),
                              'id' => 'homepage-column-2',
                              'description' => __('Homepage Column 2 Widget Area'),
                              'before_widget' => '<div>',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'homepage_widget_2');
}

if (get_option('of_homepage_columns') == '3' OR get_option('of_homepage_columns') == '4') {
    function homepage_widget_3()
    {
        register_sidebar(array(
                              'name' => __('Homepage Column 3'),
                              'id' => 'homepage-column-3',
                              'description' => __('Homepage Column 3 Widget Area'),
                              'before_widget' => '<div>',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'homepage_widget_3');
}

if (get_option('of_homepage_columns') == '4') {
    function homepage_widget_4()
    {
        register_sidebar(array(
                              'name' => __('Homepage Column 4'),
                              'id' => 'homepage-column-4',
                              'description' => __('Homepage Column 4 Widget Area'),
                              'before_widget' => '<div>',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'homepage_widget_4');
}


if (get_option('of_footer_column_layout_middle') == '01' OR get_option('of_footer_column_layout_middle') == '02' OR get_option('of_footer_column_layout_middle') == '03' OR
    get_option('of_footer_column_layout_middle') == '04' OR get_option('of_footer_column_layout_middle') == '05' OR get_option('of_footer_column_layout_middle') == '06' OR
    get_option('of_footer_column_layout_middle') == '07' OR get_option('of_footer_column_layout_middle') == '08' OR get_option('of_footer_column_layout_middle') == '09' OR
    get_option('of_footer_column_layout_middle') == '010'
) {

    function footer_middle_column_1()
    {
        register_sidebar(array(
                              'name' => __('Footer Column 1'),
                              'id' => 'footer-middle-column-1',
                              'description' => __('Footer Column 1 Widget Area'),
                              'before_widget' => '<div class="footer_widget_middle">',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'footer_middle_column_1');
}


if ((get_option('of_footer_column_layout_middle') == '02') OR (get_option('of_footer_column_layout_middle') == '03') OR
    (get_option('of_footer_column_layout_middle') == '04') OR (get_option('of_footer_column_layout_middle') == '05') OR (get_option('of_footer_column_layout_middle') == '06') OR
    (get_option('of_footer_column_layout_middle') == '07') OR (get_option('of_footer_column_layout_middle') == '08') OR (get_option('of_footer_column_layout_middle') == '09') OR
    (get_option('of_footer_column_layout_middle') == '010')
) {

    function footer_middle_column_2()
    {
        register_sidebar(array(
                              'name' => __('Footer Column 2'),
                              'id' => 'footer-middle-column-2',
                              'description' => __('Footer Column 2 Widget Area'),
                              'before_widget' => '<div class="footer_widget_middle">',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'footer_middle_column_2');
}


if ((get_option('of_footer_column_layout_middle') == '03') OR
    (get_option('of_footer_column_layout_middle') == '04') OR (get_option('of_footer_column_layout_middle') == '05') OR (get_option('of_footer_column_layout_middle') == '06') OR
    (get_option('of_footer_column_layout_middle') == '07') OR (get_option('of_footer_column_layout_middle') == '08') OR (get_option('of_footer_column_layout_middle') == '09') OR
    (get_option('of_footer_column_layout_middle') == '010')
) {

    function footer_middle_column_3()
    {
        register_sidebar(array(
                              'name' => __('Footer Column 3'),
                              'id' => 'footer-middle-column-3',
                              'description' => __('Footer Column 3 Widget Area'),
                              'before_widget' => '<div class="footer_widget_middle">',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'footer_middle_column_3');
}


if ((get_option('of_footer_column_layout_middle') == '04') OR (get_option('of_footer_column_layout_middle') == '05') OR
    (get_option('of_footer_column_layout_middle') == '08') OR
    (get_option('of_footer_column_layout_middle') == '010')
) {

    function footer_middle_column_4()
    {
        register_sidebar(array(
                              'name' => __('Footer Column 4'),
                              'id' => 'footer-middle-column-4',
                              'description' => __('Footer Column 4 Widget Area'),
                              'before_widget' => '<div class="footer_widget_middle">',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'footer_middle_column_4');
}


if ((get_option('of_footer_column_layout_middle') == '05')) {

    function footer_middle_column_5()
    {
        register_sidebar(array(
                              'name' => __('Footer Column 5'),
                              'id' => 'footer-middle-column-5',
                              'description' => __('Footer Column 5 Widget Area'),
                              'before_widget' => '<div class="footer_widget_middle">',
                              'after_widget' => '</div>',
                              'before_title' => '<h2>',
                              'after_title' => '</h2>',
                         ));
    }

    add_action('widgets_init', 'footer_middle_column_5');
}


/**
 *****************************************************************************************************************
 *** COMENT STYLE  ***********************************************************************************************
 *****************************************************************************************************************
 */
function Gooseo_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_filter('Gooseo_remove_recent_comments_style', 'Gooseo_remove_recent_comments_style');

if (!function_exists('Gooseo_posted_on')) :

    function Gooseo_posted_on()
    {
        printf(__('<span class="date_links">%2$s</span>'),
               'meta-prep meta-prep-author',
               sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
                       get_permalink(),
                       esc_attr(get_the_time()),
                       get_the_date()
               ),
               sprintf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                       get_author_posts_url(get_the_author_meta('ID')),
                       sprintf(esc_attr__('View all posts by %s', 'Gooseo'), get_the_author()),
                       get_the_author()
               )
        );
    }

endif;

//POST IN
if (!function_exists('Gooseo_posted_in')) :

    function Gooseo_posted_in()
    {
        // Retrieves tag list of current post, separated by commas.
        $tag_list = get_the_tag_list('', ', ');
        if ($tag_list) {
            $posted_in = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'Gooseo');
        } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
            $posted_in = __('%1$s.', 'Gooseo');
        } else {
            $posted_in = __('Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'Gooseo');
        }
        // Prints the string, replacing the placeholders.
        printf(
            $posted_in,
            get_the_category_list(', '),
            $tag_list,
            get_permalink(),
            the_title_attribute('echo=0')
        );
    }

endif;


/**
 *****************************************************************************************************************
 *** THUMBNAILS SIZES  *******************************************************************************************
 *****************************************************************************************************************
 */

if (get_option("of_nivo_slider_height")) {
    $nivo_h = get_option("of_nivo_slider_height");
} else {
    $nivo_h = "350";
}
if (get_option("of_anything_slider_height")) {
    $anything_h = get_option("of_anything_slider_height");
} else {
    $anything_h = "350";
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('portfolio-full-image', 960, 250, true);
    add_image_size('portfolio-small-image', 320, 320, true);
    add_image_size('portfolio-shortcode', 240, 240, true);
    add_image_size('blog_thumnail_smalls', 220, 230, true);
    add_image_size('blog_thumnail_small', 250, 200, true);
    add_image_size('homepage-thumbnails', 155, 100, true);
    add_image_size('header_image', 960, 300, true);
    add_image_size('beecodes-slider-big', 960, 450, true);
    add_image_size('beecodes-slider-small', 480, 225, true);
    add_image_size('nivo-slider-header', 960, $nivo_h, true);
    add_image_size('anything-slider-header', 960, $anything_h, true);
    add_image_size('show-image', 293, 145, true);
    add_image_size('thumb-small', 150, 150, true);
}


/**
 *****************************************************************************************************************
 *** START MENU  *************************************************************************************************
 *****************************************************************************************************************
 */
class description_walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth, $args)
    {
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $prepend = '<strong>';
        $append = '</strong>';
        $description = !empty($item->description) ? '<span>' . esc_attr($item->description) . '</span>' : '';

        if ($depth != 0) {
            $description = $append = $prepend = "";
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append;
        $item_output .= $description . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }


}


/**
 *****************************************************************************************************************
 *** START PORTFOLIO CUSTOM POST *********************************************************************************
 *****************************************************************************************************************
 */
function my_custom_init()
{
    $labels = array(
        'name' => _x('Portfolio', 'post type general name'),
        'singular_name' => _x('Portfolio', 'post type singular name'),
        'add_new' => _x('Add Item', 'Event Item'),
        'add_new_item' => __('Add New Item'),
        'edit_item' => __('Edit Item'),
        'new_item' => __('New Item'),
        'view_item' => __('View Item Details'),
        'search_items' => __('Search Portfolio Items'),
        'not_found' => __('No portfolio items were found with that criteria'),
        'not_found_in_trash' => __('No portfolio items found in the Trash with that criteria'),
        'view' => __('View Item')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'This is the holding location for all portfolio items',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'rewrite' => true,
        'hierarchical' => true,
        'menu_position' => 27,
        'menu_icon' => 'http://cdn2.iconfinder.com/data/icons/fugue/icon/folder_open_image.png',
        'supports' => array('title', 'editor', 'custom-fields'),
        'register_meta_box_cb' => 'bee_sm_box'
    );

    register_post_type('portfolio', $args);
}

add_action('init', 'my_custom_init');

$labels = array(
    'name' => ('Categories'),
    'singular_name' => ('Categories'),
    'search_items' => __('Search'),
    'popular_items' => __('Popular things'),
    'all_items' => __('Everything'),
    'parent_item' => __('Parent Categories'),
    'parent_item_colon' => __('Parent Categories:'),
    'edit_item' => __('Edit'),
    'update_item' => __('Update'),
    'add_new_item' => __('Add New'),
    'new_item_name' => __('New Name')
);

register_taxonomy('portfolio_taxonomy', array('portfolio'), array(
                                                                 'hierarchical' => true,
                                                                 'labels' => $labels,
                                                                 'show_ui' => true,
                                                                 'query_var' => true,
                                                                 'rewrite' => array('slug' => 'portfolio_taxonomy')
                                                            ));


add_action('init', 'add_button');

function add_button()
{
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_external_plugins', 'add_plugin');
        add_filter('mce_buttons', 'register_button');
    }
}


function register_button($buttons)
{
    array_push($buttons, "quote");
    return $buttons;
}


function add_plugin($plugin_array)
{
    $plugin_array['quote'] = get_template_directory_uri() . '/includes/shortcode-tinyMCE.js';
    return $plugin_array;
}

/**
 *****************************************************************************************************************
 *** THEME OPTION PANEL  *****************************************************************************************
 *****************************************************************************************************************
 */

/* These files build out the options interface.  Likely won't need to edit these. */
require_once (OF_FILEPATH . '/includes/beeCodes-plugins/beeCodes-plugins.php');
require_once (OF_FILEPATH . '/admin/admin-functions.php'); // Custom functions and plugins
require_once (OF_FILEPATH . '/admin/admin-interface.php'); // Admin Interfaces (options,framework, seo)

/* These files build out the theme specific options and associated functions. */

require_once (OF_FILEPATH . '/admin/theme-options.php'); // Options panel settings and custom settings
require_once (OF_FILEPATH . '/admin/theme-functions.php'); // Theme actions based on options settings

/* Other */
require_once (OF_FILEPATH . '/admin/admin_metabox.php'); // Theme metabox settings
require_once (OF_FILEPATH . '/includes/shortcodes.php'); // Theme shortcode settings
require_once (OF_FILEPATH . '/includes/sliders/slider_functions.php'); // Slider Functions settings
require_once (OF_FILEPATH . '/includes/price-list/price-list.php'); // Slider Functions settings
?>