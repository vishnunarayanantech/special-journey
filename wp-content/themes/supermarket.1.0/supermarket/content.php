<?php
/**
 * The template for displaying content.
 *
 * @package Theme Freesia
 * @subpackage Supermarket
 * @since Supermarket 1.0
 */
$supermarket_settings = supermarket_get_theme_options(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
		<?php $supermarket_blog_post_image = $supermarket_settings['supermarket_blog_post_image'];
		$entry_format_meta_blog = $supermarket_settings['supermarket_entry_meta_blog'];
		if( has_post_thumbnail() && $supermarket_blog_post_image == 'on') { ?>
			<div class="post-image-content">
				<figure class="post-featured-image">
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail(); ?>
					</a>
				</figure><!-- end.post-featured-image  -->
			</div><!-- end.post-image-content -->
		<?php } ?>
			<div class="post-all-content">
				<header class="entry-header">
					<h2 class="entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_title();?> </a> </h2> <!-- end.entry-title -->

					<?php if($entry_format_meta_blog == 'show-meta' ){ 
							if ( $supermarket_settings['supermarket_post_date'] != 1 || $supermarket_settings['supermarket_post_author'] != 1 || $supermarket_settings['supermarket_post_comments'] != 1){ ?> 
							<div class="entry-meta">
								<?php 
									
									if ( $supermarket_settings['supermarket_post_author'] != 1){ ?>
									<span class="author vcard"><?php esc_html_e('By','supermarket');?><a href="<?php echo esc_url (get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>" title="<?php the_author(); ?>">
									<?php the_author(); ?> </a></span>
									<?php }

									if ( $supermarket_settings['supermarket_post_date'] != 1) {
										printf( '<span class="posted-on"><a href="%1$s" title="%2$s">%3$s</a></span>',
										esc_url(get_the_permalink()),
										esc_attr( get_the_time() ),
										esc_attr(get_the_time( get_option( 'date_format' ) ))
										);
									}

									if ( comments_open() ) { 
										if ( $supermarket_settings['supermarket_post_comments'] != 1){ ?>
											<span class="comments">
											<?php comments_popup_link( __( 'No Comments', 'supermarket' ), __( '1 Comment', 'supermarket' ), __( '% Comments', 'supermarket' ), '', __( 'Comments Off', 'supermarket' ) ); ?> </span>
										<?php }
									} ?>
							</div>
							<?php }
						} ?>
				</header><!-- end .entry-header -->

				<div class="entry-content">
					<?php
					$supermarket_tag_text = $supermarket_settings['supermarket_tag_text'];
					$content_display = $supermarket_settings['supermarket_blog_content_layout'];
					if($content_display == 'excerptblog_display'):
							the_excerpt(); ?>
						<?php else:
							the_content( sprintf(esc_attr($supermarket_tag_text).'%s', '<span class="screen-reader-text">  '.get_the_title().'</span>' ));
						endif; ?>
				</div> <!-- end .entry-content -->
				<?php
				if($entry_format_meta_blog == 'show-meta' ){
				 $format = get_post_format();
				 $tag_list = get_the_tag_list( '', __( ', ', 'supermarket' ) );
					if ( $supermarket_settings['supermarket_post_category'] != 1 || !empty($format) || !empty($tags_list)){ ?>
						<div class="entry-footer">
							<div class="entry-meta">

								<?php
								if ( current_theme_supports( 'post-formats', $format ) ) {
									printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
										sprintf( ''),
										esc_url( get_post_format_link( $format ) ),
										esc_attr(get_post_format_string( $format ))
									);
								}

								if ( $supermarket_settings['supermarket_post_category'] != 1){  ?>
								<span class="cat-links">
									<?php the_category(', '); ?>
								</span> <!-- end .cat-links -->
								<?php }

								if(!empty($tag_list)){ ?>
									<span class="tag-links">
										<?php   echo get_the_tag_list( '', __( ', ', 'supermarket' ) ); ?>
									</span> <!-- end .tag-links -->
								<?php }  ?>
							</div> <!-- end .entry-meta -->
						</div>
					<?php }
				} ?>
			</div><!-- end .post-all-content -->

			<?php wp_link_pages( array( 
					'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.esc_html__( 'Pages:', 'supermarket' ),
					'after'             => '</div>',
					'link_before'       => '<span>',
					'link_after'        => '</span>',
					'pagelink'          => '%',
					'echo'              => 1
				) ); ?>
		</article><!-- end .post -->