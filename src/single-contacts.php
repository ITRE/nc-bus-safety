
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
        echo '<h3>' . get_the_title() . ' County</h3>';
        echo '<p><strong>Updated:</strong> '. $post->post_modified . '</p>';

        echo '<section class="flexible">';
        if (class_exists('acf')) {
          $name = get_field('name');
          $street = get_field('street');
          $city = get_field('city');
          $zip = get_field('zip');
          $phone = get_field('phone');
          $fax = get_field('fax');

          if ($name) {
            echo '<p class="half"><strong>Name:</strong> '. $name . '</p>';
          }
          if ($phone) {
            echo '<p class="half"><strong>Phone:</strong> '. $phone . '</p>';
          }
          if ($street && $city && $zip) {
            echo '<p class="half"><strong>Address:</strong> '
            . $street
            . '<br />'
            . $city
            . ', NC '
            . $zip
            . '</p>';
          }
          if ($fax) {
            echo '<p class="half"><strong>Fax:</strong> '. $fax . '</p>';
          }
        }
        echo '</section>';

        echo '</article>';
          // Previous/next post navigation.
          ?>
          <div class='container post-nav'>
    				<div style="float:left;"><?php previous_post_link('%link', '<i class="fas fa-long-arrow-alt-left"></i> Previous contact'); ?></div>
    				<div style="float:right;"><?php next_post_link('%link', 'Next contact <i class="fas fa-long-arrow-alt-right"></i>'); ?> </div>
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
