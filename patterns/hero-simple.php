<?php
/**
 * Title: Hero Simple
 * Slug: cclee-theme/hero-simple
 * Categories: cclee-theme, featured
 * Description: 简单 Hero 区块，左对齐布局
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"align":"wide","className":"has-grid-pattern","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide has-grid-pattern">

		<!-- wp:group {"className":"cclee-hero-content","layout":{"type":"constrained"}} -->
		<div class="wp-block-group cclee-hero-content">

			<!-- wp:paragraph {"textColor":"accent","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}}} -->
			<p class="has-accent-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.05em">WELCOME</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"textColor":"primary","fontSize":"h1"} -->
			<h1 class="wp-block-heading has-primary-color has-text-color has-h-1-font-size">Your Vision,<br>Our Theme.</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"large","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
			<p class="has-neutral-500-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)">Build beautiful, responsive websites with ease. Our theme provides everything you need to create stunning online experiences.</p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">
				<!-- wp:button {"backgroundColor":"accent","textColor":"base"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Start Building</a></div>
				<!-- /wp:button -->
				<!-- wp:paragraph {"style":{"spacing":{"margin":{"left":"var(--wp--preset--spacing--30)"}}}} -->
				<p style="margin-left:var(--wp--preset--spacing--30)"><a href="#">View Demo</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
