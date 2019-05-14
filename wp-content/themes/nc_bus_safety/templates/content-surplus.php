<?php
  if (class_exists('acf')) {
    $bus = get_field('vehicle');
    $price = get_field('price');
    $status = get_field('status');
    $county = get_the_title($bus['county']);

    echo '<a class="surplus_listing" href="' . get_the_permalink() . '">';
    if ($county) {
      echo '<div>' . $county . '</div>';
    }
      echo '<div>' . get_the_title() . '</div>';
    if ($bus['year']) {
      echo '<div>' . $bus['year'] . '</div>';
    }
    if ($bus['make']) {
      echo '<div class="desktop-only">' . $bus['make'] . '</div>';
    }
      echo '<div class="mobile-hide">';
        echo $bus['lift'] ?
          '<i aria-hidden="true" class="primary fas fa-check-circle"></i><span class="sr-only">Yes</span>' :
          '<i aria-hidden="true" class="primary far fa-times-circle"></i><span class="sr-only">No</span>';
      echo '</div>';
    if ($bus['state']['size']) {
      echo '<div class="mobile-hide">' . $bus['state']['size'] . '</div>';
    }
    if ($bus['state']['mileage']) {
      echo '<div class="desktop-only">' . $bus['state']['mileage'] . '</div>';
    }
    if ($price) {
      echo '<div>$' . $price . '</div>';
    }
    echo '</a>';
  } else {
    echo '<article>
    <header>
    <h3 class="entry-title"><a href="' . get_the_permalink(). '">' . get_the_title() . '</a></h3>
    </header>
    </article>';
  }

 ?>
