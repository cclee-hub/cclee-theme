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
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"backgroundColor":"surface","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-base-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

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

		<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}},"className":"cclee-timeline-item"} -->
		<div class="wp-block-columns cclee-timeline-item" style="margin-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:column {"width":"100px"} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"radius":"50%"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"accent","textColor":"base","layout":{"type":"default"}} -->
				<div class="wp-block-group cclee-timeline-dot has-accent-background-color has-base-color has-text-color has-background">
					<!-- wp:paragraph {"align":"center","fontSize":"small","className":"cclee-text--700"} -->
					<p class="has-text-align-center has-small-font-size cclee-text--700">2010</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"backgroundColor":"base","className":"is-style-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-card has-base-background-color has-background">
					<!-- wp:html -->
					<div class="cclee-flex--center has-neutral-100-background-color has-background has-primary-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--20);width:fit-content;margin-left:auto;margin-right:auto;border-radius:var(--wp--custom--border--radius--lg);padding:var(--wp--preset--spacing--30)"><?php echo cclee_svg( 'rocket' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
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

		<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}},"className":"cclee-timeline-item"} -->
		<div class="wp-block-columns cclee-timeline-item" style="margin-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:column {"width":"100px"} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"radius":"50%"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"accent","textColor":"base","layout":{"type":"default"}} -->
				<div class="wp-block-group cclee-timeline-dot has-accent-background-color has-base-color has-text-color has-background">
					<!-- wp:paragraph {"align":"center","fontSize":"small","className":"cclee-text--700"} -->
					<p class="has-text-align-center has-small-font-size cclee-text--700">2015</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"backgroundColor":"base","className":"is-style-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-card has-base-background-color has-background">
					<!-- wp:html -->
					<div class="cclee-flex--center has-neutral-100-background-color has-background has-primary-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--20);width:fit-content;margin-left:auto;margin-right:auto;border-radius:var(--wp--custom--border--radius--lg);padding:var(--wp--preset--spacing--30)"><?php echo cclee_svg( 'globe' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
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

		<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}},"className":"cclee-timeline-item"} -->
		<div class="wp-block-columns cclee-timeline-item" style="margin-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:column {"width":"100px"} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"radius":"50%"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"accent","textColor":"base","layout":{"type":"default"}} -->
				<div class="wp-block-group cclee-timeline-dot has-accent-background-color has-base-color has-text-color has-background">
					<!-- wp:paragraph {"align":"center","fontSize":"small","className":"cclee-text--700"} -->
					<p class="has-text-align-center has-small-font-size cclee-text--700">2020</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"backgroundColor":"base","className":"is-style-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-card has-base-background-color has-background">
					<!-- wp:html -->
					<div class="cclee-flex--center has-neutral-100-background-color has-background has-primary-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--20);width:fit-content;margin-left:auto;margin-right:auto;border-radius:var(--wp--custom--border--radius--lg);padding:var(--wp--preset--spacing--30)"><?php echo cclee_svg( 'star' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
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

		<!-- wp:columns {"className":"cclee-timeline-item"} -->
		<div class="wp-block-columns cclee-timeline-item">
			<!-- wp:column {"width":"100px"} -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"radius":"50%"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"accent","textColor":"base","layout":{"type":"default"}} -->
				<div class="wp-block-group cclee-timeline-dot has-accent-background-color has-base-color has-text-color has-background">
					<!-- wp:paragraph {"align":"center","fontSize":"small","className":"cclee-text--700"} -->
					<p class="has-text-align-center has-small-font-size cclee-text--700">2024</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"backgroundColor":"base","className":"is-style-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-card has-base-background-color has-background">
					<!-- wp:html -->
					<div class="cclee-flex--center has-neutral-100-background-color has-background has-primary-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--20);width:fit-content;margin-left:auto;margin-right:auto;border-radius:var(--wp--custom--border--radius--lg);padding:var(--wp--preset--spacing--30)"><?php echo cclee_svg( 'chart-bar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
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
