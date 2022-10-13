<?php
/**
 * Front Page Features
 *
 * Displays in Corporate template.
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
/* Frontpage Product Featured Brands */
add_action('supermarket_display_front_page_product_brand','supermarket_frontpage_product_brand');
function supermarket_frontpage_product_brand(){
	$supermarket_settings = supermarket_get_theme_options();
	$supermarket_features_title = $supermarket_settings['supermarket_features_title'];
	$supermarket_features_description = $supermarket_settings['supermarket_features_description'];
	$supermarket_list_product_category	= array();
	for ( $i=1; $i <= $supermarket_settings['supermarket_total_brand_features'] ; $i++ ) {
		if( isset ( $supermarket_settings['supermarket_featured_product_brand_' . $i] ) && $supermarket_settings['supermarket_featured_product_brand_' . $i] !='-' ){

			$supermarket_list_product_category	=	array_merge( $supermarket_list_product_category, array( $supermarket_settings['supermarket_featured_product_brand_' . $i] ) );
		}
	}
	if ( (!empty( $supermarket_list_product_category ) || !empty($supermarket_settings['supermarket_features_title']) || !empty($supermarket_settings['supermarket_features_description'])) && ($supermarket_settings['supermarket_disable_product_brand'] == 0) ) { ?>
			<div class="brand-content-box">
				<div class="wrap">
					<div class="brand-wrap">
					<?php

					if($supermarket_features_title  != '' || $supermarket_features_description != ''){
						echo '<div class="box-header">';
						if($supermarket_features_title  != ''){ ?>
							<h2 class="box-title"><?php echo esc_html($supermarket_features_title );?> </h2>
						<?php }
						if($supermarket_features_description != ''){ ?>
							<p class="box-sub-title"><?php echo esc_html($supermarket_features_description); ?></p>
						<?php }
						echo '</div><!-- end .box-header -->';
					} ?>
					<div class="brand-slider">
						<ul class="slides">
							<?php
								$i = 1;

								foreach ($supermarket_list_product_category as $category) {
									$thumbnail_id = get_term_meta( $category, 'thumbnail_id', true );
									$category_link = get_category_link( $category );
									$category_name = get_term( $category );

									$image_attribute = wp_get_attachment_image_src( $thumbnail_id);
									if ( $image_attribute[0] ) { ?>
									<li>
										<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo esc_attr($category_name->name); ?>" target="_blank">
											<img src="<?php echo esc_url( $image_attribute[0] ); ?>" alt="<?php echo esc_attr($category_name->name); ?>" />
										</a>
									</li>
									<?php }
									$i++;
								}; ?>
						</ul>
					</div><!-- end .brand-slider -->
				</div><!-- end .brand-wrap -->
			</div><!-- end .wrap -->
		</div><!-- end .brand-content-box -->
	<?php }
wp_reset_postdata();
}

/* Frontpage Product Categories Icon Slide */
add_action('supermarket_display_front_page_product_categories','supermarket_frontpage_product_categories');
function supermarket_frontpage_product_categories(){
	$supermarket_settings = supermarket_get_theme_options();
	$supermarket_list_product_category	= array();
	for ( $i=1; $i <= $supermarket_settings['supermarket_total_features'] ; $i++ ) {
		if( isset ( $supermarket_settings['supermarket_featured_category_' . $i] ) && $supermarket_settings['supermarket_featured_category_' . $i] !='-' ){

			$supermarket_list_product_category	=	array_merge( $supermarket_list_product_category, array( $supermarket_settings['supermarket_featured_category_' . $i] ) );

		}
	}
	if ( (!empty( $supermarket_list_product_category ) || !empty($supermarket_settings['supermarket_supermarket_features_title']) || !empty($supermarket_settings['supermarket_supermarket_features_description'])) && ($supermarket_settings['supermarket_disable_product_categories'] == 0) ) { ?>
			<div class="category-menu-icon-box">
				<div class="wrap">
					<div class="category-icon-wrap">
						<div class="category-icon-slider">
							<ul class="slides">
								<?php
									$i = 1;
									foreach ($supermarket_list_product_category as $category) {
										$thumbnail_id = get_term_meta( $category, 'thumbnail_id', true );
										$category_link = get_category_link( $category );
										$category_name = get_term( $category );
										$promo_image_attribute = wp_get_attachment_image_src( $thumbnail_id, 'supermarket-product-cat-image' ); ?>

										<li class="item">
											<a href="<?php echo esc_url( $category_link ); ?>">
												<?php if ( $promo_image_attribute[0] ) { ?>
													<img src="<?php echo esc_url( $promo_image_attribute[0] ); ?>" alt="<?php echo esc_attr( $category_name->name ); ?>" />
												<?php }
												if (!empty($category_name->name)){ ?>
													<span><?php echo esc_html( $category_name->name ); ?></span>
												<?php } ?>
											</a>
										</li>
										<?php $i++;
									} ?>
							</ul>
						</div> <!-- end .brand-slider -->
					</div> <!-- end .brand-wrap -->
				</div> <!-- end .wrap -->
			</div> <!-- end .category-menu-icon-box -->
	<?php }
	wp_reset_postdata();
}