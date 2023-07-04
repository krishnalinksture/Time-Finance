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

if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $resources_view_all_button ) || ! empty( $select_form ) ) {
	?>
	<section class="resources-block" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( ! empty( $main_title ) || ! empty( $content ) ) {
				?>
				<div class="row">
					<div class="col-9">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						if ( ! empty( $content ) ) {
							echo $content; //phpcs:ignore
						}
						?>
					</div>
				</div>
				<?php
			}
			?>
			<div class="row">
				<div class="col-3">
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
						if ( $resources_view_all_button && ! empty( $resources_view_all_button['url'] ) && ! empty( $resources_view_all_button['title'] ) ) {
							?>
							<li class="resources-cat-list">
								<?php
								$link_url    = $resources_view_all_button['url'];
								$link_title  = $resources_view_all_button['title'];
								$link_target = $resources_view_all_button['target'] ? $resources_view_all_button['target'] : '_self';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
									<?php echo esc_html( $link_title ); ?>
								</a>
							</li>
							<?php
						}
						?>
					</ul>
				</div>
				<?php
				if ( $loop->have_posts() ) {
					?>
					<div class="col-9 resources-wrapper">
						<div class="row row-cols-1 row-cols-lg-2">
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
								<div class="col text-center">
									<div class="resources-box">
										<?php
										if ( get_the_post_thumbnail() ) {
											?>
											<div class="resources-image">
												<?php the_post_thumbnail(); ?>
											</div>
											<?php
										}
										?>
										<div class="resources-content">
											<div class="resources-date">
												<?php
												echo get_the_date( 'm F Y', get_the_ID() );
												echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'resources-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
												?>
											</div>
											<?php
											if ( get_the_title() ) {
												?>
												<div class="resources-title">
													<?php echo get_the_title(); //phpcs:ignore ?>
												</div>
												<?php
											}
											if ( ! empty( $read_more_button ) || ! empty( $select_form ) ) {
												?>
												<div class="popup-form">
													<?php
													if ( ! empty( $read_more_button ) ) {
														?>
														<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#resourseModal">
															<?php echo esc_html( $read_more_button ); ?>
														</button>
														<?php
													}
													if ( ! empty( $select_form ) ) {
														?>
														<div class="modal fade" id="resourseModal" tabindex="-1" aria-labelledby="resourseModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-body">
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
																	</div>
																</div>
															</div>
														</div>
														<?php
													}
													?>
												</div>
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<?php
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
