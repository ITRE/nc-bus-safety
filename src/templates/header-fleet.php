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
  <nav id="mobile_nav">

  </nav>
</header>
