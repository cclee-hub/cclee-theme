<?php
/**
 * Title: Trust Badges
 * Slug: cclee/trust-badges
 * Categories: cclee, featured
 * Description: Horizontal trust badges with icons showing company credentials
 *
 * @package cclee
 */

?>
<!-- wp:group {"className":"is-style-trust-badges","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"},"blockGap":"var(--wp--preset--spacing--40)"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group is-style-trust-badges" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:group {"className":"is-style-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon cclee-icon--accent"><?php echo cclee_svg( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">Est. 2021</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon cclee-icon--accent"><?php echo cclee_svg( 'factory' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">Dual-Base Production</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon cclee-icon--accent"><?php echo cclee_svg( 'layers' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">In-House R&D</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon cclee-icon--accent"><?php echo cclee_svg( 'shield-check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">QC Tested, Every Order</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
