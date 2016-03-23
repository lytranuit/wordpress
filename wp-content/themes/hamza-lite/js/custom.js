jQuery(function ($) {
    console.log($(window).width());
    if (hamza_lite_data.option == 'true') {
        var slider_pager = true;
    } else {
        var slider_pager = false;
    }

    if (hamza_lite_data.auto == 'true') {
        var slider_auto = true;
    } else {
        var slider_auto = false;
    }
//    $('.bx-slider').bxSlider({
//        mode: hamza_lite_data.mode,
//        speed: hamza_lite_data.speed,
//        pager: slider_pager,
//        controls: false,
//        auto: slider_auto,
//        autoControls: true,
//        pause: hamza_lite_data.pause,
//        minSlides: 3,
//        maxSlides: 4,
//        slideWidth: 220,
//        slideMargin: 10
//    });=
    $('#silder-main').flexslider({
        animation: "slide",
        controlNav: false
    });

    $('#login-trigger').click(function () {
        $(this).next('#login-content').slideToggle();
        $(this).toggleClass('active');

        if ($(this).hasClass('active'))
            $(this).find('span').html('&#x25B2;')
        else
            $(this).find('span').html('&#x25BC;')
    })

    var winwidth = $(window).width();
    if (winwidth <= 992 && winwidth > 640) {
        var maxsl = 2;
        swidth = 300;
    }
    else if (winwidth <= 640) {
        var maxsl = 1;
        swidth = 300;
    }
    else {
        var maxsl = 3;
        swidth = 390;
    }

    $(window).scroll(function () {
        var top = $(this).scrollTop();
        $(".banner-left,.banner-right").css({"top": top});
    });
    $(window).resize(function () {
        $('.slider-caption').each(function () {
            var cap_height = $(this).actual('outerHeight');
            $(this).css('margin-top', -(cap_height / 2));
        });
    }).resize();

    $('.caption-description').each(function () {
        $(this).find('a').appendTo($(this).parent('.ak-container'));
    });


    $('.commentmetadata').after('<div class="clear"></div>');

    $('.menu-toggle').click(function () {
        $('#site-navigation .menu').slideToggle('slow');
    });

    $('.gallery .gallery-item a').each(function () {
        $(this).addClass('fancybox-gallery').attr('data-lightbox-gallery', 'gallery');
    });

    $(".fancybox-gallery").nivoLightbox();


    $('.search-icon .fa-search').click(function () {
        $('.ak-search').fadeToggle();
    });

    $(window).bind('load', function () {
        $('.slider-wrap .slides').each(function () {
            $(this).prepend('<div class="overlay"></div>');
        });
    });

    $('.service-section .bx-pager-item:first-child').css('width', '26');
});