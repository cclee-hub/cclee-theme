# cclee-shipping Implementation Plan

> **For Claude:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task.

**Goal:** Build a WooCommerce shipping plugin that integrates FedEx Rate + Address Validation APIs via WC Shipping Zones.

**Architecture:** Each carrier is a `WC_Shipping_Method` subclass. FedEx adapter handles OAuth token caching, real-time rate quotes, and async address validation. Adapter pattern allows future carriers (DHL/UPS/SF) with zero structural changes.

**Tech Stack:** PHP 8.0+, WooCommerce 10.x, WordPress 6.8+, FedEx REST API v1

**Design doc:** `docs/plans/2026-04-02-cclee-shipping-design.md`

**WC base class:** `WC_Shipping_Method` at `woocommerce/includes/abstracts/abstract-wc-shipping-method.php` (extends `WC_Settings_API`)
**Reference plugin:** `cclee-toolkit` at `wp-content/plugins/cclee-toolkit/cclee-toolkit.php`
**Plugin target:** `wp-content/plugins/cclee-shipping/`

---

### Task 1: Plugin Skeleton

Create entry point, uninstall, and i18n placeholder.

**Files:**
- Create: `wp-content/plugins/cclee-shipping/cclee-shipping.php`
- Create: `wp-content/plugins/cclee-shipping/uninstall.php`
- Create: `wp-content/plugins/cclee-shipping/languages/cclee-shipping.pot`

**Step 1: Create entry point**

```php
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
```

**Step 2: Create uninstall.php**

```php
<?php
/**
 * CCLEE Shipping Uninstall
 *
 * @package CCLEE_Shipping
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;
$wpdb->query(
	$wpdb->prepare(
		"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
		'_transient_cclee_shipping_%',
		'_transient_timeout_cclee_shipping_%'
	)
);
$wpdb->query(
	$wpdb->prepare(
		"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
		'woocommerce_cclee_shipping_%'
	)
);
```

**Step 3: Create .pot placeholder**

```
# CCLEE Shipping Translation Template
# Copyright (C) 2026 CCLEE
# This file is distributed under the GPLv2 or later.
#
#, fuzzy
msgid ""
msgstr ""
"Project-Id-Version: CCLEE Shipping 1.0.0\n"
"Report-Msgid-Bugs-To: \n"
"POT-Creation-Date: 2026-04-02 00:00+0000\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"PO-Revision-Date: 2026-MO-DA HO:MI+ZONE\n"
"Last-Translator: \n"
"Language-Team: \n"
```

**Step 4: Verify activation**

Run: `docker compose -f wp/docker-compose.yml exec -T wp_cli wp plugin activate cclee-shipping --allow-root`
Expected: Plugin activates, no PHP errors.

**Step 5: Commit**

```
feat(shipping): plugin skeleton with entry point, uninstall, i18n
```

---

### Task 2: Abstract Carrier

Shared base class with HTTP helper and logging.

**Files:**
- Create: `wp-content/plugins/cclee-shipping/includes/class-carrier-abstract.php`

**Step 1: Create abstract carrier**

```php
<?php
/**
 * Abstract carrier class.
 *
 * @package CCLEE_Shipping
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class CCLEE_Shipping_Carrier_Abstract {

	/**
	 * Get OAuth bearer token (cached in transient).
	 */
	abstract public function get_token(): string;

	/**
	 * Get shipping rates from carrier API.
	 *
	 * @param array $origin      Shipper address.
	 * @param array $destination Recipient address.
	 * @param array $packages    Package line items from cart.
	 * @return array<array{ id: string, label: string, cost: float, transit_days?: string }>
	 */
	abstract public function get_rates( array $origin, array $destination, array $packages ): array;

	/**
	 * Validate an address via carrier API.
	 *
	 * @param array $address Address components.
	 * @return array{ valid: bool, message: string, normalized?: array }
	 */
	abstract public function validate_address( array $address ): array;

	/**
	 * Log if debug mode is enabled.
	 *
	 * @param WC_Shipping_Method $method  Shipping method instance.
	 * @param string             $message Log message.
	 */
	protected function log( WC_Shipping_Method $method, string $message ): void {
		if ( 'yes' === $method->get_option( 'debug' ) ) {
			wc_get_logger()->info( $message, array( 'source' => 'cclee-shipping-' . $method->id ) );
		}
	}

	/**
	 * HTTP request wrapper.
	 *
	 * @param string $url  Request URL.
	 * @param array  $args wp_remote_request args.
	 * @return array{ status: int, body: array|null, error?: string }
	 */
	protected function remote_request( string $url, array $args ): array {
		$response = wp_remote_request( $url, $args );

		if ( is_wp_error( $response ) ) {
			return array(
				'status' => 0,
				'body'   => null,
				'error'  => $response->get_error_message(),
			);
		}

		return array(
			'status' => wp_remote_retrieve_response_code( $response ),
			'body'   => json_decode( wp_remote_retrieve_body( $response ), true ),
		);
	}
}
```

