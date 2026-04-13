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

		// Group: Portfolio Card style variation.
		register_block_style(
			'core/group',
			array(
				'name'  => 'portfolio-card',
				'label' => __( 'Portfolio Card', 'cclee' ),
			)
		);

		// Group: Trust Badges style variation.
		register_block_style(
			'core/group',
			array(
				'name'  => 'trust-badges',
				'label' => __( 'Trust Badges', 'cclee' ),
			)
		);

		// Group: Trust Badge style variation.
		register_block_style(
			'core/group',
			array(
				'name'  => 'trust-badge',
				'label' => __( 'Trust Badge', 'cclee' ),
			)
		);

		// Group: Logo Item style variation.
		register_block_style(
			'core/group',
			array(
				'name'  => 'logo-item',
				'label' => __( 'Logo Item', 'cclee' ),
			)
		);

		// Group: CTA Inner style variation.
		register_block_style(
			'core/group',
			array(
				'name'  => 'cta-inner',
				'label' => __( 'CTA Inner', 'cclee' ),
			)
		);

		// Group: Dots Pattern style variation.
		register_block_style(
			'core/group',
			array(
				'name'  => 'dots-pattern',
				'label' => __( 'Dots Pattern', 'cclee' ),
			)
		);

		// Button: CTA Button style variation.
		register_block_style(
			'core/button',
			array(
				'name'  => 'cta-button',
				'label' => __( 'CTA Button', 'cclee' ),
			)
		);

		// Button: Inverse style variation.
		register_block_style(
			'core/button',
			array(
				'name'  => 'inverse',
				'label' => __( 'Inverse', 'cclee' ),
			)
		);
	}
);
