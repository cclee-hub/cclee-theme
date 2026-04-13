<?php
/**
 * Title: Page Header
 * Slug: cclee/page-header
 * Categories: cclee, featured
 * Description: Clean page header with title and subtle background
 *
 * @package cclee
 */

?>
<!-- wp:cover {"gradient":"hero","dimRatio":100,"backgroundColor":"contrast","minHeight":320,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-base-color has-text-color has-contrast-background-color" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:320px">
	<span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"800px","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:paragraph {"textColor":"base","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
		<p class="has-base-color has-text-color has-small-font-size cclee-text--label">Legal</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"textAlign":"center","textColor":"primary","fontSize":"heading-1","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
		<h1 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-1-font-size" style="margin-top:var(--wp--preset--spacing--30)">Page Title</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"large","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
		<p class="has-text-align-center has-neutral-500-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)">Last updated: March 25, 2026</p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->
	</div>

	</div>
	<!-- /wp:cover -->
