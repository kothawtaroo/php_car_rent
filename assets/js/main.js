(function (a) {
    jQuery(document).ready(function (b) {
        b(".dlauto-slide").owlCarousel({
            animateOut: "fadeOutLeft",
            animateIn: "fadeIn",
            items: 2,
            nav: true,
            dots: false,
            autoplayTimeout: 9000,
            autoplaySpeed: 5000,
            autoplay: true,
            loop: true,
            navText: ["<img src='assets/img/prev-1.png'>", "<img src='assets/img/next-1.png'>"],
            mouseDrag: true,
            touchDrag: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                750: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
        b(".dlauto-slide").on("translate.owl.carousel", function () {
            b(".dlauto-main-slide h2").removeClass("animated fadeInUp").css("opacity", "0");
            b(".dlauto-main-slide p").removeClass("animated fadeInDown").css("opacity", "0");
            b(".dlauto-main-slide .dlauto-btn").removeClass("animated fadeInDown").css("opacity", "0")
        });
        b(".dlauto-slide").on("translated.owl.carousel", function () {
            b(".dlauto-main-slide h2").addClass("animated fadeInUp").css("opacity", "1");
            b(".dlauto-main-slide p").addClass("animated fadeInDown").css("opacity", "1");
            b(".dlauto-main-slide .dlauto-btn").addClass("animated fadeInDown").css("opacity", "1")
        });
        b("select").niceSelect();
        b(".clockpicker").clockpicker();
        b(".service-slider").owlCarousel({
            autoplay: true,
            loop: true,
            margin: 25,
            touchDrag: true,
            mouseDrag: true,
            items: 1,
            nav: false,
            dots: true,
            autoplayTimeout: 6000,
            autoplaySpeed: 1200,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
        b(".testimonial-slider").owlCarousel({
            autoplay: true,
            loop: true,
            margin: 25,
            touchDrag: true,
            mouseDrag: true,
            items: 1,
            nav: false,
            dots: true,
            autoplayTimeout: 6000,
            autoplaySpeed: 1200,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
        b("ul#dlauto_navigation").slicknav({
            prependTo: ".dlauto-responsive-menu"
        });
        if (b("body").length) {
            var c = b("<div/>", {
                "class": "btntoTop"
            });
            c.appendTo("body");
            b(document).on("click", ".btntoTop", function () {
                b("html, body").animate({
                    scrollTop: 0
                }, 700)
            });
            b(window).on("scroll", function () {
                if (b(this).scrollTop() > 200) {
                    b(".btntoTop").addClass("active")
                } else {
                    b(".btntoTop").removeClass("active")
                }
            })
        }
    })
}(jQuery));

