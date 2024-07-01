<?php
function my_register_taxonomy() {
    /* Create Subject and Topic Taxonomy */
    $args = array(
        'rewrite' => [
            'slug' => 'programs',
            'with_front' => false,
            'hierarchical' => false,
        ],
        'hierarchical' => true,
        'labels' => [
            'name' => 'Programs Categories',
            'singular_name' => 'Programs Category',
        ],
        'show_in_rest' => true,
    );

    register_taxonomy( 'programs-category', 'programs', $args );

    /* Create Type of work Taxonomy */
    $args = array(
        'rewrite' => [
            'slug' => 'essay-types',
            'with_front' => false,
            'hierarchical' => false,
        ],
        'hierarchical' => true,
        'labels' => [
            'name' => 'Types of work',
            'singular_name' => 'Type Category',
        ],
        'show_in_rest' => true,
    );

    register_taxonomy( 'types-category', 'programs', $args );
}

function my_register_post_type() {
    register_post_type( 'programs', [
            'rewrite'      => [
                'slug'       => 'programs',
                'with_front' => false,
            ],
            'has_archive'  => 'programs',
            'hierarchical' => true,
            'public'       => true,
            'supports'     => [ 'title', 'editor', 'page-attributes'],
            'labels'       => [
                'name'          => 'Programs',
                'singular_name' => 'Programs',
            ],
            'show_in_rest' => true,
        ]
    );
}

add_action( 'init', function () {
    my_register_taxonomy();
    my_register_post_type();

    /* If that doesn't work, you can try switching them:
    my_register_post_type();
    my_register_taxonomy();
    */
} );

function wpse_358157_parse_request( $wp ) {
    $path      = 'programs'; // rewrite slug; no trailing slashes
    $taxonomy  = 'programs-category';        // taxonomy slug
    $post_type = 'programs';                 // post type slug

    if ( preg_match( '#^' . preg_quote( $path, '#' ) . '/#', $wp->request ) &&
        isset( $wp->query_vars[ $taxonomy ] ) ) {
        $slug = $wp->query_vars[ $taxonomy ];
        $slug = ltrim( substr( $slug, strrpos( $slug, '/' ) ), '/' );

        if ( ! term_exists( $slug, $taxonomy ) ) {
            $wp->query_vars['name']       = $wp->query_vars[ $taxonomy ];
            $wp->query_vars['post_type']  = $post_type;
            $wp->query_vars[ $post_type ] = $wp->query_vars[ $taxonomy ];
            unset( $wp->query_vars[ $taxonomy ] );
        }
    }
}
add_action( 'parse_request', 'wpse_358157_parse_request' );

function set_posts_per_page_for_programs($query){
    if (!is_admin() && $query->is_main_query() && is_tax('sample-category')) {
        $query->set('posts_per_page', 1);
    }
}

add_action('pre_get_posts', 'set_posts_per_page_for_programs');

function programs_short_excerpt($excerpt)
{
    global $post;
    return substr($excerpt, 0, 229) . '...';
}

add_filter('the_excerpt', 'programs_short_excerpt');