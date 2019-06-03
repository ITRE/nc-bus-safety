<?php

namespace Bus\Menus;

/*
*   Menus
*/
function register_my_menus() {
  register_nav_menus([
    'header-nav-fleet'  => 'Fleet Header Navigation',
    'header-nav-edu'    => 'Educator Header Navigation',
    'header-nav-route'  => 'Routing Header Navigation',
    'footer-nav'        => 'Footer Navigation',
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
  register_sidebar( array(
    'name' => 'Educator Sidebar',
    'id' => 'edu_sidebar',
    'description'   => 'Default Sidebar for Student/Parent/Educator Pages',
    'before_widget' => '<article class="sidebar_widget">',
    'after_widget' => '</article>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'Routing Sidebar',
    'id' => 'route_sidebar',
    'description'   => 'Default Sidebar for Transportation Routing Pages',
    'before_widget' => '<article class="sidebar_widget">',
    'after_widget' => '</article>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\register_my_widgets' );


/*
*   Current Page Style Class
*/
function current_page_menu_class( $classes = array(), $item = false ) {

    // Get current URL
    global $wp;
    $current_url = trailingslashit( home_url( add_query_arg( array(), $wp->request ) ) );

    // Get homepage URL
    $homepage_url = trailingslashit( get_bloginfo( 'url' ) );

    // Don't do anything on 404s or the homepage
    if( is_404() || $item->url == $homepage_url || $item->url == '/' ) {
      return $classes;
    }

    // Check if the current URL contains the items URL
    // This should match paginated pages for example
    if ( strstr( $current_url, $item->url ) ) {
        // Add the '.current-menu-item' class
        $classes[] = 'current-menu-item';
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', __NAMESPACE__ . '\\current_page_menu_class', 10, 2 );

?>
