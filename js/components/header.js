// $('.js-hamburger').click(() => {
//     $('body').toggleClass('is-open');
//     $('body').toggleClass('no-scroll');
// });


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


$(window).bind('load', function() {
    $('.button__discover').click(function() {
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
    });

   
});

// document.addEventListener('click' , e => {
//     // console.log(document.querySelector( 'body' ).classList.contains( 'is-open' ));
//     // console.log(!document.querySelector('.header__navigation').contains(e.target));
//     console.log(1);
//     if( document.querySelector( 'body' ).classList.contains( 'is-open' ) && !document.querySelector('.header__navigation').contains(e.target) && e.target !== document.querySelector('.js-hamburger') ) {
//         document.querySelector('.js-hamburger').click();
//         console.log(2);
//         return;
//     }
// });

// $(document).on('click' , e => {
//     if( $( 'body' ).hasClass( 'is-open' ) && e.target !== $('.header__navigation')[0] && e.target !== $('.js-hamburger') ) {
//         // $('body').removeClass('is-open');
//         $('body').toggleClass('no-scroll');
//         console.log(1);
//     }
// });


const bodyEl = document.querySelector('body');
const toggle = document.querySelector('.js-hamburger');
const content = document.querySelector('.header__navigation');

const show = () => {
    bodyEl.classList.add('is-open');
};

const hide = () => {
    bodyEl.classList.remove('is-open');
};

toggle.addEventListener('click', event => {
    console.log(1);
    bodyEl.classList.contains('is-open') ? hide() : show();
});

const handleClosure = event => !content.contains(event.target) && hide();

window.addEventListener('click', handleClosure);
window.addEventListener('focusin', handleClosure);


jQuery('.header__navigation li').hover(function() {
    jQuery(this).find('ul').stop(true, true).slideDown({
        start: function () {
            $(this).css({
                display: 'flex'
            });
        }
    });
}, function() {
    jQuery(this).find('ul').stop(true, true).slideUp();
});


if ($('.header__navigation li:has(ul)')) {
    $('.header__navigation li:has(ul)').addClass('has-children');
}