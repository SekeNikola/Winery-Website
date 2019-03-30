<?php
/**
 * Blog single tags
 *
 * @package Vast
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="uf-single-post__tags">

	<?php if ( has_tag() ) : ?>

		<?php
		$vast_tags = get_the_tags( get_the_ID() );
		foreach ( $vast_tags as $vast_tag ) {
			echo wp_kses_post( '<a href="' . esc_url( get_tag_link( $vast_tag->term_id ) ) . '" rel="tag" class="pills pills-default">' . $vast_tag->name . '</a>' );
		}
		?>

	<?php endif; ?>

</div>
