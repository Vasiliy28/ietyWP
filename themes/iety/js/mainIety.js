
;(function ($){
    'use strict'
    $(window).on('load', function () {
        var $preloader = $('#page-preloader'),
            $spinner = $preloader.find('.spinner');
        $spinner.fadeOut();
        $preloader.delay(350).fadeOut('slow');
    });
    $(window).ready(function () {
        'use strict'
        console.log($(window).height());
        $('.popup').magnificPopup({
            type: 'image'
        });


        $(window).scroll(function () {
            var st = $(this).scrollTop();

            $('#back').css({
                "transform": "translate(0% , " + st / 15 + "%"
            });

        })
        $(window).scroll(function () {
            var st = $(this).scrollTop();

            $('.wrapperContactUs .back').css({
                "transform": "translate(0% , " + st / 50 + "%"
            });

        })
        $("#togNav").click(function () {
            $("#header").toggleClass('active')
        })
        $(window).ready(function () {
            centre();
        })


        $('#allWorks').mixItUp({
            callbacks: {
                onMixEnd: function () {
                    animateCss()
                }
            }
        });
        $(window).resize(function () {
            centre()
        })
        function centre() {
            var b = $("#mainLinkWrap");
            var w = b.width();
            console.log(w / 2)
            b.css("margin-left", -(w / 2))
        }

        function animateCss() {
            $("header.headerSection h1").animated("slideInRight", "slideOutRight", 50, 0)
            $("header.headerSection h3").animated("slideInRight", "slideOutRight", 50, 0)
            $("header.headerSection div").animated("slideInRight", "slideOutRight", 50, 30)
            $("#input-1").animated("slideInRight", "slideOutRight", 50, 0)
            $("#input-2").animated("slideInLeft", "slideOutLeft", 50, 0)
            $("#text-1").animated("slideInRight", "slideOutRight", 145, -30)
            $(".buttonContactUs").animated("slideInLeft", "slideOutLeft", 50, 0)
            $("#welcomeLog").animated("flipInY", "flipOutY", 60, -30)
            $('.leftContentHistory .history').animated("fadeInLeft", "fadeOutDown", 50, -50)
            $('.rightContentHistory .history').animated("fadeInRight", "fadeOutDown", 50, -50)
            $('.headerSectionLight').animated("rollIn", "rollOut", 50, -150)
            $('.ourHistoryContent > div > header ').animated("bounceIn", "bounceOut", 20, 15)
            $('.workMenu').animated("fadeInLeft", "fadeOutLeft", 30, 50)
            $(".aboutUsContentCenter").animated("zoomIn", "zoomOut", -100, -250)
            $(".aboutUsContentLeft").animated("fadeInLeft", "fadeOutLeft", 30, -300)
            $(".aboutUsContentRight").animated("fadeInRight", "fadeOutRight", 30, -300)
            $(".contactUsBox").animated("zoomIn", "zoomOut", 20, 0)
            $('.contactUs header').animated('slideInDown', 'slideOutUp', 20, -100)
            $('.ourTeamLeft figure').animated("fadeInLeft", "zoomOut", 20, -20)
            $('.ourTeamRight figure').animated("fadeInRight", "zoomOut", 20, -20)
            $('.priceing').animated("zoomIn", "zoomOut", -100, -120)
            $('.welcomeContentLeft').animated("zoomInLeft", "zoomOutLeft", 20, -50)
            $('.welcomeContentRight').animated("zoomInRight", "zoomOutRight", -20, -50)
        }

        $('.aboutUsContentCenter').waypoint(function () {
            console.log("okr")
        })
        $('.aboutLeft').waypoint(function () {
            console.log("okl")
        })
        $(".inputField").each(function () {


            if ($(this).val() !== '' || $(this).val().match(/\S/g) !== null) {

                var par = $(this).parent();
                par.addClass('inputFilled')
            }

            $(this).on("focus", function () {
                var par = $(this).parent();
                par.addClass('inputFilled')
            })

            $(this).on("blur", function () {
                if ($(this).val() == '' || $(this).val().match(/\S/g) == null) {
                    $(this).val("")
                    var par = $(this).parent();
                    par.removeClass('inputFilled')
                }
                else {
                    return
                }
            })
        })


        $(window).load(function () {
            $(".twentytwenty-container").twentytwenty({});
        });

        function stickyHeader() {
            var headerScrollPos = $('#header').next().offset().top;
            var header = $('#header');
            if ($(window).scrollTop() > headerScrollPos) {
                header.addClass('move');
            }
            else if ($(this).scrollTop() <= headerScrollPos) {
                header.removeClass('move');
            }
        }


        function hiddenHeader() {
            var header = $('#header');
            if ($(window).width() > 767) {
                if (header.hasClass('headerHidden')) {
                    header.removeClass('headerHidden')
                }
                else return;

            }
            else {
                header.addClass('headerHidden');
                header.removeClass('move')
            }
        }

        $(window).resize(function () {
            hiddenHeader()
        });
        hiddenHeader();
        if ($(window).width() > 767) {
            stickyHeader();
        }

        $(window).on('scroll', function () {
            console.log($(window).width())

            if ($(window).width() > 767) {
                stickyHeader();
            }
            else return


        });

        $(".itemPage a").mPageScroll2id({
            offset: 59
        });
        currentPage()
        function currentPage() {
            var nav = $('#navPage .itemPage li');
            nav.children('a').on('click', function () {
                nav.removeClass('click')
                $(this).parent().addClass('click')
                if ($(window).width() < 767) {
                    $("#header").toggleClass('active')
                    $('#hamburger-icon').toggleClass('active')
                }

            });
            $('body > section').waypoint(function (dir) {
                if (dir === "down") {
                    var hash = $(this).attr('id');
                    nav.removeClass('active')

                    $.each(nav, function () {
                        if ($(this).children('a').attr('href').slice(1) == hash) {
                            $(this).addClass('active')
                            $(this).removeClass('click')

                        }
                    })
                }
                else return;
            }, {offset: '30%'}).waypoint(function (dir) {
                if (dir === "up") {
                    var hash = $(this).attr('id');
                    nav.removeClass('active')
                    $.each(nav, function () {
                        if ($(this).children('a').attr('href').slice(1) == hash) {
                            $(this).addClass('active')
                            $(this).removeClass('click')

                            console.log('ok')
                        }
                    })
                }
                else return;

            }, {offset: "-50%"})
        }

        $(document).ready(function () {
            var hamburger = $('#hamburger-icon');
            hamburger.click(function () {

                hamburger.toggleClass('active');
                $("#header").toggleClass('active')
                return false;


            });
        });

        function animated(inEffect, outEffect, offsetBottom, offsetTop) {
            var bottomDef = "85%";
            var topDef = "15%";

            var bottom;
            var top;

            if (typeof offsetBottom == "undefined") {
                bottom = bottomDef;

            } else {
                if (typeof(offsetBottom) == "string") {
                    if (offsetBottom.match(/%/i) == null) {
                        bottom = bottomDef;

                    } else {
                        bottom = offsetBottom;
                    }
                }
                else {
                    bottom = $(window).height() - offsetBottom;
                }
            }
            if (typeof offsetTop == "undefined") {
                top = topDef;

            } else {
                if (typeof(offsetTop) == "string") {
                    if (offsetTop.match(/%/i) == null) {
                        top = topDef;

                    } else {
                        top = offsetTop;
                    }
                }
                else {
                    top = offsetTop;
                }
            }


            $(this).css("opacity", "0").addClass("animated ").waypoint(function (dir) {
                if (dir === "down") {
                    $(this).removeClass(outEffect).addClass(inEffect).css("opacity", "1");
                } else {
                    $(this).removeClass(inEffect).addClass(outEffect).css("opacity", "1");
                }
                ;
            }, {
                offset: bottom
            }).waypoint(function (dir) {
                if (dir === "down") {
                    $(this).removeClass(inEffect).addClass(outEffect).css("opacity", "1");
                } else {
                    $(this).removeClass(outEffect).addClass(inEffect).css("opacity", "1");
                }
                ;
            }, {
                offset: top
            });
        }

    })
})(jQuery);




