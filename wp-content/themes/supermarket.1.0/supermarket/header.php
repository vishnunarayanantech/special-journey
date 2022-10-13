<?php
/**
 * Displays the header content
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$supermarket_settings = supermarket_get_theme_options(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif;
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php 
	if ( function_exists( 'wp_body_open' ) ) {

		wp_body_open();

	} else {

		do_action( 'wp_body_open' );

	} ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#site-content-contain"><?php esc_html_e('Skip to content','supermarket'); ?></a>
<!-- Masthead ============================================= -->
<header id="masthead" class="site-header" role="banner">
	<div class="header-wrap">
		<?php the_custom_header_markup(); ?>
		<!-- Top Header============================================= -->
		<div class="top-header">
			<?php 
			if ($supermarket_settings['supermarket_disable_top_bar'] ==0 ){

				if(is_active_sidebar( 'supermarket_header_info' ) || has_nav_menu( 'top-menu' ) || (has_nav_menu( 'social-link' ) )): ?>
					<div class="top-bar">
						<div class="wrap">
							<?php
							if( is_active_sidebar( 'supermarket_header_info' )) {

								dynamic_sidebar( 'supermarket_header_info' );

							} ?>
							<div class="right-top-bar">

								<?php
								if($supermarket_settings['supermarket_top_social_icons'] == 0):

										do_action('supermarket_social_links');

								endif;


								if(has_nav_menu ('top-menu')){ ?>

									<nav class="top-bar-menu" role="navigation" aria-label="<?php esc_attr_e('Top Bar Menu','supermarket');?>">
										<button class="top-menu-toggle" type="button">
											<span class="screen-reader-text"><?php esc_html_e('Topbar Menu','supermarket');?></span>
											<i class="fas fa-bars"></i>
									  	</button>
										<?php
											wp_nav_menu( array(
												'container' 	=> '',
												'theme_location' => 'top-menu',
												'depth'          => 1,
												'items_wrap'      => '<ul class="top-menu">%3$s</ul>',
											) );
										?>
									</nav> <!-- end .top-bar-menu -->
								<?php } ?>

							</div> <!-- end .right-top-bar -->
						</div> <!-- end .wrap -->
					</div> <!-- end .top-bar -->
				<?php endif;
			} ?>

			<div id="site-branding">
				<div class="wrap">

					<?php do_action('supermarket_site_branding');

					$search_form = $supermarket_settings['supermarket_search_custom_header'];
					if (1 != $search_form) { ?>

						<div id="search-box" class="clearfix">
							<div class="search-box-inner">
								<?php 
									if (! class_exists('woocommerce')) {

										get_search_form();

									} else {

										get_template_part( 'product','searchform');

									}
								?>
							</div>
						</div>  <!-- end #search-box -->
					<?php } ?>
					<div class="header-right">
						<?php if( is_active_sidebar( 'supermarket_header_tel_info' )) {

								dynamic_sidebar( 'supermarket_header_tel_info' );

							}

							do_action ('supermarket_cart_wishlist_icon_display'); ?>
					</div><!-- end .header-right -->

					
				</div><!-- end .wrap -->	
			</div><!-- end #site-branding -->
					

			<!-- Main Header============================================= -->
			<div id="sticky-header" class="clearfix">
				<div class="wrap">
					<div class="main-header clearfix">

						<!-- Main Nav ============================================= -->
						<?php $header_display = $supermarket_settings['supermarket_header_display'];
							$supermarket_display_catlog_menu = $supermarket_settings['supermarket_display_catlog_menu']; ?>
							<div id="site-branding">

								<?php
								if ($header_display == 'header_logo' || $header_display == 'show_both') {

									supermarket_the_custom_logo();

								}
								if ($header_display == 'header_text' || $header_display == 'show_both') { ?>
								<div id="site-detail">
									<div id="site-title">
										<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
									</div><!-- end .site-title --> 
									<?php
									$site_description = get_bloginfo( 'description', 'display' );
									if ($site_description){ ?>
										<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
									<?php } ?>
								</div>
							<?php } ?>
							</div><!-- end #site-branding -->
							<?php

								do_action ('supermarket_side_nav_menu');


						if($supermarket_settings['supermarket_disable_main_menu']==0){ ?>

							<nav id="site-navigation" class="main-navigation clearfix" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'supermarket' ); ?>">
							<?php if (has_nav_menu('primary')) {
								$args = array(
								'theme_location' => 'primary',
								'container'      => '',
								'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
								); ?>
							
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="line-bar"></span>
								</button><!-- end .menu-toggle -->
								<?php wp_nav_menu($args);//extract the content from apperance-> nav menu
								} else {// extract the content from page menu only ?>
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="line-bar"></span>
								</button><!-- end .menu-toggle -->
								<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'));
								} ?>
							</nav> <!-- end #site-navigation -->

						<?php } ?>
							<div class="header-right">
								<?php do_action ('supermarket_cart_wishlist_icon_display'); ?>
							</div> <!-- end .header-right -->

					</div> <!-- end .main-header -->
				</div> <!-- end .wrap -->
			</div> <!-- end #sticky-header -->
		</div> <!-- end .top-header -->

	</div> <!-- end .header-wrap -->

	<?php
		if ( is_front_page()){
			if ($supermarket_settings['supermarket_adv_ban_position'] =='above-slider' && class_exists('woocommerce') ){
				do_action ('supermarket_adv_banner_top');
			}

			if ($supermarket_settings['supermarket_cat_slide'] =='above-slider' && class_exists('woocommerce') ){

				do_action ('supermarket_display_front_page_product_categories');
			} 
		} ?>


	<!-- Main Slider ============================================= -->
	<?php
		$supermarket_enable_slider = $supermarket_settings['supermarket_enable_slider'];
		$supermarket_hide_slider_text = $supermarket_settings['supermarket_hide_slider_text']; 
		if ($supermarket_enable_slider=='frontpage'|| $supermarket_enable_slider=='enitresite'){
			 if(is_front_page() && ($supermarket_enable_slider=='frontpage') ) { ?>
			 	<div class="slider-banner-box clearfix <?php if ($supermarket_hide_slider_text =='on'){ echo 'hide-text-content'; } ?> ">
					<div class="slider-banner-wrap">
						<?php if ($supermarket_display_catlog_menu == 'full-display') {

								do_action ('supermarket_side_nav_menu');

							} ?>
						<div class="slider-banner-inner">
								<?php

						 		if($supermarket_settings['supermarket_slider_type'] == 'default_slider') {
									supermarket_category_sliders();

								} else {

									if(class_exists('Supermarket_Plus_Features')):
										do_action('supermarket_image_sliders');
									endif;
								}
						 	do_action ('supermarket_product_promotions');
						 	?>
			 			</div> <!-- end .slider-banner-inner -->
					</div> <!-- end .slider-banner-wrap -->
				</div> <!-- end .slider-banner-box -->
				
			<?php }
			if($supermarket_enable_slider=='enitresite'){ ?>
				<div class="slider-banner-box clearfix">
					<div class="slider-banner-wrap">
						<?php if ($supermarket_display_catlog_menu == 'full-display') {

								do_action ('supermarket_side_nav_menu');

							} ?>
						<div class="slider-banner-inner">
							<?php

						 		if($supermarket_settings['supermarket_slider_type'] == 'default_slider') {

										supermarket_category_sliders();

								} else {

									if(class_exists('Supermarket_Plus_Features')):

										do_action('supermarket_image_sliders');

									endif;
								}
						 	do_action ('supermarket_product_promotions');
						 	?>
			 			</div> <!-- end .slider-banner-inner -->
					</div> <!-- end .slider-banner-wrap -->
				</div> <!-- end .slider-banner-box -->
				
			<?php }
		}
		if ( is_front_page()){

			if ($supermarket_settings['supermarket_adv_ban_position'] =='below-slider' && class_exists('woocommerce') ){
				do_action ('supermarket_adv_banner_top');
			}

			if ($supermarket_settings['supermarket_cat_slide'] =='below-slider' && class_exists('woocommerce') ){
				
				do_action ('supermarket_display_front_page_product_categories');
			}
		} ?>
</header> <!-- end #masthead -->

<!-- Main Page Start ============================================= -->
<div id="site-content-contain" class="site-content-contain">
	<div id="content" class="site-content">