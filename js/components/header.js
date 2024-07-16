$('.js-hamburger').click(() => {
    $('body').toggleClass('is-open');
    $('body').toggleClass('no-scroll');
});


$( window ).scroll( scroll, scroll() );

function scroll () {
    if ( $(window).scrollTop() >= 60 ){
        $('.header').addClass('header-fixed');
    } else {
        $('.header').removeClass('header-fixed');
    }
}


$(function () {
    $('.header__navigation li a').each(function () {
        var location = window.location.href;
        var link = this.href;
        if(location == link) {
            $(this).addClass('active');
        }
    });
});


let anchors = [];
const documentURL = document.location.href;
const pathNameURL = document.location.pathname;

let urlsForCheck = documentURL == 'http://localhost:8080/swiss/'
    || documentURL == 'http://localhost/swiss/'
    || documentURL == 'https://etudes-modernes.ch/'
    ;


const checkUrls = () => {

    anchors.map( e => {

        if( !urlsForCheck ) {
            if (!($('.header__navigation li:has(ul)'))) {
                $( '.header__navigation li a[href="' + e + '"]' ).attr( 'href', '/' + e );
                $( '.footer__menu--terms li a[href="' + e + '"]' ).attr( 'href', '/' + e );
            }
        }
    } );

};


$('.header__navigation li a').each( function () {

    if  (($( this ).attr( 'href' ) ).match(/^#/i)) {
        anchors.push( $( this ).attr( 'href' ) );
    }

}).promise().done( checkUrls() );

$(window).bind('load', function() {
    $('.header__navigation li a, .footer__menu li a').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') ||
            location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 75
                }, 1000);
            }
        }

        if( $( 'body' ).hasClass( 'is-open no-scroll' ) ) {
            $('.js-hamburger').click();
        }
    });
});


function btnScroll (btn, block) {
    $(window).bind('load', function() {
        $(btn).click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') ||
                location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $(block);
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 75
                    }, 1000);
                }
            }
        });
    });
}

btnScroll('.button__discover', '.info');
btnScroll('.button--arrow-up', '.top-screen');
btnScroll('.header__buttons .button--main', '.form');

$('.navigation li:has(ul)').hover(function(e) {
    $(this).find('ul').stop(true, true).slideDown({
        start: function () {
            $(this).css({
                display: 'flex'
            });
        }
    });
}, function() {
    $(this).find('ul').stop(true, true).slideUp();
});

if ($('.navigation li:has(ul)')) {
    $('.navigation li:has(ul)').addClass('has-children');
}

$('.languages__btn').click(function(e) {
    $('#languages-widget').slideToggle({
        start: function () {
            $(this).css({
                display: 'flex'
            });
        }
    });
});

