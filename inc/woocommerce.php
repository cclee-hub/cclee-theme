<?php
/**
 * WooCommerce compatibility — lightweight e-commerce approach.
 *
 * Principles:
 * - Theme handles styling, WooCommerce handles functionality.
 * - No WooCommerce template file overrides.
 * - Visual consistency via CSS only.
 *
 * @package cclee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Declare WooCommerce support.
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
);

/**
 * Load WooCommerce compatibility styles.
 * Only loaded on WooCommerce-related pages.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		// Remove optional styles (keep general styles). Preserved.
		if ( ! function_exists( 'is_woocommerce' ) || ! ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
			return;
		}

		$theme_ver = wp_get_theme()->get( 'Version' );
		$woo_ver   = $theme_ver . '.' . filemtime( get_template_directory() . '/assets/css/woocommerce.css' );
		wp_enqueue_style(
			'cclee-woocommerce',
			get_template_directory_uri() . '/assets/css/woocommerce.css',
			array( 'cclee-custom' ),
			$woo_ver
		);
	}
);

/**
 * Remove WooCommerce default styles to reduce conflicts.
 * Essential structural styles are preserved.
 */
add_filter(
	'woocommerce_enqueue_styles',
	function ( $styles ) {
		// Keep general styles (required for layout), remove optional styles.
		if ( isset( $styles['woocommerce-general'] ) ) {
			$styles['woocommerce-general']['src'] = '';
		}
		return $styles;
	}
);

/**
 * Remove WooCommerce default wrappers.
 * FSE templates already provide <main> and other wrappers.
 * Keeping WooCommerce wrappers would cause nested <main> elements.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Remove WooCommerce default Related Products output.
 * FSE templates render related products via the wp:woocommerce/related-products block to avoid duplication.
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Render the wp:woocommerce/related-products block.
 * The block does not auto-output in FSE templates; this render_block callback provides the output.
 */
add_filter(
	'render_block',
	function ( $content, $block ) {
		if ( 'woocommerce/related-products' !== $block['blockName'] ) {
			return $content;
		}

		if ( ! is_singular( 'product' ) ) {
			return $content;
		}

		$columns = $block['attrs']['columns'] ?? 4;
		$limit   = $block['attrs']['limit'] ?? 4;

		ob_start();
		woocommerce_related_products(
			array(
				'columns'        => $columns,
				'posts_per_page' => $limit,
			)
		);
		$output = ob_get_clean();

		// Remove WooCommerce default h2 heading (template has custom heading). First match only.
		$output = preg_replace( '#<h2[^>]*>.*?</h2>#s', '', $output, 1 );

		return $output;
	},
	10,
	2
);

/**
 * B2B text replacement: Shop → Products.
 *
 * UX text optimization for business-oriented sites.
 * Does not modify WooCommerce functionality.
 * Users can remove this filter in a child theme:
 *   remove_filter( 'gettext', [registered callback], 10 );
 *   remove_filter( 'woocommerce_page_title', [registered callback], 10 );
 */
add_filter(
	'gettext',
	function ( $translated, $text, $domain ) {
		// Only process WooCommerce text.
		if ( 'woocommerce' !== $domain ) {
			return $translated;
		}

		// Replacement mapping.
		$replacements = array(
			'Shop'           => 'Products',
			'shop'           => 'products',
			'SHOP'           => 'PRODUCTS',
			'Return to shop' => 'Return to products',
			'Back to shop'   => 'Back to products',
		);

		return $replacements[ $text ] ?? $translated;
	},
	10,
	3
);

/**
 * Modify product archive page title.
 */
add_filter(
	'woocommerce_page_title',
	function ( $page_title ) {
		if ( 'Shop' === $page_title ) {
			return 'Products';
		}
		return $page_title;
	}
);

/**
 * Suppress WooCommerce.com connection notice.
 * Not needed for local development or production sites without a WC account.
 */
add_filter( 'woocommerce_helper_suppress_admin_notice', '__return_true' );

/**
 * Product card enhancements: Sale badge + hover second image.
 *
 * Appends after the featured image on non-single product pages:
 * 1. Sale badge (sale items only)
 * 2. Second gallery image (for hover swap)
 *
 * @param string $html  The rendered block HTML.
 * @param array  $block The parsed block data.
 * @return string
 */
add_filter(
	'render_block_core/post-featured-image',
	function ( $html, $block ) {
		// Only apply on non-single product pages.
		if ( is_singular( 'product' ) ) {
			return $html;
		}

		$post_id = get_the_ID();
		if ( ! $post_id || get_post_type( $post_id ) !== 'product' ) {
			return $html;
		}

		$product = wc_get_product( $post_id );
		if ( ! $product ) {
			return $html;
		}

		$extras = '';

		// Sale badge.
		if ( $product->is_on_sale() ) {
			$extras .= sprintf(
				'<span class="cclee-sale-badge">%s</span>',
				esc_html__( 'Sale', 'cclee' )
			);
		}

		return $html . $extras;
	},
	10,
	2
);

/**
 * Output WooCommerce placeholder image when a product has no featured image.
 *
 * The FSE post-featured-image block renders empty when no image is set,
 * causing card height collapse. This filter adds a placeholder for products.
 *
 * @param string $html  The post thumbnail HTML.
 * @param int    $post_id The post ID.
 * @return string
 */