**Step 2: Commit**

```
feat(shipping): abstract carrier base class
```

---

### Task 3: Package Helper + Rate Modifier

Utility classes used by the FedEx carrier.

**Files:**
- Create: `wp-content/plugins/cclee-shipping/includes/class-package.php`
- Create: `wp-content/plugins/cclee-shipping/includes/class-rate-modifier.php`

**Step 1: Create package helper**

```php
<?php
/**
 * Package helper - converts cart items to FedEx package line items.
 *
 * @package CCLEE_Shipping
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CCLEE_Shipping_Package {

	/**
	 * Convert WooCommerce cart package to FedEx package line items.
	 *
	 * @param array $wc_package WooCommerce shipping package.
	 * @return array<array{ weight: float, value: float }>
	 */
	public static function from_cart( array $wc_package ): array {
		$total_w = 0.0;
		$total_v = 0.0;

		foreach ( $wc_package['contents'] ?? array() as $cart_item ) {
			$product = $cart_item['data'];
			if ( ! $product || ! $product->needs_shipping() ) {
				continue;
			}

			$qty     = (int) $cart_item['quantity'];
			$total_w += (float) $product->get_weight() * $qty;
			$total_v += (float) $product->get_price() * $qty;
		}

		// Convert to pounds if WC uses kg or g.
		$wc_unit = get_option( 'woocommerce_weight_unit', 'kg' );
		if ( 'kg' === $wc_unit ) {
			$total_w *= 2.20462;
		} elseif ( 'g' === $wc_unit ) {
			$total_w *= 0.00220462;
		}

		if ( $total_w <= 0 ) {
			$total_w = 1.0;
		}

		return array(
			array(
				'weight' => round( $total_w, 2 ),
				'value'  => round( $total_v, 2 ),
			),
		);
	}
}
```

**Step 2: Create rate modifier**

```php
<?php
/**
 * Rate modifier - applies markup to carrier rates.
 *
 * @package CCLEE_Shipping
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CCLEE_Shipping_Rate_Modifier {

	/**
	 * Apply rate modifier to a base cost.
	 *
	 * @param float  $base_cost Carrier rate.
	 * @param string $type      'fixed' or 'percentage'.
	 * @param float  $value     Modifier value.
	 * @return float
	 */
	public static function apply( float $base_cost, string $type, float $value ): float {
		if ( $value <= 0 ) {
			return $base_cost;
		}

		if ( 'percentage' === $type ) {
			return round( $base_cost * ( 1 + $value / 100 ), 2 );
		}

		return round( $base_cost + $value, 2 );
	}
}
```

**Step 3: Commit**

```
feat(shipping): package helper and rate modifier utilities
```

---

### Task 4: FedEx Carrier + WC Shipping Method

Core adapter: OAuth, Rate API, Address Validation, and the WC_Shipping_Method subclass with settings.

**Files:**
- Create: `wp-content/plugins/cclee-shipping/includes/class-fedex-carrier.php`

**Step 1: Create FedEx carrier and method**

