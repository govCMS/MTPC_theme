//SEARCH
// *** Animated menu search form disabled *** 
//jQuery(document).ready(function() {
//
//    $('#menu-search').hover(
//
//            function() {
//
//                $(this).animate({width:"200"}, 200).children().children("#menu-search-input").fadeIn(200);
//                $(this).children().children("#menu-search-button").animate({opacity: 0.20}, 200);
//            },
//
//            function() {
//
//                $(this).animate({width:"40"}, 700).children().children("#menu-search-input").fadeOut(200);
//                $(this).children().children("#menu-search-button").animate({opacity: 1}, 300);
//
//            }
//    );
//});//END SEARCH

//SOCIAL
jQuery(document).ready(function() {

    $('.header-social-del').hover(

            function() {

                $(this).animate({opacity: 1}, 200);
            },

            function() {

                $(this).animate({opacity: 0.5}, 200);

            }
    );
});//END SOCIAL

jQuery(document).ready(function() {

    $('.opacity-portfolio').fadeOut();
    $('.portfolio-sliders li, .blog-slide-class li').hover(

            function() {
                $(this).children('.opacity-portfolio, .caption').fadeIn();

            },

            function() {
                $(this).children('.opacity-portfolio, .caption').fadeOut();

            }

    );
});


jQuery(document).ready(function() {
    $('ul#filter a').click(function() {
        $(this).css('outline', 'none');
        $('ul#filter .current').removeClass('current');
        $(this).parent().addClass('current');

        var filterVal = $(this).text();

        if (filterVal == 'All') {
            $('ul#applications .sorting').fadeIn('slow').children(".anythingSlider").children(".anythingWindow").children().children(".activePage").hover(

                    function() {
                        $(this).children('.opacity-portfolio').fadeIn();

                    },

                    function() {
                        $(this).children('.opacity-portfolio').fadeOut();

                    }

            );
        } else {

            $('ul#applications .sorting').each(function() {
                if (!$(this).hasClass(filterVal)) {
                    $(this).fadeOut('normal');
                } else {
                    $(this).fadeIn('slow');
                    $(this).children().children().hover(

                            function() {
                                $(this).children('.opacity-portfolio').fadeIn();

                            },

                            function() {
                                $(this).children('.opacity-portfolio').fadeOut();

                            }

                    );
                }
            });
        }

        return false;
    });
});


// Toogle
jQuery(document).ready(function() {
    jQuery('.toogle_options').slideUp();
    jQuery('.toogle_section h3').click(function() {
        if (jQuery(this).parent().next('.toogle_options').css('display') === 'none') {
            jQuery(this).removeClass('inactive').addClass('active').children('img').removeClass('inactive').addClass('active');
        }
        else {
            jQuery(this).removeClass('active').addClass('inactive').children('img').removeClass('active').addClass('inactive');
        }
        jQuery(this).parent().next('.toogle_options').slideToggle('slow');
    });

});

// Custom sorting plugin
(function($) {
    $.fn.sorted = function(customOptions) {
        var options = {
            reversed: false,
            by: function(a) {
                return a.text();
            }
        };
        $.extend(options, customOptions);
        $data = $(this);
        arr = $data.get();
        arr.sort(function(a, b) {
            var valA = options.by($(a));
            var valB = options.by($(b));
            if (options.reversed) {
                return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;
            } else {
                return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;
            }
        });
        return $(arr);
    };
})(jQuery);


//MOVEMENT
$(document).ready(function() {
    $('.menu_categories ul li a').hover(function() { //mouse in
                $(this).animate({ paddingLeft: '10px' }, 200);
            }, function() { //mouse out
                $(this).animate({ paddingLeft: 0 }, 200);
            });


});

//OPACITY IMAGE, LOGO
//$(function() {
//    $("a img8, #logo").css("opacity", "1.0");
//    $("a img9, #logo").hover(function () {
//
//                $(this).stop().animate({
//                    opacity: 0.5
//                }, "slow");
//            },
//
//            function () {
//                $(this).stop().animate({
//                    opacity: 1.0
//                }, "slow");
//            });
//});


