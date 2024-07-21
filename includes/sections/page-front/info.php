<?php
    $infoText = '<p>Studying is based on the principals of the dual form of education in accordance with the recommendations of experts in science and business.</p>
                <p>Etudes Modernes SA, in collaboration with international universities, will be pleased to provide you with a personalized approach based on your abilities and goals for undergraduate, graduate and doctoral studies.</p>'
?>
<section class="info">
    <div class="container">
        <div class="info__wrap">

            <div class="info__top">
                <picture class="lazy">
                <source data-srcset="<?= bloginfo('template_url') . '/images/page-front/info/info.webp' ?>, <?= bloginfo('template_url') . '/images/page-front/info/info-2x.webp' ?> 2x" >
                <img 
                    src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                    width="636"
                    height="444"
                    class="guarantees__img"
                >
                </picture>
            </div>

            <div class="info__bottom">
                <div class="info__title">
                    <?= get_field('info_title') ? get_field('info_title') : 'Etudes Modernes' ?>
                </div>
                <div class="info__text">
                    <?= get_field('info_text') ? get_field('info_text') : $infoText ?>
                </div>
            </div>
            
        </div>
    </div>
</section>
