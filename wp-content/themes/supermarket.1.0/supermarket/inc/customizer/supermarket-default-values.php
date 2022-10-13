<?php
if(!function_exists('supermarket_get_option_defaults_values')):
	/******************** SUPERMARKET DEFAULT OPTION VALUES ******************************************/
	function supermarket_get_option_defaults_values() {
		global $supermarket_default_values;
		$supermarket_default_values = array(
			'supermarket_design_layout' => 'full-width-layout',
			'supermarket_post_category' => 0,
			'supermarket_display_catlog_menu' => 'on-click',
			'supermarket_post_author' => 0,
			'supermarket_post_date' => 0,
			'supermarket_post_comments' => 0,
			'supermarket_sidebar_layout_options' => 'right',
			'supermarket_search_custom_header' => 0,
			'supermarket_header_display'=> 'header_text',
			'supermarket_scroll'	=> 0,
			'supermarket_tag_text' => esc_html__('Continue Reading','supermarket'),
			'supermarket_excerpt_length'	=> '50',
			'supermarket_reset_all' => 0,
			'supermarket_stick_menu'	=>0,
			'supermarket_blog_post_image' => 'on',
			'supermarket_search_text' => esc_html__('Search &hellip;','supermarket'),
			'supermarket_search_product_text' => esc_html__('Search Products &hellip;','supermarket'),
			'supermarket_blog_content_layout'	=> 'fullcontent_display',
			'supermarket_entry_meta_single' => 'show',
			'supermarket_entry_meta_blog' => 'show-meta',
			'supermarket_footer_column_section'	=>'4',
			'supermarket_disable_main_menu' => 0,
			'supermarket_disable_top_bar' => 0,
			'supermarket_img-product-promotion-image-1' => '',
			'supermarket_img-product-promotion-image-2' => '',
			'supermarket_product_promotion_url_1' => '',
			'supermarket_product_promotion_url_2' => '',
			'supermarket_product_promotion_name_1' => '',
			'supermarket_product_promotion_name_2' => '',
			'supermarket_product_promotion_desc_1' => '',
			'supermarket_product_promotion_desc_2' => '',
			'supermarket_cat_slide' => 'above-slider',
			'supermarket_logo_high_resolution' => 0,

			/* Slider Settings */
			'supermarket_default_category'	=> 'post_category',
			'supermarket_slider_type'	=> 'default_slider',
			'supermarket_enable_slider' => 'disable',
			'supermarket_category_slider' =>array(),
			'supermarket_default_category_slider' => '',
			'supermarket_slider_number'	=> '3',
			'supermarket_disable_slide_animation' =>'on',
			'supermarket_shopnow_text' => esc_html__('Shop','supermarket'),
			'supermarket_hide_slider_text' => 'off',
			'supermarket_slider_text_bg_col'=> 'off',

			/* Layer Slider */
			'supermarket_animation_effect' => 'fade',
			'supermarket_slideshowSpeed' => '5',
			'supermarket_animationSpeed' => '7',
			'supermarket_display_page_single_featured_image'=>0,

			/* Front page feature */
			/* Frontpage Product Featured Brands */
			'supermarket_disable_product_brand'	=> 1,
			'supermarket_total_brand_features'	=> '8',
			'supermarket_features_title'	=> '',
			'supermarket_features_description'	=> '',

			/* Frontpage Product Categories */
			'supermarket_disable_product_categories'	=> 1,
			'supermarket_total_features'	=> '13',
			/*Social Icons */
			'supermarket_top_social_icons' =>0,
			'supermarket_buttom_social_icons'	=>0,
			'supermarket_slider_sliderfullwidth'	=> 0,
			'supermarket_adv_ban_position' => 'above-slider',
			);
		return apply_filters( 'supermarket_get_option_defaults_values', $supermarket_default_values );
	}
endif;