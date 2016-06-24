<style type="text/css"><?php $of = "of"; ?><?php

//--SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SL
//--SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SL
//--SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SLIDERS----SL
$_general_button = get_option($of . "_general_button_image");
$_slider_shape = get_option($of . "_slider_shapess");
$_nivo_height = get_option($of . "_nivo_slider_height");
$_bx_height = get_option($of . "_bx_slider_height-out");
$_orbit_height = get_option($of . "_orbit_slider_height");
?>

<?php if ($_general_button == "") {
} else {
    echo " #general-button { background-image: url( ";
    echo $_general_button;
    echo " ) !important } ";
} ?>

<?php if ($_slider_shape == "true") {
} else {
    echo "#slider-middle {background:none!important;}";
} ?>
<?php if ($_nivo_height) {
    echo "#slider_image {height:";
    echo $_nivo_height;
    echo"px!important;}";
} ?>
<?php if ($_bx_height) {
    echo "#slider-bx-ul {height:";
    echo $_bx_height;
    echo"px!important;}";
} ?>
<?php if ($_orbit_height) {
    echo "#orbit-slider {height:";
    echo $_orbit_height;
    echo"px!important;}";
} ?>
<?php
//-- ------------------------------------------------------------------------------------------------------------------------------------------- --//
//-- ------------------------------------------------------------------------------------------------------------------------------------------- --//
//-- ------------------------------------------------------------------------------------------------------------------------------------------- --//




//--FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----F
//--FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----F
//--FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----FONTS----F
$_size_headers_fonts = get_option($of . "_size_headers_fonts");
$of_size_headers_font_type = get_option($of . "_size_headers_font_type");
$of_size_font_type = get_option($of . "_size_font_type");
$_size_font = get_option($of . "_size_font");
$_size_h1 = get_option($of . "_size_h1");
$_size_h2 = get_option($of . "_size_h2");
$_size_h3 = get_option($of . "_size_h3");
$_size_h4 = get_option($of . "_size_h4");
$_size_h5 = get_option($of . "_size_h5");
$_size_h6 = get_option($of . "_size_h6");

if ($_size_headers_fonts == "Google fonts") {

    if ($of_size_headers_font_type) {
        echo "h1,h2,h3,h4,h5,h6,h1 a,h2 a,h3 a,h4 a,h5 a,h6 a{ font-family:'";
        echo $of_size_headers_font_type;
        echo"'!important;}";
    }
    if ($of_size_headers_font_type) {
        echo ".nav li a strongs, #title-button { font-family:'";
        echo $of_size_headers_font_type;
        echo"'!important;}";
    }
    if ($of_size_headers_font_type) {
        echo ".big-button { font-family:'";
        echo $of_size_headers_font_type;
        echo"'!important;}";
    }

}

if ($_size_font) {
    echo "html, body, p {font-size:";
    echo $_size_font;
    echo"px!important;}";
}
if ($_size_h1) {
    echo "h1 {font-size:";
    echo $_size_h1;
    echo"px!important;}";
}
if ($_size_h2) {
    echo "h2 {font-size:";
    echo $_size_h2;
    echo"px!important;}";
}
if ($_size_h3) {
    echo "h3 {font-size:";
    echo $_size_h3;
    echo"px!important;}";
}
if ($_size_h4) {
    echo "h4 {font-size:";
    echo $_size_h4;
    echo"px!important;}";
}
if ($_size_h5) {
    echo "h5 {font-size:";
    echo $_size_h5;
    echo"px!important;}";
}
if ($_size_h6) {
    echo "h6 {font-size:";
    echo $_size_h6;
    echo"px!important;}";
}

//-- ------------------------------------------------------------------------------------------------------------------------------------------- --//
//-- ------------------------------------------------------------------------------------------------------------------------------------------- --//
//-- ------------------------------------------------------------------------------------------------------------------------------------------- --//






