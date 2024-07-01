<?php get_header(); ?>
        
    <section class="error-page">
        <span class="error-page__line"></span>
        <div class="container">
            <div class="error-page__wrap" id="bg-image">
                <div class="error-page__breadcrumbs">
                    <span><a href="<?= home_url(); ?>">Home</a></span>
                    <span> > </span>
                    <span><?= get_field('breadcrumb') ? the_field('breadcrumb') : 'Page not found' ?></span>
                </div>
                <!-- <?php get_template_part('/sections/page-typical/breadcrumbs'); ?> -->
                <h1>
                    Page not found
                </h1>

                <p class="error-page__description section-subtitle">
                    Unfortunately, the page you are looking for does not exist. You may have mistyped the address or the page has been moved.
                </p>

                <a href="/" class="button--main">Homepage</a>
            </div>
        </div>
    </section>

    <?php get_template_part('includes/modules/contacts')?>

<?php get_footer(); ?>