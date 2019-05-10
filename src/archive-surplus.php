<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main>
    surplus archive
    <header class="page_title">
      <h2>Surplus Sales</h2>
    </header>
    <section class="wrapper">
      <?php if (is_dynamic_sidebar('fleet_sidebar')) { ?>
        <aside class="sidebar">
          <?php dynamic_sidebar('fleet_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="content">
      <?php if (have_posts()):
        if (class_exists('acf')) { ?>
          <article class="surplus">
            <div>Bus Number</div>
            <div>Year</div>
            <div>Make</div>
            <div>Size</div>
            <div>Mileage</div>
          </article>
      <?php  }
        while ( have_posts() ) : the_post();
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
