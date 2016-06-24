<form action="/" method="get">
    <fieldset>
        <label for="search"><?php _e('Search in', "madza_translate"); ?> <?php echo home_url('/'); ?></label>
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>"/>
        <input type="image" alt="<?php _e('Search', "madza_translate"); ?>"
               src="<?php get_template_directory_uri(); ?>/images/search.png"/>
    </fieldset>
</form>

<form method="get" id="searchform" action="<?php echo home_url(); ?>/">

    <div id="search-icon"></div>

    <input type="text" onfocus="if(this.value=='<?php _e('Search', "madza_translate"); ?>')this.value='';"
           onblur="if(this.value=='')this.value='<?php _e('Search', "madza_translate"); ?>';"
           value="<?php _e('Search', "madza_translate"); ?>" name="s" id="s3" class="search_input3"/>

    <div id="searchsubmit_div_3"><input type="submit" id="searchsubmit3" value="" class="search_submit3"/></div>


</form>