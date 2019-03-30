<?php
/**
 * This file config of panels customizer.
 *
 * @package Vast
 */

$vast_customizer_panels['site-identity-panel'] = array(
	'title' => esc_html__( 'Site Identities', 'vast' ),
	'description' => esc_html__( 'Control your blog setting\'s, layout, sidebar position', 'vast' ),
	'priority' => 10,
);

$vast_customizer_panels['footer-panel'] = array(
	'title' => esc_html__( 'Footer', 'vast' ),
	'description' => esc_html__( 'Control your footer setting\'s', 'vast' ),
	'priority' => 110,
);
