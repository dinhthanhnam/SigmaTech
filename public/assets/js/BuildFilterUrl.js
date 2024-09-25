const BuildFilterUrl = (function() {

    const AJAX_CHECK_TOTAL_PREFIX = '/ajax/get_json.php?action=product&action_type=product-list-counter';

    let _current_category_id = 0,
        _current_category_url = '';
    let _selected_list = {};

    // build pre-selected items when user visit an rewrite url such as: /laptop-gaming-core-i5
    _getPreSelected();

    function _getPreSelected() {
        $('.js-filter-title').each(function() {
            let $node = $(this);
            if ($node.hasClass('selected')) {
                const attr_filer_code = $node.data('filter_code');
                const filter_value = $node.data('value');

                let current_selected = _selected_list[attr_filer_code] ?? [];
                if (!current_selected.includes(filter_value)) {
                    _selected_list[attr_filer_code] = [...current_selected, filter_value];
                }
            }
        });

    }

    function clearFilter(filter_code) {

        if (filter_code && filter_code.length > 1) {
            delete _selected_list[filter_code];

            // remove all checked elements
            $(this).closest('.js-filter-item').find('.js-filter-title').removeClass('selected');

        } else {
            for (let key in _selected_list) {
                delete _selected_list[key];
            }

            // remove all checked elements
            $('.js-filter-title').removeClass('selected');
        }


        checkTotalMatch();
    }

    function addToFilter($node) {
        const attr_filer_code = $node.data('filter_code');
        const filter_value = $node.data('value');

        let current_selected = _selected_list[attr_filer_code] ?? [];

        console.log([_selected_list, filter_value, _selected_list[attr_filer_code], current_selected])

        if (current_selected.includes(filter_value)) {
            removeItemOnce(current_selected, filter_value);
            $node.removeClass('current');
        } else {
            $node.addClass('current');
            current_selected.push(filter_value);
        }

        _selected_list[attr_filer_code] = current_selected;

        checkTotalMatch();
    }

    function removeItemOnce(arr, value) {
        let index = arr.indexOf(value);
        if (index > -1) {
            arr.splice(index, 1);
        }
        return arr;
    }

    function makeUrl() {
        let elements = [];

        for (let key in _selected_list) {
            if (_selected_list[key].length > 0) {
                if (key == 'price') {
                    var length = _selected_list[key].length - 1
                    var price_last = _selected_list[key][length]
                    elements.push(price_last);
                } else {

                    elements.push(`${key}=${encodeURIComponent(_selected_list[key].join("-"))}`);

                }
            }
        }
        return elements.join("&");
    }

    async function checkTotalMatch() {
        const url_query = makeUrl();
        const FULL_AJAX_URL = AJAX_CHECK_TOTAL_PREFIX + '&category=' + _current_category_id + '&' + url_query;

        const total = await $.get(FULL_AJAX_URL);
        $('.js-show-total').html(total);

        $('.js-open-url').attr('href', _current_category_url + "?" + url_query);

    }

    function setCategory(id, url) {
        _current_category_id = id;
        _current_category_url = url;
    }

    return {
        clearFilter,
        addToFilter,
        makeUrl,
        setCategory,
        _selected_list
    }

})();