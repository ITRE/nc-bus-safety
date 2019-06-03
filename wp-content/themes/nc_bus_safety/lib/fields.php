<?php

namespace Bus\Fields;

/*
*   ACF
*/

/*
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


*/


/*
*   Fields
*/



/*
*   Admin Column - Display Custom Fields
*/

function custom_columns( $columns ) {
  $columns = array(
    'cb' => '<input type="checkbox" />',
    'bus_number' => 'Bus Number',
    'year' => 'Year',
    'county' => 'County',
    'status' => 'Sale Status',
    'date' => 'Date'
   );
  return $columns;
}
add_filter('manage_surplus_posts_columns' , __NAMESPACE__ . '\\custom_columns');

function custom_columns_data( $column, $post_id ) {
  $bus= get_field('vehicle', $post_id );
  $bus_number = get_the_title($post_id);
  $county = get_the_title($bus['county']);
  switch ( $column ) {
    case 'bus_number' :
      echo $bus_number;
      break;
    case 'year' :
      echo $bus['year'];
      break;
    case 'county' :
      echo $county;
      break;
    case 'status' :
      echo get_field('status', $post_id );
      break;
  }
}
add_action( 'manage_surplus_posts_custom_column' , __NAMESPACE__ . '\\custom_columns_data', 10, 2 );

function sorting_columns( $columns ) {
	$columns['bus_number'] = 'bus_number';
	$columns['year'] = 'year';
	$columns['county'] = 'county';
	$columns['status'] = 'status';
	return $columns;
}
add_filter("manage_edit-surplus_sortable_columns", __NAMESPACE__ . '\\sorting_columns' );


/*
*   Populate Surplus Contact based on County Value
*/

function populate_contact($post_ID){
    $bus = get_field('vehicle', $post_ID);
    $county = get_the_title($bus['county']);
    if(!$bus) {
      return;
    }
    update_post_meta($post_ID, 'county', $county);
}

add_action( 'acf/save_post', __NAMESPACE__ . '\\populate_contact', 100); //don't forget the last argument to allow all three arguments of the function


?>
