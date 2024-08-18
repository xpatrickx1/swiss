<section class="content">
    <div class="container">
        <?php if (have_posts() ) : ?>
            <div class="content__wrap">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>