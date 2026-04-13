<?php
/**
 * Title: Pricing Table
 * Slug: cclee/pricing
 * Categories: cclee, featured
 * Description: Three-column pricing table
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"backgroundColor":"surface","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-base-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:heading {"textAlign":"center","textColor":"base","fontSize":"heading-2"} -->
	<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-heading-2-font-size">Simple, Transparent Pricing</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-300","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--50)"}}}} -->
	<p class="has-text-align-center has-neutral-300-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">No hidden fees. Cancel anytime.</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--60)"}}},"className":"is-style-equal-height"} -->
	<div class="wp-block-columns is-style-equal-height" style="margin-top:var(--wp--preset--spacing--60)">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">

				<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary","fontSize":"heading-4"} -->
				<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-4-font-size">Starter</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","fontSize":"heading-2","textColor":"primary"} -->
				<p class="has-text-align-center has-primary-color has-text-color has-heading-2-font-size">$0</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color">Perfect for personal projects</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide","backgroundColor":"neutral-200"} -->
				<hr class="wp-block-separator has-text-color has-neutral-200-color has-alpha-channel-opacity has-neutral-200-background-color has-background has-css-opacity is-style-wide"/>
				<!-- /wp:separator -->

				<!-- wp:html -->
				<ul class="cclee-check-list has-neutral-600-color has-text-color">
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> 5 Projects</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> 1GB Storage</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Community Support</li>
				</ul>
				<!-- /wp:html -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
					<!-- wp:button {"width":100,"backgroundColor":"primary","textColor":"base"} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background wp-element-button">Get Started</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)"}},"gradient":"accent","textColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group cclee-card has-base-color has-text-color has-accent-gradient-background has-background" style="border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">

				<!-- wp:heading {"textAlign":"center","level":4,"fontSize":"heading-4"} -->
				<h4 class="wp-block-heading has-text-align-center has-heading-4-font-size">Pro</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","fontSize":"heading-2"} -->
				<p class="has-text-align-center has-heading-2-font-size">$29/mo</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}}} -->
				<p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--20)">For growing businesses</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide","backgroundColor":"neutral-100","textColor":"neutral-100"} -->
				<hr class="wp-block-separator has-neutral-100-color has-text-color has-neutral-100-background-color has-background has-alpha-channel-opacity has-css-opacity is-style-wide"/>
				<!-- /wp:separator -->

				<!-- wp:html -->
				<ul class="cclee-check-list">
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Unlimited Projects</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> 50GB Storage</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Priority Support</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Advanced Analytics</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> API Access</li>
				</ul>
				<!-- /wp:html -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
					<!-- wp:button {"width":100,"backgroundColor":"base","textColor":"primary"} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button">Start Free Trial</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group cclee-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">

				<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary","fontSize":"heading-4"} -->
				<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-4-font-size">Enterprise</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","fontSize":"heading-2","textColor":"primary"} -->
				<p class="has-text-align-center has-primary-color has-text-color has-heading-2-font-size">Custom</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color">For large teams</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide","backgroundColor":"neutral-200"} -->
				<hr class="wp-block-separator has-text-color has-neutral-200-color has-alpha-channel-opacity has-neutral-200-background-color has-background has-css-opacity is-style-wide"/>
				<!-- /wp:separator -->

				<!-- wp:html -->
				<ul class="cclee-check-list has-neutral-600-color has-text-color">
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Unlimited Everything</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Dedicated Support</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> Custom Integrations</li>
					<li><?php echo cclee_svg( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> SLA Guarantee</li>
				</ul>
				<!-- /wp:html -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
					<!-- wp:button {"width":100,"backgroundColor":"primary","textColor":"base"} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background wp-element-button">Contact Us</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
