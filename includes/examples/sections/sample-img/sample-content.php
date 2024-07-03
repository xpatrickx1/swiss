<div class="sample__top">
    <div class="sample__left">
        <?php if (have_rows('samples')): the_row(); ?>
            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?php the_sub_field('sample_preview'); ?>" class="item__preview lazy" alt="<?php the_sub_field('sample_alt'); ?>" title="<?php the_sub_field('sample_alt'); ?>">
        <?php endif; ?>
    </div>

    <div class="sample__right">
<h1><?= the_title(); ?></h1>

<div class="sample__info">

  <div class="info__item">
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

  <?php if ( get_field( 'pages' ) && get_field( 'words' ) ) : ?>
    <div class="info__item">
      <strong>Number of words/pages:</strong>
      <?= the_field( 'words' ) . ' words/' ?><?= the_field( 'pages' ) . ' pages' ?>
    </div>
  <?php endif; ?>

  <div class="info__item">
    <strong>Topics:</strong>
    <?php
      $cat = get_queried_object_id();
      $postcat = get_the_terms($post->ID, 'sample-category');
      foreach ($postcat as $cat) {
        if ($cat->parent != 0) {
          echo "<a href='" . get_category_link($cat->term_id) . "'>" . $cat->name . "</a>";
          if( $cat != end( $postcat ) ) {
            echo ', ';
          }
        }
      }
    ?>
  </div>
</div>

    <?php if ( get_field( 'file' ) ) : ?>
        <div class="sample__download js-open-popup">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.125 15.542C17.125 15.9619 16.9582 16.3646 16.6613 16.6616C16.3643 16.9585 15.9616 17.1253 15.5417 17.1253H4.45833C4.03841 17.1253 3.63568 16.9585 3.33875 16.6616C3.04181 16.3646 2.875 15.9619 2.875 15.542" stroke="#327BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.04297 8.41699L10.0013 12.3753L13.9596 8.41699" stroke="#327BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10 12.375V2.875" stroke="#327BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Download for free
        </div>
    <?php endif; ?>
</div>


</div>
<div class="sample__donate">
  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M5.875 3.375H7.125V4.625H5.875V3.375ZM5.875 5.875H7.125V9.625H5.875V5.875ZM6.5 0.25C3.05 0.25 0.25 3.05 0.25 6.5C0.25 9.95 3.05 12.75 6.5 12.75C9.95 12.75 12.75 9.95 12.75 6.5C12.75 3.05 9.95 0.25 6.5 0.25ZM6.5 11.5C3.74375 11.5 1.5 9.25625 1.5 6.5C1.5 3.74375 3.74375 1.5 6.5 1.5C9.25625 1.5 11.5 3.74375 11.5 6.5C11.5 9.25625 9.25625 11.5 6.5 11.5Z" fill="#2AB0AB"/>
  </svg>
  This essay sample was donated by a student to help the academic community
</div>

<?php get_template_part('includes/examples/sections/sample/table-content')?>

<div class="sample__content">

  <?php 
    $firstParagraphAfter = 1;
    $titleAfter = 2;
    $topicBannerAfterParagraph = 5;
    $content = apply_filters( 'the_content', get_the_content() );
    $content = explode( "</p>", $content );
    for ( $i = 0; $i < count( $content ); $i++ ) {
        if ( $i == $firstParagraphAfter ) {
          ?>

          <?php echo '</p></div>';
              get_template_part_params( 'includes/examples/sections/sample/content-banner', 'first' );
              echo '<div class="sample__content">' ; ?>

          <?php
        }

        if ( $i == $titleAfter ) {
            ?>

            <?php echo '</p></div>';
                get_template_part_params( 'includes/examples/sections/sample/content-banner', 'second' );
                echo '<div class="sample__content">' ; ?>

            <?php
        }

        if ( $i == $topicBannerAfterParagraph ) {
          ?>

          <?php echo '</p></div>';
              get_template_part_params( 'includes/examples/sections/sample/banner-topic', 'inner-content' );
              echo '<div class="sample__content">' ; ?>

          <?php
        }

        // echo $i != 0 ? "</p>" : '';
        echo $content[ $i ];
    }
  ?>
</div>
