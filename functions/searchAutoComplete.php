<?php
add_action('wp_enqueue_scripts', function () {
    if ( is_post_type_archive( 'blog' ) || is_tax( array('sample-category', 'types-category') ) || is_singular('blog') || is_page_template('pages/page-alphabet.php') ) {
        wp_enqueue_script(
          'autocomplete-search', get_stylesheet_directory_uri() . '/js/search/searchForm.js',
          ['jquery', 'jquery-ui-autocomplete'], null, true);
        wp_localize_script('autocomplete-search', 'AutocompleteSearch', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('autocompleteSearchNonce')
        ]);

        $wp_scripts = wp_scripts();

        wp_enqueue_style('jquery-ui-css',
            '//ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css',
            false, null, false
        );
        wp_enqueue_script('jqueryUI', '//ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js', null, null, true);
    }
});

add_action('wp_ajax_nopriv_autocompleteSearch', 'awp_autocomplete_search');
add_action('wp_ajax_autocompleteSearch', 'awp_autocomplete_search');
function awp_autocomplete_search()
{
    check_ajax_referer('autocompleteSearchNonce', 'security');

    $search_term = $_REQUEST['term'];
    if (!isset($_REQUEST['term'])) {
        echo json_encode([]);
    }

    $suggestions = [];

    $args = array(
        'search' => strtolower($_GET['term']),
        'taxonomy' => 'sample-category',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => false,
        'number' => 10,
    );
    $search_query = new WP_Term_Query($args);

    if ($search_query->get_terms()) {
        foreach ($search_query->get_terms() as $term) {
            $suggestions[] = array(
                'id' => $term->term_id,
                'label' => $term->name,
                'link' => get_term_link($term->term_id),
                'type' => 'Go to category'
            );
        }
    }

    $query = new WP_Query([
        's' => $search_term,
        'post_type' => 'blog',
        'posts_per_page' => -1,
    ]);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $suggestions[] = [
                'id' => get_the_ID(),
                'label' => get_the_title(),
                'link' => get_the_permalink(),
                'type' => 'Samples'
            ];
        }
        wp_reset_postdata();
    }
    echo json_encode($suggestions);
    wp_die();
}
