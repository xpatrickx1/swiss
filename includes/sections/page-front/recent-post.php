<?php
function rand_posts()
{
    $args = array(
        'post_type' => 'post',
    );

    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $string .= '<div class="recent-post__slider">';

        while ($the_query->have_posts()) {
            $the_query->the_post();
            $postID = get_the_id();
            $postThumbnail = get_the_post_thumbnail($postID, array(), array("class" => "item__img"));
            $postThumbnailPlaceholder = '<img src="' . get_bloginfo('template_url') . '/images/loader.gif' . '" data-src="' . get_bloginfo('template_url') . '/images/features/blog.jpg' . '"  class="lazy item__img">';
            $postThumb = $postThumbnail ? $postThumbnail : $postThumbnailPlaceholder ;
            $string .= '
  <article id="post-' . $postID . '" class="recent-post__item item">
    <div class="recent-post__thumbnail">' . $postThumb . '</div>
    <div class="item__info">
     
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
    <?= get_field('recent_title') ? get_field('recent_title') : 'Our Blog' ?>
  </div>
  <?php echo do_shortcode("[random-posts]"); ?>
  <a href="<?= $item[ 'link' ] ?>" class="button--secondary">
    See More News
  </a>
</div>