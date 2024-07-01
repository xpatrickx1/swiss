<?php
function template_chooser($template)
{
    global $wp_query;
    $post_type = get_query_var('post_type');
    if( $wp_query->is_search && $post_type == 'blog' )
        {
            return locate_template('pages/page-blog.php');  //  redirect to archive-search.php
        }
    return $template;
}
add_filter('template_include', 'template_chooser');