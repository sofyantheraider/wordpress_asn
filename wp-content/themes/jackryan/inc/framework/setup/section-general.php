<?php

/**
 * General
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
	'type' => 'dimension',
	'settings' => 'container_width',
	'section' => 'section_general_settings',
	'label' => esc_html__( 'Max Width of Content', 'jackryan' ),
	'description' => esc_html__( 'Controls the overall site width. Default width 1170px (you can use px or em)', 'jackryan' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '1140px',
	'output' => array(
		array(
			'element' => '.container',
			'property' => 'max-width' 
		) 
	) 
) );

Kirki::add_field( 'jackryan_customize', array(
	'type'        => 'switch',
	'settings'    => 'page_transition',
	'label'       => esc_html__( 'Page transition', 'jackryan' ),
	'description' => esc_html__( 'On/Off Page transition', 'jackryan' ),
	'section'     => 'section_general_settings',
	'default'     => '1',
	'priority'    => 10,
	'transport' => 'auto',
    'choices'     => array(
        'on'  => esc_html__( 'On', 'jackryan' ),
        'off' => esc_html__( 'Off', 'jackryan' ),
    ),
) );