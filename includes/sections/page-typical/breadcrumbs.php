<?php 
  $category = get_queried_object();
  $getTerms = get_the_terms( $category -> ID, 'program-category' );
  $getParentTerms = get_the_terms( $getTerms[0] -> parent, 'program-category' );
?>

<div class="top-screen__breadcrumbs--new">

  <?php if (function_exists('bcn_display')) : ?>
    <?php bcn_display(); ?>
  <?php endif; ?>

</div>