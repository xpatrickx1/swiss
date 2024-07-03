<section class="top-screen">
  <div class="container">

    <div class="top-screen__breadcrumbs">
      <span><a href="<?= home_url() . '/examples/' ?>">Home</a></span>
      <span> > </span>
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
          $category = get_queried_object();
          if ($category->count < 2) {
              $result = "sample";
          } else {
              $result = "samples";
          }
          echo $category->count . '</b> ' . $result; 
        ?> on this subject
    </div>

  </div>
</section>