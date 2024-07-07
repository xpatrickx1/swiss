<?php 
while (have_posts()) : the_post();

    $catArr = [];
    $postID = get_the_id();
    $categories = get_the_category();
    $subcats = get_categories('child_of=' . $catID);
    $catID = $categories[0]->cat_ID;
    $postThumbnail = get_the_post_thumbnail($postID, array(), array("class" => "item__img"));
    $postThumbnailPlaceholder = '<img src="' . get_bloginfo('template_url') . '/images/loader.gif' . '" data-src="' . get_bloginfo('template_url') . '/images/features/blog.jpg' . '"  class="lazy item__img">';
    $postThumb = $postThumbnail ? $postThumbnail : $postThumbnailPlaceholder ;
    foreach($subcats as $subcat) {
        $subcat_posts = get_posts('cat=' . $subcat->cat_ID);
        foreach($subcat_posts as $subcat_post) {
            $postIDS = $subcat_post->ID;
            if ($subcat_post->ID == $postID) {
                array_push($catArr, $subcat->cat_name);
                break;
            }
        }
    }

    $string .= '
    <div class="blog__item" id="post-' .$postID . '">

        <div class="recent-post__thumbnail">' . $postThumb . '</div>

        <div class="item__cat"><span>' . implode("</span><span>",$catArr) . '<span></div>

        <h2 class="item__title">
            <a href="' . get_permalink() . '" class="item__title">' . get_the_title() . '</a>
        </h2>

        <div class="item__date">' . get_the_date('F d, Y') . '</div>
    </div>';

  echo $string;
?>

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