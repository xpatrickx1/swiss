<?php include( 'courses-data.php' ) ?>

<?php
    if (have_rows('courses_list')):
        while ( have_rows('courses_list')) : the_row();
            $courses[$coursesCounter]['title'] = get_sub_field('courses_title');
            $courses[$coursesCounter]['text'] = get_sub_field('courses_text');
            $courses[$coursesCounter]['link'] = get_sub_field('courses_link');
            $coursesCounter++;
        endwhile;
    endif;
?>

<section class="courses">

    <div class="courses__title">
        <?= get_field('courses_title') ? get_field('courses_title') : 'Etudes Modernes courses available for registration right now:' ?>
    </div>

    <div class="courses__list courses__slider">
        <?php foreach ( $courses as $key => $item ) : ?>
            <?php $key++ ?>
            <div class="courses__item item">

                <div class="item__icon">
                    <img src="<?= bloginfo('template_url') . '/images/page-front/courses/courses' . $key . '.png'  ?>" data-src="<?= bloginfo('template_url') . '/images/page-front/courses/courses' . $key . '.png'  ?>" class="" >
                </div>

                <div class="item__bottom">
                    <div class="item__title">
                        <?= $item[ 'title' ] ?>
                    </div>
                    <div class="item__text">
                        <?= $item[ 'text' ] ?>
                    </div>
                    <a href="<?= $item[ 'link' ] ?>" class="button--secondary">
                        Course Overview
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</section>