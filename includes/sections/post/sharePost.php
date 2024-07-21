<div class="share">

  <ul class="share__list">
    <?php 
        if (has_nav_menu('share_menu')) :
            $nav_args = array(
                'theme_location' => 'share_menu',
                'container' => '',
                'items_wrap' => '%3$s',
            );
            wp_nav_menu($nav_args);
        endif; 
    ?>
  </ul>
  <!-- < ?= do_shortcode("[social_share]") ?> -->

</div>