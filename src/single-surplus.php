
<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main>
    <header class="page_title">
      <h2>School Bus Information</h2>
    </header>
    <section class="wrapper">
      <?php if (is_dynamic_sidebar('fleet_sidebar')) { ?>
        <aside class="sidebar">
          <?php dynamic_sidebar('fleet_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="content">
        <p><em>All Vehicles are sold <strong>As is</strong> and <strong>Where is</strong> with <strong>All Faults</strong> and <strong>No Warranty, Written or Implied</strong></em></p>
        <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();
        echo '<article id="post-' . get_the_ID() . '">';
          echo '<section class="flexible">';
            echo '<p class="half"><strong>Bus Number:</strong> '. get_the_title() . '</p>';
            echo '<p class="half"><strong>Updated:</strong> '. $post->post_modified . '</p>';
          echo '</section>';

          echo '<section class="flexible section">';
            echo '<h3>General Information</h3>';
            if (class_exists('acf')) {
              $bus = get_field('vehicle');
              $notes = get_field('bus_notes');

              if ($bus['vin']) {
                echo '<p class="half"><strong>Vin Number:</strong> '. $bus['vin'] . '</p>';
              }
              if ($bus['year']) {
                echo '<p class="half"><strong>Year:</strong> '. $bus['year'] . '</p>';
              }
              if ($bus['make']) {
                echo '<p class="half"><strong>Make:</strong> '. $bus['make'] . '</p>';
              }
              if ($bus['model']) {
                echo '<p class="half"><strong>Model:</strong> '. $bus['model'] . '</p>';
              }
              if ($bus['county']) {
                echo '<p class="half"><strong>County:</strong> '. $bus['county'] . '</p>';
              }
              if ($bus['lift']) {
                echo '<p class="half"><strong>Wheelchair Lift:</strong> ';
                echo $bus['lift']==1 ? 'Yes' : 'No';
                echo '</p>';
              }
              if ($bus['state']['size']) {
                echo '<p class="half"><strong>Size:</strong> '. $bus['state']['size'] . ' Passengers</p>';
              }
              if ($bus['state']['mileage']) {
                echo '<p class="half"><strong>Mileage:</strong> '. $bus['state']['mileage'] . '<br /><small>Actual bus mileage may be higher than what is presented here.</small></p>';
              }
              if ($notes) {
                echo '<p class="wide"><strong>Notes:</strong> '. $notes . '</p>';
              }
            }
          echo '</section>';

          echo '<section class="flexible section">';
            echo '<h3>Sale Information</h3>';
            if (class_exists('acf')) {
              $price = get_field('price');
              $status = get_field('status');
              $sale = get_field('sale');

              if ($price) {
                echo '<p class="half"><strong>Price:</strong> '. $price . '</p>';
              }
              if ($status) {
                echo '<p class="half"><strong>Status:</strong> '. $status . '</p>';
              }
              if ($sale['sale_amount']) {
                echo '<p class="half"><strong>Sold For:</strong> '. $sale['sale_amount'] . '</p>';
              }
              if ($sale['sale_date']) {
                echo '<p class="half"><strong>Sold On:</strong> '. $sale['sale_date'] . '</p>';
              }
              if ($sale['sale_notes']) {
                echo '<p class="wide"><strong>Notes:</strong> '. $sale['sale_notes'] . '</p>';
              }
            }
          echo '</section>';
          echo '<section class="flexible section">';
            echo '<h3>Contact Information</h3>';
            if (class_exists('acf')) {
              $contact = get_field('vehicle_county');
              if ($contact) {
                $name = get_field('name', $contact);
                $street= get_field('street', $contact);
                $city = get_field('city', $contact);
                $zip = get_field('zip', $contact);
                $phone = get_field('phone', $contact);
                $fax = get_field('fax', $contact);
                
                if ($name) {
                  echo '<p class="half"><strong>Name:</strong> '. $name . '</p>';
                }
                if ($street && $city && $zip) {
                  echo '<p class="half address"><strong>Address:</strong> ';
                  echo '<span>';
                  echo $street . '<br />';
                  echo $city . ', NC ' . $zip;
                  echo '</span></p>';
                }

                if ($phone) {
                  echo '<p class="half"><strong>Phone:</strong> '. $phone . '</p>';
                }
                if ($fax) {
                  echo '<p class="half"><strong>Fax:</strong> '. $fax . '</p>';
                }
              }
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