```php
<?php
/**
 * FedEx shipping method and carrier adapter.
 *
 * @package CCLEE_Shipping
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CCLEE_Shipping_FedEx_Carrier extends CCLEE_Shipping_Carrier_Abstract {

	private string $api_key;
	private string $secret_key;
	private string $account_number;
	private string $environment;
	private CCLEE_Shipping_FedEx_Method $method;

	public function __construct( CCLEE_Shipping_FedEx_Method $method ) {
		$this->method         = $method;
		$this->api_key        = $method->get_option( 'api_key' );
		$this->secret_key     = $method->get_option( 'secret_key' );
		$this->account_number = $method->get_option( 'account_number' );
		$this->environment    = $method->get_option( 'environment' );
	}

	private function get_base_url(): string {
		return 'production' === $this->environment
			? 'https://apis.fedex.com'
			: 'https://apis-sandbox.fedex.com';
	}

	public function get_token(): string {
		$transient_key = 'cclee_shipping_fedex_token';
		$token         = get_transient( $transient_key );

		if ( false !== $token && is_string( $token ) ) {
			return $token;
		}

		$url  = $this->get_base_url() . '/oauth/token';
		$args = array(
			'method'  => 'POST',
			'headers' => array( 'Content-Type' => 'application/x-www-form-urlencoded' ),
			'body'    => http_build_query( array(
				'grant_type'    => 'client_credentials',
				'client_id'     => $this->api_key,
				'client_secret' => $this->secret_key,
			) ),
			'timeout' => 10,
		);

		$this->log( $this->method, 'FedEx OAuth: requesting new token' );
		$result = $this->remote_request( $url, $args );

		if ( 200 !== $result['status'] || empty( $result['body']['access_token'] ) ) {
			$this->log( $this->method, 'FedEx OAuth failed: ' . wp_json_encode( $result ) );
			return '';
		}

		$token = $result['body']['access_token'];
		$ttl   = max( absint( $result['body']['expires_in'] ?? 3600 ) - 60, 60 );
		set_transient( $transient_key, $token, $ttl );

		$this->log( $this->method, 'FedEx OAuth: token cached, TTL=' . $ttl );
		return $token;
	}

	public function get_rates( array $origin, array $destination, array $packages ): array {
		$token = $this->get_token();
		if ( empty( $token ) ) {
			return array();
		}

		$url     = $this->get_base_url() . '/rate/v1/rates/quotes';
		$payload = $this->build_rate_request( $origin, $destination, $packages );

		$this->log( $this->method, 'FedEx Rate request: ' . wp_json_encode( $payload ) );

		$args = array(
			'method'  => 'POST',
			'headers' => array(
				'Content-Type'  => 'application/json',
				'Authorization' => 'Bearer ' . $token,
				'X-locale'      => 'en_US',
			),
			'body'    => wp_json_encode( $payload ),
			'timeout' => 15,
		);

		$result = $this->remote_request( $url, $args );

		if ( 200 !== $result['status'] || empty( $result['body']['output']['rateReplyDetails'] ) ) {
			$this->log( $this->method, 'FedEx Rate failed: ' . wp_json_encode( $result ) );
			return array();
		}

		return $this->parse_rate_response( $result['body']['output']['rateReplyDetails'] );
	}

	private function build_rate_request( array $origin, array $destination, array $packages ): array {
		$is_international = strtoupper( $origin['country'] ) !== strtoupper( $destination['country'] );

		$request = array(
			'accountNumber' => array( 'value' => $this->account_number ),
			'requestedShipment' => array(
				'shipper'    => array( 'address' => $this->format_address( $origin ) ),
				'recipient'  => array( 'address' => $this->format_address( $destination ) ),
				'pickupType' => 'DROPOFF_AT_FEDEX_LOCATION',
				'rateRequestType' => array( 'ACCOUNT', 'LIST' ),
				'packagingType'   => $this->method->get_option( 'package_type', 'YOUR_PACKAGING' ),
				'totalWeight'     => $this->calculate_total_weight( $packages ),
				'totalPackageCount' => count( $packages ),
				'requestedPackageLineItems' => $this->format_packages( $packages ),
			),
		);

		if ( $is_international ) {
			$request['requestedShipment']['customsClearanceDetail'] = array(
				'dutiesPayment' => array( 'paymentType' => 'SENDER' ),
				'commodities'   => array(
					array(
						'description'         => __( 'Merchandise', 'cclee-shipping' ),
						'countryOfManufacture' => $origin['country'],
						'quantity'            => 1,
						'quantityUnits'       => 'PCS',
						'weight'              => array(
							'units' => 'LB',
							'value' => $this->calculate_total_weight( $packages ),
						),
						'customsValue'        => array(
							'amount'   => $this->calculate_total_value( $packages ),
							'currency' => get_woocommerce_currency(),
						),
					),
				),
			);
		}

		return $request;
	}

	private function format_address( array $addr ): array {
		$address = array( 'countryCode' => strtoupper( $addr['country'] ?? '' ) );
		if ( ! empty( $addr['postcode'] ) ) {
			$address['postalCode'] = $addr['postcode'];
		}
		if ( ! empty( $addr['state'] ) ) {
			$address['stateOrProvinceCode'] = $addr['state'];
		}
		if ( ! empty( $addr['city'] ) ) {
			$address['city'] = $addr['city'];
		}
		if ( ! empty( $addr['address'] ) ) {
			$address['streetLines'] = array( $addr['address'] );
		}
		return $address;
	}

	private function format_packages( array $packages ): array {
		$items = array();
		foreach ( $packages as $package ) {
			$items[] = array(
				'weight' => array( 'units' => 'LB', 'value' => $package['weight'] ),
			);
		}
		if ( empty( $items ) ) {
			$items[] = array( 'weight' => array( 'units' => 'LB', 'value' => 1.0 ) );
		}
		return $items;
	}

	private function calculate_total_weight( array $packages ): float {
		return (float) array_sum( array_column( $packages, 'weight' ) ) ?: 1.0;
	}

	private function calculate_total_value( array $packages ): float {
		return (float) array_sum( array_column( $packages, 'value' ) ) ?: 1.0;
	}

	private function parse_rate_response( array $reply_details ): array {
		$rates   = array();
		$enabled = $this->get_enabled_services();

		foreach ( $reply_details as $detail ) {
			$service_type = $detail['serviceType'] ?? '';
			$service_name = $detail['serviceName'] ?? $service_type;

			if ( ! empty( $enabled ) && ! in_array( $service_type, $enabled, true ) ) {
				continue;
			}

			$cost = 0.0;
			foreach ( $detail['ratedShipmentDetails'] ?? array() as $rated ) {
				if ( 'ACCOUNT' === ( $rated['rateType'] ?? '' ) ) {
					$cost = (float) ( $rated['totalNetCharge'] ?? 0 );
					break;
				}
				if ( 'LIST' === ( $rated['rateType'] ?? '' ) ) {
					$cost = (float) ( $rated['totalNetCharge'] ?? 0 );
				}
			}

			$transit = $detail['commit']['transitDays']['description'] ?? '';

			$rates[] = array(
				'id'           => $this->method->id . ':' . $service_type,
				'label'        => $service_name . ( $transit ? ' (' . $transit . ')' : '' ),
				'cost'         => $cost,
				'transit_days' => $transit,
			);
		}

		return $rates;
	}

	private function get_enabled_services(): array {
		$services = $this->method->get_option( 'services' );
		if ( empty( $services ) ) {
			return array();
		}
		if ( is_string( $services ) ) {
			$services = explode( ',', $services );
		}
		return array_filter( (array) $services );
	}

	public function validate_address( array $address ): array {
		$token = $this->get_token();
		if ( empty( $token ) ) {
			return array( 'valid' => false, 'message' => __( 'Unable to authenticate with FedEx.', 'cclee-shipping' ) );
		}

		$url  = $this->get_base_url() . '/address/v1/addresses/resolve';
		$body = array(
			'addressesToValidate' => array(
				array(
					'address' => array(
						'streetLines'         => array( $address['address_1'] ?? '' ),
						'city'                => $address['city'] ?? '',
						'stateOrProvinceCode' => $address['state'] ?? '',
						'postalCode'          => $address['postcode'] ?? '',
						'countryCode'         => strtoupper( $address['country'] ?? '' ),
					),
				),
			),
		);

		$args = array(
			'method'  => 'POST',
			'headers' => array(
				'Content-Type'  => 'application/json',
				'Authorization' => 'Bearer ' . $token,
				'X-locale'      => 'en_US',
			),
			'body'    => wp_json_encode( $body ),
			'timeout' => 10,
		);

		$this->log( $this->method, 'FedEx Address Validation request' );
		$result = $this->remote_request( $url, $args );

		if ( 200 !== $result['status'] || empty( $result['body']['output']['resolvedAddresses'] ) ) {
			$this->log( $this->method, 'FedEx Address Validation failed: ' . wp_json_encode( $result ) );
			return array( 'valid' => false, 'message' => __( 'Address validation unavailable.', 'cclee-shipping' ) );
		}

		$resolved = $result['body']['output']['resolvedAddresses'][0];
		$messages = $resolved['customerMessage'] ?? array();
		$is_valid = empty( $messages );

		$normalized = array();
		if ( ! empty( $resolved['streetLinesToken'][0] ) ) {
			$normalized['address_1'] = $resolved['streetLinesToken'][0];
		}
		if ( ! empty( $resolved['city'] ) ) {
			$normalized['city'] = $resolved['city'];
		}
		if ( ! empty( $resolved['stateOrProvinceCode'] ) ) {
			$normalized['state'] = $resolved['stateOrProvinceCode'];
		}
		if ( ! empty( $resolved['postalCode'] ) ) {
			$normalized['postcode'] = $resolved['postalCode'];
		}

		return array(
			'valid'      => $is_valid,
			'message'    => $is_valid ? '' : implode( '; ', $messages ),
			'normalized' => $normalized,
		);
	}
}

/**
 * FedEx WooCommerce Shipping Method.
 */
class CCLEE_Shipping_FedEx_Method extends WC_Shipping_Method {

	private const SERVICES = array(
		'FEDEX_INTERNATIONAL_PRIORITY' => 'FedEx International Priority',
		'FEDEX_INTERNATIONAL_ECONOMY'  => 'FedEx International Economy',
		'FEDEX_GROUND'                 => 'FedEx Ground',
	);

	public function __construct( $instance_id = 0 ) {
		parent::__construct( $instance_id );

		$this->id                 = 'cclee_shipping_fedex';
		$this->method_title       = __( 'FedEx (CCLEE Shipping)', 'cclee-shipping' );
		$this->method_description = __( 'FedEx real-time shipping rates via API.', 'cclee-shipping' );
		$this->supports           = array(
			'shipping-zones',
			'instance-settings',
			'instance-settings-modal',
		);

		$this->init();
	}

	public function init(): void {
		$this->instance_form_fields = $this->get_settings_fields();
		$this->title                = $this->get_option( 'title', 'FedEx' );
	}

	private function get_settings_fields(): array {
		$services = array();
		foreach ( self::SERVICES as $key => $label ) {
			$services[ $key ] = $label;
		}

		return array(
			'title' => array(
				'title'   => __( 'Method Title', 'cclee-shipping' ),
				'type'    => 'text',
				'default' => 'FedEx',
			),
			'api_key' => array(
				'title'       => __( 'API Key (Client ID)', 'cclee-shipping' ),
				'type'        => 'text',
				'description' => __( 'FedEx Developer Portal API Key.', 'cclee-shipping' ),
				'desc_tip'    => true,
			),
			'secret_key' => array(
				'title'       => __( 'Secret Key (Client Secret)', 'cclee-shipping' ),
				'type'        => 'password',
				'description' => __( 'FedEx Developer Portal Secret Key.', 'cclee-shipping' ),
				'desc_tip'    => true,
			),
			'account_number' => array(
				'title'       => __( 'Account Number', 'cclee-shipping' ),
				'type'        => 'text',
				'description' => __( 'FedEx account number.', 'cclee-shipping' ),
				'desc_tip'    => true,
			),
			'environment' => array(
				'title'   => __( 'Environment', 'cclee-shipping' ),
				'type'    => 'select',
				'default' => 'sandbox',
				'options' => array(
					'sandbox'    => __( 'Sandbox', 'cclee-shipping' ),
					'production' => __( 'Production', 'cclee-shipping' ),
				),
			),
			'services' => array(
				'title'   => __( 'Enabled Services', 'cclee-shipping' ),
				'type'    => 'multiselect',
				'class'   => 'wc-enhanced-select',
				'default' => array( 'FEDEX_INTERNATIONAL_PRIORITY', 'FEDEX_INTERNATIONAL_ECONOMY' ),
				'options' => $services,
			),
			'rate_modifier_type' => array(
				'title'   => __( 'Rate Modifier Type', 'cclee-shipping' ),
				'type'    => 'select',
				'default' => 'fixed',
				'options' => array(
					'fixed'      => __( 'Fixed Amount', 'cclee-shipping' ),
					'percentage' => __( 'Percentage', 'cclee-shipping' ),
				),
			),
			'rate_modifier_value' => array(
				'title'             => __( 'Rate Modifier Value', 'cclee-shipping' ),
				'type'              => 'number',
				'default'           => 0,
				'custom_attributes' => array( 'step' => '0.01', 'min' => '0' ),
			),
			'package_type' => array(
				'title'   => __( 'Default Package Type', 'cclee-shipping' ),
				'type'    => 'select',
				'default' => 'YOUR_PACKAGING',
				'options' => array(
					'YOUR_PACKAGING' => __( 'Your Packaging', 'cclee-shipping' ),
					'FEDEX_ENVELOPE' => __( 'FedEx Envelope', 'cclee-shipping' ),
					'FEDEX_PAK'      => __( 'FedEx Pak', 'cclee-shipping' ),
					'FEDEX_BOX'      => __( 'FedEx Box', 'cclee-shipping' ),
					'FEDEX_TUBE'     => __( 'FedEx Tube', 'cclee-shipping' ),
				),
			),
			'debug' => array(
				'title'   => __( 'Debug Mode', 'cclee-shipping' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable logging', 'cclee-shipping' ),
				'default' => 'no',
			),
		);
	}

	public function calculate_shipping( $package = array() ): void {
		if ( empty( $this->get_option( 'api_key' ) ) || empty( $this->get_option( 'secret_key' ) ) ) {
			return;
		}

		$carrier = new CCLEE_Shipping_FedEx_Carrier( $this );

		$origin = array(
			'country'  => WC()->countries->get_base_country(),
			'state'    => WC()->countries->get_base_state(),
			'city'     => WC()->countries->get_base_city(),
			'postcode' => WC()->countries->get_base_postcode(),
		);

		$destination = array(
			'country'  => $package['destination']['country'] ?? '',
			'state'    => $package['destination']['state'] ?? '',
			'city'     => $package['destination']['city'] ?? '',
			'postcode' => $package['destination']['postcode'] ?? '',
			'address'  => $package['destination']['address_1'] ?? $package['destination']['address'] ?? '',
		);

		$packages = CCLEE_Shipping_Package::from_cart( $package );
		$rates    = $carrier->get_rates( $origin, $destination, $packages );

		$modifier_type  = $this->get_option( 'rate_modifier_type', 'fixed' );
		$modifier_value = (float) $this->get_option( 'rate_modifier_value', 0 );

		foreach ( $rates as $rate ) {
			$cost = CCLEE_Shipping_Rate_Modifier::apply( $rate['cost'], $modifier_type, $modifier_value );

			$this->add_rate( array(
				'id'        => $rate['id'],
				'label'     => $rate['label'],
				'cost'      => $cost,
				'package'   => $package,
				'meta_data' => array( 'transit_days' => $rate['transit_days'] ?? '' ),
			) );
		}
	}
}
```

