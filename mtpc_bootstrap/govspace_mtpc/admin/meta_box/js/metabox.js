jQuery(document).ready(function($) {

    $('.appendoButtons-embed').click(function() {
        $('.bee-metabox-wrap-embed').clone()
                .find(".add-attr-sm-title").attr({name: "title[]"}).end()
                .find(".sm-upload-input").attr({name: "src[]"}).end()
                .find(".add-caption").attr({name: "caption[]"}).end()
                .find(".add-link_type").attr({name: "link_type[]"}).end()
                .find(".add-url_manual").attr({name: "url_manual[]"}).end()
                .find(".add-url_page").attr({name: "url_page[]"}).end()
                .find(".add-url_cat").attr({name: "url_cat[]"}).end()
                .removeClass('bee-metabox-wrap-embed').addClass('bee-metabox-wrap-remove-block').appendTo($("#bee-appendo-wrap"));
    });

    $('.appendoButtonsdiv').click(function() {
        $('.bee-metabox-wrap-add').clone()
                .find(".add-attr-sm-title").attr({name: "title[]"}).end()
                .find(".sm-upload-input").attr({name: "src[]"}).end()
                .find(".add-attr-sm-caption").attr({name: "caption[]"}).end()
                .find(".select_js").attr({name: "link_type[]"}).end()
                .find(".url_manual_visible").attr({name: "url_manual[]"}).end()
                .find(".url_page_visible").attr({name: "url_page[]"}).end()
                .find(".url_cat_visible").attr({name: "url_cat[]"}).end()
                .removeClass('bee-metabox-wrap-add').addClass('bee-metabox-wrap-remove-block').appendTo($("#bee-appendo-wrap")).show(function() {

                    var singleValues = $(this).children().children().children().children(".select_js").val();

                    if (singleValues === "Link manually") {

                        $(this).children().children().children(".url_manualhides:hidden").show();

                    }
                    if (singleValues === "Link to Page") {

                        $(this).children().children().children(".url_pagehides:hidden").show();

                    }
                    if (singleValues === "Link to Category") {

                        $(this).children().children().children(".url_cathides:hidden").show();

                    }

                })
                .change(
                function() {

                    var singleValues = $(this).children().children().children().children(".select_js").val();

                    if (singleValues === "Link manually") {

                        $(this).children().children().children(".url_manualhides:hidden").show("fast").show(function() {

                            var urlVal = $(this).children(".url_manual_visible").val();

                            if (urlVal === "") {

                                $(this).children(".url_manual_visible").val("http://");

                            }

                        });


                    } else {

                        $(this).children().children().children(".url_manualhides:visible").hide("fast");

                    }

                    if (singleValues === "Link to Page") {

                        $(this).children().children().children(".url_pagehides:hidden").show("fast");

                    } else {

                        $(this).children().children().children(".url_pagehides:visible").hide("fast");

                    }

                    if (singleValues === "Link to Category") {

                        $(this).children().children().children(".url_cathides:hidden").show("fast");

                    } else {

                        $(this).children().children().children(".url_cathides:visible").hide("fast");

                    }

                }).show(function() {

                    var urlVal = $(this).children().children().children(".url_manualhides:visible").children(".url_manual_visible").val();

                    if (urlVal === "") {

                        $(this).children().children().children(".url_manualhides:visible").children(".url_manual_visible").val("http://");

                    }

                })

                ;

    });

    // slide delete button
    $('.sm-option-delete').live('click', function() {
        if ($('.bee-metabox-wrap-remove-block').size() == 1) {
        }
        else {
            $(this).parent().parent().slideUp(200, function() {
                $(this).remove();
            })
        }
        return false;
    });

    // jQuery UI sortable
    $("#bee-appendo-wrap").sortable({
        placeholder: 'slide-highlight',
        distance: 15
    });


    $(".select_js").show(
            function() {

                var singleValues = $(this).val();

                if (singleValues === "Link manually") {

                    $(this).parent().parent().children(".url_manualhides:hidden").show("fast");

                }
                if (singleValues === "Link to Page") {

                    $(this).parent().parent().children(".url_pagehides:hidden").show("fast");

                }
                if (singleValues === "Link to Category") {

                    $(this).parent().parent().children(".url_cathides:hidden").show("fast");

                }

            }).change(
            function() {

                var singleValues = $(this).val();

                if (singleValues === "Link manually") {

                    $(this).parent().parent().children(".url_manualhides:hidden").show("fast").show(function() {

                        var urlVal = $(this).children(".url_manual_visible").val();

                        if (urlVal === "") {

                            $(this).children(".url_manual_visible").val("http://");

                        }

                    });


                } else {

                    $(this).parent().parent().children(".url_manualhides:visible").hide("fast");

                }

                if (singleValues === "Link to Page") {

                    $(this).parent().parent().children(".url_pagehides:hidden").show("fast");

                } else {

                    $(this).parent().parent().children(".url_pagehides:visible").hide("fast");

                }

                if (singleValues === "Link to Category") {

                    $(this).parent().parent().children(".url_cathides:hidden").show("fast");

                } else {

                    $(this).parent().parent().children(".url_cathides:visible").hide("fast");

                }

            }).show(function() {

                var urlVal = $(this).parent().parent().children(".url_manualhides:visible").children(".url_manual_visible").val();

                if (urlVal === "") {

                    $(this).parent().parent().children(".url_manualhides:visible").children(".url_manual_visible").val("http://");

                }

            });

});


