<?php 
while (have_posts()) : the_post(); ?>

<div class="blog__item" id="post-<?php the_ID(); ?>">

    <a href="<?php the_permalink(); ?>" class="item__img" style="background-image: url(<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : bloginfo('template_url') . '/images/features/blog.jpg' ?>)"></a>

    <h2 class="item__title">
        <a href="<?php the_permalink() ?>"><?= wp_trim_words( get_the_title(), 20); ?></a>
    </h2>

    <div class="item__date"><?php get_the_date('F d, Y') ; ?></div>

    <div class="item--bottom">
        <div class="item__tags">
            <?php
                $postcat = get_the_terms($post->ID, 'blog');
                foreach ($postcat as $cat) {
                    if ($cat->parent != 0) {
                        echo "<a href='" . get_category_link($cat->term_id) . "' class='tag__item' >" . $cat->name . "</a>";
                    }
                }
            ?>
        </div>
    </div>
</div>

<?php endwhile;

$total_pages = $wp_query->max_num_pages;

if ($total_pages > 1) {

$current_page = max(1, get_query_var('paged'));

?>
<div class="pagination">
    <?php
    echo paginate_links(array(
        'base' => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) ),
        'format' => 'page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'show_all'     => False,
        'end_size'     => 1,
        'mid_size'     => 2,
        'prev_text' => __('Prev'),
        'next_text' => __('Next'),
    ));
    ?>
</div>
<?php
}

wp_reset_postdata(); ?>