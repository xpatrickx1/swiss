</main><?php // main-container end ?>

<?php include(locate_template('main-vars.php', true)); ?>

<footer class="footer">
    <div class="container">
        <div class="footer__wrap">

        <a href="/"
            class="footer__logo" aria-label="Footer logo">
            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/icons/footer-logo.svg' ?>" class="lazy" width="176px" height="60px" alt="footer site logo">
        </a>
        <ul class="footer__menu">
            <?php if ( has_nav_menu('footer_menu') ) :
                $nav_args = array(
                    'theme_location' => 'footer_menu',
                    'container' => '',
                    'items_wrap' => '%3$s',
                );
                wp_nav_menu($nav_args);
            endif; ?>
        </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
