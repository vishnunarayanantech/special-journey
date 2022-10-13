<?php
/**
 * Template Name: Supermarket Template
 *
 * Displays the Supermarket page template.
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
$supermarket_settings = supermarket_get_theme_options();

get_header(); ?>

<div class="product-widget-box">
		<?php 
		if (is_active_sidebar('supermarket_template')):

			dynamic_sidebar('supermarket_template');

		endif;

		if ( have_posts() ) {
			the_post();

				the_content (); 
				
			}

		 ?>
</div> <!-- end .product-widget-box -->

<?php

if(class_exists('woocommerce')){

	do_action('supermarket_display_front_page_product_brand'); // Display just before footer column

}

if( is_active_sidebar( 'supermarket_template_footer_col_1' ) || is_active_sidebar( 'supermarket_template_footer_col_2' ) || is_active_sidebar( 'supermarket_template_footer_col_3' ) || is_active_sidebar( 'supermarket_template_footer_col_4' )) { ?>

	<div class="supermarket-template-footer-column">
		<div class="wrap">
			<div class="sc-template-footer-wrap">

				<?php
					for($i =1; $i<= 4; $i++){
						if ( is_active_sidebar( 'supermarket_template_footer_col_'.$i ) ) : ?>
							<div class="sc-footer-column">

								<?php dynamic_sidebar( 'supermarket_template_footer_col_'.$i ); ?>

							</div>

						<?php endif;
					}
				?>
			</div> <!-- end .sc-template-footer-wrap -->
		</div> <!-- end .wrap -->
	</div> <!-- end .supermarket-template-footer-column -->
<?php }
get_footer();