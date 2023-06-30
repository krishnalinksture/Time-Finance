<?php
/**
 * OUR HISTORY BLOCK
 *
 * @package TIMEFINANCE
 */

$history_content = get_sub_field( 'history_content' );
$main_title      = get_sub_field( 'main_title' );
$select_tag      = get_sub_field( 'select_tag' );
$section_id      = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'our-history-block-' );
?>
<section class="our-history-block <?php echo $background_color; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-3">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				?>
			</div>
		</div>
		<?php
		if ( have_rows( 'history_content' ) ) {
			?>
			<div class="separator">
				<?php
				while ( have_rows( 'history_content' ) ) {
					the_row();
					$image           = get_sub_field( 'image' );
					$date            = get_sub_field( 'date' );
					$history_title   = get_sub_field( 'title' );
					$select_position = get_sub_field( 'select_position' );
					$position        = ( 'right' === $select_position ) ? 'justify-content-end' : '';
					$image_alt       = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );
					?>
					<div class="row <?php echo $position; //phpcs:ignore ?>">
						<div class="col-12 col-md-5">
							<div class="history-card">
								<img width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
								<div class="card-content">
									<div class="card-title">
										<?php
										if ( ! empty( $date ) ) {
											echo esc_html( $date );
										}
										?>
									</div>
									<div class="card-text">
										<?php echo esc_html( $history_title ); ?>
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
		}
		?>
	</div>
</section>
