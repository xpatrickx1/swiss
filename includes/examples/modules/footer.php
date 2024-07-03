</main><?php // main-container end ?>

<?php include(locate_template('main-vars.php', true)) ?>

<footer class="footer">
    <div class="container">

        <?php if (has_nav_menu('footer_samples_menu_post')) : ?>
            <div class="footer--top">

                <ul class="footer__menu footer__menu--post">
                    <?php if (has_nav_menu('footer_samples_menu_post')) :
                        $nav_args = array(
                            'theme_location' => 'footer_samples_menu_post',
                            'container' => '',
                            'items_wrap' => '%3$s',
                        );
                        wp_nav_menu($nav_args);
                    endif; ?>
                </ul>

                <div class="footer__more">Show more</div>

            </div>
        <?php endif; ?>

        <div class="footer__wrap">

            <div class="footer--right">
                <a href="/examples/" class="footer__logo" aria-label="Footer logo">
                    <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/footer-logo.png' ?>" class="lazy" width="170" height="57">
                </a>

                <div class="footer__phone">
                    <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/footer-phone.png' ?>" class="lazy" width="138" height="24">
                </div>

                <a href="<?= 'mailto:support@' . explode( 'www.', get_site_url())[1];?>" class="footer__email">
                    <?= file_get_contents(get_theme_file_path("./images/icons/footer-email.svg")); ?>
                    <span><?= 'support@' . explode( 'www.', get_site_url())[1];?></span>
                </a>

                <div class="footer__terms">
                    <a href="#" data-open="privacyPolicy" class="footer__terms-link" >Privacy Policy</a>
                    <a href="#" data-open="termsAndConditions" class="footer__terms-link" >Terms and Conditions</a>
                </div>
            </div>

            <div class="footer--center ">
                <div class="footer__menu footer__menu--company">
                    <div class="menu__title">Our Company</div>
                    <ul class="menu__items">
                        <?php if (has_nav_menu('footer-company')) :
                            $nav_args = array(
                                'theme_location' => 'footer-company',
                                'container' => '',
                                'items_wrap' => '%3$s',
                            );
                            wp_nav_menu($nav_args);
                        endif; ?>
                    </ul>
                </div>

                <div class="footer__menu footer__menu--subject">
                    <div class="menu__title">Subjects</div>
                    <ul class="menu__items">
                        <?php if (has_nav_menu('footer-subjects')) :
                            $nav_args = array(
                                'theme_location' => 'footer-subjects',
                                'container' => '',
                                'items_wrap' => '%3$s',
                            );
                            wp_nav_menu($nav_args);
                        endif; ?>
                    </ul>
                </div>

                <div class="footer__menu footer__menu--services">
                    <div class="menu__title">Services</div>
                    <ul class="menu__items">
                        <?php if (has_nav_menu('footer-services')) :
                            $nav_args = array(
                                'theme_location' => 'footer-services',
                                'container' => '',
                                'items_wrap' => '%3$s',
                            );
                            wp_nav_menu($nav_args);
                        endif; ?>
                    </ul>
                </div>
            </div>

            <div class="footer--left">

                <div class="footer__icons">

                    <div class="footer__secure secure">
                        <div class="secure__title">Secure:</div>
                        <div class="secure__item">
                            <a href="//www.dmca.com/Protection/Status.aspx?ID=2b520d00-d525-4d49-b866-3a81f03575ee" title="DMCA.com Protection Status" class="dmca-badge" target="_blank" <?= is_page_template( 'pages/page-remarket.php' ) ? 'rel="nofollow"' : 'rel="dofollow"' ?> >
                                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="https://images.dmca.com/Badges/_dmca_premi_badge_4.png?ID=2b520d00-d525-4d49-b866-3a81f03575ee" alt="DMCA.com Protection Status" width="90" height="22" class="lazy"/>
                            </a>
                            <!-- <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/dmca.png' ?>" class="lazy" > -->
                        </div>

                        <div class="secure__item">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/secure-connect.png' ?>" class="lazy" width="55" height="22" >
                        </div>

                        <div class="secure__item">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/mc-afee.png' ?>" class="lazy" width="55" height="19" >
                        </div>
                    </div>

                    <div class="footer__payments payments">
                        <div class="payments__title">Payments:</div>

                        <div class="payments__items">
                            <div class="payments__item">
                                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/visa.png' ?>" class="lazy" width="35" height="23">
                            </div>

                            <div class="payments__item">
                                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/masterCard.png' ?>" class="lazy" width="37" height="23">
                            </div>

                            <div class="payments__item">
                                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/visaSecure.png' ?>" class="lazy" width="23" height="23">
                            </div>

                            <div class="payments__item payments__item--masterId">
                                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/masterCardID.png' ?>" class="lazy" width="91" height="22">
                            </div>
                        </div>
                    </div>

                    <div class="footer__social">
                        Follow Us:
                        <a href="https://www.facebook.com/Nursingpaper/" aria-label="Logo facebook">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/social_fb.svg' ?>" class="lazy" width="35" height="35">
                        </a>
                        <a href="https://www.instagram.com/nursing_paper/" aria-label="Logo instagram">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/social_insta.svg' ?>" class="lazy" width="35" height="35">
                        </a>
                        <a href="https://www.tiktok.com/@nursingpaper" aria-label="Logo tiktok">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/social_tiktok.svg' ?>" class="lazy" width="35" height="34">
                        </a>
                        <a href="https://www.youtube.com/channel/UCFLlExvSHBqbRc_o2xqytvw" aria-label="Logo youtube">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/social_youtube.svg' ?>" class="lazy" width="39" height="39">
                        </a>
                        <a href="https://www.pinterest.com/nursing_paper/" aria-label="Logo pinterest">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/pinterest.svg' ?>" class="lazy" width="27" height="34">
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="container">

        <div class="footer--bottom footer__copyright">
            Copyright ©<?= date("Y"); ?>. <?= explode( 'www.', get_site_url())[1]; ?>. All Rights Reserved.

            <nav class="footer__nav">
                <?php
                $nav_args = array(
                    'theme_location' => 'terms-menu',
                    'container'      => ''
                );
                wp_nav_menu( $nav_args );
                ?>
            </nav>
        </div>

    </div>
</footer>
<div data-crm-widget="disclaimer" data-params='{"theme":"dark"}'></div>

<?php wp_footer(); ?>

</body>
</html>