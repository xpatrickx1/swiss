<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php
$sidebarSearchParams = [
  'className' => 'subject-search',
  'placeholder' => 'Enter your topic, subject or keyword'
];

  global $wp_query;
  $args = array_merge( $wp_query->query_vars, ['posts_per_page' => 10 ] );
  query_posts( $args );
if (have_posts()) : ?>
<section class="subject">
    <div class="container">
        <div class="subject__wrap">

            <div class="subject--left">
              <div class="subject__tab-item active-slide" data-slide="1">
                <?php get_template_part( 'includes/examples/sections/page-search/search-loop' ); ?>
                <?php get_template_part( 'includes/examples/sections/page-search/banner' ); ?>
              </div>
            </div>

            <div class="subject--right subject-sidebar">
                <div class="subject-sidebar--top">
                    <?php get_template_part_params( 'includes/examples/sections/search/sidebarSearch', $sidebarSearchParams ); ?>

                    <?php get_template_part( 'includes/examples/sections/page-search/subject-topics' ); ?>
                </div>

                <?php get_template_part_params( 'includes/examples/sections/page-search/banner-topic', 'sidebar' ); ?>
            </div>
        </div>
    </div>
</section>
<?php else : ?>
  <?php get_template_part( 'includes/examples/sections/page-search/no-result' ); ?>
<?php endif; ?>