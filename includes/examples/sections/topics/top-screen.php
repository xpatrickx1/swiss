<?php 
  $category = get_queried_object();
  $child_id = get_term( $category -> term_id, 'sample-category' );
  $parent_term = get_term( $child_id -> parent, 'sample-category' ); 
?>

<section class="top-screen">
  <div class="container">

    <div class="top-screen__breadcrumbs">
      <span><a href="<?= home_url() . '/examples/' ?>">Home</a></span>
      <span> > </span>
      <?php if( $parent_term -> name ) : ?>
        <span><a href="<?= '/examples/' . $parent_term -> slug . '/' ?>"><?= $parent_term -> name ?></a></span>
        <span> > </span>
      <?php endif; ?>
      <span><?php single_cat_title() ?></span>

    </div>

    <h1>
      <?php if( get_field( 'category_title', get_queried_object() ) ) { ?>
        <?php the_field( 'category_title', get_queried_object() ) ?>
      <?php } else { ?>
        <?php single_cat_title(); ?> essays
      <?php } ?>
    </h1>
    <div class="top-screen__subtitle text--center">
      We found <b>
        <?php
          if ($category->count < 2) {
              $result = "sample";
          } else {
              $result = "samples";
          }
          echo $category->count . '</b> ' . $result; 
        ?> on this topic
    </div>

  </div>
</section>