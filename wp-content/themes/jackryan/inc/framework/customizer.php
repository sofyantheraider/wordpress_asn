<?php

$theme_path_images = JACKRYAN_THEME_DIRECTORY . 'assets/img/';

/**
 * Update Kirki Config
 */

Kirki::add_config( 'jackryan_customize', array(
	'capability' => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

$first_level = 10;
$second_level = 10;

// Theme options
Kirki::add_panel( 'theme_options', array(
	'priority' => $first_level++,
    'title' => esc_html__('Theme Options', 'jackryan'),
    'icon'  => 'dashicons-admin-customizer',
) );

// Container Max-Width
Kirki::add_section('section_general_settings', array(
    'title' => esc_html__('General Settings', 'jackryan'),
    'panel' => 'theme_options',
    'priority' => $first_level++,
));

require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/framework/setup/section-general.php';

// Custom Logo
Kirki::add_section('header_settings', array(
    'title' => esc_html__('Header/Logo', 'jackryan'),
    'panel' => 'theme_options',
    'priority' => $first_level++,
));

require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/framework/setup/section-header.php';

// Custom Footer
Kirki::add_section('footer_settings', array(
    'title' => esc_html__('Footer Text', 'jackryan'),
    'panel' => 'theme_options',
    'priority' => $first_level++,
));

require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/framework/setup/section-footer.php';

// Fonts_setting
Kirki::add_section( 'fonts_setting', array(
    'panel' => 'theme_options',
    'title' => esc_html__( 'Typography', 'jackryan' ),
    'priority' => $first_level++
) );

require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/framework/setup/section-typography.php';

/**
 * Colors themes
 */
Kirki::add_section( 'colors_schemes', array(
    'panel' => 'theme_options',
    'title' => esc_html__( 'Colors', 'jackryan' ),
    'priority' => $first_level++
) );

require_once JACKRYAN_REQUIRE_DIRECTORY . 'inc/framework/setup/section-colors.php';