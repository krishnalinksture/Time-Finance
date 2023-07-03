<?php
/**
 * TIMEFINANCE Includes
 * The $timefinance_includes array determines the code library included into the site.
 *
 * Funtions.php - WP specific config
 * root-wrapper.php - Theme wrapper config
 * extras.php - Additional functions
 * optimisation.php - Optimisation functions
 *
 * @package TIMEFINANCE
 */

define( 'TIMEFINANCE_THEME_DIR', get_template_directory() );
define( 'TIMEFINANCE_THEME_URI', get_template_directory_uri() );
define( 'TIMEFINANCE_THEME_LIB', TIMEFINANCE_THEME_DIR . '/lib' );
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );

$timefinance_includes = [ //phpcs:ignore
	'lib/root-wrapper.php',
	'lib/extras.php',
	'lib/optimisation.php',
	'lib/mega-menu.php',
];

foreach ( $timefinance_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) { //phpcs:ignore
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'timefinance' ), $file ), E_USER_ERROR ); //phpcs:ignore
	}

	require_once $filepath;
}
unset( $file, $filepath );

/**
 * Resgister and include Script
 * Stylesheet to Header and Footer
 */
function register_load_scripts() {

	/**
	 *  Enqueue styles
	 */
	wp_register_style( 'bootstrap', TIMEFINANCE_THEME_URI . '/inc/css/vendor/bootstrap.css', '', THEME_VERSION, 'screen', false );
	wp_register_style( 'styles', TIMEFINANCE_THEME_URI . '/dist/main.min.css', '', THEME_VERSION, 'screen', false );
	wp_register_style( 'timefinance-swiper', TIMEFINANCE_THEME_URI . '/inc/css/vendor/swiper-bundle.min.css', array(), '8.0.7', 'screen', false );
	wp_register_style( 'magnific', TIMEFINANCE_THEME_URI . '/inc/css/vendor/magnific-popup.css', '', THEME_VERSION, 'screen', false );

	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'styles' );
	wp_enqueue_style( 'timefinance-swiper' );
	wp_enqueue_style( 'magnific' );

	/**
	 *  Enqueue scripts
	 */
	wp_register_script( 'timefinance-vendors', TIMEFINANCE_THEME_URI . '/dist/vendors.min.js', array( 'jquery' ), THEME_VERSION, true );
	wp_register_script( 'timefinance-scripts', TIMEFINANCE_THEME_URI . '/dist/main.min.js', array( 'timefinance-vendors' ), THEME_VERSION, true );
	wp_register_script( 'trustpilot', '//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js', array( 'jquery' ), THEME_VERSION, true );

	wp_enqueue_script( 'trustpilot' );
	wp_enqueue_script( 'timefinance-scripts' );

	wp_localize_script(
		'timefinance-scripts',
		'mainAjaxurl',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);

}
add_action( 'wp_enqueue_scripts', 'register_load_scripts' );

if ( ! function_exists( 'register_admin_load_scripts' ) ) :
	/**
	 * Register script for Admin.
	 */
	function register_admin_load_scripts() {
		wp_register_style( 'admin-menu-css', TIMEFINANCE_THEME_URI . '/inc/admin/css/admin.css', '', THEME_VERSION, 'all' );
		wp_enqueue_style( 'admin-menu-css' );
	}
endif;
add_action( 'admin_enqueue_scripts', 'register_admin_load_scripts' );

/**
 * Text Domain.
 */
load_theme_textdomain( 'timefinance', TIMEFINANCE_THEME_DIR . '/languages' );

/**
 * Register Navigations
 */

register_nav_menus(
	array(
		'primary'  => __( 'Primary', 'timefinance' ),
		'top-menu' => __( 'Top Menu', 'timefinance' ),
	)
);

/**
 * Register Sidebars.
 */
function widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'timefinance' ),
			'id'            => 'sidebar-primary',
			'before_widget' => '<section class="widget %1$s %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 1', 'timefinance' ),
			'id'            => 'footer-column-1',
			'before_widget' => '<div class="widget %1$s %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 2', 'timefinance' ),
			'id'            => 'footer-column-2',
			'before_widget' => '<div class="widget %1$s %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Bottom', 'timefinance' ),
			'id'            => 'footer-bottom',
			'before_widget' => '<div class="widget %1$s %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="title">',
			'after_title'   => '</h6>',
		)
	);

}
add_action( 'widgets_init', __NAMESPACE__ . '\\widgets_init' );

/**
 * Register Featured Image Support.
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'timefinance-desktop', 1920, '', array( 'center', 'center' ) );
add_image_size( 'timefinance-tablet', 1200, '', array( 'center', 'center' ) );
add_image_size( 'timefinance-mobile', 767, '', array( 'center', 'center' ) );
add_image_size( 'timefinance-small-mobile', 400, '' );
add_image_size( 'img-block', 600, '' );
add_image_size( 'product-iamge', 787, '' );

/**
 * Require custom post types
 */

if ( file_exists( TIMEFINANCE_THEME_LIB . '/timefinance-custom-post-type.php' ) ) :
	require_once TIMEFINANCE_THEME_LIB . '/timefinance-custom-post-type.php';
endif;

function timefinance_add_page_slug_body_class( $classes ) { //phpcs:ignore
	global $post;
	if ( isset( $post ) ) {
		$classes[] = 'page-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'timefinance_add_page_slug_body_class' );

add_post_type_support( 'page', 'excerpt' );
