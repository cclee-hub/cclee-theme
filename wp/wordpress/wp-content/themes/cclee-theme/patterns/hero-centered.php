<?php
/**
 * Title: Hero Centered
 * Slug: cclee-theme/hero-centered
 * Categories: cclee-theme, featured
 * Description: 居中布局 Hero 区块，渐变背景和装饰元素
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"gradient":"hero-gradient","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-hero-gradient-gradient has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:html -->
	<div class="cclee-dots-pattern" style="color:rgba(255,255,255,0.3)"></div>
	<!-- /wp:html -->

	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group" style="position:relative;z-index:1">

		<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-100","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
		<p class="has-text-align-center has-neutral-100-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Welcome to CCLEE</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"h1","textColor":"base"} -->
		<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color" style="font-size:var(--wp--preset--font-size--h1)">Build Something Beautiful</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","fontSize":"large","textColor":"neutral-200"} -->
		<p class="has-text-align-center has-neutral-200-color has-text-color has-large-font-size">A modern WordPress theme built for speed and simplicity.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:button {"backgroundColor":"accent","textColor":"base","style":{"border":{"radius":"8px"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:8px">Get Started</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"textColor":"base","className":"is-style-outline","style":{"border":{"radius":"8px"}}} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" style="border-radius:8px">Learn More</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
