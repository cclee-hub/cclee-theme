<?php
/**
 * CCLEE Site child theme functions.
 *
 * @package CCLEE_Site
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'cclee-site-parent',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme( 'cclee' )->get( 'Version' )
		);
		wp_enqueue_style(
			'cclee-site-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( 'cclee-site-parent' ),
			wp_get_theme()->get( 'Version' )
		);
	}
);
