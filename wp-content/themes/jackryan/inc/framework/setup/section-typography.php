<?php
// Main
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
	'type'        => 'typography',
	'settings'    => 'main_font',
	'section' => 'fonts_setting',
	'label'       => esc_html__( 'Primary Font', 'jackryan' ),
	'section'     => 'fonts_setting',
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
	],
	'priority'    => 10,
	'choices' => [
		'fonts' => [
			'standard' => [ 'Roboto' ],
			],
	],
	'output'      => array(
		array(
			'element'  => 'body',
			'property' => 'font-family',
		),
		array(
			'property' => 'font-size',
			'context'  => array( 'editor' ),
		),
		array(
			'element'  => '.edit-post-visual-editor.editor-styles-wrapper',
			'context'  => array( 'editor' ),
			'property' => 'font-family',
		),
	),

) );

// Headers
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
	'type'        => 'typography',
	'settings'    => 'font_title_settings',
	'label'       => esc_html__( 'Font for Titles:', 'jackryan' ),
	'section'     => 'fonts_setting',
	'default'     => array(
		'font-family'    => 'Bebas Neue',
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '400',
	),
	'choices' => [
		'fonts' => [
			'standard' => [ 'Bebas Neue' ],
			],
	],
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h1, h2, h3, h4, h5, h6',
		)
	)
) );