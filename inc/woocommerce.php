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
 * 调整 WooCommerce 包装器，使其与主题布局一致
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', function () {
	echo '<main class="wp-block-group" style="max-width:var(--wp--style--global--wide-size);margin-left:auto;margin-right:auto;padding:var(--wp--preset--spacing--50) var(--wp--preset--spacing--40);">';
}, 10 );

add_action( 'woocommerce_after_main_content', function () {
	echo '</main>';
}, 10 );

/**
 * B2B 文字替换：Shop → Products
 * 适用于企业级站点，更专业的命名
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
