<!-- <?php $inputPlaceholder = $data[ 'placeholder' ]; ?> -->

<div class="search search__wrap">
  <form role="search" action="<?= site_url('/blog'); ?>" method="get" id="searchform">
    <input type="text" name="s" placeholder="<?= isset( $inputPlaceholder ) ? $inputPlaceholder : 'Search blog here' ?>" class="search-field" autocomplete="off"/>
    <input type="hidden" name="post_type" value="blog" />
    <button type="submit" class="btn-submit" alt="Search" value="Search" >Search</button>
  </form>
</div>