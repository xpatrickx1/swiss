<section class="top-screen">
    <div class="container">
        <div class="top-screen__wrap">

            <div class="top-screen__left">
                
                <img src="<?= bloginfo('template_url') . '/images/about/about.svg' ?>"
                    alt="about"
                    width="532"
                    height="678"
                >
            </div>

            <div class="top-screen__right">
                <?php the_post();
                the_content();
                ?>
            </div>

        </div>
    </div>

    <div class="top-screen__video">
        <video autoplay muted loop playsinline controls="false" src='<?= bloginfo('template_url') . '/images/home.mp4' ?>' type='video/mp4'></video>
    </div> 
</section>