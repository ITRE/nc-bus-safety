<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main>
    <header class="page_title">
      <h2>Search Results</h2>
    </header>
    <section class="wrapper">
      <?php if (is_dynamic_sidebar('fleet_sidebar')) { ?>
        <aside class="sidebar">
          <?php dynamic_sidebar('fleet_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="content">
        <?php
        if (have_posts()) {
          // Render Advanced Search
          if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'advanced' && class_exists('acf')) {
            get_template_part( 'templates/header', 'surplus' );
            while ( have_posts() ) : the_post();
              get_template_part( 'templates/content', 'surplus' );
            endwhile;
          // Render non-Advanced search when cpt are present
          } else {
            if (class_exists('acf')) {
              $types = array('post', 'page', 'surplus', 'contacts');
              foreach( $types as $type ){
                echo '<section class="search_category">';
                echo '<h3>' . ucfirst($type) . '</h3>';
                if ($type == 'contacts') {
                  get_template_part( 'templates/header', 'contacts' );
                } else if ($type == 'surplus') {
                  get_template_part( 'templates/header', 'surplus' );
                }
                while( have_posts() ){
                  the_post();
                  if( $type == get_post_type() ){
                    if ($type == 'contacts') {
                      get_template_part( 'templates/content', 'contacts' );
                    } else if ($type == 'surplus') {
                      get_template_part( 'templates/content', 'surplus' );
                    } else {
                      echo '<article class="search_result"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></article>';
                    }

                  }
                }
                rewind_posts();
                echo '</section>';
              }
            // Render non-Advanced search when cpt are *not* present
            } else {
              while ( have_posts() ) : the_post();
                echo '<article class="search_result"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></article>';
              endwhile;
            }

          }
        // Render search form when no results are found
        } else {
          echo 'Sorry, but there are no listings which match your search.';

          get_template_part( 'templates/content', 'search' );
        } ?>
      </section>
    </section>
  </main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
