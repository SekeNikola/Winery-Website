<?php
/**
 * Breadcrumbs Layout
 *
 * @package Vast
 */

?>

<?php
if ( function_exists( 'woocommerce_breadcrumb' ) ) {
	$wc_breadcrumb_args = array(
		'delimiter' => '',
		'wrap_before' => '<div class="breadcrumbs"><div class="container"><div class="uf-breadcrumbs">',
		'wrap_after' => '</div></div></div>',
		'before' => '<span>',
		'beforecurrent' => '<span class="current">',
		'after' => '</span>',
		'home' => esc_html__( 'Home', 'vast' ),
	);

	woocommerce_breadcrumb( $wc_breadcrumb_args );
} else {
?>
	<div class="breadcrumbs">
		<div class="container">
			<?php vast_breadcrumbs(); ?>
		</div>
	</div>
<?php
}
?>
