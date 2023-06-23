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
$left_image_alt  = ( isset( $left_image['alt'] ) && ! empty( $left_image['alt'] ) ) ? $left_image['alt'] : ( isset( $left_image['title'] ) && ! empty( $left_image['title'] ) ? $left_image['title'] : '' );
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'inner-page-hero-' );

?>
<section class="inner-page-hero" id="<?php echo $section_id; //phpcs:ignore ?>"<?php echo $background; ?>>
	<div class="section-left-image">
		<img class="left-image" width="<?php echo $left_image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$left_image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $left_image['url']; ?>" srcset="<?php echo $left_image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $left_image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $left_image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $left_image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $left_image_alt; //phpcs:ignore ?>">
	</div>
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
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
