
$(function () {
    var prone_tabs = $('.phone_tabs li');

    prone_tabs.hover(function () {
        var that = $(this);
        prone_tabs.removeClass('active');
        that.addClass('active');

        image = '#' + that.data('tab-img');
        $('.image_tabs img').removeClass('active');
        $(image).addClass('active');


        // alert(dataToggle);
    });

    var x = $('.article .row-b').outerHeight();
    $(".article .menu").stick_in_parent({offset_top: x + 45});

    var prone_tabs_span = $('.home_controlls span');

    prone_tabs_span.click(function () {
        var that = $(this);
        prone_tabs_span.removeClass('active');
        that.addClass('active');

        slides = that.attr('id');

        $('.image_tabs img').removeClass('active');
        $('.home_tabs_text div').removeClass('active');
        $('*[data-tab-img-home=' + "\"" + slides + "\"" + ']').addClass('active');


        // alert(dataToggle);
    });

    /*  if ($('.scroll_comment li').length) {
     var scroll_comment = $('.scroll_comment li');
     $('.scroll_comment li').on('click', function () {
     var that = $(this);
     scroll_comment.removeClass('active');
     that.addClass('active');
     scroll = that.attr('id');
     $('.comments .comment').removeClass('active');
     $('*[data-comment-block=' + "\"" + scroll + "\"" + ']').addClass('active');
     // alert(dataToggle);
     });
     
     setInterval(function () {
     var li = $('.scroll_comment li.active');
     if (li.is(':last-child')) {
     $('.scroll_comment li:first-child').click();
     } else {
     li.next('li').click();
     }
     }, 7000);
     }*/

    //var videoState = 0;
    //var videoOverlay = 0;
    function turnOnVideo() {
        // $('.splash-top-text a').on('click', function () {
        //videoState = 1;
        //$('.splash-top-text p').css('opacity', '1');
        //$('.splash-top-logo').css('opacity', '1');
        //$('.get-complete-top-gradient2-head').css('display', 'block');
        //$('.get-complete-top-gradient2-head').css('display', 'none');
        if ($('#head-video').length) {
            $('#head-video').get(0).play();
        }
        if ($('#head-video2').length) {
            $('#head-video2').get(0).play();
        }
        if ($('#head-video-hm').length) {
            $('#head-video-hm').get(0).play();
        }
        //$('.splash-top-text a').html('<i>||&nbsp;&nbsp;</i>PAUSE VIDEO');
//                 $('.splash-top-text a').html('');
        //if (videoOverlay == 1) {
        //  $('.splash-top-ancor').click();
        //}
        //});

        /*$('.splash-top-ancor').on('click', function () {
         if (videoOverlay == 0) {
         var height = $('#head-video').height();
         $('#splash-top').css('height', height + 'px');
         videoOverlay = 1;
         $('.splash-top-ancor').addClass('rotated');
         if ($(this).hasClass('onlyteam')) {
         $(this).css('margin-top', (height - 500) + 'px');
         } else {
         $(this).css('margin-top', (height - 400) + 'px');
         }
         //$('.splash-top-text a').css('margin-top', '200px');
         } else {
         $('#splash-top').css('height', '518px');
         $('.splash-top-ancor').removeClass('rotated');
         videoOverlay = 0;
         if ($(this).hasClass('onlyteam')) {
         $(this).css('margin-top', '18px');    
         } else {
         $(this).css('margin-top', '148px');    
         }
         
         $('.splash-top-text a').css('margin-top', '-10px');
         }
         });*/

        //  $('.splash-top-text a').click();
    }
    function turnOnTestimonials() {
        $('.expertsSays').owlCarousel({
            autoPlay: 7000,
            dots: false,
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: false,
            items: 2,
            navigationText: ['<a class="esn-left">&#9658;</a>', '<a class="esn-right">&#9658;</a>']

        });
        $('#expertSays').owlCarousel({
            autoPlay: 7000,
            dots: false,
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            navigationText: ['<a class="esn-left">&#9658;</a>', '<a class="esn-right">&#9658;</a>']

        });
    }
    function turnOnLogos() {
        $('.carousel').owlCarousel({
            stopOnHover: true,
            slideSpeed: 1000,
            rewindSpeed: 0,
            autoPlay: 2000,
            navigation: false,
            pagination: false,
            responsive: true
        });
    }

    $(document).ready(function () {
        turnOnVideo();
        turnOnTestimonials();
        turnOnLogos();
    });


    $(document).ready(function () {
        $('.video-wrapper').on('click', function (event) {
            $(this).next('iframe')[0].src += "&autoplay=1";
            event.preventDefault();
        });
    });
    $(document).ready(function () {
        $('#SubscribeForm_state_code').on('change', function (event) {
            if ($(this).val() === '') {
                $(this).css('color', '#757575');
            } else {
                $(this).css('color', '#FFF');
            }
        });
    });



    /*$(document).ready(function () {
     var isshow = localStorage.getItem('isshow');
     isshow = null;
     if (isshow == null) {
     localStorage.setItem('isshow', 1);
     $('.fancy').fancybox({
     autoSize: true,
     fitToView: false,
     maxWidth: '100%',
     wrapCSS: 'fancybox-holiday-popup',
     helpers: {
     overlay: {
     css: {
     'background': 'rgba(0, 0, 0, 0.2)'
     }
     }
     }
     });
     $('#holidayPopupTrigger').click();
     }
     });*/

    $('.get-complete-botside .gcb-menu a, .phone_tabs_mob_nav.team a').click(function (e) {
        e.preventDefault();
        var obj = $(this);
        changeImgSrs(obj);

    });

    $('.get-complete-botside .gcb-menu a').hover(function () {
        var obj = $(this);
        changeImgSrs(obj);
    });

    function changeImgSrs(obj) {

        var index = obj.index();
        $('.target-tabs img').hide();
        $('.target-tabs img:eq(' + index + ')').show();
        $('.get-complete-botside .gcb-menu  a').removeClass('selected');
        obj.addClass('selected');

        return false;
    }

    $('.phone_tabs_mob_nav a').on('click', function () {
        $('.phone_tabs_mob_nav a').removeClass('active');
        $(this).addClass('active');
        var temp = $(this).attr('data-tab-id');
        $('.image_tabs img').removeClass('active');
        $('#' + temp).addClass('active');
        $('.phone_tabs li').removeClass('active');
        console.log(temp);
        $('li[data-tab-img="' + temp + '"]').addClass('active');

    });

});
