<?php
/**
 * WooCommerce 兼容性 — 轻电商原则
 *
 * 原则：
 * - 主题管样式，Woo 管功能
 * - 不重写 Woo 模板文件
 * - 仅通过 CSS 覆盖确保视觉一致性
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 声明 WooCommerce 支持
 */
add_action( 'after_setup_theme', function () {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
} );

/**
 * 加载 WooCommerce 兼容样式
 * 仅在 WooCommerce 页面加载
 */
add_action( 'wp_enqueue_scripts', function () {
	// 仅在 Woo 相关页面加载
	if ( ! function_exists( 'is_woocommerce' ) || ! ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
		return;
	}

	$ver = wp_get_theme()->get( 'Version' );
	wp_enqueue_style(
		'cclee-woocommerce',
		get_template_directory_uri() . '/assets/css/woocommerce.css',
		[ 'cclee-custom' ],
		$ver
	);
} );

/**
 * 移除 WooCommerce 默认样式，减少冲突
 * 保留必要的结构性样式
 */
add_filter( 'woocommerce_enqueue_styles', function ( $styles ) {
	// 保留 general 样式（布局必需），移除其他可选样式
	if ( isset( $styles['woocommerce-general'] ) ) {
		$styles['woocommerce-general']['src'] = '';
	}
	return $styles;
} );

/**
 * 移除 WooCommerce 默认包装器
 * FSE 模板已提供 <main> 等包装结构，保留 WooCommerce 默认 wrapper 会导致 <main> 嵌套
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * 移除 WooCommerce 默认 Related Products 输出
 * FSE 模板通过 wp:woocommerce/related-products 块独立渲染，避免重复
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * 渲染 wp:woocommerce/related-products 块
 * FSE 模板中该块不自动输出，通过 render_block 回调补上
 */
add_filter( 'render_block', function ( $content, $block ) {
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
		[
			'columns'  => $columns,
			'posts_per_page' => $limit,
		]
	);
	$output = ob_get_clean();

	// 移除 WooCommerce 默认的 h2 标题（模板已有自定义标题），仅移除第一个
	$output = preg_replace( '#<h2[^>]*>.*?</h2>#s', '', $output, 1 );

	return $output;
}, 10, 2 );

/**
 * B2B 文字替换：Shop → Products
 *
 * 这只是 UX 文字优化，让企业站点更专业。
 * 不修改 WooCommerce 功能，用户可通过子主题移除此 filter：
 *   remove_filter( 'gettext', [已注册的回调], 10 );
 *   remove_filter( 'woocommerce_page_title', [已注册的回调], 10 );
 */
add_filter( 'gettext', function ( $translated, $text, $domain ) {
	// 仅处理 WooCommerce 文字
	if ( 'woocommerce' !== $domain ) {
		return $translated;
	}

	// 替换映射表
	$replacements = [
		'Shop'          => 'Products',
		'shop'          => 'products',
		'SHOP'          => 'PRODUCTS',
		'Return to shop' => 'Return to products',
		'Back to shop'  => 'Back to products',
	];

	return $replacements[ $text ] ?? $translated;
}, 10, 3 );

/**
 * 修改产品归档页标题
 */
add_filter( 'woocommerce_page_title', function ( $page_title ) {
	if ( 'Shop' === $page_title ) {
		return 'Products';
	}
	return $page_title;
} );

/**
 * 隐藏 WooCommerce.com 登录提示
 * 本地开发不需要连接 WooCommerce 账号
 */
add_filter( 'woocommerce_helper_suppress_admin_notice', '__return_true' );

/**
 * 产品列表卡片增强：Sale 标签 + Hover 第二张图
 *
 * 在非单品页的 featured image 后追加：
 * 1. Sale badge（仅促销商品）
 * 2. 第二张 gallery 图（hover 切换用）
 *
 * @param string $html  The rendered block HTML.
 * @param array  $block The parsed block data.
 * @return string
 */
add_filter( 'render_block_core/post-featured-image', function ( $html, $block ) {
	// 仅在非单品页生效
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

	// Sale badge
	if ( $product->is_on_sale() ) {
		$extras .= sprintf(
			'<span class="cclee-sale-badge">%s</span>',
			esc_html__( 'Sale', 'cclee-theme' )
		);
	}

	// Hover image (second gallery image)
	$gallery_ids = $product->get_gallery_image_ids();
	if ( ! empty( $gallery_ids ) ) {
		$extras .= wp_get_attachment_image(
			$gallery_ids[0],
			'woocommerce_thumbnail',
			false,
			[
				'class'   => 'cclee-hover-image',
				'loading' => 'lazy',
			]
		);
	}

	return $html . $extras;
}, 10, 2 );

/**
 * 产品无特色图片时，输出 WooCommerce 占位图
 *
 * FSE 的 post-featured-image 块在无图时渲染为空，
 * 导致卡片高度塌陷。此 filter 在 product 类型中补上占位图。
 *
 * @param string $html  The post thumbnail HTML.
 * @param int    $post_id The post ID.
 * @return string
 */
add_filter( 'post_thumbnail_html', function ( $html, $post_id ) {
	if ( $html || get_post_type( $post_id ) !== 'product' ) {
		return $html;
	}

	// WooCommerce placeholder — 依赖 wc_placeholder_img_src
	$src = function_exists( 'wc_placeholder_img_src' ) ? wc_placeholder_img_src() : '';
	if ( ! $src ) {
		return '';
	}

	return sprintf(
		'<img src="%s" alt="%s" loading="lazy" decoding="async" style="width:100%%;height:100%%;object-fit:cover;">',
		esc_url( $src ),
		esc_attr( get_the_title( $post_id ) )
	);
}, 10, 2 );

/**
 * Quantity stepper JS — +/- buttons for single product page
 *
 * Uses CSS pseudo-elements (::before/::after) for the visual buttons,
 * this script wires up click events to increment/decrement the input.
 */
add_action( 'wp_footer', function () {
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
} );
