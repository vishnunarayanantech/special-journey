<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
$supermarket_categories_lists = supermarket_categories_lists();

/******************** SUPERMARKET SLIDER SETTINGS ******************************************/
$supermarket_settings = supermarket_get_theme_options();
$wp_customize->add_section( 'featured_content', array(
	'title' => __( 'Slider Settings', 'supermarket' ),
	'priority' => 140,
	'panel' => 'supermarket_featuredcontent_panel'
));

$wp_customize->add_section( 'product_promotion', array(
	'title' => __( 'Product Promotion', 'supermarket' ),
	'priority' => 150,
	'panel' => 'supermarket_featuredcontent_panel'
));


/* WooCommerce Slider Category Section */

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_enable_slider]', array(
	'default' => $supermarket_settings['supermarket_enable_slider'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_enable_slider]', array(
	'priority'=>5,
	'label' => __('Enable Slider/ Promotions', 'supermarket'),
	'description' => __('This section includes Catalog Menu, Slider and Product Promotion', 'supermarket'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'frontpage' => __('Front Page','supermarket'),
		'enitresite' => __('Entire Site','supermarket'),
		'disable' => __('Disable Slider Promotions','supermarket'),
	),
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_disable_slide_animation]', array(
	'default' => $supermarket_settings['supermarket_disable_slide_animation'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_disable_slide_animation]', array(
	'priority'=>10,
	'label' => __('Disable Slide animation', 'supermarket'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'on' => __('Show','supermarket'),
		'off' => __('Disable','supermarket'),
	),
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_hide_slider_text]', array(
	'default' => $supermarket_settings['supermarket_hide_slider_text'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_hide_slider_text]', array(
	'priority'=>12,
	'label' => __('Disable Slider Text', 'supermarket'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'on' => __('Disable','supermarket'),
		'off' => __('Show','supermarket'),
	),
));


$wp_customize->add_setting( 'supermarket_theme_options[supermarket_default_category]', array(
	'default' => $supermarket_settings['supermarket_default_category'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_default_category]', array(
	'priority'=>15,
	'label' => __('Category/ Product Category Slider', 'supermarket'),
	'description' => __('You need to enable WooCommerce Plugins to display Products on Slider','supermarket'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'post_category' => __('Default Category','supermarket'),
		'product_category' => __('Product Category','supermarket'),
	),
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_shopnow_text]', array(
	'default' => $supermarket_settings['supermarket_shopnow_text'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_shopnow_text]', array(
	'priority'=>20,
	'label' => __('Change Slider Text', 'supermarket'),
	'section' => 'featured_content',
	'type' => 'text',
));



if(class_exists( 'woocommerce' )) {
	$supermarket_prod_categories_lists = supermarket_product_categories_lists();

		$wp_customize->add_setting(
			'supermarket_theme_options[supermarket_category_slider]', array(
				'default'				=>array(),
				'capability'			=> 'manage_options',
				'sanitize_callback'	=> 'supermarket_sanitize_category_select',
				'type'				=> 'option'
			)
		);
		$wp_customize->add_control(
			'supermarket_theme_options[supermarket_category_slider]',
			array(
				'priority'    => 20,
				'label'       => __( 'Select Products Category Slider', 'supermarket' ),
				'description' => __('Slider Recommended image size is ( 1500 X 850 )','supermarket'),
				'section'     => 'featured_content',
				'settings'				=> 'supermarket_theme_options[supermarket_category_slider]',
				'choices'     => $supermarket_prod_categories_lists,
				'type'        => 'select',
				'active_callback' => 'supermarket_product_category_callback',
			)
		);
}

		$wp_customize->add_setting( 'supermarket_theme_options[supermarket_default_category_slider]', array(
				'default'				=>$supermarket_settings['supermarket_default_category_slider'],
				'capability'			=> 'manage_options',
				'sanitize_callback'	=> 'supermarket_sanitize_category_select',
				'type'				=> 'option'
			));
		$wp_customize->add_control(
			
			'supermarket_theme_options[supermarket_default_category_slider]',
				array(
					'priority' 				=> 10,
					'label'					=> __('Select Post Category Slider','supermarket'),
					'description'					=> __('By default no slider is displayed. Slider Recommended image size is ( 1500 X 850 )','supermarket'),
					'section'				=> 'featured_content',
					'settings'				=> 'supermarket_theme_options[supermarket_default_category_slider]',
					'type'					=>'select',
					'active_callback' => 'supermarket_post_category_callback',
					'choices'	=>  $supermarket_categories_lists 
			)
		);

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_animation_effect]', array(
	'default' => $supermarket_settings['supermarket_animation_effect'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_animation_effect]', array(
	'priority'=>30,
	'label' => __('Animation Effect', 'supermarket'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'slide' => __('Slide','supermarket'),
		'fade' => __('Fade','supermarket'),
	),
));

