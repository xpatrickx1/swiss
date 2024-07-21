
<section class="top-screen">
    <span class="top-screen__line"></span>
    <div class="container">
        <div class="top-screen__img" id="bg-image">
            <h1>
                <?= get_field( 'page_title' ) ? the_field( 'page_title' ) : get_the_title() ?>
            </h1>
        </div>
    </div>
</section>
