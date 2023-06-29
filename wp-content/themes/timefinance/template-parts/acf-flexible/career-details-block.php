<?php
/**
 * CAREER DETAILS BLOCK
 *
 * @package TIMEFINANCE
 */

$select_style = get_sub_field( 'select_style' );
$accordion_title = get_sub_field( 'title' );
$select_tag = get_sub_field( 'select_tag' );
$all_vacancies_button = get_sub_field( 'all_vacancies_button' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'career-details-block-' );

?>
<section class="career-details-block <?php echo $select_style; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<?php
		if ( 'style-1' === $select_style ) {
			?>
			<div class="row">
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
					?>
					<div class="col">
						<div class="careers-box">
							<div class="careers-title">
								<?php echo get_the_title(); //phpcs:ignore ?>
							</div>
							<div class="careers-conent">
								<div class="row">
									<div class="col-5">
										<div class="careers-area">
											<?php echo esc_html( 'Area: ' . $area ); ?>
										</div>
										<div class="careers-salary">
											<?php echo esc_html( 'Salary: ' . $salary ); ?>
										</div>
										<div class="careers-job_type">
											<?php echo esc_html( 'Job type: ' . $job_type ); ?>
										</div>
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
									<div class="col-7">
										<div class="careers-content">
											<?php echo get_the_content(); //phpcs:ignore ?>
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
			<?php
		} else {
			?>
			<div class="row">
				<div class="col">
					<?php
					if ( ! empty( $accordion_title ) ) {
						echo '<' . esc_attr( $select_tag ) . ' class="section-title h-2">' . esc_html( $accordion_title ) . '</' . esc_attr( $select_tag ) . '>';
					}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col">
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
							the_row();
							$area                 = get_field( 'area' );
							$salary               = get_field( 'salary' );
							$job_type             = get_field( 'job_type' );
							$find_out_more_button = get_field( 'find_out_more_button' );
							?>
							<div class="accordion-item">
								<div class="accordion-header" id="heading-<?php echo $i; //phpcs:ignore ?>">
									<div class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $section_id; ?>-<?php echo $i; ?>" aria-expanded="true" data-bs-parent="#accordion-<?php echo $section_id; //phpcs:ignore ?>">
										<div class="careers-title">
											<?php echo get_the_title(); //phpcs:ignore ?>
										</div>
									</div>
								</div>
								<?php
								if ( ! empty( $area ) || ! empty( $salary ) || ! empty( $job_type ) ) {
									?>
									<div id="<?php echo $section_id; ?>-<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $i; ?>" data-bs-parent="#accordion-<?php echo $section_id; //phpcs:ignore ?>">
										<div class="accordion-body">
											<div class="careers-conent">
												<div class="row">
													<div class="col-5">
														<div class="careers-area">
															<?php echo esc_html( 'Area: ' . $area ); ?>
														</div>
														<div class="careers-salary">
															<?php echo esc_html( 'Salary: ' . $salary ); ?>
														</div>
														<div class="careers-job_type">
															<?php echo esc_html( 'Job type: ' . $job_type ); ?>
														</div>
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
													<div class="col-7">
														<div class="careers-content">
															<?php echo get_the_content(); //phpcs:ignore ?>
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
							$i++;
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<?php
					if ( $all_vacancies_button && ! empty( $all_vacancies_button['url'] ) && ! empty( $all_vacancies_button['title'] ) ) {
						$link_url    = $all_vacancies_button['url'];
						$link_title  = $all_vacancies_button['title'];
						$link_target = $all_vacancies_button['target'] ? $all_vacancies_button['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
							<?php echo esc_html( $link_title ); ?>
						</a>
						<?php
					}
					?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</section>
