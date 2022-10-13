<?php
/**
 * Custom functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
/****************** SUPERMARKET DISPLAY COMMENT NAVIGATION *******************************/
function supermarket_comment_nav() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'supermarket' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'supermarket' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;
				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'supermarket' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
/******************** Remove div and replace with ul**************************************/
add_filter('wp_page_menu', 'supermarket_wp_page_menu');
function supermarket_wp_page_menu($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass   = $matches[1];
	$replace    = array('<div class="'.$divclass.'">', '</div>');
	$new_markup = str_replace($replace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
	return $new_markup;
}
/********************* Custom Header setup ************************************/
function supermarket_custom_header_setup() {
	$args = array(
		'default-text-color'     => '',
		'default-image'          => '',
		'height'                 => apply_filters( 'supermarket_header_image_height', 720 ),
		'width'                  => apply_filters( 'supermarket_header_image_width', 1280 ),
		'random-default'         => false,
		'max-width'              => 2500,
		'flex-height'            => true,
		'flex-width'             => true,
		'random-default'         => false,
		'header-text'				 => false,
		'uploads'				 => true,
		'wp-head-callback'       => '',
		'admin-preview-callback' => 'supermarket_admin_header_image',
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'supermarket_custom_header_setup' );


/**************** Categoy Lists ***********************/

if( !function_exists( 'supermarket_categories_lists' ) ):
    function supermarket_categories_lists() {
        $supermarket_cat_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $supermarket_categories = get_categories( $supermarket_cat_args );
        $supermarket_categories_lists = array('' => esc_html__('--Select--','supermarket'));
        foreach( $supermarket_categories as $category ) {
            $supermarket_categories_lists[esc_attr( $category->slug )] = esc_html( $category->name );
        }
        return $supermarket_categories_lists;
    }
endif;

/**************** Product Categoy Lists ***********************/
if( !function_exists( 'supermarket_product_categories_lists' ) ):

    function supermarket_product_categories_lists() {
		$supermarket_prod_categories_lists = array(
			'-' => __( '--Select Category--', 'supermarket' ),
		);

		$supermarket_prod_categories = get_categories(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => 0,
				'title_li'   => '',
			)
		);

		if ( ! empty( $supermarket_prod_categories ) ) :
			foreach ( $supermarket_prod_categories as $supermarket_prod_cat ) :

				if ( ! empty( $supermarket_prod_cat->term_id ) && ! empty( $supermarket_prod_cat->name ) ) :
					$supermarket_prod_categories_lists[ $supermarket_prod_cat->term_id ] = $supermarket_prod_cat->name;
				endif;

			endforeach;
		endif;
		return $supermarket_prod_categories_lists;
	}

endif;

/* Header Right WooCommerce Cart and WishList Icon */
add_action ('supermarket_cart_wishlist_icon_display','supermarket_cart_wishlist_icon');

function supermarket_cart_wishlist_icon(){

	if ( class_exists( 'woocommerce' ) ) { ?>
		<div class="cart-box">
			<div class="sx-cart-views">
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="wcmenucart-contents">
					<span class="cart-value"><?php echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></span>
				</a>
				<div class="my-cart-wrap">
					<div class="my-cart"><?php esc_html_e('Total', 'supermarket'); ?></div>
					<div class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div>
				</div>
			</div>
			
			<?php the_widget( 'WC_Widget_Cart', '' ); ?>
		</div> <!-- end .cart-box -->
	<?php }

	if ( function_exists( 'YITH_WCWL' ) ) {

		$wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
		<div class="wishlist-box">
			<div class="wishlist-wrap">
				<a class="wishlist-btn" href="<?php echo esc_url( $wishlist_url ); ?>">
					<span class="wl-icon">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 483 421.5">
							<path d="M242,419.5c-6.8,0-13.4-2.4-18.6-6.8c-19.4-16.5-38.1-32.1-54.6-45.8l-0.1-0.1C120.4,326.7,78.7,292,49.6,257.8
								C17.1,219.5,2,183.3,2,143.7c0-38.5,13.5-74,38.1-99.9C64.9,17.5,99,3,136.1,3c27.7,0,53.1,8.5,75.4,25.4
								c11.3,8.5,21.5,18.9,30.5,31.1c9-12.1,19.2-22.5,30.5-31.1C294.8,11.5,320.2,3,347.9,3c37.1,0,71.2,14.5,96,40.8
								c24.6,26,38.1,61.5,38.1,99.9c0,39.6-15.1,75.8-47.6,114.1c-29.1,34.2-70.8,68.9-119.2,109.1c-16.5,13.7-35.2,29.3-54.7,45.9
								C255.4,417.1,248.8,419.5,242,419.5z M136.1,30.4c-29.1,0-55.9,11.3-75.3,31.9C41,83.2,30.1,112.1,30.1,143.7
								c0,33.3,12.7,63.1,41.1,96.6C98.8,272.6,139.7,306.6,187,346l0.1,0.1c16.6,13.8,35.3,29.4,54.9,46c19.7-16.7,38.4-32.3,55-46.1
								c47.4-39.4,88.3-73.4,115.8-105.7c28.4-33.5,41.1-63.3,41.1-96.6c0-31.6-10.9-60.4-30.6-81.3c-19.5-20.6-46.2-31.9-75.3-31.9
								c-21.3,0-40.9,6.6-58.2,19.7c-15.4,11.6-26.2,26.3-32.4,36.6c-3.2,5.3-8.9,8.4-15.2,8.4s-12-3.2-15.2-8.4c-6.3-10.3-17-25-32.4-36.6
								C177,37,157.4,30.4,136.1,30.4z"/>
						</svg>
					</span>				
					<span class="wl-counter"><?php echo absint( yith_wcwl_count_products() ); ?></span>
				</a>
			</div>
		</div> <!-- end .wishlist-box -->

	<?php }

}