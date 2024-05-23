<?php

/**
 * Theme Mode
 */
Kirki::add_field( 'jackryan_customize', [
    'type'        => 'radio-buttonset',
    'settings'    => 'theme_mode',
    'label'       => esc_html__( 'Select Website Mode', 'jackryan' ),
    'section'     => 'colors_schemes',
    'default'     => 'light',
    'priority'    => $priority++,
    'choices'     => [
        'light'   => esc_html__( 'Light Mode', 'jackryan' ),
        'dark'    => esc_html__( 'Dark Mode', 'jackryan' ),
    ],
] );

/**
 * Accent Color (Light Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'accent_color',
    'section' => 'colors_schemes',
    'label' => esc_html__( 'Accent Color', 'jackryan' ),
    'description' => esc_html__( 'Select the Accent Color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => false 
    ),
    'default' => 'hsl(217, 84%, 43%)',
    'output'    => [
        [
            'element'  => ':root, [data-theme="light"]',
            'property' => '--color-primary',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'light'
        )
    ),
) );

/**
 * Accent Lighter Color (Light Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'accent_lighter_color',
    'section' => 'colors_schemes',
    'label' => esc_html__( '', 'jackryan' ),
    'description' => esc_html__( 'Select the Accent Lighter Color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => true 
    ),
    'default' => 'rgba(232,239,253,0.5)',
    'output'    => [
        [
            'element'  => ':root, [data-theme="light"]',
            'property' => '--color-primary-lighter',
        ],
    ],
    'transport'       => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'light'
        )
    ),
) );

/**
 * Accent Color (Dark Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'accent_color_d',
    'section' => 'colors_schemes',
    'label' => esc_html__( 'Accent Color', 'jackryan' ),
    'description' => esc_html__( 'Select the Accent Color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => false 
    ),
    'default' => '#3ea6ff',
    'output'    => [
        [
            'element'  => ':root, [data-theme="dark"]',
            'property' => '--color-primary',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'dark'
        )
    ),
) );

/**
 * Accent Lighter Color (Dark Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'accent_lighter_color_d',
    'section' => 'colors_schemes',
    'label' => esc_html__( '', 'jackryan' ),
    'description' => esc_html__( 'Select the Accent Lighter Color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => true 
    ),
    'default' => 'rgba(62,166,255,0.3)',
    'output'    => [
        [
            'element'  => ':root, [data-theme="dark"]',
            'property' => '--color-primary-lighter',
        ],
    ],
    'transport'       => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'dark'
        )
    ),
) );


$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type'        => 'custom',
    'settings'    => 'separator',
    'section'     => 'colors_schemes',
    'default'     => '<hr>',
    'priority' => $priority++,
) );


/**
 * Primary Color (Light Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'primary_color1',
    'section' => 'colors_schemes',
    'label' => esc_html__( 'Primary Text Color', 'jackryan' ),
    'description' => esc_html__( 'Text color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => false 
    ),
    'default' => '#263654',
    'output'    => [
        [
            'element'  => ':root, [data-theme="light"]',
            'property' => '--color-contrast-high',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'light'
        )
    ),
) );

/**
 * Primary Color Contrast (Light Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'contrast_color2',
    'section' => 'colors_schemes',
    'label' => esc_html__( '', 'jackryan' ),
    'description' => esc_html__( 'Contrast Text Color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => true 
    ),
    'default' => '#929299',
    'output'    => [
        [
            'element'  => ':root, [data-theme="light"]',
            'property' => '--color-contrast-medium',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'light'
        )
    ),
) );

/**
 * Primary Color Contrast (Light Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'contrast_low',
    'section' => 'colors_schemes',
    'label' => esc_html__( '', 'jackryan' ),
    'description' => esc_html__( 'Color Contrast Low', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => true 
    ),
    'default' => '#d3d3d4',
    'output'    => [
        [
            'element'  => ':root, [data-theme="light"]',
            'property' => '--color-contrast-low',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'light'
        )
    ),
) );

/**
 * Primary Color (Dark Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'primary_color_dark_1',
    'section' => 'colors_schemes',
    'label' => esc_html__( 'Primary Text Color', 'jackryan' ),
    'description' => esc_html__( 'Text color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => false 
    ),
    'default' => '#ffffff',
    'output'    => [
        [
            'element'  => ':root, [data-theme="dark"]',
            'property' => '--color-contrast-high',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'dark'
        )
    ),
) );

/**
 * Primary Color Contrast (Dark Mode)
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'contrast_color_dark_2',
    'section' => 'colors_schemes',
    'label' => esc_html__( '', 'jackryan' ),
    'description' => esc_html__( 'Contrast Text Color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => true 
    ),
    'default' => '#777779',
    'output'    => [
        [
            'element'  => ':root, [data-theme="dark"]',
            'property' => '--color-contrast-medium',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'dark'
        )
    ),
) );

$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type'        => 'custom',
    'settings'    => 'separator2',
    'section'     => 'colors_schemes',
    'default'     => '<hr>',
    'priority' => $priority++,
) );

/**
 * Background Color Light
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'bg_color_light',
    'section' => 'colors_schemes',
    'label' => esc_html__( 'Background Color', 'jackryan' ),
    'description' => esc_html__( 'Select the background color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => false 
    ),
    'default' => '#FFFFFF',
        'output'    => [
        [
            'element'  => ':root, [data-theme="light"]',
            'property' => '--color-bg',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'light'
        )
    ),
) );

/**
 * Background Color Dark
 */
$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'color',
    'settings' => 'bg_color',
    'section' => 'colors_schemes',
    'label' => esc_html__( 'Background Color', 'jackryan' ),
    'description' => esc_html__( 'Select the background color', 'jackryan' ),
    'priority' => $priority++,
    'choices' => array(
        'alpha' => false 
    ),
    'default' => '#202020',
        'output'    => [
        [
            'element'  => ':root, [data-theme="dark"]',
            'property' => '--color-bg',
        ],
    ],
    'transport' => 'auto',
    'required'  => array( 
        array( 
            'setting'   => 'theme_mode',
            'operator'  => '==',
            'value'     => 'dark'
        )
    ),
) );

$priority = 0;
Kirki::add_field( 'jackryan_customize', array(
    'type'        => 'custom',
    'settings'    => 'separator3',
    'section'     => 'colors_schemes',
    'default'     => '<hr>',
    'priority' => $priority++,
) );