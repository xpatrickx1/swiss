<section class="top-screen <?= have_posts() ? '' : 'empty' ?> ">
  <div class="container">

    <?php get_template_part('includes/examples/sections/page-search/breadcrumbs') ?>

    <h1 class="top-screen__title text--center">Search results for '<?php the_search_query(); ?>'</h1>

    <?php if (!have_posts()) : ?>
      <div class="top-screen__subtitle text--center">Please try a different keyword or topic.</div>
      
      <?php get_template_part_params( 'includes/examples/sections/search/searchForm' )?>
    <?php elseif (have_posts() && $_GET['s'] != '') : ?>
      
      <div class="top-screen__subtitle text--center">We found <b><?php
        global $wp_query;
        if ($wp_query->found_posts <= 1) {
            $result = "sample";
        } else {
            $result = "samples";
        }
        echo $wp_query->found_posts . "</b> " . $result . " on this subject"; ?>
      </div>
    <?php endif; ?>

  </div>
</section>