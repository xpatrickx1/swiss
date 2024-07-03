<section class="top-screen">
  <div class="container">
    <div class="top-screen__wrap">

      <div class="top-screen--left">

        <h1>Free nursing essay examples database on any topic</h1>

        <div class="top-screen__subtitle">Get inspired by our nursing essay free examples in any nursing, medicine, or health-related discipline.</div>

        <?php get_template_part_params( 'includes/examples/sections/search/searchForm' )?>

      </div>

      <div class="top-screen--right">
        <picture class="lazy">
          <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/top-screen/top-screen--mob.webp' ?>, <?= bloginfo('template_url') . '/images/examples/front/top-screen/top-screen--mob-2x.webp' ?> 2x" media="(max-width: 767px)">
          <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/top-screen/top-screen--tablet.webp' ?>, <?= bloginfo('template_url') . '/images/examples/front/top-screen/top-screen--tablet-2x.webp' ?> 2x" media="(min-width: 768px) and (max-width: 1023px)">
          <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/top-screen/top-screen--desc.webp' ?>, <?= bloginfo('template_url') . '/images/examples/front/top-screen/top-screen--desc-2x.webp' ?> 2x" media="(min-width: 1024px) and (max-width: 1169px)">
          <source data-srcset="<?= bloginfo('template_url') . '/images/examples/front/top-screen/top-screen.webp' ?>, <?= bloginfo('template_url') . '/images/examples/front/top-screen/top-screen-2x.webp' ?> 2x" >
          <img 
            src="<?php bloginfo('template_url'); ?>/images/loader.gif"
            width="500"
            height="420"
            class="top-screen__img"
          >
        </picture>
      </div>

    </div>
  </div>
</section>