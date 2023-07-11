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

if ( ! empty( $main_title ) || ! empty( $content ) ) {
	?>
	<section class="bdt-block" id="<?php echo $section_id; //phpcs:ignore ?>">
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
		</div>
	</section>
	<?php
}
?>
<section class="bdt-filter-block">
	<div class="container">
		<div class="row align-items-start">
			<div class="col-3 filter-post-left">
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
					if ( $view_all && ! empty( $view_all['url'] ) && ! empty( $view_all['title'] ) ) {
						?>
						<li class="bdts-cat-list">
							<?php
							$link_url    = $view_all['url'];
							$link_title  = $view_all['title'];
							$link_target = $view_all['target'] ? $view_all['target'] : '_self';
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
			<div class="col-9 bdt-wrapper">
				<div class="row row-cols-1 row-cols-lg-2">
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
						<div class="col text-center">
							<div class="bdts-box">
								<?php
								if ( get_the_post_thumbnail() ) {
									?>
									<div class="bdts-image">
										<?php the_post_thumbnail(); ?>
									</div>
									<?php
								}
								?>
								<div class="bdts-content">
									<?php
									if ( get_the_title() ) {
										?>
										<div class="bdts-title">
											<?php echo get_the_title(); //phpcs:ignore ?>
										</div>
										<?php
									}
									if ( ! empty( $bdt_role ) ) {
										?>
										<div class="bdts-role">
											<?php echo esc_html( $bdt_role ); ?>
										</div>
										<?php
									}
									?>
									<div class="bdts-category">
										<?php echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'bdts-categories', ' ', ', ', ' ' ) ); //phpcs:ignore ?>
									</div>
									<?php
									if ( ! empty( $location ) ) {
										?>
										<div class="bdts-location">
											<?php echo esc_html( $location ); ?>
										</div>
										<?php
									}
									if ( get_the_content() ) {
										echo get_the_content(); //phpcs:ignore
									}
									if ( ! empty( $location ) || ! empty( $linked_in ) ) {
										?>
										<div class="contact">
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
											?>
										</div>
										<?php
									}
									if ( ! empty( $send_message_button ) || ! empty( $select_form ) ) {
										?>
										<div class="popup-form">
											<?php
											if ( ! empty( $send_message_button ) ) {
												?>
												<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#bdtModal">
													<?php echo esc_html( $send_message_button ); ?>
												</button>
												<?php
											}
											?>
											<div class="modal fade" id="bdtModal" tabindex="-1" aria-label="bdtModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="bdtModalLabel"><?php echo esc_html( 'Enquiry form' ); ?></h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<?php
														if ( ! empty( $select_form ) ) {
															?>
															<div class="modal-body">
																<div class="row justify-content-center">
																	<div class="col">
																		<div class="bdt-popup-form">
																			<?php echo do_shortcode( $form ); ?>
																			<div class="thankyou-msg-bdt"><?php echo esc_html( 'Thank you for your message. A member of our team will be in touch shortly. In the meantime, if youre interested in how we use your data please click ' ); //phpcs:ignore ?><a href="#"><?php echo esc_html( 'here' ); ?></a></div>
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
