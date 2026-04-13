<?php
/**
 * Title: Hero Simple
 * Slug: cclee/hero-simple
 * Categories: cclee, featured
 * Description: Simple hero section with left-aligned layout
 *
 * @package cclee
 */

?>
<!-- wp:cover {"gradient":"hero","dimRatio":100,"minHeight":480,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)","left":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--50)"}}},"textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-base-color has-text-color" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);min-height:480px">
	<span aria-hidden="true" class="wp-block-cover__background has-hero-gradient-background has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"align":"wide","className":"has-grid-pattern","layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group alignwide has-grid-pattern">

			<!-- wp:group {"className":"cclee-hero-content","layout":{"type":"constrained"}} -->
			<div class="wp-block-group cclee-hero-content">

				<!-- wp:paragraph {"textColor":"neutral-300","fontSize":"medium","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
				<p class="has-neutral-300-color has-text-color has-medium-font-size" style="font-weight:600;letter-spacing:0.05em">WELCOME</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":1,"textColor":"base","fontSize":"heading-1"} -->
				<h1 class="wp-block-heading has-base-color has-text-color has-heading-1-font-size">Your Vision,<br>Our Theme.</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-300","fontSize":"xx-large","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
				<p class="has-neutral-300-color has-text-color has-xx-large-font-size" style="margin-top:var(--wp--preset--spacing--30)">Build beautiful, responsive websites with ease. Our theme provides everything you need to create stunning online experiences.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">
					<!-- wp:button {"backgroundColor":"accent","textColor":"base"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Start Building</a></div>
					<!-- /wp:button -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"left":"var(--wp--preset--spacing--30)"}}}} -->
					<p style="margin-left:var(--wp--preset--spacing--30)"><a href="#" style="color:var(--wp--preset--color--base)">View Demo</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
