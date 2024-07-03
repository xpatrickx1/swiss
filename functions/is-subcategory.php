<?php
function is_subcategory($cat_id = null)
{
    if (is_tax('sample-category')) {

        $cat = get_term(get_queried_object_id(), 'sample-category');
        if (empty($cat->parent)) {
            return false;
        } else {
            return true;
        }
    }
    return false;
}