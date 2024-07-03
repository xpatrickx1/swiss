<?php include( 'guarantees-data.php' ); ?>

<section class="guarantees">
  <div class="container">

    <div class="guarantees--top">

      <div class="guarantees--left">

        <div class="guarantees__info info"><span>All tasks:</span> from essays to nursing care plans</div>

        <div class="guarantees__title">Free up your schedule with NursingPaper</div>

        <div class="guarantees__subtitle">We’re a certified and long-established writing service helping nursing & healthcare students with any task. Our purpose is to provide an original nursing paper that fully meets our customers’ needs.</div>

        <a href="/order/" rel="nofollow" class="guarantees__btn">Hire a writer</a>

      </div>

      <div class="guarantees--right">
        <picture class="lazy">
          <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/guarantees/guarantees--mob.png' ?>, <?= bloginfo('template_url') . '/images/examples/front/guarantees/guarantees--mob-2x.png' ?> 2x" media="(max-width: 767px)">
          <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/guarantees/guarantees--tablet.png' ?>, <?= bloginfo('template_url') . '/images/examples/front/guarantees/guarantees--tablet-2x.png' ?> 2x" media="(min-width: 768px) and (max-width: 1023px)">
          <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/guarantees/guarantees.png' ?>, <?= bloginfo('template_url') . '/images/examples/front/guarantees/guarantees-2x.png' ?> 2x" >
          <img 
            src="<?php bloginfo('template_url'); ?>/images/loader.gif"
            width="593"
            height="457"
            class="guarantees__img"
          >
        </picture>
      </div>

    </div>

    <div class="guarantees__list">
      <?php foreach ( $guaranteesList as $key => $item ) : ?>
        <div class="guarantess__item item">
          
          <div class="item__icon">
            <?php $key++ ?>
            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/examples/front/guarantees/item-' . $key . '.png' ?>" class="lazy" width="60" height="50">
          </div>

          <div class="item__title"><?= $item[ 'title' ] ?></div>

          <div class="item__text"><?= $item[ 'text' ] ?></div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>