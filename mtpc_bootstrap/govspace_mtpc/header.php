<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="resource-type" content="document" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <meta name="language" content="english"/>
    <meta name="author" content="Maritime Travellers Protection Committee"/>
    <meta name="contact" content="mtpc@customs.gov.au" />
    <meta name="copyright" content="All material presented on this site is provided under a Creative Commons Attribution 3.0 Australia licence." />
    <meta name="description" content="The role of the Maritime Travellers Processing Committee (MTPC) is to develop
    a whole of government policy approach to processing international travellers and cruise ships.
    The committee is designed to coordinate the exercise of various statutory controls and responsibilities carried
    out by Commonwealth Authorities within the maritime environment." />
    <meta name="keywords" content="maritime, travellers, protection, committee, australian, government, ports, cruise,
    ship, customs, border, protection, immigration, quarantine, infrastructure, transport, tourism, vessels,
    AFP, DOHA, DAFF, AQIS, DIAC, MTPC, AMSA, EOP, NSPFC, RET, TRS, TRO" />
    <title><?php
        global $page, $paged; wp_title('', true, 'right'); bloginfo('name'); $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";
        ?></title>
    <?php wp_head(); ?>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
</head>
<body <?php if (is_page_template('contact-page.php') && get_option("of_contact_map") == "true") {
    echo 'onload="initialize()"';
} ?> <?php body_class(); ?>>


           <?php
           $title_key = "madza_title_type";
           $title = get_post_meta($post->ID, $title_key, true);
           $custom_key = "madza_custom_text";
           $custom_text = get_post_meta($post->ID, $custom_key, true);
           $title_type_simple = "Title only";
           $title_type_custom = "SubTitle only";
           $title_type_simple_custom = "Title & SubTitle text";
           $title_type_simple_disable = "disable";
           $key = "madza_header_type";
           $header = get_post_meta($post->ID, $key, true);
           $url = "madza_header_url";
           $img_url = get_post_meta($post->ID, $url, true);
           $image_slider = "Nivo Slider";
           $image_url = "Image from URL";
           $anything_slider = "Anything Slider";
           $beeCodes_slider = "beeCodes Slider";

           if (get_option('slides')) {
               $slides = get_option('slides');
           } else {
               $slides = false;
           }
           ?>
           <div id="texture">

           <div id="all-div">

           <!-- ******************** HEAD START ******************** -->

           <div id="head-layout">

           <!--TOP AREA -->
           <div id="top-area<?php  if ((get_option("of_homepage_slider") == "homepage_beecodes_slider" && is_front_page() && get_option("of_homepage_menu_position") == "true") or
                                       (get_option("of_homepage_slider") == "homepage_nivo_slider" && is_front_page() && get_option("of_homepage_menu_position") == "true") or
                                       $header == $image_slider or
                                       $header == $beeCodes_slider
           ) {
               echo "-2";
           } ?>">

               <!--TOP HEADER -->
               <div id="header">

                   <div id="header-top">

                       <?php if (get_option('of_enable_logo_image') == "true" && get_option("of_logo_image")) { ?>

                       <div id="logo" <?php if (get_option('of_logo_image')) { ?> style="background:  no-repeat center left url(<?php {
                           echo get_option('of_logo_image');
                       }
                       }?>);">

                           <a href="<?php echo home_url();?>"></a>

                       </div><!--END LOGO IMG -->

                       <?php } else { ?>

                       <div id="logo"><h1><a href="<?php echo home_url();?>"><?php echo bloginfo('name'); ?></a></h1>
                       </div><!--END LOGO TEXT -->

                       <?php } ?>

                       <ul id="header-social">

                           <?php if (get_option('of_header_top_phone') != "") { ?>
                           <li class="phone header-social"><?php echo get_option('of_header_top_phone'); ?></li><?php } ?>
                           <?php if (get_option('of_header_top_email') != "") { ?>
                           <li class="email header-social"><?php echo get_option('of_header_top_email'); ?></li><?php } ?>
                           <?php if (get_option('of_header_top_facebook') != "") { ?>
                           <li class="facebook header-social"><a
                                   href="<?php echo get_option('of_header_top_facebook'); ?>"></a>
                           </li><?php } ?>
                           <?php if (get_option('of_header_top_twitter') != "") { ?>
                           <li class="twitter header-social"><a
                                   href="<?php echo get_option('of_header_top_twitter'); ?>"></a>
                           </li><?php } ?>
                           <?php if (get_option('of_header_top_rss') == "true") { ?>
                           <li class="rss header-social"><a href="<?php bloginfo('rss2_url'); ?>"></a></li><?php } ?>

                       </ul>

                       <div class="clear"></div>
                   </div>
                   <!--END HEADER TOP -->

                   <div id="header-menu<?php  if ((get_option("of_homepage_slider") == "homepage_beecodes_slider" && is_front_page() && get_option("of_homepage_menu_position") == "true") or
                                                  (get_option("of_homepage_slider") == "homepage_nivo_slider" && is_front_page() && get_option("of_homepage_menu_position") == "true") or
                                                  $header == $image_slider or
                                                  $header == $beeCodes_slider
                   ) {
                       echo "-2";
                   } ?>">

                       <div id="menu-home-button"><a href="<?php echo home_url(); ?>" title="Home"></a></div>

                       <div class="nav">
                           <!--                --><?php //wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
                           <?php wp_nav_menu(array('theme_location' => "header_menu", 'container' => false, 'menu_class' => 'menu', 'menu_id' => 'menu', 'echo' => true, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0)); ?>
                           <!--                --><?php //wp_nav_menu(array('theme_location' => "header_menu", 'container' => false, 'menu_class' => 'menu', 'menu_id' => 'menu', 'echo' => true, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0)); ?>

                       </div>
                       <!--END MENU -->

                       <?php if (get_option("of_search") == "true") { ?>

                       <div id="menu-search">

                           <form method="get" id="searchform" action="<?php echo home_url(); ?>/">

                               <input type="text"
                                      onfocus="if(this.value=='<?php echo __('Search...', 'madza_translate'); ?>')this.value='';"
                                      onblur="if(this.value=='')this.value='<?php echo __('Search...', 'madza_translate'); ?>';"
                                      value="<?php echo __('Search...', 'madza_translate'); ?>"
                                      name="s"
                                      id="menu-search-input"
                                      class="search_input3"/>


                               <input type="submit" id="menu-search-button" value=""/>

                           </form>

                       </div>

                       <?php } ?>

                   </div>
                   <!--END HEADER MENU -->


                   <div class="clear"></div>

               </div>
               <!--END HEADER -->

           </div>
           <!-- END TOP AREA -->
           <?php




