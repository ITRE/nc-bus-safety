<?php

  if (class_exists('acf')) {
    $bus = get_field('vehicle');
    $price = get_field('price');
    $status = get_field('status');

    echo '<a href="' . get_the_permalink() . '"><article class="surplus">';
    if ($bus['bus_number']) {
      echo '<div>' . $bus['bus_number'] . '</div>';
    }
    if ($bus['year']) {
      echo '<div>' . $bus['year'] . '</div>';
    }
    if ($bus['make']) {
      echo '<div>' . $bus['make'] . '</div>';
    }
    if ($bus['state']['size']) {
      echo '<div>' . $bus['state']['size'] . '</div>';
    }
    if ($bus['state']['mileage']) {
      echo '<div>' . $bus['state']['mileage'] . '</div>';
    }
    echo '</article></a>';
  } else {
    echo '<article>
    <header>
    <h3 class="entry-title"><a href="' . get_the_permalink(). '">' . get_the_title() . '</a></h3>
    </header>
    </article>';
  }

 ?>
