<?php
/**
 * INNER PAGE HERO
 *
 * @package TIMEFINANCE
 */

$main_title       = get_sub_field( 'title' );
$select_tag       = get_sub_field( 'select_tag' );
$content          = get_sub_field( 'content' );
$background_image = get_sub_field( 'background_image' );
$cta_button       = get_sub_field( 'cta_button' );
$left_image      = get_sub_field( 'left_image' );
$background       = ( ! empty( $background_image ) ) ? ' style="background-image:url(' . esc_url( $background_image ) . ');"' : '';
$left_image_background       = ( ! empty( $left_image ) ) ? ' style="background-image:url(' . esc_url( $left_image ) . ');"' : '';
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'inner-page-hero-' );

?>
<section class="inner-page-hero" id="<?php echo $section_id; //phpcs:ignore ?>"<?php echo $background; ?>>
	<div class="section-left-image" <?php echo $left_image_background; ?>>
	</div>
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-2">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
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
