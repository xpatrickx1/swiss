<section class="team">
    <div class="container">
        <div class="team__wrap">

            <div class="team__title">
                <img src="<?= bloginfo('template_url') . '/images/about/team.svg' ?>"
                    alt="about"
                    width="785"
                    height="226"
                >
            </div>
            
            <div class="team__list">
                <?php if (have_rows('team_list')) :
                    while ( have_rows('team_list')) : the_row(); ?>

                        <div class="team__item item">
                            <div class="item__icon" 
                                style="background-image: url(<?= get_sub_field('persone_photo')['url'];?>)">
                            </div>

                            <div class="item__bottom">

                                <div class="item__firstname">
                                    <?= get_sub_field('persone_firstname') ?>
                                </div>

                                <div class="item__lastname">
                                    <?= get_sub_field('persone_lastname') ?>
                                </div>

                                <div class="item__position"><?= get_sub_field('persone_position') ?></div>
                                
                            </div>

                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>