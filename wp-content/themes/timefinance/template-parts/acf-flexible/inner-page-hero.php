<?php
/**
 * INNER PAGE HERO
 *
 * @package TIMEFINANCE
 */

$main_title            = get_sub_field( 'title' );
$select_tag            = get_sub_field( 'select_tag' );
$content               = get_sub_field( 'content' );
$background_image      = get_sub_field( 'background_image' );
$cta_button            = get_sub_field( 'cta_button' );
$left_image            = get_sub_field( 'left_image' );
$background_image_alt = ( isset( $background_image['alt'] ) && ! empty( $background_image['alt'] ) ) ? $background_image['alt'] : ( isset( $background_image['title'] ) && ! empty( $background_image['title'] ) ? $background_image['title'] : '' );
$left_image_background = ( ! empty( $left_image ) ) ? ' style="background-image:url(' . esc_url( $left_image ) . ');"' : '';
$section_id            = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'inner-page-hero-' );

if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $cta_button ) ) {
	?>
	<section class="inner-page-hero" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="section-left-image" <?php echo $left_image_background; //phpcs:ignore ?>></div>
		<div class="section-right-image">
			<img class="right-image" width="<?php echo $background_image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $background_image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $background_image['url']; ?>" srcset="<?php echo $background_image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $background_image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $background_image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $background_image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $background_image_alt; //phpcs:ignore ?>">
		</div>
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
