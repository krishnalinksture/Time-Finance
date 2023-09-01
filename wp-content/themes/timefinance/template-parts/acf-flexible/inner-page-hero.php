<?php
/**
 * INNER PAGE HERO
 *
 * @package TIMEFINANCE
 */

$main_title            = get_sub_field( 'title' );
$select_tag            = get_sub_field( 'select_tag' );
$content               = get_sub_field( 'content' );
$right_image           = get_sub_field( 'right_image' );
$cta_button            = get_sub_field( 'cta_button' );
$padding_settings      = get_sub_field( 'padding_settings' );
$left_image            = get_sub_field( 'left_image' );
$right_image_alt       = ( isset( $right_image['alt'] ) && ! empty( $right_image['alt'] ) ) ? $right_image['alt'] : ( isset( $right_image['title'] ) && ! empty( $right_image['title'] ) ? $right_image['title'] : '' );
$left_image_background = ( ! empty( $left_image ) ) ? ' style="background-image:url(' . esc_url( $left_image ) . ');"' : '';
$section_id            = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'inner-page-hero-' );

if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $cta_button ) ) {
	?>
	<section class="inner-page-hero <?php echo $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="section-left-image" <?php echo $left_image_background; //phpcs:ignore ?>></div>
		<?php
		if ( ! empty( $main_title ) ) {
			?>
			<div class="section-right-image">
				<img class="right-image" width="<?php echo $right_image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $right_image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $right_image['url']; ?>" srcset="<?php echo $right_image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $right_image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $right_image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $right_image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $right_image_alt; //phpcs:ignore ?>">
			</div>
			<?php
		}
		?>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col">
					<?php
					if ( ! empty( $main_title ) ) {
						echo '<' . esc_attr( $select_tag ) . ' class="section-title h-2">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
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
			</div>
		</div>
	</section>
	<?php
}
