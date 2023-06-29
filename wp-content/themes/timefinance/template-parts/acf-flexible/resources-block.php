<?php
/**
 * RESOURCES BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title                = get_sub_field( 'title' );
$select_tag                = get_sub_field( 'select_tag' );
$content                   = get_sub_field( 'content' );
$select_form               = get_sub_field( 'select_form' );
$form                      = ( ! empty( $select_form ) ) ? '[forminator_form id="' . $select_form . '"]' : '';
$resources_view_all_button = get_field( 'resources_view_all_button', 'option' );
$section_id                = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'resources-block-' );

?>
<section class="resources-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-2">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<div class="cat-filter">
					<?php echo esc_html( 'FILTER POSTS:' ); ?>
				</div>
				<ul>
					<?php
					$args       = array(
						'taxonomy' => 'resources-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="resources-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					?>
					<li class="resources-cat-list">
						<?php
						if ( $resources_view_all_button && ! empty( $resources_view_all_button['url'] ) && ! empty( $resources_view_all_button['title'] ) ) {
							$link_url    = $resources_view_all_button['url'];
							$link_title  = $resources_view_all_button['title'];
							$link_target = $resources_view_all_button['target'] ? $resources_view_all_button['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
							<?php
						}
						?>
					</li>
				</ul>
			</div>
			<div class="col-8">
				<div class="row">
					<?php
					$args = array(
						'post_type'   => 'resources',
						'post_status' => 'publish',
						'orderby'     => 'post_date',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) {
						$loop->the_post();
						$read_more_button = get_field( 'read_more_button' );
						?>
						<div class="col">
							<div class="resources-box">
								<div class="resources-image">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="resources-conent">
									<div class="resources-date">
										<?php
										echo get_the_date( 'm F Y', get_the_ID() );
										echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'resources-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
										?>
									</div>
									<div class="resources-title">
										<?php echo get_the_title(); //phpcs:ignore ?>
									</div>
									<div class="resources-content">
										<?php echo get_the_content(); //phpcs:ignore ?>
									</div>
									<div class="popup-form">
										<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
											<?php echo esc_html( $read_more_button ); ?>
										</button>
										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-body">
														<?php
														if ( ! empty( $select_form ) ) {
															?>
															<div class="row justify-content-center">
																<div class="col">
																	<?php
																	if ( ! empty( $select_form ) ) {
																		?>
																		<div class="resource-popup-form">
																			<?php echo do_shortcode( $form ); ?>
																		</div>
																		<?php
																	}
																	?>
																</div>
															</div>
															<?php
														}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
