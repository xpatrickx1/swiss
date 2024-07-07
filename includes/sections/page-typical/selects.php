<?php include( 'selects-data.php' ) ?>

<?php
    if (have_rows('selects_list')):
        while ( have_rows('selects_list')) : the_row();
            $selects[get_row_index() - 1]['title'] = get_sub_field('item_title');
            $selects[get_row_index() - 1]['text'] = get_sub_field('item_text');
            $selectsCounter++;
        endwhile;
    endif;
?>

<section class="selects">
    <div class="container">
        <div class="selects__wrap">

            <div class="selects__title">
                <?= get_field('highlights_title') ? get_field('highlights_title') : 'Etudes Modernes SA selects tailor-made programmes for dual education in the Swiss Confederation' ?>
            </div>

            <div class="selects__list">
                <?php foreach ( $selects as $key => $item ) : ?>
                    <?php $key++ ?>
                    <div class="selects__item item">
                        
                        <div class="item--top">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/page-typical/selects' . $key .'.svg' ?>" class="lazy" >
                        </div>

                        <div class="item__title item-title"><?= $item[ 'title' ] ?></div>
                        <div class="item__text item-text"><?= $item[ 'text' ] ?></div>

                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
</section>
