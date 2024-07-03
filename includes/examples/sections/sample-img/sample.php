<?php
$sidebarSearchParams = [
  'className' => 'subject-search',
  'placeholder' => 'Enter your topic, subject or keyword'
];
?>

<section class="sample">
  <div class="container">
    <div class="sample__wrap">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="sample--left">
            <?php get_template_part('includes/examples/sections/sample-img/sample-tabs'); ?>

            <div class="sample__tab-item active-slide" data-slide="1">

              <?php get_template_part('includes/examples/sections/sample-img/sample-content')?>

            </div>

            <div class="sample__tab-item" data-slide="2">

              <?php if (get_field('list_of_sources')) : ?>
                <div class="sample__content">
                  <?php the_field('list_of_sources') ?>
                </div>
              <?php endif; ?>

            </div>

            <?php get_template_part('includes/examples/sections/sample/trust-banner')?>

          </div>

          <div class="sample--right sample__sidebar">
            <div class="sample-sidebar--top">
              <?php get_template_part_params( 'includes/examples/sections/search/sidebarSearch', $sidebarSearchParams ); ?>

              <?php get_template_part('includes/examples/sections/subjects/subject-topics')?>
            </div>

            <?php get_template_part('includes/examples/sections/sample/banner-topic')?>
          </div>
        <?php endwhile;
      endif; ?>

    </div>
  </div>
</section>

<?php get_template_part('includes/examples/sections/sample/file-banner')?>
<?php get_template_part('includes/examples/sections/sample/copy-banner')?>