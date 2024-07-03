<?php if (get_field('file')) : ?>
    <div class="samples-popup" role="alert">
        <div class="samples-popup__wrap">

            <div class="samples-popup__preloader"></div>

            <div class="samples-popup--top" >
                <div class="samples-popup__title">Download Sample</div>

                <div class="samples-popup__text"><strong>Note:</strong> this paper is publicly available & won’t pass Turnitin. It can be used just for inspiration.</div>

                <div class="samples-popup__form">
                    <input type="email" placeholder="Type your email here" required id="samples--popup-email">
                    <div class="help-block"></div>
                    <div class="samples-popup__btn">
                        <a href="#" rel="nofollow" class="samples-popup__submit js-collect-popup">Get this sample</a>
                    </div>
                </div>
            </div>

            <picture class="lazy" >
              <source data-srcset="<?= bloginfo('template_url') . '/images/examples/sample/file-banner.png' ?>, <?= bloginfo('template_url') . '/images/examples/sample/file-banner-2x.png' ?> 2x" >
              <img 
                src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                
                class="samples-popup__img"
              >
            </picture>

            <div class="samples-popup__success" >
                <div class="samples-popup__title"><span>Thank you!</span> <br>The download will start shortly.</div>
            </div>

            <div class="samples-popup--bottom" >
                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/examples/sample/file-banner-bottom.png' ?>" class="lazy" >

                <div class="samples-popup__text">We can write an original paper on this topic according to your instructions.</div>

                <a href="/order/" rel="nofollow" class="samples-popup__submit">Order unique paper</a>
            </div>

            <a href="<?php the_field('file') ?>" class="samples-popup__download js-start-download" download="">Download</a>
            <div class="samples-popup__close"></div>
        </div>
    </div>
<?php endif; ?>