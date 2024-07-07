
<section class="top-screen">
    <span class="top-screen__line"></span>
    <div class="container">
        <div class="top-screen__wrap" id="bg-image">
            <div class="top-screen__breadcrumbs">
                <span><a href="<?= home_url(); ?>">Homepage</a></span>
                <span> 
                <span> 
                    <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.776742 12.3299L0.854264 12.4449L0.969287 12.5225L1.08431 12.6L1.23492 12.6L1.3855 12.6L1.45999 12.5623L1.53445 12.5247L4.3406 9.72427L7.1468 6.92384L7.19572 6.83179L7.24467 6.73971L7.24467 6.59998L7.24467 6.46024L7.18985 6.35111L7.135 6.24202L4.41997 3.52163L1.7049 0.801214L1.55418 0.700611L1.40343 0.599976L1.24385 0.599976L1.08431 0.599976L0.969286 0.677498L0.854264 0.755021L0.776741 0.870044L0.699218 0.985065L0.699218 1.13568L0.699218 1.28626L0.736855 1.36075L0.774491 1.4352L3.34375 4.00907L5.91301 6.58293L3.3788 9.12301L0.844583 11.6631L0.772037 11.7821L0.699457 11.9011L0.699355 12.058L0.699219 12.2149L0.776742 12.3299Z" fill="black"/>
                    </svg>
                </span>
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
