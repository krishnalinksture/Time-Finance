<?php
/**
 * HOMEPAGE HERO
 *
 * @package TIMEFINANCE
 */

$slider_content       = get_sub_field( 'slider_content' );
$show_for_more_button = get_sub_field( 'show_for_more_button' );
$section_id           = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'homepage-hero-' );

if ( have_rows( 'slider_content' ) || ! empty( $show_for_more_button ) ) {
	?>
	<section class="homepage-hero" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<div class="swiper homepage-hero-slider">
				<div class="swiper-wrapper">
					<?php
					while ( have_rows( 'slider_content' ) ) {
						the_row();
						$main_title            = get_sub_field( 'title' );
						$select_tag            = get_sub_field( 'select_tag' );
						$content               = get_sub_field( 'content' );
						$left_background_image = get_sub_field( 'left_background_image' );
						$cta_button            = get_sub_field( 'cta_button' );
						$right_image           = get_sub_field( 'right_image' );
						$background            = ( ! empty( $left_background_image ) ) ? ' style="background-image:url(' . esc_url( $left_background_image ) . ');"' : '';
						$right_image_alt       = ( isset( $right_image['alt'] ) && ! empty( $right_image['alt'] ) ) ? $right_image['alt'] : ( isset( $right_image['title'] ) && ! empty( $right_image['title'] ) ? $right_image['title'] : '' );
						if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $cta_button ) || ! empty( $right_image ) ) {
							?>
							<div class="swiper-slide">
								<div class="row">
									<?php
									if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $cta_button ) ) {
										?>
										<div class="col-6" <?php echo $background; //phpcs:ignore ?>>
											<?php
											if ( ! empty( $main_title ) ) {
												echo '<' . esc_attr( $select_tag ) . ' class="section-title">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
											}
											if ( ! empty( $content ) ) {
												echo $content; //phpcs:ignore
											}
											if ( $cta_button && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) {
												$link_url    = $cta_button['url'];
												$link_title  = $cta_button['title'];
												$link_target = $cta_button['target'] ? $link['target'] : '_self';
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
									if ( ! empty( $right_image ) ) {
										?>
										<div class="col-6">
											<img class="right-image" width="<?php echo $right_image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$right_image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $right_image['url']; ?>" srcset="<?php echo $right_image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $right_image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $right_image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $right_image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $right_image_alt; //phpcs:ignore ?>">
										</div>
										<?php
									}
									?>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
				<div class="swiper-counter .swiper-counter-homepage-hero"><span class="count"></span></div>
				<div class="swiper-pagination swiper-pagination-homepage-hero"></div>
				<?php
				if ( $show_for_more_button && ! empty( $show_for_more_button['url'] ) && ! empty( $show_for_more_button['title'] ) ) {
					$link_url    = $show_for_more_button['url'];
					$link_title  = $show_for_more_button['title'];
					$link_target = $show_for_more_button['target'] ? $link['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
						<?php echo esc_html( $link_title ); ?>
					</a>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