**Step 2: Verify settings render in WP admin**

Activate plugin, navigate to WooCommerce > Settings > Shipping > [Zone] > Add > "FedEx (CCLEE Shipping)" > Manage.
Expected: Settings form with API Key, Secret, Account Number, Environment, Services multiselect, Rate Modifier, Package Type, Debug.

**Step 3: Commit**

```
feat(shipping): FedEx carrier with OAuth, Rate API, Address Validation, WC method
```

---

### Task 5: Address Validator (AJAX Endpoint)

**Files:**
- Create: `wp-content/plugins/cclee-shipping/includes/class-address-validator.php`

**Step 1: Create address validator**

```php
<?php
/**
 * Address validator - AJAX endpoint for async FedEx address validation.
 *
 * @package CCLEE_Shipping
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CCLEE_Shipping_Address_Validator {

	public static function ajax_validate(): void {
		check_ajax_referer( 'cclee_shipping_validate', 'nonce' );

		$address = array(
			'address_1' => sanitize_text_field( wp_unslash( $_POST['address_1'] ?? '' ) ),
			'city'      => sanitize_text_field( wp_unslash( $_POST['city'] ?? '' ) ),
			'state'     => sanitize_text_field( wp_unslash( $_POST['state'] ?? '' ) ),
			'postcode'  => sanitize_text_field( wp_unslash( $_POST['postcode'] ?? '' ) ),
			'country'   => sanitize_text_field( wp_unslash( $_POST['country'] ?? '' ) ),
		);

		if ( empty( $address['country'] ) ) {
			wp_send_json_error( array( 'message' => __( 'Country is required.', 'cclee-shipping' ) ) );
		}

		$method = self::get_fedex_method();
		if ( ! $method ) {
			wp_send_json_error( array( 'message' => __( 'No FedEx shipping method configured.', 'cclee-shipping' ) ) );
		}

		$carrier = new CCLEE_Shipping_FedEx_Carrier( $method );
		$result  = $carrier->validate_address( $address );

		if ( $result['valid'] ) {
			wp_send_json_success( array(
				'valid'      => true,
				'normalized' => $result['normalized'] ?? array(),
			) );
		} else {
			wp_send_json_success( array(
				'valid'   => false,
				'message' => $result['message'],
			) );
		}
	}

	private static function get_fedex_method(): ?CCLEE_Shipping_FedEx_Method {
		if ( ! class_exists( 'WC_Shipping_Zones' ) ) {
			return null;
		}

		$zones   = WC_Shipping_Zones::get_zones();
		$zones[] = array( 'zone_id' => 0 );

		foreach ( $zones as $zone_data ) {
			$zone    = WC_Shipping_Zones::get_zone( $zone_data['zone_id'] );
			$methods = $zone->get_shipping_methods();

			foreach ( $methods as $instance ) {
				if ( $instance instanceof CCLEE_Shipping_FedEx_Method
					&& ! empty( $instance->get_option( 'api_key' ) ) ) {
					return $instance;
				}
			}
		}

		return null;
	}
}
```

