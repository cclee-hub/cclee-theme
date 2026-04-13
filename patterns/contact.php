<?php
/**
 * Title: Contact Section
 * Slug: cclee/contact
 * Categories: cclee, featured
 * Description: Contact section with form and contact information
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column cclee-col--50">

			<!-- wp:heading {"textColor":"primary","fontSize":"heading-2"} -->
			<h2 class="wp-block-heading has-primary-color has-text-color has-heading-2-font-size">Get in Touch</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-500","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}}} -->
			<p class="has-neutral-500-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--40)">Have a question or want to work together? We'd love to hear from you.</p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:html -->
				<div class="cclee-mr--12 has-primary-color has-text-color"><?php echo cclee_svg( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph -->
				<p><strong>Email:</strong> hello@example.com</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:html -->
				<div class="cclee-mr--12 has-primary-color has-text-color"><?php echo cclee_svg( 'map-pin' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph -->
				<p><strong>Location:</strong> 123 Business Street, City</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:html -->
				<div class="cclee-mr--12 has-primary-color has-text-color"><?php echo cclee_svg( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph -->
				<p><strong>Hours:</strong> Mon-Fri 9AM-6PM</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<div class="cclee-mr--12 has-primary-color has-text-color"><?php echo cclee_svg( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph -->
				<p><strong>Phone:</strong> +1 (555) 123-4567</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column cclee-col--50">

			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

				<!-- wp:paragraph -->
				<p><strong>Name</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator is-style-wide"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><strong>Email</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator is-style-wide"/>
				<!-- /wp:separator -->

				<!-- wp:paragraph -->
				<p><strong>Message</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:button {"backgroundColor":"accent","textColor":"base"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Send Message</a></div>
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

</div>
<!-- /wp:group -->
