<?php

  $highlights = [
    [
      'title' => 'Sports Management Courses',
      'text' => 'Significant time is dedicated to courses in sports management, industry marketing, recreational economics, and the basics of tourism.',
    ],
    [
      'title' => 'Healthy Lifestyle Industry',
      'text' => 'The rapidly developing healthy lifestyle industry worldwide requires high-class specialists capable of managing fitness divisions, individual and family wellness programs, and preparing wellness retreat programs.',
    ],
  ];

?>
<?php
    if (have_rows('highlights_list')):
        while ( have_rows('highlights_list')) : the_row();
            $highlights[$highlightsCounter]['text'] = get_sub_field('highlights_text');
            $highlightsCounter++;
        endwhile;
    endif;
?>

<section class="highlights">
    <div class="container">
        <div class="highlights__wrap">

            <div class="highlights__title">
                <?= get_field('highlights_title') ? get_field('highlights_title') : 'Curriculum Highlights' ?>
            </div>

            <div class="highlights__list highlights__list--mob highlights__slider">
                <?php foreach ( $highlights as $key => $item ) : ?>
                            <div class="highlights__item item">
                                <div class="item-title"><?= $item[ 'title' ] ?></div>
                                <div class="item__text section-subtitle"><?= $item[ 'text' ] ?></div>
                            </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>