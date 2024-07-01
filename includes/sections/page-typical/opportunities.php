
<section class="opportunities">
    <div class="container">
        <div class="opportunities__wrap">

            <div class="opportunities__top">
                <picture class="lazy">
                <source data-srcset="<?= bloginfo('template_url') . '/images/page-typical/opportunities.png' ?>" media="(max-width: 767px)">
                <source data-srcset="<?= bloginfo('template_url') . '/images/page-typical/opportunities-tab.png' ?>" media="(min-width: 768px) and (max-width: 1023px)">
                <source data-srcset="<?= bloginfo('template_url') . '/images/page-typical/opportunities-desk.png' ?>" >
                <img 
                    src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                    width="636"
                    height="480"
                    class="opportunities__img"
                >
                </picture>
            </div>

            <div class="opportunities__bottom">
                <div class="opportunities__title">
                    <?= get_field('opportunities_title') ? get_field('opportunities_title') : 'Unique Opportunities in Lausanne' ?>
                </div>
                <div class="opportunities__text">
                    <?= get_field('opportunities_text') ? get_field('opportunities_text') : 'Being located in Lausanne allows students to deeply study the history of Olympic sports, as well as the technologies and solutions employed by international organizations that unite the healthy forces of humanity.' ?>
                </div>

                <a href="#" class="button--secondary">Load more</a>
            </div>
            
        </div>
    </div>
</section>
