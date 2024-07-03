<?php if (get_field('file')) : ?>
    <div class="copy-banner" role="alert">
        <div class="copy-banner__wrap">

            <div class="copy-banner__preloader"></div>

            <div class="copy-banner--top" >
                <picture class="lazy" >
                  <source data-srcset="<?= bloginfo('template_url') . '/images/examples/sample/copy-icon.png' ?>, <?= bloginfo('template_url') . '/images/examples/sample/copy-icon-2x.png' ?> 2x" >
                  <img 
                    src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                    
                    class="copy-banner__img"
                  >
                </picture>

                <div class="copy-banner__title">Only registered users can copy this material</div>

                <div class="copy-banner__text"><strong>Note:</strong> this paper is publicly available & won’t pass Turnitin. It can be used just for inspiration.</div>

                <div class="copy-banner__form">
                    <input type="email" placeholder="Type your email here" required id="copy--popup-email">
                    <div class="help-block"></div>
                    <div class="copy-banner__btn">
                        <a href="#" rel="nofollow" class="copy-banner__submit copy-collect-popup">Get this sample</a>
                    </div>
                </div>
            </div>

            <div class="copy-banner__success" >
                <div class="copy-banner__title"><span>Thank you!</span> <br>The download will start shortly.</div>
            </div>

            <div class="copy-banner--bottom" >
                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/examples/sample/file-banner-bottom.png' ?>" class="lazy" >

                <div class="copy-banner__text">We can write an original paper on this topic according to your instructions.</div>

                <a href="/order/" rel="nofollow" class="copy-banner__submit copy-banner__unique">Order unique paper</a>
            </div>

            <a href="<?php the_field('file') ?>" class="copy-banner__download js-start-download" download="">Download</a>
            <div class="copy-banner__close"></div>
        </div>
    </div>
<?php endif; ?>