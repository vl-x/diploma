Utilities = {}

Utilities.Common = {
    socSharePopup: function (params)
    {
        params = $.extend({
        }, params);

        $(document).on("click", params.el, function (event) {
            event.preventDefault();
            window.open($(this).attr("href"), "Sharing", "directories=0,height=600,width=600,location=0,menubar=0,status=0,titlebar=0,toolbar=0");
        });
    },
    saveTimeZone: function ()
    {
        var tz = jstz.determine();
        var timezone = tz.name();
        $.post(yii.urls.base + "/saveBrowserTimeZone", {tz: timezone}, function (data) {
        });

    },
    millionData: function ()
    {
        $.getJSON(yii.urls.base + "/site/million", function (data) {
            if (data.code === 200) {
                $('.million__intro-counter-inner').html(data.htmlAttemptCount);
                $('.million__intro h1').html(data.h1);
                if (data.finished === 1) {
                    $('.million__intro h1').html(data.h1);
                    $('.million__intro-logo').addClass('t0');
                    //$('#winner').html(data.winner.data.userName);
                    $('#topShooter').parent().hide();
                    $('#lastShooter').parent().hide();
                } else {
                    $('.million__intro h1').html(data.h1);
                    $('.million__intro-logo').removeClass('t0');
                    $('#topShooter').parent().show();
                    $('#lastShooter').parent().show();
                    if (data.topShooter)
                        $('#topShooter').html(data.topShooter.userName + '<u>|</u>' + data.topShooter.attemptCount + ' SHOTS');
                    else
                        $('#topShooter').parent().hide();
                    if (data.lastShooter)
                        $('#lastShooter').html(data.lastShooter.userName + '<u>|</u>' + data.lastShooter.attemptCount + ' SHOTS');
                    else
                        $('#lastShooter').parent().hide();
                }
            }
        });

    },
    millionDataTimer: function ()
    {
        var interval = 1000 * 60 * 1; // where X is your every X minutes
        setInterval(function () {
            Utilities.Common.millionData();
        }, interval);

    },
    showPopup: function (params)
    {
        params = $.extend({
            countryName: ''
        }, params);
        setTimeout(function () {
            $('#def-popup').fadeIn(200);
            $('#def-popup .popup-inner').append('Your country is ' + params.countryName)

            $('.popup-closer').on('click', function () {
                $(this).parent().fadeOut(200);
            });
            $('.popup-inner').css('margin-top', -($('.popup-inner').height() / 2));
            $(document).keyup(function (e) {
                if (e.keyCode == 27) {
                    $('.popup').fadeOut(200);
                }
            });

        }, 20000);
    },
    phoneMask: function (params)
    {
        params = $.extend({
        }, params);
        var pattern = '(999) 999-99999';
        var pattern2 = 'Z999999999999999999';
        var options = {onKeyPress: function (cep, e, field, options) {
                if (cep.length > 14) {
                    $(params.el).unmask(pattern);
                    $(params.el).mask(pattern2, {
                        translation: {
                            'Z': {
                                pattern: /[+]/, optional: true
                            }
                        }
                    });
                } else {
                    console.log('lol');
                }
            }};
        $(params.el).mask(pattern, options);
    },
};

