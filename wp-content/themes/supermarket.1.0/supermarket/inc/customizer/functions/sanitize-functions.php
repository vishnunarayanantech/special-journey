<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
/********************* SUPERMARKET CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function supermarket_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function supermarket_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function supermarket_sanitize_category_select($input) {
	
	$input = sanitize_key( $input );
	return ( ( isset( $input ) && true == $input ) ? $input : '' );

}

function supermarket_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}

function supermarket_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'supermarket_theme_options');
		$input=0;
		return absint($input);
	} 
	else {
		return '';
	}
}

/************** Active Callback *************************************/
function supermarket_post_category_callback( $control ) {
   if ( $control->manager->get_setting('supermarket_theme_options[supermarket_default_category]')->value() == 'post_category' ) {
      return true;
   } else {
      return false;
   }
}


function supermarket_product_category_callback( $control ) {
    if ( $control->manager->get_setting('supermarket_theme_options[supermarket_default_category]')->value() == 'product_category' ) {
      return true;
   } else {
      return false;
   }
}