**Step 2: Commit**

```
feat(shipping): AJAX address validation endpoint
```

---

### Task 6: Checkout JS (Async Address Validation)

Non-blocking address validation on checkout. Uses textContent (no innerHTML) for XSS safety.

**Files:**
- Create: `wp-content/plugins/cclee-shipping/assets/js/checkout.js`
- Create: `wp-content/plugins/cclee-shipping/assets/css/admin.css`

**Step 1: Create checkout JS**

```javascript
/**
 * CCLEE Shipping - Async address validation on checkout.
 */
(function () {
	'use strict';

	var debounceTimer = null;
	var validating = false;

	function getFormData() {
		var fields = ['address_1', 'city', 'state', 'postcode', 'country'];
		var data = {};

		var shipToDiff = document.querySelector('#ship-to-different-address input[type="checkbox"]');
		var prefix = (shipToDiff && shipToDiff.checked) ? 'shipping_' : 'billing_';

		fields.forEach(function (field) {
			var el = document.querySelector('#' + prefix + field);
			data[field] = el ? el.value : '';
		});

		data.nonce = ccleeShipping.nonce;
		data.action = 'cclee_shipping_validate_address';
		return data;
	}

	function ensureContainer() {
		var container = document.querySelector('.cclee-address-validation');
		if (container) return container;

		container = document.createElement('div');
		container.className = 'cclee-address-validation';

		var addressField = document.querySelector('#shipping_address_1, #billing_address_1');
		if (addressField && addressField.parentNode && addressField.parentNode.parentNode) {
			addressField.parentNode.parentNode.appendChild(container);
		}
		return container;
	}

	function showNotice(valid, message) {
		var container = ensureContainer();
		container.innerHTML = '';

		if (valid || !message) {
			container.style.display = 'none';
			return;
		}

		var notice = document.createElement('span');
		notice.className = 'cclee-av-notice';
		notice.textContent = message;
		container.appendChild(notice);
		container.style.display = 'block';
	}

	function validateAddress() {
		if (validating) return;

		var data = getFormData();
		if (!data.country) return;

		validating = true;

		fetch(ccleeShipping.ajax_url, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: new URLSearchParams(data).toString(),
		})
			.then(function (res) { return res.json(); })
			.then(function (res) {
				if (res.success && res.data) {
					showNotice(res.data.valid, res.data.message || '');
				}
			})
			.catch(function () { /* non-blocking */ })
			.finally(function () { validating = false; });
	}

	function onAddressChange() {
		clearTimeout(debounceTimer);
		debounceTimer = setTimeout(validateAddress, 1500);
	}

	if (document.querySelector('form.checkout')) {
		var fields = [
			'billing_address_1', 'billing_city', 'billing_postcode', 'billing_country',
			'shipping_address_1', 'shipping_city', 'shipping_postcode', 'shipping_country'
		];
		fields.forEach(function (id) {
			var el = document.querySelector('#' + id);
			if (el) {
				el.addEventListener('change', onAddressChange);
				el.addEventListener('input', onAddressChange);
			}
		});
	}
})();
```

