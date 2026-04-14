<?php
/**
 * Theme setup and configuration.
 *
 * @package cclee
 */

add_action(
	'after_setup_theme',
	function () {
		load_theme_textdomain( 'cclee', get_template_directory() . '/languages' );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );

		// Default logo fallback when user hasn't set one.
		add_filter(
			'render_block_core/site-logo',
			function ( $block_content ) {
				if ( empty( $block_content ) && ! get_theme_mod( 'custom_logo' ) ) {
					$logo_url = get_template_directory_uri() . '/assets/images/logo.png';
					$block_content = sprintf(
						'<a href="%s" class="wp-block-site-logo__link" rel="home"><img src="%s" alt="%s" class="custom-logo" /></a>',
						esc_url( home_url( '/' ) ),
						esc_url( $logo_url ),
						esc_attr( get_bloginfo( 'name' ) )
					);
				}
				return $block_content;
			}
		);

		// Load editor styles for front-end/back-end consistency.
		add_editor_style( 'assets/css/global.css' );

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'cclee' ),
				'footer'  => __( 'Footer Menu', 'cclee' ),
			)
		);
	}
);

/**
 * Output placeholder image when a blog post has no featured image.
 *
 * The FSE post-featured-image block renders empty when no image is set,
 * causing card height collapse in archive layouts.
 *
 * @param string $html     The post thumbnail HTML.
 * @param int    $post_id  The post ID.
 * @return string
 */
add_filter(
	'post_thumbnail_html',
	function ( $html, $post_id ) {
		if ( $html || get_post_type( $post_id ) !== 'post' ) {
			return $html;
		}

		$dir = get_template_directory();
		$uri = get_template_directory_uri();
		$webp = $dir . '/assets/images/placeholder-blog.webp';
		$src  = file_exists( $webp )
			? $uri . '/assets/images/placeholder-blog.webp'
			: $uri . '/assets/images/placeholder-blog.jpg';
		return sprintf(
			'<img src="%s" alt="%s" loading="lazy" decoding="async" style="width:100%%;height:100%%;object-fit:cover;">',
			esc_url( $src ),
			esc_attr( get_the_title( $post_id ) )
		);
	},
	10,
	2
);

add_action(
	'wp_enqueue_scripts',
	function () {
		$theme_ver = wp_get_theme()->get( 'Version' );
		$css_ver   = $theme_ver . '.' . filemtime( get_template_directory() . '/assets/css/components.css' );
		$js_ver    = $theme_ver . '.' . filemtime( get_template_directory() . '/assets/js/theme.js' );
		wp_enqueue_style(
			'cclee-global',
			get_template_directory_uri() . '/assets/css/global.css',
			array(),
			$css_ver
		);
		wp_enqueue_style(
			'cclee-components',
			get_template_directory_uri() . '/assets/css/components.css',
			array( 'cclee-global' ),
			$css_ver
		);
		wp_enqueue_style(
			'cclee-utilities',
			get_template_directory_uri() . '/assets/css/utilities.css',
			array( 'cclee-components' ),
			$css_ver
		);
		wp_enqueue_style(
			'cclee-woocommerce',
			get_template_directory_uri() . '/assets/css/woocommerce.css',
			array( 'cclee-utilities' ),
			$css_ver
		);
		wp_enqueue_script(
			'cclee',
			get_template_directory_uri() . '/assets/js/theme.js',
			array(),
			$js_ver,
			true
		);
		wp_localize_script(
			'cclee',
			'ccleeTheme',
			array(
				'restUrl' => esc_url_raw( rest_url() ),
			)
		);
	}
);

add_action(
	'wp_footer',
	function () {
		/**
		 * Fires to render the floating widget in the footer.
		 *
		 * @since 1.0.0
		 */
		do_action( 'cclee_float_widget' );
	},
	99
);

/**
 * Render mobile bottom navigation in footer.
 * Styles are defined in assets/css/global.css (base), assets/css/components.css (components), and assets/css/woocommerce.css.
 */
