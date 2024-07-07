<div class="author">

    <div class="author__photo">
      <img 
        src="<?= bloginfo('template_url') . '/images/loader.gif' ?>"
        data-src="<?= get_field('post_author_photo')['url'] ?>"
        class="lazy"
        width="1px"
        height="1px"
      >
    </div>

    <div class="author__info">
      <div class="author__writen">Written by:</div>
      <div class="author__title"><?= get_field('post_author_name') ?></div>
      <div class="author__position"><?= get_field('post_author_position') ?></div>
    </div>

</div>

