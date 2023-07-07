<?php
/**
 * IMAGE BULLETPOINT GROUPS
 *
 * @package TIMEFINANCE
 */

$select_background_color = get_sub_field( 'select_background_color' );
$image                   = get_sub_field( 'image' );
$bulletpoint_group       = get_sub_field( 'bulletpoint_group' );
$content                 = get_sub_field( 'content' );
$image_position          = get_sub_field( 'image_position' );
$reverse                 = ( 'right' === $image_position ) ? ' flex-sm-row-reverse ' : '';
$section_id              = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'image-bulletpoint-groups-' );
$image_alt               = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );

if ( ! empty( $image ) || ! empty( $content ) || have_rows( 'bulletpoint_group' ) ) {
	?>
	<section class="image-bulletpoint-groups" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<div class="row<?php echo $reverse; //phpcs:ignore ?>">
				<?php
				if ( ! empty( $image ) ) {
					?>
					<div class="col-6 image-box">
						<img class="image-bulletpoint" width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
					</div>
					<?php
				}
				if ( ! empty( $content ) || have_rows( 'bulletpoint_group' ) ) {
					?>
					<div class="col-6 content-box">
						<?php
						if ( ! empty( $content ) ) {
							echo $content; //phpcs:ignore
						}
						if ( have_rows( 'bulletpoint_group' ) ) {
							while ( have_rows( 'bulletpoint_group' ) ) {
								the_row();
								$bulletpoints_title = get_sub_field( 'title' );
								$select_tag         = get_sub_field( 'select_tag' );
								$bulletpoints       = get_sub_field( 'bulletpoints' );
								if ( ! empty( $bulletpoints_title ) || have_rows( 'bulletpoints' ) ) {
									?>
									<div class="bulletpoint-group">
										<?php
										if ( ! empty( $bulletpoints_title ) ) {
											echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $bulletpoints_title ) . '</' . esc_attr( $select_tag ) . '>';
										}
										if ( have_rows( 'bulletpoints' ) ) {
											?>
											<ul class="bulletpoints">
												<?php
												while ( have_rows( 'bulletpoints' ) ) {
													the_row();
													$bulletpoint = get_sub_field( 'bulletpoint' );
													?>
													<li>
														<?php echo $bulletpoint; //phpcs:ignore ?>
													</li>
													<?php
												}
												?>
											</ul>
											<?php
										}
										?>
									</div>
									<?php
								}
							}
						}
						?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
