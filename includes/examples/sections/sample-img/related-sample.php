<?php
  $terms = get_the_terms($post->ID, 'sample-category', 'string');
  $term_ids = wp_list_pluck($terms, 'term_id');

  $second_query = new WP_Query(array(
      'post_type' => 'examples',
      'tax_query' => array(
        array(
          'taxonomy' => 'sample-category',
          'field' => 'id',
          'terms' => $term_ids,
          'operator' => 'IN'
        )),
      'posts_per_page' => 15,
      'ignore_sticky_posts' => 1,
      'orderby' => 'rand',
      'post__not_in' => array($post->ID)
  ));
?>

<section class="related-sample">
  <div class="container">
    <div class="related-sample__title text--center">Related essays</div>

    <div class="related-sample__list related-sample__slider">
      <?php
        if ($second_query->have_posts()) {
          while ($second_query->have_posts()) : $second_query->the_post(); ?>
              <div class="related-sample__item">
                <a href="<?php the_permalink() ?>" class="item__title" title="<?php the_title(); ?>"><?= wp_trim_words( get_the_title(), 9 ); ?></a>
                  <div class="item__info">
                      <div class="info__item">
                        <img src="/wp-content/themes/Paper/images/examples/front/trend-examples/examples-subject.png" >  
                        <strong>Subject:</strong>
                          <?php
                            $taxonomy = 'sample-category';
                            $terms = get_the_terms($post->ID, $taxonomy);
                            if($terms[0]->parent > 0) {
                                $term_parent = get_term($terms[0])->parent;
                            } else {
                                $term_parent = get_term($terms[0]);
                            }
                            $term_parent_name = get_term($term_parent)->name;
                            if (!empty($terms) && !is_wp_error($terms)) {
                                echo "<a href='" . get_term_link($term_parent) . "'>" . $term_parent_name . "</a>";
                            }
                          ?>
                      </div>
                      <?php if ( get_field('pages') ) : ?>
                          <div class="info__item">
                            <img src="/wp-content/themes/Paper/images/examples/front/trend-examples/examples-file.png" >
                            <strong>Number of pages:</strong> <?php the_field('pages') ?>
                          </div>
                      <?php endif; ?>
                  </div>
              </div>
          <?php endwhile;
          wp_reset_query();
        }
      ?>
    </div>
  </div>
</section>