
<section class="top-screen">
    <span class="top-screen__line"></span>
    <div class="container">
        <div class="top-screen__wrap">

            <div class="top-screen__left">
                <div class="top-screen__breadcrumbs">
                    <span><a href="<?= home_url(); ?>">Homepage</a></span>
                    <span> > </span>
                    <span><?= get_field('breadcrumb') ? the_field('breadcrumb') : 'About Us' ?></span>
                </div>
                <!-- <?php get_template_part('/sections/page-typical/breadcrumbs'); ?> -->
                <h1>
                    <?= get_queried_object()->name; ?>
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    ?>
                    <?php if ($paged !== 1) { echo " - Page " . $paged;} ?>
                </h1>
                <?php if( category_description() ) : ?>
                    <p class="top-screen__description section-subtitle">
                        <?= category_description() ?>
                    </p>
                <?php endif; ?>

                <?php get_template_part_params( 'includes/sections/page-blog/searchForm' )?>
            </div>

            <div class="top-screen__right post">
                <?php get_template_part('includes/sections/page-blog/recent-post')?>
            </div>
        </div>

    </div>
</section>
