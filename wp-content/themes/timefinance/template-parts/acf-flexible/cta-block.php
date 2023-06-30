<?php
/**
 * CTA BLOCK
 *
 * @package TIMEFINANCE
 */

$background_image = get_sub_field( 'background_image' );
$main_title       = get_sub_field( 'title' );
$select_tag       = get_sub_field( 'select_tag' );
$subtitle         = get_sub_field( 'subtitle' );
$send_message       = get_sub_field( 'send_message' );
$select_form      = get_sub_field( 'select_form' );
$apply_now       = get_sub_field( 'apply_now' );
$form             = ( ! empty( $select_form ) ) ? '[forminator_form id="' . $select_form . '"]' : '';
$background       = ( ! empty( $background_image ) ) ? ' style="background-image:url(' . esc_url( $background_image ) . ');"' : '';
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'cta-block-' );
?>
<section class="cta-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col image" <?php echo $background; //phpcs:ignore ?>>
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				?>
				<div class="subtitle">
					<?php echo esc_html( $subtitle ); ?>
				</div>
				<div class="apply-send-button">
					<?php
					if ( $apply_now && ! empty( $apply_now['url'] ) && ! empty( $apply_now['title'] ) ) {
						$link_url    = $apply_now['url'];
						$link_title  = $apply_now['title'];
						$link_target = $apply_now['target'] ? $apply_now['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
							<?php echo esc_html( $link_title ); ?>
						</a>
						<?php
					}
					?>
					<button class="send-message btn"><?php echo esc_html( $send_message ); ?></button>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
if ( ! empty( $select_form ) ) {
	?>
	<div class="form">
		<?php echo do_shortcode( $form ); ?>
	</div>
	<?php
}
?>
