<section class="banner-topic <?= $data ? $data : '' ?>">

  <div class="banner-topic__wrap">
    <picture class="lazy">
      <source data-srcset="<?= bloginfo('template_url') . '/images/examples/subject/banner-topic.png' ?>" >
      <img 
        src="<?php bloginfo('template_url'); ?>/images/loader.gif"
        
        class="banner-topic__img"
      >
    </picture>

    <div class="banner-topic__info">
      <div class="banner-topic__title">Haven't found the right sample?</div>
      <div class="banner-topic__text">We can write you a custom paper on your topic in 1 hour!</div>
    </div>
  </div>

  <div class="banner-topic__form">
    <div class="form__title">What is your topic?</div>

    <div class="form__wrap">
      <input type="text" name="topicInput" id="topicInput" placeholder="Type your topic here" >

      <a href="/order/" rel="nofollow" class="form__btn">Get help</a>
    </div>
  </div>

</section>