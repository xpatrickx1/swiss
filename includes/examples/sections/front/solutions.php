<?php include( 'solutions-data.php' ) ?>

<section class="solutions">
  <div class="container">

    <div class="solutions__title text--center">Choose the best solution for you</div>

    <div class="solutions__list">
      <?php foreach ( $solutionList as $key => $solution ) : ?>
        <div class="solutions__item item">
          
          <div class="item__title"><?= $solution[ 'title' ] ?></div>

          <div class="item__text"><?= $solution[ 'text' ] ?></div>

          <div class="item--bottom">

            <div class="item__info info">
              <?php $key++ ?>
              <picture class="lazy">
                <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/solutions/icon--' . $key . '.png' ?>, <?= bloginfo('template_url') . '/images/examples/front/solutions/icon--' . $key . '-2x.png' ?> 2x" >
                <img 
                  src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                  width="30"
                  height="30"
                >
              </picture>

              <div class="info__text"><?= $solution[ 'info' ] ?></div>
            </div>

            <?php if( $solution[ 'isOrder' ] ) : ?>
              <a href="/" rel="nofollow" class="item__button">Get help</a>
            <?php endif; ?>

          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>