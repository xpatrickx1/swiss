<?php include( 'reviews-data.php' ) ?>

<section class="reviews">
  <div class="container">

    <h2>Trusted writing service <br>& sample nursing essay database</h2>

    <div class="reviews__subtitle text--center">15,000 students have relied on us since 2016</div>

  </div>

  <div class="container reviews__wrap">

      <div class="reviews__recommend">

        <div class="recommend__wrap">
          <div class="recommend__count">78.5%</div>
          <div class="recommend__text">of our customers recommend us to their friends!</div>
        </div>
        
        <div class="recommend__info">based on <span>2,567</span> reviews</div>

      </div>

      <div class="reviews__slider">
        <?php foreach ( $reviews as $key => $item ) : ?>
          <div class="reviews__item item">
            
            <div class="item--top">
              <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/examples/front/reviews/avatar.png' ?>" class="lazy item__avatar" >

              <div class="item__name"><?= $item[ 'name' ] ?></div>
            </div>

            <div class="item--center">
              <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/examples/front/reviews/' . $item[ 'ratingImg' ] . '.svg' ?>" class="lazy item__trust" width="13" height="13">

              <div class="item__title"><?= $item[ 'title' ] ?></div>

              <div class="item__text"><?= $item[ 'text' ] ?></div>
            </div>

            <div class="item--bottom">
              <div class="item__date"><?= $item[ 'date' ] ?></div>

              <div class="item__verified">Verified</div>
            </div>

          </div>
        <?php endforeach; ?>
      </div>

  </div>
</section>