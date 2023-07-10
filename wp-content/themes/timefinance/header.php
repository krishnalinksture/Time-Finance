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

	$header_logo     = get_field( 'header_logo', 'option' );
	$search_icon     = get_field( 'search_icon', 'option' );
	$cta_button      = get_field( 'cta_button', 'option' );
	$contact_button  = get_field( 'contact_button', 'option' );
	$header_logo_alt = ( isset( $header_logo['alt'] ) && ! empty( $header_logo['alt'] ) ) ? $header_logo['alt'] : ( isset( $header_logo['title'] ) && ! empty( $header_logo['title'] ) ? $header_logo['title'] : '' );
	$search_icon_alt = ( isset( $search_icon['alt'] ) && ! empty( $search_icon['alt'] ) ) ? $search_icon['alt'] : ( isset( $search_icon['title'] ) && ! empty( $search_icon['title'] ) ? $search_icon['title'] : '' );
	?>
	<header>
		<?php
		if ( ! empty( $header_logo ) || ! empty( $cta_button ) || ! empty( $search_icon ) || ! empty( $contact_button ) ) {
			?>
			<nav class="navbar navbar-expand-xl">
				<div class="container">
					<?php
					if ( ! empty( $header_logo ) ) {
						?>
						<div class="col-auto">
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
					?>
					<div class="col-auto header-menu ms-auto">
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
											'menu_class'   => 'navbar-nav navigation-links',
											'container'    => 'menu-container',
											'container_id' => 'navbarNav',
											'fallback_cb'  => false,
											'depth'        => 0,
											'walker'       => new Timefinance_Menu_Walker(),
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
								if ( $cta_button && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) {
									$link_url    = $cta_button['url'];
									$link_title  = $cta_button['title'];
									$link_target = $cta_button['target'] ? $cta_button['target'] : '_self';
									?>
									<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
										<?php echo esc_html( $link_title ); ?>
									</a>
									<?php
								}
								if ( $contact_button && ! empty( $contact_button['url'] ) && ! empty( $contact_button['title'] ) ) {
									$link_url    = $contact_button['url'];
									$link_title  = $contact_button['title'];
									$link_target = $contact_button['target'] ? $contact_button['target'] : '_self';
									?>
									<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
										<?php echo esc_html( $link_title ); ?>
									</a>
									<?php
								}
								?>
							</div>
						</div>
					</div>
					<?php
					if ( ! empty( $cta_button ) || ! empty( $search_icon ) || ! empty( $contact_button ) ) {
						?>
						<div class="col-auto header-btn d-flex align-items-center">
							<div class="header-searchbar">
								<a href="#search-header" class="header-search-form">
									<img class="search-icon" width="<?php echo $search_icon['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$search_icon['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $search_icon['url']; ?>" srcset="<?php echo $search_icon['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $search_icon['sizes']['timefinance-mobile']; ?> 800w, <?php echo $search_icon['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $search_icon['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $search_icon_alt; //phpcs:ignore ?>">
								</a>
								<form id="search-header" method="get" action="<?php echo home_url('/'); //phpcs:ignore ?>" name="search-header" class="mfp-hide search-form-result">
									<div class="search-form">
										<input name="s" class="search-input" placeholder="Start typing to search" autocomplete="off" type="text">
										<button type="submit" class="search-button">
											<img class="search-icon" width="<?php echo $search_icon['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $search_icon['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $search_icon['url']; ?>" srcset="<?php echo $search_icon['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $search_icon['sizes']['timefinance-mobile']; ?> 800w, <?php echo $search_icon['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $search_icon['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $search_icon_alt; //phpcs:ignore ?>">
										</button>
									</div>
								</form>
							</div>
							<?php
							if ( $cta_button && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) {
								$link_url    = $cta_button['url'];
								$link_title  = $cta_button['title'];
								$link_target = $cta_button['target'] ? $cta_button['target'] : '_self';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
									<?php echo esc_html( $link_title ); ?>
								</a>
								<?php
							}
							if ( $contact_button && ! empty( $contact_button['url'] ) && ! empty( $contact_button['title'] ) ) {
								$link_url    = $contact_button['url'];
								$link_title  = $contact_button['title'];
								$link_target = $contact_button['target'] ? $contact_button['target'] : '_self';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
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
			</nav>
			<?php
		}
		?>
	</header>
	<main><!-- main content: BEGIN -->
