<?php
/**
 * Pattern category registration.
 * Individual patterns live in the patterns/ directory and are auto-loaded by WordPress.
 *
 * @package cclee
 */

add_action(
	'init',
	function () {
		register_block_pattern_category(
			'cclee',
			array(
				'label' => __( 'CCLEE Theme', 'cclee' ),
			)
		);
	}
);
