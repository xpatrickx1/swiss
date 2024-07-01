<?php
function filter_search( $query ) {
  $post_type = get_query_var('post_type');

  if( $query->is_search && $post_type == 'blog' ) {
    $query_vars = [
      'meta_key' => 'featured_sample',
      'orderby' => 'meta_value'
    ];

    foreach ( $query_vars as $key => $value ) {
      $query->set( $key, $value );
    };
  }
}
add_action( 'pre_get_posts', 'filter_search' );