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

if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $value_title ) || ! empty( $result_title ) || ! empty( $approval_title ) ) {
	?>
	<section class="calculator-block" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-md-12 col-sm-9 calculator-wrapper">
					<div class="content">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						if ( ! empty( $content ) ) {
							echo $content; //phpcs:ignore
						}
						if ( ! empty( $value_title ) ) {
							?>
							<div class="value-title">
								<?php echo esc_html( $value_title ); ?>
							</div>
							<?php
						}
						?>
						<form>
							<input type="text" id="amount_value" name="amount_value" value="10,000">
							<button class="btn submit"><?php echo esc_html( 'submit' ); ?></button>
						</form>
						<?php
						if ( ! empty( $result_title ) ) {
							?>
							<div class="result-title">
								<?php echo esc_html( $result_title ); ?>
							</div>
							<?php
						}
						?>
						<div class="result"><?php echo esc_html( '£9,000*' ); ?></div>
						<?php
						if ( ! empty( $approval_title ) ) {
							?>
							<div class="approval-title">
								<?php echo esc_html( $approval_title ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}