;(function($) {

    'use strict'

    var testMobile;
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var heroSection = function() {
        // Background slideshow
        (function() {
            if ( $( "#slideshow" ).length ) {
                $('#slideshow').superslides({
                    play: $('#slideshow').data('speed'),
                    animation: 'fade',
                    pagination: false
                });
            }
        })();
        // Text slider
        (function() {
            if ( $( ".text-slider" ).length ) {
                $('.text-slider').flexslider({
                    animation: "slide",
                    selector: ".slide-text li",
                    controlNav: false,
                    directionNav: false,
                    slideshowSpeed: $('.text-slider').data('speed'),
                    animationSpeed : 700,
                    slideshow : $('.text-slider').data('slideshow'),
                    touch: true,
                    useCSS: false,
                });
            }
        })();

        $(function() {
            $('a[href*=#]:not([href=#],.wc-tabs a,.activity-content a)').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top - 70
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    };

    var responsiveMenu = function() {
        var	menuType = 'desktop';

        $(window).on('load resize', function() {
            var currMenuType = 'desktop';

            if ( matchMedia( 'only screen and (max-width: 1024px)' ).matches ) {
                currMenuType = 'mobile';
            }

            if ( currMenuType !== menuType ) {
                menuType = currMenuType;

                if ( currMenuType === 'mobile' ) {
                    var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                    var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

                    $('#header').find('.header-wrap').after($mobileMenu);
                    hasChildMenu.children('ul').hide();
                    hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                    $('.btn-menu').removeClass('active');
                } else {
                    var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

                    $desktopMenu.find('.submenu').removeAttr('style');
                    $('#header').find('.col-md-10').append($desktopMenu);
                    $('.btn-submenu').remove();
                }
            }
        });

        $('.btn-menu').on('click', function() {
            $('#mainnav-mobi').slideToggle(300);
            $(this).toggleClass('active');
        });

        $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
            $(this).toggleClass('active').next('ul').slideToggle(300);
            e.stopImmediatePropagation()
        });
    }

    var panelsStyling = function() {
        $(".panel-row-style").each( function() {
            if ($(this).data('hascolor')) {
                $(this).find('h1,h2,h3,h4,h5,h6,a,.fa, div, span').css('color','inherit');
            }
            if ($(this).data('hasbg')) {
                $(this).append( '<div class="overlay"></div>' );
            }
        });
    };

    var scrolls = function() {
        testMobile = isMobile.any();
        if (testMobile == null) {
            $(".panel-row-style, .slide-item").parallax("50%", 0.3);
        }
    };

    var rollAnimation = function() {
        $('.orches-animation').each( function() {
            var orElement = $(this),
                orAnimationClass = orElement.data('animation'),
                orAnimationDelay = orElement.data('animation-delay'),
                orAnimationOffset = orElement.data('animation-offset');

            orElement.css({
                '-webkit-animation-delay':  orAnimationDelay,
                '-moz-animation-delay':     orAnimationDelay,
                'animation-delay':          orAnimationDelay
            });

            orElement.waypoint(function() {
                orElement.addClass('animated').addClass(orAnimationClass);
            },{ triggerOnce: true, offset: orAnimationOffset });
        });
    };

    var goTop = function() {
        $(window).scroll(function() {
            if ( $(this).scrollTop() > 800 ) {
                $('.go-top').addClass('show');
            } else {
                $('.go-top').removeClass('show');
            }
        });

        $('.go-top').on('click', function() {
            $("html, body").animate({ scrollTop: 0 }, 1000);
            return false;
        });
    };

    var testimonialCarousel = function(){
        if ( $().owlCarousel ) {
            $('.roll-testimonials').owlCarousel({
                navigation : false,
                pagination: true,
                responsive: true,
                items: 1,
                itemsDesktop: [3000,1],
                itemsDesktopSmall: [1400,1],
                itemsTablet:[970,1],
                itemsTabletSmall: [600,1],
                itemsMobile: [360,1],
                touchDrag: true,
                mouseDrag: true,
                autoHeight: true,
                autoPlay: $('.roll-testimonials').data('autoplay')
            });
        }
    };

    var progressBar = function() {
        $('.progress-bar').on('on-appear', function() {
            $(this).each(function() {
                var percent = $(this).data('percent');

                $(this).find('.progress-animate').animate({
                    "width": percent + '%'
                },3000);

                $(this).parent('.roll-progress').find('.perc').addClass('show').animate({
                    "width": percent + '%'
                },3000);
            });
        });
    };

    var headerFixed = function() {
        var headerFix = $('.site-header').offset().top;
        $(window).on('load scroll', function() {
            var y = $(this).scrollTop();
            if ( y >= headerFix) {
                $('.site-header').addClass('fixed');
            } else {
                $('.site-header').removeClass('fixed');
            }
            if ( y >= 107 ) {
                $('.site-header').addClass('float-header');
            } else {
                $('.site-header').removeClass('float-header');
            }
        });
    };

    var counter = function() {
        $('.roll-counter').on('on-appear', function() {
            $(this).find('.numb-count').each(function() {
                var to = parseInt($(this).attr('data-to')), speed = parseInt($(this).attr('data-speed'));
                $(this).countTo({
                    to: to,
                    speed: speed
                });
            });
        }); //counter
    };

    var detectViewport = function() {
        $('[data-waypoint-active="yes"]').waypoint(function() {
            $(this).trigger('on-appear');
        }, { offset: '90%', triggerOnce: true });

        $(window).on('load', function() {
            setTimeout(function() {
                $.waypoints('refresh');
            }, 100);
        });
    };

    var teamCarousel = function(){
        if ( $().owlCarousel ) {
            $(".panel-grid-cell .roll-team").owlCarousel({
                navigation : false,
                pagination: true,
                responsive: true,
                items: 3,
                itemsDesktopSmall: [1400,3],
                itemsTablet:[970,2],
                itemsTabletSmall: [600,1],
                itemsMobile: [360,1],
                touchDrag: true,
                mouseDrag: true,
                autoHeight: false,
                autoPlay: false,
            }); // end owlCarousel
        } // end if
    };

    var responsiveVideo= function(){
        $(document).ready(function(){
            $("body").fitVids();
        });
    };

    var projectEffect = function() {
        var effect = $('.project-wrap').data('portfolio-effect');

        $('.project-item').children('.item-wrap').addClass('orches-animation');

        $('.project-wrap').waypoint(function(direction) {
            $('.project-item').children('.item-wrap').each(function(idx, ele) {
                setTimeout(function() {
                    $(ele).addClass('animated ' + effect);
                }, idx * 150);
            });
        }, { offset: '75%' });
    };

    var socialMenu = function() {
        $('.widget_fp_social a').attr( 'target','_blank' );
    };

    var removePreloader = function() {
        $('.preloader').css('opacity', 0);
        setTimeout(function(){$('.preloader').hide();}, 600);
    }

    // Dom Ready
    $(function() {
        heroSection();
        
        testimonialCarousel();
        teamCarousel();
        counter();
        progressBar();
        detectViewport();
        responsiveMenu();
        responsiveVideo();
        rollAnimation();
        panelsStyling();
        scrolls();
        projectEffect();
        socialMenu();
        goTop();
        removePreloader();
    });
})(jQuery);

