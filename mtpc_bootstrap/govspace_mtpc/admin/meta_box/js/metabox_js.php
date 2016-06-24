<script>
    jQuery(document).ready(function($) {
        $('.appendoButtonsdiv').click(function() {
            $('bee-metabox-wrap:last').add('<div class="bee-metabox-wrap"> \
					<div class="sm-image sm-image_id"> \
  			            <input type="text" class="sm-upload-input" value="" name="src[]" id="src[]" /> \
                    	<span><strong>Featured Media</strong></span> \
                        <div class="sm-image-thumb"><div class="sm-image-thumb-in"><?php echo $prevImg; ?></div></div> \
                        <div class="sm-upload-button-frame"><a class="sm-upload-button" title="Upload Button">Upload</a></div> \
                    </div> \
                    <div class="sm-content"> \
                        <span><strong>Caption Title</strong></span> \
                            <span class="bee-metabox-border"> \
                                    <input type="text" name="title[]" id="title[]"  value="" /> \
                            </span> \
                        <span><strong>Caption</strong></span> \
                            <textarea  name="caption[]" id="caption[]" ></textarea> \
                         <span><strong>Apply link to the image?</strong></span> \
                             <div> \
                                 <span class="bee-metabox-border"> \
                                        <select name="link_type[]" class="select_js" id="link_type[]"><?php $options_title = array('Select...', 'No link', 'Lightbox', 'Link to this Post', 'Link to Page', 'Link to Category', 'Link manually');  foreach ($options_title as $link_v) {
                echo '<option', $slide['link_type'] == $link_v ? ' selected="selected"'
                        : '', '>' . $link_v . '</option>';
            }?></select> \
                                </span> \
                                <span class="bee-metabox-border url_manualhides" style="display: none; margin-top:-5px;"> \
                                        <input type="text" name="url_manual[]" id="url_manual[]" class="url_manual_visible"  value="" /> \
                                </span> \
                                <span class="bee-metabox-border url_pagehides" style="display: none; margin-top:-5px;"> \
                                        <select name="url_page[]" id="url_page[]" class="url_page_visible" ><?php $of_pages = array(); $of_pages_obj = get_pages('sort_column=post_parent,menu_order'); foreach ($of_pages_obj as $of_page) {
                $of_pages[$of_page->ID] = $of_page->post_name;
            } $page_tmp = array_unshift($of_pages, "Select page");  foreach ($of_pages as $link_v) {
                echo '<option', $slide['url_page'] == $link_v ? ' selected="selected"'
                        : '', '>' . $link_v . '</option>';
            }?> </select> \
                                </span> \
                                <span class="bee-metabox-border url_cathides" style="display: none; margin-top:-5px;"> \
                                    <select name="url_cat[]" id="url_cat[]" class="url_cat_visible" ><?php $of_categories = array();   $of_categories_obj = get_categories('hide_empty=0'); foreach ($of_categories_obj as $of_cat) {
                $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
            } $categories_tmp = array_unshift($of_categories, "Select category");  foreach ($of_categories as $link_v) {
                echo '<option', $slide['url_cat'] == $link_v ? ' selected="selected"' : '', '>' . $link_v . '</option>';
            }?> </select> \
                                </span> \
                        </div> \
                    </div> \
                    <div class="sm-option"> \
                        <div class="sm-option-delete"></div> \
                    </div> \
                    <div class="clear"></div> \
                </div>').appendTo($("#bee-appendo-wrap"));
        });

    })(jQuery);
</script>            