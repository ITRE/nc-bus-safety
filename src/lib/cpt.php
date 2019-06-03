<?php

namespace Bus\CPT;

function surplus_post_type() {
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
      'public'        => true,
      'query_var'     => true,
      'has_archive'   => true,
      'menu_icon'     => 'dashicons-tag',
      'supports'      => array('title', 'revisions')
    ]);
}

add_action('init', __NAMESPACE__ . '\\surplus_post_type');

function contacts_post_type() {
    register_post_type('contacts', [
      'labels'        => [
        'name'                => __('Contacts'),
        'singular_name'       => __('Contact'),
        'add_new'             => __('Add New'),
        'add_new_item'        => __('Add New Contact'),
        'new_item'            => __('New Contact'),
        'edit_item'           => __('Edit Contact'),
        'view_item'           => __('View Contact'),
        'all_items'           => __('All Contacts'),
        'search_items'        => __('Search Contacts'),
        'parent_item_colon'   => __('Parent Contact'),
        'not_found'           => __('No Contact found.'),
        'not_found_in_trash'  => __('No Contact found in Trash.'),
      ],
      'public'        => true,
      'query_var'     => true,
      'has_archive'   => true,
      'menu_icon'     => 'dashicons-format-chat',
      'supports'      => array('title', 'revisions')
    ]);
}

add_action('init', __NAMESPACE__ . '\\contacts_post_type');

function filter_next_post_sort($sort) {
  if (get_post_type($post) == 'contacts') {
      $sort = "ORDER BY p.post_title ASC LIMIT 1";
  } else if (get_post_type($post) == 'surplus') {
      $sort = "ORDER BY p.post_title+0 ASC LIMIT 1";
  } else {
      $sort = "ORDER BY p.post_date ASC LIMIT 1";
  }
  return $sort;
}
function filter_next_post_where($where) {
  global $post, $wpdb;
  if (get_post_type($post) == 'contacts') {
      return $wpdb->prepare("WHERE p.post_title > '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'",$post->post_title);
  } else if (get_post_type($post) == 'surplus') {
      return $wpdb->prepare("WHERE p.post_title+0 > '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'",$post->post_title+0);
  } else {
      return $wpdb->prepare( "WHERE p.post_date > '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'", $post->post_date, $post->post_type );
  }
}

function filter_previous_post_sort($sort) {
  if (get_post_type($post) == 'contacts') {
      $sort = "ORDER BY p.post_title DESC LIMIT 1";
  } else if (get_post_type($post) == 'surplus') {
      $sort = "ORDER BY p.post_title+0 DESC LIMIT 1";
  } else {
      $sort = "ORDER BY p.post_date DESC LIMIT 1";
  }
  return $sort;
}
function filter_previous_post_where($where) {
  global $post, $wpdb;
  if (get_post_type($post) == 'contacts') {
      return $wpdb->prepare("WHERE p.post_title < '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'",$post->post_title);
  } else if (get_post_type($post) == 'surplus') {
      return $wpdb->prepare("WHERE p.post_title+0 < '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'",$post->post_title+0);
  } else {
      return $wpdb->prepare( "WHERE p.post_date < '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'", $post->post_date, $post->post_type );
  }
}

add_filter('get_next_post_sort', __NAMESPACE__ . '\\filter_next_post_sort');
add_filter('get_next_post_where', __NAMESPACE__ . '\\filter_next_post_where');

add_filter('get_previous_post_sort', __NAMESPACE__ . '\\filter_previous_post_sort');
add_filter('get_previous_post_where', __NAMESPACE__ . '\\filter_previous_post_where');


?>
