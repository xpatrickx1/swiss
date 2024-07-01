
<section class="community">
    <div class="container">
        <div class="community__wrap">

            <div class="community__top">
                <picture class="lazy">
                <source data-srcset="<?= bloginfo('template_url') . '/images/page-typical/community.png' ?>" media="(max-width: 767px)">
                <source data-srcset="<?= bloginfo('template_url') . '/images/page-typical/community-tab.png' ?>" media="(min-width: 768px) and (max-width: 1023px)">
                <source data-srcset="<?= bloginfo('template_url') . '/images/page-typical/community-desk.png' ?>" >
                <img 
                    src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                    width="636"
                    height="480"
                    class="community__img"
                >
                </picture>
            </div>

            <div class="community__bottom">
                <div class="community__title">
                    <?= get_field('community_title') ? get_field('community_title') : 'Intellectual Community' ?>
                </div>
                <div class="community__text">
                    <?= get_field('community_text') ? get_field('community_text') : 'Etudes Modernes Academy fosters relationships with global intellectual game organizations like chess, Go, and checkers. This enables students to join an intellectual community, participating in tournaments with elite representatives from different countries.' ?>
                </div>

                <a href="#" class="button--main">Contact Us</a>
            </div>
            
        </div>
    </div>
</section>