####################################################################################################################
# HEADER SLIDER DEFAULT PAGE ---------------------------------------------------------------------------------------
####################################################################################################################
           if ($header == $image_slider or $header == $anything_slider or $header == $beeCodes_slider) {

               echo '<div id="slider-top-shadow"></div>';

               if ($header == $image_slider) {

                   include (TEMPLATEPATH . '/includes/sliders/nivo-slider.php');

                   echo '<div id="slider-bottom-shadow"></div>';

               } else if ($header == $anything_slider) {

                   include (TEMPLATEPATH . '/includes/sliders/anything-slider.php');

               } else if ($header == $beeCodes_slider) {

                   include (TEMPLATEPATH . '/includes/sliders/beeCodes-slider.php');

               }

           }




####################################################################################################################
# HEADER SLIDER FRONT PAGE -----------------------------------------------------------------------------------------
####################################################################################################################
           if (is_front_page()) {

               echo '<div id="slider-top-shadow"></div>';

               if (get_option("of_homepage_slider") == "homepage_nivo_slider") {

                   include (TEMPLATEPATH . '/includes/sliders/nivo-slider.php');

                   echo '<div id="slider-bottom-shadow"></div>';

               } else if (get_option("of_homepage_slider") == "homepage_anithing_slider") {

                   include (TEMPLATEPATH . '/includes/sliders/anything-slider.php');

               } else if (get_option("of_homepage_slider") == "homepage_beecodes_slider") {

                   include (TEMPLATEPATH . '/includes/sliders/beeCodes-slider.php');

               }

               if (get_option("of_general_button") == "true") {
                   echo '<a href="' . get_option("of_homepage_tagline_first_button_link") . '"><div id="general-button"></div></a>';
               }

           }




