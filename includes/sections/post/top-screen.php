
<section class="top-screen">
    <span class="top-screen__line"></span>
    <div class="container">
        <div class="top-screen__wrap" id="bg-image">
            <div class="top-screen__breadcrumbs">
                    <span><a href="<?= home_url(); ?>">Home</a></span>
                    <span> > </span>
                    <?php if( get_the_terms($post->ID, 'category')[0]->name ) : ?>
                        <span><a href="/<?= get_the_terms($post->ID, 'category')[0]->slug; ?>/"><?= ucfirst( get_the_terms($post->ID, 'category')[0]->slug ); ?></a></span>
                        <span> > </span>
                    <?php endif; ?>
                    <span><?= get_field('breadcrumb') ? the_field('breadcrumb') : get_the_title() ?></span>
            </div>

            <h1>
                <?= get_field( 'page_title' ) ? the_field( 'page_title' ) : get_the_title() ?>
            </h1>
            <?php if( get_field('page_description') ) : ?>
                <p class="top-screen__description section-subtitle">
                    <?= the_field('page_description') ?>
                </p>
            <?php endif; ?>
            <div class="top__date">
                <?= get_the_date('F d, Y' ); ?>
            </div>
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
