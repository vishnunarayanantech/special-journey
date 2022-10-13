<?php
/**
 * Custom functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
/********************* Set Default Value if not set ***********************************/
	if ( !get_theme_mod('supermarket_theme_options') ) {
		set_theme_mod( 'supermarket_theme_options', supermarket_get_option_defaults_values() );
	}

/******************************** EXCERPT LENGTH *********************************/
function supermarket_excerpt_length($supermarket_excerpt_length) {
	$supermarket_settings = supermarket_get_theme_options();
	if( is_admin() ){
		return absint($supermarket_excerpt_length);
	}

	$supermarket_excerpt_length = $supermarket_settings['supermarket_excerpt_length'];
	return absint($supermarket_excerpt_length);
}
add_filter('excerpt_length', 'supermarket_excerpt_length');

/********************* CONTINUE READING LINKS FOR EXCERPT *********************************/
function supermarket_continue_reading($more) {
	$supermarket_settings = supermarket_get_theme_options();
	$supermarket_tag_text = $supermarket_settings['supermarket_tag_text'];
	$link = sprintf(
			'<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),esc_html($supermarket_tag_text),
			/* translators: %s: Name of current post */
			sprintf( __( '<span class="screen-reader-text"> "%s"</span>', 'supermarket' ), get_the_title( get_the_ID() ) )
		);

	if( is_admin() ){
		return $more;
	}

	return '&hellip; ';
}
add_filter('excerpt_more', 'supermarket_continue_reading');

/***************** USED CLASS FOR BODY TAGS ******************************/
function supermarket_body_class($supermarket_class) {
	$supermarket_settings = supermarket_get_theme_options();
	$supermarket_site_layout = $supermarket_settings['supermarket_design_layout'];
	$supermarket_display_catlog_menu = $supermarket_settings['supermarket_display_catlog_menu'];
	if ($supermarket_site_layout =='boxed-layout') {
		$supermarket_class[] = 'boxed-layout';
	}elseif ($supermarket_site_layout =='small-boxed-layout') {
		$supermarket_class[] = 'boxed-layout-small';
	}else{
		$supermarket_class[] = '';
	}

	if ( is_singular() && false !== strpos( get_queried_object()->post_content, '<!-- wp:' ) ) {
		$supermarket_class[] = 'gutenberg';
	}

	if (is_page_template('page-templates/supermarket-template.php')){
		$supermarket_class[] = 'supermarket-template';

	}

	if ($supermarket_display_catlog_menu =='full-display') {
		$supermarket_class[] = 'show-catalog-menu';

	}

	return $supermarket_class;
}
add_filter('body_class', 'supermarket_body_class');

/********************** SCRIPTS FOR DONATE/ UPGRADE BUTTON ******************************/
function supermarket_customize_scripts() {
	wp_enqueue_style( 'supermarket_customizer_custom', get_template_directory_uri() . '/inc/css/supermarket-customizer.css');
}
add_action( 'customize_controls_print_scripts', 'supermarket_customize_scripts');

/**************************** SOCIAL MENU *********************************************/
function supermarket_social_links_display() {
		if ( has_nav_menu( 'social-link' ) ) : ?>
	<div class="social-links clearfix">
	<?php
		wp_nav_menu( array(
			'container' 	=> '',
			'theme_location' => 'social-link',
			'depth'          => 1,
			'items_wrap'      => '<ul>%3$s</ul>',
			'link_before'    => '<span class="screen-reader-text">',
			'link_after'     => '</span>' . supermarket_get_icons(array( 'icon' => 'tf-link' ) ),
		) );
	?>
	</div><!-- end .social-links -->
	<?php endif; ?>
<?php }
add_action ('supermarket_social_links', 'supermarket_social_links_display');

/******************* DISPLAY BREADCRUMBS ******************************/

function supermarket_breadcrumb() {
	if (function_exists('bcn_display')) { 
		?>
		<div class="breadcrumb home">
			<?php bcn_display(); ?>
		</div> <!-- .breadcrumb -->
	<?php }
}

