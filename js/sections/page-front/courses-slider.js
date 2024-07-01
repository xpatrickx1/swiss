
$('.courses__slider')

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
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                }
            },
        ]
    })

    .on('afterChange', e => {
        $(window).scroll();
    });
