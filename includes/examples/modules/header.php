<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="theme-color" content="#EAF7F7">
    <meta name="facebook-domain-verification" content="ywuscnhi7nrryqb3woavm991bcs15g" />
    <meta name='dmca-site-verification' content='MlJUdGZ1SkdGZDJZbXlNUVJ3RDBKalM0QkNmUVQ1SXVIc3JUQ0VabVpRbz01' />
    <?php get_template_part('functions/mt-md'); ?>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>

    <?php wp_head(); ?>

</head>

<body <?php post_class() ?>>

<header class="header">
  <div class="container">

    <div class="header__wrap">

      <a href="/examples/" <?= is_post_type_archive( 'examples' ) ? 'rel="nofollow"' : '' ?> class="header__logo" aria-label="Header logo">
        <picture class="lazy">
          <source data-srcset="<?php bloginfo('template_url'); ?>/images/examples/icons/header-logo--mob.svg" media="(max-width: 767px)">
          <source data-srcset="<?php bloginfo('template_url'); ?>/images/examples/icons/header-logo.svg">
          <img 
            src="<?php bloginfo('template_url'); ?>/images/loader.gif"
            width="36"
            height="38"
          >
        </picture>
      </a>

      <?php get_template_part('includes/examples/sections/search/headerSearch') ?>

      <nav class="header-menu">
        <ul>
          <?php if (has_nav_menu('header-samples')) :
            $nav_args = array(
                'theme_location' => 'header-samples',
                'container' => '',
                'items_wrap' => '%3$s',
            );
            wp_nav_menu($nav_args);
          endif; ?>
        </ul>
        <?php get_template_part('includes/modules/login')?>
      </nav>

      <div class="header__buttons button">
        <a href="/order/" rel="nofollow" id="headerOrder" class="button__order">Order writing help</a>
      </div>

      <div class="header__hamburger js-hamburger">
        <div class="hamburger-line1"></div>
        <div class="hamburger-line2"></div>
        <div class="hamburger-line3"></div>
      </div>

    </div>

  </div>
</header>

<main id="main" class="main">