<?php
function wpse_modify_home_category_query($query) {

  // Check we're on a needed taxonomy.
  if (is_tax(array('sample-category', 'types-category'))) {
      $query->set('posts_per_page', 8);
  }
}

add_action('pre_get_posts', 'wpse_modify_home_category_query');
?>