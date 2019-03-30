<?php
/**
 * This file includes helper functions used throughout the theme.
 *
 * @package Vast
 */

if ( ! function_exists( 'vast_header_classes' ) ) {

	/**
	 * Vast Header Classes
	 *
	 * @param array $classes Class List.
	 * @return array
	 */
	function vast_header_classes( $classes = array() ) {
		// Apply filters for child theming.
		$classes = apply_filters( 'vast_header_classes', $classes );

		// Turn classes into space seperated string.
		$classes = implode( ' ', $classes );

		// return classes.
		return $classes;

	}
}

if ( ! function_exists( 'vast_content_class' ) ) :

	/**
	 * Vast Content Class
	 *
	 * @param array $classes Class List.
	 */
	function vast_content_class( $classes = array() ) {
		// Default class.
		$classes[] = 'vast-content';
		$classes[] = 'order-lg-1';

		// Layout class.
		$classes[] = 'sidebar-none' === vast_theme_setting( 'sidebar-layout' ) || is_active_sidebar( 'sidebar' ) === false ? 'col-12' : 'col-lg-8 col-md-8';

		// Apply filters for child theming.
		$classes = apply_filters( 'vast_content_class', $classes );

		// Turn classes into space seperated string.
		$classes = array_unique( $classes );
		$classes = implode( ' ', $classes );

		// return classes.
		echo wp_kses_data( 'class="' . esc_attr( $classes ) . '"' );
	}
endif;

if ( ! function_exists( 'vast_sidebar_class' ) ) :

	/**
	 * Vast Sidebar Class
	 *
	 * @param array $classes Class List.
	 */
	function vast_sidebar_class( $classes = array() ) {
		// Default class.
		$classes[] = 'vast-sidebar';
		$classes[] = 'col-lg-4 col-md-4';

		// Layout class.
		$classes[] = 'sidebar-left' === vast_theme_setting( 'sidebar-layout' ) ? 'order-lg-0' : 'order-lg-1';

		// Apply filters for child theming.
		$classes = apply_filters( 'vast_sidebar_class', $classes );

		// Turn classes into space seperated string.
		$classes = array_unique( $classes );
		$classes = implode( ' ', $classes );

		$style = '';

		if ( 'sidebar-none' === vast_theme_setting( 'sidebar-layout' ) && is_customize_preview() ) {
			$style = 'display:none';
		}

		// return classes.
		echo wp_kses_data( 'class="' . esc_attr( $classes ) . '" style="' . esc_attr( $style ) . '"' );
	}
endif;

if ( ! function_exists( 'vast_comment' ) ) :

	/**
	 * Vast Custom Comment Style
	 *
	 * @param object $comment Comment Object.
	 * @param array  $args    comment_form arguments.
	 * @param int    $depth   Comment's depth.
	 */
	function vast_comment( $comment, $args, $depth ) {
		global $post;
		?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

		<?php
		switch ( $comment->comment_type ) :
			// Display trackbacks differently than normal comments..
			case 'pingback':
			case 'trackback':
			?>
				<article id="comment-<?php comment_ID(); ?>" class="comment-container" itemscope>
				<p>
					<?php esc_html_e( 'Pingback:', 'vast' ); ?>
					<span itemprop="name"><?php comment_author_link(); ?></span>
					<?php edit_comment_link( esc_html__( '(Edit)', 'vast' ), '<span class="edit-link">', '</span>' ); ?>
				</p>
				</article>
			<?php
				break;

			default:
				// Proceed with normal comments..
				?>
				<div <?php comment_class( 'comment-body' ); ?>>
					<?php echo wp_kses_post( get_avatar( $comment, apply_filters( 'vast_comment_avatar_size', 70 ) ) ); ?>
					<div class="comment-content">
						<div class="comment-card">
							<div class="comment-author">
								<div class="comment-link">
									<?php
									// translators: Get Comment Author Link.
									printf( esc_html__( '%s ', 'vast' ), sprintf( '%s', get_comment_author_link() ) );
									?>
									<?php if ( '0' === $comment->comment_approved ) : ?>
									<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation. ', 'vast' ); ?></p>
									<?php endif; ?>
									<?php comment_text(); ?>
								</div>
								
							</div>
						</div>
						<div class="comment-info" id="comment-info-<?php comment_ID(); ?>">
							<span class="comment-meta commentmetadata">
								<?php
									edit_comment_link(
										esc_html__( 'edit', 'vast' ),
										'',
										wp_kses(
											'<span class="dot"></span>',
											array(
												'span' => array(
													'class' => array(),
												),
											)
										)
									);
									comment_reply_link(
										array_merge(
											$args, array(
												'add_below' => 'comment-info',
												'depth' => $depth,
												'max_depth' => $args['max_depth'],
											)
										)
									);
								?>

								<?php if ( is_rtl() ) : ?>
								<div class="comment-info"><?php comment_date(); ?></div>
								<?php endif; ?>
							</span>
							<span class="comment-date"><?php comment_date(); ?>, <?php comment_time(); ?></span>
						</div>
					</div>

				</div><!-- #comment-## -->
			<?php
		endswitch;
	}