/*************************** ENQUEING STYLES AND SCRIPTS ****************************************/
function supermarket_scripts() {
	$supermarket_settings = supermarket_get_theme_options();
	$supermarket_stick_menu = $supermarket_settings['supermarket_stick_menu'];
	wp_enqueue_script('supermarket-main', get_template_directory_uri().'/js/supermarket-main.js', array('jquery'), false, true);
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_style( 'supermarket-style', get_stylesheet_uri() );
	wp_enqueue_style('supermarket-responsive', get_template_directory_uri().'/css/responsive.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri().'/assets/font-icons/css/icon-style.css');

	if( $supermarket_stick_menu != 1 ):

		wp_enqueue_script('jquery-sticky', get_template_directory_uri().'/assets/sticky/jquery.sticky.min.js', array('jquery'), false, true);
		wp_enqueue_script('supermarket-sticky-settings', get_template_directory_uri().'/assets/sticky/sticky-settings.js', array('jquery'), false, true);

	endif;

	wp_enqueue_script('supermarket-navigation', get_template_directory_uri().'/js/navigation.js', array('jquery'), false, true);
	wp_enqueue_script('jquery-flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'), false, true);
	wp_enqueue_script('supermarket-slider', get_template_directory_uri().'/js/flexslider-setting.js', array('jquery-flexslider'), false, true);
	wp_enqueue_script('data-counter', get_template_directory_uri().'/assets/countdown/date-counter.js', array('jquery'), false, true);

	wp_enqueue_script('supermarket-skip-link-focus-fix', get_template_directory_uri().'/js/skip-link-focus-fix.js', array('jquery'), false, true);

	$supermarket_animation_effect   = esc_attr($supermarket_settings['supermarket_animation_effect']);
	$supermarket_slideshowSpeed    = absint($supermarket_settings['supermarket_slideshowSpeed'])*1000;
	$supermarket_animationSpeed = absint($supermarket_settings['supermarket_animationSpeed'])*100;
	wp_localize_script(
		'supermarket-slider',
		'supermarket_slider_value',
		array(
			'supermarket_animation_effect'   => $supermarket_animation_effect,
			'supermarket_slideshowSpeed'    => $supermarket_slideshowSpeed,
			'supermarket_animationSpeed' => $supermarket_animationSpeed,
		)
	);
	wp_enqueue_script( 'supermarket-slider' );
	$supermarket_googlefont = array();
	array_push( $supermarket_googlefont, 'Roboto');
	$supermarket_googlefonts = implode("|", $supermarket_googlefont);

	wp_register_style( 'supermarket-google-fonts', '//fonts.googleapis.com/css?family='.$supermarket_googlefonts .':300,400,400i,500,600,700');
	wp_enqueue_style( 'supermarket-google-fonts' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( function_exists( 'YITH_WCWL' ) ) {

		wp_enqueue_script( 'supermarket-yith-wcwl-custom', get_stylesheet_directory_uri() . '/js/yith-wcwl-custom.js', array( 'jquery' ), true, false );
	}


	/* Custom Css */

	$supermarket_theme_color_styles = get_theme_mod( 'theme_color_styles', '#2e7fff' );
	$supermarket_internal_css='';

	if($supermarket_settings['supermarket_header_display']=='header_logo'){
		$supermarket_internal_css .= '
		#site-branding #site-title, #site-branding #site-description{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}';
	}

	if($supermarket_settings['supermarket_slider_text_bg_col'] == 'on'){
		$supermarket_internal_css .= 
		/* Slider and Promotion Text Background Color*/

		'.slider-text-wrap {
			background-color: rgba(255,255,255,0.8);
			padding: 20px 20px 0;
			border-radius: 5px;
			display: inline-block;
			margin-bottom: 20px;
		}

		.slider-link {
			display: block;
		}

		.product-promotion-text-content {
			background-color: rgba(255,255,255,0.8);
		}';
	}

	if ($supermarket_settings['supermarket_logo_high_resolution'] !=0){
		$supermarket_internal_css .= '/* Logo for high resolution screen(Use 2X size image) */
		.custom-logo-link .custom-logo {
			height: auto;
			width: 50%;
		}';
	}


	/* Theme Color Styles */
	if($supermarket_theme_color_styles !='#2e7fff'){
		$supermarket_internal_css .= '

		/* Nav, links and hover */

		a,
		#site-title a,
		ul li a:hover,
		ol li a:hover,
		.main-navigation a:hover, /* Navigation */
		.main-navigation ul li.current-menu-item a,
		.main-navigation ul li.current_page_ancestor a,
		.main-navigation ul li.current-menu-ancestor a,
		.main-navigation ul li.current_page_item a,
		.main-navigation ul li:hover > a,
		.main-navigation li.current-menu-ancestor.menu-item-has-children > a:after,
		.main-navigation li.current-menu-item.menu-item-has-children > a:after,
		.main-navigation ul li:hover > a:after,
		.main-navigation li.menu-item-has-children > a:hover:after,
		.main-navigation li.page_item_has_children > a:hover:after,
		.main-navigation ul li ul li a:hover,
		.main-navigation ul li ul li:hover > a,
		.main-navigation ul li.current-menu-item ul li a:hover,
		.side-menu-wrap .side-nav-wrap a:hover, /* Side Menu */
		.slider-tag,
		.post.hentry.sticky:before,
		.entry-title a:hover, /* Post */
		.entry-title a:focus,
		.entry-title a:active,
		.entry-header .entry-meta span + span:before,
		.entry-footer .entry-meta span + span:before,
		.entry-meta .author a,
		.entry-meta a:hover,
		.image-navigation .nav-links a,
		.widget ul li a:hover, /* Widgets */
		.widget-title a:hover,
		.widget_contact ul li a:hover,
		.site-info .copyright a:hover, /* Footer */
		.gutenberg .entry-meta .author a {
			color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		#search-box input[type="search"] {
			border-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.product-widget-box .widget-title span {
			border-bottom-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.top-bar,
		.widget .product-item-utility ul li a {
			background-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		/* Webkit */
		::selection {
			background: '. esc_attr( $supermarket_theme_color_styles ).';
			color: #fff;
		}

		/* Gecko/Mozilla */
		::-moz-selection {
			background: '. esc_attr( $supermarket_theme_color_styles ).';
			color: #fff;
		}

		/* Accessibility
		================================================== */
		.screen-reader-text:hover,
		.screen-reader-text:active,
		.screen-reader-text:focus {
			background-color: #f1f1f1;
			color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		/* Default Buttons
		================================================== */
		input[type="reset"],/* Forms  */
		input[type="button"],
		input[type="submit"],
		.btn-default,
		.main-slider .flex-control-nav a.flex-active,
		.main-slider .flex-control-nav a:hover,
		.go-to-top .icon-bg,
		.search-submit {
			background-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		/* #bbpress
		================================================== */
		#bbpress-forums .bbp-topics a:hover {
			color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.bbp-submit-wrapper button.submit {
			background-color: '. esc_attr( $supermarket_theme_color_styles ).';
			border: 1px solid '. esc_attr( $supermarket_theme_color_styles ).';
		}

		/* Woocommerce
		================================================== */
		.woocommerce #respond input#submit,
		.woocommerce a.button, 
		.woocommerce button.button, 
		.woocommerce input.button,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt, 
		.woocommerce button.button.alt, 
		.woocommerce input.button.alt,
		.woocommerce span.onsale,
		.woocommerce-demo-store p.demo_store,
		.wl-counter,
		.archive.woocommerce span.onsale:before,
		.woocommerce ul.products li.product .button:hover,
		.woocommerce .woocommerce-product-search button[type="submit"],
		.woocommerce button.button.alt.disabled,
		.woocommerce button.button.alt.disabled:hover {
			background-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.header-right .cart-value,
		.woocommerce .woocommerce-message:before,
		.woocommerce ul.products li.product .price ins,
		.product_list_widget ins,
		.price_slider_amount .price_label,
		.woocommerce-Price-amount.amount,
		.woocommerce div.product .out-of-stock {
			color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.header-right .cart-value,
		.header-right .cart-value:after,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
			border-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.header-right .wl-icon {
			fill: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		/* Catalog Menu
		================================================== */
		.catalog-menu-title,
		.catalog-menu .title-highlight > a:after,
		.catalog-menu > ul > li:after {
			background-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.catalog-menu a:hover {
			color: '. esc_attr( $supermarket_theme_color_styles ).';
		}


		/* Supermarket Widgets
		================================================== */

		/* Category Tab Box Widget */
		.supermarket-cat-tab-box-widget .cat-tab-menu li:hover,
		.supermarket-cat-tab-box-widget .cat-tab-menu li.active,
		.cat-tab-layout-two .banner-tab-header {
			background-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.supermarket-cat-tab-box-widget .cat-tab-menu li.active:after {
			border-top-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		/* Supermarket Widget Utility and Buttons */
		.widget .product-item-utility ul li a {
			background-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.widget .product-item-utility ul li a:hover {
			color: '. esc_attr( $supermarket_theme_color_styles ).';
		}

		.supermarket-grid-product .product-item-action .button:hover,
		.supermarket-grid-product .product-item-action .product_add_to_wishlist:hover {
			background-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}


		/* Animation Bubble One(New section) */
		.bubble {
			background-color: #F0083A;
		}

		/* Animation Bubble Two(New section) */
		.bubble:nth-child(2),
		.bubble:nth-child(4),
		.bubble:nth-child(6),
		.bubble:nth-child(8),
		.bubble:nth-child(10),
		.bubble:nth-child(12),
		.bubble:nth-child(14) {
		    background-color: '. esc_attr( $supermarket_theme_color_styles ).';
		}';

	}

	wp_add_inline_style( 'supermarket-style', wp_strip_all_tags($supermarket_internal_css) );
}
add_action( 'wp_enqueue_scripts', 'supermarket_scripts' );