add_action(
	'wp_footer',
	function () {
		// Only display when WooCommerce is active.
		if ( ! function_exists( 'WC' ) ) {
			return;
		}

		// Get cart item count.
		$cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
		?>
	<nav class="cclee-mobile-bottom-nav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'cclee' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cclee-mobile-bottom-nav__item" aria-label="<?php esc_attr_e( 'Home', 'cclee' ); ?>">
			<?php echo cclee_svg( 'home' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span><?php esc_html_e( 'Home', 'cclee' ); ?></span>
		</a>
		<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="cclee-mobile-bottom-nav__item" aria-label="<?php esc_attr_e( 'Shop', 'cclee' ); ?>">
			<?php echo cclee_svg( 'shopping-cart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span><?php esc_html_e( 'Shop', 'cclee' ); ?></span>
		</a>
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cclee-mobile-bottom-nav__item cclee-mobile-bottom-nav__item--cart" aria-label="<?php esc_attr_e( 'Cart', 'cclee' ); ?>">
			<?php echo cclee_svg( 'shopping-cart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span><?php esc_html_e( 'Cart', 'cclee' ); ?></span>
			<span class="cclee-mobile-bottom-nav__cart-count" aria-hidden="true"><?php echo absint( $cart_count ); ?></span>
		</a>
		<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="cclee-mobile-bottom-nav__item" aria-label="<?php esc_attr_e( 'Account', 'cclee' ); ?>">
			<?php echo cclee_svg( 'user' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span><?php esc_html_e( 'Account', 'cclee' ); ?></span>
		</a>
	</nav>
		<?php
	},
	98
);

/**
 * Output inline SVG from bundled theme assets.
 *
 * @param string $name Icon filename without .svg extension. Only a-z 0-9 - . allowed.
 * @return string SVG markup or empty string.
 * @phpcsSuppress WordPress.Security.EscapeOutput.OutputNotEscaped
 */
function cclee_svg( $name ) {
	$name = sanitize_key( $name );
	if ( ! $name ) {
		return '';
	}

	static $cache = array();
	if ( isset( $cache[ $name ] ) ) {
		return $cache[ $name ];
	}

	$path = get_theme_file_path( 'assets/icons/' . $name . '.svg' );
	if ( ! file_exists( $path ) ) {
		$cache[ $name ] = '';
		return '';
	}

	$filesystem = cclee_get_filesystem();
	$svg        = '';
	if ( $filesystem ) {
		$svg = $filesystem->get_contents( $path );
	}
	// Fallback when WP_Filesystem uses a non-local adapter (e.g. ftpsockets).
	if ( ! $svg && is_readable( $path ) ) {
		$svg = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	}
	// Remove XML declaration if present.
	$svg = preg_replace( '/<\?xml[^?]*\?>\s*/', '', $svg );
	// Hide decorative icons from screen readers.
	$svg = str_replace( '<svg ', '<svg aria-hidden="true" ', $svg );

	$allowed = array(
		'svg'      => array(
			'class'           => true,
			'aria-hidden'     => true,
			'viewbox'         => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'fill'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
			'stroke-linecap'  => true,
			'stroke-linejoin' => true,
		),
		'path'     => array(
			'd'              => true,
			'fill'           => true,
			'fill-rule'      => true,
			'clip-rule'      => true,
			'stroke'         => true,
			'stroke-width'   => true,
			'stroke-linecap' => true,
		),
		'circle'   => array(
			'cx'   => true,
			'cy'   => true,
			'r'    => true,
			'fill' => true,
		),
		'rect'     => array(
			'x'      => true,
			'y'      => true,
			'width'  => true,
			'height' => true,
			'rx'     => true,
			'fill'   => true,
		),
		'g'        => array(
			'fill'         => true,
			'stroke'       => true,
			'stroke-width' => true,
			'transform'    => true,
		),
		'line'     => array(
			'x1'     => true,
			'y1'     => true,
			'x2'     => true,
			'y2'     => true,
			'stroke' => true,
		),
		'polyline' => array(
			'points' => true,
			'fill'   => true,
			'stroke' => true,
		),
		'polygon'  => array(
			'points' => true,
			'fill'   => true,
		),
		'defs'     => array(),
		'use'      => array(
			'href'       => true,
			'xlink:href' => true,
		),
	);

	$svg = wp_kses( $svg, $allowed );

	$cache[ $name ] = $svg;
	return $svg;
}

/**
 * Get WP_Filesystem instance for local file operations.
 *
 * @return WP_Filesystem_Base|false
 */
function cclee_get_filesystem() {
	global $wp_filesystem;
	if ( ! $wp_filesystem ) {
		require_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();
	}
	return $wp_filesystem;
}

/**
 * Create default navigation menus on theme activation.
 */
add_action(
	'after_switch_theme',
	function () {
		// Check if navigation already exists.
		$existing = get_posts(
			array(
				'post_type'      => 'wp_navigation',
				'posts_per_page' => 1,
			)
		);

		if ( ! empty( $existing ) ) {
			return;
		}

		// Page slug mapping.
		$pages = array(
			'home'     => get_page_by_path( 'home' ),
			'about-us' => get_page_by_path( 'about-us' ),
			'products' => get_page_by_path( 'products' ),
			'blog'     => get_page_by_path( 'blog' ),
			'contact'  => get_page_by_path( 'contact' ),
		);

		// Build Primary navigation content.
		$primary_links = array();

		// Home - custom link.
		$primary_links[] = '<!-- wp:navigation-link {"label":"Home","url":"/","type":"custom"} /-->';

		// Other page links.
		foreach ( array( 'about-us', 'products', 'blog', 'contact' ) as $slug ) {
			if ( ! empty( $pages[ $slug ] ) ) {
				$page            = $pages[ $slug ];
				$primary_links[] = sprintf(
					'<!-- wp:navigation-link {"label":"%s","type":"page","id":%d,"kind":"post-type","url":"%s"} /-->',
					esc_attr( $page->post_title ),
					$page->ID,
					esc_url( get_permalink( $page->ID ) )
				);
			}
		}

		// Create Primary navigation.
		$primary_id = wp_insert_post(
			array(
				'post_title'   => 'Main Menu',
				'post_name'    => 'main-menu',
				'post_type'    => 'wp_navigation',
				'post_status'  => 'publish',
				'post_content' => implode( '', $primary_links ),
			)
		);

		// Build Footer navigation content.
		$footer_links = array();
		foreach ( array( 'about-us', 'contact', 'blog' ) as $slug ) {
			if ( ! empty( $pages[ $slug ] ) ) {
				$page           = $pages[ $slug ];
				$footer_links[] = sprintf(
					'<!-- wp:navigation-link {"label":"%s","type":"page","id":%d,"kind":"post-type","url":"%s"} /-->',
					esc_attr( $page->post_title ),
					$page->ID,
					esc_url( get_permalink( $page->ID ) )
				);
			}
		}

		// Create Footer navigation.
		$footer_id = wp_insert_post(
			array(
				'post_title'   => 'Footer Menu',
				'post_name'    => 'footer-menu',
				'post_type'    => 'wp_navigation',
				'post_status'  => 'publish',
				'post_content' => implode( '', $footer_links ),
			)
		);

		// Assign navigation to menu locations (critical).
		if ( $primary_id && $footer_id ) {
			set_theme_mod(
				'nav_menu_locations',
				array(
					'primary' => $primary_id,
					'footer'  => $footer_id,
				)
			);
		}
	}
);