(function($) {
    var sm = {

        smUseCustomEditor: false,
        smPostID: false,
        insertContainer : false,

        b_click: function() {
            $('.sm-upload-button').live('click', function() {
                var title = this.title
                this.title = "";


                sm.smPostID = this.hash.substring(1);
                sm.smUseCustomEditor = true;
                sm.insertContainer = $(this).parents('.sm-image');


                var label = $(this).parents('.sm-image').find('.sm-upload-input').trigger('change').val();

                tb_show(title, 'media-upload.php?post_id=' + sm.smPostID + '&amp;sm=' + encodeURI(label) + "&amp;TB_iframe=true");


                return false;
            });
        },


        b_remove: function() {
            $('.sm-remove-image').live('click', function() {
                var container = $(this).parents('.sm-image');

                container.find('.sm-upload-input').val('').trigger('change');
                container.find('.sm-image-thumb-in').hide(200, function() {
                    $(this).html("").css({display:"block"});
                });

                return false;
            });
        },


        hijack_uploader: function() {
            window.original_send_to_editor = window.send_to_editor;
            window.send_to_editor = function(html) {
                if (sm.smUseCustomEditor) {
                    var container = sm.insertContainer,
                            img = $(html).attr('href'),
                            visualInsert = '';

                    container.find('.sm-upload-input').val(img).trigger('change');

                    if (img.match(/.jpg$|.jpeg$|.png$|.gif$/)) {
                        visualInsert = '<a href="#" class="sm-remove-image">remove</a><img width="117px" height="117px" src="' + templateUrl + '/includes/thumb.php?src=' + img + '&h=117&w=117" alt="" />';
                    }
                    else {
                        visualInsert = '<a href="#" class="sm-remove-image">remove</a><img width="117px" height="117px" src="images/icons/video.png" alt="" />';
                    }

                    container.find('.sm-image-thumb-in').html(visualInsert);

                    tb_remove();
                    sm.reset_uploader();
                }
                else {
                    window.original_send_to_editor(html);
                }
            };
        },


        reset_uploader: function() {
            sm.smUseCustomEditor = false;
            sm.smPostID = false;
            sm.insertContainer = false;
        }


    };


    $(function() {
        sm.b_click();
        sm.b_remove();
        sm.hijack_uploader();
    });


})(jQuery);	 