<?php
/**
 * CAREER DETAILS BLOCK
 *
 * @package TIMEFINANCE
 */

$select_style         = get_sub_field( 'select_style' );
$accordion_title      = get_sub_field( 'title' );
$select_tag           = get_sub_field( 'select_tag' );
$all_vacancies_button = get_sub_field( 'all_vacancies_button' );
$section_id           = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'career-details-block-' );

switch ( $select_style ) {
	case 'style-1':
		?>
		<section class="career-details-block <?php echo $select_style; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
			<div class="container">
				<div class="row row-cols-1 justify-content-center">
					<?php
					$args = array(
						'post_type'   => 'careers',
						'post_status' => 'publish',
						'orderby'     => 'post_date',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) {
						$loop->the_post();
						$area                 = get_field( 'area' );
						$salary               = get_field( 'salary' );
						$job_type             = get_field( 'job_type' );
						$find_out_more_button = get_field( 'find_out_more_button' );
						if ( get_the_title() || ! empty( $area ) || ! empty( $salary ) || ! empty( $job_type ) || ! empty( $find_out_more_button ) ) {
							?>
							<div class="col-md-11 col-sm-8 career-wrapper">
								<div class="careers-box">
									<?php
									if ( get_the_title() ) {
										?>
										<div class="careers-title">
											<?php echo get_the_title(); //phpcs:ignore ?>
										</div>
										<?php
									}
									if ( ! empty( $area ) || ! empty( $salary ) || ! empty( $job_type ) || ! empty( $find_out_more_button ) ) {
										?>
										<div class="careers-content">
											<div class="row">
												<div class="col-md-5">
													<?php
													if ( ! empty( $area ) ) {
														?>
														<div class="careers-area">
															<span><?php echo esc_html( 'Area:' ); ?></span>
															<?php echo esc_html( $area ); ?>
														</div>
														<?php
													}
													if ( ! empty( $salary ) ) {
														?>
														<div class="careers-salary">
															<span><?php echo esc_html( 'Salary:' ); ?></span>
															<?php echo esc_html( $salary ); ?>
														</div>
														<?php
													}
													if ( ! empty( $job_type ) ) {
														?>
														<div class="careers-job-type">
															<span><?php echo esc_html( 'Job type:' ); ?></span>
															<?php echo esc_html( $job_type ); ?>
														</div>
														<?php
													}
													?>
												</div>
												<div class="col-md-7 text-wrapper">
														<?php echo get_the_content(); //phpcs:ignore ?>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<?php
													if ( $find_out_more_button && ! empty( $find_out_more_button['url'] ) && ! empty( $find_out_more_button['title'] ) ) {
														$link_url    = $find_out_more_button['url'];
														$link_title  = $find_out_more_button['title'];
														$link_target = $find_out_more_button['target'] ? $find_out_more_button['target'] : '_self';
														?>
														<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
															<?php echo esc_html( $link_title ); ?>
														</a>
														<?php
													}
													?>
												</div>
											</div>
										</div>
										<?php
									}
									?>
								</div>
							</div>
							<?php
						}
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</section>
		<?php
		break;
	case 'style-2':
		?>
		<section class="career-details-block <?php echo $select_style; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
			<div class="container-lg">
				<?php
				if ( ! empty( $accordion_title ) ) {
					?>
					<div class="row justify-content-center text-center">
						<div class="col col-lg-9">
							<?php echo '<' . esc_attr( $select_tag ) . ' class="section-title h-3">' . esc_html( $accordion_title ) . '</' . esc_attr( $select_tag ) . '>'; ?>
						</div>
					</div>
					<?php
				}
				?>
				<div class="row justify-content-center">
					<div class="col col-lg-9 career-wrapper">
						<?php
						$i = 1;
						?>
						<div class="accordion" id="accordion-<?php echo $section_id;//phpcs:ignore ?>">
							<?php
							$args = array(
								'post_type'   => 'careers',
								'post_status' => 'publish',
								'orderby'     => 'post_date',
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) {
								$loop->the_post();
								$area                 = get_field( 'area' );
								$salary               = get_field( 'salary' );
								$job_type             = get_field( 'job_type' );
								$find_out_more_button = get_field( 'find_out_more_button' );
								if ( get_the_title() || ! empty( $area ) || ! empty( $salary ) || ! empty( $job_type ) || ! empty( $find_out_more_button ) ) {
									?>
									<div class="accordion-item">
										<?php
										if ( get_the_title() ) {
											?>
											<div class="accordion-header career" id="heading-<?php echo $section_id . $i; //phpcs:ignore ?>">
												<div class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $section_id; ?>-<?php echo $i; ?>" aria-expanded="true" data-bs-parent="#accordion-<?php echo $section_id; //phpcs:ignore ?>">
													<div class="careers-title">
														<?php echo get_the_title(); //phpcs:ignore ?>
													</div>
												</div>
											</div>
											<?php
										}
										if ( ! empty( $area ) || ! empty( $salary ) || ! empty( $job_type ) || ! empty( $find_out_more_button ) ) {
											?>
											<div id="<?php echo $section_id; ?>-<?php echo $i; ?>" class="accordion-collapse collapse" aria-label="heading-<?php echo $i; ?>" data-bs-parent="#accordion-<?php echo $section_id; //phpcs:ignore ?>">
												<div class="accordion-body">
													<div class="careers-content">
														<div class="row">
															<?php
															if ( ! empty( $area ) || ! empty( $salary ) || ! empty( $job_type ) || ! empty( $find_out_more_button ) ) {
																?>
																<div class="col-md-5">
																	<?php
																	if ( ! empty( $area ) ) {
																		?>
																		<div class="careers-area">
																			<span><?php echo esc_html( 'Area:' ); ?></span>
																			<?php echo esc_html( $area ); ?>
																		</div>
																		<?php
																	}
																	if ( ! empty( $salary ) ) {
																		?>
																		<div class="careers-salary">
																			<span><?php echo esc_html( 'Salary:' ); ?></span>
																			<?php echo esc_html( $salary ); ?>
																		</div>
																		<?php
																	}
																	if ( ! empty( $job_type ) ) {
																		?>
																		<div class="careers-job-type">
																			<span><?php echo esc_html( 'Job type:' ); ?></span>
																			<?php echo esc_html( $job_type ); ?>
																		</div>
																		<?php
																	}
																	if ( $find_out_more_button && ! empty( $find_out_more_button['url'] ) && ! empty( $find_out_more_button['title'] ) ) {
																		$link_url    = $find_out_more_button['url'];
																		$link_title  = $find_out_more_button['title'];
																		$link_target = $find_out_more_button['target'] ? $find_out_more_button['target'] : '_self';
																		?>
																		<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
																			<?php echo esc_html( $link_title ); ?>
																		</a>
																		<?php
																	}
																	?>
																</div>
																<?php
															}
															if ( get_the_content() ) {
																?>
																<div class="col-md-7 text-wrapper">
																	<?php echo get_the_content(); //phpcs:ignore ?>
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
									<?php
								}
								$i++;
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
				</div>
				<?php
				if ( $all_vacancies_button && ! empty( $all_vacancies_button['url'] ) && ! empty( $all_vacancies_button['title'] ) ) {
					?>
					<div class="row justify-content-center text-center">
						<div class="col-9">
							<?php
							$link_url    = $all_vacancies_button['url'];
							$link_title  = $all_vacancies_button['title'];
							$link_target = $all_vacancies_button['target'] ? $all_vacancies_button['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</section>
		<?php
		break;
}

