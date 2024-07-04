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
            $categories = get_categories();
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

<?php echo do_shortcode("[random-posts]"); ?>
 