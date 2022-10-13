<?php
/**
 * Display Image Category widgets
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
/**************** Banner Text widgets ***************************/
class supermarket_image_category_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'supermarket-image-category-widget', 'description' => __('Display Product Image Category with post count widgets for Supermarket Template', 'supermarket'));
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct(false, $name = __('TF: Product Image Category ', 'supermarket'), $widget_ops, $control_ops);
	}
	function form($instance) {
		$instance           = wp_parse_args((array) $instance, array('title' => '', 'number' => '4', 'text_bg_color' => 'on','category1' => '','category2' => '','category3' => '','category4' => ''));


		$title = esc_html($instance['title']);
		$number = absint($instance['number']);
		$text_bg_color = esc_attr($instance['text_bg_color']);

		for ($i = 1; $i <= $number; $i++) {
			$category = 'category'.$i;
			$defaults[$category] = '';
		}
		$instance = wp_parse_args((array)$instance, $defaults);

		for ($i = 1; $i <= $number; $i++) {
			$category = 'category'.$i;
			$category = absint($instance[$category]);
		
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e( 'Number of Category:', 'supermarket' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e( 'Title:', 'supermarket' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text_bg_color' ); ?>"><?php _e( 'Category Text Background Color:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'text_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'text_bg_color' ); ?>">
				<option value="on" <?php selected( $instance['text_bg_color'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['text_bg_color'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
		</p>
		<?php for ($i = 1; $i <= $number; $i++) {  ?>

		<p>
			<label for="<?php echo $this->get_field_id( key($defaults) ); ?>"><?php _e( 'Select Product Category # ', 'supermarket' ); echo absint ($i); ?>:</label>
			<?php  wp_dropdown_categories( array( 'show_option_none' => __( '-- Select Product Category --', 'supermarket' ),'name' => $this->get_field_name( key($defaults) ), 'selected' => $instance[key($defaults)], 'taxonomy'	=> 'product_cat', 'hide_empty' => 0, 'hide_if_empty' => false, 'hierarchical'     => true, ) ); ?>

		</p>
		<hr>
		<?php next($defaults);// forwards the key of $defaults array
		 }

	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['number'] = absint($new_instance['number']);
		$instance['text_bg_color'] = sanitize_key($new_instance['text_bg_color']);

		for ($i = 1; $i <= $instance['number']; $i++) {
			$category = 'category'.$i;
			$instance[$category] = absint($new_instance[$category]);
		}
		return $instance;
	}

	function widget($args, $instance) {
		extract($args);
		extract($instance);

		$category_array = array();

		$title = isset($instance['title']) ? $instance['title']:'';
		$number = isset($instance['number']) ? $instance['number']:'4';
		$text_bg_color = isset( $instance[ 'text_bg_color' ] ) ? $instance[ 'text_bg_color' ] : 'off';

		for ($i = 1; $i <= $number; $i++) {
			$category = 'category'.$i;
			$category = isset($instance[$category])?$instance[$category]:'';

			if (!empty($category)) {
				array_push($category_array, $category);
			}	

		}
		echo $before_widget;
?>

	<div class="widget-inner-wrap <?php if ($text_bg_color =='on'){ echo 'image-category-bg-color'; } ?>">
		<?php if(!empty($title)){ ?>
			<h2 class="widget-title"><?php echo esc_html ($title); ?></h2>
		<?php } ?>

		<div class="ic-content-wrap">
			<?php
			$i = 1;
			foreach ($category_array as $category) { 
				$thumbnail_id = get_term_meta( $category, 'thumbnail_id', true );
				$category_link = get_category_link( $category );
				$category_name = get_term( $category );
				$category_image_attribute = wp_get_attachment_image_src( $thumbnail_id, 'supermarket-category-image' );
			?>
				<div class="ic-content">
					<?php if ( $category_image_attribute[0] ) { ?>
						<div class="ic-img">
							<a class="ic-link" href="<?php echo esc_url( $category_link ); ?>"><img src="<?php echo esc_url( $category_image_attribute[0] ); ?>" alt="<?php echo esc_attr( $category_name->name ); ?>" /></a>
						</div>
					<?php } ?>
					<div class="ic-text">
						<h4><a title="<?php echo esc_attr($category_name->name); ?>" href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_html( $category_name->name ); ?></a></h4>
						<?php echo category_description($category); ?>
						<div class="more-products"><a href="<?php echo esc_url( $category_link ); ?>"><?php if ($category_name->count) { echo absint ($category_name->count); } ?> <?php _e('Products','supermarket'); ?></a></div>
					</div>
				</div> <!-- end .ic-content -->
				<?php $i++;
			}
			wp_reset_postdata(); ?>
		</div> <!-- end .ic-content-wrap -->
	</div> <!-- end .widget-inner-wrap -->

	<?php echo $after_widget . '<!-- end .supermarket-image-category-widget -->';
	}
}