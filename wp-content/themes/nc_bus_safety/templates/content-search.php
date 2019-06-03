<form method="get" class="flexible" id="searchform-advanced" role="search" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="hidden" name="search" value="advanced">

		<label class="wide" for="s">
			Keyword:
			<input type="search" placeholder="Keyword" class="form-control" name="s">
		</label>

		<?php if (class_exists('acf')) {
			global $post;
			$args = array(
				'numberposts' => -1,
				'post_type' 	=> 'contacts',
				'orderby'			=> 'title',
				'order'       => 'ASC'
			);
			$posts = get_posts($args);
			$count = 1;?>
			<label for="county" class="wide">
				County:
				<select name="county" id="county">
					<option value="">All Counties</option>
					<?php foreach( $posts as $post ) {
						setup_postdata($post);
						echo '<option value="' . $post->ID . '">' . get_the_title() . '</option>';
					}
					wp_reset_postdata();?>
				</select>
			</label>


			<div class="toggle_container">
				Must Have Lift:
				<input id="lift" name="lift" type="checkbox" class="toggle_input" />
				<label for="lift" class="toggle">
					<span class="sr-only">Wheelchair Lift Toggle</span>
				</label>
			</div>

			<div class="flex_fill">
				<label for="price">
					Max Price:
					<input id="range-price" name="price" type="range" min="0" max="10000" step="100" />
					<span class="tag"></span>
					<span id="range_label-price" class="range_label">10,000</span>
				</label>
				<label for="mileage">
					Max Mileage:
					<input id="range-mileage" name="mileage" type="range" min="0" max="1000000" step="1000" />
					<span class="tag"></span>
					<span id="range_label-mileage" class="range_label">10,000</span>
				</label>
			</div>

		<?php } ?>
</form>

<button form="searchform-advanced" class="button" type="submit" value="Search" alt="Search">Search</button>
