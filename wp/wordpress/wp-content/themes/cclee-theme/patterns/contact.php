<?php
/**
 * Title: Contact Section
 * Slug: cclee-theme/contact
 * Categories: cclee-theme, featured
 * Description: 联系表单区块，包含表单和联系信息
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:heading {"textColor":"primary"} -->
			<h2 class="wp-block-heading has-primary-color has-text-color">Get in Touch</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-500","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}}} -->
			<p class="has-neutral-500-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--40)">Have a question or want to work together? We'd love to hear from you.</p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:html -->
				<div class="cclee-contact-icon" style="margin-right:12px"><?php echo cclee_svg( 'mail' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph -->
				<p><strong>Email:</strong> hello@example.com</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:html -->
				<div class="cclee-contact-icon" style="margin-right:12px"><?php echo cclee_svg( 'map-pin' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph -->
				<p><strong>Location:</strong> 123 Business Street, City</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:html -->
				<div class="cclee-contact-icon" style="margin-right:12px"><?php echo cclee_svg( 'clock' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph -->
				<p><strong>Hours:</strong> Mon-Fri 9AM-6PM</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<div class="cclee-contact-icon" style="margin-right:12px"><?php echo cclee_svg( 'phone' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph -->
				<p><strong>Phone:</strong> +1 (555) 123-4567</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"textColor":"neutral-500"} -->
				<p class="has-neutral-500-color has-text-color" style="font-style:italic">Tip: Use with Contact Form 7 or WPForms plugin.</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator is-style-wide"/>
				<!-- /wp:separator -->

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
