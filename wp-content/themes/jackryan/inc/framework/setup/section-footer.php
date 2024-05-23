<?php
Kirki::add_field( 'jackryan_customize', array(
    'type'     => 'text',
    'settings' => 'footer_text',
    'section' => 'footer_settings',
    'label' => esc_html__( 'Header Height', 'jackryan' ),
    'description' => esc_html__( 'Footer Copyright text', 'jackryan' ),
    'priority' => $priority++,
    'default'  => esc_html__( 'Copyright © 2020. Developed by MadSparrow', 'jackryan' ),
) );