<?php
/**
 * Title: Case Study Testimonial
 * Slug: cclee-theme/case-study-testimonial
 * Categories: cclee-theme, featured
 * Description: 客户评价卡片
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:group {"align":"wide","style":{"border":{"radius":"var(--wp--custom--border--radius--lg)"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--60)","bottom":"var(--wp--preset--spacing--60)","left":"var(--wp--preset--spacing--60)","right":"var(--wp--preset--spacing--60)"}}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide has-contrast-background-color has-background" style="border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60)">

		<!-- wp:columns {"style":{"spacing":{"gap":{"left":"var(--wp--preset--spacing--50)"}}}} -->
		<div class="wp-block-columns">

			<!-- wp:column {"width":"80px"} -->
			<div class="wp-block-column" style="flex-basis:80px;flex-shrink:0">
				<!-- wp:group {"className":"cclee-avatar cclee-avatar--lg cclee-avatar--accent","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-avatar cclee-avatar--lg cclee-avatar--accent" style="width:80px;height:80px;display:flex;align-items:center;justify-content:center;border-radius:50%;font-weight:600;font-size:1.75rem">
					<!-- wp:paragraph {"textAlign":"center","textColor":"base","style":{"typography":{"fontSize":"1.75rem","fontWeight":"600"}}} -->
					<p class="has-text-align-center has-base-color has-text-color" style="font-size:1.75rem;font-weight:600;margin:0">JD</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">

				<!-- wp:quote {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"fontSize":"var(--wp--preset--font-size--large)","fontStyle":"italic","lineHeight":"1.6"}},"textColor":"neutral-700"} -->
				<blockquote class="wp-block-quote has-neutral-700-color has-text-color" style="font-size:var(--wp--preset--font-size--large);font-style:italic;line-height:1.6;margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0">
					<p>"Working with this team was an absolute game-changer for our business. They understood our challenges and delivered beyond our expectations."</p>
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"textColor":"primary","style":{"typography":{"fontWeight":"600"}}} -->
					<p class="has-primary-color has-text-color" style="font-weight:600;margin:0">John Doe</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
					<p class="has-neutral-500-color has-text-color has-small-font-size" style="margin:0">CEO, Company Name</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
