<?php include( 'program-data.php' ) ?>

<?php
    if (have_rows('program_list')):
        while ( have_rows('program_list')) : the_row();
            $program[$programCounter]['text'] = get_sub_field('program_text');
            $programCounter++;
        endwhile;
    endif;
?>

<section class="program">
    <div class="container">
        <div class="program__wrap">

            <div class="program__title">
                <?= get_field('program_title') ? get_field('program_title') : 'The educational program today includes the following areas:' ?>
            </div>

            <div class="program__list program__list--mob program__slider">
                <?php foreach ( $program as $key => $item ) : ?>
                            <div class="program__item item">
                                <?= $item[ 'text' ] ?>
                            </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>