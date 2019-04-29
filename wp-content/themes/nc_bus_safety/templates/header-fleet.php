<header class="primary_banner">
  <?php get_template_part('templates/header', 'title'); ?>
  <nav role="navigation" id="main_nav" class="header_nav">
    <?php
  		$args = array(
  			'container' => false,
  			'menu_class' => 'primary',
  			'depth' => 0,
  			'title_li' => false,
  			'theme_location' => 'header-nav',
  		);

  		wp_nav_menu($args);
  	?>
  </nav>

  <section id="mobile_navbar" class="mobile_nav">
    <button class="hamburger hamburger--collapse" id="mobile_button" type="button"
          aria-label="Menu Toggle" aria-controls="mobile-navigation" aria-expanded="false">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
    <nav class="mobile">
      <?php
        $args = array(
          'container' => false,
          'depth' => 0,
          'title_li' => false,
          'theme_location' => 'header-nav',
        );
        wp_nav_menu($args);
      ?>
    </nav>
  </section>
</header>