/*************** Slider Text Background Color ************************/
    $wp_customize->add_setting('supermarket_theme_options[supermarket_slider_text_bg_col]', array(
        'default'        => $supermarket_settings['supermarket_slider_text_bg_col'],
        'sanitize_callback' => 'supermarket_sanitize_select',
        'type'                  => 'option',
        'capability'            => 'manage_options'
    ));
    $wp_customize->add_control('supermarket_theme_options[supermarket_slider_text_bg_col]', array(
        'priority'      => 30,
        'label'      => __('Slider and Promotion Text Background Color', 'supermarket'),
        'section'    => 'featured_content',
        'type'       => 'select',
        'checked'   => 'checked',
        'choices'    => array(
            'on' => __('On','supermarket'),
            'off' => __('Off','supermarket'),
        ),
    ));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_slideshowSpeed]', array(
	'default' => $supermarket_settings['supermarket_slideshowSpeed'],
	'sanitize_callback' => 'supermarket_numeric_value',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_slideshowSpeed]', array(
	'priority'=>40,
	'label' => __('Set the speed of the slideshow cycling', 'supermarket'),
	'section' => 'featured_content',
	'type' => 'text',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_animationSpeed]', array(
	'default' => $supermarket_settings['supermarket_animationSpeed'],
	'sanitize_callback' => 'supermarket_numeric_value',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_animationSpeed]', array(
	'priority'=>50,
	'label' => __(' Set the speed of animations', 'supermarket'),
	'description' => __('This feature will not work on Animation Effect set to fade','supermarket'),
	'section' => 'featured_content',
	'type' => 'text',
));

/********************** Product Promotion Image ***********************************/
for ( $i=1; $i <= 2; $i++ ) {
	$wp_customize->add_setting( 'supermarket_theme_options[supermarket_product_promotion_name_'.$i.']', array(
		'default' => $supermarket_settings['supermarket_product_promotion_name_'.$i],
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'supermarket_theme_options[supermarket_product_promotion_name_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __(' Enter Text #', 'supermarket')  .$i,
		'section' => 'product_promotion',
		'type' => 'text',
	));
	$wp_customize->add_setting( 'supermarket_theme_options[supermarket_img-product-promotion-image-'.$i.']',array(
		'default'	=> $supermarket_settings['supermarket_img-product-promotion-image-'.$i],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'supermarket_theme_options[supermarket_img-product-promotion-image-'.$i.']', array(
		'label' => __('Product Promotion #','supermarket') .$i,
		'priority'=>10 .$i,
		'description' => __('Recommended Image size ( 648 X 340 )','supermarket'),
		'section' => 'product_promotion',
		)
	));

	$wp_customize->add_setting( 'supermarket_theme_options[supermarket_product_promotion_url_'.$i.']', array(
		'default' => $supermarket_settings['supermarket_product_promotion_url_'.$i],
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'supermarket_theme_options[supermarket_product_promotion_url_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __(' Enter Product Url #', 'supermarket')  .$i,
		'section' => 'product_promotion',
		'type' => 'text',
	));
}


	