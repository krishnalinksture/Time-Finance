<?php
/**
 * REGISTER CUSTOM POST TYPES.
 *
 * @package TIMEFINANCE
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'timefinance_press_release_custom_post_type' ) ) {
	/**
	 * Create Press Release Custom Post Type
	 */
	function timefinance_press_release_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = array(
			'name'               => _x( 'Press Release', 'Post Type General Name', 'timefinance' ),
			'singular_name'      => _x( 'Press Release', 'Post Type Singular Name', 'timefinance' ),
			'menu_name'          => __( 'Press Releases', 'timefinance' ),
			'parent_item_colon'  => __( 'Parent Press Release', 'timefinance' ),
			'all_items'          => __( 'All Press Releases', 'timefinance' ),
			'add_new_item'       => __( 'Add New Press Release', 'timefinance' ),
			'add_new'            => __( 'Add New', 'timefinance' ),
			'edit_item'          => __( 'Edit Press Release', 'timefinance' ),
			'update_item'        => __( 'Update Press Release', 'timefinance' ),
			'search_items'       => __( 'Search Press Release', 'timefinance' ),
			'not_found'          => __( 'Not Found', 'timefinance' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'timefinance' ),
		);

		// Set other options for Custom Post Type.

		$args = array(
			'label'               => __( 'Press Releases', 'timefinance' ),
			'description'         => __( 'Press Release', 'timefinance' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'editor', 'excerpt' ),
			'menu_icon'           => 'dashicons-welcome-learn-more',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,

		);

		// Registering your Custom Post Type.
		register_post_type( 'press-release', $args );

		/**
		* Categories
		*/
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'timefinance' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'timefinance' ),
			'search_items'      => __( 'Search Categories', 'timefinance' ),
			'all_items'         => __( 'All Categories', 'timefinance' ),
			'parent_item'       => __( 'Parent Category', 'timefinance' ),
			'parent_item_colon' => __( 'Parent Category:', 'timefinance' ),
			'edit_item'         => __( 'Edit Category', 'timefinance' ),
			'update_item'       => __( 'Update Category', 'timefinance' ),
			'add_new_item'      => __( 'Add New Category', 'timefinance' ),
			'new_item_name'     => __( 'New Category Name', 'timefinance' ),
			'menu_name'         => __( 'Categories', 'timefinance' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_ui'           => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		);

		// Registering your Custom Taxonomy.
		register_taxonomy( 'press-release-categories', array( 'press-release' ), $args );
	}
}
add_action( 'init', 'timefinance_press_release_custom_post_type' ); //phpcs:ignore

if ( ! function_exists( 'timefinance_regulatory_news_custom_post_type' ) ) {
	/**
	 * Create Regulatory News Custom Post Type
	 */
	function timefinance_regulatory_news_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = array(
			'name'               => _x( 'Regulatory News', 'Post Type General Name', 'timefinance' ),
			'singular_name'      => _x( 'Regulatory News', 'Post Type Singular Name', 'timefinance' ),
			'menu_name'          => __( 'Regulatory News', 'timefinance' ),
			'parent_item_colon'  => __( 'Parent Regulatory News', 'timefinance' ),
			'all_items'          => __( 'All Regulatory News', 'timefinance' ),
			'add_new_item'       => __( 'Add New Regulatory News', 'timefinance' ),
			'add_new'            => __( 'Add New', 'timefinance' ),
			'edit_item'          => __( 'Edit Regulatory News', 'timefinance' ),
			'update_item'        => __( 'Update Regulatory News', 'timefinance' ),
			'search_items'       => __( 'Search Regulatory News', 'timefinance' ),
			'not_found'          => __( 'Not Found', 'timefinance' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'timefinance' ),
		);

		// Set other options for Custom Post Type.

		$args = array(
			'label'               => __( 'Regulatory News', 'timefinance' ),
			'description'         => __( 'Regulatory News', 'timefinance' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'editor', 'excerpt' ),
			'menu_icon'           => 'dashicons-welcome-learn-more',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,

		);

		// Registering your Custom Post Type.
		register_post_type( 'regulatory-news', $args );

		/**
		* Categories
		*/
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'timefinance' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'timefinance' ),
			'search_items'      => __( 'Search Categories', 'timefinance' ),
			'all_items'         => __( 'All Categories', 'timefinance' ),
			'parent_item'       => __( 'Parent Category', 'timefinance' ),
			'parent_item_colon' => __( 'Parent Category:', 'timefinance' ),
			'edit_item'         => __( 'Edit Category', 'timefinance' ),
			'update_item'       => __( 'Update Category', 'timefinance' ),
			'add_new_item'      => __( 'Add New Category', 'timefinance' ),
			'new_item_name'     => __( 'New Category Name', 'timefinance' ),
			'menu_name'         => __( 'Categories', 'timefinance' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_ui'           => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		);

		// Registering your Custom Taxonomy.
		register_taxonomy( 'regulatory-news-categories', array( 'regulatory-news' ), $args );
	}
}
add_action( 'init', 'timefinance_regulatory_news_custom_post_type' ); //phpcs:ignore

