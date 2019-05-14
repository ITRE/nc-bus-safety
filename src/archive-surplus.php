<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main>
    <header class="page_title">
      <h2>Full Bus Listing</h2>
    </header>
    <section class="wrapper">
      <?php if (is_dynamic_sidebar('fleet_sidebar')) { ?>
        <aside class="sidebar">
          <?php dynamic_sidebar('fleet_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="content surplus_table">
        <?php
        $sort = $_GET['sortby'];
        $order = $_GET['order'];
        if (!$sort) {
          $sort = 'county';
        }
        if ($sort === 'price') {
          $val = 'meta_value_num';
        } else if ($sort === 'vehicle_bus_number') {
          $val = 'title';
          $sort = '';
        } else {
          $val = 'meta_value';
        }
        if (!$order) {
          $order = 'asc';
        }
      		// args
      		$args = array(
      			'numberposts' => -1,
      			'post_type' 	=> 'surplus',
            'meta_key'		=> $sort,
	          'orderby'			=> $val,
            'order'       => $order
      		);
       		// get results
      		$the_query = new WP_Query( $args );
      		// The Loop
      if ($the_query->have_posts()):
        if (class_exists('acf')) {
          echo '<article class="surplus_headers">';
          echo '<a href="?sortby=county&order='
            . (($order === 'asc' && $sort === 'county') ? 'desc' : 'asc' )
            .'">County ';
            if ($sort === 'county') {
              echo $order === 'asc' ? '<i class="fas fa-sort-alpha-down fa-lg"></i>' : '<i class="fas fa-sort-alpha-up fa-lg"></i>';
            }
            echo '</a>';
          echo '<a href="?sortby=vehicle_bus_number&order='
            . (($order === 'asc' && $sort === '') ? 'desc' : 'asc' )
            .'">Bus ';
            if ($sort === '') {
              echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
            }
            echo '</a>';
          echo '<a href="?sortby=vehicle_year&order='
            . (($order === 'asc' && $sort === 'vehicle_year') ? 'desc' : 'asc' )
            .'">Year ';
            if ($sort === 'vehicle_year') {
              echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
            }
            echo '</a>';
          echo '<a class="desktop-only" href="?sortby=vehicle_make&order='
            . (($order === 'asc' && $sort === 'vehicle_make') ? 'desc' : 'asc' )
            .'">Make ';
            if ($sort === 'vehicle_make') {
              echo $order === 'asc' ? '<i class="fas fa-sort-alpha-down fa-lg"></i>' : '<i class="fas fa-sort-alpha-up fa-lg"></i>';
            }
            echo '</a>';
          echo '<a class="mobile-hide" href="?sortby=vehicle_lift&order='
            . (($order === 'asc' && $sort === 'vehicle_lift') ? 'desc' : 'asc' )
            .'">Lift ';
            if ($sort === 'vehicle_lift') {
              echo $order === 'asc' ? '<i class="fas fa-long-arrow-alt-down fa-lg"></i>' : '<i class="fas fa-long-arrow-alt-up fa-lg"></i>';
            }
            echo '</a>';
          echo '<a class="mobile-hide" href="?sortby=vehicle_state_size&order='
            . (($order === 'asc' && $sort === 'vehicle_state_size') ? 'desc' : 'asc' )
            .'">Size ';
            if ($sort === 'vehicle_state_size') {
              echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
            }
            echo '</a>';
          echo '<a class="desktop-only" href="?sortby=vehicle_state_mileage&order='
            . (($order === 'asc' && $sort === 'vehicle_state_mileage') ? 'desc' : 'asc' )
            .'">Mileage ';
            if ($sort === 'vehicle_state_mileage') {
              echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
            }
            echo '</a>';
          echo '<a href="?sortby=price&order='
            . (($order === 'asc' && $sort === 'price') ? 'desc' : 'asc' )
            .'">Price ';
            if ($sort === 'price') {
              echo $order === 'asc' ? '<i class="fas fa-sort-numeric-down fa-lg"></i>' : '<i class="fas fa-sort-numeric-up fa-lg"></i>';
            }
            echo '</a>';
          echo '</article>';
        }
        while ( $the_query->have_posts() ) : $the_query->the_post();
          get_template_part('templates/content', 'surplus');
        endwhile;
      endif;?>
      </section>
    </section>
  </main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
