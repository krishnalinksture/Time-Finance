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

		/**
		* Tags
		*/
		$labels = array(
			'name'                       => _x( 'Tags', 'timefinance' ),
			'singular_name'              => _x( 'Tag', 'timefinance' ),
			'search_items'               => __( 'Search Tags' ),
			'popular_items'              => __( 'Popular Tags' ),
			'all_items'                  => __( 'All Tags' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Tag' ),
			'update_item'                => __( 'Update Tag' ),
			'add_new_item'               => __( 'Add New Tag' ),
			'new_item_name'              => __( 'New Tag Name' ),
			'separate_items_with_commas' => __( 'Separate tags with commas' ),
			'add_or_remove_items'        => __( 'Add or remove tags' ),
			'choose_from_most_used'      => __( 'Choose from the most used tags' ),
			'menu_name'                  => __( 'Tags' ),
		);

		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'tag' ),
		);
		register_taxonomy( 'tag', array( 'careers' ), $args );
	}
}
add_action( 'init', 'timefinance_career_custom_post_type' ); //phpcs:ignore
