<?php
$contentBannerGuarantees = [ 'MSN & DNP experts', '100% plagiarism-free', 'Money-back guarantee' ];
?>

<div class="content-banner <?= $data ?>">
  <div class="content-banner--top">

    <div class="content-banner__info">
      <div class="content-banner__subtitle">How much time do you waste writing an essay?</div>
      <div class="content-banner__title">Get it done in 1 hour with us.</div>
    </div>

    <a href="/" class="content-banner__link">Get help</a>

  </div>

  <div class="content-banner--bottom">
    <?php foreach ( $contentBannerGuarantees as $key => $guarantees ) : ?>
      <div class="content-banner__item">
        <?php $key++ ?>
        <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/examples/sample/content-banner--' . $key . '.png' ?>" class="lazy" >
        
        <div class="item__title"><?= $guarantees ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>