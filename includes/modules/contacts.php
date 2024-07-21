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
            </div>

            <ul class="contacts__list">
                <?php 
                    if (has_nav_menu('contacts_menu')) :
                        $nav_args = array(
                            'theme_location' => 'contacts_menu',
                            'container' => '',
                            'items_wrap' => '%3$s',
                        );
                        wp_nav_menu($nav_args);
                    endif; 
                ?>
            </ul>

            <ul class="contacts__social">
                <?php 
                    if (has_nav_menu('share_menu')) :
                        $nav_args = array(
                            'theme_location' => 'share_menu',
                            'container' => '',
                            'items_wrap' => '%3$s',
                        );
                        wp_nav_menu($nav_args);
                    endif; 
                ?>
            </ul>

            <a href="#" class="button--arrow-up">Scroll Up</a>
        </div>
            
    </div>
</section>