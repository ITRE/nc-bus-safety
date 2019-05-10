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

if( function_exists('acf_add_local_field_group') ) {
  acf_add_local_field_group(array(
  	'key' => 'group_5cd08023419b7',
  	'title' => 'Bus Info',
  	'fields' => array(
  		array(
  			'key' => 'field_5cd592d226a13',
  			'label' => 'General Information',
  			'name' => '',
  			'type' => 'tab',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'placement' => 'top',
  			'endpoint' => 0,
  		),
  		array(
  			'key' => 'field_5cd59da4e3c8a',
  			'label' => 'Vehicle',
  			'name' => 'vehicle',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_5cd591232fb89',
  					'label' => 'Bus Number',
  					'name' => 'bus_number',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '50',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5cd5912a2fb8a',
  					'label' => 'VIN',
  					'name' => 'vin',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '50',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5cd591312fb8b',
  					'label' => 'Year',
  					'name' => 'year',
  					'type' => 'date_picker',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '20',
  						'class' => '',
  						'id' => '',
  					),
  					'display_format' => 'Y',
  					'return_format' => 'Y',
  					'first_day' => 1,
  				),
  				array(
  					'key' => 'field_5cd591bc2fb8c',
  					'label' => 'Make',
  					'name' => 'make',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '30',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5cd5910e2fb88',
  					'label' => 'County',
  					'name' => 'county',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '50',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5cd591c42fb8d',
  					'label' => 'Wheelchair Lift',
  					'name' => 'lift',
  					'type' => 'radio',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '20',
  						'class' => '',
  						'id' => '',
  					),
  					'choices' => array(
  						'Yes' => 'Yes',
  						'No' => 'No',
  					),
  					'allow_null' => 0,
  					'other_choice' => 0,
  					'default_value' => '',
  					'layout' => 'vertical',
  					'return_format' => 'value',
  					'save_other_choice' => 0,
  				),
  				array(
  					'key' => 'field_5cd59e711f832',
  					'label' => '',
  					'name' => 'state',
  					'type' => 'group',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '80',
  						'class' => '',
  						'id' => '',
  					),
  					'layout' => 'block',
  					'sub_fields' => array(
  						array(
  							'key' => 'field_5cd591f02fb8e',
  							'label' => 'Size',
  							'name' => 'size',
  							'type' => 'text',
  							'instructions' => '',
  							'required' => 0,
  							'conditional_logic' => 0,
  							'wrapper' => array(
  								'width' => '',
  								'class' => '',
  								'id' => '',
  							),
  							'default_value' => '',
  							'placeholder' => '(Passengers)',
  							'prepend' => '',
  							'append' => '',
  							'maxlength' => '',
  						),
  						array(
  							'key' => 'field_5cd592142fb8f',
  							'label' => 'Mileage',
  							'name' => 'mileage',
  							'type' => 'number',
  							'instructions' => '',
  							'required' => 0,
  							'conditional_logic' => 0,
  							'wrapper' => array(
  								'width' => '',
  								'class' => '',
  								'id' => '',
  							),
  							'default_value' => 0,
  							'placeholder' => '',
  							'prepend' => '',
  							'append' => '',
  							'min' => 0,
  							'max' => '',
  							'step' => '',
  						),
  					),
  				),
  			),
  		),
  		array(
  			'key' => 'field_5cd592642fb90',
  			'label' => 'Bus Notes',
  			'name' => 'bus_notes',
  			'type' => 'textarea',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'maxlength' => '',
  			'rows' => '',
  			'new_lines' => '',
  		),
  		array(
  			'key' => 'field_5cd592f926a14',
  			'label' => 'Sale Information',
  			'name' => '',
  			'type' => 'tab',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'placement' => 'top',
  			'endpoint' => 0,
  		),
  		array(
  			'key' => 'field_5cd59391a0ccd',
  			'label' => 'Status',
  			'name' => 'status',
  			'type' => 'radio',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'choices' => array(
  				'In Service' => 'In Service',
  				'For Sale' => 'For Sale',
  				'Pending' => 'Pending',
  				'Sold' => 'Sold',
  			),
  			'allow_null' => 0,
  			'other_choice' => 0,
  			'default_value' => '',
  			'layout' => 'vertical',
  			'return_format' => 'value',
  			'save_other_choice' => 0,
  		),
  		array(
  			'key' => 'field_5cd59355a0cca',
  			'label' => 'Price',
  			'name' => 'price',
  			'type' => 'number',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '50',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'prepend' => '$',
  			'append' => '',
  			'min' => '',
  			'max' => '',
  			'step' => '',
  		),
  		array(
  			'key' => 'field_5cd59d64e3c89',
  			'label' => 'Sale',
  			'name' => 'sale',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_5cd5936aa0ccb',
  					'label' => 'Sale Amount',
  					'name' => 'sale_amount',
  					'type' => 'number',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '50',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '$',
  					'append' => '',
  					'min' => '',
  					'max' => '',
  					'step' => '',
  				),
  				array(
  					'key' => 'field_5cd59378a0ccc',
  					'label' => 'Sale Date',
  					'name' => 'sale_date',
  					'type' => 'date_picker',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '50',
  						'class' => '',
  						'id' => '',
  					),
  					'display_format' => 'F j, Y',
  					'return_format' => 'd/m/Y',
  					'first_day' => 1,
  				),
  				array(
  					'key' => 'field_5cd593b6a0cce',
  					'label' => 'Sale Note',
  					'name' => 'sale_note',
  					'type' => 'textarea',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'maxlength' => '',
  					'rows' => '',
  					'new_lines' => '',
  				),
  			),
  		),
  		array(
  			'key' => 'field_5cd59341a0cc9',
  			'label' => 'Admin Information',
  			'name' => '',
  			'type' => 'tab',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'placement' => 'top',
  			'endpoint' => 0,
  		),
  		array(
  			'key' => 'field_5cd59bd83239c',
  			'label' => 'Contact',
  			'name' => 'contact',
  			'type' => 'group',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'layout' => 'block',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_5cd59be43239d',
  					'label' => 'Name',
  					'name' => 'name',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5cd59bea3239e',
  					'label' => 'Street Address',
  					'name' => 'street',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5cd59c1e323a1',
  					'label' => 'City',
  					'name' => 'city',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '70',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5cd59c25323a2',
  					'label' => 'Zip',
  					'name' => 'zip',
  					'type' => 'number',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '30',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'min' => '',
  					'max' => '',
  					'step' => '',
  				),
  				array(
  					'key' => 'field_5cd59bef3239f',
  					'label' => 'Phone',
  					'name' => 'phone',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '50',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '(xxx) xxx-xxxx',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5cd59bff323a0',
  					'label' => 'Fax',
  					'name' => 'fax',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '50',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '(xxx) xxx-xxxx',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  			),
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'surplus',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'acf_after_title',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => array(
  		0 => 'the_content',
  		1 => 'excerpt',
  		2 => 'discussion',
  		3 => 'comments',
  		4 => 'author',
  	),
  	'active' => true,
  	'description' => '',
  ));
}


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
  switch ( $column ) {
    case 'bus_number' :
      echo $bus['bus_number'];
      break;
    case 'year' :
      echo $bus['year'];
      break;
    case 'county' :
      echo $bus['county'];
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
add_filter("manage_edit-surplus_sortable_columns",  __NAMESPACE__ . '\\sorting_columns' );

?>
