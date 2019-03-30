<?php
/**
 * Just Sidebar.
 *
 * @package Vast
 * @since 1.0.0
 */

if ( 'sidebar-none' === vast_theme_setting( 'sidebar-layout' ) && ! is_customize_preview() ) {
	return;
}
?>

<?php
if ( is_home() || is_search() || is_category() || is_archive() ) {
	if ( is_active_sidebar( 'sidebar' ) ) {
?>
		<div <?php vast_sidebar_class(); ?>>
			<aside id="sidebar">
				<?php
					dynamic_sidebar( 'sidebar' );
				?>
			</aside>
		</div>
<?php
	}
}
?>
