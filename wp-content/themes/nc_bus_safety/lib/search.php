<?php

namespace Bus\Search;

/* Filter for Advanced Search */

function filter($query) {
    if ($query->is_search && !is_admin() && $query->is_main_query()) {
        if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'advanced') {
          /* Limit to Surplus */
            $query->set('post_type', 'surplus');


          /* Meta Queries */
          $meta = array(array(
            'key'   => 'status',
            'value' => 'For Sale'
          ));



          /* Preserve Sort from listings headers */
            $sort = isset($_GET['sortby']) ? $_GET['sortby'] : 'county';
            $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
            if ($sort === 'price') {
              $val = 'meta_value_num';
            } else if ($sort === 'vehicle_bus_number') {
              $val = 'title';
              $sort = '';
            } else {
              $val = 'meta_value';
            }

            $query->set('meta_key', $sort);
            $query->set('orderby', $val);
            $query->set('order', $order);

          /* Keyword */
            if (isset($_GET['s'])) {
                $query->set('s', $_GET['s']);
            }

          // County
            if (isset($_GET['county'])) {
              if ($_GET['county'] != '') {
                $meta[] = array(
                  'key' => 'vehicle_county',
                  'value' => $_GET['county']
                );
              }
            }

          // Wheelchair
            if (isset($_GET['lift'])) {
              $meta[] = array(
                'key' => 'vehicle_lift',
                'value' => 1
              );
            }

          // Price
            if (isset($_GET['price'])) {
              $meta[] = array(
                'key'     => 'price',
                'type'	=> 'NUMERIC',
                'value'   => $_GET['price'],
                'compare' => '<='
              );
            }

          // Mileage
            if (isset($_GET['mileage'])) {
              $meta[] = array(
                'key'     => 'vehicle_state_mileage',
                'type'	=> 'NUMERIC',
                'value'   => $_GET['mileage'],
                'compare' => '<='
              );
            }


          /* Set Meta Query */
            $query->set('meta_query', $meta);
        }
}

  return $query;
}; // End Function


add_action('pre_get_posts', __NAMESPACE__ . '\\filter');


/* Sort Surplus Titles Numerically */

function orderby_post_title_int( $orderby, $query ) {
  if ($query->get('post_type') == 'surplus' && $query->get('orderby') == 'title') {
    if ($query->get('order') == 'asc' || $query->get('order') == 'ASC') {
      return "(wp_posts.post_title+0) DESC";
    }
    // else
    return "(wp_posts.post_title+0) ASC";
  }
  // else
  return $orderby;
}
add_filter('posts_orderby', __NAMESPACE__ . '\\orderby_post_title_int', 10, 2 );


/* Include ACF Info in Search Results */

  /*
  * The ‘postmeta’ table is where all the custom field data is stored in the database.
  * By default, the WordPress search functionality is set to search the ‘posts’ table only.
  * In order to include the custom fields data in our search, we first need to perform a left join
  * on the ‘posts’ and ‘postmeta’ tables in the database.
  */

  function acf_search_join( $join ) {
    global $wpdb;
    if ( is_search() ) {
      $join .=' LEFT JOIN '.$wpdb->postmeta. ' acfmeta ON '. $wpdb->posts . '.ID = acfmeta.post_id ';
    }
    return $join;
  }
  add_filter('posts_join', __NAMESPACE__ . '\\acf_search_join' );

  /*
  * Next we need to modify the WordPress search query to include custom fields.
  */

  function acf_search_where( $where ) {
    global $pagenow, $wpdb;
    if ( is_search() ) {
      $where = preg_replace(
        "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
        "(".$wpdb->posts.".post_title LIKE $1) OR (acfmeta.meta_value LIKE $1)", $where
      );
    }
    return $where;
  }
  add_filter( 'posts_where', __NAMESPACE__ . '\\acf_search_where' );

  /*
  * Finally, we need to add the DISTINCT keyword to the SQL query in order to prevent returning duplicates.
  */

  function acf_search_distinct( $where ) {
    global $wpdb;
    if ( is_search() ) {
      return "DISTINCT";
    }
    return $where;
  }
  add_filter( 'posts_distinct', __NAMESPACE__ . '\\acf_search_distinct' );


?>
