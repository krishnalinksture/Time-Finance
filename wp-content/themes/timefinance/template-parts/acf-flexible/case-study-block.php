<?php
/**
 * CASE STUDY BLOCK
 *
 * @package TIMEFINANCE
 */

$background_color      = get_sub_field( 'background_color' );
$background_image      = get_sub_field( 'background_image' );
$view_all_case_studies = get_sub_field( 'view_all_case_studies' );
$background            = ( ! empty( $background_image ) ) ? ' style="background-image:url(' . esc_url( $background_image ) . ');"' : '';
$section_id            = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'case-study-block-' );
?>

<section class="case-study-block <?php echo $background_color; ?>" id="<?php echo $section_id; //phpcs:ignore ?>" <?php echo $background; ?>>
	<div class="container">
		<div class="swiper case-study" data-slider-options='{ "slidesPerView": 1, "simulateTouch": false, "loop": true, "autoplay": { "delay": 8000 },"pagination": { "el": ".swiper-pagination-case-study", "clickable": true } }'>
			<div class="swiper-wrapper">
				<?php
				$args = array(
					'post_type' => 'case-study',
				);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) {
					$loop->the_post();
					$brand_logo     = get_field( 'brand_logo' );
					$testimonial    = get_field( 'testimonial' );
					$button         = get_field( 'button' );
					$brand_logo_alt = ( isset( $brand_logo['alt'] ) && ! empty( $brand_logo['alt'] ) ) ? $brand_logo['alt'] : ( isset( $brand_logo['title'] ) && ! empty( $brand_logo['title'] ) ? $brand_logo['title'] : '' );
					if ( get_the_post_thumbnail() || ! empty( $brand_logo ) || ! empty( $testimonial ) || ! empty( $button ) ) {
						?>
						<div class="swiper-slide">
							<div class="row">
								<?php
								if ( get_the_post_thumbnail() ) {
									?>
									<div class="col-6 case-study-left"><?php the_post_thumbnail(); ?></div>
									<?php
								}
								if ( ! empty( $brand_logo ) || ! empty( $testimonial ) || ! empty( $button ) ) {
									?>
									<div class="col-6">
										<div class="case-study-right">
										<?php
										if ( ! empty( $brand_logo ) ) {
											?>
											<img class="brand-logo-image" width="<?php echo $brand_logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$brand_logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $brand_logo['url']; ?>" srcset="<?php echo $brand_logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $brand_logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $brand_logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $brand_logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $brand_logo_alt; //phpcs:ignore ?>">
											<?php
										}
										if ( ! empty( $testimonial ) ) {
											?>
											<div class="testimonial">
												<?php echo $testimonial; //phpcs:ignore ?>
											</div>
											<?php
										}
										if ( ! empty( $button ) ) {
											?>
											<div class="read-more">
												<a class="btn btn-green" href="<?php echo get_the_permalink(); //phpcs:ignore ?>"><?php echo esc_html( $button ); ?></a>
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
						<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>
			<div class="swiper-pagination swiper-pagination-case-study"></div>
		</div>
		<div class="view-all-case-studies">
			<a href="<?php echo $view_all_case_studies['url']; //phpcs:ignore ?>"><?php echo esc_html( 'View All Case Studies' ); ?></a>
		</div>
	</div>
</section>