//--TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TE
//--TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TE
//--TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TEXTURE----TE
$_texture = get_option($of . "_color_background_texture");
$_bacground_image_bee = get_option($of . "_bacground_image_bee");
$_bacground_image_bee_position_1 = get_option($of . "_bacground_image_bee_position_1");
$_bacground_image_bee_position_2 = get_option($of . "_bacground_image_bee_position_2");
$_bacground_image_bee_repeate = get_option($of . "_bacground_image_bee_repeat");

if ($_texture == "Grid 1") {
    $texture = "grid9";
}
if ($_texture == "Grid 2") {
    $texture = "grid15";
}
if ($_texture == "Bokeh 1") {
    $texture = "bokeh-1";
}
if ($_texture == "Bokeh 2") {
    $texture = "bokeh-2";
}
if ($_texture == "Bokeh 3") {
    $texture = "bokeh-3";
}
if ($_texture == "Bokeh 4") {
    $texture = "bokeh-4";
}
if ($_texture == "Bokeh 5") {
    $texture = "bokeh-5";
}
if ($_texture == "Modern Blue") {
    $texture = "blue-extremium-lights";
}
if ($_texture == "Modern Orange") {
    $texture = "orange-extremium-lights";
}
if ($_texture == "Modern Red") {
    $texture = "red-extremium-lights";
}
if ($_texture == "Modern Violet") {
    $texture = "violet-extremium-lights";
}
if ($_texture == "Modern Yellow") {
    $texture = "yellow-extremium-lights";
}
if ($_texture == "Modern Black") {
    $texture = "dark-extremium-lights";
}
if ($_texture == "Modern Green") {
    $texture = "green-extremium-lights";
}

if ($_texture == "Square") {
    $texture = "texture-1";
}
if ($_texture == "Right Strip") {
    $texture = "texture-2";
}
if ($_texture == "Square 2") {
    $texture = "texture-3";
}
if ($_texture == "Square 3") {
    $texture = "texture-4";
}
if ($_texture == "Right Strip 2") {
    $texture = "texture-5";
}
if ($_texture == "Left Strip") {
    $texture = "texture-6";
}
if ($_texture == "Left Strip 2") {
    $texture = "texture-7";
}
if ($_texture == "Horizontal Strip") {
    $texture = "texture-8";
}
if ($_texture == "Horizontal Strip 2") {
    $texture = "texture-9";
}
if ($_texture == "Horizontal Strip 3") {
    $texture = "texture-10";
}
if ($_texture == "Horizontal Strip 4") {
    $texture = "texture-11";
}
if ($_texture == "Vertical Strip") {
    $texture = "texture-12";
}
if ($_texture == "Vertical Strip 2") {
    $texture = "texture-13";
}
if ($_texture == "Vertical Strip 3") {
    $texture = "texture-14";
}
if ($_texture == "Vertical Strip 4") {
    $texture = "texture-15";
}
if ($_texture == "Square 4") {
    $texture = "texture-16";
}
if ($_texture == "Dotted") {
    $texture = "texture-17";
}
if ($_texture == "Dotted 2") {
    $texture = "texture-18";
}
if ($_texture == "Dotted 3") {
    $texture = "texture-19";
}
if ($_texture == "Dotted 4") {
    $texture = "texture-20";
}

?>
<?php 

if ($_bacground_image_bee != "") {
    echo "#texture { background-image:url(" . $_bacground_image_bee . "); background-position:" . $_bacground_image_bee_position_1 . " " . $_bacground_image_bee_position_2 . "; background-repeat:" . $_bacground_image_bee_repeate . "; }";
}

else if ($_texture == 'None') {
}

else if ($_texture == 'Bokeh 1' or $_texture == 'Bokeh 2' or $_texture == 'Bokeh 3' or $_texture == 'Bokeh 4' or $_texture == 'Bokeh 5') {
    echo "#texture {background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".jpg); background-repeat: repeat; background-position: center; background-attachment: fixed}";
}

else if ($_texture == 'Modern Blue') {
    echo "#texture { background-color: #0d2235; background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".jpg); background-position: center top; background-attachment: fixed; background-repeat: repeat-x}";
}

