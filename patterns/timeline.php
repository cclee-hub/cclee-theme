<?php
/**
 * Title: Timeline Section
 * Slug: cclee/timeline
 * Categories: cclee, featured
 * Description: Company timeline and milestones
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

	<!-- wp:heading {"textAlign":"center","textColor":"base","fontSize":"heading-2"} -->
	<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-heading-2-font-size">Our Journey</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-300","fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--60)"}}}} -->
	<p class="has-text-align-center has-neutral-300-color has-text-color has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--60)">Key milestones that shaped who we are today.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"padding":{"right":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"constrained","wideSize":"800px"}} -->
	<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

		<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}},"className":"cclee-timeline-item is-style-equal-height"} -->
		<div class="wp-block-columns cclee-timeline-item is-style-equal-height" style="margin-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:column {"width":"100px"} -->
			<div class="wp-block-column" style="flex-basis:100px">
				<!-- wp:group {"className":"cclee-timeline-dot","style":{"border":{"radius":"50%"}},"backgroundColor":"accent","textColor":"base","layout":{"type":"default"}} -->
				<div class="wp-block-group cclee-timeline-dot has-accent-background-color has-base-color has-text-color has-background" style="border-radius:50%">
					<!-- wp:paragraph {"align":"center","fontSize":"small","style":{"typography":{"fontWeight":"700"}}} -->
					<p class="has-text-align-center has-small-font-size" style="font-weight:700">2010</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--50)"}},"border":{"radius":"12px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
					<!-- wp:html -->
					<div style="margin-bottom:8px"><?php echo cclee_svg( 'rocket' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:heading {"level":4,"textColor":"primary","fontSize":"heading-4"} -->
					<h4 class="wp-block-heading has-primary-color has-text-color has-heading-4-font-size">Company Founded</h4>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color">Started with a vision to revolutionize the industry with innovative solutions and exceptional service.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}},"className":"cclee-timeline-item is-style-equal-height"} -->
		<div class="wp-block-columns cclee-timeline-item is-style-equal-height" style="margin-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:column {"width":"100px"} -->
			<div class="wp-block-column" style="flex-basis:100px">
				<!-- wp:group {"className":"cclee-timeline-dot","style":{"border":{"radius":"50%"}},"backgroundColor":"accent","textColor":"base","layout":{"type":"default"}} -->
				<div class="wp-block-group cclee-timeline-dot has-accent-background-color has-base-color has-text-color has-background" style="border-radius:50%">
					<!-- wp:paragraph {"align":"center","fontSize":"small","style":{"typography":{"fontWeight":"700"}}} -->
					<p class="has-text-align-center has-small-font-size" style="font-weight:700">2015</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--50)"}},"border":{"radius":"12px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
					<!-- wp:html -->
					<div style="margin-bottom:8px"><?php echo cclee_svg( 'globe' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:heading {"level":4,"textColor":"primary","fontSize":"heading-4"} -->
					<h4 class="wp-block-heading has-primary-color has-text-color has-heading-4-font-size">Global Expansion</h4>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color">Opened offices in 5 new countries, establishing our presence as a global leader in the market.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}},"className":"cclee-timeline-item is-style-equal-height"} -->
		<div class="wp-block-columns cclee-timeline-item is-style-equal-height" style="margin-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:column {"width":"100px"} -->
			<div class="wp-block-column" style="flex-basis:100px">
				<!-- wp:group {"className":"cclee-timeline-dot","style":{"border":{"radius":"50%"}},"backgroundColor":"accent","textColor":"base","layout":{"type":"default"}} -->
				<div class="wp-block-group cclee-timeline-dot has-accent-background-color has-base-color has-text-color has-background" style="border-radius:50%">
					<!-- wp:paragraph {"align":"center","fontSize":"small","style":{"typography":{"fontWeight":"700"}}} -->
					<p class="has-text-align-center has-small-font-size" style="font-weight:700">2020</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--50)"}},"border":{"radius":"12px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
					<!-- wp:html -->
					<div style="margin-bottom:8px"><?php echo cclee_svg( 'star' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:heading {"level":4,"textColor":"primary","fontSize":"heading-4"} -->
					<h4 class="wp-block-heading has-primary-color has-text-color has-heading-4-font-size">Industry Award Winner</h4>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color">Recognized with multiple industry awards for innovation, quality, and customer excellence.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"className":"cclee-timeline-item is-style-equal-height"} -->
		<div class="wp-block-columns cclee-timeline-item is-style-equal-height">
			<!-- wp:column {"width":"100px"} -->
			<div class="wp-block-column" style="flex-basis:100px">
				<!-- wp:group {"className":"cclee-timeline-dot","style":{"border":{"radius":"50%"}},"backgroundColor":"accent","textColor":"base","layout":{"type":"default"}} -->
				<div class="wp-block-group cclee-timeline-dot has-accent-background-color has-base-color has-text-color has-background" style="border-radius:50%">
					<!-- wp:paragraph {"align":"center","fontSize":"small","style":{"typography":{"fontWeight":"700"}}} -->
					<p class="has-text-align-center has-small-font-size" style="font-weight:700">2024</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--50)"}},"border":{"radius":"12px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
					<!-- wp:html -->
					<div style="margin-bottom:8px"><?php echo cclee_svg( 'chart-bar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:heading {"level":4,"textColor":"primary","fontSize":"heading-4"} -->
					<h4 class="wp-block-heading has-primary-color has-text-color has-heading-4-font-size">500+ Projects Milestone</h4>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color">Celebrated delivering our 500th project, a testament to our team's dedication and client trust.</p>
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

</div>
<!-- /wp:group -->
