<?php
$term = get_queried_object();
$taxonomy = $term->taxonomy;
$term_id = $term->term_id;
$category_description = get_field('category_description', $term);
?>

<div class="subject-description">
    <?php /*if( have_rows('category_info', $taxonomy . '_' . $term_id) ) : ?>
      <div class="subject-description__top">
          <?php if (have_rows('category_info', $taxonomy . '_' . $term_id)):
              while (have_rows('category_info', $taxonomy . '_' . $term_id)): the_row(); ?>
                  <div class="subject-description__top-item">
                      <strong><?php the_sub_field('title', $taxonomy . '_' . $term_id) ?></strong>
                      <?php the_sub_field('text', $taxonomy . '_' . $term_id) ?>
                  </div>
              <?php endwhile;
          endif; ?>
      </div>
    <?php endif; */?>
    <div class="subject-description__content">
        <?php if ($category_description): ?>
            <?= $category_description; ?>
        <?php endif; ?>
    </div>
</div>