<?php
/**
 * This file config of sections for customizer.
 *
 * @package Vast
 */

$vast_customizer_sections['upload-logo'] = array(
	'title' => esc_html__( 'Logo', 'vast' ),
	'panel' => 'site-identity-panel',
	'priority' => 10,
);

$vast_customizer_sections['address-icon'] = array(
	'title' => esc_html__( 'Favicon', 'vast' ),
	'panel' => 'site-identity-panel',
	'priority' => 40,
);

$vast_customizer_sections['colors'] = array(
	'title' => esc_html__( 'Brand Color', 'vast' ),
	'panel' => 'site-identity-panel',
	'priority' => 60,
);

$vast_customizer_sections['copyright-text'] = array(
	'title' => esc_html__( 'Copyright Text', 'vast' ),
	'panel' => 'site-identity-panel',
	'priority' => 100,
);

// Vast sections.
$vast_customizer_sections['layout-option'] = array(
	'title' => esc_html__( 'Layout Options', 'vast' ),
	'panel' => '',
	'priority' => 20,
);

// Vast Navigation Bar Sticky Menu.
$vast_customizer_sections['menu-option'] = array(
	'title' => esc_html__( 'Navigation Bar', 'vast' ),
	'panel' => '',
	'priority' => 20,
);

// Vast Top Bar.
$vast_customizer_sections['top-bar'] = array(
	'title' => esc_html__( 'Top Bar', 'vast' ),
	'panel' => '',
	'priority' => 30,
);

// Move WordPress default sections to vast sections.
$wp_customizer_sections['static_front_page'] = array(
	'priority' => 40,
);

$wp_customizer_sections['title_tagline'] = array(
	'panel' => 'site-identity-panel',
	'title' => esc_html__( 'Site Title', 'vast' ),
	'priority' => 20,
);

$wp_customizer_sections['header_image'] = array(
	'title' => esc_html__( 'Header Image', 'vast' ),
	'priority' => 100,
);

if ( ! function_exists( 'detheme_display_footer_builder' ) ) {
	$vast_customizer_sections['footer-section'] = array(
		'title' => esc_html__( 'Footer', 'vast' ),
		'panel' => 'site-identity-panel',
		'priority' => 110,
	);
}

$wp_customizer_sections['custom_css'] = array(
	'title' => esc_html__( 'Custom CSS', 'vast' ),
	'priority' => 120,
);
