<?php get_header(); ?>
<?php print_r(is_tax( array('blog', 'blog') )); ?>
<?php print_r(is_singular('blog')); ?>
<?php get_template_part('includes/sections/page-blog/top-screen')?>
<?php get_template_part('pages/page-examples')?>
<!-- // //// /"'< ? php get_template_part('includes/sections/page-blog/blog-list')?>'" -->
<?php get_template_part('includes/modules/form')?>
<?php get_template_part('includes/modules/contacts')?>

<?php get_footer(); ?>