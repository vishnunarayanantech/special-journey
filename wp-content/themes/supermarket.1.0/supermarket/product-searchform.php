<?php
/**
 * Displays the Product Category searchform
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
$supermarket_settings = supermarket_get_theme_options();
$supermarket_search_product_text = $supermarket_settings['supermarket_search_product_text'];
		?>
<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<select class="search-categories-select" name="product_cat">
		
		<option value="0"><?php esc_html_e('All Categories','supermarket'); ?></option>
		<?php
		$args = array(
			 'taxonomy'     => 'product_cat',
			 'orderby'      => 'date',
			 'order'      => 'ASC',
			 'show_count'   => 1,
			 'pad_counts'   => 0,
			 'hierarchical' => 1,
			 'title_li'     => '',
			 'hide_empty'   => 1,
		);
		$all_categories = get_categories( $args );
		foreach ($all_categories as $cat) {
			echo '<option value="'.esc_html($cat->slug).'">'.esc_html($cat->name).'</option>';
		}
		?>
	</select>
	<label class="screen-reader-text" for="woocommerce-product-search-field-0"><?php esc_html_e('Search for','supermarket'); ?></label>
		<input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="<?php echo esc_attr($supermarket_search_product_text); ?>" value="" name="s">
		<button type="submit" value="Search"><?php esc_html_e('Search','supermarket');?></button>
		<input type="hidden" name="post_type" value="product">

</form>
