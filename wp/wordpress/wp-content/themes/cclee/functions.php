<?php
/**
 * Loads inc/ modules only.
 *
 * @package cclee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/block-styles.php';
require get_template_directory() . '/inc/block-patterns.php';
require get_template_directory() . '/inc/woocommerce.php';
