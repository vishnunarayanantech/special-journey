<?php
/**
 * This template to displays woocommerce page
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */

get_header();
	$supermarket_settings = supermarket_get_theme_options();
	global $supermarket_content_layout;
	if( $post ) {
		$layout = get_post_meta( get_queried_object_id(), 'supermarket_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	} ?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php woocommerce_content(); ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
<?php 
if( 'default' == $layout ) { //Settings from customizer
	if(($supermarket_settings['supermarket_sidebar_layout_options'] != 'nosidebar') && ($supermarket_settings['supermarket_sidebar_layout_options'] != 'fullwidth')){ ?>
<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'supermarket' ); ?>">
	<?php }
} 
	if( 'default' == $layout ) { //Settings from customizer
		if(($supermarket_settings['supermarket_sidebar_layout_options'] != 'nosidebar') && ($supermarket_settings['supermarket_sidebar_layout_options'] != 'fullwidth')): ?>
		<?php dynamic_sidebar( 'supermarket_woocommerce_sidebar' ); ?>
</aside><!-- end #secondary -->
<?php endif;
	}
?>
</div><!-- end .wrap -->
<?php
get_footer();