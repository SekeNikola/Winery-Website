<?php
/**
 * This file config of custom control for customizer.
 *
 * @package Vast
 */

$vast_customizer_settings['header-styling'] = array(
	'section'     => 'header-styling',
	'type'        => 'radio',
	'default'     => 'layout-boxed',
	'label'       => esc_html__( 'Header Style', 'vast' ),
	'description' => esc_html__( 'This option affects your header layout. ( This control just temporary )' , 'vast' ),
	'choices'     => array(
		'style-1' => esc_html__( 'Style 1', 'vast' ),
		'style-2' => esc_html__( 'Style 2', 'vast' ),
		'style-3' => esc_html__( 'Style 3', 'vast' ),
		'style-4' => esc_html__( 'Style 4', 'vast' ),
	),
);

$vast_customizer_settings['header_image_show_frontpage'] = array(
	'section'     => 'header_image',
	'type'        => 'custom',
	'custom_type' => 'vast-switcher',
	'default'     => 'vast-header-image-show',
	'label'       => esc_html__( 'Display at Homepage', 'vast' ),
	'choices'         => array(
		'vast-header-image-show' => esc_html__( 'Show' , 'vast' ),
		'vast-header-image-hide' => esc_html__( 'Hide' , 'vast' ),
	),
);
