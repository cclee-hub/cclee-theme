<?php
/**
 * Title: Hero Contact
 * Slug: cclee/hero-contact
 * Categories: cclee
 * Description: Contact page hero with background image
 *
 * @package cclee
 */

?>
<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-contact.webp","id":0,"backgroundType":"image","dimRatio":60,"overlayColor":"contrast","minHeight":360,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)","left":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--50)"}}},"textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-base-color has-text-color" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);min-height:360px">
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-contact.webp" data-object-fit="cover"/>
	<span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-60 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-100","fontSize":"medium","style":{"typography":{"fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
		<p class="has-text-align-center has-neutral-100-color has-text-color has-medium-font-size cclee-text--label">Contact</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base","fontSize":"heading-1","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
		<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color has-heading-1-font-size" style="margin-top:var(--wp--preset--spacing--30)">Get in Touch</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-100","fontSize":"xx-large","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
		<p class="has-text-align-center has-neutral-100-color has-text-color has-xx-large-font-size" style="margin-top:var(--wp--preset--spacing--30)">Have a question or want to work together? We'd love to hear from you.</p>
		<!-- /wp:paragraph -->

	</div>
</div>
<!-- /wp:cover -->
