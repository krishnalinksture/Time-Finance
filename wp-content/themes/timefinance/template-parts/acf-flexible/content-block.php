<?php
/**
 * CONTENT BLOCK
 *
 * @package TIMEFINANCE
 */

$content           = get_sub_field( 'content' );
$select_text_align = get_sub_field( 'select_text_align' );
$seprator          = get_sub_field( 'seprator' );
$padding_settings  = get_sub_field( 'padding_settings' );
$section_id        = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'content-block-' );

if ( ! empty( $content ) ) {
	?>
	<section class="content-block <?php echo $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( 1 == $seprator ) {
				?>
				<div class="row justify-content-center seprator <?php echo $select_text_align; //phpcs:ignore ?>">
				<?php
			} else {
				?>
				<div class="row justify-content-center <?php echo $select_text_align; //phpcs:ignore ?>">
				<?php
			}
			?>
				<div class="col content-wrapper">
					<?php echo $content; //phpcs:ignore ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
