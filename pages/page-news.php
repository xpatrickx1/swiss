
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

        <div class="news__title">
            <img src="<?= bloginfo('template_url') . '/images/news/news.svg' ?>"
                alt="news"
                width="434"
                height="226"
            >
        </div>

        <div class="news__accordion">
            <?php if (have_posts() ) :
                while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="news__item item">

                        <div class="item__title-wrap">
                            <div class="item__title"><h2><?php the_title(); ?></h2></div>
                            <span class="item__close"></span>
                        </div>
                                        
                        <div class="item__description" >
                            <div class="item__img" 
                            data-src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : bloginfo('template_url') . '/images/blog.jpg' ?>"
                                style="background-image: url(<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : bloginfo('template_url') . '/images/blog.jpg' ?>)">
                            </div>
                            <div class="item__text">
                                <?= get_the_content() ?>
                            </div>
                        </div>

                    </article>
                <?php endwhile;
            endif; ?>
        </div>
        <div id="imgContainer"></div>
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

