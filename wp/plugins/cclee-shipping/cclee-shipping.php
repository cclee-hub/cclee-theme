<?php
/**
 * Plugin Name: CCLEE Shipping
 * Plugin URI: https://github.com/cclee-hub/cclee-shipping
 * Description: Multi-carrier shipping for WooCommerce. FedEx real-time rates + address validation.
 * Version: 1.0.0
 * Requires at least: 6.4
 * Requires PHP: 8.0
 * Author: CCLEE
 * Author URI: https://github.com/cclee-hub
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cclee-shipping
 * WC requires at least: 8.0
 * WC tested up to: 10.6
 *
 * @package CCLEE_Shipping
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CCLEE_SHIPPING_VERSION', '1.0.0' );
define( 'CCLEE_SHIPPING_PATH', plugin_dir_path( __FILE__ ) );
define( 'CCLEE_SHIPPING_URL', plugin_dir_url( __FILE__ ) );

add_action( 'woocommerce_shipping_init', 'cclee_shipping_init' );

/**
 * Initialize shipping method classes.
 */
function cclee_shipping_init(): void {
	require_once CCLEE_SHIPPING_PATH . 'includes/class-carrier-abstract.php';
	require_once CCLEE_SHIPPING_PATH . 'includes/class-package.php';
	require_once CCLEE_SHIPPING_PATH . 'includes/class-rate-modifier.php';
	require_once CCLEE_SHIPPING_PATH . 'includes/class-fedex-carrier.php';
	require_once CCLEE_SHIPPING_PATH . 'includes/class-address-validator.php';
}

add_filter( 'woocommerce_shipping_methods', 'cclee_shipping_register_methods' );

/**
 * Register carrier shipping methods with WooCommerce.
 *
 * @param array<string, string> $methods Method ID => class name.
 * @return array<string, string>
 */
function cclee_shipping_register_methods( array $methods ): array {
	$methods['cclee_shipping_fedex'] = 'CCLEE_Shipping_FedEx_Method';
	return $methods;
}

// Address validation AJAX endpoint.
add_action( 'wp_ajax_cclee_shipping_validate_address', array( 'CCLEE_Shipping_Address_Validator', 'ajax_validate' ) );
add_action( 'wp_ajax_nopriv_cclee_shipping_validate_address', array( 'CCLEE_Shipping_Address_Validator', 'ajax_validate' ) );

// Frontend assets.
add_action( 'wp_enqueue_scripts', 'cclee_shipping_enqueue_assets' );

/**
 * Enqueue checkout assets.
 */
function cclee_shipping_enqueue_assets(): void {
	if ( ! is_checkout() ) {
		return;
	}
	wp_enqueue_script(
		'cclee-shipping-checkout',
		CCLEE_SHIPPING_URL . 'assets/js/checkout.js',
		array(),
		CCLEE_SHIPPING_VERSION,
		true
	);
	wp_localize_script( 'cclee-shipping-checkout', 'ccleeShipping', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'cclee_shipping_validate' ),
	) );
}
