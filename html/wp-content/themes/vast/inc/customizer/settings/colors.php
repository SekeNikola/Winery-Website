<?php
/**
 * This file config of custom control for customizer.
 *
 * @package Vast
 */

$vast_customizer_settings['primary-color'] = array(
	'section'     => 'colors',
	'type'        => 'color',
	'default'     => '#f02b2d',
	'transport'   => 'postMessage',
	'label'       => esc_html__( 'Brand Color', 'vast' ),
	'description' => esc_html__( 'Change your brand color', 'vast' ),
);
