<?php
/**
 * Custom block style registrations.
 * Extends core blocks with additional style variations via register_block_style().
 *
 * @package cclee
 */

add_action(
	'init',
	function () {

		// Button: Outline style variation.
		register_block_style(
			'core/button',
			array(
				'name'  => 'outline',
				'label' => __( 'Outline', 'cclee' ),
			)
		);

		// Group: Card style variation.
		register_block_style(
			'core/group',
			array(
				'name'  => 'card',
				'label' => __( 'Card', 'cclee' ),
			)
		);

		// Separator: Thick style variation.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'thick',
				'label' => __( 'Thick', 'cclee' ),
			)
		);

		// Quote: Accent Border style variation.
		register_block_style(
			'core/quote',
			array(
				'name'  => 'accent-border',
				'label' => __( 'Accent Border', 'cclee' ),
			)
		);

		// Image: Rounded style variation.
		register_block_style(
			'core/image',
			array(
				'name'  => 'rounded',
				'label' => __( 'Rounded', 'cclee' ),
			)
		);

		// Image: Shadow style variation.
		register_block_style(
			'core/image',
			array(
				'name'  => 'shadow',
				'label' => __( 'Shadow', 'cclee' ),
			)
		);

		// List: Checkmark style variation.
		register_block_style(
			'core/list',
			array(
				'name'  => 'checkmark',
				'label' => __( 'Checkmark', 'cclee' ),
			)
		);

		// Columns: Equal Height style variation.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'equal-height',
				'label' => __( 'Equal Height', 'cclee' ),
			)
		);
	}
);
