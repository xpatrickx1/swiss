<section class="banner-topic <?= $data; ?>">

  <div class="banner-topic__wrap">
    <picture class="lazy">
      <source data-srcset="<?= bloginfo('template_url') . '/images/examples/sample/banner-topic-mob.png' ?>, <?= bloginfo('template_url') . '/images/examples/sample/banner-topic-mob-2x.png' ?> 2x" media="( max-width: 1199px )" >
      <source data-srcset="<?= bloginfo('template_url') . '/images/examples/sample/banner-topic.png' ?>, <?= bloginfo('template_url') . '/images/examples/sample/banner-topic-2x.png' ?> 2x" >
      <img 
        src="<?php bloginfo('template_url'); ?>/images/loader.gif"
        
        class="banner-topic__img"
      >
    </picture>

    <div class="banner-topic__info">
      <div class="banner-topic__title">Need a unique essay ASAP?</div>
      <div class="banner-topic__text">We can write a custom paper according to your instructions, 24/7.</div>
    </div>
  </div>

  <div class="banner-topic__form">
    <div class="form__title">What is your topic?</div>

    <div class="form__wrap">
      <input type="text" name="topicInput" id="topicInput" placeholder="Type your topic here" >

      <a href="/order/" rel="nofollow" class="form__btn">Get essay help</a>
    </div>
  </div>

</section>