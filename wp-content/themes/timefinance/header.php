<?php
/**
 * Header Template.
 *
 * @package TIMEFINANCE
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
	<?php
	if ( ! function_exists( 'wp_body_open' ) ) {
		/**
		 * 'wp_body_open' for body.
		 */
		function wp_body_open() {
			do_action( 'wp_body_open' );
		}
	}

	$header_logo             = get_field( 'header_logo', 'option' );
	$content                 = get_field( 'content', 'option' );
	$phone_number            = get_field( 'phone_number', 'option' );
	$cta_button              = get_field( 'cta_button', 'option' );
	$header_trustpilot       = get_field( 'header_trustpilot' );
	$trustpilot              = get_field( 'trustpilot' );
	$mobile_icon             = get_field( 'mobile_icon', 'option' );
	$mobile_call_link        = get_field( 'mobile_call_link', 'option' );
	$mobile_request_callback = get_field( 'mobile_request_callback', 'option' );
	$header_logo_alt         = ( isset( $header_logo['alt'] ) && ! empty( $header_logo['alt'] ) ) ? $header_logo['alt'] : ( isset( $header_logo['title'] ) && ! empty( $header_logo['title'] ) ? $header_logo['title'] : '' );
	$mobile_icon_alt         = ( isset( $mobile_icon['alt'] ) && ! empty( $mobile_icon['alt'] ) ) ? $mobile_icon['alt'] : ( isset( $mobile_icon['title'] ) && ! empty( $mobile_icon['title'] ) ? $mobile_icon['title'] : '' );
	?>
	<header>
		<?php
		if ( ! empty( $header_logo ) || ! empty( $content ) || ! empty( $phone_number ) || ! empty( $cta_button ) || ! empty( $mobile_call_link ) ) {
			?>
			<div class="header-top">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<?php
						if ( ! empty( $header_logo ) ) {
							?>
							<div class="col-auto col-md-5 text-center text-md-start">
								<a class="main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php
									if ( ! empty( $header_logo ) ) {
										?>
										<img class="skip-lazy" width="<?php echo $header_logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $header_logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $header_logo['url']; ?>" srcset="<?php echo $header_logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $header_logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $header_logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $header_logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $header_logo_alt; //phpcs:ignore ?>">
										<?php
									} else {
										echo esc_html( get_bloginfo( 'name' ) );
									}
									?>
								</a>
							</div>
							<?php
						}
						if ( ! empty( $content ) || ! empty( $phone_number ) || ! empty( $cta_button ) || ! empty( $mobile_call_link ) ) {
							?>
							<div class="col-md-7 d-flex flex-column flex-lg-row justify-content-end align-items-end align-items-lg-center">
								<div class="site-contact d-none d-md-block">
									<?php
									if ( ! empty( $phone_number ) ) {
										?>
										<span class="header-content"><?php echo esc_html( $content ); ?></span>
										<?php
										if ( $phone_number && ! empty( $phone_number['url'] ) && ! empty( $phone_number['title'] ) ) {
											$link_url   = $phone_number['url'];
											$link_title = $phone_number['title'];
											?>
											<a href="<?php echo esc_url( $link_url ); ?>">
												<?php echo esc_html( $link_title ); ?>
											</a>
											<?php
										}
									}
									?>
								</div>
								<?php
								if ( $cta_button && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) {
									$link_url    = $cta_button['url'];
									$link_title  = $cta_button['title'];
									$link_target = $cta_button['target'] ? $cta_button['target'] : '_self';
									?>
									<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-yellow btn-shap-right mobile-hide" target="<?php echo esc_attr( $link_target ); ?>">
										<?php echo esc_html( $link_title ); ?>
									</a>
									<?php
								}
								if ( $mobile_call_link ) {
									$link_url    = $mobile_call_link['url'];
									$link_title  = $mobile_call_link['title'];
									$link_target = $mobile_call_link['target'] ? $mobile_call_link['target'] : '_self';
									?>
									<a class="mobile-icon d-md-none" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
										<img src="<?php echo esc_url( $mobile_icon['url'] ); ?>" alt="<?php echo $mobile_icon_alt; // phpcs:ignore ?>" />
									</a>
									<?php
								}
								?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php
		}
		if ( 1 == $header_trustpilot ) { //phpcs:ignore
			?>
			<div class="header-center">
				<div class="container">
					<div class="row">
						<div class="col">
							<?php echo $trustpilot; //phpcs:ignore ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
		<nav class="navbar navbar-expand-md">
			<div class="container-md p-0">
				<div class="col-auto header-menu">
					<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation" aria-expanded="false">
						<span class="navbar-toggler-line"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<div class="navbar-wrapper">
							<?php
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'menu_class'     => 'navbar-nav navigation-links',
										'container'      => 'menu-container',
										'container_id'   => 'navbarNav',
										'fallback_cb'    => false,
										'depth'          => 0,
										'walker'         => new Timefinance_Menu_Walker(),
									),
								);
							} else {
								wp_nav_menu(
									array(
										'menu_class' => 'navbar-nav',
										'menu'       => '',
										'container'  => 'menu-container',
									)
								);
							}
							if ( ! empty( $mobile_request_callback ) ) {
								?>
								<div class="request-btn mt-3 d-md-none">
									<?php
									if ( $mobile_request_callback && ! empty( $mobile_request_callback['url'] ) && ! empty( $mobile_request_callback['title'] ) ) {
										$link_url    = $mobile_request_callback['url'];
										$link_title  = $mobile_request_callback['title'];
										$link_target = $mobile_request_callback['target'] ? $link['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-white" target="<?php echo esc_attr( $link_target ); ?>">
											<?php echo esc_html( $link_title ); ?>
										</a>
										<?php
									}
									?>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<main><!-- main content: BEGIN -->
