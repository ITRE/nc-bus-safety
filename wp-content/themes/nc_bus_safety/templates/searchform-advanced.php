<form method="get" class="" id="searchform-advanced" role="search" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="hidden" name="search" value="advanced">

		<label class="hidden" for="s">
			Keyword:
			<input type="search" placeholder="Keyword" class="form-control" name="s">
		</label>

		<?php if (class_exists('acf')) {
			global $post;
			$args = array( 'numberposts' => -1, 'post_type' => 'contacts', 'orderby'=>'title', 'order'=>'ASC');
			$posts = get_posts($args);
			$count = 1;?>
			<label for="county">
				County:
				<select name="county" id="county">
					<option value="">All Counties</option>
					<?php foreach( $posts as $post ) {
						setup_postdata($post);
						echo '<option value="' . $post->ID . '">' . get_the_title() . '</option>';
					} ?>
				</select>
			</label>
		<?php } ?>

		<button class="button" type="submit" value="Search" alt="Search">Search</button>
</form>
