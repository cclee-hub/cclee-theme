<?php
/**
 * CCLEE Yougu child theme functions.
 *
 * @package CCLEE_Yougu
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'cclee-yougu-parent',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme( 'cclee' )->get( 'Version' )
		);
		wp_enqueue_style(
			'cclee-yougu-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( 'cclee-yougu-parent' ),
			wp_get_theme()->get( 'Version' )
		);
	}
);
