<?php
/**
 * Title: Hero Blog
 * Slug: cclee-theme/hero-blog
 * Categories: cclee-theme
 * Description: Blog page hero with background image
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/portfolio-tech.jpg","dimRatio":60,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":320,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)","left":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--50)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);min-height:320px">
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/portfolio-tech.jpg" data-object-fit="cover"/>
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:paragraph {"textAlign":"center","textColor":"accent","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
		<p class="has-text-align-center has-accent-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Blog</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base","fontSize":"h1","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
		<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color has-h-1-font-size" style="margin-top:var(--wp--preset--spacing--30)">Latest Insights</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-200","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
		<p class="has-text-align-center has-neutral-200-color has-text-color" style="margin-top:var(--wp--preset--spacing--30)">Stay updated with the latest trends, tips, and industry news.</p>
		<!-- /wp:paragraph -->

	</div>
</div>
<!-- /wp:cover -->
