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

?>
