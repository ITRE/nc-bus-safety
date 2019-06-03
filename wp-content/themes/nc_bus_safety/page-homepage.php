<?php /* Template Name: Homepage */ ?>

<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'home');
  ?>

  <main>
    <header class="page_banner">
      <div class="banner_image">
        <?php the_post_thumbnail(); ?>
      </div>
    </header>
    <section class="main">
        <?php
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/content', 'page' );
          if ( have_rows('category_blocks') ) {
            // loop through the rows of data
            echo '<section id="' . esc_attr($id) . '" class="flexible">';
            while ( have_rows('category_blocks') ) : the_row();
              // Load values and assing defaults.
              $title = get_sub_field('title') ?: 'Category Name';
              $description = get_sub_field('description');
              $category = get_sub_field('category');
              $links = get_sub_field('links', false, false) ?: array();

              echo '<div class="ncbus_category">';
                echo '<a href="' . $category . '">';
                  echo '<header>';
                    echo '<h2>' . $title . '</h2>';
                  echo '</header>';
                echo '</a>';
                echo '<section>';
                  if ($description) {
                    echo '<p>' . $description . '</p>';
                  }
                  echo '<ul class="category_links">';
                    foreach( $links as $link ) {
                      echo '<li><a href="' . get_the_permalink($link) . '">' . get_the_title($link) . '</a></li>';
                    }
                  echo '</ul>';
                echo '</section>';
              echo '</div>';
            endwhile;
            echo '</section>';
          }
        endwhile; // End of the loop.
        ?>
        <?php the_content(); ?>
    </section>
  </main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
