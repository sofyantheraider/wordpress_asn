<?php

/**
 *Plugin Name: Jack Ryan Theme Utilits
 *Plugin URI: https://themeforest.net/user/madsparrow
 *Description: Special Plugin for create portfolios Post Type, Social Widget, Share Post
 *Author: Mad Sparrow
 *Author URI: https://madsparrow.me
 *Version: 1.0.0
 *Text Domain: jackryan
 *License: GPLv2+
*/

/*
 * Register custom post type for special use
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Albums post type
if ( ! function_exists( 'portfolios_register' ) ) {

	function portfolios_register() {

		$labels = array(
			'name'                  => _x( 'Portfolio', 'Post Type General Name', 'jackryan' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'jackryan' ),
			'menu_name'             => __( 'Portfolios', 'jackryan' ),
			'name_admin_bar'        => __( 'Project', 'jackryan' ),
			'archives'              => __( 'Project Archives', 'jackryan' ),
			'attributes'            => __( 'Project Attributes', 'jackryan' ),
			'parent_item_colon'     => __( 'Parent Item:', 'jackryan' ),
			'all_items'             => __( 'All Projects', 'jackryan' ),
			'add_new_item'          => __( 'Add New Project', 'jackryan' ),
			'add_new'               => __( 'Add Project', 'jackryan' ),
			'new_item'              => __( 'New Project', 'jackryan' ),
			'edit_item'             => __( 'Edit Project', 'jackryan' ),
			'update_item'           => __( 'Update Project', 'jackryan' ),
			'view_item'             => __( 'View Project', 'jackryan' ),
			'view_items'            => __( 'View Projects', 'jackryan' ),
			'search_items'          => __( 'Search Project', 'jackryan' ),
			'not_found'             => __( 'Not found', 'jackryan' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'jackryan' ),
			'featured_image'        => __( 'Featured Image', 'jackryan' ),
			'set_featured_image'    => __( 'Set featured image', 'jackryan' ),
			'remove_featured_image' => __( 'Remove featured image', 'jackryan' ),
			'use_featured_image'    => __( 'Use as featured image', 'jackryan' ),
			'insert_into_item'      => __( 'Insert into Project', 'jackryan' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Project', 'jackryan' ),
			'items_list'            => __( 'Projects list', 'jackryan' ),
			'items_list_navigation' => __( 'Projects list navigation', 'jackryan' ),
			'filter_items_list'     => __( 'Filter Projects list', 'jackryan' ),
		);
		$args = array(
			'label'                 => __( 'Project', 'jackryan' ),
			'description'           => __( 'Add Portfolios here', 'jackryan' ),
			'labels'                => $labels,
			'show_in_rest' 			=> true,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'categories' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-portfolio',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'portfolios', $args );
	}
}
add_action( 'init', 'portfolios_register' );

// Albums category
if ( ! function_exists( 'portfolios_taxonomies' ) ) {

	function portfolios_taxonomies() {
	    $labels = array(
	        'name'              => _x( 'Categories', 'taxonomy general name', 'jackryan' ),
	        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'jackryan' ),
	        'search_items'      => __( 'Search Categories', 'jackryan' ),
	        'all_items'         => __( 'All Categories', 'jackryan' ),
	        'parent_item'       => __( 'Parent Category', 'jackryan' ),
	        'parent_item_colon' => __( 'Parent Category:', 'jackryan' ),
	        'edit_item'         => __( 'Edit Category', 'jackryan' ),
	        'update_item'       => __( 'Update Category', 'jackryan' ),
	        'add_new_item'      => __( 'Add New Category', 'jackryan' ),
	        'new_item_name'     => __( 'New Category Name', 'jackryan' ),
	        'menu_name'         => __( 'Categories', 'jackryan' ),
	    );

	    $args = array(
	        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
	        'labels'            => $labels,
	        'show_ui'           => true,
	        'show_in_nav_menus' => true,
	        'show_admin_column' => true,
	        'show_in_rest'      => true,
	        'query_var'         => true,
	        'rewrite'           => array( 'slug' => 'categories' ),
	    );

	    register_taxonomy( 'portfolios_categories', array( 'portfolios' ), $args );
	}
}
add_action( 'init', 'portfolios_taxonomies', 0 );

// Action Socials Widgets Init
function jackryan_register_widgets() {
	$jackryan_widgets = array(
		'socials' => 'jackryan_widget_socials',
		'recent_posts' => 'jackryan_recent_widget_custom',
	);

	if ( class_exists( 'acf' ) ) {
		foreach ( $jackryan_widgets as $key => $value ) {
			require_once plugin_dir_path( __FILE__ ) . 'widgets/' . sanitize_key( $key ) . '.php';
			register_widget( $value );
		}
	}
}
add_action( 'widgets_init', 'jackryan_register_widgets' );

// Socials Share for Single Post Page
function jackryan_socials_share_custom() {
	require_once plugin_dir_path( __FILE__ ) . 'socials/socials_icons_share.php';
}