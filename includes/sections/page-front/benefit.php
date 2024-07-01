<?php include( 'benefit-data.php' ) ?>

<section class="benefit">
    <div class="container">
        <div class="benefit__wrap">

            <div class="benefit__title">
                Etudes Modernes SA selects tailor-made programmes for dual education in the Swiss Confederation
            </div>
            

            <div class="benefit__list">
                <?php foreach ( $benefits as $key => $item ) : ?>
                    <?php $key++ ?>
                    <div class="benefit__item item">
                        
                        <div class="item--top">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/page-front/benefit/benefit' . $key .'.svg' ?>" class="lazy" >
                        </div>

                        <div class="item__text"><?= $item[ 'text' ] ?></div>

                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
</section>
