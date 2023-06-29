<?php
/**
 * CAREER DETAILS BLOCK
 *
 * @package TIMEFINANCE
 */

$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'career-details-block-' );

?>
<section class="career-details-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
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
										<?php echo esc_html( 'Job type: ' . $salary ); ?>
									</div>
									<?php
									if ( $find_out_more_button && ! empty( $find_out_more_button['url'] ) && ! empty( $find_out_more_button['title'] ) ) {
										$link_url    = $find_out_more_button['url'];
										$link_title  = $find_out_more_button['title'];
										$link_target = $find_out_more_button['target'] ? $find_out_more_button['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
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
	</div>
</section>
