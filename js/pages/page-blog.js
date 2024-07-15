$(document).ready(function ($) {

    function filterObserver( observerCallback ) {
        const itemForObserver = $( '.dropdown' )[0];
        const config = {
            attributes: true,
            subtree: true
        };

        const observer = new MutationObserver( observerCallback );
        observer.observe(itemForObserver, config);
    }

    filterObserver( () => {
        jQuery('body').toggleClass('no-scroll');
        jQuery('#main').toggleClass('activss');

        if( !($('.init').hasClass('activss')) ) {
            jQuery('body').removeClass('no-scroll');
            jQuery('#main').removeClass('activss');
        }
    } );

});