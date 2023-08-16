<?php
/**
 * CONTENT BLOCK
 *
 * @package TIMEFINANCE
 */

$content           = get_sub_field( 'content' );
$select_text_align = get_sub_field( 'select_text_align' );
$section_id        = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'content-block-' );

if ( ! empty( $content ) ) {
	?>
	<section class="content-block" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<div class="row justify-content-center <?php echo $select_text_align; //phpcs:ignore ?>">
				<div class="col content-wrapper">
					<?php echo $content; //phpcs:ignore ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
