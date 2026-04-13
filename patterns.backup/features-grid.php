<?php
/**
 * Title: Features Grid
 * Slug: cclee/features-grid
 * Categories: cclee, featured
 * Description: Three-column feature grid
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"backgroundColor":"surface","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-base-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:heading {"textAlign":"center","textColor":"base","fontSize":"heading-2"} -->
	<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-heading-2-font-size">Everything You Need</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-300","fontSize":"x-large","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--60)"}}}} -->
	<p class="has-text-align-center has-neutral-300-color has-text-color has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--60)">Powerful features to help you build amazing websites.</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"className":"is-style-cards is-style-equal-height"} -->
	<div class="wp-block-columns is-style-cards is-style-equal-height">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px","style":"solid"},"shadow":"var(--wp--preset--shadow--card)"},"borderColor":"neutral-200","backgroundColor":"base","className":"is-style-card cclee-hover-lift","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:var(--wp--preset--shadow--card)">
				<!-- wp:html -->
				<div class="cclee-icon cclee-icon--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'rocket' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->
				<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary","fontSize":"heading-4"} -->
				<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-4-font-size">Fast Performance</h4>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color">Lightning-fast load times for the best user experience.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px","style":"solid"},"shadow":"var(--wp--preset--shadow--card)"},"borderColor":"neutral-200","backgroundColor":"base","className":"is-style-card cclee-hover-lift","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:var(--wp--preset--shadow--card)">
				<!-- wp:html -->
				<div class="cclee-icon cclee-icon--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'palette' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->
				<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary","fontSize":"heading-4"} -->
				<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-4-font-size">Flexible Design</h4>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color">Customize every aspect to match your brand perfectly.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px","style":"solid"},"shadow":"var(--wp--preset--shadow--card)"},"borderColor":"neutral-200","backgroundColor":"base","className":"is-style-card cclee-hover-lift","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:var(--wp--preset--shadow--card)">
				<!-- wp:html -->
				<div class="cclee-icon cclee-icon--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'zap' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->
				<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary","fontSize":"heading-4"} -->
				<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-4-font-size">Easy to Use</h4>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color">No coding required. Build beautiful sites with ease.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
