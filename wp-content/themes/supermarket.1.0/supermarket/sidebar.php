<?php
/**
 * The sidebar containing the main Sidebar area.
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
	$supermarket_settings = supermarket_get_theme_options();
	global $supermarket_content_layout;
	if( $post ) {
		$layout = get_post_meta( get_queried_object_id(), 'supermarket_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}

if( 'default' == $layout ) { //Settings from customizer
	if(($supermarket_settings['supermarket_sidebar_layout_options'] != 'nosidebar') && ($supermarket_settings['supermarket_sidebar_layout_options'] != 'fullwidth')){ ?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'supermarket' ); ?>">
<?php }
}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'supermarket' ); ?>">
  <?php }
	}?>
  <?php 
	if( 'default' == $layout ) { //Settings from customizer
		if(($supermarket_settings['supermarket_sidebar_layout_options'] != 'nosidebar') && ($supermarket_settings['supermarket_sidebar_layout_options'] != 'fullwidth')): ?>
  <?php dynamic_sidebar( 'supermarket_main_sidebar' ); ?>
</aside><!-- end #secondary -->
<?php endif;
	}else{ // for page/post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){
			dynamic_sidebar( 'supermarket_main_sidebar' );
			echo '</aside><!-- end #secondary -->';
		}
	}