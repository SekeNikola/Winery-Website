<?php
/**
 * This file config of custom control for customizer.
 *
 * @package Vast
 */

$vast_customizer_settings['logo-height'] = array(
	'section'         => 'upload-logo',
	'type'            => 'custom',
	'custom_type'     => 'vast-input-slider',
	'default'         => 27,
	'unit'            => 'px',
	'priority'        => 9,
	'label'           => esc_html__( 'Height', 'vast' ),
	'description'     => esc_html__( 'Recomended logo height is 21px.' , 'vast' ),
	'transport'       => 'postMessage',
	'input_attrs'     => array(
		'min'  => 10,
		'max'  => 250,
		'step' => 1,
	),
);

$vast_customizer_settings['logo-sticky'] = array(
	'section'         => 'upload-logo',
	'type'            => 'image',
	'priority'        => 9,
	'default'         => '',
	'label'           => esc_html__( 'Logo Sticky', 'vast' ),
	'transport'       => 'refresh',
);

$vast_customizer_settings['logo-sticky-height'] = array(
	'section'         => 'upload-logo',
	'type'            => 'custom',
	'custom_type'     => 'vast-input-slider',
	'default'         => 27,
	'unit'            => 'px',
	'priority'        => 9,
	'label'           => esc_html__( 'Logo Sticky Height', 'vast' ),
	'description'     => esc_html__( 'Recomended logo height is 21px.' , 'vast' ),
	'transport'       => 'postMessage',
	'input_attrs'     => array(
		'min'  => 10,
		'max'  => 250,
		'step' => 1,
	),
);

$vast_customizer_settings['blog-layout'] = array(
	'section'         => 'layout-option',
	'type'            => 'custom',
	'custom_type'     => 'vast-switcher',
	'default'         => 'vast-layout-fullwidth',
	'label'           => esc_html__( 'Blog Layout', 'vast' ),
	'transport'       => 'postMessage',
	'choices'         => array(
		'vast-layout-fullwidth'  => esc_html__( 'Fullwidth' , 'vast' ),
		'vast-layout-boxed'      => esc_html__( 'Boxed' , 'vast' ),
	),
);

$vast_customizer_settings['style-layout'] = array(
	'section'         => 'layout-option',
	'type'            => 'custom',
	'custom_type'     => 'vast-switcher',
	'default'         => 'vast-classic-layout',
	'label'           => esc_html__( 'Layout Styles', 'vast' ),
	'transport'       => 'refresh',
	'choices'         => array(
		'vast-classic-layout'  => esc_html__( 'Classic' , 'vast' ),
		'vast-masonry-layout'     => esc_html__( 'Masonry' , 'vast' ),
	),
);

$vast_customizer_settings['sidebar-layout'] = array(
	'section'         => 'layout-option',
	'type'            => 'custom',
	'custom_type'     => 'vast-image-selector',
	'default'         => 'sidebar-right',
	'transport'       => 'refresh',
	'label'           => esc_html__( 'Sidebar Option', 'vast' ),
	'description'     => esc_html__( 'You can choose sidebar position on your site, is it in right, left, or no sidebar.' , 'vast' ),
	'choices'         => array(
		'sidebar-right'  => array(
			'image' => VAST_THEME_URI . '/inc/customizer/assets/images/rs.png',
			'name' => esc_html__( 'Right Sidebar' , 'vast' ),
		),
		'sidebar-none'  => array(
			'image' => VAST_THEME_URI . '/inc/customizer/assets/images/ns.png',
			'name' => esc_html__( 'None Sidebar' , 'vast' ),
		),
		'sidebar-left'  => array(
			'image' => VAST_THEME_URI . '/inc/customizer/assets/images/ls.png',
			'name' => esc_html__( 'Left Sidebar' , 'vast' ),
		),
	),
);

