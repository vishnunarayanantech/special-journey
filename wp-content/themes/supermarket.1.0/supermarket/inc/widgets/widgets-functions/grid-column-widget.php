<?php

/**
 * Display Category grid widget
 *
 * @package Theme Freesia
 * @subpackage Magbook
 * @since Magbook 1.0
 */

class Supermarket_product_grid_column_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {
		$widget_ops = array( 'classname' => 'supermarket-grid-widget', 'description' => __( 'Displays Grid Column Widget in Supermarket Template', 'supermarket') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name=__('TF: Product Grid Column Widget','supermarket'), $widget_ops, $control_ops );
	}


	function form($instance) {
		$instance = wp_parse_args(( array ) $instance, array('title' => '','number' => '5','category' => '', 'product_type'=>'latest','countdown' => '', 'animation' => 'off', 'deal_of_the_day' =>'off', 'title_style' =>'on', 'have_border' => 'on' ));
		$title    = esc_attr($instance['title']);
		$number = absint( $instance[ 'number' ] );
		$category = absint($instance[ 'category' ]);
		$product_type = esc_attr($instance[ 'product_type' ]);
		$countdown = esc_attr($instance[ 'countdown' ]);
		$animation = esc_attr($instance[ 'animation' ]);
		$deal_of_the_day = esc_attr($instance['deal_of_the_day']);
		$title_style = esc_attr($instance['title_style']);
		$have_border = esc_attr($instance['have_border']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'animation' ); ?>"><?php _e( 'Animation:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'animation' ); ?>" name="<?php echo $this->get_field_name( 'animation' ); ?>">
				<option value="on" <?php selected( $instance['animation'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['animation'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'deal_of_the_day' ); ?>"><?php _e( 'Widget Deal of the Day:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'deal_of_the_day' ); ?>" name="<?php echo $this->get_field_name( 'deal_of_the_day' ); ?>">
				<option value="on" <?php selected( $instance['deal_of_the_day'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['deal_of_the_day'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
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
		<p>
			<label for="<?php echo $this->get_field_id('title');?>">
				<?php _e('Title:', 'supermarket');?>
			</label>
			<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
			<?php _e( 'Number of Post:', 'supermarket' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo absint($number); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('countdown');?>">
				<?php _e('Countdown:', 'supermarket');?>
			</label>
			<input id="<?php echo $this->get_field_id('countdown');?>" name="<?php echo $this->get_field_name('countdown');?>" type="text" value="<?php echo esc_attr($countdown);?>" />
		</p>
			<span><?php _e('Example (Date Format(yy/mm/dd)):','supermarket'); ?></span>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select Product Category', 'supermarket' ); ?>:</label>
			<?php  wp_dropdown_categories( array( 'show_option_none' => __( '-- Select Category --', 'supermarket' ),'name' => $this->get_field_name( 'category'), 'selected' => $category, 'taxonomy'	=> 'product_cat', 'hide_empty' => 0, 'hide_if_empty' => false, 'hierarchical'     => true, ) ); ?>
			<br>
			<span><?php _e('Product Category will display only  when Category is selected from Options dropdown. ','supermarket'); ?></span>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'product_type' ); ?>"><?php _e( 'Options:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'product_type' ); ?>" name="<?php echo $this->get_field_name( 'product_type' ); ?>">
				<option value="latest" <?php selected( $instance['product_type'], 'latest'); ?>><?php _e( 'All Latest', 'supermarket' ); ?></option>
				<option value="category" <?php selected( $instance['product_type'], 'category'); ?>><?php _e( 'Category', 'supermarket' ); ?></option>
			</select>
		</p>

		<?php
	}
	function update($new_instance, $old_instance) {

		$instance  = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance[ 'number' ] = absint( $new_instance[ 'number' ] );
		$instance[ 'category' ] = absint($new_instance[ 'category' ]);
		$instance[ 'product_type' ] = sanitize_text_field($new_instance[ 'product_type' ]);
		$instance[ 'countdown' ] = sanitize_text_field($new_instance[ 'countdown' ]);
		$instance['animation'] = sanitize_key($new_instance['animation']);
		$instance['deal_of_the_day'] = sanitize_key($new_instance['deal_of_the_day']);
		$instance['title_style'] = sanitize_key($new_instance['title_style']);
		$instance['have_border'] = sanitize_key($new_instance['have_border']);
		return $instance;
	}
	function widget($args, $instance) {
		extract($args);
		extract($instance);
		$animation = isset( $instance[ 'animation' ] ) ? $instance[ 'animation' ] : 'off';
		$deal_of_the_day = isset( $instance[ 'deal_of_the_day' ] ) ? $instance[ 'deal_of_the_day' ] : 'off';
		$title_style = isset($instance['title_style']) ? $instance['title_style']:'on';
		$have_border = isset( $instance[ 'have_border' ] ) ? $instance[ 'have_border' ] : 'on';
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$countdown = isset( $instance[ 'countdown' ] ) ? $instance[ 'countdown' ] : '';
		$number = empty( $instance[ 'number' ] ) ? 5 : $instance[ 'number' ];
		$category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$product_type = isset( $instance[ 'product_type' ] ) ? $instance[ 'product_type' ] : 'latest';

		if ( $product_type == 'category' ){  // Displays Selected Category
			$args = array(
				'posts_per_page' => absint($number),
				'post_type' => 'product',
				'tax_query' => array(
					array(
						'taxonomy'  => 'product_cat',
						'field'     => 'term_id',
						'terms'     => $category
					)
				),
			);

		} else {
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => absint($number),
				'orderby'	=> 'date',
				'order'	=> 'DESC',
			);
		} ?>
		<section class="widget supermarket-grid-widget <?php if ($deal_of_the_day =='on'){ echo 'deal-of-day';} ?>">
			<?php if ($animation == 'on'){ ?>
				<div class="animation-bubble">
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
					<div class="bubble"></div>
				</div>
			<?php } ?>
			<div class="widget-outer-wrap">
				<div class="wrap">
					<div class="widget-inner-wrap <?php if ($have_border =='on'){ echo 'have-border'; }  if ($title_style =='on' && $deal_of_the_day =='on' ){ echo ''; } elseif ( $title_style =='on' && $deal_of_the_day =='off'){ echo ' title-style'; } ?>">
			
						<?php
						if ( $title!=''){ ?>
							<h2 class="widget-title">
								<?php echo esc_html($title); ?>
							</h2><!-- end .widget-title -->
						<?php	}
						if ( $countdown!=''){ ?>
						<div class="countdown">
							<span id="datecounter" data-countdown="<?php echo esc_attr($countdown); ?>"></span>
						</div>
						<?php } ?>
						<div class="supermarket-grid-widget-wrap five-column-grid">

							<?php
							$get_featured_posts = new WP_Query( $args );

							while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
								$product = wc_get_product( $get_featured_posts->post->ID );
								$thumbnail_id = get_post_thumbnail_id();
								$image_attribute = wp_get_attachment_image_src($thumbnail_id,'supermarket-grid-product-image', false);  ?>
								<div <?php post_class('supermarket-grid-product'); ?>>
									<div class="supermarket-grid-product-inner">
										<?php if ( $image_attribute[0] ) { ?>
										<figure class="sc-grid-product-img">
											<?php if ( $product->is_on_sale() ) { ?>
												<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'supermarket' ) . '</span>', $product ); ?>
											<?php } ?>
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
											</div> <!-- end .product-item-utility -->
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
								</div><!-- end .supermarket-grid-product -->

							<?php endwhile;
							wp_reset_postdata();
							?>
						</div> <!-- end .supermarket-grid-widget-wrap -->
					</div> <!-- end .widget-inner-wrap -->

	<?php 	echo $after_widget .'<!-- end .supermarket-index-info-widget -->';
	}
}