<?php
$priority = 0;

Kirki::add_field( 'theme_config_id', [
    'type'        => 'radio-buttonset',
    'section'     => 'header_settings',
    'settings'    => 'type_menu',
    'label'       => esc_html__( 'Menu Variation', 'jackryan' ),
    'default'     => 'default',
    'choices'     => [
        'default'   => esc_html__( 'Default', 'jackryan' ),
        'drawer' => esc_html__( 'Burger', 'jackryan' ),
    ],
    'priority' => $priority++,
] );

Kirki::add_field( 'theme_config_id', [
    'type'        => 'custom',
    'settings'    => 'headline',
    // 'label'       => esc_html__( 'This is the label', 'jackryan' ), // optional
    'section'     => 'header_settings',
    'default'         => '<h3 style="padding:15px 0px 0px; color: #555d66; margin:0;">' . __( 'Header Style', 'jackryan' ) . '</h3>',
    'priority' => $priority++,
] );

Kirki::add_field( 'theme_config_id', [
    'type'        => 'radio-buttonset',
    'section'     => 'header_settings',
    'settings'    => 'type_header',
    // 'label'       => esc_html__( 'Radio-Buttonset Control', 'jackryan' ),
    'default'     => 'default',
    'choices'     => [
        'default'   => esc_html__( 'Default', 'jackryan' ),
        'fixed' => esc_html__( 'Fixed', 'jackryan' ),
        'sticky'  => esc_html__( 'Sticky', 'jackryan' ),
    ],
    'priority' => $priority++,
] );

Kirki::add_field( 'jackryan_customize', [
    'type'        => 'checkbox',
    'section'     => 'header_settings',
    'settings'    => 'blur_hedaer',
    'label'       => esc_html__( 'Header Blur Effect', 'jackryan' ),
    'default'     => true,
    'priority' => $priority++,
] );

Kirki::add_field( 'jackryan_customize', array(
    'type'        => 'custom',
    'settings'    => 'separator',
    'section'     => 'header_settings',
    'default'     => '<hr><br>',
    'priority' => $priority++,
) );

Kirki::add_field( 'jackryan_customize', array(
    'type' => 'dimension',
    'settings' => 'header_height',
    'section' => 'header_settings',
    'label' => esc_html__( 'Header Height', 'jackryan' ),
    'description' => esc_html__( 'Select the height of the header (default: 60px)', 'jackryan' ),
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => '60px',
    'output'    => [
        [
            'element'  => ':root',
            'property' => '--main-header-height-md',
        ],
    ],
    'transport' => 'auto',
) );
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'dimension',
    'settings' => 'logo_height',
    'section' => 'header_settings',
    'label' => esc_html__( 'Max Height of Logo Image', 'jackryan' ),
    'description' => esc_html__( 'Select the height of the logo (default: 18px). For proportions, the width is set automatically', 'jackryan' ),
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => '18px',
    'output' => array(
        array(
            'element' => '.main-header__logo a, .main-header__logo svg, .main-header__logo img',
            'property' => 'height' 
        ) 
    ) 
) );
Kirki::add_field( 'jackryan_customize', array(
    'type' => 'dimension',
    'settings' => 'footer_logo_height',
    'section' => 'header_settings',
    'label' => esc_html__( 'Max Height of Footer Logo Image', 'jackryan' ),
    'description' => esc_html__( 'Select the height of the footer logo (default: 18px). For proportions, the width is set automatically', 'jackryan' ),
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => '18px',
    'output' => array(
        array(
            'element' => '.ms-logo__default img',
            'property' => 'height' 
        ) 
    ) 
) );
Kirki::add_field('jackryan_customize', array(
    'section' => 'header_settings',
    'type' => 'image',
    'settings' => 'logo_light',
    'label' => esc_html__('Image Logo Light', 'jackryan'),
    'description' => esc_html__( 'Choose a light logo image to display for header', 'jackryan' ),
    'default' => $theme_path_images . 'logo_w.svg',
    'priority' => $priority++
));

Kirki::add_field('jackryan_customize', array(
    'section' => 'header_settings',
    'type' => 'image',
    'settings' => 'logo_dark',
    'label' => esc_html__('Image Logo Dark', 'jackryan'),
    'description' => esc_html__( 'Choose a dark logo image to display for header', 'jackryan' ),
    'default' => $theme_path_images . 'logo_d.svg',
    'priority' => $priority++
));