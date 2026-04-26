<?php
/**
 * Title: Contact CTA
 * Slug: cclee/contact-cta
 * Categories: cclee
 * Description: Contact call-to-action with two buttons on accent gradient background
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"gradient":"accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"className":"cta-inner-group","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group cta-inner-group">

		<!-- wp:heading {"textAlign":"center","textColor":"base","fontSize":"heading-2"} -->
		<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-heading-2-font-size">Have a Project in Mind?</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-100","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--50)"}}}} -->
		<p class="has-text-align-center has-neutral-100-color has-text-color" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--50)">Tell us about your requirements and we'll get back to you within 24 hours.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"base","textColor":"primary","style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--60)","right":"var(--wp--preset--spacing--60)"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">Get a Quote</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"backgroundColor":"primary","textColor":"base","style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--60)","right":"var(--wp--preset--spacing--60)"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background wp-element-button" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">Learn More</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
