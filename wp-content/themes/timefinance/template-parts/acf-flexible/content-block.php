<?php
/**
 * CONTENT BLOCK
 *
 * @package TIMEFINANCE
 */

$content    = get_sub_field( 'content' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'content-block-' );
?>
<section class="content-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col">
				<?php echo $content; //phpcs:ignore ?>
			</div>
		</div>
	</div>
</section>
