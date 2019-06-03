<form method="post" class="" id="searchform-advanced" role="search" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="hidden" name="search" value="advanced">

		<label class="hidden" for="s">
			Keyword:
			<input type="search" placeholder="Keyword" class="form-control" name="s">
		</label>

		<?php if (class_exists('acf')) { ?>
			<label>
				County:
				<select name="page_id" id="page_id">
					<?php global $post;
					$args = array( 'numberposts' => -1, 'post_type' => 'contacts', 'orderby'=>'title', 'order'=>'ASC');
					$posts = get_posts($args);
					foreach( $posts as $post ) {
						setup_postdata($post); ?>
						<option value="<? echo $post->ID; ?>"><?php the_title(); ?></option>
					<?php } ?>
				</select>
			</label>
		<?php } ?>

		<button class="button" type="submit" value="Search" alt="Search">Search</button>
</form>
