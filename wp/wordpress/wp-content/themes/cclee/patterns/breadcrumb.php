<?php
/**
 * Title: Breadcrumb
 * Slug: cclee/breadcrumb
 * Categories: cclee, navigation
 * Description: Breadcrumb navigation with separator icons
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","justifyContent":"left"},"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--20)"}},"fontSize":"small"} -->
			<!-- wp:home-link {"label":"Home"} /-->
			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--neutral-400)"}}},"typography":{"fontStyle":"normal"}},"textColor":"neutral-400","className":"cclee-breadcrumb-separator"} -->
			<p class="cclee-breadcrumb-separator has-neutral-400-color has-text-color has-link-color" style="font-style:normal">/</p>
			<!-- /wp:paragraph -->
			<!-- wp:navigation-link {"label":"Category","url":"#"} /-->
			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--neutral-400)"}}},"typography":{"fontStyle":"normal"}},"textColor":"neutral-400","className":"cclee-breadcrumb-separator"} -->
			<p class="cclee-breadcrumb-separator has-neutral-400-color has-text-color has-link-color" style="font-style:normal">/</p>
			<!-- /wp:paragraph -->
			<!-- wp:navigation-link {"label":"Current Page","url":"#","className":"is-active"} /-->
		<!-- /wp:navigation -->

		<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
		<p class="has-neutral-500-color has-text-color has-small-font-size">Showing 1-12 of 48 results</p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