$(function () {
    'use strict';

    // fixed menu
    /*if (document.body.clientWidth > 600) {
     var x = $('.main-menu').height();
     $.lockfixed('.media-menu', {offset: {top: x}});
     $.lockfixed('.infographic-top', {offset: {top: x}});
     $.lockfixed('.main-menu', {offset: {top: 0}});
     }*/

    var x = $('.main-menu').outerHeight();
    $('.header .main-menu').scrollFix();
    $('.infographic-top, .media-menu').scrollFix({
        fixTop: x
    });

    var outerHeightBlockquote = $('.blockquote').outerHeight();

    $(".wrapper-subhead").stick_in_parent({offset_top: x});
    // $(".wrapper-subhead").stick_in_parent({offset_top:x});

    //  animated
    var wow = new WOW({
        offset: 120,
        boxClass: 'wow',
        animateClass: 'animated',
        //offset: 100, DUPLICATE
        live: true,
    });

    wow.init();

    Utilities.Common.socSharePopup({el: '.soc-share-popup'});

    $('.video-frame').fitVids();

    $('.carousel').owlCarousel({
        stopOnHover: true,
        responsive: true,
        slideSpeed: 1000,
        rewindSpeed: 0,
        autoPlay: 2000,
        navigation: false,
        pagination: false
    });

    $('.slider').owlCarousel({
        slideSpeed: 1000,
        autoPlay: 7000,
        autoHeight: true,
        paginationSpeed: 1000,
        stopOnHover: true,
        rewindSpeed: 1000,
        singleItem: true,
        navigation: true,
        lazyLoad: true,
        navigationText: ['&lsaquo;', '&rsaquo;']
    });

    // smooth scroll
    var offset = $('.main-menu').height() + $('.media-menu').height();
    smoothScroll.init({
        speed: 500,
        easing: 'easeInOutCubic',
        updateURL: true,
        offset: offset,
    });

    $('body').scrollspy({target: '#media-menu', offset: offset});

    // min height function
    function minHeight() {
        $('.contacts').css('min-height', function () {
            return $(window).height() - $('.header').height() - $('.footer').height();
        });
    }

// tabs hover
    $('.visible-lg .app-intro__tabs-tab').hover(function () {
        var dataToggle = $(this).attr('data-toggle');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $(this).parents('.row').find('img.active').removeClass('active');
        $(this).parents('.row').find(dataToggle).addClass('active');
        // alert(dataToggle);
    });

    // devices tab
    $('.devices-tabs .devices-tab').on('click', function () {
        var target = $(this).attr('data-target');
        if ($(this).is('.active')) {
            $(this).removeClass('active').blur();
            $(target).removeClass('active');
        } else {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $(target).addClass('active').siblings('.active').removeClass('active');
        }
    });

    $('.devices-tab.visible-xs').on('click', function () {
        var target = $(this).attr('data-target');
        if ($(this).is('.active')) {
            $(this).removeClass('active').blur();
            $(target).removeClass('active');
        } else {
            $(this).addClass('active').siblings('.devices-tab.visible-xs.active').removeClass('active');
            $(target).addClass('active').siblings('.devices-section.active').removeClass('active');
        }
    });

    // tabs hover
    $('.devices-preview img').hover(function () {
        var dataToggle = $(this).attr('src');

        $(this).parents('.col-sm-6').next('.col-sm-6')
                .find('img[src="' + dataToggle + '"]').addClass('active')
                .siblings('.active').removeClass('active');

        $(this).parents('.devices-preview').prev()
                .find('img[src="' + dataToggle + '"]').addClass('active')
                .siblings('.active').removeClass('active');
    });

    $('.devices-preview').mouseleave(function () {
        $(this).parents('.col-sm-6').next('.col-sm-6').find('img.active').removeClass('active');
        $(this).parents('.col-sm-6').next('.col-sm-6').find('img:first').addClass('active');
    });

    // $('a.video').prettyPhoto({default_width: 800, default_height: 420, });


    $(document).on("click", '#subscribe-form button, #subscribe-ces-form button, #team-order-form button, #interested-form button', function (e) {
        e.preventDefault();
        var obj = $(this).closest("form");
        obj.find('.errorMessage, .successMessage').html('').hide();
        $.blockUI({baseZ: 2000});

        var formId = obj.attr('id');
        switch (formId) {
            case 'team-order-form':
                ga('send', 'event', 'Forms', 'submit', 'Team Pre-order Form');
                break
            case 'subscribe-ces-form':
                ga('send', 'event', 'Forms', 'submit', 'Pre-order Form');
                break
            case 'subscribe-form':
                ga('send', 'event', 'Forms', 'submit', 'Subscribe Form');
                break
        }

        obj.ajaxSubmit({
            url: obj.attr('action'),
            dataType: 'json',
            success: function (data) {
                $.unblockUI();
                if (data.code === 200) {
                    obj[0].reset();
                    obj.find('.successMessage').html(data.message).show().fadeOut(9000);
                } else {
                    $.each(data.errors, function (id, v) {
                        obj.find('[id*="_' + id + '_em_"]').html(v).show();
                    });
                }
            }
        });
        return false;
    });
    $('#subscribe-form, #subscribe-ces-form').on('keyup keypress', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        }
    });

    $(document).ready(function () {
        $('.fancybox-media').fancybox({
            openEffect: 'none',
            closeEffect: 'none',
            helpers: {
                media: {}
            },
            afterLoad: function (current) {
            }
        });
    });

    $(document).on("click", '.fancybox-media', function (e) {
        var obj = $(this);
        var href = obj.attr('href');
        if (href.indexOf('vimeo') !== -1 || href.indexOf('youtu.be') !== -1) {
            var attrTitle = obj.attr('title') ? obj.attr('title') : href;
          //  ga('send', 'event', 'video', 'play', attrTitle);
        }
    });

    $(window).load(function () {
        $('.header-vc .main-menu').scrollFix();
        minHeight();

    });
    $(window).resize(function () {
        minHeight();
        // fixedMenu();
    });

});
function lg(variable) {
    console.log(variable);
}
