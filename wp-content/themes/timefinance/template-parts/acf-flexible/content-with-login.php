<?php
/**
 * CONTENT WITH LOGIN
 *
 * @package TIMEFINANCE
 */

$content_login           = get_sub_field( 'content_login' );
$select_background_color = get_sub_field( 'select_background_color' );
$section_id              = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'content-with-login-' );

if ( have_rows( 'content_login' ) ) {
	?>
	<section class="content-with-login <?php echo $select_background_color; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container-lg">
			<div class="row row-cols-1 row-cols-md-2">
				<?php
				while ( have_rows( 'content_login' ) ) {
					the_row();
					$login_title  = get_sub_field( 'title' );
					$select_tag   = get_sub_field( 'select_tag' );
					$content      = get_sub_field( 'content' );
					$login_button = get_sub_field( 'login_button' );
					if ( ! empty( $login_title ) || ! empty( $content ) || ! empty( $login_button ) ) {
						?>
						<div class="col login-wrapper">
							<div class="login-box">
								<?php
								if ( ! empty( $login_title ) ) {
									echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $login_title ) . '</' . esc_attr( $select_tag ) . '>';
								}
								if ( ! empty( $content ) ) {
									echo $content; //phpcs:ignore
								}
								if ( $login_button && ! empty( $login_button['url'] ) && ! empty( $login_button['title'] ) ) {
									$link_url    = $login_button['url'];
									$link_title  = $login_button['title'];
									$link_target = $login_button['target'] ? $login_button['target'] : '_self';
									?>
									<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-green" target="<?php echo esc_attr( $link_target ); ?>">
										<?php echo esc_html( $link_title ); ?>
									</a>
									<?php
								}
								?>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
