<?php include( 'courses-data.php' ) ?>

<?php
    if (have_rows('courses_list')):
        while ( have_rows('courses_list')) : the_row();
            $courses[get_row_index() - 1]['title'] = get_sub_field('item_title');
            $courses[get_row_index() - 1]['text'] = get_sub_field('item_text');
            $courses[get_row_index() - 1]['link'] = get_sub_field('item_link');
            $courses[get_row_index() - 1]['image'] = get_sub_field('courses_image')['url'];
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
<!-- <?php print_r( $courses) ;?> -->
<?php echo have_rows('courses_list') ;?>
                <div class="item__icon">
                    <?php if( have_rows('courses_list')) : ?>
                        <img src="<?= $item[ 'image' ] ?>" data-src="<?= $item[ 'image' ] ?>" class="" >
                    <?php else :?>
                        <img src="<?= bloginfo('template_url') . '/images/page-front/courses/courses' . $key . '.webp'  ?>" data-src="<?= bloginfo('template_url') . '/images/page-front/courses/courses' . $key . '.webp'  ?>" class="" >
                    <?php endif ; ?>
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