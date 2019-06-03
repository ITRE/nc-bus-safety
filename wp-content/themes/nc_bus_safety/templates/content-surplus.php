<?php
  if (class_exists('acf')) {
    $bus = get_field('vehicle');
    $price = get_field('price');
    $status = get_field('status');
    $county = get_the_title($bus['county']);

    echo '<a class="surplus_listing" href="' . get_the_permalink() . '">';
      echo '<div>';
        echo $county ? $county : '';
      echo '</div>';

      echo '<div>' . get_the_title() . '</div>';

      echo '<div>';
        echo $bus['year'] ? $bus['year'] : 'N/A';
      echo '</div>';

      echo '<div class="desktop-only">';
        echo $bus['make'] ? $bus['make'] : 'N/A';
      echo '</div>';

      echo '<div class="mobile-hide center">';
        echo $bus['lift'] ?
          '<i aria-hidden="true" class="primary fas fa-check-circle"></i><span class="sr-only">Has Lift</span>' :
          '<i aria-hidden="true" class="primary far fa-times-circle"></i><span class="sr-only">Does Not Have Lift</span>';
      echo '</div>';

      echo '<div class="mobile-hide center">';
        echo $bus['state']['size'] ? $bus['state']['size'] : '0';
      echo '</div>';

      echo '<div class="desktop-only right">';
        echo $bus['state']['mileage'] ? number_format($bus['state']['mileage']) : '0';
      echo '</div>';

      echo '<div class="right">';
        echo $price ? '$'.number_format($price) : 'N/A';
      echo '</div>';
    echo '</a>';
  } else {
    echo '<article>
    <header>
    <h3 class="entry-title"><a href="' . get_the_permalink(). '">' . get_the_title() . '</a></h3>
    </header>
    </article>';
  }

 ?>