$vast_customizer_settings['parallax-layout'] = array(
	'section'         => 'layout-option',
	'type'            => 'custom',
	'custom_type'     => 'vast-switcher',
	'default'         => 'vast-header-parallax',
	'label'           => esc_html__( 'Header Image Scrolling', 'vast' ),
	'transport'       => 'refresh',
	'choices'         => array(
		'vast-header-parallax' => esc_html__( 'Parallax' , 'vast' ),
		'vast-header-none' => esc_html__( 'Static' , 'vast' ),
	),
);

$vast_customizer_settings['dropdown-layout'] = array(
	'section'         => 'layout-option',
	'type'            => 'custom',
	'custom_type'     => 'vast-switcher',
	'default'         => 'vast-dropdown-style',
	'label'           => esc_html__( 'Dropdown Style', 'vast' ),
	'transport'       => 'refresh',
	'choices'         => array(
		'vast-dropdown-style' => esc_html__( 'Selectize' , 'vast' ),
		'vast-dropdown-none' => esc_html__( 'Original' , 'vast' ),
	),
);

$vast_customizer_settings['related-post-image'] = array(
	'section'     => 'layout-option',
	'type'        => 'custom',
	'custom_type' => 'vast-switcher',
	'label'       => esc_html__( 'Related Post Image', 'vast' ),
	'default'     => 'related-post-image-hidden',
	'choices'     => array(
		'related-post-image-hidden'  => esc_html__( 'Hidden' , 'vast' ),
		'related-post-image-show'    => esc_html__( 'Show' , 'vast' ),
	),
);

$vast_customizer_settings['sticky-layout'] = array(
	'section'         => 'menu-option',
	'type'            => 'custom',
	'custom_type'     => 'vast-switcher',
	'default'         => 'vast-sticky',
	'label'           => esc_html__( 'Navigation Position', 'vast' ),
	'transport'       => 'refresh',
	'choices'         => array(
		'vast-sticky' => esc_html__( 'Sticky' , 'vast' ),
		'vast-scroll' => esc_html__( 'Scroll' , 'vast' ),
	),
);

$vast_customizer_settings['navbar-font-color'] = array(
	'section'     => 'menu-option',
	'type'        => 'color',
	'default'     => '#333333',
	'transport'   => 'refresh',
	'label'       => esc_html__( 'Font & Background Color', 'vast' ),
);

$vast_customizer_settings['navbar-background-color'] = array(
	'section'     => 'menu-option',
	'type'        => 'color-alpha',
	'default'     => '#ffffff',
	'capability'  => 'edit_theme_options',
	'transport'   => 'refresh',
	'show_opacity'  => true,
	'palette'   => array(
		'rgb(150, 50, 220)',
		'rgba(50,50,50,0.8)',
		'rgba( 255, 255, 255, 0.2 )',
		'#00CC99',
	),
);

$vast_customizer_settings['navbar-font-sticky-color'] = array(
	'section'     => 'menu-option',
	'type'        => 'color',
	'default'     => '#333333',
	'transport'   => 'refresh',
	'label'       => esc_html__( 'Font & Background Color Sticky', 'vast' ),
);

$vast_customizer_settings['navbar-background-sticky-color'] = array(
	'section'     => 'menu-option',
	'type'        => 'color-alpha',
	'default'     => '#ffffff',
	'capability'  => 'edit_theme_options',
	'transport'   => 'refresh',
	'show_opacity'  => true,
	'palette'   => array(
		'rgb(150, 50, 220)',
		'rgba(50,50,50,0.8)',
		'rgba( 255, 255, 255, 0.2 )',
		'#00CC99',
	),
);

$vast_customizer_settings['navbar-bottom-border'] = array(
	'section'         => 'menu-option',
	'type'            => 'custom',
	'custom_type'     => 'vast-switcher',
	'default'         => '1px solid #e3e3e3',
	'label'           => esc_html__( 'Bottom Border on Homepage', 'vast' ),
	'transport'       => 'refresh',
	'choices'         => array(
		'none'              => esc_html__( 'Hide' , 'vast' ),
		'1px solid #e3e3e3' => esc_html__( 'Show' , 'vast' ),
	),
);