####################################################################################################################
# HEADER SLIDER OTHER ----------------------------------------------------------------------------------------------
####################################################################################################################
           if (is_page_template('contact-page.php') && get_option("of_contact_map") == "true") {
               ?>

           <div id="map_canvas"
                style="width:960px; margin: 0 auto; height:<?php echo get_option("of_contact_map_height"); ?>px;"></div>

               <?php } else if ($header == $image_url) { ?>

           <div id="image-from-url" <?php if ($img_url = "") {
           } else {
               ?> style="background-image: url(<?php echo get_post_meta($post->ID, $url, true); ?>);<?php } ?> height:<?php echo get_option("of_image_from_url_height"); ?>px;"></div>

               <?php } else if (!(is_front_page())) { ?>

           <div id="header-middle-line"></div>

               <?php } ?>





           <!-- ******************** TITLE START ******************** -->

           <div id="title-layout">

               <?php if (get_option("of_homepage") == "true" && is_front_page()) { ?>

               <div class="title-frame-top">

                   <?php if (get_option("of_homepage_tagline") == "true") { ?>

                   <div id="header-title">

                       <div id="title-left-home"><h1><?php echo get_option("of_homepage_tagline_text"); ?></h1></div>

                   </div>

                   <?php } ?>

               </div>

               <?php } else if (is_page_template('portfolio-full-images.php') OR is_page_template('portfolio-small-images.php')) { ?>

               <div class="title-frame-top">

                   <div id="header-title">

                       <div id="title-left-portfolio"><h1><?php the_title(); ?></h1></div>

                       <?php $categorys = get_post_meta($post->ID, "madza_portfolio_cat", true);

                       if ($categorys == "Select..." OR $categorys == "All" OR $categorys == "") {
                           ?>

                           <div id="title-right-portfolio">

                               <?php $term_obj = get_terms('portfolio_taxonomy', $args); ?>

                               <ul id="filter">

                                   <li class="current"><a href="#"><?php _e('All', "madza_translate"); ?></a></li>

                                   <?php foreach ($term_obj as $term) { ?>

                                   <li><a href="#"><?php echo $term->name; ?></a></li>

                                   <?php } ?>

                               </ul>

                           </div>

                           <?php } ?>

                       <div class="clear"></div>

                   </div>

               </div>

               <?php } else { ?>

               <div class="title-frame-top">

                   <?php if ($title == $title_type_simple) { ?>

                   <div id="header-title" <?php if (get_option('of_page_heading_image')) { ?> style="background:  no-repeat center center url(<?php {
                           echo get_option('of_page_heading_image');
                       }
                       }?>); height: 70px; border:  none;">

                       <div id="title-left">
                           <h1 <?php if (get_option('of_page_heading_image')) { ?> style="color: #ffffff;<?php }?>">
                               <?php the_title(); ?>
                           </h1>
                       </div>

                   </div>

                   <?php } else if (get_option("of_homepage") == "false" && is_front_page()) { ?>

                   <div class="title-frame-top">

                       <?php if (get_option("of_homepage_tagline") == "true") { ?>

                       <div id="header-title">

                           <div id="title-left-home"><h1><?php echo get_option("of_homepage_tagline_text"); ?></h1>
                           </div>

                       </div>

                       <?php } ?>

                   </div>

                   <?php } else if (is_single("single-portfolio.php")) { ?>

                   <div id="header-title">

                       <div id="title-left"><h1><?php the_title(); ?></h1></div>

                   </div>

                   <?php } else if ($title == $title_type_custom) { ?>

                   <div id="header-title">

                       <div id="header-subtitle"><?php echo get_post_meta($post->ID, $custom_key, true);?></div>

                       <div class="clear"></div>

                   </div>

                   <?php } else if ($title == $title_type_simple_custom) { ?>

                   <div id="header-title">

                       <div id="title-left"><h1><?php the_title(); ?></h1></div>

                       <div id="header-subtitle"><?php echo get_post_meta($post->ID, $custom_key, true);?></div>

                       <div class="clear"></div>

                   </div>

                   <?php
               } else if ($title == $title_type_simple_disable) {
               } else if (is_single()) {
                   ?>

                   <!-- <div id="header-title">
            
                <div id="title-left"><h1><?php echo __('Blog', "madza_translate"); ?></h1></div>
             
            </div> -->

                   <?php } else if (is_search()) { ?>

                   <div id="header-title">

                       <div id="title-left">
                           <h1><?php printf(__('Search Results for: %s', "madza_translate"), '' . get_search_query() . ''); ?></h1>
                       </div>

                   </div>

                   <?php } else { ?>

                   <div id="header-title">

                       <div id="title-left"><h1><?php the_title(); ?></h1></div>

                   </div>

                   <?php
               } if (is_front_page()) {
               } else {
                   ?>

                   <div id="title_frame_bottom_objects">

                       <div id="title_left">

                           <?php if (is_front_page()) {
                       } else {
                           if (get_option('of_breadcrumb') == "true") {

                               if (function_exists('breadcrumbs_plus')) {
                                   ?>

                                   <div id="breadcrumb">

                                       <?php breadcrumbs_plus($args); ?>

                                       <div class="clear"></div>

                                   </div><!--END BREADCRUMB -->

                                   <?php
                               }
                           } ?><!--END breadcrumb_on -->

                           <?php } ?>

                       </div>

                       <div class="clear"></div>

                   </div>

                   <?php }  ?>

               </div><!--END TITLE FRAME -->

               <?php } ?>

           </div>

           </div>
           <!--END TEXTURE -->

           <!-- ******************** CONTENT START ******************** -->

           <div id="content-full">

               <div id="texture-content">

                   <div id="content">
