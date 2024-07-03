<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$cat = get_queried_object_id();

$args = array(
    'post__not_in' => array(get_queried_object_id()),
    'post_type' => 'examples',
    'posts_per_page' => 8,
    'paged' => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => 'sample-category',
            'field' => 'term_id',
            'terms' => $cat,
        )
    ),
    'meta_query' => [
        'relation' => 'OR',
        ['key' => 'featured_sample', 'compare' => 'NOT EXISTS'], // this comes first!
        ['key' => 'featured_sample', 'compare' => 'EXISTS'],
    ],
    'order' => 'DESC ASC',
    'orderby' => 'meta_value_num date',
);

$loop = new WP_Query($args); 

$sidebarSearchParams = [
    'className' => 'subject-search',
    'placeholder' => 'Enter your topic, subject or keyword'
];
?>

<section class="subject">
    <div class="container">
        <div class="subject__wrap">

            <div class="subject--left">

                <div class="subject__tabs">
                    <?php if (is_subcategory()) { ?>
                        <div class="subject__tab active-slide" data-slide="1">All samples on this topic</div>
                        <?php if (!is_paged() && get_field('category_description', get_queried_object())): ?>
                            <div class="subject__tab" data-slide="2">General overview</div>
                        <?php endif; ?>
                    <?php } else { ?>
                        <div class="subject__tab active-slide" data-slide="1">All samples on this subject</div>
                        <div class="subject__tab" data-slide="2">All topics on this subject</div>
                        <?php if (!is_paged() && get_field('category_description', get_queried_object())): ?>
                            <div class="subject__tab" data-slide="3">General overview</div>
                        <?php endif; ?>
                    <?php }
                    ?>
                </div>

                <?php if (is_subcategory()) { ?>
                    <div class="subject__tab-item active-slide" data-slide="1">
                        <?php get_template_part( 'includes/examples/sections/subjects/subject-loop' ); ?>
                        <?php get_template_part( 'includes/examples/sections/subjects/banner' ); ?>
                    </div>
                    <?php if (!is_paged()): ?>
                        <div class="subject__tab-item" data-slide="2">
                            <?php get_template_part( 'includes/examples/sections/subjects/subject-description' ); ?>
                            <?php //get_template_part('page-examples/includes/category-faq'); ?>
                        </div>
                <?php endif; } else { ?>
                    <div class="subject__tab-item active-slide" data-slide="1">
                        <?php get_template_part( 'includes/examples/sections/subjects/subject-loop' ); ?>
                        <?php get_template_part( 'includes/examples/sections/subjects/banner' ); ?>
                    </div>
                    <div class="subject__tab-item" data-slide="2">
                        <?php
                        $args = array(
                            'parent' => get_queried_object()->term_id,
                            'taxonomy' => 'sample-category',
                            'title_li' => '',
                            'hide_empty' => false
                        ); ?>

                        <ul class="subject-topics">
                            <?php wp_list_categories($args); ?>
                        </ul>
                        <?php get_template_part( 'includes/examples/sections/subjects/banner' ); ?>
                    </div>
                    <?php if (!is_paged()): ?>
                        <div class="subject__tab-item" data-slide="3">
                            <?php get_template_part( 'includes/examples/sections/subjects/subject-description' ); ?>
                            <?php get_template_part( 'includes/examples/sections/subjects/banner' ); ?>
                        </div>
                <?php endif;}
                ?>

            </div>

            <div class="subject--right subject-sidebar">
                <div class="subject-sidebar--top">
                    <?php get_template_part_params( 'includes/examples/sections/search/sidebarSearch', $sidebarSearchParams ); ?>

                    <?php get_template_part( 'includes/examples/sections/subjects/subject-topics' ); ?>
                </div>

                <?php get_template_part_params( 'includes/examples/sections/subjects/banner-topic', 'sidebar' ); ?>
            </div>
        </div>
    </div>
</section>