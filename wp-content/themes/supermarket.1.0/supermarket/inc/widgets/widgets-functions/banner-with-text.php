<?php
/**
 * Display Banner Text widgets
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */

/**************** Banner Text widgets ***************************/
class supermarket_banner_with_text_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'supermarket-banner-with-text-widget', 'description' => __('Display  Banner Text widgets for Supermarket Template', 'supermarket'));
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct(false, $name = __('TF: Banner with Text', 'supermarket'), $widget_ops, $control_ops);
	}
	function form($instance) {
		$instance           = wp_parse_args((array) $instance, array('title' => '', 'page_id1' => '','page_id2' => '','button_text1' => '', 'button_link1' => '','button_text2' => '', 'button_link2' => '', 'banner_type' => 'off', 'single_column' =>'off', 'title_style' =>'on', 'light_text_color' => 'off' ));


		$title = esc_html($instance['title']);
		$banner_type = esc_attr($instance['banner_type']);
		$single_column = esc_attr($instance['single_column']);
		$title_style = esc_attr($instance['title_style']);
		$light_text_color = esc_attr($instance['light_text_color']);
		for ($i = 1; $i <= 2; $i++) {
			$page_id = 'page_id'.$i;
			$button_text = 'button_text'.$i;
			$button_link = 	'button_link'.$i;
			$defaults[$page_id] = '';
			$instance[ $button_text ] = esc_html( $instance[ $button_text ] );
			$instance[ $button_link ] = esc_url( $instance[ $button_link ] );
			$page_id = absint($instance[$page_id]);
		}
		$instance = wp_parse_args((array)$instance, $defaults);
		
		
		
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e( 'Title:', 'supermarket' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'banner_type' ); ?>"><?php _e( 'Fullwidth Banner (This feature works only with Single Column Banner is On):', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'banner_type' ); ?>" name="<?php echo $this->get_field_name( 'banner_type' ); ?>">
				<option value="on" <?php selected( $instance['banner_type'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['banner_type'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'single_column' ); ?>"><?php _e( 'Single Column Banner:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'single_column' ); ?>" name="<?php echo $this->get_field_name( 'single_column' ); ?>">
				<option value="on" <?php selected( $instance['single_column'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['single_column'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_style' ); ?>"><?php _e( 'Widget Title design:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'title_style' ); ?>" name="<?php echo $this->get_field_name( 'title_style' ); ?>">
				<option value="on" <?php selected( $instance['title_style'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['title_style'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'light_text_color' ); ?>"><?php _e( 'Text Color Light:', 'supermarket' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'light_text_color' ); ?>" name="<?php echo $this->get_field_name( 'light_text_color' ); ?>">
				<option value="on" <?php selected( $instance['light_text_color'], 'on'); ?>><?php _e( 'On', 'supermarket' ); ?></option>
				<option value="off" <?php selected( $instance['light_text_color'], 'off'); ?>><?php _e( 'Off', 'supermarket' ); ?></option>
			</select>
		</p>
		<hr>

		<?php 

		$num =1;
		if ($single_column == 'on'){
			$num = 1;

		} else {
			$num = 2;
		}

		for ($i = 1; $i <= $num; $i++) { 
			$page_id = 'page_id'.$i;
			$button_text = 'button_text'.$i;
			$button_link = 	'button_link'.$i;
			$page_id = absint($instance[$page_id]);

		?>
			<p>
				<label for="<?php echo $this->get_field_id(key($defaults));?>">
					<?php _e('Page # ', 'supermarket'); echo absint($i);?>
				:</label>
				<?php wp_dropdown_pages(array('show_option_none' => ' ', 'name' => $this->get_field_name(key($defaults)), 'selected' => $instance[key($defaults)]));?>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id($button_text);?>">
					<?php _e('Button Text #', 'supermarket'); echo absint($i);?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($button_text);?>" name="<?php echo $this->get_field_name($button_text);?>" type="text" value="<?php if(isset ( $instance[$button_text] ) ) echo esc_attr( $instance[$button_text] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id($button_link);?>">
					<?php _e('Button Url #', 'supermarket'); echo absint($i);?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($button_link);?>" name="<?php echo $this->get_field_name($button_link);?>" type="text" value="<?php if(isset ( $instance[$button_link] ) ) echo esc_url( $instance[$button_link] ); ?>" />
			</p>
			<hr>
		<?php next($defaults);// forwards the key of $defaults array
		} ?>
		

	<?php }
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['banner_type'] = sanitize_key($new_instance['banner_type']);
		$instance['single_column'] = sanitize_key($new_instance['single_column']);
		$instance['title_style'] = sanitize_key($new_instance['title_style']);
		$instance['light_text_color'] = sanitize_key($new_instance['light_text_color']);
		for ($i = 1; $i <= 2; $i++) {
			$page_id = 'page_id'.$i;
			$button_text = 'button_text'.$i;
			$button_link = 	'button_link'.$i;
			$instance[$page_id] = absint($new_instance[$page_id]);
			$instance[$button_link] = esc_url_raw($new_instance[$button_link]);
			$instance[$button_text] = sanitize_text_field($new_instance[$button_text]);


		}
		return $instance;
	}

	function widget($args, $instance) {
		extract($args);
		extract($instance);

		$page_array = array();
		$buttontext_array = array();
		$buttonlink_array = array();
		$title = isset($instance['title'])?$instance['title']:'';
		$banner_type = isset( $instance[ 'banner_type' ] ) ? $instance[ 'banner_type' ] : 'off';
		$single_column = isset( $instance[ 'single_column' ] ) ? $instance[ 'single_column' ] : 'off';
		$title_style = isset( $instance[ 'title_style' ] ) ? $instance[ 'title_style' ] : 'on';
		$light_text_color = isset( $instance[ 'light_text_color' ] ) ? $instance[ 'light_text_color' ] : 'off';
		for ($i = 1; $i <= 2; $i++) {
			$page_id = 'page_id'.$i;
			$button_text = 'button_text'.$i;
			$button_link = 	'button_link'.$i;

			$page_id = isset($instance[$page_id])?$instance[$page_id]:'';
			$button_text = isset( $instance[ $button_text ] ) ? $instance[ $button_text ] : '';
			$button_link = isset( $instance[ $button_link ] ) ? $instance[ $button_link ] : '';
			if( !empty( $page_id )  || !empty( $button_text ) || !empty( $button_link ))  {
				if (!empty($page_id)) {
					array_push($page_array, $page_id);
				}

				if (!empty($button_text)) {
					array_push($buttontext_array, $button_text);
				}

				if (!empty($button_link)) {
					array_push($buttonlink_array, $button_link);
				}
			}	
			

		} ?>

		<section class="widget supermarket-banner-with-text-widget <?php if ($banner_type =='on'){ echo ' full-width-banner '; } if ($single_column =='on'){ echo ' single-column-banner '; } ?>">
			<div class="widget-outer-wrap">
				<div class="wrap">
					<div class="widget-inner-wrap <?php if ($title_style =='on'){ echo ' title-style '; } if ($light_text_color =='on'){ echo ' light-text '; } ?>">
						<?php if(!empty($title)){ ?>
							<h2 class="widget-title"><?php echo esc_html ($title); ?></h2>
						<?php } ?>
						<div class="banner-with-text-wrap">
							<?php
							$get_featured_pages = new WP_Query(array(
								'posts_per_page' => -1, 'post_type' => array('page'), 'post__in' => $page_array, 'orderby' => 'post__in'
							));

							$i=0;
								while ($get_featured_pages->have_posts()):$get_featured_pages->the_post(); ?>
								<div class="bwt-content">
									<div class="bwt-content-inner">
										<?php if (has_post_thumbnail()){ ?>

											<div class="bwt-img">
												<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink();?>"> <?php the_post_thumbnail(); ?></a>
											</div> <!-- end .bwt-img -->

										<?php } ?>
										
										<div class="bwt-text">
											<span><?php the_content(); ?></span>
											<h3><?php the_title(); ?></h3>
											<?php if(!empty($buttontext_array[$i])){ ?>

												<a class="btn-default" href="<?php echo esc_url($buttonlink_array[$i]); ?>"><?php echo esc_html($buttontext_array[$i]); ?></a>

											<?php } ?>
											
										</div> <!-- end .bwt-text -->
									</div> <!-- end .bwt-content-inner -->
								</div> <!-- end .bwt-content -->
							<?php 
							$i++;
						endwhile;
							wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</div> <!-- end .widget-inner-wrap -->
		</section> <!-- end .supermarket-banner-with-text-widget -->
	<?php }
}