else if ($_texture == 'Modern Orange') {
    echo "#texture { background-color: #b93300; background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".jpg); background-position: center top; background-attachment: fixed; background-repeat: repeat-x}";
}

else if ($_texture == 'Modern Red') {
    echo "#texture { background-color: #630708; background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".jpg); background-position: center top; background-attachment: fixed; background-repeat: repeat-x}";
}

else if ($_texture == 'Modern Violet') {
    echo "#texture { background-color: #25163d; background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".jpg); background-position: center top; background-attachment: fixed; background-repeat: repeat-x}";
}

else if ($_texture == 'Modern Yellow') {
    echo "#texture { background-color: #949023; background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".jpg); background-position: center top; background-attachment: fixed; background-repeat: repeat-x}";
}

else if ($_texture == 'Modern Black') {
    echo "#texture { background-color: #020202; background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".jpg); background-position: center top; background-attachment: fixed; background-repeat: repeat-x}";
}

else if ($_texture == 'Modern Green') {
    echo "#texture { background-color: #1f3e05; background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".jpg); background-position: center top; background-attachment: fixed; background-repeat: repeat-x }";
}

else {
    echo "#texture { background-image:url(";
    echo get_template_directory_uri();
    echo "/images/textures/";
    echo $texture;
    echo".png)}";
} ?>

<?php 
//-- ------------------------------------------------------------------------------------------------------------------------------------------- --//






//--COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLOR
//--COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLOR
//--COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLORS----COLOR
$_color_header_line = get_option($of . "_color_header_line");
$_color_top_line = get_option($of . "_color_top_line");
$_color_background = get_option($of . "_color_background");
$_color_menu_font = get_option($of . "_color_menu_font");
$_color_menu_font_hover = get_option($of . "_color_menu_font_hover");
$_color_menu_border = get_option($of . "_color_menu_border");
$_color_menu_description_font = get_option($of . "_color_menu_description_font");
$_color_title_font = get_option($of . "_color_title_font");
$_color_font = get_option($of . "_color_font");
$_color_link = get_option($of . "_color_link");
$_color_hover_link = get_option($of . "_color_hover_link");
$_color_heading = get_option($of . "_color_heading");
$_color_button_background = get_option($of . "_color_button_background");
$_color_button_font = get_option($of . "_color_button_font");
$_color_button_border = get_option($of . "_color_button_border");
$_color_button_hover_font = get_option($of . "_color_button_hover_font");
$_color_footer_line = get_option($of . "_color_footer_line");
$_color_footer_background = get_option($of . "_color_footer_background");
$_color_footer_font = get_option($of . "_color_footer_font");
$_color_footer_link = get_option($of . "_color_footer_link");
$_color_footer_hover_link = get_option($of . "_color_footer_hover_link");
$_color_footer_heading = get_option($of . "_color_footer_heading");
$_color_title_background = get_option($of . "_color_title_background");
$_color_title_hover_background = get_option($of . "_color_title_hover_background");
$_color_title_button_text = get_option($of . "_color_title_button_text");
$_color_title_button_hover_text = get_option($of . "_color_title_button_hover_text");
$_color_title_button_border = get_option($of . "_color_title_button_border");
$_color_button_hover_background = get_option($of . "_color_button_hover_background");
$_color_menu_hover_background = get_option($of . "_color_menu_hover_background");
$_color_sub_menu_font = get_option($of . "_color_sub_menu_font");
$_color_sub_menu_hover_font = get_option($of . "_color_sub_menu_hover_font");

$_color_slider_title_background = get_option($of . "_color_slider_title_background");
$_color_slider_title_text = get_option($of . "_color_slider_title_text");
$_color_slider_content_background = get_option($of . "_color_slider_content_background");
$_color_slider_content_text = get_option($of . "_color_slider_content_text");

