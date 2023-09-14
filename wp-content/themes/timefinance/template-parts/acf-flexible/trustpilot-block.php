<?php
/**
 * TRUSTPILOT
 *
 * @package TIMEFINANCE
 */

$select_style            = get_sub_field( 'select_style' );
$main_title              = get_sub_field( 'title' );
$subtitle              = get_sub_field( 'subtitle' );
$select_tag              = get_sub_field( 'select_tag' );
$content                 = get_sub_field( 'content' );
$trustpilot              = get_sub_field( 'trustpilot' );
$padding_settings        = get_sub_field( 'padding_settings' );
$cta_button              = get_sub_field( 'cta_button' );
$select_background_color = get_sub_field( 'select_background_color' );
$section_id              = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'trustpilot-block-' );

switch ( $select_style ) {
	case 'style-1':
		if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $trustpilot ) || ! empty( $cta_button ) ) {
			?>
			<section class="trustpilot-block <?php echo $select_background_color . ' ' . $select_style . ' ' . $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col col-xl-9 col-lg-11 content">
							<?php
							if ( ! empty( $main_title ) ) {
								echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
							}
							if ( ! empty( $content ) ) {
								echo $content; //phpcs:ignore
							}
							if ( ! empty( $trustpilot ) ) {
								echo $trustpilot; //phpcs:ignore
							}
							if ( $cta_button && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) {
								$link_url    = $cta_button['url'];
								$link_title  = $cta_button['title'];
								$link_target = $cta_button['target'] ? $link['target'] : '_self';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-green" target="<?php echo esc_attr( $link_target ); ?>">
									<?php echo esc_html( $link_title ); ?>
								</a>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
		break;
	case 'style-2':
		if ( ! empty( $main_title ) || ! empty( $content ) ) {
			?>
			<section class="trustpilot-block <?php echo $select_background_color . ' ' . $select_style . ' ' . $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
				<div class="container-lg">
					<div class="row justify-content-start">
						<div class="col-lg-9 content">
							<?php
							if ( ! empty( $main_title ) ) {
								echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
							}
							if ( ! empty( $content ) ) {
								echo $content; //phpcs:ignore
							}
							?>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
		break;
	case 'style-3':
		if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $subtitle ) ) {
			?>
			<section class="trustpilot-block <?php echo $select_background_color . ' ' . $select_style . ' ' . $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
				<div class="container-lg">
					<div class="row justify-content-center">
						<div class="col-lg-9 content">
							<?php
							if ( ! empty( $main_title ) ) {
								echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
							}
							if ( ! empty( $subtitle ) ) {
								?>
								<h3><?php echo esc_html( $subtitle ); ?></h3>
								<?php
							}
							if ( ! empty( $content ) ) {
								echo $content; //phpcs:ignore
							}
							?>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
		break;
}
