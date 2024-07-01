
<section class="focus">
    <div class="container">
        <div class="focus__wrap">

            <div class="focus__top">
                <picture class="lazy">
                    <source data-srcset="<?= bloginfo('template_url') . '/images/page-typical/focus.png' ?>" >
                    <img 
                        src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                        width="636"
                        height="480"
                        class="guarantees__img"
                    >
                </picture>
            </div>

            <div class="focus__bottom">
                <div class="focus__title">
                    <?= get_field('focus_title') ? get_field('focus_title') : 'Key Focus Areas' ?>
                </div>
                <div class="focus__text">
                    <ul>
                        <li><strong>Interaction with Leading Sports Federations:</strong> Significant emphasis is placed on interacting with leading sports federations in Switzerland, including football, basketball, and other sports.</li>
                        <li><strong>Specialized Disciplines:</strong> Alongside their specialized disciplines, students also focus on psychology and communications.</li>
                        <li><strong>Practical Aspects:</strong> Students explore the practical aspects of athlete transfers and contract negotiations between sports federations in various sports (e.g., fencing, boxing).</li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</section>
