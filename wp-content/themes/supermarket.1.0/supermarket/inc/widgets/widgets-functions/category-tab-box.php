<?php
/**
 * Display Category tab box widgets
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
/**************** Category tab box ***************************/
class supermarket_category_tab_box_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'supermarket-cat-tab-box-widget', 'description' => __('Display category tab box for Supermarket Template', 'supermarket'));
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct(false, $name = __('TF: Product Category Tab Box', 'supermarket'), $widget_ops, $control_ops);
	}
	function form($instance) {
		$instance           = wp_parse_args((array) $instance, array('title' => '', 'cat_no'	=> '3','number' => '5', 'title_style' =>'on', 'have_border' => 'on', 'category1' => '','category2' => '','category3' => ''));


		$title = esc_html($instance['title']);
		$number = absint( $instance[ 'number' ] );
		$cat_no = absint( $instance[ 'cat_no' ] );
		$title_style = esc_attr($instance['title_style']);
		$have_border = esc_attr($instance['have_border']);

		for($i=1; $i<=$cat_no; $i++){ 
			$category = 'category'.$i;
			$defaults[$category] = '';
		}
		$instance = wp_parse_args((array)$instance, $defaults);

		for ($i = 1; $i <= $cat_no; $i++) {
			$category = 'category'.$i;
			$category = absint($instance[$category]);
		
		}

		?>
		<p>
			<label for="<?php echo $this->get_field_id('cat_no'); ?>">
			<?php _e( 'Number of Product Category:', 'supermarket' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('cat_no'); ?>" name="<?php echo $this->get_field_name('cat_no'); ?>" type="text" value="<?php echo absint($cat_no); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
			<?php _e( 'Number of Product:', 'supermarket' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo absint($number); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e( 'Title:', 'supermarket' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_style' ); ?>"><?php _e( 'Widget Title Design:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'title_style' ); ?>" name="<?php echo $this->get_field_name( 'title_style' ); ?>">
				<option value="on" <?php selected( $instance['title_style'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['title_style'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'have_border' ); ?>"><?php _e( 'Border:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'have_border' ); ?>" name="<?php echo $this->get_field_name( 'have_border' ); ?>">
				<option value="on" <?php selected( $instance['have_border'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['have_border'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
		</p>

		<?php for($i=1; $i<=$cat_no; $i++){ ?>

		<p>
			<label for="<?php echo $this->get_field_id( key($defaults) ); ?>"><?php _e( 'Select Product Tab Category #', 'supermarket' ); echo absint($i); ?>:</label>
			<?php  wp_dropdown_categories( array( 'show_option_none' => __( '-- Select Category --', 'supermarket' ),'name' => $this->get_field_name( key($defaults) ), 'selected' => $instance[key($defaults)], 'taxonomy'	=> 'product_cat', 'hide_empty' => 0, 'hide_if_empty' => false, 'hierarchical'     => true, ) ); ?>
			<br>
		</p>
	<?php next($defaults);
		}
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance[ 'cat_no' ] = absint( $new_instance[ 'cat_no' ] );
		$instance[ 'number' ] = absint( $new_instance[ 'number' ] );
		$instance['title_style'] = sanitize_key($new_instance['title_style']);
		$instance['have_border'] = sanitize_key($new_instance['have_border']);
		for($i=1; $i<=$instance[ 'cat_no' ]; $i++){ 
			$category = 'category'.$i;
			$instance[$category] = absint($new_instance[$category]);
		}
		return $instance;
	}

	function widget($args, $instance) {
		extract($args);
		extract($instance);
		$number = empty( $instance[ 'number' ] ) ? 3 : $instance[ 'number' ];
		$cat_no = empty( $instance[ 'cat_no' ] ) ? 3 : $instance[ 'cat_no' ];
		$title = isset($instance['title']) ? $instance['title']:'';
		$title_style = isset($instance['title_style']) ? $instance['title_style']:'on';
		$have_border = isset( $instance[ 'have_border' ] ) ? $instance[ 'have_border' ] : 'on';
		$category_array         = array();
		for ($i = 1; $i <=$cat_no; $i++) {
				$category     = 'category'.$i;
				$category = isset($instance[$category])?$instance[$category]:'';
				if (!empty($category)) {
					array_push($category_array, $category);
				}

			}

		echo $before_widget;
?>

	<div class="widget-inner-wrap <?php if ($title_style =='on'){ echo ' title-style '; } if ($have_border =='on'){ echo ' have-border '; }  ?>">
		<?php if(!empty($title)){ ?>
			<h2 class="widget-title"><?php echo esc_html ($title); ?></h2>
		<?php } ?>
		<div class="cat-tab-wrapper">
			<div class="banner-tab-header">
				<div class="cat-tab-menu-text">
					<?php
					$i =1; ?>
						<ul class="cat-tab-menu">
							<?php foreach ( $category_array as $category_tab_widget) {
							$category_name = get_term( $category ); ?>
								<li class="cl-<?php echo absint($category_tab_widget);  if ( $i==1 ){ echo ' active '; } ?>"><?php echo esc_html( get_the_category_by_ID($category_tab_widget) ); ?></li>
								
							<?php $i++;
							}
							wp_reset_postdata();
							 ?>
						</ul> <!-- end .cat-tab-menu -->
				</div>
			</div>
			<div class="cat-tabs-container five-column-grid">

				<?php foreach ( $category_array as $category_tab_widget) {
					$get_featured_posts = new WP_Query( array(
				'posts_per_page' => absint($number),
				'post_type' => 'product',
				'tax_query' => array(
					array(
						'taxonomy'  => 'product_cat',
						'field'     => 'term_id',
						'terms'     => absint($category_tab_widget)
					)
				),
			));
			?>
			<div class="cat-tab-content">
				<div class="cat-tab-content-wrap">
					<div class="supermarket-grid-widget-wrap">
						<?php  $j = 1;
							while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
								$product = wc_get_product( $get_featured_posts->post->ID );
								$thumbnail_id = get_post_thumbnail_id();
								$image_attribute = wp_get_attachment_image_src($thumbnail_id,'supermarket-grid-product-image', false); ?>
								<div <?php post_class('supermarket-grid-product'); ?>>
									<div class="supermarket-grid-product-inner">
										<?php if ( $image_attribute[0] ) { ?>
										<figure class="sc-grid-product-img">
											<?php if ( $product->is_on_sale() ) {
												echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'supermarket' ) . '</span>', $product );
											} ?>
										   <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" alt="<?php the_title_attribute();?>">
												<img src="<?php echo esc_url( $image_attribute[0] ); ?>" alt="<?php the_title_attribute();?>">
											</a>
										    <div class="product-item-utility">
												<ul>
													<?php
													if( class_exists( 'YITH_WCQV' ) ) { ?>
														<li>
														<a class="opopup-info product-preview yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>" data-tippy-content="<?php echo esc_attr( get_option( 'yith-wcqv-button-label' ) ); ?>" href="#"><span><?php esc_html_e('Preview','supermarket') ;?></span></a>
														</li>
													<?php }
													if( function_exists( 'YITH_WCWL' ) ){
												    $wishlist_url = add_query_arg( 'add_to_wishlist', $product->get_id() ); ?>
												    <li>
												        <div class="yith-wcwl-add-to-wishlist">
														    <div class="yith-wcwl-add-button">
														    	<a href="<?php echo esc_url($wishlist_url); ?>" class="product_add_to_wishlist popup-info" title="<?php esc_attr_e('Add to Wishlist','supermarket'); ?>"><span><?php esc_html_e('Add to Wishlist','supermarket'); ?></span></a>
													    	</div>
													    </div>
													</li>
												<?php } ?>
												</ul>
											</div>
											<!-- end .product-item-utility -->
											<?php  if ( $product->is_on_backorder() ) { ?>
											<div class="available-on-back-order"><span> <?php esc_html_e('On backorder','supermarket'); ?></span></div>
										<?php } elseif ( !$product->is_in_stock() ) { ?>
										 <div class="badge-sold-out"><span><?php esc_html_e('Out of Stock','supermarket'); ?></span></div>
										<?php } ?>
										</figure>
										<?php } ?>
										<div class="sc-grid-product-content">
											<?php	if ( $supermarket_rating = wc_get_rating_html( $product->get_average_rating() ) ){
												echo '<div class="woocommerce-product-rating woocommerce">' .wp_kses_post( $supermarket_rating ) . ' </div>';

											} ?>
											
									        <h2 class="sc-grid-product-title"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<?php if ( $price_html = $product->get_price_html() ) : ?>
												<span class="price">
													<?php echo  wp_kses_post($price_html); ?>
												</span>
										    	<?php endif; ?>
									    	<div class="product-item-action">
												   <?php woocommerce_template_loop_add_to_cart( $product ); ?>
											</div>
										</div> <!-- end .sc-grid-product-content -->
									</div> <!-- end .supermarket-grid-product-inner -->
								</div> <!-- end .supermarket-grid-product -->
						
						<?php $j++;
							endwhile;
							wp_reset_postdata(); ?>
					</div> <!-- end .supermarket-grid-widget-wrap -->
				</div> <!-- end .cat-tab-content-wrap -->
			</div> <!-- end .cat-tab-content -->
				<?php
			} ?>
			</div>
			<!-- end .cat-tabs-container -->
		</div> <!-- end .cat-tab-wrapper -->
	</div> <!-- end .widget-inner-wrap -->

	<?php echo $after_widget . ' <!-- end .supermarket-cat-tab-box-widget -->'; 
	}

}