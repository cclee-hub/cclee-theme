<?php
/**
 * Title: WooCommerce Trust Badges
 * Slug: cclee-theme/woo-trust-badges
 * Categories: cclee-theme, woocommerce
 * Description: Trust badges showing secure payment and return guarantees
 */
?>
<!-- wp:group {"className":"woo-trust-badges","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group woo-trust-badges" style="margin-top:var(--wp--preset--spacing--40)">

	<!-- wp:group {"className":"woo-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group woo-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon"><?php echo cclee_svg( 'shield-check' ); ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small"} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size">Secure Payment</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"woo-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group woo-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon"><?php echo cclee_svg( 'refresh' ); ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small"} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size">30-Day Returns</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"woo-trust-badge","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group woo-trust-badge">
		<!-- wp:html -->
		<div class="cclee-icon"><?php echo cclee_svg( 'zap' ); ?></div>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small"} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size">Fast Shipping</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
