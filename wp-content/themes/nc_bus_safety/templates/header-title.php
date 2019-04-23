<section class="banner">
  <a class="brand usa-logo" href="<?= esc_url(home_url('/')); ?>">
    <?php echo "<h1>" . get_bloginfo('name') . "</h1>"; ?>
  </a>
  <?php get_search_form(); ?>
</section>
