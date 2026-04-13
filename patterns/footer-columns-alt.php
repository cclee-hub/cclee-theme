<?php
/**
 * Title: Footer Columns Alt
 * Slug: cclee/footer-columns-alt
 * Categories: cclee, footer
 * Description: Four-column footer section with newsletter
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"backgroundColor":"surface","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background has-base-color has-text-color" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:site-title {"level":0,"isLink":false} /-->
			<!-- wp:paragraph {"textColor":"neutral-500"} -->
			<p class="has-neutral-500-color has-text-color">Building beautiful websites with modern design principles and powerful features.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":4,"textColor":"base","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
			<h4 class="wp-block-heading has-base-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Product</h4>
			<!-- /wp:heading -->
			<!-- wp:navigation {"overlayMenu":"never","fontSize":"small","textColor":"neutral-400","layout":{"type":"flex","orientation":"vertical"}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":4,"textColor":"base","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
			<h4 class="wp-block-heading has-base-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Company</h4>
			<!-- /wp:heading -->
			<!-- wp:navigation {"overlayMenu":"never","fontSize":"small","textColor":"neutral-400","layout":{"type":"flex","orientation":"vertical"}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":5,"fontSize":"heading-5"} -->
			<h5 class="wp-block-heading has-heading-5-font-size">Newsletter</h5>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Stay updated with our latest news and updates.</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small","style":{"typography":{"fontStyle":"italic"}}} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size cclee-text--italic">Newsletter input placeholder</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"accent","textColor":"base","size":"small"} -->
				<div class="wp-block-button has-small-font-size"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Subscribe</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
