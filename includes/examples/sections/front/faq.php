<?php include( 'faq-data.php' ); ?>

<section class="faq">
  <div class="container">

    <h2>Frequently asked questions</h2>

    <div class="faq__wrap">

      <div class="faq__tabs">
        <?php foreach ( $faqData as $key => $faq ) : ?>
          <h3 class="tabs__item">
            <?= $faq[ 'title' ] ?>
          </h3>
        <?php endforeach; ?>
      </div>

      <div class="faq__container">
        <?php foreach ( $faqData as $key => $faq ) : ?>
          <div class="container__item item">

            <div class="item__title">
              <?php $key++ ?>
              <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/examples/front/faq/icon--' . $key . '.png' ?>" class="lazy" width="45" height="45">

              <span><?= $faq[ 'title' ] ?></span>
            </div>

            <div class="item__text"><?= $faq[ 'text' ] ?></div>

          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>
</section>