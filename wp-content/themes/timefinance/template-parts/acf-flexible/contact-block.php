<?php
/**
 * CONTACT BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title  = get_sub_field( 'title' );
$select_tag  = get_sub_field( 'select_tag' );
$content     = get_sub_field( 'content' );
$select_form = get_sub_field( 'select_form' );
$form        = ( ! empty( $select_form ) ) ? '[forminator_form id="' . $select_form . '"]' : '';
$section_id  = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'contact-block-' );
?>
<section class="contact-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
				if ( ! empty( $select_form ) ) {
					?>
					<div class="contact-form">
						<?php echo do_shortcode( $form ); ?>
					</div>
					<?php
				}
				?>

			</div>
		</div>
	</div>
</section>
