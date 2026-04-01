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
<!-- wp:group {"className":"trust-badges","style":{"spacing":{"blockGap":"var(--wp--preset--spacing--40)"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group trust-badges">

	<!-- wp:group {"className":"trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon cclee-icon--accent"><?php echo cclee_svg( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">Est. 2020</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon cclee-icon--accent"><?php echo cclee_svg( 'factory' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">In-house Production</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon cclee-icon--accent"><?php echo cclee_svg( 'layers' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">Full Product Line</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon cclee-icon--accent"><?php echo cclee_svg( 'shield-check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">QC Tested, Every Unit</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
