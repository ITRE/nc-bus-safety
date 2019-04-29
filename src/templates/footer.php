<footer class="footer">
		<section class="container">
			<nav role="navigation" id="sub_nav" class="footer_nav">
				<?php
					$args = array(
						'container' => false,
						'menu_class' => 'secondary',
						'depth' => 0,
						'title_li' => false,
						'theme_location' => 'header-nav',
					);

					wp_nav_menu($args);
				?>
			</nav>
		</section>
		<section class="sub-footer">
			<section>
			<?php
	    if (get_theme_mod('social_media_facebook')
					||get_theme_mod('social_media_twitter')
					||get_theme_mod('social_media_flickr')
					||get_theme_mod('social_media_rss')) {
	      echo '<article class="social">';
	      if (get_theme_mod('social_media_facebook')){
	        echo '<a href="https://'.preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', get_theme_mod('social_media_facebook')).'"> <i aria-label="Facebook" class="fab fa-facebook"></i></a>';
	      };
	      if (get_theme_mod('social_media_insta')){
	        echo '<a href="https://'.preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', get_theme_mod('social_media_insta')).'"> <i aria-label="Instagram" class="fab fa-instagram"></i></a>';
	      };
	      if (get_theme_mod('social_media_twitter')){
	        echo '<a href="https://'.preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', get_theme_mod('social_media_twitter')).'"> <i aria-label="Twitter" class="fab fa-twitter"></i></a>';
	      };
	      if (get_theme_mod('social_media_rss')){
	        echo '<a href="https://'.preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', get_theme_mod('social_media_rss')).'"> <i aria-label="RSS Feed" class="fas fa-rss"></i></a>';
	      };
	      echo '</article>';
	    };
		?>
		<a class="brand footer-logo" href="<?= esc_url(home_url('/')); ?>">
	    <?php echo get_bloginfo('name'); ?>
	  </a>

		</section>


		<?php
		if (get_theme_mod('address_org')
				||get_theme_mod('address_textbox')
				||get_theme_mod('org_phone')
				||get_theme_mod('org_fax')) {
			echo '<section class="address">';
			if (get_theme_mod('address_org')){
				echo '<h3>'.get_theme_mod('address_org').'</h3>';
			};
			if (get_theme_mod('address_textbox')){
				echo '<p>'.get_theme_mod('address_textbox').'</p>';
			};
			if (get_theme_mod('org_phone')){
				echo '<p><strong>Phone: </strong>'.get_theme_mod('org_phone').'</p>';
			};
			if (get_theme_mod('org_fax')){
				echo '<p><strong>Fax: </strong>'.get_theme_mod('org_fax').'</p>';
			};
			echo '</section>';
		};
	?>
		</section>
	</footer>

	<?php wp_footer(); ?>
