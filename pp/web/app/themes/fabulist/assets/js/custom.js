jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');
    var banner_slider = $('.banner-slider');
    var related_gallery_slider = $('.related-gallery-slider');
    var masonry_gallery = $('.grid');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
                MENU, STICKY MENU AND SEARCH
------------------------------------------------*/

    $('#top-menu .dropdown-icon').click(function(){
        $('#top-menu .wrapper').slideToggle();
        $('#top-menu').toggleClass('top-menu-active');
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
       $('.main-navigation').toggleClass('menu-open');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 290) {
            $('.site-header.sticky-header').fadeIn();
            if ($('.site-header').hasClass('sticky-header')) {
                $('.site-header.sticky-header').addClass('nav-shrink');
                $('.site-header.sticky-header').fadeIn();
            }
        } 
        else {
            $('.site-header.sticky-header').removeClass('nav-shrink');
        }
    });

    $('.social-menu ul li a.search').click(function(e) {
        e.preventDefault();
        $('#search').toggleClass('search-open');
        $('#search .search-field').focus();
    });


/*------------------------------------------------
                SLICK SLIDERS
------------------------------------------------*/

banner_slider.slick({
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

var status = $('.pagingInfo');

/*------------------------------------------------
                MASONRY
------------------------------------------------*/

masonry_gallery.imagesLoaded( function() {
    masonry_gallery.packery({
        itemSelector: '.grid-item'
    });
});
                
$('#filter-posts ul li a').on('click', function(event) {
    event.preventDefault();

    var selector = $(this).attr('data-filter');
    masonry_gallery.isotope({ filter: selector });
    $('#filter-posts ul li').removeClass('active');
    $(this).parent().addClass('active');
    return false;
});

packery = function () {
    masonry_gallery.isotope({
        resizable: true,
        itemSelector: '.grid-item',
        layoutMode : 'packery',
        gutter: 0,
    });
};
packery();

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});