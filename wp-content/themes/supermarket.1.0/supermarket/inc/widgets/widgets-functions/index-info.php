<?php
/**
 * Display Index Info widgets
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */

/**************** Index Info widgets ***************************/
class supermarket_index_text_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'supermarket-index-info-widget', 'description' => __('Display  index info widgets for Supermarket Template', 'supermarket'));
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct(false, $name = __('TF: Index Info', 'supermarket'), $widget_ops, $control_ops);
	}
	function form($instance) {
		$instance           = wp_parse_args((array) $instance, array('title' => '', 'page_id1' => '','page_id2' => '','page_id3' => '', 'page_id4' => '', 'number' => '4' ));


		$number = esc_html($instance['number']);
		$title = esc_html($instance['title']);

		for ($i = 1; $i <= $number; $i++) {
			$page_id = 'page_id'.$i;
			$defaults[$page_id] = '';
			$page_id = absint($instance[$page_id]);
		}
		$instance = wp_parse_args((array)$instance, $defaults);
		
		
		
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
			<?php _e( 'Number of page:', 'supermarket' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo absint($number); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e( 'Title:', 'supermarket' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<?php

		for ($i = 1; $i <= $number; $i++) { 
			$page_id = 'page_id'.$i;
			$page_id = absint($instance[$page_id]);

		?>
			<p>
				<label for="<?php echo $this->get_field_id(key($defaults));?>">
					<?php _e('Page # ', 'supermarket'); echo absint($i);?>
				:</label>
				<?php wp_dropdown_pages(array('show_option_none' => ' ', 'name' => $this->get_field_name(key($defaults)), 'selected' => $instance[key($defaults)]));?>
			</p>
		<?php next($defaults);// forwards the key of $defaults array
		} ?>
		

	<?php }
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['number'] = absint($new_instance['number']);

		for ($i = 1; $i <= $instance['number']; $i++) {
			$page_id = 'page_id'.$i;
			$instance[$page_id] = absint($new_instance[$page_id]);

		}
		return $instance;
	}

	function widget($args, $instance) {
		extract($args);
		extract($instance);

		$page_array = array();
		$title = isset($instance['title'])?$instance['title']:'';
		$number = isset( $instance[ 'number' ] ) ? $instance[ 'number' ] : '4';

		for ($i = 1; $i <= $number; $i++) {
			$page_id = 'page_id'.$i;
			$page_id = isset($instance[$page_id])?$instance[$page_id]:'';
			if( !empty( $page_id )  || !empty( $button_text ) || !empty( $button_link ))  {
				if (!empty($page_id)) {
					array_push($page_array, $page_id);
				}
			}	
			

		}
		echo $before_widget; ?>
		<div class="widget-inner-wrap">
		<?php if(!empty($title)){ ?>
			<h2 class="widget-title"><?php echo esc_html ($title); ?></h2>
		<?php } ?>
			<div class="index-info-content wrap">
				<div class="index-info-grid-list">
					<?php
					$get_featured_pages = new WP_Query(array(
						'posts_per_page' => -1, 'post_type' => array('page'), 'post__in' => $page_array, 'orderby' => 'post__in'
					));
					while ($get_featured_pages->have_posts()):$get_featured_pages->the_post(); ?>
						<div class="index-info-item">
							<div class="index-info-item-wrap">

								<?php if (has_post_thumbnail()){ ?>
								<div class="info-icon">
									<?php the_post_thumbnail(); ?>
								</div>
								<?php } ?>
								<div class="info-text">
									<h3 class="index-info-title"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<?php $thecontent = get_the_content();
									if(!empty($thecontent)) { ?>
										<div class="index-info-sub-title"><?php the_content(); ?></div>
									<?php } ?>
								</div>
							</div> <!-- end .index-info-item-wrap -->
						</div> <!-- end .index-info-item -->
					<?php endwhile;
						wp_reset_postdata();
					?>
				</div> <!-- end .index-info-grid-list -->
			</div> <!-- end .index-info-content -->
		</div>  <!-- end .widget-inner-wrap -->

	<?php echo $after_widget . ' <!-- end .index-info-grid-container -->'; 
	}
}