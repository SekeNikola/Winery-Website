<?php
/**
 * This file config of custom control for customizer.
 *
 * @package Vast
 */

if ( function_exists( 'detheme_display_footer_builder' ) ) {
	$vast_customizer_settings['footer-option'] = array(
		'section'         => 'footer-section',
		'type'            => 'select',
		'default'         => 'footer-widget',
		'label'           => esc_html__( 'Select Footer', 'vast' ),
		'transport'       => 'refresh',
		'description'     => esc_html__( 'Select widget or page to appear on Footer.' , 'vast' ),
		'choices'         => array(
			'footer-widget' => esc_html__( 'Footer from Widget' , 'vast' ),
			'footer-page'   => esc_html__( 'Footer from Page' , 'vast' ),
		),
	);

	$vast_customizer_settings['footer-url'] = array(
		'section'         => 'footer-section',
		'type'            => 'custom',
		'custom_type'     => 'vast-link',
		'default'         => '',
		'label'           => esc_html__( 'Click here to edit footer widgets', 'vast' ),
		'description'     => esc_html__( '#', 'vast' ),
		'transport'       => 'refresh',
	);

	$vast_customizer_settings['footer-content'] = array(
		'section'         => 'footer-section',
		'type'            => 'select',
		'default'         => 'vast-page-1',
		'label'           => esc_html__( 'Footer from Page', 'vast' ),
		'transport'       => 'refresh',
		'description'     => esc_html__( 'Select a page to appear on Footer.' , 'vast' ),
		'choices'         => detheme_get_pages_array(),
	);
}

$vast_customizer_settings['footer-display-copyright'] = array(
	'section'     => 'footer-section',
	'type'        => 'custom',
	'custom_type' => 'vast-switcher',
	'label'       => esc_html__( 'Copyright Text', 'vast' ),
	'description' => esc_html__( 'Write your copyright', 'vast' ),
	'default'     => true,
	'choices'     => array(
		false   => esc_html__( 'Hidden' , 'vast' ),
		true    => esc_html__( 'Show' , 'vast' ),
	),
);

/* translators: %s: site legal */
$default = sprintf( esc_html__( 'Copyright %s', 'vast' ), get_bloginfo( 'name' ) );

$vast_customizer_settings['footer-legal'] = array(
	'section'     => 'footer-section',
	'type'        => 'textarea',
	'default'     => $default,
	'transport'   => 'postMessage',
	'input_attrs' => array(
		'class' => 'my-custom-class',
		'placeholder' => esc_html__( 'Enter message...', 'vast' ),
	),
);
