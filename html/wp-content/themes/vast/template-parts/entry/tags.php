<?php
/**
 * Displays post entry tags
 *
 * @package Vast
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( has_tag() ) : ?>
<div class="entry__meta-tags">
	<?php
		$vast_tags = get_the_tags( get_the_ID() );
	if ( $vast_tags ) {
		foreach ( $vast_tags as $vast_tag ) {
			echo wp_kses_post( '<a href="' . esc_url( get_tag_link( $vast_tag->term_id ) ) . '" rel="tag" class="pills pills-default">' . $vast_tag->name . '</a>' );
		}
	}
	?>
</div>
<?php endif; ?>
