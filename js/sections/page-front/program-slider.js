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
                if (item.parentNode.classList.contains('slick-cloned')) {
                    return;
                }
                if (item.outerHTML !== 'undefined') {
                    newGroup += item.outerHTML;
                }
            });
        
            newHtml += '<div class="items__group">' + newGroup + '</div>';
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


function programSlider() {
    
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
        })

        .on('afterChange', e => {
            $(window).scroll();
        });
};


function mediaSize() {
    if (window.matchMedia('(max-width: 767px)').matches) {
        groupItems('.program__list', 4);
        setTimeout(()=> {
            programSlider();
        }, 100);
    } 
        
    if (window.matchMedia('(min-width: 768px)').matches) {
        if ($('.program__slider').hasClass('slick-initialized')) {
            $('.program__slider').removeClass('slick-initialized');
            $('.program__slider').removeClass('slick-slider');
        }
        setTimeout(()=> {
            groupItems('.program__list', 7);
        }, 100);
    }
};
    
mediaSize();

$( window ).on('resize', mediaSize);