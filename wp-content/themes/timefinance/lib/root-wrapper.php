<?php
/**
 * Include Theme Wrapper
 * Based on wrapper by Scribu
 *
 * @link http://scribu.net/wordpress/theme-wrappers.html
 * /root.php
 */
function root_template_path() {
	return Root_Wrapping::$main_template;
}

function root_template_base() {
	return Root_Wrapping::$base;
}

class Root_Wrapping {

	/**
	 * Stores the full path to the main template file
	 */
	public static $main_template;

	/**
	 * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
	 */
	public static $base;

	public static function wrap( $template ) {
		self::$main_template = $template;

		self::$base = substr( basename( self::$main_template ), 0, -4 );

		if ( 'index' == self::$base )
			self::$base = false;

		$templates = array( 'root.php' );

		if ( self::$base )
			array_unshift( $templates, sprintf( 'root-%s.php', self::$base ) );

		return locate_template( $templates );
	}
}
add_filter( 'template_include', array( 'Root_Wrapping', 'wrap' ), 99 );
