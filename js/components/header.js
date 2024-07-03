const bodyEl = document.querySelector('body');
const toggle = document.querySelector('.js-hamburger');
const content = document.querySelector('.header__navigation');

const showNav = () => {
    bodyEl.classList.add('is-open');
    bodyEl.classList.add('no-scroll');
};

const hideNav = () => {
    bodyEl.classList.remove('is-open');
    bodyEl.classList.remove('no-scroll');
};

toggle.addEventListener('click', event => {
    bodyEl.classList.contains('is-open') ? hideNav() : showNav();
});

const handleClosure = event => {
    if (!content.contains(event.target) && !toggle.contains(event.target)) {
        hideNav();
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