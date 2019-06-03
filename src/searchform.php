<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<label class="search-label" for="s">
		<span class="screen-reader-text"><?php _x( 'Search for:', 'label' )?></span>
		<input type="search" name="s" id="s" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
	</label>
	<button type="submit" class="search-submit" aria-label="search"><i class="fa fa-search"></i></button>
</form>
