<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
/******************** SUPERMARKET CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'supermarket_customize_register_wordpress_default' );
function supermarket_customize_register_wordpress_default( $wp_customize ) {
	$wp_customize->add_panel( 'supermarket_wordpress_default_panel', array(
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'WordPress Settings', 'supermarket' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'supermarket_customize_register_options');
function supermarket_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'supermarket_options_panel', array(
		'priority' => 6,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'supermarket' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'supermarket_customize_register_featuredcontent' );
function supermarket_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'supermarket_featuredcontent_panel', array(
		'priority' => 8,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Slider Options', 'supermarket' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'supermarket_customize_register_frontpage_options');
function supermarket_customize_register_frontpage_options( $wp_customize ) {
	$wp_customize->add_panel( 'supermarket_frontpage_panel', array(
		'priority' => 7,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Frontpage Template', 'supermarket' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'supermarket_customize_register_colors' );
function supermarket_customize_register_colors( $wp_customize ) {
	$wp_customize->add_panel( 'colors', array(
		'priority' => 9,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Colors Section', 'supermarket' ),
		'description' => '',
	) );
}