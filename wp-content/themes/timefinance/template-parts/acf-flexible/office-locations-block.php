<?php
/**
 * OFFICE LOCATIONS BLOCK
 *
 * @package TIMEFINANCE
 */

$location_cards   = get_sub_field( 'location_cards' );
$main_title       = get_sub_field( 'main_title' );
$select_tag       = get_sub_field( 'select_tag' );
$background_color = get_sub_field( 'background_color' );
$padding_settings = get_sub_field( 'padding_settings' );
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'office-locations-block-' );

if ( ! empty( $main_title ) || have_rows( 'location_cards' ) ) {
	?>
	<section class="office-locations-block <?php echo $background_color . ' ' . $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container-fluid">
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
			if ( have_rows( 'location_cards' ) ) {
				?>
				<div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-md-2">
					<?php
					while ( have_rows( 'location_cards' ) ) {
						the_row();
						$map_image      = get_sub_field( 'map_image' );
						$location_title = get_sub_field( 'title' );
						$email          = get_sub_field( 'email' );
						$phone_number   = get_sub_field( 'phone_number' );
						$address        = get_sub_field( 'address' );
						$map_link       = get_sub_field( 'map_link' );
						$map_image_alt  = ( isset( $map_image['alt'] ) && ! empty( $map_image['alt'] ) ) ? $map_image['alt'] : ( isset( $map_image['title'] ) && ! empty( $map_image['title'] ) ? $map_image['title'] : '' );
						if ( ! empty( $map_image ) || ! empty( $location_title ) || ! empty( $email ) || ! empty( $phone_number ) || ! empty( $address ) ) {
							?>
							<div class="col location-card">
								<?php
								if ( ! empty( $map_image ) || ! empty( $map_link ) ) {
									?>
									<div class="location-card-image">
										<?php
										if ( $map_link && ! empty( $map_link['url'] ) && ! empty( $map_link['title'] ) ) {
											$link_url    = $map_link['url'];
											$link_target = $map_link['target'] ? $map_link['target'] : '_self';
											?>
											<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img width="<?php echo $map_image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $map_image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $map_image['url']; ?>" srcset="<?php echo $map_image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $map_image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $map_image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $map_image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $map_image_alt; //phpcs:ignore ?>"></a>
											<?php
										}
										?>
									</div>
									<?php
								}
								if ( ! empty( $location_title ) || ! empty( $email ) || ! empty( $phone_number ) || ! empty( $address ) ) {
									?>
									<div class="location-card-content">
										<?php
										if ( ! empty( $location_title ) ) {
											?>
											<div class="card-title">
												<?php echo esc_html( $location_title ); ?>
											</div>
											<?php
										}
										if ( $email && ! empty( $email['url'] ) && ! empty( $email['title'] ) ) {
											?>
											<div class="email">
												<?php
												$link_url    = $email['url'];
												$link_title  = $email['title'];
												$link_target = $email['target'] ? $email['target'] : '_self';
												echo esc_html( 'E:' );
												?>
												<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
													<?php echo esc_html( $link_title ); ?>
												</a>
											</div>
											<?php
										}
										if ( $phone_number && ! empty( $phone_number['url'] ) && ! empty( $phone_number['title'] ) ) {
											?>
											<div class="phone-number">
												<?php
												$link_url    = $phone_number['url'];
												$link_title  = $phone_number['title'];
												$link_target = $phone_number['target'] ? $phone_number['target'] : '_self';
												echo esc_html( 'T: ' );
												?>
												<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
													<?php echo esc_html( $link_title ); ?>
												</a>
											</div>
											<?php
										}
										if ( ! empty( $address ) ) {
											echo $address; //phpcs:ignore
										}
										?>
									</div>
									<?php
								}
								?>
							</div>
							<?php
						}
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
	</section>
	<?php
}
