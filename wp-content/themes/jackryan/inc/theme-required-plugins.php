<?php

add_action( 'tgmpa_register', 'jackryan_register_required_plugins' );

function jackryan_register_required_plugins() {

	$source = 'https://theme.madsparrow.me/jackryan/plugins/';

	$plugins = array(

		array(
			'name' => esc_html__( 'Advanced Custom Fields PRO', 'jackryan' ),
			'slug' => 'acf_pro',
			'source' => esc_url( $source . 'advanced-custom-fields-pro.zip'),
			'required' => true,
		),
		array(
			'name' => esc_html__( 'JackRyan Theme Add-ons', 'jackryan' ),
			'slug' => 'jackryan_portfolio',
			'source' => esc_url( $source . 'jackryan-portfolio-plugin.zip'),
			'required' => true,
		),
		array(
			'name' => esc_html__( 'Kirki', 'jackryan' ),
			'slug' => 'kirki',
			'required' => true,
		),
		array(
			'name' => esc_html__( 'Contact Form 7', 'jackryan' ),
			'slug' => 'contact-form-7',
			'required' => true,
		),
		array(
			'name' => esc_html__( 'Block Gallery', 'jackryan' ),
			'slug' => 'block-gallery',
			'source' => esc_url( $source . 'block-gallery.zip'),
			'required' => true,
		),
		array(
			'name' => esc_html__( 'One Click Demo Import', 'jackryan' ),
			'slug' => 'one-click-demo-import',
			'required' => true,
		),
	);

	$config = array(
		'id'           => 'jackryan',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}