;(function($) {
    'use strict'
    $.fn.animated = function(inEffect, outEffect,offsetBottom,offsetTop) {
        var bottomDef = "85%";
        var topDef = "15%";

        var bottom;
        var top;

        if (typeof offsetBottom == "undefined") {
            bottom = bottomDef;

        } else {
            if (typeof(offsetBottom) == "string") {
                if (offsetBottom.match(/%/i) == null) {
                    bottom = bottomDef;

                } else {
                    bottom = offsetBottom;
                }
            }
            else {
                bottom = $(window).height() - offsetBottom;
            }
        }
        if (typeof offsetTop == "undefined") {
            top = topDef;

        } else {
            if (typeof(offsetTop) == "string") {
                if (offsetTop.match(/%/i) == null) {
                    top = topDef;

                } else {
                    top = offsetTop;
                }
            }
            else {
                top = offsetTop;
            }
        }


        $(this).css("opacity", "0").addClass("animated ").waypoint(function (dir) {
            if (dir === "down") {
                $(this).removeClass(outEffect).addClass(inEffect).css("opacity", "1");
            } else {
                $(this).removeClass(inEffect).addClass(outEffect).css("opacity", "1");
            }
            ;
        }, {
            offset: bottom
        }).waypoint(function (dir) {
            if (dir === "down") {
                $(this).removeClass(inEffect).addClass(outEffect).css("opacity", "1");
            } else {
                $(this).removeClass(outEffect).addClass(inEffect).css("opacity", "1");
            }
            ;
        }, {
            offset: top
        });
    };
})(jQuery);



