<?php
/**
 * BDT BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title = get_sub_field( 'title' );
$select_tag = get_sub_field( 'select_tag' );
$content    = get_sub_field( 'content' );
$view_all   = get_sub_field( 'view_all' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'bdt-block-' );

?>
<section class="bdt-block" id="<?php echo $section_id; //phpcs:ignore ?>">
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
						'taxonomy' => 'bdts-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="bdts-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					?>
					<li class="bdts-cat-list">
						<?php
						if ( $view_all && ! empty( $view_all['url'] ) && ! empty( $view_all['title'] ) ) {
							$link_url    = $view_all['url'];
							$link_title  = $view_all['title'];
							$link_target = $view_all['target'] ? $view_all['target'] : '_self';
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
						'post_type'   => 'bdts',
						'post_status' => 'publish',
						'orderby'     => 'post_date',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) {
						$loop->the_post();
						$send_message_button = get_field( 'send_message_button' );
						$bdt_role            = get_field( 'bdt_role' );
						$location            = get_field( 'location' );
						$phone_number        = get_field( 'phone_number' );
						$linked_in           = get_field( 'linked_in' );
						$select_form         = get_sub_field( 'select_form' );
						$form                = ( ! empty( $select_form ) ) ? '[forminator_form id="' . $select_form . '"]' : '';
						?>
						<div class="col">
							<div class="bdts-box">
								<div class="bdts-image">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="bdts-conent">
									<div class="bdts-title">
										<?php echo get_the_title(); //phpcs:ignore ?>
									</div>
									<div class="bdts-role">
										<?php echo esc_html( $bdt_role ); ?>
									</div>
									<div class="bdts-category">
										<?php
										echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'bdts-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
										?>
									</div>
									<div class="bdts-location">
										<?php echo esc_html( $location ); ?>
									</div>
									<div class="bdts-content">
										<?php echo get_the_content(); //phpcs:ignore ?>
									</div>
									<?php
									if ( $phone_number && ! empty( $phone_number['url'] ) && ! empty( $phone_number['title'] ) ) {
										$phone_number_link_url    = $phone_number['url'];
										$phone_number_link_title  = $phone_number['title'];
										$phone_number_link_target = $phone_number['target'] ? $phone_number['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $phone_number_link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $phone_number_link_target ); ?>">
											<?php echo esc_html( $phone_number_link_title ); ?>
										</a>
										<?php
									}
									?>
									<?php
									if ( $linked_in && ! empty( $linked_in['url'] ) && ! empty( $linked_in['title'] ) ) {
										$link_url    = $linked_in['url'];
										$link_title  = $linked_in['title'];
										$link_target = $linked_in['target'] ? $linked_in['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
											<?php echo esc_html( $link_title ); ?>
										</a>
										<?php
									}
									if ( ! empty( $send_message_button ) ) {
										?>
										<div class="popup-form">
											<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#bdtModal">
												<?php echo esc_html( $send_message_button ); ?>
											</button>
											<div class="modal fade" id="bdtModal" tabindex="-1" aria-labelledby="bdtModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="bdtModalLabel"><?php echo esc_html( 'Enquiry form' ); ?></h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
														<div class="modal-body">
															<?php
															if ( ! empty( $select_form ) ) {
																?>
																<div class="row justify-content-center">
																	<div class="col">
																		<?php
																		if ( ! empty( $select_form ) ) {
																			?>
																			<div class="bdt-popup-form">
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
		</div>
	</div>
</section>