endif;

if ( ! function_exists( 'vast_theme_setting' ) ) {
	/**
	 * Get vast theme mod.
	 *
	 * @param string $key           Theme Mod key.
	 * @param bool   $control_value Whether using control value or not.
	 * @param string $control_attr  Control key from $vast_customizer_settings.
	 * @return mixed
	 */
	function vast_theme_setting( $key = '', $control_value = false, $control_attr = 'default' ) {
		global $vast_customizer_settings;

		if ( isset( $key ) && ! empty( $key ) ) {
			$default_value = isset( $vast_customizer_settings[ $key ] ) ? $vast_customizer_settings[ $key ][ $control_attr ] : '';
			$theme_mod = get_theme_mod( $key, $default_value );
			$setting = $control_value ? $default_value : $theme_mod;
			return empty( $setting ) ? $default_value : $setting;
		}

		/**
		 * Get all settings.
		 */
		$settings = array();

		foreach ( $vast_customizer_settings as $key => $setting ) {
			$default_value = $setting[ $control_attr ];
			$theme_mod = get_theme_mod( $key, $default_value );
			$setting = $control_value ? $default_value : $theme_mod;
			$settings[ $key ] = empty( $setting ) ? $default_value : $setting;
		}

		return $settings;
	}
}

if ( ! function_exists( 'vast_logo' ) ) :
	/**
	 * Display logo from site identity in customizer.
	 *
	 * @return void
	 */
	function vast_logo() {
		if ( function_exists( 'the_custom_logo' ) && '' !== get_theme_mod( 'custom_logo', '' ) ) {
			the_custom_logo();
		} else {
		?>
			<a href="<?php echo esc_url( site_url( '/' ) ); ?>" class="custom-logo-link disini" title="<?php echo esc_attr( bloginfo( 'name' ) ); ?>"><?php echo esc_attr( bloginfo( 'name' ) ); ?></a>
		<?php
		}
	}
endif;