?>
<?php if ($_color_slider_title_background) {
    echo ".nivo-caption .title-slider,.beeCodes-content, .beeCodes-title h1{background-color:";
    echo $_color_slider_title_background;
    echo"!important;}";
} ?>
<?php if ($_color_slider_title_background) {
    echo ".beeCodes-hover-1, .beeCodes-hover-3, .beeCodes-hover-2{border-color:";
    echo $_color_slider_title_background;
    echo"!important;}";
} ?>
<?php if ($_color_slider_title_text) {
    echo ".nivo-caption .title-slider h1,.beeCodes-title h1 {color:";
    echo $_color_slider_title_text;
    echo"!important;}";
} ?>
<?php if ($_color_slider_content_background) {
    echo ".nivo-caption .content-slider {background-color:";
    echo $_color_slider_content_background;
    echo"!important;}";
} ?>
<?php if ($_color_slider_content_text) {
    echo ".nivo-caption .content-slider p, .nivo-caption .content-slider h1, .nivo-caption .content-slider h2, .nivo-caption .content-slider h3, .nivo-caption .content-slider h4, .nivo-caption .content-slider h5, .nivo-caption .content-slider h6, .nivo-caption .content-slider a,.beeCodes-content,.beeCodes-content p, .beeCodes-content a  {color:";
    echo $_color_slider_content_text;
    echo"!important;}";
} ?>

