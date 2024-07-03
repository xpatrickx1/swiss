
$( '.table-content a' ).click(function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') ||
      location.hostname == this.hostname) {
        var target = $(this.hash);
        $(this).addClass('active');
        console.log( $(this.hash));
        console.log($(this)[0]);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 75
            }, 1000);
        }
    }
});

const sections = document.querySelectorAll('.content--center *[id]');

window.addEventListener('scroll', navHighlighter);

function navHighlighter() {
    let scrollY = window.scrollY ;
    // console.log(sections.length);
    
    sections.forEach((current, i) => {
        // console.log(sections[i]);
        // console.log(i);
        
        const sectionTop = current.offsetTop;
        const sectionId = current.getAttribute('id');
        if ( i + 1 <= sections.length) {
            const nextElId = sections[i + 1];
            console.log(nextElId);
            const nextElIdTop = nextElId.offsetTop;
            const sectionHeight = nextElIdTop - sectionTop;
            // let distance = getDistanceBetweenElements(
            //     document.getElementById(sectionId),
            //     document.getElementById(nextElId)
            // );
                
            // if (!!document.querySelector('.tble-content__list a[href*=' + sectionId + ']')) {
                
           
            if (
                scrollY > sectionTop &&
                scrollY <= sectionTop + sectionHeight + 500
            ){
                // console.log('sectionTop', current);
                // console.log('scrollY', scrollY);
                // console.log('sectionTop', sectionTop);
                // console.log('nextElIdTop', nextElIdTop);
                // console.log('sectionHeight', sectionHeight);
                document.querySelector('.table-content__list a[href*=' + sectionId + ']').classList.add('active');
            } else {
                document.querySelector('.table-content__list a[href*=' + sectionId + ']').classList.remove('active');
            }
            // }
        }
        
        
    });
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
