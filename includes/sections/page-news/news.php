<?php

function my_search_filter( $query ) {
    if ( $query->is_category('news') ) {
        $query->set( 'posts_per_page', 8 );
    }

    return $query;
}

add_filter( 'pre_get_posts', 'my_search_filter' );?>

<section class="news">
    <div class="container">
        <?php if (have_posts() ) :
            while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" class="news__item item">

                    <div class="item__title"><h2><?php the_title(); ?></h2></div>

                </article>
            <?php endwhile;
        endif; ?>


        <?php
        the_posts_pagination( array(
            'show_all' => false,
            'end_size' => 3,
            'mid_size' => 3,
            'prev_next' => true,
            'prev_text' => __('Prev'),
            'next_text' => __('Next')
        ) );
        ?>

    </div>
</section>

