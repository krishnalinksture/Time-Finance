<?php
/**
 * 404 PAGE TEMPLATE.
 *
 * @package TIMEFINANCE
 */

$page_not_found_title      = get_field( '404_title', 'option' );
$page_not_found_select_tag = get_field( '404_select_tag', 'option' );
$page_not_found_content    = get_field( '404_content', 'option' );
$page_not_found_button     = get_field( '404_button', 'option' );

if ( ! empty( $page_not_found_title ) || ! empty( $page_not_found_content ) || ! empty( $page_not_found_button ) ) {
	?>
	<section class="error-404">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11">
					<?php
					if ( ! empty( $page_not_found_title ) ) {
						echo '<' . esc_attr( $page_not_found_select_tag ) . ' class="section-title h-3">' . esc_html( $page_not_found_title ) . '</' . esc_attr( $page_not_found_select_tag ) . '>';
					}
					?>
					<div class="btn-404">
						<?php
						if ( ! empty( $page_not_found_content ) ) {
							echo $page_not_found_content; //phpcs:ignore
						}
						if ( $page_not_found_button && ! empty( $page_not_found_button['url'] ) && ! empty( $page_not_found_button['title'] ) ) {
							$link_url    = $page_not_found_button['url'];
							$link_title  = $page_not_found_button['title'];
							$link_target = $page_not_found_button['target'] ? $page_not_found_button['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
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
