<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
$supermarket_settings = supermarket_get_theme_options();

$wp_customize->add_section('supermarket_layout_options', array(
	'title' => __('Layout Options', 'supermarket'),
	'priority' => 102,
	'panel' => 'supermarket_options_panel'
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_display_catlog_menu]', array(
	'default' => $supermarket_settings['supermarket_display_catlog_menu'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_display_catlog_menu]', array(
	'priority'=>20,
	'label' => __('Show Catalog Menu', 'supermarket'),
	'section' => 'supermarket_layout_options',
	'type' => 'select',
	'choices' => array(
		'full-display' => __('Display on Slider','supermarket'),
		'on-click' => __('Display on Main Menu','supermarket'),
	),
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_post_category]', array(
	'default' => $supermarket_settings['supermarket_post_category'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_post_category]', array(
	'priority'=>30,
	'label' => __('Disable Category', 'supermarket'),
	'section' => 'supermarket_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_post_author]', array(
	'default' => $supermarket_settings['supermarket_post_author'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_post_author]', array(
	'priority'=>40,
	'label' => __('Disable Author', 'supermarket'),
	'section' => 'supermarket_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_post_date]', array(
	'default' => $supermarket_settings['supermarket_post_date'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_post_date]', array(
	'priority'=>50,
	'label' => __('Disable Date', 'supermarket'),
	'section' => 'supermarket_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_post_comments]', array(
	'default' => $supermarket_settings['supermarket_post_comments'],
	'sanitize_callback' => 'supermarket_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_post_comments]', array(
	'priority'=>60,
	'label' => __('Disable Comments', 'supermarket'),
	'section' => 'supermarket_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_entry_meta_single]', array(
	'default' => $supermarket_settings['supermarket_entry_meta_single'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_entry_meta_single]', array(
	'priority'=>70,
	'label' => __('Disable Entry Meta from Single Page', 'supermarket'),
	'section' => 'supermarket_layout_options',
	'type' => 'select',
	'choices' => array(
		'show' => __('Display Entry Format','supermarket'),
		'hide' => __('Hide Entry Format','supermarket'),
	),
));

$wp_customize->add_setting( 'supermarket_theme_options[supermarket_entry_meta_blog]', array(
	'default' => $supermarket_settings['supermarket_entry_meta_blog'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'supermarket_theme_options[supermarket_entry_meta_blog]', array(
	'priority'=>80,
	'label' => __('Disable Entry Meta from Blog Page', 'supermarket'),
	'section' => 'supermarket_layout_options',
	'type'	=> 'select',
	'choices' => array(
		'show-meta' => __('Display Entry Meta','supermarket'),
		'hide-meta' => __('Hide Entry Meta','supermarket'),
	),
));

$wp_customize->add_setting('supermarket_theme_options[supermarket_blog_content_layout]', array(
   'default'        => $supermarket_settings['supermarket_blog_content_layout'],
   'sanitize_callback' => 'supermarket_sanitize_select',
   'type'                  => 'option',
   'capability'            => 'manage_options'
));
$wp_customize->add_control('supermarket_theme_options[supermarket_blog_content_layout]', array(
   'priority'  =>90,
   'label'      => __('Blog Content Display', 'supermarket'),
   'section'    => 'supermarket_layout_options',
   'type'       => 'select',
   'choices'    => array(
       'fullcontent_display' => __('Blog Full Content Display','supermarket'),
       'excerptblog_display' => __(' Excerpt  Display','supermarket'),
   ),
));

$wp_customize->add_setting('supermarket_theme_options[supermarket_design_layout]', array(
	'default'        => $supermarket_settings['supermarket_design_layout'],
	'sanitize_callback' => 'supermarket_sanitize_select',
	'type'                  => 'option',
));
$wp_customize->add_control('supermarket_theme_options[supermarket_design_layout]', array(
	'priority'  =>100,
	'label'      => __('Design Layout', 'supermarket'),
	'section'    => 'supermarket_layout_options',
	'type'       => 'select',
	'choices'    => array(
		'full-width-layout' => __('Full Width Layout','supermarket'),
		'boxed-layout' => __('Boxed Layout','supermarket'),
		'small-boxed-layout' => __('Small Boxed Layout','supermarket'),
	),
));