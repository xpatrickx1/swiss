const activateSearch = ( field, index ) => {
    jQuery(function ($) {
        let customRenderMenu = function (ul, items) {
            var self = this;
            var categoryArr = [];
    
            function contain(item, array) {
                var contains = false;
                $.each(array, function (index, value) {
                    if (item == value) {
                        contains = true;
                        return false;
                    }
                });
                return contains;
            }
    
            $.each(items, function (index, item) {
                if (!contain(item.type, categoryArr)) {
                    categoryArr.push(item.type);
                }
            });
    
            $.each(categoryArr, function (index, category) {
                ul.append('<li class=\'ui-autocomplete-group\'>' + category + '</li>');
                $.each(items, function (index, item) {
                    if (item.type == category) {
                        self._renderItemData(ul, item);
                    }
                });
            });
        };
    
        if (field.length) {
            field
                .autocomplete({
                    minLength: 3,
                    appendTo: field.parent().parent(),
                    source: function (request, response) {
                        $.ajax({
                            dataType: 'json',
                            url: AutocompleteSearch.ajax_url,
                            data: {
                                term: request.term,
                                action: 'autocompleteSearch',
                                security: AutocompleteSearch.ajax_nonce,
                            },
                            success: function (data) {
                                data = $.ui.autocomplete.filter(data, request.term);
                                response(data.slice(0, 6));
                            },
                        });
                    },
                    create: function () {
                        $(this).data('uiAutocomplete')._renderMenu = customRenderMenu;
                    },
                    open: function () {
                        let addResultsBtn =
                `<li class="ui-menu-item" id="allResults" onClick="showAllSearchResults(${index});"><a href="#" rel="nofollow">View all results</a></li>`;
                        $('.ui-autocomplete').append(addResultsBtn);
                    },
                    select: function (event, ui) {
                        window.location.href = ui.item.link;
                    },
                })
                .focus(function () {
                    $(this).autocomplete('search');
                })
                .data('ui-autocomplete')._renderItem = function (ul, item) {
                    let txt = String(item.value).replace(
                        new RegExp(this.term, 'gi'),
                        '<b>$&</b>'
                    );
                    return $('<li></li>')
                        .data('ui-autocomplete-item', item)
                        .append('<a>' + txt + '</a>')
                        .appendTo(ul);
                };
        }
    });
    
};

$( '.search__wrap .search-field' ).each( function( index ) {
    activateSearch( $( '.search__wrap .search-field' ).eq(index), index );
} );

function showAllSearchResults(index) {
    $('.search__wrap .btn-submit').eq( index ).click();
}