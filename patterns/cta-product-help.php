<?php
/**
 * Title: CTA Product Help
 * Slug: cclee/cta-product-help
 * Categories: cclee, featured
 * Description: Call-to-action banner for product pages — "Need Help Choosing?"
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"gradient":"accent","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-gradient-background has-background has-base-color has-text-color" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"textAlign":"center","textColor":"base","fontSize":"heading-2"} -->
		<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-heading-2-font-size"><?php esc_html_e( 'Need Help Choosing the Right Product?', 'cclee' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-100","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--50)"}}}} -->
		<p class="has-text-align-center has-neutral-100-color has-text-color" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--50)"><?php esc_html_e( 'Our team can help you find the best solution for your business.', 'cclee' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"textColor":"primary","className":"is-style-inverse","style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--60)","right":"var(--wp--preset--spacing--60)"}}}} -->
			<div class="wp-block-button is-style-inverse"><a href="/contact/" class="wp-block-button__link has-primary-color has-text-color wp-element-button" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e( 'Get a Quote', 'cclee' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
