function groupItems (parentContainer, itemsInGrop) {
    let newHtml = '';
    [...document.querySelectorAll(`${parentContainer} .item`)]
        .reduce((accumulator, currentValue, currentIndex, array) => {
            if (currentIndex % itemsInGrop === 0) {
                accumulator.push(array.slice(currentIndex, currentIndex + itemsInGrop));
            }
            return accumulator;
        }, [])
        .forEach(p => {
            let newGroup = '';

            p.forEach( item => {
                if (item.outerHTML !== 'undefined') {
                    newGroup += item.outerHTML;
                }
            });
        
            newHtml += '<div class=\'items__group\'>' + newGroup + '</div>';
        });

    document.querySelector('.program__list').innerHTML = newHtml;
}


const changeColumsCount = () => {
    const windowWidth = $( window ).width();

    if( windowWidth < 768 ) {
        groupItems('.program__list', 4);
    } else {
        groupItems('.program__list', 7);
    }
};

$( window ).resize( () => { changeColumsCount(); });
changeColumsCount();


$('.program__slider')

    .slick({
        infinite: true,
        speed: 300,
        centerMode: false,
        // variableWidth: true,
        arrows: false,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev slick-arrow arrow--main" aria-label="Previous" type="button"></button>',
        nextArrow: '<button class="slick-next slick-arrow arrow--main" aria-label="Next" type="button"></button>',
        dots: true,
        responsive: [
            {
                breakpoint: 767,
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