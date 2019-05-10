<?php

namespace Bus\Fields;

/*
*   ACF
*/


// Check if ACF is used with another plugin, if not already called, use this one
if (!class_exists('acf')) {
  // Define path and URL to the ACF plugin.
  define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
  define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

  // Include the ACF plugin.
  include_once( MY_ACF_PATH . 'acf.php' );

  // Customize the url setting to fix incorrect asset URLs.
  add_filter('acf/settings/url', __NAMESPACE__ . '\\my_acf_settings_url');
  function my_acf_settings_url( $url ) {
      return MY_ACF_URL;
  }

  // (Optional) Hide the ACF admin menu item.
  add_filter('acf/settings/show_admin', __NAMESPACE__ . '\\my_acf_settings_show_admin');
  function my_acf_settings_show_admin( $show_admin ) {
      return true;
  }
}









/*
*   Fields
*/


?>