**Step 2: Create admin CSS**

```css
/* CCLEE Shipping Admin */
.cclee-shipping-method-settings .wc-enhanced-select {
	min-width: 250px;
}
.cclee-av-notice {
	display: block;
	padding: 8px 12px;
	margin: 4px 0;
	background: #fff3cd;
	border: 1px solid #ffc107;
	border-radius: 4px;
	font-size: 13px;
	color: #856404;
}
```

**Step 3: Commit**

```
feat(shipping): checkout JS and admin CSS
```

---

### Task 7: Sandbox Integration Test

Verify full flow against FedEx sandbox.

**Step 1: Start Docker and activate**

```bash
docker compose -f wp/docker-compose.yml up -d
docker compose -f wp/docker-compose.yml exec -T wp_cli wp plugin activate cclee-shipping --allow-root
```

**Step 2: Configure FedEx in WC Shipping Zones**

1. WP Admin > WooCommerce > Settings > Shipping
2. Create/edit a zone covering US
3. Add "FedEx (CCLEE Shipping)" method
4. Click Manage, fill:
   - API Key: `l73f3c0a81237b478a8dedc6e8d68b18dc`
   - Secret Key: `e0f36679f5154e099a42d62a4ed039e3`
   - Account Number: `740561073`
   - Environment: Sandbox
   - Services: select INTERNATIONAL_PRIORITY + INTERNATIONAL_ECONOMY
   - Debug: Enable logging
5. Save

**Step 3: Test OAuth + Rate**

1. Add a product to cart
2. Go to checkout
3. Enter US shipping address (e.g., Beverly Hills, CA 90210)
4. Expected: FedEx rates appear in shipping options (sandbox returns VIRTUAL.RESPONSE)
5. Check WooCommerce > Status > Logs for `cclee-shipping-cclee_shipping_fedex` entries

**Step 4: Test Address Validation**

1. On same checkout page, modify the address
2. Wait ~1.5s after typing
3. Expected: Warning notice if address has issues (non-blocking, yellow badge)
4. Check WC logs for `FedEx Address Validation` entries

**Step 5: Final commit**

```
feat(shipping): cclee-shipping v1.0.0 - FedEx Rate + Address Validation
```
