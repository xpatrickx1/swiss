<section class="content">
    <div class="container">

        <div class="content__wrap">
        <?php
                        if (have_posts() ) :
                            while (have_posts()) : the_post();
                            the_content();
                            endwhile; 
                        endif; 
                    ?>
        </div>

    </div>
</section>