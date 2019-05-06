<?php

namespace Bus\CPT;

function surplus_post_type()
{
    register_post_type('surplus', [
      'labels'        => [
        'name'                => __('Surplus'),
        'singular_name'       => __('Surplus'),
        'add_new'             => __('Add New'),
        'add_new_item'        => __('Add New Surplus'),
        'new_item'            => __('New Surplus'),
        'edit_item'           => __('Edit Surplus'),
        'view_item'           => __('View Surplus'),
        'all_items'           => __('All Surplus'),
        'search_items'        => __('Search Surplus'),
        'parent_item_colon'   => __('Parent Surplus'),
        'not_found'           => __('No Surplus found.'),
        'not_found_in_trash'  => __('No Surplus found in Trash.'),
      ],
			'rewrite'				=> array(
				'slug' 				=> 'archive',
			  'with_front' 	=> false,
			),
      'public'        => true,
      'query_var'     => true,
      'has_archive'   => true,
      'menu_icon'     => 'dashicons-book-alt',
      'supports'      => array('title', 'editor', 'author'),
      'taxonomies'    => array('category'),
    ]);
}

add_action('init', __NAMESPACE__ . '\\surplus_post_type');

function loop_filter($query) {
	if (!is_admin() && ($query->is_main_query())) {
		$query->set('post_type', array('post', 'page', 'surplus'));
	}
}

?>
