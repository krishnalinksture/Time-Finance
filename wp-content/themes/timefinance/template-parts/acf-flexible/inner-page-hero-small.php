<?php
/**
 * INNER PAGE HERO SMALL
 *
 * @package TIMEFINANCE
 */

$select_background = get_sub_field( 'select_background' );
$main_title        = get_sub_field( 'title' );
$select_tag        = get_sub_field( 'select_tag' );
$background_image  = get_sub_field( 'background_image' );
$cta_button        = get_sub_field( 'cta_button' );
$background        = ( ! empty( $background_image ) ) ? ' style="background-image:url(' . esc_url( $background_image ) . ');"' : '';
$section_id        = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'inner-page-hero-small-' );

?>
<section class="inner-page-hero-small <?php echo $select_background; ?>" id="<?php echo $section_id; //phpcs:ignore ?>"<?php echo $background; ?>>
<div class="bg-overlay"></div>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-10 col-lg-8 text-center">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-2">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				if ( 'standard-background' === $select_background ) {
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
				}
				?>
			</div>
		</div>
	</div>
</section>
