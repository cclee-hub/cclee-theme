<?php
/**
 * Title: Landing Video Hero
 * Slug: cclee-theme/landing-video-hero
 * Categories: cclee-theme, featured
 * Description: 全屏视频背景 Hero 区块，添加您的 MP4 视频文件
 */
?>
<!-- wp:group {"align":"full","className":"landing-video-container","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull landing-video-container has-contrast-background-color has-background" style="padding-top:0;padding-bottom:0;min-height:100vh">

	<!-- wp:cover {"url":"","dimRatio":70,"overlayColor":"neutral-900","minHeight":100,"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
	<div class="wp-block-cover alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-neutral-900-background-color has-background-dim-70 has-background-dim"></span>
		<!-- wp:video {"muted":true,"autoplay":true,"loop":true,"playsInline":true} -->
		<figure class="wp-block-video">
			<video autoplay muted loop playsinline controls="" style="position:absolute;top:50%;left:50%;min-width:100%;min-height:100%;transform:translate(-50%,-50%);object-fit:cover" poster="">
				<!-- Add your MP4 video source here, e.g.: <source src="your-video.mp4" type="video/mp4"> -->
			</video>
		</figure>
		<!-- /wp:video -->
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group" style="position:relative;z-index:1;min-height:100vh;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-200","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
				<p class="has-text-align-center has-neutral-200-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Welcome to the Future</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base","fontSize":"h1"} -->
				<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color" style="font-size:var(--wp--preset--font-size--h1)">Experience Innovation</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-200","fontSize":"large","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--50)"}}}} -->
				<p class="has-text-align-center has-neutral-200-color has-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--50)">Discover what's possible with our cutting-edge solutions.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"accent","textColor":"base","style":{"border":{"radius":"8px"}}} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:8px">Get Started</a></div>
					<!-- /wp:button -->
					<!-- wp:button {"textColor":"base","className":"is-style-outline","style":{"border":{"radius":"8px"}}} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" style="border-radius:8px">Watch Demo</a></div>
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
