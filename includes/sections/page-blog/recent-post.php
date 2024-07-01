<?php
function rand_posts()
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
    );

    $cat_args=array(
      'orderby' => 'name',
      'order' => 'ASC'
       );


    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {

        while ($the_query->have_posts()) {
            $the_query->the_post();
            $postID = get_the_id();
            $category_detail = get_the_category(); 
            // print_r(get_the_category();)
            // $categoryes = foreach($category_detail as $cd){
            //     echo $cd->cat_name;
            // }
            $categories = get_categories($cat_args);
// $categoriess = foreach($categories as $category) {
//    echo '<div>' . $category->name . '</div>';
// };

            $postThumbnail = get_the_post_thumbnail($postID, array(), array("class" => "item__img"));
            $postThumbnailPlaceholder = '<img src="' . get_bloginfo('template_url') . '/images/loader.gif' . '" data-src="' . get_bloginfo('template_url') . '/images/features/blog.jpg' . '"  class="lazy post__img">';
            $postThumb = $postThumbnail ? $postThumbnail : $postThumbnailPlaceholder ;
            $string .= '
    <div class="post__thumbnail">' . $postThumb . '</div>
    <div class="post__info">
      <div class="post__category">' . $categories . '</div> 
      <a href="' . get_permalink() . '" class="post__title">' . get_the_title() . '</a>

      <div class="post--bottom">

        <div class="post__date">' . get_the_date('F d, Y') . '</div>

      </div>
    </div>';
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        $string .= 'no posts found';
    }
    return $string;
}
?>

  
 

<?php
$cat_args=array(
  'orderby' => 'name',
  'order' => 'ASC'
   );

$categories=get_categories($cat_args);
  foreach($categories as $category) {
    $args=array(
      'post_type' => 'post',
      'posts_per_page' => 1,
      'category__in' => array($category->term_id),
      'caller_get_posts'=>1,
      'post_type' => 'post',
        'posts_per_page' => 1,
    );
    $posts=get_posts($args);
      if ($posts) {
        echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
    
      } 
    }
?>

<?php echo do_shortcode("[random-posts]"); ?>
 

<?php 
while (have_posts()) : the_post(); ?>

<div class="subject__item" id="post-<?php the_ID(); ?>">

    <?php if( get_field('featurezd_sample') ) {
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
                $postcat = get_the_terms($post->ID, 'blog');
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