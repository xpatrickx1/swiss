<?php
function rand_posts()
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
    );

    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
      $string .= '<div class="recent-post__slider">';

        while ($the_query->have_posts()) {
            $the_query->the_post();
            $postID = get_the_id();
            $categories = get_the_category();
            $catID = $categories[0]->cat_ID;
            $postThumbnail = get_the_post_thumbnail($postID, array(), array("class" => "item__img"));
            $postThumbnailPlaceholder = '<img src="' . get_bloginfo('template_url') . '/images/loader.gif' . '" data-src="' . get_bloginfo('template_url') . '/images/features/blog.jpg' . '"  class="lazy item__img">';
            $postThumb = $postThumbnail ? $postThumbnail : $postThumbnailPlaceholder ;
            $subcats = get_categories('child_of=' . $catID);
            $catArr = [];
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
  <article id="post-' . $postID . '" class="recent-post__item item">
    <div class="recent-post__thumbnail">' . $postThumb . '</div>
    <div class="item__info">
      <div class="item__cat">
        <span>' . implode("</span><span>",$catArr) . '</span>
      </div>
        <a href="' . get_permalink() . '" class="item__title">' . get_the_title() . '</a>

          <div class="item--bottom">

            <div class="item__date">' . get_the_date('F d, Y') . '</div>

          </div>
        </div>    
  </article>';
        }
        $string .= '</div>';
        /* Restore original Post Data */
        
        wp_reset_postdata();
    } else {
        $string .= 'no posts found';
    }
    return $string;
}
?>

<div class="recent-post">
  <div class="recent-post__title">
    <?= get_field('recent_post_title') ? get_field('recent_post_title') : 'View more news' ?>
  </div>
  <?php echo do_shortcode("[random-posts]"); ?>
  <a href="/blog/" class="button--secondary">
    See More News
  </a>
</div>