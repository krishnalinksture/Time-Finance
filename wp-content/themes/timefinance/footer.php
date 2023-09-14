<?php
/**
 * FOOTER FILE.
 *
 * @package TIMEFINANCE
 */

?>
</main><!-- main content : END -->
<?php
$main_title             = get_field( 'title', 'options' );
$select_tag             = get_field( 'select_tag', 'options' );
$mail                   = get_field( 'mail', 'options' );
$pop_up_title           = get_field( 'pop_up_title', 'options' );
$pop_up_form            = get_field( 'pop_up_form', 'options' );
$trustpilot             = get_field( 'trustpilot', 'options' );
$footer_logo            = get_field( 'footer_logo', 'options' );
$form_subscribtion_data = get_field( 'form_subscribtion_data', 'options' );
$footer_address         = get_field( 'footer_address', 'options' );
$footer_social_icon     = get_field( 'footer_social_icon', 'options' );
$footer_content         = get_field( 'footer_content', 'options' );
$popup_form_embed       = get_field( 'popup_form_embed', 'options' );
$gdpr_text              = get_field( 'gdpr_text', 'options' );
$accept_button          = get_field( 'accept_button', 'options' );
$decline                = get_field( 'decline', 'options' );
$footer_form            = ( ! empty( $pop_up_form ) ) ? '[forminator_form id="' . $pop_up_form . '"]' : '';
$footer_logo_alt        = ( isset( $footer_logo['alt'] ) && ! empty( $footer_logo['alt'] ) ) ? $footer_logo['alt'] : ( isset( $footer_logo['title'] ) && ! empty( $footer_logo['title'] ) ? $footer_logo['title'] : '' );

