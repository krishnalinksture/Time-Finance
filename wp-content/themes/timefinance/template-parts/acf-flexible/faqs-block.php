<?php
/**
 * FAQ BLOCK
 *
 * @package TIMEFINANCE
 */

$faqs       = get_sub_field( 'faqs' );
$main_title = get_sub_field( 'title' );
$select_tag = get_sub_field( 'select_tag' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'faq-block-' );

if ( ! empty( $main_title ) || have_rows( 'faqs' ) ) {
	?>
	<section class="faq-block" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( ! empty( $main_title ) ) {
				?>
				<div class="row justify-content-center text-center">
					<div class="col-9">
						<?php echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>'; ?>
					</div>
				</div>
				<?php
			}
			if ( have_rows( 'faqs' ) ) {
				?>
				<div class="row justify-content-center text-center">
					<div class="col-9">
						<?php
						$i = 1;
						?>
						<div class="accordion" id="accordion-<?php echo $section_id;//phpcs:ignore ?>">
							<?php
							while ( have_rows( 'faqs' ) ) {
								the_row();
								$faq_title   = get_sub_field( 'faq_title' );
								$faq_content = get_sub_field( 'faq_content' );
								if ( ! empty( $faq_title ) || ! empty( $faq_content ) ) {
									?>
									<div class="accordion-item">
										<?php
										if ( ! empty( $faq_title ) ) {
											?>
											<div class="accordion-header faq" id="heading-<?php echo $section_id . $i; //phpcs:ignore ?>">
												<div class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $section_id; ?>-<?php echo $i; ?>" aria-expanded="true" data-bs-parent="#accordion-<?php echo $section_id; //phpcs:ignore ?>">
													<div class="faq-title">
														<?php echo esc_html( $faq_title ); ?>
													</div>
												</div>
											</div>
											<?php
										}
										if ( ! empty( $faq_content ) ) {
											?>
											<div id="<?php echo $section_id; ?>-<?php echo $i; ?>" class="accordion-collapse collapse" aria-label="heading-<?php echo $i; ?>" data-bs-parent="#accordion-<?php echo $section_id; //phpcs:ignore ?>">
												<div class="accordion-body">
													<div class="faq-content">
														<?php echo $faq_content; //phpcs:ignore ?>
													</div>
												</div>
											</div>
											<?php
										}
										?>
									</div>
									<?php
								}
								$i++;
							}
							?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</section>
	<?php
}
