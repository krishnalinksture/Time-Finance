<?php
/**
 * BDT CATEGORY PAGE
 *
 * @package TIMEFINANCE
 */

$bdt_title           = get_field( 'bdt_title', 'option' );
$bdt_select_tag      = get_field( 'bdt_select_tag', 'option' );
$bdt_content         = get_field( 'bdt_content', 'option' );
$bdt_view_all_button = get_field( 'bdt_view_all_button', 'option' );

if ( ! empty( $bdt_title ) || ! empty( $bdt_content ) ) {
	?>
	<section class="bdt-category">
		<div class="container">
			<?php
			if ( ! empty( $bdt_title ) || ! empty( $bdt_content ) ) {
				?>
				<div class="row">
					<div class="col-xl-9 col-lg-11 col-md-12">
						<?php
						if ( ! empty( $bdt_title ) ) {
							echo '<' . esc_attr( $bdt_select_tag ) . ' class="section-title h-4">' . esc_html( $bdt_title ) . '</' . esc_attr( $bdt_select_tag ) . '>';
						}
						if ( ! empty( $bdt_content ) ) {
							echo $bdt_content; //phpcs:ignore
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
			<div class="col col-lg-3 col-md-7 filter-post-left d-none d-md-block">
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
					if ( $bdt_view_all_button && ! empty( $bdt_view_all_button['url'] ) && ! empty( $bdt_view_all_button['title'] ) ) {
						?>
						<li class="bdts-cat-list">
							<?php
							$link_url    = $bdt_view_all_button['url'];
							$link_title  = $bdt_view_all_button['title'];
							$link_target = $bdt_view_all_button['target'] ? $bdt_view_all_button['target'] : '_self';
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
			<div class="dropdown d-md-none">
				<div class="cat-filter">
					<?php echo esc_html( 'FILTER POSTS:' ); ?>
				</div>
				<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuBdt" data-bs-toggle="dropdown" aria-expanded="false">
					<?php
					$category = get_queried_object();
					echo $category->name; //phpcs:ignore
					?>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuBdt">
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
					if ( $bdt_view_all_button && ! empty( $bdt_view_all_button['url'] ) && ! empty( $bdt_view_all_button['title'] ) ) {
						?>
						<li class="bdts-cat-list">
							<?php
							$link_url    = $bdt_view_all_button['url'];
							$link_title  = $bdt_view_all_button['title'];
							$link_target = $bdt_view_all_button['target'] ? $bdt_view_all_button['target'] : '_self';
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
			if ( have_posts() ) {
				?>
				<div class="col col-lg-9 col-md-12 bdt-wrapper">
					<div class="row row-cols-1 row-cols-md-2">
						<?php
						while ( have_posts() ) {
							the_post();
							$send_message_button = get_field( 'send_message_button' );
							$bdt_role            = get_field( 'bdt_role' );
							$location            = get_field( 'location' );
							$phone_number        = get_field( 'phone_number' );
							$linked_in           = get_field( 'linked_in' );
							$select_form         = get_field( 'bdt_select_form', 'option' );
							$form                = ( ! empty( $select_form ) ) ? '[forminator_form id="' . $select_form . '"]' : '';
							if ( ! empty( get_the_title() ) || ! empty( $bdt_role ) || ! empty( $location ) || ! empty( $phone_number ) || ! empty( $linked_in ) || ! empty( $send_message_button ) || ! empty( $select_form ) ) {
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
											if ( ! empty( get_the_title() ) ) {
												?>
												<div class="bdts-title">
													<?php echo esc_html( get_the_title() ); ?>
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
											if ( ! empty( $phone_number ) || ! empty( $linked_in ) ) {
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
											if ( ! empty( $send_message_button ) ) {
												?>
												<div class="popup-form">
													<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#bdtModal">
														<?php echo esc_html( $send_message_button ); ?>
													</button>
													<div class="modal fade" id="bdtModal" tabindex="-1" aria-label	="bdtModalLabel" aria-hidden="true">
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
							}
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
