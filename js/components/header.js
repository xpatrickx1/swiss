const bodyEl = document.querySelector('body');
const toggle = document.querySelector('.js-hamburger');
const content = document.querySelector('.header__navigation');

const show = () => {
    bodyEl.classList.add('is-open');
    bodyEl.classList.add('no-scroll');
};

const hide = () => {
    bodyEl.classList.remove('is-open');
    bodyEl.classList.remove('no-scroll');
};

toggle.addEventListener('click', event => {
    bodyEl.classList.contains('is-open') ? hide() : show();
});

const handleClosure = event => {
    if (!content.contains(event.target) && !toggle.contains(event.target)) {
        hide();
    }
};

window.addEventListener('click', handleClosure);
window.addEventListener('focusin', handleClosure);


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