if ( ! empty( $main_title ) || ! empty( $mail ) || ! empty( $popup_form_embed ) || ! empty( $trustpilot ) || is_active_sidebar( 'footer-column-1' ) || ! empty( $footer_address ) || have_rows( 'footer_social_icon' ) || ! empty( $footer_content ) || is_active_sidebar( 'footer-bottom' ) ) {
	?>
	<footer>
		<div class="container">
			<?php
			if ( ! empty( $main_title ) || ! empty( $mail ) || ! empty( $pop_up_title ) || ! empty( $popup_form_embed ) || ! empty( $trustpilot ) || is_active_sidebar( 'footer-column-1' ) ) {
				?>
				<div class="row">
					<?php
					if ( ! empty( $main_title ) || ! empty( $mail ) || ! empty( $pop_up_title ) || ! empty( $popup_form_embed ) || ! empty( $trustpilot ) ) {
						?>
						<div class="col-xl-7 col-md-6">
							<?php
							if ( ! empty( $main_title ) ) {
								echo '<' . esc_attr( $select_tag ) . ' class="footer-title">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
							}
							if ( $mail && ! empty( $mail['url'] ) && ! empty( $mail['title'] ) ) {
								$link_url    = $mail['url'];
								$link_title  = $mail['title'];
								$link_target = $mail['target'] ? $mail['target'] : '_self';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" class="footer-link" target="<?php echo esc_attr( $link_target ); ?>">
									<?php echo esc_html( $link_title ); ?>
								</a>
								<?php
							}
							if ( ! empty( $pop_up_title ) || ! empty( $popup_form_embed ) ) {
								?>
								<div class="popup-form">
									<?php
									if ( ! empty( $pop_up_title ) ) {
										?>
										<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#footerpopupModal">
											<?php echo esc_html( $pop_up_title ); ?>
										</button>
										<?php
									}
									?>
									<div class="modal fade" id="footerpopupModal" tabindex="-1" aria-label="footerpopupModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-body">
													<div class="row justify-content-center">
														<div class="col">
															<?php
															if ( ! empty( $popup_form_embed ) ) {
																?>
																<div class="footer-popup-form">
																	<?php echo $popup_form_embed; //phpcs:ignore?>
																</div>
																<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							if ( ! empty( $trustpilot ) ) {
								?>
								<div class="trustpilot">
									<?php echo $trustpilot; //phpcs:ignore ?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-column-1' ) ) {
						?>
						<div class="col-xl-5 col-md-6">
							<div class="footer-menu-first">
								<?php dynamic_sidebar( 'footer-column-1' ); ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			if ( ! empty( $footer_logo ) || ! empty( $footer_address ) || have_rows( 'footer_social_icon' ) || ! empty( $footer_content ) || is_active_sidebar( 'footer-bottom' ) ) {
				?>
				<div class="row">
					<?php
					if ( ! empty( $footer_logo ) ) {
						?>
						<div class="col-xl-7 col-md-6 d-flex align-items-end">
							<div class="footer-logo">
								<a class="main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img class="logo" width="<?php echo $footer_logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $footer_logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $footer_logo['url']; ?>" srcset="<?php echo $footer_logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $footer_logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $footer_logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $footer_logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $footer_logo_alt; //phpcs:ignore ?>">
								</a>
							</div>
						</div>
						<?php
					}
					if ( ! empty( $footer_address ) || have_rows( 'footer_social_icon' ) || ! empty( $footer_content ) || is_active_sidebar( 'footer-bottom' ) ) {
						?>
						<div class="col-xl-5 col-md-6">
							<div class="row">
								<?php
								if ( ! empty( $footer_address ) || have_rows( 'footer_social_icon' ) ) {
									?>
									<div class="col-md-6 d-flex flex-column footer-address">
										<?php echo $footer_address; //phpcs:ignore
										if ( have_rows( 'footer_social_icon', 'options' ) ) {
											?>
											<div class="footer-social">
												<?php
												while ( have_rows( 'footer_social_icon', 'options' ) ) {
													the_row();
													$social_icon      = get_sub_field( 'social_icon', 'options' );
													$social_icon_link = get_sub_field( 'social_icon_link', 'options' );
													$social_icon_alt  = ( isset( $social_icon['alt'] ) && ! empty( $social_icon['alt'] ) ) ? $social_icon['alt'] : ( isset( $social_icon['title'] ) && ! empty( $social_icon['title'] ) ? $social_icon['title'] : '' );
													if ( $social_icon_link ) {
														$link_url    = $social_icon_link['url'];
														$link_title  = $social_icon_link['title'];
														$link_target = $social_icon_link['target'] ? $social_icon_link['target'] : '_self';
														?>
														<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
															<img src="<?php echo esc_url( $social_icon['url'] ); ?>" alt="<?php echo $social_icon_alt; // phpcs:ignore ?>" />
														</a>
														<?php
													}
												}
												?>
											</div>
											<?php
										}
										?>
									</div>
									<?php
								}
								if ( ! empty( $footer_content ) || is_active_sidebar( 'footer-bottom' ) ) {
									?>
									<div class="col-md-6 footer-privacy">
										<?php
										if ( ! empty( $footer_content ) ) {
											echo $footer_content; //phpcs:ignore
										}
										if ( is_active_sidebar( 'footer-bottom' ) ) {
											?>
											<div class="footer-bottom-menu">
												<?php dynamic_sidebar( 'footer-bottom' ); ?>
											</div>
											<?php
										}
										?>
									</div>
									<?php
								}
								?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
	</footer>
	<?php
}
wp_footer();
?>
<div class="cookie-policy-wrapper">
	<div class="container">
		<div class="row align-items-center">
			<?php
			if ( ! empty( $gdpr_text ) ) {
				?>
				<div class="col-md-8 col-sm-9 text-center text-sm-start cookie-policy-text">
					<?php echo $gdpr_text; //phpcs:ignore ?>
				</div>
				<?php
			}
			?>
			<div class="col-md-4 col-sm-3 text-center text-sm-end">
				<a class="btn cookie-policy-button" href="javascript:void(0);">
					<?php echo esc_html( $accept_button ); ?>
				</a>
				<a class="decline-button" href="javascript:void(0);">
					<?php echo esc_html( $decline ); ?>
				</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
