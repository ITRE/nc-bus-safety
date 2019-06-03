<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main>
    <header class="page_title">
      <h2>County Contacts</h2>
    </header>
    <section class="wrapper">
      <?php if (is_dynamic_sidebar('fleet_sidebar')) { ?>
        <aside class="sidebar">
          <?php dynamic_sidebar('fleet_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="content contact_table">
        <?php
        $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
      		// args
      		$args = array(
      			'numberposts' => -1,
      			'post_type' 	=> 'contacts',
	          'orderby'			=> 'title',
            'order'       => $order
      		);
       		// get results
      		$the_query = new WP_Query( $args );
      		// The Loop
      if ($the_query->have_posts()):
        get_template_part( 'templates/header', 'contacts' );
        while ( $the_query->have_posts() ) : $the_query->the_post();
          get_template_part('templates/content', 'contacts');
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
