<?php
/**
 * Displays the searchform
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
	<?php
		$supermarket_settings = supermarket_get_theme_options();
		$supermarket_search_form = $supermarket_settings['supermarket_search_text']; ?>
	<label class="screen-reader-text"><?php echo esc_html($supermarket_search_form); ?></label>
	<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr($supermarket_search_form); ?>" autocomplete="off" />
	<button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
</form> <!-- end .search-form -->