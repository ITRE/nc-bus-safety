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
        <?php
        if (have_posts()) {
          while ( have_posts() ) : the_post();
              echo '<article>
              <header>
              <h3 class="entry-title"><a href="' . get_the_permalink(). '">' . get_the_title() . '</a></h3>
              </header>
              </article>';
          endwhile; // End of the loop.
        } else {
          echo 'Sorry, but the page you were trying to view does not exist.';
          get_template_part( 'template-parts/content', 'search' );
        } ?>
      </section>
    </section>
  </main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
