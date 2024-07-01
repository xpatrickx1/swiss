<div class="subject-sidebar__topics">

  <div class="subject-sidebar__topics-title"><?= is_subcategory() ? 'Related topics' : 'All topics on this subject' ?></div>
  <?php

  if (is_subcategory()) {

      $args = array(
          'child_of' => get_queried_object()->parent,
          'taxonomy' => 'sample-category',
          'title_li' => '',
          'number' => 10,
          'hide_empty' => false,
          'exclude' => get_queried_object() -> term_id
      ); ?>

      <ul class="subject-sidebar__topics-list">
          <?php wp_list_categories($args); ?>
      </ul>

  <?php } elseif (is_singular('examples')) {

      $taxonomy = 'sample-category';
      $terms = get_the_terms($post->ID, $taxonomy);

      if($terms[0]->parent > 0) {
          $term_parent = get_term($terms[0])->parent;
      } else {
          $term_parent = get_term($terms[0])->term_id;
      }

      $args = array(
          'child_of' => $term_parent,
          'taxonomy' => 'sample-category',
          'title_li' => '',
          'number' => 10,
          'hide_empty' => false
      );
      ?>

      <ul class="subject-sidebar__topics-list">
          <?php wp_list_categories($args); ?>
      </ul>
  <?php
  } elseif (is_search()) {
      $args = array(
          'taxonomy' => 'sample-category',
          'hierarchical' => false,
          'name__like' => $s,
          'number' => 10,
          'title_li' => '',
          'hide_empty' => false
      ); ?>
      <ul class="subject-sidebar__topics-list">
          <?php wp_list_categories($args); ?>
      </ul>
      <?php
  } else {
      $args = array(
          'parent' => get_queried_object()->term_id,
          'hierarchical' => false,
          'taxonomy' => 'sample-category',
          'number' => 10,
          'title_li' => '',
          'hide_empty' => false
      ); ?>

      <ul class="subject-sidebar__topics-list">
          <?php wp_list_categories($args); ?>
      </ul>
  <?php } ?>

</div>