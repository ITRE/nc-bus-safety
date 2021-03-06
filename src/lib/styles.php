<?php

namespace Bus\Styles;

/*
*   Styles & Scripts
*/
function register_my_css() {
  wp_enqueue_style('bus-safety', get_stylesheet_directory_uri() . '/style.css', false, null);
  wp_enqueue_script('mobile-toggle', get_stylesheet_directory_uri() . '/bundled.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\register_my_css', 100);

function register_admin_style() {
    wp_enqueue_style('bus-safety-admin', get_stylesheet_directory_uri() . '/admin.css', false, null);
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\register_admin_style' );


?>
