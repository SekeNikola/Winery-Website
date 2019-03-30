<?php
/**
 * Top Bar Mobile Layout
 *
 * @package Vast
 */

if ( vast_theme_setting( 'topbar-switch' ) !== 'true' ) {
	return;
}
?>

<div id="topbar-mobile" class="topbar-mobile">
	<div class="topbar-content">
		<div class="topbar-left">
<?php
			echo wp_kses_post( vast_theme_setting( 'topbar-left' ) );
?>
		</div>
		<div class="topbar-right">
<?php
			echo wp_kses_post( vast_theme_setting( 'topbar-right' ) );
?>
		</div>
	</div>
</div>
