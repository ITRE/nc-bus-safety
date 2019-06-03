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
