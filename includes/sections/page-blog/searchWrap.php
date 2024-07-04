<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php

  global $wp_query;
  $args = array_merge( $wp_query->query_vars, ['posts_per_page' => 10 ] );
  query_posts( $args );
if (have_posts()) : ?>
<section class="blog">
    <div class="container">
        <div class="blog__wrap">

            <?php get_template_part( 'includes/sections/page-blog/search-loop' ); ?>

        </div>
    </div>
</section>
<?php echo do_shortcode('[caf_filter id="67"]'); ?>
<?php else : ?>
  <?php get_template_part( 'includes/sections/page-blog/no-result' ); ?>
<?php endif; ?>