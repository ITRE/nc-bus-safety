<?php

namespace Bus\Menus;

/*
*   Menus
*/
function register_my_menus() {
  register_nav_menus([
    'header-nav' => 'Header Navigation',
    'footer-nav'  => 'Footer Navigation',
  ]);
}
add_action( 'init', __NAMESPACE__ . '\\register_my_menus' );


/*
*   Sidebars
*/
function register_my_widgets() {
  register_sidebar( array(
    'name' => 'Fleets Sidebar',
    'id' => 'fleet_sidebar',
    'description'   => 'Default Sidebar for Fleet Management Pages',
    'before_widget' => '<article class="sidebar_widget">',
    'after_widget' => '</article>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\register_my_widgets' );

?>