if ( ! function_exists( 'timefinance_case_study_custom_post_type' ) ) {
	/**
	 * Create Case Study Custom Post Type
	 */
	function timefinance_case_study_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = array(
			'name'               => _x( 'Case Study', 'Post Type General Name', 'timefinance' ),
			'singular_name'      => _x( 'Case Study', 'Post Type Singular Name', 'timefinance' ),
			'menu_name'          => __( 'Case Studies', 'timefinance' ),
			'parent_item_colon'  => __( 'Parent Case Study', 'timefinance' ),
			'all_items'          => __( 'All Case Studies', 'timefinance' ),
			'add_new_item'       => __( 'Add New Case Study', 'timefinance' ),
			'add_new'            => __( 'Add New', 'timefinance' ),
			'edit_item'          => __( 'Edit Case Study', 'timefinance' ),
			'update_item'        => __( 'Update Case Study', 'timefinance' ),
			'search_items'       => __( 'Search Case Study', 'timefinance' ),
			'not_found'          => __( 'Not Found', 'timefinance' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'timefinance' ),
		);

		// Set other options for Custom Post Type.

		$args = array(
			'label'               => __( 'Case Studies', 'timefinance' ),
			'description'         => __( 'Case Study', 'timefinance' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'editor', 'excerpt' ),
			'menu_icon'           => 'dashicons-welcome-learn-more',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,

		);

		// Registering your Custom Post Type.
		register_post_type( 'case-study', $args );

		/**
		* Categories
		*/
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'timefinance' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'timefinance' ),
			'search_items'      => __( 'Search Categories', 'timefinance' ),
			'all_items'         => __( 'All Categories', 'timefinance' ),
			'parent_item'       => __( 'Parent Category', 'timefinance' ),
			'parent_item_colon' => __( 'Parent Category:', 'timefinance' ),
			'edit_item'         => __( 'Edit Category', 'timefinance' ),
			'update_item'       => __( 'Update Category', 'timefinance' ),
			'add_new_item'      => __( 'Add New Category', 'timefinance' ),
			'new_item_name'     => __( 'New Category Name', 'timefinance' ),
			'menu_name'         => __( 'Categories', 'timefinance' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_ui'           => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		);

		// Registering your Custom Taxonomy.
		register_taxonomy( 'case-study-categories', array( 'case-study' ), $args );
	}
}
add_action( 'init', 'timefinance_case_study_custom_post_type' ); //phpcs:ignore

if ( ! function_exists( 'timefinance_career_custom_post_type' ) ) {
	/**
	 * Create Career Custom Post Type
	 */
	function timefinance_career_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = array(
			'name'               => _x( 'Career', 'Post Type General Name', 'timefinance' ),
			'singular_name'      => _x( 'Career', 'Post Type Singular Name', 'timefinance' ),
			'menu_name'          => __( 'Careers', 'timefinance' ),
			'parent_item_colon'  => __( 'Parent Career', 'timefinance' ),
			'all_items'          => __( 'All Careers', 'timefinance' ),
			'add_new_item'       => __( 'Add New Career', 'timefinance' ),
			'add_new'            => __( 'Add New', 'timefinance' ),
			'edit_item'          => __( 'Edit Career', 'timefinance' ),
			'update_item'        => __( 'Update Career', 'timefinance' ),
			'search_items'       => __( 'Search Career', 'timefinance' ),
			'not_found'          => __( 'Not Found', 'timefinance' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'timefinance' ),
		);

		// Set other options for Custom Post Type.

		$args = array(
			'label'               => __( 'Careers', 'timefinance' ),
			'description'         => __( 'Career', 'timefinance' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'editor', 'excerpt' ),
			'menu_icon'           => 'dashicons-welcome-learn-more',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,

		);

		// Registering your Custom Post Type.
		register_post_type( 'careers', $args );

		/**
		* Categories
		*/
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'timefinance' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'timefinance' ),
			'search_items'      => __( 'Search Categories', 'timefinance' ),
			'all_items'         => __( 'All Categories', 'timefinance' ),
			'parent_item'       => __( 'Parent Category', 'timefinance' ),
			'parent_item_colon' => __( 'Parent Category:', 'timefinance' ),
			'edit_item'         => __( 'Edit Category', 'timefinance' ),
			'update_item'       => __( 'Update Category', 'timefinance' ),
			'add_new_item'      => __( 'Add New Category', 'timefinance' ),
			'new_item_name'     => __( 'New Category Name', 'timefinance' ),
			'menu_name'         => __( 'Categories', 'timefinance' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_ui'           => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		);

		// Registering your Custom Taxonomy.
		register_taxonomy( 'careers-categories', array( 'careers' ), $args );
	}
}
add_action( 'init', 'timefinance_career_custom_post_type' ); //phpcs:ignore

