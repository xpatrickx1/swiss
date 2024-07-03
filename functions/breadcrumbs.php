<?php
add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
    if(in_array('post-examples-archive', $type))
    {
        $title = __('Home');
    }
    return $title;
}