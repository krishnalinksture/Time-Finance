<?php
/**
 * OUR HISTORY BLOCK
 *
 * @package TIMEFINANCE
 */

$history_content  = get_sub_field( 'history_content' );
$main_title       = get_sub_field( 'main_title' );
$select_tag       = get_sub_field( 'select_tag' );
$padding_settings = get_sub_field( 'padding_settings' );
$background_color = get_sub_field( 'select_background_color' );
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'our-history-block-' );

if ( ! empty( $main_title ) || have_rows( 'history_content' ) ) {
	?>
	<section class="our-history-block <?php echo $background_color . ' ' . $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( ! empty( $main_title ) ) {
				?>
				<div class="row justify-content-center text-center">
					<div class="col">
						<?php echo '<' . esc_attr( $select_tag ) . ' class="section-title h-3">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>'; ?>
					</div>
				</div>
				<?php
			}
			if ( have_rows( 'history_content' ) ) {
				?>
				<div class="row justify-content-center">
					<div class="col-12 col-xl-11 history-wrapper">
						<div class="separator"></div>
						<?php
						while ( have_rows( 'history_content' ) ) {
							the_row();
							$image           = get_sub_field( 'image' );
							$date            = get_sub_field( 'date' );
							$history_title   = get_sub_field( 'title' );
							$select_position = get_sub_field( 'select_position' );
							$position        = ( 'right' === $select_position ) ? 'justify-content-end' : '';
							$image_alt       = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );
							if ( ! empty( $image ) || ! empty( $date ) || ! empty( $history_title ) ) {
								?>
								<div class="row <?php echo $position; //phpcs:ignore ?>">
									<div class="col-12 col-md-5">
										<div class="history-card">
											<?php
											if ( ! empty( $image ) ) {
												?>
												<img width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
												<?php
											}
											if ( ! empty( $date ) || ! empty( $history_title ) ) {
												?>
												<div class="card-content">
													<?php
													if ( ! empty( $date ) ) {
														?>
														<div class="card-title">
															<?php echo esc_html( $date ); ?>
														</div>
														<?php
													}
													if ( ! empty( $history_title ) ) {
														?>
														<div class="card-text">
															<?php echo esc_html( $history_title ); ?>
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
							}
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
