<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Vast
 */

// Core Constants.
define( 'VAST_THEME_DIR', get_template_directory() );
define( 'VAST_THEME_URI', get_template_directory_uri() );
// Minimum required PHP version.
define( 'VAST_THEME_REQUIRED_PHP_VERSION', '5.2.4' );

/**
 * Set global content width
 *
 * @link https://developer.wordpress.com/themes/content-width/
 */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

/**
 * Global variables
 */
$vast_customizer_panels   = array();
$vast_customizer_settings = array();
$vast_customizer_controls = array(
	'vast-image-selector' => 'Vast_Image_Selector_Control',
	'vast-switcher'       => 'Vast_Switcher_Control',
	'vast-input-slider'   => 'Vast_Input_Slider_Control',
	'vast-alpha-color-picker' => 'Vast_Alpha_Color_Picker_Control',
	'vast-icon-picker' => 'Vast_Icon_Picker_Control',
	'vast-link' => 'Vast_Link_Control',
);

/**
 * Load all core theme function files.
 */
require get_parent_theme_file_path( '/inc/helpers.php' );
require get_parent_theme_file_path( '/inc/hooks.php' );
require get_parent_theme_file_path( '/inc/lib/class-vast-mobile-nav-walker.php' );
require get_parent_theme_file_path( '/inc/lib/webfonts.php' );
require get_parent_theme_file_path( '/inc/lib/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/inc/lib/class-vast-customizer-config.php' );
require get_parent_theme_file_path( '/inc/lib/class-vast-customizer-loader.php' );

/**
 * Load panels, sections and settings.
 */
require get_parent_theme_file_path( '/inc/customizer/panels.php' );
require get_parent_theme_file_path( '/inc/customizer/sections.php' );
require get_parent_theme_file_path( '/inc/customizer/settings/general.php' );
require get_parent_theme_file_path( '/inc/customizer/settings/header.php' );
require get_parent_theme_file_path( '/inc/customizer/settings/colors.php' );
require get_parent_theme_file_path( '/inc/customizer/settings/footer.php' );
require get_parent_theme_file_path( '/inc/customizer/settings/default.php' );
require get_parent_theme_file_path( '/inc/customizer/settings/topbar.php' );

/**
 * Class instance init.
 */
$vast_customizer_loader = new Vast_Customizer_Loader();

add_action( 'tgmpa_register', 'vast_register_required_plugins' );

/**
 * Vast TGMPA
 */
function vast_register_required_plugins() {

	$plugins = array(
			array(
				'name'                  => esc_html__( 'Contact Form 7','vast' ),
				'slug'                  => 'contact-form-7',
				'required'              => false,
			),
			array(
				'name'                  => esc_html__( 'King Composer','vast' ),
				'slug'                  => 'kingcomposer',
				'required'              => false,
			),
			array(
				'name'                  => esc_html__( 'WooCommerce','vast' ),
				'slug'                  => 'woocommerce',
				'required'              => false,
			),
			array(
				'name'                  => esc_html__( 'Elementor','vast' ),
				'slug'                  => 'elementor',
				'required'              => false,
			),
			array(
				'name'                  => esc_html__( 'Vast Package','vast' ),
				'slug'                  => 'vast-package',
				'required'              => false,
			),
			array(
				'name'                  => esc_html__( 'Vast Demo Import','vast' ),
				'slug'                  => 'vast-demo-import',
				'required'              => false,
			),
		);

	$config = array(
		'id'           => 'vast',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
