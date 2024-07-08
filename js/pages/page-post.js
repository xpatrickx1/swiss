
$( '.table-content a' ).click(function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') ||
      location.hostname == this.hostname) {
        var target = $(this.hash);
        $(this).addClass('active');
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 75
            }, 1000);
        }
    }
});

 
const sections = document.querySelectorAll('.main .content--center *[id]');
const navLi = document.querySelectorAll('.table-content__list a');

window.onscroll = () => {
    let current = '';
    
    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        if (scrollY >= sectionTop + 100) {
            current = section.getAttribute('id'); }
    });

    navLi.forEach((li) => {
        li.classList.remove('active');
    });

    current.length && document.querySelector('.table-content__list a[href*=' + current + ']').classList.add('active');

    moveMenuLine(document.querySelector('.table-content__link.active'));
};


function moveMenuLine(event) {
    const menu = document.querySelector('.table-content__list');
    if(event) {
        menu.style.setProperty(
            '--underline-height',
            `${event.offsetHeight}px`
        );
        menu.style.setProperty(
            '--underline-offset-y',
            `${event.offsetTop}px`
        );
    }
}


$('.recent-post__slider')

    .slick({
        infinite: false,
        speed: 300,
        centerMode: false,
        variableWidth: true,
        arrows: true,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev slick-arrow arrow--main" aria-label="Previous" type="button"></button>',
        nextArrow: '<button class="slick-next slick-arrow arrow--main" aria-label="Next" type="button"></button>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 9999,
                settings: 'unslick',
            },
        ]
    })

    .on('afterChange', e => {
        $(window).scroll();
    });
