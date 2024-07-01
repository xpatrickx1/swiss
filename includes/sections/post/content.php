<section class="content">
    <div class="container">
        <div class="content__wrap">

            <div class="content--left">
                <a href="#" class="button--arrow">Scroll Up</a>
                <?php get_template_part('includes/sections/post/sharePost')?>
            </div>

            <div class="content--right">
                <?php get_template_part('includes/sections/post/table-content')?>
                <a href="#" class="button--arrow">Scroll Up</a>
            </div>

            <div class="content--center">
                <?php
                    if (have_posts() ) {
                        while (have_posts()) : the_post();
                            echo '<div class="content__main">';
                            the_content();
                            echo '</div>';
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

