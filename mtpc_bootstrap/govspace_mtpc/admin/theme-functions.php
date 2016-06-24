<?php

/* These are functions specific to the included option settings and this theme */

/*-----------------------------------------------------------------------------------*/
/* Theme Header Output - wp_head() */
/*-----------------------------------------------------------------------------------*/


//Post excerpt length
function excerpt_length($length)
{
    $shortname = get_option('of_shortname');
    $excerpt = get_option($shortname . '_excerpt');
    return $excerpt;
}

add_filter('excerpt_length', 'excerpt_length');

$_size_headers_fonts = get_option("of_size_headers_fonts");

if ($_size_headers_fonts == "Cufon fonts") {

    function cufon_fonts()
    {

        $shortname = get_option('of_shortname');

        $cufon_font = get_option('of_size_headers_font_cufon');

        $f1 = "ColaborateLight";
        $js1 = "ColaborateLight_400.font.js";
        $f2 = "Colaborate-Regular";
        $js2 = "Colaborate-Regular_400.font.js";
        $f3 = "Diavlo Book";
        $js3 = "Diavlo_Book_400.font.js";
        $f4 = "Aller Light";
        $js4 = "Aller_Light_400.font.js";
        $f5 = "Marketing Script";
        $js5 = "Marketing_Script_400.font.js";
        $f6 = "NeoRetroDraw";
        $js6 = "NeoRetroDraw_400.font.js";
        $f7 = "NeoRetroFill";
        $js7 = "NeoRetroFill_400.font.js";
        $f8 = "Ubuntu-Title";
        $js8 = "Ubuntu-Title_400.font.js";
        $f9 = "UglyQua";
        $js9 = "UglyQua_500.font.js";
        $f10 = "Universal fruitcake";
        $js10 = "Universal_fruitcake_400.font.js";
        $f11 = "Yanone Kaffeesatz Light";
        $js11 = "Yanone_Kaffeesatz_300.font.js";
        $f12 = "Yanone Kaffeesatz Regular";
        $js12 = "Yanone_Kaffeesatz_300.font.js";
        $f13 = "PT Sans Narrow";
        $js13 = "PT_Sans_Narrow_400.font.js";
        $f14 = "Museo 300";
        $js14 = "Museo_300_300.font.js";
        $f15 = "Museo Slab 500";
        $js15 = "Museo_Slab_500_400.font.js";
        $f16 = "Gnuolane Rg";
        $js16 = "Gnuolane_Rg_400.font.js";
        $f17 = "Banda Regular";
        $js17 = "Banda_Regular_400.font.js";
        $f18 = "Mentone Lig";
        $js18 = "Mentone_Lig_600.font.js";
        $f19 = "St Ryde Regular";
        $js19 = "St_Ryde_Regular_400.font.js";
        $f20 = "Calluna";
        $js20 = "Calluna_400.font.js";

        echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/cufon-yui.js" type="text/javascript"></script>';

        if ($cufon_font == $f1) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js1 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f2) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js2 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f3) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js3 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f4) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js4 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f5) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js5 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f6) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js6 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f7) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js7 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f8) {

            echo '<script src="' . OF_DIRECTORY . '/includes/focufon-fontsnts/' . $js8 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f9) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js9 . '" type="text/javascript"></script>';

        }

        if ($cufon_font["fonttype"] == $f10) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js10 . '" type="text/javascript"></script>';

        }

        if ($cufon_font == $f11) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js11 . '" type="text/javascript"></script>';

        }

        if ($cufon_font == $f12) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js12 . '" type="text/javascript"></script>';

        }

        if ($cufon_font == $f13) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js13 . '" type="text/javascript"></script>';

        }

        if ($cufon_font == $f14) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js14 . '" type="text/javascript"></script>';

        }

        if ($cufon_font == $f15) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js15 . '" type="text/javascript"></script>';

        }
        if ($cufon_font == $f16) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js16 . '" type="text/javascript"></script>';

        }
        if ($cufon_font == $f17) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js17 . '" type="text/javascript"></script>';

        }
        if ($cufon_font == $f18) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js18 . '" type="text/javascript"></script>';

        }
        if ($cufon_font == $f19) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js19 . '" type="text/javascript"></script>';

        }
        if ($cufon_font == $f20) {

            echo '<script src="' . OF_DIRECTORY . '/includes/cufon-fonts/' . $js20 . '" type="text/javascript"></script>';

        }


        echo'<script type="text/javascript">
             
                        Cufon.replace("h1,h2,h3,h4,h5,h6,h1 a,h2 a,h3 a,h4 a,h5 a,h6 a,.nav li a strongs, #title-button,.big-button ", { hover: true, fontFamily: "';
        if ($cufon_font) {
            echo $cufon_font;
        } else {
            echo "PT Sans Narrow";
        }
        echo '" });';

        echo '</script>';

    }

    add_action('wp_head', 'cufon_fonts');

}

/*-----------------------------------------------------------------------------------*/
/* Output CSS from standarized options */
/*-----------------------------------------------------------------------------------*/

function of_head_css()
{

    $shortname = get_option('of_shortname');
    $output = '';

    $custom_css = get_option('_custom_style');

    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }

    // Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }

}

add_action('wp_head', 'of_head_css');
/*-----------------------------------------------------------------------------------*/
/* Add Body Classes for Layout
/*-----------------------------------------------------------------------------------*/

// This used to be done through an additional stylesheet call, but it seemed like
// a lot of extra files for something so simple. Adds a body class to indicate sidebar position.

function of_blog_layout()
{
    $shortname = get_option('of_shortname');
    $layout = get_option($shortname . '_blog_layout');
    if ($layout == 'left') {
        echo "left";
    }
    if ($layout == "right") {
        echo "right";
    }

}

function of_page_layout()
{
    $shortname = get_option('of_shortname');
    $layout = get_option($shortname . '_page_layout');
    if ($layout == 'left') {
        echo "left";
    }
    if ($layout == "right") {
        echo "right";
    }

}

function of_single_layout()
{
    $shortname = get_option('of_shortname');
    $layout = get_option($shortname . '_single_layout');
    if ($layout == 'left') {
        echo "left";
    }
    if ($layout == "right") {
        echo "right";
    }

}

/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/

function childtheme_favicon()
{
    echo "bloginfo";
}


/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function childtheme_analytics()
{
    $shortname = get_option('of_shortname');
    $output = get_option($shortname . '_google_analytics');
    if ($output <> "")
        echo stripslashes($output) . "\n";
}

function _custom_code()
{
    $shortname = get_option('of_shortname');
    $output = get_option($shortname . '_custom_code');
    if ($output <> "")
        echo stripslashes($output) . "\n";
}