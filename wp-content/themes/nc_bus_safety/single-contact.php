
<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main>
    <header class="page_title">
      <h2>County Contact Information</h2>
    </header>
    <section class="wrapper">
      <?php if (is_dynamic_sidebar('fleet_sidebar')) { ?>
        <aside class="sidebar">
          <?php dynamic_sidebar('fleet_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="content">
        <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();
        echo '<article id="post-' . get_the_ID() . '">';
          echo '<section class="flexible">';
            echo '<p class="half"><strong>County:</strong> '. get_the_title() . '</p>';
            echo '<p class="half"><strong>Updated:</strong> '. $post->post_modified . '</p>';
          echo '</section>';

          echo '<section class="flexible section">';
            echo '<h3>General Information</h3>';
            if (class_exists('acf')) {

            }
          echo '</section>';

          echo '<section class="flexible section">';
            echo '<h3>Sale Information</h3>';
            if (class_exists('acf')) {

            }
          echo '</section>';
          echo '<section class="flexible section">';
            echo '<h3>Contact Information</h3>';
            if (class_exists('acf')) {

            }
          echo '</section>';

        echo '</article>';
          // Previous/next post navigation.
          ?>
          <div class='container post-nav'>
    				<div style="float:left;"><?php previous_post_link('%link', '<i class="fas fa-long-arrow-alt-left"></i> Previous listing'); ?></div>
    				<div style="float:right;"><?php next_post_link('%link', 'Next listing <i class="fas fa-long-arrow-alt-right"></i>'); ?> </div>
    			</div>
          <?php
      endwhile; // End of the loop.
      ?>
    </section>
  </section>
</main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
