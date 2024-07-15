<?php

  $contacts = [
    [
      'title' => 'Facebook',
      'link' => '#',
    ],
    [
      'title' => 'LinkedIn',
      'link' => '#',
    ],
    [
      'title' => 'Instagram',
      'link' => '#',
    ],
    [
      'title' => 'Telegram',
      'link' => '#',
    ],
  ];

?>

<?php
    if (have_rows('contacts_social')):
        while ( have_rows('contacts_social')) : the_row();
            $contacts[get_row_index() - 1]['title'] = get_sub_field('item_title');
            $contacts[get_row_index() - 1]['link'] = get_sub_field('item_link');
        endwhile;
    endif;
?>

<section class="contacts">
    <div class="container">
        <div class="contacts__wrap">

            <div class="contacts__top">
                <img src="<?= bloginfo('template_url') . '/images/loader.gif' ?>"
                    data-src="<?= bloginfo('template_url') . '/images/icons/swiss.svg' ?>"
                    class="lazy"
                    alt="swiss"
                    width="48px"
                    height="48px" >   

                <a href="<?= 'mailto:office@' . get_site_url();?>" class="contacts__email">
                    <span><?= 'office@' . get_site_url();?></span>
                </a>
            </div>
            
            <div class="contacts__phone">
                <?= get_field('contacts_phone') ? get_field('contacts_phone') : '+41 21 50 50 111' ?>
            </div>

            <div class="contacts__address">
                <?= get_field('contacts_address') ? get_field('contacts_address') : 'Etudes Modernes SA, Avenue d’Ouchy 4, 1006 Lausanne, Switzerland' ?>
            </div>

            <div class="contacts__social">
                <?php foreach ( $contacts as $key => $item ) : ?>
                    <?php $key++ ?>
                    <a href="<?= $item[ 'link' ] ?>" class="">
                        <?= $item[ 'title' ] ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <a href="#" class="button--arrow-up">Scroll Up</a>
        </div>
            
    </div>
</section>