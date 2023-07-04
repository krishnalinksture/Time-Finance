<?php
/**
 * LEFT RIGHT CONTENT IMAGE
 *
 * @package TIMEFINANCE
 */

$select_background_color = get_sub_field( 'select_background_color' );
$image                   = get_sub_field( 'image' );
$main_title              = get_sub_field( 'title' );
$select_tag              = get_sub_field( 'select_tag' );
$content                 = get_sub_field( 'content' );
$cta_button              = get_sub_field( 'cta_button' );
$image_position          = get_sub_field( 'select_image_position' );
$reverse                 = ( 'right' === $image_position ) ? ' flex-sm-row-reverse ' : '';
$section_id              = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'left-right-content-image-' );
$image_alt               = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );

if ( ! empty( $image ) || ! empty( $main_title ) || ! empty( $content ) || ! empty( $cta_button ) ) {
	?>
	<section class="left-right-content-image <?php echo $select_background_color; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<div class="row justify-content-center align-items-center<?php echo $reverse; //phpcs:ignore ?>">
				<?php
				if ( ! empty( $image ) ) {
					?>
					<div class="col-6 image-box">
						<img class="left-right-image" width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
					</div>
					<?php
				}
				if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $cta_button ) ) {
					?>
					<div class="col-6 content">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						if ( ! empty( $content ) ) {
							echo $content; //phpcs:ignore
						}
						if ( $cta_button && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) {
							$link_url    = $cta_button['url'];
							$link_title  = $cta_button['title'];
							$link_target = $cta_button['target'] ? $link['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
							<?php
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
