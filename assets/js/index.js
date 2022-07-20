$(document).ready(function () {


    /* ****************************** */
    // langs slider
    $("#lingos").owlCarousel({
        autoplay: true,
        loop: true,
        margin: 20,
        autoHeight: true,
        rtl: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 2
            },

            600: {
                items: 2
            },

            1024: {
                items: 6
            }
        }
    });


    /* ****************************** */
    // trainers slider
    $('#trainer').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayHoverPause: true,
        rtl: true,
        loop: true,
        dots: false,
        margin: 40,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1.2
            },
            1000: {
                items: 3
            }
        }
    });


    /* ****************************** */
    // testimonials slider
    $('#testimonials').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        loop: true,
        rtl: true,
        dots: false,
        margin: 40,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1.2
            },
            1000: {
                items: 3
            }
        }
    });



    /* ****************************** */
    // partners slider
    $('#courses').owlCarousel({
        margin: 20,
        autoplay: true,
        loop: true,
        rtl: true,
        dots: false,
        margin: 40,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });


    /* ****************************** */
    // partners slider
    $('#partners').owlCarousel({
        margin: 20,
        rtl: true,
        autoplay: true,
        loop: true,
        dots: false,
        margin: 40,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: false,
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });





    // navbar burgermenu 
    $("#wrapper").click(function () {
        $(".menu").toggleClass("close");
    });


});

// preloader 
$(window).on("load", function () {
    $(".preloader").fadeOut(1750);
});