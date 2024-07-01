
<?php 
  $author_id = 'user_' . get_the_author_ID();
  $authorPersonalInfo = get_field( 'personal_info', $author_id );
  $authorPersonalInfoPost = get_field( 'about_in_post', $author_id );
  $isDivider = $authorPersonalInfo[ 'in_our_team_with' ] || $authorPersonalInfo[ 'completed_orders' ] || $authorPersonalInfo[ 'reviews_count' ] || $authorPersonalInfo[ 'language' ];
?>




<div class="author">

  <div class="author__top">

    <div class="author__photo">
      <img 
        src="<?= bloginfo('template_url') . '/images/loader.gif' ?>"
        data-src="<?= $authorPersonalInfo[ 'avatar' ] ?>"
        class="lazy"
        width="1px"
        height="1px"
      >
    </div>

    <div class="author__info">
      <div class="author__writen">Written by:</div>
      <div class="author__title"><?= get_author_name(); ?></div>
      <div class="author__spec"><?= $authorPersonalInfo['expert_text'] ?></div>
      <?php if ($authorPersonalInfoPost['university']) : ?>
        <div class="author__university"><?= $authorPersonalInfoPost['university'] ?></div>
      <?php endif ;?>
      <div class="author__articles"><?= $authorPersonalInfoPost['written_articles'] ?><span>+ written articles</span></div>
    </div>

  </div>

  <div class="author__description">
  <?= $authorPersonalInfoPost['about_writer'] ?>
  </div>
  
</div>