if ( ! function_exists( 'timefinance_our_team_custom_post_type' ) ) {
	/**
	 * Create Our Team Custom Post Type
	 */
	function timefinance_our_team_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = array(
			'name'               => _x( 'Our Team', 'Post Type General Name', 'timefinance' ),
			'singular_name'      => _x( 'Our Team', 'Post Type Singular Name', 'timefinance' ),
			'menu_name'          => __( 'Our Teams', 'timefinance' ),
			'parent_item_colon'  => __( 'Parent Our Team', 'timefinance' ),
			'all_items'          => __( 'All Our Teams', 'timefinance' ),
			'add_new_item'       => __( 'Add New Our Team', 'timefinance' ),
			'add_new'            => __( 'Add New', 'timefinance' ),
			'edit_item'          => __( 'Edit Our Team', 'timefinance' ),
			'update_item'        => __( 'Update Our Team', 'timefinance' ),
			'search_items'       => __( 'Search Our Team', 'timefinance' ),
			'not_found'          => __( 'Not Found', 'timefinance' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'timefinance' ),
		);

		// Set other options for Custom Post Type.

		$args = array(
			'label'               => __( 'Our Teams', 'timefinance' ),
			'description'         => __( 'Our Team', 'timefinance' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'editor', 'excerpt' ),
			'menu_icon'           => 'dashicons-welcome-learn-more',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,

		);

		// Registering your Custom Post Type.
		register_post_type( 'our-teams', $args );

		/**
		* Categories
		*/
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'timefinance' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'timefinance' ),
			'search_items'      => __( 'Search Categories', 'timefinance' ),
			'all_items'         => __( 'All Categories', 'timefinance' ),
			'parent_item'       => __( 'Parent Category', 'timefinance' ),
			'parent_item_colon' => __( 'Parent Category:', 'timefinance' ),
			'edit_item'         => __( 'Edit Category', 'timefinance' ),
			'update_item'       => __( 'Update Category', 'timefinance' ),
			'add_new_item'      => __( 'Add New Category', 'timefinance' ),
			'new_item_name'     => __( 'New Category Name', 'timefinance' ),
			'menu_name'         => __( 'Categories', 'timefinance' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_ui'           => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		);

		// Registering your Custom Taxonomy.
		register_taxonomy( 'our-teams-categories', array( 'our-teams' ), $args );
	}
}
add_action( 'init', 'timefinance_our_team_custom_post_type' ); //phpcs:ignore

if ( ! function_exists( 'timefinance_resource_custom_post_type' ) ) {
	/**
	 * Create Resources Custom Post Type
	 */
	function timefinance_resource_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = array(
			'name'               => _x( 'Resource', 'Post Type General Name', 'timefinance' ),
			'singular_name'      => _x( 'Resource', 'Post Type Singular Name', 'timefinance' ),
			'menu_name'          => __( 'Resources', 'timefinance' ),
			'parent_item_colon'  => __( 'Parent Resource', 'timefinance' ),
			'all_items'          => __( 'All Resources', 'timefinance' ),
			'add_new_item'       => __( 'Add New Resource', 'timefinance' ),
			'add_new'            => __( 'Add New', 'timefinance' ),
			'edit_item'          => __( 'Edit Resource', 'timefinance' ),
			'update_item'        => __( 'Update Resource', 'timefinance' ),
			'search_items'       => __( 'Search Resource', 'timefinance' ),
			'not_found'          => __( 'Not Found', 'timefinance' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'timefinance' ),
		);

		// Set other options for Custom Post Type.

		$args = array(
			'label'               => __( 'Resources', 'timefinance' ),
			'description'         => __( 'Resource', 'timefinance' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'editor', 'excerpt' ),
			'menu_icon'           => 'dashicons-welcome-learn-more',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,

		);

		// Registering your Custom Post Type.
		register_post_type( 'resources', $args );

		/**
		* Categories
		*/
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'timefinance' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'timefinance' ),
			'search_items'      => __( 'Search Categories', 'timefinance' ),
			'all_items'         => __( 'All Categories', 'timefinance' ),
			'parent_item'       => __( 'Parent Category', 'timefinance' ),
			'parent_item_colon' => __( 'Parent Category:', 'timefinance' ),
			'edit_item'         => __( 'Edit Category', 'timefinance' ),
			'update_item'       => __( 'Update Category', 'timefinance' ),
			'add_new_item'      => __( 'Add New Category', 'timefinance' ),
			'new_item_name'     => __( 'New Category Name', 'timefinance' ),
			'menu_name'         => __( 'Categories', 'timefinance' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_ui'           => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		);

		// Registering your Custom Taxonomy.
		register_taxonomy( 'resources-categories', array( 'resources' ), $args );
	}
}
add_action( 'init', 'timefinance_resource_custom_post_type' ); //phpcs:ignore
