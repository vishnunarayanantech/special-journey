<?php
/**
 * Custom functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */


/*********************** supermarket Side Menus ***********************************/
function supermarket_side_menus() {

if (has_nav_menu('catalog-menu') ){
	$locations = get_nav_menu_locations();
	$menu_object = get_term( $locations['catalog-menu'], 'nav_menu' ); ?>
	<div class="header-catalog-menu-wrap">
		<button class="show-menu-toggle" type="button">	
		<h3 class="catalog-menu-title"><?php echo esc_html($menu_object->name);  ?></h3>
		</button>


		<?php	$args = array(
				'theme_location' => 'catalog-menu',
				'container'      => '',
				'items_wrap'     => '<ul class="cat-nav-menu">%3$s</ul>',
				);

			$locations = get_nav_menu_locations();
			$menu_object = get_term( $locations['catalog-menu'], 'nav_menu' );

			 ?>
		<div class="catalog-menu-box">
			<div class="catalog-menu-wrap">
				<button class="hide-menu-toggle" type="button">
					<span class="screen-reader-text"><?php echo esc_html($menu_object->name);  ?></span>
					<span class="bars"></span>
				</button>
				<nav class="catalog-menu" role="navigation" aria-label="<?php esc_attr_e('Catalog Menu','supermarket');?>">
					
					<?php wp_nav_menu($args); ?>

				</nav> <!-- end .catalog-menu -->
			</div> <!-- end .catalog-menu-wrap -->
		</div> <!-- end .catalog-menu-box -->
	</div> <!-- end .header-catalog-menu-wrap -->
<?php }
}

add_action ('supermarket_side_nav_menu','supermarket_side_menus');

/*********************** supermarket Category SLIDERS ***********************************/
function supermarket_category_sliders() {
	$supermarket_settings = supermarket_get_theme_options();
	$supermarket_slider_sliderfullwidth = $supermarket_settings['supermarket_slider_sliderfullwidth'];
	if($supermarket_settings['supermarket_default_category']=='post_category'){
		$category = $supermarket_settings['supermarket_default_category_slider'];
		$query = new WP_Query(array(
					'posts_per_page' =>  intval($supermarket_settings['supermarket_slider_number']),
					'post_type' => array(
						'post'
					) ,
					'category_name' => esc_attr($supermarket_settings['supermarket_default_category_slider']),
				));
	} else {
		$category = $supermarket_settings['supermarket_category_slider'];
		$query = new WP_Query( array(
			'post_type' => 'product',
			'orderby'   => 'date',
			'tax_query' => array(
				array(
					'taxonomy'  => 'product_cat',
					'field'     => 'id',
					'terms'     => intval($category),
				)
			),
			'posts_per_page' => intval($supermarket_settings['supermarket_slider_number']),
			) );
	}
	

	if($query->have_posts() && !empty($category)){ ?>
		<div class="main-slider <?php if ($supermarket_settings['supermarket_disable_slide_animation'] == 'on'){ echo 'animation-right'; } ?>">
			<div class="layer-slider">
				<ul class="slides">
					<?php while ($query->have_posts()):$query->the_post(); ?>
					<li>
						<div class="image-slider">
							<article class="slider-content">
								<div class="slider-image-content">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
											<?php if ($supermarket_slider_sliderfullwidth==1){
												the_post_thumbnail();
											} else {
												the_post_thumbnail('supermarket-slider');

											} ?>
										</a>
									<?php } ?>
								</div>
								<!-- .slider-image-content -->
								<div class="slider-text-content">
									<div class="slider-text-wrap">
										<h2 class="slider-header"><?php the_title(); ?></h2>
										<div class="slider-text"><?php the_content(); ?></div>
									</div>
									<!-- end .slider-text-wrap -->
									<?php if ($supermarket_settings['supermarket_shopnow_text'] != ''){ ?>
										<div class="slider-link">
											<a class="btn-default" href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html ($supermarket_settings['supermarket_shopnow_text']); ?></a>
										</div> <!-- end .slider-link -->
									<?php } ?>
								</div>
								<!-- end .slider-text-content -->
							</article>
							<!-- end .slider-content -->
						</div>
						<!-- end .image-slider -->
					</li>
					<?php endwhile;
					wp_reset_postdata();
					?>
				</ul>
				<!-- end .slides -->	
			</div>
			<!-- end .layer-slider -->
		</div>
		<!-- end .main-slider -->

<?php }
}

/*********************** supermarket Product Promotion ***********************************/
function supermarket_product_promotion() {
	$supermarket_settings = supermarket_get_theme_options();
	$supermarket_hide_slider_text = $supermarket_settings['supermarket_hide_slider_text'];
	?>

	<div class="product-promotion">
		<div class="product-promotion-wrap">
			<?php for ( $i=1; $i <= 2; $i++ ) {
				if( !empty( $supermarket_settings[ 'supermarket_img-product-promotion-image-'. $i ] ) ) { 
					$product_promotion = $supermarket_settings[ 'supermarket_img-product-promotion-image-'. $i ];
					$product_promotion_name = $supermarket_settings[ 'supermarket_product_promotion_name_'. $i ];
					$product_promotion_desc = $supermarket_settings[ 'supermarket_product_promotion_desc_'. $i ];
					if (!empty ($product_promotion)): ?>
					<div class="product-promotion-content">
						<div class="product-promotion-img">
							<a class="product-promotion-link" href="<?php echo esc_url ($supermarket_settings['supermarket_product_promotion_url_'.$i]); ?>"><img src="<?php echo esc_url ($product_promotion); ?>"></a>
						</div>
						<?php if ($supermarket_hide_slider_text =='off'){ ?>
						<div class="product-promotion-text-content">
							<a class="product-promotion-link" href="<?php echo esc_url ($supermarket_settings['supermarket_product_promotion_url_'.$i]); ?>">
								<?php if( !empty( $product_promotion_name ) ) { ?>
									<h4 class="product-promotion-header"><?php echo esc_html ($product_promotion_name); ?></h4>
								<?php } ?>
							</a>
							<?php if( !empty( $product_promotion_desc ) ) { ?>
							<p class="product-promotion-text"><?php echo esc_html ($product_promotion_desc);?></p>
						<?php } ?>
						</div>
					<?php } ?>
					</div> <!-- end .product-promotion-content -->
					<?php endif;
				} 
			}?>
		</div>
		<!-- end .product-promotion-wrap -->
	</div>
	<!-- end .product-promotion -->
<?php
}

add_action ('supermarket_product_promotions','supermarket_product_promotion');