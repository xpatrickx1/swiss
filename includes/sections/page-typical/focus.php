<?php

  $focus = [
    [
      'text' => '<strong>Interaction with Leading Sports Federations:</strong> Significant emphasis is placed on interacting with leading sports federations in Switzerland, including football, basketball, and other sports.',
    ],
    [
      'text' => '<strong>Specialized Disciplines:</strong> Alongside their specialized disciplines, students also focus on psychology and communications.',
    ],
    [
      'text' => '<strong>Practical Aspects:</strong> Students explore the practical aspects of athlete transfers and contract negotiations between sports federations in various sports (e.g., fencing, boxing).',
    ],
  ];

?>

<?php
    if (have_rows('focus_list')):
        while ( have_rows('focus_list')) : the_row();
            $focus[get_row_index() - 1]['text'] = get_sub_field('focus_item');
        endwhile;
    endif;
?>


<section class="focus">
    <div class="container">
        <div class="focus__wrap">

            <div class="focus__top">
                <picture class="lazy">
                    <source data-srcset="<?= bloginfo('template_url') . '/images/page-typical/focus.webp' ?>" >
                    <img 
                        src="<?php bloginfo('template_url'); ?>/images/loader.gif"
                        width="636"
                        height="480"
                        class="guarantees__img"
                    >
                </picture>
            </div>

            <div class="focus__bottom">
                <div class="focus__title">
                    <?= get_field('focus_title') ? get_field('focus_title') : 'Key Focus Areas' ?>
                </div>
                <div class="focus__text">
                    <ul>
                        <?php foreach ( $focus as $key => $item ) : ?>
                            <?php $key++ ?>
                            <li><?= $item[ 'text' ] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</section>
