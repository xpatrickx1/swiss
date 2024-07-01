<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no">
    <title><?php bloginfo('name') . ' | ' . wp_title(); ?></title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <style></style>
    <?php wp_head(); ?>
</head>

<?php include(locate_template('main-vars.php', true)); ?>

<body>
<div class="header">
    <div class="container">
        <div class="header__wrap">

            <a href="/" class="header__logo logo">
                <img src="<?= bloginfo('template_url') . '/images/icons/logo.svg' ?>"
                        alt="Back to homepage logo link"
                        width="140px"
                        height="60px"
                >
            </a>

            <ul class="header__navigation navigation">

                    <?php 
                        if (has_nav_menu('header_menu')) :
                            $nav_args = array(
                                'theme_location' => 'header_menu',
                                'container' => '',
                                'items_wrap' => '%3$s',
                            );
                            wp_nav_menu($nav_args);
                        endif; 
                    ?>

            </ul>
            
            
            <div class="header__buttons">
                <a href="#" class="button--main">Contact Us</a>
            </div>

            <div class="header__hamburger js-hamburger">
                <div class="hamburger-line1"></div>
                <div class="hamburger-line2"></div>
                <div class="hamburger-line3"></div>
            </div>
        </div>
    </div>
</div>

<main id="main" class="main">