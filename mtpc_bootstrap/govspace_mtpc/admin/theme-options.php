<?php

add_action('init', 'of_options');

if (!function_exists('of_options')) {
    function of_options()
    {

        // VARIABLES
        $themename = get_theme_data(STYLESHEETPATH . '/style.css');
        $themename = $themename['Name'];
        $shortname = "of";
        $shortname_slider = "slider";

        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = get_option('of_options');

        $GLOBALS['template_path'] = OF_DIRECTORY;

        //Access the WordPress Categories via an Array
        $of_categories = array();
        $of_categories_obj = get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
        $categories_tmp = array_unshift($of_categories, "Select a category:");

        //Access the WordPress Pages via an Array
        $of_pages = array();
        $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($of_pages_obj as $of_page) {
            $of_pages[$of_page->ID] = $of_page->post_name;
        }


        // Image Alignment radio box
        $options_thumb_align = array("alignleft" => "Left", "alignright" => "Right", "aligncenter" => "Center");
        $textures = array(
            "None",
            "Grid 1",
            "Grid 2",
            "Modern Blue",
            "Modern Orange",
            "Modern Red",
            "Modern Violet",
            "Modern Yellow",
            "Modern Black",
            "Modern Green",
            "Bokeh 1",
            "Bokeh 2",
            "Bokeh 3",
            "Bokeh 4",
            "Bokeh 5",
            "Square",
            "Square 2",
            "Square 3",
            "Square 4",
            "Right Strip",
            "Right Strip 2",
            "Left Strip",
            "Left Strip 2",
            "Horizontal Strip",
            "Horizontal Strip 2",
            "Horizontal Strip 3",
            "Horizontal Strip 4",
            "Vertical Strip",
            "Vertical Strip 2",
            "Vertical Strip 3",
            "Vertical Strip 4",
        );
        // Image Links to Options
        $options_image_link_to = array("image" => "The Image", "post" => "The Post");

        //Testing
        $options_select = array("", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56");
        $options_radio = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");

        $background_position = array(
            "left" => "left",
            "right" => "right",
            "top" => "top",
            "bottom" => "bottom",
            "center" => "center",
            "inherit" => "inherit",
        );

        $background_repeate = array(
            "inherit" => "inherit",
            "no-repeat" => "no-repeat",
            "repeat" => "repeat",
            "repeat-x" => "repeat-x",
            "repeat-y" => "repeat-y",
        );

        $standart_fonts = array(
            'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
            '"Apple Chancery", "Zapf Chancery", cursive' => '"Apple Chancery", "Zapf Chancery", cursive',
            '"Arial Black", sans-serif' => '"Arial Black", sans-serif',
            'Capitals, serif' => 'Capitals, serif',
            'Charcoal, Chicago, sans-serif' => 'Charcoal, Chicago, sans-serif',
            'Chicago, Charcoal, sans-serif' => 'Chicago, Charcoal, sans-serif',
            '"Comic Sans MS", cursive' => '"Comic Sans MS", cursive',
            '"Courier New", Courier, monospace' => '"Courier New", Courier, monospace',
            'fixedsys, monospace' => 'fixedsys, monospace',
            'Gadget, fantasy' => 'Gadget, fantasy',
            'Geneva, "MS Sans Serif", sans-serif' => 'Geneva, "MS Sans Serif", sans-serif',
            'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
            '"Hoefler Text", serif' => '"Hoefler Text", serif',
            'Impact, sans-serif' => 'Impact, sans-serif',
            'monaco, sans-serif' => 'monaco, sans-serif',
            '"MS Gothic", monospace' => '"MS Gothic", monospace',
            '"MS Sans Serif", Geneva, sans-serif' => '"MS Sans Serif", Geneva, sans-serif',
            '"MS Serif", "New York", serif' => '"MS Serif", "New York", serif',
            '"New York", "MS Serif", serif' => '"New York", "MS Serif", serif',
            'Palatino, serif' => 'Palatino, serif',
            'Sand, fantasy' => 'Sand, fantasy',
            'Skia, sans-serif' => 'Skia, sans-serif',
            'System, sans-serif' => 'System, sans-serif',
            'Tahoma, serif SansSerif Monospace' => 'Tahoma, serifSansSerifMonospace',
            'Techno, Impact, sans-serif' => 'Techno, Impact, sans-serif',
            'Terminal, monospace' => 'Terminal, monospace',
            'Textile, cursive' => 'Textile, cursive',
            '"Times New Roman", Times, serif' => '"Times New Roman", Times, serif',
            '"Times New Roman", serif' => '"Times New Roman", serif',
            '"Trebuchet MS", sans-serif' => '"Trebuchet MS", sans-serif',
            'Verdana, Arial, Helvetica, sans-serif' => 'Verdana, Arial, Helvetica, sans-serif',
            '"VT-100", monospace' => '"VT-100", monospace'
        );

        $cufon_fonts = array(
            "ColaborateLight" => "ColaborateLight",
            "Calluna" => "Calluna",
            "PT Sans Narrow" => "PT Sans Narrow",
            "Museo 300" => "Museo 300",
            "Museo Slab 500" => "Museo Slab 500",
            "Banda Regular" => "Banda Regular"
        );

        $header_fonts = array(
            "Cufon fonts" => "Cufon fonts",
            "Google fonts" => "Google fonts"
        );


        $google_fonts = array(
            "PT+Sans+Narrow" => "PT Sans Narrow",
            "None" => "None",
            "Allan" => "Allan",
            "Allerta" => "Allerta",
            "Allerta+Stencil" => "Allerta Stencil",
            "Amaranth" => "Amaranth",
            "Anonymous+Pro" => "Anonymous Pro",
            "Anton" => "Anton",
            "Architects+Daughter" => "Architects Daughter",
            "Arvo" => "Arvo",
            "Astloch" => "Astloch",
            "Bentham" => "Bentham",
            "Bevan" => "Bevan",
            "Buda" => "Buda",
            "Cabin" => "Cabin",
            "Cabin+Sketch" => "Cabin Sketch",
            "Calligraffitti" => "Calligraffitti",
            "Candal" => "Candal",
            "Cantarell" => "Cantarell",
            "Cardo" => "Cardo",
            "Cherry+Cream+Soda" => "Cherry Cream Soda",
            "Chewy" => "Chewy",
            "Coda:800" => "Coda",
            "Coda+Caption:800" => "Coda Caption",
            "Coming+Soon" => "Coming Soon",
            "Copse" => "Copse",
            "Corben" => "Corben",
            "Cousine" => "Cousine",
            "Covered+By+Your+Grace" => "Covered By Your Grace",
            "Crafty+Girls" => "Crafty Girls",
            "Crimson+Text" => "Crimson Text",
            "Crushed" => "Crushed",
            "Cuprum" => "Cuprum",
            "Dancing+Script" => "Dancing Script",
            "Droid+Sans" => "Droid Sans",
            "Droid+Serif" => "Droid Serif",
            "Droid+Sans+Mono" => "Droid Sans Mono",
            "EB+Garamond" => "EB Garamond",
            "Expletus+Sans" => "Expletus Sans",
            "Fontdiner+Swanky" => "Fontdiner Swanky",
            "Geo" => "Geo",
            "Goudy+Bookletter+1911" => "Goudy Bookletter 1911",
            "Gruppo" => "Gruppo",
            "Homemade+Apple" => "Homemade Apple",
            "IM+Fell+DW+Pica" => "IM Fell DW Pica",
            "Indie+Flower" => "Indie Flower",
            "Inconsolata" => "Inconsolata",
            "Irish+Grover" => "Irish Grover",
            "Irish+Growler" => "Irish Growler",
            "Josefin+Sans" => "Josefin Sans",
            "Josefin+Slab" => "Josefin Slab",
            "Just+Another+Hand" => "Just Another Hand",
            "Just+Me+Again+Down+Here" => "Just Me Again Down Here",
            "Kenia" => "Kenia",
            "Kranky" => "Kranky",
            "Kristi" => "Kristi",
            "Lato" => "Lato",
            "League+Script" => "League Script",
            "Lekton" => "Lekton",
            "Lobster" => "Lobster",
            "Luckiest+Guy" => "Luckiest Guy",
            "Meddon" => "Meddon",
            "Merriweather" => "Merriweather",
            "MedievalSharp" => "Medieval Sharp",
            "Michroma" => "Michroma",
            "Molengo" => "Molengo",
            "Mountains+of+Christmas" => "Mountains of Christmas",
            "Neucha" => "Neucha",
            "Neuton" => "Neuton",
            "Nobile" => "Nobile",
            "Nova+Round" => "Nova Round",
            "Nova+Script" => "Nova Script",
            "Nova+Oval" => "Nova Oval",
            "Nova+Cut" => "Nova Cut",
            "Nova+Slim" => "Nova Slim",
            "Nova+Mono" => "Nova Mono",
            "Nova+Flat" => "Nova Flat",
            "OFL+Sorts+Mill+Goudy+TT" => "OFL Sorts Mill Goudy TT",
            "Old+Standard+TT" => "Old Standard TT",
            "Oswald" => "Oswald",
            "Orbitron" => "Orbitron",
            "Pacifico" => "Pacifico",
            "PT+Sans" => "PT Sans",
            "PT+Sans+Caption" => "PT Sans Caption",
            "PT+Sans+Narrow" => "PT Sans Narrow",
            "PT+Serif" => "PT Serif",
            "PT+Serif+Caption" => "PT Serif Caption",
            "Permanent+Marker" => "Permanent Marker",
            "Philosopher" => "Philosopher",
            "Puritan" => "Puritan",
            "Radley" => "Radley",
            "Raleway" => "Raleway",
            "Reenie+Beanie" => "Reenie Beanie",
            "Rock+Salt" => "Rock Salt",
            "Schoolbell" => "Schoolbell",
            "Slackey" => "Slackey",
            "Sniglet" => "Sniglet",
            "Sunshiney" => "Sunshiney",
            "Syncopate" => "Syncopate",
            "Tangerine" => "Tangerine",
            "Terminal+Dosis+Light" => "Terminal Dosis Light",
            "Tinos" => "Tinos",
            "Ubuntu" => "Ubuntu",
            "UnifrakturCook" => "UnifrakturCook",
            "UnifrakturMaguntia" => "UnifrakturMaguntia",
            "Unkempt" => "Unkempt",
            "Vibur" => "Vibur",
            "Vollkorn" => "Vollkorn",
            "VT323" => "VT323",
            "Walter+Turncoat" => "Walter Turncoat",
            "Yanone+Kaffeesatz" => "Yanone Kaffeesatz",
            "Quattrocento" => "Quattrocento",


        );

        //Stylesheets Reader
        $alt_stylesheet_path = OF_FILEPATH . '/styles/';
        $alt_stylesheets = array();

        if (is_dir($alt_stylesheet_path)) {
            if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
                while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
                    if (stristr($alt_stylesheet_file, ".css") !== false) {
                        $alt_stylesheets[] = $alt_stylesheet_file;
                    }
                }
            }
        }

        //More Options
        $uploads_arr = wp_upload_dir();
        $all_uploads_path = $uploads_arr['path'];
        $all_uploads = get_option('of_uploads');
        $other_entries = array("Select a size:", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36");
        $body_repeat = array("no-repeat", "repeat-x", "repeat-y", "repeat");
        $body_pos = array("top left", "top center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right");
        $options_sub_right = array("menu" => "Footer Menu", "twitter" => "Twitter");
        // Set the Options Array
        $options = array();

        //------------------ GENERAL ------------------------------------------------------------------------------------//

        $options[] = array("name" => "General",
                           "icon" => "http://cdn1.iconfinder.com/data/icons/Vista-Inspirate_1.0/16x16/apps/advancedsettings.png",
                           "type" => "heading");

        $options[] = array("name" => "Logo Options",
                           "type" => "line");

        $options[] = array("name" => "Enable Logo Image",
                           "desc" => "If this option is on, you should fill the text field below. Or you should define Site Title in <a target='blank' href='" . get_bloginfo('url') . "/wp-admin/options-general.php'>Settings->General</a> instead of a logo image.",
                           "id" => $shortname . "_enable_logo_image",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Logo Image",
                           "desc" => "Paste the full URL (include http://) of your custom logo here or you can insert the image through the button.",
                           "id" => $shortname . "_logo_image",
                           "std" => "",
                           "type" => "upload");

        $options[] = array("name" => "Header Info",
                           "type" => "line");

        $options[] = array("name" => "Phone",
                           "desc" => "Input phone number. Sample: Call Us Now: +371 200 55990.",
                           "id" => $shortname . "_header_top_phone",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "E-mail",
                           "desc" => "Input email. Sample: info@domain.com.",
                           "id" => $shortname . "_header_top_email",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Facebook",
                           "desc" => "Input facebook link.",
                           "id" => $shortname . "_header_top_facebook",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Twitter",
                           "desc" => "Input twitter link.",
                           "id" => $shortname . "_header_top_twitter",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Enable Rss Icon",
                           "desc" => "If this option is on, you'll globally enable your website's rss icon in header top.",
                           "id" => $shortname . "_header_top_rss",
                           "std" => "true",
                           "type" => "checkbox");

        //$options[] = array( "name" => "Navigation Menu",
        //					"type" => "line");

        //$options[] = array( "name" => "Wordpress Built-in Menu",
        //					"desc" => "If this option is on, you can control over you sites menu with WordPress's Navigation Menu feature. See here: <a target='blank' href='".get_bloginfo('url') ."/wp-admin/nav-menus.php'>Settings->Menu</a> ",
        //					"id" => $shortname."_menu_built",
        //					"std" => "true",
        //					"type" => "checkbox");

        //$options[] = array( "name" => "Menu Button Description",
        //					"desc" => "If this option is on, you can control over you sites menu description WordPress's Navigation Menu feature. See here: <a target='blank' href='".get_bloginfo('url') ."/wp-admin/nav-menus.php'>Settings->Menu</a>  ",
        //					"id" => $shortname."_menu_button_description",
        //					"std" => "true",
        //					"type" => "checkbox");

        $options[] = array("name" => "Page General",
                           "type" => "line");

        // MTPC additional option
        $options[] = array("name" => "Page Heading Image",
                           "desc" => "Paste the full URL (include http://) of your custom page heading image here or you can insert the image through the button.",
                           "id" => $shortname . "_page_heading_image",
                           "std" => "",
                           "type" => "upload");

        $options[] = array("name" => "Custom Favicon",
                           "desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
                           "id" => $shortname . "_custom_favicon",
                           "std" => "",
                           "type" => "upload");

        $options[] = array("name" => "Enable Search",
                           "desc" => "If this option is on, you'll globally enable your website's search form.",
                           "id" => $shortname . "_search",
                           "std" => "true",
                           "type" => "checkbox");


        //$options[] = array( "name" => "Enable Breadcrumb",
        //					"desc" => "If this option is on, you'll globally disable your website's breadcrumb navigation.",
        //					"id" => $shortname."_breadcrumb",
        //					"std" => "true",
        //					"type" => "checkbox");

        $url = OF_DIRECTORY . '/admin/images/';
        $options[] = array("name" => "Page Layout",
                           "desc" => "Select Page content and sidebar alignment.",
                           "id" => $shortname . "_page_layout",
                           "std" => "right",
                           "type" => "images",
                           "options" => array('right' => $url . '2cr.png', 'left' => $url . '2cl.png'));


        $options[] = array("name" => "Custom Codes",
                           "type" => "line");

        $options[] = array("name" => "Google Analytics Code",
                           "desc" => "Paste your Google Analytics code here. This will be added into the footer template of your theme.",
                           "id" => $shortname . "_google_analytics",
                           "std" => "",
                           "type" => "textarea");

        $options[] = array("name" => "Tracking Code",
                           "desc" => "Paste your tracking code here. This will be added into the footer template of your theme.",
                           "id" => $shortname . "_custom_code",
                           "std" => "",
                           "type" => "textarea");

        $options[] = array("name" => "Custom CSS",
                           "desc" => "Paste your custom CSS code here.",
                           "id" => $shortname . "_custom_style",
                           "std" => "",
                           "type" => "textarea");


        //------------------ FONT ------------------------------------------------------------------------------------//

        $options[] = array("name" => "Font",
                           "icon" => "http://cdn1.iconfinder.com/data/icons/nuove/16x16/actions/pencil.png",
                           "type" => "heading");

        $options[] = array("name" => "Font",
                           "type" => "line");

        $options[] = array( "name" => "General Body Font",
        					"desc" => "Choose which font stack you'd like to use for you general body font.",
        					"id" => $shortname."_size_font_type",
        					"type" => "select",
        					"options" => $standart_fonts);

        $options[] = array("name" => "General Body Font Size (in pixels)",
                           "desc" => "Slide your font size here.",
                           "id" => $shortname . "_size_font",
                           "sliderid" => $shortname_slider . "_size_font",
                           "value" => "12",
                           "object" => "px",
                           "min" => "10",
                           "max" => "16",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "Header Font",
                           "desc" => "Choose which type font you'd like to use.",
                           "id" => $shortname . "_size_headers_fonts",
                           "type" => "select",
//                           "std" => 'Cufon fonts',
                           "options" => $standart_fonts);

//        $options[] = array("name" => "Cufon Font",
//                           "desc" => "Choose which font you'd like to use from the Cufon Fonts.",
//                           "id" => $shortname . "_size_headers_font_cufon",
//                           "type" => "select",
//                           "std" => 'Calluna',
//                           "options" => $cufon_fonts);
//
//        $options[] = array("name" => "Google Font",
//                           "desc" => "Choose which font you'd like to use from the Google Font Directory.",
//                           "id" => $shortname . "_size_headers_font_type",
//                           "type" => "select",
//                           "std" => 'PT+Sans+Narrow',
//                           "options" => $google_fonts);

        $options[] = array("name" => "H1 Size (in pixels)",
                           "desc" => "Slide your h1 size here.",
                           "id" => $shortname . "_size_h1",
                           "sliderid" => $shortname_slider . "_size_h1",
                           "value" => "26",
                           "object" => "px",
                           "min" => "13",
                           "max" => "60",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "H2 Size (in pixels)",
                           "desc" => "Slide your h2 size here.",
                           "id" => $shortname . "_size_h2",
                           "sliderid" => $shortname_slider . "_size_h2",
                           "value" => "18",
                           "object" => "px",
                           "min" => "13",
                           "max" => "60",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "H3 Size (in pixels)",
                           "desc" => "Slide your h3 size here.",
                           "id" => $shortname . "_size_h3",
                           "sliderid" => $shortname_slider . "_size_h3",
                           "value" => "16",
                           "object" => "px",
                           "min" => "13",
                           "max" => "60",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "H4 Size (in pixels)",
                           "desc" => "Slide your h4 size here.",
                           "id" => $shortname . "_size_h4",
                           "sliderid" => $shortname_slider . "_size_h4",
                           "value" => "15",
                           "object" => "px",
                           "min" => "13",
                           "max" => "60",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "H5 Size (in pixels)",
                           "desc" => "Slide your h5 size here.",
                           "id" => $shortname . "_size_h5",
                           "sliderid" => $shortname_slider . "_size_h5",
                           "value" => "14",
                           "object" => "px",
                           "min" => "13",
                           "max" => "60",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "H6 Size (in pixels)",
                           "desc" => "Slide your h6 size here.",
                           "id" => $shortname . "_size_h6",
                           "sliderid" => $shortname_slider . "_size_h6",
                           "value" => "12",
                           "object" => "px",
                           "min" => "12",
                           "max" => "60",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");


        //------------------ COLORS ------------------------------------------------------------------------------------//

        $options[] = array("name" => "Colors",
                           "icon" => "http://cdn3.iconfinder.com/data/icons/fugue/icon/ui-color-picker.png",
                           "type" => "heading");

        $options[] = array("name" => "Background Color Options",
                           "type" => "line");

        $options[] = array("name" => "Background Texture",
                           "desc" => "Select background texture.",
                           "id" => $shortname . "_color_background_texture",
                           "type" => "select",
                           "options" => $textures);

        //$options[] = array( "name" => "Top Line Color",
        //					"desc" => "Select color for the top line.",
        //					"id" => $shortname."_color_top_line",
        //					"std" => "",
        //					"type" => "color");

        $options[] = array("name" => "Background Color",
                           "desc" => "Select color for the background.",
                           "id" => $shortname . "_color_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Background Image",
                           "desc" => "Paste the full URL (include http://) of your custom background here or you can insert the image through the button.",
                           "id" => $shortname . "_bacground_image_bee",
                           "std" => "",
                           "type" => "upload");

        $options[] = array("name" => "Background Image First Position",
                           "desc" => "Choose background image first position",
                           "id" => $shortname . "_bacground_image_bee_position_1",
                           "type" => "select",
                           "std" => '',
                           "options" => $background_position);

        $options[] = array("name" => "Background Image Second Position",
                           "desc" => "Choose background image second position",
                           "id" => $shortname . "_bacground_image_bee_position_2",
                           "type" => "select",
                           "std" => '',
                           "options" => $background_position);

        $options[] = array("name" => "Background Image Repeat",
                           "desc" => "Choose background image repeat",
                           "id" => $shortname . "_bacground_image_bee_repeat",
                           "type" => "select",
                           "std" => '',
                           "options" => $background_repeate);

        $options[] = array("name" => "Menu Color Options",
                           "type" => "line");

        $options[] = array("name" => "Menu Font Color",
                           "desc" => "Select color for the menu font.",
                           "id" => $shortname . "_color_menu_font",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Menu Hover Font Color",
                           "desc" => "Select color for the hover menu font.",
                           "id" => $shortname . "_color_menu_font_hover",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Menu Border Color",
                           "desc" => "Select color for menu border.",
                           "id" => $shortname . "_color_menu_border",
                           "std" => "",
                           "type" => "color");

        //$options[] = array( "name" => "Menu Description Font Color",
        //					"desc" => "Select color for the menu description font.",
        //					"id" => $shortname."_color_menu_description_font",
        //					"std" => "",
        //					"type" => "color");

        $options[] = array("name" => "Menu Hover Background Color",
                           "desc" => "Select color for the menu hover background.",
                           "id" => $shortname . "_color_menu_hover_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Sub Menu Font Color",
                           "desc" => "Select color for the sub menu font.",
                           "id" => $shortname . "_color_sub_menu_font",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Sub Menu Hover Font Color",
                           "desc" => "Select color for the sub menu hover font.",
                           "id" => $shortname . "_color_sub_menu_hover_font",
                           "std" => "",
                           "type" => "color");


        $options[] = array("name" => "Slider Color Options",
                           "type" => "line");

        $options[] = array("name" => "Slider Title Background Color",
                           "desc" => "Select color for the slider title background.",
                           "id" => $shortname . "_color_slider_title_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Slider Title Text Color",
                           "desc" => "Select color for the slider title text.",
                           "id" => $shortname . "_color_slider_title_text",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Slider Content Background",
                           "desc" => "Select color for the slider content background.",
                           "id" => $shortname . "_color_slider_content_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Slider Content Text Color",
                           "desc" => "Select color for the slider content text.",
                           "id" => $shortname . "_color_slider_content_text",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Title Color Options",
                           "type" => "line");

        $options[] = array("name" => "Title Line Color",
                           "desc" => "Select color for the title line.",
                           "id" => $shortname . "_color_header_line",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Title Font Color",
                           "desc" => "Select color for the title font.",
                           "id" => $shortname . "_color_title_font",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Title Button Background",
                           "desc" => "Select color for the title button bacground.",
                           "id" => $shortname . "_color_title_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Title Button Hover Background",
                           "desc" => "Select color for the title hover background.",
                           "id" => $shortname . "_color_title_hover_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Title Button Border Color",
                           "desc" => "Select color for the title button border.",
                           "id" => $shortname . "_color_title_button_border",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Title Button Text Color",
                           "desc" => "Select color for the title button font.",
                           "id" => $shortname . "_color_title_button_text",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Title Button Hover Text Color",
                           "desc" => "Select color for the title button hover font.",
                           "id" => $shortname . "_color_title_button_hover_text",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Typography Color Options",
                           "type" => "line");

        $options[] = array("name" => "Font Color",
                           "desc" => "Select color for the font.",
                           "id" => $shortname . "_color_font",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Link Color",
                           "desc" => "Select color for the link.",
                           "id" => $shortname . "_color_link",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Hover Link Color",
                           "desc" => "Select color for the hover link.",
                           "id" => $shortname . "_color_hover_link",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "H1, H2, H3, H4, H5, H6 Color",
                           "desc" => "Select color for the H1, H2, H3, H4, H5, H6.",
                           "id" => $shortname . "_color_heading",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Button Background Color",
                           "desc" => "Select color for the button background.",
                           "id" => $shortname . "_color_button_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Button Hover Background Color",
                           "desc" => "Select hover color for the button background.",
                           "id" => $shortname . "_color_button_hover_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Button Font Color",
                           "desc" => "Select color for the button font.",
                           "id" => $shortname . "_color_button_font",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Button Hover Font Color",
                           "desc" => "Select color for the button hover font.",
                           "id" => $shortname . "_color_button_hover_font",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Button Border Color",
                           "desc" => "Select color for the button border.",
                           "id" => $shortname . "_color_button_border",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Footer Color Options",
                           "type" => "line");

        $options[] = array("name" => "Footer Background Color",
                           "desc" => "Select color for the footer background.",
                           "id" => $shortname . "_color_footer_background",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Footer Font Color",
                           "desc" => "Select color for the footer font.",
                           "id" => $shortname . "_color_footer_font",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Footer Link Color",
                           "desc" => "Select color for the footer link.",
                           "id" => $shortname . "_color_footer_link",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Footer Hover Link Color",
                           "desc" => "Select color for the footer hover link.",
                           "id" => $shortname . "_color_footer_hover_link",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Footer H1, H2, H3, H4, H5, H6 Color",
                           "desc" => "Select color for the footer H1, H2, H3, H4, H5, H6.",
                           "id" => $shortname . "_color_footer_heading",
                           "std" => "",
                           "type" => "color");

        $options[] = array("name" => "Footer Line Color",
                           "desc" => "Select color for the footer line color.",
                           "id" => $shortname . "_color_footer_line",
                           "std" => "",
                           "type" => "color");

        //------------------ FOOTER ------------------------------------------------------------------------------------//

        $options[] = array("name" => "Footer",
                           "icon" => "http://cdn2.iconfinder.com/data/icons/fugue/icon/layout_header_footer_2_equal.png",
                           "type" => "heading");

        $options[] = array("name" => "Footer",
                           "type" => "line");

        $options[] = array("name" => "Enable Footer",
                           "desc" => "If you don't want display middle Footer, turn off the button.",
                           "id" => $shortname . "_middle_footer",
                           "std" => "true",
                           "type" => "checkbox");

        $url = get_stylesheet_directory_uri() . '/admin/images/columns/';
        $options[] = array("name" => "Footer Column Type",
                           "desc" => "Choose the layout of middle Footer columns you'd like the footer widgets displayed in.",
                           "id" => $shortname . "_footer_column_layout_middle",
                           "std" => "",
                           "type" => "images",
                           "options" => array(
                               '01' => $url . '1.png',
                               '02' => $url . '2-2.png',
                               '03' => $url . '3-3-3.png',
                               '04' => $url . '4-4-4-4.png',
                               '05' => $url . '5-5-5-5-5.png',
                               '07' => $url . '2-4-4.png',
                               '08' => $url . '2-3-3-3.png',
                               '09' => $url . '4-4-2.png',
                               '010' => $url . '3-3-3-2.png'));

        $options[] = array("name" => "Footer Area HTML Custom Code",
                           "desc" => "Enter middle footer custom HTML code here.",
                           "id" => $shortname . "_middle_footer_html",
                           "std" => "",
                           "type" => "textarea");


        $options[] = array("name" => "Bottom Footer Options",
                           "type" => "line");

        $options[] = array("name" => "Bottom Footer",
                           "desc" => "If you don't want display Bottom Footer, turn off the button.",
                           "id" => $shortname . "_bottom_footer",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Bottom Footer Copyright Text",
                           "desc" => "Enter the copyright text that you'd like to display in the bottom footer.",
                           "id" => $shortname . "_bottom_footer_copyright",
                           "std" => "",
                           "type" => "textarea");

        $options[] = array("name" => "Bottom Footer Right Area Type",
                           "desc" => "Select bottom footer right area type here.",
                           "id" => $shortname . "_bottom_footer_type",
                           "std" => "Menu",
                           "type" => "select2",
                           "options" => $options_sub_right);

        $options[] = array("name" => "Twitter Username For Bottom Footer Right Area",
                           "desc" => "Input Twitter username here.",
                           "id" => $shortname . "_footer_twitter",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Bottom Footer Right Area HTML Custom Code",
                           "desc" => "Enter bottom footer right area HTML custom code here.",
                           "id" => $shortname . "_bottom_footer_html",
                           "std" => "",
                           "type" => "textarea");


        //------------------ HOME PAGE ------------------------------------------------------------------------------------//

        $options[] = array("name" => "Home Page",
                           "icon" => "http://cdn1.iconfinder.com/data/icons/KDE_Crystal_Diamond_2.5_Classical_Mod/16x16/actions/gohome.png",
                           "type" => "heading");

        $options[] = array("name" => "Home Page",
                           "type" => "line");

        $options[] = array("name" => "Enable Homepage",
                           "desc" => "If this option is on, you should fill the fields below. If this option is off you should define homepage in <a target='blank' href='" . get_bloginfo('url') . "/wp-admin/options-reading.php'>Settings->Reading</a>.",
                           "id" => $shortname . "_homepage",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Show Slider on Homepage",
                           "desc" => "",
                           "id" => $shortname . "_homepage_slider",
                           "std" => "homepage_nivo_slider",
                           "type" => "radio",
                           "options" => array(
                               'homepage_not_slider' => "Don't show any Slider",
                               'homepage_beecodes_slider' => 'beeCodes Slider',
                               'homepage_anithing_slider' => 'Anithing Slider',
                               'homepage_nivo_slider' => 'Nivo Slider'));

        $options[] = array("name" => "Menu In Slider Area",
                           "desc" => "If this option is on, menu position in homepage is on the slider",
                           "id" => $shortname . "_homepage_menu_position",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "get Started button",
                           "type" => "line");

        $options[] = array("name" => 'Show "Get Started" button',
                           "desc" => 'Select if you want to show or hide "get Started" button on homepage.',
                           "id" => $shortname . "_general_button",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => '"Get Started" button image',
                           "desc" => "Paste the full URL (include http://) of general button here or you can insert the image through the button.",
                           "id" => $shortname . "_general_button_image",
                           "std" => "",
                           "type" => "upload");

        $options[] = array("name" => '"Get Started" button link',
                           "desc" => "Enter full URL included (http://)",
                           "id" => $shortname . "_homepage_tagline_first_button_link",
                           "std" => "",
                           "type" => "text");


        $options[] = array("name" => "Tagline",
                           "type" => "line");

        $options[] = array("name" => "Show Tagline on Homepage",
                           "desc" => "Select if you want to show or hide tagline on homepage.",
                           "id" => $shortname . "_homepage_tagline",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Tagline title text",
                           "desc" => "Enter text to display in homepage tagline header.",
                           "id" => $shortname . "_homepage_tagline_text",
                           "std" => "Hello Our Homepage!",
                           "type" => "text");


        //$options[] = array( "name" => "Tagline first button text",
        //					"desc" => "Enter text to display in first button",
        //					"id" => $shortname."_homepage_tagline_first_button_text",
        //					"std" => "",
        //					"type" => "text");

        //$options[] = array( "name" => "Tagline second button text",
        //					"desc" => "Enter text to display in second button",
        //					"id" => $shortname."_homepage_tagline_second_button_text",
        //					"std" => "",
        //					"type" => "text");

        //$options[] = array( "name" => "Tagline second button link",
        //					"desc" => "Enter text to display in second link",
        //					"id" => $shortname."_homepage_tagline_second_button_link",
        //					"std" => "",
        //					"type" => "text");

        $options[] = array("name" => "Widgets",
                           "type" => "line");

        $options[] = array("name" => "How many widget columns? ",
                           "desc" => "A dynamic widget area will be registred for each column.",
                           "id" => $shortname . "_homepage_columns",
                           "sliderid" => $shortname_slider . "_homepage_columns",
                           "value" => "3",
                           "object" => "col",
                           "min" => "0",
                           "max" => "4",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");


        $options[] = array("name" => "Portfolio Area",
                           "type" => "line");

        $options[] = array("name" => "Show Portfolio on Homepage",
                           "desc" => "Select if you want to show or hide portfolio slider on homepage.",
                           "id" => $shortname . "_homepage_portfolio",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Title",
                           "desc" => "Enter text to display in homepage portfolio area.",
                           "id" => $shortname . "_homepage_portfolio_title",
                           "std" => "Recent",
                           "type" => "text");

        $options[] = array("name" => "Description",
                           "desc" => "Enter text to display in homepage portfolio area.",
                           "id" => $shortname . "_homepage_portfolio_description",
                           "std" => "Sample description",
                           "type" => "textarea");

        $options[] = array("name" => "Button Name",
                           "desc" => "Enter button name to display in homepage portfolio area.",
                           "id" => $shortname . "_homepage_portfolio_button",
                           "std" => "See More",
                           "type" => "text");

        $options[] = array("name" => "Button Link",
                           "desc" => "Enter button link to display in homepage portfolio area.",
                           "id" => $shortname . "_homepage_portfolio_button_link",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Other Content",
                           "type" => "line");

        $options[] = array("name" => "Show a page's content below widget columns and portfolio slider?  ",
                           "desc" => "Selecting YES will allow you to select a static page in the next option to show on your homepage below your widget areas.",
                           "id" => $shortname . "_homepage_content",
                           "std" => "homepage_content_no",
                           "type" => "radio",
                           "options" => array(
                               'homepage_content_yes' => 'Yes, show content from a static page.',
                               'homepage_content_no' => "No, don't show any content below the widget columns and portfolio slider."));

        $options[] = array("name" => "Use which page's content?",
                           "desc" => "If you selected YES above, choose which page you want to pull content from to fill this area.",
                           "id" => $shortname . "_homepage_content_page",
                           "type" => "select",
                           "options" => $of_pages);


        //------------------ BLOG ------------------------------------------------------------------------------------//

        $options[] = array("name" => "Blog",
                           "icon" => "http://cdn2.iconfinder.com/data/icons/oxygen/16x16/apps/kblogger.png",
                           "type" => "heading");

        $options[] = array("name" => "General Blog",
                           "type" => "line");

        //$options[] = array( "name" => "Blog Page",
        //					"desc" => "The page you choose here will display the blog.",
        //					"id" => $shortname."_blog_page",
        //					"std" => "Select a category:",
        //					"type" => "select",
        //					"options" => $of_categories);

        $url = OF_DIRECTORY . '/admin/images/';
        $options[] = array("name" => "Blog Page Layout",
                           "desc" => "Select Blog Page content and sidebar alignment.",
                           "id" => $shortname . "_blog_layout",
                           "std" => "right",
                           "type" => "images",
                           "options" => array('right' => $url . '2cr.png', 'left' => $url . '2cl.png'));

        $options[] = array("name" => "Show Sidebar Categories",
                           "desc" => "Enable categories menu in sidebar.",
                           "id" => $shortname . "_blog_categories",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Show Sidebar Widget",
                           "desc" => "Enable widget area in sidebar.",
                           "id" => $shortname . "_blog_widget",
                           "std" => "true",
                           "type" => "checkbox");

        //$options[] = array( "name" => "Featured Image Type",
        //					"desc" => "Select Featured Image type here.",
        //					"id" => $shortname."_blog_page",
        //					"std" => "Full With",
        //					"type" => "select",
        //					"options" => $of_categories);

        //$options[] = array( "name" => "Posts in Page",
        //					"desc" => "Enter how many posts show in Blog Page.",
        //					"id" => $shortname."_posts_in_page",
        //					"std" => "5",
        //					"type" => "text");

        $options[] = array("name" => "Character Limit In Excerpt",
                           "desc" => "Slide how many character in excerpt.",
                           "id" => $shortname . "_excerpt",
                           "sliderid" => $shortname_slider . "_excerpt",
                           "value" => "100",
                           "object" => "px",
                           "min" => "10",
                           "max" => "1000",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");


        $options[] = array("name" => "Single Blog",
                           "type" => "line");

        $url = OF_DIRECTORY . '/admin/images/';
        $options[] = array("name" => "Single Blog Layout",
                           "desc" => "Select Singl Blog content and sidebar alignment.",
                           "id" => $shortname . "_single_layout",
                           "std" => "right",
                           "type" => "images",
                           "options" => array('right' => $url . '2cr.png', 'left' => $url . '2cl.png'));

        $options[] = array("name" => "Show Sidebar Categories",
                           "desc" => "Enable categories menu in sidebar.",
                           "id" => $shortname . "_single_categories",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Show Sidebar Widget",
                           "desc" => "Enable widget area in sidebar.",
                           "id" => $shortname . "_single_widget",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Featured Image",
                           "desc" => "If this option is on, Featured Image will appear in Single Blog page.",
                           "id" => $shortname . "_single_featured_image",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "About Author Box",
                           "desc" => "If this option is on, about author box will appear in Single Blog page.",
                           "id" => $shortname . "_about_author",
                           "std" => "true",
                           "type" => "checkbox");

        //$options[] = array( "name" => "Related & Popular Post Module",
        //					"desc" => "If this option is on, related and popular post module will appear in Single Blog page.",
        //					"id" => $shortname."_single_related",
        //					"std" => "true",
        //					"type" => "checkbox");

        //$options[] = array( "name" => "Previous & Next Navigation",
        //					"desc" => "If this option is on, previous a next Navigation will appear in Single Blog page.",
        //					"id" => $shortname."single_next",
        //					"std" => "true",
        //					"type" => "checkbox");


        //$options[] = array( "name" => "Meta Informations",
        //					"type" => "line");

        //$options[] = array( "name" => "Category",
        //					"desc" => "If this option is on, you'll enable blog category meta.",
        //					"id" => $shortname."_meta_category",
        //					"std" => "true",
        //					"type" => "checkbox");

        //$options[] = array( "name" => "Tags",
        //					"desc" => "If this option is on, you'll enable blog tags meta.",
        //					"id" => $shortname."_meta_tags",
        //					"std" => "true",
        //					"type" => "checkbox");

        //$options[] = array( "name" => "Author",
        //					"desc" => "If this option is on, you'll enable blog author meta.",
        //					"id" => $shortname."_meta_author",
        //					"std" => "true",
        //					"type" => "checkbox");

        //$options[] = array( "name" => "Date",
        //					"desc" => "If this option is on, you'll enable blog date meta.",
        //					"id" => $shortname."_meta_date",
        //					"std" => "true",
        //					"type" => "checkbox");

        //$options[] = array( "name" => "Comment",
        //					"desc" => "If this option is on, you'll enable blog comment meta.",
        //					"id" => $shortname."_meta_comment",
        //					"std" => "true",
        //					"type" => "checkbox");

        //$options[] = array( "name" => "Featured Image Size",
        //					"type" => "line");

        //$options[] = array( "name" => "Full Width Featured Image Height",
        //					"desc" => "Select full width featured image height size.",
        //					"id" => $shortname."_featured_size_full",
        //					"std" => "200",
        //					"type" => "select",
        //					"options" => $of_categories);

        //$options[] = array( "name" => "Left Float Featured Image Height",
        //					"desc" => "Select left float featured image height size.",
        //					"id" => $shortname."_featured_size_leftheight",
        //					"std" => "200",
        //					"type" => "select",
        //					"options" => $of_categories);

        //$options[] = array( "name" => "Left Float Featured Image Width",
        //					"desc" => "Select left float featured image width size.",
        //					"id" => $shortname."_featured_size_leftwidth",
        //					"std" => "200",
        //					"type" => "select",
        //					"options" => $of_categories);


        //------------------ CONTACT PAGE ------------------------------------------------------------------------------------//

        $options[] = array("name" => "Contact Page",
                           "icon" => "http://cdn2.iconfinder.com/data/icons/oxygen/16x16/actions/contact.png",
                           "type" => "heading");

        $options[] = array("name" => "Google Map",
                           "type" => "line");

        $options[] = array("name" => "Show Google Map",
                           "desc" => "Enable or disable contact page map.",
                           "id" => $shortname . "_contact_map",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Google Map Latitudes",
                           "desc" => "Enter the contact page lititudes",
                           "id" => $shortname . "_contact_map_latitudes",
                           "std" => "-33.848356",
                           "type" => "text");

        $options[] = array("name" => "Google Map Longitudes",
                           "desc" => "Enter the contact page longitudes",
                           "id" => $shortname . "_contact_map_longitudes",
                           "std" => "151.204062",
                           "type" => "text");

        $options[] = array("name" => "Google Map Address For Hover",
                           "desc" => "Enter the map hover description",
                           "id" => $shortname . "_contact_map_address",
                           "std" => "We are here!",
                           "type" => "text");

        $options[] = array("name" => "Google Map Height",
                           "desc" => "Slide Google Map height from 100 to 1000.",
                           "id" => $shortname . "_contact_map_height",
                           "sliderid" => $shortname_slider . "_contact_map_height",
                           "value" => "400",
                           "object" => "px",
                           "min" => "100",
                           "max" => "1000",
                           "range" => "min",
                           "step" => "10",
                           "type" => "slider");

        $options[] = array("name" => "Google Map Zoom Position",
                           "desc" => "Map zoom position.",
                           "id" => $shortname . "_contact_map_zoom",
                           "sliderid" => $shortname_slider . "_contact_map_zoom",
                           "value" => "15",
                           "object" => "step",
                           "min" => "1",
                           "max" => "16",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");


        $options[] = array("name" => "Contact Form",
                           "type" => "line");

        $options[] = array("name" => "Show Contact Form",
                           "desc" => "Enable or disable contact form in contact.",
                           "id" => $shortname . "_contact_form",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Contact Form Email",
                           "desc" => "Enter the contact form title for contact page. Sample: yourmail@gmail.com",
                           "id" => $shortname . "_contact_form_email",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Contact Form Title",
                           "desc" => "Enter the contact form title for contact page. Default: Our Contact Form",
                           "id" => $shortname . "_contact_form_title",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Contact Form Description",
                           "desc" => "Enter the contact form description for contact page. Decription is below title",
                           "id" => $shortname . "_contact_form_description",
                           "std" => "",
                           "type" => "textarea");


        $options[] = array("name" => "Contact Page Widget Area",
                           "type" => "line");

        $options[] = array("name" => "Show Contact Page Widget Area",
                           "desc" => "Enable or disable contact page widget area.",
                           "id" => $shortname . "_contact_widget",
                           "std" => "true",
                           "type" => "checkbox");

        $url = OF_DIRECTORY . '/admin/images/';
        $options[] = array("name" => "Contact Page Widget Area Position",
                           "desc" => "Select contact page content and widget area alignment.",
                           "id" => $shortname . "_contact_widget_position",
                           "std" => "right",
                           "type" => "images",
                           "options" => array('right' => $url . '2cr.png', 'left' => $url . '2cl.png'));


        $options[] = array("name" => "Contact Page Content",
                           "type" => "line");

        $options[] = array("name" => "Show a page's content below contact form?  ",
                           "desc" => "Selecting YES will allow you to select a static page in the next option to show on your contact page below your contact form.",
                           "id" => $shortname . "_contact_content",
                           "std" => "contact_content_no",
                           "type" => "radio",
                           "options" => array(
                               'contact_content_yes' => 'Yes, show content from a static page.',
                               'contact_content_no' => "No, don't show any content below the contact form."));

        $options[] = array("name" => "Use which page's content?",
                           "desc" => "If you selected YES above, choose which page you want to pull content from to fill this area.",
                           "id" => $shortname . "_contact_content_page",
                           "type" => "select",
                           "options" => $of_pages);

        //------------------ SLIDERS ------------------------------------------------------------------------------------//

        $options[] = array("name" => "Sliders",
                           "icon" => "http://cdn3.iconfinder.com/data/icons/UltimateGnome/16x16/status/gtk-missing-image.png",
                           "type" => "heading");

        $options[] = array("name" => "General Options",
                           "type" => "line");

        //$options[] = array( "name" => "Show Slider Shape",
        //					"desc" => "Enable or disable slider bottom shape.",
        //					"id" => $shortname."_slider_shape",
        //					"std" => "false",
        //					"type" => "checkbox");

        $options[] = array("name" => "Image From URL Height",
                           "desc" => "Slide Image From URL height here.",
                           "id" => $shortname . "_image_from_url_height",
                           "sliderid" => $shortname_slider . "_image_from_url_height",
                           "value" => "100",
                           "object" => "px",
                           "min" => "10",
                           "max" => "1000",
                           "range" => "min",
                           "step" => "10",
                           "type" => "slider");

        $options[] = array("name" => "Anything Slider",
                           "type" => "line");

        $options[] = array("name" => "Anything Slider Resize",
                           "desc" => "Enable or disable slider resize.",
                           "id" => $shortname . "_anything_slider_resize",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Anything Slider Height",
                           "desc" => "Slide Anything Slider height here.",
                           "id" => $shortname . "_anything_slider_height",
                           "sliderid" => $shortname_slider . "_anything_slider_height",
                           "value" => "350",
                           "object" => "px",
                           "min" => "50",
                           "max" => "600",
                           "range" => "min",
                           "step" => "10",
                           "type" => "slider");

        $options[] = array("name" => "Anything Slider Pause Time",
                           "desc" => "Slide Anything Slider pause time here.",
                           "id" => $shortname . "_anything_slider_delay",
                           "sliderid" => $shortname_slider . "_anything_slider_delay",
                           "value" => "3000",
                           "object" => "ms",
                           "min" => "3000",
                           "max" => "30000",
                           "range" => "min",
                           "step" => "1000",
                           "type" => "slider");

        $options[] = array("name" => "Anything Slider Pause Time Resume",
                           "desc" => "Resume slideshow after user interaction.",
                           "id" => $shortname . "_anything_slider_resume_delay",
                           "sliderid" => $shortname_slider . "_anything_slider_resume_delay",
                           "value" => "15000",
                           "object" => "ms",
                           "min" => "3000",
                           "max" => "30000",
                           "range" => "min",
                           "step" => "1000",
                           "type" => "slider");

        $options[] = array("name" => "Anything Slider Animation Speed",
                           "desc" => "Slide Anything Slider animation speed here.",
                           "id" => $shortname . "_anything_slider_animation",
                           "sliderid" => $shortname_slider . "_anything_slider_animation",
                           "value" => "600",
                           "object" => "px",
                           "min" => "100",
                           "max" => "3000",
                           "range" => "min",
                           "step" => "100",
                           "type" => "slider");

        $options[] = array("name" => "Nivo Slider",
                           "type" => "line");

        $options[] = array("name" => "Nivo Slider Height",
                           "desc" => "Slide Nivo Slider height here.",
                           "id" => $shortname . "_nivo_slider_height",
                           "sliderid" => $shortname_slider . "_nivo_slider_height",
                           "value" => "350",
                           "object" => "px",
                           "min" => "50",
                           "max" => "600",
                           "range" => "min",
                           "step" => "10",
                           "type" => "slider");

        $options[] = array("name" => "Effect",
                           "desc" => "Select Nivo Slider effect here.",
                           "id" => $shortname . "_nivo_slider_effect",
                           "std" => "random",
                           "type" => "select",
                           "options" => array(
                               'random' => 'random',
                               'fade' => 'fade',
                               'fold' => 'fold',
                               'sliceUpDownLeft' => 'sliceUpDownLeft',
                               'sliceUpDown' => 'sliceUpDown',
                               'sliceUpLeft' => 'sliceUpLeft',
                               'sliceUp' => 'sliceUp',
                               'sliceDownLeft' => 'sliceDownLeft',
                               'sliceDown' => 'sliceDown',
                               'slideInLeft' => 'slideInLeft',
                               'slideInRight' => 'slideInRight',
                               'boxRandom' => 'boxRandom',
                               'boxRain' => 'boxRain',
                               'boxRainReverse' => 'boxRainReverse',
                               'boxRainGrow' => 'boxRainGrow',
                               'boxRainGrowReverse' => 'boxRainGrowReverse'));


        $options[] = array("name" => "Anim Speed",
                           "desc" => "Slide Nivo Slider anim speed here.",
                           "id" => $shortname . "_nivo_slider_speed",
                           "sliderid" => $shortname_slider . "_nivo_slider_speed",
                           "value" => "600",
                           "object" => "ms",
                           "min" => "500",
                           "max" => "1200",
                           "range" => "min",
                           "step" => "100",
                           "type" => "slider");


        $options[] = array("name" => "Pause Time",
                           "desc" => "Slide Nivo Slider pause time here.",
                           "id" => $shortname . "_nivo_slider_pause",
                           "sliderid" => $shortname_slider . "_nivo_slider_pause",
                           "value" => "4000",
                           "object" => "ms",
                           "min" => "3000",
                           "max" => "10000",
                           "range" => "min",
                           "step" => "500",
                           "type" => "slider");

        $options[] = array("name" => "Start Slide",
                           "desc" => "Slide Nivo Slider start slide here.",
                           "id" => $shortname . "_nivo_slider_start",
                           "sliderid" => $shortname_slider . "_nivo_slider_start",
                           "value" => "1",
                           "object" => "img",
                           "min" => "1",
                           "max" => "50",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "Slices",
                           "desc" => "Slide Nivo Slider slices here.",
                           "id" => $shortname . "_nivo_slider_slices",
                           "sliderid" => $shortname_slider . "_nivo_slider_slices",
                           "value" => "25",
                           "object" => "img",
                           "min" => "1",
                           "max" => "40",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "Nivo Slider content opacity",
                           "desc" => "Slide Nivo Slider content opacity here.",
                           "id" => $shortname . "_nivo_slider_opacity",
                           "sliderid" => $shortname_slider . "_nivo_slider_opacity",
                           "value" => "8",
                           "object" => "opc",
                           "min" => "0",
                           "max" => "9",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "Nivo Slider Hover Pause",
                           "desc" => "Turn on/off nivo slide hover pause.",
                           "id" => $shortname . "_nivo_slider_hover",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Nivo Slider Control Nav",
                           "desc" => "Turn on/off nivo slide control nav.",
                           "id" => $shortname . "_nivo_slider_control",
                           "std" => "true",
                           "type" => "checkbox");

        $options[] = array("name" => "Nivo Slider Direction Nav",
                           "desc" => "Turn on/off nivo slide direction nav.",
                           "id" => $shortname . "_nivo_slider_nav",
                           "std" => "true",
                           "type" => "checkbox");


        //------------------ PRICING TABLE ------------------------------------------------------------------------------------//

        $options[] = array("name" => "Pricing Table",
                           "icon" => "http://cdn2.iconfinder.com/data/icons/oxygen/16x16/actions/table.png",
                           "type" => "heading");

        $options[] = array("name" => "Pricing Table General",
                           "type" => "line");

        $options[] = array("name" => "Pricing Table Name",
                           "desc" => "Input name for pricing table.",
                           "id" => $shortname . "_pricing_table_name",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Pricing Table Description",
                           "desc" => "Input description for pricing table.",
                           "id" => $shortname . "_pricing_table_description",
                           "std" => "",
                           "type" => "textarea");

        $options[] = array("name" => "Pricing Table Plans",
                           "desc" => "Slide pricing table plans",
                           "id" => $shortname . "_pricing_table_plans",
                           "sliderid" => $shortname_slider . "_pricing_table_plans",
                           "value" => "4",
                           "object" => "col",
                           "min" => "2",
                           "max" => "4",
                           "range" => "min",
                           "step" => "1",
                           "type" => "slider");

        $options[] = array("name" => "Pricing Table Plans",
                           "type" => "line");

        $options[] = array("name" => "First Plan Name",
                           "desc" => "Input first plane name for pricing table.",
                           "id" => $shortname . "_pricing_table_first_name",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "First Plan Price",
                           "desc" => "Input first plane price for pricing table.",
                           "id" => $shortname . "_pricing_table_first_price",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Second Plan Name",
                           "desc" => "Input second plane name for pricing table.",
                           "id" => $shortname . "_pricing_table_second_name",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Second Plan Price",
                           "desc" => "Input second plane price for pricing table.",
                           "id" => $shortname . "_pricing_table_second_price",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Third Plan Name",
                           "desc" => "Input third plane name for pricing table.",
                           "id" => $shortname . "_pricing_table_third_name",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Third Plan Price",
                           "desc" => "Input third plane price for pricing table.",
                           "id" => $shortname . "_pricing_table_third_price",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Fourth Plan Name",
                           "desc" => "Input fourth plane name for pricing table.",
                           "id" => $shortname . "_pricing_table_fourth_name",
                           "std" => "",
                           "type" => "text");

        $options[] = array("name" => "Fourth Plan Price",
                           "desc" => "Input fourth plane price for pricing table.",
                           "id" => $shortname . "_pricing_table_fourth_price",
                           "std" => "",
                           "type" => "text");


        $options[] = array("name" => "Pricing Table Plan Buttons",
                           "type" => "line");

        $options[] = array("name" => "First Plan Button name",
                           "desc" => "Input first plane button name for pricing table.",
                           "id" => $shortname . "_pricing_table_first_button",
                           "std" => "Buy Now",
                           "type" => "text");

        $options[] = array("name" => "First Plan Button URL",
                           "desc" => "Input first plane button URL for pricing table.",
                           "id" => $shortname . "_pricing_table_first_url",
                           "std" => "#",
                           "type" => "text");

        $options[] = array("name" => "Second Plan Button name",
                           "desc" => "Input second plane button name for pricing table.",
                           "id" => $shortname . "_pricing_table_second_button",
                           "std" => "Buy Now",
                           "type" => "text");

        $options[] = array("name" => "Second Plan Button URL",
                           "desc" => "Input second plane button URL for pricing table.",
                           "id" => $shortname . "_pricing_table_second_url",
                           "std" => "#",
                           "type" => "text");

        $options[] = array("name" => "Third Plan Button name",
                           "desc" => "Input third plane button name for pricing table.",
                           "id" => $shortname . "_pricing_table_third_button",
                           "std" => "Buy Now",
                           "type" => "text");

        $options[] = array("name" => "Third Plan Button URL",
                           "desc" => "Input third plane button URL for pricing table.",
                           "id" => $shortname . "_pricing_table_third_url",
                           "std" => "#",
                           "type" => "text");

        $options[] = array("name" => "Fourth Plan Button name",
                           "desc" => "Input fourth plane button name for pricing table.",
                           "id" => $shortname . "_pricing_table_fourth_button",
                           "std" => "Buy Now",
                           "type" => "text");

        $options[] = array("name" => "Fourth Plan Button URL",
                           "desc" => "Input fourth plane button URL for pricing table.",
                           "id" => $shortname . "_pricing_table_fourth_url",
                           "std" => "#",
                           "type" => "text");

        /**
         *
        $options[] = array( "name" => "Example Options",
        "type" => "heading");

        $options[] = array( "name" => "Typograpy",
        "desc" => "This is a typographic specific option.",
        "id" => $shortname."_typograpy",
        "std" => array('size' => '16','unit' => 'em','face' => 'verdana','style' => 'bold italic','color' => '#123456'),
        "type" => "typography");

        $options[] = array( "name" => "Border",
        "desc" => "This is a border specific option.",
        "id" => $shortname."_border",
        "std" => array('width' => '2','style' => 'dotted','color' => '#444444'),
        "type" => "border");

        $options[] = array( "name" => "Background",
        "desc" => "This is a border specific option.",
        "id" => $shortname."_border2",
        "std" => array('color' => '#ffffff', 'repeate' => '2','position' => 'dotted','image' => ''),
        "type" => "background");

        $options[] = array( "name" => "Colorpicker",
        "desc" => "No color selected.",
        "id" => $shortname."_example_colorpicker",
        "std" => "",
        "type" => "color");

        $options[] = array( "name" => "Colorpicker (default #2098a8)",
        "desc" => "Color selected.",
        "id" => $shortname."_example_colorpicker_2",
        "std" => "#2098a8",
        "type" => "color");

        $options[] = array( "name" => "Upload Basic",
        "desc" => "An image uploader without text input.",
        "id" => $shortname."_uploader",
        "std" => "",
        "type" => "upload_min");

        $options[] = array( "name" => "Input Text",
        "desc" => "A text input field.",
        "id" => $shortname."_test_text",
        "std" => "Default Value",
        "type" => "text");

        $options[] = array( "name" => "Input Checkbox (false)",
        "desc" => "Example checkbox with false selected.",
        "id" => $shortname."_example_checkbox_false",
        "std" => "false",
        "type" => "checkbox");

        $options[] = array( "name" => "Input Checkbox (true)",
        "desc" => "Example checkbox with true selected.",
        "id" => $shortname."_example_checkbox_true",
        "std" => "true",
        "type" => "checkbox");

        $options[] = array( "name" => "Input Select Small",
        "desc" => "Small Select Box.",
        "id" => $shortname."_example_select",
        "std" => "three",
        "type" => "select",
        "class" => "mini", //mini, tiny, small
        "options" => $options_select);

        $options[] = array( "name" => "Input Select Wide",
        "desc" => "A wider select box.",
        "id" => $shortname."_example_select_wide",
        "std" => "two",
        "type" => "select2",
        "options" => $options_radio);

        $options[] = array( "name" => "Input Radio (one)",
        "desc" => "Radio select with default of 'one'.",
        "id" => $shortname."_example_radio",
        "std" => "one",
        "type" => "radio",
        "options" => $options_radio);

        $url =  get_stylesheet_directory_uri() . '/admin/images/';
        $options[] = array( "name" => "Image Select",
        "desc" => "Use radio buttons as images.",
        "id" => $shortname."_images",
        "std" => "",
        "type" => "images",
        "options" => array(
        'warning.css' => $url . 'warning.png',
        'accept.css' => $url . 'accept.png',
        'wrench.css' => $url . 'wrench.png'));

        $options[] = array( "name" => "Textarea",
        "desc" => "Textarea description.",
        "id" => $shortname."_example_textarea",
        "std" => "Default Text",
        "type" => "textarea");

        $options[] = array( "name" => "Multicheck",
        "desc" => "Multicheck description.",
        "id" => $shortname."_example_multicheck",
        "std" => "two",
        "type" => "multicheck",
        "options" => $options_radio);

        $options[] = array( "name" => "Select a Category",
        "desc" => "A list of all the categories being used on the site.",
        "id" => $shortname."_example_category",
        "std" => "Select a category:",
        "type" => "select",
        "options" => $of_pages);  */

        update_option('of_template', $options);
        update_option('of_themename', $themename);
        update_option('of_shortname', $shortname);

    }
}
?>