<?php if ($_color_sub_menu_hover_font) {
    echo ".menu ul li a:hover, li.menuhover li a:hover, li.menuhover li.menuhover li a:hover {color:";
    echo $_color_sub_menu_hover_font;
    echo"!important;}";
} ?>
<?php if ($_color_sub_menu_font) {
    echo ".menu ul li a, li.menuhover li a, li.menuhover li.menuhover li a {color:";
    echo $_color_sub_menu_font;
    echo"!important;}";
} ?>
<?php if ($_color_menu_hover_background) {
    echo ".menu ul, li.menuhover a, li.menuhover li.menuhover a, .menu li:hover {background-color:";
    echo $_color_menu_hover_background;
    echo"!important;}";
} ?>
<?php if ($_color_title_background) {
    echo "#title-button {background-color:";
    echo $_color_title_background;
    echo"!important;}";
} ?>
<?php if ($_color_title_hover_background) {
    echo "#title-button:hover {background-color:";
    echo $_color_title_hover_background;
    echo"!important;}";
} ?>
<?php if ($_color_title_button_text) {
    echo "#title-button {color:";
    echo $_color_title_button_text;
    echo"!important;}";
} ?>
<?php if ($_color_title_button_hover_text) {
    echo "#title-button:hover{color:";
    echo $_color_title_button_hover_text;
    echo"!important;}";
} ?>
<?php if ($_color_title_button_border) {
    echo "#title-button {border-color:";
    echo $_color_title_button_border;
    echo"!important;}";
} ?>
<?php if ($_color_background) {
    echo "#texture {background-color:";
    echo $_color_background;
    echo"!important;}";
} ?>
<?php if ($_color_top_line) {
    echo "#head-layout {border-color:";
    echo $_color_top_line;
    echo"!important;}";
} ?>
<?php if ($_color_header_line) {
    echo "#title-layout, #header-middle-line {border-color:";
    echo $_color_header_line;
    echo"!important;}";
} ?>
<?php if ($_color_menu_font) {
    echo ".menu li a {color:";
    echo $_color_menu_font;
    echo"!important;}";
} ?>
<?php if ($_color_menu_font_hover) {
    echo ".menu li a:hover {color:";
    echo $_color_menu_font_hover;
    echo"!important;}";
} ?>
<?php if ($_color_menu_border) {
    echo "#header-menu, #header-menu-2, .menu ul { border-color:";
    echo $_color_menu_border;
    echo"!important;}";
} ?>
<?php if ($_color_menu_description_font) {
    echo ".nav li a span {color:";
    echo $_color_menu_description_font;
    echo"!important;}";
} ?>
<?php if ($_color_title_font) {
    echo "#header-title h1 {color:";
    echo $_color_title_font;
    echo"!important;}";
} ?>
<?php if ($_color_font) {
    echo "html, body, p, div, input {color:";
    echo $_color_font;
    echo"!important;}";
} ?>
<?php if ($_color_link) {
    echo "a {color:";
    echo $_color_link;
    echo"!important;}";
} ?>
<?php if ($_color_footer_line) {
    echo ".line-sub-footer, .footer_widget_middle ul li, .footer_widget_middle div ul li, .footer_widget_middle div div ul li {border-bottom-color:";
    echo $_color_footer_line;
    echo"!important;}";
} ?>
<?php if ($_color_footer_line) {
    echo "#footer, .footer_widget_middle ul,.footer_widget_middle div ul, .footer_widget_middle div div ul {border-top-color:";
    echo $_color_footer_line;
    echo"!important;}";
} ?>
<?php if ($_color_hover_link) {
    echo "a:hover {color:";
    echo $_color_hover_link;
    echo"!important;}";
} ?>
<?php if ($_color_heading) {
    echo "h1,h2,h3,h4,h5,h6 {color:";
    echo $_color_heading;
    echo"!important;}";
} ?>
<?php if ($_color_button_background) {
    echo ".big-button, .read-more-link,.portfolio-categoria-button,.more-link-2 a,.reply_link a,.form-submit input,#send_message {background-color:";
    echo $_color_button_background;
    echo"!important;}";
} ?>
<?php if ($_color_button_font) {
    echo ".big-button, .read-more-link,.portfolio-categoria-button,.more-link-2 a,.reply_link a,.form-submit input,#send_message {color:";
    echo $_color_button_font;
    echo"!important;}";
} ?>
<?php if ($_color_button_border) {
    echo ".big-button, .read-more-link,.portfolio-categoria-button,.more-link-2 a,.reply_link a,.form-submit input,#send_message {border-color:";
    echo $_color_button_border;
    echo"!important;}";
} ?>
<?php if ($_color_button_hover_background) {
    echo ".big-button:hover, .read-more-link:hover,.portfolio-categoria-button:hover,.more-link-2 a:hover,.reply_link a:hover,.form-submit input:hover,#send_message:hover {background-color:";
    echo $_color_button_hover_background;
    echo"!important;}";
} ?>
<?php if ($_color_button_hover_font) {
    echo ".big-button:hover, .read-more-link:hover,.portfolio-categoria-button:hover,.more-link-2 a:hover,.reply_link a:hover,.form-submit input:hover,#send_message:hover {color:";
    echo $_color_button_hover_font;
    echo"!important;}";
} ?>
<?php if ($_color_footer_background) {
    echo "#footer {background-color:";
    echo $_color_footer_background;
    echo"!important;}";
} ?>
<?php if ($_color_footer_font) {
    echo ".footer_widget_middle p, .footer_widget_middle div p, .footer_widget_middle div div p, .footer_widget_middle div div p span, .footer_widget_middle, .footer_widget_middle div, .footer_widget_middle div div, #sub_footer div div, #footer_twitter ul li span, .footer_widget_middle ul li a abbr {color:";
    echo $_color_footer_font;
    echo"!important;}";
} ?>
<?php if ($_color_footer_link) {
    echo ".footer_widget_middle a, .footer_widget_middle div a, .footer_widget_middle div div a, #footer_menu ul li a, #footer_twitter ul li a, #sub_footer div div a {color:";
    echo $_color_footer_link;
    echo"!important;}";
} ?>
<?php if ($_color_footer_hover_link) {
    echo ".footer_widget_middle a:hover, .footer_widget_middle div a:hover, .footer_widget_middle div div a:hover, #footer_menu ul li a:hover, #footer_twitter ul li a:hover, #sub_footer div div a:hover {color:";
    echo $_color_footer_hover_link;
    echo"!important;}";
} ?>
<?php if ($_color_footer_heading) {
    echo ".footer_widget_middle h1, .footer_widget_middle h2, .footer_widget_middle h3, .footer_widget_middle h4, .footer_widget_middle h5, .footer_widget_middle h6,
.footer_widget_middle div h1, .footer_widget_middle div h2, .footer_widget_middle div h3,
.footer_widge_middlet div h4, .footer_widget_middle div h5, .footer_widget_middle div h6 {color:";
    echo $_color_footer_heading;
    echo"!important;}";
} ?>
</style>
