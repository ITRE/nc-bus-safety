<?php /* Template Name: Educators */ ?>

<?php get_template_part('templates/head'); ?>

<body class="">

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'edu');
  ?>

  <main>
    <header class="page_title">
      <h2><?php echo get_the_title(); ?></h2>
    </header>
    <section class="wrapper">
      <?php if (is_dynamic_sidebar('edu_sidebar')) { ?>
        <aside class="sidebar">
          <?php dynamic_sidebar('edu_sidebar'); ?>
        </aside>
      <?php } ?>

      <section class="content">
        <?php
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/content', 'page' );
        endwhile; // End of the loop.
        ?>
        <?php the_content(); ?>
      </section>
    </section>
  </main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
