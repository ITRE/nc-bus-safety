<?php
  if (class_exists('acf')) {
    echo '<a class="contact_listing" href="' . get_the_permalink() . '">';
      $name = get_field('name');
      $street = get_field('street');
      $zip = get_field('zip');
      $phone = get_field('phone');
      $fax = get_field('fax');
      $county = get_the_title();

      if ($county) {
        echo '<div>' . $county . '</div>';
      }
      if ($name) {
        echo '<div>' . $name . '</div>';
      }
      if ($phone) {
        echo '<div class="mobile-hide">' . $phone . '</div>';
      }
      if ($fax) {
        echo '<div class="desktop-only">' . $fax . '</div>';
      }
      if ($street) {
        echo '<div class="desktop-only">' . $street . '</div>';
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
