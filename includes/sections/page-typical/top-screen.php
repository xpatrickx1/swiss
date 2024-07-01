
<section class="top-screen">
    <span class="top-screen__line"></span>
    <div class="container">
        <div class="top-screen__wrap" id="bg-image">
            <div class="top-screen__breadcrumbs">
                <span><a href="<?= home_url(); ?>">Homepage</a></span>
                <span> > </span>
                <span><?= get_field('breadcrumb') ? the_field('breadcrumb') : 'About Us' ?></span>
            </div>
            <!-- <?php get_template_part('/sections/page-typical/breadcrumbs'); ?> -->
            <h1>
                <?= get_field( 'page_title' ) ? the_field( 'page_title' ) : get_the_title() ?>
            </h1>
            <?php if( get_field('page_description') ) : ?>
                <p class="top-screen__description section-subtitle">
                    <?= the_field('page_description') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- <div class="top-screen__img" id="bg-image"> -->

            
            <!-- <img fetchpriority="high" src="<?= bloginfo('template_url') . '/images/loader.gif' ?>"
                 data-src="<?= bloginfo('template_url') . '/images/page-front/top-screen.webp' ?>"
                 class="top-screen--desctop lazy"
                 alt="happy people"
                 width="1272px"
                 height="588px" >
            <img fetchpriority="high" src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/page-front/top-screen--mob.webp' ?>" class="top-screen--mobile lazy" alt="happy people" width="354px" height="348px"> -->
            
        <!-- </div> -->
    </div>
</section>
