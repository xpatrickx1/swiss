
<section class="top-screen">
    <span class="top-screen__line"></span>
    <div class="container">
        <div class="top-screen__wrap" id="bg-image">
            <div class="top-screen__breadcrumbs">
                <span><a href="<?= home_url(); ?>">Home</a></span>
                <span> > </span>
                <span><?= get_field('breadcrumb') ? the_field('breadcrumb') : 'Thanks' ?></span>
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

            <a href="/" class="button--main">Homepage</a>
        </div>
    </div>
</section>
