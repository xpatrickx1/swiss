<?php $sidebarTitle = $data[ 'title' ]; ?>
<?php $sidebarClass = $data[ 'className' ]; ?>
<?php $inputPlaceholder = $data[ 'placeholder' ]; ?>

<div class="sidebar-search <?= isset( $sidebarClass ) ? $sidebarClass : '' ?> ">

  <div class="sidebar-search__title"><?= isset( $sidebarTitle ) ? $sidebarTitle : 'Search for more than 10k samples' ?></div>

  <?php get_template_part_params( 'includes/examples/sections/search/searchForm', [ 'placeholder' => $inputPlaceholder ] )?>

</div>