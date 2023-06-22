<?php
/**
 * FOOTER FILE.
 *
 * @package TIMEFINANCE
 */

?>
</main><!-- main content : END -->
<?php
$prs_logo           = get_field( 'prs_logo', 'options' );
$trustpilot         = get_field( 'trustpilot', 'options' );
$footer_logo        = get_field( 'footer_logo', 'options' );
$footer_social_icon = get_field( 'footer_social_icon', 'options' );
$footer_content     = get_field( 'footer_content', 'options' );
$footer_address     = get_field( 'footer_address', 'options' );
$prs_logo_alt       = ( isset( $prs_logo['alt'] ) && ! empty( $prs_logo['alt'] ) ) ? $prs_logo['alt'] : ( isset( $prs_logo['title'] ) && ! empty( $prs_logo['title'] ) ? $prs_logo['title'] : '' );
$footer_logo_alt    = ( isset( $footer_logo['alt'] ) && ! empty( $footer_logo['alt'] ) ) ? $footer_logo['alt'] : ( isset( $footer_logo['title'] ) && ! empty( $footer_logo['title'] ) ? $footer_logo['title'] : '' );

if ( is_active_sidebar( 'footer-column-1' ) || ! empty( $prs_logo ) || ! empty( $trustpilot ) || ! empty( $footer_logo ) || have_rows( 'footer_social_icon', 'options' ) ) {
	?>
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<?php
					if ( is_active_sidebar( 'footer-column-1' ) ) {
						?>
						<div class="col-12">
							<div class="footer-menu-first">
								<?php dynamic_sidebar( 'footer-column-1' ); ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
		if ( ! empty( $prs_logo ) || ! empty( $trustpilot ) || ! empty( $footer_logo ) || have_rows( 'footer_social_icon', 'options' ) ) {
			?>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-md-7 d-none d-md-inline">
							<div class="row">
								<?php
								if ( ! empty( $prs_logo ) ) {
									?>
									<div class="col-lg-auto">
										<img class="prs-logo" width="<?php echo $prs_logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $prs_logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $prs_logo['url']; ?>" srcset="<?php echo $prs_logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $prs_logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $prs_logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $prs_logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $prs_logo_alt; //phpcs:ignore ?>">
									</div>
									<?php
								}
								if ( ! empty( $trustpilot ) ) {
									?>
									<div class="col-auto ps-0">
										<?php echo $trustpilot; //phpcs:ignore ?>
									</div>
									<?php
								}
								?>
							</div>
						</div>
						<?php
						if ( ! empty( $footer_logo ) || have_rows( 'footer_social_icon', 'options' ) ) {
							?>
							<div class="col-lg-4 col-md-5 text-center">
								<a class="main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php
									if ( ! empty( $footer_logo ) ) {
										?>
										<img class="footer-logo" width="<?php echo $footer_logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $footer_logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $footer_logo['url']; ?>" srcset="<?php echo $footer_logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $footer_logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $footer_logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $footer_logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $footer_logo_alt; //phpcs:ignore ?>">
										<?php
									} else {
										echo esc_html( get_bloginfo( 'name' ) );
									}
									?>
								</a>
								<div class="footer-social">
									<?php
									if ( have_rows( 'footer_social_icon', 'options' ) ) {
										while ( have_rows( 'footer_social_icon', 'options' ) ) {
											the_row();
											$social_icon     = get_sub_field( 'social_icon', 'options' );
											$icon_link       = get_sub_field( 'link', 'options' );
											$social_icon_alt = ( isset( $social_icon['alt'] ) && ! empty( $social_icon['alt'] ) ) ? $social_icon['alt'] : ( isset( $social_icon['title'] ) && ! empty( $social_icon['title'] ) ? $social_icon['title'] : '' );
											if ( $icon_link ) {
												$link_url    = $icon_link['url'];
												$link_title  = $icon_link['title'];
												$link_target = $icon_link['target'] ? $icon_link['target'] : '_self';
												?>
												<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
													<img src="<?php echo esc_url( $social_icon['url'] ); ?>" alt="<?php echo $social_icon_alt; // phpcs:ignore ?>" />
												</a>
												<?php
											}
										}
									}
									?>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<div class="row">
						<div class="col text-center">
							<div class="footer-content">
								<?php echo $footer_content; //phpcs:ignore ?>
							</div>
							<div class="footer-address">
								<?php echo $footer_address; //phpcs:ignore ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</footer>
	<?php
}
	wp_footer();
?>

</body>
</html>
