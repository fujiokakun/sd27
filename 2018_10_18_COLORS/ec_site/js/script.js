// Pre-loader

$(window).on('load', function() { // make sure that whole site is loaded
    $('#status').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
});



// Carousel
$(document).ready(function() {
    $("#reviews_box_carousel").owlCarousel({
        center: true,
        items: 2,
        // autoplay: true,
        // smartSpeed: 700,
        loop: true,
        margin: 100,
        nav: true,
        dots: false,
        navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>']
    });

});


$(document).ready(function() {
    $("#team_carousel").owlCarousel({
        center: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            860:{
                items:3
            },
            1000:{
                items:3
            }
        },
        autoplay: true,
        smartSpeed: 700,
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        navText: ['<i class="fas fa-caret-left team_left_arrow"></i>', '<i class="fas fa-caret-right team_right_arrow"></i>']
    });

});









// Add eventListener to the Categories menu:
document.getElementById('pickup').addEventListener('click', function(e) {
    e.preventDefault();

    $grid.isotope({
        filter: '.pickup'
    });

});

document.getElementById('men').addEventListener('click', function(e) {
    e.preventDefault();

    $grid.isotope({
        filter: '.men'
    });

});


document.getElementById('women').addEventListener('click', function(e) {
    e.preventDefault();

    $grid.isotope({
        filter: '.women'
    });

});


document.getElementById('all').addEventListener('click', function(e) {
    e.preventDefault();

    $grid.isotope({
        filter: '.all'
    });

});











// Isotope
var $grid = $('.grid').isotope({
    // options
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
});

$grid.isotope({
    filter: '.pickup'
});

