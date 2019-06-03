<?php

$sort = isset($_GET['sortby']) ? $_GET['sortby'] : 'county';
$order = isset($_GET['order']) ? $_GET['order'] : 'asc';

$search = '?search=advanced';
$search .= isset($_GET['county']) ? '&county='.$_GET['county'] : '';
$search .= isset($_GET['s']) ? '&s='.$_GET['s'] : '';
$search .= isset($_GET['lift']) ? '&lift='.$_GET['lift'] : '';
$search .= isset($_GET['price']) ? '&price='.$_GET['price'] : '';
$search .= isset($_GET['mileage']) ? '&mileage='.$_GET['mileage'] : '';

echo '<article class="surplus_headers">';
echo '<a class="pad" href="' . $search . '&sortby=county&order='
  . (($order === 'asc' && $sort === 'county') ? 'desc' : 'asc' )
  .'">County ';
  if ($sort === 'county') {
    echo $order === 'asc' ? '<i class="fas fa-sort-alpha-down fa-lg"></i>' : '<i class="fas fa-sort-alpha-up fa-lg"></i>';
  }
  echo '</a>';
echo '<a class="pad" href="' . $search . '&sortby=vehicle_bus_number&order='
  . (($order === 'asc' && $sort === 'vehicle_bus_number') ? 'desc' : 'asc' )
  .'">Bus ';
  if ($sort === 'vehicle_bus_number') {
    echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
  }
  echo '</a>';
echo '<a class="pad" href="' . $search . '&sortby=vehicle_year&order='
  . (($order === 'asc' && $sort === 'vehicle_year') ? 'desc' : 'asc' )
  .'">Year ';
  if ($sort === 'vehicle_year') {
    echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
  }
  echo '</a>';
echo '<a class="pad desktop-only" href="' . $search . '&sortby=vehicle_make&order='
  . (($order === 'asc' && $sort === 'vehicle_make') ? 'desc' : 'asc' )
  .'">Make ';
  if ($sort === 'vehicle_make') {
    echo $order === 'asc' ? '<i class="fas fa-sort-alpha-down fa-lg"></i>' : '<i class="fas fa-sort-alpha-up fa-lg"></i>';
  }
  echo '</a>';
echo '<a class="mobile-hide center" href="' . $search . '&sortby=vehicle_lift&order='
  . (($order === 'asc' && $sort === 'vehicle_lift') ? 'desc' : 'asc' )
  .'">Lift ';
  if ($sort === 'vehicle_lift') {
    echo $order === 'asc' ? '<i class="fas fa-long-arrow-alt-down fa-lg"></i>' : '<i class="fas fa-long-arrow-alt-up fa-lg"></i>';
  }
  echo '</a>';
echo '<a class="mobile-hide center" href="' . $search . '&sortby=vehicle_state_size&order='
  . (($order === 'asc' && $sort === 'vehicle_state_size') ? 'desc' : 'asc' )
  .'">Size ';
  if ($sort === 'vehicle_state_size') {
    echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
  }
  echo '</a>';
echo '<a class="desktop-only right" href="' . $search . '&sortby=vehicle_state_mileage&order='
  . (($order === 'asc' && $sort === 'vehicle_state_mileage') ? 'desc' : 'asc' )
  .'">Mileage ';
  if ($sort === 'vehicle_state_mileage') {
    echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
  }
  echo '</a>';
echo '<a class="right" href="' . $search . '&sortby=price&order='
  . (($order === 'asc' && $sort === 'price') ? 'desc' : 'asc' )
  .'">Price ';
  if ($sort === 'price') {
    echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
  }
  echo '</a>';
echo '</article>';

?>
