<?php

$order = isset($_GET['order']) ? $_GET['order'] : 'asc';
if (class_exists('acf')) {
  echo '<article class="contact_headers">';
    echo '<a href="?order='
      . (($order === 'asc') ? 'desc' : 'asc' )
      .'">County ';
      echo $order === 'asc' ? '<i class="fas fa-sort-alpha-down fa-lg"></i>' : '<i class="fas fa-sort-alpha-up fa-lg"></i>';
      echo '</a>';
    echo '<span>Name</span>';
    echo '<span class="mobile-hide">Phone</span>';
    echo '<span class="desktop-only">Fax</span>';
    echo '<span class="desktop-only">Street</span>';
  echo '</article>';
}

 ?>
