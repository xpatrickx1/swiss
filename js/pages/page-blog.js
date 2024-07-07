
jQuery(document).ready(function ($) {
    jQuery('ul.dropdown').on('click', '.init', function () {
        jQuery('#main').toggleClass('activss');
        jQuery('body').toggleClass('activss');
    });
});