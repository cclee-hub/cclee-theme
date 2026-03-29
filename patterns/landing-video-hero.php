<?php
/**
 * Title: Landing Video Hero
 * Slug: cclee-theme/landing-video-hero
 * Categories: cclee-theme, featured
 * Description: Full-screen video background hero, add your own MP4 video
 */
?>
<!-- wp:group {"align":"full","className":"landing-video-container","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull landing-video-container has-contrast-background-color has-background">

	<!-- wp:cover {"url":"","dimRatio":70,"overlayColor":"neutral-900","minHeight":100,"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
	<div class="wp-block-cover alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-900-background-color has-background-dim-70 has-background-dim"></span>
		<!-- wp:video {"muted":true,"autoplay":true,"loop":true,"playsInline":true} /-->
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-200","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
				<p class="has-text-align-center has-neutral-200-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Welcome to the Future</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base","fontSize":"h1"} -->
				<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color has-h-1-font-size">Experience Innovation</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-200","fontSize":"large","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--50)"}}}} -->
				<p class="has-text-align-center has-neutral-200-color has-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--50)">Discover what's possible with our cutting-edge solutions.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"accent","textColor":"base"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Get Started</a></div>
					<!-- /wp:button -->
					<!-- wp:button {"textColor":"base","className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button">Watch Demo</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->

</div>
<!-- /wp:group -->
