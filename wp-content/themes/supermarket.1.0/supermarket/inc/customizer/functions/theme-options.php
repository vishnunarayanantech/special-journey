<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
$supermarket_settings = supermarket_get_theme_options();
/********************** SUPERMARKET DEFAULT PANEL ***********************************/
$wp_customize->add_section('header_image', array(
'title' => __('Header Media', 'supermarket'),
'priority' => 20,
'panel' => 'supermarket_wordpress_default_panel'
));
$wp_customize->add_section('colors', array(
'title' => __('Colors', 'supermarket'),
'priority' => 30,
'panel' => 'supermarket_wordpress_default_panel'
));
$wp_customize->add_section('background_image', array(
'title' => __('Background Image', 'supermarket'),
'priority' => 40,
'panel' => 'supermarket_wordpress_default_panel'
));
$wp_customize->add_section('nav', array(
'title' => __('Navigation', 'supermarket'),
'priority' => 50,
'panel' => 'supermarket_wordpress_default_panel'
));
$wp_customize->add_section('static_front_page', array(
'title' => __('Static Front Page', 'supermarket'),
'priority' => 60,
'panel' => 'supermarket_wordpress_default_panel'
));
$wp_customize->add_section('title_tagline', array(
	'title' => __('Site Title & Logo Options', 'supermarket'),
	'priority' => 10,
	'panel' => 'supermarket_wordpress_default_panel'
));

$wp_customize->add_section('supermarket_custom_header', array(
	'title' => __('Options', 'supermarket'),
	'priority' => 503,
	'panel' => 'supermarket_options_panel'
));

/********************  SUPERMARKET THEME OPTIONS *****************************************/

$wp_customize->add_setting('supermarket_theme_options[supermarket_header_display]', array(
	'capability' => 'edit_theme_options',
	'default' => $supermarket_settings['supermarket_header_display'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('supermarket_theme_options[supermarket_header_display]', array(
	'label' => __('Site Logo/ Text Options', 'supermarket'),
	'priority' => 105,
	'section' => 'title_tagline',
	'type' => 'select',
		'choices' => array(
		'header_text' => __('Display Site Title Only','supermarket'),
		'header_logo' => __('Display Site Logo Only','supermarket'),
		'show_both' => __('Show Both','supermarket'),
		'disable_both' => __('Disable Both','supermarket'),
	),
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_logo_high_resolution]', array(
	'default' => $supermarket_settings['supermarket_logo_high_resolution'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_logo_high_resolution]', array(
	'priority'=>110,
	'label' => __('Logo for high resolution screen(Use 2X size image)', 'supermarket'),
	'section' => 'title_tagline',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_disable_top_bar]', array(
	'default' => $supermarket_settings['supermarket_disable_top_bar'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_disable_top_bar]', array(
	'priority'=>5,
	'label' => __('Disable Top Bar', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_search_custom_header]', array(
	'default' => $supermarket_settings['supermarket_search_custom_header'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_search_custom_header]', array(
	'priority'=>20,
	'label' => __('Disable Search Form', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_stick_menu]', array(
	'default' => $supermarket_settings['supermarket_stick_menu'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_stick_menu]', array(
	'priority'=>30,
	'label' => __('Disable Stick Menu', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_scroll]', array(
	'default' => $supermarket_settings['supermarket_scroll'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_scroll]', array(
	'priority'=>40,
	'label' => __('Disable Goto Top', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_top_social_icons]', array(
	'default' => $supermarket_settings['supermarket_top_social_icons'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_top_social_icons]', array(
	'priority'=>50,
	'label' => __('Disable Top Social Icons', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_buttom_social_icons]', array(
	'default' => $supermarket_settings['supermarket_buttom_social_icons'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_buttom_social_icons]', array(
	'priority'=>70,
	'label' => __('Disable Bottom Social Icons', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_display_page_single_featured_image]', array(
	'default' => $supermarket_settings['supermarket_display_page_single_featured_image'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_display_page_single_featured_image]', array(
	'priority'=>100,
	'label' => __('Disable Page/Single Featured Image', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_disable_main_menu]', array(
	'default' => $supermarket_settings['supermarket_disable_main_menu'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_disable_main_menu]', array(
	'priority'=>120,
	'label' => __('Disable Main Menu', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_reset_all]', array(
	'default' => $supermarket_settings['supermarket_reset_all'],
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'supermarket_reset_alls',
	'transport' => 'postMessage',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_reset_all]', array(
	'priority'=>130,
	'label' => __('Reset all default settings. (Refresh it to view the effect)', 'supermarket'),
	'section' => 'supermarket_custom_header',
	'type' => 'checkbox',
));