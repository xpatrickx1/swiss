<?php include( 'areas-data.php' ) ?>

<?php
    if (have_rows('areas_list')):
        while ( have_rows('areas_list')) : the_row();
            $areas[get_row_index() - 1]['title'] = get_sub_field('item_title');
            $areas[get_row_index() - 1]['text'] = get_sub_field('item_text');
        endwhile;
    endif;
?>

<section class="areas">
    <div class="container">
        <div class="areas__wrap">

            <div class="areas__title">
                <?= get_field('areas_title') ? get_field('areas_title') : 'Key Focus Areas' ?>
            </div>
            

            <div class="areas__list">
                <?php foreach ( $areas as $key => $item ) : ?>
                    <?php $key++ ?>
                    <div class="areas__item item">
                        
                        <div class="item--top">
                            <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" data-src="<?= bloginfo('template_url') . '/images/page-typical/areas.svg' ?>" class="lazy" >
                        </div>

                        <div class="item-title"><?= $item[ 'title' ] ?></div>
                        <div class="item__text section-subtitle"><?= $item[ 'text' ] ?></div>

                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
</section>
