<?php global $ci, $ci_defaults, $load_defaults, $content_width; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	
	if( !function_exists('ci_the_post_thumbnail_full')):
	function ci_the_post_thumbnail_full($args = array() )
	{
		$args = wp_parse_args( (array) $args, array(
			'class' => '',
			'noalign' => false
		));

		$attr = array();

		if(ci_setting('featured_full_use_full')=='full')
		{
			$attr['class'] = $args['class'];

//			if($args['noalign'] === false)
//			{
//				$attr['class'] .= ' '.ci_setting('featured_single_align').' ';
//			}

			if( empty($attr['class']))
				unset($attr['class']);

			the_post_thumbnail('ci_featured_full', $attr);
		}
		if(ci_setting('featured_full_use_full')=='single')
		{
			$attr['class'] = $args['class'];

			if($args['noalign'] === false)
			{
				$attr['class'] .= ' '.ci_setting('featured_single_align').' ';
			}

			if( empty($attr['class']))
				unset($attr['class']);

			the_post_thumbnail('ci_featured_single', $attr);
		}
		if(ci_setting('featured_full_use_full')=='disabled')
		{
			// Do nothing
		}
	}
	endif;


	
	$fullwidth_width = intval(apply_filters('ci_full_template_width', 960));
	/*	This is how to override the default full width size. 
		This function and hook will typically go into a panel tab file,
		right before the load_panel_snippet('featured_image_fullwidth'); call, in the $load_defaults===TRUE section.
		
		// Set our full width template width.
		add_filter('ci_full_template_width', 'ci_fullwidth_width');
		if( !function_exists('ci_full_template_width') ):
		function ci_fullwidth_width()
		{ 
			return 870; 
		}
		endif;
	*/

	$ci_defaults['featured_full_height']	= intval($fullwidth_width/3);
	$ci_defaults['featured_full_use_full']	= 'full';

	if(ci_setting('featured_full_use_full')=='full') {
		add_image_size( 'ci_featured_full', $fullwidth_width, intval(ci_setting('featured_full_height')), true);
	}

?>
<?php else: ?>

	<fieldset id="ci-panel-featured-image-fullwidth" class="set">
		<legend><?php _e('Featured Image - Full Width', 'truenorth'); ?></legend>
		<p class="guide"><?php _e('You can select whether the full width page template (if applicable) will use it\'s own image size, or the same configuration as normal posts and pages. If you select its own size, you can only configure the height of the image, as the width will match the width of the page by default. Please note that if you choose the full width and/or change its height, you will need to regenerate your thumbnails.', 'truenorth'); ?></p>
		<?php 
			$fullwidth_options = array(
				'full' => __('Full width image', 'truenorth'),
				'single' => __('The same as posts/pages', 'truenorth'),
				'disabled' => _x('Disabled', 'featured image is disabled', 'truenorth')
			);
			ci_panel_dropdown('featured_full_use_full', $fullwidth_options, __('Featured image for Full Width template is', 'truenorth')); 
			ci_panel_input('featured_full_height', __('Full Width featured image height', 'truenorth'));
		?>
	</fieldset>

<?php endif; ?>