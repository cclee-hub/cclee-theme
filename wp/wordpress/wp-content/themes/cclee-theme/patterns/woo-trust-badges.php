<?php
/**
 * Title: WooCommerce Trust Badges
 * Slug: cclee-theme/woo-trust-badges
 * Categories: cclee-theme, woocommerce
 * Description: 信任徽章，显示安全支付和退换货保障
 */
?>
<!-- wp:group {"className":"woo-trust-badges","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","spacing":{"margin":{"left":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)"}}}} -->
<div class="wp-block-group woo-trust-badges" style="display:flex;flex-wrap:wrap;justify-content:center;gap:var(--wp--preset--spacing--30);margin-top:var(--wp--preset--spacing--40)">

	<!-- wp:group {"className":"woo-trust-badge","layout":{"type":"flex","spacing":{"margin":{"left":"var(--wp--preset--spacing--15)"}}}} -->
	<div class="wp-block-group woo-trust-badge" style="display:flex;align-items:center;gap:var(--wp--preset--spacing--15)">
		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--wp--preset--color--accent);flex-shrink:0"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small"} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="margin:0">Secure Payment</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"woo-trust-badge","layout":{"type":"flex","spacing":{"margin":{"left":"var(--wp--preset--spacing--15)"}}}} -->
	<div class="wp-block-group woo-trust-badge" style="display:flex;align-items:center;gap:var(--wp--preset--spacing--15)">
		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--wp--preset--color--accent);flex-shrink:0"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"></path><path d="M16 16h5v5"></path></svg>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small"} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="margin:0">30-Day Returns</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"woo-trust-badge","layout":{"type":"flex","spacing":{"margin":{"left":"var(--wp--preset--spacing--15)"}}}} -->
	<div class="wp-block-group woo-trust-badge" style="display:flex;align-items:center;gap:var(--wp--preset--spacing--15)">
		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--wp--preset--color--accent);flex-shrink:0"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
		<!-- /wp:html -->
		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"small"} -->
		<p class="has-neutral-600-color has-text-color has-small-font-size" style="margin:0">Fast Shipping</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
