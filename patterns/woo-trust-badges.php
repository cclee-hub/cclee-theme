<?php
/**
 * Title: WooCommerce Trust Badges
 * Slug: cclee/woo-trust-badges
 * Categories: cclee, woocommerce
 * Description: Trust badges showing secure payment and return guarantees
 *
 * @package cclee
 */

?>
<!-- wp:group {"className":"is-style-trust-badges","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)"},"margin":{"top":"var(--wp--preset--spacing--40)"},"blockGap":"var(--wp--preset--spacing--30)"}},"layout":{"type":"grid","justifyContent":"center"}} -->
<div class="wp-block-group is-style-trust-badges" style="margin-top:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">

	<!-- wp:group {"className":"is-style-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon has-accent-color has-text-color" style="margin-right:var(--wp--preset--spacing--20);text-align:center"><?php echo cclee_svg( 'shield-check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size cclee-text--badge-md">Secure Payment</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon has-accent-color has-text-color" style="margin-right:var(--wp--preset--spacing--20);text-align:center"><?php echo cclee_svg( 'refresh' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size cclee-text--badge-md">30-Day Returns</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group is-style-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon has-accent-color has-text-color" style="margin-right:var(--wp--preset--spacing--20);text-align:center"><?php echo cclee_svg( 'zap' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size cclee-text--badge-md">Fast Shipping</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
