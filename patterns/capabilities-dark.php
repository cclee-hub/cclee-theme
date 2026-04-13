<?php
/**
 * Title: Capabilities Dark
 * Slug: cclee/capabilities-dark
 * Categories: cclee, featured
 * Description: Multi-column capabilities cards on dark contrast background
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"textAlign":"center","textColor":"primary"} -->
		<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Our Capabilities</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-500","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--60)"}}}} -->
		<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60)">Comprehensive solutions tailored to your needs.</p>
		<!-- /wp:paragraph -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--50)"}}},"className":"is-style-equal-height","isStackedOnMobile":false} -->
		<div class="wp-block-columns is-style-equal-height is-not-stacked-on-mobile">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"},"border":{"radius":"12px","width":"1px","style":"solid"},"shadow":"0 4px 20px rgba(0,0,0,0.06)"},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 20px rgba(0,0,0,0.06)">
					<!-- wp:html -->
					<div class="cclee-icon-box cclee-icon-box--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'pencil' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary"} -->
					<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Product Design</h4>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
					<p class="has-text-align-center has-neutral-500-color has-text-color">From concept to production-ready designs.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"},"border":{"radius":"12px","width":"1px","style":"solid"},"shadow":"0 4px 20px rgba(0,0,0,0.06)"},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 20px rgba(0,0,0,0.06)">
					<!-- wp:html -->
					<div class="cclee-icon-box cclee-icon-box--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'package' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary"} -->
					<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Manufacturing</h4>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
					<p class="has-text-align-center has-neutral-500-color has-text-color">High-quality production at competitive costs.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"},"border":{"radius":"12px","width":"1px","style":"solid"},"shadow":"0 4px 20px rgba(0,0,0,0.06)"},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 20px rgba(0,0,0,0.06)">
					<!-- wp:html -->
					<div class="cclee-icon-box cclee-icon-box--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'shield-check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary"} -->
					<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Quality Control</h4>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
					<p class="has-text-align-center has-neutral-500-color has-text-color">Rigorous testing for every product batch.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"},"border":{"radius":"12px","width":"1px","style":"solid"},"shadow":"0 4px 20px rgba(0,0,0,0.06)"},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 20px rgba(0,0,0,0.06)">
					<!-- wp:html -->
					<div class="cclee-icon-box cclee-icon-box--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'zap' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary"} -->
					<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Fast Delivery</h4>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
					<p class="has-text-align-center has-neutral-500-color has-text-color">Efficient logistics for on-time delivery.</p>
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
