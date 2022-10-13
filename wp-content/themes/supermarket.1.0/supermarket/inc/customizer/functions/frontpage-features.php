<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */

/******************** SUPERMARKET FRONTPAGE  *********************************************/
/* Frontpage Supermarket */
$supermarket_settings = supermarket_get_theme_options();
$supermarket_prod_categories_lists = supermarket_product_categories_lists();

$wp_customize->add_section( 'supermarket_product_category', array(
	'title' => __('Product Categories Icon Slide','supermarket'),
	'priority' => 10,
	'panel' =>'supermarket_frontpage_panel'
));

$wp_customize->add_section( 'supermarket_frontpage_features', array(
	'title' => __('Product Featured Brands','supermarket'),
	'priority' => 20,
	'panel' =>'supermarket_frontpage_panel'
));

/* Frontpage Product Featured Brands */
$wp_customize->add_setting( 'supermarket_theme_options[supermarket_disable_product_brand]', array(
	'default' => $supermarket_settings['supermarket_disable_product_brand'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_disable_product_brand]', array(
	'priority' => 5,
	'label' => __('Disable Product Brand Section', 'supermarket'),
	'section' => 'supermarket_frontpage_features',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_features_title]', array(
	'default' => $supermarket_settings['supermarket_features_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'supermarket_theme_options[supermarket_features_title]', array(
	'priority' => 20,
	'label' => __( 'Title', 'supermarket' ),
	'section' => 'supermarket_frontpage_features',
	'type' => 'text',
	)
);

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_features_description]', array(
	'default' => $supermarket_settings['supermarket_features_description'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'supermarket_theme_options[supermarket_features_description]', array(
	'priority' => 25,
	'label' => __( 'Description', 'supermarket' ),
	'section' => 'supermarket_frontpage_features',
	'type' => 'text',
	)
);

for ( $i=1; $i <= $supermarket_settings['supermarket_total_brand_features'] ; $i++ ) {
	$wp_customize->add_setting(
		'supermarket_theme_options[supermarket_featured_product_brand_'. $i .']', array(
			'default'				=>'',
			'capability'			=> 'manage_options',
			'sanitize_callback'	=> 'supermarket_sanitize_category_select',
			'type'				=> 'option'
		)
	);
	$wp_customize->add_control(
		'supermarket_theme_options[supermarket_featured_product_brand_'. $i .']',
		array(
			'priority' => 20 . absint($i),
			'label'       => __( 'Featured Products Brand #', 'supermarket' ) . $i,
			'section'     => 'supermarket_frontpage_features',
			'choices'     => $supermarket_prod_categories_lists,
			'type'        => 'select',
		)
	);
}

/* Product Categories Slide Icon */
$wp_customize->add_setting( 'supermarket_theme_options[supermarket_disable_product_categories]', array(
	'default' => $supermarket_settings['supermarket_disable_product_categories'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_disable_product_categories]', array(
	'priority' => 10,
	'label' => __('Disable Product Category Section', 'supermarket'),
	'section' => 'supermarket_product_category',
	'type' => 'checkbox',
));

$wp_customize->add_setting('supermarket_theme_options[supermarket_total_features]', array(
	'default' => $supermarket_settings['supermarket_total_features'],
	'sanitize_callback' => 'supermarket_numeric_value',
	'type' => 'option',
	'capability' => 'manage_options'
	));
$wp_customize->add_control('supermarket_theme_options[supermarket_total_features]', array(
	'priority' => 10,
	'label' => __('No of Categroy Features', 'supermarket'),
	'section' => 'supermarket_product_category',
	'type' => 'text',
	) );

$wp_customize->add_setting('supermarket_theme_options[supermarket_cat_slide]', array(
		'default'        => $supermarket_settings['supermarket_cat_slide'],
		'sanitize_callback' => 'supermarket_sanitize_select',
		'type'                  => 'option',
		'capability'            => 'manage_options'
	));
$wp_customize->add_control('supermarket_theme_options[supermarket_cat_slide]', array(
	'priority'  =>15,
	'label'      => __('Display Category Icon Slide', 'supermarket'),
	'section'    => 'supermarket_product_category',
	'type'       => 'select',
	'choices'    => array(
	'above-slider' => __('Above Slider','supermarket'),
	'below-slider' => __('Below Slider','supermarket'),
	),
));

for ( $i=1; $i <= $supermarket_settings['supermarket_total_features'] ; $i++ ) {
	$wp_customize->add_setting(
		'supermarket_theme_options[supermarket_featured_category_'. $i .']', array(
			'default'				=>'',
			'capability'			=> 'manage_options',
			'sanitize_callback'	=> 'supermarket_sanitize_category_select',
			'type'				=> 'option'
		)
	);
	$wp_customize->add_control(
		'supermarket_theme_options[supermarket_featured_category_'. $i .']',
		array(
			'priority' => 50 . absint($i),
			'label'       => __( 'Featured Products category #', 'supermarket' ) . $i ,
			'section'     => 'supermarket_product_category',
			'choices'     => $supermarket_prod_categories_lists,
			'type'        => 'select',
		)
	);
}