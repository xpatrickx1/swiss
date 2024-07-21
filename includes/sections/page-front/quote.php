<?php
    $quoteTitle = '<p>Studying is based on the principals of the dual form of education in accordance with the recommendations of experts in science and business.</p>
                <p>Etudes Modernes SA, in collaboration with international universities, will be pleased to provide you with a personalized approach based on your abilities and goals for undergraduate, graduate and doctoral studies.</p>'
?>

<section class="quote">
    <div class="container">
        <div class="quote__wrap">

            <div class="quote__bottom">
                <div class="quote__title">
                    <?= get_field('quote_title') ? get_field('quote_title') : $quoteTitle ?>
                </div>
                <div class="quote__author-wrp">
                    <div class="quote__author">
                        <?= get_field('quote_author') ? get_field('quote_author') : 'Adrian Kudla' ?>
                    </div>
                    <div class="quote__position">
                        <?= get_field('quote_position') ? get_field('quote_position') : 'Director of Education' ?>
                    </div>
                </div>
            </div>

            <div class="quote__top">
                <picture class="lazy">
                    <source data-srcset="<?= get_field('quote_image')['url'] ?>" >
                    <source data-srcset="<?= bloginfo('template_url') . '/images/page-front/man.webp' ?>" >
                    <img 
                        src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                        width="500"
                        height="500"
                        class=""
                    >
                </picture>
            </div>
            
        </div>
    </div>
</section>
