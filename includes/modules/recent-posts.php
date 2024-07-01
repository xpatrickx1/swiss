<div class="post__recent">
    <?php
    $args = array(
        'numberposts' => 3,
        'post_status' => 'publish',
        'exclude' => $post->ID,
    );

    $result = wp_get_recent_posts($args);

    foreach ($result as $p) :
        ?>

        <article id="post-<?php echo $p['ID'] ?>" class="article-preview">
            <a href="<?php echo get_permalink($p['ID']) ?>" class="article-preview__thumbnail-wrp">
                <?php
                    $postThumbnail = get_the_post_thumbnail($p['ID'], array(), array("class" => "article-preview__thumbnail"));
                    $postThumbnailPlaceholder = '<img src="' . get_bloginfo('template_url') . '/images/blog-thumbnail.png' . '" alt="" class="article-preview__thumbnail">';
                    echo $postThumbnail ? $postThumbnail : $postThumbnailPlaceholder ;
                 ?>
            </a>
            <div class="article-preview__text">
                <h2 class="article-preview__title"><a href="<?php echo get_permalink($p['ID']) ?>"><?php echo $p['post_title']; ?></a></h2>
                <?php echo the_recent_post_excerpt($p); ?>

                <div class="article-preview__date">
                    <?php echo  date('j F Y ', strtotime($p['post_date'])); ?>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</div>