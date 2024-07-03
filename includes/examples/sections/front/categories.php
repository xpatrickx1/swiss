<?php
$subCatList = [
  '30' => [ 55, 68, 122, 154, 121, 32, 54, 44, 56, 33 ],
  '25' => [ 93, 135, 51, 105, 58, 124, 26, 48, 31, 117 ],
  '27' => [ 84, 160, 46, 108, 65, 116, 143, 107, 150, 75 ]
];
?>

<div class="categories">
  <div class="container">

    <h2>Nursing essay examples: popular subjects & topics</h2>

    <div class="categories__subtitle text--center">Check out the most common topics for a nursing essay in your subject.</div>

    <div class="categories__list">
      
      <?php
        $args = array(
          'taxonomy' => 'sample-category',
          'parent' => 0,
          'include' => [30, 25, 27],    // [30, 25, 27] - prod;   [47, 37] - local
          'orderby' => 'include',
          'order' => 'ASC',
          'hierarchical' => 1,
          'hide_empty' => 0,
          'pad_counts' => 0,
          'number' => 3
        );
        
        $categories = get_categories($args);
        
        foreach ($categories as $category) {
          
          echo "<div id='bg-image' class='categories__item item lazy'>";
            
            echo '<a href=" ' . esc_url(get_term_link($category)) . '" class="item__title" >' . $category->name . '</a>';
                
            $sub_args = array(
                'taxonomy' => 'sample-category',
                'parent' => $category->term_id,
                'include' => $subCatList[ $category->term_id ],
                'orderby' => 'name',
                'order' => 'ASC',
                'hierarchical' => 1,
                'hide_empty' => 0,
                'pad_counts' => 0,
                'number' => 10
            );
            $sub_categories = get_categories($sub_args);
            echo "<div class='item__list'>";
                
              foreach ($sub_categories as $sub_category) {
                echo '<a href=" ' . esc_url(get_term_link($sub_category)) . '" class="item__link" >' . $sub_category->name . '</a>';
              }
            echo "</div>";
          echo "</div>";
        }
      ?>
    </div>

    <a class="categories__more button--calculate" href="/subjects/">Show more categories</a>

  </div>
</div>