<?php
namespace ITRE\BusSafety;

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

function change_side_nav_ul_class( $args ) {
  if( 'header-nav' != $args['theme_location'] && 'footer-nav' != $args['theme_location']) {
    $args['menu_class'] = 'usa-sidenav';
    //$args['before'] = 'usa-sidenav__item';
  }
  return $args;
}
add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\\change_side_nav_ul_class' );

function change_side_nav_li_class( $classes, $item, $args, $depth ) {
  if ( 'usa-sidenav' === $args->menu_class ) {
    $newClasses = ['usa-sidenav__item'];
  } else if ($depth > 0) {
    $newClasses = ['usa-nav__submenu-item'];
  } else {
    $newClasses = ['usa-nav__primary-item'];
  }
  if (in_array('current-menu-item', $classes)) {
    $newClasses[] = 'usa-current';
  }
    return $newClasses;
}

add_filter( 'nav_menu_css_class', __NAMESPACE__ . '\\change_side_nav_li_class', 10, 4 );

function change_submenu_class($menu) {
  $menu = preg_replace('/ class="sub-menu"/','/ class="usa-nav__submenu" /',$menu);
  return $menu;
}
add_filter('wp_nav_menu',__NAMESPACE__ . '\\change_submenu_class');

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

/*
*   Styles
*/
function register_my_css() {
  wp_enqueue_style('bus-safety', get_stylesheet_directory_uri() . '/style.css', false, null);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\register_my_css', 100);

?>