add_filter(
	'post_thumbnail_html',
	function ( $html, $post_id ) {
		if ( $html || get_post_type( $post_id ) !== 'product' ) {
			return $html;
		}

		// WooCommerce placeholder -- relies on wc_placeholder_img_src.
		$src = function_exists( 'wc_placeholder_img_src' ) ? wc_placeholder_img_src() : '';
		if ( ! $src ) {
			return '';
		}

		return sprintf(
			'<img src="%s" alt="%s" loading="lazy" decoding="async" style="width:100%%;height:100%%;object-fit:cover;">',
			esc_url( $src ),
			esc_attr( get_the_title( $post_id ) )
		);
	},
	10,
	2
);

/**
 * Dynamic product-categories-woo pattern.
 *
 * The pattern file in patterns/ provides static placeholder markup so it
 * registers correctly at theme load. This render_block callback replaces
 * the entire columns + buttons section with dynamically queried terms.
 */
add_filter(
	'render_block',
	function ( $content, $block ) {
		static $replaced = false;

		if ( $replaced || 'core/pattern' !== $block['blockName'] ) {
			return $content;
		}

		if ( ( $block['attrs']['slug'] ?? '' ) !== 'cclee/product-categories-woo' ) {
			return $content;
		}

		$replaced = true;

		$terms = get_terms( array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
			'exclude'    => absint( get_option( 'default_product_cat', 0 ) ),
			'number'     => 6,
			'orderby'    => 'menu_order',
		) );

		if ( is_wp_error( $terms ) || empty( $terms ) ) {
			return '';
		}

		$rows = '';
		$chunks = array_chunk( $terms, 3 );
		foreach ( $chunks as $chunk ) {
			$row_cards = '';
			foreach ( $chunk as $term ) {
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$term_link    = get_term_link( $term );

				$image_html = $thumbnail_id
					? wp_get_attachment_image( absint( $thumbnail_id ), 'medium', false, array(
						'style' => 'border-top-left-radius:var(--wp--custom--border--radius--md);border-top-right-radius:var(--wp--custom--border--radius--md);border-bottom-left-radius:0;border-bottom-right-radius:0',
					) )
					: '<div class="cclee-category-placeholder" style="border-top-left-radius:var(--wp--custom--border--radius--md);border-top-right-radius:var(--wp--custom--border--radius--md)"></div>';

				$desc_html = $term->description
					? sprintf(
						'<p class="has-neutral-500-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20)">%s</p>',
						esc_html( $term->description )
					)
					: '';

				$row_cards .= sprintf(
					'<div class="wp-block-column" style="flex-basis:33.33%%">
						<a href="%s" class="wp-block-group is-style-product-card cclee-hover-lift has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;display:block;text-decoration:none;color:inherit">
							%s
							<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
								<h3 class="wp-block-heading has-primary-color has-text-color has-heading-4-font-size" style="margin-bottom:var(--wp--preset--spacing--20)">%s</h3>
								%s
							</div>
						</a>
					</div>',
					esc_url( $term_link ),
					$image_html,
					esc_html( $term->name ),
					$desc_html
				);
			}
			$rows .= '<div class="wp-block-columns is-style-equal-height">' . $row_cards . '</div>';
		}

		$shop_url = function_exists( 'wc_get_page_permalink' )
			? esc_url( wc_get_page_permalink( 'shop' ) )
			: esc_url( get_permalink( wc_get_page_id( 'shop' ) ) );

		return sprintf(
			'<div class="wp-block-group alignfull has-global-padding is-layout-constrained wp-block-group-is-layout-constrained" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
				<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-2-font-size">%s</h2>
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60)">%s</p>
				%s
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
					<div class="wp-block-button"><a href="%s" class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:var(--wp--custom--border--radius--md)">%s</a></div>
				</div>
			</div>',
			esc_html__( 'Product Categories', 'cclee' ),
			esc_html__( 'Explore our full range of products and solutions.', 'cclee' ),
			$rows,
			$shop_url,
			esc_html__( 'Browse All Products', 'cclee' )
		);
	},
	10,
	2
);

/**
 * Quantity stepper JS — +/- buttons for single product page
 *
 * Uses CSS pseudo-elements (::before/::after) for the visual buttons,
 * this script wires up click events to increment/decrement the input.
 */
add_action(
	'wp_footer',
	function () {
		if ( ! is_product() ) {
			return;
		}
		?>
<script>
(function(){
	document.addEventListener('click',function(e){
		var qtyWrap=e.target.closest&&e.target.closest('.quantity');
		if(!qtyWrap)return;
		var input=qtyWrap.querySelector('.qty');
		if(!input)return;
		var min=parseFloat(input.min)||0,max=parseFloat(input.max)||Infinity,step=parseFloat(input.step)||1,val=parseFloat(input.value)||0;
		var rect=qtyWrap.getBoundingClientRect();
		var x=e.clientX-rect.left;
		if(x<40){
			val=Math.max(min,val-step);
		}else if(x>rect.width-40){
			val=Math.min(max,val+step);
		}else{return;}
		input.value=val;
		input.dispatchEvent(new Event('change',{bubbles:true}));
	});
})();
</script>
		<?php
	}
);
