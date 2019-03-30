<?php
/**
 * Navbar Layout
 *
 * @package Vast
 */

$menu_args = array(
	'theme_location' => 'main_menu',
	'menu_id'        => 'header_navigation',
	'menu_class'     => 'main-menu nav navbar-nav ml-auto',
	'container'      => false,
	'fallback_cb'    => 'vast_fallback_menu',
);

?>

<div class="container uf_desktop_navigation d-none d-lg-block">
	<nav id="navbardesktop" class="navbar navbar-expand-lg navbar-light d-flex justify-content-between align-items-stretch">
		<button class="navbar-toggler" type="button" data-toggle="modal" data-target="#exampleModal">
			<span class="navbar-toggler-icon icon-bars"></span>
		</button>
		<?php vast_logo(); ?>
		<?php vast_logo_sticky(); ?>

		<div id="navigation" class="d-none d-lg-block">
			<?php wp_nav_menu( $menu_args ); ?>
		</div>
	</nav>
</div>

<div class="container-fluid uf_mobile_navigation d-lg-none">
	<div class="row">
		<nav id="navbar" class="navbar navbar-expand-lg navbar-light d-flex justify-content-between align-items-stretch">
			<button class="navbar-toggler" type="button" data-toggle="modal" data-target="#exampleModal">
				<span class="navbar-toggler-icon icon-bars"></span>
			</button>
			<?php vast_logo(); ?>
			<?php vast_logo_sticky(); ?>
		</nav>
	</div>
</div>
