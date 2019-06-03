<?php
/**
 * Category Block Template.
 *
 */

 // Create id attribute allowing for custom "anchor" value.
 $id = 'ncbus_category-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'ncbus_category';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= ' align' . $block['align'];
 }
 ?>
<section>
<?php
if ( have_rows('category_blocks') ) {
  // loop through the rows of data
  echo '<section id="' . esc_attr($id) . '" class="flexible">';
  while ( have_rows('category_blocks') ) : the_row();
    // Load values and assing defaults.
    $title = get_sub_field('title') ?: 'Category Name';
    $description = get_sub_field('description');
    $category = get_sub_field('category');
    $links = get_sub_field('links', false, false) ?: array();

    echo '<div class="' . esc_attr($className) . '">';
      echo '<a href="' . $category . '">';
        echo '<header>';
          echo '<h2>' . $title . '</h2>';
        echo '</header>';
      echo '</a>';
      echo '<section>';
        if ($description) {
          echo '<p>' . $description . '</p>'
        }
        echo '<ul class="category_links">';
          foreach( $links as $link ) {
            echo '<li><a href="' . get_the_permalink($link) . '">' . get_the_title($link) . '</a></li>';
          }
        echo '</ul>';
      echo '</section>';
    echo '</div>';
  endwhile;
  echo '</section>';
}


 ?>


 </section>