if ( ! function_exists( 'vast_logo_sticky' ) ) :
	/**
	 * Display Sticky logo from site identity in customizer.
	 *
	 * @return void
	 */
	function vast_logo_sticky() {
		if ( '' !== get_theme_mod( 'logo-sticky', '' ) ) {
		?>
			<a href="<?php echo esc_url( site_url( '/' ) ); ?>" class="custom-logo-sticky-link" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php echo esc_attr( get_theme_mod( 'logo-sticky' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		<?php
		} else {
		?>
			<a href="<?php echo esc_url( site_url( '/' ) ); ?>" class="custom-logo-sticky-link" title="<?php echo esc_attr( bloginfo( 'name' ) ); ?>"><?php echo esc_attr( bloginfo( 'name' ) ); ?></a>
		<?php
		}
	}
endif;


/**
 * Filter an array based on a black list of keys
 *
 * @param array $array
 * @param array $keys
 *
 * @return array
 */
if ( ! function_exists( 'vast_array_keys_blacklist' ) ) :

	/**
	 * Blacklist array
	 *
	 * @param array $array Array List.
	 * @param array $keys  Blacklisted keys.
	 * @return array
	 */
	function vast_array_keys_blacklist( $array = array(), $keys = array() ) {
		foreach ( $array as $key => $value ) {
			if ( in_array( $key, $keys, true ) ) {
				unset( $array[ $key ] );
			}
		}

		return $array;
	}

endif;

if ( ! function_exists( 'vast_limit_string_at_title' ) ) :

	/**
	 * Limit how many characters you want to display.
	 *
	 * @param string $text  Get Title Post.
	 * @return string
	 */
	function vast_limit_string_at_title( $text ) {
		$text = substr( $text, 0, 33 );
		$sl = strlen( $text );
		if ( $sl > 30 ) {
			$text .= '...';
		}
		return $text;
	}

endif;

if ( ! function_exists( 'vast_page_parents' ) ) :

	/**
	 * Get page or taxonomy like category or tags parent IDs.
	 *
	 * @param int    $id Page ID.
	 * @param string $type Parent Type.
	 * @return array
	 */
	function vast_get_parent_ids( $id, $type = 'page' ) {
		$parent_ids = array();

		switch ( $type ) {
			case 'page':
				global $post;
				$parent_id = wp_get_post_parent_id( $id );
				break;

			case 'cat':
				$category = get_category( $id );
				$parent_id = $category->parent;
				break;
		}

		if ( 0 === $parent_id ) {
			return $parent_ids;
		}

		$parent_ids[] = $parent_id;
		$parent_ids = array_merge( vast_get_parent_ids( $parent_id, $type ), $parent_ids );

		return $parent_ids;
	}
endif;

if ( ! function_exists( 'vast_breadcrumbs' ) ) :

	/**
	 * Display bradcrumbs
	 *
	 * @return void
	 */
	function vast_breadcrumbs() {
		if ( is_single() || is_page() ) {
			global $post;
		}

		if ( is_date() ) {
			global $wp_locale;
		}

		$queried_object = get_queried_object();

		if ( is_category() || is_tag() ) {
			$term_id = $queried_object->term_id;
		}

		// Template support schema.
		$active_template = '<span property="name">%s</span>';
		$link_template = '<a property="item" typeof="WebPage" title="%s" href="%s"><span property="name">%s</span></a>';
		$breadcrumb_template = '<span property="itemListElement" typeof="ListItem">%s<meta property="position" content="%s"></span>';

		// Breadcrumbs list.
		$breadcrumbs = array();

		if ( is_single() || is_category() || is_tag() || is_date() ) {
				$breadcrumbs[] = array(
					'title'    => esc_html( 'Home', 'vast' ),
					'link'     => site_url(),
				);
		} else {
			$breadcrumbs[] = array(
				'title'    => esc_html( 'Home', 'vast' ),
				'link'     => site_url(),
			);
		}

		// Add breadcrumbs in single.
		if ( is_single() ) {
			if ( is_attachment() ) {
				$breadcrumbs[] = array(
					'title'    => get_post( $queried_object->post_parent )->post_title,
					'link'     => get_permalink( $queried_object->post_parent ),
				);
			} else {
				// Post category.
				$categories = get_the_category( $post->ID );
				if ( isset( $categories[0] ) ) {
					$first_cat = isset( $categories[0] ) ? $categories[0] : '';
					$breadcrumbs[] = array(
						'title'    => $first_cat->cat_name,
						'link'     => get_category_link( $first_cat->cat_ID ),
					);
				}
			}
		}

		// Add breadcrumbs in page.
		if ( is_single() || is_page() ) {
			// If it's page and has parent.
			if ( is_page() ) {
				foreach ( vast_get_parent_ids( $post->ID ) as $id ) {
					$breadcrumbs[] = array(
						'title'    => get_the_title( $id ),
						'link'     => get_the_permalink( $id ),
					);
				}
			}

			// Single post / page.
			$breadcrumbs[] = array(
				'title'    => get_the_title( $post->ID ),
				'link'     => get_the_permalink( $post->ID ),
			);
		}

		// Category archive.
		if ( is_category() ) {
			// Categories parent.
			foreach ( vast_get_parent_ids( $term_id, 'cat' ) as $id ) {
				$breadcrumbs[] = array(
					'title'    => get_cat_name( $id ),
					'link'     => get_category_link( $id ),
				);
			}

			$breadcrumbs[] = array(
				'title'    => get_cat_name( $term_id ),
				'link'     => get_category_link( $term_id ),
			);
		}

		// Tag archive.
		if ( is_tag() ) {
			$tag = get_tag( $term_id );
			$breadcrumbs[] = array(
				'title'    => $tag->name,
				'link'     => get_tag_link( $term_id ),
			);
		}

		// Date archive.
		if ( is_date() ) {
			$year = get_query_var( 'year' );
			$month = get_query_var( 'monthnum' );

			if ( $year ) {
				$breadcrumbs[] = array(
					'title'    => $year,
					'link'     => get_year_link( $year ),
				);
			}

			if ( $month ) {
				$breadcrumbs[] = array(
					'title'    => $wp_locale->get_month( $month ),
					'link'     => get_month_link( $year, $month ),
				);
			}
		}

		if ( is_paged() ) {
			$breadcrumbs[] = array(
				/* translators: page number */
				'title'    => sprintf( esc_html__( 'Page %s', 'vast' ), get_query_var( 'paged' ) ),
				'link'     => '',
			);
		}

		if ( is_search() ) {
			$breadcrumbs[] = array(
				/* translators: search query */
				'title'    => sprintf( esc_html__( 'Search result for &quot;%s&quot;', 'vast' ), get_search_query() ),
				'link'     => '',
			);
		}

		if ( is_author() ) {
			$breadcrumbs[] = array(
				/* translators: author name */
				'title'    => sprintf( esc_html__( '%s Posts', 'vast' ), get_the_author() ),
				'link'     => '',
			);
		}

		// Set breadcrumb class filters.
		$vast_breadcrumb_class = apply_filters( 'vast_breadcrumb_class', array() );
		$vast_breadcrumb_class = implode( ' ', $vast_breadcrumb_class );

		// Render content.
		$breadcrumb_length = count( $breadcrumbs ) - 1;
		$output = sprintf( '<div class="%s">', esc_attr( $vast_breadcrumb_class ) );

		foreach ( $breadcrumbs as $index => $breadcrumb ) {
			$link = ( $index === $breadcrumb_length )
				? sprintf( $active_template, esc_html( $breadcrumb['title'] ) )
				: sprintf( $link_template, esc_attr( $breadcrumb['title'] ), esc_url( $breadcrumb['link'] ), $breadcrumb['title'] );

			$output .= sprintf( $breadcrumb_template, $link, $index + 1 );
		}
		$output .= '</div>';
		echo wp_kses(
			$output, array(
				'div' => array(
					'class' => array(),
				),

				'span' => array(
					'property' => array(),
					'typeof'   => array(),
				),

				'meta' => array(
					'property' => array(),
					'content'  => array(),
				),

				'a' => array(
					'property' => array(),
					'typeof' => array(),
					'title' => array(),
					'href' => array(),
					'class' => array(),
				),
			)
		);
	}
endif;

if ( ! function_exists( 'vast_entries_class' ) ) :

	/**
	 * Vast entries class
	 *
	 * @since 1.0.0
	 */
	function vast_entries_class() {

		// Define classes array.
		$classes = array();

		$classes[] = 'entry';

		// Style layout class.
		if ( 'vast-masonry-layout' === vast_theme_setting( 'style-layout' ) ) {
			$classes[] = 'grid-item';
		}

		if ( has_post_thumbnail() ) {
			$classes[] = 'has-thumbnail';
		}

		return $classes;
	}

endif;

if ( ! function_exists( 'vast_related_posts' ) ) :

	/**
	 * Related posts.
	 *
	 * @param array $args get array of args.
	 * @return $related_posts
	 */
	function vast_related_posts( $args = array() ) {
		global $post;

		// Create an array of current category ID's.
		$cats     = wp_get_post_terms( $post->ID, 'category' );
		$cats_ids = array();
		foreach ( $cats as $vast_related_cat ) {
			$cats_ids[] = $vast_related_cat->term_id;
		}

		if ( empty( $cats_ids ) ) {
			$cats_ids[] = 1;
		}

		if ( empty( $args ) ) :
			$args = array(
				'posts_per_page' => 4,
				'orderby'        => 'rand',
				'category__in'   => $cats_ids,
				'post__not_in'   => array( get_the_ID() ),
				'no_found_rows'  => true,
				'tax_query'      => array(
					'relation'  => 'AND',
					array(
						'taxonomy' => 'post_format',
						'field'    => 'slug',
						'terms'    => array( 'post-format-quote', 'post-format-link' ),
						'operator' => 'NOT IN',
					),
				),
			);
		endif;

		$related_posts = new WP_Query( $args );

		if ( 'related-posts-off' === vast_theme_setting( 'related-posts' ) && is_customize_preview() ) {
			$style = 'display:none';
		}

		return $related_posts;
	}

endif;

if ( ! function_exists( 'vast_add_menu_parent_class' ) ) :

	/**
	 * Add Menu Parent Class.
	 *
	 * @param array $items Menu Items Array.
	 * @return $items Menu Items Array
	 */
	function vast_add_menu_parent_class( $items ) {

		$parents = array();
		foreach ( $items as $item ) {
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}

		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents, false ) ) {
				$item->classes[] = 'menu-parent-item';
			}
		}

		return $items;
	}
	add_filter( 'wp_nav_menu_objects', 'vast_add_menu_parent_class' );

endif;

if ( ! function_exists( 'vast_fallback_menu' ) ) :

	/**
	 * Vast fallback menu function.
	 *
	 * @return string The Menu's HTML
	 */
	function vast_fallback_menu() {
		$menu_args = array(
			'menu_id'        => 'header_navigation',
			'menu_class'     => 'main-menu nav navbar-nav ml-auto',
			'container'      => false,
		);

		return wp_nav_menu( $menu_args );
	}
endif;

if ( ! function_exists( 'vast_fallback_menu_mobile' ) ) :

	/**
	 * Vast fallback menu mobile function.
	 *
	 * @return string The Menu's HTML
	 */
	function vast_fallback_menu_mobile() {
		$menu_args = array(
			'menu_id'        => 'mobile_navigation',
			'menu_class'     => 'main-menu nav navbar-nav',
			'container'      => false,
			'walker'         => new vast_mobile_nav_walker(),
		);

		return wp_nav_menu( $menu_args );
	}
endif;
