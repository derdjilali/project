/* -------------------------------------------

    Name: 		Lettery
    Version:    1.0
    Author:		Nazar Miller (millerDigitalDesign)
    Portfolio:  https://themeforest.net/user/millerdigitaldesign/portfolio?ref=MillerDigitalDesign

    p.s. I am available for Freelance hire (UI design, web development). email: miller.themes@gmail.com

------------------------------------------- */

$(function () {

    "use strict";

    /***************************

    swup

    ***************************/
    const options = {
        containers: ['#swupMain', '#swupTopbar'],
        animateHistoryBrowsing: true,
        linkSelector: 'a:not([data-no-swup])',
        animationSelector: '[class="mil-main-transition"]'
    };
    const swup = new Swup(options);

    /***************************

    color variables

    ***************************/

    var accent = 'var(--accent-color)';
    var dark = 'var(--primary-color)';
    var light = '#FAFAFA';

    /***************************

    register gsap plugins

    ***************************/
    gsap.registerPlugin(ScrollTrigger, ScrollSmoother, ScrollToPlugin);
    /***************************

    smooth scroll

    ***************************/
    ScrollSmoother.create({
        smooth: 1,
        effects: true,
        smoothTouch: 0.1,
    });
    //ScrollTrigger.normalizeScroll(true);
    /***************************

    preloader

    ***************************/

    const preloaderTimeline = gsap.timeline();

    preloaderTimeline
        .to(".mil-preloader-content", {
            ease: "sine",
            duration: 0.4,
            scale: 1,
            opacity: 1,
            delay: '0.4',
        })
        .to(".mil-ticker", {
            x: '-50%',
            ease: "linear",
            duration: 6,
            delay: '-0.4',
        })
        .to(".mil-preloader-load ", {
            width: '100%',
            ease: "sine",
            duration: 1.5,
            delay: '-5.5',
        })
        .to(".mil-preloader-content ", {
            scale: .9,
            opacity: 0,
            ease: "sine",
            duration: 0.4,
            delay: '-4',
            onComplete: function () {
                ScrollTrigger.refresh();
            },
        })
        .to(".mil-preloader-load-track ", {
            opacity: 0,
            ease: "sine",
            duration: 1.5,
            delay: '-4',
        })
        .to(".mil-preloader-1", {
            height: 0,
            ease: "sine",
            duration: 0.4,
            delay: '-3.5',
        });

    /***************************

    back to top

    ***************************/
    $(".mil-circle").on("click", function () {
        gsap.to(window, {
            scrollTo: '0',
            duration: 1,
            ease: 'sine',
        });
    });
    /***************************

    cursor

    ***************************/

    //follower

    const cursor = document.querySelector('.mil-cursor');
    const cursorWord1 = document.querySelector('.mil-cursor .mil-word-1');
    const cursorWord2 = document.querySelector('.mil-cursor .mil-word-2');
    const cursorIcon1 = document.querySelector('.mil-cursor .mil-icon-1');
    const cursorIcon2 = document.querySelector('.mil-cursor .mil-icon-2');
    const cursorIcon3 = document.querySelector('.mil-cursor .mil-icon-3');

    gsap.set(cursor, {
        xPercent: -50,
        yPercent: -50,
    });

    document.addEventListener('pointermove', movecursor);

    function movecursor(e) {
        gsap.to(cursor, {
            duration: 0.6,
            ease: 'sine',
            x: e.clientX,
            y: e.clientY,
        });
    }

    //click and drag

    $('body').mousedown(function () {
        gsap.to($(cursor), .2, {
            scale: .7,
            boxShadow: '0px 0px 0px 10px rgba(255,255,255,.4)',
            ease: 'sine',
        });
    });
    $('body').mouseup(function () {
        gsap.to($(cursor), .2, {
            scale: 1,
            boxShadow: '0px 0px 0px 5px rgba(255,255,255,0)',
            ease: 'sine',
        });
    });

    //accent color

    $('.mil-accent-trigger').mouseover(function () {
        gsap.to($(cursor), .2, {
            background: accent,
            ease: 'sine',
        });
        $(cursor).addClass('mil-dark');
    });

    $('.mil-accent-trigger').mouseleave(function () {
        gsap.to($(cursor), .2, {
            background: dark,
            ease: 'sine',
        });
        $(cursor).removeClass('mil-dark');
    });

    //light color

    $('.mil-light-trigger').mouseover(function () {
        gsap.to($(cursor), .2, {
            background: light,
            ease: 'sine',
        });
        $(cursor).addClass('mil-dark');
    });

    $('.mil-light-trigger').mouseleave(function () {
        gsap.to($(cursor), .2, {
            background: dark,
            ease: 'sine',
        });
        $(cursor).removeClass('mil-dark');
    });

    //hidden

    $('.mil-hidden-trigger').mouseover(function () {
        gsap.to($(cursor), .2, {
            width: 0,
            height: 0,
            ease: 'sine',
        });
    });

    $('.mil-hidden-trigger').mouseleave(function () {
        gsap.to($(cursor), .2, {
            width: 25,
            height: 25,
            ease: 'sine',
        });
    });

    //scale down

    $('.mil-scale-down-trigger').mouseover(function () {
        gsap.to($(cursor), .2, {
            opacity: 1,
            width: 10,
            height: 10,
            ease: 'sine',
        });
    });

    $('.mil-scale-down-trigger').mouseleave(function () {
        gsap.to($(cursor), .2, {
            opacity: .1,
            width: 25,
            height: 25,
            ease: 'sine',
        });
    });

    //scale up

    $('.mil-scale-up-trigger').mouseover(function () {
        gsap.to($(cursor), .2, {
            width: 75,
            height: 75,
            ease: 'sine',
        });
    });

    $('.mil-scale-up-trigger').mouseleave(function () {
        gsap.to($(cursor), .2, {
            width: 25,
            height: 25,
            ease: 'sine',
        });
    });

    //scale up with word and icons

    $('.mil-word-1-trigger , .mil-word-2-trigger , .mil-icon-1-trigger, .mil-icon-2-trigger, .mil-icon-3-trigger').mouseover(function () {
        gsap.to($(cursor), .2, {
            opacity: 1,
            width: 55,
            height: 55,
            ease: 'sine',
        });
    });

    $('.mil-word-1-trigger , .mil-word-2-trigger , .mil-icon-1-trigger, .mil-icon-2-trigger, .mil-icon-3-trigger').mouseleave(function () {
        gsap.to($(cursor), .2, {
            opacity: .1,
            width: 25,
            height: 25,
            ease: 'sine',
        });
    });

    //word 1

    $('.mil-word-1-trigger').mouseover(function () {
        gsap.to($(cursorWord1), .2, {
            opacity: 1,
            scale: 1,
            ease: 'sine',
        });
    });

    $('.mil-word-1-trigger').mouseleave(function () {
        gsap.to($(cursorWord1), .2, {
            opacity: 0,
            scale: .6,
            ease: 'sine',
        });
    });

    //word 2

    $('.mil-word-2-trigger').mouseover(function () {
        gsap.to($(cursorWord2), .2, {
            opacity: 1,
            scale: 1,
            ease: 'sine',
        });
    });

    $('.mil-word-2-trigger').mouseleave(function () {
        gsap.to($(cursorWord2), .2, {
            opacity: 0,
            scale: .6,
            ease: 'sine',
        });
    });

    //icon 1

    $('.mil-icon-1-trigger').mouseover(function () {
        gsap.to($(cursorIcon1), .2, {
            opacity: 1,
            scale: 1,
            ease: 'sine',
        });
    });

    $('.mil-icon-1-trigger').mouseleave(function () {
        gsap.to($(cursorIcon1), .2, {
            opacity: 0,
            scale: .6,
            ease: 'sine',
        });
    });

    //icon 2

    $('.mil-icon-2-trigger').mouseover(function () {
        gsap.to($(cursorIcon2), .2, {
            opacity: 1,
            scale: 1,
            ease: 'sine',
        });
    });

    $('.mil-icon-2-trigger').mouseleave(function () {
        gsap.to($(cursorIcon2), .2, {
            opacity: 0,
            scale: .6,
            ease: 'sine',
        });
    });

    //icon 3

    $('.mil-icon-3-trigger').mouseover(function () {
        gsap.to($(cursorIcon3), .2, {
            opacity: 1,
            scale: 1,
            ease: 'sine',
        });
    });

    $('.mil-icon-3-trigger').mouseleave(function () {
        gsap.to($(cursorIcon3), .2, {
            opacity: 0,
            scale: .6,
            ease: 'sine',
        });
    });
    /***************************

    scroll animations

    ***************************/

    //appearance

    const appearance = document.querySelectorAll(".mil-appearance");

    appearance.forEach((section) => {
        gsap.fromTo(section, {
            opacity: 0,
            y: 50,
            scale: .98,
            ease: 'sine',
        }, {
            y: 0,
            opacity: 1,
            scale: 1,
            scrollTrigger: {
                trigger: section,
                toggleActions: 'play none none reverse',
            }
        });
    });

    //scale

    const scaleImage = document.querySelectorAll(".mil-scale-img");

    scaleImage.forEach((section) => {
        var value1 = $(section).data("value-1");
        var value2 = $(section).data("value-2");
        gsap.fromTo(section, {
            ease: 'sine',
            scale: value1,

        }, {
            scale: value2,
            scrollTrigger: {
                trigger: section,
                scrub: true,
                toggleActions: 'play none none reverse',
            }
        });
    });

    //parallax

    const parallaxImage = document.querySelectorAll(".mil-parallax-img");

    parallaxImage.forEach((section) => {
        var value1 = $(section).data("value-1");
        var value2 = $(section).data("value-2");
        gsap.fromTo(section, {
            ease: 'sine',
            y: value1,

        }, {
            y: value2,
            scrollTrigger: {
                trigger: section,
                scrub: true,
                toggleActions: 'play none none reverse',
            }
        });
    });

    //rotate

    const rotate = document.querySelectorAll(".mil-rotate");

    rotate.forEach((section) => {
        var value = $(section).data("value");
        gsap.fromTo(section, {
            ease: 'sine',
            rotate: 0,

        }, {
            rotate: value,
            scrollTrigger: {
                trigger: section,
                scrub: true,
                toggleActions: 'play none none reverse',
            }
        });
    });

    //travel x

    const travelX = document.querySelectorAll(".mil-travel-x");

    travelX.forEach((section) => {
        var value = $(section).data("value");
        gsap.fromTo(section, {
            ease: 'sine',
            x: 0,

        }, {
            x: value,
            scrollTrigger: {
                trigger: section,
                scrub: true,
                toggleActions: 'play none none reverse',
            }
        });
    });

    //travel y

    const travelY = document.querySelectorAll(".mil-travel-y");

    travelY.forEach((section) => {
        var value = $(section).data("value");
        gsap.fromTo(section, {
            ease: 'sine',
            y: 0,

        }, {
            y: value,
            scrollTrigger: {
                trigger: section,
                scrub: true,
                toggleActions: 'play none none reverse',
            }
        });
    });

    //dissolve

    const dissolve = document.querySelectorAll(".mil-dissolve");

    dissolve.forEach((section) => {
        gsap.fromTo(section, {
            opacity: 1,
            ease: 'linear',

        }, {
            opacity: 0,
            scrollTrigger: {
                trigger: section,
                scrub: true,
                start: 'top-=600',
                end: 'bottom-=100',
            }
        });
    });

    /***************************

    progressbar

    ***************************/
    gsap.to('.mil-progress', {
        height: '100%',
        ease: 'sine',
        scrollTrigger: {
            scrub: 0.3
        }
    });
    /***************************

    counters

    ***************************/
    const number = $(".mil-counter");
    number.each(function (index, element) {
        var count = $(this),
            zero = {
                val: 0
            },
            num = count.data("number"),
            split = (num + "").split("."), // to cover for instances of decimals
            decimals = split.length > 1 ? split[1].length : 0;

        gsap.to(zero, {
            val: num,
            duration: 2,
            scrollTrigger: {
                trigger: element,
                toggleActions: 'play none none reverse',
            },
            onUpdate: function () {
                count.text(zero.val.toFixed(decimals));
            }
        });
    });
    /***************************
	
    navigation
	
    ***************************/
	/* ixemo */
    const showAnim = gsap.from('.mil-top-panel.mil-animated', {
        yPercent: 0,
        paused: true,
        duration: 0.4,
    }).progress(1);

    ScrollTrigger.create({
        start: "top top",
        end: 99999999,
        onUpdate: (self) => {
            self.direction === -1 ? showAnim.play() : showAnim.reverse();
        }
    });

    const showColor = document.querySelectorAll(".mil-top-panel.mil-transparent-nav");

    showColor.forEach((section) => {
        gsap.fromTo(
            section, {
                ease: 'sine',
                backgroundColor: 'rgba(var(--primary-color-R), var(--primary-color-G), var(--primary-color-B), 0)',
            }, {
                backgroundColor: dark,
                scrollTrigger: {
                    start: "top -100, top",
                    end: 99999,
                    toggleClass: 'active',
                }
            }
        );
    });

    $(document).on('click', '.mil-menu-btn', function () {
        $(this).toggleClass('mil-active');
        $('.mil-mobile-dropdown').toggleClass('mil-active');
    });

    $(document).on('click', function (e) {
        const el = '.mil-top-panel';
        if ($(e.target).closest(el).length) return;
        $('.mil-menu-btn').removeClass('mil-active');
        $('.mil-mobile-dropdown').removeClass('mil-active');
    });
    /***************************

    pseudo hover

    ***************************/
    $('.mil-pseudo-hover').addClass('mil-active');
    $('.mil-services-1').on('mouseover', function () {
        $('.mil-pseudo-hover').removeClass('mil-active');
    }).on('mouseout', function () {
        $('.mil-pseudo-hover').addClass('mil-active');
    });
    /***************************

    fields

    ***************************/
    $('input').on('blur', function () {
        var $this = $(this);
        if ($this.val() !== "") {
            $this.addClass('mil-keep');
        } else {
            $this.removeClass('mil-keep');
        }
    });
    /***************************

    slider

    ***************************/
    var swiper = new Swiper('.mil-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 450,
        touchStartPreventDefault: false,
        longSwipes: true,
        breakpoints: {
            992: {
                slidesPerView: 3,
            },
        },
    });
    /***************************

    infinite slider

    ***************************/
    var swiper = new Swiper('.mil-infinite-show', {
        slidesPerView: 2,
        spaceBetween: 0,
        speed: 3000,
        autoplay: true,
        autoplay: {
            delay: 0,
        },
        loop: true,
        freeMode: true,
        breakpoints: {
            992: {
                slidesPerView: 4,
            },
        },
    });
    /***************************

    reviews slider

    ***************************/
    var swiper = new Swiper('.mil-reviews-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 450,
        touchStartPreventDefault: false,
        longSwipes: true,
        pagination: {
            el: ".mil-slider-pagination",
            clickable: true,
        },
        breakpoints: {
            992: {
                slidesPerView: 2,
            },
        },
    });
    /***************************

    instagram slider

    ***************************/
    var swiper = new Swiper('.mil-instagram-slider', {
        slidesPerView: 2,
        spaceBetween: 0,
        speed: 3000,
        autoplay: true,
        autoplay: {
            delay: 0,
        },
        loop: true,
        freeMode: true,
        breakpoints: {
            992: {
                slidesPerView: 6,
            },
            768: {
                slidesPerView: 3,
            },
        },
    });
    /***************************

    about slider

    ***************************/
    var swiper = new Swiper('.mil-about-slider', {
        slidesPerView: 2,
        spaceBetween: 30,
        speed: 450,
        initialSlide: 1,
        touchStartPreventDefault: false,
        longSwipes: true,
        navigation: {
            prevEl: '.mil-about-prev',
            nextEl: '.mil-about-next',
        },
        breakpoints: {
            992: {
                spaceBetween: 30,
                parallax: false,
            },
        },
    });
    /***************************

    portfolio slider

    ***************************/
    var swiper = new Swiper('.mil-portfolio-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 450,
        slidesPerView: "auto",
        touchStartPreventDefault: false,
        longSwipes: true,
        navigation: {
            prevEl: '.mil-about-prev',
            nextEl: '.mil-about-next',
        },
        breakpoints: {
            992: {
                slidesPerView: 2,
            },
        },
    });
    /***************************

    gallery slider

    ***************************/
    var swiper = new Swiper('.mil-gallery-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 450,
        slidesPerView: "auto",
        touchStartPreventDefault: false,
        longSwipes: true,
        breakpoints: {
            992: {
                slidesPerView: 2,
            },
        },
    });
    /***************************

    fancybox

    ***************************/
    $('[data-fancybox]').fancybox({
        buttons: ["slideShow",
            "close"
        ],
        parentEl: "body",
        protect: true,
        loop: false,
        animationEffect: "slide-in-out",
        animationDuration: 600,
        transitionEffect: "fade-in-out",
        transitionDuration: 600,
    });

    $('[data-fancybox="video"]').fancybox({
        buttons: ["slideShow",
            "close"
        ],
        loop: false,
        animationEffect: "slide-in-out",
        animationDuration: 600,
        transitionEffect: "fade-in-out",
        transitionDuration: 600,
    });

    $.fancybox.defaults.hash = false;

    /***************************

    accordion

    ***************************/

    let groups = gsap.utils.toArray(".mil-accordion-group");
    let menus = gsap.utils.toArray(".mil-accordion-menu");
    let menuToggles = groups.map(createAnimation);

    menus.forEach((menu) => {
        menu.addEventListener("click", () => toggleMenu(menu));
    });

    function toggleMenu(clickedMenu) {
        menuToggles.forEach((toggleFn) => toggleFn(clickedMenu));
    }

    function createAnimation(element) {
        let menu = element.querySelector(".mil-accordion-menu");
        let box = element.querySelector(".mil-accordion-content");
        let minusElement = element.querySelector(".mil-accordion-minus");
        let plusElement = element.querySelector(".mil-accordion-plus");

        gsap.set(box, {
            height: "auto"

        });

        let animation = gsap
            .timeline()
            .from(box, {
                onComplete: function () {
                    ScrollTrigger.refresh();
                },
                height: 0,
                duration: 0.4,
                ease: "none"
            })
            .from(minusElement, {
                duration: 0.2,
                autoAlpha: 0,
                ease: "none"
            }, 0)
            .to(plusElement, {
                duration: 0.2,
                autoAlpha: 0,
                ease: "none"
            }, 0)
            .reverse();

        return function (clickedMenu) {
            if (clickedMenu === menu) {
                animation.reversed(!animation.reversed());
            } else {
                animation.reverse();
            }
        };
    }

    /*----------------------------------------------------------
    ------------------------------------------------------------

    REINIT

    ------------------------------------------------------------
    ----------------------------------------------------------*/
    document.addEventListener("swup:contentReplaced", function () {

        /***************************

        mobile menu

        ***************************/
        $('.mil-menu-btn').removeClass('mil-active');
        $('.mil-mobile-dropdown').removeClass('mil-active');
        /***************************

        register gsap plugins

        ***************************/
        gsap.registerPlugin(ScrollTrigger, ScrollSmoother, ScrollToPlugin);
        /***************************

        smooth scroll

        ***************************/
        ScrollSmoother.create({
            smooth: 1,
            effects: true,
            smoothTouch: 0.1,
        });
        //ScrollTrigger.normalizeScroll(true);
        /***************************

        cursor

        ***************************/

        //accent color

        $('.mil-accent-trigger').mouseover(function () {
            gsap.to($(cursor), .2, {
                background: accent,
                ease: 'sine',
            });
            $(cursor).addClass('mil-dark');
        });

        $('.mil-accent-trigger').mouseleave(function () {
            gsap.to($(cursor), .2, {
                background: dark,
                ease: 'sine',
            });
            $(cursor).removeClass('mil-dark');
        });

        //light color

        $('.mil-light-trigger').mouseover(function () {
            gsap.to($(cursor), .2, {
                background: light,
                ease: 'sine',
            });
            $(cursor).addClass('mil-dark');
        });

        $('.mil-light-trigger').mouseleave(function () {
            gsap.to($(cursor), .2, {
                background: dark,
                ease: 'sine',
            });
            $(cursor).removeClass('mil-dark');
        });

        //hidden

        $('.mil-hidden-trigger').mouseover(function () {
            gsap.to($(cursor), .2, {
                width: 0,
                height: 0,
                ease: 'sine',
            });
        });

        $('.mil-hidden-trigger').mouseleave(function () {
            gsap.to($(cursor), .2, {
                width: 25,
                height: 25,
                ease: 'sine',
            });
        });

        //scale down

        $('.mil-scale-down-trigger').mouseover(function () {
            gsap.to($(cursor), .2, {
                opacity: 1,
                width: 10,
                height: 10,
                ease: 'sine',
            });
        });

        $('.mil-scale-down-trigger').mouseleave(function () {
            gsap.to($(cursor), .2, {
                opacity: .1,
                width: 25,
                height: 25,
                ease: 'sine',
            });
        });

        //scale up

        $('.mil-scale-up-trigger').mouseover(function () {
            gsap.to($(cursor), .2, {
                width: 75,
                height: 75,
                ease: 'sine',
            });
        });

        $('.mil-scale-up-trigger').mouseleave(function () {
            gsap.to($(cursor), .2, {
                width: 25,
                height: 25,
                ease: 'sine',
            });
        });

        //scale up with word and icons

        $('.mil-word-1-trigger , .mil-word-2-trigger , .mil-icon-1-trigger, .mil-icon-2-trigger, .mil-icon-3-trigger').mouseover(function () {
            gsap.to($(cursor), .2, {
                opacity: 1,
                width: 75,
                height: 75,
                ease: 'sine',
            });
        });

        $('.mil-word-1-trigger , .mil-word-2-trigger , .mil-icon-1-trigger, .mil-icon-2-trigger, .mil-icon-3-trigger').mouseleave(function () {
            gsap.to($(cursor), .2, {
                opacity: .1,
                width: 25,
                height: 25,
                ease: 'sine',
            });
        });

        //word 1

        $('.mil-word-1-trigger').mouseover(function () {
            gsap.to($(cursorWord1), .2, {
                opacity: 1,
                scale: 1,
                ease: 'sine',
            });
        });

        $('.mil-word-1-trigger').mouseleave(function () {
            gsap.to($(cursorWord1), .2, {
                opacity: 0,
                scale: .6,
                ease: 'sine',
            });
        });

        //word 2

        $('.mil-word-2-trigger').mouseover(function () {
            gsap.to($(cursorWord2), .2, {
                opacity: 1,
                scale: 1,
                ease: 'sine',
            });
        });

        $('.mil-word-2-trigger').mouseleave(function () {
            gsap.to($(cursorWord2), .2, {
                opacity: 0,
                scale: .6,
                ease: 'sine',
            });
        });

        //icon 1

        $('.mil-icon-1-trigger').mouseover(function () {
            gsap.to($(cursorIcon1), .2, {
                opacity: 1,
                scale: 1,
                ease: 'sine',
            });
        });

        $('.mil-icon-1-trigger').mouseleave(function () {
            gsap.to($(cursorIcon1), .2, {
                opacity: 0,
                scale: .6,
                ease: 'sine',
            });
        });

        //icon 2

        $('.mil-icon-2-trigger').mouseover(function () {
            gsap.to($(cursorIcon2), .2, {
                opacity: 1,
                scale: 1,
                ease: 'sine',
            });
        });

        $('.mil-icon-2-trigger').mouseleave(function () {
            gsap.to($(cursorIcon2), .2, {
                opacity: 0,
                scale: .6,
                ease: 'sine',
            });
        });

        //icon 3

        $('.mil-icon-3-trigger').mouseover(function () {
            gsap.to($(cursorIcon3), .2, {
                opacity: 1,
                scale: 1,
                ease: 'sine',
            });
        });

        $('.mil-icon-3-trigger').mouseleave(function () {
            gsap.to($(cursorIcon3), .2, {
                opacity: 0,
                scale: .6,
                ease: 'sine',
            });
        });
        /***************************

        scroll animations

        ***************************/

        //appearance

        const appearance = document.querySelectorAll(".mil-appearance");

        appearance.forEach((section) => {
            gsap.fromTo(section, {
                opacity: 0,
                y: 60,
                scale: .98,
                ease: 'sine',
            }, {
                y: 0,
                opacity: 1,
                scale: 1,
                y: 0,
                scrollTrigger: {
                    trigger: section,
                    toggleActions: 'play none none reverse',
                }
            });
        });

        //scale

        const scaleImage = document.querySelectorAll(".mil-scale-img");

        scaleImage.forEach((section) => {
            var value1 = $(section).data("value-1");
            var value2 = $(section).data("value-2");
            gsap.fromTo(section, {
                ease: 'sine',
                scale: value1,

            }, {
                scale: value2,
                scrollTrigger: {
                    trigger: section,
                    scrub: true,
                    toggleActions: 'play none none reverse',
                }
            });
        });

        //parallax

        const parallaxImage = document.querySelectorAll(".mil-parallax-img");

        parallaxImage.forEach((section) => {
            var value1 = $(section).data("value-1");
            var value2 = $(section).data("value-2");
            gsap.fromTo(section, {
                ease: 'sine',
                y: value1,

            }, {
                y: value2,
                scrollTrigger: {
                    trigger: section,
                    scrub: true,
                    toggleActions: 'play none none reverse',
                }
            });
        });

        //rotate

        const rotate = document.querySelectorAll(".mil-rotate");

        rotate.forEach((section) => {
            var value = $(section).data("value");
            gsap.fromTo(section, {
                ease: 'sine',
                rotate: 0,

            }, {
                rotate: value,
                scrollTrigger: {
                    trigger: section,
                    scrub: true,
                    toggleActions: 'play none none reverse',
                }
            });
        });

        //travel x

        const travelX = document.querySelectorAll(".mil-travel-x");

        travelX.forEach((section) => {
            var value = $(section).data("value");
            gsap.fromTo(section, {
                ease: 'sine',
                x: 0,

            }, {
                x: value,
                scrollTrigger: {
                    trigger: section,
                    scrub: true,
                    toggleActions: 'play none none reverse',
                }
            });
        });

        //travel y

        const travelY = document.querySelectorAll(".mil-travel-y");

        travelY.forEach((section) => {
            var value = $(section).data("value");
            gsap.fromTo(section, {
                ease: 'sine',
                y: 0,

            }, {
                y: value,
                scrollTrigger: {
                    trigger: section,
                    scrub: true,
                    toggleActions: 'play none none reverse',
                }
            });
        });

        //dissolve

        const dissolve = document.querySelectorAll(".mil-dissolve");

        dissolve.forEach((section) => {
            gsap.fromTo(section, {
                opacity: 1,
                ease: 'linear',

            }, {
                opacity: 0,
                scrollTrigger: {
                    trigger: section,
                    scrub: true,
                    start: 'top-=600',
                    end: 'bottom-=100',
                }
            });
        });

        /***************************

        progressbar

        ***************************/
        gsap.to('.mil-progress', {
            height: '100%',
            ease: 'sine',
            scrollTrigger: {
                scrub: 0.3
            }
        });
        /***************************

        counters

        ***************************/
        const number = $(".mil-counter");
        number.each(function (index, element) {
            var count = $(this),
                zero = {
                    val: 0
                },
                num = count.data("number"),
                split = (num + "").split("."), // to cover for instances of decimals
                decimals = split.length > 1 ? split[1].length : 0;

            gsap.to(zero, {
                val: num,
                duration: 2,
                scrollTrigger: {
                    trigger: element,
                    toggleActions: 'play none none reverse',
                },
                onUpdate: function () {
                    count.text(zero.val.toFixed(decimals));
                }
            });
        });
        /***************************

        navigation

        ***************************/
        const showAnim = gsap.from('.mil-top-panel.mil-animated', {
            yPercent: -100,
            paused: true,
            duration: 0.4,
        }).progress(1);

        ScrollTrigger.create({
            start: "top top",
            end: 99999999,
            onUpdate: (self) => {
                self.direction === -1 ? showAnim.play() : showAnim.reverse();
            }
        });

        const showColor = document.querySelectorAll(".mil-top-panel.mil-transparent-nav");

        showColor.forEach((section) => {
            gsap.fromTo(
                section, {
                    ease: 'sine',
                    backgroundColor: 'var(--primary-color)',
                }, {
                    backgroundColor: dark,
                    scrollTrigger: {
                        start: "top -100, top",
                        end: 99999,
                        toggleClass: 'active',
                    }
                }
            );
        });

        $(document).on('click', function (e) {
            const el = '.mil-top-panel';
            if ($(e.target).closest(el).length) return;
            $('.mil-menu-btn').removeClass('mil-active');
            $('.mil-mobile-dropdown').removeClass('mil-active');
        });
        /***************************

        pseudo hover

        ***************************/

        $('.mil-pseudo-hover').addClass('mil-active');
        $('.mil-pseudo-hover-el').on('mouseover', function () {
            $('.mil-pseudo-hover').removeClass('mil-active');
        }).on('mouseout', function () {
            $('.mil-pseudo-hover').addClass('mil-active');
        });
        /***************************

        fields

        ***************************/
        $('input').on('blur', function () {
            var $this = $(this);
            if ($this.val() !== "") {
                $this.addClass('mil-keep');
            } else {
                $this.removeClass('mil-keep');
            }
        });
        /***************************

        slider

        ***************************/
        var swiper = new Swiper('.mil-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            speed: 450,
            touchStartPreventDefault: false,
            longSwipes: true,
            breakpoints: {
                992: {
                    spaceBetween: 30,
                    parallax: false,
                },
            },
        });
        /***************************

        reviews slider

        ***************************/
        var swiper = new Swiper('.mil-reviews-slider', {
            slidesPerView: 2,
            spaceBetween: 30,
            speed: 450,
            touchStartPreventDefault: false,
            longSwipes: true,
            breakpoints: {
                992: {
                    spaceBetween: 30,
                    parallax: false,
                },
            },
        });
        /***************************

        infinite slider

        ***************************/
        var swiper = new Swiper('.mil-infinite-show', {
            slidesPerView: 2,
            spaceBetween: 0,
            speed: 3000,
            autoplay: true,
            autoplay: {
                delay: 0,
            },
            loop: true,
            freeMode: true,
            breakpoints: {
                992: {
                    slidesPerView: 4,
                },
            },
        });
        /***************************

        reviews slider

        ***************************/
        var swiper = new Swiper('.mil-reviews-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            speed: 450,
            touchStartPreventDefault: false,
            longSwipes: true,
            pagination: {
                el: ".mil-slider-pagination",
                clickable: true,
            },
            breakpoints: {
                992: {
                    slidesPerView: 2,
                },
            },
        });
        /***************************

        instagram slider

        ***************************/
        var swiper = new Swiper('.mil-instagram-slider', {
            slidesPerView: 6,
            spaceBetween: 0,
            speed: 3000,
            autoplay: true,
            autoplay: {
                delay: 0,
            },
            loop: true,
            freeMode: true,
        });
        /***************************

        about slider

        ***************************/
        var swiper = new Swiper('.mil-about-slider', {
            slidesPerView: 2,
            spaceBetween: 30,
            speed: 450,
            initialSlide: 1,
            touchStartPreventDefault: false,
            longSwipes: true,
            navigation: {
                prevEl: '.mil-about-prev',
                nextEl: '.mil-about-next',
            },
            breakpoints: {
                992: {
                    spaceBetween: 30,
                    parallax: false,
                },
            },
        });
        /***************************

        portfolio slider

        ***************************/
        var swiper = new Swiper('.mil-portfolio-slider', {
            slidesPerView: 2,
            spaceBetween: 30,
            speed: 450,
            slidesPerView: "auto",
            touchStartPreventDefault: false,
            longSwipes: true,
            navigation: {
                prevEl: '.mil-about-prev',
                nextEl: '.mil-about-next',
            },
            breakpoints: {
                992: {
                    spaceBetween: 30,
                    parallax: false,
                },
            },
        });
        /***************************

        gallery slider

        ***************************/
        var swiper = new Swiper('.mil-gallery-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            speed: 450,
            slidesPerView: "auto",
            touchStartPreventDefault: false,
            longSwipes: true,
            breakpoints: {
                992: {
                    slidesPerView: 2,
                },
            },
        });
        /***************************

        fancybox

        ***************************/
        $('[data-fancybox]').fancybox({
            buttons: ["slideShow",
            "close"
        ],
            loop: false,
            animationEffect: "slide-in-out",
            animationDuration: 600,
            transitionEffect: "fade-in-out",
            transitionDuration: 600,
        });

        $.fancybox.defaults.hash = false;

        /***************************

    accordion

    ***************************/

        let groups = gsap.utils.toArray(".mil-accordion-group");
        let menus = gsap.utils.toArray(".mil-accordion-menu");
        let menuToggles = groups.map(createAnimation);

        menus.forEach((menu) => {
            menu.addEventListener("click", () => toggleMenu(menu));
        });

        function toggleMenu(clickedMenu) {
            menuToggles.forEach((toggleFn) => toggleFn(clickedMenu));
        }

        function createAnimation(element) {
            let menu = element.querySelector(".mil-accordion-menu");
            let box = element.querySelector(".mil-accordion-content");
            let minusElement = element.querySelector(".mil-accordion-minus");
            let plusElement = element.querySelector(".mil-accordion-plus");

            gsap.set(box, {
                height: "auto"

            });

            let animation = gsap
                .timeline()
                .from(box, {
                    onComplete: function () {
                        ScrollTrigger.refresh();
                    },
                    height: 0,
                    duration: 0.4,
                    ease: "none"
                })
                .from(minusElement, {
                    duration: 0.2,
                    autoAlpha: 0,
                    ease: "none"
                }, 0)
                .to(plusElement, {
                    duration: 0.2,
                    autoAlpha: 0,
                    ease: "none"
                }, 0)
                .reverse();

            return function (clickedMenu) {
                if (clickedMenu === menu) {
                    animation.reversed(!animation.reversed());
                } else {
                    animation.reverse();
                }
            };
        }

    });

});
