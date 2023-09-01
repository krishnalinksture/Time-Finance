<?php
/**
 * CONTENT WITH LOGO
 *
 * @package TIMEFINANCE
 */

$main_title       = get_sub_field( 'title' );
$select_tag       = get_sub_field( 'select_tag' );
$content          = get_sub_field( 'content' );
$logos            = get_sub_field( 'logos' );
$padding_settings = get_sub_field( 'padding_settings' );
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'content-with-logo-' );

if ( ! empty( $main_title ) || ! empty( $content ) || have_rows( 'logos' ) ) {
	?>
	<section class="content-with-logo <?php echo $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<div class="row">
				<?php
				if ( ! empty( $main_title ) || ! empty( $content ) ) {
					?>
					<div class="col-12 col-lg-6 content-wrapper">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						if ( ! empty( $content ) ) {
							echo $content; //phpcs:ignore
						}
						?>
					</div>
					<?php
				}
				if ( have_rows( 'logos' ) ) {
					?>
					<div class="col-12 col-lg-6 logo-wrapper">
						<div class="row row-cols-2 row-cols-lg-3 row-cols-sm-3 text-center align-items-center">
							<?php
							while ( have_rows( 'logos' ) ) {
								the_row();
								$logo     = get_sub_field( 'logo' );
								$logo_alt = ( isset( $logo['alt'] ) && ! empty( $logo['alt'] ) ) ? $logo['alt'] : ( isset( $logo['title'] ) && ! empty( $logo['title'] ) ? $logo['title'] : '' );
								if ( ! empty( $logo ) ) {
									?>
									<div class="col logo-icon">
										<img width="<?php echo $logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $logo['url']; ?>" srcset="<?php echo $logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $logo_alt; //phpcs:ignore ?>">
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
		</div>
	</section>
	<?php
}
