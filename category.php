<?php get_header(); ?>
<?php get_template_part('includes/sections/page-blog/top-screen')?>
<?php get_template_part('includes/sections/page-blog/searchWrap') ?>
<?php echo do_shortcode('[caf_filter id="67"]'); ?>
<!-- <?php get_template_part('includes/sections/page-blog/blog-list')?> -->
<?php get_template_part('includes/modules/form')?>
<?php get_template_part('includes/modules/contacts')?>

<?php get_footer(); ?>