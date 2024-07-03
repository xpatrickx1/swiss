<section class="content">
    <div class="container">
        <div class="content__wrap">

            <div class="content--left">
                <a href="#" class="button--arrow-up">Scroll Up</a>
                <?php get_template_part('includes/sections/post/sharePost')?>
            </div>

            <div class="content--center">
                <?php get_template_part('includes/sections/post/table-content')?>
                <a href="#" class="button--arrow-up">Scroll Up</a>

                <?php
                    if (have_posts() ) {
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    }
                ?>

                <?php 
                    if (get_the_author()) {
                        get_template_part('includes/sections/post/author');
                    };
                ?>
            </div>

        </div>
    </div>
</section>

