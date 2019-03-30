<?php
/**
 * The template for displaying copyright on footer.
 *
 * @package Vast
 * @since 1.0.0
 */

if ( ! get_theme_mod( 'footer-display-copyright', true ) ) {
	return;
}
?>
<div id="legal">
	<?php echo wp_kses_post( vast_theme_setting( 'footer-legal' ) ); ?>
</div><!-- #legal -->
