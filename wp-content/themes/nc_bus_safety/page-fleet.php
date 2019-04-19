<?php /* Template Name: Fleet Services */ ?>

<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main class="grid-container main-content">
    <div class="grid-row grid-gap ">

      <?php if (is_dynamic_sidebar('fleet_sidebar')) { ?>
        <aside class="grid-col-3">
          <?php dynamic_sidebar('fleet_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="grid-col-fill">
        <header>
          <h2><?php echo get_the_title(); ?></h2>
        </header>
        <?php
    		while ( have_posts() ) : the_post();
    			get_template_part( 'template-parts/content', 'page' );
    		endwhile; // End of the loop.
    		?>
        <?php the_content(); ?>
      </section>

    </div>

  </main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
