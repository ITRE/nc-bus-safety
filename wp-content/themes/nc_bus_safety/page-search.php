<?php /* Template Name: Search Surplus */ ?>

<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main>
    <header class="page_title">
      <h2><?php echo get_the_title(); ?></h2>
    </header>
    <section class="wrapper">
      <?php if (is_dynamic_sidebar('fleet_sidebar')) { ?>
        <aside class="sidebar">
          <?php dynamic_sidebar('fleet_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="content">
        <?php get_template_part( 'templates/content', 'search' ); ?>
      </section>
    </section>
  </main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
