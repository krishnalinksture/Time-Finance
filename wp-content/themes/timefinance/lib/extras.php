<?php
/**
 * Extra functions, filter, actions etc..
 *
 * @package TIMEFINANCE
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check ACF plugin exist.
 */
if ( ! function_exists( 'timefinance_plugins_loaded' ) ) {
	/**
	 * Check ACF loaded or not
	 */
	function timefinance_plugins_loaded() {
		if ( is_admin() || ( 'wp-login.php' === $GLOBALS['pagenow'] ) ) {
			return;
		}

		if ( ! class_exists( 'acf' ) ) {
			$acfexternalurl = 'https://www.advancedcustomfields.com/pro';
			wp_die( sprintf(__( 'It needs <a href="%1s" target="_blank">Advanced Custom Fields Pro</a> to run. Please download and activate it.', 'timefinance' ), $acfexternalurl ) );// phpcs:ignore
		}
	}
}
add_action( 'init', 'timefinance_plugins_loaded' );

if ( ! function_exists( 'timefinance_add_img_alt_tag_title' ) ) {
	/**
	 * Filter attributes for the current gallery image tag to add 'alt'
	 * data attribute.
	 *
	 * @param array   $attr       image tag attributes.
	 * @param WP_Post $attachment WP_Post object for the attachment.
	 * @return array (maybe) filtered image tag attributes.
	 */
	function timefinance_add_img_alt_tag_title( $attr, $attachment = null ) {

		$img_title = trim( wp_strip_all_tags( $attachment->post_title ) );

		if ( empty( $attr['alt'] ) ) {
			$attr['alt']   = $img_title;
			$attr['title'] = $img_title;
		}
		return $attr;
	}
}
add_filter( 'wp_get_attachment_image_attributes', 'timefinance_add_img_alt_tag_title', 10, 2 );

/**
 * Retrieves the attachment ID from url.
 *
 * @param  string $image_url Image URL.
 */
function get_image_id( $image_url ) {
	if ( is_admin() ) {
		return;
	}
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) ); // phpcs:ignore
	if ( ! empty( $attachment ) ) {
		return $attachment[0];
	}
}

/**
 * Retrieves the attachment ID from url.
 *
 * @param string $content Post Content.
 * Add IMG alt tag attribute in Post Content.
 */
function add_alt_tags( $content ) {

	preg_match_all( '/<img (.*?)\/>/', $content, $images );

	if ( ! empty( $images ) ) {
		foreach ( $images[1] as $index => $value ) {
			preg_match( '@src="([^"]+)"@', $images[1][ $index ], $match );
			$src            = array_pop( $match );
			$image_id       = get_image_id( $src );
			$image_title    = get_the_title( $image_id );
			$image_alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			$alt_text       = ( ! empty( $image_alt_text ) && '' !== $image_alt_text ) ? $image_alt_text : $image_title;
			$new_img        = str_replace( '<img', '<img alt="' . $alt_text . '"', $images[0][ $index ] );
			$content        = str_replace( $images[0][ $index ], $new_img, $content );
		}
	}
	return $content;
}
add_filter( 'the_content', 'add_alt_tags', 999 );

if ( ! function_exists( 'embryo_theme_support' ) ) {
	/**
	 * Theme Support.
	 */
	function embryo_theme_support() {
		remove_theme_support( 'widgets-block-editor' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );
	}
}
add_action( 'after_setup_theme', 'embryo_theme_support' );


if ( ! function_exists( 'timefinance_cc_mime_types' ) ) {
	/**
	 * SVG File upload.
	 *
	 * @param string $mimes Post Content.
	 */
	function timefinance_cc_mime_types( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
}
add_filter( 'upload_mimes', 'timefinance_cc_mime_types' );

// Theme Settings.
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => __( 'Theme Settings', 'timefinance' ),
			'menu_title' => __( 'Theme Settings', 'timefinance' ),
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		)
	);
}

if ( function_exists( 'year_shortcode' ) ) {
	/**
	 * Year Shortcodes.
	 */
	function year_shortcode() {
		$year = gmdate( 'Y' );
		return $year;
	}
}
add_shortcode( 'year', 'year_shortcode' );

if ( ! function_exists( 'timefinance_login_logo' ) ) {
	/**
	 * Backend Admin Login Logo.
	 */
	function timefinance_login_logo() {

		$logo = get_field( 'header_logo', 'option' );

		if ( $logo ) {
			$image = wp_get_attachment_image_src( $logo['id'], 'full' );
			?>
			<style type="text/css">
				body.login div#login h1 a {
					background-image: url(<?php echo $image[0]; //phpcs:ignore ?>);
					width: 270px;
					height: 50px;
					background-size: contain;
				}
			</style>
			<?php
		}
	}
}
add_action( 'login_enqueue_scripts', 'timefinance_login_logo' );

if ( ! function_exists( 'timefinance_mb_login_url' ) ) {
	/**
	 * Login page url change to home page.
	 */
	function timefinance_mb_login_url() {
		return home_url( '/' );
	}
}
add_filter( 'login_headerurl', 'timefinance_mb_login_url' );

/**
 * Custom Pagination
 */

if ( ! function_exists( 'custom_pagination' ) ) {
	/**
	 * Pagination Bar.
	 *
	 * @param object $pages get pages.
	 * @param object $range get range.
	 */
	function custom_pagination( $pages = '', $range = 0 ) {

		$showitems = $range + 5;
		global $paged;

		if ( empty( $paged ) ) {
			$paged = 1; //phpcs:ignore
		}
		if ( '' === $pages ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}

		if ( 1 !== $pages ) {

			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
				echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo;</a>"; //phpcs:ignore
			}
			if ( $paged > 1 && $showitems < $pages ) {
				echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo;</a>"; //phpcs:ignore
			}

			for ( $i = 1; $i <= $pages; $i++ ) {
				if ( 1 !== $pages && ( ! ( $i >= $paged + $range + 5 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
					echo ( $paged == $i ) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link( $i ) . "' class='inactive' >" . $i . "</a>"; //phpcs:ignore
				}
			}

			if ( $paged < $pages && $showitems < $pages ) {
				echo "<a href='" . get_pagenum_link( $paged + 1 ) . "'>&rsaquo;</a>"; //phpcs:ignore
			}
			if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
				echo "<a href='" . get_pagenum_link( $pages ) . "'>&raquo;</a>"; //phpcs:ignore
			}
		}
	}
}
