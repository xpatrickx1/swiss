<section class="trend-examples">
  <div class="container">

    <h2>Trending nursing essay examples</h2>

    <div class="trend-examples__subtitle text--center">Up-to-date samples of a nursing essays on the most searched topics.</div>

    <div class="trend-examples__wrap">

      <div class="trend-examples__slider">
        <?php
            $second_query = new WP_Query(array(
                'post_type' => 'examples',
                'posts_per_page' => 15,
                'meta_query' => [
                    ['key' => 'featured_sample', 'value' => '1'],
                ],
                'order' => 'ASC',
                'orderby' => 'meta_value_num',
            ));

            if ($second_query->have_posts()) {
                while ($second_query->have_posts()) : $second_query->the_post(); ?>
                    <div class="trend-examples__item">

                        <div class="item__trend">
                          <picture>
                            <source srcset="<?= bloginfo('template_url') . '/images/examples/front/trend-examples/examples-trend.png' ?>, <?= bloginfo('template_url') . '/images/examples/front/trend-examples/examples-trend-2x.png' ?> 2x" >
                            <img
                              src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                              width="30"
                              height="30"
                            >
                          </picture>
                        </div>

                        <div class="item__title">
                            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?= wp_trim_words(get_the_title(), 8); ?></a>
                        </div>

                        <div class="item__info">

                            <div class="item__info-item">
                              <picture>
                                <source srcset="/wp-content/themes/Paper/images/examples/front/trend-examples/examples-subject.png, /wp-content/themes/Paper/images/examples/front/trend-examples/examples-subject-2x.png 2x" >
                                <img 
                                  src="/wp-content/themes/Paper/images/loader.gif"
                                  
                                >
                              </picture>

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
                                <div class="item__info-item">
                                  <picture>
                                    <source srcset="/wp-content/themes/Paper/images/examples/front/trend-examples/examples-file.png, /wp-content/themes/Paper/images/examples/front/trend-examples/examples-file-2x.png 2x" >
                                    <img 
                                      src="/wp-content/themes/Paper/images/loader.gif"
                                      
                                    >
                                  </picture>
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

      <div class="trend-examples__banner">

        <div class="banner__img">
          <picture class="lazy">
            <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/trend-examples/banner-img--tablet.png' ?>, <?= bloginfo('template_url') . '/images/examples/front/trend-examples/banner-img--tablet-2x.png' ?> 2x" media="(min-width: 768px) and (max-width: 1199px)" >
            <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/trend-examples/banner-img.png' ?>, <?= bloginfo('template_url') . '/images/examples/front/trend-examples/banner-img-2x.png' ?> 2x" >
            <img 
              src="<?php bloginfo('template_url'); ?>/images/loader.gif"
              width="300"
              height="223"
            >
          </picture>
        </div>

        <div class="banner__info">
          <div class="banner__title text--center">The deadline is too short?</div>

          <div class="banner__text text--center">We can write a Turnitin-ready paper in 1 hour.</div>

          <a href="/" rel="nofollow" class="banner__btn">Hire a writer</a>
        </div>

      </div>

    </div>

  </div>
</section>