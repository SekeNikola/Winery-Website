<?php
/**
 * Just Sidebar.
 *
 * @package Vast
 * @since 1.0.0
 */

?>

<div <?php vast_sidebar_class(); ?>>
	<aside id="sidebar">
		<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar' ); ?>
		<?php endif; ?>
	</aside>
</div>
