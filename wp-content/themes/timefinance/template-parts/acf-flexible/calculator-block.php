<?php
/**
 * CALCULATOR BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title     = get_sub_field( 'title' );
$select_tag     = get_sub_field( 'select_tag' );
$content        = get_sub_field( 'content' );
$value_title    = get_sub_field( 'value_title' );
$result_title   = get_sub_field( 'result_title' );
$approval_title = get_sub_field( 'approval_title' );
$section_id     = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'calculator-block-' );
?>
<section class="calculator-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col content-wrapper">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
				?>
				<div class="value-title">
					<?php echo esc_html( $value_title ); ?>
				</div>
				<form>
					<input type="text" id="amount_value" name="amount_value" value="10,000">
					<button class="btn submit">submit</button>
				</form>
				<div class="result-title">
					<?php echo esc_html( $result_title ); ?>
				</div>
				<div class="result">£9,000*</div>
				<div class="approval-title">
					<?php echo esc_html( $approval_title ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
