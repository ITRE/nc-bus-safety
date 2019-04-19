<header class="primary_banner usa-header usa-header--extended">
  <?php get_template_part('templates/header', 'title'); ?>
  <nav role="navigation" id="main_nav" class="usa-nav">
    <?php
  		$args = array(
  			'container' => 'div',
        'container_id' => 'usa-nav__inner',
  			'menu_class' => 'usa-nav__primary usa-accordion',
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
