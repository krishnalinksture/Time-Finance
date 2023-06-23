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
$right_image      = get_sub_field( 'right_image' );
$background       = ( ! empty( $background_image ) ) ? ' style="background-image:url(' . esc_url( $background_image ) . ');"' : '';
$right_image_alt  = ( isset( $right_image['alt'] ) && ! empty( $right_image['alt'] ) ) ? $right_image['alt'] : ( isset( $right_image['title'] ) && ! empty( $right_image['title'] ) ? $right_image['title'] : '' );
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'inner-page-hero-' );

?>
<section class="inner-page-hero" id="<?php echo $section_id; //phpcs:ignore ?>"<?php echo $background; ?>>
	<div class="container">
		<div class="row">
			<div class="col-6">
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
			<div class="col-6">
				<img class="right-image" width="<?php echo $right_image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$right_image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $right_image['url']; ?>" srcset="<?php echo $right_image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $right_image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $right_image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $right_image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $right_image_alt; //phpcs:ignore ?>">
			</div>
		</div>
	</div>
</section>
