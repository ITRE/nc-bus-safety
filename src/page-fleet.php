<?php get_template_part('templates/head'); ?>

<body>

  <?php
    do_action('get_header');
    get_template_part('templates/header', 'fleet');
  ?>

  <main>

    <section>
      <header>
        <h2><?php get_the_title(); ?></h2>
      </header>
      <?php the_content(); ?>
    </section>

    <?php if (is_dynamic_sidebar('sidebar-fleet')) { ?>
      <aside>
        <?php dynamic_sidebar('sidebar-fleet'); ?>
      </aside>
    <?php } ?>

  </main>

  <?php
    do_action('get_footer');
    get_template_part('templates/footer');
  ?>

</body>
