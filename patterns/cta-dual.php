<?php
/**
 * Title: CTA Dual Buttons
 * Slug: cclee/cta-dual
 * Categories: cclee, featured
 * Description: Call-to-action section with two buttons on accent gradient background
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"gradient":"accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"className":"cta-inner-group","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group cta-inner-group">

		<!-- wp:heading {"textAlign":"center","textColor":"primary","fontSize":"heading-2"} -->
		<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-2-font-size">Ready to Get Started?</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-800","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--50)"}}}} -->
		<p class="has-text-align-center has-neutral-800-color has-text-color" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--50)">Contact us today to discuss your project requirements.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"primary","textColor":"base","style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--60)","right":"var(--wp--preset--spacing--60)"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">Get a Quote</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"backgroundColor":"base","textColor":"primary","style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--60)","right":"var(--wp--preset--spacing--60)"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">Learn More</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