$(document).ready(function() {

    if ($.cookie('panel_cookiess') == "closed") {
        $('.option-button-close').removeClass('option-button-close').addClass('option-button-open');
        $(".theme_option_switcher").animate({marginLeft:-102});
    }
    ;

    $(".option-button-close").toggle(function() {

                $(this).removeClass('option-button-close').addClass('option-button-open');
                $(".theme_option_switcher").animate({marginLeft:-102});

                $.cookie('panel_cookiess', 'closed', { expires: 100000, path: '/', domain: 'afloy.com' });

            }, function() {

                $(this).removeClass('option-button-open').addClass('option-button-close');
                $(".theme_option_switcher").animate({marginLeft:0});

                $.cookie('panel_cookiess', 'open', { expires: 100000, path: '/', domain: 'afloy.com' });

            });
    $(".option-button-open").toggle(function() {

                $(this).removeClass('option-button-open').addClass('option-button-close');
                $(".theme_option_switcher").animate({marginLeft:0});

                $.cookie('panel_cookiess', 'open', { expires: 100000, path: '/', domain: 'afloy.com' });

            }, function() {

                $(this).removeClass('option-button-close').addClass('option-button-open');
                $(".theme_option_switcher").animate({marginLeft:-102});

                $.cookie('panel_cookiess', 'closed', { expires: 100000, path: '/', domain: 'afloy.com' });

            });


    var pattern_cok = $.cookie('pattern');
    $('#texture').addClass(pattern_cok);
    $('.pattern-box').click(function() {

        pp_pattern = $(this).attr('rel');
        $('#texture').removeClass();
        $('#texture').addClass(pp_pattern);
        $.cookie('pattern', pp_pattern, { expires: 100000, path: '/', domain: 'afloy.com' });

    });

    $('#theme_option_prewiev').ColorPicker({
        color: $('#theme_option_color').val(),
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $.ajax({
                type: 'GET',
                url: $('#form_option').attr('action'),
                data: 'theme_option_color=' + $('#theme_option_prewiev').css('backgroundColor')
            });

            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            $('#theme_option_prewiev').css('backgroundColor', '#' + hex);
            $('#head-layout').css('borderColor', '#' + hex);
        }
    });


    var colorbg_cok = $.cookie('color_bg');
    $('#texture').css('backgroundColor', '#' + colorbg_cok);
    $('#theme_option_prewiev2').css('backgroundColor', '#' + colorbg_cok);
    $('#theme_option_prewiev2').ColorPicker({
        color: $('#theme_option_color2').val(),
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $.ajax({
                type: 'GET',
                url: $('#form_option').attr('action'),
                data: 'theme_option_color=' + $('#theme_option_prewiev2').css('backgroundColor')
            });

            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            $('#theme_option_prewiev2').css('backgroundColor', '#' + hex);
            $('#texture').css('backgroundColor', '#' + hex);
            $.cookie('color_bg', hex, { expires: 100000, path: '/', domain: 'afloy.com' });
        }
    });


    $('#theme_option_prewiev3').ColorPicker({
        color: $('#theme_option_color3').val(),
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $.ajax({
                type: 'GET',
                url: $('#form_option').attr('action'),
                data: 'theme_option_color=' + $('#theme_option_prewiev3').css('backgroundColor')
            });

            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            $('#theme_option_prewiev3').css('backgroundColor', '#' + hex);
            $('#title-layout').css('borderColor', '#' + hex);
            $('#header-middle-line').css('borderColor', '#' + hex);
        }
    });

    $('#theme_option_prewiev4').ColorPicker({
        color: $('#theme_option_color4').val(),
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $.ajax({
                type: 'GET',
                url: $('#form_option').attr('action'),
                data: 'theme_option_color=' + $('#theme_option_prewiev4').css('backgroundColor')
            });

            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            $('#theme_option_prewiev4').css('backgroundColor', '#' + hex);
            $('#title-button').css('backgroundColor', '#' + hex);
            $('.form-submit input').css('backgroundColor', '#' + hex);
            $('.portfolio-categoria-button').css('backgroundColor', '#' + hex);
            $('.more-link-2 a').css('backgroundColor', '#' + hex);
            $('.reply_link a').css('backgroundColor', '#' + hex);
        }
    });

});	
                                                                                                   
