
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
                breakpoint: 1271,
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
