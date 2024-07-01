<?php 
while (have_posts()) : the_post(); ?>

<div class="subject__item" id="post-<?php the_ID(); ?>">

    <?php if( get_field('featured_sample') ) {
        echo '<span class="item__trending">Trending</span>';
    } ?>

    <h2 class="item__title">
        <a href="<?php the_permalink() ?>"><?= wp_trim_words( get_the_title(), 20); ?></a>
    </h2>

    <div class="item__info">
        <?php if (get_field('words')) : ?>
            <div class="info__item">Words &#183; <?php the_field('words') ?></div>
        <?php endif; ?>

        <?php if (get_field('pages')) : ?>
            <div class="info__item">Pages &#183; <?php the_field('pages') ?></div>
        <?php endif; ?>
        
        <?php if (get_field('rating')) : ?>
            <div class="info__item">Rating &#183; <?php the_field('rating') ?>/5</div>
        <?php endif; ?>

        <?php if (get_field('soundcloud_link')) : ?>
            <div class="info__item">
                Comes with Audio &#183; 
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.25 8.75h-1.167c-.644 0-1.166.522-1.166 1.167v1.166a1.167 1.167 0 1 0 2.333 0V8.75Zm0 0a5.25 5.25 0 1 0-10.5 0v2.333a1.167 1.167 0 1 0 2.333 0V9.917c0-.645-.522-1.167-1.166-1.167H1.75" stroke="#4A4E57" stroke-width="1.2" stroke-linecap="round"/></svg>
            </div>
        <?php endif; ?>
    </div>

    <div class="item__text">
        <?= examples_short_excerpt( get_the_excerpt() ) ?>
    </div>

    <div class="item--bottom">
        <div class="item__tags">
            <div class="tag__title">Topics:</div>
            <?php
                $postcat = get_the_terms($post->ID, 'sample-category');
                foreach ($postcat as $cat) {
                    if ($cat->parent != 0) {
                        echo "<a href='" . get_category_link($cat->term_id) . "' class='tag__item' >" . $cat->name . "</a>";
                    }
                }
            ?>
        </div>
        <a class="item__btn" href="<?php the_permalink(); ?>"><?php _e('View full sample'); ?></a>
    </div>
</div>

<?php if ($wp_query->current_post === 2) {
    get_template_part( 'includes/examples/sections/page-search/banner-topic' );
} ?>
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