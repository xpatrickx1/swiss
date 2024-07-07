<?php
function is_subcategory($cat_id = null)
{
    if (is_tax('blog')) {

        $cat = get_term(get_queried_object_id(), 'blog');
        if (empty($cat->parent)) {
            return false;
        } else {
            return true;
        }
    }
    return false;
}