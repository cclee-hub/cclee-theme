<?php
/**
 * Title: Stats Section Dark
 * Slug: cclee/stats-dark
 * Categories: cclee, featured
 * Description: Key statistics showcase on dark gradient background with semi-transparent cards
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"gradient":"hero","textColor":"base","className":"has-dots-pattern","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-dots-pattern has-hero-gradient has-base-color has-hero-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"textAlign":"center","fontSize":"heading-2"} -->
		<h2 class="wp-block-heading has-text-align-center has-heading-2-font-size">Factory at a Glance</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-300","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--60)"}}}} -->
		<p class="has-text-align-center has-neutral-300-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60)">Our production capabilities at a glance.</p>
		<!-- /wp:paragraph -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var(--wp--preset--spacing--60)","left":"var(--wp--preset--spacing--60)"}}},"isStackedOnMobile":false} -->
		<div class="wp-block-columns is-not-stacked-on-mobile">

			<!-- wp:column {"width":"25%"} -->
			<div class="wp-block-column cclee-col--25">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"},"border":{"radius":"12px"}},"backgroundColor":"rgba(255,255,255,0.05)","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group has-rgba-255-255-255-0-05-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">
					<!-- wp:html -->
					<div class="cclee-icon-box cclee-icon-box--accent" style="text-align:center;margin-bottom:var(--wp--preset--spacing--20)"><?php echo cclee_svg( 'factory' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:paragraph {"align":"center","fontSize":"heading-2","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
					<p class="has-text-align-center has-heading-2-font-size" style="font-weight:700;line-height:1">000+</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-300","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} -->
					<p class="has-text-align-center has-neutral-300-color has-text-color" style="text-transform:uppercase;letter-spacing:0.1em;margin-top:var(--wp--preset--spacing--20)">Products Delivered</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"25%"} -->
			<div class="wp-block-column cclee-col--25">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"},"border":{"radius":"12px"}},"backgroundColor":"rgba(255,255,255,0.05)","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group has-rgba-255-255-255-0-05-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">
					<!-- wp:html -->
					<div class="cclee-icon-box cclee-icon-box--accent" style="text-align:center;margin-bottom:var(--wp--preset--spacing--20)"><?php echo cclee_svg( 'users' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:paragraph {"align":"center","fontSize":"heading-2","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
					<p class="has-text-align-center has-heading-2-font-size" style="font-weight:700;line-height:1">000+</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-300","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} -->
					<p class="has-text-align-center has-neutral-300-color has-text-color" style="text-transform:uppercase;letter-spacing:0.1em;margin-top:var(--wp--preset--spacing--20)">Team Members</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"25%"} -->
			<div class="wp-block-column cclee-col--25">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"},"border":{"radius":"12px"}},"backgroundColor":"rgba(255,255,255,0.05)","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group has-rgba-255-255-255-0-05-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">
					<!-- wp:html -->
					<div class="cclee-icon-box cclee-icon-box--accent" style="text-align:center;margin-bottom:var(--wp--preset--spacing--20)"><?php echo cclee_svg( 'globe' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:paragraph {"align":"center","fontSize":"heading-2","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
					<p class="has-text-align-center has-heading-2-font-size" style="font-weight:700;line-height:1">00+</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-300","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} -->
					<p class="has-text-align-center has-neutral-300-color has-text-color" style="text-transform:uppercase;letter-spacing:0.1em;margin-top:var(--wp--preset--spacing--20)">Countries Served</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"25%"} -->
			<div class="wp-block-column cclee-col--25">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"},"border":{"radius":"12px"}},"backgroundColor":"rgba(255,255,255,0.05)","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group has-rgba-255-255-255-0-05-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">
					<!-- wp:html -->
					<div class="cclee-icon-box cclee-icon-box--accent" style="text-align:center;margin-bottom:var(--wp--preset--spacing--20)"><?php echo cclee_svg( 'shield-check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<!-- /wp:html -->
					<!-- wp:paragraph {"align":"center","fontSize":"heading-2","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
					<p class="has-text-align-center has-heading-2-font-size" style="font-weight:700;line-height:1">00+</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"align":"center","textColor":"neutral-300","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} -->
					<p class="has-text-align-center has-neutral-300-color has-text-color" style="text-transform:uppercase;letter-spacing:0.1em;margin-top:var(--wp--preset--spacing--20)">Years Experience</p>
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
