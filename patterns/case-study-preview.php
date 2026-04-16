<?php
/**
 * Title: Case Study Preview
 * Slug: cclee/case-study-preview
 * Categories: cclee-showcase
 * Inserter: false
 * Description: Full case study page layout with sample data (core blocks only)
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"level":1,"textColor":"primary","fontSize":"heading-1","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}}} -->
		<h1 class="wp-block-heading has-primary-color has-text-color has-heading-1-font-size" style="margin-bottom:var(--wp--preset--spacing--40)">Digital Transformation for Global Manufacturing</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
		<p class="has-neutral-500-color has-text-color has-small-font-size">A comprehensive case study showcasing business impact.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)"},"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)"},"border":{"bottom":{"width":"1px","color":"var:preset|color|neutral-200","style":"solid"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group cclee-case-hero" style="border-bottom-style:solid;border-bottom-width:1px;border-bottom-color:var(--wp--preset--color--neutral-200);margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
			<!-- wp:paragraph {"fontSize":"heading-5","className":"cclee-case-hero__name","textColor":"primary","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-primary-color has-text-color has-heading-5-font-size cclee-case-hero__name" style="font-weight:700">Acme Corporation</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"small","textColor":"neutral-500"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">500-1000 employees</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph -->
		<p>The client needed a complete digital overhaul to streamline operations and improve customer engagement across 12 global offices...</p>
		<!-- /wp:paragraph -->

		<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"},"blockGap":{"top":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}}}} -->
		<div class="wp-block-columns cclee-case-metrics" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-card","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
					<!-- wp:paragraph {"align":"center","fontSize":"heading-2","textColor":"primary","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
					<p class="has-text-align-center has-primary-color has-text-color has-heading-2-font-size cclee-case-metrics__value" style="font-weight:700;line-height:1">+150%</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"small"} -->
					<p class="has-text-align-center has-neutral-600-color has-text-color has-small-font-size cclee-case-metrics__label">Revenue Growth</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-card","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
					<!-- wp:paragraph {"align":"center","fontSize":"heading-2","textColor":"primary","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
					<p class="has-text-align-center has-primary-color has-text-color has-heading-2-font-size cclee-case-metrics__value" style="font-weight:700;line-height:1">-40%</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"small"} -->
					<p class="has-text-align-center has-neutral-600-color has-text-color has-small-font-size cclee-case-metrics__label">Cost Reduction</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-card","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
					<!-- wp:paragraph {"align":"center","fontSize":"heading-2","textColor":"primary","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
					<p class="has-text-align-center has-primary-color has-text-color has-heading-2-font-size cclee-case-metrics__value" style="font-weight:700;line-height:1">98%</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"small"} -->
					<p class="has-text-align-center has-neutral-600-color has-text-color has-small-font-size cclee-case-metrics__label">Client Satisfaction</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-card","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
					<!-- wp:paragraph {"align":"center","fontSize":"heading-2","textColor":"primary","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
					<p class="has-text-align-center has-primary-color has-text-color has-heading-2-font-size cclee-case-metrics__value" style="font-weight:700;line-height:1">6 mo</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"small"} -->
					<p class="has-text-align-center has-neutral-600-color has-text-color has-small-font-size cclee-case-metrics__label">Delivery Time</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--40)"},"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)"},"border":{"bottom":{"width":"1px","color":"var:preset|color|neutral-200","style":"solid"}}},"layout":{"type":"flex"}}} -->
		<div class="wp-block-group cclee-case-meta" style="border-bottom-style:solid;border-bottom-width:1px;border-bottom-color:var(--wp--preset--color--neutral-200);margin-top:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
			<!-- wp:group {"layout":{"type":"flex"}} -->
			<div class="wp-block-group cclee-case-meta__item">
				<!-- wp:paragraph {"fontSize":"small","textColor":"neutral-500"} -->
				<p class="has-neutral-500-color has-text-color has-small-font-size cclee-case-meta__label">Duration</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"fontSize":"small","textColor":"primary","style":{"typography":{"fontWeight":"600"}}} -->
				<p class="has-primary-color has-text-color has-small-font-size cclee-case-meta__value" style="font-weight:600">6 months</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"layout":{"type":"flex"}} -->
			<div class="wp-block-group cclee-case-meta__item">
				<!-- wp:paragraph {"fontSize":"small","textColor":"neutral-500"} -->
				<p class="has-neutral-500-color has-text-color has-small-font-size cclee-case-meta__label">Team Size</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"fontSize":"small","textColor":"primary","style":{"typography":{"fontWeight":"600"}}} -->
				<p class="has-primary-color has-text-color has-small-font-size cclee-case-meta__value" style="font-weight:600">500-1000 employees</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--60)"},"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-card cclee-case-testimonial" style="margin-top:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">
			<!-- wp:quote {"style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--30)"}},"border":{"left":{"color":"var:preset|color|accent","style":"solid","width":"4px"}}}} -->
			<blockquote class="wp-block-quote cclee-case-testimonial__quote" style="border-left-color:var(--wp--preset--color--accent);border-left-style:solid;border-left-width:4px;padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"textColor":"neutral-700","style":{"typography":{"fontStyle":"italic","lineHeight":"1.7"}}} -->
				<p class="has-neutral-700-color has-text-color" style="font-style:italic;line-height:1.7">"The transformation exceeded our expectations. Within six months, we saw measurable improvements across every department."</p>
				<!-- /wp:paragraph -->
			</blockquote>
			<!-- /wp:quote -->
			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group cclee-case-testimonial__author" style="margin-top:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"textColor":"primary","style":{"typography":{"fontWeight":"700"}}} -->
				<p class="has-primary-color has-text-color cclee-case-testimonial__name" style="font-weight:700">James Wilson</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
				<p class="has-neutral-500-color has-text-color has-small-font-size cclee-case-testimonial__role">CTO, Acme Corporation</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
