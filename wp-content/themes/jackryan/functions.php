<?php

define( 'JACKRYAN_THEME_DIRECTORY', esc_url( trailingslashit( get_template_directory_uri() ) ) );
define( 'JACKRYAN_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'JACKRYAN_DEVELOPMENT', true );

/**
 * After Setup
 */

function jackryan_setup() {

	register_nav_menus( array(
		'primary-menu' => esc_html__( 'Primary Menu', 'jackryan' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'jackryan' )
	) );

	load_theme_textdomain( 'jackryan', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array('aside', 'image', 'video', 'audio'));
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',	) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );

	add_image_size( 'jackryan-admin-list-thumb', 50, 50, true );
	add_image_size( 'jackryan-featured-single-post', 1140, 502, true );
	add_image_size( 'jackryan-default-post-thumb', 870, 480, true );
	add_image_size( 'jackryan-no-post-thumb', 1140, 500, true );
	add_image_size( 'jackryan-card-post-thumb', 400, 268, true );
	add_image_size( 'jackryan-list-post-thumb', 400, 268, true );
	add_image_size( 'jackryan-portfolio-thumb', 800, 1000, true );
	add_image_size( 'jackryan-portfolio-nav-thumb', 1140, 300, true );
	add_image_size( 'jackryan-recent-post-thumb', 64, 64, true );
	add_image_size( 'jackryan-member-team', 443, 576, true );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support dark editor style
	add_theme_support( 'dark-editor-style' );

	// Editor color palette.
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Primary', 'jackryan' ),
				'slug' => 'primary',
				'color' => '#1258ca',
			),
			array(
				'name'  => esc_html__( 'Accent', 'jackryan' ),
				'slug' => 'accent',
				'color' => '#c70a1a',
			),
			array(
				'name'  => esc_html__( 'Success', 'jackryan' ),
				'slug' => 'success',
				'color' => '#88c559',
			),
			array(
				'name'  => esc_html__( 'Black', 'jackryan' ),
				'slug' => 'black',
				'color' => '#263654',
			),
			array(
				'name'  => esc_html__( 'Contrast', 'jackryan' ),
				'slug' => 'contrast',
				'color' => '#292a2d',
			),
			array(
				'name'  => esc_html__( 'Contrast Medium', 'jackryan' ),
				'slug' => 'contrast-medium',
				'color' => '#79797c',
			),
			array(
				'name'  => esc_html__( 'Contrast lower', 'jackryan' ),
				'slug' => 'contrast lower',
				'color' => '#323639',
			),
			array(
				'name'  => esc_html__( 'White', 'jackryan' ),
				'slug' => 'white',
				'color' => '#ffffff',
			)
		)
	);

	// Add custom editor font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'jackryan' ),
				'shortName' => __( 'S', 'jackryan' ),
				'size'      => 14,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'jackryan' ),
				'shortName' => __( 'M', 'jackryan' ),
				'size'      => 16,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'jackryan' ),
				'shortName' => __( 'L', 'jackryan' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Huge', 'jackryan' ),
				'shortName' => __( 'XL', 'jackryan' ),
				'size'      => 28,
				'slug'      => 'huge',
			),
		)
	);
	
}

add_action( 'after_setup_theme', 'jackryan_setup' );

/**
 * Content Width
 */
function jackryan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jackryan_content_width', 1170 );
}
add_action( 'after_setup_theme', 'jackryan_content_width', 0 );


/**
 * Add Editor Styles
 */
function jackryan_add_editor_styles() {
	add_editor_style( 'editor-styles.css' );
}
add_action( 'admin_init', 'jackryan_add_editor_styles' );

/**
 * Include and IMPORT/EXPORT ACF fields via JSON
 */
if( false == JACKRYAN_DEVELOPMENT ) {
	add_filter( 'acf/settings/show_admin', '__return_false' );
	require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

function jackryan_acf_save_json( $path ) {
	$path = JACKRYAN_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
	return $path;
}
add_filter( 'acf/settings/save_json', 'jackryan_acf_save_json' );

function jackryan_acf_load_json( $paths ) {
	unset( $paths[0] );
	$paths[] = JACKRYAN_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
	return $paths;
}
add_filter( 'acf/settings/load_json', 'jackryan_acf_load_json' );

/**
 * Include kirki fields
 */
if ( class_exists( 'Kirki' ) ) {
	require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';
}
function jackryan_load_all_variants_and_subsets() {
    if ( class_exists( 'Kirki_Fonts_Google' ) ) {
        Kirki_Fonts_Google::$force_load_all_variants = true;
        Kirki_Fonts_Google::$force_load_all_subsets = true;
    }
}
add_action( 'after_setup_theme', 'jackryan_load_all_variants_and_subsets' );

/**
 * Include required files
 */

// TGM
require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/helper/class-tgm-plugin-activation.php';
// TGM register plugins
require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/theme-required-plugins.php';
// Style and scripts for theme
require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/theme-enqueue.php';
// Theme Functions
require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/theme-functions.php';
require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/theme-actions.php';
require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/theme-filters.php';