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
      		// args
      		$args = array(
      			'numberposts' => -1,
      			'post_type' 	=> 'surplus',
            'meta_key'		=> $sort,
	          'orderby'			=> $val,
            'order'       => $order,
            'meta_query'  => array(
              'only_sale'   => array(
                'key'   => 'status',
                'value' => 'For Sale'
              )
            )
      		);
       		// get results
      		$the_query = new WP_Query( $args );
      		// The Loop
      if ($the_query->have_posts()):
        get_template_part( 'templates/header', 'surplus' );
        while ( $the_query->have_posts() ) : $the_query->the_post();
          get_template_part('templates/content', 'surplus');
	      <div class='container post-nav'>
    		<div style="float:left;"><?php previous_post_link('%link', '<i class="fas fa-long-arrow-alt-left"></i> Previous listing'); ?></div>
    		<div style="float:right;"><?php next_post_link('%link', 'Next listing <i class="fas fa-long-arrow-alt-right"></i>'); ?> </div>
    	      </div>
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
