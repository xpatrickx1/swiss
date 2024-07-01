$('.news .news__accordion').not(':first').hide();

$('.news .news__accordion').each(function () {
    $('.news__item').each(function (index) {
        $('.item__description').slideUp();
    });
});

function openAccordionItem(el) {
    el.addClass('currentFaq');
    el.find('.item__description').slideDown();
    el.find('.item__close').addClass('active');
    el.find('.item__title').addClass('active');
    hideImage();
}

function closeAccordionItem(el) {
    el.removeClass('currentFaq');
    el.find('.item__description').slideUp();
    el.find('.item__close').removeClass('active');
    el.find('.item__title').removeClass('active');
}


$('.news__item').on('click', function(el){
    let accordion =  $(this).parent('.news__accordion');
    if (accordion) {
        if ($(this).hasClass('currentFaq')) {
            closeAccordionItem($(this));
            return;
        }
        accordion.children().each(function () {
            if($(this).hasClass('currentFaq')){
                closeAccordionItem($(this));
            }
        });

        openAccordionItem($(this));
    }
});


let attached = false;
const imgContainer = $('#imgContainer');

const getElmtImage = (elmt) => {
    return $(elmt).find('.item__img')[0];
};

const followMouse = (elmt, event) => {
    elmt.css('left', `${event.x + 20 + 'px'}`);
    elmt.css('top', `${event.y + 20 + 'px'}`);
};

function showImage(elmt) {
    const image = getElmtImage(elmt);
    imgContainer.css('background-image', `url(${image.dataset.src})`);
    if (!attached) {
        attached = true;
        imgContainer.css('display', 'block');
        document.addEventListener('pointermove', function(event) {
            followMouse(imgContainer, event);
        });
    }
}

function hideImage() {
    attached = false;
    imgContainer.css('display', 'none');
    document.removeEventListener('pointermove', followMouse);
}

function addActions(el) {

    const windowWidth = $( window ).width();

    if( windowWidth > 1024 ) {
        $(el).mouseenter(function(){
            if (!($(this).hasClass('currentFaq'))) {
                showImage($(this)[0]);
            }
        });
    
        $(el).mouseleave(function(){
            hideImage();
        });
    }
    
}

addActions('.news__item');


