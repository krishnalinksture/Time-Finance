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
$number           = get_sub_field( 'number' );
$send_message     = get_sub_field( 'send_message' );
$select_form      = get_sub_field( 'select_form' );
$apply_now        = get_sub_field( 'apply_now' );
$padding_settings = get_sub_field( 'padding_settings' );
$select_class     = get_sub_field( 'select_class' );
$form             = ( ! empty( $select_form ) ) ? '[forminator_form id="' . $select_form . '"]' : '';
$background       = ( ! empty( $background_image ) ) ? ' style="background-image:url(' . esc_url( $background_image ) . ');"' : '';
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'cta-block-' );

if ( ! empty( $main_title ) || ! empty( $subtitle ) || ! empty( $number ) || ! empty( $apply_now ) || ! empty( $send_message ) ) {
	?>
	<section class="cta-block <?php echo $select_class . ' ' . $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col image" <?php echo $background; //phpcs:ignore ?>>
					<?php
					if ( ! empty( $main_title ) ) {
						echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
					}
					if ( ! empty( $number ) ) {
						?>
						<div class="number">
							<a href="tel:<?php echo esc_url( $number ); ?>"><?php echo esc_html( $number ); ?></a>
						</div>
						<?php
					}
					if ( ! empty( $subtitle ) ) {
						?>
						<div class="subtitle">
							<a href="mailto:<?php echo $subtitle; //phpcs:ignore ?>"><?php echo esc_html( $subtitle ); ?></a>
						</div>
						<?php
					}
					if ( ! empty( $apply_now ) || ! empty( $send_message ) ) {
						?>
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
							if ( ! empty( $send_message ) ) {
								?>
								<button class="send-message btn"><?php echo esc_html( $send_message ); ?></button>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
if ( ! empty( $select_form ) ) {
	?>
	<section class="send-message-form">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta-form">
						<?php echo do_shortcode( $form ); ?>
						<div class="thankyou-msg-cta"><?php echo esc_html( "Thank you for your message. A member of our team will be in touch shortly. In the meantime, if you're interested in how we use your data please click " ); //phpcs:ignore ?><a href="<?php echo home_url(); ?>/privacy-policy/"><?php echo esc_html( 'here' ); ?></a></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}
?>
