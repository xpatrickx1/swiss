
<section class="top-screen">
    <span class="top-screen__line"></span>
    <div class="container">
        <div class="top-screen__img" id="bg-image">
            <!-- <img fetchpriority="high" src="<?= bloginfo('template_url') . '/images/loader.gif' ?>"
                 data-src="<?= bloginfo('template_url') . '/images/page-front/top-screen.webp' ?>"
                 class="top-screen--desctop lazy"
                 alt="happy people"
                 width="1272px"
                 height="588px" >
            <img fetchpriority="high" src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/page-front/top-screen--mob.webp' ?>" class="top-screen--mobile lazy" alt="happy people" width="354px" height="348px"> -->
            <h1>
                <?= get_field( 'page_title' ) ? the_field( 'page_title' ) : get_the_title() ?>
            </h1>
        </div>

        <div class="top-screen__bottom">
            <a href="#" class="button--arrow button__discover">Discover More</a>
            <div class="top-screen__right">
                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>"
                    data-src="<?= bloginfo('template_url') . '/images/icons/swiss.svg' ?>"
                    class="lazy"
                    alt="swiss"
                    width="48px"
                    height="48px" >                
                <div class="top-screen__info"><?= get_field('courses_title') ? get_field('courses_title') : 'We are a private institution located in Lausanne, canton de Vaud, which  was founded in 1977' ?></div>
            </div>
        </div>
    </div>
</section>
