<?php
/**
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
/**************** SUPERMARKET REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'supermarket_widgets_init');
function supermarket_widgets_init() {

	register_sidebar(array(
			'name' => __('Main Sidebar', 'supermarket'),
			'id' => 'supermarket_main_sidebar',
			'description' => __('Shows widgets at Main Sidebar.', 'supermarket'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Top Header Info', 'supermarket'),
			'id' => 'supermarket_header_info',
			'description' => __('Shows widgets on all page.', 'supermarket'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Header Tel. Info', 'supermarket'),
			'id' => 'supermarket_header_tel_info',
			'description' => __('Drag text widgets and add title as tel info and content as short description', 'supermarket'),
			'before_widget' => '<div class="header-tel-info">',
			'after_widget' => '</div>',
			'before_title' => '<p class="tel-info-title">',
			'after_title' => '</p>',
		));
	register_sidebar(array(
			'name' => __('Supermarket Template', 'supermarket'),
			'id' => 'supermarket_template',
			'description' => __('Shows widgets on Supermarket Template.', 'supermarket'),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-outer-wrap"> <div class="wrap">',
			'after_widget' => '</div><!-- end .wrap --> </div><!-- end .widget-outer-wrap --></section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Contact Page Sidebar', 'supermarket'),
			'id' => 'supermarket_contact_page_sidebar',
			'description' => __('Shows widgets on Contact Page Template.', 'supermarket'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Iframe Code For Google Maps', 'supermarket'),
			'id' => 'supermarket_form_for_contact_page',
			'description' => __('Add Iframe Code using text widgets', 'supermarket'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('WooCommerce Sidebar', 'supermarket'),
			'id' => 'supermarket_woocommerce_sidebar',
			'description' => __('Add WooCommerce Widgets Only', 'supermarket'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));

	for($i =1; $i<= 4; $i++){

		// Registering for Supermarket Template Footer Column
		register_sidebar(array(
			'name'          => __(' Supermarket Template Footer Column ', 'supermarket') . $i,
			'id'            => 'supermarket_template_footer_col_'.$i,
			'description'   => __(' Add WooCommerce widgets at Supermarket Template Footer Column ', 'supermarket').$i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));

	}

	$supermarket_settings = supermarket_get_theme_options();
	for($i =1; $i<= $supermarket_settings['supermarket_footer_column_section']; $i++){
	register_sidebar(array(
			'name' => __('Footer Column ', 'supermarket') . $i,
			'id' => 'supermarket_footer_'.$i,
			'description' => __('Shows widgets at Footer Column ', 'supermarket').$i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	}

	register_widget( 'Supermarket_popular_Widgets' );

	if ( class_exists('woocommerce')) {
		//Register Widget.
		register_widget( 'supermarket_banner_with_text_widget' );
		register_widget( 'supermarket_image_category_widget' );
		register_widget( 'supermarket_category_tab_box_widget' );
		register_widget( 'supermarket_index_text_widget' );
		register_widget( 'Supermarket_product_grid_column_Widget' );
		register_widget( 'Supermarket_category_latest_blog_Widget' );
		
	}
}